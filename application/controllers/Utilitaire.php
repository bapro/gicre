<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utilitaire extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->library("search_patient_photo");
$this->USER_CONTROLLER = $this->session->set_userdata('USER_CONTROLLER', 'medico');
$this->PERFIL =$this->session->userdata('user_perfil');
$this->ID_USER =$this->session->userdata('user_id');
$this->load->library("header_user");
$this->load->library("create_forms");
$this->load->library("get_table_data_by_id");
$this->load->model("model_general");
$this->load->model("Serversidetable");
$this->load->model("model_admin");
$this->load->library('form_validation');
$this->load->library('auto_complete_input');
}




 public function active_doctors()
    {
		ini_set('memory_limit', '1024M');
		 
        
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
		$fechaImp = "impresión " . date('d-m-Y h:i:s');
        $mpdf->SetHeader($fechaImp);
        $mpdf->setFooter("Página {PAGENO} de {nb}<br/>Generado por ");
      
	   $sql ="SELECT * FROM `users` WHERE perfil='Medico' and DATE(last_login_time)='2024-06-05' ORDER BY `users`.`last_login_time`";
 $query= $this->db->query($sql);
 $this->data['num_rows']=$query->num_rows();
 $this->data['result']=$query->result();
	  $html = $this->load->view('active_doctors', $this->data, true);
        $mpdf->WriteHTML($html);
     
        $mpdf->Output();
    }









