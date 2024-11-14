<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Utilitaire extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('product');

$this->load->model('excel_import_model');

$this->load->model("padron_model");
$this->load->model("utility");
$this->load->model('navigation/account_demand_model');
$this->perPage = 3;

  $this->load->library("pagination");

}

public function foto_webcam($patient, $user)
	{
	$data['patient'] =$patient;
	$data['user']=$user;
	 $this->load->view('patient/foto_webcam',$data);
	}
	
	
	public function cied_in_use(){
	$sql="SELECT id_user, area, diagno_def FROM `users` 
	JOIN areas
	ON areas.id_ar = users.area 
		JOIN h_c_diagno_def_link
	ON h_c_diagno_def_link.user_id = users.id_user 
	group by area";	
	$query=$this->db->query($sql);
	echo "<table style='width:100%'>
	
	";
	foreach ($query->result() as $row) {
		$area=$this->db->select('title_area')->where('id_ar',$row->area)->get('areas')->row('title_area');
	echo "
	<td style='width:100%'>
	$area,

	</td>
	";	
	}
	echo "</table>";
	}
	
	
	
public function ver_header($id_doc){
echo "<style>	
.img-content {
   
    width: 700px;
	margin:auto
	
  }
 .center-img {
 max-width: 100%;
    max-height: 100%;
 
  }
</style>";	
	
	
	
$logo_tipo=$this->db->select('sello')->where('doc',$id_doc)->where('dist',1)->get('doctor_sello')->row('sello');

$doc_log_tipo= '<div class="img-content">
<img  class="center-img" src="'.base_url().'/assets/update/'.$logo_tipo.'"  />
 </div>';	
echo $doc_log_tipo;
echo "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
aliquip ex ea commodo consequat.
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
sunt in culpa qui officia deserunt mollit anim id est laborum.

Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>";
}





	
public function medico_reporte(){
/*$countTotalCitaDoc=$this->model_admin->countTotalCitaDoc();
$data['countTotalCitaDoc']=$countTotalCitaDoc;
$countTotalCitaDoc1=count($countTotalCitaDoc);
$data['countTotalCitaDocNum']="$countTotalCitaDoc1 medico(s)";*/
$this->load->view('utilitaire');
	
}

public function test_web_service(){
	

$this->load->view('test_web_service');
	
}



public function data_web_service(){
	

$this->load->view('data-from-we-service');
	
}

public function upload_image(){
$this->load->view('tiny-mce');	

//$this->load->view('upload_image');
	
}


public function listFolders(){

  $file_name =  $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  $file_up_name = time().$file_name;
  
   $file = './assets/img/patients-folder/'.$file_up_name;
  
  
  
  move_uploaded_file($tmp_name, $file.$file_up_name);

}

public function dotorselect(){
$data['docName']="";
$data['doctorId']="";
$data['seguroId']= "";
$this->load->view('doctorselect',$data);

}

public function add_patient($paciente,$centro_medico,$medico,$seguro_medico,$filter_date,$inserted_by){
$id_pat=$this->db->select('id_p_a')->where('id_p_a',$paciente)->get('patients_appointments')->row('id_p_a');
if(!$id_pat){
$save = array(
'id_p_a'=>$paciente,
'nec1'=>'NEC-'.$paciente,
'seguro_medico'=>$seguro_medico,
'inserted_by'=>$inserted_by,
'insert_date'=>$filter_date,
'updated_by'=>$inserted_by,
'update_date'=>$filter_date
);
$this->db->insert("patients_appointments",$save);
}

redirect("admin/patient/$paciente/$centro_medico/$medico");

	
}



public function patientsList(){
$data['doctorId']= $this->input->post('doctor');
$data['seguroId']= $this->input->post('seguro');
$this->load->view('doctorselect', $data);

$doctor= $this->input->post('doctor');
$seguro= $this->input->post('seguro');

$sqlt ="SELECT medico, centro_medico, seguro_medico, paciente, numfac, filter_date, numauto, inserted_by, inserted_time FROM factura2 WHERE NOT EXISTS (SELECT id_p_a  FROM patients_appointments WHERE factura2.paciente = patients_appointments.id_p_a)  AND medico=$doctor AND seguro_medico=$seguro GROUP BY paciente ORDER BY paciente DESC";

$queryt= $this->db->query($sqlt);

$data['query2'] = $queryt;

$this->load->view('patients-list', $data);

}





