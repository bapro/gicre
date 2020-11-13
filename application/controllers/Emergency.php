<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emergency extends CI_Controller { 
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_medico');
$this->load->model('navigation/account_demand_model');
$this->load->model("padron_model");
$this->load->model('excel_import_model');
$this->load->model("model_emergencia");
$this->load->library('excel');
$this->load->library('email'); 
 $this->load->helper('email');
}

public function emergency_patients_()
{
$enviado=$this->input->get('enviado_a');
$id_user=$this->input->get('id');
$this->emergency_patients($enviado,$id_user);
}

public function emergency_patients($id,$id_user)
{
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if(empty($id_user) || empty($id) ){
redirect('/page404');
}
if($perfil=='Admin'){
$this->load->view('admin/header_admin');
$data['controller']='admin';
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
$data['controller']='medico';
} else{
redirect('/page404');	
}
$data['enviado_a']=$id;
$data['enviado']=$this->db->select('enviado_name')->where('enviado_a',$id)->get('emergency_patients')->row('enviado_name');
$data['id_user']=$id_user;
//$sql = "SELECT  * from emergency_patients WHERE worked =2 OR worked=0 ORDER BY id_ep DESC";
$sql = "SELECT  * from emergency_patients WHERE enviado_a=$id ORDER BY id_ep DESC";
$data['patient_admitas'] = $this->db->query($sql);
$this->load->view('admin/emergencia/patients_admission',$data);

}

public function emergency_patient($enviado_a,$id_pat_emergencia,$id_user)
{
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');


if(empty($id_user) || empty($enviado_a) || empty($id_pat_emergencia)){
redirect('/page404');
}

else if($perfil=='Admin'){
$this->load->view('admin/header_admin');
$data['controller']='admin';
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
$data['controller']='medico';
}
$data['enviado_a']=$enviado_a;	
$data['id_user']=$id_user;
$data['enviado']=$this->db->select('enviado_name')->where('enviado_a',$enviado_a)->get('emergency_patients')->row('enviado_name');
$sql = "SELECT * from emergency_patients where id_pat=$id_pat_emergencia order by id_ep desc";
$data['patient_admitas']= $this->db->query($sql);
$this->load->view('admin/emergencia/patients_admission',$data);

}


public function emergency_general($id_em, $id_user)
{
 $data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$this->session->set_userdata('id_user_save_em_gn',$id_user);	
if(empty($id_user) || empty($id_em)){
redirect('/page404');
}
$data['user_id']=$id_user;
$data['id_emergency']=$id_em;
$data['idtable']=$id_em;
$data['table_insumo']='emergency_peticion';
$data['table_insumo_link']='emergency_peticion_link';
$patient_data=$this->db->select('id_ep,id_pat,centro,enviado_name,created_date,worked,enviado_a')->where('id_ep',$id_em)->get('emergency_patients')->row_array();
$data['created_date']=$patient_data['created_date'];
$data['areaid']='';
$data['worked']=$patient_data['worked'];
$data['patient_id']=$patient_data['id_pat'];
$data['id_historial']=$patient_data['id_pat'];
$data['historial_id']=$patient_data['id_pat']; 
$data['centro_id']=$patient_data['centro']; 
$data['enviado_name']=$patient_data['enviado_name'];
$data['enviado_a']=$patient_data['enviado_a'];
$data['id_seguro']=$this->db->select('seguro_medico')->where('id_p_a',$patient_data['id_pat'])->get('patients_appointments')->row('seguro_medico');
$this->load->view('admin/emergencia/general/emergency-general-bridge',$data);

}

public function list_of_saved_emergency($id_user){
$id_pat=$this->db->select('id_pat')->order_by('id_pat','desc')->limit(1)->get('emergency_patients')->row('id_pat');
$this->list_of_saved_emergency1($id_user,$id_pat);
}





public function list_of_seen_emergency(){
$id_user=$this->session->userdata['id_user_save_em_gn'];
$id_pat=$this->input->get('id');
$this->list_of_saved_emergency1($id_user,$id_pat);
}


public function list_of_saved_emergency1($id_user,$id_pat)
{
$data['id_user']=$id_user;
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');


if(empty($id_user)){
redirect('/page404');
}

else if($perfil=='Admin'){
$this->load->view('admin/header_admin');
$data['controller']='admin';
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
$data['controller']='medico';
}

$sql = "SELECT *  FROM   emergency_patients WHERE worked=1 ORDER BY FIELD(id_pat, $id_pat) DESC";
$data['query']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/list_of_saved_emergency',$data);

}



public function saveEmergencyPatient(){
$insert_date=date("Y-m-d H:i:s");
$user_id= $this->input->post('user_id');

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
'historial_id'=> $this->input->post('hist_id'),
'date_insert'=> $insert_date,
'date_modif'=> $insert_date,
'operator'=> $this->input->post('user_id'),
'update_by'=> $this->input->post('user_id'),
'id_user'=> $this->input->post('user_id')
);
$idMarPos=$this->model_admin->marquePositivo($save);
$counMarP=$this->model_admin->countAnte1($this->input->post('hist_id'));
if($counMarP > 1){
$this->model_admin->DeleteDuplicateMarqueP($idMarPos);
}

$newMpat=$this->input->post('newMpat');
if($newMpat){
foreach ($newMpat as $key=>$med) {
  $savecd = array(
  'medicine'=> $med,
'id_patient' => $this->input->post('hist_id'),
'part' => 'gnl',
'user_id' =>$this->input->post('user_id')
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
'historial_id'=> $this->input->post('hist_id'),
'date_insert'=> $insert_date,
'update_time'=> $insert_date,
'inserted_by'=> $this->input->post('user_id'),
'update_by'=> $this->input->post('user_id')
);
$idDes=$this->model_admin->DesantAl($save2);
  $counDesa=$this->model_admin->countDesarollo($this->input->post('hist_id'));
	if($counDesa > 1){
	$this->model_admin->DeleteEmptyDesarollo($idDes);
	}
//$this->model_admin->DeleteEmptyDesarollo($this->input->post('hist_id'));
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
'historial_id'=> $this->input->post('hist_id'),
'inserted_time'=> $insert_date,
'inserted_by'=> $this->input->post('user_id')
);
$idAtO=$this->model_admin->saveAnteOtros($save3);
   $counAntOt=$this->model_admin->countAntOtros($this->input->post('hist_id'));
	if($counAntOt > 1){
	$this->model_admin->DeleteAntOtros($idAtO);
	}
//--------Medicamentos habituales-----------------------------


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
  'historial_id'=> $this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
  'update_time'=> $insert_date
   );
   $idHabT=$this->model_admin->saveHabitosToxicos($save4);


   $counHabT=$this->model_admin->countHabitosToxicos($this->input->post('hist_id'));
	if($counHabT > 1){
	$this->model_admin->DeleteEmptyHabitosToxicos($idHabT);
	}

   if(!empty($hab_t_drug)){
   foreach ($hab_t_drug as $drug) {
	$save = array(
	  'name' => $drug,
	 'id_patient' => $this->input->post('hist_id')
	);
		$this->model_admin->SaveDrug($save);
	};
   }

//----------------------save signo vitales------------------------------------------------------

$saveex = array(
  'peso'=> $this->input->post('peso'),
  'kg'=> $this->input->post('kg'),
  'talla'=> $this->input->post('talla'),
  'imc'=> $this->input->post('imc'),
  'ta'=> $this->input->post('ta'),
  'fr'=> $this->input->post('fr'),
  'fc'=> $this->input->post('fc'),
  'hg'=> $this->input->post('hg'),
   'tempo'=> $this->input->post('tempo'),
  'pulso'=> $this->input->post('pulso'),
  'glicemia'=> $this->input->post('glicemia'),
  'radio'=> $this->input->post('radio_signo'),
   'satoe'=> $this->input->post('satoe'),
   'fcf'=> $this->input->post('fcf'),
   'id_triaje' =>$this->input->post('id_emergency'),
   'hallazgo'=> $this->input->post('hallazgo'),
   'historial_id'=> $this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'updated_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
  'updated_time'=> $insert_date
);

$this->db->insert("emergency_signo_vitales",$saveex);

$wheresig= array(
  'peso'=>0,
  'kg'=>0,
  'talla'=>'',
  'imc'=>'',
  'ta'=>'',
  'fr'=>'',
  'fc'=>'',
  'hg'=>'',
   'tempo'=>'',
  'pulso'=>'',
  'glicemia'=>'',
  //'radio'=>'',
   'satoe'=>'',
   'fcf'=> '',
   'hallazgo'=>''
);

$this->db->where($wheresig);
$this->db->delete('emergency_signo_vitales');


//save conclusion diagnostic
$cied= $this->input->post('cied');
 $saveProc= array(
 'otros_diagnos'=> $this->input->post('otros_diagnos'),
 'juicio_clinico'=> $this->input->post('juicio_clinico'),
 'estado_alta'=> $this->input->post('estado_alta'),
 'destino'=> $this->input->post('destino'),
 'equipo_medico'=> $this->input->post('equipo_medico'),
 'id_patient'=>$this->input->post('hist_id'),
   'centro_medico'=>$this->input->post('centro'),
  'id_user'=>$this->input->post('user_id'),
   'updated_by'=> $this->input->post('user_id'),
   'id_em'=> $this->input->post('id_emergency'),
  'inserted_time'=>date("Y-m-d H:i:s"),
  'updated_time'=>date("Y-m-d H:i:s")
   );
  	$this->db->insert("emergency_conclucion_alta",$saveProc);
	$id_last=$this->db->insert_id();
	$cied=$this->input->post('cied');
	if($cied){
 foreach ($cied as $key=>$id_ced) {
  $savecd = array(
  // 'id_linkd'=> $last_id,
  'diagno_def'=> $id_ced,
  'p_id'=>$this->input->post('hist_id'),
  'con_id_link'=> $id_last,
  'user_id'=>$this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro'),
  'insert_date'=>date("Y-m-d H:i:s"),
  'origine'=>1
  );

$this->model_admin->SaveConDef($savecd);
}
	}
