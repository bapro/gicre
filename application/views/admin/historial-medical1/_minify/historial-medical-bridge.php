<?php
	$historial_id=$this->input->post('historial_id');
    $areaid=$this->input->post('areaid');
	$data['centro_medico']=$this->input->post('centro_medico');
     $data['hist']=$this->input->post('hist');
	$data['id_historial']=$historial_id;
$data['emergency_id']=0;
$data['areaid']=$areaid;
$data['area']=$this->db->select('title_area')->where('id_ar',$areaid)->get('areas')->row('title_area');

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
$this->load->view('admin/historial-medical1/js-links');
if($rows < 1){
	echo '<style>
font{display:none}
</style>';
$this->load->view('admin/historial-medical1/header',$data);
if($areaid==0){
$this->load->view('admin/historial-medical1/menu-aside',$data);
} else {
$this->load->view('admin/historial-medical1/menu-aside-doctor',$data);
}
$this->load->view('admin/historial-medical1/historial-medical', $data);
$this->load->view('admin/historial-medical1/footer-empty', $data);
} 


else
{
$data['row_ant'] = $this->model_admin->showAnte($historial_id);
$data['desa'] = $this->model_admin->showDesarollo($historial_id);
$data['AntOtros']=$this->model_admin->GetAntOtros($historial_id);
$data['HABITOS']=$this->model_admin->GetHabitos($historial_id);
$data['droga'] = $this->model_admin->showDrug($historial_id);
$this->load->view('admin/historial-medical1/header',$data);
if($areaid==0){
$this->load->view('admin/historial-medical1/menu-aside',$data);
} else {
$this->load->view('admin/historial-medical1/menu-aside-doctor',$data);
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