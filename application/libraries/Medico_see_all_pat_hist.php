<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medico_see_all_pat_hist {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					  $this->ID_USER =$this->CI->session->userdata('user_id');
						
        }

public function index(){
$hide_patient_history=$this->CI->db->select('hide_patient_history')->where('id_user',$this->ID_USER)->where('perfil','Medico')->get('users')->row('hide_patient_history');

if($hide_patient_history==1){
return   "AND inserted_by = $this->ID_USER";

}else{
return	 "";

}



}




	

}
				
