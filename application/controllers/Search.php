<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
}

 function getPatientSearchResult()
{
$table=$this->input->post('table');
if(!empty($table)) {	
$seach_content= $this->input->post('seach_content');
$input_class =implode(' ',$this->input->post('input_class'));
if($input_class=="search-patient-ced"){
$WHERE="WHERE cedula=$seach_content";
}else if($input_class=="search-patient-nec"){
$WHERE="WHERE id_p_a=$seach_content";	
}else{
$WHERE="WHERE nombre like '" . $seach_content . "%'";	
}

if($table=='hospitalization_data'){
$and=' && alta=1';	
}else if($table=='rendez_vous'){
$and='';	
}		
$sql = "SELECT id_p_a, nombre,cedula,seguro_medico,afiliado,tel_cel,tel_resi,calle,barrio,email FROM patients_appointments $WHERE ";
$data['query'] = $this->db->query($sql);
$data['table'] = $table;
$this->load->view('search/searchResultPatient', $data);

}
}

 
  function patientResult()
{
$table=$this->input->post('table');
$idDoc=$this->input->post('idDoc');
$idCent=$this->input->post('idCent');
if(!empty($idCent) || !empty($idDoc)) {
	$data['executionStartTime'] = microtime(true);
$idpat=$this->input->post('id_patient');
$id_user=$this->input->post('id_user');

$data['id_user']=$id_user;
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['perfil']=$perfil;
 $val = array(
'id_patient'=>$idpat,
'doctor'=>$idDoc,
'centro_medico'=>$idCent,
'perfil'=>$perfil
);


$data['get_fac_val'] = array(
'id_patient'=>$idpat,
'doctor'=>$idDoc,
'centro_medico'=>$idCent,
'perfil'=>$perfil
);



$data['patient_data']=$this->model_admin->historial_medical($idpat);
if($table=='hospitalization_data'){
$sql ="SELECT * FROM $table where id_patient=$idpat && centro=$idDoc &&  alta=1";
$hosp = $this->db->query($sql);
$data['hosp_data'] =$hosp;
$data['count']=$hosp->num_rows;
$data['id_centro']=$idDoc;
$this->load->view('hospitalizacion/factura/search-result',$data);
}
else if($table=='rendez_vous'){
//$data['citas']=$this->model_admin->Search_factura($val);
$data['factura_sin_cita']=$this->model_admin->facturaSinCita($val);
$this->load->view('admin/billing/bill/search-result',$data);
	
}
}
}

