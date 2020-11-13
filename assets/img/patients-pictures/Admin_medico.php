<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_medico extends CI_Controller { 
public function __construct()
{
parent::__construct();

$this->load->model('model_admin');
$this->load->model("padron_model");
 $this->load->model('navigation/account_demand_model');
$this->load->model('excel_import_model');
$this->load->library('excel');
$this->load->library("Pdf");

}




public function zoom_image(){
$data = array(
  'MUN_CED' => $this->uri->segment(3),
  'SEQ_CED' => $this->uri->segment(4),
  'VER_CED' => $this->uri->segment(5)
  );
$data['name']=$this->padron_model->getPatientCedulaPad($data);
$data['photo']=$this->padron_model->getPhoto($data);
$this->load->view('admin/historial-medical1/zoom_image', $data);

}


public function zoom_image_ad(){
$id_p_a = $this->uri->segment(3);
$data['patient']=$this->model_admin->getPatientPhoto($id_p_a);
$this->load->view('admin/historial-medical1/zoom_image_ad', $data);

}

 public function data_ssr_by_id(){
//$id  = $this->input->post('id_ssr');
//$historial_id = $this->input->post('hist_id');

$id=$this->uri->segment(3);
$historial_id=$this->uri->segment(4);
$id_user=$this->uri->segment(5);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['id_historial'] =$historial_id;
$data['ssr'] = $this->model_admin->data_ssr_by_id($id);
$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr_nav'] = $this->model_admin->getSSR($historial_id);
//$this->load->view('admin/historial-medical/ante_ssr/navegador',$data);
$this->load->view('admin/historial-medical/ante_ssr/ant_ssr_data', $data);
$this->load->view('admin/historial-medical/ante_ssr/footer');
}





public function saveEditAntssr()
{
$idssr=$this->input->post('idssr');
	
$insert_date=date("Y-m-d H:i:s");

$sifilisc= $this->input->post('sifilisc');
$sifilisc1 = (isset($sifilisc)) ? 1 : 0;

$gonorreac= $this->input->post('gonorreac');
$gonorreac1 = (isset($gonorreac)) ? 1 : 0;

$clamidiac= $this->input->post('clamidiac');
$clamidiac1 = (isset($clamidiac)) ? 1 : 0;

$save2= array(
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

'infeccion1'=>$sifilisc1,
'infeccion2'=>$gonorreac1,
'infeccion3'=> $clamidiac1,

'infec_tran'=> $this->input->post('infec_tran'),
'updated_by'=> $this->input->post('updated_by'),
'update_time'=> $insert_date
);
$this->model_admin->saveEditAntssr($idssr,$save2);

}





 public function data_obs_by_id(){

$id=$this->uri->segment(3);
$historial_id=$this->uri->segment(4);
$id_user=$this->uri->segment(5);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['id_historial'] =$historial_id;
$data['obs']=$this->model_admin->getObs($id);
$data['obs2']=$this->model_admin->getObs2($id);
$data['obs3']=$this->model_admin->getObs3($id);
$data['obs4']=$this->model_admin->getObs4($id);
$data['count_obs']=$this->model_admin->countObs($historial_id);
$data['obs_nav'] = $this->model_admin->sObs($historial_id);
//$this->load->view('admin/obs_navegador',$data);
$this->load->view('admin/historial-medical1/obstetrico/data', $data);
$this->load->view('admin/historial-medical1/obstetrico/footer');
}





public function saveUpObstetrico()
{
$insert_date=date("Y-m-d H:i:s");

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

$idobs=$this->input->post('idobs');	
$up= array(
'dia1'=> $this->input->post('dia1'),
'tbc1'=> $this->input->post('tbc1'),
'hip1'=> $this->input->post('hip1'),
'pelv'=> $this->input->post('pelv'),
'inf'=> $this->input->post('inf'),
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
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=> $insert_date
);

$this->model_admin->upObstetrico1($up,$idobs);

//-----------------------------------------------------
$up1= array(
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
);

$this->model_admin->upObstetrico2($up1,$idobs); 


//-----------------------------------------------------
$vdrl11= $this->input->post('vdrl11');
$vdrl1 = (isset($vdrl11)) ? 1 : 0;
$vdrl22= $this->input->post('vdrl22');
$vdrl2 = (isset($vdrl22)) ? 1 : 0;


$up2= array(
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
'prev_act'=> $this->input->post('prev_act'),
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
  
);

$this->model_admin->upObstetrico3($up2,$idobs);

//-----------------------------------------------
$up3= array(
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
'loquios3'=> $this->input->post('loquios3')
);

$this->model_admin->upObstetrico4($up3,$idobs);	

}





 public function data_pedia_by_id(){
$id = $this->uri->segment(3);
$historial_id = $this->uri->segment(4);
$data['id_p'] =$id;
$data['id_historial'] =$historial_id;
$id_user=$this->uri->segment(5);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['count_pedia']=$this->model_admin->countant_pedia($historial_id);
//$data['pedia']=$this->model_admin->Getpedia($historial_id);
$data['vacuna'] = $this->model_admin->getVacunaData($historial_id);
$data['pediaid'] = $this->model_admin->getPediaId($id);
$this->load->view('admin/historial-medical/pediatrico/data', $data);
$this->load->view('admin/historial-medical/pediatrico/footer', $data);

}




public function saveUpPedia()
{
$historial_id= $this->input->post('hist_id');
$data['id_historial']=$historial_id;
$insert_date=date("Y-m-d H:i:s");
$medicamento= $this->input->post('med');
$ale1= $this->input->post('ale1');
$ale = (isset($ale1)) ? 1 : 0;

$hep1= $this->input->post('hep1');
$hep = (isset($hep1)) ? 1 : 0;

$amig1= $this->input->post('amig1');
$amig = (isset($amig1)) ? 1 : 0;

$infv1= $this->input->post('infv1');
$infv = (isset($infv1)) ? 1 : 0;

$asm1 = $this->input->post('asm1');
$asm  = (isset($asm1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$neum1 = $this->input->post('neum1');
$neum  = (isset($neum1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$cirug1 = $this->input->post('cirug1');
$cirug  = (isset($cirug1)) ? 1 : 0;

$otot1 = $this->input->post('otot1');
$otot  = (isset($otot1)) ? 1 : 0;

$deng1 = $this->input->post('deng1');
$deng  = (isset($deng1)) ? 1 : 0;

$pape1 = $this->input->post('pape1');
$pape  = (isset($pape1)) ? 1 : 0;


$diar1 = $this->input->post('diar1');
$diar  = (isset($diar1)) ? 1 : 0;

$paras1 = $this->input->post('paras1');
$paras  = (isset($paras1)) ? 1 : 0;


$zika1 = $this->input->post('zika1');
$zika  = (isset($zika1)) ? 1 : 0;


$saram1 = $this->input->post('saram1');
$saram  = (isset($saram1)) ? 1 : 0;


$chicun1 = $this->input->post('chicun1');
$chicun  = (isset($chicun1)) ? 1 : 0;


$varicela1 = $this->input->post('varicela1');
$varicela  = (isset($varicela1)) ? 1 : 0;

$falc1 = $this->input->post('falc1');
$falc  = (isset($falc1)) ? 1 : 0;

$desco_peso_al_nacer = $this->input->post('desco_peso_al_nacer');
$desco_peso_al_nacer1  = (isset($desco_peso_al_nacer)) ? 1 : 0;

$desco_talla_al_nacer = $this->input->post('desco_talla_al_nacer');
$desco_talla_al_nacer1  = (isset($desco_talla_al_nacer)) ? 1 : 0;

$lactamat1 = $this->input->post('lactamat1');
$lactamat  = (isset($lactamat1)) ? 1 : 0;

$leche1 = $this->input->post('leche1');
$leche  = (isset($leche1)) ? 1 : 0;
$id = $this->input->post('idpedia');

$save3= array(
'evo'=> $this->input->post('evo'),
'evol_text'=> $this->input->post('evol_text'),
'tnaci'=> $this->input->post('tnaci'),
'describa'=> $this->input->post('describa'),
'edad_gest'=> $this->input->post('edad_gest'),
'peso'=> $this->input->post('peso'),
'talla'=> $this->input->post('talla'),
'desco_peso_al_nacer'=> $desco_peso_al_nacer1,
'desco_talla_al_nacer'=> $desco_talla_al_nacer1,
'lactamat'=> $lactamat,
'leche'=> $leche,
'otrosinfo'=> $this->input->post('otrosinfo'),
'traum_text'=> $this->input->post('traum_text'),
'trans_text'=> $this->input->post('trans_text'),
'ale'=> $ale,
'hep'=> $hep,
'amig'=> $amig,
'infv'=> $infv,
'asm'=> $asm,
'neum'=> $neum,
'cirug'=> $cirug, 
'otot'=> $otot,
'deng'=> $deng, 
'pape'=> $pape,
'diar'=> $diar, 
'paras'=> $paras,
'zika'=> $zika,
'saram'=> $saram, 
'chicun'=> $chicun, 
'varicela'=> $varicela,
'falc'=> $falc, 
'otros_t_text'=> $this->input->post('otros_t_text'),
'motor1'=> $this->input->post('textgrueso'),
'motor2'=> $this->input->post('textfino'),
'lenguaje'=> $this->input->post('textlenguage'),
'social'=> $this->input->post('textsocial'),
'maltratof'=> $this->input->post('textmaltrato'),
'abusos'=> $this->input->post('textabuso'),
'negligencia'=> $this->input->post('textneg'),
'maltrato'=> $this->input->post('maltratoemo'),
'updated_by'=> $this->input->post('updated_by'),
'hist_id'=> $this->input->post('hist_id'),
'updated_time'=> $insert_date
);

$this->model_admin->saveUpdatePedia($id,$save3);

$this->model_admin->deleteAllMedPed($id);
if(!empty($medicamento)){
foreach ($medicamento as $med) {
    
	$save= array(
	'medica' =>$med,
	'hist_id' => $historial_id,
	'id_pedia' => $id
	);
    
	$this->model_admin->SaveMedPed($save);
}}

//---------------------Vacuna---------------------------

$save4= array(

'bcg1'=> $this->input->post('bcg1'),
'resf1'=> $this->input->post('resf1'),

'hepb1'=> $this->input->post('hepb1'),
'resf2'=> $this->input->post('resf2'),


'yel3'=> $this->input->post('no_ap3'),
'resf3'=> $this->input->post('resf3'),

'bl4'=> $this->input->post('bl4'),
'resf4'=> $this->input->post('resf4'),

'yel5'=> $this->input->post('yel5'),
'resf5'=> $this->input->post('resf5'),

'bl6'=> $this->input->post('bl6'),
'resf6'=> $this->input->post('resf6'),

'gr7'=> $this->input->post('gr7'),
'resf7'=> $this->input->post('resf7'),

'bll8'=> $this->input->post('bll8'),
'resf8'=> $this->input->post('resf8'),

'grr9'=> $this->input->post('grr9'),
'resf9'=> $this->input->post('resf9'),

'yel10'=> $this->input->post('yel10'),
'resf10'=> $this->input->post('resf10'),

'bl11'=> $this->input->post('bl11'),
'resf11'=> $this->input->post('resf11'),

'gr12'=> $this->input->post('gr12'),
'resf12'=> $this->input->post('resf12'),

'yel13'=> $this->input->post('yel13'),
'resf13'=> $this->input->post('resf13'),

'bl14'=> $this->input->post('bl14'),
'resf14'=> $this->input->post('resf14'),

'bll15'=> $this->input->post('bll15'),
'resf15'=> $this->input->post('resf15'),

'srp16'=> $this->input->post('srp16'),
'resf16'=> $this->input->post('resf16'),

'bll17'=> $this->input->post('bll17'),
'resf17'=> $this->input->post('resf17'),

'grr18'=> $this->input->post('grr18'),
'resf18'=> $this->input->post('resf18')

);

$this->model_admin->saveUpdateVacuna($id,$save4);


}






public function show_enfermedad(){
$id_enf= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['show_enf'] = $this->model_admin->show_enfermedad($id_enf);
$this->load->view('admin/historial-medical/enfermedad-actual/data', $data);
$this->load->view('admin/historial-medical/enfermedad-actual/footer');
}


 public function SaveUpEnfermedad()
{
	$insert_date=date("Y-m-d H:i:s");
	$id_enf=$this->input->post('id_enf');
   $saveEnf = array(
  'enf_motivo'=> $this->input->post('enf_motivo'),
  'signopsis'=> $this->input->post('enf_signopsis'),
  'laboratorios'=> $this->input->post('enf_laboratorios'),
  'estudios'=> $this->input->post('enf_estudios'),
   'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
  
   $this->model_admin->SaveUpEnfermedad($id_enf,$saveEnf);
    $data['enfermedad']=$this->model_admin->Enfermedad($historial_id);
	$data['count_enf']=$this->model_admin->CountEnfermedad($historial_id);
	$this->load->view('admin/historial-medical/enfermedad-actual/index',$data);
   //$this->load->view('admin/Insertenfermedad',$data);
 }
 

public function showRehabById(){
$id=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['showRehabById'] = $this->model_admin->showRehabById($id);
$this->load->view('admin/historial-medical/rehabilitation/data-rehab', $data);
$this->load->view('admin/historial-medical/rehabilitation/footer');
}



 public function saveUpRehabilidad()
{ 
$id_rehab= $this->input->post('id_rehab');
	$insert_date=date("Y-m-d H:i:s");
$save= array(
  'marcha_inicio'=> $this->input->post('marcha_inicio'),
  'long_mov_der'=> $this->input->post('long_mov_der'),
  'long_mov_izq'=> $this->input->post('long_mov_izq'),
  'long_simetria'=> $this->input->post('long_simetria'),
   'long_fluidez'=> $this->input->post('long_fluidez'),
  'long_traject'=> $this->input->post('long_traject'),
  'long_tronco'=> $this->input->post('long_tronco'),
  'long_postura'=> $this->input->post('long_postura'),
  'equi_sentado'=> $this->input->post('equi_sentado'),
  'equi_levantarse'=> $this->input->post('equi_levantarse'),
  'equi_intentos'=> $this->input->post('equi_intentos'),
  'equi_biped1'=> $this->input->post('equi_biped1'),
  'equi_biped2'=> $this->input->post('equi_biped2'),
   'equi_emp'=> $this->input->post('equi_emp'),
 'equi_ojos'=> $this->input->post('equi_ojos'),
 'equi_vuelta'=> $this->input->post('equi_vuelta'),
    'equi_sentarse'=> $this->input->post('equi_sentarse'),
 'eval_balsys'=> $this->input->post('eval_balsys'),
  'eval_movim'=> $this->input->post('eval_movim'),
   'eval_monop'=> $this->input->post('eval_monop'),
  'criteria_intens'=> $this->input->post('criteria_intens'),
  'criteria_cuidado1'=> $this->input->post('criteria_cuidado1'),
  'levantar_peso'=> $this->input->post('levantar_peso'),
  'criteria_caminar'=> $this->input->post('criteria_caminar'),
  'criteria_estar_sent'=> $this->input->post('criteria_estar_sent'),
   'criteria_dormir'=> $this->input->post('criteria_dormir'),
  'criteria_sexual'=> $this->input->post('criteria_sexual'),
    'criteria_vida'=> $this->input->post('criteria_vida'),
   'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
  
 $this->model_admin->saveUpRehabilidad($id_rehab,$save);

  
  }

  
  
  
   public function showExamenById(){
$data['cabeza']=$this->model_admin->Cabeza();
$data['cuello']=$this->model_admin->examenCuello();
$data['torax']=$this->model_admin->examenTorax();
$data['mama']=$this->model_admin->examenMama();
$data['axilar']=$this->model_admin->examenAxilar();
$data['genitalf']=$this->model_admin->examenGenitalf();
$data['genitalm']=$this->model_admin->examenGenitalm();
$data['vagina']=$this->model_admin->examenVagina();
$data['rectal']=$this->model_admin->examenRectal();
$data['inspeccion_vulvar']=$this->model_admin->examenInspeccion_vulvar();
$data['ext_inf']=$this->model_admin->examenExtinf();
//=====================================================
$id_enf=$this->uri->segment(3);
$historial_id=$this->uri->segment(4);
$data['historial_id']=$historial_id;
$id_user=$this->uri->segment(5);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);
$data['show_signo_by_id'] = $this->model_admin->show_signo_by_id($id_enf);
$data['show_neuro'] = $this->model_admin->showNeurologiaById($id_enf);
$data['show_examenes_ambas'] = $this->model_admin->showExamAmbasById($id_enf);
$data['show_examene_pelv'] = $this->model_admin->showExamPelById($id_enf);
$this->load->view('admin/historial-medical/examen-fisico/data', $data);
$this->load->view('admin/historial-medical/examen-fisico/footer');
}
  
  
  
 public function SaveUpExamenFisico(){

$insert_date=date("Y-m-d H:i:s");
$id_sig=$this->input->post('id_sig');
//-----------Save signo-----------------------
$saveSigno = array(
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
'radio'=> $this->input->post('radio_signo'),
  'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
$this->model_admin->saveUpSignosVitales($id_sig,$saveSigno);
//---------------------Save neurologico------------------------------------
$saveNeuro= array(
'neuro_s'=> $this->input->post('neuro_s'),
  'neuro_text'=> $this->input->post('neuro_text'),
  'cabeza'=> $this->input->post('cabeza'),
  'cabeza_text'=> $this->input->post('cabeza_text'),
  'cuello'=> $this->input->post('cuello'),
  'cuello_text'=> $this->input->post('cuello_text'),
  'abd_insp'=> $this->input->post('abd_insp'),
 'ausc'=> $this->input->post('ausc'),
  'perc'=> $this->input->post('perc'),
   'palpa'=> $this->input->post('palpa'),
  'ext_sup_text'=> $this->input->post('ext_sup_text'),
  'ext_sup'=> $this->input->post('ext_sup'),
  'torax'=> $this->input->post('torax'),
  'torax_text'=> $this->input->post('torax_text'),
  'ext_inf'=> $this->input->post('ext_inf'),
  'ext_inft'=> $this->input->post('ext_inft')
  );
  $this->model_admin->saveUpExamNeuro($id_sig,$saveNeuro);
//----------------------Examen de Ambas Mamas-----------------------
  $dataExamMama= array(
  'cuad_inf_ext1'=> $this->input->post('cuad_inf_ext1'),
  'mama_izq1'=> $this->input->post('mama_izq1'),
  'cuad_sup_ext1'=> $this->input->post('cuad_sup_ext1'),
  'cuad_inf_ext11'=> $this->input->post('cuad_inf_ext11'),
  'region_retro1'=> $this->input->post('region_retro1'),
  'region_areola_pezon1'=> $this->input->post('region_areola_pezon1'),
   'region_ax1'=> $this->input->post('region_ax1'),
  'cuad_inf_ext2'=> $this->input->post('cuad_inf_ext2'),
  'mama_izq2'=> $this->input->post('mama_izq2'),
  'cuad_sup_ext2'=> $this->input->post('cuad_sup_ext2'),
  'cuad_inf_ext22'=> $this->input->post('cuad_inf_ext22'),
  'region_retro2'=> $this->input->post('region_retro2'),
  'region_areola_pezon2'=> $this->input->post('region_areola_pezon2'),
   'region_ax2'=> $this->input->post('region_ax2')

   );
  $this->model_admin->saveUpExamAmbasMama($id_sig,$dataExamMama);
  
  //-----------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual-----------------------
  $data3= array(
  'especuloscopia'=> $this->input->post('especuloscopia'),
  'tacto_bima'=> $this->input->post('tacto_bima'),
  'cervix'=> $this->input->post('cervix'),
  'cervix_text'=> $this->input->post('cervix_text'),
  'utero_text'=> $this->input->post('utero_text'),
  'anexo_derecho_text'=> $this->input->post('anexo_derecho_text'),
  'anexo_iz_text'=> $this->input->post('anexo_iz_text'),
  'inspection_vulval'=> $this->input->post('inspection_vulval'),
  'inspection_vulval_text'=> $this->input->post('inspection_vulval_text'),
  'rectal_text'=> $this->input->post('rectal_text'),
  'rectal'=> $this->input->post('rectal'),
   'genitalm'=> $this->input->post('genitalm'),
  'genitalm_text'=> $this->input->post('genitalm_text'),
  'genitalf_text'=> $this->input->post('genitalf_text'),
   'genitalf'=> $this->input->post('genitalf'),
   'vagina'=> $this->input->post('vagina'),
   'vagina_text'=> $this->input->post('vagina_text')
   );
  $this->model_admin->saveUpExamenPelvic($id_sig,$data3);

}  
  
  
  
  public function show_examsis_by_id(){
$id_enf= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['digest']=$this->model_admin->sistemaDigest();
$data['musculo']=$this->model_admin->sistemaMusculo();
$data['urogenial']=$this->model_admin->sistemaUrogenial();
$data['cardiov']=$this->model_admin->sistemaCardiov();
$data['neuro']=$this->model_admin->sistemaNeuro();
$data['resp']=$this->model_admin->sistemaResp();
$data['endocrino']=$this->model_admin->sistemaEndo();
$data['relativo']=$this->model_admin->sistemaRelat();
$data['show_examsis_by_id'] = $this->model_admin->show_examsis_by_id($id_enf);
$this->load->view('admin/historial-medical/examen-sistema/data', $data);
$this->load->view('admin/historial-medical/examen-sistema/footer');
} 
  
  
  
  
public function SaveUpExamSis()
{ 
$id_exs= $this->input->post('id_exs');
$insert_date=date("Y-m-d H:i:s");
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
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=> $insert_date


);
$this->model_admin->saveUpExameneSistema($id_exs,$saveExamSis);

}
  
 public function show_con_by_id(){
$id_con= $this->uri->segment(3);
$historial_id= $this->uri->segment(4);
$id_user=$this->uri->segment(5);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['historial_id']=$historial_id;
$data['id_con']=$id_con;
$data['concluciones'] = $this->model_admin->concluciones($historial_id);
$data['count_conc']=$this->model_admin->count_con_dia($historial_id);
$data['show_con_by_id'] = $this->model_admin->show_con_by_id($id_con);
//$data['show_diagno_def'] = $this->model_admin->show_diagno_def($id_con);
//$data['show_diagno_pro1'] = $this->model_admin->show_diagno_pro1($id_con);
$data['diag_pres']=$this->model_admin->Diag_pres();
$data['diag_pro']=$this->model_admin->Diag_pro();
$this->load->view('admin/historial-medical/conclusion/data', $data);
$this->load->view('admin/historial-medical/conclusion/footer');
}  
  
  
  
  
  
  public function SaveUpConcluciones()
{ 
  $insert_date=date("Y-m-d H:i:s");
	$id_cdia= $this->input->post('id_cdia');
 $saveConDia= array(
  'plan'=> $this->input->post('plan'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
   $this->model_admin->saveUpConclucionDiag($id_cdia,$saveConDia);
   $last_id_con=$this->db->select('id_cdia')->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
//-----------------------------------------------------------------------------------------------------------------------------

$this->model_admin->deleteCondef($id_cdia);

  $diagno_def=$this->input->post('diagno_def');
  
  foreach ($diagno_def as $df) {
$savecd = array(
  'diagno_def'=> $df,
  'p_id'=> $this->input->post('historial_id'),
  'con_id_link'=> $last_id_con
  
 );
$this->model_admin->SaveConDef($savecd);
}
 //-------------------------------------------------------------------------------------------------
 $this->model_admin->deleteConPro($id_cdia);
   $procedimiento= $this->input->post('procedimiento');
     foreach ($procedimiento as $pro) {
$savecp = array(
  'procedimiento'=> $pro,
  'p_id'=> $this->input->post('historial_id'),
  'cond_id_link'=> $last_id_con
 );
$this->model_admin->SaveConPro($savecp);
}

} 
 



public function showSelectContP(){
$id=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['showSelectContP1'] = $this->model_admin->showSelectContP1($id);
$data['showSelectContP2'] = $this->model_admin->showSelectContP2($id);
$data['showSelectContP3'] = $this->model_admin->showSelectContP3($id);
$data['showSelectContP4'] = $this->model_admin->showSelectContP4($id);
$data['showSelectContP5'] = $this->model_admin->showSelectContP5($id);
$data['showSelectContP6'] = $this->model_admin->showSelectContP6($id);
$data['showSelectContP7'] = $this->model_admin->showSelectContP7($id);
$data['showSelectContP8'] = $this->model_admin->showSelectContP8($id);
$data['showSelectContP9'] = $this->model_admin->showSelectContP9($id);
$this->load->view('admin/historial-medical/control-prenatal/test',$data);
$this->load->view('admin/historial-medical/control-prenatal/footer');
}



public function saveAntecedentes(){
$insert_date=date("Y-m-d H:i:s");
$medicine= $this->input->post('selectmedic');
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
'operator'=> $this->input->post('inserted_by'),
'update_by'=> $this->input->post('inserted_by')
);
$this->model_admin->marquePositivo($save);

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
'inserted_by'=> $this->input->post('inserted_by'),
'update_by'=> $this->input->post('inserted_by')
);
$this->model_admin->DesantAl($save2);
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
'inserted_by'=> $this->input->post('inserted_by')
);
$this->model_admin->saveAnteOtros($save3);
//--------Medicamentos habituales-----------------------------

if(!empty($medicine))
{
foreach ($medicine as $med) {
	$save = array(
	  'medicine'  => $med,
	 'id_patient' => $this->input->post('hist_id')
	);
		$this->model_admin->SaveMedicine($save);
	};
	};
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
  'historial_id'=> $this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date,
  'update_time'=> $insert_date
   );
   $this->model_admin->saveHabitosToxicos($save4);
   if(!empty($hab_t_drug)){
   foreach ($hab_t_drug as $drug) {
	$save = array(
	  'name' => $drug,
	 'id_patient' => $this->input->post('hist_id')
	);
		$this->model_admin->SaveDrug($save);
	};
   }
	
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
'otro_infeccion'=> $this->input->post('otro_infeccion'), 
'otro_infeccion1'=> $this->input->post('otro_infeccion1'), 
'cant_sang'=> $this->input->post('cant_sang'),
'nuligesta'=> $this->input->post('nuligesta'),
'complica'=> $this->input->post('complica'),
'complica_text'=> $this->input->post('complica_text'),
'complica_dur'=> $this->input->post('complica_dur'),
'complica_dur_text'=> $this->input->post('complica_dur_text'),
'infec_tran'=> $this->input->post('infec_tran'),
'inserted_by'=> $this->input->post('inserted_by'),
'updated_by'=> $this->input->post('inserted_by'),
'hist_id'=> $this->input->post('hist_id'),
'date_time'=> $insert_date,
'update_time'=> $insert_date,
'infeccion1'=> $sifilisc1,
'infeccion2'=> $gonorreac1,
'infeccion3'=> $clamidiac1
);
$this->model_admin->saveAntssr($save1);	
$this->model_admin->DeleteEmptySSR($this->input->post('hist_id'));	


//save obstetrico

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
'inf'=> $this->input->post('inf'),
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
'hist_id'=> $this->input->post('hist_id'),
'inserted_by'=> $this->input->post('inserted_by'),
'inserted_by'=> $this->input->post('inserted_by'),
'updated_time'=> $insert_date,
'updated_time'=> $insert_date
);

$this->model_admin->saveObstetrico1($save);
$this->model_admin->DeleteEmptyObs1($this->input->post('hist_id'));	
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
'hist_id'=>$this->input->post('hist_id')
);

$this->model_admin->saveObstetrico2($save1); 
//$this->model_admin->DeleteEmptyObs2($this->input->post('hist_id'));	

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
'hist_id'=>$this->input->post('hist_id')   
   
);

$this->model_admin->saveObstetrico3($save2);
//$this->model_admin->DeleteEmptyObs3($this->input->post('hist_id'));	
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
'hist_id'=> $this->input->post('hist_id')
);

