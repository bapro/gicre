<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Load_history_resume {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
			
				$this->ID_USER =$this->CI->session->userdata('user_id');
				$this->CI->clinical_history = $this->CI->load->database('clinical_history', TRUE);
				 $this->ID_PATIENT =$this->CI->session->userdata('id_patient');
	            $this->ID_CENTRO =$this->CI->session->userdata('id_centro');
					$this->CI->load->library('get_table_data_by_id');
				
		  }








 public function history_summary($id_patient){
  $list_cie10 = '';
		  $i=1;
		// get conclusion diagnostica
		
		
		
		$con_diags=$this->CI->clinical_history->order_by('id',"desc")
		->select('otros_diagnos, plan, procedimiento, id')
		->where('historial_id',$id_patient)
		//->where('inserted_by',$this->ID_USER)
		->get('h_c_conclusion_diagno')->row_array();
		
		
		//---get enfermedad actual
		[$get_doctor_info_by_id, $doctor_area] = $this->CI->get_table_data_by_id->getDoctorInfo($this->ID_USER);
		if($get_doctor_info_by_id['area'] !=91){
		$current_disease=$this->CI->clinical_history->order_by('id',"desc")
		->select('id, enf_motivo,signopsis, laboratorios, estudios, inserted_by, centro_medico, inserted_time')
		->where('historial_id',$id_patient)
		//->where('inserted_by',$this->ID_USER)
		->get('h_c_enfermedad_actual')->row_array();
		}else{
		$current_disease=$this->CI->clinical_history->order_by('id',"desc")
		->select('cir_vas_historial, id')
		->where('id_historial',$id_patient)
		//->where('inserted_by',$this->ID_USER)
		->get('h_c_cirujano_vascular')->row_array();	
		}
		if($con_diags){
			$query = $this->CI->clinical_history->query("SELECT diagno_def FROM h_c_diagno_def_link WHERE con_id_link=".$con_diags['id']);
			$result = $query->result();
		foreach($result as $rowcie10) {
	$description=$this->CI->clinical_history->select('description')->where('idd',$rowcie10->diagno_def)->get('cied')->row('description');
	 $list_cie10 .= $i++. "- ". $description. "<br>";	
	
    }
		}
		

		//---get signos vitales
			$signo_vitales=$this->CI->clinical_history->order_by('id',"desc")
		->select('*')
		->where('id_patient',$id_patient)
		//->where('inserted_by',$this->ID_USER)
		->get('h_c_signo_vitales')->row_array();
	
		 [$get_centro_info_by_id, $centro_adress]=$this->CI->get_table_data_by_id->getCentroInfo($current_disease['centro_medico']);
		return [$con_diags, $list_cie10, $current_disease, $signo_vitales, $get_doctor_info_by_id['area'], $get_doctor_info_by_id['name'], $get_centro_info_by_id, $doctor_area];

}


	

}
				
