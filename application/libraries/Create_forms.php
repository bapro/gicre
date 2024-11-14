<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_forms {
	protected $CI;

 public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				
					    $this->NEC_PRO =$this->CI->session->userdata('NEC_PRO');
						$this->PERFIL =$this->CI->session->userdata('user_perfil');
						$this->ID_USER =$this->CI->session->userdata('user_id');
						$this->USER_NAME =$this->CI->session->userdata('user_name');
						$this->IS_ADMINISTRATIVO =$this->CI->session->userdata('admin_position_centro');
						$this->CI->load->model('model_admin');
						$this->CI->load->model('navigation/account_demand_model');
						$this->controller = $this->CI->session->userdata('USER_CONTROLLER');
						$this->CI->padron_database = $this->CI->load->database('padron',TRUE);
						if($this->CI->session->userdata('is_logged_in')=='')
						{
						$this->CI->session->set_flashdata('msg','Please Login to Continue');
						redirect('login');
						}
        }

public function user_header(){
$this->CI->load->view('header');
}


 public function search_patient_form()
        {
			$nombres =$this->CI->input->get('patient-nombres');
			$apellidos = $this->CI->input->get('patient-apellidos');
			$apellidos2 = $this->CI->input->get('patient-apellidos2');
           //$selectSearchType = $this->CI->input->get('selectSearchType');
		   $selectSearchType = 'gicre';
		   $data['controller'] =$this->controller;
		   	$data['nombres'] =$nombres;
			$data['apellidos'] = $apellidos;
			$data['apellidos2'] = $apellidos2;
            if($selectSearchType=='padron'){		   
				
			$this->CI->load->view("patient/search/result", $data); 
			}else{
				$this->CI->load->view("patient/search/result-in-gicre", $data); 
			}
		}




       
		
		
		  public function create_patient_form()
        {
		
		$data['provinces']=$this->CI->model_admin->getProvinces();	
			$data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		$data['countries'] = $this->CI->model_admin->getCountries();
		
		  $this->CI->load->view('patient/forms/create-patient-form', $data);
        }
		
		
		  public function create_invoice_ncf_form()
        {
		
	$data['admin_position_c']=$this->IS_ADMINISTRATIVO;
	$data['option']="";
	$sql1 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date";
    $data['query1'] = $this->CI->db->query($sql1);
	$sql2 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date ORDER BY filter_date DESC";
    $data['query2'] = $this->CI->db->query($sql2);
    $data['is_admin']="yes";
	$data['perfil']=$this->PERFIL;
	$data['name']=$this->ID_USER ;
	$data['date_range1']=$this->CI->model_admin->date_range1();
	 /*if ($this->PERFIL == "Medico") {
            $where = "WHERE seguro_medico !=11 AND medico=$this->ID_USER";
            $data['option'] = "<option value='$this->ID_USER'>$this->USER_NAME</option>";
            $data['where_report'] = "where medico=$this->ID_USER";
        } else {
            $data['where_report'] = "where inserted_by=$this->ID_USER";
            $data['option'] = "";
            $where = "JOIN doctor_centro_medico ON doctor_centro_medico.centro_medico=factura2.centro_medico WHERE seguro_medico !=11  AND id_doctor=$this->ID_USER";
        }*/
			[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->getCentroAndSeguroByPerfil(0);
			 $data['result_doctors'] =$result_doctors;
	$this->CI->load->view('factura-con-ncf/index', $data);
        }
		
		
		
			  public function create_invoice_ncf_form_test()
        {
		
	$data['admin_position_c']=$this->IS_ADMINISTRATIVO;
	$data['option']="";
	$sql1 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date";
    $data['query1'] = $this->CI->db->query($sql1);
	$sql2 ="SELECT filter_date FROM factura2 WHERE seguro_medico !=11 GROUP BY filter_date ORDER BY filter_date DESC";
    $data['query2'] = $this->CI->db->query($sql2);
    $data['is_admin']="yes";
	$data['perfil']=$this->PERFIL;
	$data['name']=$this->ID_USER ;
	$data['date_range1']=$this->CI->model_admin->date_range1();
	 /*if ($this->PERFIL == "Medico") {
            $where = "WHERE seguro_medico !=11 AND medico=$this->ID_USER";
            $data['option'] = "<option value='$this->ID_USER'>$this->USER_NAME</option>";
            $data['where_report'] = "where medico=$this->ID_USER";
        } else {
            $data['where_report'] = "where inserted_by=$this->ID_USER";
            $data['option'] = "";
            $where = "JOIN doctor_centro_medico ON doctor_centro_medico.centro_medico=factura2.centro_medico WHERE seguro_medico !=11  AND id_doctor=$this->ID_USER";
        }*/
			[$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors] = $this->getCentroAndSeguroByPerfil(0);
			 $data['result_doctors'] =$result_doctors;
	$this->CI->load->view('factura-con-ncf/index-test', $data);
        }
		
		
		
		 public function patient_data($idpatient)
        {
			$data['countries'] = $this->CI->model_admin->getCountries();
			$data['provinces']=$this->CI->model_admin->getProvinces();	
			$data['seguro_medico'] = $this->CI->account_demand_model->getSeguroMedico();
		
			$this->user_header();
			$data['patient'] = $this->CI->model_admin->historial_medical($idpatient);
			$data['idpatient'] = $idpatient;
			$this->CI->load->view('patient/forms/patient-data-form', $data);
			 $this->CI->load->view('pagination-result');
		}
		
public function getCentroAndSeguroByPerfil($id){
if ($this->PERFIL == "Medico") {
$centro_medicos = $this->CI->model_admin->view_doctor_centro($this->ID_USER); 
$seguro_medicos = $this->CI->model_admin->view_doctor_seguro($this->ID_USER);

$query= $this->CI->db->query("SELECT id_user, name FROM users WHERE id_user =$this->ID_USER group by name");
$doctors = $query->result();

} elseif($this->PERFIL == "Asistente Medico" || $this->PERFIL == "Enfermera") {
$centro_medicos = $this->CI->model_admin->view_as_doctor_centro($this->ID_USER);
$as_medico_centro = $this->CI->db->select('centro_medico')->where('id_doctor', $this->ID_USER)->get('doctor_centro_medico')->row('centro_medico');
$seguro_medicos = $this->CI->model_admin->view_doctor_seguro_as($as_medico_centro);

$query= $this->CI->db->query("SELECT id_user, name FROM centro_doc_as INNER JOIN users ON centro_doc_as.id_doctor=users.id_user WHERE id_asdoc =$this->ID_USER group by id_doctor ORDER BY name DESC");
$doctors = $query->result();


} else{
$data['countries'] = $this->CI->model_admin->getCountries();
$seguro_medicos = $this->CI->account_demand_model->getSeguroMedico();

$admin_position_centro=$this->CI->session->userdata['admin_position_centro'];

if($admin_position_centro){
$where_centro = "&& centro = $admin_position_centro";
$querycentro = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');

}

$centro_medicos = $querycentro->result();	

$query= $this->CI->db->query("SELECT id_user, name FROM users  group by name ORDER BY name DESC");
$doctors = $query->result();


}	

//$result_centro_medicos = '<select id="centro_medico" name="centro_medico" class="form-select form-select2">';
$result_centro_medicos = '';
$result_centro_medicos.= "<option value=''></option>";
foreach($centro_medicos as $row) {
	if($id== $row->id_m_c){
    $result_centro_medicos .= '<option value="' . $row->id_m_c .'" selected>' . $row->name . '</option>';
	}else{
	 $result_centro_medicos .= '<option value="' . $row->id_m_c .'" >' . $row->name . '</option>';	
	}
}
//$result_centro_medicos .= '</select>';

//$result_seguro_medicos = '<select id="seguro_medico_list" name="seguro_medico_list" class="form-select form-select2">';
$result_seguro_medicos='';
$result_seguro_medicos.= "<option></option>";
foreach($seguro_medicos as $row) {
    $result_seguro_medicos .= '<option value="' . $row->id_sm .'" >' . $row->title . '</option>';
}
//$result_seguro_medicos .= '</select>';


$query_doc_by_center = $this->CI->db->query("SELECT id_user, name FROM users
	JOIN doctor_agenda_test on users.id_user=doctor_agenda_test.id_doctor
	WHERE id_centro=$id GROUP BY id_doctor");
$doc_by_centers = $query_doc_by_center->result();




$result_doc_by_centers = '';
foreach($doc_by_centers as $row) {
	if($id== $row->id_user){
    $result_doc_by_centers .= '<option value="' . $row->id_user .'" selected>' . $row->name . '</option>';
	}else{
	 $result_doc_by_centers .= '<option value="' . $row->id_user .'" >' . $row->name . '</option><option ></option>';	
	}
}



$result_doctors = '';
$result_doctors = '<option></option>';
foreach($doctors as $row) {
	
	 $result_doctors .= '<option value="' . $row->id_user .'" >' . $row->name . '</option>';	
	
}



return [$result_centro_medicos, $result_seguro_medicos, $result_doc_by_centers, $result_doctors];


}

function doctor_seguro($id_doct){
	$seguro_medicos = $this->CI->model_admin->view_doctor_seguro($id_doct);
$result_seguro_medicos_no_select='';
foreach($seguro_medicos as $rows) {
	
	$codigo_contrado = $this->CI->db->select('codigo')->where('id_seguro', $rows->id_sm)->where('id_doctor', $id_doct)->get('codigo_contrato')->row('codigo');
	if($codigo_contrado){
	$show ='<em><u>Codigo Contrato: <span class="badge bg-primary rounded-pill"> '.$codigo_contrado.'</span></u></em>';
	}else{
	$show='';	
	}
    $result_seguro_medicos_no_select .= '<li class="list-group-item" id="' . $rows->id_sm .'" >' . $rows->title . ' '.$show.' </li>';
}
return $result_seguro_medicos_no_select;
}


public function getCentroMedicoForCita($id){
if ($this->PERFIL == "Medico") {
$centro_medicos = $this->CI->model_admin->view_doctor_centro_cita($this->ID_USER); 

} elseif($this->PERFIL == "Asistente Medico" || $this->PERFIL == "Enfermera" || $this->PERFIL == "Auditoria Medico") {
$centro_medicos = $this->CI->model_admin->view_as_doctor_centro($this->ID_USER);

} else{

$admin_position_centro=$this->CI->session->userdata['admin_position_centro'];

if($admin_position_centro){
$where_centro = "&& centro = $admin_position_centro";
$querycentro = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro AND activate=0");
}else{
$where_centro = "";
$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers WHERE activate=0');

}
//$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');
$centro_medicos = $querycentro->result();	   


}	


$result_centro_medicos_for_cita = '';
$result_centro_medicos_for_cita = '<option value=""></option>';
foreach($centro_medicos as $row) {
	if($id== $row->id_m_c){
    $result_centro_medicos_for_cita .= '<option value="' . $row->id_m_c .'" selected>' . $row->name . '</option>';
	}else{
	 $result_centro_medicos_for_cita .= '<option value="' . $row->id_m_c .'" >' . $row->name . '</option>';	
	}
}




return [$result_centro_medicos_for_cita];


}


public function getCentroMedicoForCitaS($id){
if ($this->PERFIL == "Medico") {
$centro_medicos = $this->CI->model_admin->view_doctor_centro_cita($this->ID_USER); 

} elseif($this->PERFIL == "Asistente Medico" || $this->PERFIL == "Enfermera") {
$centro_medicos = $this->CI->model_admin->view_as_doctor_centro($this->ID_USER);

} else{

$admin_position_centro=$this->CI->session->userdata['admin_position_centro'];

if($admin_position_centro){
$where_centro = "&& centro = $admin_position_centro";
$querycentro = $this->CI->db->query("SELECT id_m_c, name FROM medical_centers WHERE id_m_c=$admin_position_centro");
}else{
$where_centro = "";
$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');

}
//$querycentro = $this->CI->db->query('SELECT id_m_c, name FROM medical_centers');
$centro_medicos = $querycentro->result();	   


}	


$result_centro_medicos_for_cita = '';
foreach($centro_medicos as $row) {
	if($id== $row->id_m_c){
    $result_centro_medicos_for_cita .= '<option value="' . $row->id_m_c .'" selected>' . $row->name . '</option>';
	}else{
	 $result_centro_medicos_for_cita .= '<option value="' . $row->id_m_c .'" >' . $row->name . '</option>';	
	}
}




return [$result_centro_medicos_for_cita];


}

function upload_tariff_form($doctor_ct, $seguro_ct, $tarif_plan_ct, $centro_med)
{
//$this->load->view('header');
$data['doctor_ct'] =$doctor_ct;
$seguro_name=$this->CI->db->select('title')->where('id_sm',$seguro_ct)->get('seguro_medico')->row('title');
$area_id=$this->CI->db->select('area')->where('id_user',$doctor_ct)->get('users')->row('area');
$area=$this->CI->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');
$data['doctor_name'] =$this->CI->db->select('name')->where('id_user',$doctor_ct)->get('users')->row('name');
 $data['area_id'] =$area_id;
 $data['area'] =$area;
 $data['seguro_name'] =$seguro_name;
  $data['seguro_ct'] =$seguro_ct;
 if($seguro_ct ==11){
	 $plan=$this->CI->db->select('name')->where('id_m_c',$centro_med)->get('medical_centers')->row('name');	
       $label = "Centro Medico";
	   $plan_id=$centro_med;
 }else{
  $plan=$this->CI->db->select('name')->where('id',$tarif_plan_ct)->get('seguro_plan')->row('name');
   $label = "Plan";
    $plan_id=$tarif_plan_ct;
 }
  $sql = "SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$doctor_ct";
   $data['query'] = $this->CI->db->query($sql);
  $data['label'] =$label;
  $data['plan_name'] =$plan;
    $data['plan_id'] =$plan_id;

$this->CI->load->view('tarifario/upload',$data);
}


 public function upload_center_tariffs($centro,$seguro, $where_to_go_centro) {

  $data['centro_name']=$this->CI->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name');	
	  $data['centro'] = $centro;
	  $data['seguroTitle']=$this->CI->db->select('title')->where('id_sm',$seguro)->get('seguro_medico')->row('title');
	  $data['seguroId'] = $seguro;
	  $data['where_to_go_centro'] = $where_to_go_centro;
		 $data['controller'] =$this->CI->session->userdata('USER_CONTROLLER');
		$this->CI->load->view('tarifario/centro/upload',$data);
		
 }


	

}
				