function getFacturas(){
 $val = array(
'id_patient'=>$this->input->post('id_patient'),
'doctor'=>$this->input->post('doctor'),
'centro_medico'=>$this->input->post('centro_medico'),
'perfil'=>$this->input->post('perfil')
);


$controller=$this->input->post('controller');

$citas=$this->model_admin->Search_factura($val);

echo "<h3>FACTURAS DE CITAS</h3>";
echo "<table class='table fixed table-striped' align='center' id='center-it' style='font-size:10px;background:#E0E5E6;' >";
echo '<thead>';
echo '<tr style="background:#38a7bb;color:white">';
echo '<th style="display:none"></th>';
echo '<th>CENTRO MEDICO</th>';
echo '<th> MEDICO</th>';
echo '<th> ARS</th>';
echo '<th>FECHA</th>';
echo '<th>Accion</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach($citas as $row_citas)
{ 

$seguro_medico=$this->db->select('seguro_medico')->where('id_p_a',$row_citas->id_patient)->get('patients_appointments')->row('seguro_medico');

$seguro_title=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');


$centro=$this->db->select('name,type')->where('id_m_c',$row_citas->centro)->get('medical_centers')->row_array();
$medico=$this->db->select('name')->where('id_user',$row_citas->doctor)->get('users')->row('name');
$type=$centro["type"];


$is_billed_already=$this->db->select('id_rdv,idfacc,update_date')->where('id_rdv',$row_citas->id_apoint)->get('factura2')->row_array();
$idfacc=$is_billed_already['idfacc'];

 if($is_billed_already['id_rdv']==0) {
$show_date=$row_citas->fecha_propuesta;
 }else{
$show_date=date("d-m-Y", strtotime($is_billed_already['update_date']));
 }
echo "<tr>";

echo "<td   style='display:none'>" . $row_citas->filter_date . "</td>"; 
echo "<td>" . $centro["name"] . "</td>"; 
echo "<td>" . $medico . "</td>"; 
echo "<td>" . $seguro_title . "</td>"; 
echo "<td>" . $show_date. "</td>"; 


echo "<td>";

 if($is_billed_already['id_rdv']==0) 
{
if($seguro_title==""){
echo '<span style="color:red">No hay seguro</span>';
}else{

$typ = encrypt_url($type);	
$id_ap= encrypt_url($row_citas->id_apoint);	
$doc= encrypt_url($row_citas->doctor);	
$cent= encrypt_url($row_citas->centro);
$seg= encrypt_url($seguro_medico);	
$id_p_a= encrypt_url($row_citas->id_patient);	
echo "<a href='".base_url()."$controller/patient_billing_/$typ/$id_ap/$doc/$cent/$seg/$id_p_a' target='_blank'><button  class='btn btn-primary  btn-xs disabled-me'>Facturar</button></a>";
}
} else {
if($seguro_medico==11){
$goto="viewPrivateBill";
} else{
$goto="bill";
}

$id_fac = encrypt_url($idfacc);
$typ = encrypt_url($type);
echo "<a target='_blank'  href='".base_url()."$controller/$goto/$id_fac/$typ' >VER FACTURA</a>";

} 
echo "</td>";
			
  echo "</tr>";
}
  echo "</tbody>";
echo "</table>";

		echo "<script> 
		$('#center-it').DataTable( {
'language': {
'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
},
'aaSorting': [ [0,'desc'] ],});

$('.disabled-me').on('click', function(e) {
$(this).prop('disabled',true);

});

</script>";
}






