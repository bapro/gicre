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
$this->load->model('model_auditoria_medica');
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
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$data['id_historial'] =$historial_id;
$data['id_user'] =$id_user;
$data['ssr'] = $this->model_admin->data_ssr_by_id($id);
$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr_nav'] = $this->model_admin->getSSR($historial_id);
//$this->load->view('admin/historial-medical/ante_ssr/navegador',$data);
$this->load->view('admin/historial-medical1/ante_ssr/ant_ssr_data', $data);
$this->load->view('admin/historial-medical1/ante_ssr/footer');
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
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
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







public function saveUpPedia()
{
$historial_id= $this->input->post('hist_id');
$data['id_historial']=$historial_id;
$insert_date=date("Y-m-d H:i:s");
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


public function show_oftalmologia(){
$id= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['user']=$id_user;
$data['show_oft'] = $this->model_admin->showOftalById($id);
$this->load->view('admin/historial-medical1/oftalmologia/data', $data);
$this->load->view('admin/historial-medical1/oftalmologia/footer', $data);
}



public function show_enfermedad(){
$id_enf= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['centro_name']=$this->db->select('name')->where('id_m_c',$this->uri->segment(5))->get('medical_centers')->row('name');
$data['user']=$id_user;
$data['show_enf'] = $this->model_admin->show_enfermedad($id_enf);
$data['causa']=$this->model_admin->getCausa();
$this->load->view('admin/historial-medical1/enfermedad-actual/data', $data);
$this->load->view('admin/historial-medical1/enfermedad-actual/footer');
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
  $query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('enf_motivo')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('enf_motivo'),
	   'inserted_by' => $this->input->post('updated_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('updated_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
 }
 

 
 public function SaveUpDermatologia()
{
	$insert_date=date("Y-m-d H:i:s");
	$id=$this->input->post('id_derma');
   $saved = array(
'derma_tipo'=> $this->input->post('derma_tipo'),
'derma_tipo_text'=> $this->input->post('derma_tipo_text'),
'derma_morfologia'=> $this->input->post('derma_morfologia'),
'derma_resto'=> $this->input->post('derma_resto'),
'derma_morfologia_text'=> $this->input->post('derma_morfologia_text'),
'derma_resto_text'=> $this->input->post('derma_resto_text'),
'derma_intero'=> $this->input->post('derma_intero'),
'derma_intero_text'=> $this->input->post('derma_intero_text'),
'derma_otros_datos'=> $this->input->post('derma_otros_datos'),
'derma_otros_datos_text'=> $this->input->post('derma_otros_datos_text'),
'derma_diagno_der_ini'=> $this->input->post('derma_diagno_der_ini'),
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=> $insert_date
   );
  
   $this->model_admin->SaveUpDermatologia($id,$saved);
 /* $query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('enf_motivo')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('enf_motivo'),
	   'inserted_by' => $this->input->post('updated_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('updated_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}*/
 } 
 
 
 
 

public function showRehabById(){
$id=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$data['showRehabById'] = $this->model_admin->showRehabById($id);
$this->load->view('admin/historial-medical1/rehabilitation/data-rehab', $data);
$this->load->view('admin/historial-medical1/rehabilitation/footer');
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
$data['id_user']=$id_user;
$data['user']=$id_user;
$data['id_exam_fis']=$this->uri->segment(3);
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['perfil']=$user['perfil'];
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);
$data['show_signo_by_id'] = $this->model_admin->show_signo_by_id($id_enf);
$data['show_neuro'] = $this->model_admin->showNeurologiaById($id_enf);
$data['show_examenes_ambas'] = $this->model_admin->showExamAmbasById($id_enf);
$data['show_examene_pelv'] = $this->model_admin->showExamPelById($id_enf);
$data['edad']=$this->db->select('edad')->where('id_p_a',$historial_id)
->get('patients_appointments')->row('edad');
$this->load->view('admin/historial-medical1/examen-fisico/data', $data);
$this->load->view('admin/historial-medical1/examen-fisico/footer', $data);
}


  public function loadSigno()
  { 
  $data['edad']=$this->db->select('edad')->where('id_p_a',$this->input->post('historial_id'))
  ->get('patients_appointments')->row('edad');
 $data['signo_by_id'] = $this->model_admin->show_signo_by_id($this->input->post('id_exam_fis')); 
 $this->load->view('admin/historial-medical1/examen-fisico/signo_result', $data);
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
   'glicemia'=> $this->input->post('glicemiae'),
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
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$data['digest']=$this->model_admin->sistemaDigest();
$data['musculo']=$this->model_admin->sistemaMusculo();
$data['urogenial']=$this->model_admin->sistemaUrogenial();
$data['cardiov']=$this->model_admin->sistemaCardiov();
$data['neuro']=$this->model_admin->sistemaNeuro();
$data['resp']=$this->model_admin->sistemaResp();
$data['endocrino']=$this->model_admin->sistemaEndo();
$data['relativo']=$this->model_admin->sistemaRelat();
$data['show_examsis_by_id'] = $this->model_admin->show_examsis_by_id($id_enf);
$this->load->view('admin/historial-medical1/examen-sistema/data', $data);
$this->load->view('admin/historial-medical1/examen-sistema/footer');
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
$data['centro_medico']=$this->uri->segment(6);
$data['user_id']=$id_user;
$data['user']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$data['centro_name']=$this->db->select('name')->where('id_m_c',$this->uri->segment(6))->get('medical_centers')->row('name');
$data['historial_id']=$historial_id;
$data['id_con']=$id_con;
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['show_con_by_id'] = $this->model_admin->show_con_by_id($id_con);
$this->load->view('admin/historial-medical1/conclusion/data', $data);
$this->load->view('admin/historial-medical1/conclusion/footer', $data);



}  
  
  
  
  
  
  public function SaveUpConcluciones()
{ 
  $insert_date=date("Y-m-d H:i:s");
	$id_cdia= $this->input->post('id_cdia');
 $saveConDia= array(
  'plan'=> $this->input->post('plan'),
  'procedimiento'=> $this->input->post('proced'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
   $this->model_admin->saveUpConclucionDiag($id_cdia,$saveConDia);
//-----------------------------------------------------------------------------------------------------------------------------

//$this->model_admin->deleteCondef($id_cdia);

 /* $diagno_def=$this->input->post('diagno_def');
  
  foreach ($diagno_def as $df) {
$savecd = array(
  'diagno_def'=> $df,
  'p_id'=> $this->input->post('historial_id'),
  'con_id_link'=> $id_cdia
  
 );
$this->model_admin->SaveConDef($savecd);
}*/
 //-------------------------------------------------------------------------------------------------
 /*$this->model_admin->deleteConPro($id_cdia);
   $procedimiento= $this->input->post('procedimiento');
     foreach ($procedimiento as $pro) {
$savecp = array(
  'procedimiento'=> $pro,
  'p_id'=> $this->input->post('historial_id'),
  'cond_id_link'=> $last_id_con
 );
$this->model_admin->SaveConPro($savecp);
}*/

} 
 



public function showSelectContP(){
$id=$this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$data['showSelectContP1'] = $this->model_admin->showSelectContP1($id);
$data['showSelectContP2'] = $this->model_admin->showSelectContP2($id);
$data['showSelectContP3'] = $this->model_admin->showSelectContP3($id);
$data['showSelectContP4'] = $this->model_admin->showSelectContP4($id);
$data['showSelectContP5'] = $this->model_admin->showSelectContP5($id);
$data['showSelectContP6'] = $this->model_admin->showSelectContP6($id);
$data['showSelectContP7'] = $this->model_admin->showSelectContP7($id);
$data['showSelectContP8'] = $this->model_admin->showSelectContP8($id);
$data['showSelectContP9'] = $this->model_admin->showSelectContP9($id);
$this->load->view('admin/historial-medical1/control-prenatal/data',$data);
$this->load->view('admin/historial-medical1/control-prenatal/footer');
}


public function saveAntecedentes(){
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
'operator'=> $this->input->post('user_id'),
'update_by'=> $this->input->post('user_id'),
'id_user'=> $this->input->post('user_id')
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
'inserted_by'=> $this->input->post('user_id'),
'update_by'=> $this->input->post('user_id')
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
'inserted_by'=> $this->input->post('user_id')
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
  'historial_id'=> $this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('user_id'),
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
//'otro_infeccion'=> $this->input->post('otro_infeccion'), 
'otro_infeccion1'=> $this->input->post('otro_infeccion1'), 
'cant_sang'=> $this->input->post('cant_sang'),
'nuligesta'=> $this->input->post('nuligesta'),
'complica'=> $this->input->post('complica'),
'complica_text'=> $this->input->post('complica_text'),
'complica_dur'=> $this->input->post('complica_dur'),
'complica_dur_text'=> $this->input->post('complica_dur_text'),
'infec_tran'=> $this->input->post('infec_tran'),
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'hist_id'=> $this->input->post('hist_id'),
'date_time'=> $insert_date,
'update_time'=> $insert_date,
'infeccion1'=> $sifilisc1,
'infeccion2'=> $gonorreac1,
'infeccion3'=> $clamidiac1,
'id_user'=>$this->input->post('user_id')
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
'hist_id'=> $this->input->post('hist_id'),
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date,
'id_user'=>$this->input->post('user_id')
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
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'hist_id'=> $this->input->post('hist_id'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date,
'id_user'=> $this->input->post('user_id')
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
  'inserted_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
  'updated_by'=> $this->input->post('user_id'),
  'updated_time'=> $insert_date,
  'user_id'=> $this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro_medico')
   );
  
   $this->model_admin->saveEnfermedad($saveEnf);
  
  $query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('enf_motivo')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('enf_motivo'),
	   'inserted_by' => $this->input->post('user_id'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('user_id'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
  
  
  
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
   'inserted_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
  'updated_by'=> $this->input->post('user_id'),
  'updated_time'=> $insert_date,
  'id_user'=> $this->input->post('user_id')
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
  'glicemia'=> $this->input->post('glicemia'),
'radio'=> $this->input->post('radio_signo'),
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
    'updated_by'=> $this->input->post('user_id'),
  'updated_time'=> $insert_date,
  'id_user'=> $this->input->post('user_id')
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
  'inserted_by'=> $this->input->post('user_id'),
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
  'inserted_by'=> $this->input->post('user_id'),
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
  'inserted_by'=> $this->input->post('user_id'),
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
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date,
'id_user'=> $this->input->post('user_id')


);
$this->model_admin->saveExameneSistema($saveExamSis);
 $this->model_admin->DeleteEmptyExameneSistema($this->input->post('hist_id'));
 

 
//save examen dermatologia
  $saveDerma= array(
'derma_tipo'=> $this->input->post('derma_tipo'),
'derma_tipo_text'=> $this->input->post('derma_tipo_text'),
'derma_morfologia'=> $this->input->post('derma_morfologia'),
'derma_resto'=> $this->input->post('derma_resto'),
'derma_morfologia_text'=> $this->input->post('derma_morfologia_text'),
'derma_resto_text'=> $this->input->post('derma_resto_text'),
'derma_intero'=> $this->input->post('derma_intero'),
'derma_intero_text'=> $this->input->post('derma_intero_text'),
'derma_otros_datos'=> $this->input->post('derma_otros_datos'),
'derma_otros_datos_text'=> $this->input->post('derma_otros_datos_text'),
'derma_diagno_der_ini'=> $this->input->post('derma_diagno_der_ini'),
'historial_id'=>$this->input->post('hist_id'),
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date,
'user_id'=> $this->input->post('user_id')

);
$this->model_admin->saveDermatologia($saveDerma);
//save conclusion diagnostic

 $saveConDia= array(
  'plan'=> $this->input->post('plan'),
  'procedimiento'=> $this->input->post('proced'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'historial_id'=>$this->input->post('hist_id'),
   'centro_medico'=>$this->input->post('centro_medico'),
  'id_user'=>$this->input->post('user_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'updated_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
  'updated_time'=> $insert_date
   );
   $this->model_admin->saveConclucionDiag($saveConDia);
   $last_id_con=$this->db->select('id_cdia')->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
//-------------------------------------------------------


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
  'inserted_by' => $this->input->post('user_id'),
  'updated_by' => $this->input->post('user_id'),
   'historial_id' =>$this->input->post('hist_id'),
 'inserted_time'=> $insert_date,
 'updated_time'=> $insert_date,
 'id_user'=> $this->input->post('user_id')
 
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  'inserted_by' => $this->input->post('user_id'),
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
  
  
//**********************SAVE OFTALMOLOGIA************************************************************
  $saveof= array(
  'od_sin_con'=> $this->input->post('od_sin_con'),
  'od_con_cor'=> $this->input->post('od_con_cor'),
  'od_mas_o_meno'=> $this->input->post('od_mas_o_meno'),
  'od_cor_act'=> $this->input->post('od_cor_act'),
  'os_sin_con'=> $this->input->post('os_sin_con'),
  'os_con_cor'=> $this->input->post('os_con_cor'),
  'os_mas_o_meno'=> $this->input->post('os_mas_o_meno'),
  'os_cor_act'=> $this->input->post('os_cor_act'),
    'retine1'=> $this->input->post('retine1'),
  'retine2'=> $this->input->post('retine2'),
  'retine3'=> $this->input->post('retine3'),
   'retine4'=> $this->input->post('retine4'),
 'retine5'=> $this->input->post('retine5'),
 'retine6'=> $this->input->post('retine6'),
  'retine7'=> $this->input->post('retine7'),
 'retine8'=> $this->input->post('retine8'),
  'masomenos1'=> $this->input->post('masomenos1'),
  'masomenos2'=> $this->input->post('masomenos2'),
  'masomenos3'=> $this->input->post('masomenos3'),
   'masomenos4'=> $this->input->post('masomenos4'),
 'masomenos5'=> $this->input->post('masomenos5'),
 'masomenos6'=> $this->input->post('masomenos6'),
  'masomenos7'=> $this->input->post('masomenos7'),
 'masomenos8'=> $this->input->post('masomenos8'),
'ppm'=> $this->input->post('ppm'),
'converg'=> $this->input->post('converg'),
'ducvers'=> $this->input->post('ducvers'),
'convertest'=> $this->input->post('convertest'),
'od_espera_r'=> $this->input->post('od_espera_r'),
 'od_espera'=> $this->input->post('od_espera'),
'od_cilindro'=> $this->input->post('od_cilindro'),
'od_cilindro_r'=> $this->input->post('od_cilindro_r'),
'eje_od'=> $this->input->post('eje_od'),
'add_od'=> $this->input->post('add_od'),
'vision_od'=> $this->input->post('vision_od'),
'espera_os'=> $this->input->post('os_espera'),
 'os_espera_r'=> $this->input->post('os_espera_r'),
'cilindro_os'=> $this->input->post('os_cilindro'),
'os_cilindro_r'=> $this->input->post('os_cilindro_r'),
'eje_os'=> $this->input->post('eje_os'),
'add_os'=> $this->input->post('add_os'),
'vision_os'=> $this->input->post('vision_os'), 

'conj1'=> $this->input->post('conj1'), 
'conj2'=> $this->input->post('conj2'), 
'cornea1'=> $this->input->post('cornea1'), 
'cornea2'=> $this->input->post('cornea2'), 
'pup1'=> $this->input->post('pup1'), 
'pup2'=> $this->input->post('pup2'), 
'crist1'=> $this->input->post('crist1'), 
'crist2'=> $this->input->post('crist2'), 
'vitreo1'=> $this->input->post('vitreo1'), 
'vitreo2'=> $this->input->post('vitreo2'), 
'fondos1'=> $this->input->post('fondos1'), 
'fondos2'=> $this->input->post('fondos2'),
'ojo'=>"ojo-".time(). ".png",
'fondo'=>"fondo-".time(). ".png",
'id_historial '=> $this->input->post('hist_id'), 
'inserted_by'=> $this->input->post('user_id'), 
'inserted_time'=>$insert_date, 
'updated_by'=> $this->input->post('user_id'),
'updated_time'=>$insert_date,
'user_id'=>$this->input->post('user_id')
);
  	$this->model_admin->saveOftalmologia($saveof);
	
	//---------------------upload oyo----------------------------------------------
$upload_dir = './assets/img/oftal/';
$file1 = $upload_dir ."ojo-". time() . ".png";
$data1 = $_POST['canvasOj'];
$data1 = substr($data1,strpos($data1,",")+1);
$data1 = base64_decode($data1);
file_put_contents($file1, $data1);

//---------------------upload fondo----------
$file2 = $upload_dir ."fondo-". time() . ".png";
$data2 = $_POST['canvasFo'];
$data2 = substr($data2,strpos($data2,",")+1);
$data2 = base64_decode($data2);
file_put_contents($file2, $data2);


		
$this->model_admin->delete_empty_oftal();
$this->model_admin->delete_empty_derma();
$this->model_admin->delete_empty_obs();
//**********************************************************************************


//-----INSERT NEW SELECT NAME IS NOT EXIST IN DROP_DOWN_TABLE


 	  $query1 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('neuro_s'),'location'=>26));
	if($query1->num_rows() == 0)
	{
		$save = array(
       'name'=>$this->input->post('neuro_s'),
	    'location'=>26
	   );
		$this->model_admin->save_new_historial_dropdown($save);
	}
	
	
	  $query2 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('cabeza'),'location'=>27));
	if($query2->num_rows() == 0)
	{
		$save2 = array(
       'name'=>$this->input->post('cabeza'),
	    'location'=>27
	   );
		$this->model_admin->save_new_historial_dropdown($save2);
	}
	
	
		  $query3 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('cuello'),'location'=>9));
	if($query3->num_rows() == 0)
	{
		$save3 = array(
       'name'=>$this->input->post('cuello'),
	    'location'=>9
	   );
		$this->model_admin->save_new_historial_dropdown($save3);
	}
	
	 $query4 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('abd_insp'),'location'=>28));
	if($query4->num_rows() == 0)
	{
		$save4 = array(
       'name'=>$this->input->post('abd_insp'),
	    'location'=>28
	   );
		$this->model_admin->save_new_historial_dropdown($save4);
	}
	
	
	$query5 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('ausc'),'location'=>22));
	if($query5->num_rows() == 0)
	{
		$save5 = array(
       'name'=>$this->input->post('ausc'),
	    'location'=>22
	   );
		$this->model_admin->save_new_historial_dropdown($save5);
	}
	
	$query6 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('perc'),'location'=>22));
	if($query6->num_rows() == 0)
	{
		$save6 = array(
       'name'=>$this->input->post('perc'),
	    'location'=>22
	   );
		$this->model_admin->save_new_historial_dropdown($save6);
	}
	
	
	
	$query7 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('palpa'),'location'=>22));
	if($query7->num_rows() == 0)
	{
		$save7 = array(
       'name'=>$this->input->post('palpa'),
	    'location'=>22
	   );
		$this->model_admin->save_new_historial_dropdown($save7);
	}
	
	
		
	$query8 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('ext_sup'),'location'=>18));
	if($query8->num_rows() == 0)
	{
		$save8 = array(
       'name'=>$this->input->post('ext_sup'),
	    'location'=>18
	   );
		$this->model_admin->save_new_historial_dropdown($save8);
	}
	
	
	
	$query9 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('torax'),'location'=>18));
	if($query9->num_rows() == 0)
	{
		$save9 = array(
       'name'=>$this->input->post('torax'),
	    'location'=>18
	   );
		$this->model_admin->save_new_historial_dropdown($save9);
	}
	
	$query10 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('ext_inf'),'location'=>18));
	if($query10->num_rows() == 0)
	{
		$save10 = array(
       'name'=>$this->input->post('ext_inf'),
	    'location'=>18
	   );
		$this->model_admin->save_new_historial_dropdown($save10);
	}
  
  		$query11 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('cervix'),'location'=>29));
	if($query11->num_rows() == 0)
	{
		$save11 = array(
       'name'=>$this->input->post('cervix'),
	    'location'=>29
	   );
		$this->model_admin->save_new_historial_dropdown($save11);
	}
	
	
	 $query12 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('inspection_vulval'),'location'=>24));
	if($query12->num_rows() == 0)
	{
		$save12 = array(
       'name'=>$this->input->post('inspection_vulval'),
	    'location'=>24
	   );
		$this->model_admin->save_new_historial_dropdown($save12);
	}
	
	
	
		 $query13 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('rectal'),'location'=>14));
	if($query13->num_rows() == 0)
	{
		$save13 = array(
       'name'=>$this->input->post('rectal'),
	    'location'=>14
	   );
		$this->model_admin->save_new_historial_dropdown($save13);
	}
	
	
	
	 $query14 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('genitalm'),'location'=>15));
	if($query14->num_rows() == 0)
	{
		$save14 = array(
       'name'=>$this->input->post('genitalm'),
	    'location'=>15
	   );
		$this->model_admin->save_new_historial_dropdown($save14);
	}
	
	
	
	 $query15 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('genitalf'),'location'=>16));
	if($query15->num_rows() == 0)
	{
		$save15 = array(
       'name'=>$this->input->post('genitalf'),
	    'location'=>16
	   );
		$this->model_admin->save_new_historial_dropdown($save15);
	}
	
	
	 $query16 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('vagina'),'location'=>17));
	if($query16->num_rows() == 0)
	{
		$save16 = array(
       'name'=>$this->input->post('vagina'),
	    'location'=>17
	   );
		$this->model_admin->save_new_historial_dropdown($save16);
	}
	
	
		
	 $query17 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('mama_izq1'),'location'=>11));
	if($query17->num_rows() == 0)
	{
		$save17 = array(
       'name'=>$this->input->post('mama_izq1'),
	    'location'=>11
	   );
		$this->model_admin->save_new_historial_dropdown($save17);
	}
	
	
		 $query18 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('mama_izq2'),'location'=>11));
	if($query18->num_rows() == 0)
	{
		$save18 = array(
       'name'=>$this->input->post('mama_izq2'),
	    'location'=>11
	   );
		$this->model_admin->save_new_historial_dropdown($save18);
	}
	
	$query19 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('region_ax1'),'location'=>12));
	if($query19->num_rows() == 0)
	{
		$save19 = array(
       'name'=>$this->input->post('region_ax1'),
	    'location'=>12
	   );
		$this->model_admin->save_new_historial_dropdown($save19);
	}
	
	
		$query20 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('region_ax2'),'location'=>12));
	if($query20->num_rows() == 0)
	{
		$save20 = array(
       'name'=>$this->input->post('region_ax2'),
	    'location'=>12
	   );
		$this->model_admin->save_new_historial_dropdown($save20);
	}	
		
		
		
		
		$query1 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sisneuro'),'location'=>1));
	if($query1->num_rows() == 0)
	{
		$save1 = array(
       'name'=>$this->input->post('sisneuro'),
	    'location'=>1
	   );
		$this->model_admin->save_new_historial_dropdown($save1);
	}

	
	$query2 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('siscardio'),'location'=>2));
	if($query2->num_rows() == 0)
	{
		$save2 = array(
       'name'=>$this->input->post('siscardio'),
	    'location'=>2
	   );
		$this->model_admin->save_new_historial_dropdown($save2);
	}

	
		$query3 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sist_uro'),'location'=>3));
	if($query3->num_rows() == 0)
	{
		$save3 = array(
       'name'=>$this->input->post('sist_uro'),
	    'location'=>3
	   );
		$this->model_admin->save_new_historial_dropdown($save3);
	}
	
	
	$query4 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sis_mu_e'),'location'=>4));
	if($query4->num_rows() == 0)
	{
		$save4 = array(
       'name'=>$this->input->post('sis_mu_e'),
	    'location'=>4
	   );
		$this->model_admin->save_new_historial_dropdown($save4);
	}
	
	$query5 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sist_resp'),'location'=>7));
	if($query5->num_rows() == 0)
	{
		$save5 = array(
       'name'=>$this->input->post('sist_resp'),
	    'location'=>7
	   );
		$this->model_admin->save_new_historial_dropdown($save5);
	}
	
	
	$query6 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sist_diges'),'location'=>19));
	if($query6->num_rows() == 0)
	{
		$save6 = array(
       'name'=>$this->input->post('sist_diges'),
	    'location'=>19
	   );
		$this->model_admin->save_new_historial_dropdown($save6);
	}
	
	
	$query7 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sist_endo'),'location'=>21));
	if($query7->num_rows() == 0)
	{
		$save7 = array(
       'name'=>$this->input->post('sist_endo'),
	    'location'=>21
	   );
		$this->model_admin->save_new_historial_dropdown($save7);
	}
	
	$query8 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('sist_rela'),'location'=>22));
	if($query8->num_rows() == 0)
	{
		$save8 = array(
       'name'=>$this->input->post('sist_rela'),
	    'location'=>22
	   );
		$this->model_admin->save_new_historial_dropdown($save8);
	}
	
	
		$query9 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('derma_tipo'),'location'=>30));
	if($query9->num_rows() == 0)
	{
		$save9 = array(
       'name'=>$this->input->post('derma_tipo'),
	    'location'=>30
	   );
		$this->model_admin->save_new_historial_dropdown($save9);
	}
	

	
		$query11 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('derma_morfologia'),'location'=>31));
	if($query11->num_rows() == 0)
	{
		$save11 = array(
       'name'=>$this->input->post('derma_morfologia'),
	    'location'=>31
	   );
		$this->model_admin->save_new_historial_dropdown($save11);
	}
	
	
	$query12 = $this->db->get_where('historial_dropdown',array('name'=>$this->input->post('derma_intero'),'location'=>32));
	if($query12->num_rows() == 0)
	{
		$save12 = array(
       'name'=>$this->input->post('derma_intero'),
	    'location'=>32
	   );
		$this->model_admin->save_new_historial_dropdown($save12);
	}
	
	
	$this->model_admin->delete_empty_historial_dropdown();


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
'oyo' => $this->input->post('oyo'),
'operator' => $this->input->post('operator'),
'farmacia' => $farmacia_id, 
'branch' => $branch_id,
'insert_date'=> $insert_date,
'historial_id' => $historial_id,
'updated_by' => $this->input->post('operator'),
'updated_time'=> $insert_date,
'singular_id'=>1
);

