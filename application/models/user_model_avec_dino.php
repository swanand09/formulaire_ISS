<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class User_model extends CI_Model
{
   var $CI;
   var $userdb;
    public function __construct()
    {
        parent::__construct();
       $this->CI =& get_instance();
        $this->CI->userdb = $this->load->database('dino', TRUE);
        $this->userdb =& $this->CI->userdb; 
        $this->load->database('dino',TRUE);
    }
    
    public function get_ticket_info($ticket_id)
    {
//       $query = $this->userdb->select('Subject, Ndi')
//                         ->where('id',$ticket_id)
//                         ->get('Tickets_SN'); 
        $sql = "SELECT Subject, Ndi FROM Tickets_SN WHERE id = ?";

        $query = $this->db->query($sql, $ticket_id); 
//        $query = $this->db->select('sujet, tel')
//                         ->where('id',$ticket_id)
//                         ->get('ticket'); 
       if ($query->num_rows() !== 1)
       {
            return FALSE;
       }else
       {
           return $query->row_array();
       }
    }
}
?>