function getFacturasAmb(){
 $val = array(
'id_patient'=>$this->input->post('id_patient'),
'doctor'=>$this->input->post('doctor'),
'centro_medico'=>$this->input->post('centro_medico'),
'perfil'=>$this->input->post('perfil')
);


$controller=$this->input->post('controller');

$factura_sin_cita=$this->model_admin->facturaSinCita($val);
if($factura_sin_cita !=NULL){ 
echo "<h3>FACTURAS AMBULATORIAS</h3>";
echo "<table class='table fixed table-striped' align='center' id='facsincita' style='font-size:10px;background:#E0E5E6;' >";
echo '<thead>';
echo '<tr style="background:#38a7bb;color:white">';
echo '<th>CENTRO MEDICO</th>';
echo '<th> MEDICO</th>';
echo '<th> ARS</th>';
echo '<th>FECHA</th>';
echo '<th>Accion</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

foreach($factura_sin_cita as $row)
{ 

$seguro_title=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
if($row->medico==1){
$medico=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$medico = $medico." <em><strong>(as. médico)</strong></em>";
}else{
	
$medico=$this->db->select('name')->where('id_user',$row->medico)->get('users')->row('name');
}
$centro=$this->db->select('name,type')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row_array();
$type=$centro['type'];	
	if($row->seguro_medico==11){
		$goto="viewPrivateBill";
	} else{
		$goto="bill";
	}

echo "<tr>";
echo "<td>" . $centro["name"] . "</td>"; 
echo "<td>" . $medico . "</td>"; 
echo "<td>" . $seguro_title . "</td>"; 
echo "<td>" .date("d-m-Y", strtotime($row->fecha)). "</td>"; 
echo "<td>";
$id_fac = encrypt_url($row->idfacc);
$typ = encrypt_url($type);
echo "<a target='_blank'  href='".base_url()."$controller/$goto/$id_fac/$typ' >VER FACTURA</a>";

echo "</td>";
			
  echo "</tr>";
}
  echo "</tbody>";
echo "</table>";

		echo "<script> 
$('#facsincita').DataTable( {
'language': {
'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
},
'aaSorting': [ [0,'desc'] ],

});
</script>";
}
}




 function familyRelationship()
{
$data['id_pat']=$this->input->post('send-pat-id');
$data['id_user']=$this->input->post('send-user-id');
$data['patient'] = $this->model_admin->historial_medical($this->input->post('send-pat-id'));
$data['tutor']=$this->model_admin->getTutor($this->input->post('send-pat-id'));	
$data['id_user']=$this->input->post('send-user-id');
$this->load->view('getPatientAge');
$sql ="SELECT * FROM patient_carac_viv WHERE id_patient=".$this->input->post('send-pat-id');
$queryCV= $this->db->query($sql);
$data['queryCV']=$queryCV;

$sqlVac ="SELECT * FROM  h_c_vacunacion WHERE hist_id=".$this->input->post('send-pat-id');
$queryVac= $this->db->query($sqlVac);
$data['queryVac']=$queryVac;

$this->load->view('medico/pacientes-citas/family-relationship', $data);	
$this->load->view('admin/historial-medical1/pediatrico/footer');	
}

 function getBirthDateMember()
{
$id_member=$this->input->post('id_member');
$data['id_member']=$id_member;

$id_jefe=$this->input->post('id_jefe');
$data['id_jefe']=$id_jefe;

$sql ="SELECT * FROM patient_birth_certificate WHERE id_jefe=$id_jefe && id_member=$id_member";
$query= $this->db->query($sql);

$data['query']=$query;

$name=$this->db->select('name_tutor')->where('id',$this->input->post('id_member'))->get('tutor')->row('name_tutor');

$data['hay_acto']= "DE $name";
$this->load->view('medico/pacientes-citas/birth-certificate-family-member',$data);
}




 function saveAllFichaFamData()
{
	
$idCv=$this->input->post('idCv');	
$response['message'] = "Datos de la ficha guadados!"; 
$response['status'] =  '';

if($this->input->post('llenar_por_otro') !=""){
$fecha_lleno_por="";
}else{
	$fecha_lleno_por=$this->input->post('fecha_lleno_por');
	}

$save = array(
'id_patient'=> $this->input->post('id_jefe'),
'gpsx'=> $this->input->post('gpsx'),
'gpsy'=> $this->input->post('gpsy'),
'num_viv_croquis'=> $this->input->post('num_viv_croquis'),
'num_ficha_fam'=> $this->input->post('num_ficha_fam'),
'srs'=> $this->input->post('srs'),
'numero_casa'=> $this->input->post('numero_casa'),
'area_de_saluds'=> $this->input->post('area_de_saluds'),
'seccion'=> $this->input->post('seccion'),
'zona_de_salud'=> $this->input->post('zona_de_salud'),
'programa_social'=> $this->input->post('programa_social'),
'sub_barrio'=> $this->input->post('sub_barrio'),
'paraje'=> $this->input->post('paraje'),
'fecha_lleno_por'=> $fecha_lleno_por,
'llenar_por_otro'=> $this->input->post('llenar_por_otro'),
'cv_fecha_vivienda'=> $this->input->post('cv_fecha_vivienda'),
'cv_tenencia_vivienda'=> $this->input->post('cv_tenencia_vivienda'),
'cv_paredes_vivienda'=> $this->input->post('cv_paredes_vivienda'),
'cv_techo_vivienda'=> $this->input->post('cv_techo_vivienda'),
'cv_piso_vivienda'=> $this->input->post('cv_piso_vivienda'),
'cv_servicios_sanitarios'=> $this->input->post('cv_servicios_sanitarios'),
'cv_agua_instalacion'=> $this->input->post('cv_agua_instalacion'),
'cv_abat_agua'=> $this->input->post('cv_abat_agua'),
'cv_elim_basura'=> $this->input->post('cv_elim_basura'),
'cv_servicio_elec'=> $this->input->post('cv_servicio_elec'),
'cv_num_dormi'=> $this->input->post('cv_num_dormi'),
'cv_comb_cocina'=> $this->input->post('cv_comb_cocina'),
'cv_animal_dom'=> $this->input->post('cv_animal_dom'),
'cv_vect_criad'=> $this->input->post('cv_vect_criad'),
'puntuacion'=> $this->input->post('puntuacion'),
'calificacion'=> $this->input->post('calificacion'),
'acta_med_uso_f'=> $this->input->post('acta_med_uso_f'),
'acta_obs'=> $this->input->post('acta_obs'),
'vis_dom_fecha'=> date("Y-m-d",strtotime($this->input->post('vis_dom_fecha'))),
'vis_dom_mot_vis'=> $this->input->post('vis_dom_mot_vis'),
'vis_dom_prin_prob_fam'=> $this->input->post('vis_dom_prin_prob_fam'),
'vis_dom_prin_ac_rec'=> $this->input->post('vis_dom_prin_ac_rec'),
'vis_dom_fecha_prox_vis'=> date("Y-m-d",strtotime($this->input->post('vis_dom_fecha_prox_vis'))),
'vis_dom_pers_vis'=> $this->input->post('vis_dom_pers_vis'),
);



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

'hist_id'=> $this->input->post('id_jefe')
);