$this->model_admin->SaveFormIndicaciones($save);

$query = $this->db->get_where('medicaments',array('name'=>$this->input->post('medicamento1')));
	if($query->num_rows() == 0)
	{
		$save = array(
       'name'=>$this->input->post('medicamento1')
	   );
		$this->model_admin->save_new_medicaments($save);
	}
	
	
	
	$query = $this->db->get_where('presentacion',array('name'=>$this->input->post('presentacion')));
	if($query->num_rows() == 0)
	{
		$savep = array(
       'name'=>$this->input->post('presentacion')
	   );
		$this->model_admin->save_new_presentacion($savep);
	}
	

}



public function UpdateFormIndicaciones(){
$insert_date=date("Y-m-d H:i:s");
$id=$this->input->post('id');
if($this->input->post('via') !='OFTALMICA')
{
	$oyo="";
} else {
	$oyo=$this->input->post('oyo');
}
$save = array(
'medica'=> $this->input->post('medicamento1'),
'presentacion'=> $this->input->post('presentacion'),
'frecuencia'=> $this->input->post('frecuencia'),
'cantidad' => $this->input->post('cantidad'),
'via' => $this->input->post('via'),
'oyo' => $oyo,
'updated_by' => $this->input->post('operator'),
'farmacia' => $this->input->post('farmacia'), 
'branch' => $this->input->post('branch'),
'updated_time'=> $insert_date

);

$this->model_admin->UpdateFormIndicaciones($save,$id);

}



