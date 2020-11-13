<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Printings extends CI_Controller {
public function __construct()
{
parent::__construct();

$this->load->model('model_admin');
$this->load->model("padron_model");
$this->load->model('model_auditoria_medica');
$this->load->model('model_medico');
$this->padron_database = $this->load->database('padron',TRUE);
}



 public function search_code_estudios()
{
	$code=md5($this->input->get('code'));
	$this->session->set_userdata('codepatest',$code);
	redirect("printings/search_code_estudios_result");
}

 public function search_code_estudios_result()
{
$code=$this->session->userdata['codepatest'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','mode' => 'utf-8','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$estudios=$this->model_admin->print_estudio_patient_search($code);
$this->data['estudios']=$estudios;
foreach($estudios as $row)
$this->data['id_historial']=$row->historial_id;
 $this->data['id_doc']=$row->operator;
$this->data['title']="ESTUDIOS";


 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$row->historial_id)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);
$html2 = $this->load->view('admin/print/estudios',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}

public function hosp_orden_medica($user_id,$patient_id,$centro,$id_hosp)
{
	$save= array(
	'id_user' => $user_id,
	'name' =>'',
	'id_historial' => $patient_id,
	'centro' => $centro,
	'inserted_by' => $user_id,
	'inserted_time' =>date('Y-m-d H:i:s')
	);

	$this->db->insert("hosp_orden_medica_sala",$save);
	$last_id=$this->db->insert_id();

$data = array(
'id_sala'=>$last_id
);

$where1 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'centro' =>$centro,
'printing' =>2
);
$this->db->where($where1);
$this->db->update("hosp_orden_medica_recetas",$data);
//------------------------------------------------------------------------------------
$where2 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'printing' =>2
);
$this->db->where($where2);
$this->db->update("hosp_orden_medica_estudios",$data);
//------------------------------------------------------------------------------------
$where3 = array(
'id_patient' =>$patient_id,
'id_user' =>$user_id,
'printing' =>2
);
$this->db->where($where3);
$this->db->update("hosp_ord_med_gen",$data);

//------------------------------------------------------------------------------------
$where5 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'printing' =>2
);
$this->db->where($where5);
$this->db->update("hosp_orden_medcia_lab",$data);
//------------------------------------------------------------------------------------
$this->session->set_userdata('user_id_emg',$user_id);
$this->session->set_userdata('patient_id_emg',$patient_id);
$this->session->set_userdata('centro_emg',$centro);
$this->session->set_userdata('id_sala',$last_id);
$this->session->set_userdata('id_hosp',$id_hosp);
redirect('printings/print_hosp_orden_medica');
}



public function hosp_orden_medica_($user_id,$patient_id,$id_sala,$id_hosp)
{
$this->session->set_userdata('user_id_om',$user_id);
$this->session->set_userdata('patient_id',$patient_id);
$this->session->set_userdata('id_sala',$id_sala);
$this->session->set_userdata('id_hosp',$id_hosp);
redirect('printings/hosp_print_orden_medica');
}

