<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_pages {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				$this->CI->load->model('model_admin');
				$this->CI->load->library('header_user');
				$this->CI->load->library('get_table_data_by_id');
				$this->CI->load->library('create_forms');
				$this->CI->IS_ADMINISTRATIVO=$this->CI->session->userdata('admin_position_centro');
				$this->ID_USER =$this->CI->session->userdata('user_id');
		  }

 public function show_page_appointments($value){
 $data['desde']=$value['desde'];
 $data['hasta']=  $value['hasta'];
  $data['centro']= $value['centro'];
 $data['table_title']= $value['table_title'];
  $data['result_centro_medicos']= $value['result_centro_medicos'];
$this->CI->load->view('patient/appointments',$data);
}



 public function show_page_ms_appointments($value){
 $data['desde']=$value['desde'];
 $data['hasta']=  $value['hasta'];
  $data['centro']= $value['centro'];
 $data['table_title']= $value['table_title'];
  $data['result_centro_medicos']= $value['result_centro_medicos'];
$this->CI->load->view('patient/ms_appointment',$data);
}





public function patient()
	{
		$id_patient=$this->CI->uri->segment(3);
		$id_apoint=$this->CI->uri->segment(4);
		$id_centro=$this->CI->uri->segment(5);
	$idC=decrypt_url($id_centro);
		
		$this->CI->session->set_userdata('getThisCentro', $idC);
		
		$this->CI->session->set_userdata('CURRENT_PATIENT', $_SERVER['REQUEST_URI']);
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		$id_patient_c=decrypt_url($id_patient); //returns codex
		$get_current_patient= $this->CI->db->select('id_p_a, nombre, cedula')->where('id_p_a', $id_patient_c)->get('patients_appointments')->row_array();
		if($get_current_patient){
		$array_values_for_photo = array(
						'id_p_a' =>$get_current_patient['id_p_a'],
						'cedula' =>$get_current_patient['cedula'],
						'image_class' => "img-fluid img-thumbnail",
						'style'=>'width=30'

						);
						$img = $this->CI->search_patient_photo->search_patient($array_values_for_photo);
		       $current_patient= $img. " ". $get_current_patient['nombre'];
		$this->CI->session->set_userdata('current_patient_name', $current_patient);
		
		$this->CI->header_user->headerMedico($this->ID_USER);
		$id = decrypt_url($id_patient);
		$this->CI->session->set_userdata('id_patient', $id_patient_c);
		// return $this->CI->create_forms->patient_data($id);

		$data['countries'] = $this->CI->model_admin->getCountries();
		$data['provinces'] = $this->CI->model_admin->getProvinces();
		$data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		$data['id_user'] = $this->ID_USER;
		$data['patient'] = $this->CI->model_admin->historial_medical($id);
		$data['idpatient'] = $id;
		$data['id_apoint'] = $id_apoint;
		$data['idC'] = $idC;
	    //$as_medico_centro = $this->CI->CI->db->select('centro_medico')->where('id_doctor', $this->CI->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
		 [$result_centro_medicos_for_cita]= $this->CI->create_forms->getCentroMedicoForCita($idC);
    $data['result_centro_medicos'] = $result_centro_medicos_for_cita;
	[$get_doctor_info_by_id, $doctor_area] = $this->CI->get_table_data_by_id->getDoctorInfo($this->ID_USER);
	 $data['areaTitle'] =$doctor_area;
		$this->CI->load->view('patient/forms/patient-data-form', $data);
		$this->CI->load->view('pagination-result');
	}else{
		//redirect('/page404');
			redirect("medico/patient/$id_patient/0/0");
	}
	}



	public function tariffs()
	{
		
	if($this->CI->session->userdata('user_perfil')=="Admin"){
     $this->CI->header_user->headerAdmin($this->ID_USER);
	 
	 if($this->CI->IS_ADMINISTRATIVO){
	$ID=$this->CI->IS_ADMINISTRATIVO;
			$where_centro = "AND id_m_c =$ID";
		}else{
		$where_centro = '';	
		}
	 
		$query = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE type='publico' $where_centro");
		}else{
		$query = $this->CI->db->query("SELECT id_m_c, name FROM doctor_centro_medico INNER JOIN medical_centers ON doctor_centro_medico.centro_medico=medical_centers.id_m_c WHERE id_doctor =$this->ID_USER && type='publico' ORDER BY name DESC");
		$this->CI->header_user->headerMedico($this->ID_USER);
		}
		
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers] = $this->CI->create_forms->getCentroAndSeguroByPerfil(0);
		$data['result_centro_medicos'] = $result_centro_medicos;

		
		$data['centro_medicos_publico'] = $query->result();


		$data['USER_CONTROLLER'] = $this->CI->session->userdata('USER_CONTROLLER');
		$data['USER_PERFIL'] = $this->CI->session->userdata('user_perfil');
		$this->CI->load->view('tarifario/search-tarifarios', $data);
	}