public function edit_patient_cita($id_patient, $centro, $doctor){


$seguro= $this->db->select('seguro')->where('pat_id',$id_patient)->get('factura')->row('seguro');
if($seguro){
$data['doctorId']= $doctor;
$data['seguroId']= $seguro;
$this->load->view('doctorselect', $data);

$sqlt ="SELECT medico, centro_medico, seguro_medico, paciente, numfac, filter_date, numauto, inserted_by, inserted_time FROM factura2 WHERE NOT EXISTS (SELECT id_p_a  FROM patients_appointments WHERE factura2.paciente = patients_appointments.id_p_a)  AND paciente=$id_patient GROUP BY paciente ORDER BY paciente DESC";

$queryt= $this->db->query($sqlt);

$data['query2'] = $queryt;
$this->load->view('patients-list', $data);	
}else{
	echo 'No se ha hecho factura por este paciente, no lo podemos rastrear';
}

}
public function index(){

$id_user=67;
$data['id_user']=$id_user;
$data['perfil']="Medico";
$data['name']=$this->session->userdata['medico_id'];
if($this->session->userdata['medico_perfil']=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
$data['seguro_medico'] = $this->model_admin->view_doctor_seguro($id_user);
$centro_num=$this->db->select('type')->join('doctor_agenda_test', 'doctor_agenda_test.id_centro = medical_centers.id_m_c')->where('id_doctor',$id_user)->group_by('id_centro')->get('medical_centers');
}else{
$centro_num=$this->db->select('id_m_c,type')->join('doctor_centro_medico', 'doctor_centro_medico.centro_medico = medical_centers.id_m_c')->where('id_doctor',$id_user)->group_by('centro_medico')->get('medical_centers');
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$data['seguro_medico'] = $this->model_admin->view_doctor_seguro_as($as_medico_centro);
}

$data['nec'] = $this->model_admin->getNec();
$data['countries'] = $this->model_admin->getCountries();

$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$data['is_admin']="no";

//-----------EMERGENCIA----------------------------------

$sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
$data['queryc']= $this->db->query($sqlc);


$sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
$data['queryrp']= $this->db->query($sqlrp);

$sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
$data['queryml']= $this->db->query($sqlml);


$sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
$data['queryep']= $this->db->query($sqlep);

$area_id= $this->db->select('area')->where('id_user',$this->session->userdata['medico_id'])->get('users')->row('area');

$this->load->view('medico/header',$data);
$data['controllerUser']='medico';


 $this->load->view('utilitaire');


}

 public function import_employees()
{

if(isset($_FILES["file"]["name"]))
{
$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$clock = $worksheet->getCellByColumnAndRow(0, $row)->getValue();

$num_clocks = $this->db->get_where('employees_',array('clock'=>$clock));
$num = $num_clocks->num_rows();
echo "$num - ($clock) <br/>" ;
if($num_clocks->num_rows() == 0)
	{
$name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$social_number = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$birth_date="";
if($worksheet->getCellByColumnAndRow(4, $row)->getValue()!==NULL){
$birth_date = $worksheet->getCellByColumnAndRow(4, $row)->getValue();	
}

$date_sen ="";
if($worksheet->getCellByColumnAndRow(5, $row)->getValue()!==NULL){
$date_sen = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
}
$terminated_date ="";
if($worksheet->getCellByColumnAndRow(6, $row)->getValue()!==NULL){
$terminated_date = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
}
$term_reason = $worksheet->getCellByColumnAndRow(7, $row)->getValue();

$status = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
 $job_code = $worksheet->getCellByColumnAndRow(9, $row)->getValue();

$job_desc = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

$title = $worksheet->getCellByColumnAndRow(11, $row)->getValue();

$depart = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
$gbl_shift = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
$super_clock = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
$super_name = $worksheet->getCellByColumnAndRow(15, $row)->getValue();

$gbl_cost = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
$dr_pr_dept = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
$department_num = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
$national_id = $worksheet->getCellByColumnAndRow(19, $row)->getValue();


$birth_date_ = ($birth_date - 25569) * 86400;
$birth_date = 25569 + ($birth_date_ / 86400);
$birth_date_ = ($birth_date - 25569) * 86400;
$birth_date11= gmdate("Y-m-d", $birth_date_);


$date_sen_ = ($date_sen - 25569) * 86400;
$date_sen = 25569 + ($date_sen_ / 86400);
$date_sen_ = ($date_sen - 25569) * 86400;
$date_senior= gmdate("Y-m-d", $date_sen_);


$terminated_date_ = ($terminated_date - 25569) * 86400;
$terminated_date = 25569 + ($terminated_date_ / 86400);
$terminated_date_ = ($terminated_date - 25569) * 86400;
$term_date= gmdate("Y-m-d", $terminated_date_);


$data[] = array(
'clock'=>$clock,
'employee_name'=>$name,
'social_num'=>$social_number,
'gender'=>$gender,
'birth_date'=>$birth_date11,
'date_sen'=>$date_senior,
'terminated_date'=>$term_date,
'term_reason'=>$term_reason,
'status'=>$status,
'job_code'=>$job_code,
'job_desc'=>$job_desc,
'title'=>$title,
'depart'=>$depart,
'gbl_shift'=>$gbl_shift,
'super_clock'=>$super_clock,
'super_name'=>$super_name,
'gbl_cost'=>$gbl_cost,
'dr_pr_dept'=>$dr_pr_dept,
'department_num'=>$department_num,
'national_id'=>$national_id,
'inserted_by'=>$this->input->post('creaded_by'),
'updated_by'=>$this->input->post('creaded_by'),
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$this->input->post('centro')
);
}
}
}
$this->excel_import_model->insertEmployees($data);


}

}