public function hosp_print_orden_medica()
{
if(empty($this->session->userdata['user_id_om'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");

$user_id=$this->session->userdata['user_id_om'];
$patient_id=$this->session->userdata['patient_id'];
$this->data['patient_id'] = $patient_id;
$this->data['user_id'] = $user_id;
$this->data['id_doc'] = $user_id;
$this->data['id_op'] = $user_id;
$id_sala=$this->session->userdata['id_sala'];
$this->data['id_historial']=$patient_id;
$this->data['id_sala']=$id_sala;
$this->data['id_hosp']=$this->session->userdata['id_hosp'];
 $paciente=$this->db->select('photo,ced1,ced2,ced3,date_nacer')->where('id_p_a',$patient_id)
 ->get('patients_appointments')->row_array();
$this->data['date_nacer']=$paciente['date_nacer'];
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}
$this->data['title']="ORDEN MEDICA";
$this->data['display']="<td style='width:40px'>$imgpat</td>";
//--------------------------------------------------------------------------------------------
$sql2 ="SELECT * FROM hosp_orden_medica_estudios where id_sala=$id_sala";
$this->data['estudios'] = $this->db->query($sql2);
//-----------------------------------------------------------------------------------------------
$sql3 ="SELECT * FROM hosp_orden_medcia_lab where id_sala=$id_sala";
$this->data['lab'] = $this->db->query($sql3);
//-----------------------------------------------------------------------------------------------
$sql4 ="SELECT * FROM hosp_ord_med_gen where id_sala=$id_sala";
$this->data['med_med_gen'] = $this->db->query($sql4);
//------------------------------------------------------------------------------------------------
$sql1 ="SELECT * FROM hosp_orden_medica_recetas where id_sala=$id_sala";
$this->data['recetas'] = $this->db->query($sql1);
//------------------------------------------------------------------------------------------------
$this->data['orden_medica_sala']='hosp_orden_medica_sala';
$this->data['sala_name']='';
  $this->load->view('getPatientAge');

$html = $this->load->view('admin/print/header-print-hospitalizacion',$this->data,TRUE);
$this->data['orden_medica_recetas'] ="hosp_orden_medica_recetas";
$this->data['ord_med_gen'] ="hosp_ord_med_gen";
$this->data['orden_medcia_lab'] ="hosp_orden_medcia_lab";
$this->data['orden_medica_estudios'] ="hosp_orden_medica_estudios";
$this->data['orden_medica_sala'] ="hosp_orden_medica_sala";
$html2 = $this->load->view('admin/print/print_orden_medica',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}


public function print_hosp_orden_medica()
{
if(empty($this->session->userdata['user_id_emg'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
//------------------------------------------------------------------------------------

$this->data['enviado']='';
//------------------------------------------------------------------------------------
$user_id=$this->session->userdata['user_id_emg'];
$patient_id=$this->session->userdata['patient_id_emg'];
$this->data['centro']=$this->session->userdata['centro_emg'];
$this->data['patient_id'] = $patient_id;
$this->data['user_id'] = $user_id;
$this->data['id_sala'] = $this->session->userdata['id_sala'];
$this->data['id_hosp'] = $this->session->userdata['id_hosp'];
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$user_id)
 ->get('users')->row_array();
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];

$this->data['area']=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');


$this->data['id_historial']=$patient_id;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $paciente=$this->db->select('photo,ced1,ced2,ced3,date_nacer')->where('id_p_a',$patient_id)
 ->get('patients_appointments')->row_array();
 $this->data['date_nacer']=$paciente['date_nacer'];
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}
$this->data['title']="HOSPITALIZACION";
$this->data['display']="<td style='width:40px'>$imgpat</td>";
//--------------------------------------------------------------------------------------------
$sql2 ="SELECT * FROM hosp_orden_medica_estudios where operator=$user_id && historial_id=$patient_id && printing=2";
$this->data['estudios'] = $this->db->query($sql2);
//-----------------------------------------------------------------------------------------------
$sql3 ="SELECT * FROM hosp_orden_medcia_lab where user_id=$user_id && historial_id=$patient_id && printing=2";
$this->data['lab'] = $this->db->query($sql3);
//-----------------------------------------------------------------------------------------------
$sql4 ="SELECT * FROM hosp_ord_med_gen where id_user=$user_id && id_patient=$patient_id && printing=2";
$this->data['med_med_gen'] = $this->db->query($sql4);
//------------------------------------------------------------------------------------------------
$sql1 ="SELECT * FROM hosp_orden_medica_recetas where operator=$user_id && historial_id=$patient_id && printing=2";
$this->data['recetas'] = $this->db->query($sql1);

$this->data['id_doc'] =$user_id;
$this->data['orden_medica_recetas'] ="hosp_orden_medica_recetas";
$this->data['ord_med_gen'] ="hosp_ord_med_gen";
$this->data['orden_medcia_lab'] ="hosp_orden_medcia_lab";
$this->data['orden_medica_estudios'] ="hosp_orden_medica_estudios";
$this->data['orden_medica_sala'] ="hosp_orden_medica_sala";
//------------------------------------------------------------------------------------------------
  $this->load->view('getPatientAge');
$html = $this->load->view('admin/print/header-print-hospitalizacion',$this->data,TRUE);
$mpdf->WriteHTML($html);
$html2 = $this->load->view('admin/print/print_orden_medica',$this->data,TRUE);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}




 public function search_code1()
{
	$code=md5($this->input->get('code'));
	$this->session->set_userdata('codepat',$code);
	redirect("printings/search_code");
}

 public function search_code()
{
$code=$this->session->userdata['codepat'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$this->data['mpdf']=$mpdf;
$mpdf->setFooter("Página {PAGENO} de {nb}");
$farma=$this->db->select('historial_id,operator')->where('encrypt_recetas',$code)->get('h_c_indicaciones_medicales')->row_array();
$this->data['id_historial']=$farma['historial_id'];

$print_recetas = $this->model_admin->print_recetas_for_patient($code);
$this->data['print_recetas']=$print_recetas;
 foreach($print_recetas as $rowid)
 $this->data['id_doc']=$rowid->operator;

$this->data['title']="RECETAS";
//$space= "<br/>";
if($print_recetas !=NULL){

 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$farma['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);

$html2 = $this->load->view('admin/print/recetas',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->WriteHTML($space);
$mpdf->Output();
}else{
	echo "<div style='color:red;text-aling:center'>Codigo no encontrado</div>";
}
}


public function print_ant_gnrl($id1,$id2)
{
$this->session->set_userdata('historial_id',$id1);
$this->session->set_userdata('val_gnrl',$id2);
redirect('printings/print002');
}


public function emergencia_orden_medica($user_id,$patient_id,$centro,$enviado_a)
{
	$save= array(
	'id_user' => $user_id,
	'name' =>'',
	'id_historial' => $patient_id,
	'centro' => $centro,
	'inserted_by' => $user_id,
	'inserted_time' =>date('Y-m-d H:i:s'),
	'direction' =>1
	);

	$this->db->insert("orden_medica_sala",$save);
	$last_id=$this->db->insert_id();

$data = array(
'id_sala'=>$last_id
);

$where1 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'centro' =>$centro,
'printing' =>2
);
$this->db->where($where1);
$this->db->update("orden_medica_recetas",$data);
//------------------------------------------------------------------------------------
$where2 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'printing' =>2
);
$this->db->where($where2);
$this->db->update("orden_medica_estudios",$data);
//------------------------------------------------------------------------------------
$where3 = array(
'id_patient' =>$patient_id,
'id_user' =>$user_id,
'printing' =>2
);
$this->db->where($where3);
$this->db->update("ord_med_med_gen",$data);
//------------------------------------------------------------------------------------
$where4 = array(
'id_patient' =>$patient_id,
'id_user' =>$user_id,
'printing' =>2
);
$this->db->where($where4);
$this->db->update("ord_med_med_gen",$data);
//------------------------------------------------------------------------------------
$where5 = array(
'historial_id' =>$patient_id,
'operator' =>$user_id,
'printing' =>2
);
$this->db->where($where5);
$this->db->update("orden_medcia_lab",$data);
//------------------------------------------------------------------------------------
$this->session->set_userdata('user_id_emg',$user_id);
$this->session->set_userdata('patient_id_emg',$patient_id);
$this->session->set_userdata('centro_emg',$centro);
$this->session->set_userdata('enviado_a',$enviado_a);
redirect('printings/print_emergencia_orden_medica');
}

public function print_emergencia_orden_medica()
{
if(empty($this->session->userdata['user_id_emg'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
//------------------------------------------------------------------------------------
$enviado_a=$this->session->userdata['enviado_a'];
if($enviado_a==1){
$enviado="Triaje";
} elseif($enviado_a==2){
$enviado="Emergencia General";
}
elseif($enviado_a==3){
$enviado="Emergencia Pediatría";
}
elseif($enviado_a==4){
$enviado="Quirofano";
}
elseif($enviado_a==5){
$enviado="Emergencia Obstétrica Y Ginecología";
}
elseif($enviado_a==6){
$enviado="Reanimación";
}
$this->data['enviado']=$enviado;
//------------------------------------------------------------------------------------
$user_id=$this->session->userdata['user_id_emg'];
$patient_id=$this->session->userdata['patient_id_emg'];
$this->data['centro']=$this->session->userdata['centro_emg'];

$this->data['patient_id'] = $patient_id;
$this->data['user_id'] = $user_id;


 $doc=$this->db->select('name,exequatur,area')->where('id_user',$user_id)
 ->get('users')->row_array();
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];

$this->data['area']=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');


$this->data['id_historial']=$patient_id;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$patient_id)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}
$this->data['title']="ORDEN MEDICA";
$this->data['display']="<td style='width:40px'>$imgpat</td>";
//--------------------------------------------------------------------------------------------
$sql2 ="SELECT * FROM orden_medica_estudios where operator=$user_id && historial_id=$patient_id && printing=2";
$this->data['estudios'] = $this->db->query($sql2);
//-----------------------------------------------------------------------------------------------
$sql3 ="SELECT * FROM orden_medcia_lab where user_id=$user_id && historial_id=$patient_id && printing=2";
$this->data['lab'] = $this->db->query($sql3);
//-----------------------------------------------------------------------------------------------
$sql4 ="SELECT * FROM ord_med_med_gen where id_user=$user_id && id_patient=$patient_id && printing=2";
$this->data['med_med_gen'] = $this->db->query($sql4);
//------------------------------------------------------------------------------------------------
$sql1 ="SELECT * FROM orden_medica_recetas where operator=$user_id && historial_id=$patient_id && printing=2";
$this->data['recetas'] = $this->db->query($sql1);
//------------------------------------------------------------------------------------------------
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);
$mpdf->WriteHTML($html);
$html2 = $this->load->view('admin/print/print_emergencia_orden_medica',$this->data,TRUE);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}






public function orden_medica($user_id,$patient_id,$id_sala)
{
$this->session->set_userdata('user_id_om',$user_id);
$this->session->set_userdata('patient_id',$patient_id);
$this->session->set_userdata('id_sala',$id_sala);
redirect('printings/print_orden_medica');
}

public function print_orden_medica()
{
if(empty($this->session->userdata['user_id_om'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");

$user_id=$this->session->userdata['user_id_om'];
$patient_id=$this->session->userdata['patient_id'];
$this->data['patient_id'] = $patient_id;
$this->data['user_id'] = $user_id;
$this->data['id_doc'] = $user_id;
$id_sala=$this->session->userdata['id_sala'];
 $doc=$this->db->select('name,exequatur')->where('id_user',$user_id)
 ->get('users')->row_array();
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];
$this->data['id_historial']=$patient_id;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
if($id_sala==0){
$sala=$this->db->select('idsala')->where("id_user",$user_id)->where("id_historial",$patient_id)->order_by('idsala','desc')->limit(1)->get('orden_medica_sala')->row('idsala');
}else{
$sala=$id_sala;
}

$this->data['id_sala']=$sala;
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$patient_id)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}
$this->data['title']="ORDEN MEDICA";
$this->data['display']="<td style='width:40px'>$imgpat</td>";
//--------------------------------------------------------------------------------------------
$sql2 ="SELECT * FROM orden_medica_estudios where id_sala=$sala";
$this->data['estudios'] = $this->db->query($sql2);
//-----------------------------------------------------------------------------------------------
$sql3 ="SELECT * FROM orden_medcia_lab where id_sala=$sala";
$this->data['lab'] = $this->db->query($sql3);
//-----------------------------------------------------------------------------------------------
$sql4 ="SELECT * FROM ord_med_med_gen where id_sala=$sala";
$this->data['med_med_gen'] = $this->db->query($sql4);
//------------------------------------------------------------------------------------------------
$sql1 ="SELECT * FROM orden_medica_recetas where id_sala=$sala";
$this->data['recetas'] = $this->db->query($sql1);
//------------------------------------------------------------------------------------------------
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);

$this->data['orden_medica_recetas'] ="orden_medica_recetas";
$this->data['ord_med_gen'] ="ord_med_med_gen";
$this->data['orden_medcia_lab'] ="orden_medcia_lab";
$this->data['orden_medica_estudios'] ="orden_medica_estudios";
$this->data['orden_medica_sala'] ="orden_medica_sala";

$html2 = $this->load->view('admin/print/print_orden_medica',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}



public function print_hoy_cita1($id1,$perfil)
{
$this->session->set_userdata('id_user',$id1);
$this->session->set_userdata('perfil',$perfil);
redirect('printings/print_hoy_cita');
}

public function print_hoy_cita(){
if(empty($this->session->userdata['id_user'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter('{PAGENO}');
$id_user=$this->session->userdata['id_user'];
$this->data['id_user']=$id_user;
$perfil=$this->session->userdata['perfil'];
$hoy=date('d-m-Y');
$this->data['cita_fecha']="CITAS POR HOY $hoy";
$this->data['centro']='';
$this->data['display']='none';
if($perfil=="Admin"){
$this->data['appointments'] = $this->model_admin->getConfirmSolicitud();
}
else if($perfil=="Medico")
{
$this->data['appointments']= $this->model_medico->getMedicoAp($id_user);
}else{
$this->data['appointments']= $this->model_medico->getAsMedicoAp($id_user);
}
$html = $this->load->view('admin/print/print_hoy_cita',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}

public function print_hoy_cita2($id1,$perfil,$date1,$date2,$centro)
{
$this->session->set_userdata('id_user',$id1);
$this->session->set_userdata('perfil',$perfil);
$this->session->set_userdata('date1',$date1);
$this->session->set_userdata('date2',$date2);
$this->session->set_userdata('centro',$centro);
redirect('printings/print_cita_date_range');
}


public function print_cita_date_range(){
if(empty($this->session->userdata['id_user'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
ini_set("pcre.backtrack_limit", "5000000");
$mpdf->setFooter('{PAGENO}');
$id_user=$this->session->userdata['id_user'];
$this->data['id_user']=$id_user;
$perfil=$this->session->userdata['perfil'];
$date1=$this->session->userdata['date1'];
$date2=$this->session->userdata['date2'];
$centro=$this->session->userdata['centro'];
$fecha1 = date('Y-m-d', strtotime($date1));
$fecha2 = date('Y-m-d', strtotime($date2));
$this->data['cita_fecha']="CITAS DESDE $date1 HASTA $date2";
$this->data['centro']=$centro;
$this->data['display']='';
$datas = array(
'date1' => $fecha1,
'date2' => $fecha2,
'centro' =>$centro
);
if($perfil=="Admin"){
$this->data['appointments'] = $this->model_admin->get_centro_medico_datepicker($datas);
}else
{
$val = array(
'date1' =>$fecha1,
'date2' =>$fecha2,
'doctor' =>$id_user,
'centro' =>$centro,
'perfil' =>$perfil
);
$this->data['appointments'] =  $this->model_medico->get_centro_medico_datepicker($val);
}
$html = $this->load->view('admin/print/print_hoy_cita',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}


public function print002(){
if(empty($this->session->userdata['historial_id'])){
redirect('/page404');
}
$historial_id=$this->session->userdata['historial_id'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$updated_by=$this->db->select('update_by,date_modif,id_user')->where('historial_id',$historial_id)->get('h_c_marque_positivo')->row_array();

$author=$this->db->select('name')->where('id_user',$updated_by['update_by'])->get('users')->row('name');


$perfil=$this->db->select('perfil')->where('id_user',$updated_by['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($updated_by['date_modif']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($updated_by['date_modif']));
$doc=$this->db->select('exequatur,area')->where('id_user',$updated_by['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area, Exeq. $execuatur </p>";
}
$this->data['id_historial']=$historial_id;
$this->data['row_ant']=$this->model_admin->showAnte($historial_id);
$this->data['desa'] = $this->model_admin->showDesarollo($historial_id);
$this->data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$this->data['medicamentos'] = $this->model_admin->medicamentos();
$this->data['selectOne']=$this->model_admin->selectOne();
$this->data['selectTwo']=$this->model_admin->selectTwo();

$this->data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['drug']=$this->model_admin->droga();
$this->data['title']="HISTORIAL CLINICA (Antecedented Generales)";
$mpdf->setFooter("Página {PAGENO} de {nb}");


if($this->session->userdata['val_gnrl']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$historial_id)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_gnrl',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}



public function signaturePatient()
{
$this->session->set_userdata('patient_firma',$this->uri->segment(3));
$this->session->set_userdata('id_fac',$this->uri->segment(4));
redirect('printings/patient_sign_in');

}




public function patient_sign_in()
{
if(empty($this->session->userdata['id_fac'])){
redirect('/page404');
}
$data['id_fac']= $this->session->userdata['id_fac'];
$pat=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$this->session->userdata['patient_firma'])->get('patients_appointments')->row_array();
$data['patiente']=$pat['nombre'];
 if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($pat['photo']==""){
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:120px;height:120px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$pat['photo'].'"  />';
}
$data['imgpat']=$imgpat;

$this->load->view('admin/print/signature-patient',$data);
}



public function sendLinkToPatientForSingning()
{

$patient_firma=$this->uri->segment(3);
$id_fac=$this->uri->segment(4);


$data['id_fac']= $id_fac;
$pat=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$patient_firma)->get('patients_appointments')->row_array();
$data['patiente']=$pat['nombre'];
 if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:120px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($pat['photo']==""){
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:120px;height:120px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$pat['photo'].'"  />';
}
$data['imgpat']=$imgpat;

$this->load->view('admin/print/signature-patient-link',$data);
}




public function signature()
{
$this->session->set_userdata('from',$this->uri->segment(3));
$this->session->set_userdata('is_doc',$this->uri->segment(4));
$this->session->set_userdata('id_imp',$this->uri->segment(5));
$this->session->set_userdata('who',$this->uri->segment(6));
$this->session->set_userdata('patient_cont',$this->uri->segment(7));
redirect('printings/sign_in');

}


public function sign_in()
{
if(empty($this->session->userdata['from'])){
redirect('/page404');
}
$data['from']= $this->session->userdata['from'];
$data['is_doc']= $this->session->userdata['is_doc'];
$data['id_imp']= $this->session->userdata['id_imp'];
$data['who']= $this->session->userdata['who'];
$data['patient_cont']= $this->session->userdata['patient_cont'];
$data['doc']=$this->db->select('name')->where('id_user',$this->session->userdata['from'])->get('users')->row('name');
$pat=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$this->session->userdata['from'])->get('patients_appointments')->row_array();
$data['patiente']=$pat['nombre'];
 if($pat['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat['ced1'])
->where('SEQ_CED',$pat['ced2'])
->where('VER_CED',$pat['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($pat['photo']==""){
$imgpat='<img  style="width:120px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:120px;height:120px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$pat['photo'].'"  />';
}
$data['imgpat']=$imgpat;

$this->load->view('admin/print/signature',$data);
}



public function saveSignature()
{
$upload_dir = './assets/update/';
$id_imp = $_POST['id_imp'];
$file2 = $upload_dir ."$id_imp.png";
$img = $_POST['canvasImage'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
file_put_contents($file2, $fileData);

}




public function saveSignaturePatient()
{
$upload_dir = './assets/update/';
$id_fac = $_POST['id_fac'];
$file2 = $upload_dir ."$id_fac.png";
$img = $_POST['canvasImage'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
file_put_contents($file2, $fileData);

$save= array(
 'firma'=>"$id_fac.png",
  'created_time'=>date('Y-m-d H:i:s'),
  'id_fac'=>$id_fac
);
$this->db->insert("factura_patient_firma",$save);

}


public function saveSignatureCreatedByPatient()
{
$sign = '';
$upload_dir = './assets/update/';
$id_fac = $_POST['id_fac'];
$path = $upload_dir ."$id_fac.png";
$sign = $_POST['hdnSignature'];
 $sign = base64_decode($sign); //convert base64
 file_put_contents($path, $sign);

$save= array(
 'firma'=>"$id_fac.png",
  'created_time'=>date('Y-m-d H:i:s'),
  'id_fac'=>$id_fac,
  'origne'=>1
);
$this->db->insert("factura_patient_firma",$save);
redirect($_SERVER['HTTP_REFERER']);
}




public function print_enf_act()
{
$this->session->set_userdata('idenf',$this->input->get('historial_id'));
$this->session->set_userdata('val_enf',$this->input->get('val'));
redirect('printings/print003');
}



public function print003()
{
if(empty($this->session->userdata['idenf'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idenf'];
$val=$this->db->select('historial_id,user_id,updated_time,updated_by')->where('id_enf',$id)->get('h_c_enfermedad')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['historial_id'];

$this->data['print_enf_act'] = $this->model_admin->show_enfermedad($id);
$this->data['title']="ENFERMEDAD ACTUAL";

$perfil=$this->db->select('perfil')->where('id_user',$val['user_id'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['user_id'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$mpdf->setFooter("Página {PAGENO} de {nb}");


if($this->session->userdata['val_enf']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_enf_act',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}

public function print_conc_d()
{
$this->session->set_userdata('id',$this->input->get('historial_id'));
$this->session->set_userdata('val_conc',$this->input->get('val'));
redirect('printings/print004');

}

public function diag_p_vert($id,$foto,$pos)
{
$this->session->set_userdata('id',$id);
$this->session->set_userdata('val_conc',$foto);
$this->session->set_userdata('pos',$pos);
redirect('printings/print004pvert');

}



public function print004pvert()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
if($this->session->userdata['pos']=='v'){
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
}else{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
}

$id= $this->session->userdata['id'];

$sqltp ="SELECT id_tarif,time_created FROM  h_c_procedimiento_tarif where id_cd=$id";
$this->data['tarif_proced'] = $this->db->query($sqltp);

$val=$this->db->select('historial_id,id_user,updated_time,updated_by,procedimiento,otros_diagnos')->where('id_cdia',$id)->get('h_c_conclusion_diagno')->row_array();
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['historial_id'];
$this->data['procedimiento']=$val['procedimiento'];
$this->data['otros_diagnos']=$val['otros_diagnos'];

$this->data['id_doc']=$val['updated_by'];


$this->data['print_enf_act'] = $this->model_admin->show_enfermedad($id);
$this->data['title']="ENFERMEDAD ACTUAL";

$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$this->data['print_cond'] = $this->model_admin->show_con_by_id($id,0);

$this->data['title']="CONCLUSION DIAGNOSTIC";
$mpdf->setFooter("Página {PAGENO} de {nb}");


if($this->session->userdata['val_conc']==1){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);
$html2 = $this->load->view('admin/print/print_diag_p_f',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}




public function print004()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['id'];
$val=$this->db->select('historial_id,id_user,updated_time,updated_by,procedimiento,otros_diagnos')->where('id_cdia',$id)->get('h_c_conclusion_diagno')->row_array();
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['historial_id'];
$this->data['procedimiento']=$val['procedimiento'];
$this->data['otros_diagnos']=$val['otros_diagnos'];
$this->data['print_enf_act'] = $this->model_admin->show_enfermedad($id);
$this->data['title']="ENFERMEDAD ACTUAL";

$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$this->data['print_cond'] = $this->model_admin->show_con_by_id($id,0);

$this->data['title']="CONCLUSION DIAGNOSTIC";
$mpdf->setFooter("Página {PAGENO} de {nb}");


if($this->session->userdata['val_conc']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_conc_d',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}


public function print_rehab()
{
$this->session->set_userdata('idrehab',$this->input->get('historial_id'));
$this->session->set_userdata('val_rehab',$this->input->get('val'));
redirect('printings/print005');

}


public function print005()
{
if(empty($this->session->userdata['idrehab'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idrehab'];
$val=$this->db->select('id_historial,updated_time,updated_by,id_user')->where('id_rehab',$id)->get('h_c_rehabilitacion')->row_array();
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['id_historial'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$mpdf->setFooter("Página {PAGENO} de {nb}");

$this->data['showRehabilidad'] = $this->model_admin->showRehabById($id);
$this->data['title']="REHABILITACION";

if($this->session->userdata['val_rehab']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['id_historial'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/rehab',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}


public function print_exa_f()
{
$this->session->set_userdata('idexf',$this->input->get('historial_id'));
$this->session->set_userdata('val_exf',$this->input->get('val'));

redirect('printings/print006');

}

public function print006()
{
if(empty($this->session->userdata['idexf'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idexf'];
$val=$this->db->select('historial_id,updated_by,updated_time,id_user')->where('id_sig',$id)->get('h_c_examen_fisico')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['historial_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$this->data['ExamFisById'] = $this->model_admin->ExamFisById($id);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['title']="EXAMEN FISICO";

if($this->session->userdata['val_exf']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_exa_f',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}



public function exmen_fisico_otorrino()
{
$this->session->set_userdata('idexf',$this->input->get('historial_id'));
$this->session->set_userdata('val_exf',$this->input->get('val'));

redirect('printings/print0009');

}


public function print0009()
{
if(empty($this->session->userdata['idexf'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idexf'];
$val=$this->db->select('historial_id,updated_by,updated_time,user_id,id_sig')->where('idot',$id)->get('h_c_examen_fis_otorrino')->row_array();
$id_ex_f=$val['id_sig'];
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['historial_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['user_id'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['user_id'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$sql ="SELECT * FROM h_c_examen_fis_otorrino where idot=$id";
$this->data['show_exam_ot_by_id'] = $this->db->query($sql);
$this->data['ExamFisById'] = $this->model_admin->ExamFisById($id_ex_f);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['title']="EXAMEN FISICO OTORRINO";

if($this->session->userdata['val_exf']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_exa_fotorrino',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}











public function print_exam_sis()
{

$this->session->set_userdata('idsis',$this->input->get('historial_id'));
$this->session->set_userdata('val_sis',$this->input->get('val'));

redirect('printings/print007');

}


public function print_alerg()
{

$this->session->set_userdata('idal',$this->input->get('historial_id'));
$this->session->set_userdata('val_al',$this->input->get('val'));

redirect('printings/print_alerg01');

}




public function print_alerg01()
{
if(empty($this->session->userdata['idal'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idal'];
$val=$this->db->select('historial_id,updated_by,updated_time')->where('id',$id)->get('h_c_ant_alergista')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['historial_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['updated_by'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['updated_by'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$mpdf->setFooter("Página {PAGENO} de {nb}");
$sql ="SELECT * FROM  h_c_ant_alergista  WHERE id=$id";
$this->data['data_result']= $this->db->query($sql);

$this->data['title']="ANTECEDENTE ALERGISTA";

if($this->session->userdata['val_al']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_alergista',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}






















public function print007()
{
if(empty($this->session->userdata['idsis'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idsis'];
$val=$this->db->select('historial_id,updated_by,updated_time,id_user')->where('id_exs',$id)->get('h_c_examen_sistema')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['historial_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['show_examsis_by_id'] = $this->model_admin->show_examsis_by_id($id);

$this->data['title']="EXAMEN SISTEMA";

if($this->session->userdata['val_sis']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_exam_sis',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}



public function print_ssr()
{
$this->session->set_userdata('idssr',$this->input->get('historial_id'));
$this->session->set_userdata('val_ssr',$this->input->get('val'));
redirect('printings/print008');

}

public function print008()
{
if(empty($this->session->userdata['idssr'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idssr'];
$val=$this->db->select('hist_id,updated_by,update_time,id_user')->where('idssr',$id)->get('h_c_ant_ssr')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['hist_id'];

$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['update_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['update_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";

}
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['ssr'] = $this->model_admin->data_ssr_by_id($id);
$this->data['title']="<p style='text-align:center'>ANTECEDENTE S.S.R<br/><span style='font-size:13px'>(Salud Sexual Reproductiva)</span></p>";

if($this->session->userdata['val_ssr']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['hist_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ssr',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}


public function print_ant_obs()
{
$this->session->set_userdata('idobs',$this->input->get('historial_id'));
$this->session->set_userdata('val_obs',$this->input->get('val'));
redirect('printings/print009');

}


public function print009()
{
if(empty($this->session->userdata['idobs'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idobs'];
$val=$this->db->select('hist_id,updated_by,updated_time,id_user')->where('idobs',$id)->get('h_c_ante_obs1')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['hist_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['obs']=$this->model_admin->getObs($id);
$this->data['obs2']=$this->model_admin->getObs2($id);
$this->data['obs3']=$this->model_admin->getObs3($id);
$this->data['obs4']=$this->model_admin->getObs4($id);
$this->data['title']="ANTECEDENTE OBSTETRICO";

if($this->session->userdata['val_obs']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['hist_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}



$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_obs',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}


public function print_ant_pedia($id,$val)
{
$this->session->set_userdata('id_pedia',$id);
$this->session->set_userdata('val_pedia',$val);
redirect('printings/print0010');

}


public function print0010()
{
if(empty($this->session->userdata['id_pedia'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['id_pedia'];
$val=$this->db->select('hist_id,updated_time,updated_by,id_user')->where('id',$id)->get('h_c_ant_pedia')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['hist_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['vacuna'] = $this->model_admin->getVacunaData($val['hist_id']);
$this->data['pediaid'] = $this->model_admin->getPediaId($id);
$this->data['title']="ANTECEDENTE PEDIATRICO";


if($this->session->userdata['val_pedia']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['hist_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}



$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_ant_pedia',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}


public function print_cont_p()
{

$this->session->set_userdata('idcpn',$this->input->get('historial_id'));
$this->session->set_userdata('val_ctp',$this->input->get('val'));
redirect('printings/print0011');

}


public function print0011()
{
if(empty($this->session->userdata['idcpn'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idcpn'];
$val=$this->db->select('historial_id,updated_time,updated_by,id_user')->where('id_c1',$id)->get('h_c_control_prenatal1')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$this->data['id_historial']=$val['historial_id'];


$perfil=$this->db->select('perfil')->where('id_user',$val['id_user'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
$execuatur=$doc['exequatur'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}

$this->data['showSelectContP1'] = $this->model_admin->showSelectContP1($id);
$this->data['showSelectContP2'] = $this->model_admin->showSelectContP2($id);
$this->data['showSelectContP3'] = $this->model_admin->showSelectContP3($id);
$this->data['showSelectContP4'] = $this->model_admin->showSelectContP4($id);
$this->data['showSelectContP5'] = $this->model_admin->showSelectContP5($id);
$this->data['showSelectContP6'] = $this->model_admin->showSelectContP6($id);
$this->data['showSelectContP7'] = $this->model_admin->showSelectContP7($id);
$this->data['showSelectContP8'] = $this->model_admin->showSelectContP8($id);
$this->data['showSelectContP9'] = $this->model_admin->showSelectContP9($id);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['title']="CONTROL PRENATAL";

if($this->session->userdata['val_ctp']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['historial_id'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/print_cont_p',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}


public function invoice_ars_claim_()
{
$last_id=$this->db->select('id_ncf')->order_by('id_ncf','desc')->limit(1)->get('ncf')->row('id_ncf');
$this->session->set_userdata('last_id',$last_id);
redirect('printings/print0012');

}




public function print0012()
{
if(empty($this->session->userdata['last_id'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$last_id= $this->session->userdata['last_id'];
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['last_id'] =$last_id;
$this->data['invoice'] = $this->model_admin->getNewinvoice($last_id);
$this->data['nota_ncf'] = $this->model_admin->getNcf($last_id);
$html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}


public function medical_insurance_audit_profile_print()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$data1 = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5),
'id_patient' =>$this->uri->segment(6)
);


$data2 = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5),
'id_patient' =>$this->uri->segment(6),
'id_seguro' =>$this->uri->segment(7)
);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['desde']=$this->uri->segment(3);
$this->data['hasta']=$this->uri->segment(4);
$this->data['medico']=$this->uri->segment(5);
$this->data['id_seguro']=$this->uri->segment(7);
if($this->uri->segment(7)==""){
$results=$this->model_admin->show_patient_arc_report($data1);
$this->data['patient_rows']=$results;
$this->data['count']=count($results);
} else {
$results=$this->model_auditoria_medica->show_patient_arc_report_ars($data2);
$this->data['patient_rows']=$results;
$this->data['count']=count($results);
}

$html = $this->load->view('admin/print/medical_insurance_audit_profile',$this->data,true);

$mpdf->WriteHTML($html);
$mpdf->Output();
}


public function print_recetas($historial_id,$val)
{

$this->session->set_userdata('id',$historial_id);
$this->session->set_userdata('val_rec',$val);
redirect('printings/print016');

}


public function emMed($id_patient,$opid,$fecha,$valf)
{
$this->session->set_userdata('id_patient',$id_patient);
$this->session->set_userdata('opid',$opid);
$this->session->set_userdata('fecha',$fecha);
$this->session->set_userdata('valf',$valf);
redirect('printings/emMedP01');

}


public function emMedP01()
{
if(empty($this->session->userdata['id_patient'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$this->data['mpdf']=$mpdf;
$mpdf->setFooter("Página {PAGENO} de {nb}");
$id_patient= $this->session->userdata['id_patient'];
$fecha= $this->session->userdata['fecha'];
$opid= $this->session->userdata['opid'];
$this->data['id_historial']=$id_patient;
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";

$sql ="SELECT * FROM  emergency_medicaments WHERE id_patient=$id_patient AND user=$opid AND DATE(inserted_time)='$fecha' AND save=1 ORDER BY id DESC";
$print_recetas= $this->db->query($sql);
$this->data['print_recetas']= $print_recetas;

//$print_recetas = $this->model_admin->print_emergencia_medicamentos($id_patient,$opid,$fecha);
//$this->data['print_recetas']=$print_recetas;

/*$data = array(
 'printed' =>0
);

$where = array(
  'id_patient' =>$historial_id
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $data);
*/
$this->data['user_id']= $opid;
$this->data['title']="MEDICAMENTOS";
//$space= "<br/>";
if($print_recetas->result() !=NULL) {
if($this->session->userdata['valf']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);

$html2 = $this->load->view('admin/print/print_emergencia_medicamentos',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->WriteHTML($space);
$mpdf->Output();
}else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}
}



public function print_emergencia_medicamento($id)
{
$this->session->set_userdata('id',$id);
redirect('printings/printemed');

}



public function printemed()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5-L']);
$this->data['mpdf']=$mpdf;
$mpdf->setFooter("Página {PAGENO} de {nb}");
$historial_id= $this->session->userdata['id'];
$this->data['id_historial']=$historial_id;
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";
$print_recetas = $this->model_admin->print_emergencia_medicamentos($historial_id);
$this->data['print_recetas']=$print_recetas;

$data = array(
 'printed' =>0
);

$where = array(
  'id_patient' =>$historial_id
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $data);

$this->data['user_id']= $this->uri->segment(4);
$this->data['title']="MEDICAMENTOS";
//$space= "<br/>";
if($print_recetas !=NULL){
$html = $this->load->view('admin/print/header-print-hist_ind_horiz',$this->data,true);
$html2 = $this->load->view('admin/print/print_emergencia_medicamentos',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->WriteHTML($space);
$mpdf->Output();
}else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}
}









public function print016()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'utf-8', [190, 236])]);
//$mpdf->SetDisplayMode(20);
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A10')]);
$this->data['mpdf']=$mpdf;
$mpdf->setFooter("Página {PAGENO} de {nb}");
$historial_id= $this->session->userdata['id'];
$this->data['id_historial']=$historial_id;
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";
$print_recetas = $this->model_admin->print_recetas($historial_id);
$this->data['print_recetas']=$print_recetas;
 foreach($print_recetas as $rowid)
 $this->data['id_doc']=$rowid->updated_by;
$updt = array(
'singular_id'=>0
 );
$this->model_admin->UpdateSingularId($historial_id,$updt);
$this->data['user_id']= $this->uri->segment(4);
$this->data['title']="RECETAS";
//$space= "<br/>";
if($print_recetas !=NULL){
if($this->session->userdata['val_rec']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$historial_id)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);

$html2 = $this->load->view('admin/print/recetas',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->debug = true;
$mpdf->Output();
}else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}
}





public function print_recetas_horizontal($id,$valrh)
{
$this->session->set_userdata('id',$id);
$this->session->set_userdata('valrh',$valrh);
redirect('printings/printh016');

}



public function printh016()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => [215.9, 139.7]]);
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5-L']);
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
$this->data['mpdf']=$mpdf;
$mpdf->setFooter("Página {PAGENO} de {nb}");
$historial_id= $this->session->userdata['id'];
$this->data['id_historial']=$historial_id;
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";
$print_recetas = $this->model_admin->print_recetas($historial_id);
$this->data['print_recetas']=$print_recetas;
 foreach($print_recetas as $rowid)
 $this->data['id_doc']=$rowid->updated_by;
$updt = array(
'singular_id'=>0
 );
$this->model_admin->UpdateSingularId($historial_id,$updt);
$this->data['user_id']= $this->uri->segment(4);
$this->data['title']="RECETAS";
//$space= "<br/>";

if($this->session->userdata['valrh']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$historial_id)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='';
}
else{
$imgpat='<img  style="width:40px;height:40px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}



if($print_recetas !=NULL){
$html = $this->load->view('admin/print/header-print-hist_ind_horiz',$this->data,true);
$html2 = $this->load->view('admin/print/recetas',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->WriteHTML($space);
$mpdf->Output();
}else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}
}




public function print_es_if_foto_oriz($historial_id,$id,$area,$user)
{
$data['historial_id']=$historial_id;
$data['id']=$id;
$data['area']=$area;
$data['user']=$user;
$this->load->view('admin/print/print_es_if_foto_oriz',$data);;
}




public function print_if_foto_oriz($historial_id,$id,$area,$user)
{
$data['historial_id']=$historial_id;
$data['id']=$id;
$data['area']=$area;
$data['user']=$user;
$this->load->view('admin/print/print_if_foto_oriz',$data);;
}




public function print_if_foto($historial_id,$id,$area,$user)
{
$this->session->set_userdata('historial_id',$historial_id);
$this->session->set_userdata('id',$id);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user',$user);
redirect('printings/print_if_foto2');
}


public function print_if_foto_em($id1,$id2,$id3,$id4,$id5,$id6)
{
	$data['id1']=$id1;
	$data['id2']=$id2;
	$data['id3']=$id3;
	$data['id4']=$id4;
	$data['id5']=$id5;
	$data['id6']=$id6;
$this->load->view('admin/print/print_if_foto_em',$data);
}



public function print_emergency($id1,$id2,$id3,$id4,$id5,$id6,$val)
{
 if($id5=='ev'){
$this->session->set_userdata('id_ev',$id1);
$this->session->set_userdata('patient_ev',$id2);
$this->session->set_userdata('centro_medico_ev',$id4);
$this->session->set_userdata('doc_ev',$id3);
$this->session->set_userdata('val_ev',$val);
$this->session->set_userdata('enviado1',$id6);
redirect('printings/print_ev_nota');

}
else if($id5=='ni'){
$this->session->set_userdata('id_ni',$id1);
$this->session->set_userdata('patient_ni',$id2);
$this->session->set_userdata('centro_medico_ni',$id4);
$this->session->set_userdata('doc_ni',$id3);
$this->session->set_userdata('val_ni',$val);
$this->session->set_userdata('enviado2',$id6);
redirect('printings/print_new_inter');

}
}



public function print_if_foto2()
{
$data['historial_id']= $this->session->userdata['historial_id'];
$data['id']= $this->session->userdata['id'];
$data['area']= $this->session->userdata['area'];
$data['user']= $this->session->userdata['user'];
$this->load->view('admin/print/print_if_foto',$data);

}


public function print_if_foto_c1($id1,$id2,$id3,$id4,$id5)
{
	$data['id1']=$id1;
	$data['id2']=$id2;
	$data['id3']=$id3;
	$data['id4']=$id4;
	$data['id5']=$id5;
$this->load->view('admin/print/print_if_foto_rep_gen_horiz',$data);
}



public function print_if_foto_c($id1,$id2,$id3,$id4,$id5)
{
	$data['id1']=$id1;
	$data['id2']=$id2;
	$data['id3']=$id3;
	$data['id4']=$id4;
	$data['id5']=$id5;
$this->load->view('admin/print/print_if_foto_c',$data);
}

public function print_cirugia_report($id1,$id2,$id3,$id4,$id5,$val)
{
if($id5=='g'){
if($id1=='c_t_0'){
$id_insert=$this->db->select('id')->where('id_patient',$id2)->where('user',$id3)->order_by('id','desc')->limit(1)->get('hc_cirugia_toracica')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insert',$id_insert);
$this->session->set_userdata('id_patient',$id2);
$this->session->set_userdata('centro_medico_c',$id4);
$this->session->set_userdata('id_doc',$id3);
$this->session->set_userdata('val_1',$val);
redirect('printings/print_cirugia');
}

else if($id5=='q'){
if($id1=='c_t_0'){
$id_insert=$this->db->select('id')->where('id_patient',$id2)->where('id_user',$id3)->order_by('id','desc')->limit(1)->get('hc_quirurgica')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insert',$id_insert);
$this->session->set_userdata('id_patient',$id2);
$this->session->set_userdata('centro_medico_c',$id4);
$this->session->set_userdata('id_doc',$id3);
$this->session->set_userdata('val_1',$val);
redirect('printings/print_quirurgica');

}


else if($id5=='ipps'){
if($id1=='new_ipss'){
$id_insert=$this->db->select('id')->where('historial_id',$id2)->where('id_user',$id3)->order_by('id','desc')->limit(1)->get('h_c_ipss')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insert',$id_insert);
$this->session->set_userdata('id_patient',$id2);
$this->session->set_userdata('centro_medico_c',$id4);
$this->session->set_userdata('id_doc',$id3);
$this->session->set_userdata('val_1',$val);
redirect('printings/print_ipss');

}

else if($id5=='card'){
if($id1=='new_card'){
$id_insert=$this->db->select('id')->where('patient',$id2)->where('id_user',$id3)->order_by('id','desc')->limit(1)->get('hc_evaluacion_car_vas')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insert',$id_insert);
$this->session->set_userdata('id_patient',$id2);
$this->session->set_userdata('centro_medico_c',$id4);
$this->session->set_userdata('id_doc',$id3);
$this->session->set_userdata('val_1',$val);
redirect('printings/print_cardio');

}


else{
if($id1=='c_t_0'){
$id_insert=$this->db->select('id')->where('id_patient',$id2)->where('id_user',$id3)->order_by('id','desc')->limit(1)->get('hc_cirugia_reporte')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insertr',$id_insert);
$this->session->set_userdata('id_patientr',$id2);
$this->session->set_userdata('centro_medico_cr',$id4);
$this->session->set_userdata('id_docr',$id3);
$this->session->set_userdata('val_1r',$val);
redirect('printings/print_cirugia_general_report');
}
}




public function print_cirugia_report_horiz($id1,$id2,$id3,$id4,$id5,$val){
if($id1=='c_t_0_'){
$id_insert=$this->db->select('id')->where('id_patient',$id2)->where('id_user',$id3)->order_by('id','desc')->limit(1)->get('hc_cirugia_reporte')->row('id');
}else{
$id_insert=$id1;
}

$this->session->set_userdata('id_insertr',$id_insert);
$this->session->set_userdata('id_patientr',$id2);
$this->session->set_userdata('centro_medico_cr',$id4);
$this->session->set_userdata('id_docr',$id3);
$this->session->set_userdata('val_1r',$val);
redirect('printings/print_cirugia_general_report_horiz_');
}





public function print_cirugia_general_report_horiz_()
{
if(empty($this->session->userdata['id_insertr'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
$this->data['mpdf']=$mpdf;
$id_insert= $this->session->userdata['id_insertr'];
$id_patient= $this->session->userdata['id_patientr'];
$centro_medico= $this->session->userdata['centro_medico_cr'];
$id_doc= $this->session->userdata['id_docr'];
$this->data['id_doc']=$id_doc;
 $doc=$this->db->select('name,exequatur')->where('id_user',$id_doc)
 ->get('users')->row_array();
$this->data['id_insertr']=$id_insert;
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];
$sql ="SELECT * FROM  hc_cirugia_reporte WHERE id=$id_insert";
$cirugia_toracico= $this->db->query($sql);
foreach ($cirugia_toracico->result() as $row)
$this->data['title']="$row->reporte";
$val_1= $this->session->userdata['val_1r'];
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);
$this->data['cirugia_toracico']= $this->db->query($sql);

$html2 = $this->load->view('admin/print/cirugia_toracia_report',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}







public function print_cardio()
{
if(empty($this->session->userdata['id_insert'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_insert'];
$id_patient= $this->session->userdata['id_patient'];
$centro_medico= $this->session->userdata['centro_medico_c'];
$id_doc= $this->session->userdata['id_doc'];
$this->data['id_doc']=$id_doc;
$this->data['id_insert']=$id_insert;
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];

$this->data['title']="EVALUACION CARDIOVASCULAR";
$val_1= $this->session->userdata['val_1'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);

$sql ="SELECT * FROM  hc_evaluacion_car_vas  WHERE id=$id_insert";
$this->data['ipss_data']= $this->db->query($sql);
$html2 = $this->load->view('admin/print/print_cardio',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}



public function print_ipss()
{
if(empty($this->session->userdata['id_insert'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_insert'];
$id_patient= $this->session->userdata['id_patient'];
$centro_medico= $this->session->userdata['centro_medico_c'];
$id_doc= $this->session->userdata['id_doc'];
$this->data['id_doc']=$id_doc;
$this->data['id_insert']=$id_insert;
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];

$this->data['title']="PUNTUACION INTERNACIONAL DE LOS SINTOMAS PROSTATICOS (IPSS)";
$val_1= $this->session->userdata['val_1'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-centro',$this->data,true);

$sql ="SELECT * FROM  h_c_ipss WHERE id=$id_insert";
$this->data['ipss_data']= $this->db->query($sql);
$html2 = $this->load->view('admin/print/print_ipss',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}


public function print_new_inter()
{
if(empty($this->session->userdata['id_ni'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_ni'];
$id_patient= $this->session->userdata['patient_ni'];
$centro_medico= $this->session->userdata['centro_medico_ni'];
$id_doc= $this->session->userdata['doc_ni'];
$this->data['id_doc']=$id_doc;
$enviado_a= $this->session->userdata['enviado2'];
if($enviado_a==1){
$enviado="Triaje";
} elseif($enviado_a==2){
$enviado="Emergencia General";
}
elseif($enviado_a==3){
$enviado="Emergencia Pediatría";
}
elseif($enviado_a==4){
$enviado="Quirofano";
}
elseif($enviado_a==5){
$enviado="Emergencia Obstétrica Y Ginecología";
}
elseif($enviado_a==6){
$enviado="Reanimación";
}
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$id_doc)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['id_insertr']=$id_insert;
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];
$this->data['id_historial']=$id_patient;
$this->data['area']=$area;

 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];
$sql ="SELECT * FROM  emergency_interconsulltas WHERE id=$id_insert";
$this->data['query']= $this->db->query($sql);

$val_1= $this->session->userdata['val_ni'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
$this->data['title']="INTERCONSULTAS<br/>$enviado";
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);
$html2 = $this->load->view('admin/print/print_new_inter',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}




public function print_ev_nota()
{
if(empty($this->session->userdata['id_ev'])){
redirect('/page404');
}
$enviado_a= $this->session->userdata['enviado1'];
if($enviado_a==1){
$enviado="Triaje";
} elseif($enviado_a==2){
$enviado="Emergencia General";
}
elseif($enviado_a==3){
$enviado="Emergencia Pediatría";
}
elseif($enviado_a==4){
$enviado="Quirofano";
}
elseif($enviado_a==5){
$enviado="Emergencia Obstétrica Y Ginecología";
}
elseif($enviado_a==6){
$enviado="Reanimación";
}
$id_insert= $this->session->userdata['id_ev'];
$id_patient= $this->session->userdata['patient_ev'];
$centro_medico= $this->session->userdata['centro_medico_ev'];
$id_doc= $this->session->userdata['doc_ev'];
$this->data['id_doc']=$id_doc;
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$id_doc)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$this->data['id_insertr']=$id_insert;
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];
$this->data['id_historial']=$id_patient;
$this->data['area']=$area;

 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];
$sql ="SELECT * FROM  emergency_realizar_evaluacion WHERE id=$id_insert";
$this->data['query']= $this->db->query($sql);

$val_1= $this->session->userdata['val_ev'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
$this->data['title']="EVALUACION<br/>$enviado";
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);
$html2 = $this->load->view('admin/print/print_ev_nota',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}


public function print_cirugia_general_report()
{
if(empty($this->session->userdata['id_insertr'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_insertr'];
$id_patient= $this->session->userdata['id_patientr'];
$centro_medico= $this->session->userdata['centro_medico_cr'];
$id_doc= $this->session->userdata['id_docr'];
 $doc=$this->db->select('name,exequatur')->where('id_user',$id_doc)
 ->get('users')->row_array();
$this->data['id_insertr']=$id_insert;
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];
$sql ="SELECT * FROM  hc_cirugia_reporte WHERE id=$id_insert";
$cirugia_toracico= $this->db->query($sql);
foreach ($cirugia_toracico->result() as $row)
$this->data['title']="$row->reporte";
$this->data['id_doc']="$row->id_user";
$val_1= $this->session->userdata['val_1r'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,TRUE);
$this->data['cirugia_toracico']= $this->db->query($sql);

$html2 = $this->load->view('admin/print/cirugia_toracia_report',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}




public function print_cirugia()
{
if(empty($this->session->userdata['id_insert'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_insert'];
$id_patient= $this->session->userdata['id_patient'];
$centro_medico= $this->session->userdata['centro_medico_c'];
$id_doc= $this->session->userdata['id_doc'];
$this->data['id_doc']=$id_doc;
 $doc=$this->db->select('name,exequatur')->where('id_user',$id_doc)
 ->get('users')->row_array();
$this->data['id_insert']=$id_insert;
$this->data['doctor']=$doc['name'];
$this->data['exequatur']=$doc['exequatur'];
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';
 $centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)
 ->get('medical_centers')->row_array();
$imgcentro='<img  style="width:70px;" src="'.base_url().'/assets/img/centros_medicos/'.$centro['logo'].'"  />';
$centroname= $centro['name'];

$this->data['title']="REPORTE FIBROBRONCOSCOPIA";
$val_1= $this->session->userdata['val_1'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);

$sql ="SELECT * FROM  hc_cirugia_toracica WHERE id=$id_insert";
$this->data['cirugia_toracico']= $this->db->query($sql);

$html2 = $this->load->view('admin/print/cirugia_toracia',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}


public function print_quirurgica()
{
if(empty($this->session->userdata['id_insert'])){
redirect('/page404');
}
$id_insert= $this->session->userdata['id_insert'];
$id_patient= $this->session->userdata['id_patient'];
$centro_medico= $this->session->userdata['centro_medico_c'];
$id_doc= $this->session->userdata['id_doc'];
$this->data['id_doc']=$id_doc;
$this->data['id_insert']=$id_insert;
$this->data['id_historial']=$id_patient;
$this->data['updated_by']='';
$this->data['date_modif']='';
$this->data['doc_ingo']='';

//----------------CENTRO INFO------------------------------------------------------------------------
$centro=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle')->where('id_m_c',$centro_medico)
->get('medical_centers')->row_array();
$this->data['centro_name']=$centro['name'];
$this->data['centro_logo']=$centro['logo'];
$this->data['primer_tel']=$centro['primer_tel'];
$this->data['segundo_tel']=$centro['segundo_tel'];
$this->data['barrio']=$centro['barrio'];
$this->data['calle']=$centro['calle'];
$this->data['centro_prov']=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$this->data['centro_muni']=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');


$this->data['title']="DESCRIPCION QUIRURGICA";
$val_1= $this->session->userdata['val_1'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
if($val_1==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_patient)
 ->get('patients_appointments')->row_array();
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';
}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-centro',$this->data,true);

$sql ="SELECT * FROM  hc_quirurgica WHERE id=$id_insert";
$this->data['cirugia_toracico']= $this->db->query($sql);

$html2 = $this->load->view('admin/print/print_quirurgica',$this->data,TRUE);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
}




public function print_if_foto_($historial_id,$id,$area,$user)
{
$this->session->set_userdata('historial_id',$historial_id);
$this->session->set_userdata('id',$id);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user',$user);
redirect('printings/print_if_foto1');
}




public function print_if_foto1()
{
if(empty($this->session->userdata['historial_id'])){
redirect('/page404');
}
$data['historial_id']= $this->session->userdata['historial_id'];
$data['id']= $this->session->userdata['id'];
$data['area']= $this->session->userdata['area'];
$data['user']= $this->session->userdata['user'];
$this->load->view('admin/print/print_if_foto_',$data);
}



public function print_estudios($historial_id,$id,$area,$user,$val)
{
$this->session->set_userdata('id_p',$historial_id);
$this->session->set_userdata('id_es',$id);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user_id',$user);
$this->session->set_userdata('val',$val);
redirect('printings/print017');

}



public function print017()
{
if(empty($this->session->userdata['id_p'])){
redirect('/page404');
}
$id_p= $this->session->userdata['id_p'];
$id_es= $this->session->userdata['id_es'];
$area= $this->session->userdata['area'];
$user_id= $this->session->userdata['user_id'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','mode' => 'utf-8','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['id_historial']=$id_p;

$this->data['title']="ESTUDIOS";

$estudios=$this->model_admin->print_estudio($id_es);
$this->data['estudios']=$estudios;

 foreach($estudios as $rowid)
 $this->data['id_doc']=$rowid->updated_by;


if($this->session->userdata['val']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_p)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);
$html2 = $this->load->view('admin/print/estudios',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}



public function print_estudios_horiz($id_p,$id_es,$area,$user_id,$valhes)
{
$this->session->set_userdata('id_p',$id_p);
$this->session->set_userdata('id_es',$id_es);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user_id',$user_id);
$this->session->set_userdata('valhes',$valhes);
redirect('printings/printh017');

}

public function printh017()
{
if(empty($this->session->userdata['id_p'])){
redirect('/page404');
}
$id_p= $this->session->userdata['id_p'];
$id_es= $this->session->userdata['id_es'];
$area= $this->session->userdata['area'];
$user_id= $this->session->userdata['user_id'];
//$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5-L']);
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['id_historial']=$id_p;

$estudios=$this->model_admin->print_estudio($id_es);
$this->data['estudios']=$estudios;

 foreach($estudios as $rowid)
 $this->data['id_doc']=$rowid->updated_by;
$this->data['title']="ESTUDIOS";


if($this->session->userdata['valhes']==0){
$this->data['display']="";
}

else{
$paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_p)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='';
}
else{
$imgpat='<img  style="width:40px;height:40px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";

}

$html = $this->load->view('admin/print/header-print-hist_ind_horiz',$this->data,true);
$html2 = $this->load->view('admin/print/estudios',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}


public function print_labo()
{
$this->session->set_userdata('id_p',$this->uri->segment(3));
$this->session->set_userdata('area',$this->uri->segment(4));
$this->session->set_userdata('user_id',$this->uri->segment(5));
$this->session->set_userdata('val_lab',$this->uri->segment(6));
redirect('printings/print018');

}


public function print_laboratorios($historial_id,$area,$user,$val)
{
$this->session->set_userdata('id_p',$historial_id);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user_id',$user);
$this->session->set_userdata('val_lab',$val);
redirect('printings/print018');

}


public function print018()
{
if(empty($this->session->userdata['id_p'])){
redirect('/page404');
}
$id_p= $this->session->userdata['id_p'];
$user_id= $this->session->userdata['user_id'];
$area= $this->session->userdata['area'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";
$this->data['id_historial']=$id_p;
$this->data['area']= $area;
$this->data['user_id']= $user_id;
$print = array(
  'historial_id'  => $id_p,
  'print'=>1,
  'user_id'=>$user_id
);
if($this->uri->segment(4)==0){
$IndicacionesLab = $this->model_admin->PrintlaboratoriosAdmin($print);
}else {
$IndicacionesLab = $this->model_admin->Printlaboratorios($print);
}
$this->data['IndicacionesLab']=$IndicacionesLab;
 foreach($IndicacionesLab as $rowid)
 $this->data['id_doc']=$rowid->updated_by;
//--------------------------------------------------------------------------------------------------
$updt = array(
'printing'=>0
 );
$this->model_admin->updateIndicacionesLab($updt,$id_p);
//---------------------------------------------------------------------------------------------------
$this->data['title']="LABORATORIOS";
if($IndicacionesLab !=NULL){

if($this->session->userdata['val_lab']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_p)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);

$html2 = $this->load->view('admin/print/lab',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->debug = true;
$mpdf->Output();
} else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}

}



public function print_laboratorios_horiz($id_p,$area,$user_id,$valhl)
{
$this->session->set_userdata('id_p',$id_p);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('user_id',$user_id);
$this->session->set_userdata('valhl',$valhl);
redirect('printings/printh018');

}



public function printh018()
{
if(empty($this->session->userdata['id_p'])){
redirect('/page404');
}
$id_p= $this->session->userdata['id_p'];
$user_id= $this->session->userdata['user_id'];
$area= $this->session->userdata['area'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$this->data['updated_by']="";
$this->data['date_modif']="";
$this->data['doc_ingo']="";
$this->data['id_historial']=$id_p;
$this->data['area']= $area;
$this->data['user_id']= $user_id;
$print = array(
  'historial_id'  => $id_p,
  'print'=>1,
  'user_id'=>$user_id
);
if($this->uri->segment(4)==0){
$IndicacionesLab = $this->model_admin->PrintlaboratoriosAdmin($print);
}else {
$IndicacionesLab = $this->model_admin->Printlaboratorios($print);
}
$this->data['IndicacionesLab']=$IndicacionesLab;

 foreach($IndicacionesLab as $rowid)
 $this->data['id_doc']=$rowid->updated_by;
//--------------------------------------------------------------------------------------------------
$updt = array(
'printing'=>0
 );
$this->model_admin->updateIndicacionesLab($updt,$id_p);

if($this->session->userdata['valhl']==0){
$this->data['display']="";
}

else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$id_p)
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='';
}
else{
$imgpat='<img  style="width:40px;height:40px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';


}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}
//---------------------------------------------------------------------------------------------------
$this->data['title']="LABORATORIOS";
if($IndicacionesLab !=NULL){
$html = $this->load->view('admin/print/header-print-hist_ind_horiz',$this->data,true);
$html2 = $this->load->view('admin/print/lab',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();
} else{
	echo "<p>Vuelva al historial clínica para volver al proceso de impresión.</p>";
}

}





public function oftal()
{
$this->session->set_userdata('idoftal',$this->input->get('historial_id'));
$this->session->set_userdata('val_oftal',$this->input->get('val'));

redirect('printings/print015');

}

public function ofal_ref()
{
$this->session->set_userdata('idoftal',$this->input->get('historial_id'));
$this->session->set_userdata('val_oftal',$this->input->get('val'));

redirect('printings/print0150');

}



public function ofal_ref_h()
{
$this->session->set_userdata('idoftal',$this->input->get('historial_id'));
$this->session->set_userdata('val_oftal',$this->input->get('val'));

redirect('printings/print015000h');

}


public function print015000h()
{
if(empty($this->session->userdata['idoftal'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path',array('mode' => 'utf-8', 'format' => 'A5-L')]);
$this->data['mpdf']=$mpdf;
$id= $this->session->userdata['idoftal'];
$val=$this->db->select('id_hist,id_user,inserted')->where('id',$id)->get('h_c_of_refracion')->row_array();
$this->data['author']=$this->db->select('name')->where('id_user',$val['id_user'])->get('users')->row('name');

$this->data['id_historial']=$val['id_hist'];

$sql = "select * from h_c_of_refracion where id=$id ";
$rows= $this->db->query($sql);
$this->data['show_oft']=$rows->result();
$this->data['title']="REFRACCION";

$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['inserted']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="$area<br/>Exeq. $execuatur";

$mpdf->setFooter("Página {PAGENO} de {nb}");

if($this->session->userdata['val_oftal']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['id_hist'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$id_centro=$this->db->select('id_centro')->where('id',$id)->get('h_c_of_refracion')->row('id_centro');

$centro=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle')->where('id_m_c',$id_centro)
->get('medical_centers')->row_array();
$this->data['centro_name']=$centro['name'];
$this->data['centro_logo']=$centro['logo'];
$this->data['primer_tel']=$centro['primer_tel'];
$this->data['segundo_tel']=$centro['segundo_tel'];
$this->data['barrio']=$centro['barrio'];
$this->data['calle']=$centro['calle'];
$this->data['rnc']=$centro['rnc'];
$this->data['centro_prov']=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$this->data['centro_muni']=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');


$html = $this->load->view('admin/print/header-refraccion',$this->data,true);
$this->data['docid']=$val['id_user'];
$html2 = $this->load->view('admin/print/oftal-ref',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();

}

public function ofal_ref_()
{
$this->session->set_userdata('idoftal',$this->input->get('historial_id'));
$this->session->set_userdata('val_oftal',$this->input->get('val'));

redirect('printings/print015000');

}


public function print015000()
{
if(empty($this->session->userdata['idoftal'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);

$id= $this->session->userdata['idoftal'];
$val=$this->db->select('id_hist,id_user,inserted')->where('id',$id)->get('h_c_of_refracion')->row_array();
$this->data['author']=$this->db->select('name')->where('id_user',$val['id_user'])->get('users')->row('name');

$this->data['id_historial']=$val['id_hist'];

$sql = "select * from h_c_of_refracion where id=$id ";
$rows= $this->db->query($sql);
$this->data['show_oft']=$rows->result();
$this->data['title']="REFRACCION";
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['inserted']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['id_user'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="<p>$area<br/>Exeq. $execuatur </p>";

$mpdf->setFooter("Página {PAGENO} de {nb}");

if($this->session->userdata['val_oftal']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['id_hist'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}


$id_centro=$this->db->select('id_centro')->where('id',$id)->get('h_c_of_refracion')->row('id_centro');

$centro=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle')->where('id_m_c',$id_centro)
->get('medical_centers')->row_array();
$this->data['centro_name']=$centro['name'];
$this->data['centro_logo']=$centro['logo'];
$this->data['primer_tel']=$centro['primer_tel'];
$this->data['segundo_tel']=$centro['segundo_tel'];
$this->data['barrio']=$centro['barrio'];
$this->data['calle']=$centro['calle'];
$this->data['rnc']=$centro['rnc'];
$this->data['centro_prov']=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$this->data['centro_muni']=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');


$html = $this->load->view('admin/print/header-refraccion',$this->data,true);
$this->data['docid']=$val['id_user'];

$html2 = $this->load->view('admin/print/oftal-ref',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
//$mpdf->debug = true;
$mpdf->Output();


}




public function print0150()
{
if(empty($this->session->userdata['idoftal'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path','format' => 'A5']);
$id= $this->session->userdata['idoftal'];
$val=$this->db->select('id_historial,user_id,updated_time,updated_by')->where('id_oftal',$id)->get('h_c_oftalmologia')->row_array();
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['id_historial'];

$this->data['show_oft'] = $this->model_admin->showOftalById($id);
$this->data['title']="OFTALMOLOGIA";

$perfil=$this->db->select('perfil')->where('id_user',$val['user_id'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['user_id'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$mpdf->setFooter("Página {PAGENO} de {nb}");

if($this->session->userdata['val_oftal']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['id_historial'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist_ind',$this->data,true);
$this->data['docid']=$val['user_id'];
$html2 = $this->load->view('admin/print/oftal-ref1',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}




public function print015()
{
if(empty($this->session->userdata['idoftal'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['idoftal'];
$val=$this->db->select('id_historial,user_id,updated_time,updated_by')->where('id_oftal',$id)->get('h_c_oftalmologia')->row_array();
$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');

$this->data['id_historial']=$val['id_historial'];

$this->data['show_oft'] = $this->model_admin->showOftalById($id);
$this->data['title']="OFTALMOLOGIA";

$perfil=$this->db->select('perfil')->where('id_user',$val['user_id'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['user_id'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}
$mpdf->setFooter("Página {PAGENO} de {nb}");

if($this->session->userdata['val_oftal']==0){
$this->data['display']="";
}else{
 $paciente=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$val['id_historial'])
 ->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:70px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';
}else{
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($paciente['photo']==""){
$imgpat='<img  style="width:70px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$imgpat='<img  style="width:70px;height:70px;object-position:50% 50%;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';

}

$this->data['display']="<td style='width:40px'>$imgpat</td>";
}

$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$this->data['docid']=$val['user_id'];
$html2 = $this->load->view('admin/print/oftal',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}

public function dermatologo($id)
{
$this->session->set_userdata('id',$id);
redirect('printings/print014');

}


public function print014()
{
if(empty($this->session->userdata['id'])){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$id= $this->session->userdata['id'];
$val=$this->db->select('historial_id,user_id,updated_time,updated_by')->where('id_derma',$id)->get('h_c_dermatologo')->row_array();

$author=$this->db->select('name')->where('id_user',$val['updated_by'])->get('users')->row('name');
$mpdf->setFooter("Página {PAGENO} de {nb}");

$this->data['id_historial']=$val['historial_id'];

$this->data['dermato'] = $this->model_admin->show_derma_by_id($id);
$this->data['title']="DERMATOLOGO";

$perfil=$this->db->select('perfil')->where('id_user',$val['user_id'])->get('users')->row('perfil');
if ($perfil=="Admin"){
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$this->data['doc_ingo']="";
}
else {
$this->data['updated_by']=$author;
$this->data['date_modif']=date("d-m-Y H:i:s", strtotime($val['updated_time']));
$doc=$this->db->select('exequatur,area')->where('id_user',$val['user_id'])->get('users')->row_array();
  $execuatur=$doc['exequatur'];
   $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
   $this->data['doc_ingo']="<p style='font-size:14px'>$area<br/>Exeq. $execuatur </p>";
}


$html = $this->load->view('admin/print/header-print-hist',$this->data,true);
$html2 = $this->load->view('admin/print/dermatologo',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->WriteHTML($html2);
$mpdf->Output();


}

public function print_billing()
{
$this->session->set_userdata('idfacc',$this->uri->segment(3));
$this->session->set_userdata('print',$this->uri->segment(4));
redirect('printings/print_billing01');

}

public function print_billing01()
{

if(empty($this->session->userdata['idfacc'])){
redirect('/page404');
}


$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$idfacc= $this->session->userdata['idfacc'];
$print= $this->session->userdata['print'];
 $this->data['print']=$print;
$mpdf->setFooter('{PAGENO}');
$pm=$this->db->select('paciente,medico,centro_medico,id_rdv')->where('idfacc',$idfacc)->get('factura2')->row_array();
 $this->data['last_bill_id']=$idfacc;

 //$filter_date=$this->db->select('filter_date')->where('id_apoint',$pm['id_rdv'])->where('filter_date',date('Y-m-d'))->get('rendez_vous')->row('filter_date');
 $filter_date=$this->db->select('insert_date')->where('p_id',$pm['paciente'])->where('user_id',$pm['medico'])->where('centro_medico',$pm['centro_medico'])->order_by('insert_date','desc')->limit(1)->get('h_c_diagno_def_link')->row('insert_date');


 $this->data['show_diagno_pat']=$this->model_admin->show_diagno_pat($pm['paciente'],$pm['medico'],$pm['centro_medico'],$filter_date);

 $diagnos =$this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$pm['paciente'])->
where('id_user',$pm['medico'])->
where('centro_medico',$pm['centro_medico'])->
order_by('id_cdia','desc')->
get('h_c_conclusion_diagno')->row_array();
$this->data['procedimiento']=$diagnos['procedimiento'];
$this->data['otros_diagnos']=$diagnos['otros_diagnos'];
 $this->data['billing1']=$this->model_admin->showBilling1($idfacc);
 $this->data['billing2']=$this->model_admin->showBilling2($idfacc);

if($print=="medico"){
$html = $this->load->view('admin/print/billing',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
} else{

$html =$this->load->view('admin/print/billing_centro',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}


}





public function print_billing_report_date_range()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
   $desde=$this->uri->segment(3);
	$hasta=$this->uri->segment(4);
	$seguro=$this->uri->segment(5);
	$centro=$this->uri->segment(6);
	$data1 = array(
	'seguro' => $seguro,
    'desde' => $desde,
	'hasta' => $hasta,
	'centro' => $centro

	);
$mpdf->AddPage('L');
$mpdf->setFooter("Página {PAGENO} de {nb}");
$display_report= $this->model_admin->get_seguro_date_range($data1);
$this->data['display_report']=$display_report;
$this->data['count']=count($display_report);
$this->data['seguro']=$seguro;
$this->data['centro']=$centro;
$this->data['desde']=$desde;
$this->data['hasta']=$hasta;
$html = $this->load->view('admin/print/print_billing_report_date_range',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();

}




public function print_billing_seguro_privado()
{
$this->session->set_userdata('idfacc',$this->uri->segment(3));
$this->session->set_userdata('print',$this->uri->segment(4));
redirect('printings/print_billing_seguro_privado_');

}



public function print_billing_seguro_privado_()
{

if(empty($this->session->userdata['idfacc'])){
redirect('/page404');
}

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$idfacc= $this->session->userdata['idfacc'];
$mpdf->setFooter('{PAGENO}');
 $this->data['print']= $this->session->userdata['print'];
$pm=$this->db->select('paciente,medico,centro_medico')->where('idfacc',$idfacc)->get('factura2')->row_array();
 $this->data['last_bill_id']=$idfacc;
 $this->data['id_doc']=$pm['medico'];
 $this->data['show_diagno_pat']=$this->model_admin->show_diagno_pat($pm['paciente'],$pm['medico'],$pm['centro_medico'],'');

 $this->data['procedimiento'] =$this->db->select('procedimiento')->
where('historial_id',$pm['paciente'])->
where('id_user',$pm['medico'])->
where('centro_medico',$pm['centro_medico'])->
get('h_c_conclusion_diagno')->row('procedimiento');

 $this->data['billing1']=$this->model_admin->showBilling1($idfacc);
 $billing2=$this->model_admin->showBilling2($idfacc);
$this->data['billing2']=$billing2;
$this->data['count']=count($billing2);
$html = $this->load->view('admin/print/seguro-privado/billing_centro',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();

}





public function print_patients_to_disabled()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$doc=$this->uri->segment(3);
$centro=$this->uri->segment(4);
$where = array(
'id_doctor' =>$doc,
'id_centro' =>$centro
);
$updateData = array(
'active'  =>1);
$this->db->where($where);
$this->db->update("doctor_agenda_test",$updateData);

$this->data['doc']=$doc;
$this->data['centro']=$centro;

$this->data['doctor']=$this->db->select('name')->where('id_user',$doc)
->get('users')->row('name');

$this->data['centro_name']=$this->db->select('name')->where('id_m_c',$centro )
->get('medical_centers')->row('name');
$mpdf->setFooter("Página {PAGENO} de {nb}");

 $html = $this->load->view('admin/print/print_patients_to_disabled',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}



public function invoice_ars_p_v_(){

$this->session->set_userdata('desde', $this->uri->segment(3));
$this->session->set_userdata('hasta', $this->uri->segment(4));
$this->session->set_userdata('id_ncf', $this->uri->segment(5));
$this->session->set_userdata('is_admin', $this->uri->segment(6));
$this->session->set_userdata('id_user', $this->uri->segment(7));
$this->session->set_userdata('id_patient', $this->uri->segment(8));
redirect('printings/printinv001');
}



public function printinv001()
{
if(empty($this->session->userdata['id_ncf']))	{
redirect('/page404');
}
$data['desde']=$this->session->userdata['desde'];
$data['hasta']=$this->session->userdata['hasta'];
$data['id_user']=$this->session->userdata['id_user'];
$id_patient=$this->session->userdata['id_patient'];
$data['id_patient']=$id_patient;
$data['after_save']=0;
$data['areas']=$this->model_admin->get_serv_fac2_doc(0);
$data['area']="";
$data['area_id']="";
$data['id_ncf'] =$this->session->userdata['id_ncf'];
$invoice = $this->model_admin->print_ars_fac_found($this->session->userdata['id_ncf'],$id_patient);
$data['invoice']=$invoice;
$data['cnt']=count($invoice);
$data['nota_ncf'] = $this->model_admin->getNcf($this->session->userdata['id_ncf']);
$data['is_admin']= $this->session->userdata['is_admin'];
//$data['id_centro']= $this->session->userdata['id_centro'];
$this->load->view('medico/billing/invoice_ars_claim/after-save',$data);
}




public function print_ars_fac_found($id_ncfp,$id_centrop,$desde,$hasta,$id_patient){
$this->session->set_userdata('id_ncfp', $id_ncfp);
$this->session->set_userdata('id_centrop', $id_centrop);
$this->session->set_userdata('desdeinv', $desde);
$this->session->set_userdata('hastainv', $hasta);
$this->session->set_userdata('id_patient', $id_patient);
redirect('printings/print001');

}


public function print_ncf_report(){
$this->session->set_userdata('medico_ncf', $this->input->get('medico-ncf'));
$this->session->set_userdata('desde_ncf', $this->input->get('desde-ncf'));
$this->session->set_userdata('hasta_ncf', $this->input->get('hasta-ncf'));
redirect('printings/print001ncf');
}



public function print001ncf(){
if(empty($this->session->userdata['medico_ncf']))	{
redirect('/page404');
}
ini_set("pcre.backtrack_limit", "5000000");
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter('{PAGENO}');
$medico=$this->session->userdata['medico_ncf'];
$date1=$this->session->userdata['desde_ncf'];
$date2=$this->session->userdata['hasta_ncf'];
$condition = "CAST(fecha AS DATE) between " ."'".$date1."'" . " AND ". "'".$date2."'";
//$sql ="SELECT ncf_id, seguro_medico,medico, fecha, sum(totpagseg) as t2 FROM invoice_ars_claims WHERE $condition && medico=$medico group by ncf_id ORDER BY ncf_id DESC";
$sql ="SELECT ncf_id,value, seguro_medico,medico, fecha, sum(totpagseg) as t2 FROM invoice_ars_claims
JOIN ncf ON invoice_ars_claims.ncf_id=ncf.id_ncf
WHERE $condition && medico=$medico && value !='' group by value ORDER BY fecha DESC";
$this->data['query'] = $this->db->query($sql);
$this->data['from'] = $date1;
$this->data['to'] = $date2;
$this->data['medico'] = $medico;

$html =$this->load->view('admin/print/ncf_reporte',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}


public function print001(){
if(empty($this->session->userdata['id_ncfp']))	{
redirect('/page404');
}
ini_set("pcre.backtrack_limit", "5000000");
$id_patient=$this->session->userdata['id_patient'];
$id_ncf=$this->session->userdata['id_ncfp'];
$id_centro=$this->session->userdata['id_centrop'];
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter('{PAGENO}');
$this->data['last_id'] =$id_ncf;
$this->data['id_centro'] =$id_centro;
$invoice= $this->model_admin->print_ars_fac_found($id_ncf,$id_patient);
$this->data['invoice'] =$invoice;
$this->data['cntinv'] =count($invoice);
$this->data['nota_ncf'] = $this->model_admin->getNcf($id_ncf);
$this->data['desde'] =$this->session->userdata['desdeinv'];
$this->data['hasta'] =$this->session->userdata['hastainv'];
$html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
$mpdf->WriteHTML($html);
//$mpdf->debug = true;
$mpdf->Output();
}




public function printHist(/*$id_enf,$id_cdia,$id_sig,$id_patm,$id_i_e,$id_patl,$idssr,$idobs,$id_oftal*/){
$id_enf= $this->uri->segment(3);
$id_cdia= $this->uri->segment(4);
$id_sig= $this->uri->segment(5);
$id_patm=$this->uri->segment(6);
$id_i_e= $this->uri->segment(7);
$id_patl=$this->uri->segment(8);
$idssr=$this->uri->segment(9);
$idobs=$this->uri->segment(10);
$id_oftal= $this->uri->segment(11);

if($id_enf=="" || $id_cdia=="" || $id_sig=="" || $id_patm=="" || $id_i_e=="" || $id_patl=="" || $idssr=="" || $idobs=="" || $id_oftal==""){
redirect('/page404');
}
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
//enfermedad actual
$this->data['print_enf_act'] = $this->model_admin->show_enfermedad($id_enf);
//conclusion diagnostic
$patient=$this->db->select('historial_id,centro_medico,inserted_time,user_id')->where('id_enf',$id_enf)->get('h_c_enfermedad')->row_array();
$this->data['print_cond'] = $this->model_admin->show_con_by_id($id_cdia,0);
$this->data['procedimiento']=$this->db->select('procedimiento')->where('id_cdia',$id_cdia)->get('h_c_conclusion_diagno')->row('procedimiento');
$this->data['id_historial']=$patient['historial_id'];
$this->data['centro_medico']=$patient['centro_medico'];
$this->data['docid']=$patient['user_id'];
$this->data['time_done'] = date('d-m-Y h:i A', strtotime($patient['inserted_time']));
$doctor=$this->db->select('name,area')->where('id_user',$patient['user_id'])
->get('users')->row_array();
$this->data['doctor']=$doctor['name'];
$this->data['area'] =$this->db->select('title_area')->where('id_ar',$doctor['area'])
->get('areas')->row('title_area');
//ssr
$this->data['ssr'] = $this->model_admin->data_ssr_by_id($idssr);
//obs
$this->data['obs']=$this->model_admin->getObs($idobs);
$this->data['obs2']=$this->model_admin->getObs2($idobs);
$this->data['obs3']=$this->model_admin->getObs3($idobs);
$this->data['obs4']=$this->model_admin->getObs4($idobs);
//examen fisico
$this->data['edad']=$this->db->select('edad')->where('id_p_a',$patient['historial_id'])->get('patients_appointments')->row('edad');
$this->data['ExamFisById'] = $this->model_admin->ExamFisById($id_sig);
$this->data['signo_by_id'] = $this->model_admin->ExamFisById($id_sig);
//oftalmologia
$this->data['show_oft'] = $this->model_admin->showOftalById($id_oftal);

//recetas
$this->data['print_recetas']= $this->model_admin->print_recetas_email_patient($id_patm);
//estudios
$this->data['estudios']=$this->model_admin->print_estudio($id_i_e);
//laboratorios
$this->data['IndicacionesLab']=$this->model_admin->Printlaboratorios_email_patient($id_patl);
$mpdf->setFooter("Página {PAGENO} de {nb}");
$html = $this->load->view('admin/print/printHist',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();
}




public function get_seguro_date_range()
{

$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
ini_set("pcre.backtrack_limit", "5000000");
$mpdf->setFooter('{PAGENO}');
$seguro=$this->input->get('seguro');
$desde=$this->input->get('desde-search');
$hasta=$this->input->get('hasta-search');
$centro=$this->input->get('centro-search');
$doctor=$this->input->get('doctor-rg');

$data1 = array(
'seguro' => $seguro,
'desde' => $desde,
'hasta' => $hasta,
'centro' => $centro,
'doctor' => $doctor

);
// $this->data['display_report'] = $this->model_admin->get_seguro_date_range($data1);
$this->data['centro']=$centro;
$this->data['doctor']=$doctor;
$this->data['desde']=$desde;
$this->data['hasta']=$hasta;
$this->data['seguro']=$seguro;
if($centro){
$where="centro_medico=$centro AND medico=$doctor";
}else{
$where="medico=$doctor";
}
$sqlgnl="SELECT *,sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura2 JOIN factura ON factura.id2=factura2.idfacc WHERE CAST(filter_date AS DATE) BETWEEN '$desde' AND '$hasta' AND seguro_medico=$seguro AND $where GROUP BY numauto ORDER BY filter_date DESC";

$this->data['querygnl'] = $this->db->query($sqlgnl);
$html =$this->load->view('admin/print/patient-billing-report-by-date',$this->data,true);
$mpdf->WriteHTML($html);
//$mpdf->debug = true;
$mpdf->Output();


}




public function print_emg_f()
{
$this->session->set_userdata('id_mergencia',$this->uri->segment(3));
redirect('printings/print_emergency_fac');

}



public function print_emergency_fac()
{

if(empty($this->session->userdata['id_mergencia'])){
redirect('/page404');
}


$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);

$mpdf->setFooter('{PAGENO}');
//------------------------------------------------------------------------------
$id_mergencia=$this->session->userdata['id_mergencia'];
$this->data['is_admin']='yes';
$this->data['id_mergencia']=$id_mergencia;


$em_patient=$this->db->select('enviado_name,created_date,create_time')->where('id_ep',$id_mergencia)->get('emergency_patients')->row_array();
$this->data['enviado_name']=$em_patient['enviado_name'];
$this->data['date_ingreso']=$em_patient['created_date'];
$this->data['fecha_ingreso']=$em_patient['create_time'];
$this->data['fecha_alta']=$this->db->select('inserted_time')->where('id_em',$id_mergencia)->get('emergency_conclucion_alta')->row('inserted_time');




$facingo=$this->db->select('*')->where('id_mergencia',$id_mergencia)->get('emergency_factura')->row_array();
$patient_id=$facingo['patient'];
$this->data['fecha']=$facingo['fecha'];
$this->data['numauto']=$facingo['num_auto'];
$this->data['autopor']=$facingo['autor_por'];
$this->data['numero_factura']=$facingo['numero_factura'];
$this->data['ncf']=$facingo['ncf'];
$this->data['numfac']=$facingo['numero_factura'];
$this->data['vec_fec']=$facingo['vec_fec'];
//--------------------------------CENTRO INFO--------------------------------------------------------
$centro_id=$facingo['centro'];
$this->data['id_cm']=$centro_id;
$centro=$this->db->select('name,logo,fax,primer_tel,segundo_tel,rnc,calle,barrio')->where('id_m_c',$centro_id)
->get('medical_centers')->row_array();
$this->data['centro_name']=$centro['name'];
$this->data['centro_logo']=$centro['logo'];
$this->data['calle']=$centro['calle'];
$this->data['rnc']=$centro['rnc'];
$this->data['fax']=$centro['fax'];
$this->data['barrio']=$centro['barrio'];
$this->data['primer_tel']=$centro['primer_tel'];
//-----------SEGURO INFO--------------------------------------------------
$seguro_id=$facingo['seguro'];
$this->data['id_seguro']=$seguro_id;
$seguro=$this->db->select('title,rnc')->where('id_sm',$seguro_id)->get('seguro_medico')->row_array();
$this->data['seguro']=$seguro['title'];
$this->data['rnc']=$seguro['rnc'];


  $this->data['seguro_codigo_contrato']=$this->db->select('codigo')->where('id_centro',$centro_id)
->where('id_seguro',$seguro_id)->get('codigo_contrato')->row('codigo');

//-------------PATIENT INFO------------------------------------------------------------------------

$paciente=$this->db->select('id_p_a,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,date_nacer')->where('id_p_a',$patient_id)->get('patients_appointments')->row_array();
$this->data['ced3']=$paciente['ced3'];
$this->data['ced1']=$paciente['ced1'];
$this->data['ced2']=$paciente['ced2'];
$this->data['paciente_nombre']=$paciente['nombre'];
$this->data['tel_resi']=$paciente['tel_resi'];
$this->data['tel_cel']=$paciente['tel_cel'];
$this->data['cedula']=$paciente['cedula'];
$this->data['afiliado']=$paciente['afiliado'];
$this->data['email']=$paciente['email'];
$this->data['photo']=$paciente['photo'];
$this->data['num_pat']=$paciente['id_p_a'];
$date_nacer=$paciente['date_nacer'];
 $age = '';
 $diff = date_diff(date_create(), date_create($date_nacer));
    $years = $diff->format("%y");
    $months = $diff->format("%m");
    $days = $diff->format("%d");

    if ($years) {
        $age = ($years < 2) ? '1 año' : "$years años";
    } else {
        $age = '';
        if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
        if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
    }

	$this->data['age']=trim($age);
$this->data['numafiliado']=$this->db->select('input_name')
->where('patient_id',$patient_id)
->where('inputf',"No. DE AFILIADO")
->get('saveinput')->row("input_name");




//--------CIE10-----------------------------------------
$id_emergencia=$facingo['id_mergencia'];
$this->data['id_em']=$id_emergencia;
$cie10=$this->db->select('id,otros_diagnos')->where('id_em',$id_emergencia)->get('emergency_conclucion_alta')->row_array();
$idcie10=$cie10['id'];
$this->data['otros_diagnos']=$cie10['otros_diagnos'];

$sqlcied ="SELECT description, code FROM  h_c_diagno_def_link INNER JOIN cied ON cied.idd=h_c_diagno_def_link.diagno_def where con_id_link=$idcie10 ";
$this->data['show_diagno_pat'] = $this->db->query($sqlcied);

//------------PROCEDIMIENTOS-----------------------------------------

$sqlpr ="SELECT name FROM emergency_procedimiento where idempro=$id_emergencia";
$this->data['procedimiento'] = $this->db->query($sqlpr);
//------------------------------------------------------------------------------
$html = $this->load->view('admin/print/emergency_factura',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();

}



public function print_hosp1(){
$this->session->set_userdata('id_hosp', $this->uri->segment(3));
$this->session->set_userdata('id_patient', $this->uri->segment(4));
$this->session->set_userdata('id_seguro', $this->uri->segment(5));
$this->session->set_userdata('id_doctor', $this->uri->segment(6));
$this->session->set_userdata('id_centro', $this->uri->segment(7));
redirect('printings/print_hosp101');
}

public function print_hosp101(){
if(empty($this->session->userdata['id_hosp']))	{
redirect('/page404');
}
ini_set("pcre.backtrack_limit", "5000000");
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$mpdf->setFooter('{PAGENO}');
$id_hosp=$this->session->userdata['id_hosp'];
$id_patient=$this->session->userdata['id_patient'];
$id_seguro=$this->session->userdata['id_seguro'];
$id_doctor=$this->session->userdata['id_doctor'];
$id_centro=$this->session->userdata['id_centro'];

$this->data['id_hosp']=$id_hosp;

//-------------PATIENT INFO------------------------------------------------------------------------

$paciente=$this->db->select('id_p_a,nombre,tel_resi,tel_cel,email,afiliado,plan,cedula,photo,ced1,ced2,ced3,date_nacer,provincia,municipio,barrio,calle,nacionalidad,contacto_em_nombre,contacto_em_cel,contacto_em_tel1,contacto_em_tel2')->where('id_p_a',$id_patient)->get('patients_appointments')->row_array();
$this->data['ced3']=$paciente['ced3'];
$this->data['ced1']=$paciente['ced1'];
$this->data['ced2']=$paciente['ced2'];
$this->data['paciente_nombre']=$paciente['nombre'];
$this->data['tel_resi']=$paciente['tel_resi'];
$this->data['tel_cel']=$paciente['tel_cel'];
$this->data['cedula']=$paciente['cedula'];
$this->data['afiliado']=$paciente['afiliado'];
$this->data['email']=$paciente['email'];
$this->data['num_pat']=$paciente['id_p_a'];
$this->data['nacionalidad']=$paciente['nacionalidad'];
$date_nacer=$paciente['date_nacer'];
$this->data['paciente_barrio']=$paciente['barrio'];
$this->data['paciente_calle']=$paciente['calle'];

$this->data['dato_accom_name']=$paciente['contacto_em_nombre'];
$this->data['parentecto']=$paciente['contacto_em_cel'];
$this->data['cel1']=$paciente['contacto_em_tel1'];
$this->data['cel2']=$paciente['contacto_em_tel2'];
 $age = '';
 $diff = date_diff(date_create(), date_create($date_nacer));
    $years = $diff->format("%y");
    $months = $diff->format("%m");
    $days = $diff->format("%d");

    if ($years) {
        $age = ($years < 2) ? '1 año' : "$years años";
    } else {
        $age = '';
        if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
        if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
    }

	$this->data['age']=trim($age);
$nss=$this->db->select('input_name,inputf')->where('patient_id',$id_patient)->get('saveinput')->row_array();
$this->data['input_name']=$nss['input_name'];
$this->data['inputf']=$nss['inputf'];
$this->data['pat_prov']=$this->db->select('title')->where('id',$paciente['provincia'])->get('provinces')->row('title');
$this->data['pat_muni']=$this->db->select('title_town')->where('id_town',$paciente['municipio'])->get('townships')->row('title_town');

//----------------CENTRO INFO------------------------------------------------------------------------
$centro=$this->db->select('name,logo,rnc,primer_tel,segundo_tel,provincia,municipio,barrio,calle')->where('id_m_c',$id_centro)
->get('medical_centers')->row_array();
$this->data['centro_name']=$centro['name'];
$this->data['centro_logo']=$centro['logo'];
$this->data['primer_tel']=$centro['primer_tel'];
$this->data['segundo_tel']=$centro['segundo_tel'];
$this->data['barrio']=$centro['barrio'];
$this->data['calle']=$centro['calle'];
$this->data['centro_prov']=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$this->data['centro_muni']=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');
//----------------SEGURO---------------------------------------------------------------------------------

$seguro=$this->db->select('title,rnc')->where('id_sm',$id_seguro)->get('seguro_medico')->row_array();
$this->data['seguro']=$seguro['title'];
$this->data['rnc']=$seguro['rnc'];
$this->data['tipo']=$paciente['afiliado'];
$this->data['plan']=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');

//-----------------------------DOCTOR------------------------------------------------------------------------------

 $doctor=$this->db->select('id_user,name,area,exequatur')->where('id_user',$id_doctor )
->get('users')->row_array();
$this->data['docname']=$doctor['name'];
$this->data['exequatur']=$doctor['exequatur'];
$this->data['area']=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');

//-----------------HOSPITAL DATA----------------------------------------------------------------------------------------

 $dato_ing=$this->db->select('causa,via,sala,servicio,cama,hosp_auto,hosp_auto_por,timeinserted,inserted')->where('id',$id_hosp )
->get('hospitalization_data')->row_array();
$this->data['causa']=$dato_ing['causa'];
$this->data['via']=$dato_ing['via'];
$this->data['sala']=$dato_ing['sala'];
$this->data['servicio']=$dato_ing['servicio'];
$this->data['cama']=$dato_ing['cama'];
$this->data['hosp_auto']=$dato_ing['hosp_auto'];
$this->data['hosp_auto_por']=$dato_ing['hosp_auto_por'];
$this->data['timeinserted']=$dato_ing['timeinserted'];
$this->data['username']=$this->db->select('name')->where('id_user',$dato_ing['inserted'] )
->get('users')->row('name');
$html =$this->load->view('admin/print/hospitalization-data',$this->data,true);
$mpdf->WriteHTML($html);
//$mpdf->debug = true;
$mpdf->Output();

}












//------------------------------------------------------------------------------------------------------------------------------
}
