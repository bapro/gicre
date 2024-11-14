<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zona_franca extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('excel_import_model');
$this->load->library('excel');
$this->load->model('model_admin');
$this->load->model('report');
}


public function checkClock(){
$query1 = $this->db->get_where('employees',array('clock'=>$this->input->post('clock')));
		if($query1->num_rows() == 1)
	{
		echo "<script>$('#clockValue').val('');</script>";
		echo "<em style='color:red'>numero existe ya.</em>";
	}else{
		echo "";
	}
}




public function employee_data(){
$this->session->set_userdata('id_patient', $this->input->get('id_patient'));
$this->session->set_userdata('centro', $this->input->get('centro'));
$this->session->set_userdata('id_user', $this->input->get('id_user'));	
//search if id employee is found in employee_birthdate table to update the patient id
$search = $this->db->get_where('employee_birthdate',array('id_employee'=>$this->input->get('id')));
		if($search->num_rows() == 1)
	{

	$where= array(
	'id_employee' =>$this->input->get('id')  
	);	

	$update = array(
	'id_p_a'=> $this->input->get('id_patient')
	);


	$this->db->where($where);
	$this->db->update("employee_birthdate",$update);
	}


$rows=$this->db->select('employee_name,gender,national_id,centro,id,id_p_a')->where('id_p_a',$this->input->get('id_patient'))->get('employees')->row_array();

$id_patient=$this->db->select('id_p_a')->where('id_p_a',$this->input->get('id_patient'))->get('patients_appointments')->row('id_p_a');
if(!$id_patient){
if($rows['gender']=='M'){
	$sexo='Masculino';
}else{
	$sexo='Femenina';
}
$save = array(
'id_p_a'=> $rows['id_p_a'],
'nombre'=> $rows['employee_name'],
'sexo'=>$sexo,
'cedula'=> $rows['national_id'],
'seguro_medico'=>11,
'inserted_by'=> $this->input->get('id_user'),
'insert_date'=>date("Y-m-d H:i:s"),
'updated_by'=> $this->input->get('id_user'),
'update_date'=>date("Y-m-d H:i:s"),
'filter_date'=>date("Y-m-d"),
);

$this->db->insert("patients_appointments",$save);	
}
redirect("medico/employee_data_");

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

$num_clocks = $this->db->get_where('employees',array('clock'=>$clock));
if($num_clocks->num_rows() == 0)
	{
$name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$social_number = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$gender = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$birth_date="";
if($worksheet->getCellByColumnAndRow(4, $row)->getValue()!==NULL){
$birth_date = $worksheet->getCellByColumnAndRow(4, $row)->getValue();	
}
$birth_date2 ="";
if($worksheet->getCellByColumnAndRow(5, $row)->getValue()!==NULL){
$birth_date2 = $worksheet->getCellByColumnAndRow(5, $row)->getValue();	
}
$date_sen ="";
if($worksheet->getCellByColumnAndRow(6, $row)->getValue()!==NULL){
$date_sen = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
}
$terminated_date ="";
if($worksheet->getCellByColumnAndRow(7, $row)->getValue()!==NULL){
$terminated_date = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
}
$term_reason = $worksheet->getCellByColumnAndRow(8, $row)->getValue();

$status = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
 $job_code = $worksheet->getCellByColumnAndRow(10, $row)->getValue();

$job_desc = $worksheet->getCellByColumnAndRow(11, $row)->getValue();

$title = $worksheet->getCellByColumnAndRow(12, $row)->getValue();

$depart = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
$gbl_shift = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
$super_clock = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
$super_name = $worksheet->getCellByColumnAndRow(16, $row)->getValue();

$gbl_cost = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
$dr_pr_dept = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
$department_num = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
$national_id = $worksheet->getCellByColumnAndRow(20, $row)->getValue();


$birth_date_ = ($birth_date - 25569) * 86400;
$birth_date = 25569 + ($birth_date_ / 86400);
$birth_date_ = ($birth_date - 25569) * 86400;
$birth_date11= gmdate("Y-m-d", $birth_date_);


$birth_date2_ = ($birth_date2 - 25569) * 86400;
$birth_date2 = 25569 + ($birth_date2_ / 86400);
$birth_date2_ = ($birth_date2 - 25569) * 86400;
$birth_date22= gmdate("Y-m-d", $birth_date2_);


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
'birth_date2'=>$birth_date22,
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


public function header_user(){

$data['name']=$this->session->userdata['medico_name'];
$id_user=$this->session->userdata['medico_id'];
$data['user_name']=$id_user;
$perfil=$this->session->userdata['medico_perfil'];
$data['perfil']=$perfil;

$this->load->view('medico/header',$data);	
}




public function birthdates($id_center){
$this->header_user();
$id_centro = decrypt_url($id_center);
$data['id_centro'] = $id_centro;
if($id_centro){
$four_days_more_from_today_title= date('d-m-Y', strtotime('+2 day', time()));

$four_days_more_from_today= date('m-d', strtotime('+2 day', time()));

$sql ="SELECT * FROM employees WHERE   birth_date like '%" . $four_days_more_from_today . "%'  ORDER BY employee_name DESC ";

$query = $this->db->query($sql);
foreach ($query->result() as $row){
$search = $this->db->get_where('employee_birthdate',array('id_employee'=>$row->id));
		if($search->num_rows() == 0)
	{
		$data = array(
        'id_employee' => $row->id,
        'birth_date' => $row->birth_date,
		'id_centro' => $row->centro,
		'id_apoint' => 0
);

$this->db->insert('employee_birthdate', $data);
	}		
}

$this->db->where('id_apoint >', 0);
$this->db->delete('employee_birthdate');

$sql_birthdates ="SELECT * FROM employee_birthdate

INNER JOIN employees ON employee_birthdate.id_employee=employees.id

";

$data['query_birthdates'] = $this->db->query($sql_birthdates);
$data['title']= "Lista de empleados que cumplirán años dentro de 2 días: $four_days_more_from_today_title";
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$this->load->view('ficha-empleado/birthdates/index',$data);
$this->load->view('admin/pacientes-citas/footer_patient_search');
}else{
	redirect('/page404');
}
}


public function medical_license(){
$data['id_cm'] = $this->uri->segment(3);
$data['target']=2;
$data['title']="REPORTE DE LICENCIA MEDICA";
$data['controller_report']="licenseReporte";
$data['table_name']="employees_lic_med";
$this->load->view('salud-ocupacional/medicamento/header-drug-management', $data);
$this->load->view('salud-ocupacional/medicamento/footer', $data);


}

public function licenseReporte(){
$this->header_user();
$from=$this->input->post('from');
$to=$this->input->post('to');
$id_centro=$this->input->post('id_centro');
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$data['id_centro']=$id_centro;
$data['from']=$from;
$data['to']=$to;
$data['title']=$this->input->post('title');
$sql ="SELECT *, employees_lic_med.inserted_by AS created_by, employees_lic_med.inserted_time AS date_created FROM employees_lic_med
 INNER JOIN employees ON employees_lic_med.id_employee=employees.id 
 WHERE  DATE(employees_lic_med.inserted_time) 
 BETWEEN '$from' AND '$to' AND centro = $id_centro
 ORDER BY employees_lic_med.inserted_time DESC";
$data['query'] = $this->db->query($sql);
//-----------------------------------------------------------------------

 $sql2 ="SELECT *, hc_cirugia_reporte.id_user AS created_by,
 hc_cirugia_reporte.inserted_time AS date_created
 FROM hc_cirugia_reporte
 WHERE  DATE(hc_cirugia_reporte.inserted_time) 
 BETWEEN '$from' AND '$to' AND id_centro = $id_centro
 ORDER BY hc_cirugia_reporte.inserted_time DESC";
$data['query2'] = $this->db->query($sql2);

$this->load->view('ficha-empleado/report/view',$data);
$this->load->view('ficha-empleado/footer');
}

public function drugsReport(){
$this->header_user();
$from=$this->input->post('from');
$to=$this->input->post('to');
$id_centro=$this->input->post('id_centro');
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$data['id_centro']=$id_centro;
$data['from']=$from;
$data['to']=$to;
$sql ="SELECT *, nota_med_salud_ocupacional.id AS id_nota_med,
 nota_med_salud_ocupacional.inserted_by AS created_by,
 nota_med_salud_ocupacional.inserted_time AS date_created,
  nota_med_salud_ocupacional.id_patient AS id_pat
 FROM nota_med_salud_ocupacional
 INNER JOIN employees ON nota_med_salud_ocupacional.id_patient=employees.id_p_a
 WHERE
 DATE(nota_med_salud_ocupacional.inserted_time) BETWEEN '$from' AND '$to' 
AND id_centro=$id_centro
 ORDER BY nota_med_salud_ocupacional.inserted_time DESC";

$data['query'] = $this->db->query($sql);
$this->load->view('getPatientAge');

$this->load->view('salud-ocupacional/medicamento/report/view',$data);
$this->load->view('ficha-empleado/footer');
}


 function saveDatosEmpleadoLicMed()
{

$id_em_lic=$this->input->post('id_em_lic');	

if($this->input->post('diagnostico') ==""
|| $this->input->post('fecha_inicio') ==""
|| $this->input->post('fecha_retorno') ==""  
|| $this->input->post('medico_licencia') =="" 
|| $this->input->post('centro_med') =="")
{
$response['message'] = "Los campos con * son requeridos"; 
$response['status'] =  1;
} else {
	
	
	$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('diagnostico')));
		if($query1->num_rows() == 0)
	{
		$saveDig = array(
       'title'=>$this->input->post('diagnostico'),
	   'inserted_by' => $this->input->post('id_user'),
	   'inserted_time' =>$this->input->post('insTf'),
       'updated_by' => $this->input->post('id_user'),
	   'updated_time' => $this->input->post('updTf')
	   );
	   $this->db->insert("type_reasons",$saveDig);
		
	}
	
	
	
$save = array(
'diagnostico'=> $this->input->post('diagnostico'),
'sistema'=> $this->input->post('sistema'),
'fecha_inicio'=>$this->input->post('fecha_inicio'),
'amount_days'=>$this->input->post('amount_days'),
'fecha_retorno'=>$this->input->post('fecha_retorno'),
'turno_trab'=>$this->input->post('turno_trab'),
'medico_licencia'=> $this->input->post('medico_licencia'),
'area'=> $this->input->post('area'),
'centro_med'=> $this->input->post('centro_med'),
'phone_centro'=> $this->input->post('phone_centro'),
'phone_emp'=> $this->input->post('phone_emp'),
'comentario'=> $this->input->post('comentario'),
'updated_by'=> $this->input->post('id_user'),
'inserted_by'=> $this->input->post('id_user'),
'inserted_time'=>$this->input->post('insTf'), 
'updated_time'=>$this->input->post('updTf'),
'id_employee'=>$this->input->post('id_employee')
);


if($id_em_lic==0){
	$this->db->insert("employees_lic_med",$save);

}else{
	$where= array(
  'id' =>$id_em_lic  
);

$this->db->where($where);
$this->db->update("employees_lic_med",$save);	

}
$response['message'] = "Datos guadados!"; 
$response['status'] =  '';
}

echo json_encode($response);	
}