public function test(){
	
	echo encrypt_url(104);
	
}

	public function historial_medical()
	{
   $data['perfil']="Medico";
   $queryHist = $this->db->get_where('h_c_sinopsis',array(
'historial_id'=>decrypt_url($this->uri->segment(3)),
'inserted_by'=> 1,
'filter_date'=>date('Y-m-d')
));

   $this->load->view('admin/historial-medical1/view-historial-clinica_old',$data);

	}

public function cosposcopia()
	{
		$this->load->view('prueba');
	}

	public function patient_data($idpatient,$id_cm,$doc)
	{
	
	$perfil='Medico';
	$data['perfil']=$perfil;
	$data['name']='Doctor Junior';
	$id_user=5;
	$data['id_cm'] =$id_cm;
	$data['doc'] =$doc;
	$data['nec'] = $this->model_admin->getNec();
	$data['idpatient']=$idpatient;
	$data['id_user']=$id_user;
	$data['area']= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$data['countries'] = $this->model_admin->getCountries();
	$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
	$data['municipios'] = $this->model_admin->getTownships();
	$data['provinces']=$this->model_admin->getProvinces();
	$data['patient'] = $this->model_admin->historial_medical($idpatient);
	
	$search_rdv_doc = array(
	  'id_patient'  => $idpatient,
	  'doctor'  =>$id_user
	  );
	
	  $search_rdv_as_doc = array(
	  'id_patient'  => $idpatient,
	  'centro'  =>$this->uri->segment(4),
	  'doctor'  =>$this->uri->segment(5)
	  );
	
	  $query = $this->model_admin->RendezVousDoc($search_rdv_doc);
	  $data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
	  
	
	
	$data['patid']=$idpatient;
	$ctutor=$this->model_admin->CountTutor($idpatient);
	$data['ctutor']=$ctutor;
	$data['tutor']=$this->model_admin->getTutor($idpatient);
	$data['rendez_vous']=$query;
	$data['number_cita']=count($query);
	$data['nueva_cita']="";
	$data['is_admin']="no";
	$data['controller']='medico';
	$this->load->view('medico/header', $data);
	$data['is_historial']=$this->model_admin->countAnte1($idpatient);
	
	$count_emergency_patient_doc= $this->model_emergencia->count_emergency_patient_doc($idpatient,$this->uri->segment(4));
	$data['patient_admitas']=$count_emergency_patient_doc;
	
	
	$data['number_patient_admitas']=count($count_emergency_patient_doc);
	
	
	$this->load->view('admin/pacientes-citas/patient', $data);
	$this->load->view('footer');
	 $this->load->view('admin/pacientes-citas/footer_patient_search');
	$this->load->view('medico/pacientes-citas/cita-footer');
	}

