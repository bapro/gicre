<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_patient_form_lib {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					    $this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->PERFIL =$this->CI->session->userdata('user_perfil');
						$this->ID_USER =$this->CI->session->userdata('user_id');
						$this->CI->load->model('model_admin');
						$this->CI->load->model('navigation/account_demand_model');
        }





       
		
		
		  public function create_patient_form()
        {
			
			
			 if ($this->PERFIL == "Medico") {
             $data['seguro_medico'] = $this->model_admin->view_doctor_seguro($this->ID_USER);
            $centro_num = $this->CI->db->select('type, id_m_c')->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c')->where('id_doctor', $id_user)->group_by('id_centro')->get('medical_centers');
        } elseif($this->PERFIL == "Asistente Medico") {
            $data['seguro_medico'] = $this->CI->model_admin->view_doctor_seguro_as($as_medico_centro);
        } else{
			$data['countries'] = $this->CI->model_admin->getCountries();
           $data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		   
		   $admin_position_centro=$this->CI->session->userdata['admin_position_centro'];

if($admin_position_centro){
  $where_centro = "&& centro = $admin_position_centro";
  $querycentro = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
  $where_centro = "";
  $querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');

}
		   
		   
		}
		$data['provinces']=$this->CI->model_admin->getProvinces();	
			
		$data['countries'] = $this->CI->model_admin->getCountries();
		$this->CI->load->view('header');
		  $this->CI->load->view('cita/create-cita', $data);
        }
		
		
		
}


				
