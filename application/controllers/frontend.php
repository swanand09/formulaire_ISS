<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/frontend
	 *	- or -  
	 * 		http://example.com/index.php/frontend/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/frontend/<method_name>
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
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			//redirect($this->config->item('base_url'), 'refresh');
                        redirect('frontend/verif_ticket', 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
//			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
//
//			//list the users
//			$this->data['users'] = $this->ion_auth->get_users_array();
//			$this->load->view('auth/index', $this->data);
                    redirect('backend/users_list', 'refresh');
		}
	}
        
        function login($data=array())
        {
             return $this->controller_login($data);
        }
        
        function process_login()
        {
           
		
		if ($this->ion_auth->logged_in())
		{
			//already logged in so no need to access this page
			redirect($this->config->item('base_url'), 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('login_email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('login_pwd', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ 
                   
                    ////check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('login_email'), $this->input->post('login_pwd'), $remember))
			{ //if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect($this->config->item('base_url'), 'refresh');
			}
			else
			{ 
                            ////if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('frontend/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
                               // $this->data['message'] =$this->session->set_flashdata('message', $this->ion_auth->errors());
                               // return $this->login($this->data);
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('login_email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			//$this->load->view('frontend/login', $this->data);
                        return $this->login($this->data);
		}
        }
        
        function logout()
        {          
           return $this->controller_logout();
        }
        
        function verif_ticket($data=array())
        {  
            //$user_arr = $this->ion_auth->get_user_array();            
            if ($this->ion_auth->logged_in())
            {
                return $this->controller_verif_ticket($data);
            }else
            {
                redirect('frontend/login', 'refresh');
            }            
      
        }
        
        function process_validate_ticket()
        {
            //validate form input
            $this->form_validation->set_rules('ticket_num', 'Numéro ticket', 'required|numeric');
         
            if ($this->form_validation->run() == true)
            { 
                $this->data['result']           = $this->user->get_ticket_info($this->input->post('ticket_num'));
                $this->data['user_info']    = $this->ion_auth->get_user_array();
                if($this->data['result']==FALSE)
                {
                    $this->data['message'] =   'Le numéro ticket n\'est pas valide.';
                    return $this->verif_ticket($this->data);
                }
                $this->data['num_ticket'] = $this->input->post('ticket_num');
               
                return $this->verif_retour($this->data);
            }
            else
            {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                return $this->verif_ticket($this->data);
            }
        }
        
        function verif_retour($data=array())
        {
            if ($this->ion_auth->logged_in())
            {
                return $this->controller_verif_retour($data);
            }else
            {
                redirect('frontend/login', 'refresh');
            }      
        }
        
        function process_recap_info()
        {
             $this->data['recap_info'] = $this->input->post();
               
             return $this->recap_info($this->data);
        }
        
        function recap_info($data=array())
        {
            if ($this->ion_auth->logged_in())
            {
                return $this->controller_recap_info($data);
            }else
            {
                redirect('frontend/login', 'refresh');
            }      
        }
        
        function process_mail_dino()
        {
            $this->load->library('email');
                
            $this->email->from($this->userdata["email"], $this->userdata["nom_technicien"]);
            $this->email->to('s.luthmoodoo@mediacall.mu');
         //  $this->email->to('Louis-Felix.RANSAU@mediaserv.com,laurent.villacampa@mediaserv.com');
            //date
           // $date = new DateTime('2010-09-01');

            //$this->email->subject('[dino.mediaservb.net #'.$this->userdata["num_ticket"]."] RETOUR ISS - ".$this->userdata["tel"]);
	     $this->email->subject('[DINO #'.$this->userdata["num_ticket"]."] RETOUR ISS - ".$this->userdata["tel"]." ".$this->input->post("prec_tech")." ".$this->input->post("sync_depart"));
            $message="";
            $message.="
                         Technicien ayant effectué l'intervention: ".$this->userdata["nom_technicien"]."\n                                                                                               
                         Date de l'intervention: ". date('d-m-Y H:i:s')."\n  
                         o Présence client : ".$this->input->post("presence_client")."\n    
                         o SYNC en Début : ".$this->input->post("sync_debut")."\n 
                         o T (Tension) = ".$this->input->post("tension")." V \n
                         o DT (Défaut Type) = ".$this->input->post("DT")."\n
                         o PLC (Pré-localisation client final) = ".$this->input->post("plc")."M \n
                         o PLN (Pré-localisation client NRA) = ".$this->input->post("pln")." M \n
                         o RISO : (Résistance d’Isolement) = A/Terre (".$this->input->post("brin_aterre").") ; A/BATT (".$this->input->post("brin_abatt").") ; B/Terre (".$this->input->post("brin_bterre").") ; B/BATT (".$this->input->post("brin_bbatt").") ; A/B (".$this->input->post("brin_ab").")\n
                         o TSPM (Tonalité Sur Prise Murale) = ".$this->input->post("tspm")."\n
                         o Test de port au RNA = ".$this->input->post("test_port_rna")."\n
                         o Informations Complémentaires(CGT PRISE, CGT BOX, autres...) = ".$this->input->post("ifc")."\n

                           Préconisation du technicien: ".$this->input->post("prec_tech")."\n

                         o Sync en Départ : ".$this->input->post("sync_depart");

            $this->email->message($message);

            if($this->email->send())
            {
                  return $this->controller_fin();
            }
        }
}

/* End of file frontend.php */
/* Location: ./application/controllers/frontend.php */