$where = array(
  'id_p'=>$this->input->post('hist_id'),
  'id_doc'=>$this->input->post('user_id'),
  'id_cm'=>$this->input->post('centro'),
  'origine'=>1
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc');



//------SAVE LIST OF SAVED PATIENTS EMERGENCY----------------
if($this->input->post('action')=='save2'){
	//--Guardar / Alta Med.-------
$dataem = array(
  'worked' =>1
  );
}
else{
	//--Guardar-------
$dataem = array(
  'worked' =>2
  );	
}
$where = array(
 'id_ep'=>$this->input->post('id_emergency')
);

$this->db->where($where);
$this->db->update('emergency_patients',$dataem);

//----------------------------------------------------------------------------------------------------------------
$save= array(
	'id_user' => $this->input->post('user_id'),
	'name' =>'',
	'id_historial' => $this->input->post('hist_id'),
	'centro' =>$this->input->post('centro'),
	'inserted_by' => $this->input->post('user_id'),
	'inserted_time' =>date('Y-m-d H:i:s'),
	'direction' =>1
	);

	$this->db->insert("orden_medica_sala",$save);
	$last_id=$this->db->insert_id();
	
//--------IF INSERTION IS MADE IN ANY ORDEN MEDICA TABLE UPDATE WILL BE DONE WITH THE id_sala ID---------------------
$data = array(
'id_sala'=>$last_id
);

$where1 = array(
'historial_id' =>$this->input->post('hist_id'),
'operator' =>$this->input->post('user_id'),
'centro' =>$this->input->post('centro'),
'printing' =>2
);
$this->db->where($where1);
$this->db->update("orden_medica_recetas",$data);
//------------------------------------------------------------------------------------
$where2 = array(
'historial_id' =>$this->input->post('hist_id'),
'operator' =>$this->input->post('user_id'),
'printing' =>2
);
$this->db->where($where2);
$this->db->update("orden_medica_estudios",$data);
//------------------------------------------------------------------------------------
$where3 = array(
'id_patient' =>$this->input->post('hist_id'),
'id_user' =>$this->input->post('user_id'),
'printing' =>2
);
$this->db->where($where3);
$this->db->update("ord_med_med_gen",$data);
//------------------------------------------------------------------------------------
$where4 = array(
'id_patient' =>$this->input->post('hist_id'),
'id_user' =>$this->input->post('user_id'),
'printing' =>2
);
$this->db->where($where4);
$this->db->update("ord_med_med_gen",$data);
//------------------------------------------------------------------------------------
$where5 = array(
'historial_id' =>$this->input->post('hist_id'),
'operator' =>$this->input->post('user_id'),
'printing' =>2
);
$this->db->where($where5);
$this->db->update("orden_medcia_lab",$data);
// IF AN EMERGENCIA IS CREATED WITHOUT ANY ORDEN MEDICA, WE MUST DELETE THE ENTRY IN orden_medica_sala TABLE

$ifmed = $this->db->get_where('orden_medica_recetas',array('id_sala'=>$last_id));
$ifes = $this->db->get_where('orden_medica_estudios',array('id_sala'=>$last_id));
$iflab = $this->db->get_where('orden_medcia_lab',array('id_sala'=>$last_id));
$ifgen = $this->db->get_where('ord_med_med_gen',array('id_sala'=>$last_id));
if($ifmed->num_rows() == 0 && $ifes->num_rows() == 0 && $iflab->num_rows() == 0 && $ifgen->num_rows() == 0){
	
$wheredel = array(
'idsala' =>$last_id
);

$this->db->where($wheredel);
$this->db->delete('orden_medica_sala');	
}
//------------------------WHEN EMERGENCIA IS SAVED NO NEED FOR IMPRESION SO WE SET PRINTING TO 0 ------------------------------------------------------------
$data1 = array(
 'printing' =>0
);

$where1 = array(
 'id_user' =>$this->input->post('user_id'),
  'id_patient' =>$this->input->post('hist_id')
);
$this->db->where($where1);

$this->db->update('ord_med_med_gen', $data1);
//----------------------------------------------------------------------------
$data2 = array(
 'printing' =>0
);

$where2 = array(
 'operator' =>$this->input->post('user_id'),
  'historial_id' =>$this->input->post('hist_id')
);
$this->db->where($where2);

$this->db->update('orden_medcia_lab', $data2);

//----------------------------------------------------------------------------
$data3 = array(
 'printing' =>0
);

$where3 = array(
 'operator' =>$this->input->post('user_id'),
  'historial_id' =>$this->input->post('hist_id')
);
$this->db->where($where3);

$this->db->update('orden_medica_estudios', $data3);
//-----------------------------------------------------------------------------------

$data4 = array(
 'printing' =>0
);

$where4 = array(
 'operator' =>$this->input->post('user_id'),
  'historial_id' =>$this->input->post('hist_id')
);
$this->db->where($where4);

$this->db->update('orden_medica_recetas', $data4);



}

public function updateProced(){
 $data= array(
 'otros_diagnos'=> $this->input->post('otros_diagnos'),
 'juicio_clinico'=> $this->input->post('juicio_clinico'),
 'estado_alta'=> $this->input->post('estado_alta'),
 'destino'=> $this->input->post('destino'),
 'equipo_medico'=> $this->input->post('equipo_medico'),
 'updated_by'=> $this->input->post('user_id'),
 'updated_time'=>date("Y-m-d H:i:s")
   );
   
   $where = array(
  'id' =>$this->input->post('id')
);
$this->db->where($where);

$this->db->update('emergency_conclucion_alta', $data);
}

public function updateInsumo(){
 $data= array(
 'insumo'=> $this->input->post('insumo'),
 'cantidad'=> $this->input->post('cantidad_insumo'),
 'updated_by'=> $this->input->post('user_id'),
 'updated_time'=>date("Y-m-d H:i:s")
   );
   
   $where = array(
  'id' =>$this->input->post('id')
);
$this->db->where($where);

$this->db->update('emergency_peticion', $data);
}

 public function editInsumo(){
$id= $this->uri->segment(3);
$data['id']=$id;
$data['user_id']= $this->uri->segment(4);
$centro=$this->uri->segment(5);
$table_insumo=$this->uri->segment(6);
 $sql = "select name from  emergency_medicaments where centro=$centro && sustenacia=''";
$data['rows']= $this->db->query($sql);
$data['edit']=$this->db->select('insumo,cantidad')->where('id',$id)->get($table_insumo)->row_array();
$this->load->view('admin/emergencia/general/nursing/editInsumo', $data);


}




 public function ordenMedical()
{
$data['user_id']=$this->input->post('user_id');
$data['id_historial']=$this->input->post('id_historial');
$data['centro_id']=$this->input->post('centro_id');
$data['enviado_a']=$this->input->post('enviado_a');
$data['id_emergency']=$this->input->post('id_emergency');
$data['id_seguro']=$this->input->post('id_seguro');
$data['seguro_name']=$this->db->select('title')->where('id_sm',$this->input->post('id_seguro'))->get('seguro_medico')->row('title');
$this->load->view('admin/emergencia/general/orden-medica/content',$data);
}

function loadInsumo()
{
$user_id=$this->input->post('user_id');
$id_historial=$this->input->post('id_historial');
$saved=$this->input->post('saved');
$centro=$this->input->post('centro');
$data['id_patient']=$id_historial;
$data['user_id']=$user_id;
$showinsumoedit=$this->input->post('showinsumoedit');
$data['showinsumoedit']=$showinsumoedit;
$table_insumo=$this->input->post('table_insumo');
$data['table_insumo']=$table_insumo;
$table_insumo_link=$this->input->post('table_insumo_link');
if($showinsumoedit=='none'){
$sql = "SELECT $table_insumo.id as id, name, id_user, $table_insumo.inserted_time,cantidad, $table_insumo.centro from $table_insumo
INNER JOIN emergency_medicaments ON emergency_medicaments.id=$table_insumo.insumo
 WHERE id_user=$user_id && id_patient=$id_historial && $table_insumo.centro=$centro && saved=$saved ORDER BY $table_insumo.id DESC";
$data['querydata']= $this->db->query($sql);
$data['totorden'] =0;
}else{
$sql = "SELECT id from $table_insumo_link WHERE user=$user_id && pat=$id_historial && cent=$centro ORDER BY id DESC";
$querydatasave=$this->db->query($sql);
$data['querydatasave']=$querydatasave;
$data['totorden'] =$querydatasave->num_rows();
}
$this->load->view('admin/emergencia/general/nursing/data',$data);	

}


public function saveInsumoSaved()
{
$table_insumo=$this->input->post('table_insumo');
$table_insumo_link=$this->input->post('table_insumo_link');

$user_id=$this->input->post('user_id');
$data['user_id']=$user_id;
$save = array(
'user' =>$user_id,
'pat' =>$this->input->post('id_historial'),
'cent' =>$this->input->post('centro')
);
$this->db->insert($table_insumo_link, $save);
$id_last=$this->db->insert_id();
	
//--------------------------UPDATE PETICION-------------------------------------------

$datas = array(
'saved'=>1,
'link'=>$id_last
);

$where = array(
'id_user' =>$user_id,
'id_patient' =>$this->input->post('id_historial'),
'centro' =>$this->input->post('centro'),
'saved' =>0
);
$this->db->where($where);

$this->db->update($table_insumo, $datas);

//----------------
}




function loadProcedimiento()
{
$user_id=$this->input->post('user_id');
$id_historial=$this->input->post('id_historial');
$data['id_patient']=$id_historial;
$data['user_id']=$user_id;
$sql = "SELECT name,inserted_time, id_user, sub_groupo, id from emergency_procedimiento
INNER JOIN centros_tarifarios ON centros_tarifarios.id_c_taf=emergency_procedimiento.name
 WHERE id_user=$user_id && id_patient=$id_historial ORDER BY id DESC";
$data['query']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/procedimiento/data',$data);
}



public function deleteEmegProc(){
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('emergency_procedimiento');

}


public function deleteInsumo(){
$table_insumo=$this->input->post('table_insumo');
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete($table_insumo);

}




public function loadAllPatients()
{
	$id=$this->input->post('id');
	$data['enviado_a']=$id;
	$data['controller']=$this->input->post('controller');
    $data['patient_admitas'] = $this->model_emergencia->emergency_patients($id);
	$this->load->view('admin/emergencia/table',$data);
}


public function reloadAll()
{
$startTime = date("Y-m-d H:i:s");
$minutes=$this->input->post('minutes');
$cenvertedTime = date('Y-m-d H:i:s',strtotime("+ $minutes seconds",strtotime($startTime)));
$data = array(
'evaluation'=>$cenvertedTime
);

$where = array(
  'id_em' =>$this->input->post('id')
);
$this->db->where($where);

$this->db->update(' emergency_triaje', $data);
}

public function saveProced()
{
$save = array(
  'name' =>$this->input->post('name'),
  'cantidad' =>1,
  'descuento' =>0,
  'cobertura' =>0.8,
  'inserted_time' =>date('Y-m-d H:i:s'),
  'id_user' =>$this->input->post('user_id'),
  'id_patient' =>$this->input->post('id_historial')
);

$this->db->insert('emergency_procedimiento', $save);
}


