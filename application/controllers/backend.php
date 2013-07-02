<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backend extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/backend
	 *	- or -  
	 * 		http://example.com/index.php/backend/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/backend/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
        public function __construct()
	{
		parent::__construct();
                //var $mycont = MY_Controller();
	} 
        
        public function index()
	{
		
                if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('frontend/login', 'refresh');
		}		
		else
		{
			  redirect('backend/users_list', 'refresh');
		}
	}
        
        function users_list()
        {
            if (!$this->ion_auth->logged_in()|| !$this->ion_auth->is_admin())
            {
			//redirect them to the login page
		redirect('frontend/verif_ticket', 'refresh');
            }		
            else
            {
                return $this->controller_users_list();
            }
        }
        
        function create_user($data=array())
        {
            if (!$this->ion_auth->logged_in()|| !$this->ion_auth->is_admin())
            {
		//redirect them to the login page
		redirect('frontend/verif_ticket', 'refresh');
            }		
            else
            {
                return $this->controller_create_user($data);
            }
        }
        
        function process_create_user()
        {
            if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
            {
                    redirect('frontend/verif_ticket', 'refresh');
            }

            //validate form input           
            $this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
            $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');                      
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
            if ($this->form_validation->run() == true)
            {
                    $username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $group_name = $this->input->post('type_group');
                    $additional_data = array('first_name' => $this->input->post('first_name'),
                                            'last_name' => $this->input->post('last_name'),                            
                                        );
                    
            }
            if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data,$group_name))
            {     
                    //check to see if we are creating the user
                    //redirect them back to the admin page
                    $this->session->set_flashdata('message', "Un nouveau utilisateur vient d'être ajouté");
                    redirect('backend/users_list', 'refresh');
            }
            else
            {       
                    //display the create user form
                    //set the flash data error message if there is one
                    //$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                   $this->data["type_group"] = $this->input->post("type_group");
                    return $this->create_user($this->data);
            }
              
        }
        
        function ajax_create_user()
        {
            $first_name       = $this->input->post('first_name');
            $last_name        = $this->input->post('last_name');
            $username         = strtolower($first_name) . ' ' . strtolower($last_name);
            $email            = $this->input->post('email');
            $password         = $this->input->post('password');
            $group_name       = $this->input->post('type_group');
            
            $additional_data  = array('first_name' => $first_name,
                                      'last_name' => $last_name,                            
                                  );
           
            //check if user exists with same email
           $htmlContent = (sizeof($this->ion_auth->get_user_by_email($email))>0)? "alert" : "";
           //$this->user->);
           if($htmlContent=="")
           {
                $user_id = $this->ion_auth->register($username, $password, $email, $additional_data,$group_name);

                 switch($group_name)
                 {
                     case 'admin':
                             $group_name = 'Administrator';
                         break;
                     case 'members':
                             $group_name = 'General User';
                         break;
                 }

                 $htmlContent = "
                                <tr>
                                  <td>". $first_name."</td>
                                  <td>".$last_name ."</td>
                                  <td>". $email ."</td>
                                  <td>".$group_name."</td>
                                  <td>
                                      <div style='width:50px;float:left;'>
                                        <span style='cursor:pointer;text-decoration:underline;' onclick='javascript:deactivate_user(".$user_id.");' >Active</span>
                                      </div>   
                                      <div style='width:50px;float:left;'>
                                          ".image('icoSupprimer.png',NULL,array('style'=>'cursor:pointer;','onclick'=>'javascript:delete_user('.$user_id.');','alt'=>'Supprimer','title'=>'Supprimer','width'=>'12')).
                                          "
                                      </div>
                                  </td>
                              </tr>
                              "; 
           } 
             echo $htmlContent;
        }
        
        function delete_user($id)
        {
            $username = $this->ion_auth->get_user($id)->username;
            if($this->ion_auth->delete_user($id))
            {
                 $this->session->set_flashdata('message', $username." a été supprimé avec succès");
            }else
            {
                 $this->session->set_flashdata('message', $username." n'a pa pu être supprimé");
            }
            redirect("backend/users_list","refresh");
        }
        
        function deactivate_user($id)
        {
            if($this->ion_auth->deactivate($id))
            {
                 $this->session->set_flashdata('message', $this->ion_auth->get_user($id)->username." a été déactivé avec succès");
            }else
            {
                 $this->session->set_flashdata('message', $this->ion_auth->get_user($id)->username." n'a pa pu être déactivé");
            }
            redirect("backend/users_list","refresh");
        }
}

/* End of file backend.php */
/* Location: ./application/controllers/backend.php */        