function getClockResult()
{
$val= $this->input->post('val');
$id_user = $this->input->post('id_user');
$id_cm = $this->input->post('centro');
$display = "";
$sql ="SELECT * FROM employees WHERE id =$val ORDER BY clock DESC";
$data['val']= $val;
$data['id_user'] = $id_user;
$data['id_cm'] = $id_cm;
$data['queryEmp'] = $this->db->query($sql);
$data['display'] =$display;

$this->load->view('ficha-empleado/get-clock-result', $data);

}

 function licenciaMedicaForm()
{
$id_emp= $this->input->post('id_emp');
$data['id_emp']= $id_emp;
$data['id_user']= $this->input->post('id_user');
$sql = "select * from employees_lic_med WHERE id=$id_emp";
$data['licenciaData']= $this->db->query($sql);
$this->load->view('ficha-empleado/licencia-medica-form', $data);
}


 function paginationNumber()
{
 $data['id_emp']= $this->input->post('id_emp');
 $data['id_user']= $this->input->post('id_user');
$this->load->view('ficha-empleado/pagination-number', $data);
}


function countLicMed(){	
$query = $this->db->get_where('employees_lic_med',array(
'id_employee'=>$this->input->post('id_emp')
));
echo $query->num_rows() ." registro(s)";
		
}

 function deleteLicMed()
 {
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('employees_lic_med');
 }
 
 
 
 function paginationDataLicMed()
	{
	$page= $this->input->get('page');
	$idUser= $this->input->get('idUser');
	$data['id_user']=$idUser;
	$data['id_emp']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from employees_lic_med WHERE id=$page";
	$data['licenciaData']= $this->db->query($sql);
	$this->load->view('ficha-empleado/licencia-medica-form', $data);
	}
	
	
	
 function saveDatosEmpleado()
{
	
$idEmp=$this->input->post('idEmp');	

$query = $this->db->get_where('employees',array(
'national_id'=>$this->input->post('national_id'),
'centro'=>$this->input->post('centro')
));
	if($query->num_rows() > 0 && $idEmp==0 )
	{
	$response['message'] = "Ya tenemos un empleado con el cedula ".$this->input->post('national_id'); 
    $response['status'] =  1;
    }else{
if($this->input->post('status')=='Terminated' && $this->input->post('terminated_date')==""){
$response['message'] = "Cuando fue terminado!"; 
$response['status'] =  2;	
}else {
$save = array(
'clock'=> $this->input->post('clock'),
'employee_name'=> $this->input->post('employee_name'),
'gender'=> $this->input->post('gender'),
'birth_date'=>date("Y-m-d", strtotime($this->input->post('date_of_birth'))),
'date_sen'=>$this->input->post('date_sen'),
'terminated_date'=>$this->input->post('terminated_date'),
'status'=> $this->input->post('status'),
'title'=> $this->input->post('title'),
'depart'=> $this->input->post('depart'),
'gbl_shift'=> $this->input->post('gbl_shift'),
'super_clock'=> $this->input->post('super_clock'),
'super_name'=> $this->input->post('super_name'),
'gbl_cost'=> $this->input->post('gbl_cost'),
'dr_pr_dept'=> $this->input->post('dr_pr_dept'),
'national_id'=> $this->input->post('national_id'),
'updated_by'=> $this->input->post('updated_by'),
'inserted_by'=> $this->input->post('inserted_by'),
'inserted_time'=>$this->input->post('inserted_time'),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$this->input->post('centro')
);


if($idEmp==0){
	$this->db->insert("employees",$save);
	$response['id_last'] =$this->db->insert_id(); 
}else{
	$where= array(
  'id' =>$idEmp
);

$this->db->where($where);
$this->db->update("employees",$save);	

}
$response['message'] = "Datos guadados!"; 
$response['status'] =  '';
}
}

echo json_encode($response);	
}





 function addEmployeeToPatient()
{
$id_user=$this->input->post('id_user');

$rows=$this->db->select('employee_name,gender,national_id,centro,id,id_p_a')->where('id',$this->input->post('val'))->get('employees')->row_array();

if($rows['id_p_a'] ==NULL){
if($rows['gender']=='M'){
	$sexo='Masculino';
}else{
	$sexo='Femenina';
}
$save = array(
'nombre'=> $rows['employee_name'],
'sexo'=>$sexo,
'cedula'=> $rows['national_id'],
'seguro_medico'=>11,
'inserted_by'=> $id_user,
'insert_date'=>date("Y-m-d H:i:s"),
'updated_by'=> $id_user,
'update_date'=>date("Y-m-d H:i:s"),
'filter_date'=>date("Y-m-d"),
);

$this->db->insert("patients_appointments",$save);
$id_last=$this->db->insert_id();

$where= array(
  'id' =>$this->input->post('val')
);

$update = array(
'id_p_a'=> $id_last
);


$this->db->where($where);
$this->db->update("employees",$update);
$id_pat=$id_last;
}else{
$id_pat=$rows['id_p_a'];	
}

$response['patient_id'] = $id_pat; 
$response['centro'] = $rows['centro']; 
$response['id'] = $rows['id']; 
echo json_encode($response);
	
}	
	
	

function getClockResultPatient()
{
$val= $this->uri->segment(3);
$id_user = $this->uri->segment(4);
$id_cm = $this->uri->segment(5);
$display= "style='display:none'";
$data['display'] =$display;
$data['val']= $val;
$data['id_user'] = $id_user;
$data['id_cm'] = $id_cm;

$id_p_a=$this->db->select('id_p_a')->where('id_p_a',$val)->get('employees')->row('id_p_a');

if(!$id_p_a){
$pat_info=$this->db->select('id_p_a, nombre, cedula, sexo, date_nacer_format')->where('id_p_a',$val)->get('patients_appointments')->row_array();
$last_clock=$this->db->select('clock')->order_by('id',"desc")->limit(1)->get('employees')->row('clock');	

if($pat_info['sexo']=='Masculino'){
	$sexo='M';
}else{
	$sexo='F';
}



$save = array(
'clock'=> $last_clock + 1,
'employee_name'=> $pat_info['nombre'],
'gender'=> $sexo,
'birth_date'=>$pat_info['date_nacer_format'],
'date_sen'=>'0000-00-00',
'terminated_date'=>'0000-00-00',
'national_id'=> $pat_info['cedula'],
'updated_by'=> $id_user,
'inserted_by'=> $id_user,
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$id_cm,
'id_p_a'=>$pat_info['id_p_a'],
);

$this->db->insert("employees",$save);	
	
}

$sql ="SELECT * FROM employees WHERE id_p_a =$val";
$data['queryEmp'] = $this->db->query($sql);

$this->load->view('ficha-empleado/view-from-patient-data', $data);
}