if($idCv==""){
	$this->db->insert("patient_carac_viv",$save);
	$this->model_admin->saveVacuna($save2);

}else{
	$where= array(
  'id' =>$idCv
);

$this->db->where($where);
$this->db->update("patient_carac_viv",$save);	

}

echo json_encode($response);	
}







 function saveActaData()
{
$id_acta=$this->input->post('id_acta');
if($this->input->post('trabaja')=="si" && $this->input->post('working') =="" ){
$response['message'] = 'Donde trabja ?'; 
$response['status'] =  1;
}else{
$name=$this->db->select('name_tutor')->where('id',$this->input->post('id_member'))->get('tutor')->row('name_tutor');	
$response['message'] = "La acta de nacimiento de $name fue guardada!"; 
$response['status'] =  '';
$save = array(
'acta_mun_dis'=> $this->input->post('acta_mun_dis'),
'id_jefe'=> $this->input->post('id_jefe'),
'id_member'=> $this->input->post('id_member'),
'acta_num_of'=> $this->input->post('acta_num_of'),
'acta_mun_libro'=> $this->input->post('acta_mun_libro'),
'acta_mun_folio'=> $this->input->post('acta_mun_folio'),
'acta_mun_acta'=> $this->input->post('acta_mun_acta'),
'ano_libro'=> $this->input->post('ano_libro'),
'escolaridad'=> $this->input->post('escolaridad'),
'trabaja'=> $this->input->post('trabaja'),
'working'=> $this->input->post('working'),
'acta_num_seg_social'=> $this->input->post('acta_num_seg_social'),
'acta_fact_riesg'=> $this->input->post('acta_fact_riesg'),
'fecha_de_ingreso_nacio'=>date("Y-m-d",strtotime($this->input->post('fecha_de_ingreso_nacio'))),
'fecha_de_ingreso_llego'=>date("Y-m-d",strtotime($this->input->post('fecha_de_ingreso_llego'))),
'fecha_de_egreso_salio'=>date("Y-m-d",strtotime($this->input->post('fecha_de_egreso_salio'))),
'fecha_de_egreso_murio'=>date("Y-m-d",strtotime($this->input->post('fecha_de_egreso_murio'))),
'afiliado_sdss'=> $this->input->post('afiliado_sdss'),
'tiene_acta'=> $this->input->post('tiene_acta')
);


if($id_acta==""){
$this->db->insert("patient_birth_certificate",$save);
}else{
	$where= array(
  'id' =>$id_acta
);

$this->db->where($where);
$this->db->update("patient_birth_certificate",$save);	
}

}
	echo json_encode($response);
	
	
}


public function delBirthDateMember()
{
$where= array(

  'id_member'=>$this->input->post('id_member')
);

$this->db->where($where);
$this->db->delete('patient_birth_certificate');
}







}