$this->model_admin->saveObstetrico4($save3);
//$this->model_admin->DeleteEmptyObs4($this->input->post('hist_id'));	

/*save pediatrico*/

$medicamento= $this->input->post('med');
$ale1= $this->input->post('ale1');
$ale = (isset($ale1)) ? 1 : 0;

$hep1= $this->input->post('hep1');
$hep = (isset($hep1)) ? 1 : 0;

$amig1= $this->input->post('amig1');
$amig = (isset($amig1)) ? 1 : 0;

$infv1= $this->input->post('infv1');
$infv = (isset($infv1)) ? 1 : 0;

$asm1 = $this->input->post('asm1');
$asm  = (isset($asm1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$neum1 = $this->input->post('neum1');
$neum  = (isset($neum1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$cirug1 = $this->input->post('cirug1');
$cirug  = (isset($cirug1)) ? 1 : 0;

$otot1 = $this->input->post('otot1');
$otot  = (isset($otot1)) ? 1 : 0;

$deng1 = $this->input->post('deng1');
$deng  = (isset($deng1)) ? 1 : 0;

$pape1 = $this->input->post('pape1');
$pape  = (isset($pape1)) ? 1 : 0;


$diar1 = $this->input->post('diar1');
$diar  = (isset($diar1)) ? 1 : 0;

$paras1 = $this->input->post('paras1');
$paras  = (isset($paras1)) ? 1 : 0;


$zika1 = $this->input->post('zika1');
$zika  = (isset($zika1)) ? 1 : 0;


$saram1 = $this->input->post('saram1');
$saram  = (isset($saram1)) ? 1 : 0;


$chicun1 = $this->input->post('chicun1');
$chicun  = (isset($chicun1)) ? 1 : 0;


$varicela1 = $this->input->post('varicela1');
$varicela  = (isset($varicela1)) ? 1 : 0;

$falc1 = $this->input->post('falc1');
$falc  = (isset($falc1)) ? 1 : 0;

$desco_peso_al_nacer = $this->input->post('desco_peso_al_nacer');
$desco_peso_al_nacer1  = (isset($desco_peso_al_nacer)) ? 1 : 0;

$desco_talla_al_nacer = $this->input->post('desco_talla_al_nacer');
$desco_talla_al_nacer1  = (isset($desco_talla_al_nacer)) ? 1 : 0;

$lactamat1 = $this->input->post('lactamat1');
$lactamat  = (isset($lactamat1)) ? 1 : 0;

$leche1 = $this->input->post('leche1');
$leche  = (isset($leche1)) ? 1 : 0;
$editpedia = $this->input->post('editpedia');

$save= array(
'evo'=> $this->input->post('evo'),
'evol_text'=> $this->input->post('evol_text'),
/*'dosis'=> $this->input->post('dosis'),
'tiempo'=> $this->input->post('tiempo'),
'edad'=> $this->input->post('edad'),
'via'=> $this->input->post('via'),*/
'tnaci'=> $this->input->post('tnaci'),
'describa'=> $this->input->post('describa'),
'edad_gest'=> $this->input->post('edad_gest'),
'peso'=> $this->input->post('pesopd'),
'talla'=> $this->input->post('talla'),
'desco_peso_al_nacer'=> $desco_peso_al_nacer1,
'desco_talla_al_nacer'=> $desco_talla_al_nacer1,
'lactamat'=> $lactamat,
'leche'=> $leche,
'otrosinfo'=> $this->input->post('otrosinfo'),
'traum_text'=> $this->input->post('traum_text'),
'trans_text'=> $this->input->post('trans_text'),
'ale'=> $ale,
'hep'=> $hep,
'amig'=> $amig,
'infv'=> $infv,
'asm'=> $asm,
'neum'=> $neum,
'cirug'=> $cirug, 
'otot'=> $otot,
'deng'=> $deng, 
'pape'=> $pape,
'diar'=> $diar, 
'paras'=> $paras,
'zika'=> $zika,
'saram'=> $saram, 
'chicun'=> $chicun, 
'varicela'=> $varicela,
'falc'=> $falc, 
'otros_t_text'=> $this->input->post('otros_t_text'),
'motor1'=> $this->input->post('textgrueso'),
'motor2'=> $this->input->post('textfino'),
'lenguaje'=> $this->input->post('textlenguage'),
'social'=> $this->input->post('textsocial'),
'maltratof'=> $this->input->post('textmaltrato'),
'abusos'=> $this->input->post('textabuso'),
'negligencia'=> $this->input->post('textneg'),
'maltrato'=> $this->input->post('maltratoemo'),
'inserted_by'=> $this->input->post('inserted_by'),
'hist_id'=> $this->input->post('hist_id'),
'inserted_time'=> $insert_date
);

$this->model_admin->savePedia($save);
$this->model_admin->DeleteEmptyPedia($this->input->post('hist_id'));

	
if(!empty($medicamento)){
foreach ($medicamento as $med) {
    
	$save= array(
	'medica' =>$med,
	'hist_id' => $this->input->post('hist_id')
	);
    
	$this->model_admin->SaveMedPed($save);
}
}
//---------------------Vacuna---------------------------

$save2= array(
'insert_d'=> $this->input->post('insert_d'),

'bcg1'=> $this->input->post('bcg1'),
'resf1'=> $this->input->post('resf1'),


'hepb1'=> $this->input->post('bcg2'),
'resf2'=> $this->input->post('resf2'),


'yel3'=> $this->input->post('yel3'),
'resf3'=> $this->input->post('resf3'),


'bl4'=> $this->input->post('bl4'),
'resf4'=> $this->input->post('resf4'),


'yel5'=> $this->input->post('yel5'),
'resf5'=> $this->input->post('resf5'),


'bl6'=> $this->input->post('bl6'),
'resf6'=> $this->input->post('resf6'),


'gr7'=> $this->input->post('gr7'),
'resf7'=> $this->input->post('resf7'),


'bll8'=> $this->input->post('bll8'),
'resf8'=> $this->input->post('resf8'),


'grr9'=> $this->input->post('grr9'),
'resf9'=> $this->input->post('resf9'),


'yel10'=> $this->input->post('yel10'),
'resf10'=> $this->input->post('resf10'),


'bl11'=> $this->input->post('bl11'),
'resf11'=> $this->input->post('resf11'),


'gr12'=> $this->input->post('gr12'),
'resf12'=> $this->input->post('resf12'),


'yel13'=> $this->input->post('yel13'),
'resf13'=> $this->input->post('resf13'),


'bl14'=> $this->input->post('bl14'),
'resf14'=> $this->input->post('resf14'),

'bll15'=> $this->input->post('bll15'),
'resf15'=> $this->input->post('resf15'),


'srp16'=> $this->input->post('srp16'),
'resf16'=> $this->input->post('resf16'),


'bll17'=> $this->input->post('bll17'),
'resf17'=> $this->input->post('resf17'),


'grr18'=> $this->input->post('grr18'),
'resf18'=> $this->input->post('resf18'),

'hist_id'=> $this->input->post('hist_id')
);

$this->model_admin->saveVacuna($save2);

//save enfermededad actual
 $saveEnf = array(
  'enf_motivo'=> $this->input->post('enf_motivo'),
  'signopsis'=> $this->input->post('enf_signopsis'),
  'laboratorios'=> $this->input->post('enf_laboratorios'),
  'estudios'=> $this->input->post('enf_estudios'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
  
   $this->model_admin->saveEnfermedad($saveEnf);
  
  //save rehabilitacion
  
  
  $save= array(
  'marcha_inicio'=> $this->input->post('marcha_inicio'),
  'long_mov_der'=> $this->input->post('long_mov_der'),
  'long_mov_izq'=> $this->input->post('long_mov_izq'),
  'long_simetria'=> $this->input->post('long_simetria'),
   'long_fluidez'=> $this->input->post('long_fluidez'),
  'long_traject'=> $this->input->post('long_traject'),
  'long_tronco'=> $this->input->post('long_tronco'),
  'long_postura'=> $this->input->post('long_postura'),
  'equi_sentado'=> $this->input->post('equi_sentado'),
  'equi_levantarse'=> $this->input->post('equi_levantarse'),
  'equi_intentos'=> $this->input->post('equi_intentos'),
  'equi_biped1'=> $this->input->post('equi_biped1'),
  'equi_biped2'=> $this->input->post('equi_biped2'),
   'equi_emp'=> $this->input->post('equi_emp'),
 'equi_ojos'=> $this->input->post('equi_ojos'),
 'equi_vuelta'=> $this->input->post('equi_vuelta'),
    'equi_sentarse'=> $this->input->post('equi_sentarse'),
 'eval_balsys'=> $this->input->post('eval_balsys'),
  'eval_movim'=> $this->input->post('eval_movim'),
   'eval_monop'=> $this->input->post('eval_monop'),
  'criteria_intens'=> $this->input->post('criteria_intens'),
  'criteria_cuidado1'=> $this->input->post('criteria_cuidado1'),
  'levantar_peso'=> $this->input->post('levantar_peso'),
  'criteria_caminar'=> $this->input->post('criteria_caminar'),
  'criteria_estar_sent'=> $this->input->post('criteria_estar_sent'),
   'criteria_dormir'=> $this->input->post('criteria_dormir'),
  'criteria_sexual'=> $this->input->post('criteria_sexual'),
    'criteria_vida'=> $this->input->post('criteria_vida'),
  'id_historial'=> $this->input->post('hist_id'),
   'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
  
 $this->model_admin->saveRehabilidad($save);
 $this->model_admin->DeleteEmptyRehab($this->input->post('hist_id'));
 
 
 //save examen fisico----------------------------------------------------------------
 
 
 
 $saveSigno = array(
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
'radio'=> $this->input->post('radio_signo'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
$this->model_admin->saveSignosVitales($saveSigno);
 $this->model_admin->DeleteEmptySignos($this->input->post('hist_id'));
//---------------------Save neurologico------------------------------------
$saveNeuro= array(
'neuro_s'=> $this->input->post('neuro_s'),
  'neuro_text'=> $this->input->post('neuro_text'),
  'cabeza'=> $this->input->post('cabeza'),
  'cabeza_text'=> $this->input->post('cabeza_text'),
  'cuello'=> $this->input->post('cuello'),
  'cuello_text'=> $this->input->post('cuello_text'),
  'abd_insp'=> $this->input->post('abd_insp'),
 'ausc'=> $this->input->post('ausc'),
  'perc'=> $this->input->post('perc'),
   'palpa'=> $this->input->post('palpa'),
  'ext_sup_text'=> $this->input->post('ext_sup_text'),
  'ext_sup'=> $this->input->post('ext_sup'),
  'torax'=> $this->input->post('torax'),
  'torax_text'=> $this->input->post('torax_text'),
  'ext_inf'=> $this->input->post('ext_inf'),
  'ext_inft'=> $this->input->post('ext_inft'),
  /*'utero_text'=> $this->input->post('utero_text'),
 'corazon_text'=> $this->input->post('corazon_text'),
  'pulmones_text'=> $this->input->post('pulmones_text'),
  'abdomen_text'=> $this->input->post('abdomen_text'),*/
   'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
  $this->model_admin->saveExamNeuro($saveNeuro);
//----------------------Examen de Ambas Mamas-----------------------
  $dataExamMama= array(
  'cuad_inf_ext1'=> $this->input->post('cuad_inf_ext1'),
  'mama_izq1'=> $this->input->post('mama_izq1'),
  'cuad_sup_ext1'=> $this->input->post('cuad_sup_ext1'),
  'cuad_inf_ext11'=> $this->input->post('cuad_inf_ext11'),
  'region_retro1'=> $this->input->post('region_retro1'),
  'region_areola_pezon1'=> $this->input->post('region_areola_pezon1'),
   'region_ax1'=> $this->input->post('region_ax1'),
  'cuad_inf_ext2'=> $this->input->post('cuad_inf_ext2'),
  'mama_izq2'=> $this->input->post('mama_izq2'),
  'cuad_sup_ext2'=> $this->input->post('cuad_sup_ext2'),
  'cuad_inf_ext22'=> $this->input->post('cuad_inf_ext22'),
  'region_retro2'=> $this->input->post('region_retro2'),
  'region_areola_pezon2'=> $this->input->post('region_areola_pezon2'),
   'region_ax2'=> $this->input->post('region_ax2'),
   'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
  $this->model_admin->saveExamAmbasMama($dataExamMama);
  
  //-----------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual-----------------------
  $data3= array(
  'especuloscopia'=> $this->input->post('especuloscopia'),
  'tacto_bima'=> $this->input->post('tacto_bima'),
  'cervix'=> $this->input->post('cervix'),
  'cervix_text'=> $this->input->post('cervix_text'),
  'utero_text'=> $this->input->post('utero_text'),
  'anexo_derecho_text'=> $this->input->post('anexo_derecho_text'),
  'anexo_iz_text'=> $this->input->post('anexo_iz_text'),
  'inspection_vulval'=> $this->input->post('inspection_vulval'),
  'inspection_vulval_text'=> $this->input->post('inspection_vulval_text'),
  'rectal_text'=> $this->input->post('rectal_text'),
  'rectal'=> $this->input->post('rectal'),
   'genitalm'=> $this->input->post('genitalm'),
  'genitalm_text'=> $this->input->post('genitalm_text'),
  'genitalf_text'=> $this->input->post('genitalf_text'),
   'genitalf'=> $this->input->post('genitalf'),
   'vagina'=> $this->input->post('vagina'),
   'vagina_text'=> $this->input->post('vagina_text'),
   'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date
   );
  $this->model_admin->saveExamenPelvic($data3);
  
  //save examen sistema
 
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
'historial_id'=>$this->input->post('hist_id'),
'inserted_by'=> $this->input->post('inserted_by'),
'inserted_time'=> $insert_date


);
$this->model_admin->saveExameneSistema($saveExamSis);
 $this->model_admin->DeleteEmptyExameneSistema($this->input->post('hist_id'));
//save conclusion diagnostic

 $saveConDia= array(
  'plan'=> $this->input->post('plan'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date,
  'updated_time'=> $insert_date
   );
   $this->model_admin->saveConclucionDiag($saveConDia);
   $last_id_con=$this->db->select('id_cdia')->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
//-------------------------------------------------------
  $diagno_def=$this->input->post('diagno_def');
  
  foreach ($diagno_def as $df) {
$savecd = array(
  'diagno_def'=> $df,
  'p_id'=>$this->input->post('hist_id'),
  'con_id_link'=> $last_id_con
  
 );
$this->model_admin->SaveConDef($savecd);
}
 //-------------------------------------------------------
   $procedimiento= $this->input->post('procedimiento');
     foreach ($procedimiento as $pro) {
$savecp = array(
  'procedimiento'=> $pro,
  'p_id'=>$this->input->post('hist_id'),
  'cond_id_link'=> $last_id_con
 );
$this->model_admin->SaveConPro($savecp);
}


//save control prenatal


$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
$this->model_admin->SaveConPrenatales($save);
//----------------------------------------------------
$save2 = array(
  'fecha'  => $this->input->post('fecha2cp'),
  'semana'  => $this->input->post('semana2'),
  'peso'=> $this->input->post('peso2'),
  'tension' => $this->input->post('tension2'),
  'tension11' => $this->input->post('tension22'),
  'alt' => $this->input->post('alt2'),
  'alt11' => $this->input->post('alt22'),
  'alt111' => $this->input->post('alt222'), 
  'fetal' => $this->input->post('fetal2'),
  'fetal11' => $this->input->post('fetal22'),
  'edema' => $this->input->post('edema2'),
  'edema11' => $this->input->post('edema22'),
  'otros' => $this->input->post('otros2cp'),
   'evolucion' => $this->input->post('evolucion2'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
$this->model_admin->SaveConPrenatales2($save2);
//-------------------------------------------------------

$save3 = array(
  'fecha'  => $this->input->post('fecha3cp'),
  'semana'  => $this->input->post('semana3'),
  'peso'=> $this->input->post('peso3'),
  'tension' => $this->input->post('tension3'),
  'tension11' => $this->input->post('tension33'),
  'alt' => $this->input->post('alt3'),
  'alt11' => $this->input->post('alt33'),
  'alt111' => $this->input->post('alt333'), 
  'fetal' => $this->input->post('fetal3'),
  'fetal11' => $this->input->post('fetal33'),
  'edema' => $this->input->post('edema3'),
  'edema11' => $this->input->post('edema33'),
  'otros' => $this->input->post('otros3'),
  'evolucion' => $this->input->post('evolucion3'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
$this->model_admin->SaveConPrenatales3($save3);
//----------------------------------------------------
$save4 = array(
  'fecha'  => $this->input->post('fecha4cp'),
  'semana'  => $this->input->post('semana4'),
  'peso'=> $this->input->post('peso4'),
  'tension' => $this->input->post('tension4'),
  'tension11' => $this->input->post('tension44'),
  'alt' => $this->input->post('alt4'),
  'alt11' => $this->input->post('alt44'),
  'alt111' => $this->input->post('alt444'), 
  'fetal' => $this->input->post('fetal4'),
  'fetal11' => $this->input->post('fetal44'),
  'edema' => $this->input->post('edema4'),
  'edema11' => $this->input->post('edema44'),
  'otros' => $this->input->post('otros4'),
  'evolucion' => $this->input->post('evolucion4'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales4($save4);
  //------------------------------------------------------------
  $save5 = array(
  'fecha'  => $this->input->post('fecha5'),
  'semana'  => $this->input->post('semana5'),
  'peso'=> $this->input->post('peso5'),
  'tension' => $this->input->post('tension5'),
  'tension11' => $this->input->post('tension55'),
  'alt' => $this->input->post('alt5'),
  'alt11' => $this->input->post('alt55'),
  'alt111' => $this->input->post('alt555'), 
  'fetal' => $this->input->post('fetal5'),
  'fetal11' => $this->input->post('fetal55'),
  'edema' => $this->input->post('edema5'),
  'edema11' => $this->input->post('edema55'),
  'otros' => $this->input->post('otros5'),
  'evolucion' => $this->input->post('evolucion5'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales5($save5);
  //--------------------------------------------------------
  
  $save6 = array(
  'fecha'  => $this->input->post('fecha6'),
  'semana'  => $this->input->post('semana6'),
  'peso'=> $this->input->post('peso6'),
  'tension' => $this->input->post('tension6'),
  'tension11' => $this->input->post('tension66'),
  'alt' => $this->input->post('alt6'),
  'alt11' => $this->input->post('alt66'),
  'alt111' => $this->input->post('alt666'), 
  'fetal' => $this->input->post('fetal6'),
  'fetal11' => $this->input->post('fetal66'),
  'edema' => $this->input->post('edema6'),
  'edema11' => $this->input->post('edema66'),
  'otros' => $this->input->post('otros6'),
  'evolucion' => $this->input->post('evolucion6'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales6($save6);
  //-----------------------------------------------------------
  $save7 = array(
  'fecha'  => $this->input->post('fecha7'),
  'semana'  => $this->input->post('semana7'),
  'peso'=> $this->input->post('peso7'),
  'tension' => $this->input->post('tension7'),
  'tension11' => $this->input->post('tension77'),
  'alt' => $this->input->post('alt7'),
  'alt11' => $this->input->post('alt77'),
  'alt111' => $this->input->post('alt777'), 
  'fetal' => $this->input->post('fetal7'),
  'fetal11' => $this->input->post('fetal77'),
  'edema' => $this->input->post('edema7'),
  'edema11' => $this->input->post('edema77'),
  'otros' => $this->input->post('otros7'),
  'evolucion' => $this->input->post('evolucion7'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales7($save7);
  //------------------------------------------------------
  $save8 = array(
  'fecha'  => $this->input->post('fecha8'),
  'semana'  => $this->input->post('semana8'),
  'peso'=> $this->input->post('peso8'),
  'tension' => $this->input->post('tension8'),
  'tension11' => $this->input->post('tension88'),
  'alt' => $this->input->post('alt8'),
  'alt11' => $this->input->post('alt88'),
  'alt111' => $this->input->post('alt888'), 
  'fetal' => $this->input->post('fetal8'),
  'fetal11' => $this->input->post('fetal88'),
  'edema' => $this->input->post('edema8'),
  'edema11' => $this->input->post('edema88'),
  'otros' => $this->input->post('otros8'),
  'evolucion' => $this->input->post('evolucion8'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales8($save8);
  //--------------------------------------------------
  $save9 = array(
  'fecha'  => $this->input->post('fecha9'),
  'semana'  => $this->input->post('semana9'),
  'peso'=> $this->input->post('peso9'),
  'tension' => $this->input->post('tension9'),
  'tension11' => $this->input->post('tension99'),
  'alt' => $this->input->post('alt9'),
  'alt11' => $this->input->post('alt99'),
  'alt111' => $this->input->post('alt999'), 
  'fetal' => $this->input->post('fetal9'),
  'fetal11' => $this->input->post('fetal99'),
  'edema' => $this->input->post('edema9'),
  'edema11' => $this->input->post('edema99'),
  'otros' => $this->input->post('otros9'),
  'evolucion' => $this->input->post('evolucion9'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales9($save9);
  
  $this->model_admin->deleteNingunoDroga();
  $this->model_admin->DeleteEmptyControlPrenatal1();
  $this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();


}


public function SaveUpContPren()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
   'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales1($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}





public function SaveUpContPren2()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales2($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}





public function SaveUpContPren3()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales3($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}






public function SaveUpContPren4()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales4($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}


public function SaveUpContPren5()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales5($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}


public function SaveUpContPren6()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales6($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}



public function SaveUpContPren7()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales7($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}



public function SaveUpContPren8()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales8($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}



public function SaveUpContPren9()
{
	$insert_date=date("Y-m-d H:i:s");
	$id = $this->input->post('id_c1');
	$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'updated_by' =>$this->input->post('updated_by'),
    'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveUpConPrenatales9($id,$save);
//----------------------------------------------------

   $this->model_admin->DeleteEmptyControlPrenatal1();
  /*$this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/
}







public function updateHabitosT(){
$id_patient= $this->input->post('hist_id');
$update_time=date("Y-m-d H:i:s");
$hab_t_drug=$this->input->post('hab_t_drug');
//--------HABITOS toxicos-----------------------------	
$save = array(
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
  'update_by'=> $this->input->post('modify_by'),
  'update_time'=> $update_time
   );
   $this->model_admin->updateHabitosToxicos($id_patient,$save);
    $last_id=$this->db->select('id')->order_by('id','desc')->limit(1)->get('h_c_habitos_toxicos')->row('id');
   //---------Edit droga------------------------
   $this->model_admin->deleteDrug($id_patient);
   if(!empty($hab_t_drug)){
   foreach ($hab_t_drug as $drug) {
	$save = array(
	  'name' => $drug,
	 'id_patient' => $id_patient
	 //'id_h_t' =>$last_id
	);
		$this->model_admin->SaveDrug($save);
	};
	}
	$this->model_admin->deleteNingunoDroga();
}


	 public function showMedicine()
{ $historial_id= $this->uri->segment(3);
	$data['patient_med'] = $this->model_admin->PatientMed($historial_id);
	$this->load->view('admin/historial-medical1/showMedicine', $data);
}




	 public function showAlegicos()
{ $historial_id= $this->uri->segment(3);
	$data['patient_alergicos'] = $this->model_admin->showAlegicos($historial_id);
	$this->load->view('admin/historial-medical1/showAlegicos', $data);
}








public function updateAntAl(){
$id_patient= $this->input->post('hist_id');
$update_time=date("Y-m-d H:i:s");
//--------HABITOS toxicos-----------------------------	
$save = array(
  'medicamentos'=> $this->input->post('medicamentos_al'),
  'alimentos'=> $this->input->post('alimentos_al'),
  'otros'=> $this->input->post('otros_al'),
 'update_by'=> $this->input->post('modify_by'),
  'update_time'=> $update_time
  );
$this->model_admin->updateAntAl($id_patient,$save);
}





public function updateViolencia(){
$id_patient= $this->input->post('hist_id');
$update_time=date("Y-m-d H:i:s");
$save = array(
'violencia1'=> $this->input->post('violencia1'),
'violencia2'=> $this->input->post('violencia2'),
'violencia3'=> $this->input->post('violencia3'),
'violencia4'=> $this->input->post('violencia4'),
'update_by'=> $this->input->post('modify_by'),
'update_time'=> $update_time
   );
   $this->model_admin->updateViolencia($id_patient,$save);
 
}







//-----update ante otros--------------
public function updateAnteOtros(){
$id_patient= $this->input->post('hist_id');
$selectmedic= $this->input->post('selectmedic');
$update_time=date("Y-m-d H:i:s");
$save = array(
'quirurgicos'=> $this->input->post('quirurgicos'),
'gineco'=> $this->input->post('gineco'),
'abdominal'=> $this->input->post('abdominal'),
'toracica'=> $this->input->post('toracica'),
'transfusion'=> $this->input->post('transfusion'),
'otros1'=> $this->input->post('otros1'),
'hepatis'=> $this->input->post('hepatis'),
'hpv'=> $this->input->post('hpv'),
'toxoide'=> $this->input->post('toxoide'),
'grouposang'=> $this->input->post('grouposang'),
'tipificacion'=> $this->input->post('tipificacion'),
'rh'=> $this->input->post('rh'),
'update_by'=> $this->input->post('modify_by'),
'update_time'=> $update_time
   );
   $this->model_admin->updateAnteOtros($id_patient,$save);
   
    $this->model_admin->deleteMed($id_patient);
	
   foreach ($selectmedic as $med) {
	$save = array(
	  'medicine' => $med,
	 'id_patient' => $id_patient
	);
		$this->model_admin->SaveMedicine($save);
	};
 
}
 
 
 
 
 

public function updateDesarollo(){
$id_patient= $this->input->post('hist_id');
$update_time=date("Y-m-d H:i:s");

//--------HABITOS toxicos-----------------------------	
$save = array(
'maltratof'=> $this->input->post('text_maltrato'),
'abusos'=> $this->input->post('text_abuso'),
'negligencia'=> $this->input->post('text_neg'),
'maltrato'=> $this->input->post('maltrato_emo'),
'update_by'=> $this->input->post('inserted_by'),
'historial_id'=> $this->input->post('hist_id'),
'update_time'=> $update_time
   );
   $this->model_admin->updateDesarollo($id_patient,$save);
   
 
}
 
 
 
 
 public function updateMarquePos(){
$id_patient= $this->input->post('hist_id');
$update_time=date("Y-m-d H:i:s");
//---------------------------------------------------
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
//---------------------------------------------------------------------
$save = array(
//'todo'=> $todo_check1,
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
'date_modif'=> $update_time,
'update_by'=> $this->input->post('modify_by')
);
$this->model_admin->UpdateMarquePositivo($id_patient,$save);
}
 
 
 
 
 


public function saveAntssr()
{

$insert_date=date("Y-m-d H:i:s");

$sifilisc= $this->input->post('sifilisc');
$sifilisc1 = (isset($sifilisc)) ? 1 : 0;

$gonorreac= $this->input->post('gonorreac');
$gonorreac1 = (isset($gonorreac)) ? 1 : 0;

$clamidiac= $this->input->post('clamidiac');
$clamidiac1 = (isset($clamidiac)) ? 1 : 0;

$save2= array(
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
'hist_id'=>$this->input->post('hist_id'),
'infeccion1'=>$sifilisc1,
'infeccion2'=>$gonorreac1,
'infeccion3'=> $clamidiac1,
 'date_time'=> $insert_date,
'infec_tran'=> $this->input->post('infec_tran'),
'inserted_by'=> $this->input->post('inserted_by'),
'updated_by'=> $this->input->post('inserted_by'),
'update_time'=> $insert_date
);
$this->model_admin->saveAntssr($save2);

}
 
 
 public function saveObstetrico()
{
$insert_date=date("Y-m-d H:i:s");

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
'inf'=> $this->input->post('inf'),
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
'hist_id'=> $this->input->post('hist_id'),
'inserted_by'=> $this->input->post('inserted_by'),
'inserted_time'=> $insert_date,
'updated_by'=> $this->input->post('inserted_by'),
'updated_time'=> $insert_date
);

$this->model_admin->saveObstetrico1($save);

//-----------------------------------------------------
$save= array(
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
'hist_id'=> $this->input->post('hist_id')
);

$this->model_admin->saveObstetrico2($save); 


//-----------------------------------------------------
$vdrl11= $this->input->post('vdrl11');
$vdrl1 = (isset($vdrl11)) ? 1 : 0;
$vdrl22= $this->input->post('vdrl22');
$vdrl2 = (isset($vdrl22)) ? 1 : 0;


$save= array(
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
'prev_act'=> $this->input->post('prev_act'),
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
'hist_id'=> $this->input->post('hist_id')  
);

$this->model_admin->saveObstetrico3($save);

//-----------------------------------------------
$save= array(
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
'hist_id'=> $this->input->post('hist_id')
);

$this->model_admin->saveObstetrico4($save);	

}




public function savePediatrico()
{
$historial_id= $this->input->post('hist_id');
$insert_date=date("Y-m-d H:i:s");
$medicamento= $this->input->post('med');
$ale1= $this->input->post('ale1');
$ale = (isset($ale1)) ? 1 : 0;

$hep1= $this->input->post('hep1');
$hep = (isset($hep1)) ? 1 : 0;

$amig1= $this->input->post('amig1');
$amig = (isset($amig1)) ? 1 : 0;

$infv1= $this->input->post('infv1');
$infv = (isset($infv1)) ? 1 : 0;

$asm1 = $this->input->post('asm1');
$asm  = (isset($asm1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$neum1 = $this->input->post('neum1');
$neum  = (isset($neum1)) ? 1 : 0;

$nig1 = $this->input->post('nig1');
$nig  = (isset($nig1)) ? 1 : 0;

$cirug1 = $this->input->post('cirug1');
$cirug  = (isset($cirug1)) ? 1 : 0;

$otot1 = $this->input->post('otot1');
$otot  = (isset($otot1)) ? 1 : 0;

$deng1 = $this->input->post('deng1');
$deng  = (isset($deng1)) ? 1 : 0;

$pape1 = $this->input->post('pape1');
$pape  = (isset($pape1)) ? 1 : 0;


$diar1 = $this->input->post('diar1');
$diar  = (isset($diar1)) ? 1 : 0;

$paras1 = $this->input->post('paras1');
$paras  = (isset($paras1)) ? 1 : 0;


$zika1 = $this->input->post('zika1');
$zika  = (isset($zika1)) ? 1 : 0;


$saram1 = $this->input->post('saram1');
$saram  = (isset($saram1)) ? 1 : 0;


$chicun1 = $this->input->post('chicun1');
$chicun  = (isset($chicun1)) ? 1 : 0;


$varicela1 = $this->input->post('varicela1');
$varicela  = (isset($varicela1)) ? 1 : 0;

$falc1 = $this->input->post('falc1');
$falc  = (isset($falc1)) ? 1 : 0;

$desco_peso_al_nacer = $this->input->post('desco_peso_al_nacer');
$desco_peso_al_nacer1  = (isset($desco_peso_al_nacer)) ? 1 : 0;

$desco_talla_al_nacer = $this->input->post('desco_talla_al_nacer');
$desco_talla_al_nacer1  = (isset($desco_talla_al_nacer)) ? 1 : 0;

$lactamat1 = $this->input->post('lactamat1');
$lactamat  = (isset($lactamat1)) ? 1 : 0;

$leche1 = $this->input->post('leche1');
$leche  = (isset($leche1)) ? 1 : 0;
$id = $this->input->post('idpedia');

$save3= array(
'evo'=> $this->input->post('evo'),
'evol_text'=> $this->input->post('evol_text'),
'tnaci'=> $this->input->post('tnaci'),
'describa'=> $this->input->post('describa'),
'edad_gest'=> $this->input->post('edad_gest'),
'peso'=> $this->input->post('pesopd'),
'talla'=> $this->input->post('talla'),
'desco_peso_al_nacer'=> $desco_peso_al_nacer1,
'desco_talla_al_nacer'=> $desco_talla_al_nacer1,
'lactamat'=> $lactamat,
'leche'=> $leche,
'otrosinfo'=> $this->input->post('otrosinfo'),
'traum_text'=> $this->input->post('traum_text'),
'trans_text'=> $this->input->post('trans_text'),
'ale'=> $ale,
'hep'=> $hep,
'amig'=> $amig,
'infv'=> $infv,
'asm'=> $asm,
'neum'=> $neum,
'cirug'=> $cirug, 
'otot'=> $otot,
'deng'=> $deng, 
'pape'=> $pape,
'diar'=> $diar, 
'paras'=> $paras,
'zika'=> $zika,
'saram'=> $saram, 
'chicun'=> $chicun, 
'varicela'=> $varicela,
'falc'=> $falc, 
'otros_t_text'=> $this->input->post('otros_t_text'),
'motor1'=> $this->input->post('textgrueso'),
'motor2'=> $this->input->post('textfino'),
'lenguaje'=> $this->input->post('textlenguage'),
'social'=> $this->input->post('textsocial'),
'maltratof'=> $this->input->post('textmaltrato'),
'abusos'=> $this->input->post('textabuso'),
'negligencia'=> $this->input->post('textneg'),
'maltrato'=> $this->input->post('maltratoemo'),
'inserted_by'=> $this->input->post('inserted_by'),
'updated_by'=> $this->input->post('inserted_by'),
'hist_id'=> $historial_id,
'updated_time'=> $insert_date,
'inserted_time'=> $insert_date
  		 
);

$this->model_admin->savePedia($save3);
 $last_id=$this->db->select('id')->order_by('id','desc')->limit(1)->get('h_c_ant_pedia')->row('id');
//$this->model_admin->deleteAllMedPed($historial_id);
if(!empty($medicamento)){
foreach ($medicamento as $med) {
    
	$save= array(
	'medica' =>$med,
	'hist_id' => $historial_id,
	'id_pedia' => $last_id
	);
    
	$this->model_admin->SaveMedPed($save);
}
}
$val="ninguno";
$this->model_admin->DeleteMedP($val);
//---------------------Vacuna---------------------------

$save4= array(
'insert_d'=> $this->input->post('insert_d'),
'bcg1'=> $this->input->post('bcg1'),
'resf1'=> $this->input->post('resf1'),

'hepb1'=> $this->input->post('bcg2'),
'resf2'=> $this->input->post('resf2'),


'yel3'=> $this->input->post('yel3'),
'resf3'=> $this->input->post('resf3'),

'bl4'=> $this->input->post('bl4'),
'resf4'=> $this->input->post('resf4'),

'yel5'=> $this->input->post('yel5'),
'resf5'=> $this->input->post('resf5'),

'bl6'=> $this->input->post('bl6'),
'resf6'=> $this->input->post('resf6'),

'gr7'=> $this->input->post('gr7'),
'resf7'=> $this->input->post('resf7'),

'bll8'=> $this->input->post('bll8'),
'resf8'=> $this->input->post('resf8'),

'grr9'=> $this->input->post('grr9'),
'resf9'=> $this->input->post('resf9'),

'yel10'=> $this->input->post('yel10'),
'resf10'=> $this->input->post('resf10'),

'bl11'=> $this->input->post('bl11'),
'resf11'=> $this->input->post('resf11'),

'gr12'=> $this->input->post('gr12'),
'resf12'=> $this->input->post('resf12'),

'yel13'=> $this->input->post('yel13'),
'resf13'=> $this->input->post('resf13'),

'bl14'=> $this->input->post('bl14'),
'resf14'=> $this->input->post('resf14'),

'bll15'=> $this->input->post('bll15'),
'resf15'=> $this->input->post('resf15'),

'srp16'=> $this->input->post('srp16'),
'resf16'=> $this->input->post('resf16'),

'bll17'=> $this->input->post('bll17'),
'resf17'=> $this->input->post('resf17'),
'hist_id'=> $historial_id,
'grr18'=> $this->input->post('grr18'),
'resf18'=> $this->input->post('resf18')

);

$this->model_admin->saveVacuna($save4);


}
 




public function SaveEnfermedad()
{

	$insert_date=date("Y-m-d H:i:s");
$saveEnf = array(
  'enf_motivo'=> $this->input->post('enf_motivo'),
  'signopsis'=> $this->input->post('enf_signopsis'),
  'laboratorios'=> $this->input->post('enf_laboratorios'),
  'estudios'=> $this->input->post('enf_estudios'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date,
   'updated_by'=> $this->input->post('inserted_by'),
  'updated_time'=> $insert_date
  );
  
   $this->model_admin->saveEnfermedad($saveEnf);
 }








public function saveRehabilidad()
{
	$insert_date=date("Y-m-d H:i:s");
  $save= array(
  'marcha_inicio'=> $this->input->post('marcha_inicio'),
  'long_mov_der'=> $this->input->post('long_mov_der'),
  'long_mov_izq'=> $this->input->post('long_mov_izq'),
  'long_simetria'=> $this->input->post('long_simetria'),
   'long_fluidez'=> $this->input->post('long_fluidez'),
  'long_traject'=> $this->input->post('long_traject'),
  'long_tronco'=> $this->input->post('long_tronco'),
  'long_postura'=> $this->input->post('long_postura'),
  'equi_sentado'=> $this->input->post('equi_sentado'),
  'equi_levantarse'=> $this->input->post('equi_levantarse'),
  'equi_intentos'=> $this->input->post('equi_intentos'),
  'equi_biped1'=> $this->input->post('equi_biped1'),
  'equi_biped2'=> $this->input->post('equi_biped2'),
   'equi_emp'=> $this->input->post('equi_emp'),
 'equi_ojos'=> $this->input->post('equi_ojos'),
 'equi_vuelta'=> $this->input->post('equi_vuelta'),
    'equi_sentarse'=> $this->input->post('equi_sentarse'),
 'eval_balsys'=> $this->input->post('eval_balsys'),
  'eval_movim'=> $this->input->post('eval_movim'),
   'eval_monop'=> $this->input->post('eval_monop'),
  'criteria_intens'=> $this->input->post('criteria_intens'),
  'criteria_cuidado1'=> $this->input->post('criteria_cuidado1'),
  'levantar_peso'=> $this->input->post('levantar_peso'),
  'criteria_caminar'=> $this->input->post('criteria_caminar'),
  'criteria_estar_sent'=> $this->input->post('criteria_estar_sent'),
   'criteria_dormir'=> $this->input->post('criteria_dormir'),
  'criteria_sexual'=> $this->input->post('criteria_sexual'),
    'criteria_vida'=> $this->input->post('criteria_vida'),
  'id_historial'=> $this->input->post('hist_id'),
   'inserted_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date,
  'updated_time'=> $insert_date,
  'updated_by'=> $this->input->post('inserted_by') 
   );
  
 $this->model_admin->saveRehabilidad($save);
 }
 
 
 
 




 
 
  public function SaveExamenFisico(){

$insert_date=date("Y-m-d H:i:s");
//-----------Save signo-----------------------
$saveSigno = array(
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
'radio'=> $this->input->post('radio_signo'),
  'updated_by'=> $this->input->post('inserted_by'),
   'inserted_by'=> $this->input->post('inserted_by'),
  'historial_id'=> $this->input->post('hist_id'),
  'updated_time'=> $insert_date,
 'inserted_time'=> $insert_date,
 
   );
$this->model_admin->saveSignosVitales($saveSigno);
//---------------------Save neurologico------------------------------------
$saveNeuro= array(
'neuro_s'=> $this->input->post('neuro_s'),
  'neuro_text'=> $this->input->post('neuro_text'),
  'cabeza'=> $this->input->post('cabeza'),
  'cabeza_text'=> $this->input->post('cabeza_text'),
  'cuello'=> $this->input->post('cuello'),
  'cuello_text'=> $this->input->post('cuello_text'),
  'abd_insp'=> $this->input->post('abd_insp'),
 'ausc'=> $this->input->post('ausc'),
  'perc'=> $this->input->post('perc'),
   'palpa'=> $this->input->post('palpa'),
  'ext_sup_text'=> $this->input->post('ext_sup_text'),
  'ext_sup'=> $this->input->post('ext_sup'),
  'torax'=> $this->input->post('torax'),
  'torax_text'=> $this->input->post('torax_text'),
  'ext_inf'=> $this->input->post('ext_inf'),
  'ext_inft'=> $this->input->post('ext_inft'),
   'historial_id'=> $this->input->post('hist_id')
  );
  $this->model_admin->saveExamNeuro($saveNeuro);
//----------------------Examen de Ambas Mamas-----------------------
  $dataExamMama= array(
  'cuad_inf_ext1'=> $this->input->post('cuad_inf_ext1'),
  'mama_izq1'=> $this->input->post('mama_izq1'),
  'cuad_sup_ext1'=> $this->input->post('cuad_sup_ext1'),
  'cuad_inf_ext11'=> $this->input->post('cuad_inf_ext11'),
  'region_retro1'=> $this->input->post('region_retro1'),
  'region_areola_pezon1'=> $this->input->post('region_areola_pezon1'),
   'region_ax1'=> $this->input->post('region_ax1'),
  'cuad_inf_ext2'=> $this->input->post('cuad_inf_ext2'),
  'mama_izq2'=> $this->input->post('mama_izq2'),
  'cuad_sup_ext2'=> $this->input->post('cuad_sup_ext2'),
  'cuad_inf_ext22'=> $this->input->post('cuad_inf_ext22'),
  'region_retro2'=> $this->input->post('region_retro2'),
  'region_areola_pezon2'=> $this->input->post('region_areola_pezon2'),
   'region_ax2'=> $this->input->post('region_ax2'),
   'historial_id'=> $this->input->post('hist_id')

   );
  $this->model_admin->saveExamAmbasMama($dataExamMama);
  
  //-----------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual-----------------------
  $data3= array(
  'especuloscopia'=> $this->input->post('especuloscopia'),
  'tacto_bima'=> $this->input->post('tacto_bima'),
  'cervix'=> $this->input->post('cervix'),
  'cervix_text'=> $this->input->post('cervix_text'),
  'utero_text'=> $this->input->post('utero_text'),
  'anexo_derecho_text'=> $this->input->post('anexo_derecho_text'),
  'anexo_iz_text'=> $this->input->post('anexo_iz_text'),
  'inspection_vulval'=> $this->input->post('inspection_vulval'),
  'inspection_vulval_text'=> $this->input->post('inspection_vulval_text'),
  'rectal_text'=> $this->input->post('rectal_text'),
  'rectal'=> $this->input->post('rectal'),
   'genitalm'=> $this->input->post('genitalm'),
  'genitalm_text'=> $this->input->post('genitalm_text'),
  'genitalf_text'=> $this->input->post('genitalf_text'),
   'genitalf'=> $this->input->post('genitalf'),
   'vagina'=> $this->input->post('vagina'),
   'vagina_text'=> $this->input->post('vagina_text'),
   'historial_id'=> $this->input->post('hist_id')
   );
  $this->model_admin->saveExamenPelvic($data3);
  }





   public function SaveExamSis()
{ 

	$insert_date=date("Y-m-d H:i:s");
  
    $save= array(
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
'historial_id'=>$this->input->post('hist_id'),
'inserted_by'=> $this->input->post('inserted_by'),
'updated_by'=> $this->input->post('inserted_by'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date

);
$this->model_admin->saveExameneSistema($save);
}







   public function SaveConD()
{ 

	$insert_date=date("Y-m-d H:i:s");
 $saveConDia= array(
  'plan'=> $this->input->post('plan'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('inserted_by'),
  'updated_by'=> $this->input->post('inserted_by'),
  'inserted_time'=> $insert_date,
  'updated_time'=> $insert_date,
  
   );
   $this->model_admin->saveConclucionDiag($saveConDia);
   $last_id_con=$this->db->select('id_cdia')->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
//-------------------------------------------------------
  $diagno_def=$this->input->post('diagno_def');
  
  foreach ($diagno_def as $df) {
$savecd = array(
  'diagno_def'=> $df,
  'p_id'=>$this->input->post('hist_id'),
  'con_id_link'=> $last_id_con
  
 );
$this->model_admin->SaveConDef($savecd);
}
 //-------------------------------------------------------
   $procedimiento= $this->input->post('procedimiento');
     foreach ($procedimiento as $pro) {
$savecp = array(
  'procedimiento'=> $pro,
  'p_id'=>$this->input->post('hist_id'),
  'cond_id_link'=> $last_id_con
 );
$this->model_admin->SaveConPro($savecp);
}
}












//save control prenatal
   public function SaveConPrena()
{ 
$insert_date=date("Y-m-d H:i:s");
$save = array(
  'fecha'  => $this->input->post('fecha'),
  'semana'  => $this->input->post('semana'),
  'peso'=> $this->input->post('pesocp'),
  'tension' => $this->input->post('tension1'),
  'tension11' => $this->input->post('tension11'),
  'alt' => $this->input->post('alt1'),
  'alt11' => $this->input->post('alt11'),
  'alt111' => $this->input->post('alt111'), 
  'fetal' => $this->input->post('fetal1'),
  'fetal11' => $this->input->post('fetal11'),
  'edema' => $this->input->post('edema1'),
  'edema11' => $this->input->post('edema11'),
  'otros' => $this->input->post('otroscp'),
  'evolucion' => $this->input->post('evolucion'),
  'inserted_by' => $this->input->post('inserted_by'),
  'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
  'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date 
 
  );
$this->model_admin->SaveConPrenatales($save);
//----------------------------------------------------
$save2 = array(
  'fecha'  => $this->input->post('fecha2cp'),
  'semana'  => $this->input->post('semana2'),
  'peso'=> $this->input->post('peso2'),
  'tension' => $this->input->post('tension2'),
  'tension11' => $this->input->post('tension22'),
  'alt' => $this->input->post('alt2'),
  'alt11' => $this->input->post('alt22'),
  'alt111' => $this->input->post('alt222'), 
  'fetal' => $this->input->post('fetal2'),
  'fetal11' => $this->input->post('fetal22'),
  'edema' => $this->input->post('edema2'),
  'edema11' => $this->input->post('edema22'),
  'otros' => $this->input->post('otros2cp'),
   'evolucion' => $this->input->post('evolucion2'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date 
 
  );
$this->model_admin->SaveConPrenatales2($save2);
//-------------------------------------------------------

$save3 = array(
  'fecha'  => $this->input->post('fecha3cp'),
  'semana'  => $this->input->post('semana3'),
  'peso'=> $this->input->post('peso3'),
  'tension' => $this->input->post('tension3'),
  'tension11' => $this->input->post('tension33'),
  'alt' => $this->input->post('alt3'),
  'alt11' => $this->input->post('alt33'),
  'alt111' => $this->input->post('alt333'), 
  'fetal' => $this->input->post('fetal3'),
  'fetal11' => $this->input->post('fetal33'),
  'edema' => $this->input->post('edema3'),
  'edema11' => $this->input->post('edema33'),
  'otros' => $this->input->post('otros3'),
  'evolucion' => $this->input->post('evolucion3'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveConPrenatales3($save3);
//----------------------------------------------------
$save4 = array(
  'fecha'  => $this->input->post('fecha4cp'),
  'semana'  => $this->input->post('semana4'),
  'peso'=> $this->input->post('peso4'),
  'tension' => $this->input->post('tension4'),
  'tension11' => $this->input->post('tension44'),
  'alt' => $this->input->post('alt4'),
  'alt11' => $this->input->post('alt44'),
  'alt111' => $this->input->post('alt444'), 
  'fetal' => $this->input->post('fetal4'),
  'fetal11' => $this->input->post('fetal44'),
  'edema' => $this->input->post('edema4'),
  'edema11' => $this->input->post('edema44'),
  'otros' => $this->input->post('otros4'),
  'evolucion' => $this->input->post('evolucion4'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales4($save4);
  //------------------------------------------------------------
  $save5 = array(
  'fecha'  => $this->input->post('fecha5'),
  'semana'  => $this->input->post('semana5'),
  'peso'=> $this->input->post('peso5'),
  'tension' => $this->input->post('tension5'),
  'tension11' => $this->input->post('tension55'),
  'alt' => $this->input->post('alt5'),
  'alt11' => $this->input->post('alt55'),
  'alt111' => $this->input->post('alt555'), 
  'fetal' => $this->input->post('fetal5'),
  'fetal11' => $this->input->post('fetal55'),
  'edema' => $this->input->post('edema5'),
  'edema11' => $this->input->post('edema55'),
  'otros' => $this->input->post('otros5'),
  'evolucion' => $this->input->post('evolucion5'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales5($save5);
  //--------------------------------------------------------
  
  $save6 = array(
  'fecha'  => $this->input->post('fecha6'),
  'semana'  => $this->input->post('semana6'),
  'peso'=> $this->input->post('peso6'),
  'tension' => $this->input->post('tension6'),
  'tension11' => $this->input->post('tension66'),
  'alt' => $this->input->post('alt6'),
  'alt11' => $this->input->post('alt66'),
  'alt111' => $this->input->post('alt666'), 
  'fetal' => $this->input->post('fetal6'),
  'fetal11' => $this->input->post('fetal66'),
  'edema' => $this->input->post('edema6'),
  'edema11' => $this->input->post('edema66'),
  'otros' => $this->input->post('otros6'),
  'evolucion' => $this->input->post('evolucion6'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales6($save6);
  //-----------------------------------------------------------
  $save7 = array(
  'fecha'  => $this->input->post('fecha7'),
  'semana'  => $this->input->post('semana7'),
  'peso'=> $this->input->post('peso7'),
  'tension' => $this->input->post('tension7'),
  'tension11' => $this->input->post('tension77'),
  'alt' => $this->input->post('alt7'),
  'alt11' => $this->input->post('alt77'),
  'alt111' => $this->input->post('alt777'), 
  'fetal' => $this->input->post('fetal7'),
  'fetal11' => $this->input->post('fetal77'),
  'edema' => $this->input->post('edema7'),
  'edema11' => $this->input->post('edema77'),
  'otros' => $this->input->post('otros7'),
  'evolucion' => $this->input->post('evolucion7'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales7($save7);
  //------------------------------------------------------
  $save8 = array(
  'fecha'  => $this->input->post('fecha8'),
  'semana'  => $this->input->post('semana8'),
  'peso'=> $this->input->post('peso8'),
  'tension' => $this->input->post('tension8'),
  'tension11' => $this->input->post('tension88'),
  'alt' => $this->input->post('alt8'),
  'alt11' => $this->input->post('alt88'),
  'alt111' => $this->input->post('alt888'), 
  'fetal' => $this->input->post('fetal8'),
  'fetal11' => $this->input->post('fetal88'),
  'edema' => $this->input->post('edema8'),
  'edema11' => $this->input->post('edema88'),
  'otros' => $this->input->post('otros8'),
  'evolucion' => $this->input->post('evolucion8'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales8($save8);
  //--------------------------------------------------
  $save9 = array(
  'fecha'  => $this->input->post('fecha9'),
  'semana'  => $this->input->post('semana9'),
  'peso'=> $this->input->post('peso9'),
  'tension' => $this->input->post('tension9'),
  'tension11' => $this->input->post('tension99'),
  'alt' => $this->input->post('alt9'),
  'alt11' => $this->input->post('alt99'),
  'alt111' => $this->input->post('alt999'), 
  'fetal' => $this->input->post('fetal9'),
  'fetal11' => $this->input->post('fetal99'),
  'edema' => $this->input->post('edema9'),
  'edema11' => $this->input->post('edema99'),
  'otros' => $this->input->post('otros9'),
  'evolucion' => $this->input->post('evolucion9'),
  'inserted_by' => $this->input->post('inserted_by'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
   'updated_by' => $this->input->post('inserted_by'),
 'updated_time'=> $insert_date
 
  );
  $this->model_admin->SaveConPrenatales9($save9);
  
 /* $this->model_admin->DeleteEmptyControlPrenatal2();
  $this->model_admin->DeleteEmptyControlPrenatal3();
  $this->model_admin->DeleteEmptyControlPrenatal4();
  $this->model_admin->DeleteEmptyControlPrenatal5();
  $this->model_admin->DeleteEmptyControlPrenatal6();
  $this->model_admin->DeleteEmptyControlPrenatal7();
  $this->model_admin->DeleteEmptyControlPrenatal8();
  $this->model_admin->DeleteEmptyControlPrenatal9();*/

}




public function SaveFormIndicaciones(){
$insert_date=date("Y-m-d H:i:s");
$historial_id=$this->input->post('historial_id');
$farmacia_id = $this->input->post('farmacia');
$branch_id = $this->input->post('branch');
$save = array(
'medica'=> $this->input->post('medicamento1'),
'presentacion'=> $this->input->post('presentacion'),
'frecuencia'=> $this->input->post('frecuencia'),
'cantidad' => $this->input->post('cantidad'),
'via' => $this->input->post('via'),
'operator' => $this->input->post('operator'),
'farmacia' => $farmacia_id, 
'branch' => $branch_id,
'insert_date'=> $insert_date,
'historial_id' => $historial_id,
'singular_id'=>1
);


$this->model_admin->SaveFormIndicaciones($save);
/*$data['IndicacionesPrevias'] = $this->model_admin->IndicacionesPrevias($historial_id);
$data['historial_id'] =$historial_id;
$data['num_count']=$this->model_admin->hist_count($historial_id);
	$data['singularid'] = $this->model_admin->Singularid();
$data['count_singular']=$this->model_admin->Countsingular();
$this->load->view('admin/historial-medical1/recetas/NewIndicationOne', $data);*/
}

public function new_indication()

{  $data['historial_id']=$this->input->post('historial_id');
   $data['count_singular']=$this->model_admin->Countsingular();
	$data['singularid'] = $this->model_admin->Singularid();
	$this->load->view('admin/historial-medical1/recetas/NewIndicationOne', $data);
}

public function allRecetas()

{ 
  $data['tot']=$this->model_admin->hist_count_recetas($this->input->post('historial_id'));
	$data['IndicacionesPrevias'] = $this->model_admin->IndicacionesPrevias($this->input->post('historial_id'));
	$this->load->view('admin/historial-medical1/recetas/all-patients-recetas', $data);
}




public function getSuc()
{
	$id_esp=$this->input->post('id_esp');
	$data['branches'] = $this->model_admin->branches1($id_esp);
	$this->load->view('admin/getSuc', $data);
	 //echo json_encode ($query);
}



public function DeleteHistLab(){
$id_lab  = $this->input->post('id');
$historial_id  = $this->input->post('historial_id_l');
$query = $this->model_admin->DeleteHistLab($id_lab);

}



public function DeleteRecetas(){
$id_lab  = $this->input->post('id');
$query = $this->model_admin->DeleteRecetas($id_lab);

}







public function SaveFormIndicacionesEstudios(){
$historial_id =$this->input->post('historial_id_es');
$insert_date=date("Y-m-d H:i:s");
$save = array(
  'estudio'=> $this->input->post('estudios'),
  'cuerpo'=> $this->input->post('cuerpo'),
  'lateralidad' => $this->input->post('lateralidad'),
  'observacion' => $this->input->post('observaciones'),
'historial_id' => $historial_id,  
  'operator' => $this->input->post('operators'),
 'insert_date'=> $insert_date
 
  );
$this->model_admin->SaveFormIndicacionesEstudios($save);
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);
$this->load->view('admin/historial-medical1/estudios/NewIndicationEs', $data);

}



public function allEstudios()
{ 
$historial_id  = $this->input->post('historial_id');
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);

$this->load->view('admin/historial-medical1/estudios/NewIndicationEs',$data);
}

 
 
 
 public function DeleteEsudios(){
$id_lab  = $this->input->post('id');
$query = $this->model_admin->DeleteEsudios($id_lab);

}










public function SaveFormIndicacionesLab(){
$laboratorios = $this->input->post('laboratorios');	
$operatorl = $this->input->post('operatorl');	
$historial_id = $this->input->post('historial_id_l');	
$insert_date=date("Y-m-d H:i:s");

foreach ($laboratorios as $lab) {
$save = array(
  'laboratory'  => $lab,
  'operator'=> $this->input->post('operatorl'),
  'historial_id' => $historial_id,
 'insert_time'=> $insert_date
 
  );
$this->model_admin->SaveFormIndicacionesLab($save);
}


}


public function allLaboratorios()
{ 
$historial_id  = $this->input->post('historial_id');
$data['IndicacionesLab'] = $this->model_admin->IndicacionesLab($historial_id);
$data['num_count_lab']=$this->model_admin->hist_count_lab($historial_id);
$this->load->view('admin/historial-medical1/laboratorios/NewIndicationLab', $data);
}



public function allLaboratoriosInd()
{ 
$data['id_historial'] = $this->input->post('historial_id');
$data['laboratories'] = $this->model_admin->laboratories();
$this->load->view('admin/historial-medical1/laboratorios/allLaboratoriosInd', $data);
}




public function seguro_name()
{
	$seguro_medico_id=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico_id)->get('seguro_medico')->row('title');;
	$data['seguro_medico'] =$sm;
	$query = $this->model_admin->get_input($seguro_medico_id);
	$data['GET_INPUT'] =$query;
	$this->load->view('admin/pacientes-citas/get-seguro-codigo', $data);
	 //echo json_encode ($query);
}


public function save_patients_appointments(){
$id_u = $this->input->post('id_user');

$this->session->set_userdata('id_u', $id_u);	

$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
if(isset($_FILES["picture"]['name']))  
{	
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);  
$logo = rand() . '.' . $extension[1];  
$destination = './assets/img/patients-pictures/' . $logo;		
move_uploaded_file($_FILES['picture']['tmp_name'], $destination); 

if($imgExt==""){
	$logo="";
}
}
$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  =>$logo,
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
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'), 
   'responsable_legal' => $this->input->post('responsable_legal'), 
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$this->model_admin->save_patient($save1);
//------------------------------------------------------------
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');

 $saveN = array(
'nec1'  => "NEC-$last_patient_id"
);

$this->model_admin->insert_nec($last_patient_id,$saveN);
//------------------------------------------------------------
 $save2 = array(
'nec'=> "NEC-$last_patient_id",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' => $last_patient_id, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date
   );
$this->model_admin->save_rendevous($save2);
//--------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$last_patient_id,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);
    
	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/create_cita');
redirect('admin_medico/redirect_after_save_cita_');

}

public function redirect_after_save_cita_()
{

$id_u=($this->session->userdata['id_u']);
	$user=$this->db->select('name,perfil')->where('id_user',$id_u)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
	$data['id_user'] = $id_u ;
$this->load->view('admin/pacientes-citas/header_cita',$data);
$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('admin/pacientes-citas/create-cita',$data );
$this->load->view('admin/pacientes-citas/after-cita-save');
	
}

public function search_patient_tutor()
{
$id_patient=$this->input->get('id_patient');
$data['id_patient']=$id_patient;
$if_relacion_exist=$this->db->select('relacion')->where('id_nino',$id_patient)->get('tutor')->row('relacion');

$sql ="SELECT name FROM relationship WHERE name NOT IN (SELECT relacion FROM tutor where id_nino=$id_patient)";
$query = $this->db->query($sql);
$data['query']=$query;
$data['patient_tutors']=$this->model_admin->search_patient_tutor($this->input->get('nec')); 
$this->load->view('admin/pacientes-citas/patient-tutor-result',$data);

}


 public function save_tutor()
{
$name_tutor= $this->input->post('name_tutor');	
$id_tutor= $this->input->post('id_tutor');
$id_nino= $this->input->post('id_nino');

$del= array(
 'id_nino'=> $id_nino,
 'id_tutor'=> $id_tutor
);
$result=$this->model_admin->check_if_tutor_exist($del);
if($result > 0 )
{
echo "Este NEC apartence a $name_tutor, es ya un tutor.";

} else {	
$save= array(
  'id_nino'=> $id_nino,
  'id_tutor'=> $id_tutor,
   'relacion'=> $this->input->post('relacionf'),
   'name_tutor'=> $name_tutor
   );
    $this->model_admin->saveTutor($save);
	echo "Tutor se agrega con éxito !";
}

$dup= array(
 'id_nino'=> $id_nino,
 'id_tutor'=> $id_tutor,
 'relacion'=> $this->input->post('relacionf')
);
//$this->model_admin->delete_duplicate_tutor($dup);


}



public function check_if_cedula_exist()
{
$query = $this->db->get_where('patients_appointments',array('cedula'=>$this->input->get('cedula')));
	if($query->num_rows() > 0 )
	{
		echo "<span style='color:red'>Este cedula ya existe !</span>";
		echo "<script>$('#cedula').val('');</script>";
		
	} else {
		
	}

}



	public function get_doc()
{
	$id_esp=$this->input->post('id_esp');
	$data['doc'] = $this->model_admin->get_doc_esp($id_esp);
	$this->load->view('admin/get_doc', $data);
	 //echo json_encode ($query);
}



public function getMuncipio()
{
	$id_mun=$this->input->post('id_mun');
	$data['municipio'] = $this->model_admin->getMuncipio($id_mun);
	$this->load->view('admin/getMuncipio', $data);
	 //echo json_encode ($query);
} 



public function ajaxsearchnec()
{

if(is_null($this->input->get('id')))
{

//$this->load->view('admin/examenf');    

}
else
{

$data['necpatient']=$this->model_admin->NecPatient($this->input->get('id')); 

$this->load->view('admin/outputpatientnec',$data);

}
}

public function UpdateCita()
{
	$id_cita= $this->uri->segment(3);
	
	$id_user= $this->uri->segment(4);
	$data['id_user']=$id_user;
	
	$data['FindCita'] = $this->model_admin->FindCita($id_cita);
	$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
	$this->load->view('admin/pacientes-citas/UpdateCita', $data);
}










public function view_input()
{
	$idpatient=$this->input->post('idpatient');
	$data['idpatient']=$idpatient;
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$seguro_medico=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');;
	$data['seguro_medico'] =$sm;
	$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
	$this->load->view('admin/pacientes-citas/get-seguro-codigo-edit', $data);
	 //echo json_encode ($query);
}




public function saveUpdateCita()
{
	$update_date=date("Y-m-d H:i:s");
$idpatient=$this->input->post('id_patient');
$data['idpatient'] = $idpatient;
$id=$this->input->post('id_cita');
$nec=$this->input->post('nec');
$save = array(
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_time' => $update_date,
'update_by' => $this->input->post('update_by')
   );
$this->model_admin->saveUpdateCita($id,$save);
$msg = "<div  style='text-align:center;font-size:20px;color:green' >La cita ha sido modificada con exito.</div>";
$this->session->set_flashdata('save_patient_success', $msg);

redirect($_SERVER['HTTP_REFERER']);
}








public function patient_billing_()
{
$identificar=$this->uri->segment(3);
$id_p_a=$this->uri->segment(4);
$data['id_apoint']=$id_p_a;
$id_user=$this->uri->segment(5);
$data['id_user'] = $id_user ;
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
$val=$this->db->select('centro,doctor')->where('id_patient',$id_p_a)->get('rendez_vous')->row_array();
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 
$data['rdv_data']=$this->model_admin->getPatientId($id_p_a); 
$data['serv']=$this->model_admin->Serviciomssm($val['doctor']); 
$data['serv_centro']=$this->model_admin->Service_centro($val['centro']);  
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_p_a);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($id_p_a);
$this->load->view('admin/pacientes-citas/header_cita',$data);
$data['billing']="FACTURACION";
if($identificar=="medico"){ 
$this->load->view('admin/billing/bill/get-patient-name-for-billing-after-create-new-cita',$data);
} else{
$this->load->view('admin/billing/bill/centro/get-patient-name-for-billing-after-create-new-cita',$data);
}

}









public function modal_view_citas()
{
	$idpatient= $this->uri->segment(3);
	$query = $this->model_admin->RendezVous($idpatient);
	$data['rendez_vous']=$query;
	$data['number_cita']=count($query);
	$this->load->view('admin/pacientes-citas/modal_view_citas',$data);
}








public function patient_billing()
{
$identificar=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['id_user'] = $id_user ;
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
	
$id_p_a=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$data['id_apoint']=$id_p_a;
$val=$this->db->select('centro,doctor')->where('id_patient',$id_p_a)->get('rendez_vous')->row_array();
$data['patient_data']=$this->model_admin->historial_medical($id_p_a); 
$data['rdv_data']=$this->model_admin->getPatientId($id_p_a); 
$data['serv']=$this->model_admin->Serviciomssm($val['doctor']); 
$data['serv_centro']=$this->model_admin->Service_centro($val['centro']);  
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat($id_p_a);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($id_p_a);
$this->load->view('admin/pacientes-citas/header_cita',$data);
$data['billing']="FACTURACION";
if($identificar=="medico"){ 
$this->load->view('admin/billing/bill/get-patient-name-for-billing-after-create-new-cita',$data);
} else{
$this->load->view('admin/billing/bill/centro/get-patient-name-for-billing-after-create-new-cita',$data);
}

}








public function SaveBill()
{
$exequatur =$this->input->post('exequatur');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save2= array(
'medico' =>$this->input->post('medico'),
'area' =>$this->input->post('area'),
'centro_medico' =>$this->input->post('centro_medico'),
'seguro_medico' =>$this->input->post('seguro_medico'),
'rnc' =>$this->input->post('rnc'),
'codigoprestado' =>$this->input->post('codigoprestado'),
'num_af' =>$this->input->post('num_af'),
'paciente' =>$this->input->post('patient_id'),
'fecha' =>$this->input->post('fecha'),
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),
'tsubtotal' =>$this->input->post('tsubtotal'),
'totpagseg' =>$this->input->post('totpagseg'),
'totsubdesc' =>$this->input->post('totsubdesc'),
'totpagpa' =>$this->input->post('totpagpa'),
'inserted_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'update_date' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'filter_date' =>$filter_date,
'id_rdv' =>$this->input->post('id_apoint')
);
$this->model_admin->SaveBill2($save2);
$last_bill_id=$this->db->select('idfacc')->order_by('idfacc','desc')->limit(1)->get('factura2')->row('idfacc');
$save= array('numfac'=> "$exequatur-$last_bill_id" );

 $this->model_admin->saveNumfac($last_bill_id,$save);
//===========================================================
$service = $this->input->post('service');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');
for ($i = 0; $i < count($service); ++$i ) {
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];
$save= array(
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id
);
$this->model_admin->SaveBill($save);
}
$this->model_admin->DeleteEmptyBill();
//===========================================


}



public function billing_print_view()
{
$identificar = $this->input->get('identificar');
$id_user = $this->input->get('id_user');
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
$data['id_user']=$id_user;
$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['idfacc']=$last_bill_id['idfacc'];
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);
if($identificar=="doctor"){
$this->load->view('admin/billing/bill/print_view',$data);
} else {
$this->load->view('admin/billing/bill/centro/print_view',$data);
}
}


public function get_service_precio_centro()
{
 $id=$this->input->post('id_mssm1');
$precio=$this->db->select('monto')->where('id_c_taf',$id)->get('centros_tarifarios')->row('monto');
echo $precio;


}




public function billing_print_view2()
{
$idfacc = $this->input->get('idfacc');	
$identificar = $this->input->get('identificar');
$id_user = $this->input->get('id_user');
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['perfil'] = $user['perfil'] ;
	$data['id_user'] = $id_user ;
$paciente=$this->db->select('paciente')->where('idfacc',$idfacc)->get('factura2')->row('paciente');
$data['idfacc']=$idfacc;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($paciente);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($paciente);
$data['billing1']=$this->model_admin->showBilling1($idfacc);
$data['billing2']=$this->model_admin->showBilling2($idfacc);
if($identificar=="doctor"){
$this->load->view('admin/billing/bill/print_view',$data);
} else {
$this->load->view('admin/billing/bill/centro/print_view',$data);
}
}




public function bill()
{
$id=$this->uri->segment(3);
$type=$this->uri->segment(4);
$id_user=$this->uri->segment(5);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
		$data['id_user'] = $id_user;
$idt=$this->db->select('medico,seguro_medico,paciente,centro_medico')->where('idfacc',$id)->get('factura2')->row_array();
$get= array(
'id_seguro' => $idt['seguro_medico'],
'id_doctor' =>$idt['medico']

);
$centro_medico =$idt['centro_medico'];
$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($centro_medico);
$data['EditProcedTarif']=$this->model_admin->EditProcedTarif($get);
//$data['serv']=$this->model_admin->Serviciomssm($id_doctor);
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($idt['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($idt['paciente']);
$data['billings2']=$this->model_admin->ViewFact2($id);
$data['billings']=$this->model_admin->ViewFact($id);
$data['diag_pro']=$this->model_admin->Diag_pro();
$data['diag_pres']=$this->model_admin->Diag_pres();
$this->load->view('admin/pacientes-citas/header_cita',$data);
if($type=="privado"){
$this->load->view('admin/billing/bill/bill',$data);
} else{
$this->load->view('admin/billing/bill/centro/bill',$data);	
}
}








public function UpdateBill()
{
$id = $this->input->post('idfacc');
$insert_date=date("Y-m-d H:i:s");
$save2= array(
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),
'tsubtotal' =>$this->input->post('tsubtotal'),
'totpagseg' =>$this->input->post('totpagseg'),
'totsubdesc' =>$this->input->post('totsubdesc'),
'totpagpa' =>$this->input->post('totpagpa'),
'updated_by' =>$this->input->post('inserted_by'),
'update_date' =>$insert_date
);
$this->model_admin->UpdateBill2($id,$save2);
$this->model_admin->delete_factura($id);

//===========================================================
$service = $this->input->post('service');
$cantidad = $this->input->post('cantidad');
$preciouni = $this->input->post('preciouni');
$subtotal = $this->input->post('subtotal');
$totalpaseg = $this->input->post('totalpaseg');
$descuento = $this->input->post('descuento');
$totpapat = $this->input->post('totpapat');
for ($i = 0; $i < count($service); ++$i ) {
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];
$save= array(
'service' =>$serv,
'cantidad' =>$cant,
'preciouni' =>$pre,
'subtotal' =>$sub,
'totalpaseg' =>$totpas,
'descuento' =>$desc,
'totpapat' =>$totpap,
'id2' =>$id
);
$this->model_admin->SaveBill($save);
}

$data['changetime']=$insert_date;
$data['changedby']=$this->input->post('inserted_by');
//$this->load->view('admin/userChangeFac', $data);
}








public function print_billing()
{
$print= $this->uri->segment(3);
$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['last_bill_id']=$last_bill_id['idfacc'];
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);

$seguro_medico=$this->db->select('seguro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('seguro_medico');
$centro_medico=$this->db->select('centro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('centro_medico');

$data['logoc']=$this->db->select('logo')->where('name',$centro_medico)->get('medical_centers')->row('logo');

$data['logo']=$this->db->select('logo')->where('title',$seguro_medico)->get('seguro_medico')->row('logo');

if($print=="medico"){
$this->load->view('admin/print/billing', $data);
} else{
$this->load->view('admin/print/billing_centro', $data);
}
}




public function print_billing_()
{
$last_id= $this->uri->segment(3);
$print= $this->uri->segment(4);
$last_bill_id=$this->db->select('idfacc,paciente')->where('idfacc',$last_id)->get('factura2')->row_array();
$data['last_bill_id']=$last_id;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente']);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);

$seguro_medico=$this->db->select('seguro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('seguro_medico');
$centro_medico=$this->db->select('centro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('centro_medico');

$data['logoc']=$this->db->select('logo')->where('name',$centro_medico)->get('medical_centers')->row('logo');

$data['logo']=$this->db->select('logo')->where('title',$seguro_medico)->get('seguro_medico')->row('logo');

if($print=="privado"){
$this->load->view('admin/print/billing', $data);
} else{
$this->load->view('admin/print/billing_centro', $data);
}
}





public function get_service_precio()
{
$id=$this->input->post('id_mssm1');
$doctorid=$this->input->post('doctorid');
$data['precio']=$this->db->select('monto')->where('id_tarif',$id)->get('tarifarios')->row('monto');
$this->load->view('admin/billing/bill/get-service-precio', $data);
}



public function mssm()
{
$id_user=$this->uri->segment(3);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;	
	$data['id_user'] = $id_user ;	
	
	
$id_area=$this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');
$area_info=$this->db->select('id_ar, title_area')->where('id_ar',$id_area)->get('areas')->row_array();	
$data['a_i']=$area_info['id_ar']; 
$data['area']=$area_info['title_area']; 


$data['view_doctor_seguro'] = $this->model_admin->view_doctor_seguro($id_user); 
		
$data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped(); 
$data['tarifarios_grouped_seguro'] = $this->model_admin->tarifarios_grouped_seguro(); 
$data['especialidades'] = $this->model_admin->getEspecialidades();
$identificar=$this->uri->segment(4);
$data['privado']=$this->db->select('title')->where('title','PRIVADO')->limit(1)->get('seguro_medico')->row('title');
$data['tarif_cat']=$this->model_admin->tarif_cat(); 
$data['all_seguro'] = $this->model_admin->display_all_seguro_medico();
$data['DOCTORS']=$this->model_admin->display_all_doctors();
$data['message']="";
$this->load->view('admin/pacientes-citas/header_cita',$data);

if($identificar=="medico"){
	
$this->load->view('admin/billing/mssm/create',$data);
} else{
$data['all_medical_centers'] = $this->model_admin->all_centro_medicos_tarifs();
$this->load->view('admin/billing/mssm/centro/create-centro',$data);
}
}


public function display_tarif_centro_categoria()
{
$id_centro=$this->input->post('id_centro');
$data['user_name']=$this->input->post('user_name');
$data['perfil']=$this->input->post('perfil');
$id_user=$this->input->post('id_user');
$results= $this->model_admin->display_tarif_centro_categoria($id_centro);
$data['results']=$results;
$data['count']=count($results);

$data['RESULT_DOCTOR']= $this->model_admin->get_doctor($id_centro);

$this->load->view('admin/tarifarios/centros/display_tarif_centro', $data);

}





public function centro_categoria_servicios()
{
$categoria=$this->input->post('categoria');
$data['categoria']=$categoria;
$results= $this->model_admin->centro_categoria_servicios($categoria);
$data['results']=$results;
$data['count']=count($results);
$this->load->view('admin/tarifarios/centros/centro_categoria_servicios', $data);
}




public function get_category_name()
{
	$cat=$this->input->post('cat');
	$data['result'] = $this->model_admin->getCatName($cat);
	$this->load->view('admin/billing/mssm/get_cat_lab', $data);
}



public function mssm_service_data(){
$id_tarif=$this->input->get('id_tarif');
$id_user=$this->input->get('id_user');
$data['id_user']=$id_user;
$procedimiento=$this->db->select('procedimiento')->where('id_tarif',$id_tarif)->get('tarifarios')->row('procedimiento');
$data['servicio']=$procedimiento;
	$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
	
if($perfil=="Admin"){
$data['tarifarios_by_seguros']=$this->model_admin->tarifarios_by_seguros($procedimiento);
} 
else
{
$get= array(
'procedimiento'=>$procedimiento,
'id_user'=>$id_user
);	
$data['tarifarios_by_seguros']=$this->model_admin->tarifarios_by_seguros_doc($get);
}
$this->load->view('admin/tarifarios/doctors/search-by-service-result', $data);	
}



public function display_tarif_doc()
{
$doct_tarif=$this->input->post('doct_tarif');
$data['user_name']=$this->input->post('user_name');
$results= $this->model_admin->display_tarif_doc($doct_tarif);
$data['results']=$results;
$data['count']=count($results);
$id_seguro_medico=$this->db->select('seguro_medico')->where('id_doctor',$doct_tarif)->get('doctor_seguro')->row('seguro_medico');
$data['id_seguro_medico']=$id_seguro_medico;
$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped($doct_tarif);
$this->load->view('admin/tarifarios/doctors/display_tarif_doc', $data);
//$this->load->view('admin/tarifarios/doctors/display_tarif_seguro_footer', $data);

}


public function other_seguro_tarif()
{
$data['user_name']=$this->input->post('user_name');
$val = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor')
);
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$this->input->post('id_seguro');
$data['results']= $this->model_admin->other_seguro_tarif($val);
//$data['info']= $this->model_admin->seguro_header($this->input->post('id_seguro'));
$this->load->view('admin/tarifarios/doctors/other_seguro_tarif', $data);
}










public function display_tarif_seguro()
{
	$id_user=$this->input->post('id_user');
	
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;	
	$data['id_user'] = $id_user;
	
$seguro_id=$this->input->post('seguro_id');

$results= $this->model_admin->display_tarif_seguro($seguro_id);
$data['results']=$results;
$data['count']=count($results);
$id_medico=$this->db->select('id_doctor')->where('seguro_medico',$seguro_id)->get('doctor_seguro')->row('id_doctor');
$data['view_doctor_centro']=$this->model_admin->view_doctor_centro($id_medico);
$data['seguro_doc_tarif_grouped1']=$this->model_admin->seguro_doc_tarif_grouped1($seguro_id);
$this->load->view('admin/tarifarios/doctors/display_tarif_seguro', $data);
}





public function delete_tarifarios(){
	$id  = $this->input->post('id');
	$query = $this->model_admin->delete_tarifarios($id);
	}
	
	
	
	
public function centro_medico()
{ 
	$id_medical_center= $this->uri->segment(3);
	$id_user=$this->uri->segment(4);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;	
	$data['id_user'] = $id_user ;
	
$data['CENTRO_MEDICO'] = $this->model_admin->display_centro_medico($id_medical_center);
$data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->model_admin->display_centro_medical_esp($id_medical_center);
$data['CENTRO_MEDICO_SEGURO']= $this->model_admin->display_centro_medical_seguro($id_medical_center);
$data['RESULT_DOCTOR']= $this->model_admin->get_doctor($id_medical_center);
$data['CENTRO_PROVINCE']= $this->db->select('title')->join('medical_centers', 'provinces.id = medical_centers.provincia')->where('id_m_c',$id_medical_center)->limit(1)->get('provinces')->row('title');
 $data['CENTRO_MUNICIPIO']= $this->db->select('title_town')->join('medical_centers', 'townships.id_town = medical_centers.municipio')->where('id_m_c',$id_medical_center)->limit(1)->get('townships')->row('title_town');
$this->load->view('admin/pacientes-citas/header_cita',$data);
 $this->load->view('admin/centers/medical_center', $data);


}	
	

public function doctor()
{ 
	$id_doctor= $this->uri->segment(3);
	$data['idd']=$id_doctor;
$id_user=$this->uri->segment(4);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;	
	$data['id_user'] = $id_user ;
$data['CENTRO_MEDICO'] = $this->model_admin->display_centro_medico($id_doctor);
$data['CENTRO_MEDICO_ESPECIALIDADED'] = $this->model_admin->display_centro_medical_esp($id_doctor);
$data['CENTRO_MEDICO_SEGURO']= $this->model_admin->display_centro_medical_seguro($id_doctor);
$data['RESULT_DOCTOR']= $this->model_admin->view_doctor($id_doctor);
$data['AGENDA']= $this->model_admin->view_doctor_agenda($id_doctor);
 $data['num_rows']= count($data['AGENDA']);
$data['SEGURO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_seguro($id_doctor);
$data['CENTRO_MEDICO_DOCTOR']= $this->model_admin->view_doctor_centro($id_doctor);
$data['SOLICITUDES']= $this->model_admin->view_doctor_solicitud($id_doctor);
$data['ALLAGENDAS']= $this->model_admin->Agendas();
$this->load->view('admin/pacientes-citas/header_cita',$data);
$this->load->view('admin/medicos/doctor', $data);


}





public function EditSeguroMedico()
{
$id_seguro= $this->uri->segment(3);
$data['id_seguro']= $id_seguro;

$id_user=$this->uri->segment(4);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['id_user'] = $id_user ;
$data['ALL_FIELDS'] = $this->model_admin->all_fields();
$data['EditSeguroMedico'] = $this->model_admin->EditSeguroMedico($id_seguro);
$this->load->view('admin/health_insurances/modal-update', $data);

}



public function UpdateSeguroField(){
//if($this->input->post('submitSeguro')){
$id_seguro  = $this->input->post('id_seguro');
$title  = $this->input->post('title');	
$active  = $this->input->post('activo');

if($_FILES['picture']['tmp_name'] != '')
{
$imgSize = $_FILES['picture']['size'];
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');	
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);  
$logo = rand() . '.' . $extension[1];  
$destination = './assets/img/seguros_medicos/' . $logo;
if(in_array($imgExt, $valid_extensions) && $imgSize < 5000000)
{			
move_uploaded_file($_FILES['picture']['tmp_name'], $destination); 

}
else {
	$msg = "<div id='deletesuccess' style='text-align:center'>Este tipo de archivo no está permitido, la inserción falla.</div>";
	$this->session->set_flashdata('success_msg', $msg);
redirect('admin/health_insurance');
}
}
else {
	$old_logo=$this->db->select('logo')->where('id_sm',$id_seguro)->get('seguro_medico')->row('logo');
$logo = $old_logo;

	}
//Check whether user upload picture
$insert_date=date("Y-m-d H:i:s");

//Prepare array of user data
$save = array(
'title'  => $this->input->post('title'),
'logo' => $logo,
'rnc' => $this->input->post('rnc'),
'tel' => $this->input->post('tel'),
'email' => $this->input->post('email'),
'direccion' =>$this->input->post('direccion'),
'inserted_time' => $insert_date,
'updated_by' =>$this->input->post('user_name'),
'updated_time' =>$insert_date
);

//Pass user data to model
$insertUserData = $this->model_admin->updateSeguro($id_seguro,$save);
//---------------------------------seguro_field
$this->model_admin->deleteSeguroField($id_seguro);
$this->model_admin->deleteSeguroFieldInPatient($id_seguro);
foreach ($active as $key=>$id_f) {
   $saveS= array(
	'medical_insurance_id' =>$id_seguro,
	'field_id' => $id_f
	
	);
    
	$this->model_admin->saveSeguroField($saveS);
}
//Storing insertion status message.
if($insertUserData){
$msgs="seguro medico se guada con exito.";
$this->session->set_flashdata('success_msg',$msgs);
}else{
$msger="Hubo algunos problemas, por favor intente de nuevo.";
$this->session->set_flashdata('error_msg', $msger);
}
//redirect('admin/health_insurances');
redirect($_SERVER['HTTP_REFERER']);
//}
//Form for adding user data


}

public function RelatedCentro(){

$data['id_user']=$this->uri->segment(4);
$data['seguro_name']=$this->db->select('title')->where('id_sm',$this->uri->segment(3))->limit(1)->get('seguro_medico')->row('title');
$data['RelatedCentro'] = $this->model_admin->RelatedCentro($this->uri->segment(3));
$this->load->view('admin/health_insurances/RelatedCentro', $data);

}


 public function save_edit_c_c(){

$codigo_id=$this->input->post('codigo_id');
$date=date("Y-m-d H:i:s");
$data2 = array(
  'codigo'=>$this->input->post('codigo'),
  'updated_by'=>$this->input->post('user_name'),
  'updated_time'=>$date
);
$this->model_admin->save_edit_codigo_prestador($codigo_id,$data2);

}	




public function import_rates()
	{
		$id_user=$this->uri->segment(3);
		$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
		$data['name'] = $user['name'] ;
		$data['perfil'] = $user['perfil'] ;	
		$data['id_user'] = $id_user ;
        $id_area=$this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');		
		$area_info=$this->db->select('id_ar, title_area')->where('id_ar',$id_area)->get('areas')->row_array();	
        $data['a_i']=$area_info['id_ar']; 
        $data['area']=$area_info['title_area']; 
		$data['tarifarios_grouped'] = $this->model_admin->tarifarios_grouped(); 
		$data['last_id_doc']=$this->db->select('id_doctor')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_doctor');
        $data['especialidades'] = $this->model_admin->getEspecialidades();
        $data['all_seguro'] = $this->model_admin->display_all_seguro_medico();	
        if($user['perfil']=="Admin"){		
		$data['all_medical_centers'] = $this->model_admin->display_all_medical_centers();
		} else{
		$data['all_medical_centers'] = $this->model_admin->view_doctor_centro($id_user);
		}
		$this->load->view('admin/pacientes-citas/header_cita',$data);
		$this->load->view('admin/tarifarios/excel_import',$data);
	}	
	
	

	

















 public function save_edit_tarif(){
$id  = $this->input->post('id_tarif');

$updated_date=date("Y-m-d H:i:s");
//$codigo_prestador=$this->input->post('codigo_prestador');
$data = array(
  'codigo'=>$this->input->post('codigo'),
  'simon'=>$this->input->post('simon'),
  'procedimiento'=>$this->input->post('procedimiento'),
   'monto'=>$this->input->post('monto'),
   'updated_by'=>$this->input->post('updated_by'),
   'updated_date'=>$updated_date
);
$this->model_admin->save_edit_tarif($id,$data);


}


 public function save_edit_tarifario_centro(){
$updated_date=date("Y-m-d H:i:s");
$id  = $this->input->post('id_c_taf');
$data = array(
'cups'=>$this->input->post('cups'),
'simons'=>$this->input->post('simons'),
'sub_groupo'=>$this->input->post('sub_groupo'),
 'monto'=>$this->input->post('monto'),
  'updated_by'=>$this->input->post('updated_by'),
   'updated_date'=>$updated_date
  );
$this->model_admin->save_edit_tarifario_centro($id,$data);


}



	
public function delete_tarifarios_centro(){
	$id  = $this->input->post('id');
	$query = $this->model_admin->delete_tarifarios_centro($id);
	}

	











public function bills_data()
{ 
 $perfil=$this->input->post('perfil');
  $id_user=$this->input->post('id_user');
  $data['perfil'] = $perfil ;	
$data['id_user'] = $id_user ;
if($perfil=="Admin"){
$data['blocked']=$this->model_admin->CountFactura2Blocked(); 
$data['un_blocked']=$this->model_admin->CountFactura2UnBlocked(); 
$data['billings']=$this->model_admin->Billings();
 } else{
$data['blocked']=$this->model_admin->CountFactura2BlockedDoc($id_user); 
$data['un_blocked']=$this->model_admin->CountFactura2UnBlockedDoc($id_user); 
$data['billings']=$this->model_admin->BillingsDoc($id_user);
 }

$this->load->view('admin/billing/bill/data',$data);

}

public function block_factura(){
$id = $this->input->post('id');
$data= array(
'block' => 1,
);
$query = $this->model_admin->block_factura2($id,$data);
$query = $this->model_admin->block_factura1($id,$data);
}






public function save_update_patient(){
$idp = $this->input->post('id_p_a');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
//$this->model_admin->deleteInput(4);
//--------------------------------------------

if($_FILES['picture']['tmp_name'] != '')
{
$extension = explode('.', $_FILES['picture']['name']);  
$logo = rand() . '.' . $extension[1]; 
$destination = './assets/img/patients-pictures/' . $logo;		
move_uploaded_file($_FILES['picture']['tmp_name'], $destination); 
 }
 
else {
	$old_photo=$this->db->select('photo')->where('id_p_a',$idp)->get('patients_appointments')->row('photo');
$logo = $old_photo;

	}
	
$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$save = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  => $logo,
  'cedula' => $this->input->post('cedula'),
 'date_nacer' => $this->input->post('date_nacer'), 
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
 //'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'), 
   'responsable_legal' => $this->input->post('responsable_legal'), 
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
  'update_date' => $modify_date,
  'updated_by' => $this->input->post('updated_by'),
  'filter_date' => $filter_date
  );
$this->model_admin->saveUpdatePatient($idp,$save);
//--------------------------------------


for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$idp,
	'input_name' => $inp,
	'inputf' => $inf
	);
    
	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>Cambio ha sido hecho con exito .</div>";
$this->session->set_flashdata('save_patient_success', $msg);
//redirect('admin/ver_confirmada_solicitud');
redirect($_SERVER['HTTP_REFERER']);
}



public function edit_causa()
{
$date=date("Y-m-d H:i:s");
$id= $this->input->post('ida');

$data = array(
'title'=>$this->input->post('title'),
'updated_by'=>$this->input->post('updated_by'),
'updated_time'=>$date,
);
$this->model_admin->edit_causa($id,$data);


}


public function medical_insurance_audit_profile_print()
{
$data = array(
'desde' =>$this->uri->segment(3),
'hasta' =>$this->uri->segment(4),
'medico' =>$this->uri->segment(5)
);
$data['last_id']=$this->db->select('id')->order_by('id','desc')->limit(1)->get('medical_insurance_audit_profile')->row('id');
$results=$this->model_admin->show_patient_arc_report($data);
$data['patient_rows']=$results;
$data['count']=count($results);
$this->load->view('admin/print/medical_insurance_audit_profile',$data);

}


public function relacion_familiares()
{
$data['tutor']=$this->model_admin->getTutor($this->uri->segment(3));
$this->load->view('admin/pacientes-citas/relacion_familiares',$data);
}



public function historial_medical()
{
$historial_id=$this->uri->segment(3);
$data['id_historial']=$historial_id;
$user_id=$this->uri->segment(4);

$areaid=$this->uri->segment(5);
$data['areaid']=$areaid;
$data['area']=$this->db->select('title_area')->where('id_ar',$areaid)
->get('areas')->row('title_area');

//general
$data['selectOne']=$this->model_admin->selectOne();
$data['selectTwo']=$this->model_admin->selectTwo();
$rows=$this->model_admin->countAnte1($historial_id);
$data['antege']=$rows;
$ctutor=$this->model_admin->CountTutor($historial_id);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($historial_id);
$data['HISTORIAL_MEDICAL'] = $this->model_admin->historial_medical($historial_id);
$data['rowpm']=$this->model_admin->countPatMed($historial_id);
$data['desa'] = $this->model_admin->showDesarollo($historial_id);
//-----------ssr------------------------------------------------------

$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr']=$this->model_admin->getSSR($historial_id);
$rows=$this->model_admin->countSSR($historial_id);
//------obstetrico-------------------------------------------------------
$data['obs_nav']=$this->model_admin->sObs($historial_id);
$data['count_obs']=$this->model_admin->countObs($historial_id);
//-----pediatrico----------------------------------------------------------------


$data['date_nacer'] = $this->model_admin->historial_medical($historial_id);
$data['count_pedia']=$this->model_admin->countant_pedia($historial_id);
$data['pedia']=$this->model_admin->Getpedia($historial_id);

//-----Enfermedad----------------------------------------------------------------
$data['count_enf']=$this->model_admin->CountEnfermedad($historial_id);
$data['enfermedad']=$this->model_admin->Enfermedad($historial_id);

//-----rehabilitation----------------------------------------------------------------

$data['count_rehab']=$this->model_admin->countRehab($historial_id);
$data['rehab']=$this->model_admin->Rehab($historial_id);

//-----examen fisico----------------------------------------------------------------

$data['cabeza']=$this->model_admin->Cabeza();
$data['cuello']=$this->model_admin->examenCuello();
$data['torax']=$this->model_admin->examenTorax();
$data['mama']=$this->model_admin->examenMama();
$data['axilar']=$this->model_admin->examenAxilar();
$data['genitalf']=$this->model_admin->examenGenitalf();
$data['genitalm']=$this->model_admin->examenGenitalm();
$data['vagina']=$this->model_admin->examenVagina();
$data['rectal']=$this->model_admin->examenRectal();
$data['inspeccion_vulvar']=$this->model_admin->examenInspeccion_vulvar();
$data['ext_inf']=$this->model_admin->examenExtinf();


//--------oftalmologia----------------------------------------------------

$data['count_oftal']=$this->model_admin->countOftal($historial_id);
$data['oftal']=$this->model_admin->Oftal($historial_id);
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);

//--------examen sistema----------------------------------------------------

$data['count_examensis']=$this->model_admin->count_examenes_sis($historial_id);
$data['examensis']=$this->model_admin->Examensis($historial_id);
$data['digest']=$this->model_admin->sistemaDigest();
$data['musculo']=$this->model_admin->sistemaMusculo();
$data['urogenial']=$this->model_admin->sistemaUrogenial();
$data['cardiov']=$this->model_admin->sistemaCardiov();
$data['neuro']=$this->model_admin->sistemaNeuro();
$data['resp']=$this->model_admin->sistemaResp();
$data['endocrino']=$this->model_admin->sistemaEndo();
$data['relativo']=$this->model_admin->sistemaRelat();
//--------conclusion diagnostic----------------------------------------------------
$data['concluciones'] = $this->model_admin->concluciones($historial_id);
$data['count_conc']=$this->model_admin->count_con_dia($historial_id);
$data['diag_pres']=$this->model_admin->Diag_pres();
$data['diag_pro']=$this->model_admin->Diag_pro();
//--------ControPrenal----------------------------------------------------
$data['ControPrenal']=$this->model_admin->ControPrenal($historial_id);
	$data['count_cont_prenal']=$this->model_admin->CountControPrenal($historial_id);
	
	
//--------recetas----------------------------------------------------	
	

$data['historial_id']=$historial_id;
$data['count_examensis']=$this->model_admin->count_examenes_sis($historial_id);
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['presentacion'] = $this->model_admin->Presentacion();
$data['branches'] = $this->model_admin->branches();
$data['IndicacionesPrevias'] = $this->model_admin->IndicacionesPrevias($historial_id);
$data['num_count']=$this->model_admin->hist_count($historial_id);
$data['via'] = $this->model_admin->via();
$data['frecuencia'] = $this->model_admin->frecuencia();
$data['farmacia'] = $this->model_admin->farmacia();
$data['patientAdress'] = $this->model_admin->historial_medical($historial_id);

//--------estudios----------------------------------------------------	
	

$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);

//--------laboratories----------------------------------------------------	
$data['laboratories'] = $this->model_admin->laboratories();
$data['IndicacionesLab'] = $this->model_admin->IndicacionesLab($historial_id);
$data['num_count_lab']=$this->model_admin->hist_count_lab($historial_id);
//---------------------------------------------------------------------
$idpatient= $historial_id;
$data['nec'] = $this->model_admin->getNec();
$data['idpatient']=$idpatient;
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['municipios'] = $this->model_admin->getTownships();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['doctors'] = $this->model_admin->display_all_doctors();
$data['patient'] = $this->model_admin->historial_medical($idpatient);
$query = $this->model_admin->RendezVous($idpatient);
$data['patid']=$idpatient;
$ctutor=$this->model_admin->CountTutor($idpatient);
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($idpatient);
$data['rendez_vous']=$query;
$data['fecha']=$query;
$data['number_cita']=count($query);
$data['nueva_cita']="";
	$singular_id= 1;
$value = array(
'singular_id'=> 0
);
$this->model_admin->UpdateSingularId($singular_id,$value);

$data['GinecOb']=$this->model_admin->GinecOb();
$data['drug']=$this->model_admin->droga();
$rows=$this->model_admin->countAnte1($historial_id);
$data['antege']=$rows;
$data['user_id']=$user_id;
$data['user']=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');
$this->load->view('admin/historial-medical1/js-links');
if($rows < 1){
	echo '<style>
font{display:none}
</style>';
$this->load->view('admin/historial-medical1/head11',$data);
if($areaid==0){
$this->load->view('admin/historial-medical1/header-empty',$data);
} else {
	$this->load->view('medico/historial-empty/header-empty', $data);
}
$this->load->view('admin/historial-medical1/test', $data);
$this->load->view('admin/historial-medical1/footer-empty', $data);
} 
else
{
$data['row_ant'] = $this->model_admin->showAnte($historial_id);
$data['desa'] = $this->model_admin->showDesarollo($historial_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['droga'] = $this->model_admin->showDrug($historial_id);
$this->load->view('admin/historial-medical1/all-data/head1',$data);
if($areaid==0){
$this->load->view('admin/historial-medical1/all-data/header-data',$data);
} else {
	$this->load->view('medico/historial-data/header-data', $data);
}
$this->load->view('admin/historial-medical1/all-data/test', $data);
//$this->load->view('admin/historial-medical1/all-data/footer', $data);
$this->load->view('admin/historial-medical1/all-data/footer-ant-general');
}
$this->load->view('admin/historial-medical1/footer-commun', $data);



echo '<div class="modal fade" id="relacion_familiares"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>';
}






public function save_patients_appointments_padron(){
	
$MUN_CED = $this->input->post('ced1');
$SEQ_CED = $this->input->post('ced2');
$VER_CED = $this->input->post('ced3');
$id_user = $this->input->post('id_user');

$this->session->set_userdata('MUN_CED', $MUN_CED);	
$this->session->set_userdata('SEQ_CED', $SEQ_CED);	
$this->session->set_userdata('VER_CED', $VER_CED);	
$this->session->set_userdata('id_user', $id_user);	
$this->session->set_userdata('sessionIdSegNewCita', $this->input->post('seguro_medico'));	
$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdDocNewCita',$this->input->post('doctor'));
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$modify_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
$padron= "padron";

$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  =>$padron,
  'cedula' => $this->input->post('cedula'),
  'ced1' => $this->input->post('ced1'),
  'ced2' => $this->input->post('ced2'),
  'ced3' => $this->input->post('ced3'),
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
 'contacto_em_alias'  => $this->input->post('contacto_em_alias'),
  'contacto_em_cel'=> $this->input->post('contacto_em_cel'),
  'contacto_em_tel1' => $this->input->post('contacto_em_tel1'),
  'contacto_em_tel2' => $this->input->post('contacto_em_tel2'), 
   'responsable_legal' => $this->input->post('responsable_legal'), 
  'cedula_o_pass_menos_edad'=> $this->input->post('cedula_o_pass_menos_edad'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$this->model_admin->save_patient($save1);
$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');

$this->session->set_userdata('sessionIdPatientNewCita',$last_patient_id);

 //------------------------Save cita----------------------------
 $save2 = array(
'nec'=> "NEC-$last_patient_id",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' => $last_patient_id, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date
   );
$this->model_admin->save_rendevous($save2);
 $saveN = array(
'nec1'  => "NEC-$last_patient_id"
);

$this->model_admin->insert_nec($last_patient_id,$saveN);
//--------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$last_patient_id,
	'input_name' => $inp,
	'inputf' => $inf
	);
    
	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/create_cita');
redirect('admin_medico/redirect_after_save_cita');
}




public function redirect_after_save_cita()
{
   
$MUN_CED=$this->session->userdata['MUN_CED'];
$SEQ_CED=$this->session->userdata['SEQ_CED'];
$VER_CED=$this->session->userdata['VER_CED'];
$id_user=$this->session->userdata['id_user'];
$val = array(
  'MUN_CED' => $MUN_CED,
  'SEQ_CED' => $SEQ_CED,
  'VER_CED' => $VER_CED
  );
$data['id_user'] = $id_user ;
$data['area_id'] = "" ;
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
$patient = $this->padron_model->getPatientCedulaPad($val);
$data['patient']=$patient;
$data['photo']=$this->padron_model->getPhoto($val);
$data['nec'] = $this->model_admin->getNec();
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$data['doctors'] = $this->model_admin->display_all_doctors();
$last_patient_id=$this->db->select('id_apoint')->order_by('id_apoint','desc')->limit(1)->get('rendez_vous')->row('id_apoint');
$lidp=$last_patient_id + 1;
$data['patid']=$lidp;
$data['idpatient']=($this->session->userdata['sessionIdPatientNewCita']);
$data['id_dd']=($this->session->userdata['sessionIdDocNewCita']);
$data['id_cm']=($this->session->userdata['sessionIdCentNewCita']);
$data['centro_type']=($this->session->userdata['sessionCentroTypeSeguroNewCitaAgain']);
$data['id_seguro']=($this->session->userdata['sessionIdSegNewCita']);
if($user['perfil']=="Admin"){
$data['is_admin']="yes";
$this->load->view('admin/pacientes-citas/header_cita',$data);
} else {
	$data['is_admin']="no";
$this->load->view('medico/header', $data);
}
$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('medico/pacientes-citas/patient-found-in-padron', $data);
$this->load->view('medico/pacientes-citas/after-cita-save-again',$data);

	
}



public function PatientName()
{
$executionStartTime = microtime(true);
$user_id=$this->input->get('id_user');
$patient_nombres = $this->input->get('patient_nombres');
$patient_apellido = $this->input->get('patient_apellido');

$val = array(
  'patient_nombres'=>$this->input->get('patient_nombres'),
  'patient_apellido'=>$this->input->get('patient_apellido')
  );
  $query_padron = $this->padron_model->getPatientNameOnSelectPad($val);
$query_admedicall = $this->model_admin->getPatientNameOnSelectAdm($patient_nombres);

$data['nec'] = $this->model_admin->getNec();

 $executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);
 if ($query_admedicall != null)
 {
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);
 }
 else if ($query_padron != null)
 {
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['patient_admedicall']=$query_admedicall;
$data['patient_padron']=$query_padron;
$data['base']="Padron";
$data['number_found']=count($query_padron);
$this->load->view('admin/pacientes-citas/search-patient-result-padron-by-name', $data);
 
 }
else{
$no_patient_name_found = "<div  style='text-align:center;color:red' id='deletesuccess'>Lo siento, no hemos encuentrado <b><i>$patient_nombres $patient_apellido</i></b></div>";
//$this->session->set_flashdata('no_patient_name_found', $no_patient_name_found);
echo $no_patient_name_found;
//redirect('admin/create_cita');/
//redirect($_SERVER['HTTP_REFERER']);
}
}



public function get_patient_cedula()
{
$executionStartTime = microtime(true);
$user_id= $this->input->get('id_user');
$data['id_user']=$user_id;
$val=$this->db->select('name,perfil')->where('id_user',$user_id)->get('users')->row_array();
$data['id_user']=$user_id;

$data = array(
  'MUN_CED' => $this->input->get('patient_cedula1'),
  'SEQ_CED' => $this->input->get('patient_cedula2'),
  'VER_CED' => $this->input->get('patient_cedula3')
  );
$patient_cedula2 = $this->input->get('patient_cedula2');
$query_admedicall = $this->model_admin->getPatientCedulaAd($patient_cedula2);
$query_padron = $this->padron_model->getPatientCedulaPad($data);
$photo=$this->padron_model->getPhoto($data);
$data['photo']=$photo;
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);


 if ($query_admedicall != null)
 {
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);
 }
 else if ($query_admedicall == null)
 {
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['patient_admedicall']=$query_admedicall;
$data['patient_padron']=$query_padron;
$data['base']="Padron";
$data['number_found']=count($query_padron);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);
 
 }
else{
	
$no_patient_name_found = "<div  style='text-align:center;color:red' id='deletesuccess'>Lo siento, no hemos encuentrado el cedula : <b><i>$patient_cedula</i></b></div>";
$this->session->set_flashdata('no_patient_name_found', $no_patient_name_found);
//redirect('admin/create_cita');
redirect($_SERVER['HTTP_REFERER']);
}

}


public function import_rates_fac_centro()
{
$data['id_c']=$this->uri->segment(3);
$data['decide']=$this->uri->segment(4);
$this->load->view('admin/tarifarios/excel_import_fac_centro',$data);
}








public function create_pdf() {
    //============================================================+
    // File name   : example_001.php
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Muhammad Saqlain Arif
    //
    // (c) Copyright:
    //               Muhammad Saqlain Arif
    //               PHP Latest Tutorials
    //               http://www.phplatesttutorials.com/
    //               saqlain.sial@gmail.com
    //============================================================+
 
   
  
    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);    
  
    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    //$pdf->SetAuthor('Muhammad Saqlain Arif');
    $pdf->SetTitle('Facturación');
   // $pdf->SetSubject('TCPDF Tutorial');
    //$pdf->SetKeywords('TCPDF, PDF, example, test, guide');   
  
    // set default header data
	 //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    }   
  
    // ---------------------------------------------------------    
  
    // set default font subsetting mode
    $pdf->setFontSubsetting(true);   
  
    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 14, '', true);   
  
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage(); 
  
    // set text shadow effect
    $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
 
$this->padron_database = $this->load->database('padron',TRUE);
$last_bill_id=$this->db->select('idfacc,paciente')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['last_bill_id']=$last_bill_id['idfacc'];
$show_diagno_pat=$this->model_admin->show_diagno_pat($last_bill_id['paciente']);
$show_diagno_pro_pat = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
$billing1=$this->model_admin->showBilling1($last_bill_id['idfacc']);
$billing2=$this->model_admin->showBilling2($last_bill_id['idfacc']);

$seguro_medico=$this->db->select('seguro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('seguro_medico');
$centro_medico=$this->db->select('centro_medico')->where('idfacc',$last_bill_id['idfacc'])->limit(1)->get('factura2')->row('centro_medico');

$logoc=$this->db->select('logo')->where('name',$centro_medico)->get('medical_centers')->row('logo');

$logo=$this->db->select('logo')->where('title',$seguro_medico)->get('seguro_medico')->row('logo');


 foreach($billing1->result() as $row1)
 $paciente=$this->db->select('nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3')->where('id_p_a',$row1->paciente)
 ->get('patients_appointments')->row_array();
 
 
 if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpatpa='<img  width="75" height="75"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
	
}
else{
$imgpat='<img  style="width:40px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}



$logoc=$this->db->select('logo,name')->where('id_m_c',$row1->centro_medico)->get('medical_centers')->row_array();
$seguron=$this->db->select('title,logo')->where('id_sm',$row1->seguro_medico)->get('seguro_medico')->row_array();
$doctor=$this->db->select('id_user, name')->where('id_user',$row1->medico )
->get('users')->row_array();
$area=$this->db->select('title_area')->where('id_ar',$row1->area)->get('areas')->row('title_area');
$exequatur=$this->db->select('exequatur')->where('first_name',$row1->medico )
->get('doctors')->row('exequatur');
if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}
   // Set some content to print
$html='
 <div style="position: absolute; top: 0px; text-align:right; font-size: 10px;font-weight:bold">
 '.$row1->numfac.'
 </div>
<h2 style="text-align:center;text-transform:uppercase">'.$doctor['name'].'</h2>
<div  style="text-align:center;">
<span style="text-align:center;">'.$area.'</span><br/>
<span style="text-align:center;font-size:10px">Exeq : '.$exequatur.'</span>
<h5 style="text-align:center;color:blue;">RECLAMACION DE PAGO POR SERVICIO PRESTADO</h5>
<span style="text-align:center;">'.$logoseg.'</span>
<span style="text-align:center;">'.$imgpat.'</span>
<hr style=""/>
</div>
<div>
<fieldset style="width: 55%;display: block;float: left">
<table style="font-size:14px;"  >
<tr >
<td style="text-align:right"><strong>ASEGURADORA</strong> :</td><td style="text-align:left">'.$seguron['title'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>CODIGO PRESTADOR</strong> :</td><td style="text-align:left"> '.$row1->codigoprestado.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>NOMBRE AFILIADO</strong> :  </td><td style="text-align:left;text-transform:uppercase">'.$paciente['nombre'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>TELEFONO</strong> :</td><td style="text-align:left">'.$paciente['tel_cel'].' / '.$paciente['tel_resi'].' </td>
</tr>
<tr>
<td style="text-align:right"><strong>NO. CONTRATO</strong> :</td><td style="text-align:left">'.$row1->codigoprestado.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO DE SERVICIO</strong> :</td>

<td style="text-align:left">
<ol>
';
foreach($billing2->result() as $row2) {
$service=$this->db->select('procedimiento')->where('id_tarif',$row2->service)->get('tarifarios')->row('procedimiento');
$html .= '
<li>'.$service.' </li> 

';
}
$html .= '
</ol>
</td>
</tr>
<tr>
<td style="text-align:right"><strong>DIAGNOSTICO</strong> :</td>
<td style="text-align:left">
<ol>
';
foreach($show_diagno_pat->result() as $cie)

{
$html .= '
<li>'.$cie->description.' </li> 

';
}
$html .= '
</ol>
</td>
</tr>
<tr>
<td style="text-align:right"><strong>MEDICO TRATANTE</strong> :</td><td style="text-align:left;text-transform:uppercase">'.$doctor['name'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>PROCEDIMIENTO REALIZADO</strong> :</td>
<td style="text-align:left">
<ol>
';
foreach($show_diagno_pro_pat->result() as $pro)

{
$html .= '
<li>'.$pro->name.' </li> 

';
}
$html .= '
</ol>
</td>
</tr>
</table>
</fieldset>
<fieldset  style="width: 45%;display: block;">
<table  style="font-size:14px;" >

<tr>
<td style="text-align:right"><strong>NRO AUTORIZACION</strong> :</td><td style="color:red;text-align:left">'.$row1->numauto.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>FECHA</strong> :</td><td style="text-align:left">'.$row1->fecha.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>AUTORIZADO POR</strong> :</td><td style="text-align:left">'.$row1->autopor.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>CEDULA</strong> :</td><td style="text-align:left">'.$paciente['cedula'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>NO. AFILIADO</strong> :</td><td style="text-align:left">'.$row1->numfac.'</td>
</tr>
<tr>
<td style="text-align:right"><strong>TIPO AFILIADO</strong> :</td><td style="text-align:left">'.$paciente['afiliado'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>EMAIL</strong> :</td><td style="text-align:left">'.$paciente['email'].'</td>
</tr>
<tr>
<td style="text-align:right"><strong>CODIGO CIE-10</strong> :</td>
<td style="text-align:left">
<ol>
';
foreach($show_diagno_pat->result() as $cod)
{
$html .= '
<li>'.$cod->code.' </li> 

';
}



$html .= '
</ol>
</td>

</tr>
<tr>
<td style="text-align:right"><strong>ESPECIALIDAD</strong> :</td><td style="text-align:left">'.$area.'</td>
</tr>

</table>
</fieldset>
</div>
<div style="font-size:10px;width: 100%;text-align:center">

TOTAL RECLAMADO : <b>RD$ '.number_format("$row1->tsubtotal",2).'</b>&nbsp;&nbsp;&nbsp;
ASEGURADORA PAGARA : <b>RD$ '.number_format("$row1->totpagseg",2).'</b>&nbsp;&nbsp;&nbsp;
 EL PACIENTE PAGARA : <b>RD$ '.number_format("$row1->totpagpa",2).'</b>&nbsp;&nbsp;&nbsp;
 </div>


<table cellspacing="3" cellpadding="4">

	<tr>
		<td> <p><hr style="border:1px solid black"/></p><span style="font-size:11px"><strong>Firma autorizada y sello del reclamente</strong></span> </td>
		<td> <p><hr style="border:1px solid black;"/></p><span style="font-size:11px"><strong>Nombre y cedula del afiliado o familiar responsable</strong></span></td>
		
	</tr>
</table>
<p style="font-size:11px"><strong>Por este medio autorizo a cualquier prestador de servicios de salud, asi como organizaciones, empleador, entre otros, a suministrar toda informacion que sea solicitada por la administradora de riesgos de salud, correspondiente a todo tratamiento, servicio estudio, laboratorio, diagnostico o beneficios prestados a mi favor.</strong></p>



';
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
  
    // ---------------------------------------------------------    
  
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $pdf->Output();    
  
    //============================================================+
    // END OF FILE
    //============================================================+
    }
//--------------------------------------------------------------------------------------------------------------------------------------

}