public function UpdateFormIndEst(){
$insert_date=date("Y-m-d H:i:s");
$id=$this->input->post('id');
$save = array(
'estudio'=> $this->input->post('study2'),
'cuerpo'=> $this->input->post('cuerpo2'),
'lateralidad'=> $this->input->post('lateralidad2'),
'observacion' =>  $this->input->post('observaciones2'),
'updated_by' =>$this->input->post('operator'),
'updated_time'=> $insert_date

);

$this->model_admin->UpdateFormIndEst($save,$id);

}









public function new_indication()

{  $data['historial_id']=$this->input->post('historial_id');
   $data['area']=$this->input->post('area');
   $data['user_id']=$this->input->post('user_id');
   $data['count_singular']=$this->model_admin->Countsingular();
	$data['singularid'] = $this->model_admin->print_recetas($this->input->post('historial_id'));
	$this->load->view('admin/historial-medical1/recetas/NewIndicationOne', $data);
}

public function allRecetas()

{ 
$data['historial_id']=$this->input->post('historial_id');
$data['area']=$this->input->post('area');
$data['user_id']=$this->input->post('user_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$data['tot']=$this->model_admin->hist_count_recetas($this->input->post('historial_id'));
$data['IndicacionesPrevias'] = $this->model_admin->IndicacionesPrevias($this->input->post('historial_id'));
$this->load->view('admin/historial-medical1/recetas/all-patients-recetas', $data);
}



public function allEstudios()
{ 
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id ;
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);
$data['area']=$this->input->post('area');
$data['user_id']=$this->input->post('user_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/estudios/NewIndicationEs',$data);
}









public function getSuc()
{
	$id_esp=$this->input->post('id_esp');
	$data['branches'] = $this->model_admin->branches1($id_esp);
	$this->load->view('admin/getSuc', $data);
	 //echo json_encode ($query);
}

public function getSucEdit()
{
	$id_esp=$this->input->post('id_esp');
	$data['id']=$id_esp;
	$data['branches'] = $this->model_admin->branches1($id_esp);
	$this->load->view('admin/historial-medical1/recetas/edit_branch', $data);
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



public function delete_tutor(){
$query = $this->model_admin->delete_tutor($this->input->post('id'));

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
'updated_by' => $this->input->post('operators'),
 'insert_date'=> $insert_date,
  'updated_time'=> $insert_date
 
  );
$this->model_admin->SaveFormIndicacionesEstudios($save);
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($historial_id);
$data['num_count_es']=$this->model_admin->hist_count_es($historial_id);
$this->load->view('admin/historial-medical1/estudios/NewIndicationEs', $data);

}



 
 
 
 public function DeleteEsudios(){
$id_lab  = $this->input->post('id');
$query = $this->model_admin->DeleteEsudios($id_lab);

}



public function allLaboratorios()
{
$data['area'] = $this->input->post('area');	
$data['user_id'] = $this->input->post('user_id');		
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$data['IndicacionesLab'] = $this->model_admin->IndicacionesLab($historial_id);
$data['num_count_lab']=$this->model_admin->hist_count_lab($historial_id);
$this->load->view('admin/historial-medical1/laboratorios/NewIndicationLab', $data);
}





public function allLaboratoriosInd()
{
$data['id_historial'] = $this->input->post('historial_id');
$data['operator'] = $this->input->post('operator');
$data['user_id'] = $this->input->post('user_id');
$data['areaid']=$this->db->select('area')->where('first_name',$this->input->post('user_id'))->get('doctors')->row('area');
$data['laboratories'] = $this->model_admin->laboratories();
$this->load->view('admin/historial-medical1/laboratorios/allLaboratoriosInd', $data);
}


public function check_lab()
{
$labid= $this->input->post('labid');
echo $labid;
$checked = array(
 'printing' =>$this->input->post('print')
);
$this->model_admin->check_lab($checked,$labid);
}




public function check_recetas()
{
$recid= $this->input->post('recid');
$checked = array(
 'singular_id' =>$this->input->post('print')
);
$this->model_admin->check_recetas($checked,$recid);
}




public function seguro_name()
{
	$seguro_medico_id=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico_id)->get('seguro_medico')->row('title');
	$data['seguro_medico'] =$sm;
	$query = $this->model_admin->get_input($seguro_medico_id);
	$data['GET_INPUT'] =$query;
	$this->load->view('admin/pacientes-citas/get-seguro-codigo', $data);
	 //echo json_encode ($query);
}



public function search_patient_tutor()
{
$nec=$this->input->get('nec');
$nec="NEC-$nec";
$id_patient=$this->input->get('id_patient');
$data['id_patient']=$id_patient;
$if_relacion_exist=$this->db->select('relacion')->where('id_nino',$id_patient)->get('tutor')->row('relacion');

$sql ="SELECT name FROM relationship WHERE name NOT IN (SELECT relacion FROM tutor where id_nino=$id_patient)";
$query = $this->db->query($sql);
$data['query']=$query;
$data['patient_tutors']=$this->model_admin->search_patient_tutor($nec); 
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
    $this->model_admin->savePreTutor($save);
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
$executionStartTime = microtime(true);
if(is_null($this->input->get('id')))
{

//$this->load->view('admin/examenf');    

}
else
{
$id=$this->input->get('id');
$user_id=$this->input->get('id_user');
$nec="NEC-$id";
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$query_admedicall=$this->model_admin->NecPatient($nec);	

$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);
$this->load->view('admin/pacientes-citas/search-patient-result-nec', $data);


}
}



public function view_input()
{
	$idpatient=$this->input->post('idpatient');
	$data['idpatient']=$idpatient;
	$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($idpatient);
	$seguro_medico=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');;
	$data['seguro_medico'] =$sm;
	//$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
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




public function modal_view_citas()
{
	$idpatient= $this->uri->segment(3);
	$query = $this->model_admin->RendezVous($idpatient);
	$data['rendez_vous']=$query;
	$data['number_cita']=count($query);
	$this->load->view('admin/pacientes-citas/modal_view_citas',$data);
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
'codigoprestado' =>$this->input->post('codigoprestado'),
'paciente' =>$this->input->post('patient_id'),

'fecha' =>$this->input->post('fecha'),
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),

'inserted_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'update_date' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'id_rdv' =>$this->input->post('id_apoint')
);
$last_bill_id=$this->model_admin->SaveBill2($save2);
$this->session->set_userdata('last_bill_id',$last_bill_id);
$this->session->set_userdata('medico',$this->input->post('medico'));

$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('centro_medico',$this->input->post('centro_medico'));
$this->session->set_userdata('centro_type',$centro_type);
$this->session->set_userdata('is_admin',$this->input->post('is_admin'));
$exequatur=$this->db->select('exequatur')->where('first_name',$this->input->post('medico'))->get('doctors')->row('exequatur');
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
$medico =$this->input->post('medico');
$seguro_medico =$this->input->post('seguro_medico');

for ($i = 0; $i < count($service); ++$i ) {
$serv = $service[$i];
$cant = $cantidad[$i];
$pre = $preciouni[$i];
$sub = $subtotal[$i];
$totpas = $totalpaseg[$i];
$desc = $descuento[$i];
$totpap = $totpapat[$i];
$medico2 = $medico[$i];
$seguro = $seguro_medico[$i];
$save= array(
'pat_id' =>$this->input->post('patient_id'),
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id,
'medico2' =>$medico,
'seguro' =>$seguro_medico,
'filter' =>date("Y-m-d"),
'created_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'updated_time' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by')
);
$this->model_admin->SaveBill($save);
}
$this->model_admin->DeleteEmptyBill();
//===========================================
}




public function billing_print_view1()
{
	$this->session->set_userdata('last_bill_id',$this->uri->segment(3));
	$get=$this->db->select('medico,centro_medico')->where('idfacc',$this->uri->segment(3))->get('factura2')->row_array();
	$this->session->set_userdata('medico',$get['medico']);
	$this->session->set_userdata('centro_medico',$get['centro_medico']);
	$centro_type=$this->db->select('type')->where('id_m_c',$get['centro_medico'])->get('medical_centers')->row('type');
	$this->session->set_userdata('centro_type',$centro_type);
	$this->session->set_userdata('is_admin',$this->uri->segment(4));
	redirect('admin_medico/billing_print_view');
}



public function billing_print_view()
{
$idfacc=$this->session->userdata['last_bill_id'];
$patient_id=$this->db->select('paciente')->where('idfacc',$idfacc)->get('factura2')->row('paciente');
$medico=$this->session->userdata['medico'];
$centro_medico=$this->session->userdata['centro_medico'];
$centro_type=$this->session->userdata['centro_type'];
$data['is_admin']=$this->session->userdata['is_admin'];
$identificar=$this->input->get('identificar');
$data['idfacc']=$idfacc;
$data['centro_type']=$centro_type;
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($patient_id,$medico,$centro_medico);
$data['procedimiento'] =$this->db->select('procedimiento')->
where('historial_id',$patient_id)->
where('id_user',$medico)->
where('centro_medico',$centro_medico)->
get('h_c_conclusion_diagno')->row('procedimiento');
$data['billing1']=$this->model_admin->showBilling1($idfacc);
$data['billing2']=$this->model_admin->showBilling2($idfacc);
if($centro_type=="privado"){
$this->load->view('medico/billing/bill/print_view',$data);
}
 else {
	 
$this->load->view('medico/billing/bill/centro/print_view',$data);
}

$this->load->view('medico/billing/bill/print_view_data',$data);
}



public function print_billing()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$idfacc= $this->uri->segment(3);
$print= $this->uri->segment(4);
$pm=$this->db->select('paciente,medico,centro_medico')->where('idfacc',$idfacc)->get('factura2')->row_array();
 $this->data['last_bill_id']=$idfacc;
 $this->data['show_diagno_pat']=$this->model_admin->show_diagno_pat($pm['paciente'],$pm['medico'],$pm['centro_medico']);

 $this->data['procedimiento'] =$this->db->select('procedimiento')->
where('historial_id',$pm['paciente'])->
where('id_user',$pm['medico'])->
where('centro_medico',$pm['centro_medico'])->
get('h_c_conclusion_diagno')->row('procedimiento');

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
$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($idt['paciente'],$id_user);
$data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($idt['paciente']);
$data['billings2']=$this->model_admin->ViewFact2($id);
$data['billings']=$this->model_admin->ViewFact($id);
//$data['diag_pro']=$this->model_admin->Diag_pro();
//$data['diag_pres']=$this->model_admin->Diag_pres();
$this->load->view('admin/pacientes-citas/header_cita',$data);
if($type=="privado"){
$this->load->view('admin/billing/bill/bill',$data);
} else{
$this->load->view('admin/billing/bill/centro/bill',$data);	
}
}



public function print_ars_fac_found()
{
	$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
	$this->data['last_id'] =$this->uri->segment(3);
	$this->data['invoice'] = $this->model_admin->print_ars_fac_found($this->uri->segment(3));
	$this->data['nota_ncf'] = $this->model_admin->getNcf($this->uri->segment(3));
    $html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
	$mpdf->WriteHTML($html);
    $mpdf->setFooter('{PAGENO}');
    $mpdf->Output();
}


public function print_billing_()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
$last_id= $this->uri->segment(3);
$print= $this->uri->segment(4);
$last_bill_id=$this->db->select('idfacc,paciente,medico')->where('idfacc',$last_id)->get('factura2')->row_array();
 $this->data['last_bill_id']=$last_bill_id['idfacc'];
 $this->data['show_diagno_pat']=$this->model_admin->show_diagno_pat($last_bill_id['paciente'],$last_bill_id['medico']);
 $this->data['show_diagno_pro_pat'] = $this->model_admin->show_diagno_pro_pat($last_bill_id['paciente']);
 $this->data['billing1']=$this->model_admin->showBilling1($last_bill_id['idfacc']);
 $this->data['billing2']=$this->model_admin->showBilling2($last_bill_id['idfacc']);
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



public function invoice_ars_claim_()
{
	$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
	$new_id_ncf= $this->uri->segment(3);
	 $this->data['last_id'] =$new_id_ncf;
	 $this->data['invoice'] = $this->model_admin->getNewinvoice($new_id_ncf);
	 $this->data['nota_ncf'] = $this->model_admin->getNcf($new_id_ncf);

$html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();


}



