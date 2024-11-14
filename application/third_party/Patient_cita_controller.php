<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Patient_cita_controller extends CI_Controller { 
public function __construct()
	{
		parent::__construct();
		$this->load->model('navigation/account_demand_model');
		$this->load->model('model_general');
		$this->load->model('model_admin');
		 $this->load->library('form_validation'); 
		 $this->load->library("create_forms");
		 $this->load->library("search_patient_photo");
		 $this->load->library("user_register_info");
		 $this->ID_USER=$this->session->userdata('user_id');
		 $this->load->library("get_table_data_by_id");
		 $this->USER_CONTROLLER =$this->session->userdata('USER_CONTROLLER');
		  $this->IS_ADMINISTRATIVO=$this->session->userdata('admin_position_centro');
		 $this->ID_PATIENT = $this->session->userdata('ID_PATIENT');
		$this->PERFIL =$this->session->userdata('user_perfil');
	$this->clinical_history = $this->load->database('clinical_history', TRUE);
		  // if($this->session->userdata('is_logged_in')=='')
   // {
    // $this->session->set_flashdata('msg','Please Login to Continue');
    // redirect('login');
//}
		
	}

  function deleteCita()
    {
$data = array(
'cancelar' =>1
 );
$where = array(
	'id_apoint'=> $this->input->post('id')
	);
	
	$this->db->where($where);
	$this->db->update("rendez_vous",$data);
    }

 function showForm()
{

$id_cita=$this->input->post('id_cita');
$data['id_cita']=$id_cita;

if($id_cita ==0){
$data['cita_fecha'] = '';
$data['cita_causa'] = '';
$data['id_patient'] = $this->input->post('id_patient');
if($this->session->userdata('getThisCentro')){
	$centro=$this->session->userdata('getThisCentro');
}else{
$centro = 0;	
}
$cita_doc=0;
$data['dayNumber'] = '';
$data['cita_created_by']=$this->ID_USER; 
$data['cita_updated_by']= $this->ID_USER;
$data['cita_created_time'] = date("Y-m-d H:i:s"); 
$data['cita_updated_time'] =date("Y-m-d H:i:s");

$data['creation_cita_info']='';

}else{
	$citas = $this->model_admin->FindCita($id_cita);
	foreach($citas as $rowc)
$data['cita_causa'] = $rowc->causa;
$centro=$rowc->centro;
$data['cita_fecha'] = $rowc->filter_date;
$cita_doc=$rowc->doctor;
$data['dayNumber'] = $rowc->weekday;
$data['cita_created_by']=$rowc->inserted_by; 
$data['cita_updated_by']= $this->ID_USER;
$data['cita_created_time'] = $rowc->created_time; 
$data['cita_updated_time'] =date("Y-m-d H:i:s");
 $citaINFO=$this->db->select('created_time, update_time, inserted_by, update_by, id_patient')->where('id_apoint',$id_cita)->get('rendez_vous')->row_array();
  $created_by=$this->db->select('name')->where('id_user',$citaINFO['inserted_by'])->get('users')->row('name');
   $updated_by=$this->db->select('name')->where('id_user',$citaINFO['update_by'])->get('users')->row('name');
   
  $insed_time = date("d-m-Y", strtotime($citaINFO['created_time']));
 $upda_time = date("d-m-Y", strtotime($citaINFO['update_time']));

$data['creation_cita_info']= "<div class='alert alert-primary p-1' style='font-size:13px' role='alert'>
			creado por $created_by $insed_time cambiado por $updated_by $upda_time 
			</div>";
	$data['id_patient'] = $citaINFO['id_patient'];
}

 [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers]= $this->create_forms->getCentroAndSeguroByPerfil($centro);
  [$result_centro_medicos_cita]= $this->create_forms->getCentroMedicoForCita($centro);
    $data['result_centro_medicos_cita'] = $result_centro_medicos_cita;
  $data['result_doc_by_centers'] = $result_doc_by_centers;
  
$this->load->view('patient/cita/create-cita-form', $data);
}



 public function loadPatientTable(){
	$this->load->view("patient/cita/load-patient-citas"); 
 }




public function saveNewCita()
{
$filter_date = date("Y-m-d", strtotime($this->input->post('cita-fecha')));
$ifCitaTodayRepeated = $this->db->get_where('rendez_vous',array('id_patient'=>$this->ID_PATIENT, 'doctor'=>$this->input->post('cita-doc'), 'cancelar'=> 0, 'filter_date'=>$filter_date));	
if($ifCitaTodayRepeated->num_rows() == 0)
{	
	
if($this->input->post('cita-causa') =='' || $this->input->post('cita_centro') =='' 
|| $this->input->post('cita-doc') ==''|| $this->input->post('cita-fecha') =='' ){
 $response['status'] =0;
$response['message'] = 'Los campos con <span style="color:red">*</span> son obligatorios!'; 
} 
else{ 
$area=$this->db->select('area')->where('id_user',$this->input->post('cita-doc'))->get('users')->row('area');

 $savedas = array(
'nec'=> 'NEC-'.$this->input->post('id_patient'),
'causa'  => $this->input->post('cita-causa'),
'centro'=> $this->input->post('cita_centro'),
'area' => $area,
'doctor' => $this->input->post('cita-doc'),
'id_patient' =>$this->input->post('id_patient'),
'fecha_propuesta' => $this->input->post('cita-fecha'),
'weekday' => $this->input->post('dayNumber'),
'created_time' => $this->input->post('cita_created_time'), 
'update_time' => $this->input->post('cita_updated_time'), 
'update_by' => $this->input->post('cita_updated_by'),
'inserted_by' =>  $this->input->post('cita_created_by'), 
'filter_date' =>$filter_date,
'confirmada' =>0,
'cancelar' =>0,
'hora_de_cita' =>$this->input->post('hora_de_cita')
 );
if($this->input->post('cita-id')==0){
$id_rdv =$this->model_admin->save_rendevous($savedas);
}else{

$where = array(
	'id_apoint'=> $this->input->post('cita-id')
	);
	
	$this->db->where($where);
	$this->db->update("rendez_vous",$savedas);

}
if($this->db->affected_rows() > 0){
$response['message'] = '¡Cita Realizada!'; 
$response['status'] =  1;
}else{
   $response['status'] =  2;
  $response['message'] = 'lo siento, no se ha guadado!'; 
}
}
}else{
 $response['status'] =  3;
  $response['message'] = '<div class="alert alert-warning">Ya tiene cita programada por '. date("d-m-Y", strtotime($this->input->post('cita-fecha'))). '</div>'; 	
}
echo json_encode($response);
}


public function patient_request(){
$id_apoint=$this->input->post('id_apoint');
$data['id_apoint']=$id_apoint;
$sql ="SELECT id_patient, id, fecha_propuesta, nec,area,doctor,centro,causa FROM rendez_vous WHERE id=$id_apoint";
$query= $this->db->query($sql);
$data['query']=$query;
foreach($query->result() as $rowp)
[$get_patient_info_by_id, $patient_adress, $get_patient_seguro_info_by_id] =$this->get_table_data_by_id->getPatientInfo($rowp->id_patient);
$data['get_patient_info_by_id']=$get_patient_info_by_id;


$array_values_for_photo = array(
'id_p_a' =>$rowp->id_patient,
'cedula' =>$get_patient_info_by_id['cedula'],
'image_class' => "rounded-circle",
'style'=>"style='width:60%'"

);
$patient_photo = $this->search_patient_photo->search_patient($array_values_for_photo);
$data['patient_photo']=$patient_photo;
$data['get_patient_seguro_info_by_id']=$get_patient_seguro_info_by_id;
[$get_centro_info_by_id]=$this->get_table_data_by_id->getCentroInfo($rowp->centro);
$data['get_centro_info_by_id']=$get_centro_info_by_id;
[$get_doctor_info_by_id, $doctor_area]=$this->get_table_data_by_id->getDoctorInfo($rowp->doctor);
$data['get_doctor_info_by_id']=$get_doctor_info_by_id;
$data['doctor_area']=$doctor_area;
$this->load->view('patient/request/patient-request', $data);

}
 
 
 
 public function confirmar_solicitud()
{
/*$iduser=$this->input->post('user-id');
$solitante=$this->input->post('patient');
$centro=$this->input->post('centro');
$docid=$this->input->post('doc-id');
$centroid=$this->input->post('centro-id');
$doctorInfo=$this->db->select('name,correo,cell_phone')->where('id_user',$docid)->get('users')->row_array();
$doctorPrecio=$this->db->select('price')->where('id_doctor',$docid)->get('products')->row('price');
$doctorname=$doctorInfo['name'];
$doctoremail=$doctorInfo['correo'];
$cell_phone=$doctorInfo['cell_phone'];
$solicitante=$this->input->post('solicitante');
$notaDelDoctor=$this->input->post('notaDelDoctor');
$medicoFecha=$this->input->post('fechaPropuesta');
$patientemail=$this->input->post('patient-email');
$area=$this->input->post('doctor-area');*/

$data = array(
'confirmada'=>0,
'fecha_propuesta'=>$this->input->post('fechaPropuesta'),
'filter_date'=>$this->input->post('fechaPropuesta'),
'inserted_by'=>$this->ID_USER,
'update_by'=>$this->ID_USER,
'update_time'=>date("Y-m-d H:i:s"),
'created_time'=>date("Y-m-d H:i:s")
);

$where = array(
  'id' =>$this->input->post('id_apoint')
);

$this->db->where($where);
$this->db->update("rendez_vous",$data);

$solicitante=$this->input->post('solicitante');


//-----add solicitud to cita----------------------
$msg1 = "<div  class='alert alert-success text-center'>La solicitude de cita de <strong>$solicitante</strong> ha sido confirmado.</div>";
$this->session->set_flashdata('appointment_confirmation', $msg1);
/*
$this->session->set_userdata('solitante',$solitante);
$this->session->set_userdata('centro',$centro);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('doctorname',$doctorname);
$this->session->set_userdata('medicoFecha',$medicoFecha);
$this->session->set_userdata('medicoText',$medicoText);
$this->session->set_userdata('patientemail',$patientemail);
$this->session->set_userdata('doctoremail',$doctoremail);
$this->session->set_userdata('cell_phone',$cell_phone);
$this->session->set_userdata('patient_phone',$this->input->post('patient-phone'));
$this->session->set_userdata('link_pago',$this->input->post('link-pago'));
$this->session->set_userdata('centroid',$centroid);
$this->session->set_userdata('link_zoom',$this->input->post('link-zoom'));
$this->session->set_userdata('doctorPrecio',$doctorPrecio);
$this->session->set_userdata('payment_id_aptm',$this->input->post('id_apoint'));

 $this->sendConfirmationToCitaDemand();*/
 if($this->input->post('direction')==1){
redirect($_SERVER['HTTP_REFERER']);
 }else{
 redirect('admin_medico/confirmCitaCorreo');
 }
}
 
 
 
 
 
 
 
 
 
 
  public function patientRequestTable(){
	    $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
	
	    if ($this->PERFIL == 'Medico') {
            $query = $this->db->query("SELECT id_patient, id_apoint AS id, fecha_propuesta, nec FROM rendez_vous WHERE doctor=$this->ID_USER && confirmada=1 ORDER BY id DESC");
        } elseif($this->PERFIL=='Asistente Medico') {
            $query = $this->db->query("SELECT id_patient, id_apoint AS id, fecha_propuesta, nec FROM rendez_vous JOIN doctor_centro_medico on doctor_centro_medico.centro_medico=rendez_vous.centro
                    WHERE id_doctor=$this->ID_USER && confirmada=1 ORDER BY id DESC");
        }else{
				$admin_position_centro=$this->session->userdata['admin_position_centro'];
				if($admin_position_centro){
				$where_centro = "&& centro = $admin_position_centro";
				}else{
				$where_centro = "";

				}
				$query =$this->db->query("SELECT id_patient, id_apoint AS id, fecha_propuesta, nec FROM rendez_vous WHERE  confirmada=1 $where_centro  ORDER BY id DESC");
		}
		$data = [];
		foreach ($query->result() as $row) {
			$see_patient_request ='<button class="btn btn-primary btn-sm"  data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#see_patient_request" title="Ver"><i class="bi bi-eye"></i> Ver</button>';
			
			[$get_patient_info_by_id] =$this->get_table_data_by_id->getPatientInfo($row->id_patient);
			
			 $sub_array = array();
	  $sub_array[] = $row->nec;
      $sub_array[] = $get_patient_info_by_id['nombre'];
	  $sub_array[] = $get_patient_info_by_id['tel_resi'].  $get_patient_info_by_id['tel_cel'];
	  $sub_array[] = $get_patient_info_by_id['email'];
	  $sub_array[] =  $row->fecha_propuesta;
	   $sub_array[] =  $see_patient_request;
      $data[] = $sub_array;
			
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
 
  public function citasPatientTable(){
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));

	$id_doctor = intval($this->input->get("id_doctor"));
	if ($this->PERFIL == "Medico") {
			
			$query = $this->db->query("SELECT *, id_apoint AS id FROM rendez_vous WHERE doctor=$this->ID_USER && id_patient = $this->ID_PATIENT && cancelar = 0 ORDER BY id DESC");

        } elseif($this->PERFIL == 'Asistente Medico') {
            $query = $this->db->query("SELECT *, id_apoint AS id FROM rendez_vous
          INNER JOIN doctor_centro_medico ON rendez_vous.centro=doctor_centro_medico.centro_medico WHERE id_doctor =$this->ID_USER
          && id_patient = $this->ID_PATIENT  && cancelar = 0 ORDER BY id_apoint DESC");

 
        }else{
		if($this->IS_ADMINISTRATIVO){
			$where_centro = "&& centro =$this->IS_ADMINISTRATIVO";
		}else{
		$where_centro = '';	
		}
			$query = $this->db->query("SELECT *, id_apoint AS id FROM rendez_vous WHERE id_patient = $this->ID_PATIENT && cancelar = 0 $where_centro ORDER BY id DESC");
			
		}
	
    $data = [];
		foreach ($query->result() as $row) {
			
		$doctorName=$this->db->select('name')->where('id_user',$row->doctor)->get('users')->row('name');
		$centro=$this->db->select('name, type')->where('id_m_c',$row->centro)->get('medical_centers')->row_array();
      
         $seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('seguro_medico');


		//$insert_date = date("d-m-Y H:i:s", strtotime($row->inserted_time));
		//$update_date = date("d-m-Y H:i:s", strtotime($row->updated_time));

		$crt1=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
		$updt2=$this->db->select('name')->where('id_user',$row->update_by)->get('users')->row('name');
        $area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');

	$is_patient_already_facturado=$this->db->select('id_rdv, idfacc, canceled')->where('id_rdv',$row->id)->get('factura2')->row_array();
			$typ = encrypt_url($centro["type"]);	
			$id_ap= encrypt_url($row->id);	
			$doc= encrypt_url($row->doctor);	
			$cent= encrypt_url($row->centro);
			$seg= encrypt_url($seguro_medico);
		
		$link_to_create_invoice ="$cent/$id_ap/$doc/$seg" ;
	    $this->session->set_userdata('link_to_create_invoice', $link_to_create_invoice);
		
		if(($this->PERFIL=='Medico' && $centro["type"]=='publico') || $centro["type"]=='Salud ocupacional'){
			$facturar="";
			$if_fac_num= '';
		}else{
		
		if($is_patient_already_facturado){
			$if_fac_num= "# ". $is_patient_already_facturado['idfacc']. " <i class='bi bi-cash-coin text-success'></i>";
			$is_billed = "<span><i  class='bi bi-check-all text-success'></i> <i class='bi bi-cash-coin text-success'></i></span>";
			$if_fac= encrypt_url($is_patient_already_facturado['idfacc']);
			if($is_patient_already_facturado['canceled']==0){
			$facturar ='<a target="_blank"  href="'.base_url().''.$this->USER_CONTROLLER.'/factura_by_id/'.$if_fac.'/'.$typ.'/" class="dropdown-item text-success"><i class="bi bi-cash-coin"></i> facturada <i class="bi bi-check-all"></i></a>';
			
			}else{
				$facturar = '<a class="dropdown-item text-danger"><em>Factura # "'.$is_patient_already_facturado['idfacc'].'" esta cancelada</em></a><a target="_blank" href="'.base_url().''.$this->USER_CONTROLLER.'/create_invoice_back/'.$cent.'/'.$id_ap.'/'.$doc.'/'.$seg.'" class="dropdown-item"><i class="bi bi-cash-coin"></i> Volver a Facturar</a>';
			    $is_billed ='';
				$if_fac_num= '';
			}
		}else{
			//if($this->PERFIL !="Admin"){
			$facturar ='<a target="_blank" href="'.base_url().''.$this->USER_CONTROLLER.'/create_invoice/'.$cent.'/'.$id_ap.'/'.$doc.'/'.$seg.'" class="dropdown-item"><i class="bi bi-cash-coin"></i> Facturar</a>';
		   // }else{
				//$facturar='';
			//}
		 $is_billed ='';
		 $if_fac_num= '';
		
		}
		}
		//if($this->PERFIL !="Admin"){
			$button_update ='<a  href="#"  id="'.$row->id.'" class="dropdown-item update-this-cita text-primary"><i class="bi bi-pencil"></i> Editar</a>';
			if(!$is_patient_already_facturado){
			$button_delete ='<a href="#"   id="'.$row->id.'" class="dropdown-item text-danger cancel-this-cita"><i class="bi bi-file-x "></i> Eliminar</a>';
			}else{
			$button_delete='';	
			}
		//}else{
			//$button_update='';
			//$button_delete='';
		//}
$actions = "<div class='btn-group dropstart' >
	  <button type='button' class='btn btn-outline-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
  
		<ul class='dropdown-menu' >
		 <li class='list-group-item'>$facturar </li>
		
     <li>$button_update</li>
	<li>$button_delete</li>

		</ul>
		
		</div>";

 $sub_array = array();
 $sub_array[] = $row->id;
	  $sub_array[] = $centro['name'];
      $sub_array[] = $doctorName;
	  $sub_array[] = $area;
	  $sub_array[] = $row->causa;
	  $sub_array[] = date("d-m-Y", strtotime($row->fecha_propuesta)). " ".$row->hora_de_cita;
	  $sub_array[] = $if_fac_num;
	  $sub_array[] =  $actions;
      $data[] = $sub_array;
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
 
 
 public function edit_cita($id_cita){
  $data = $this->model_admin->FindCita($id_cita);
 //$data = $this->person->get_by_id($id);
        echo json_encode($data);
 
 }
 
   public function seachByDateRange(){
	  $this->load->view('patient/table-appointments');
	  $this->citasTable();
 }
 
  function today_appointments_query($fecha_hoy){
 if ($this->PERFIL == "Medico") {
	$query = $this->db->query("SELECT * FROM rendez_vous WHERE doctor=$this->ID_USER && filter_date='$fecha_hoy' && cancelar = 0 ORDER BY id_apoint DESC");
}
elseif($this->PERFIL=='Asistente Medico'){
			//$query = $this->db->query("SELECT * FROM rendez_vous
          // INNER JOIN doctor_centro_medico ON rendez_vous.centro=doctor_centro_medico.centro_medico WHERE id_doctor =$this->ID_USER
         // && filter_date='$fecha_hoy'  && cancelar = 0 GROUP BY id_patient ORDER BY id_apoint DESC");
		 
		 $query = $this->db->query("SELECT * FROM rendez_vous
           INNER JOIN centro_doc_as ON rendez_vous.doctor=centro_doc_as.id_doctor WHERE id_asdoc =$this->ID_USER
          && filter_date='$fecha_hoy'  && cancelar = 0 GROUP BY id_patient ORDER BY id_apoint DESC");
			
		}

		else{
			
			if($this->IS_ADMINISTRATIVO){
				$query = $this->db->query("SELECT * FROM rendez_vous WHERE filter_date='$fecha_hoy'  && cancelar = 0 && centro=$this->IS_ADMINISTRATIVO ORDER BY id_apoint DESC");
			}else{
			$query = $this->db->query("SELECT * FROM rendez_vous WHERE filter_date='$fecha_hoy'  && cancelar = 0 ORDER BY id_apoint DESC");
			}
			
			
		}
		return $query;
		
}
 
 
 
  public function citasTable(){
	  $this->clinical_history = $this->load->database('clinical_history', TRUE);
     $draw = intval($this->input->get("draw"));
    $start = intval($this->input->get("start"));
    $length = intval($this->input->get("length"));
	$desde = $this->input->get("desde");
	$hasta = $this->input->get("hasta");
	$centro1 =intval($this->input->get("centro"));
	
	$fecha_hoy = date("Y-m-d");
	if($centro1==0){
	$query=$this->today_appointments_query($fecha_hoy);
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
 
 
  function checkIfNumSegExist()
{
$count =  strlen($this->input->post('numero'));
if($count){
$query = $this->db->get_where('saveinput',array('input_name'=>$this->input->post('numero')));
if($query->num_rows() > 0 )
{
$patient_id=$this->db->select('patient_id')->where('input_name',$this->input->post('numero'))->get('saveinput')->row('patient_id');		
	
$msg=encrypt_url($patient_id);
} else{
$msg= 0;	
}
echo json_encode($msg);
	}
}
 
 
}