public function saveInsumo()
{
$table_insumo=$this->input->post('table_insumo');

$save = array(
  'insumo' =>$this->input->post('insumo'),
   'cantidad' =>$this->input->post('cantidad_insumo'),
  'inserted_time' =>date('Y-m-d H:i:s'),
  'updated_time' =>date('Y-m-d H:i:s'),
  'updated_by' =>$this->input->post('user_id'),
  'id_user' =>$this->input->post('user_id'),
  'id_patient' =>$this->input->post('id_historial'),
  'centro' =>$this->input->post('centro'),
  'idemp' =>$this->input->post('idemp'),
  'cantidad'=>$this->input->post('cantidad_insumo'),
  'cobertura' =>0.8,
  'descuento' =>0
);

$this->db->insert($table_insumo, $save);
}


public function create_new_emergency()
{
$data['id_p_a']= $this->uri->segment(3);

$data['id_user']= $this->uri->segment(4);
$perfil=$this->db->select('perfil')->where('id_user',$this->uri->segment(4))->get('users')->row('perfil');
if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($this->uri->segment(4));
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($this->uri->segment(4));
} else {
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
}
$sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
$data['queryc']= $this->db->query($sqlc);


$sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
$data['queryrp']= $this->db->query($sqlrp);

$sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
$data['queryml']= $this->db->query($sqlml);


$sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
$data['queryep']= $this->db->query($sqlep);
$this->load->view('admin/emergencia/create_new_emergency',$data);
}


public function updateEmergency()
{
	$id_emergency= $this->uri->segment(3);
	$data['id_user']= $this->uri->segment(4);
	$perfil=$this->db->select('perfil')->where('id_user',$this->uri->segment(4))->get('users')->row('perfil');
if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($this->uri->segment(4));
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($this->uri->segment(4));
} else {
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
}
	$sqlc = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=1";
	$data['queryc']= $this->db->query($sqlc);


	$sqlrp = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=2";
	$data['queryrp']= $this->db->query($sqlrp);

	$sqlml = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=3";
	$data['queryml']= $this->db->query($sqlml);


	$sqlep = "SELECT DISTINCT em_name, id_em_c from emergency_adm_data WHERE id=4";
	$data['queryep']= $this->db->query($sqlep);
	
	$sql= "SELECT * FROM emergency_patients WHERE id_ep=$id_emergency";
	$data['query']= $this->db->query($sql);
	$this->load->view('admin/emergencia/update_emergency',$data);
}



public function emergency_management()
{
//-------------------------------SAVE EMERGENCIA DATA------------------------------------------------	
$query1 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('em_name')));
if($query1->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('em_name'),
'id'=>1
);
$this->db->insert("emergency_adm_data",$save);
$insertIdCausa=$this->db->select('id_em_c')->where('id',1)->order_by('id_em_c','desc')->limit(1)->get('emergency_adm_data')->row('id_em_c');
}
else{
	 $insertIdCausa=$this->input->post('em_name');
}
	
//----------------------------------------------------------------------------------------	
	
$query2 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('paciente_referido')));
if($query2->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('paciente_referido'),
'id'=>2
);
$this->db->insert("emergency_adm_data",$save);

$insertIdPatR=$this->db->select('id_em_c')->where('id',2)->order_by('id_em_c','desc')->limit(1)->get('emergency_adm_data')->row('id_em_c');
}
else{
 $insertIdPatR=$this->input->post('paciente_referido');
}
	

//----------------------------------------------------------------------------------------	
	
$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('medio_llegado')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('medio_llegado'),
'id'=>3
);
$this->db->insert("emergency_adm_data",$save);
$insertIdMedL=$this->db->select('id_em_c')->where('id',3)->order_by('id_em_c','desc')->limit(1)->get('emergency_adm_data')->row('id_em_c');
}
else{
 $insertIdMedL=$this->input->post('medio_llegado');
}

//----------------------------------------------------------------------------------------	
	
$query3 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('estado_paciente')));
if($query3->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('estado_paciente'),
'id'=>4
);
$this->db->insert("emergency_adm_data",$save);
$insertIdEsP=$this->db->select('id_em_c')->where('id',4)->order_by('id_em_c','desc')->limit(1)->get('emergency_adm_data')->row('id_em_c');
}
else{
 $insertIdEsP=$this->input->post('estado_paciente');
}

$this->session->set_userdata('enviado_a', $this->input->post('enviado_a'));	
$this->session->set_userdata('id_pat_emergencia', $this->input->post('id_patient'));

if($this->input->post('enviado_a')==1){
$enviado="Triaje";

} elseif($this->input->post('enviado_a')==2 || $this->input->post('enviado_a')==3 || $this->input->post('enviado_a')==5){
$enviado="Emergencia General";

}

elseif($this->input->post('enviado_a')==4){
$enviado="Quirofano";	

}

elseif($this->input->post('enviado_a')==6){
$enviado="Reanimación";	

}

if($this->input->post('operation')==0){
$save = array(
'centro'=>$this->input->post('centro_medico'),
'id_pat'=>$this->input->post('id_patient'),
'causa'=>$insertIdCausa,
'paciente_referido_por'=>$insertIdPatR,
'medio_de_llegado'=>$insertIdMedL,
'enviado_a'=>$this->input->post('enviado_a'),
'estado_de_paciente'=>$insertIdEsP,
'inserted_by'=>$this->input->post('creadted_by'),
'update_by'=>$this->input->post('creadted_by'),
'created_date'=>date("Y-m-d"),
'create_time'=>date("H:i:s"),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s"),
'enviado_name'=>$enviado
);
$this->db->insert("emergency_patients",$save);
} else{
$data = array(
'causa'=>$insertIdCausa,
'paciente_referido_por'=>$insertIdPatR,
'medio_de_llegado'=>$insertIdMedL,
'enviado_a'=>$this->input->post('enviado_a'),
'estado_de_paciente'=>$insertIdEsP,
'update_by'=>$this->input->post('creadted_by'),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s")
);

$where = array(
  'id_ep' =>$this->input->post('operation')
);
$this->db->where($where);

$this->db->update('emergency_patients', $data);
}
$var1=$this->input->post('enviado_a');	
$var2=$this->input->post('id_patient');	
$var3=$this->input->post('creadted_by');		
redirect("emergency/emergency_patient/$var1/$var2/$var3");
}


public function triaje($id_em,$id_user)
{
$data['id_ur']=$id_user;
$data['id_em']=$id_em;

$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if(empty($id_user) || empty($id_em) ){
redirect('/page404');
}
else if($perfil=='Admin'){
$this->load->view('admin/header_admin');
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
} else{
redirect('/page404');	
}

$patient_data=$this->db->select('*')->where('id_ep',$id_em)->get('emergency_patients')->row_array();
$data['patient_data']=$patient_data;
$data['idpat']=$patient_data['id_pat'];
$sql = "SELECT * from emergency_triaje where id_em=$id_em";
$data['query']= $this->db->query($sql);
$this->load->view('admin/emergencia/triage',$data);

}


public function updateTriaje(){

	$triajeData = array(
	'manchester'=>$this->input->post('manchester'),
	'apertura_ocular'=>$this->input->post('apertura_ocular'),
	'repuesta_verbal'=>$this->input->post('repuesta_verbal'),
	'repuesta_motora'=>$this->input->post('repuesta_motora'),
	'dolor_escala'=>$this->input->post('dolor_escala'),
	'salsa'=>$this->input->post('salsa'),
	'id_pat'=>$this->input->post('id_pat'),
	'id_em'=>$this->input->post('id_em'),
	'update_b'=>$this->input->post('id_ur'),
	'update_t'=>date("Y-m-d H:i:s")
	);
	
	$whereTriaje = array(
	'id_em' =>$this->input->post('id_em'));
	$this->db->where($whereTriaje);
    $this->db->update("emergency_triaje",$triajeData);
	
	
		//---------UPDATE TRASLAD---------------------------
	$updateTras = array(
	'enviado_a'=>$this->input->post('salsa'),
	'tr'=>$this->input->post('tr'),
	'td'=>$this->input->post('td'),
	'title'=>$this->input->post('title')
	);
	$whereTras = array(
	'id_ep' =>$this->input->post('id_em'));
	$this->db->where($whereTras);
    $this->db->update("emergency_patients",$updateTras);
	
	//-----------------------EXAMEN FISICO------------------------------------------------------
	
   $saveUpxf = array(
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
    'satoe'=> $this->input->post('satoe'),
   'fcf'=> $this->input->post('fcf'),
   'id_triaje' =>$this->input->post('id_em'),
   'updated_by'=>$this->input->post('id_ur'),
   'updated_time'=>date("Y-m-d H:i:s")
   );
	$where = array(
	'id_ep' =>$this->input->post('id_em')
	);
	$this->db->where($where);
    $this->db->update("emergency_signo_vitales",$update);

}




public function saveTriaje(){
	 $triajeData = array(
	'apertura_ocular'=>$this->input->post('apertura_ocular'),
	'repuesta_verbal'=>$this->input->post('repuesta_verbal'),
	'repuesta_motora'=>$this->input->post('repuesta_motora'),
	'dolor_escala'=>$this->input->post('dolor_escala'),
	'salsa'=>$this->input->post('salsa'),
	'id_pat'=>$this->input->post('id_pat'),
	'id_em'=>$this->input->post('id_em'),
	'sintomatologia'=>$this->input->post('sintomatologia'),
	 'insert_b'=>$this->input->post('id_ur'),
	'insert_t'=>date("Y-m-d H:i:s")
	);

	$this->db->insert("emergency_triaje",$triajeData);
	
	//---------UPDATE TRASLAD---------------------------
	$color=$this->db->select('color')->where('id',$this->input->post('sintomatologia'))->get('emergency_sintomatologia')->row('color');
	if($color=='red'){
		$tr='red';
		$td='white';
	}else if($color=='orange'){
		$tr='orange';
		$td='black';
	}
	
if($this->input->post('salsa')==1){
$enviado="Triaje";

} elseif($this->input->post('salsa')==2 || $this->input->post('salsa')==3 || $this->input->post('salsa')==5){
$enviado="Emergencia General";

}

elseif($this->input->post('salsa')==4){
$enviado="Quirofano";	

}

elseif($this->input->post('salsa')==6){
$enviado="Reanimación";	

}
	
    $updateTras = array(
	'enviado_a'=>$this->input->post('salsa'),
	'tr'=>$tr,
	'td'=>$td,
	'enviado_name'=>$enviado
	);
	$whereTras = array(
	'id_ep' =>$this->input->post('id_em')
	);
	$this->db->where($whereTras);
    $this->db->update("emergency_patients",$updateTras);
	
  //-----------------Signos vitales---------------------------------

	$saveExf = array(
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
    'satoe'=> $this->input->post('satoe'),
   'fcf'=> $this->input->post('fcf'),
    'hallazgo'=>'',
   'id_triaje'=>$this->input->post('id_em'),
   'historial_id'=>$this->input->post('id_pat'),
   	'inserted_by'=>$this->input->post('id_ur'),
	'inserted_time'=>date("Y-m-d H:i:s"),
	'updated_by'=>$this->input->post('id_ur'),
	'updated_time'=>date("Y-m-d H:i:s")
   );
	$this->db->insert("emergency_signo_vitales",$saveExf);
		
	
	$wheresig= array(
  'peso'=>0,
  'kg'=>0,
  'talla'=>'',
  'imc'=>'',
  'ta'=>'',
  'fr'=>'',
  'fc'=>'',
  'hg'=>'',
   'tempo'=>'',
  'pulso'=>'',
  'glicemia'=>'',
  //'radio'=>'',
   'satoe'=>'',
   'fcf'=> ''
);

$this->db->where($wheresig);
$this->db->delete('emergency_signo_vitales');
	
	
	
	
 
}

	
public function examFisYsigV()
{
$data['examen']=$this->db->select('*')->where('id_triaje',$this->input->post('id_triaje'))->get('emergency_signo_vitales')->row_array();
$diff = date_diff(date_create(), date_create($this->input->post('date_nacer')));
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
$data['edad']=$age;
$this->load->view('admin/emergencia/examFisYsigV', $data);
}



