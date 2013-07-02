<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	var $data;
	var  $userdata;     
        public function __construct()
	{
		parent::__construct();     
                $this->load->model('User_model','user');    
                 $this->userdata = $this->session->all_userdata();
	}  
	
        function controller_login($data=array())
        {
           $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           $this->data['password'] = '';
           $this->data['email'] = '';
           if(!empty($data))
           {
              $this->data['email'] = $data["email"]["value"];
           }
           $this->template
                            ->prepend_metadata(header("Cache-Control: no-cache, must-revalidate"))
                            ->title('title', 'login')
                            ->set_partial('iss_contenu', 'frontend/login')
                            ->build('frontend_page1',$this->data);
        }
        
        function controller_logout()
        {
              $this->ion_auth->logout();
              redirect('frontend/login', 'refresh');
        }
        
        function controller_verif_ticket($data=array())
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           if(!empty($data))
           {
                $this->data['message'] = $data["message"];
           }
            $this->template
                 
                            ->title('title', 'verif ticket')

                            ->set_partial('iss_contenu', 'frontend/verif_ticket')

                            ->build('frontend_page1',$this->data);
        }
        
        function controller_verif_retour($data=array())
        {
           if(!empty($data))
           {    
               $this->data['num_ticket']        = $data["num_ticket"];
//               $this->data['sujet']             = $data["result"]["Subject"];
//               $this->data['tel']               = $data["result"]["Ndi"];
                $this->data['sujet']             = $data["result"]["sujet"];
               $this->data['tel']               = $data["result"]["tel"];
               $this->data['nom_technicien']    = $data["user_info"]["first_name"]." ".$data["user_info"]["last_name"];            
             $newdata = array(
                   'num_ticket'     => $this->data['num_ticket'],
                   'sujet'          => $this->data['sujet'] ,
                   'tel'            => $this->data['tel'] ,
                   'nom_technicien' => $this->data['nom_technicien'], 
                   'email'          => $data["user_info"]["email"]  
               );

              $this->session->set_userdata($newdata);
           }
            $this->template
                 
                            ->title('title', 'verif retour')

                            ->set_partial('iss_contenu', 'frontend/verif_retour')

                            ->build('frontend_page1',$this->data);
        }
        
        function controller_fin()
        {
             $this->template
                 
                            ->title('title', 'fin')

                            ->set_partial('iss_contenu', 'frontend/fin')

                            ->build('frontend_page1');
        }
        
        function controller_recap_info($data=array())
        {
            if(!empty($data))
            {
               $this->data["presence_client"]   =   $data["recap_info"]["presence_client"];
              
               $this->data["sync_debut"]   =   $data["recap_info"]["sync_debut"];

               if($data["recap_info"]["tension"]=="")
               {
                   $this->data["tension"]      =   "-"; 
               }else 
               {
                   $this->data["tension"]      =   $data["recap_info"]["tension"]; 
               }

               $this->data["dt"]             =   $data["recap_info"]["DT"]; 

               if( $data["recap_info"]["plc"]=="")
               {
                   $this->data["plc"]        = "-"; 
               }else
               {

                  $this->data["plc"]          =   $data["recap_info"]["plc"]; 
               }

               if($data["recap_info"]["pln"]=="")
               {
                   $this->data["pln"]          =   "-"; 
               }else
               {
                   $this->data["pln"]          =   $data["recap_info"]["pln"]; 
               }

               if($data["recap_info"]["brin_aterre"]=="")
               {
                   $this->data["brin_aterre"]  =   "-"; 
               }else
               {
                   $this->data["brin_aterre"]  =   $data["recap_info"]["brin_aterre"]; 
               }

               if($data["recap_info"]["brin_abatt"]=="")
               {
                   $this->data["brin_abatt"]   =  "-"; 
               }else
               {
                   $this->data["brin_abatt"]   =   $data["recap_info"]["brin_abatt"]; 
               }

               if($data["recap_info"]["brin_bterre"]=="")
               {
                   $this->data["brin_bterre"]  = "-";
               }
               else
               {
                   $this->data["brin_bterre"]  =   $data["recap_info"]["brin_bterre"]; 
               }
               if($data["recap_info"]["brin_bbatt"]=="")
               {
                   $this->data["brin_bbatt"]   =  "-";
               }
               else
               {
                   $this->data["brin_bbatt"]   =   $data["recap_info"]["brin_bbatt"];
               }

               if($data["recap_info"]["brin_ab"]=="")
               {
                   $this->data["brin_ab"]      =  "-";
               }
               else
               {
                   $this->data["brin_ab"]      =   $data["recap_info"]["brin_ab"];
               }

               $this->data["tspm"]         =   $data["recap_info"]["tspm"];
               
               $this->data["test_port_rna"]         =   $data["recap_info"]["test_port_rna"];               
               
               if($data["recap_info"]["ifc"]=="")
               {
                   $this->data["ifc"]          =   "-";
               }
               else
               {
                   $this->data["ifc"]          =   $data["recap_info"]["ifc"];
               }
               if($data["recap_info"]["prec_tech"]=="")
               {
                   $this->data["prec_tech"]    =   "-";
               }
               else
               {
                   $this->data["prec_tech"]    =   $data["recap_info"]["prec_tech"];
               }

               $this->data["sync_depart"]  =   $data["recap_info"]["sync_depart"];



               $this->data['num_ticket']        = $this->userdata["num_ticket"];
               $this->data['sujet']             = $this->userdata["sujet"];
               $this->data['tel']               = $this->userdata["tel"];
               $this->data['nom_technicien']    = $this->userdata["nom_technicien"];
            }
            $this->template
                 
                            ->title('title', 'validation info')

                            ->set_partial('iss_contenu', 'frontend/recap_info')

                            ->build('frontend_page1',$this->data);
        }
        
        
        //backend functions        
        function controller_users_list()
        {
            $this->data['users'] = $this->ion_auth->get_users_array();
            $this->data['message'] = $this->session->flashdata('message');
            $this->template->set_layout('backend');
            $this->template                 
                            ->title('title', 'Liste des utilisateurs')

                            ->set_partial('iss_contenu', 'backend/users_list')

                            ->build('frontend_page1',$this->data);
        }
        
         function controller_create_user($data=array())
        {
          // $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
             $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
             $this->data['first_name'] = array('name' => 'first_name',
                            'id' => 'first_name',
                            'type' => 'text',
                            'value' => $this->form_validation->set_value('first_name'),
                    );
            $this->data['last_name'] = array('name' => 'last_name',
                    'id' => 'last_name',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['email'] = array('name' => 'email',
                    'id' => 'email',
                    'type' => 'text',
                    'value' => $this->form_validation->set_value('email'),
            );
            $this->data['password'] = array('name' => 'password',
                    'id' => 'password',
                    'type' => 'password',
                    'value' => $this->form_validation->set_value('password'),
            );
            $this->data['password_confirm'] = array('name' => 'password_confirm',
                    'id' => 'password_confirm',
                    'type' => 'password',
                    'value' => $this->form_validation->set_value('password_confirm'),
            );
           
             if(!empty($data))
             {
                if($data["type_group"]=='admin')
                {
                    $this->data['type_group1'] = array('name' => 'type_group',
                    'id' => 'type_group',
                    'type' => 'radio',
                    'value' => 'admin',
                    'checked' => 'checked'
                     );
            
                    $this->data['type_group2'] = array('name' => 'type_group',
                            'id' => 'type_group',
                            'type' => 'radio',
                            'value' => 'members'
                    );
                }else
                {
                    $this->data['type_group1'] = array('name' => 'type_group',
                    'id' => 'type_group',
                    'type' => 'radio',
                    'value' => 'admin'
                    
                     );
            
                    $this->data['type_group2'] = array('name' => 'type_group',
                            'id' => 'type_group',
                            'type' => 'radio',
                            'value' => 'members',
                           'checked' => 'checked'
                    );
                }
             }else
             {
                 $this->data['type_group1'] = array('name' => 'type_group',
                    'id' => 'type_group',
                    'type' => 'radio',
                    'value' => 'admin'
                );
            
                $this->data['type_group2'] = array('name' => 'type_group',
                        'id' => 'type_group',
                        'type' => 'radio',
                        'value' => 'members',
                        'checked' => 'checked'
                );
             }
            
            
           $this->template
                 
                            ->title('title', 'Création nouveau utilisateur')

                            ->set_partial('iss_contenu', 'backend/create_user')

                            ->build('frontend_page1',$this->data);
        }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */