<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hospitalizacion extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('navigation/account_demand_model');
$this->load->library('email');
 $this->load->helper('email');
  $this->load->library('form_validation'); 
  $this->padron_database = $this->load->database('padron',TRUE);
}


function testalgo()
{
$dat=$this->db->select('dateo')->where('dateo',date("Y-m-d"))->get('user_login_twice')->row('dateo');
if($dat==""){
$this->db->empty_table('ci_sessions');
$this->db->empty_table('user_login_twice');
$this->db->empty_table('current_user_info');
$updateData = array(
'is_log_in'  =>0,
'login_time' =>'');
$this->db->update("users",$updateData);
}
$this->load->view('login_form');
// $this->load->view('index');
}




public function create_new_hospital()
{


$id_p_a=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
//$id_hosp=$this->uri->segment(5);
//$id_centro=$this->uri->segment(6);

$data['id_patient']=$id_p_a;


$paciente=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado')->where('id_p_a',$id_p_a)
 ->get('patients_appointments')->row_array(); 
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:120px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		
}

$data['patIm']=$imgpat;
$nombre=$paciente['nombre'];
$data['isSeguroTitle']=$paciente['seguro_medico'];
$seguroname=$this->db->select('title')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row('title');
$nec1=$paciente['nec1'];

$papinfo="<div class='col-md-12'>
<table>
<tr>
<td>$imgpat &nbsp; &nbsp;<td/>
<td>
<h3> $nombre</h3>
<hr/>
&nbsp;<u>SEGURO</u>: <h5>$seguroname</h5>
<td/>

</tr>
</table>
</div>";


  $this->load->view('getPatientAge');
  
  

  
$data['id_p_a']=$id_p_a;
$data['id_user']=$id_user;

$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['causa']=$this->model_admin->getCausa();
if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
} else {
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
}



$ifPatientHospitalizedYet=$this->db->select('timeinserted, timeupdated, id, centro, sala, inserted, updated')->where('id_patient',$id_p_a)->where('alta',0)->get('hospitalization_data')->row_array();
// if patient is found and alta is 0
if($ifPatientHospitalizedYet){
$id_hosp = $ifPatientHospitalizedYet['id'];
$id_centro = $ifPatientHospitalizedYet['centro'];
$sala = $ifPatientHospitalizedYet['sala'];

		$data['id_hosp']=$id_hosp;
$sql ="SELECT * FROM hospitalization_data WHERE id =$id_hosp";
$query= $this->db->query($sql);
foreach($query->result() as $rowId)
$data['isSeguroTitle']=$this->db->select('seguro_medico')->where('id_p_a',$rowId->id_patient)->get('patients_appointments')->row('seguro_medico');
$data['query']=$query;
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
$sqls ="SELECT sala FROM  mapa_de_cama WHERE centro=$id_centro GROUP BY sala";
$data['querySala'] = $this->db->query($sqls);

$sqlServ ="SELECT id, servicio FROM  mapa_de_cama WHERE centro=$id_centro AND sala='$sala' GROUP BY servicio";
$data['queryServ']  = $this->db->query($sqlServ);

$sqlCama ="SELECT id, num_cama FROM  mapa_de_cama WHERE centro=$id_centro  AND sala='$sala' GROUP BY num_cama";
$data['queryCama'] = $this->db->query($sqlCama);

$date=date("d-m-Y H:i:s", strtotime($ifPatientHospitalizedYet['timeinserted']));
$createdBy=$this->db->select('name')->where('id_user',$rowId->inserted)->get('users')->row('name');
$updateddBy=$this->db->select('name')->where('id_user',$rowId->updated)->get('users')->row('name');
$dateChange=date("d-m-Y H:i:s", strtotime($ifPatientHospitalizedYet['timeupdated']));
if($ifPatientHospitalizedYet['timeinserted'] != $ifPatientHospitalizedYet['timeupdated']){
	$updateInfo="<br/>cambiado por $updateddBy, $dateChange";
}else{
	$updateInfo="";	
}
$patHeader="
<div class='col-md-6'>
$papinfo
</div>
<div class='col-md-6'>Este paciente has sido hospitalizado desde $date por $createdBy $updateInfo</div>

";

$data['patHeader']=$patHeader;

$this->load->view('hospitalizacion/update_hosp',$data);	
}else{
	
	$patHeader="
<div class='col-md-12'>
$papinfo
</div>

";
	
	$data['patHeader']=$patHeader;

$this->load->view('hospitalizacion/create_new_hosp',$data);

}


}





public function cancelHospData(){


 $update = array(
'canceled'=> 1,
'updated' => $this->input->post('id_user'),
'timeupdated' =>date("Y-m-d H:i:s"),
   );

$where= array(
  'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->update("hospitalization_data",$update);



	
}





public function hospitalizacion_list($id_pat, $id_user){
$id_pat1=decrypt_url($id_pat);
$id_user1=decrypt_url($id_user);
if(empty($id_user)){
redirect('/page404');
}
$perfil=$this->db->select('perfil')->where('id_user',$id_user1)->get('users')->row('perfil');
if($perfil=='Admin'){
$this->load->view('admin/header_admin');

$admin_position_centro=$this->session->userdata['admin_position_centro'];
if($admin_position_centro){
$where = "&& centro = $admin_position_centro";
}else{

  $where = "";

}
}else if($perfil=='Medico'){
$this->load->view('medico/header');
$where="&& inserted = $id_user1";
} else{
redirect('/page404');
}
$sql ="SELECT * FROM hospitalization_data WHERE alta =0 $where && canceled = 0 ORDER BY id DESC";
$data['query'] = $this->db->query($sql);
$data['id_user']=$id_user1;
$data['isFromDrug']="";
$this->load->view('hospitalizacion/list-of-hosp',$data);
}

public function listDateRange(){

$date1=date("Y-m-d", strtotime($this->input->post('date_from')));
$date2=date("Y-m-d", strtotime($this->input->post('date_to')));
$condition = "where CAST(timeinserted AS DATE) between " ."'".$date1."'" . " AND ". "'".$date2."'";
$sql ="SELECT * FROM hospitalization_data  $condition ORDER BY id DESC";
$data['query'] = $this->db->query($sql);
$data['id_user']=$this->input->post('id_user');
$data['isFromDrug']="";
$this->load->view('hospitalizacion/list-data',$data);
}

public function test(){
$sql = "INSERT INTO areas (title_area) VALUES ('')";
$this->db->query($sql);
echo $this->db->affected_rows();
}



public function hospitalizacion_historial($id_hosp_, $id_user_, $id_centro_)
{
$id_hosp=decrypt_url($id_hosp_);
$id_user=decrypt_url($id_user_);
$id_centro=decrypt_url($id_centro_);


$data['id_hosp_']=$id_hosp_;
$data['id_user_']=$id_user_;
$data['id_centro_']=$id_centro_;




if(empty($id_user) || empty($id_hosp)){
redirect('/page404');
}

 $data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$this->session->set_userdata('id_user_save_em_gn',$id_user);

$data['user_id']=$id_user;
$data['id_hosp']=$id_hosp;
$data['idtable']=$id_hosp;
$data['centro_medico']=$id_centro;
$data['centro']=$id_centro;
$data['table_insumo']='hosp_peticion';
$data['table_insumo_link']='hosp_peticion_link';
$patient_data=$this->db->select('*')->where('id',$id_hosp)->get('hospitalization_data')->row_array();

$data['causa']=$patient_data['causa'];
$data['sala']=$patient_data['sala'];
$data['cama']=$patient_data['cama'];
$data['centro']=$patient_data['centro'];
$data['centro_id']=$patient_data['centro'];
$data['fecha_ingreso']=$patient_data['timeinserted'];

$data['patient_id']=$patient_data['id_patient'];
$data['id_historial']=$patient_data['id_patient'];
$data['historial_id']=$patient_data['id_patient'];

 $patient=$this->db->select('sexo,nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado,cedula,id_p_a,date_nacer_format')->where('id_p_a',$patient_data['id_patient'])
 ->get('patients_appointments')->row_array();

$data['date_nacer']=$patient['date_nacer'];
$data['photo']=$patient['photo'];
$data['nombre']=$patient['nombre'];
$data['nombre']=$patient['nombre'];
$data['cedula']=$patient['cedula'];
$data['ced1']=$patient['ced1'];
$data['ced2']=$patient['ced2'];
$data['ced3']=$patient['ced3'];
$data['id_seguro']=$patient['seguro_medico'];
$data['sexo']=$patient['sexo'];
$data['seguro_medico_name']=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');
$data['nota_nombre']='none';
$data['areaid']='';
$this->load->view('getPatientAge');

$this->load->view('hospitalizacion/historial/hospitalizacion-general-bridge',$data);

}
public function sistForm(){
$historial_id=$this->input->post('historial_id');
$data['historial_id']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['centro']=$this->input->post('centro');
$data['count_examensis']=$this->model_admin->count_examenes_sis($historial_id);
$data['examensis']=$this->model_admin->Examensis($historial_id);
$data['musculo']=$this->model_admin->sistemaMusculo();
$data['urogenial']=$this->model_admin->sistemaUrogenial();
$data['cardiov']=$this->model_admin->sistemaCardiov();
$data['neuro']=$this->model_admin->sistemaNeuro();
$data['resp']=$this->model_admin->sistemaResp();
$data['endocrino']=$this->model_admin->sistemaEndo();
$data['relativo']=$this->model_admin->sistemaRelat();
$data['digest']=$this->model_admin->sistemaDigest();
$this->load->view('admin/historial-medical1/examen-sistema/exam-sist-form-unm', $data);
}





public function hosp_notas($id_hosp, $id_user, $patient_id)
{
$data['user_id']=$id_user;
$data['id_hosp']=$id_hosp;
$data['id_patient']=$patient_id;
$date_nacer=$this->db->select('date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row('date_nacer');
$data['how_exam_fis_title']='none';
$data['nota_nombre']='';
$data['nota_signo_vitales']="Description De Nota";
$data['idg'] =2;
  $this->load->view('getPatientAge');
$data['date_nacer']=$date_nacer;

$data['signo_id']= 0;
$data['pageId']= '';
$this->load->view('hospitalizacion/historial/hosp-notas/index',$data);
}

 public function loadSigno()
  {
  $data['edad']=$this->db->select('date_nacer')->where('id_p_a',$this->input->post('historial_id'))
  ->get('patients_appointments')->row('date_nacer');
 $id= $this->input->post('id_exam_fis');
  $table= $this->input->post('table');
  if($id){
  $sql = "select * from $table where id=$id";
  $data['signo_by_id']= $this->db->query($sql);
 
 $this->load->view('emergencia/general/signo_result', $data);
  }else{
	  $this->load->view('getPatientAge');
	  
	 $this->load->view('hospitalizacion/historial/hosp-notas/signo_empty', $data);
  }
  
}

public function orden_medica($user_id,$patient_id,$centro,$id_hosp,$id_seguro)
{
$data['user_id']=$user_id;
$data['centro_id']=$centro;
$data['patient_id']=$patient_id;
$data['enviado_name']='Orden Medica';
$data['id_emergency']=$id_hosp;
$data['id_hosp']=$id_hosp;
$data['id_seguro']=$id_seguro;
$date_nacer=$this->db->select('date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row('date_nacer');
  $this->load->view('getPatientAge');
$data['date_nacer']=$date_nacer;
$this->load->view('hospitalizacion/historial/orden-medica/index',$data);
}



 public function edit_recetas_or_med(){
$id=$this->uri->segment(3);
$sql ="SELECT * FROM hosp_orden_medica_recetas where id_i_m=$id";
$query = $this->db->query($sql);
$data['edit_recetas'] = $query;
$data['presentacion'] = $this->model_admin->Presentacion();
$data['branches'] = $this->model_admin->branches();
$data['via'] = $this->model_admin->via();
$data['frecuencia'] = $this->model_admin->frecuencia();
$data['farmacia'] = $this->model_admin->farmacia();
$data['id_user'] =$this->uri->segment(4);

$this->load->view('hospitalizacion/historial/orden-medica/recetas/edit_recetas', $data);
}


public function updateFormRecetasOrdMed(){
if($this->input->post('via') !='OFTALMICA')
{
	$oyo="";
} else {
	$oyo=$this->input->post('oyo');
}
$update = array(
'medica'=> $this->input->post('medicamento1'),
'presentacion'=> $this->input->post('presentacion'),
'frecuencia'=> $this->input->post('frecuencia'),
'cantidad'=> $this->input->post('cantidad'),
'via' => $this->input->post('via'),
'oyo' => $oyo,
'nota' =>$this->input->post('nota'),
'updated_by' => $this->input->post('operator'),
'updated_time'=>date("Y-m-d H:i:s")

);

$where= array(
  'id_i_m' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->update("hosp_orden_medica_recetas",$update);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}
}


public function repetirOrdenMedica()
{
$idsala= $this->input->post('idsala');
$id_user= $this->input->post('id_user');
$sql = "select * from hosp_orden_medica_sala WHERE idsala=$idsala";
$data= $this->db->query($sql);
foreach ($data->result() as $row)
$save1 = array(
'name'=> $row->name,
'id_user' => $id_user,
'id_historial' => $row->id_historial,
'centro' => $row->centro,
'inserted_by' => $id_user,
'inserted_time' =>date("Y-m-d H:i:s")

);

 $this->db->trans_begin();

$this->db->insert("hosp_orden_medica_sala",$save1);
$id_last=$this->db->insert_id();
//-------------------------------------------------------------------------------------
$id_sala_rec=$this->db->select('id_sala')->where('id_sala',$idsala)->get('hosp_orden_medica_recetas')->row('id_sala');
if($id_sala_rec){
$sql = "select * from hosp_orden_medica_recetas WHERE id_sala=$idsala";
$datarec= $this->db->query($sql);
foreach ($datarec->result() as $row) {
	$save2 = array(
'medica'=> $row->medica,
'presentacion'=> $row->presentacion,
'frecuencia'=> $row->frecuencia,
'via' => $row->via,
'oyo' => $row->oyo,
'operator' => $id_user,
'insert_date'=>date("Y-m-d H:i:s"),
'historial_id' =>$row->historial_id,
'updated_by' =>$id_user,
'updated_time'=>date("Y-m-d H:i:s"),
'nota' => $row->nota,
'printing'=>$row->printing,
'id_sala'=>$id_last,
'centro'=>$row->centro,
'cantidad'=>$row->cantidad,
'cobertura' => $row->cobertura,
'id_hosp' => $row->id_hosp,
'descuento' => $row->descuento
);
$this->db->insert("hosp_orden_medica_recetas",$save2);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_rec=$this->db->select('id_sala')->where('id_sala',$idsala)->get('hosp_orden_medica_estudios')->row('id_sala');
if($id_sala_rec){
$sql = "select * from hosp_orden_medica_estudios WHERE id_sala=$idsala";
$datarec= $this->db->query($sql);
foreach ($datarec->result() as $row) {
$save3 = array(
'estudio'=> $row->estudio,
'cuerpo'=> $row->cuerpo,
'lateralidad' => $row->lateralidad,
'observacion' => $row->observacion,
'historial_id' =>$row->historial_id,
'operator' => $id_user,
'updated_by' => $id_user,
'insert_date'=> date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'printing'=> $row->printing,
'id_sala'=>$id_last,
'centro'=>$row->centro,
'cobertura' => $row->cobertura,
'id_hosp' => $row->id_hosp,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento
);
$this->db->insert("hosp_orden_medica_estudios",$save3);
}
}


//---------------------------------------------------------------------------------------------------
$id_sala_lab=$this->db->select('id_sala')->where('id_sala',$idsala)->get('hosp_orden_medcia_lab')->row('id_sala');
if($id_sala_lab){
$sql = "select * from hosp_orden_medcia_lab WHERE id_sala=$idsala";
$datarec= $this->db->query($sql);
foreach ($datarec->result() as $row) {

$save3 = array(
  'laboratory'  =>$row->laboratory,
  'operator'=> $row->operator,
  'historial_id' =>$row->historial_id,
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $id_user,
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>$row->printing,
  'user_id'=>$id_user,
 'id_sala'=> $id_last,
 'centro'=> $row->centro,
'cobertura' => $row->cobertura,
'id_hosp' => $row->id_hosp,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento

  );
$this->db->insert("hosp_orden_medcia_lab",$save3);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_gnrl=$this->db->select('id_sala')->where('id_sala',$idsala)->get('hosp_ord_med_gen')->row('id_sala');
if($id_sala_gnrl){
$sql = "select * from hosp_ord_med_gen WHERE id_sala=$idsala";
$datarec= $this->db->query($sql);
foreach ($datarec->result() as $row) {
$save = array(
'medidas_gen'=>$row->medidas_gen,
'descripcion_mg'=>$row->descripcion_mg,
'intervalo_de_real'=>$row->intervalo_de_real,
'id_user' => $id_user,
'id_patient' =>$row->id_patient,
'inserted_by' => $id_user,
'inserted_time' =>date("Y-m-d H:i:s"),
'printing' =>$row->printing,
'id_sala' =>$id_last,
'centro' =>$row->centro
);
$this->db->insert("hosp_ord_med_gen",$save);
}
}

//make transaction complete
        $this->db->trans_complete();

		//check if transaction status TRUE or FALSE
        if ($this->db->trans_status() === FALSE) {
            //if something went wrong, rollback everything
            $this->db->trans_rollback();
			return FALSE;
        } else {
            //if everything went right, commit the data to the database
            $this->db->trans_commit();
            return TRUE;
        }



}




 public function paginationNumberOrdenMedica()
{
$data['user_id']= $this->input->post('user_id');
$data['id_historial']= $this->input->post('id_historial');
$data['id_hosp']= $this->input->post('id_hosp');
$data['centro_id']= $this->input->post('centro_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$this->load->view('hospitalizacion/historial/orden-medica/pagination-number', $data);
}


public function saveOrdMedSala(){

$save2 = array(
'name'=> $this->input->post('sala'),
'id_user' => $this->input->post('user_id'),
'id_historial' => $this->input->post('historial_id'),
'centro' => $this->input->post('centro'),
'inserted_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s")

);
$this->db->insert("hosp_orden_medica_sala",$save2);
$insert_id = $this->db->select('idsala')->where("id_user",$this->input->post('user_id'))->where("id_historial",$this->input->post('historial_id'))->order_by('idsala','desc')->limit(1)->get('orden_medica_sala')->row('idsala');
echo json_encode($insert_id);

}
public function editSala(){
$update = array(
'name'=> $this->input->post('sala'),
'centro'=>$this->input->post('centro')
);

$where= array(
  'idsala' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->update("hosp_orden_medica_sala",$update);
}



public function deleteSala(){
$where= array(
'idsala' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_orden_medica_sala');
}



public function pagination_data_orden_medica()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$data['centro_id']= $this->input->get('centro_id');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="id_user=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;
$data['id_hosp']=$this->input->get('id_hosp');
$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_orden_medica_sala where $contition id_historial=$id_patient  ORDER BY idsala desc limit $start,$per_page";
$data['paginate_oreden_medica']= $this->db->query($sql);
$this->load->view('hospitalizacion/historial/orden-medica/paginate',$data);
}




public function deleteLabsOM()
{
$where = array(
 'id_lab'   =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_orden_medcia_lab');
}

public function deleteEstudiosOM(){
$where = array(
  'id_i_e'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_orden_medica_estudios');


}


public function deleteMedGnrl(){
$where = array(
  'idem'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_ord_med_gen');


}

public function deleteRecetasOM(){
$where = array(
  'id_i_m'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('hosp_orden_medica_recetas');


}





public function paginateMed()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('hospitalizacion/historial/orden-medica/paginate/paginate-med', $data);
}



public function paginateEst()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('hospitalizacion/historial/orden-medica/paginate/paginate-est', $data);
}

public function paginateLab()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('hospitalizacion/historial/orden-medica/paginate/paginate-lab', $data);
}

public function paginaMedGen()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('hospitalizacion/historial/orden-medica/paginate/paginate-ord-med', $data);
}


public function edit_medida_gnl(){
$id=$this->uri->segment(3);
$sql ="SELECT * FROM hosp_ord_med_gen where idem=$id";
$query = $this->db->query($sql);
$data['edit'] = $query;

$data['id_user'] =$this->uri->segment(4);
$this->load->view('hospitalizacion/historial/orden-medica/edit_medida_gnl', $data);
}

public function updateOrdMedSave(){

$where= array(
 'idem' =>$this->input->post('id')
);

$update = array(
 'medidas_gen' =>$this->input->post('medgen2'),
 'descripcion_mg'=>$this->input->post('descripcion_mg2'),
 'intervalo_de_real'=>$this->input->post('intervalo_de_real2')
);
$this->db->where($where);
$this->db->update("hosp_ord_med_gen",$update);
if($this->db->affected_rows() > 0){
  echo "<span class='alert alert-success'>hecho</span>";
}else{
     echo "<span class='alert alert-warning'>fallo</span>"; 
}
}


public function paginate_new_ord_med()
{
$data['user_id']=$this->uri->segment(3);
$data['id_patient']=$this->uri->segment(4);
$data['idsala']=$this->uri->segment(5);
$data['centro']=$this->uri->segment(6);
$data['direction']=1;
$data['direct']=$this->uri->segment(7);
if($this->uri->segment(7)==1){
	$text='Agregar Nuevo medicamento';
}elseif($this->uri->segment(7)==2){
$text='Agregar Nuevo estudio';
}
elseif($this->uri->segment(7)==3){
$text='Agregar Nuevo laboratorio';
}else{
$text='Agregar Nuevas medidas generales';
}
$data['text']=$text;
$data['id_hosp']=$this->uri->segment(8);
$this->load->view('hospitalizacion/historial/orden-medica/paginate/paginate_new_ord_med', $data);
}

 public function ordenMedical()
{
$data['user_id']=$this->input->post('user_id');
$data['id_historial']=$this->input->post('id_historial');
$data['centro_id']=$this->input->post('centro_id');
$data['id_hosp']=$this->input->post('id_hosp');
$data['id_seguro']=$this->input->post('id_seguro');
$data['seguro_name']=$this->db->select('title')->where('id_sm',$this->input->post('id_seguro'))->get('seguro_medico')->row('title');
$this->load->view('hospitalizacion/historial/orden-medica/content',$data);
}







 function kardexIndex()
{
$patient_id=$this->input->post('id_historial');
$data['id_historial'] =$patient_id;
$data['user_id']=$this->input->post('user_id');
//-----------------------------------------------------------------------------------

$sql ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$patient_id && kardex=0 order by id_i_m desc";
$query=$this->db->query($sql);
$data['queryexneu'] =$query;
$data['nb_ex_neu'] =$query->num_rows();

//------------------------------------------------------------------------------------------------------

$sqlkx ="SELECT *  FROM  hosp_orden_medica_recetas WHERE historial_id=$patient_id && kardex=1 order by id_i_m desc";
$querykx=$this->db->query($sqlkx);
$data['querykardex'] =$querykx;
$data['nb_kardex'] =$querykx->num_rows();
$this->load->view('hospitalizacion/historial/kardex/content', $data);
}





public function saveOrdenMedicaRecetas(){
if($this->input->post('printing')==2){
$cant_alm=$this->db->select('cantidad_comp')->where('centro',$this->input->post('centro'))->where('id',$this->input->post('medicamento_ord_med'))->get('emergency_medicaments')->row('cantidad_comp');
$cant_restante=floatval($cant_alm) - floatval($this->input->post('cantidad'));


$update = array(
'cantidad_comp'=> $cant_restante

);

$where= array(
  'centro' =>$this->input->post('centro'),
  'id' =>$this->input->post('medicamento_ord_med')
);

$this->db->where($where);
$this->db->update("emergency_medicaments",$update);

}

if (is_numeric($this->input->post('medicamento_ord_med'))){
$med=$this->input->post('medicamento_ord_med');
}else{
$save = array(
'name'=> $this->input->post('medicamento_ord_med'),
'presentacion'=> $this->input->post('presentacion_ord_med'),
'centro'=> $this->input->post('centro')	
);
$this->db->insert("emergency_medicaments",$save);
$id_last=$this->db->insert_id();	
$med=$id_last;	
}

$save = array(
'medica'=>$med,
'presentacion'=> $this->input->post('presentacion_ord_med'),
'frecuencia'=> $this->input->post('frecuencia_ord_med'),
'dosis'=> $this->input->post('dosis'),
'via' => $this->input->post('via_ord_med'),
'oyo' => $this->input->post('oyo_ord_med'),
'operator' => $this->input->post('operator'),
'insert_date'=>date("Y-m-d H:i:s"),
'historial_id' =>$this->input->post('historial_id'),
'updated_by' => $this->input->post('operator'),
'updated_time'=>date("Y-m-d H:i:s"),
'nota' => $this->input->post('nota_ord_med'),
//'printing'=>$this->input->post('printing'),
'printing'=>3,
'id_sala'=>$this->input->post('sala'),
'centro'=>$this->input->post('centro'),
'cantidad'=>$this->input->post('cantidad'),
'cobertura' => $this->input->post('cobert'),
'id_hosp' => $this->input->post('id_hosp'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')
);
$this->db->insert("hosp_orden_medica_recetas",$save);

if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}


$query = $this->db->get_where('presentacion',array('name'=>$this->input->post('presentacion_ord_med')));
	if($query->num_rows() == 0)
	{
		$savep = array(
       'name'=>$this->input->post('presentacion_ord_med')
	   );
		$this->model_admin->save_new_presentacion($savep);
	}


}


public function edit_estudios_or_med(){
$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$id=$this->uri->segment(3);
$sql ="SELECT * FROM hosp_orden_medica_estudios where id_i_e=$id";
$query = $this->db->query($sql);
$data['edit_estudios'] = $query;
$data['id_user'] =$this->uri->segment(4);
$this->load->view('hospitalizacion/historial/orden-medica/estudios/edit_estudios', $data);

}


public function saveOrdenMedicaEst(){
$save = array(
'estudio'=> $this->input->post('study_ord_med'),
'cuerpo'=> $this->input->post('cuerpo_ord_med'),
'lateralidad' => $this->input->post('lateralidad_ord_med'),
'observacion' => $this->input->post('observaciones_ord_med'),
'historial_id' =>$this->input->post('historial_ides'),
'operator' => $this->input->post('operatores'),
'updated_by' => $this->input->post('operatores'),
'insert_date'=> date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
//'printing'=> $this->input->post('printing'),
'printing'=> 3,
'id_sala'=>$this->input->post('sala'),
'centro'=>$this->input->post('centro'),
'cobertura' => $this->input->post('cobert'),
'id_hosp' => $this->input->post('id_hosp'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')
);
$this->db->insert("hosp_orden_medica_estudios",$save);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}
}



public function updateEstOrdMed(){

$update = array(
'estudio'=> $this->input->post('study2'),
'cuerpo'=> $this->input->post('cuerpo2'),
'lateralidad'=> $this->input->post('lateralidad2'),
'observacion' =>  $this->input->post('observaciones2'),
'updated_by' =>$this->input->post('operator'),
'updated_time'=>date("Y-m-d H:i:s")
);

$where= array(
  'id_i_e' =>$this->input->post('id')
);


$this->db->where($where);
$this->db->update("hosp_orden_medica_estudios",$update);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}
}





public function allEstudiosOrdMed()
{
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id ;
$user_id=$this->input->post('user_id');
$printing=$this->input->post('printing');
$sql ="SELECT * FROM hosp_orden_medica_estudios WHERE  historial_id=$historial_id && operator=$user_id && printing=$printing ORDER BY id_i_e DESC";
$IndicacionesPreviasEstudios = $this->db->query($sql);
$data['IndicacionesPreviasEstudios']=$IndicacionesPreviasEstudios;
//$data['num_count_es']= count($IndicacionesPreviasEstudios);
$data['area']=$this->input->post('area');
$data['user_id']=$user_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$this->load->view('hospitalizacion/historial/orden-medica/estudios/NewIndicationEs',$data);
}




public function allRecetasOrdMed()

{
$historial_id=$this->input->post('historial_id');
$printing=$this->input->post('printing');
$data['printing']=$printing;
$data['historial_id']=$historial_id;
$user_id=$this->input->post('user_id');
$data['area']=$this->input->post('area');
$data['user_id']=$user_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$sql ="SELECT * FROM hosp_orden_medica_recetas WHERE  historial_id=$historial_id && operator=$user_id && printing=$printing order by id_i_m desc";
$data['IndicacionesPrevias'] = $this->db->query($sql);
$this->load->view('hospitalizacion/historial/orden-medica/recetas/all-patients-recetas', $data);
}




public function saveOrdMedLab(){
$save = array(
  'laboratory'  =>$this->input->post('lab'),
  'operator'=> $this->input->post('user_id'),
  'historial_id' =>$this->input->post('historial_id_l'),
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $this->input->post('user_id'),
 'updated_time'=>date("Y-m-d H:i:s"),
  //'printing'=>$this->input->post('printing'),
   'printing'=>3,
  'user_id'=> $this->input->post('user_id'),
 'id_sala'=> $this->input->post('sala'),
 'centro'=> $this->input->post('centro'),
'cobertura' => $this->input->post('cobert'),
'id_hosp' => $this->input->post('id_hosp'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')

  );
$this->db->insert("hosp_orden_medcia_lab",$save);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}
}

public function allLaboratoriosOrdMed()
{
$data['area'] = '';
$user_id = $this->input->post('user_id');
$data['user_id'] = $user_id;
$historial_id  = $this->input->post('historial_id');
$printing  = $this->input->post('printing');
$data['printing'] = $printing;
$data['historial_id'] = $historial_id;
$data['centro'] = $this->input->post('centro');
$data['perfil']=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$sql ="SELECT * FROM hosp_orden_medcia_lab WHERE historial_id=$historial_id && operator=$user_id && printing=$printing";
$IndicacionesLab = $this->db->query($sql);
$data['IndicacionesLab'] =$IndicacionesLab;
$this->load->view('hospitalizacion/historial/orden-medica/laboratorios/NewIndicationLab', $data);
}

public function DeleteOrdMedLab(){
$save = array(
  'laboratory'  =>$this->input->post('lab'),
  'operator'=> $this->input->post('user_id'),
  'historial_id' =>$this->input->post('historial_id_l'),
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $this->input->post('user_id'),
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>$this->input->post('printing'),
  'user_id'=> $this->input->post('user_id')

  );
$this->db->insert("hosp_orden_medcia_lab",$save);

$where = array(
 'laboratory'=>$this->input->post('lab'),
  'user_id'=>$this->input->post('user_id'),
   'historial_id' =>$this->input->post('historial_id_l'),
    'printing'=>$this->input->post('printing')

);

$this->db->where($where);
$this->db->delete('hosp_orden_medcia_lab');

}



public function saveMedGenOrd(){

$save = array(
'medidas_gen'=> $this->input->post('medidas_gen'),
'descripcion_mg'=> $this->input->post('descripcion_mg'),
'intervalo_de_real'=> $this->input->post('intervalo_de_real'),
'id_user' => $this->input->post('user_id'),
'id_patient' => $this->input->post('historial_id'),
'inserted_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s"),
'printing' =>$this->input->post('printing'),
'id_sala' =>$this->input->post('sala'),
'centro' =>$this->input->post('centro')
);
$this->db->insert("hosp_ord_med_gen",$save);
if($this->db->affected_rows() > 0){
	echo 'hecho';
}else{
   echo 'error';
}
}

public function ordenMedSala()
{
$data['area'] = '';
$user_id= $this->input->post('user_id');
$data['user_id']=$user_id;
$historial_id  = $this->input->post('historial_id');
$printing  = $this->input->post('printing');
$data['historial_id'] = $historial_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$sql ="SELECT * FROM hosp_ord_med_gen WHERE id_patient=$historial_id && id_user=$user_id && printing=$printing";
$data['ordenMed'] = $this->db->query($sql);
$this->load->view('hospitalizacion/historial/orden-medica/ordenMedSala', $data);
}




public function des_quirurgica($user_id, $patient_id, $centro, $id_hosp)
{
$data['user_id'] = $user_id;
$data['id_historial'] = $patient_id;
$data['centro_medico'] = $centro;
$data['centro']=$this->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name'); 
$data['id_hosp'] = $id_hosp;
$date_nacer=$this->db->select('date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row('date_nacer');
 $this->load->view('getPatientAge');
$data['date_nacer']=$date_nacer;
//$this->load->view('hospitalizacion/historial/desc_quirurgica/index',$data);
$this->load->view('admin/historial-medical1/quirurgia/index',$data);
}




public function solicitud_inter_con($id_hosp, $id_user, $patient_id)
{
$data['user_id']=$id_user;
$data['id_hosp']=$id_hosp;
$data['patient_id']=$patient_id;
$data['how_exam_fis_title']='none';
$data['nota_signo_vitales']="Description De Nota";
$data['idg'] =2;
 $this->load->view('getPatientAge');
$this->load->view('hospitalizacion/historial/solicitud-interconsulta/index',$data);
}









public function pagination_data_signo_vitales()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="inserted_by=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;
$data['notaSigV']= $this->input->get('notaSigV');
$data['notaNombre']= $this->input->get('notaNombre');
$data['pageId']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from hosp_signo_vitales where $contition id=$page";
$data['query_signos_data']= $this->db->query($sql);
$data['signo_id']= 1;
$this->load->view('hospitalizacion/historial/hosp-notas/signo-vitales-pagination-data',$data);
echo '<script>
$(".disable-all :input").prop("disabled", true);

</script>
';
}




public function examNeuro(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['id_hosp']=$this->input->post('id_hosp');
$sql ="SELECT *  FROM hosp_exam_neuro WHERE id_pat=$historial_id";
$query=$this->db->query($sql);
$data['queryexneu'] =$query;
$data['nb_ex_neu'] =$query->num_rows();
$this->load->view('hospitalizacion/historial/exam-neuro/form', $data);
}





public function get_data_exam_neuro($id,$pat,$user,$id_hosp){
$data['id_historial']=$pat;
$data['user_id']=$user;
$data['id'] =$id;
$data['id_hosp'] =$id_hosp;
$this->load->view('hospitalizacion/historial/exam-neuro/get-data', $data);
}


public function getDataConEg($id,$pat,$user,$id_hosp){
$data['id_historial']=$pat;
$data['user_id']=$user;
$data['id'] =$id;
 $data['id_hosp']=$id_hosp;
$this->load->view('hospitalizacion/historial/conclucion-egreso/getData', $data);
}

public function dataConEg(){
$data['id_historial']=$this->input->post('historial_id');
$id_user=$this->input->post('user_id');
$data['id_user']=$id_user;
 $data['id_hosp']=$this->input->post('id_hosp');
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$id=$this->input->post('id');
$sql ="SELECT *  FROM  hosp_conclusion_ingreso WHERE id=$id";
$data['queryexneu'] =$this->db->query($sql);
 $this->load->view('getPatientAge');
$this->load->view('hospitalizacion/historial/conclucion-egreso/data', $data);
}






public function dataEvCon(){
$data['id_historial']=$this->input->post('historial_id');
$data['id_hosp']=$this->input->post('id_hosp');
$id_user=$this->input->post('user_id');
$data['id_user']=$id_user;
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$id=$this->input->post('id');
$sql ="SELECT *  FROM   hosp_eval_cond WHERE id=$id";
$data['queryexneu'] =$this->db->query($sql);
 $this->load->view('getPatientAge');
$this->load->view('hospitalizacion/historial/evaluacion-condicion/data', $data);
}


public function data_exam_neuro(){
$data['id_historial']=$this->input->post('historial_id');
$data['id_hosp']=$this->input->post('id_hosp');
$id_user=$this->input->post('user_id');
$data['id_user']=$id_user;
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$id=$this->input->post('id');
$sql ="SELECT *  FROM hosp_exam_neuro WHERE id=$id";
$data['queryexneu'] =$this->db->query($sql);
 $this->load->view('getPatientAge');
$this->load->view('hospitalizacion/historial/exam-neuro/form-data', $data);
}




public function saveHospitalizacionPatient(){
	$savefields;
	 $id_patient =$this->input->post('id_patient');
   $id_user= $this->input->post('id_user');
   $id_centro= $this->input->post('id_centro');
   $id_hosp=$this->input->post('id_hosp');
  $inserted_by=$this->input->post('id_user');
  $updated_by=$this->input->post('id_user');
  $inserted_time=date("Y-m-d H:i:s");
	$hallazgo= $this->input->post('hallazgo');
	$action= $this->input->post('action');
	/*Conclusión Del Egreso*/
	$resumen_hallasgos= $this->input->post('resumen_hallasgos');
	$resumen_intervenciones= $this->input->post('resumen_intervenciones');
	$condicion_alta= $this->input->post('condicion_alta');
	$causa_egreso= $this->input->post('causa_egreso');
	$destino_referimiento= $this->input->post('destino_referimiento');
	$diag_alta_diag1= $this->input->post('diag_alta_diag1');
	$diag_alta_diag2= $this->input->post('diag_alta_diag2');
	
	$infeccion_herida1= $this->input->post('infeccion_herida');
$infeccion_herida = (isset($infeccion_herida1)) ? 1 : 0;

$morta_post1= $this->input->post('morta_post');
$morta_post = (isset($morta_post1)) ? 1 : 0;

$morta_int1= $this->input->post('morta_int');
$morta_int = (isset($morta_int1)) ? 1 : 0;
	

 if($action=='guardarConAlta' ){
	 $response['page'] =  'guardarConAlta';
if($hallazgo ==""){
	$response['status'] =  1;
$response['message'] = 'Campo <strong>hallazgo positivo</strong> del examen fisico es obligatorio!'; 
$savefields=0;
}
else if($resumen_hallasgos==""){
$response['status'] =  2;
$response['message'] = 'Campo <strong>Resumen de los hallasgos</strong> de la Conclusión Del Egreso es obligatorio!';
$savefields=0;
}

else if($resumen_intervenciones==""){
$response['status'] =  3;
$response['message'] = 'Campo <strong>Resumen de intervenciones</strong> de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
} 

else if($condicion_alta==""){
$response['status'] =  4;
$response['message'] = 'Campo <strong>Condición De Alta</strong>  de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else if($causa_egreso==""){
$response['status'] =  5;
$response['message'] = 'Campo <strong>Causa De Egresos</strong> de la Conclusión Del Egreso es obligatorio!';
$savefields=0;
}

else if($destino_referimiento==""){
$response['status'] =  6;
$response['message'] = 'Campo <strong>Destino/Referimiento</strong>  de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else if($diag_alta_diag1==""){
$response['status'] =  7;
$response['message'] = 'Campo <strong>DIAGNOSTICO(1)</strong> de la Conclusión Del Egreso es obligatorio!';	
$savefields=0;
}

else{

$savefields=1;
$saveSign = array(
'peso'=> $this->input->post('peso'),
'kg'=> $this->input->post('kg'),
'talla'=> $this->input->post('talla'),
'imc'=> $this->input->post('imc'),
'ta'=> $this->input->post('ta'),
'fr'=> $this->input->post('fr'),
'fc'=> $this->input->post('fc'),
'hg'=> $this->input->post('hg'),
'tempo'=> $this->input->post('tempo'),
'glicemia'=>$this->input->post('glicemia'),
'pulso'=> $this->input->post('pulso'),
'radio'=> $this->input->post('radio_signo'),
'fcf'=>$this->input->post('fcf'),
'satoe'=> $this->input->post('satoe'),
'hallazgo'=> $this->input->post('hallazgo'),
'historial_id'=>$id_patient,
'inserted_by'=> $id_user,
'updated_by'=> $id_user,
 'centro'=> $id_centro,
'inserted_time'=> $inserted_time,
'updated_time'=> $inserted_time,
'id_user'=> $id_user,
'id_hosp'=>$id_hosp
);
$this->db->insert("emergency_signo_vitales",$saveSign);

$conEg = array(
  'resumen_hallasgos'=> $this->input->post('resumen_hallasgos'),
  'resumen_intervenciones'=> $this->input->post('resumen_intervenciones'),
  'condicion_alta'=> $this->input->post('condicion_alta'),
  'causa_egreso'=> $this->input->post('causa_egreso'),
  'destino_referimiento'=> $this->input->post('destino_referimiento'),
  'diagnostico_autopsia'=> $this->input->post('diagnostico_autopsia'),
  'equipo_medico'=> $this->input->post('equipo_medico'),
  'diag_alta_diag1'=> $this->input->post('diag_alta_diag1'),
   'diag_alta_diag2'=> $this->input->post('diag_alta_diag2'),
  'infeccion_herida'=> $infeccion_herida,
  'morta_post'=> $morta_post,
  'morta_int'=> $morta_int,
   'diag_alta_diag3'=> $this->input->post('diag_alta_diag3'),
   'diag_alta_diag4'=> $this->input->post('diag_alta_diag4'),
   'id_patient' =>$id_patient,
   'id_user'=> $id_user,
   'id_centro'=> $id_centro,
   'id_hosp'=> $id_hosp,
  'inserted_by'=> $id_user,
  'updated_by'=> $id_user,
  'inserted_time'=> $inserted_time,
  'updated_time'=> $inserted_time
);

$this->db->insert("hosp_conclusion_ingreso",$conEg);	

$data = array(
  'alta'=>1,
  'fecha_alta' =>$inserted_time
);

$where= array(
  'id' =>$id_hosp
);

$this->db->where($where);
$this->db->update("hospitalization_data",$data);
	
}
	
}

else if($action=='guardarSinAlta' ){
	$response['page'] =  'guardarSinAlta';
if($hallazgo ==""){
	$response['status'] =  1;
$response['message'] = 'Campo <strong>hallazgo positivo</strong> del examen fisico es obligatorio!'; 
$savefields=0;
}else{
$savefields=1;
$saveSign = array(
'peso'=> $this->input->post('peso'),
'kg'=> $this->input->post('kg'),
'talla'=> $this->input->post('talla'),
'imc'=> $this->input->post('imc'),
'ta'=> $this->input->post('ta'),
'fr'=> $this->input->post('fr'),
'fc'=> $this->input->post('fc'),
'hg'=> $this->input->post('hg'),
'tempo'=> $this->input->post('tempo'),
'glicemia'=>$this->input->post('glicemia'),
'pulso'=> $this->input->post('pulso'),
'radio'=> $this->input->post('radio_signo'),
'fcf'=>$this->input->post('fcf'),
'satoe'=> $this->input->post('satoe'),
'hallazgo'=> $this->input->post('hallazgo'),
'historial_id'=>$id_patient,
'inserted_by'=> $id_user,
'updated_by'=> $id_user,
 'centro'=> $id_centro,
'inserted_time'=> $inserted_time,
'updated_time'=> $inserted_time,
'id_user'=> $id_user,
'id_hosp'=>$id_hosp
);
$this->db->insert("emergency_signo_vitales",$saveSign);


if($this->input->post('conEgFields')==1){
$conEg = array(
  'resumen_hallasgos'=> $this->input->post('resumen_hallasgos'),
  'resumen_intervenciones'=> $this->input->post('resumen_intervenciones'),
  'condicion_alta'=> $this->input->post('condicion_alta'),
  'causa_egreso'=> $this->input->post('causa_egreso'),
  'destino_referimiento'=> $this->input->post('destino_referimiento'),
  'diagnostico_autopsia'=> $this->input->post('diagnostico_autopsia'),
  'equipo_medico'=> $this->input->post('equipo_medico'),
  'diag_alta_diag1'=> $this->input->post('diag_alta_diag1'),
   'diag_alta_diag2'=> $this->input->post('diag_alta_diag2'),
  'infeccion_herida'=> $infeccion_herida,
  'morta_post'=> $morta_post,
  'morta_int'=> $morta_int,
   'diag_alta_diag3'=> $this->input->post('diag_alta_diag3'),
   'diag_alta_diag4'=> $this->input->post('diag_alta_diag4'),
   'id_patient' =>$id_patient,
   'id_user'=> $id_user,
   'id_centro'=> $id_centro,
   'id_hosp'=> $id_hosp,
  'inserted_by'=> $id_user,
  'updated_by'=> $id_user,
  'inserted_time'=> $inserted_time,
  'updated_time'=> $inserted_time
);

$this->db->insert("hosp_conclusion_ingreso",$conEg);
	
}



}

 }
 
 else{
$response['status'] =  -1;
$savefields=1;

 }
 

echo json_encode($response);

//-------CHECK IF EXAM SIS HAS DATA BEFORE SAVING
 //if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $this->input->post('fieldsExamSis')==1 && $savefields==1 )
if($action=='guardarConAlta' || $action=='guardarSinAlta') 
 {
 $saveExamSis= array(
'sisneuro'=> $this->input->post('sisneuro'),
'neurologico'=> $this->input->post('neurologico'),
'siscardio'=> $this->input->post('siscardio'),
'cardiova'=> $this->input->post('cardiova'),
'sist_uro'=> $this->input->post('sist_uro'),
'urogenital'=> $this->input->post('urogenital'),
'sis_mu_e'=> $this->input->post('sis_mu_e'),
'musculoes'=> $this->input->post('musculoes'),
'sist_resp'=> $this->input->post('sist_resp'),
'nervioso'=> $this->input->post('nervioso'),
'linfatico'=> $this->input->post('linfatico'),
'digestivo'=> $this->input->post('digestivo'),
'respiratorio'=> $this->input->post('respiratorio'),
'genitourinario'=> $this->input->post('genitourinario'),
'sist_diges'=> $this->input->post('sist_diges'),
'sist_endo'=> $this->input->post('sist_endo'),
'endocrino'=> $this->input->post('endocrino'),
'sist_rela'=> $this->input->post('sist_rela'),
'otros_ex_sis'=> $this->input->post('otros_ex_sis'),
'cardiova'=> $this->input->post('cardiova'),
'dorsales'=> $this->input->post('dorsales'),
'historial_id'=>$id_patient,
'inserted_by'=> $id_user,
'updated_by'=> $id_user,
'inserted_time'=> $inserted_time,
'updated_time'=> $inserted_time,
'id_user'=> $id_user


);
$this->db->insert("h_c_examen_sistema",$saveExamSis);
 $this->model_admin->DeleteEmptyExameneSistema($id_patient);
 }

//-------CHECK IF EXAM NEURO HAS DATA BEFORE SAVING

 if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $savefields==1 && ($this->input->post('examFneuroFields')==1 || $this->input->post('examNeuroCheckbox')>=1))
 {

$espontanea= $this->input->post('espontanea');
$espontanea1 = (isset($espontanea)) ? 1 : 0;
$a_la_orden_verbal= $this->input->post('a_la_orden_verbal');
$a_la_orden_verbal1 = (isset($a_la_orden_verbal)) ? 1 : 0;
$a_estimulo_doloroso= $this->input->post('a_estimulo_doloroso');
$a_estimulo_doloroso1 = (isset($a_estimulo_doloroso)) ? 1 : 0;
$no_ay_respuesta= $this->input->post('no_ay_respuesta');
$no_ay_respuesta1 = (isset($no_ay_respuesta)) ? 1 : 0;
$orientada= $this->input->post('orientada');
$orientada1 = (isset($orientada)) ? 1 : 0;
$confusa= $this->input->post('confusa');
$confusa1 = (isset($confusa)) ? 1 : 0;
$inapropriada= $this->input->post('inapropriada');
$inapropriada1 = (isset($inapropriada)) ? 1 : 0;
$incomprensible= $this->input->post('incomprensible');
$incomprensible1 = (isset($incomprensible)) ? 1 : 0;
$a_la_orden_verbal_6= $this->input->post('a_la_orden_verbal_6');
$a_la_orden_verbal_61 = (isset($a_la_orden_verbal_6)) ? 1 : 0;
$localizar_dolor= $this->input->post('localizar_dolor');
$localizar_dolor1 = (isset($localizar_dolor)) ? 1 : 0;
$retiro_ante_el_dolor= $this->input->post('retiro_ante_el_dolor');
$retiro_ante_el_dolor1 = (isset($retiro_ante_el_dolor)) ? 1 : 0;
$flexion_normal= $this->input->post('flexion_normal');
$flexion_normal1 = (isset($flexion_normal)) ? 1 : 0;
$extension= $this->input->post('extension');
$extension1 = (isset($extension)) ? 1 : 0;
$no_hay_respuesta= $this->input->post('no_hay_respuesta');
$no_hay_respuesta1 = (isset($no_hay_respuesta)) ? 1 : 0;
  $saveExamNeu= array(
'exam_gen_neuro'=> $this->input->post('exam_gen_neuro'),
'olfatorio'=> $this->input->post('olfatorio'),
'optico'=> $this->input->post('optico'),
'motor_ocr_com'=> $this->input->post('motor_ocr_com'),
'patetica'=> $this->input->post('patetica'),
'trigemino'=>$this->input->post('trigemino'),
'motor_ocu_ext'=> $this->input->post('motor_ocu_ext'),
'facial'=> $this->input->post('facial'),
'estatoacustico'=> $this->input->post('estatoacustico'),
'glosofaringeo'=> $this->input->post('glosofaringeo'),
'neumogastrico'=>$this->input->post('neumogastrico'),
'espinal'=> $this->input->post('espinal'),
'hipo_mayor'=>$this->input->post('hipo_mayor'),
'sistema_motor'=> $this->input->post('sistema_motor'),
  'marcha'=> $this->input->post('marcha'),
 'espontanea'=> $espontanea1,
'a_la_orden_verbal'=> $a_la_orden_verbal1,
'a_estimulo_doloroso'=> $a_estimulo_doloroso1,
'no_ay_respuesta'=> $no_ay_respuesta1,
'orientada'=>$orientada1,
'confusa'=> $confusa1,
'inapropriada'=> $inapropriada1,
'incomprensible'=> $incomprensible1,
'a_la_orden_verbal_6'=> $a_la_orden_verbal_61,
'localizar_dolor'=>$localizar_dolor1,
'retiro_ante_el_dolor'=> $retiro_ante_el_dolor1,
'flexion_normal'=>$flexion_normal1,
'extension'=>$extension1,
'no_hay_respuesta'=> $no_hay_respuesta1,
'bicipital'=> $this->input->post('bicipital'),
'tricipital'=> $this->input->post('tricipital'),
'aquileo_y_clonus'=> $this->input->post('aquileo_y_clonus'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'dedo_dedo'=> $this->input->post('dedo_dedo'),
'dedo_nariz'=> $this->input->post('dedo_nariz'),
'talon_rod'=> $this->input->post('talon_rod'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'romberg'=> $this->input->post('romberg'),
'sensibilidad1'=> $this->input->post('sensibilidad1'),
'sensibilidad2'=> $this->input->post('sensibilidad2'),
'fondo_de_ojo'=> $this->input->post('fondo_de_ojo'),
 'updated_by'=> $id_user,
'updated_time'=>$inserted_time,
 'inserted_by'=> $id_user,
'inserted_time'=>$inserted_time,
'id_hosp'=>$id_hosp,
 'id_centro'=> $id_centro,
'id_pat'=>$id_patient

);

$this->db->insert("hosp_exam_neuro",$saveExamNeu);
}


//-----CHECK FOR ANT GENERAL-------------------------------------------

 if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $savefields==1 )
 {
$hab_t_drug=$this->input->post('hab_t_drug');
$todo_check= $this->input->post('todo_check');
$todo_check1 = (isset($todo_check)) ? 1 : 0;
//--------------------Cardiopatia--------------------------------------
$car_nin_check= $this->input->post('car_nin_check');
$car_nin_check1 = (isset($car_nin_check)) ? 1 : 0;
$madre_check= $this->input->post('madre_check');
$madre_check1 = (isset($madre_check)) ? 1 : 0;
$padre_check= $this->input->post('padre_check');
$padre_check1 = (isset($padre_check)) ? 1 : 0;
$car_h_check= $this->input->post('car_h_check');
$car_h_check1 = (isset($car_h_check)) ? 1 : 0;
$car_pe_check= $this->input->post('car_pe_check');
$car_pe_check1 = (isset($car_pe_check)) ? 1 : 0;
/*--------------------Hipertension--------------------------------------*/
$nin_check2= $this->input->post('nin_check2');
$nin_check22 = (isset($nin_check2)) ? 1 : 0;
$madre_check2= $this->input->post('madre_check2');
$madre_check22 = (isset($madre_check2)) ? 1 : 0;
$padre_check2= $this->input->post('padre_check2');
$padre_check22 = (isset($padre_check2)) ? 1 : 0;
$h_check2= $this->input->post('h_check2');
$h_check22 = (isset($h_check2)) ? 1 : 0;
$pe_check2= $this->input->post('pe_check2');
$pe_check22 = (isset($pe_check2)) ? 1 : 0;
//----------------------------Enf. Cerebrovascular------------------------------
$nin_check3= $this->input->post('nin_check3');
$nin_check33 = (isset($nin_check3)) ? 1 : 0;
$madre_check3= $this->input->post('madre_check3');
$madre_check33 = (isset($madre_check3)) ? 1 : 0;
$padre_check3= $this->input->post('padre_check3');
$padre_check33 = (isset($padre_check3)) ? 1 : 0;
$h_check3= $this->input->post('h_check3');
$h_check33 = (isset($h_check3)) ? 1 : 0;
$pe_check3= $this->input->post('pe_check3');
$pe_check33 = (isset($pe_check3)) ? 1 : 0;
//----------------------------Epilepsie--------------------------------
$nin_check4= $this->input->post('nin_check4');
$nin_check44 = (isset($nin_check4)) ? 1 : 0;
$madre_check4= $this->input->post('madre_check4');
$madre_check44 = (isset($madre_check4)) ? 1 : 0;
$padre_check4= $this->input->post('padre_check4');
$padre_check44 = (isset($padre_check4)) ? 1 : 0;
$h_check4= $this->input->post('h_check4');
$h_check44 = (isset($h_check4)) ? 1 : 0;
$pe_check4= $this->input->post('pe_check4');
$pe_check44 = (isset($pe_check4)) ? 1 : 0;
//=========================Asma Bronquial============================================
$nin_check5= $this->input->post('nin_check5');
$nin_check55 = (isset($nin_check5)) ? 1 : 0;
$madre_check5= $this->input->post('madre_check5');
$madre_check55 = (isset($madre_check5)) ? 1 : 0;
$padre_check5= $this->input->post('padre_check5');
$padre_check55 = (isset($padre_check5)) ? 1 : 0;
$h_check5= $this->input->post('h_check5');
$h_check55 = (isset($h_check5)) ? 1 : 0;
$pe_check5= $this->input->post('pe_check5');
$pe_check55 = (isset($pe_check5)) ? 1 : 0;

//=========================Enf. Repiratoria (Esp.)============================================
$nin_check05= $this->input->post('nin_check05');
$nin_check055 = (isset($nin_check05)) ? 1 : 0;
$madre_check05= $this->input->post('madre_check05');
$madre_check055 = (isset($madre_check05)) ? 1 : 0;
$padre_check05= $this->input->post('padre_check05');
$padre_check055 = (isset($padre_check05)) ? 1 : 0;
$h_check05= $this->input->post('h_check05');
$h_check055 = (isset($h_check05)) ? 1 : 0;
$pe_check05= $this->input->post('pe_check05');
$pe_check055 = (isset($pe_check05)) ? 1 : 0;

//=========================Tuberculosis============================================
$nin_check6= $this->input->post('nin_check6');
$nin_check66 = (isset($nin_check6)) ? 1 : 0;
$madre_check6= $this->input->post('madre_check6');
$madre_check66 = (isset($madre_check6)) ? 1 : 0;
$padre_check6= $this->input->post('padre_check6');
$padre_check66 = (isset($padre_check6)) ? 1 : 0;
$h_check6= $this->input->post('h_check6');
$h_check66 = (isset($h_check6)) ? 1 : 0;
$pe_check6= $this->input->post('pe_check6');
$pe_check66 = (isset($pe_check6)) ? 1 : 0;
//-------------------------Diabetes--------------------------
$nin_check7= $this->input->post('nin_check7');
$nin_check77 = (isset($nin_check7)) ? 1 : 0;
$madre_check7= $this->input->post('madre_check7');
$madre_check77 = (isset($madre_check7)) ? 1 : 0;
$padre_check7= $this->input->post('padre_check7');
$padre_check77 = (isset($padre_check7)) ? 1 : 0;
$h_check7= $this->input->post('h_check7');
$h_check77 = (isset($h_check7)) ? 1 : 0;
$pe_check7= $this->input->post('pe_check7');
$pe_check77 = (isset($pe_check7)) ? 1 : 0;
//------------------------------------------------------------------
//-------------------------Tiroides--------------------------
$nin_check8= $this->input->post('nin_check8');
$nin_check88 = (isset($nin_check8)) ? 1 : 0;
$madre_check8= $this->input->post('madre_check8');
$madre_check88 = (isset($madre_check8)) ? 1 : 0;
$padre_check8= $this->input->post('padre_check8');
$padre_check88 = (isset($padre_check8)) ? 1 : 0;
$h_check8= $this->input->post('h_check8');
$h_check88 = (isset($h_check8)) ? 1 : 0;
$pe_check8= $this->input->post('pe_check8');
$pe_check88 = (isset($pe_check8)) ? 1 : 0;
//-------------------------Hepatitis--------------------------
$nin_check9= $this->input->post('nin_check9');
$nin_check99 = (isset($nin_check9)) ? 1 : 0;
$madre_check9= $this->input->post('madre_check9');
$madre_check99 = (isset($madre_check9)) ? 1 : 0;
$padre_check9= $this->input->post('padre_check9');
$padre_check99 = (isset($padre_check9)) ? 1 : 0;
$h_check9= $this->input->post('h_check9');
$h_check99 = (isset($h_check9)) ? 1 : 0;
$pe_check9= $this->input->post('pe_check9');
$pe_check99 = (isset($pe_check9)) ? 1 : 0;
//-------------------------Enfermedades Renales--------------------------
$nin_check10= $this->input->post('nin_check10');
$nin_check1010 = (isset($nin_check10)) ? 1 : 0;
$madre_check10= $this->input->post('madre_check10');
$madre_check1010 = (isset($madre_check10)) ? 1 : 0;
$padre_check10= $this->input->post('padre_check10');
$padre_check1010 = (isset($padre_check10)) ? 1 : 0;
$h_check10= $this->input->post('h_check10');
$h_check1010 = (isset($h_check10)) ? 1 : 0;
$pe_check10= $this->input->post('pe_check10');
$pe_check1010 = (isset($pe_check10)) ? 1 : 0;
//-------------------------Falcemia--------------------------
$nin_check11= $this->input->post('nin_check11');
$nin_check1111 = (isset($nin_check11)) ? 1 : 0;
$madre_check11= $this->input->post('madre_check11');
$madre_check1111 = (isset($madre_check11)) ? 1 : 0;
$padre_check11= $this->input->post('padre_check11');
$padre_check1111 = (isset($padre_check11)) ? 1 : 0;
$h_check11= $this->input->post('h_check11');
$h_check1111 = (isset($h_check11)) ? 1 : 0;
$pe_check11= $this->input->post('pe_check11');
$pe_check1111 = (isset($pe_check11)) ? 1 : 0;
//-------------------------Neoplasias--------------------------
$neop_check12= $this->input->post('neop_check12');
$neop_check1212 = (isset($neop_check12)) ? 1 : 0;
$madre_check12= $this->input->post('madre_check12');
$madre_check1212 = (isset($madre_check12)) ? 1 : 0;
$padre_check12= $this->input->post('padre_check12');
$padre_check1212 = (isset($padre_check12)) ? 1 : 0;
$h_check12= $this->input->post('h_check12');
$h_check1212 = (isset($h_check12)) ? 1 : 0;
$pe_check12= $this->input->post('pe_check12');
$pe_check1212 = (isset($pe_check12)) ? 1 : 0;
//-------------------------ENf. Psiquiatricas--------------------------
$psi_check13= $this->input->post('psi_check13');
$psi_check1313 = (isset($psi_check13)) ? 1 : 0;
$madre_check13= $this->input->post('madre_check13');
$madre_check1313 = (isset($madre_check13)) ? 1 : 0;
$padre_check13= $this->input->post('padre_check13');
$padre_check1313 = (isset($padre_check13)) ? 1 : 0;
$h_check13= $this->input->post('h_check13');
$h_check1313 = (isset($h_check13)) ? 1 : 0;
$pe_check13= $this->input->post('pe_check13');
$pe_check1313 = (isset($pe_check13)) ? 1 : 0;
//-------------------------Obesidad--------------------------
$obs_check14= $this->input->post('obs_check14');
$obs_check1414 = (isset($obs_check14)) ? 1 : 0;
$madre_check14= $this->input->post('madre_check14');
$madre_check1414 = (isset($madre_check14)) ? 1 : 0;
$padre_check14= $this->input->post('padre_check14');
$padre_check1414 = (isset($padre_check14)) ? 1 : 0;
$h_check14= $this->input->post('h_check14');
$h_check1414 = (isset($h_check14)) ? 1 : 0;
$pe_check14= $this->input->post('pe_check14');
$pe_check1414 = (isset($pe_check14)) ? 1 : 0;
//-------------------------Ulcera Peptica--------------------------
$ulp_check15= $this->input->post('ulp_check15');
$ulp_check1515 = (isset($ulp_check15)) ? 1 : 0;
$madre_check15= $this->input->post('madre_check15');
$madre_check1515 = (isset($madre_check15)) ? 1 : 0;
$padre_check15= $this->input->post('padre_check15');
$padre_check1515 = (isset($padre_check15)) ? 1 : 0;
$h_check15= $this->input->post('h_check15');
$h_check1515 = (isset($h_check15)) ? 1 : 0;
$pe_check15= $this->input->post('pe_check15');
$pe_check1515 = (isset($pe_check15)) ? 1 : 0;
//-------------------------Artritis, Gota--------------------------
$art_check16= $this->input->post('art_check16');
$art_check1616 = (isset($art_check16)) ? 1 : 0;
$madre_check16= $this->input->post('madre_check16');
$madre_check1616 = (isset($madre_check16)) ? 1 : 0;
$padre_check16= $this->input->post('padre_check16');
$padre_check1616 = (isset($padre_check16)) ? 1 : 0;
$h_check16= $this->input->post('h_check16');
$h_check1616 = (isset($h_check16)) ? 1 : 0;
$pe_check16= $this->input->post('pe_check16');
$pe_check1616 = (isset($pe_check16)) ? 1 : 0;

//-------------------------Enf. Hematológicas (Esp.)--------------------------
$art_check016= $this->input->post('art_check016');
$art_check01616 = (isset($art_check016)) ? 1 : 0;
$madre_check016= $this->input->post('madre_check016');
$madre_check01616 = (isset($madre_check016)) ? 1 : 0;
$padre_check016= $this->input->post('padre_check016');
$padre_check01616 = (isset($padre_check016)) ? 1 : 0;
$h_check016= $this->input->post('h_check016');
$h_check01616 = (isset($h_check016)) ? 1 : 0;
$pe_check016= $this->input->post('pe_check016');
$pe_check01616 = (isset($pe_check016)) ? 1 : 0;

//-------------------------Zika--------------------------
$zika_check17= $this->input->post('zika_check17');
$zika_check1717 = (isset($zika_check17)) ? 1 : 0;
$madre_check17= $this->input->post('madre_check17');
$madre_check1717 = (isset($madre_check17)) ? 1 : 0;
$padre_check17= $this->input->post('padre_check17');
$padre_check1717 = (isset($padre_check17)) ? 1 : 0;
$h_check17= $this->input->post('h_check17');
$h_check1717 = (isset($h_check17)) ? 1 : 0;
$pe_check17= $this->input->post('pe_check17');
$pe_check1717 = (isset($pe_check17)) ? 1 : 0;
//---------------------------------------------------------------------
$save = array(
'todo'=> $todo_check1,
//--------------------Cardiopatia--------------------------------------
'car_nin'=> $car_nin_check1,
'car_m'=> $madre_check1,
'car_p'=> $padre_check1,
'car_h'=> $car_h_check1,
'car_pe'=>$car_pe_check1,
'car_text'=> $this->input->post('car_text'),
/*-----------------Hipertension------------------------*/
'hip_nin'=> $nin_check22,
'hip_m'=> $madre_check22,
'hip_p'=> $padre_check22,
'hip_h'=> $h_check22,
'hip_pe'=>$pe_check22,
'hip_text'=> $this->input->post('hip_text'),
/*--------------Enf. Cerebrovascular----------------*/
'ec_nin'=> $nin_check33,
'ec_m'=> $madre_check33,
'ec_p'=> $padre_check33,
'ec_h'=> $h_check33,
'ec_pe'=>$pe_check33,
'ec_text'=> $this->input->post('ec_text'),
/*--------------Epilepsie---------------------------*/
'ep_nin'=> $nin_check44,
'ep_m'=> $madre_check44,
'ep_p'=> $padre_check44,
'ep_h'=> $h_check44,
'ep_pe'=>$pe_check44,
'ep_text'=> $this->input->post('ep_text'),
/*--------------Asma Bronquial---------------------------*/
'as_nin'=> $nin_check55,
'as_m'=> $madre_check55,
'as_p'=> $padre_check55,
'as_h'=> $h_check55,
'as_pe'=>$pe_check55,
'as_text'=> $this->input->post('as_text'),
/*--------------Enf. Repiratoria (Esp.)---------------------------*/
'enre_nin'=> $nin_check055,
'enre_m'=> $madre_check055,
'enre_p'=> $padre_check055,
'enre_h'=> $h_check055,
'enre_pe'=>$pe_check055,
'enre_text'=> $this->input->post('enre_text'),
/*--------------Tuberculosis---------------------------*/
'tub_nin'=> $nin_check66,
'tub_m'=> $madre_check66,
'tub_p'=> $padre_check66,
'tub_h'=> $h_check66,
'tub_pe'=>$pe_check66,
'tub_text'=> $this->input->post('tub_text'),
//-----------------------Diabetes----------------------------
'dia_nin'=> $nin_check77,
'dia_m'=> $madre_check77,
'dia_p'=> $padre_check77,
'dia_h'=> $h_check77,
'dia_pe'=>$pe_check77,
'dia_text'=> $this->input->post('dia_text'),
//-----------------------Tiroides----------------------------
'tir_nin'=> $nin_check88,
'tir_m'=> $madre_check88,
'tir_p'=> $padre_check88,
'tir_h'=> $h_check88,
'tir_pe'=>$pe_check88,
'tir_text'=> $this->input->post('tir_text'),
//-----------------------Hepatitis----------------------------
'hep_tipo'=> $this->input->post('hep_tipo'),
'hep_nin'=> $nin_check99,
'hep_m'=> $madre_check99,
'hep_p'=> $padre_check99,
'hep_h'=> $h_check99,
'hep_pe'=>$pe_check99,
'hep_text'=> $this->input->post('hep_text'),
//-----------------------Enfermedades Renales----------------------------
'enfr_nin'=> $nin_check1010,
'enfr_m'=> $madre_check1010,
'enfr_p'=> $padre_check1010,
'enfr_h'=> $h_check1010,
'enfr_pe'=>$pe_check1010,
'enfr_text'=> $this->input->post('enfr_text'),
//-----------------------Falcemia----------------------------
'falc_nin'=> $nin_check1111,
'falc_m'=> $madre_check1111,
'falc_p'=> $padre_check1111,
'falc_h'=> $h_check1111,
'falc_pe'=>$pe_check1111,
'falc_text'=> $this->input->post('falc_text'),
//-----------------------Neoplasias----------------------------
'neop_nin'=> $neop_check1212,
'neop_m'=> $madre_check1212,
'neop_p'=> $padre_check1212,
'neop_h'=> $h_check1212,
'neop_pe'=>$pe_check1212,
'neop_text'=> $this->input->post('neop_text'),
//-----------------------ENf. Psiquiatricas----------------------------
'psi_nin'=> $psi_check1313,
'psi_m'=> $madre_check1313,
'psi_p'=> $padre_check1313,
'psi_h'=> $h_check1313,
'psi_pe'=>$pe_check1313,
'psi_text'=> $this->input->post('psi_text'),
//-----------------------Obesidad----------------------------
'obs_nin'=> $obs_check1414,
'obs_m'=> $madre_check1414,
'obs_p'=> $padre_check1414,
'obs_h'=> $h_check1414,
'obs_pe'=>$pe_check1414,
'obs_text'=> $this->input->post('obs_text'),
//-----------------------Ulcera Peptica----------------------------
'ulp_nin'=> $ulp_check1515,
'ulp_m'=> $madre_check1515,
'ulp_p'=> $padre_check1515,
'ulp_h'=> $h_check1515,
'ulp_pe'=>$pe_check1515,
'ulp_text'=> $this->input->post('ulp_text'),
//-----------------------Artritis, Gota----------------------------
'art_nin'=> $art_check1616,
'art_m'=> $madre_check1616,
'art_p'=> $padre_check1616,
'art_h'=> $h_check1616,
'art_pe'=>$pe_check1616,
'art_text'=> $this->input->post('art_text'),
//-----------------------Enf. Hematológicas (Esp.)----------------------------
'hem_nin'=> $art_check01616,
'hem_m'=> $madre_check01616,
'hem_p'=> $padre_check01616,
'hem_h'=> $h_check01616,
'hem_pe'=>$pe_check01616,
'hem_text'=> $this->input->post('hem_text'),
//-----------------------Zika----------------------------
'zika_nin'=> $zika_check1717,
'zika_m'=> $madre_check1717,
'zika_p'=> $padre_check1717,
'zika_h'=> $h_check1717,
'zika_pe'=>$pe_check1717,
'zika_text'=> $this->input->post('zika_text'),
//-----------------------------------------------------------
'otros'=> $this->input->post('otros'),
'historial_id'=> $id_patient,
'date_insert'=> $inserted_time,
'date_modif'=> $inserted_time,
'operator'=> $id_user,
'update_by'=> $id_user,
'id_user'=> $id_user
);
$idMarPos=$this->model_admin->marquePositivo($save);
$counMarP=$this->model_admin->countAnte1($id_patient);
if($counMarP > 1){
$this->model_admin->DeleteDuplicateMarqueP($idMarPos);
}

$newMpat=$this->input->post('newMpat');
if($newMpat){
foreach ($newMpat as $key=>$med) {
  $savecd = array(
  'medicine'=> $med,
'id_patient' => $id_patient,
'part' => 'gnl',
'user_id' =>$id_user
  );

$this->model_admin->SaveMedicine($savecd);
}
}
//-----------------------Desarollo----------------------------

$save2 = array(
'maltratof'=> $this->input->post('textmaltrato_g'),
'abusos'=> $this->input->post('textabuso_g'),
'negligencia'=> $this->input->post('textneg_g'),
'maltrato'=> $this->input->post('maltratoemo_g'),
'alimentos'=> $this->input->post('alimentos_al'),
'medicamentos'=> $this->input->post('medicamentos_al'),
'otros'=> $this->input->post('otros_al'),
'historial_id'=> $id_patient,
'date_insert'=> $inserted_time,
'update_time'=> $inserted_time,
'inserted_by'=> $id_user,
'update_by'=> $id_user
);
$idDes=$this->model_admin->DesantAl($save2);
  $counDesa=$this->model_admin->countDesarollo($id_patient);
	if($counDesa > 1){
	$this->model_admin->DeleteEmptyDesarollo($idDes);
	}
//$this->model_admin->DeleteEmptyDesarollo($id_patient);
//-----------------------Otros antecedentes----------------------------
$save3 = array(
'quirurgicos'=> $this->input->post('quirurgicos'),
'gineco'=> $this->input->post('gineco'),
'abdominal'=> $this->input->post('abdominal'),
'toracica'=> $this->input->post('toracica'),
'transfusion'=> $this->input->post('transfusion'),
'otros1'=> $this->input->post('otros1_g'),
'hepatis'=> $this->input->post('hepatis'),
'hpv'=> $this->input->post('hpv'),
'toxoide'=> $this->input->post('toxoide'),
//'otros2'=> $this->input->post('otros2'),
'grouposang'=> $this->input->post('grouposang'),
'tipificacion'=> $this->input->post('tipificacion'),
'rh'=> $this->input->post('rhoa'),
'violencia1'=> $this->input->post('violencia1'),
'violencia2'=> $this->input->post('violencia2'),
'violencia3'=> $this->input->post('violencia3'),
'violencia4'=> $this->input->post('violencia4'),
'historial_id'=> $id_patient,
'inserted_time'=> $inserted_time,
'inserted_by'=> $id_user
);
$idAtO=$this->model_admin->saveAnteOtros($save3);
   $counAntOt=$this->model_admin->countAntOtros($id_patient);
	if($counAntOt > 1){
	$this->model_admin->DeleteAntOtros($idAtO);
	}
//--------Medicamentos habituales-----------------------------

if(!empty($medicine))
{
foreach ($medicine as $med) {
	$save = array(
	  'medicine'  => $med,
	 'id_patient' => $id_patient,
	 'user_id' =>$id_user
	);
		$this->model_admin->SaveMedicine($save);
	};
	};
$this->model_admin->deleteMedNinguno();
//--------HABITOS toxicos-----------------------------
$save4 = array(
  'cafe_cant'=> $this->input->post('hab_c_caf'),
  'cafe_frec'=> $this->input->post('hab_f_caf'),
  'pipa_cant'=> $this->input->post('hab_c_pip'),
  'pipa_frec'=> $this->input->post('hab_f_pip'),
  'ciga_can'=> $this->input->post('hab_c_ciga'),
  'ciga_frec'=> $this->input->post('hab_f_ciga'),
  'alc_can'=> $this->input->post('hab_c_al'),
  'alc_frec'=> $this->input->post('hab_f_al'),
  'tab_can'=> $this->input->post('hab_c_tab'),
  'tab_frec'=> $this->input->post('hab_f_tab'),
  'hab_c_drug'=> $this->input->post('hab_c_drug'),
  'hab_f_drug'=> $this->input->post('hab_f_drug'),
  'hookah'=> $this->input->post('hookah'),
  'hab_f_hookah'=> $this->input->post('hab_f_hookah'),
  'historial_id'=> $id_patient,
  'inserted_by'=> $id_user,
  'inserted_time'=> $inserted_time,
  'update_time'=> $inserted_time
   );
   $idHabT=$this->model_admin->saveHabitosToxicos($save4);


   $counHabT=$this->model_admin->countHabitosToxicos($id_patient);
	if($counHabT > 1){
	$this->model_admin->DeleteEmptyHabitosToxicos($idHabT);
	}

   if(!empty($hab_t_drug)){
   foreach ($hab_t_drug as $drug) {
	$save = array(
	  'name' => $drug,
	 'id_patient' => $id_patient
	);
		$this->model_admin->SaveDrug($save);
	};
   }
   }




 if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $savefields==1  )
 {
//----------------------save ant ssr------------------------------------------------------

$sifilisc= $this->input->post('sifilisc');
$sifilisc1 = (isset($sifilisc)) ? 1 : 0;

$gonorreac= $this->input->post('gonorreac');
$gonorreac1 = (isset($gonorreac)) ? 1 : 0;

$clamidiac= $this->input->post('clamidiac');
$clamidiac1 = (isset($clamidiac)) ? 1 : 0;


$save1= array(
'optradio'=> $this->input->post('optradio'),
'edad'=> $this->input->post('edad'),
'numero'=> $this->input->post('numero'),
'sexual'=> $this->input->post('sexual'),
'pareja'=> $this->input->post('pareja'),
'califica'=> $this->input->post('califica'),
'califica_text'=> $this->input->post('califica_text'),
'utilizo'=> $this->input->post('utilizo'),
'sexual2'=> $this->input->post('sexual2'),
'planif'=> $this->input->post('planif'),
'planif_text'=> $this->input->post('planif_text'),
'embara'=> $this->input->post('embara'),
'menarquia'=> $this->input->post('menarquia'),
'fecha_ul_m'=> $this->input->post('fecha_ul_m'),
'fecha_ovulacion'=> $this->input->post('fechaOvulacion'),
'semana_fertil'=> $this->input->post('semanaFertil'),
'amenorea_text'=> $this->input->post('amenoreaText'),
'amenorea_tiempo'=> $this->input->post('amenoreaTiempo'),
'menaop'=> $this->input->post('menaop'),
'cliclo'=> $this->input->post('cliclo'),
'cliclo_text'=> $this->input->post('cliclo_text'),
'dura_sang'=> $this->input->post('dura_sang'),
'dismeno'=> $this->input->post('dismeno'),
'fecha_ul_pap'=> $this->input->post('fecha_ul_pap'),
'ant_pap_re'=> $this->input->post('ant_pap_re'),
'ant_pap_re_text'=> $this->input->post('ant_pap_re_text'),
'realiza_auto'=> $this->input->post('realiza_auto'),
'realiza_auto_text'=> $this->input->post('realiza_auto_text'),
'fecha_ul_mama'=> $this->input->post('fecha_ul_mama'),
'p'=> $this->input->post('p'),
'a'=> $this->input->post('a'),
'c'=> $this->input->post('c'),
'e'=> $this->input->post('e'),
'totalGest'=> $this->input->post('totalGest'),
//'otro_infeccion'=> $this->input->post('otro_infeccion'),
'otro_infeccion1'=> $this->input->post('otro_infeccion1'),
'cant_sang'=> $this->input->post('cant_sang'),
'nuligesta'=> $this->input->post('nuligesta'),
'complica'=> $this->input->post('complica'),
'complica_text'=> $this->input->post('complica_text'),
'complica_dur'=> $this->input->post('complica_dur'),
'complica_dur_text'=> $this->input->post('complica_dur_text'),
'infec_tran'=> $this->input->post('infec_tran'),
'inserted_by'=> $id_user,
'updated_by'=> $id_user,
'hist_id'=> $id_patient,
'date_time'=> $inserted_time,
'update_time'=> $inserted_time,
'infeccion1'=> $sifilisc1,
'infeccion2'=> $gonorreac1,
'infeccion3'=> $clamidiac1,
'id_user'=>$id_user
);

$this->model_admin->saveAntssr($save1);
$this->model_admin->DeleteEmptySSR($id_patient);
   }

 //if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $savefields==1 && ($this->input->post('obsFields')==1 || $this->input->post('obsCheckbox')>=1))
if(($action=='guardarConAlta' || $action=='guardarSinAlta') && $savefields==1 )
 {
$fiebre1= $this->input->post('fiebre1');
$fiebre = (isset($fiebre1)) ? 1 : 0;

$artra1= $this->input->post('artra1');
$artra = (isset($artra1)) ? 1 : 0;

$mia1= $this->input->post('mia1');
$mia = (isset($mia1)) ? 1 : 0;

$exa1= $this->input->post('exa1');
$exa = (isset($exa1)) ? 1 : 0;

$con1 = $this->input->post('con1');
$con  = (isset($con1)) ? 1 : 0;
$nig11 = $this->input->post('nig11');
$nig1  = (isset($nig11)) ? 1 : 0;

$nig22 = $this->input->post('nig22');
$nig2  = (isset($nig22)) ? 1 : 0;

$nig33 = $this->input->post('nig33');
$nig3  = (isset($nig33)) ? 1 : 0;
$operationobs= $this->input->post('operationobs');

$save= array(
'dia1'=> $this->input->post('dia1'),
'tbc1'=> $this->input->post('tbc1'),
'hip1'=> $this->input->post('hip1'),
'pelv'=> $this->input->post('pelv'),
'infert'=> $this->input->post('inf'),
'otros1'=> $this->input->post('otros1'),
'otros1_text'=> $this->input->post('otros1_text'),
'dia2'=> $this->input->post('dia2'),
'tbc2'=> $this->input->post('tbc2'),
'hip2'=> $this->input->post('hip2'),
'gem'=> $this->input->post('gem'),
'otros2'=> $this->input->post('otros2'),
'otros2_text'=> $this->input->post('otros2_text'),
'fiebre'=> $fiebre,
'artra'=> $artra,
'mia'=> $mia,
'exa'=> $exa,
'con'=> $con,
'hist_id'=> $id_patient,
'inserted_by'=> $id_user,
'updated_by'=> $id_user,
'inserted_time'=> $inserted_time,
'updated_time'=> $inserted_time,
'id_user'=>$id_user
);

$this->model_admin->saveObstetrico1($save);
$this->model_admin->DeleteEmptyObs1($id_patient);
//-----------------------------------------------------
$save1= array(
'nig1'=> $nig1,
'nig2'=> $nig2,
'nig3'=> $nig3,
'partos'=> $this->input->post('partos'),
'arbotos'=> $this->input->post('arbotos'),
'vaginales'=> $this->input->post('vaginales'),
'viven'=> $this->input->post('viven'),
'gestas'=> $this->input->post('gestas'),
'cesareas'=> $this->input->post('cesareas'),
'muertos1'=> $this->input->post('muertos1'),
'nacidov1'=> $this->input->post('nacidov1'),
'nacidom1'=> $this->input->post('nacidom1'),
'despues1s'=> $this->input->post('despues1s'),
'otrosc'=> $this->input->post('otrosc'),
'rn'=> $this->input->post('rn'),
'fin'=> $this->input->post('fin'),
'hist_id'=>$id_patient
);

$this->model_admin->saveObstetrico2($save1);


//-----------------------------------------------------
$vdrl11= $this->input->post('vdrl11');
$prev_act= $this->input->post('prev_act');
$vdrl1 = (isset($vdrl11)) ? 1 : 0;
$vdrl22= $this->input->post('vdrl22');
$vdrl2 = (isset($vdrl22)) ? 1 : 0;
$prev_act1 = (isset($prev_act)) ? "si" : "no";
$save2= array(
'vdrl1'=> $vdrl1,
'vdrl2'=> $vdrl2,
'fecha1'=> $this->input->post('fecha1'),
'fecha2'=> $this->input->post('fecha2'),
'fecha3'=> $this->input->post('fecha3'),
'fecha4'=> $this->input->post('fecha4'),
'sono1'=> $this->input->post('sono1'),
'sono2'=> $this->input->post('sono2'),
'sono3'=> $this->input->post('sono3'),
'sono4'=> $this->input->post('sono4'),
'sonodia1'=> $this->input->post('sonodia1'),
'sonodia2'=> $this->input->post('sonodia2'),
'sonodia3'=> $this->input->post('sonodia3'),
'sonodia4'=> $this->input->post('sonodia4'),
'diarest1'=> $this->input->post('diarest1'),
'diarest2'=> $this->input->post('diarest2'),
'diarest3'=> $this->input->post('diarest3'),
'diarest4'=> $this->input->post('diarest4'),
'fpp1'=> $this->input->post('fpp1'),
'fpp2'=> $this->input->post('fpp2'),
'fpp3'=> $this->input->post('fpp3'),
'fpp4'=> $this->input->post('fpp4'),
'rest1'=> $this->input->post('rest1'),
'rest2'=> $this->input->post('rest2'),
'rest3'=> $this->input->post('rest3'),
'rest4'=> $this->input->post('rest4'),
'peso1'=> $this->input->post('peso1'),
'talla1'=> $this->input->post('talla1'),
'fum_cal_ges'=> $this->input->post('fum_cal_ges'),
'fpp_cal_ges'=> $this->input->post('fpp_cal_ges'),
'sem_act_a'=> $this->input->post('sem_act_a'),
'prev_act'=> $prev_act1,
'prev_act_mes'=> $this->input->post('prev_act_mes'),
'rr'=> $this->input->post('r2'),
'sencibil'=> $this->input->post('sencibil'),
'rh'=> $this->input->post('rh'),
'odont'=> $this->input->post('odont'),
'papani'=> $this->input->post('papani'),
'pelvis'=> $this->input->post('pelvis'),
'colp'=> $this->input->post('colp'),
'cevix'=> $this->input->post('cevix'),
'diasmes'=> $this->input->post('diasmes'),
'rh_option'=> $this->input->post('rh_option'),
'hist_id'=>$id_patient

);

$this->model_admin->saveObstetrico3($save2);

//-----------------------------------------------
$save3= array(
'pu_fecha1'=> $this->input->post('pu_fecha1'),
'pu_fecha2'=> $this->input->post('pu_fecha2'),
'pu_fecha3'=> $this->input->post('pu_fecha3'),
'pu_t1'=> $this->input->post('pu_t1'),
'pu_t2'=> $this->input->post('pu_t2'),
'pu_t3'=> $this->input->post('pu_t3'),
'pu_pul1'=> $this->input->post('pu_pul1'),
'pu_pul11'=> $this->input->post('pu_pul11'),
'pu_pul2'=> $this->input->post('pu_pul2'),
'pu_pul22'=> $this->input->post('pu_pul22'),
'pu_pul3'=> $this->input->post('pu_pul3'),
'pu_pul33'=> $this->input->post('pu_pul33'),
'pu_ten1'=> $this->input->post('pu_ten1'),
'pu_ten11'=> $this->input->post('pu_ten11'),
'pu_ten2'=> $this->input->post('pu_ten2'),
'pu_ten22'=> $this->input->post('pu_ten22'),
'pu_ten3'=> $this->input->post('pu_ten3'),
'pu_ten33'=> $this->input->post('pu_ten33'),
'pu_inv1'=> $this->input->post('pu_inv1'),
'pu_inv2'=> $this->input->post('pu_inv2'),
'pu_inv3'=> $this->input->post('pu_inv3'),
'loquios1'=> $this->input->post('loquios1'),
'loquios2'=> $this->input->post('loquios2'),
'loquios3'=> $this->input->post('loquios3'),
'hist_id'=> $id_patient
);

$this->model_admin->saveObstetrico4($save3);

 }

		
	
}


public function updateConEg(){

	/*Conclusión Del Egreso*/
	$resumen_hallasgos= $this->input->post('resumen_hallasgos');
	$resumen_intervenciones= $this->input->post('resumen_intervenciones');
	$condicion_alta= $this->input->post('condicion_alta');
	$causa_egreso= $this->input->post('causa_egreso');
	$destino_referimiento= $this->input->post('destino_referimiento');
	$diag_alta_diag1= $this->input->post('diag_alta_diag1');
	$diag_alta_diag2= $this->input->post('diag_alta_diag2');

 if($resumen_hallasgos==""){
$response['status'] =  2;
$response['message'] = 'Campo <strong>Resumen de los hallasgos</strong> de la Conclusión Del Egreso es obligatorio!';
}

else if($resumen_intervenciones==""){
$response['status'] =  3;
$response['message'] = 'Campo <strong>Resumen de intervenciones</strong> de la Conclusión Del Egreso es obligatorio!';	

} 

else if($condicion_alta==""){
$response['status'] =  4;
$response['message'] = 'Campo <strong>Condición De Alta</strong>  de la Conclusión Del Egreso es obligatorio!';	

}

else if($causa_egreso==""){
$response['status'] =  5;
$response['message'] = 'Campo <strong>Causa De Egresos</strong> de la Conclusión Del Egreso es obligatorio!';

}

else if($destino_referimiento==""){
$response['status'] =  6;
$response['message'] = 'Campo <strong>Destino/Referimiento</strong>  de la Conclusión Del Egreso es obligatorio!';	

}

else if($diag_alta_diag1==""){
$response['status'] =  7;
$response['message'] = 'Campo <strong>DIAGNOSTICO(1)</strong> de la Conclusión Del Egreso es obligatorio!';	

}

else if($diag_alta_diag2==""){
$response['status'] =  8;
$response['message'] = 'Campo <strong>DIAGNOSTICO(2)</strong> de la Conclusión Del Egreso es obligatorio!';	

}else{
	
$infeccion_herida1= $this->input->post('infeccion_herida');
$infeccion_herida = (isset($infeccion_herida1)) ? 1 : 0;

$morta_post1= $this->input->post('morta_post');
$morta_post = (isset($morta_post1)) ? 1 : 0;

$morta_int1= $this->input->post('morta_int');
$morta_int = (isset($morta_int1)) ? 1 : 0;
	
$data = array(
  'resumen_hallasgos'=> $this->input->post('resumen_hallasgos'),
  'resumen_intervenciones'=> $this->input->post('resumen_intervenciones'),
  'condicion_alta'=> $this->input->post('condicion_alta'),
  'causa_egreso'=> $this->input->post('causa_egreso'),
  'destino_referimiento'=> $this->input->post('destino_referimiento'),
  'diagnostico_autopsia'=> $this->input->post('diagnostico_autopsia'),
  'equipo_medico'=> $this->input->post('equipo_medico'),
  'diag_alta_diag1'=> $this->input->post('diag_alta_diag1'),
   'diag_alta_diag2'=> $this->input->post('diag_alta_diag2'),
  'infeccion_herida'=> $infeccion_herida,
  'morta_post'=> $morta_post,
  'morta_int'=> $morta_int,
   'diag_alta_diag3'=> $this->input->post('diag_alta_diag3'),
   'diag_alta_diag4'=> $this->input->post('diag_alta_diag4'),
  'updated_by'=> $this->input->post('user_id'),
  'updated_time'=>date("Y-m-d H:i:s")
);

$where = array(
  'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->update('hosp_conclusion_ingreso',$data);	
$response['status'] =  9;
$response['message'] = 'Actualizado con exito.';
}
echo json_encode($response);
}



function updateEvCon(){
$orient_tiempo= $this->input->post('orient_tiempo');
$orient_tiempo1 = (isset($orient_tiempo)) ? 1 : 0;

$orient_lugar= $this->input->post('orient_lugar');
$orient_lugar1 = (isset($orient_lugar)) ? 1 : 0;

$orient_pers= $this->input->post('orient_pers');
$orient_pers1 = (isset($orient_pers)) ? 1 : 0;	 
	 
	 
 $nauseas= $this->input->post('nauseas');
$nauseas1 = (isset($nauseas)) ? 1 : 0;	
 $vomitos= $this->input->post('vomitos');
$vomitos1 = (isset($vomitos)) ? 1 : 0;	
	 
 $data= array(
'condicion_general'=> $this->input->post('condicion_general'),
'estado_conciencia'=> $this->input->post('estado_conciencia'),
'orient_tiempo'=> $orient_tiempo1,
'orient_lugar'=> $orient_lugar1,
'orient_pers'=> $orient_pers1,
'comunicacion'=> $this->input->post('comunicacion'),
'val_neuro'=> $this->input->post('val_neuro'),
'estado_cardia'=> $this->input->post('estado_cardia'),
'est_respiratoria'=> $this->input->post('est_respiratoria'),
'oxinoterapia'=> $this->input->post('oxinoterapia'),
'terapia_resp'=> $this->input->post('terapia_resp'),
'sec_vias_resp'=> $this->input->post('sec_vias_resp'),
'sangrado'=> $this->input->post('sangrado'),
'tipo_sangrado'=> $this->input->post('tipo_sangrado'),
'presenta_dolor'=> $this->input->post('presenta_dolor'),
'canalizacion'=> $this->input->post('canalizacion'),
'drenajes'=> $this->input->post('drenajes'),
'eva_diuresis'=> $this->input->post('eva_diuresis'),
'nauseas'=> $nauseas1,
'vomitos'=> $vomitos1,
'vomitos_sel'=> $this->input->post('vomitos_sel'),
'drenaje_sonda_nas'=> $this->input->post('drenaje_sonda_nas'),
'drenaje_sonda_nas_sel'=> $this->input->post('drenaje_sonda_nas_sel'),
'evalucacion'=> $this->input->post('evalucacion'),
'evaluacion_sel'=> $this->input->post('evaluacion_sel'),
'diarrea'=> $this->input->post('diarrea'),
'val_abdomen'=> $this->input->post('val_abdomen'),
'peristalsis'=> $this->input->post('peristalsis'),
'alimentacion'=> $this->input->post('alimentacion'),
'alimentacion_sel'=> $this->input->post('alimentacion_sel'),
'coloracion'=> $this->input->post('coloracion'),
'eva_pulso'=> $this->input->post('eva_pulso'),
'eva_edema'=> $this->input->post('eva_edema'),
'val_piel'=> $this->input->post('val_piel'),
'cuidados_a'=> $this->input->post('cuidados_a'),
'movilizacion'=> $this->input->post('movilizacion'),
'updated_by'=> $this->input->post('id_user'),
'updated_time'=>date("Y-m-d H:i:s"),
'notas'=> $this->input->post('notas')

);

$where=array(
'id'=>$this->input->post('id')
);

$this->db->where($where);
$this->db->update("hosp_eval_cond",$data);

if($this->db->affected_rows() > 0){
	$response['message'] = 'Actualizado con exito.';
}else{
  $response['message'] = 'No fue actualizado.';
}


echo json_encode($response);

 }



public function updateExamNeuro(){

$this->db->trans_start();
$espontanea= $this->input->post('espontanea');
$espontanea1 = (isset($espontanea)) ? 1 : 0;
$a_la_orden_verbal= $this->input->post('a_la_orden_verbal');
$a_la_orden_verbal1 = (isset($a_la_orden_verbal)) ? 1 : 0;
$a_estimulo_doloroso= $this->input->post('a_estimulo_doloroso');
$a_estimulo_doloroso1 = (isset($a_estimulo_doloroso)) ? 1 : 0;
$no_ay_respuesta= $this->input->post('no_ay_respuesta');
$no_ay_respuesta1 = (isset($no_ay_respuesta)) ? 1 : 0;
$orientada= $this->input->post('orientada');
$orientada1 = (isset($orientada)) ? 1 : 0;
$confusa= $this->input->post('confusa');
$confusa1 = (isset($confusa)) ? 1 : 0;
$inapropriada= $this->input->post('inapropriada');
$inapropriada1 = (isset($inapropriada)) ? 1 : 0;
$incomprensible= $this->input->post('incomprensible');
$incomprensible1 = (isset($incomprensible)) ? 1 : 0;
$a_la_orden_verbal_6= $this->input->post('a_la_orden_verbal_6');
$a_la_orden_verbal_61 = (isset($a_la_orden_verbal_6)) ? 1 : 0;
$localizar_dolor= $this->input->post('localizar_dolor');
$localizar_dolor1 = (isset($localizar_dolor)) ? 1 : 0;
$retiro_ante_el_dolor= $this->input->post('retiro_ante_el_dolor');
$retiro_ante_el_dolor1 = (isset($retiro_ante_el_dolor)) ? 1 : 0;
$flexion_normal= $this->input->post('flexion_normal');
$flexion_normal1 = (isset($flexion_normal)) ? 1 : 0;
$extension= $this->input->post('extension');
$extension1 = (isset($extension)) ? 1 : 0;
$no_hay_respuesta= $this->input->post('no_hay_respuesta');
$no_hay_respuesta1 = (isset($no_hay_respuesta)) ? 1 : 0;
  $saveExamNeuro= array(
'exam_gen_neuro'=> $this->input->post('exam_gen_neuro'),
'olfatorio'=> $this->input->post('olfatorio'),
'optico'=> $this->input->post('optico'),
'motor_ocr_com'=> $this->input->post('motor_ocr_com'),
'patetica'=> $this->input->post('patetica'),
'trigemino'=>$this->input->post('trigemino'),
'motor_ocu_ext'=> $this->input->post('motor_ocu_ext'),
'facial'=> $this->input->post('facial'),
'estatoacustico'=> $this->input->post('estatoacustico'),
'glosofaringeo'=> $this->input->post('glosofaringeo'),
'neumogastrico'=>$this->input->post('neumogastrico'),
'espinal'=> $this->input->post('espinal'),
'hipo_mayor'=>$this->input->post('hipo_mayor'),
'sistema_motor'=> $this->input->post('sistema_motor'),
  'marcha'=> $this->input->post('marcha'),
 'espontanea'=> $espontanea1,
'a_la_orden_verbal'=> $a_la_orden_verbal1,
'a_estimulo_doloroso'=> $a_estimulo_doloroso1,
'no_ay_respuesta'=> $no_ay_respuesta1,
'orientada'=>$orientada1,
'confusa'=> $confusa1,
'inapropriada'=> $inapropriada1,
'incomprensible'=> $incomprensible1,
'a_la_orden_verbal_6'=> $a_la_orden_verbal_61,
'localizar_dolor'=>$localizar_dolor1,
'retiro_ante_el_dolor'=> $retiro_ante_el_dolor1,
'flexion_normal'=>$flexion_normal1,
'extension'=>$extension1,
'no_hay_respuesta'=> $no_hay_respuesta1,
'bicipital'=> $this->input->post('bicipital'),
'tricipital'=> $this->input->post('tricipital'),
'aquileo_y_clonus'=> $this->input->post('aquileo_y_clonus'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'dedo_dedo'=> $this->input->post('dedo_dedo'),
'dedo_nariz'=> $this->input->post('dedo_nariz'),
'talon_rod'=> $this->input->post('talon_rod'),
'patelar_y_clonus'=> $this->input->post('patelar_y_clonus'),
'romberg'=> $this->input->post('romberg'),
'sensibilidad1'=> $this->input->post('sensibilidad1'),
'sensibilidad2'=> $this->input->post('sensibilidad2'),
'fondo_de_ojo'=> $this->input->post('fondo_de_ojo'),
 'updated_by'=> $this->input->post('user_id'),
'updated_time'=>date("Y-m-d H:i:s")

);

$where = array(
  'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->update('hosp_exam_neuro',$saveExamNeuro);
$this->db->trans_complete();

if ($this->db->trans_status() === FALSE)
{
   echo 'error';
}else{
	echo 'hecho';
}
/*if ($this->db->update('hosp_exam_neuro',$saveExamNeuro) === FALSE){
    echo 'error';
}else{
	echo 'hecho';
}*/
}


public function balance_hidrico_turno_29(){
	$data['user_id']= $this->uri->segment(3);
	$data['patient_id']= $this->uri->segment(4);
	$data['centro']= $this->uri->segment(5);
	$data['id_hosp']= $this->uri->segment(6);
	
	$this->load->view('hospitalizacion/historial/balance-hidrico/turno-2-9',$data);
}



 
 
 public function factura()
{
$id_user=$this->uri->segment(3);
if(empty($id_user)){
redirect('/page404');
}
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=='Admin'){
$this->load->view('admin/header_admin');
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
} else{
redirect('/page404');	
}
$sql ="SELECT id_patient FROM hospitalization_data WHERE alta=1 group by id_patient";
$data['query'] = $this->db->query($sql);
$data['id_user']=$id_user;

if($perfil=="Asistente Medico"){
$data['centro_medico_tarif'] = $this->model_admin->view_as_doctor_centro($id_user);

} else{
$data['centro_medico_tarif'] = $this->account_demand_model->getCentroMedico();

}


$this->load->view('hospitalizacion/factura/index',$data);
}
 


 
public function loadHospProced()
{
echo "<option value=''></option>";
$centro_id=$this->input->post('centro_id');
$id_seg=$this->input->post('id_seg');
$sql ="SELECT sub_groupo, id_c_taf  FROM centros_tarifarios WHERE centro_id =$centro_id && seguro_id=$id_seg group by sub_groupo ORDER BY sub_groupo DESC";
$query = $this->db->query($sql);
 foreach ($query->result() as $row){
echo "<option  value='$row->id_c_taf'>$row->sub_groupo</option>";
 }
}
 
 
public function getHospProcedMonto()
{
$monto=$this->db->select('monto')->where('id_c_taf',$this->input->post('id'))->get('centros_tarifarios')->row('monto'); 
 echo "monto: $monto";

}

 
 
 public function create_new_factura()
{
$id_hosp=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$id_centro=$this->uri->segment(5);
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');

$hosp=$this->db->select('id_patient,centro,timeinserted,id,fecha_alta')->where('id',$id_hosp)->get('hospitalization_data')->row_array();
if(empty($id_hosp) || empty($id_user)){
redirect('/page404');
}

else if($perfil=='Admin'){
$this->load->view('admin/header_admin');
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
}

$data['id_user']=$id_user;
$data['id_hosp']=$id_hosp;
$data['id_cm']=$hosp['centro'];
$centro=$hosp['centro'];
$id_p_a=$hosp['id_patient'];

$data['timeinserted']=$hosp['timeinserted'];
$data['fecha_alta']=$hosp['fecha_alta'];
$seguro=$this->db->select('seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('seguro_medico');
$data['id_seguro']=$seguro;

$data['id_p_a']=$id_p_a;
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 
$serv_centro=$this->model_admin->Service_centro($centro,$seguro);  
$data['serv_centro']=$serv_centro;
 $seguro_name=$this->db->select('title, rnc')->where('id_sm',$seguro)
 ->get('seguro_medico')->row_array();
 $data['seguro_name']=$seguro_name['title'];
  $data['rnc']=$seguro_name['rnc'];
  $data['cod']=$this->db->select('codigo')->where('id_centro',$centro)
->where('id_seguro',$seguro)->get('codigo_contrato')->row('codigo');
$fac_data=$this->db->select('id_hosp, money_type,payment_method,factura_nota, inserted_time, id_user')->where('id_hosp',$id_hosp)->get('hosp_factura')->row_array();  
$data['is_closed']= $fac_data['id_hosp'];
$data['factura_nota']= $fac_data['factura_nota'];
$data['payment_method']= $fac_data['payment_method'];
$data['money_type']= $fac_data['money_type'];
$data['inserted_time']=date("d-m-Y H:i:s", strtotime($fac_data['inserted_time']));
$id_user= $fac_data['id_user'];
$data['created_by']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$this->load->view('hospitalizacion/factura/header-factura',$data);
$this->load->view('hospitalizacion/factura/new-factura',$data);
}
 
 
 function saveFacOrdenMedicaRecetas(){

$save = array(
'medica'=> $this->input->post('medicamento'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' =>0.8,
'precio' =>$this->input->post('precio'),
'descuento' => $this->input->post('descuento'),
'id_hosp' =>$this->input->post('id_hosp'),
'insert_date' =>date('Y-m-d H:i:s'),
'operator' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("hosp_orden_medica_recetas",$save);

}
 
 
function saveFacOrdenMedicaEst(){

$save = array(
'estudio'=> $this->input->post('servicio'),
'cantidad'=> $this->input->post('cantidad'),
'precio'=> $this->input->post('precio'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'id_hosp' =>$this->input->post('id_hosp'),
'insert_date' =>date('Y-m-d H:i:s'),
'operator' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("hosp_orden_medica_estudios",$save);

} 
 
 

 
 
 
 function updateOrdMedFac()
{
$table =$this->input->post('table');
$data = array(
'cobertura' => $this->input->post('cobert'),
'descuento' => $this->input->post('descuento')
);
if($table=='hosp_procedimiento'){
$where = array(
 'id'=>$this->input->post('id')
);

} else if($table=='hosp_orden_medica_estudios'){
$where = array(
 'id_i_e'=>$this->input->post('id')
);	
}

else if($table=='hosp_orden_medcia_lab'){
$where = array(
 'id_lab'=>$this->input->post('id')
);	
}

else if($table=='hosp_orden_medica_recetas'){
$where = array(
 'id_i_m'=>$this->input->post('id')
);	
} else{
$where = array(
 'id'=>$this->input->post('id')
);	
}
$this->db->where($where);

$this->db->update($table, $data);
}
 
 
 
 public function canceled_em_fac()
{
$table=$this->input->post('table');
$data = array(
'canceled' =>1
);
if($table=='hosp_procedimiento'){
$where = array(
  'id' =>$this->input->post('id')
);
}else if($table=='hosp_orden_medica_estudios'){
$where = array(
  'id_i_e' =>$this->input->post('id')
);	
}else if($table=='hosp_orden_medcia_lab'){
$where = array(
  'id_lab' =>$this->input->post('id')
);	
}
else if($table=='hosp_orden_medica_recetas'){
$where = array(
  'id_i_m' =>$this->input->post('id')
);	
}
else{
$where = array(
  'id' =>$this->input->post('id')
);	
	
}


$this->db->where($where);

$this->db->update($table, $data);
}
 
 

 
 
 public function saveOrdenMedicaLab(){
$save = array(
'laboratory'=> $this->input->post('servicio'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'id_hosp' =>$this->input->post('id_hosp'),
'insert_time' =>date('Y-m-d H:i:s'),
'precio' =>$this->input->post('precio'),
'user_id' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("hosp_orden_medcia_lab",$save);

}
 
 


 
 


public function saveOrdenMedicaProced(){
$save = array(
'name'=> $this->input->post('servicio'),
'precio'=> $this->input->post('precio'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'id_hosp' =>$this->input->post('id_hosp'),
'inserted_time' =>date('Y-m-d H:i:s'),
'id_user' =>$this->input->post('operator')

);
$this->db->insert("hosp_procedimiento",$save);

} 





 
public function getHospSala()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT DISTINCT id, sala FROM  mapa_de_cama WHERE centro=$id_centro GROUP BY sala";
$querysig = $this->db->query($sql);
echo "<option></option>";
foreach ($querysig->result() as $rf){
echo '<option value="'.$rf->sala.'">'.$rf->sala.'</option>';

}
}

public function getHospServ()
{
$id_centro=$this->input->post('id_centro');
$sala=$this->input->post('sala');
$sql ="SELECT  servicio FROM  mapa_de_cama WHERE centro=$id_centro AND sala='$sala' GROUP BY servicio";
$querysig = $this->db->query($sql);
echo '<option value="" ></option>';
foreach ($querysig->result() as $rf){
echo '<option value="'.$rf->servicio.'">'.$rf->servicio.'</option>';

}
}
 
 

 
 
   public function getHospCama()
    {
        $id_centro = $this
            ->input
            ->post('id_centro');
			
			  $sala = $this
            ->input
            ->post('sala');
			
			
        $sql = "SELECT id, num_cama  
FROM mapa_de_cama
WHERE id NOT IN
(SELECT hospitalization_data.cama 
   FROM  hospitalization_data WHERE alta = 0
   ) AND centro = $id_centro AND sala='$sala'";
        $querysig = $this
            ->db
            ->query($sql);
			if(!$querysig->result()){
			 echo '<option value="-1" >no hay cama disponible</option>';
			}else{
        foreach ($querysig->result() as $rf)
        {
            echo '<option value="" hidden></option>';
            echo '<option value="' . $rf->id . '">' . $rf->num_cama . '</option>';
        }
			}
    }
 
 
 
 
 
 
 
}