public function addNewEvaNota(){
$data = array(
'nota'=>$this->input->post('nota'),
'id_user'=>$this->input->post('id_user'),
'id_patient'=>$this->input->post('id_patient'),
'inserted_time'=>date("Y-m-d H:i:s")
);

$this->db->insert("emergency_realizar_evaluacion",$data);

$where = array(
'nota' =>""
);

$this->db->where($where);
$this->db->delete('emergency_realizar_evaluacion');

}

 public function paginatePocedimiento()
{
$data['user_id']= $this->input->post('user_id');
$data['centro_id']= $this->input->post('centro_id');
$data['id_historial']= $this->input->post('id_historial');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$this->load->view('admin/emergencia/general/procedimiento/paginatePocedimiento', $data);
}


public function paginationDataProced()
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
$contition="user_id=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from h_c_diagno_def_link where $contition p_id=$id_patient AND origine=1 ORDER BY id_linkd desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/procedimiento/paginationDataProced',$data);
}



 public function viewSignoVitalesTriaje(){
$id_triaje=$this->uri->segment(3);
$idpat=$this->uri->segment(4);
$examen=$this->db->select('*')->where('id_triaje',$id_triaje)->get('emergency_signo_vitales')->row_array();
$data['examen']=$examen;
	$timeins = date("d-m-Y H:i:s", strtotime($examen['inserted_time']));
	$user=$this->db->select('name')->where('id_user',$examen['inserted_by'])->get('users')->row('name');

  $date_nacer=$this->db->select('date_nacer')->where('id_p_a',$idpat)->get('patients_appointments')->row('date_nacer');

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
$data['edad']=$age;
$show="<div class='modal-body' >
<button type='button' title='Cierra' class='close' data-dismiss='modal' aria-hidden='true'><i class='fa fa-times-circle'  style='font-size:48px;color:red'></i></button>
<h1 class='modal-title' style='text-align:center'>TRIAJE</h1>
<p style='text-align:center'>creado por $user <br/> fecha de creacion $timeins</p>
</div>";
echo $show;
$this->load->view('admin/emergencia/examFisYsigV', $data);
}





 public function paginateSignosVitales()
{
$data['user_id']= $this->input->post('user_id');
$data['id_historial']= $this->input->post('id_historial');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');

$data['hallazgo']=$this->db->select('hallazgo')->where('historial_id',$this->input->post('id_historial'))->where('hallazgo','')->get('emergency_signo_vitales')->row('hallazgo');

$this->load->view('admin/emergencia/general/signo-vitales-pagination-number', $data);
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

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from emergency_signo_vitales where $contition historial_id=$id_patient  ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/signo-vitales-pagination-data',$data);
}

  public function loadSigno()
  {
  $data['edad']=$this->db->select('edad')->where('id_p_a',$this->input->post('historial_id'))
  ->get('patients_appointments')->row('edad');
 $id= $this->input->post('id_exam_fis');
  $sql = "select * from emergency_signo_vitales where id=$id";
  $data['signo_by_id']= $this->db->query($sql);
 $this->load->view('admin/emergencia/general/signo_result', $data);
}


public function SaveUpExamenFisico(){

$update = array(
'peso'=> $this->input->post('peso'),
'kg'=> $this->input->post('kg'),
'talla'=> $this->input->post('talla'),
'imc'=> $this->input->post('imc'),
'ta'=> $this->input->post('ta'),
'fr'=> $this->input->post('fr'),
'fc'=> $this->input->post('fc'),
'hg'=> $this->input->post('hg'),
'tempo'=> $this->input->post('tempo'),
'glicemia'=>$this->input->post('glicemiae'),
'pulso'=> $this->input->post('pulso'),
'radio'=> $this->input->post('radio_signo'),
'fcf'=>$this->input->post('fcf'),
'satoe'=> $this->input->post('satoe'),
'hallazgo'=> $this->input->post('hallazgo'),
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=>date("Y-m-d H:i:s")
);

$where= array(
  'id' =>$this->input->post('id_sig')
);

$this->db->where($where);
$this->db->update("emergency_signo_vitales",$update);
}



public function pagination_data_orden_medica()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$centro_id= $this->input->get('centro_id');
$perfil= $this->input->get('perfil');
$data['enviado_a']= $this->input->get('enviado_a');
$data['centro_id']=$centro_id;
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="id_user=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;

$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from emergency_orden_medica where $contition id_patient=$id_patient AND centro=$centro_id ORDER BY id desc limit $start,$per_page";
$data['query_paginate']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/orden-medica/paginate',$data);
}


public function paginateMed()
{
$data['idem']=$this->input->post('idem');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('admin/emergencia/general/orden-medica/paginate/paginate-med', $data);
}

public function paginateEst()
{
$data['idem']=$this->input->post('idem');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('admin/emergencia/general/orden-medica/paginate/paginate-est', $data);
}

public function paginateLab()
{
$data['idem']=$this->input->post('idem');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('admin/emergencia/general/orden-medica/paginate/paginate-lab', $data);
}

public function paginate_new_ord_med()
{
$data['user_id']=$this->uri->segment(3);
$data['id_patient']=$this->uri->segment(4);
$data['idem']=$this->uri->segment(5);
$data['centro_id']=$this->uri->segment(6);
$data['direct']=$this->uri->segment(7);
if($this->uri->segment(7)==1){
	$text='Crear Nuevo medicamento';
}elseif($this->uri->segment(7)==2){
$text='Crear Nuevo estudio';	
}
elseif($this->uri->segment(7)==3){
$text='Crear Nuevo laboratorio';	
}else{
$text='Crear Nuevas medidas generales';	
}
$data['text']=$text;
$this->load->view('admin/emergencia/general/orden-medica/paginate/paginate_new_ord_med', $data);
}