public function invoice_ars_p_v_()
{	
$data['desde']=$this->uri->segment(3);
$data['hasta']=$this->uri->segment(4);
$data['after_save']=0;	
$data['areas']=$this->model_admin->get_serv_fac2_doc(0); 
$data['area']="";
$data['area_id']="";
$data['id_ncf'] =$this->uri->segment(5);
$data['invoice'] = $this->model_admin->print_ars_fac_found($this->uri->segment(5));
$data['nota_ncf'] = $this->model_admin->getNcf($this->uri->segment(5));
//$this->load->view('medico/header',$data);
$data['is_admin']= $this->uri->segment(6);
$this->load->view('medico/billing/invoice_ars_claim/after-save',$data);
$this->load->view('medico/billing/invoice_ars_claim/create',$data);


}

public function invoice_ars_p_v()
{
$id_ncf=$this->session->userdata['id_ncf'];
$data['is_admin']= $this->session->userdata['is_admin'];
$data['areas']=$this->model_admin->get_serv_fac2_doc(0); 
$data['area']="";
$data['after_save']=1;
$data['area_id']="";
$data['id_ncf'] =$id_ncf;
$data['invoice'] = $this->model_admin->getNewinvoice($id_ncf);
$data['nota_ncf'] = $this->model_admin->getNcf($id_ncf);
$this->load->view('medico/billing/invoice_ars_claim/after-save',$data);
$this->load->view('medico/billing/invoice_ars_claim/create',$data);


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
	
	
public function delete_all_tarifarios(){
	$del = array(
	'id_seguro'  =>$this->uri->segment(3),
	'id_doctor' => $this->uri->segment(4)
	);

	 $this->model_admin->delete_all_tarifarios($del);
	 $this->model_admin->delete_all_tarifarios_codigo($del);
	 redirect($_SERVER['HTTP_REFERER']);
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
$this->model_admin->delete_input($idp);
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');

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




public function relacion_familiares()
{
$data['tutor']=$this->model_admin->getTutor($this->uri->segment(3));
$this->load->view('admin/pacientes-citas/relacion_familiares',$data);
}





public function save_patients_appointments(){
$photo_location = $this->input->post('photo_location');
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
//$area= $this->db->select('area')->where('first_name',($this->session->userdata['medico_id']))->get('doctors')->row('area');
if($photo_location==2)  
{	
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);  
$logo = rand() . '.' . $extension[1];  
$destination = './assets/img/patients-pictures/' . $logo;		
move_uploaded_file($_FILES['picture']['tmp_name'], $destination); 
} else {
$logo="";	
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
  'inserted_by' =>$this->input->post('creadted_by'),
  'updated_by' =>$this->input->post('creadted_by'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$id_pat=$this->model_admin->save_patient($save1);

//create tutor by remove from pre_tutor to add to tutor



    $query = $this->db->get_where('pre_tutor',array('id_nino'=>$id_pat));
    foreach ($query->result() as $row) {
          $this->db->insert('tutor',$row);
    }
//remove from pre tutor
    $this->model_admin->DeletePreTutor($id_pat);



//------------------------------------------------------------
//$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$this->session->set_userdata('sessionIdPatient',$id_pat);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);
//------------------------------------------------------------
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'), 
'id_patient' => $id_pat, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
//--------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$id_pat,
	'input_name' => $inp,
	'inputf' => $inf,
	'seguro_id' =>$this->input->post('seguro_medico')//when remove a seguro field we remove it in patient seguro field as well with this id
	);
    
	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);

$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain',$centro_type);
$this->session->set_userdata('sessionIdPatientNewCita',$id_pat);
$this->session->set_userdata('sessionIdDocNewCita', $this->input->post('doctor'));
$this->session->set_userdata('sessionIdCentNewCita',$this->input->post('centro_medico'));
$this->session->set_userdata('sessionIdSegNewCita',$this->input->post('seguro_medico'));
$this->session->set_userdata('id_user', $this->input->post('id_user'));	

//------ADD NEW CAUSA IF NOT EXIST----------------------------------------------------------------

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
//------------------------------------------------------------------------------------------------


redirect('admin_medico/redirect_after_save_cita');

}



public function save_patients_appointments_padron(){
	$queryd = $this->db->get_where('patients_appointments',array('ced1'=>$this->input->post('ced1'),'ced2'=>$this->input->post('ced2'),'ced3'=>$this->input->post('ced3')));
		if($queryd->num_rows() > 0)
	{
		$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
      if($perfil=="Admin"){$data['controller']="admin";}else{$data['controller']="medico";}
	  
	  $this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
	} 
	else {	
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
$photo_location = $this->input->post('photo_location');

if($photo_location==2)  
{	
$imgExt = strtolower(pathinfo($_FILES["picture"]['name'],PATHINFO_EXTENSION));
$extension = explode('.', $_FILES['picture']['name']);  
$logo = rand() . '.' . $extension[1];  
$destination = './assets/img/patients-pictures/' . $logo;		
move_uploaded_file($_FILES['picture']['tmp_name'], $destination); 

}
else if($photo_location==1)
{
$logo="padron";	
}
else if ($photo_location==0)
{
$logo="";	
}
else {

	}
$save1 = array(
  'nombre'  => $this->input->post('nombre'),
  'photo'  =>$logo,
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
  'inserted_by' =>$this->input->post('id_user'),
  'updated_by' =>$this->input->post('id_user'),
 'insert_date' => $insert_date,
  'update_date' => $insert_date,
  'filter_date' => $filter_date
  );
$id_pat=$this->model_admin->save_patient($save1);
$this->session->set_userdata('sessionIdPatient',$id_pat);

//$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
   

   $query = $this->db->get_where('pre_tutor',array('id_nino'=>$id_pat));
    foreach ($query->result() as $row) {
          $this->db->insert('tutor',$row);
    }
//remove from pre tutor
    $this->model_admin->DeletePreTutor($id_pat);

	
	
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);

 //------------------------Save cita----------------------------
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' => $id_pat, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'update_by' => $this->input->post('id_user'),
'inserted_by' => $this->input->post('id_user'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

//--------------------------------------

for ($i = 0; $i < count($inputname), $i < count($inputf); ++$i ) {
    $inp = $inputname[$i];
	$inf = $inputf[$i];
   $saveInputs= array(
	'patient_id' =>$id_pat,
	'input_name' => $inp,
	'inputf' => $inf
	);
    
	$this->model_admin->saveInput($saveInputs);
}

 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>La cita se guada con exito .</div>";

$this->session->set_flashdata('success_msg', $msg);
$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}
	
	
redirect('admin_medico/redirect_after_save_cita');
}
}

 public function add_new_cita()
{
//var_dump($this->input->post());
$nec=$this->input->post('nec');
$idpatient=$this->input->post('id_patient');
$iddoc=$this->input->post('doctor');
$seguro_id=$this->input->post('seguro_id');
$id_cm=$this->input->post('centro_medico');
$this->session->set_userdata('sessionIdPatient', $idpatient);
$this->session->set_userdata('sessionIdDocNewCita', $iddoc);
$this->session->set_userdata('sessionIdCentNewCita', $id_cm);
$this->session->set_userdata('sessionIdSegNewCita', $seguro_id);
$centro_type=$this->db->select('type')->where('id_m_c',$id_cm)->get('medical_centers')->row('type');

$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain', $centro_type);
$insert_date=date("Y-m-d H:i:s");
$filter_date=date("Y-m-d");
 $save2 = array(
'nec'=> $this->input->post('nec'),
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'), 
'id_patient' =>$idpatient, 
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'filter_date' =>$filter_date,
'confirmada' => 0
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);
$this->session->set_userdata('id_user', $this->input->post('id_user'));

$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('causa')));
		if($query1->num_rows() == 0)
	{
		$save = array(
       'title'=>$this->input->post('causa'),
	   'inserted_by' => $this->input->post('creadted_by'),
	   'inserted_time' =>$insert_date,
       'updated_by' => $this->input->post('creadted_by'),
	   'updated_time' => $insert_date
	   );
		$this->model_admin->save_new_causa($save);
	}


redirect("admin_medico/redirect_after_save_cita");
}


