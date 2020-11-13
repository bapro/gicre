<?php
	$historial_id=$this->uri->segment(3);
		$user_id=$this->uri->segment(4);
    $areaid=$this->uri->segment(5);
	$centro_medico=$this->uri->segment(6);
	$data['centro_medico']=$centro_medico;
     $data['hist']=$this->uri->segment(7);
	 	 $trueuser=$this->uri->segment(8);
	 $data['trueuser']=$trueuser;
	 
	 
	$where = array(
  'id_p'=>$historial_id,
  'id_doc'=>$user_id,
  'id_cm'=>$this->uri->segment(6),
   'origine'=>0
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc'); 
	 
	  
if($historial_id=="" || $historial_id==0 || $this->uri->segment(7)=="" || $user_id=="" || $areaid=="" || $this->uri->segment(6)==""){
		redirect('/page404');	
	}
	$data['id_historial']=$historial_id;
$data['emergency_id']=0;
$data['areaid']=$areaid;
$data['area']=$this->db->select('title_area')->where('id_ar',$areaid)->get('areas')->row('title_area');


$alergia=$this->model_admin->Ant_alergia($historial_id);
$data['alergia']=$alergia;
$data['count_alergia']=count($alergia);


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

$oftal=$this->model_admin->Oftal($historial_id);
$data['oftal']=$oftal;
$data['count_oft']=count($oftal);

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
//$data['diag_pres']=$this->model_admin->Diag_pres();
//$data['diag_pro']=$this->model_admin->Diag_pro();
//--------ControPrenal----------------------------------------------------
$data['ControPrenal']=$this->model_admin->ControPrenal($historial_id);
	$data['count_cont_prenal']=$this->model_admin->CountControPrenal($historial_id);
	
$dermatologo=$this->model_admin->Dermatologo($historial_id);
$data['dermatologo']=$dermatologo;
$data['count_derma']=count($dermatologo);
$data['derma_tipo']=$this->model_admin->dermaTipo();
$data['derma_morfo']=$this->model_admin->dermaMorfo();
$data['derma_interog']=$this->model_admin->dermaIntero();	
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
//$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
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

$value = array(
'singular_id'=> 0
);
$this->model_admin->UpdateSingularId($idpatient,$value);

$data['GinecOb']=$this->model_admin->GinecOb();
$data['drug']=$this->model_admin->droga();
$rows=$this->model_admin->countAnte1($historial_id);
$data['antege']=$rows;
$data['user_id']=$user_id;
$data['user']=$this->db->select('name')->where('id_user',$user_id)->get('users')->row('name');
if($perfil=="Admin"){
$where_gnr='';	
$where_fib='';
$where_q='';
}else{
$where_gnr="AND id_user=$trueuser";
$where_fib="AND user=$trueuser";
$where_q="AND id_user=$trueuser";
}
 $count_gnl =$this->db->query("SELECT id_patient FROM hc_cirugia_reporte WHERE id_patient=$historial_id $where_gnr");
  $data['count_gnl']=$count_gnl->num_rows();
  
  $count_fib =$this->db->query("SELECT id_patient  FROM hc_cirugia_toracica WHERE id_patient=$historial_id $where_fib");
  $data['count_fib']=$count_fib->num_rows(); 
  
   $count_qui =$this->db->query("SELECT id_patient FROM hc_quirurgica WHERE id_patient=$historial_id $where_gnr");
  $data['count_qui']=$count_qui->num_rows();
    
    $count_ipps =$this->db->query("SELECT historial_id  FROM h_c_ipss WHERE historial_id=$historial_id $where_gnr");
  $data['count_ipps']=$count_ipps->num_rows(); 
  
   $count_ord =$this->db->query("SELECT id_historial  FROM orden_medica_sala WHERE id_historial=$historial_id $where_gnr");
  $data['count_ord']=$count_ord->num_rows(); 
  
  
   $count_card =$this->db->query("SELECT patient  FROM hc_evaluacion_car_vas WHERE patient=$historial_id $where_gnr");
  $data['count_card']=$count_card->num_rows(); 
  
$this->load->view('admin/historial-medical1/js-links');
 $data['desa'] = $this->model_admin->showDesarollo($historial_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['droga'] = $this->model_admin->showDrug($historial_id);
 
$row_ant = $this->model_admin->showAnte($historial_id);
$data['row_ant']=$row_ant;
//if($row_ant==NULL){
		//redirect('/page404');	
	//}
$today=date('Y-m-d');
 $perfil=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
 if($perfil=='Admin'){
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$historial_id AND  centro_medico=$centro_medico";
	 
 }else{
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$historial_id AND user_id=$user_id AND centro_medico=$centro_medico";
 }

$atendido_con = $this->db->query($sql_con);
//if($rows < 1){
//if($this->uri->segment(7)==0 ){
if($atendido_con->num_rows()==0 && $this->uri->segment(7) !=4){
	echo '<style>
font{display:none}
</style>';
$this->load->view('admin/historial-medical1/header-empty-data',$data);
if($areaid==0){
if($user_id==344){
$this->load->view('admin/historial-medical1/menu-aside-doc-344',$data);
}else{	
$this->load->view('admin/historial-medical1/menu-aside',$data);
}
} else {
if($user_id==344){
$this->load->view('admin/historial-medical1/menu-aside-doc-344',$data);
}else{
$this->load->view('admin/historial-medical1/menu-aside-doctor',$data);
}
}

if($rows < 1){
$this->load->view('admin/historial-medical1/historial-medical', $data);
$this->load->view('admin/historial-medical1/footer-empty', $data);
}else{
$this->load->view('admin/historial-medical1/all-data/historial-medical', $data);
$this->load->view('admin/historial-medical1/all-data/footer-ant-general');
}
} 


else
{

$this->load->view('admin/historial-medical1/header',$data);
if($areaid==0){
if($user_id==344){
$this->load->view('admin/historial-medical1/menu-aside-doc-344',$data);
}else{
$this->load->view('admin/historial-medical1/menu-aside',$data);
}
} else {
if($user_id==344){
$this->load->view('admin/historial-medical1/menu-aside-doc-344',$data);
}else{
$this->load->view('admin/historial-medical1/menu-aside-doctor',$data);
}
}
$this->load->view('admin/historial-medical1/all-data/historial-medical', $data);
$this->load->view('admin/historial-medical1/all-data/footer-ant-general');
}

$this->load->view('admin/historial-medical1/footer-commun', $data);



echo '<div class="modal fade" id="relacion_familiares"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>';
?>