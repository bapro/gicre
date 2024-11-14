<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_register_info_hospitalization {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
					//$this->CI->clinical_history = $this->CI->load->database('hospitalization_emgergency',TRUE);
					    //$this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
        }





        public function get_operation_info($params)
        {
			$table= $params['table'];
			$id= $params['id'];
			$info_users_=$this->CI->hospitalization_emgergency->select('inserted_by,inserted_time,updated_by,updated_time')->where('id',$id)->get($table)->row_array();
			
			$created_by=$this->CI->db->select('name')->where('id_user',$info_users_['inserted_by'])->get('users')->row('name');
			$updated_by=$this->CI->db->select('name')->where('id_user',$info_users_['updated_by'])->get('users')->row('name');
			
			$insed_time = date("d-m-Y H:i:s", strtotime($info_users_['inserted_time']));
                     $upda_time = date("d-m-Y H:i:s", strtotime($info_users_['updated_time']));
			
                     if($this->CI->session->userdata('user_perfil') !='Auditoria Medico' && $info_users_['inserted_by'] !=$info_users_['updated_by']){
                    $show_info = "creado por $created_by $insed_time";
		      }else{
		      	$show_info = "creado por $created_by $insed_time cambiado por $updated_by $upda_time";
		      }

			 
			return  "<div class='alert alert-primary' role='alert'>
				$show_info
			</div>";
			
        }
		
		
		  public function list_patients_registers_by_date($params)
        {
			$data['params']=$params;
		  $this->CI->load->view('clinical-history/patient-registers-by-date', $data);
        }
		
		
		
}


				