public function redirect_after_save_cita()
{
$id_user=$this->session->userdata['id_user'];
$id_doc=$this->session->userdata['sessionIdDocNewCita'];
$data['id_rdv']=$this->session->userdata['sessionIdNewCitaAgain'];
$data['is_historial']="";
$data['id_user'] = $id_user ;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $id_user;
	$data['perfil'] = $user['perfil'] ;
$data['nec'] = $this->model_admin->getNec();
$data['countries'] = $this->model_admin->getCountries();
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['provinces']=$this->model_admin->getProvinces();
$data['causa']=$this->model_admin->getCausa();
$data['municipios'] = $this->model_admin->getTownships();
$data['doctors'] = $this->model_admin->display_all_doctors();
//$last_patient_id=$this->db->select('id_p_a')->order_by('id_p_a','desc')->limit(1)->get('patients_appointments')->row('id_p_a');
$last_patient_id=$this->session->userdata['sessionIdPatient'];


$data['patient'] = $this->model_admin->historial_medical($last_patient_id);
$query  = $this->model_admin->RendezVous($last_patient_id);
		$val = array(
       'doctor'=>$id_doc,
	   'id_patient' => $last_patient_id
	   );
$query_doc  = $this->model_admin->RendezVousDoc($val);
$data['rendez_vous']=$query;
$data['fecha']=$query;
$data['nueva_cita']="";
$data['idpatient']=$last_patient_id;
$data['id_dd']=$id_doc;
$data['id_cm']=$this->session->userdata['sessionIdCentNewCita'];
$data['centro_type']=$this->session->userdata['sessionCentroTypeSeguroNewCitaAgain'];
$data['id_seguro']=$this->session->userdata['sessionIdSegNewCita'];
if($user['perfil']=="Admin"){
	$data['area']=0;
$data['is_admin']="yes";
$data['number_cita']=count($query);
$this->load->view('admin/pacientes-citas/header_cita',$data);
} else {
	$data['area']=$this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');
	$data['is_admin']="no";
	$data['number_cita']=count($query_doc);
	$insert_date= $this->db->select('insert_date')->where('id_user',$id_user)->get('users')->row('insert_date');
	$data['insert_date']= date("d-m-Y H:i",strtotime($insert_date)); 
	$delay= date('d-m-Y H:i:s', strtotime("+3 months", strtotime($insert_date)));
	$data['delay'] =$delay;
$this->load->view('medico/header', $data);
}
//$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('admin/pacientes-citas/patient', $data);
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
  $query_admedicall = $this->model_admin->getPatientNameOnSelectAdm($patient_nombres);

  $query_padron = $this->padron_model->getPatientNameOnSelectPad($val);

$data['nec'] = $this->model_admin->getNec();

 $executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;

 if ($query_admedicall != null)
 {
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$number_found=count($query_admedicall);
$data['patient_padron']=$query_padron;
$data['number_found_pad']=count($query_padron);
$number_found_pad=count($query_padron);
if($number_found > 0 && $number_found_pad > 1){//
	$data['now'] =number_format($now,3);
	$this->load->view('admin/pacientes-citas/search-patient-result-admedicall-padron', $data);

} else {
	$data['now'] =number_format($now,3);
$this->load->view('admin/pacientes-citas/search-patient-result', $data);

}
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
$data['now'] =number_format($now,3);
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
	
$user_id=$this->input->get('id_user');
$data['user_id']=$user_id;

$executionStartTime = microtime(true);

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






public function on_input_cied()
{
$value1=$this->input->get('value');
$data['value1']=$value1;
$data['id_pat']=$this->input->get('id_pat');
$data['tab']=$this->input->get('tab');
$data['user_id']=$this->input->get('user_id');
$data['id_cdia']=$this->input->get('id_cdia');
$data['centro_medico']=$this->input->get('centro_medico');
$data['val1']=$this->model_admin->Diag_pres($value1);
$this->load->view('admin/historial-medical/conclusion/cied', $data);


}



 public function showPatientMedicaPedia(){
$data['hist_id']=$this->input->get('id_pat');
$data['medica']= $this->input->get('medica');
$data['part']= $this->input->get('part');
$data['medicamentos']=$this->model_admin->search_medic($this->input->get('medica'));
$this->load->view('admin/historial-medical1/search_medica_ped', $data);
}


 public function showPatientMedica(){
$data['hist_id']=$this->input->get('id_pat');
$data['medica']= $this->input->get('medica');
$data['part']= $this->input->get('part');
$data['medicamentos']=$this->model_admin->search_medic($this->input->get('medica'));
$this->load->view('admin/historial-medical1/search_medica', $data);
}


 public function saveNewMed(){
$save = array(
'medicine' =>$this->input->post('medicine'),
'id_patient' => $this->input->post('id_pat'),
'part' => $this->input->post('part')
);
$this->model_admin->SaveMedicine($save);
}



 public function DeleteEmptyMed(){
$save = array(
'medicine' =>$this->input->post('medicine'),
'id_patient' => $this->input->post('id_pat'),
'part' =>$this->input->post('part')
);
$this->model_admin->SaveMedicine($save);
$this->model_admin->DeleteMedicine($save);
} 
 
 
  public function DeleteEmptyMedPed(){
$save = array(
'medicine' =>$this->input->post('medicine'),
'id_patient' => $this->input->post('id_pat'),
'part' =>$this->input->post('part')
);
$this->model_admin->SaveMedicine($save);
$this->model_admin->DeleteEmptyMedPed($save);
}
 
 public function loadPatientMedicine(){

$hist_id=$this->input->post('hist_id');
$data['part']="gnl";
$data['hist_id']=$hist_id;
//$sql="SELECT * FROM medicaments as a left join (select medicine, id_patient from h_c_patient_medicine where id_patient =$hist_id ) as b on a.id = b.medicine";
$sql="select * from h_c_patient_medicine where id_patient =$hist_id and part='gnl'";
$query = $this->db->query($sql);
$data['medicamentos']=$query->result();

//$data['medicamentos'] = $this->model_admin->medicamentos();
$this->load->view('admin/historial-medical1/show-patient-medica', $data);
} 
 
 
 
  public function loadPatientMedicinePed(){

$hist_id=$this->input->post('hist_id');
$data['hist_id']=$hist_id;
$data['part']="pedia";
$sql="select * from h_c_patient_medicine where id_patient =$hist_id and part='pedia'";
$query = $this->db->query($sql);
$data['medicamentos']=$query->result();

$this->load->view('admin/historial-medical1/show-patient-medica-med', $data);
}


 public function newMedicament(){
		$save = array(
       'name'=>$this->input->post('newMedicament')
	   );
		$this->model_admin->save_new_medicaments($save);

	$save = array(
	'medicine' =>$this->input->post('newMedicament'),
	'id_patient' => $this->input->post('id_pat'),
	'part' => $this->input->post('part')
	);
$this->model_admin->SaveMedicine($save);

}
 
 
public function on_input_pro()
{
$value=$this->input->get('value');
$data['id_pat']=$this->input->get('id_pat');
$data['tab']=$this->input->get('tab');
$data['value']=$value;
$data['val']=$this->model_admin->Diag_pro($value); 
$this->load->view('admin/historial-medical/conclusion/proc', $data);
}


public function savePatientCied()
{
if($this->input->post('id_cdia')==""){
	$last_id_con=$this->db->select('id_cdia')->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
 $id_con = $last_id_con + 1;
} else {
$id_con = $this->input->post('id_cdia');	
}	

 $cied10=$this->input->post('cie10');
if($this->input->post('deleteCied')==1){

$savecd = array(
  'diagno_def'=> $cied10,
  'p_id'=>$this->input->post('id_pat'),
  'con_id_link'=> $id_con,
  'user_id'=>$this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro_medico'),
  'insert_date'=>date("Y-m-d H:i:s")
  
);
$id_linkd=$this->model_admin->SaveConDef($savecd);
$this->session->set_userdata('id_linkd', $id_linkd);
} else {
		
		$id_pat=$this->input->post('id_pat');
		$user_id=$this->input->post('user_id');
	$id_linkd=$this->db->select('id_linkd')->where('con_id_link',$id_con)->where('p_id',$this->input->post('id_pat'))->where('user_id',$this->input->post('user_id'))->get('h_c_diagno_def_link')->row('id_linkd');
 
	$this->model_admin->removeCied10($id_linkd);
	
    }

}	
//--------------------------------------------------------------------------------------------------------------------------------------

public function SaveFormIndicacionesLab(){
$labCheckded = $this->input->post('lab');	
$operatorl = $this->input->post('operatorl');	
$historial_id = $this->input->post('historial_id_l');
$deleteLab = $this->input->post('deleteLab');	
$insert_date=date("Y-m-d H:i:s");

$save = array(
  'laboratory'  => $labCheckded,
  'operator'=> $this->input->post('operatorl'),
  'historial_id' => $historial_id,
 'insert_time'=> $insert_date,
 'updated_by'=> $this->input->post('operatorl'),
 'updated_time'=> $insert_date,
  'printing'=>1,
  'user_id'=> $this->input->post('user_id')
 
  );
$this->model_admin->SaveFormIndicacionesLab($save);

//$data['historial_id'] =$this->input->post('historial_id_l');
//$data['user_id'] =$this->input->post('user_id');
//$this->load->view('admin/historial-medical1/laboratorios/currentPrint', $data);
}

public function DeleteHistLab2(){
$labCheckded = $this->input->post('lab');	
$operatorl = $this->input->post('operatorl');	
$historial_id = $this->input->post('historial_id_l');
$deleteLab = $this->input->post('deleteLab');	
$insert_date=date("Y-m-d H:i:s");

$save = array(
  'laboratory'  => $labCheckded,
  'operator'=> $this->input->post('operatorl'),
  'historial_id' => $historial_id,
 'insert_time'=> $insert_date,
 'updated_by'=> $this->input->post('operatorl'),
 'updated_time'=> $insert_date,
  'printing'=>1,
  'user_id'=> $this->input->post('user_id')
 
  );
$this->model_admin->SaveFormIndicacionesLab($save);
$this->model_admin->DeleteHistLab2($save);
/*
$print = array(
  'historial_id'=>$this->input->post('historial_id'),
  'print'=>1,
  'user_id'=>$this->input->post('user_id')
  
);
$data['areaid']=$this->db->select('area')->where('first_name',$this->input->post('user_id'))->get('doctors')->row('area');
$data['historial_id'] =$this->input->post('historial_id');
$data['user_id'] =$this->input->post('user_id');
$printlab = $this->model_admin->Printlaboratorios($print);
$data['printlab']=$printlab;
$data['countprint']=count($printlab);
$this->load->view('admin/historial-medical1/laboratorios/currentPrintData', $data);
*/
}



//-----------------------------------------------------------------------------------------------------------------------


public function DeletePatCied(){
 $this->model_admin->DeletePatCied($this->input->post('id'));

}


public function patientCie10()

{ 
 $patient_cie10=$this->model_admin->show_diagno_def($this->input->post('id_con_d'));
  $data['patient_cie10']=$patient_cie10;
   $data['count_patient_cie10']=count($patient_cie10);
$this->load->view('admin/historial-medical/conclusion/patient_cie10', $data);
}






 public function edit_recetas(){

$data['edit_recetas'] = $this->model_admin->Recetas1($this->uri->segment(3));
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['presentacion'] = $this->model_admin->Presentacion();
$data['branches'] = $this->model_admin->branches();
$data['via'] = $this->model_admin->via();
$data['frecuencia'] = $this->model_admin->frecuencia();
$data['farmacia'] = $this->model_admin->farmacia();
	 
$data['id_user'] =$this->uri->segment(4);
$this->load->view('admin/historial-medical1/recetas/edit_recetas', $data);

}





 public function edit_estudios(){
$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$data['edit_estudios'] = $this->model_admin->print_estudio($this->uri->segment(3));
$data['id_user'] =$this->uri->segment(4);
$this->load->view('admin/historial-medical1/estudios/edit_estudios', $data);

}




public function invoice_ars_claim__()
{
	$val=$this->uri->segment(3);
	$last_id=$this->db->select('id_ncf')->order_by('id_ncf','desc')->limit(1)->get('ncf')->row('id_ncf');
    //$last_id=2;
	$data['last_id'] =$last_id;
	$data['invoice'] = $this->model_admin->getNewinvoice($last_id);
	$data['nota_ncf'] = $this->model_admin->getNcf($last_id);
	if($val=="print"){
		$this->load->view('admin/print/print_invoice_ars',$data);
	} else{
	//$this->load->view('admin/pacientes-citas/header_cita',$data);
		$this->load->view('admin/billing/invoice_ars_claim/after-save',$data);
	$this->load->view('admin/billing/invoice_ars_claim/create',$data);

	}
}




public function save_medical_insurance_audit_profile()
{
$save = array(
'patient' =>$this->input->post('id_patient'),
'desde' => $this->input->post('desde'),
'hasta' => $this->input->post('hasta'),
'num' => $this->input->post('numauto'),
'monto' => $this->input->post('totpagseg'),
'causa' => $this->input->post('causa'),
'medico' =>$this->input->post('medico'),
'ars' =>$this->input->post('id_seguro'),
'validate' =>1
);
//$this->model_admin->save_patient_arc_report($save);

//---------------validate table------------------------------------------

$idfac =$this->input->post('idfac');
$data = array(
'validate' => 1,
'causa_perfil_seguro_audit' =>$this->input->post('causa'),
'monto_seguro_audit' =>$this->input->post('totpagseg')	 
);
$this->model_admin->row_validation_after_validate($idfac,$data);
}



public function medical_insurance_audit_profile_print_view()
{
$id_seguro =$this->input->get('id_seguro');
$data1 = array(
'desde' =>$this->input->get('desde'),
'hasta' =>$this->input->get('hasta'),
'medico' =>$this->input->get('medico'),
'id_patient' =>$this->input->get('id_patient')
);

$data2 = array(
'desde' =>$this->input->get('desde'),
'hasta' =>$this->input->get('hasta'),
'medico' =>$this->input->get('medico'),
'id_patient' =>$this->input->get('id_patient'),
'id_seguro' =>$id_seguro
);


if($id_seguro==""){
$results=$this->model_admin->show_patient_arc_report($data1);
$data['patient_rows']=$results;
$data['count']=count($results);
} else {
$results=$this->model_auditoria_medica->show_patient_arc_report_ars($data2);
$data['patient_rows']=$results;
$data['count']=count($results);	
}
$data['id_seguro']=$id_seguro;
$data['desde'] =$this->input->get('desde');
$data['hasta'] =$this->input->get('hasta');
$data['medico'] =$this->input->get('medico');
$data['id_patient'] =$this->input->get('id_patient');
$this->load->view('admin/billing/medical_insurance_audit_profile/printing_view',$data);

}





public function get_med_name()
{
	$data1 = array(
   'id_patient' =>$this->input->get('id_patient'),
	'med_name' =>$this->input->get('med_name')
	);
	$data['get_med_name'] = $this->model_admin->get_med_name($data1);
	$this->load->view('admin/billing/medical_insurance_audit_profile/get_med_name',$data);
}

	

public function get_patient_historial()
{
	//get id2  in fac
	$id2=$this->db->select('id2,totalpaseg')->where('idfac',$this->input->get('get_id_fac'))->get('factura')->row_array();
	$data['totalpaseg']=$id2['totalpaseg'];
	$data['idfac']=$this->input->get('get_id_fac');
    $idfacc=$id2['id2'];
	$procedimiento = $this->input->get('procedimiento');
	$patient=$this->db->select('paciente,centro_medico,numauto')->where('idfacc',$idfacc)->get('factura2')->row_array();
	$id_patient=$patient['paciente'];
	$data['numauto']=$patient['numauto'];
	
     $data['desde']=$this->input->get('dess');
	$data['hasta']= $this->input->get('hass');
	$data['medico']=$this->input->get('medico');
	$data['id_patient']=$id_patient;
	
$data['id_patient']=$id_patient;
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat_audit($id_patient,$this->input->get('medico'),$patient['centro_medico']);
$data['get_patient_historial'] = $this->model_admin->get_patient_historial($id_patient,$this->input->get('medico'),$patient['centro_medico']);
$data['num_count']=$this->model_admin->hist_count($id_patient);
$data['num_count_lab']=$this->model_admin->hist_count_lab($id_patient);
$data['num_count_es']=$this->model_admin->hist_count_es($id_patient);
$data['patient_med_audit'] = $this->model_admin->patient_med_audit($id_patient);
$data['patient_lab_audit'] = $this->model_admin->patient_lab_audit($id_patient);
$data['IndicacionesPreviasEstudios'] = $this->model_admin->IndicacionesPreviasEs($id_patient);


$data1 = array(
   'id_patient' =>$id_patient,
	'med_name' =>$this->input->get('med_name')
	);
	$data['get_med_name'] = $this->model_admin->get_med_name($data1);

$data['id_seguro']=$this->input->get('id_seguro');
$data['centro_medico']=$this->input->get('centro_medico');
$data['procedimiento'] =  $procedimiento;
$this->load->view('admin/billing/medical_insurance_audit_profile/get_patient_historial', $data);
}



public function get_lab_name()
{
		
   $data1 = array(
   'id_patient' =>$this->input->get('id_patient'),
	'lab_id' =>$this->input->get('lab_id')
	);
	$data['get_lab_name'] = $this->model_admin->get_lab_name($data1);
	$this->load->view('admin/billing/medical_insurance_audit_profile/get_lab_name',$data);
}


public function get_numero_contrado()
{
$input_val=$this->input->get('num_cont');
$id_seguro=$this->input->get('id_seguro');
$data['id_seguro']=$id_seguro;
$field="codigoprestado";
if($id_seguro==""){
$data['date_filter']=$this->model_admin->get_numero_contrado_date_filter($input_val);
$data['input_result']=$this->model_admin->get_numero_contrado($input_val);
} else {
$idfacc=$this->db->select('idfacc')->where('codigoprestado',$input_val)->get('factura2')->row('idfacc');
$medico2=$this->db->select('medico2')->where('id2',$idfacc)->get('factura')->row('medico2');
$data['date_filter']=$this->model_auditoria_medica->get_date_filter_ars($medico2,$id_seguro,$field);
$data['input_result']=$this->model_auditoria_medica->get_data_medico_ars($medico2,$id_seguro);
} 
$data['input_val'] = "Resultado de la busqueda : $input_val";

$this->load->view('admin/billing/medical_insurance_audit_profile/input_result',$data);

}



public function get_nombre_medico()
{
$input_val=$this->input->get('medico');
$doc_name=$this->db->select('name')->where('id_user',$input_val)->get('users')->row('name');
$id_seguro=$this->input->get('id_seguro');
$data['id_seguro']=$id_seguro;

if($id_seguro==""){
$data['date_filter']=$this->model_admin->get_nombre_medico_date_filter($input_val);
$data['input_result']=$this->model_admin->get_nombre_medico($input_val);
} else {
$data['date_filter']=$this->model_auditoria_medica->get_date_filter_ars($input_val,$id_seguro);
$data['input_result']=$this->model_auditoria_medica->get_data_medico_ars($input_val,$id_seguro);
}
$data['input_val'] = "Resultado de la busqueda : $doc_name"; 

$this->load->view('admin/billing/medical_insurance_audit_profile/input_result',$data);

}


public function get_exequatur_medico()
{
$input_val=$this->input->get('exequatur');
$id_seguro=$this->input->get('id_seguro');
$data['id_seguro']=$id_seguro;
if($id_seguro==""){
$data['date_filter']=$this->model_admin->get_exequatur_medico_date_filter($input_val);
$data['input_result']=$this->model_admin->get_exequatur_medico($input_val); 
} else {
$medico2=$this->db->select('first_name')->where('exequatur',$input_val)->get('doctors')->row('first_name');
$data['date_filter']=$this->model_auditoria_medica->get_date_filter_ars($medico2,$id_seguro);
$data['input_result']=$this->model_auditoria_medica->get_data_medico_ars($medico2,$id_seguro); 
}

$data['input_val'] = "Resultado de la busqueda : $input_val";

$this->load->view('admin/billing/medical_insurance_audit_profile/input_result',$data);

}

public function get_cedula_medico()
{
$input_val=$this->input->get('cedula');
$id_seguro=$this->input->get('id_seguro');
$data['id_seguro']=$id_seguro;
if($id_seguro==""){
$data['date_filter']=$this->model_admin->get_cedula_medico_date_filter($input_val);
$data['input_result']=$this->model_admin->get_cedula_medico($input_val);
} else {
$medico2=$this->db->select('first_name')->where('cedula',$input_val)->get('doctors')->row('first_name');
$data['date_filter']=$this->model_auditoria_medica->get_date_filter_ars($medico2,$id_seguro);
$data['input_result']=$this->model_auditoria_medica->get_data_medico_ars($medico2,$id_seguro); 
}
$data['input_val'] = "Resultado de la busqueda : $input_val";
$this->load->view('admin/billing/medical_insurance_audit_profile/input_result',$data);

}



	public function count_patient_num_contrato()
{
	$god_own = $this->input->get('god_own');
	$data['medico'] =$this->input->get('medico');
	$data['id_seguro'] =$this->input->get('id_seguro');
	$data['desde']=$this->input->get('desde');
	$data['hasta']=$this->input->get('hasta');

	$data1 = array(
   'desde' =>$this->input->get('desde'),
	'hasta' =>$this->input->get('hasta'),
	'medico' =>$this->input->get('medico')
	);
	
	$data2 = array(
   'desde' =>$this->input->get('desde'),
	'hasta' =>$this->input->get('hasta'),
	'medico' =>$this->input->get('medico'),
	'seguro_medico'=>$this->input->get('id_seguro')
	);
	if($this->input->get('id_seguro')==""){
	$count = $this->model_admin->count_patient_num_contrato($data1);
	$data['count']=count($count);
	$data['get_numero_contrado_patients']=$count;
	
	} else {
		
		$count = $this->model_auditoria_medica->count_patient_num_contrato_ars($data2);
	$data['count']=count($count);
	$data['get_numero_contrado_patients']=$count;	
		
	}
	$this->load->view('admin/billing/medical_insurance_audit_profile/count_patient_num_contrato', $data);
	
}


	public function go_down_patient_num_con()
    {
	
	$data['medico'] =$this->input->get('medico');
	$data['id_seguro'] =$this->input->get('id_seguro');
	$data['desde']=$this->input->get('desde');
	$data['hasta']=$this->input->get('hasta');
	$this->load->view('admin/billing/medical_insurance_audit_profile/go_down_patient_num_con',$data);
    }



public function patient_factura_data()
{
	$data['desde'] = $this->input->post('dess');
	$data['hasta'] =$this->input->post('hass');
	$data['medico'] = $this->input->post('medico');
	$data['id_seguro']= $this->input->post('id_seguro');
	
	
	$data1 = array(
   'desde' => $this->input->post('dess'),
	'hasta' => $this->input->post('hass'),
	'medico' => $this->input->post('medico')
	);
	
	$data2 = array(
   'desde' => $this->input->post('dess'),
	'hasta' => $this->input->post('hass'),
	'medico' => $this->input->post('medico'),
	'seguro_medico' => $this->input->post('id_seguro')
	);

if($this->input->post('id_seguro')==""){
	$data['patient_factura_data'] = $this->model_admin->patient_num_contrato_data($data1);
	
	$condition = "filter BETWEEN " . "'" . $this->input->post('dess'). "'" . " AND " . "'" . $this->input->post('hass'). "'";
    $query_citas=$this->db->select('validate')->where($condition)->where('medico2',$this->input->post('medico'))->where('validate',1)
    ->get('factura');
    $data['rsut']= $query_citas->num_rows();
	
	
	} else {
		$data['patient_factura_data'] = $this->model_auditoria_medica->count_patient_num_contrato_ars($data2);
	$condition = "filter BETWEEN " . "'" . $this->input->post('dess'). "'" . " AND " . "'" . $this->input->post('hass'). "'";
    $query_citas=$this->db->select('validate')->where($condition)->where('medico2',$this->input->post('medico'))->where('seguro',$this->input->post('id_seguro'))->where('validate',1)
    ->get('factura');
    $data['rsut']= $query_citas->num_rows();
	}
	$this->load->view('admin/billing/medical_insurance_audit_profile/patient-factura-data', $data);
}



public function display_pre_tutor()
{
$ctutor=$this->model_admin->CountTutor($this->input->post('id_nino'));
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getPreTutor($this->input->post('id_nino'));
$this->load->view('admin/pacientes-citas/display_tutor',$data);
}



public function display_tutor()
{
$ctutor=$this->model_admin->CountTutor($this->input->post('id_nino'));
$data['ctutor']=$ctutor;
$data['tutor']=$this->model_admin->getTutor($this->input->post('id_nino'));
$this->load->view('admin/pacientes-citas/display_tutor',$data);
}



 public function edit_tutor(){

$data['edit_tutor'] = $this->model_admin->edit_tutor($this->uri->segment(3));
$sql ="SELECT name FROM relationship";
$query = $this->db->query($sql);
$data['query']=$query;
$this->load->view('admin/pacientes-citas/edit_tutor', $data);

}



public function UpdatePatientTutor(){
//$insert_date=date("Y-m-d H:i:s");
$id=$this->input->post('id');
$save = array(
'relacion'=> $this->input->post('rel_fam')
);

$this->model_admin->UpdatePatientTutor($save,$id);

}



public function recetasForm(){

$data['presentacion'] = $this->model_admin->Presentacion();
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['via'] = $this->model_admin->via();
$data['frecuencia'] = $this->model_admin->frecuencia();
$data['farmacia'] = $this->model_admin->farmacia();
$this->load->view('admin/historial-medical1/recetas/recetas-form', $data);
}



public function conclucionForm(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$concluciones = $this->model_admin->concluciones($historial_id);
$data['count_conc']=count($concluciones);
$data['concluciones']=$concluciones;
$data['centro_medico']=$this->input->post('centro_medico');
$this->load->view('admin/historial-medical1/conclusion/conclucion-form', $data);
}

public function EnfermedadForm(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['causa']=$this->model_admin->getCausa();
$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$enfermedad=$this->model_admin->Enfermedad($historial_id);
$data['count_enf']=count($enfermedad);
$data['enfermedad']=$enfermedad;
$data['enf_motivo']=$this->db->select('causa')->where('id_patient',$historial_id)->where('centro',$this->input->post('centro_medico'))->where('doctor',$this->input->post('user_id'))->get('rendez_vous')->row('causa');
$this->load->view('admin/historial-medical1/enfermedad-actual/enfermedad-form', $data);
}




public function ssrForm(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['count_ssr']=$this->model_admin->count_ssr($historial_id);
$data['ssr']=$this->model_admin->getSSR($historial_id);

$this->load->view('admin/historial-medical1/ante_ssr/ant_ssr_form', $data);
}




public function obsForm(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['obs_nav']=$this->model_admin->sObs($historial_id);
$data['count_obs']=$this->model_admin->countObs($historial_id);
$sql ="SELECT *  FROM h_c_ante_obs1 WHERE hist_id=$historial_id";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
//---------personales
if($rf->dia1=='si'){$data['dia1'] = '* Diabetes'; } else {$data['dia1'] ="";}
if($rf->tbc1=='si'){$data['tbc1'] = '* TBC Pulmonar'; } else {$data['tbc1'] ="";}
if($rf->hip1=='si'){$data['hip1'] = '* Hipertencion'; } else {$data['hip1'] ="";}
if($rf->pelv=='si'){$data['pelv'] = '* Pelvico-Urinaria'; } else {$data['pelv'] ="";}
if($rf->infert=='si'){$data['inf'] = '* Infertibilidad'; } else {$data['inf'] ="";}
if($rf->otros1=='si'){$data['otros1'] = "* $rf->otros1_text"; } else {$data['otros1'] ="";}

//--------familiares

if($rf->dia2=='si'){$data['dia2'] = '* Diabetes'; } else {$data['dia2'] ="";}
if($rf->tbc2=='si'){$data['tbc2'] = '* TBC Pulmonar'; } else {$data['tbc2'] ="";}
if($rf->hip2=='si'){$data['hip2'] = '* Hipertencion'; } else {$data['hip2'] ="";}
if($rf->gem=='si'){$data['gem'] = '* Gemlares'; } else {$data['gem'] ="";}
if($rf->otros2=='si'){$data['otros2'] = "* $rf->otros2_text"; } else {$data['otros2'] ="";}
//-------signos
if($rf->fiebre==1){$data['fiebre'] = '* Fiebre'; } else {$data['fiebre'] ="";}
if($rf->artra==1){$data['artra'] = '* Artralgia';}else{$data['artra'] = "";}
if($rf->mia==1){$data['mia'] = '* Mialgia';}else{$data['mia'] = "";}
if($rf->exa==1){$data['exa'] = '* Exantema cutaneo';}else{$data['exa'] = "";}
if($rf->con==1){$data['con'] = '* Conjuctivitis no purulenta/hiperemica';}else{$data['con'] = "";}	
}

$this->load->view('admin/historial-medical1/obstetrico/ant_obs_form', $data);
}


public function rehabForm(){
$historial_id=$this->input->post('historial_id');
$data['id_historial']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['count_rehab']=$this->model_admin->countRehab($historial_id);
$data['rehab']=$this->model_admin->Rehab($historial_id);
$this->load->view('admin/historial-medical1/rehabilitation/rehab-form', $data);
}


public function exaFisiForm(){
$historial_id=$this->input->post('historial_id');
$data['historial_id']=$historial_id;
$data['user_id']=$this->input->post('user_id');
$data['cuello']=$this->model_admin->examenCuello();
$data['relativo']=$this->model_admin->sistemaRelat();
$data['ext_inf']=$this->model_admin->examenExtinf();
$data['mama']=$this->model_admin->examenMama();
$data['axilar']=$this->model_admin->examenAxilar();
$data['inspeccion_vulvar']=$this->model_admin->examenInspeccion_vulvar();
$data['rectal']=$this->model_admin->examenRectal();
$data['genitalm']=$this->model_admin->examenGenitalm();
$data['genitalf']=$this->model_admin->examenGenitalf();
$data['neuro']=$this->model_admin->Neuro();
$data['cabeza']=$this->model_admin->Cabeza();
$data['cervix']=$this->model_admin->Cervix();
$data['forma']=$this->model_admin->AbmInsForma();
$data['vagina']=$this->model_admin->examenVagina();
$data['count_signos']=$this->model_admin->count_signos($historial_id);
$data['signos']=$this->model_admin->Signos($historial_id);
$data['edad']=$this->db->select('edad')->where('id_p_a',$historial_id)
			->get('patients_appointments')->row('edad');
$this->load->view('admin/historial-medical1/examen-fisico/exam-fis-form', $data);
}


public function sistForm(){
$historial_id=$this->input->post('historial_id');
$data['historial_id']=$historial_id;
$data['user_id']=$this->input->post('user_id');
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
$this->load->view('admin/historial-medical1/examen-sistema/exam-sist-form', $data);
}


  public function show_derma_by_id(){
$id= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$user['name'];
$data['perfil']=$user['perfil'];
$data['derma_tipo']=$this->model_admin->dermaTipo();
$data['derma_morfo']=$this->model_admin->dermaMorfo();
$data['derma_interog']=$this->model_admin->dermaIntero();
$data['show_derma_by_id'] = $this->model_admin->show_derma_by_id($id);
$this->load->view('admin/historial-medical1/dermatologico/data', $data);
$this->load->view('admin/historial-medical1/dermatologico/footer');
} 



public function get_fac_ars()
{
	$medico=$this->db->select('first_name')->where('area',$this->input->get('areas'))->get('doctors')->row('first_name');
	$data = array(
   'desde' => $this->input->get('desde'),
	'hasta' => $this->input->get('hasta'),
	'medico' => $medico,
	'seguro_medico' => $this->input->get('ars')
	);
	$data['is_admin']= $this->input->get('is_admin');
	
	$data['display_billings'] = $this->model_admin->get_fac_ars($data);
	$this->load->view('admin/billing/invoice_ars_claim/get_fac_ars', $data);
	 //echo json_encode ($query);
}









public function search_result_ars_fac(){
$desde=$this->input->post('desde');
$hasta=$this->input->post('hasta');
$medico=$this->input->post('medico');
$seguro_medico=$this->input->post('seguro_medico');
$data['desde']=$desde;
$data['hasta']=$hasta;
$data['medico']=$medico;
$data['seguro_medico']=$seguro_medico;
$sql2 ="SELECT * FROM factura
where idfac NOT IN(SELECT id_fac2 FROM invoice_ars_claims) AND filter
BETWEEN '$desde' AND '$hasta' AND medico2= '$medico' AND seguro='$seguro_medico' ";
 $query2= $this->db->query($sql2);
 $data['query2']=$query2;
 $data['number']=$query2->num_rows();
$this->load->view('admin/billing/invoice_ars_claim/search_result_ars_fac', $data);
}



public function saveInvoiceArsClaim()
{
$fecha = $this->input->post('fecha');
$nota = $this->input->post('nota');
$ncf = $this->input->post('ncf');

$paciente = $this->input->post('paciente');
$num_af = $this->input->post('num_af');
$numauto = $this->input->post('numauto');
$tsubtotal = $this->input->post('tsubtotal');
$totpagseg = $this->input->post('totpagseg'); 
$totpagpa = $this->input->post('totpagpa');
$medico = $this->input->post('medico');
$servicio = $this->input->post('servicio');
$codigoprestado = $this->input->post('codigoprestado');
$rnc = $this->input->post('rnc');
$seguro_medico = $this->input->post('seguro_medico');
$idfacc = $this->input->post('idfacc');
$time=date("Y-m-d H:i:s");
$data= array(
'value' =>$this->input->post('ncf'),
'nota' =>$this->input->post('nota')
);
$id_ncf=$this->model_admin->ncf($data);

//=========================================================
for ($i = 0; $i < count($fecha); ++$i ) {
$f = $fecha[$i];
$pa = $paciente[$i];
$nf = $num_af[$i];
$na = $numauto[$i];
$ts = $tsubtotal[$i];
$tp = $totpagseg[$i];
$tpg = $totpagpa[$i];
$med= $medico[$i];
$serv = $servicio[$i];
$cod = $codigoprestado[$i];
$rn = $rnc[$i];
$sm= $seguro_medico[$i]; 
$if= $idfacc[$i];  
$save= array(
'fecha' =>$f,
'paciente' =>$pa,
'num_af' =>$nf,
'numauto' =>$na,
'tsubtotal' =>$ts,
'totpagseg' =>$tp,
'totpagpa' =>$tpg,
'medico' =>$med,
'servicio' =>$serv,
'codigoprestado' =>$cod,
'rnc' =>$rn,
'seguro_medico' =>$sm,
'inserted_by' =>$this->input->post('created_by'),
'updated_by' =>$this->input->post('created_by'),
'inserted_time' =>$time,
'updated_date' =>$time,
'ncf_id' =>$id_ncf,
'id_fac2' =>$if

);
$this->model_admin->saveInvoiceArsClaim($save);
};
$this->session->set_userdata('id_ncf', $id_ncf);
$this->session->set_userdata('is_admin', $this->input->post('is_admin'));
}




public function import_exel()
{

$inserted_date=date("Y-m-d H:i:s");
$categoria=$this->input->post('categoria');
$seguro=$this->input->post('seguro');
$id_doc=$this->input->post('doctor_dropdown');
$creaded_by=$this->input->post('creaded_by');
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
$cod = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$sim = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$proced = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$mont = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$data[] = array(
'codigo'=>$cod,
'simon'=>$sim,
'procedimiento'=>$proced,
'monto'=>$mont,
'id_categoria'=>$categoria,
'id_seguro'=>$seguro,
'id_doctor'=>$id_doc,
'inserted_by'=>$creaded_by,
'updated_by'=>$creaded_by,
'inserted_date'=>$inserted_date,
'updated_date'=>$inserted_date
);
}

}
$this->excel_import_model->insert($data);


}
$id_seguro=$this->db->select('id_seguro')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_seguro');	
$data = array(
'codigo'=>$this->input->post('codigo_medico'),
'id_seguro'=>$id_seguro,
'id_doctor'=>$id_doc,
'inserted_by'=>$creaded_by,
'inserted_time'=>$inserted_date,
'updated_by'=>$creaded_by,
'updated_time'=>$inserted_date
   
);
$this->model_admin->save_codigo_contrato($data);

}

	
 public function import_exel_centro()
{
$inserted_date=date("Y-m-d H:i:s");
if(isset($_FILES["file"]["name"]))
{
$centro_id=$this->input->post('centro_id');
$path = $_FILES["file"]["tmp_name"];
$object = PHPExcel_IOFactory::load($path);
foreach($object->getWorksheetIterator() as $worksheet)
{
$highestRow = $worksheet->getHighestRow();
$highestColumn = $worksheet->getHighestColumn();
for($row=2; $row<=$highestRow; $row++)
{
$cups= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
$groupo = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
$simon = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
$sub_groupo = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
$monto = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
$data[] = array(
'cups'=>$cups,
'groupo'=>$groupo,
'simons'=>$simon,
'sub_groupo'=>$sub_groupo,
'monto'=>$monto,
'centro_id'=>$centro_id,
'inserted_by'=>$this->input->post('creaded_by'),
'updated_by'=>$this->input->post('creaded_by'),
'inserted_date'=>$inserted_date,
'updated_date'=>$inserted_date
);
}

}
$this->excel_import_model->insert_centro($data);


$data = array(
'codigo'=>$this->input->post('codigo_centro'),
'id_centro'=>$centro_id,
'updated_by'=>$this->input->post('creaded_by'),
'inserted_by'=>$this->input->post('creaded_by'),
'updated_time'=>$inserted_date,
'inserted_time'=>$inserted_date
);
$this->model_admin->save_codigo_contrato($data);
}


$data = $this->excel_import_model->select_centros();
$output = '
<h3 align="center" class="hide-total-tarif-centro">Total Tarifarios Centros Medicos - '.$data->num_rows().'</h3>
'; 
echo $output;
}