public function medical_center($id_medical_center){
	
$data['CENTRO_MEDICO'] = $this->CI->model_admin->display_centro_medico($id_medical_center);
$data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->CI->model_admin->display_centro_medical_esp($id_medical_center);
$data['CENTRO_MEDICO_SEGURO']= $this->CI->model_admin->display_centro_medical_seguro($id_medical_center);
$data['RESULT_DOCTOR']= $this->CI->model_admin->get_doctor($id_medical_center);
$data['RESULT_ASDOCTOR']= $this->CI->model_admin->get_asistente_doctor($id_medical_center);
$data['CENTRO_PROVINCE']= $this->CI->db->select('title')->join('medical_centers', 'provinces.id = medical_centers.provincia')->where('id_m_c',$id_medical_center)->limit(1)->get('provinces')->row('title');
 $data['CENTRO_MUNICIPIO']= $this->CI->db->select('title_town')->join('medical_centers', 'townships.id_town = medical_centers.municipio')->where('id_m_c',$id_medical_center)->limit(1)->get('townships')->row('title_town');
 $data['hide']=0;
 $data['CentroSeguroRowEdit'] = $this->CI->model_admin->display_all_seguro_medico();
 $this->CI->load->view('medical-center/see', $data);	
	
}
	public function doctor_account($id)
	{
		$this->CI->header_user->headerMedico($id);
		$medico_id = $id;
		$data['medico_id'] = $medico_id;

         $get_user_info_by_id =  $this->CI->get_table_data_by_id->getUserData($id);
		 	$data['show_user_name']=$get_user_info_by_id['name'];
             	$data['show_user_perfil'] =$get_user_info_by_id['perfil'];
			  $data['doctor_especialidad']=$area=$this->CI->db->select('title_area')->where('id_ar',$get_user_info_by_id['area'])->get('areas')->row('title_area');
		$data['result_doctor_seguro']=$this->CI->get_table_data_by_id->doctorSeguroMedicos($id);
		  [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]=$this->CI->create_forms->getCentroAndSeguroByPerfil(0);
		$data['result_centro_medicos']=$result_centro_medicos;
$data['result_seguro_medicos']=$result_seguro_medicos;

if($this->CI->IS_ADMINISTRATIVO){
	$ID=$this->CI->IS_ADMINISTRATIVO;
			$where_centro = "id_m_c =$ID AND";
		}else{
		$where_centro = '';	
		}

			$queryCt = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE  $where_centro id_m_c NOT IN (SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id group by id_centro)");
	if($this->CI->session->userdata('user_perfil')=='Admin'){
			$rows_result=$queryCt->result();
			}else{
			$rows_result= $this->CI->model_admin->view_doctor_centro_cita($get_user_info_by_id['id_user']); 
			}
		$data['rows_result']=$rows_result;
		$data['seguro_medico_doc'] = $this->CI->create_forms->doctor_seguro($id);
		$data['id_ar_doc'] =$get_user_info_by_id['area'];
		$this->CI->load->view('medico/account/index', $data);
	}



	public function medical_assistent($id)
	{
		$get_user_info_by_id =  $this->CI->get_table_data_by_id->getUserData($id);
		if($this->CI->session->userdata('user_perfil')=='Farmacia Interna'){
			
		$ID_CENTRO=$this->CI->db->select('centro_medico')->where('id_doctor',$id)->get('doctor_centro_medico')->row('centro_medico');
		if($ID_CENTRO){
      [$get_centro_info_by_id, $centro_adress] = $this->CI->get_table_data_by_id->getCentroInfo($ID_CENTRO);
		}else{
		$get_centro_info_by_id=0;	
		}
	   $this->CI->header_user->headerInternalDrug($id, $get_centro_info_by_id);
		}else{
		$this->CI->header_user->headerMedico($id);
		}
		$medico_id = $id;
		$data['medico_id'] = $medico_id;


		$data['show_user_name']=$get_user_info_by_id['name'];
		$data['show_user_perfil'] =$get_user_info_by_id['perfil'];
		$data['doctor_especialidad']=$area=$this->CI->db->select('title_area')->where('id_ar',$get_user_info_by_id['area'])->get('areas')->row('title_area');
		$data['result_doctor_seguro']=$this->CI->get_table_data_by_id->doctorSeguroMedicos($id);
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]=$this->CI->create_forms->getCentroAndSeguroByPerfil(0);
		$data['result_centro_medicos']=$result_centro_medicos;
		$data['result_seguro_medicos']=$result_seguro_medicos;

		if($this->CI->IS_ADMINISTRATIVO){
		$ID=$this->CI->IS_ADMINISTRATIVO;
		$where_centro = "WHERE id_m_c =$ID";
		}else{
		$where_centro = '';	
		}
		$queryCt = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers  $where_centro");
		$data['centro_medico_for_doc']=$queryCt->result();

		$this->CI->load->view('medico/account/index-asistente', $data);
		}




}
				