function savePatientEmp (){
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$idp=$this->input->post('id_p_a');
if($this->input->post('nombre') ==""
 || $this->input->post('date_nacer') ==""
 || $this->input->post('tel_cel') ==""  
  || $this->input->post('sexo') =="" 
 || $this->input->post('estado_civil') =="" 
 || $this->input->post('provincia') ==""
|| $this->input->post('municipio') ==""
 || $this->input->post('nacionalidad') ==""
 || $this->input->post('seguro_medico')==""){

$response['message'] = "Los campos con * son obligatorios!"; 
$response['status'] = 1;
}else{

$up_emp = array(
  'birth_date'  => date("Y-m-d", strtotime($this->input->post('date_nacer'))),
    'national_id'  => $this->input->post('cedula')
	);

$this->db->where('id_p_a', $idp);
$this->db->update("employees", $up_emp);	
	
	
	
$old_photo=$this->db->select('photo')->where('id_p_a',$idp)->get('patients_appointments')->row('photo');
 $photo_location = $this->input->post('photo_location');
if($photo_location==2)
{
$extension = explode('.', $_FILES['picture']['name']);
$logo = rand() . '.' . $extension[1];
$destination = './assets/img/patients-pictures/' . $logo;
move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
 }

else {

$logo = $old_photo;

	}

$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save = array(
  'nombre'  => $this->input->post('nombre'),
    'apodo'  => $this->input->post('apodo'),
  'photo'  => $logo,
  'cedula' => $this->input->post('cedula'),
 'date_nacer' => $this->input->post('date_nacer'),
  'date_nacer_format' => $this->input->post('date_nacer_format'),
   'edad' => $this->input->post('age'),
  'frecuencia'=> $this->input->post('frecuencia'),
 'tel_resi'  => $this->input->post('tel_resi'),
  'tel_cel'=> $this->input->post('tel_cel'),
  'email' => $this->input->post('email'),
  'sexo' => $this->input->post('sexo'),
   'estado_civil' => $this->input->post('estado_civil'),
  'nacionalidad'=> $this->input->post('nacionalidad'),
 'seguro_medico'  => $this->input->post('seguro_medico'),
  'afiliado'  => $this->input->post('afiliado'),
 'plan'  => $this->input->post('plan'),
  'provincia'=> $this->input->post('provincia'),
  'municipio' => $this->input->post('municipio'),
  'barrio' => $this->input->post('barrio'),
   'calle' => $this->input->post('calle'),
  'contacto_em_nombre'=> $this->input->post('contacto_em_nombre'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'),
   'responsable_legal' => $this->input->post('responsable_legal'),
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'update_date' => $modify_date,
  'updated_by' => $this->input->post('updated_by'),

  );
$this->model_admin->saveUpdatePatient($idp,$save);



if($this->input->post('seguro_medico')==11){
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$idp");	
} else{
for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$idp");
	 $inf = $inputf[$i];
	  $inp = $inputname[$i];
   $saveInputs= array(
	'patient_id' =>$idp,
	'input_name' => $inp,
	'inputf' => $inf
	);
  $this->db->insert("saveinput",$saveInputs);
 }

}

$response['message'] = "Datos guardados con exito! $idp"; 
$response['status'] = 0;

}	
echo json_encode($response);
}
	

