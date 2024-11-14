<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_register_info {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
					$this->CI->clinical_history = $this->CI->load->database('clinical_history',TRUE);
					    //$this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->USER_ID=$this->CI->session->userdata('user_id');
        }





        public function get_operation_info($params)
        {
			$uri_segments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
			
               $controller_name = $uri_segments[1]; 

			$table= $params['table'];
			$id= $params['id'];
			$info_users_=$this->CI->clinical_history->select('inserted_by,inserted_time,updated_by,updated_time')->where('id',$id)->get($table)->row_array();
			
			$created_by=$this->CI->db->select('name')->where('id_user',$info_users_['inserted_by'])->get('users')->row('name');
			$updated_by=$this->CI->db->select('name')->where('id_user',$info_users_['updated_by'])->get('users')->row('name');
			
                      $if_updated_is_auditoria_medica=$this->CI->db->select('perfil')->where('id_user',$info_users_['updated_by'])->get('users')->row('perfil');


			$insed_time = date("d-m-Y H:i:s", strtotime($info_users_['inserted_time']));
            $upda_time = date("d-m-Y H:i:s", strtotime($info_users_['updated_time']));
			
                 if($controller_name =='clinical_history'){
                   	$show_info = "creado por $created_by $insed_time cambiado por $updated_by $upda_time";
		      }else{
		      	  if($controller_name !='clinical_history' && $if_updated_is_auditoria_medica=='Auditoria Medico' && $this->CI->session->userdata('user_perfil') !='Auditoria Medico') {
                    $show_info = "creado por $created_by $insed_time";
		      }else{
		      	$show_info = "creado por $created_by $insed_time cambiado por $updated_by $upda_time";
		      }
		      }
      

			return  "<div class='alert alert-primary' role='alert' id='user-info-created'>
				$show_info
			</div>";
			
        }
		
		
		  public function list_patients_registers_by_date($params)
        {
			$data['params']=$params;
		  $this->CI->load->view('clinical-history/patient-registers-by-date', $data);
        }
		
		
		  public function control_prenatal_list_patients_registers_by_date($params)
        {
			$data['params']=$params;
		  $this->CI->load->view('clinical-history/ginecology/control-prenatal/register_by_date', $data);
        }
		
		
		
		  public function showActionBtnHistClinical($data,$inserted_by, $editBtn, $alert, $reset)
        {
			$return='';
			if($data==1){
			$return .= "<div class='float-end'>
             ";
			 if($reset){
			$return .= "
            <button type='button' class='btn btn-primary' id='resetFormConDiag'>Nuevo</button>
			";
	     	}
			if($inserted_by==$this->USER_ID){
			
   		$return .="<button type='button' class='btn btn-success' id='$editBtn'>Guardar </button>";
			}
			
   		$return .="<span id='$alert' style='position:absolute; ' class='p-2'></span>

     	</div>";
		
		return $return;
		
			}
        }
		
}


				