public function saveOrdenMedicaRecetas(){
$save = array(
'medica'=> $this->input->post('medicamento'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' =>0.8,
'precio' =>$this->input->post('precio'),
'descuento' => $this->input->post('descuento'),
'idem' =>$this->input->post('idem'),
'insert_date' =>date('Y-m-d H:i:s'),
'operator' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("orden_medica_recetas",$save);

}


public function saveOrdenMedicaMat(){
$save = array(
'insumo'=>$this->input->post('value'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' =>0.8,
'descuento' => $this->input->post('descuento'),
'precio' => $this->input->post('precio'),
'idemp' =>$this->input->post('idem'),
'inserted_time' =>date('Y-m-d H:i:s'),
'id_user' =>$this->input->post('operator'),
'id_user' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("emergency_peticion",$save);

}


public function saveOrdenMedicaProced(){
$save = array(
'name'=> $this->input->post('servicio'),
'precio'=> $this->input->post('precio'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'idempro' =>$this->input->post('idem'),
'inserted_time' =>date('Y-m-d H:i:s'),
'id_user' =>$this->input->post('operator')

);
$this->db->insert("emergency_procedimiento",$save);

}






public function saveOrdenMedicaEst(){
$save = array(
'estudio'=> $this->input->post('servicio'),
'cantidad'=> $this->input->post('cantidad'),
'precio'=> $this->input->post('precio'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'idemes' =>$this->input->post('idem'),
'insert_date' =>date('Y-m-d H:i:s'),
'operator' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("orden_medica_estudios",$save);

}


public function saveOrdenMedicaLab(){
$save = array(
'laboratory'=> $this->input->post('servicio'),
'cantidad'=> $this->input->post('cantidad'),
'cobertura' => $this->input->post('cobertura'),
'descuento' => $this->input->post('descuento'),
'idemlab' =>$this->input->post('idem'),
'insert_time' =>date('Y-m-d H:i:s'),
'precio' =>$this->input->post('precio'),
'user_id' =>$this->input->post('operator'),
'updated_by' =>$this->input->post('operator'),
'updated_time' =>date('Y-m-d H:i:s')

);
$this->db->insert("orden_medcia_lab",$save);

}

public function saveOrdMedLab(){
$save = array(
  'laboratory'  =>$this->input->post('lab'),
  'operator'=> $this->input->post('user_id'),
  'historial_id' =>$this->input->post('historial_id_l'),
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $this->input->post('user_id'),
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>$this->input->post('printing'),
  'user_id'=> $this->input->post('user_id'),
 'id_sala'=> $this->input->post('sala'),
 'centro'=> $this->input->post('centro'),
 'id_em'=>$this->input->post('idem')

  );
$this->db->insert("orden_medcia_lab",$save);

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
  'user_id'=> $this->input->post('user_id'),
   'centro'=> $this->input->post('centro'),
   'id_em'=>$this->input->post('idem')

  );
$this->db->insert("orden_medcia_lab",$save);

$where = array(
 'laboratory'=>$this->input->post('lab'),
  'user_id'=>$this->input->post('user_id'),
   'historial_id' =>$this->input->post('historial_id_l'),
    'printing'=>$this->input->post('printing'),
	'id_em'=>$this->input->post('idem')
 
);

$this->db->where($where);
$this->db->delete('orden_medcia_lab');

}

public function newEvaNota()
{ 
$id_user=$this->input->post('id_user');
$data['id_user']=$id_user;
$id_patient=$this->input->post('id_patient');
$data['enviado_a']=$this->input->post('enviado_a');
$data['id_patient']=$id_patient;
$user=$this->db->select('perfil,area')->where('id_user',$id_user)->get('users')->row_array();
$data['perfil']=$user['perfil'];
$data['area']=$user['area'];
$sql ="SELECT * FROM  emergency_realizar_evaluacion WHERE id_user=$id_user AND id_patient=$id_patient ORDER BY id DESC";
$data['nota']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/evaluacion-nota', $data);

}

 public function deleteEvaNota(){
$id = $this->input->post('id');
$this->db->query("DELETE  FROM emergency_realizar_evaluacion  WHERE id =$id");

}

public function get_doc()
{
$id_esp=$this->input->post('id_esp');
$sql ="SELECT name, id_user FROM  users WHERE area=$id_esp";
$query = $this->db->query($sql);
echo '<option value="" hidden></option>';
foreach ($query->result() as $row){
echo '<option value="'.$row->id_user.'">'.$row->name.'</option>';
 
}
}


public function addNewInterconsulta(){
$data = array(
'area'=>$this->input->post('area'), 
'doc'=>$this->input->post('medico'),
'causa'=>$this->input->post('causa'),
'id_user'=>$this->input->post('id_user'),
'id_patient'=>$this->input->post('id_patient'),
'inserted_time'=>date("Y-m-d H:i:s")
);

$this->db->insert("emergency_interconsulltas",$data);

$where = array(
'causa' =>""
);

$this->db->where($where);
$this->db->delete('emergency_interconsulltas');

}

public function addMedico(){
if($this->input->post('idMed')=="none"){
$data = array(
'name'=>$this->input->post('medicamento'), 
'tipo'=>$this->input->post('tipo'),
'via'=>$this->input->post('via'),
'cantidad'=>$this->input->post('cantidad'),
'dosis'=>$this->input->post('dosis'),
'via'=>$this->input->post('via'),
'cada'=>$this->input->post('cada'),
'user'=>$this->input->post('id_user'),
'id_patient'=>$this->input->post('id_patient'),
'nota'=>$this->input->post('nota'),
'inserted_time'=>date("Y-m-d H:i:s")
);
$this->db->insert("emergency_medicaments",$data);

$query= $this->db->get_where('emergency_medicaments_orden',array('orden'=>date("Y-m-d")));
$found=$query->num_rows();

if($found==0){

$orden = array(
'orden'=>date("Y-m-d"),
'id_pat'=>$this->input->post('id_patient'),
'user'=>$this->input->post('id_user')
);
$this->db->insert("emergency_medicaments_orden",$orden);
}

}else{

$data = array(
'name'=>$this->input->post('medicamento'), 
'tipo'=>$this->input->post('tipo'),
'via'=>$this->input->post('via'),
'cantidad'=>$this->input->post('cantidad'),
'dosis'=>$this->input->post('dosis'),
'via'=>$this->input->post('via'),
'cada'=>$this->input->post('cada'),
'user'=>$this->input->post('id_user'),
'nota'=>$this->input->post('nota'),
//'inserted_time'=>date("Y-m-d H:i:s")
);

$where = array(
  'id' =>$this->input->post('idMed')
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $data);


	
}

}



function medicamentoForm(){
$data['id_patient'] = $this->input->post('id_patient');
$data['id_user'] = $this->input->post('id_user');	
$this->load->view('admin/emergencia/general/orden-medica/medicamentos/medicamentoForm',$data);
}

function loadAllMedicamentos(){
$centro=$this->input->post('centro_id');
$sql ="SELECT id, name, cantidad_comp FROM  emergency_medicaments WHERE centro=$centro && selected=0";
$query = $this->db->query($sql);
 echo '<option value="" ></option>';
foreach ($query->result() as $row){
echo '<option value="'.$row->id.'">'.$row->name.'</option>';
}

}

function getCantidad(){
$centro=$this->input->post('centro_id');
$med=$this->input->post('med');
$cantidad_comp=$this->db->select('cantidad_comp')->where('centro',$centro)->where('id',$med)->get('emergency_medicaments')->row('cantidad_comp');
echo $cantidad_comp;
}


 public function allPresentation()
{
$presentacion= $this->model_admin->Presentacion();
foreach ($presentacion as $row){
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
}




function getMedPresentation(){
$idmed=$this->input->post('idmed');
$present=$this->db->select('presentacion')->where('id',$idmed)->get('emergency_medicaments')->row('presentacion');
if($present){
echo '<option value="'.$present.'">'.$present.'</option>';
}else{
$this->allPresentation();
}

}


function emergencySaveMedTemp(){

$save = array(
'med'=>$this->input->post('mCheck'),
'user'=>$this->input->post('user_id'),
'patient'=>$this->input->post('historial_id')
);
$this->db->insert("emergency_save_med_temp",$save);

}




public function deleteSaveMedTemp(){

$where = array(
'med'=>$this->input->post('lab'),
'user'=>$this->input->post('user_id'),
'patient'=>$this->input->post('historial_id')
);

$this->db->where($where);
$this->db->delete('emergency_save_med_temp');

}









public function editMedicamento(){
$id=$this->input->post('id');
$data['idMed']=$id;
$data['id_user']=$this->input->post('id_user');
$data['num']=$this->input->post('num');
$data['op']=$this->input->post('op');
$data['id_patient']=$this->input->post('id_patient');
$sql ="SELECT * FROM emergency_medicaments WHERE id=$id";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/general/editMedicamento', $data);
}



function cantidadExis(){
$medid=$this->input->post('medid');	

$medica=$this->db->select('nombre,tipo')->where('id',$medid)->get('emergency_almanacen_gnrl')->row_array();
 $nombre=$medica['nombre'];
  $tipo=$medica['tipo'];
$sql ="SELECT cantitad FROM  emergency_almanacen_gnrl where nombre='$nombre' && tipo='$tipo' ";
$query = $this->db->query($sql);
$cant1 =0;
foreach ($query->result() as $row){
		 $cant1 += $row->cantitad;
		 }	


//----------------------------------------------------------------------------


$sql2 ="SELECT cantidad FROM  emergency_medicaments where name='$medid' && tipo='$tipo' ";
$query2 = $this->db->query($sql2);
$cant2 =0;
foreach ($query2->result() as $row2){
		 $cant2 += $row2->cantidad;
		 }
$cant= $cant1 - $cant2;
echo $cant;	
}




function maxCantidadCheck(){
	echo '<option value="" >fgf</option>';
$cantExist=$this->input->get('cantExist');	
for($i=0; $i<=$cantExist; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
}


function medicaTipo(){
	
$medid=$this->input->get('medid');	
$tipo=$this->db->select('tipo')->where('id',$medid)->get('emergency_almanacen_gnrl')->row('tipo');
echo $tipo;	

}



public function newMedicamento()
{ 
$id_user=$this->input->post('id_user');
$data['id_user']=$id_user;

$data1 = array(
 'save' =>0
);

$where = array(
  'user' =>$id_user
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $data1);


$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$sqlgb ="SELECT * FROM  emergency_medicaments_orden WHERE  id_pat=$id_patient";
$data['sqlgb']= $this->db->query($sqlgb);

$sqlop ="SELECT user FROM  emergency_medicaments WHERE  id_patient=$id_patient GROUP BY user";
$data['sqlop']= $this->db->query($sqlop);


$sql ="SELECT * FROM  emergency_medicaments WHERE  DATE(inserted_time) = CURDATE() AND  id_patient=$id_patient ORDER BY id DESC";
$data['nota']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/newMedicamento', $data);

}

public function listOfMedicamentos()
{
$id_patient=$this->input->post('id_patient');
$id_user=$this->input->post('id_user');
$data['display']="display:none";
$data['id_patient']=$id_patient;
$data['opid']=$id_user;
//$sql ="SELECT * FROM  emergency_medicaments WHERE  user=$id_user AND id_patient=$id_patient";
//$data['sql']= $this->db->query($sql);
//$this->load->view('admin/emergencia/general/medicamentosData', $data);

$sqlgb ="SELECT * FROM  emergency_medicaments WHERE  user=$id_user AND id_patient=$id_patient GROUP BY DATE(inserted_time) ORDER BY id DESC";
$data['sql']= $this->db->query($sqlgb);
$this->load->view('admin/emergencia/general/listOfMedicamentos', $data);


}

public function medicamentosData()
{
$data['display']="";	
$num=$this->input->post('num');
$op=$this->input->post('op');
$data['opid']=$op;
$data['num']=$num;
$id_patient=$this->input->post('id_patient');
$data['id_patient']=$id_patient;
$data['empty']=$this->input->post('empty');
$data['id_user']=$this->input->post('id_user');
if($this->input->post('where')==1){
$sql ="SELECT * FROM  emergency_medicaments WHERE  user=$op AND id_patient=$id_patient AND DATE(inserted_time)='$num' ORDER BY id DESC";
$data['sql']= $this->db->query($sql);	
$this->load->view('admin/emergencia/general/medicamentosData', $data);
}
else if($this->input->post('where')==2){
$sql ="SELECT * FROM  emergency_medicaments WHERE  user=$op AND id_patient=$id_patient ORDER BY id DESC LIMIT 1";
$data['sql']= $this->db->query($sql);	
$this->load->view('admin/emergencia/general/medicamentosData', $data);	
}
else{
	
$save = array(
'save'=>1

);

$where = array(
  'user' =>$op,
  'DATE(inserted_time)' =>"$num",
  'id_patient'=>$id_patient
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $save);

$sqlgb ="SELECT * FROM  emergency_medicaments WHERE   save=1 GROUP BY DATE(inserted_time) ORDER BY id DESC";
$data['sql']= $this->db->query($sqlgb);
$this->load->view('admin/emergencia/general/save-medicamentos', $data);
}
}


function saveNewMed(){
$save = array(
'name'=>$this->input->post('medicamento'),
'sustenacia'=>$this->input->post('sutenacia'),
'tipo'=>$this->input->post('tipo'),
'laboratorio'=>$this->input->post('laboratorio'),
'presentacion'=>$this->input->post('presentacion'),
'fecha_exp'=>$this->input->post('fecha_exp'),
'fecha_ven'=>$this->input->post('fecha_venc'),
'cantidad_comp'=>$this->input->post('cantidad_comp'),
'precio_comp'=>$this->input->post('precio_compro'),
'margen_ben'=>$this->input->post('margen'),
'precio_venta'=>$this->input->post('precio_venta'),
'inserted_by'=>$this->input->post('created_by'),
'updated_by'=>$this->input->post('created_by'),
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$this->input->post('centro')
);
$this->db->insert("emergency_medicaments",$save);
$this->db->query("DELETE  FROM  emergency_medicaments  WHERE name =''");
}









public function check_medicamento()
{
$data = array(
 'parado' =>$this->input->post('print')
);

$where = array(
  'id' =>$this->input->post('id')
);
$this->db->where($where);

$this->db->update('emergency_medicaments', $data);

}




public function newInterconsulta()
{ 
$id_user=$this->input->post('id_user');
$id_patient=$this->input->post('id_patient');
$data['id_user']=$id_user;
$data['id_patient']=$id_patient;
$data['enviado_a']=$this->input->post('enviado_a');
$user=$this->db->select('perfil,area')->where('id_user',$id_user)->get('users')->row_array();
$data['perfil']=$user['perfil'];
$data['area']=$user['area'];
$sql ="SELECT * FROM  emergency_interconsulltas WHERE id_user=$id_user AND id_patient=$id_patient ORDER BY id DESC";
$data['nota']= $this->db->query($sql);
$this->load->view('admin/emergencia/general/new-interconsullta', $data);

}

public function addResponseInterconsulta()
{ 

$where = array(
  'id' =>$this->input->post('selected'),

);
$update = array(
 'response'=>$this->input->post('responder'),
 'user_response'=>$this->input->post('id_user'),
  'response_time'=>date("Y-m-d H:i:s")
);
$this->db->where($where);
$this->db->update("emergency_interconsulltas",$update);


}



public function laboratorios()
{
$data['id_historial'] = $this->input->post('historial_id');
$data['operator'] = $this->input->post('operator');
$data['user_id'] = $this->input->post('user_id');
$data['areaid']=$this->db->select('area')->where('id_user',$this->input->post('user_id'))->get('users')->row('area');
$data['laboratories'] = $this->model_admin->laboratories();
$this->load->view('admin/emergencia/general/laboratorios/allLaboratoriosInd', $data);
}


public function patLaboratorios()
{
$data['area'] = $this->input->post('area');	
$data['user_id'] = $this->input->post('user_id');		
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$IndicacionesLab= $this->model_admin->IndicacionesLabEmergency($historial_id);
$data['IndicacionesLab']=$IndicacionesLab;
$data['num_count_lab'] =count($IndicacionesLab);
$this->load->view('admin/emergencia/general/laboratorios/NewIndicationLab', $data);
}

public function bodegaCantidad()
{
	
 $query1 = $this->db->get_where('emergency_bodega_name',array('name'=>$this->input->post('bodega')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'name'=>$this->input->post('bodega')
	   );
		$this->db->insert("emergency_bodega_name",$save);
	}	
	
	
	
$id=$this->input->post('id');
$cantitad=$this->input->post('cantitad');
$cantitadBodega=$this->input->post('cantitad_bodega');
$save = array(
'name'=>$this->input->post('bodega'),
'idalm'=>$id,
'cant'=>$cantitadBodega,
'center'=>$this->input->post('centro')
);
$this->db->insert("emergency_bodega",$save);

$where = array(
  'id' =>$this->input->post('id')
);
$update = array(
'cantitad'=>$cantitad - $cantitadBodega,
 'dateup'=>date("Y-m-d H:i:s"),
  'updateb'=>$this->input->post('updated')
);
$this->db->where($where);
$this->db->update("emergency_almanacen_gnrl",$update);		

	
}


public function saveAlmanacenGnrl()
{
if($this->input->post('update')==0){
$save = array(
'nombre'=>$this->input->post('nombre'),
'tipo'=>$this->input->post('tipo'),
  'cantitad'=>$this->input->post('cantitad'),
 'costo'=>$this->input->post('costo'),
  'precio'=>$this->input->post('precio'),
 'fecha_ven'=>$this->input->post('fecha_ven'),
  'fecha_elab'=>$this->input->post('fecha_elab'),
  'datec'=>date("Y-m-d H:i:s"),
 'dateup'=>date("Y-m-d H:i:s"),
  'insertb'=>$this->input->post('insertb'),
 'updateb'=>$this->input->post('insertb')
);
$this->db->insert("emergency_almanacen_gnrl",$save);

if($this->input->post('tipoval')==$this->input->post('tipo')){
	$medicamentoId = $this->input->post('medica_id');
}else{
$medicamentoId = $this->db->insert_id();	
}
	$savenum = array(
'idal'=>$medicamentoId,
'centro'=>$this->input->post('centro')
);			
$this->db->insert("emergency_almanacen_num",$savenum);		




		
}else{
$where = array(
  'id' =>$this->input->post('id')
);
$update = array(
'nombre'=>$this->input->post('nombre'),
'tipo'=>$this->input->post('tipo'),
  'cantitad'=>$this->input->post('cantitad'),
 'costo'=>$this->input->post('costo'),
  'precio'=>$this->input->post('precio'),
 'fecha_ven'=>$this->input->post('fecha_ven'),
  'fecha_elab'=>$this->input->post('fecha_elab'),
 'dateup'=>date("Y-m-d H:i:s"),
  'updateb'=>$this->input->post('updated')
);
$this->db->where($where);
$this->db->update("emergency_almanacen_gnrl",$update);	
}
$msg="<span style='color:green'>Medicamento guardado con éxito</span>";
$this->session->set_flashdata('msg',$msg);
redirect('admin/almacen_general');

}




public function countMedicamentos()
{
$idmed=$this->input->post('idmed');		

$sqlm ="SELECT sum(cantitad) as cant,tipo FROM emergency_almanacen_gnrl 

join emergency_almanacen_num
 on emergency_almanacen_gnrl.id = emergency_almanacen_num.idal
 WHERE idal = '$idmed' GROUP BY tipo

";
$querym= $this->db->query($sqlm);
echo '<option value=""></option>';	
foreach ($querym->result() as $rowm){ 

echo '<option value="'.$rowm->tipo.'">'.$rowm->tipo.' '.$rowm->cant.'</option>';
}

}


public function edit_almacen(){
$id = $this->uri->segment(3);
$data['iduser'] = $this->uri->segment(4);
$data['centro'] = $this->uri->segment(5);
$data['op'] = $this->uri->segment(6);
$data['id']=$id;
$sql ="SELECT * FROM emergency_almanacen_gnrl  WHERE id=$id";
$data['val'] = $this->db->query($sql);
$this->load->view('admin/emergencia/almacen_general/edit_almacen',$data);
}




public function searchMedicamentoId()
{

$value=$this->input->get('value');
if (is_numeric($value)){
$id=$this->db->select('id')->where('id',$value)->get('emergency_almanacen_gnrl')->row('id');
}else if (is_string($value)){
$id=$this->db->select('id')->where('nombre',$value)->get('emergency_almanacen_gnrl')->row('id');	
if($id !=""){
 $id=$id;	
}else{
$id=$value;	
}
}

echo $id;

}


public function searchMedicamentoTipo()
{

$value=$this->input->get('value');
if (is_numeric($value)){
$tipo=$this->db->select('tipo')->where('id',$value)->get('emergency_almanacen_gnrl')->row('tipo');
}else if (is_string($value)){
$tipo=$this->db->select('tipo')->like('nombre',$value)->get('emergency_almanacen_gnrl')->row('tipo');	
if($tipo !=""){
 $tipo=$tipo;	
}else{
$tipo=$value;	
}
}

echo $tipo;

}




public function searchMedicamento()
{

$value=$this->input->get('value');
if (is_numeric($value)){
$nombre=$this->db->select('nombre')->where('id',$value)->get('emergency_almanacen_gnrl')->row('nombre');
}else if (is_string($value)){
$nombre=$this->db->select('nombre')->like('nombre',$value)->get('emergency_almanacen_gnrl')->row('nombre');	
if($nombre !=""){
 $nombre=$nombre;	
}else{
$nombre=$value;	
}
}

echo $nombre;

}

public function searchMedicamentoDetail()
{
$data['display1']='';
$data['display2']='none';
$value=$this->input->get('value');
$centro=$this->input->get('centro');
$data['centro']=$centro;
$data['iduser']=$this->input->get('iduser');
if (is_numeric($value)){
$sql ="SELECT idnum,idal FROM emergency_almanacen_num  WHERE idal=$value && centro=$centro";
$data['query'] = $this->db->query($sql);
$data['value'] =$value;
$data['centroName']=$this->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name');
$data['is_bodega']=0;
$this->load->view('admin/emergencia/almacen_general/medicamento_detail_num', $data);

}

}



public function ifFindMed()
{
$centro=$this->input->get('centro');
$data['centro']=$centro;
$data['iduser']=$this->input->get('iduser');
$sql ="SELECT * FROM  emergency_medicaments WHERE centro=$centro && sustenacia !='' ORDER BY id DESC";
$data['querymed'] = $this->db->query($sql);

$sql2 ="SELECT * FROM  emergency_medicaments WHERE centro=$centro && sustenacia ='' ORDER BY id DESC";
$data['querymt'] = $this->db->query($sql2);
$this->load->view('admin/emergencia/almacen_general/data', $data);
}


public function searchMedicamentoCentro()
{
$centro=$this->input->get('centro');
$data['centro']=$centro;
$data['iduser']=$this->input->get('iduser');

$sql ="SELECT * FROM  emergency_medicaments WHERE centro=$centro  ORDER BY id DESC";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/almacen_general/medicamentos', $data);
}


public function import_exel()
{
if($this->input->post('elegir')=='medicamentos')
{ 
$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$sustenacia = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$tipo = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$laboratorio = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$presentacion = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
$fecha_exp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
$fecha_ven = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
$cantidad_comp = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
$precio_comp = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
$margen_ben = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
$precio_venta = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
$data[] = array(
'name'=>$name,
'sustenacia'=>$sustenacia,
'tipo'=>$tipo,
'laboratorio'=>$laboratorio,
'presentacion'=>$presentacion,
'fecha_exp'=>$fecha_exp,
'fecha_ven'=>$fecha_ven,
'cantidad_comp'=>$cantidad_comp,
'precio_comp'=>$precio_comp,
'margen_ben'=>$margen_ben,
'precio_venta'=>$precio_venta,
'inserted_by'=>$this->input->post('creaded_by'),
'updated_by'=>$this->input->post('creaded_by'),
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$this->input->post('centro')
);
}

}
$this->excel_import_model->insert_medicamentos($data);
}else{
//-------------------------------------------------------------------------------------------

$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$laboratorio = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$presentacion = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$fecha_exp = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$fecha_ven = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
$cantidad_comp = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
$precio_comp = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
$margen_ben = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
$precio_venta = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
$data[] = array(
'name'=>$name,
'laboratorio'=>$laboratorio,
'presentacion'=>$presentacion,
'fecha_exp'=>$fecha_exp,
'fecha_ven'=>$fecha_ven,
'cantidad_comp'=>$cantidad_comp,
'precio_comp'=>$precio_comp,
'margen_ben'=>$margen_ben,
'precio_venta'=>$precio_venta,
'inserted_by'=>$this->input->post('creaded_by'),
'updated_by'=>$this->input->post('creaded_by'),
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'centro'=>$this->input->post('centro'),
'selected'=>1
);
}

}
$this->excel_import_model->insert_medicamentos($data);



//-------------------------------------------------------------------------------------------	
}
$this->db->query("DELETE  FROM  emergency_medicaments  WHERE name =''");

$centro=$this->input->post('centro');
$this->db->query("DELETE t1 FROM emergency_medicaments t1, emergency_medicaments t2 WHERE t1.id < t2.id AND t1.name = t2.name AND t1.centro =$centro");

}




public function searchBodega()
{
$idb=$this->input->get('idbod');
$centro=$this->input->get('centro');
$data['iduser']=$this->input->get('iduser');
$data['centro']=$centro;
$data['idb']=$idb;
$data['display1']='none';
$data['display2']='none';
$data['centroName']=$this->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name');
$sql ="SELECT name, idalm as idal,cant FROM emergency_bodega WHERE name='$idb' && center=$centro";
$data['query'] = $this->db->query($sql);
$data['is_bodega']=1;
$this->load->view('admin/emergencia/almacen_general/medicamento_detail_num', $data);
}



public function listarBodega()
{
$data['idal']=$this->input->post('idalm');

$this->load->view('admin/emergencia/almacen_general/listar-bodega', $data);

}




public function getMedTipo()
{
$medicamento=$this->input->get('medicamento');
$tipo=$this->input->get('tipo');
$value=$this->db->select('id')->where('nombre',$medicamento)->where('tipo',$tipo)->get('emergency_almanacen_gnrl')->row('id');
$sql ="SELECT idnum,idal FROM emergency_almanacen_num  WHERE idal=$value";
$data['query'] = $this->db->query($sql);
$data['value'] =$value;
$data['is_bodega']=0;
$this->load->view('admin/emergencia/almacen_general/medicamento_detail_num', $data);

}


public function DeleteMedicamento(){
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('emergency_medicaments');

}


public function deleteResponseInterconsulta(){
$where = array(
'id' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('emergency_interconsulltas');

}








public function removeWorkd(){

$this->load->view('remote-work');


}



public function searchPatientRecord()
{
if($this->input->get('search')==2){
$value=$this->db->select('nombre, id_p_a, edad,seguro_medico, insert_date')->where('id_p_a',$this->input->get('id'))->get('patients_appointments')->row_array();
}else if($this->input->get('search')==1){
$value=$this->db->select('nombre, id_p_a, edad,seguro_medico, insert_date')->where('ced2',$this->input->get('patient_cedula2'))->get('patients_appointments')->row_array();		
}else{
$part1=$this->input->get('patient_nombres');
$part2=$this->input->get('patient_apellido');
$part3=$this->input->get('patient_apellido2');
$nombre="$part1 $part2 $part3";
$value=$this->db->select('nombre, id_p_a, edad,seguro_medico, insert_date')->like('nombre',"$nombre")->get('patients_appointments')->row_array();		

}

$data['value'] =$value;

$emgency=$this->db->select('causa,enviado_a,created_date')->where('id_pat',$value['id_p_a'])->get('emergency_patients')->row_array();
if($emgency['enviado_a']==1){
		$enviado="Triaje";
	} elseif($emgency['enviado_a']==2){
		$enviado="Emergencia General";
	}
	if($emgency['enviado_a']){
$data['area']=$enviado;	
$data['created_date']=$emgency['created_date'];	
$data['causa']=$this->db->select('em_name')->where('id_em_c',$emgency['causa'])
->get('emergency_adm_data')->row('em_name');



$data['ars']=$this->db->select('title')->where('id_sm',$value['seguro_medico'])
->get('seguro_medico')->row('title');

$this->load->view('admin/emergencia/internal-drugstore/search-patient-result', $data);
	}else{
	echo "<span style='color:red'>No hay resultado</span>";	
	}
}

public function save_edit_bodega(){

	$Data = array(
	'cant'=>$this->input->post('edit-bodega')
	);
	
	$where = array(
	'idb' =>$this->input->post('id_bodega')
	);
	
	$this->db->where($where);
    $this->db->update("emergency_bodega",$Data);
}


public function statictic()
{
$this->load->view('admin/statistic');	
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
$sql ="SELECT id_pat FROM emergency_patients where worked=1 group by id_pat";
$data['query'] = $this->db->query($sql);
$data['id_user']=$id_user;
$this->load->view('admin/emergencia/factura/index',$data);
}

public function patientResult()
{
$data['executionStartTime'] = microtime(true);
$perfil=$this->db->select('perfil')->where('id_user',$this->input->get('id_user'))->get('users')->row('perfil');
$data['patient_data']=$this->model_admin->historial_medical($this->input->get('nombres'));

$data['perfil']=$perfil;
$val = array(
'id_patient'=>$this->input->get('nombres'),
'doctor'=>$this->input->get('id_user'),
'perfil'=>$perfil
);
$idpat=$this->input->get('nombres');
$sql ="SELECT * FROM emergency_patients where id_pat=$idpat";
$emergency = $this->db->query($sql);
$data['count']=$emergency->num_rows;
$data['id_user']=$this->input->get('id_user');
$this->load->view('admin/emergencia/factura/search-result',$data);

}

public function load_patient_emergency()
{

$id_pat=$this->input->post('id_p_a');

$sql ="SELECT * FROM emergency_patients where id_pat=$id_pat && worked=1";
$data['emergency'] = $this->db->query($sql);

$data['id_p_a']=$this->input->post('id_p_a');
$data['id_user']=$this->input->post('id_user');
$this->load->view('admin/emergencia/factura/load_patient_emergency',$data);

}



public function create_new_factura()
{
$id_em=$this->uri->segment(3);
$id_user=$this->uri->segment(4);

$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');

$emgcy=$this->db->select('id_pat,centro,created_date,create_time,id_ep')->where('id_ep',$id_em)->get('emergency_patients')->row_array();
$id_ep=$emgcy['id_ep'];
if(empty($id_em) || empty($id_user)){
redirect('/page404');
}

else if($perfil=='Admin'){
$this->load->view('admin/header_admin');
}else if($perfil=='Medico'){
$this->load->view('medico/header');	
}

$data['id_user']=$id_user;
$data['id_em']=$id_em;
$data['id_cm']=$emgcy['centro'];
$centro=$emgcy['centro'];
$id_p_a=$emgcy['id_pat'];

 $data['date_ingreso']=$emgcy['created_date'];
  $data['fecha_ingreso']=$emgcy['create_time'];

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

  
$data['fecha_alta']=$this->db->select('inserted_time')->where('id_em',$id_em)->get('emergency_conclucion_alta')->row('inserted_time');  
  
$this->load->view('admin/emergencia/factura/header-factura',$data);
$this->load->view('admin/emergencia/factura/new-factura',$data);
}


public function update_factura_fecha_venc()
{
$data= array(
'vec_fec' =>$this->input->post('vec_fec'),
'ncf' =>$this->input->post('ncf_value')
);

$where = array(
'id_mergencia' =>$this->input->post('id_em')
);


$this->db->where($where);

$this->db->update('emergency_factura', $data);
}

public function saveBill()
{
$found=$this->db->select('id_mergencia')->where('id_mergencia',$this->input->post('id_mergencia'))->get('emergency_factura')->row('id_mergencia');
 if($found){
$data= array(
'centro' =>$this->input->post('centro'),
'seguro' =>$this->input->post('seguro'),
'num_auto' =>$this->input->post('num_auto'),
'autor_por' =>$this->input->post('autor_por'),
'updated_by' =>$this->input->post('id_user'),
'updated_time' =>date("Y-m-d H:i:s"),
'ncf' =>$this->input->post('ncf')
);

$where = array(
'id_mergencia' =>$this->input->post('id_mergencia')
);
$this->db->where($where);

$this->db->update('emergency_factura', $data);
 }else{

//---CREATE NUM FAC----------------------------------------------------
$query = $this->db->get_where('emergency_factura_num',array('centro'=>$this->input->post('centro')));
if($query->num_rows() == 0)
{
$save= array(
'centro' =>$this->input->post('centro'),
'num' =>1
);
$this->db->insert('emergency_factura_num', $save);
$id_num=$this->db->insert_id();
}
else{
$num=$this->db->select('num')->where("centro",$this->input->post('centro'))->order_by('id','desc')->limit(1)->get('emergency_factura_num')->row('num');
$num=$num+1;
$save= array(
'centro' =>$this->input->post('centro'),
'num' =>$num
);
$this->db->insert('emergency_factura_num', $save);
$id_num=$this->db->insert_id();
}
	
$numf=$this->db->select('num')->where('id',$id_num)->get('emergency_factura_num')->row('num');
$ctro=$this->input->post('centro');	
$num_fac="$ctro-$numf";


$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d", strtotime($this->input->post('fecha')));
$save1= array(
'centro' =>$this->input->post('centro'),
'seguro' =>$this->input->post('seguro'),
'patient' =>$this->input->post('patient'),
'id_mergencia' =>$this->input->post('id_mergencia'),
'fecha' =>$filter_date,
'num_auto' =>$this->input->post('num_auto'),
'autor_por' =>$this->input->post('autor_por'),
'numero_factura' =>$num_fac,
'id_user' =>$this->input->post('id_user'),
'ncf' =>$this->input->post('ncf')
);
$this->db->insert('emergency_factura', $save1);
$id_last=$this->db->insert_id();

}
$this->session->set_userdata('id_mergencia',$this->input->post('id_mergencia'));
$this->session->set_userdata('id_user_fac',$this->input->post('id_user'));
}

public function print_preview_fac()
{	
if(empty($this->session->userdata['id_mergencia'])){
redirect('/page404');
}
$id_mergencia=$this->session->userdata['id_mergencia'];	
$data['id_user_fac']=$this->session->userdata['id_user_fac'];
$em_patient=$this->db->select('enviado_name,created_date,create_time')->where('id_ep',$id_mergencia)->get('emergency_patients')->row_array();
$data['enviado_name']=$em_patient['enviado_name'];
 $data['date_ingreso']=$em_patient['created_date'];
  $data['fecha_ingreso']=$em_patient['create_time'];
  $data['fecha_alta']=$this->db->select('inserted_time')->where('id_em',$id_mergencia)->get('emergency_conclucion_alta')->row('inserted_time'); 

$data['id_mergencia']=$id_mergencia;
$factura=$this->db->select('*')->where('id_mergencia',$id_mergencia)->get('emergency_factura')->row_array();
$patient_id=$factura['patient'];
$data['fecha']=$factura['fecha'];
$data['numauto']=$factura['num_auto'];
$data['autopor']=$factura['autor_por'];
$data['numfac']=$factura['numero_factura'];
$data['ncf']=$factura['ncf'];
$data['vec_fec']=$factura['vec_fec'];
//--------------------------------CENTRO INFO--------------------------------------------------------
$centro_id=$factura['centro'];
$data['id_cm']=$centro_id;
$centro=$this->db->select('name,logo,fax,primer_tel,segundo_tel,rnc,calle,barrio')->where('id_m_c',$centro_id)
->get('medical_centers')->row_array();
$data['centro_name']=$centro['name'];
$data['centro_logo']=$centro['logo'];
if($centro['fax']){
$data['fax']=$centro['fax'];
}else{
$data['fax']='';	
}
$tel1=$centro['primer_tel'];
$tel2=$centro['segundo_tel'];
$data['primer_tel']="Tel $tel1 $tel2";
if($centro['rnc']){
$rnc=$centro['rnc'];
$data['rnc']="RNC $rnc";
}else{
$data['rnc']='';	
}

$data['calle']=$centro['calle'];
$data['barrio']=$centro['barrio'];
//-----------SEGURO INFO--------------------------------------------------
$seguro_id=$factura['seguro'];
$data['id_seguro']=$seguro_id;
$seguro=$this->db->select('title,rnc')->where('id_sm',$seguro_id)->get('seguro_medico')->row_array();
$data['seguro']=$seguro['title'];
$data['rnc']=$seguro['rnc'];
  $data['seguro_codigo_contrato']=$this->db->select('codigo')->where('id_centro',$centro_id)
->where('id_seguro',$seguro_id)->get('codigo_contrato')->row('codigo');

//-------------PATIENT INFO------------------------------------------------------------------------

$paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,date_nacer,id_p_a')->where('id_p_a',$patient_id)->get('patients_appointments')->row_array();
$data['patient_id']=$paciente['id_p_a'];
$data['paciente_nombre']=$paciente['nombre'];
$data['tel_resi']=$paciente['tel_resi'];
$data['tel_cel']=$paciente['tel_cel'];
$data['cedula']=$paciente['cedula'];
$data['afiliado']=$paciente['afiliado'];
$data['email']=$paciente['email'];
$data['num_pat']=$paciente['id_p_a'];
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
	
	$data['age']=trim($age);
$data['numafiliado']=$this->db->select('input_name')
->where('patient_id',$patient_id)
->where('inputf',"No. DE AFILIADO")
->get('saveinput')->row("input_name");


//-------------TARIFARIOS--------------


//--------CIE10-----------------------------------------
$id_emergencia=$factura['id_mergencia'];
$data['id_em']=$id_emergencia;
$cie10=$this->db->select('id,otros_diagnos')->where('id_em',$id_emergencia)->get('emergency_conclucion_alta')->row_array();
$idcie10=$cie10['id'];
$data['otros_diagnos']=$cie10['otros_diagnos'];

$sqlcied ="SELECT description, code FROM  h_c_diagno_def_link INNER JOIN cied ON cied.idd=h_c_diagno_def_link.diagno_def where con_id_link=$idcie10 ";
$data['show_diagno_pat'] = $this->db->query($sqlcied);

//------------PROCEDIMIENTOS-----------------------------------------

$sqlpr ="SELECT name FROM emergency_procedimiento where idempro=$id_emergencia";
$data['procedimiento'] = $this->db->query($sqlpr);

$this->load->view('admin/emergencia/factura/print_view',$data);


}



public function getTarifMed()
{
 $id=$this->input->post('id');
$precio=$this->db->select('precio_venta')->where('id',$id)->get('emergency_medicaments')->row('precio_venta');
echo $precio;
}

public function getTarifEst()
{
 $id=$this->input->post('id');
$precio=$this->db->select('monto')->where('id_c_taf',$id)->get('centros_tarifarios')->row('monto');
echo $precio;
}

public function facturaBodyMed()
{
 $id_em=$this->input->post('id_em');
  $data['id_seguro']=$this->input->post('id_seguro');

$sql ="SELECT * FROM  orden_medica_recetas WHERE idem=$id_em && canceled=0 ORDER BY id_i_m DESC";
$data['query']= $this->db->query($sql);

$this->load->view('admin/emergencia/factura/factura-body-med',$data);
}


public function facturaBodyMat()
{
 $id_em=$this->input->post('id_em');
 $data['id_cm']=$this->input->post('id_cm');
 $id_seguro=$this->input->post('id_seguro');
  $data['id_seguro']=$id_seguro;
 if($id_seguro !=11){
$data['cobertura']=0.8; 
 }else{
$data['cobertura']=''; 	 
 }
$sql ="SELECT * FROM  emergency_peticion WHERE idemp=$id_em  && canceled=0 ORDER BY id DESC";
$data['query']= $this->db->query($sql);

$this->load->view('admin/emergencia/factura/factura-body-mat',$data);
}





public function facturaBodyEst()
{
 $id_em=$this->input->post('id_em');
 $data['id_seguro']=$this->input->post('id_seguro');
$sql ="SELECT estudio, insert_date, cantidad, descuento, cobertura, precio,  id_i_e FROM orden_medica_estudios WHERE idemes=$id_em  AND canceled=0 ORDER BY id_i_e DESC";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/factura/factura-body-est',$data);
}

public function facturaBodyLab()
{
 $id_em=$this->input->post('id_em');
  $data['id_em']=$id_em;
 $data['id_seguro']=$this->input->post('id_seguro');

$sql ="SELECT laboratory, insert_time, cantidad, descuento, cobertura, precio, id_lab FROM orden_medcia_lab 
WHERE idemlab=$id_em  AND canceled=0 ORDER BY id_lab DESC";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/factura/factura-body-lab',$data);
}


public function facturaBodyProced()
{
 $id_em=$this->input->post('id_em');
 $data['id_seguro']=$this->input->post('id_seguro');

$sql ="SELECT name, inserted_time, cantidad, descuento, cobertura, id, precio FROM emergency_procedimiento
WHERE idempro=$id_em AND canceled=0 ORDER BY id DESC";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/factura/factura-body-proced',$data);
}



public function editEmFac()
{
$id_edit=$this->uri->segment(3);
 $data['id_edit']=$id_edit;
  $data['id_seguro']=$this->uri->segment(5);
if($this->uri->segment(4)==5){
$data['table']='emergency_procedimiento';
$sql ="SELECT name, inserted_time, cantidad, descuento, cobertura, id_user, precio FROM emergency_procedimiento WHERE id=$id_edit";
}

else if($this->uri->segment(4)==2){
$data['table']='orden_medica_estudios';
$sql ="SELECT estudio as name, insert_date as inserted_time, cantidad, descuento, cobertura, operator as id_user, precio FROM  orden_medica_estudios WHERE id_i_e=$id_edit";
}

else if($this->uri->segment(4)==3){
$data['table']='orden_medcia_lab';
$sql ="SELECT laboratory as name, insert_time as inserted_time, cantidad, descuento, cobertura, user_id as id_user , precio FROM  orden_medcia_lab WHERE id_lab=$id_edit";
}
$data['query'] = $this->db->query($sql);

$this->load->view('admin/emergencia/factura/editEmFac',$data);	
}

public function editEmFac2()
{
$id_edit=$this->uri->segment(3);
 $data['id_edit']=$id_edit;
 $data['id_seguro']=$this->uri->segment(5);
if($this->uri->segment(4)==1){
$data['table']='orden_medica_recetas';
$data['title']='Editar Medicamento';
$sql ="SELECT medica as name, insert_date as inserted_time, cantidad, descuento, cobertura, operator as id_user , precio FROM orden_medica_recetas WHERE id_i_m=$id_edit";

}else{
$data['title']='Editar Material Gastable';
$data['table']='emergency_peticion';
$sql ="SELECT insumo as name, inserted_time, cantidad, descuento, cobertura,  id_user, precio FROM emergency_peticion WHERE id=$id_edit";	
}
$data['query'] = $this->db->query($sql);
$this->load->view('admin/emergencia/factura/editEmFac2',$data);	
}



public function updateOrdMedFac()
{
$table =$this->input->post('table');
$data = array(
'precio' => $this->input->post('precio'),
'cobertura' => $this->input->post('cobert'),
'descuento' => $this->input->post('descuento')
);
if($table=='emergency_procedimiento'){
$where = array(
 'id'=>$this->input->post('id')
);

} else if($table=='orden_medica_estudios'){
$where = array(
 'id_i_e'=>$this->input->post('id')
);	
}

else if($table=='orden_medcia_lab'){
$where = array(
 'id_lab'=>$this->input->post('id')
);	
}

else if($table=='orden_medica_recetas'){
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
if($table=='emergency_procedimiento'){
$where = array(
  'id' =>$this->input->post('id')
);
}else if($table=='orden_medica_estudios'){
$where = array(
  'id_i_e' =>$this->input->post('id')
);	
}else if($table=='orden_medcia_lab'){
$where = array(
  'id_lab' =>$this->input->post('id')
);	
}
else if($table=='orden_medica_recetas'){
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

function tranfertGpT(){
echo $this->input->post('sum_tot_pag_pat3');

}

function tranfertGpTp(){
echo $this->input->post('sum_tot_pag_pat5');

}

function tranfertGpTmed(){
echo $this->input->post('sum_tot_pag_pat0');

}


function tranfertGpTlab(){
echo $this->input->post('sum_tot_pag_pat4');

}

function tranfertGpTest(){
echo $this->input->post('sum_tot_pag_pat2');
	
}
function tranfertCob0(){
echo  $this->input->post('total_cob0');
	
}

function tranfertDiff0(){
echo  $this->input->post('tot_diff0');
	
}

function tranfertDesc0(){
echo  $this->input->post('tot_discount0');
	
}
//----------------------------------------------------------------------------------------
function tranfertCob2(){
echo  $this->input->post('total_cob2');
	
}

function tranfertDiff2(){
echo  $this->input->post('tot_diff2');
	
}

function tranfertDesc2(){
echo  $this->input->post('tot_discount2');
	
}
//------------------------------------------------------------------------------------------
function tranfertCob4(){
echo  $this->input->post('total_cob4');
	
}

function tranfertDiff4(){
echo  $this->input->post('tot_diff4');
	
}

function tranfertDesc4(){
echo  $this->input->post('tot_discount4');
	
}
//-----------------------------------------------------------------------------------------
function tranfertCob3(){
echo  $this->input->post('total_cob3');
	
}

function tranfertDiff3(){
echo  $this->input->post('tot_diff3');
	
}

function tranfertDesc3(){
echo  $this->input->post('tot_discount3');
	
}
//-------------------------------------------------------------------------------------------
function tranfertCob5(){
echo  $this->input->post('total_cob5');
	
}

function tranfertDiff5(){
echo  $this->input->post('tot_diff5');
	
}

function tranfertDesc5(){
echo  $this->input->post('tot_discount5');
	
}
//------------------------------------------------------------------------------------------
}