//--------------NUEVA FACTURA------------------------------

public function patient_cedula_billing()
{
$data['executionStartTime'] = microtime(true);
$perfil=$this->db->select('perfil')->where('id_user',$this->input->get('id_user'))->get('users')->row('perfil');
$id_p=$this->db->select('id_p_a')->where('cedula',$this->input->get('cedula'))->get('patients_appointments')->row('id_p_a');
$data['patient_data']=$this->model_admin->historial_medical($id_p);
$val = array(
'id_patient'=>$id_p,
'doctor'=>$this->input->get('id_user'),
'perfil'=>$perfil
);

$citas=$this->model_admin->Search_factura($val);

$data['perfil']=$perfil;
$data['id_user']=$this->input->get('id_user');
$data['citas']=$citas;
$data['count']=count($citas); 
$this->load->view('admin/billing/bill/input-result',$data);

}




public function patient_nec_billing()
{
$data['executionStartTime'] = microtime(true);
$perfil=$this->db->select('perfil')->where('id_user',$this->input->get('id_user'))->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['id_user']=$this->input->get('id_user');
$id_p=$this->db->select('id_p_a')->where('nec1',$this->input->get('nec'))->get('patients_appointments')->row('id_p_a');
$data['patient_data']=$this->model_admin->historial_medical($id_p);
$val = array(
'id_patient'=>$id_p,
'doctor'=>$this->input->get('id_user'),
'perfil'=>$perfil
);

$citas=$this->model_admin->Search_factura($val);
$data['citas']=$citas;
$data['count']=count($citas);
$this->load->view('admin/billing/bill/input-result',$data);
}




