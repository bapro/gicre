<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Save_no_discharge extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
  $this->load->library('form_validation'); 
}



public function saveHospitalizacionPatient(){
	 $id_patient =$this->input->post('id_patient');
   $id_user= $this->input->post('id_user');
   $id_centro= $this->input->post('id_centro');
   $id_hosp=$this->input->post('id_hosp');
  $inserted_by=$this->input->post('id_user');
  $updated_by=$this->input->post('id_user');
  $inserted_time=date("Y-m-d H:i:s");

  $is_neuro_empty2=$this->input->post('is_neuro_empty2');
    $is_neuro_empty1=$this->input->post('is_neuro_empty1');

//-----CHECK FOR ANT GENERAL-------------------------------------------


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

if($is_neuro_empty1 !=0 && $is_neuro_empty1 !=0){
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


public function saveHospitalizacionPatientMale(){
	$this->saveHospitalizacionPatient();
}

public function saveHospitalizacionPatientFemale(){
	 $id_patient =$this->input->post('id_patient');
   $id_user= $this->input->post('id_user');
   $id_centro= $this->input->post('id_centro');
   $id_hosp=$this->input->post('id_hosp');
  $inserted_by=$this->input->post('id_user');
  $updated_by=$this->input->post('id_user');
  $inserted_time=date("Y-m-d H:i:s");

  $is_neuro_empty2=$this->input->post('is_neuro_empty2');
    $is_neuro_empty1=$this->input->post('is_neuro_empty1');

//-----CHECK FOR ANT GENERAL-------------------------------------------


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

if($is_neuro_empty1 !=0 && $is_neuro_empty1 !=0){
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
	//----------------------save ant ssr-
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