public function patients_record($val){
	$vald=decrypt_url($val);
	 $title = ($vald==0) ? 'Listado de Pacientes Ingresados' : 'Listado de Pacientes Egresados';
	 if($this->PERFIL=='Enfermera'){
		$this->session->set_userdata('USER_CONTROLLER', 'medico');
		$data['perfil'] = $this->session->userdata('user_perfil');
		$data['user_name'] = $this->session->userdata('user_name');
		$data['user_perfil'] = $this->session->userdata('user_perfil');
		 $this->load->view('header-nurse', $data);
	 }else{
	$this->header_user->headerMedico($this->ID_USER);
	 }
		[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->create_forms->getCentroAndSeguroByPerfil(0);

		$value = array(
			'desde' => 0,
			'hasta' => 0,
			'centro' => 0,
			'table_title' => $title,
			'origine'=>$vald,
			'result_centro_medicos' => $result_centro_medicos
		);

	  $data['desde']=$value['desde'];
 $data['hasta']=  $value['hasta'];
  $data['centro']= $value['centro'];
 $data['table_title']= $value['table_title'];
  $data['origine']= $value['origine'];
  //$data['result_centro_medicos']= $value['result_centro_medicos'];
 $data['hosp_pat_created_by']=$this->ID_USER; 
$data['hosp_pat_updated_by']= $this->ID_USER;
$data['hosp_pat_created_time'] = date("Y-m-d H:i:s"); 
$data['hosp_pat_updated_time'] =date("Y-m-d H:i:s");
	
$data['creation_hosp_pat_info'] ='';
		$data['table_insumo']='';
$data['table_insumo_link']='';
$data['id_hospit']=0;
[$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita(0);
$data['filter_by_centro']= $result_centro_medicos_cita;
  	$this->load->view('hospitalization/patient/admitted-check', $data);  

}





  function fetch_patients_hoptalization_data()
 {
  sleep(1);
  $centro = '';
   $patient = '';
   $origine = 0;
  $this->load->library('pagination');
  $config = array();
  $config['base_url'] = '#';
  $config['total_rows'] = $this->Serversidetable->count_all($centro, $origine, $patient);
  $config['per_page'] = 10;
  $config['uri_segment'] = 3;
  $config['use_page_numbers'] = TRUE;
  $config['full_tag_open'] = '<ul class="pagination">';        
    $config['full_tag_close'] = '</ul>';        
    $config['first_link'] = 'Primero';        
    $config['last_link'] = 'Ultimo';        
    $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['first_tag_close'] = '</span></li>';        
    $config['prev_link'] = '&laquo';        
    $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['prev_tag_close'] = '</span></li>';        
    $config['next_link'] = '&raquo';        
    $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['next_tag_close'] = '</span></li>';        
    $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['last_tag_close'] = '</span></li>';        
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';        
    $config['cur_tag_close'] = '</a></li>';        
    $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';        
    $config['num_tag_close'] = '</span></li>';
  $config['num_links'] = 3;
  $this->pagination->initialize($config);
  $page = $this->uri->segment(3);
  $start = ($page - 1) * $config['per_page'];
  $output = array(
   'pagination_link'  => $this->pagination->create_links(),
   'product_list'   => $this->Serversidetable->fetch_data($config["per_page"], $start, $centro, $origine, $patient)
  );
  echo json_encode($output);
 }
 











	public function patient_history_has_been_saved($id_pat,$id_centro){
		$id_patient = $id_pat;
		$data['id_patient'] = $id_patient;
		$data['id_centro'] = $id_centro;
		[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] = $this->get_table_data_by_id->getPatientInfo($id_patient);

$array_values_for_photo_large = array(
			'id_p_a' => $get_patient_info_by_id['id_p_a'],
			'cedula' => $get_patient_info_by_id['cedula'],
			'image_class' => "rounded-circle",
			'style' => "style='width:80px'"

		);


		$data['patient_photo_large'] = $this->search_patient_photo->search_patient($array_values_for_photo_large);
		$data['get_patient_info_by_id'] = $get_patient_info_by_id;
		$patient_age = $this->model_general->calculatePatientAge($get_patient_info_by_id['date_nacer']);
		$data['patient_age'] = $patient_age['age_complete'];
	$this->load->view('clinical-history/history_medical_saved_test', $data);	
	}
	
	public function factura_by_id()
	{
		$this->header_user->headerMedico($this->ID_USER);
		$id = $this->uri->segment(3);
		$identificar = $this->uri->segment(4);
		$this->db->where_in('id_usuario', $this->ID_USER);
		$this->db->delete('tarifarios_temporal');
		$this->ver_factura_by_id($id, $identificar);
	}

	public function ver_factura_by_id($idFac, $ident)
	{
		$data['id'] = $idFac;
		$data['identificar'] = $ident;
		$this->load->view('patient/factura/ver-factura-queries', $data);
	}	
	
	
	
	
	
	
	
	public function test()
	{
	
		$user=$this->db->select('name')->where('id_user',1)->get('users')->row('name');
		echo $user;
		echo "<br/>";
		
		$report=$this->db->select('reporte')->where('id',23)->get('hc_cirugia_reporte')->row('reporte');
		echo $report;
	}
	
	public function patient()
	{
		$id_patient=$this->uri->segment(3);
		$id_apoint=$this->uri->segment(4);
		$id_centro=$this->uri->segment(5);
	$idC=decrypt_url($id_centro);
		
		$this->session->set_userdata('getThisCentro', $idC);
		
		$this->session->set_userdata('CURRENT_PATIENT', $_SERVER['REQUEST_URI']);
		$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
		$id_patient_c=decrypt_url($id_patient); //returns codex
		$get_current_patient= $this->db->select('id_p_a, nombre, cedula')->where('id_p_a', $id_patient_c)->get('patients_appointments')->row_array();
		if($get_current_patient){
		$array_values_for_photo = array(
						'id_p_a' =>$get_current_patient['id_p_a'],
						'cedula' =>$get_current_patient['cedula'],
						'image_class' => "img-fluid img-thumbnail",
						'style'=>'width=30'

						);
						$img = $this->search_patient_photo->search_patient($array_values_for_photo);
		       $current_patient= $img. " ". $get_current_patient['nombre'];
		$this->session->set_userdata('current_patient_name', $current_patient);
		
		$this->header_user->headerMedico($this->ID_USER);
		$id = decrypt_url($id_patient);
		$this->session->set_userdata('id_patient', $id_patient_c);
		// return $this->create_forms->patient_data($id);

		$data['countries'] = $this->model_admin->getCountries();
		$data['provinces'] = $this->model_admin->getProvinces();
		$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
		$data['id_user'] = $this->ID_USER;
		$data['patient'] = $this->model_admin->historial_medical($id);
		$data['idpatient'] = $id;
		$data['id_apoint'] = $id_apoint;
		$data['idC'] = $idC;
	    //$as_medico_centro = $this->db->select('centro_medico')->where('id_doctor', $this->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
		 [$result_centro_medicos_for_cita]= $this->create_forms->getCentroMedicoForCita($idC);
    $data['result_centro_medicos'] = $result_centro_medicos_for_cita;
	[$get_doctor_info_by_id, $doctor_area] = $this->get_table_data_by_id->getDoctorInfo($this->ID_USER);
	 $data['areaTitle'] =$doctor_area;
		$this->load->view('patient/forms/patient-data-form-test', $data);
		$this->load->view('pagination-result');
	}else{
		//redirect('/page404');
			redirect("medico/patient/$id_patient/0/0");
	}
	}
	
 function ms_today_appointments_query($fecha_hoy){

$doc= $this->db->select('id_doctor')->where('id_asdoc',$this->ID_USER)->order_by('id', 'asc')->get('centro_doc_as')->row('id_doctor');


// $doc=$this->db->select('id_doctor')->join('centro_doc_as', 'rendez_vous.doctor = centro_doc_as.id_doctor')->where('id_doctor',$this->ID_USER)->where('filter_date',$fecha_hoy)->order_by('id_doctor', 'asc')->get('rendez_vous')->row('id_doctor');





	$sql ="SELECT * FROM rendez_vous WHERE inserted_by =$this->ID_USER AND filter_date='$fecha_hoy' ";
 $query= $this->db->query($sql);


	return $query;
		
}
	
	 public function citasTableAsistenteMedico(){
     $this->clinical_history = $this->load->database('clinical_history', TRUE);
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
	$desde = $this->input->get("desde");
	$hasta = $this->input->get("hasta");
	$centro1 =intval($this->input->get("centro"));
	
	$fecha_hoy = date("Y-m-d");
	if($centro1==0){
	$query=$this->ms_today_appointments_query($fecha_hoy);
	}else{
		 $values = array(
		 'date1' => $desde,
		 'date2' => $hasta,
		 'doctor' => $this->ID_USER,
		 'centro' => $centro1,
		 'perfil' => $this->PERFIL
		 );
	$query=$this->model_admin->date_range_appointments_query($values);
	}
    $data = [];
    foreach ($query->result() as $row) {
		 $patient=$this->db->select('nombre,photo,id_p_a,edad,nec1,seguro_medico,plan,afiliado, cedula')->where('id_p_a',$row->id_patient)
     ->get('patients_appointments')->row_array();
	 if($patient){
		$seguro_med=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
		$centro=$this->db->select('name, type')->where('id_m_c',$row->centro)->get('medical_centers')->row_array();
		$doctor=$this->db->select('name, area')->where('id_user',$row->doctor)->get('users')->row_array();
		$areaTitle=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');
		if(strpos($areaTitle, "CIRUJANO VASCULAR") !== false){
		$freq="SELECT id_historial FROM h_c_cirujano_vascular WHERE  id_historial=$row->id_patient AND inserted_by=$row->doctor group by inserted_time";
		}else{
		$freq="SELECT historial_id FROM h_c_enfermedad_actual WHERE  historial_id=$row->id_patient AND inserted_by=$row->doctor group by inserted_time";
		}
	  $cita_freq = $this->clinical_history->query($freq);

if($cita_freq->num_rows() == 0){
	$frecuencia_text="<em class='ms-5 badge bg-danger'>$cita_freq->num_rows <i class='bi bi-eye'></i></em>";
}else{
	$frecuencia_text="<em class='ms-5 badge bg-success'>$cita_freq->num_rows <i class='bi bi-eye'></i></em>";
 }
		
		
		
		
	
    // $afiliado = $patient['afiliado'];
		//if($patient['photo']){
		//$img= '<img  class="img-fluid img-thumbnail" width=105 src="'.base_url().'/assets/img/patients-pictures/'.$patient['photo'].'"  />';
		
		//}
		
		
						$array_values_for_photo = array(
						'id_p_a' =>$patient['id_p_a'],
						'cedula' =>$patient['cedula'],
						'image_class' => "img-fluid img-thumbnail",
						'style'=>'width=85'

						);
						$img = $this->search_patient_photo->search_patient($array_values_for_photo);
		
		
		$today = date('Y-m-d');
		
		
		
		$isSeenToday1=$this->clinical_history->select('historial_id')->like('inserted_time',$today)->where('inserted_by',$row->doctor)->where('historial_id',$row->id_patient)->where('centro_medico',$row->centro)->get('h_c_conclusion_diagno')->row('historial_id');
		$isSeenToday2=$this->clinical_history->select('id_patient')->like('inserted_time',$today)->where('id_user',$row->doctor)->where('id_patient',$row->id_patient)->get('h_c_conclusion_diagno_evolution')->row('id_patient');
		
			if($isSeenToday1 || $isSeenToday2){
				$isSeenToday=$isSeenToday1;
				$this->session->set_userdata('SHOW_BTN_SAVE_HIS', 0);
				$seen = '<strong class="text-success" style="font-size:15px"><em><strong class="bi bi-check"></strong></em></strong> ';
			
			}else{
				$isSeenToday='';
				$seen = '';
			
			}
			
			
		if(strpos($areaTitle, "GINECO") !== false){
          $go_to = 'ginecology';
           }elseif($areaTitle=='UROLOGIA'){
			 $go_to = 'urology';  
		   }elseif(strpos($areaTitle, "PEDIATR") !== false){
			 $go_to = 'pediatry';  
		   }elseif($areaTitle=='OFTALMOLOGIA'){
			 $go_to = 'ophthalmology';  
		   }
		   elseif(strpos($areaTitle, "CIRUJANO VASCULAR") !== false){
			 $go_to = 'vascular_surgery';  
		   }
		   elseif(strpos($areaTitle, "CARDIO") !== false){
			 $go_to = 'cardiovascular_evaluation';  
		   }
		   else{
			 $go_to = 'patient_history';  
		   }
		
		if($this->PERFIL =="Asistente Medico" &&  $centro['type']=='privado'){
			$go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."medico/general_history/".encrypt_url($row->id_patient).'/'.encrypt_url($row->doctor).'/'.encrypt_url($row->centro).'/'.encrypt_url($doctor['area']).'" title="Historia Clínica"><i class="bi bi-hospital"></i> Antecedentes Generales</a>';
		}
		
		else{
		$go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."clinical_history/$go_to/".encrypt_url($row->id_apoint).'/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->centro).'/'.encrypt_url($row->doctor).'/'.encrypt_url($doctor['area']).'" title="Historia Clínica"><i class="bi bi-hospital"></i> Historia Clínica</a>';
		}
		//$resumen_hist ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalResumenHist2" title="Resumen de la historial clinica"><i class="bi bi-card-list"></i> Resumen</button>';
		 $desc_qui ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalSurgeryDescription2" title="Descripción Quirúrgica"><i class="bi bi-file-medical"></i> Descripción Quirúrgica</button>';
		$indications_hist ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#indications" title="Indicaciones"><i class="fas fa-prescription"></i> Indicaciones</abutton>';
		$follow_up ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalFollowUp2" title="Dar Seguimiento"><i class="bi bi-fast-forward-circle"></i> Seguimiento</button>';
		$general_report ='<button type="buton" class="dropdown-item" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalReporteGnrl2" title="Reporte general"> <i class="bi bi-card-text"></i> Reporte General</button>';
		$go_to_patient_data ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/patient/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->id_apoint).'/'.encrypt_url($row->centro).'" >'.strtoupper($patient['nombre']).'</a>';
		$patient_documentos ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#patientDocumentos"  title="Documentos del Paciente"><i class="bi bi-archive"></i> Documentos</button>';
		$orden_medica ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalOrdenMedica2"  title="Orden Médica"><i class="bi bi-h-circle"></i> Orden Médica</button>';
		
		
		if($areaTitle=='OFTALMOLOGIA'){
			$refraction ='<li><button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalRefraction" title="Refracción"><i class="bi bi-eye"></i> Refracción</button></li>';
		$desc_qui ='';
		$orden_medica ='';
		$eva_cardio='';	
		}elseif(strpos($areaTitle, "CARDIO") !== false){
		$eva_cardio ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#cardiovasEval"  title="Evaluación Cardiovascular"> <i class="bi bi-heart-pulse"></i> Evaluación Cardiovascular</button>';	
		$refraction ='';
		$desc_qui ='';
		$orden_medica ='';
		
		$follow_up ='';
		}else{
		$eva_cardio='';	
		$refraction ='';
		
		}
		
		
		if($this->PERFIL =="Asistente Medico"){
			$go_doctor_account =strtoupper($doctor['name']);
		}else{
			$go_doctor_account ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/doctor_account/'.$row->doctor.'" >'.strtoupper($doctor['name']).'</a>';
		}
		
		
		if($this->PERFIL =="Asistente Medico" &&  $centro['type']=='publico'){
			$actions ='';
		}else{
			$actions = "<div class='btn-group' style='position:absolute;' >
		<ul class='nav navbar-nav'>
	<li class='dropdown' >

  
   <button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
  $seen
		<ul class='dropdown-menu' >
		<li>$go_to_hist</li>
		$refraction
		$eva_cardio
		<li>$general_report</li>
		<li>$desc_qui</li>
		<li>$orden_medica</li>
		<li>$follow_up </li>
<li>$indications_hist</li>
		<li>$patient_documentos</li>
		
		</ul>
		</li>
		</ul>
		
		</div>
		
		";
		}
		
		
		
		
	 $sub_array = array();
	  $sub_array[] = $img;
	  $sub_array[] = $row->id_patient;
      $sub_array[] = $go_to_patient_data;
	  $sub_array[] = $seguro_med;
	    $sub_array[] = '<a  href="'.site_url().''.$this->USER_CONTROLLER.'/see_medical_center/'.$row->centro.'" >'.$centro['name'].'</a>';
      $sub_array[] = $go_doctor_account. " <em style='font-size:11px'> $areaTitle</em>";
	  $sub_array[] = $isSeenToday1. $isSeenToday2;
	  $sub_array[] = date("d-m-Y", strtotime($row->fecha_propuesta)). " ".$row->hora_de_cita;
	  $sub_array[] = $actions. $frecuencia_text ;
      $data[] = $sub_array;
	}
    }

    $rowesult = array(
      "draw" => $draw,
      "recordsTotal" => $query->num_rows(),
      "recordsFiltered" => $query->num_rows(),
      "data" => $data
    );
    echo json_encode($rowesult);
    exit();
}
 
	
	
	
public function exportCSVbill1(){
$data['users'] = $this->model_admin->Users();
$this->load->view('admin/historial-medical1/show-patient-medica-medT.php', $data);
}

// Export data in CSV format
  public function exportCSVbill(){
   // file name
   $filename = 'users_'.date('Ymd').'.csv';
   header("Content-Description: File Transfer");
   header("Content-Disposition: attachment; filename=$filename");
   header("Content-Type: application/csv; ");

   // get data
   $usersData = $this->model_admin->exportCSVbill();

   // file creation
   $file = fopen('php://output', 'w');

   $header = array("id_user","name","last_name","username", "password","perfil","correo","exequatur","cell_phone","extension","cedula","area","user_ars","insert_date","update_date","status","codigo_seguriad","inserted_by","updated_by","is_log_in","login_time","last_login_time","id_as_m_med", "plazo", "payment_plan", "cuenta_gratis", "link_pago", "link_video_conf", "webs_passvarchar", "affiliated",  "id_p_a", "last_page_visited");
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){
     fputcsv($file,$line);
   }
   $this->db->empty_table('users');
   fclose($file);
   exit;

  }	
	
	
	
	

	
	
	

	
	
	


	
	
	
	
	
	
	
	
	
	

}