public function ajaxsearchnombresfac()
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

$citas=$this->model_admin->Search_factura($val);
$data['citas']=$citas;
$data['count']=count($citas);
$data['id_user']=$this->input->get('id_user');
$this->load->view('admin/billing/bill/input-result',$data);

}

public function load_patient_citas()
{
 $val = array(
'id_patient'=> $this->input->post('id_p_a'),
'doctor'=>$this->input->post('id_user'),
'perfil'=>$this->input->post('perfil')
);
$data['perfil']=$this->input->post('perfil');
$data['citas']=$this->model_admin->Search_factura($val);
//$data['citas']=$this->model_admin->RendezVousDoc($val);
$this->load->view('admin/billing/bill/load_patient_citas',$data);

}



public function get_patient_for_billing()
{
$data['is_admin']="";
$id_user=$this->input->post('id_user');
$data['id_user']=$id_user;
$data['name']=$id_user;
$id_apoint=$this->input->post('id');
$numero=$this->input->post('numero');
$doc_id=$this->input->post('doc_id');
 $doc_seg = array(
'id_doctor'=> $this->input->post('doc_id'),
'id_seguro'  =>$this->input->post('seg_id')
);

$data['id_apoint']=$id_apoint;
$data['id_doc']=$doc_id; 
$data['id_seguro']=$this->input->post('seg_id');
 $seguro_name=$this->db->select('title, rnc')->where('id_sm',$this->input->post('seg_id'))
 ->get('seguro_medico')->row_array();
 $data['seguro_name']=$seguro_name['title'];
  $data['rnc']=$seguro_name['rnc'];
  $doc=$this->db->select('area,exequatur')->where('first_name',$doc_id)->get('doctors')->row_array();
$data['exequatur']=$doc['exequatur'];
$data['area']=$doc['area'];
$data['data_cita']=$this->model_admin->get_patient_for_billing($id_apoint); 
$serv=$this->model_admin->Serviciomssm($doc_seg);
$data['serv']=$serv;
$id_centro=$this->db->select('centro')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('centro');

$serv_centro=$this->model_admin->Service_centro($id_centro); 
$data['serv_centro']=$serv_centro; 
$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');
$data['patient_data']=$this->model_admin->historial_medical($id_patient); 
$last_bill_id=$this->db->select('idfacc')->order_by('idfacc','desc')->limit(1)->get('factura2')->row('idfacc');
$show_diagno_pat=$this->model_admin->show_diagno_pat($id_patient,$doc_id,$id_centro);
$data['show_diagno_pat']=$show_diagno_pat;
$data['procedimiento'] = $this->db->select('procedimiento')->
where('historial_id',$id_patient)->where('id_user',$doc_id)->
where('centro_medico',$id_centro)->
like('updated_time',date("Y-m-d"))->
get('h_c_conclusion_diagno')->row('procedimiento');
$data['id_p_a']=$id_patient;
$data['id_cm']=$id_centro;
$data['last_bill_id']=$last_bill_id;
$data['billing']="";
$identificar=$this->input->post('ident');
echo "<div class='col-sm-12' ><h5 class='alert alert-info h5 text-center'>Resultado de la cita numero <span style='color:green'>$numero</span><h5></div>";

if($identificar=="privadoFacturar"){ 
$data['cod']=$this->db->select('codigo')->where('id_seguro',$this->input->post('seg_id'))->where('id_doctor',$doc_id)
->get('codigo_contrato')->row('codigo');
} else {
	
$data['cod']=$this->db->select('codigo')->where('id_centro',$id_centro)
->get('codigo_contrato')->row('codigo');
}
$data['identificar']=$identificar;
$data['dont_display']="style='display:none'";
$this->load->view('medico/billing/bill/header-factura',$data);
$this->load->view('medico/billing/bill/get-patient-name-for-billing-after-create-new-cita',$data);


}


public function import_rates_fac()
{
$data['id_doc']=$this->uri->segment(3);
$data['id_seg']=$this->uri->segment(4);
$data['created_by']=$this->uri->segment(5);
$this->load->view('medico/tarifarios/excel_import_fac',$data);
}

public function import_rates_fac_centro()
{
$data['id_c']=$this->uri->segment(3);
$data['created_by']=$this->db->select('name')->where('id_user',$this->uri->segment(4))->get('users')->row('name');
$this->load->view('admin/tarifarios/excel_import_fac_centro',$data);
}

public function get_service_precio_centro()
{
 $id=$this->input->post('id_mssm1');
$precio=$this->db->select('monto')->where('id_c_taf',$id)->get('centros_tarifarios')->row('monto');
echo $precio;


}





public function get_service_precio()
{
$id=$this->input->post('id_mssm1');
$doctorid=$this->input->post('doctorid');
$data['precio']=$this->db->select('monto')->where('id_tarif',$id)->get('tarifarios')->row('monto');
$this->load->view('admin/billing/bill/get-service-precio', $data);
}


public function create_cita_again()
{
$id_p_a= $this->uri->segment(3);
$data['id_p_a']=$id_p_a;
$id_user= $this->uri->segment(4);
$data['id_user']=$id_user;
$data['nec']=$this->db->select('nec1')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('nec1');
$this->load->view('admin/pacientes-citas/create_cita_again',$data);
}


public function refresh_form_cita(){
$id_user=$this->input->post('id_user');
$id_p_a=$this->input->post('id_p_a');
$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
$data['id_user']=$id_user;
$data['perfil']=$user['perfil'];
$data['name']=$id_user;
$data['nec']=$this->db->select('nec1')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('nec1');
$data['id_patient']=$id_p_a;
$data['causa']=$this->model_admin->getCausa();
$data['seguro_id']=$this->db->select('seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('seguro_medico');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['especialidades_doc']= $this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');
$data['centro_medico_doc'] = $this->model_admin->view_doctor_centro($id_user);	
$this->load->view('admin/pacientes-citas/create_cita_again_form',$data);
}