/*
public function new_hist()
	{
		$this->load->view('NiceAdmin/index');
	}

public function pediatrico()
	{
		$this->load->view('NiceAdmin/index-pedia');
	}
public function urology()
	{
		$this->load->view('NiceAdmin/index-urology');
	}
	
	public function ginecology()
	{
		$this->load->view('NiceAdmin/index-ginecology');
	}*/
public function testing_centro()
	{
		
/*$sqlpl ="SELECT id_centro AS centro_medico FROM `doctor_agenda_test`
 JOIN medico_citas_linked_centers ON doctor_agenda_test.id_doctor = medico_citas_linked_centers.current_doctor
 WHERE id_doctor=372
 GROUP BY id_centro
 ";
$query = $this->db->query($sqlpl);*/
$query = $this->model_admin->report_bill_by_date_centro_linked(372);		
echo'<select class="form-control select2" name="plan" id="plan">';
foreach($query as $row)
{
    $centro= $this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
echo "<option value='$row->centro_medico'>$centro</option>";
}
echo'</select>';

}


public function pacientes_por_provincias()
{

 $config = array();
 $config["base_url"] = base_url() . "utilitaire/pacientes_por_provincias";

$counts = $this->utility->total_pacientes_por_provincias();
$totalrows = count($counts);

$config['full_tag_open']    = "<ul class='pagination'>";
       $config['full_tag_close']   = "</ul>";
       $config['num_tag_open']     = '<li>';
       $config['num_tag_close']    = '</li>';
       $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
       $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
       $config['next_tag_open']    = "<li>";
       $config['next_tagl_close']  = "</li>";
       $config['prev_tag_open']    = "<li>";
       $config['prev_tagl_close']  = "</li>";
       $config['first_tag_open']   = "<li>";
       $config['first_tagl_close'] = "</li>";
       $config['last_tag_open']    = "<li>";
       $config['last_tagl_close']  = "</li>";
       $config['first_link'] = 'Primero';
       $config['last_link'] = 'Último';
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config["total_rows"] = $totalrows;
        $this->pagination->initialize($config);

		
		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
		
        $data["links"] = $this->pagination->create_links();
 $data["total_rows"] = $totalrows;
      $data['patients'] = $this->utility->pacientes_por_provincias($config["per_page"], $page);

$this->load->view('utilitaire/patients-provinces',$data);


}

	/*public function clinical_history_cardiovascular_evaluation()
		{
			$patient=6;
			$data['signo_data'] = 0;
			 $data['hab_tox_data'] = 0;
			 $data['ant_p_f_data'] = 0;
			  $data['v_at_data'] = 0;
			        $data['hide_ex_fis_mamas']="style='display:none'";
			$query_ex = $this->db->query("SELECT * FROM h_c_examen_fisico WHERE historial_id=$patient");
			$data['ex_fis_totals'] = $query_ex->num_rows();
			$data['ex_fis_data'] = 0;
			$data['query_ex_fis'] = $query_ex->result();
		$this->load->view('clinical-history/cardiovascular-evaluation/index', $data); 
		$this->load->view('clinical-history/vital-signals/footer', $data);
		}*/


}