public function header_user_admin(){

$data['name']=$this->session->userdata['admin_name'];
$id_user=$this->session->userdata['admin_id'];
$data['user_name']=$id_user;
$perfil=$this->session->userdata['admin_perfil'];
$data['perfil']=$perfil;

$this->load->view('admin/header_admin',$data);	
}



public function doctor_productivity(){
$perfil=$this->input->post('perfil');
	if($perfil=="Medico"){
$this->header_user();
	}else{
	$this->header_user_admin();	
	}
$area_id=$this->input->post('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)
->get('areas')->row('title_area');
$data['area']=$area;
$data['area_id']=$area_id;
$from=$this->input->post('from');
$to=$this->input->post('to');
$id_centro=$this->input->post('id_centro');
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$data['id_centro']=$id_centro;
$data['from']=$from;
$data['to']=$to;
$data['title']=$this->input->post('title');
$data['reports_areas']=$this->report->areaDocProd($from,$to,$id_centro,$area_id);
$data['reports_shift']=$this->report->areaDocTurn($from,$to,$id_centro,$area_id);
$this->load->view('ficha-empleado/report/medico/reporte',$data);
$this->load->view('ficha-empleado/footer');
}


	
public function nurse_productivity(){
$perfil=$this->input->post('perfil');
	if($perfil=="Medico"){
$this->header_user();
	}else{
	$this->header_user_admin();	
	}
$area_id=$this->input->post('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)
->get('areas')->row('title_area');
$data['area']=$area;
$data['area_id']=$area_id;
$from=$this->input->post('from');
$to=$this->input->post('to');
$id_centro=$this->input->post('id_centro');
$data['centro_name']=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$data['id_centro']=$id_centro;
$data['from']=$from;
$data['to']=$to;
$data['title']=$this->input->post('title');
$data['reports_nurses']=$this->report->nurseReport($from,$to,$id_centro,$area_id);

$this->load->view('ficha-empleado/report/nurse/reporte',$data);
$this->load->view('ficha-empleado/footer');
}
	
	
	

}