public function create_cita_again1()
{
$id_p_a= $this->uri->segment(3);
$id_user= $this->uri->segment(4);
$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
$data['id_user']=$id_user;
$data['perfil']=$user['perfil'];
$data['name']=$user['name'];
$patient=$this->db->select('nec1,seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row_array();
$data['seguro_id']=$patient['seguro_medico'];
$data['nec']=$patient['nec1'];
$data['id_patient']=$id_p_a;
$data['causa']=$this->model_admin->getCausa();
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['especialidades_doc']= $this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');
$data['centro_medico_doc'] = $this->model_admin->view_doctor_centro($id_user);
$this->load->view('admin/pacientes-citas/create_cita_again',$data);


}







public function UpdateCita()
{
	$id_cita= $this->uri->segment(3);

	$id_user= $this->uri->segment(4);
	$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
	$data['id_user']=$id_user;
	$data['perfil']=$user['perfil'];
	$data['name']=$id_user;

	$data['FindCita'] = $this->model_admin->FindCita($id_cita);
	$data['causa']=$this->model_admin->getCausa();
	$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$data['doctors'] = $this->model_admin->display_all_doctors();
	$data['especialidades_doc']= $this->db->select('area')->where('first_name',$id_user)->get('doctors')->row('area');
    $data['centro_medico_doc'] = $this->model_admin->view_doctor_centro($id_user);
	$this->load->view('admin/pacientes-citas/UpdateCita', $data);
}



public function patients_data()
{

$query = $this->model_admin->getPatientsDoc($this->input->post('medico_id'));
$data['patient_data'] =  $query;
if($this->input->post('perfil')=='Admin'){$data['controller']="admin";}else{$data['controller']="medico";};
$this->load->view('medico/pacientes-citas/patients_data', $data);

}



public function ncf()
{
	$ncf=$this->input->get('value');
$query1 = $this->db->get_where('ncf',array('value'=>$ncf));
	if($query1->num_rows() > 0)
	{
echo "<div class='alert alert-warning'> <strong>$ncf</strong> : Este <strong>N</strong>umero <strong>C</strong>onprobante <strong>F</strong>iscal ya utilisado, no puede usar lo de nuevo !</div>";
	
		echo "<script> $('.ncf').val(''); </script>";
	} else {
	
	}

}


public function SaveUpOftala(){
$img= $this->db->select('ojo,fondo')->where('id_oftal',$this->input->post('id_oftal'))->get('h_c_oftalmologia')->row_array();
 unlink("./assets/img/oftal/".$img['ojo']);	
	 unlink("./assets/img/oftal/".$img['fondo']);
$data= array(
  'od_sin_con'=> $this->input->post('od_sin_con'),
  'od_con_cor'=> $this->input->post('od_con_cor'),
  'od_mas_o_meno'=> $this->input->post('od_mas_o_meno'),
  'od_cor_act'=> $this->input->post('od_cor_act'),
  'os_sin_con'=> $this->input->post('os_sin_con'),
  'os_con_cor'=> $this->input->post('os_con_cor'),
  'os_mas_o_meno'=> $this->input->post('os_mas_o_meno'),
  'os_cor_act'=> $this->input->post('os_cor_act'),
  'retine1'=> $this->input->post('retine1'),
  'retine2'=> $this->input->post('retine2'),
  'retine3'=> $this->input->post('retine3'),
   'retine4'=> $this->input->post('retine4'),
 'retine5'=> $this->input->post('retine5'),
 'retine6'=> $this->input->post('retine6'),
  'retine7'=> $this->input->post('retine7'),
 'retine8'=> $this->input->post('retine8'),
  'masomenos1'=> $this->input->post('masomenos1'),
  'masomenos2'=> $this->input->post('masomenos2'),
  'masomenos3'=> $this->input->post('masomenos3'),
   'masomenos4'=> $this->input->post('masomenos4'),
 'masomenos5'=> $this->input->post('masomenos5'),
 'masomenos6'=> $this->input->post('masomenos6'),
  'masomenos7'=> $this->input->post('masomenos7'),
 'masomenos8'=> $this->input->post('masomenos8'),
'ppm'=> $this->input->post('ppm'),
'converg'=> $this->input->post('converg'),
'ducvers'=> $this->input->post('ducvers'),
'convertest'=> $this->input->post('convertest'),
'od_espera_r'=> $this->input->post('od_espera_r'),
 'od_espera'=> $this->input->post('od_espera'),
'od_cilindro'=> $this->input->post('od_cilindro'),
'od_cilindro_r'=> $this->input->post('od_cilindro_r'),
'eje_od'=> $this->input->post('eje_od'),
'add_od'=> $this->input->post('add_od'),
'vision_od'=> $this->input->post('vision_od'),
'espera_os'=> $this->input->post('os_espera'),
 'os_espera_r'=> $this->input->post('os_espera_r'),
'cilindro_os'=> $this->input->post('os_cilindro'),
'os_cilindro_r'=> $this->input->post('os_cilindro_r'),
'eje_os'=> $this->input->post('eje_os'),
'add_os'=> $this->input->post('add_os'),
'vision_os'=> $this->input->post('vision_os'), 

'conj1'=> $this->input->post('conj1'), 
'conj2'=> $this->input->post('conj2'), 
'cornea1'=> $this->input->post('cornea1'), 
'cornea2'=> $this->input->post('cornea2'), 
'pup1'=> $this->input->post('pup1'), 
'pup2'=> $this->input->post('pup2'), 
'crist1'=> $this->input->post('crist1'), 
'crist2'=> $this->input->post('crist2'), 
'vitreo1'=> $this->input->post('vitreo1'), 
'vitreo2'=> $this->input->post('vitreo2'), 
'fondos1'=> $this->input->post('fondos1'), 
'fondos2'=> $this->input->post('fondos2'),
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=>date("Y-m-d H:i:s"),
'ojo'=>"ojo-".time(). ".png",
'fondo'=>"fondo-".time(). ".png"
);
$this->model_admin->SaveUpOftala($this->input->post('id_oftal'),$data);

/*//save ojo in folder

$upload_dir = './assets/img/oftal/';
$file = $upload_dir . time() . ".png";
$data1 = $_POST['canvasData1'];
$data1 = substr($data1,strpos($data1,",")+1);
$data1 = base64_decode($data1);
file_put_contents($file, $data1);

//save fondo in folder

$filef = $upload_dir . time() . ".png";
$data2 = $_POST['canvasData2'];
$data2 = substr($data2,strpos($data2,",")+1);
$data2 = base64_decode($data2);
file_put_contents($filef, $data2);


*/






	//---------------------upload oyo----------------------------------------------
$upload_dir = './assets/img/oftal/';
$file1 = $upload_dir ."ojo-". time() . ".png";
$data1 = $_POST['canvasData1'];
$data1 = substr($data1,strpos($data1,",")+1);
$data1 = base64_decode($data1);
file_put_contents($file1, $data1);

//---------------------upload fondo----------
$file2 = $upload_dir ."fondo-". time() . ".png";
$data2 = $_POST['canvasData2'];
$data2 = substr($data2,strpos($data2,",")+1);
$data2 = base64_decode($data2);
file_put_contents($file2, $data2);




}




public function factura_table_view()
{
	$data['billings2']=$this->model_admin->ViewFact2($this->input->post('id_facc'));
    $billings=$this->model_admin->ViewFact($this->input->post('id_facc'));
	$data['billings']=$billings;
	$data['count']=count($billings);
	$data['idfacc']=$this->input->post('id_facc');
	$data['is_admin']=$this->input->post('is_admin');
	$data['user']=$this->input->post('user');
	$data['identificar']=$this->input->post('identificar');
	$data['id_patient']=$this->input->post('id_patient');
	 $tarif=$this->db->select('centro_medico,medico,seguro_medico')->where('idfacc',$this->input->post('id_facc'))->get('factura2')->row_array();
	 $data['centro_in_fac']=$tarif['centro_medico'];
	  $data['medico']=$tarif['medico'];
	  $data['seguro']=$tarif['seguro_medico'];
	 $data['centro']=$this->db->select('name')->where('id_m_c',$tarif['centro_medico'])->get('medical_centers')->row('name');
	 $data['serv_centro']=$this->model_admin->Service_centro($tarif['centro_medico']);
	$val= array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico']
	);
    $data['serv']=$this->model_admin->Serviciomssm($val);
	$this->load->view('medico/billing/bill/facturaTableView', $data);
}



public function UpdateBill1()
{
	
$update_date=date("Y-m-d H:i:s");
$save2= array(
'updated_by' =>$this->input->post('updated_by'),
'update_date' =>$update_date
);
$this->model_admin->UpdateBill2($this->input->post('idfacc'),$save2);


//************************************************************


if($this->input->post('action')==1){
	$save= array(
'pat_id' =>$this->input->post('id_patient'),
'service' =>$this->input->post('service'),
'cantidad' =>$this->input->post('cantidad'),
'preciouni' =>$this->input->post('preciouni'),
'subtotal' =>$this->input->post('subtotal'),
'totalpaseg' =>$this->input->post('totalpaseg'),
'descuento' =>$this->input->post('descuento'),
'totpapat' =>$this->input->post('totpapat'),
'medico2' =>$this->input->post('medico'),
'seguro' =>$this->input->post('seguro'),
'filter' =>date('Y-m-d'),
'id2' =>$this->input->post('idfacc'),
'updated_by' =>$this->input->post('updated_by'),
'updated_time' =>$update_date,
'created_by' =>$this->input->post('updated_by'),
'inserted_time' =>$update_date,
);
$this->model_admin->SaveBill($save);
} 
else 
{
$save= array(
'service' =>$this->input->post('service'),
'cantidad' =>$this->input->post('cantidad'),
'preciouni' =>$this->input->post('preciouni'),
'subtotal' =>$this->input->post('subtotal'),
'totalpaseg' =>$this->input->post('totalpaseg'),
'descuento' =>$this->input->post('descuento'),
'totpapat' =>$this->input->post('totpapat'),
'updated_by' =>$this->input->post('updated_by'),
'updated_time' =>$update_date,
);
$this->model_admin->UpdateBill1($this->input->post('idfac'),$save);
}

}




public function updateBillTable()
{
	$data['increment_select2']=$this->input->post('id_fact');
	$data['billings']=$this->model_admin->updateBillTable($this->input->post('id_fact'));
	 $tarif=$this->db->select('centro_medico,medico,seguro_medico')->where('idfacc',$this->input->post('id_facc'))->get('factura2')->row_array();
	 $data['centro_in_fac']=$tarif['centro_medico'];
	$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($tarif['centro_medico']);
	$data['idfacc']=$this->input->post('id_facc');
	$data['is_admin']=$this->input->post('is_admin');
	$data['user']=$this->input->post('user');
	$data['identificar']=$this->input->post('identificar');
	$val= array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico']
	);
    $data['serv']=$this->model_admin->Serviciomssm($val);
	
	$this->load->view('medico/billing/bill/updateBillTable', $data);
}





public function delete_factura()
{
$this->model_admin->delete_factura3($this->input->post('id'));
}




public function UpdateBillHead()
{
	
$update_date=date("Y-m-d H:i:s");
$save2= array(
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'updated_by' =>$this->input->post('user'),
'comment' =>$this->input->post('comment'),
'update_date' =>$update_date
);
$this->model_admin->UpdateBill2($this->input->post('id_facc'),$save2);

}



public function bills_data()
{ 
$id_user=$this->input->post('user_id');
$data['id_user'] = $id_user ;
$controller=$this->input->post('controller');
$data['controller']=$controller;
if($controller=="admin"){
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

public function citas_hoy(){
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('filter_date',date("Y-m-d"))->get('rendez_vous');
echo $query_citas->num_rows();	

}

public function cola_de_solicitud(){
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->get('rendez_vous');

echo $query_sol->num_rows();	

}




public function citas_hoy_medico(){
$query_citas=$this->db->select('id_apoint')->where('confirmada',0)->where('doctor',$this->uri->segment(3))->where('filter_date',date("Y-m-d"))->get('rendez_vous');
echo $query_citas->num_rows();	

}

public function cola_de_solicitud_medico(){
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->where('doctor',$this->uri->segment(3))->get('rendez_vous');


echo $query_sol->num_rows();	

}





public function confirmar_solicitud()
{
$idc=$this->uri->segment(3);
$solicitud=$this->uri->segment(4);
$user=$this->db->select('name')->where('id_user',$this->uri->segment(5))->get('users')->row("name");
$data = array(
'confirmada1'=>0,
'inserted_by'=>$user,
'updated_by'=>$user,
'insert_date'=>date("Y-m-d H:i:s"), 
'update_date'=>date("Y-m-d H:i:s")
);

$data1 = array(
'confirmada'=>0,
'inserted_by'=>$user,
'update_by'=>$user,
'created_time'=>date("Y-m-d H:i:s"), 
'update_time'=>date("Y-m-d H:i:s")
);
$this->model_admin->set_cita_to_confirm_patient($idc,$data);
$this->model_admin->set_cita_to_confirm_rendez_vous($idc,$data1);
//-----add solicitud to cita----------------------
$msg = "<div id='deletesuccess' style='text-align:center;color:green'>Solicitud # <b>$solicitud</b> esta confirmada.</div>";
$this->session->set_flashdata('success_msg', $msg);
//redirect('admin/patients_requests');
redirect($_SERVER['HTTP_REFERER']);
}



public function patient_request(){
$id_sol=$this->uri->segment(3);
$data['user_id']=$this->uri->segment(4);
$data['VerSolicitud']= $this->model_admin->VerSolicitud($id_sol);
$this->load->view('admin/pacientes-citas/patient-request', $data);

}




//====================================================================================================
}