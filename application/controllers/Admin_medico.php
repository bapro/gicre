<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_medico extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('model_admin');
$this->load->model('model_medico');
$this->load->model("padron_model");
 $this->load->model('navigation/account_demand_model');
$this->load->model('excel_import_model');
$this->load->model('model_auditoria_medica');
$this->load->model("model_emergencia");
$this->load->library('excel');
$this->load->library("Pdf");
 $this->load->library('email');
 $this->load->helper('email');
 	$this->load->helper('string');
   $this->load->library("pagination");
 //$this->load->helper('sendsms_helper');
 $this->load->library('form_validation'); 
}

public function changePassw()
{
	$data['id_admin']= $this->uri->segment(3);
	$data['id_current_user']= $this->uri->segment(4);
	$data['button']="Restablecer la contraseña";
	$data['title']="Cambiar Contraseña";
$this->load->view('medico/user/update-passw', $data);
}

public function NewPassword(){
$id= $this->input->post('id_user');
$data = array(
  'password' => md5($this->input->post('pass1')),
  'updated_by' => $this->input->post('id_current_user'),
  'update_date' => date("Y-m-d H:i:s")
  );
$this->model_admin->DeactivarUser($id,$data);
$msgs='<p  class="alert alert-success">La Contraseña esta cambiada.</p>';
$this->session->set_flashdata('msg_pass',$msgs);
redirect($_SERVER['HTTP_REFERER']);
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



public function saveAsDoctorUpdate(){
$modify_date=date("Y-m-d H:i:s");
$id_user  = $this->input->post('id_user');
$data3 = array(
'correo' =>$this->input->post('email'),
 'update_date' => $modify_date,
  'updated_by' => $id_user
  );

$this->model_admin->DeactivarUser($id_user,$data3);
$centro_medico  = $this->input->post('centro_medico');
$medico  = $this->input->post('medico');
$this->model_admin->deleteDocCentro($id_user);

for ($i = 0; $i < count($centro_medico); ++$i ) {
    $idcentro = $centro_medico[$i];

	$saveD= array(
	'id_doctor' =>$id_user,
	'centro_medico' => $idcentro
	);

	$this->model_admin->saveDoctorCentroMedico($saveD);
}
//-----------------------------------------------------------------------

$where1 = array(
'id_asdoc' =>$id_user
);

$this->db->where($where1);
$this->db->delete('centro_doc_as');

for ($i2 = 0; $i2 < count($medico); ++$i2 ) {
    $idmedico = $medico[$i2];

	$savedas= array(
	'id_doctor' =>$idmedico,
	'id_asdoc' => $id_user
	);

	$this->db->insert("centro_doc_as",$savedas);
}


$msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Usuario se edita con exito.</h4>";
$this->session->set_flashdata('success_msg', $msg);

redirect($_SERVER['HTTP_REFERER']);
}


 public function pagination_data_ipss()
	 {
	 $page= $this->input->get('page');
	$user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $perfil= $this->input->get('perfil');

	if($perfil=="Admin"){
		$contition="";
		}else{
		$contition="id_user=$user_id AND";
		}

	  $data['id_patient']=$id_patient;
	    $data['user_id']=$user_id;
	  $data['centro_medico']= $this->input->get('centro_medico');
	 $data['page']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from h_c_ipss where $contition historial_id=$id_patient order by id desc limit $start,$per_page";
	$data['ipss_paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/ipss/paginate',$data);
     }

 public function pagination_data_cirugia_general()
	 {
	 $page= $this->input->get('page');
	$user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $perfil= $this->input->get('perfil');

	if($perfil=="Admin"){
		$contition="";
		}else{
		$contition="id_user=$user_id AND";
		}

	  $data['id_patient']=$id_patient;
	    $data['user_id']=$user_id;
	  $data['centro_medico']= $this->input->get('centro_medico');
	 $data['page']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from hc_cirugia_reporte where $contition id_patient=$id_patient order by id desc limit $start,$per_page";
	$data['cirugia_paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/cirugia_toracica/general/paginate',$data);
     }



function listarFacturaAbono()
{
	$i=1;
	$total_bono=0;
		$subtotal=0;
$id_facc= $this->input->post('id_facc');	
$sqlsubt = "select subtotal from factura where id2=$id_facc";
$querysubt= $this->db->query($sqlsubt);
foreach($querysubt->result() as $rowquerysubt){
 $subtotal += $rowquerysubt->subtotal;
  
}
$subtotal1=number_format($subtotal,2);
echo "<table  class='table'>
<tr  style='background:#428bca;color:white'>
<th></th>
<th>Sub Total</th>
<th>RD$$subtotal1</th> 
</tr>
 <tr>
<th>#</th>
<th>FECHA</th>
<th>ABONO</th> 
</tr>

";
$sqlabono = "select * from factura_privado_bono where id_fac=$id_facc order by fecha DESC";
$abonodata= $this->db->query($sqlabono);
foreach($abonodata->result() as $row)
{

  $total_bono += $row->bono;
  //$total_bono=number_format($total_bono,2);

$fechabono = date('d-m-Y', strtotime($row->fecha));
$bono=number_format($row->bono,2);
echo"
<tr >
<td>";echo $i;$i++; echo "</td>
<td>$fechabono</td>
<td>RD$$bono <a style='cursor:pointer' class='delete-bono' id='$row->id' ><i class='fa fa-remove' style='color:red'></i></a></td>
</tr>
";
}

echo"
<tr >
<td></td>
<th>Total</th>
<th>
RD$$total_bono
</th>
</tr>
";
$resta= $subtotal - $total_bono;
$restaf=number_format($resta,2);
echo"
<tr style='background:red;color:white'>
<td></td>
<th>Resta</th>
<th id='bonoResta' style='display:none'>$resta</th>
<th id='bonoRestaF'>RD$$restaf</th>
</tr>
";


 echo "
</table>
";
$url='href="'.base_url().'admin_medico/deleteAbono/"';
echo "<script>
$('.delete-bono').on('click', function(event) {
if (confirm('Lo quieres borrar ?'))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:$url,
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
listarFacturaAbono();
 
}
});
}
})
</script>
";
}



 function comprobanteFiscalValue(){
$id =$this->input->post('id');
$id_facc =$this->input->post('id_facc');
$id_patient =$this->input->post('id_patient');
$id_user =$this->input->post('id_user');
$id =$this->input->post('id');
$compVal=$this->db->select('val,id')->where('id',$this->input->post('id'))->get('comprobante_fiscal')->row_array();
$val=$compVal['val'];
$compId=$compVal['id'];
$comprobante_check=$this->db->select('id_comprobante')->where('id_comprobante',$compId)->get('comprobante_fiscal_paciente')->row('id_comprobante');

$newval2 = substr($val, 3);
$newval1 = substr($val,0, 3);
$i=$newval2;
if($comprobante_check){
	
 $i;$i++;


    echo "$newval1".str_pad($i, 7, '0', STR_PAD_LEFT);	
	
	
}else{
	echo $val;
}
$compInc="$newval1".str_pad($i, 7, '0', STR_PAD_LEFT);
 //---if comprobante has been created for patient-------------------
 $comprobante_paciente=$this->db->select('id_paciente')->where('id_fac',$id_facc)->where('id_comprobante',$compId)->get('comprobante_fiscal_paciente')->row('id_paciente');

if($comprobante_paciente){

 $data = array(
'comprobante'=>"$newval1$newval2",
'id_comprobante'=>$compId,
'updated_by'=> $id_user,
'updated_time'=>date("Y-m-d H:i:s")
);

$where = array(
'id' =>$comprobante_check
);
$this->db->where($where);
$this->db->update("comprobante_fiscal_paciente",$data);	
}else{
	
$del = array(
  'id_paciente'=> $id_patient
);

$this->db->where($del);
$this->db->delete('comprobante_fiscal_paciente');	
	
	
 $data = array(
'id_paciente'=> $id_patient,
'comprobante'=>"$compInc",
'id_comprobante'=>$compId,
'id_fac'=> $id_facc,
'inserted_by'=> $id_user,
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_by'=> $id_user,
'updated_time'=>date("Y-m-d H:i:s")
);

$this->db->insert("comprobante_fiscal_paciente",$data);			
}
 
 
 
 }





 function deleteAbono(){
$where = array(
  'id'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('factura_privado_bono');


}

function saveFacturaBono(){
$bonoResta =$this->input->post('bonoResta');
$bono=$this->input->post('bono');
$fechabono = date('Y-m-d', strtotime($this->input->post('fecha')));
if($bono > $bonoResta)
{
echo 2;
}else{
$save = array(
 'fecha' =>$fechabono,
 'bono'=>$bono,
 'id_fac'=>$this->input->post('id_facc'),
  'id_user'=>$this->input->post('id_user')
);
$this->db->insert("factura_privado_bono",$save);
if($this->db->affected_rows() > 0){
  echo 1;
}else{
     echo 0;
}
}
}


public function pagination_data_orden_medica()
{
$page= $this->input->get('page');
$user_id= $this->input->get('user_id');
$id_patient= $this->input->get('id_patient');
$perfil= $this->input->get('perfil');
$direction= $this->input->get('direction');
$data['direction']=$direction;
$data['centro_id']= $this->input->get('centro_id');
$data['perfil']=$perfil;
if($perfil=="Admin"){
$contition="";
}else{
$contition="id_user=$user_id AND";
}

$data['id_patient']=$id_patient;
$data['user_id']=$user_id;
$data['id_em']=$this->input->get('id_em');
$data['page']=$page;
$per_page = 1;
$start = ($page-1)*$per_page;
$sql = "select * from orden_medica_sala where $contition id_historial=$id_patient AND direction=$direction ORDER BY idsala desc limit $start,$per_page";
$data['paginate_oreden_medica']= $this->db->query($sql);
$this->load->view('admin/historial-medical1/orden-medica/paginate',$data);
}

public function repetirOrdenMedica()
{
$idsala= $this->input->post('idsala');
$id_user= $this->input->post('id_user');
$sql = "select * from orden_medica_sala WHERE idsala=$idsala";
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
$this->db->insert("orden_medica_sala",$save1);
$id_last=$this->db->insert_id();
//-------------------------------------------------------------------------------------
$id_sala_rec=$this->db->select('id_sala')->where('id_sala',$idsala)->get('orden_medica_recetas')->row('id_sala');
if($id_sala_rec){
$sql = "select * from orden_medica_recetas WHERE id_sala=$idsala";
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
'idem' => $row->idem,
'descuento' => $row->descuento
);
$this->db->insert("orden_medica_recetas",$save2);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_rec=$this->db->select('id_sala')->where('id_sala',$idsala)->get('orden_medica_estudios')->row('id_sala');
if($id_sala_rec){
$sql = "select * from orden_medica_estudios WHERE id_sala=$idsala";
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
'idemes' => $row->idemes,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento
);
$this->db->insert("orden_medica_estudios",$save3);
}
}


//---------------------------------------------------------------------------------------------------
$id_sala_lab=$this->db->select('id_sala')->where('id_sala',$idsala)->get('orden_medcia_lab')->row('id_sala');
if($id_sala_lab){
$sql = "select * from orden_medcia_lab WHERE id_sala=$idsala";
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
'idemlab' => $row->idemlab,
'cantidad' => $row->cantidad,
'descuento' => $row->descuento

  );
$this->db->insert("orden_medcia_lab",$save3);
}
}

//---------------------------------------------------------------------------------------------------
$id_sala_gnrl=$this->db->select('id_sala')->where('id_sala',$idsala)->get('ord_med_med_gen')->row('id_sala');
if($id_sala_gnrl){
$sql = "select * from ord_med_med_gen WHERE id_sala=$idsala";
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
$this->db->insert("ord_med_med_gen",$save);
}
}


}




 public function pagination_data_cirugia_toracica()
	 {
	 $page= $this->input->get('page');
	  $user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $data['id_patient']=$id_patient;
	  $data['user_id']=$user_id;

	  	  $perfil= $this->input->get('perfil');

	if($perfil=="Admin"){
		$contition="";
		}else{
		$contition="user=$user_id AND";
		}


	  $data['centro_medico']= $this->input->get('centro_medico');
	 $data['page']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from hc_cirugia_toracica where $contition id_patient=$id_patient  order by id desc limit $start,$per_page";
	$data['cirugia_paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/cirugia_toracica/paginate',$data);
     }


	 public function  pagination_card_vascular()
	 {
	 $page= $this->input->get('page');
	  $user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $data['id_patient']=$id_patient;
	  $data['user_id']=$user_id;

	  	  $perfil= $this->input->get('perfil');

	if($perfil=="Admin"){
		$contition="";
		}else{
		$contition="id_user=$user_id AND";
		}


	  $data['centro_medico']= $this->input->get('centro_medico');
	 $data['page']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from  hc_evaluacion_car_vas  where $contition patient=$id_patient  order by id desc limit $start,$per_page";
	$data['cardiov_paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/cardiovascular/paginate',$data);
     }



  public function loadSignoCard()
  {
  $data['edad']=$this->db->select('edad')->where('id_p_a',$this->input->post('patient'))
  ->get('patients_appointments')->row('edad');
  $id_cardio=$this->input->post('id_cardio');
	$sql = "select * from   h_c_examen_fisico  where id_cardio=$id_cardio";
	$data['cardiov_signo']= $this->db->query($sql);
 $this->load->view('admin/historial-medical1/cardiovascular/signo_result', $data);
}




	 public function pagination_data_quirurca()
	 {
	 $page= $this->input->get('page');
	  $user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $data['id_patient']=$id_patient;
	  $data['user_id']=$user_id;

	  $perfil= $this->input->get('perfil');

	if($perfil=="Admin"){
		$contition="";
		}else{
		$contition="id_user=$user_id AND";
		}


	  $data['centro_medico']= $this->input->get('centro_medico');
	 $data['page']=$page;
	$per_page = 1;
	$start = ($page-1)*$per_page;
	$sql = "select * from hc_quirurgica where $contition id_patient=$id_patient  order by id desc limit $start,$per_page";
	$data['cirugia_paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/quirurgia/paginate',$data);
     }



 public function showQuirurcaTabulation()
{
$data['user_id']= $this->input->post('id_user');
$data['centro_medico']= $this->input->post('centro_medico');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/quirurgia/pagination-number', $data);
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

$query1 = $this->db->get_where('h_c_ant_puerperio',array('idpuerp'=>$idobs));
if($query1->num_rows() == 0)
{
$sav= array(
'idpuerp'=>$idobs,
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

$this->model_admin->saveObstetrico4($sav);
}
else{
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
}







public function saveUpPedia()
{
$historial_id= $this->input->post('hist_id');

$query1 = $this->db->get_where('h_c_patient_medicine_clown',array('id_patient'=>$historial_id));
foreach ($query1->result() as $row1) {
unset($row1->id);
$this->db->insert('h_c_patient_medicine',$row1);
}

$where1 = array(
'id_patient' =>$historial_id
);

$this->db->where($where1);
$this->db->delete('h_c_patient_medicine_clown');
//---------------------------------------------------------------------------------------------

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
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['show_enf'] = $this->model_admin->show_enfermedad($id_enf);
$data['causa']=$this->model_admin->getCausa();
$this->load->view('admin/historial-medical1/enfermedad-actual/data', $data);
$this->load->view('admin/historial-medical1/enfermedad-actual/footer');
}


 public function SaveUpAlergia()
{
$id_alg=$this->input->post('id_alg');
$data = array(
'ant_fam'=> $this->input->post('ant_fam1'),
'ant_prenatales'=> $this->input->post('ant_prenatales1'),
'factories_ambiente'=> $this->input->post('factories_ambiente1'),
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=>date("Y-m-d H:i:s")
);

$where = array(
'id' =>$id_alg
);
$this->db->where($where);
$this->db->update(" h_c_ant_alergista",$data);
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


 public function showCirugiaTabulation()
{
 $data['user_id']= $this->input->post('id_user');
 $data['centro_medico']= $this->input->post('centro_medico');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/cirugia_toracica/pagination-number', $data);
}

 public function showCardioVas()
{
 $data['user_id']= $this->input->post('id_user');
 $data['centro_medico']= $this->input->post('centro_medico');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/cardiovascular/pagination-number', $data);
}


 public function paginationNumberOrdenMedica()
{
//------------delete when enter only centro---------------------------------------------------
$where = array(
  'name'=>"",
  'direction'=>0,
  'id_user'=>$this->input->post('user_id')
);

$this->db->where($where);
$this->db->delete('orden_medica_sala');
//--------------------------------------------------------------------
 $data['user_id']= $this->input->post('user_id');
  $data['direction']= $this->input->post('direction');
$data['id_historial']= $this->input->post('id_historial');
$data['id_emergency']= $this->input->post('id_emergency');
$data['centro_id']= $this->input->post('centro_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/orden-medica/pagination-number', $data);
}



 public function paginationNumberReport()
{
 $data['user_id']= $this->input->post('id_user');
 $data['centro_medico']= $this->input->post('centro_medico');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/cirugia_toracica/general/pagination-number', $data);
}



 public function paginationRefraction()
{
 $data['user_id']= $this->input->post('id_user');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/oftalmologia/paginateNumber', $data);
}



 public function pagination_data_refraccion()
	 {
	 $page= $this->input->get('page');
	$user_id= $this->input->get('user_id');
	 $id_patient= $this->input->get('id_patient');
	  $perfil= $this->input->get('perfil');

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
	$sql = "select * from h_c_of_refracion where $contition id_hist=$id_patient order by id desc limit $start,$per_page";
	$data['paginate']= $this->db->query($sql);
    $this->load->view('admin/historial-medical1/oftalmologia/paginate',$data);
     }



 public function paginationIpss()
{
 $data['user_id']= $this->input->post('id_user');
 $data['centro_medico']= $this->input->post('centro_medico');
$data['id_historial']= $this->input->post('id_patient');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('id_user'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/ipss/pagination-number', $data);
}

 public function saveIPPS()
{

$save = array(
'tr1_0'=> $this->input->post('tr1_0'),
'tr2_1'=> $this->input->post('tr2_1'),
'tr3_2'=> $this->input->post('tr3_2'),
'tr4_3'=> $this->input->post('tr4_3'),
'tr5_4'=> $this->input->post('tr5_4'),
'tr6_5'=> $this->input->post('tr6_5'),
'tr7_6'=> $this->input->post('tr7_6'),
'tr8'=> $this->input->post('tr8'),
'historial_id'=>$this->input->post('histoirial_id'),
'inserted_by'=>$this->input->post('id_user'),
'updated_by'=>$this->input->post('id_user'),
'inserted_time'=>date("Y-m-d H:i:s"),
'updated_time'=>date("Y-m-d H:i:s"),
'id_user'=>$this->input->post('id_user'),
'result'=>$this->input->post('result'),
'ipsscolor'=>$this->input->post('ipsscolor')
);

if($this->input->post('idipss')==0){
$this->db->insert("h_c_ipss",$save);
}
else{
$data = array(
'tr1_0'=> $this->input->post('tr1_0'),
'tr2_1'=> $this->input->post('tr2_1'),
'tr3_2'=> $this->input->post('tr3_2'),
'tr4_3'=> $this->input->post('tr4_3'),
'tr5_4'=> $this->input->post('tr5_4'),
'tr6_5'=> $this->input->post('tr6_5'),
'tr7_6'=> $this->input->post('tr7_6'),
'tr8'=> $this->input->post('tr8'),
'updated_by'=>$this->input->post('id_user'),
'updated_time'=>date("Y-m-d H:i:s"),
'result'=>$this->input->post('result'),
'ipsscolor'=>$this->input->post('ipsscolor')
);
$where = array(
'id' =>$this->input->post('idipss')
);
$this->db->where($where);
$this->db->update("h_c_ipss",$data);
}


}

















  public function saveCirugiaReporte()
{

$query = $this->db->get_where('hc_cirugia_name',array('name'=>$this->input->post('cirugia_reporte')));
if($query->num_rows() == 0)
{
$savename = array(
'name'=>$this->input->post('cirugia_reporte')
);
$this->db->insert("hc_cirugia_name",$savename);
}


$save = array(
'detalle'=> $this->input->post('cirugia_detalle'),
'reporte'=> $this->input->post('cirugia_reporte'),
'id_user'=> $this->input->post('id_user'),
'id_patient'=> $this->input->post('id_patient'),
'id_enf'=> $this->input->post('id_enf'),
'id_cond'=> $this->input->post('id_con'),
'inserted_time'=>date("Y-m-d H:i:s")
);
if($this->input->post('id_cirugia_toracia_rep')==0){
$this->db->insert("hc_cirugia_reporte",$save);
}
else{
$change_time = date("Y-m-d H:i:s", strtotime($this->input->post('fecha')));
$data = array(
'detalle'=> $this->input->post('cirugia_detalle'),
'reporte'=> $this->input->post('cirugia_reporte'),
'inserted_time'=>$change_time
);
$where = array(
'id' =>$this->input->post('id_cirugia_toracia_rep')
);
$this->db->where($where);
$this->db->update("hc_cirugia_reporte",$data);
}


}


 public function saveEvCard()
{
	
$sin_car_dol_tor= $this->input->post('sin_car_dol_tor');
$sin_car_dol_tor1 = (isset($sin_car_dol_tor)) ? 1 : 0;

$sin_car_dis= $this->input->post('sin_car_dis');
$sin_car_dis1 = (isset($sin_car_dis)) ? 1 : 0;


$sin_car_tos= $this->input->post('sin_car_tos');
$sin_car_tos1 = (isset($sin_car_tos)) ? 1 : 0;


$sin_car_palp= $this->input->post('sin_car_palp');
$sin_car_palp1 = (isset($sin_car_palp)) ? 1 : 0;


$sin_car_ort= $this->input->post('sin_car_ort');
$sin_car_ort1 = (isset($sin_car_ort)) ? 1 : 0;

$sin_car_edem= $this->input->post('sin_car_edem');
$sin_car_edem1 = (isset($sin_car_edem)) ? 1 : 0;


$sin_car_otro= $this->input->post('sin_car_otro');
$sin_car_otro1 = (isset($sin_car_otro)) ? 1 : 0;	
$save = array(
'tipo_cirugia'=>$this->input->post('tipo_cirugia'),
'cirugia_ant'=>$this->input->post('cirugia_ant'),
'riesgo_qui_alto'=>$this->input->post('riesgo_qui_alto'),

'inserted_by'=>$this->input->post('inserted_by'),
'inserted_time'=>date('Y-m-d H:i:s'),
'patient'=>$this->input->post('patient'),
'id_user'=>$this->input->post('inserted_by'),

'riesgo_qui_medio'=>$this->input->post('riesgo_qui_medio'),
'riesgo_qui_bajo'=>$this->input->post('riesgo_qui_bajo'),
'ant_card_radio1'=>$this->input->post('ant_card_radio1'),
'ant_card_radio2'=>$this->input->post('ant_card_radio2'),
'ant_card_radio3'=>$this->input->post('ant_card_radio3'),
'ant_card_radio4'=>$this->input->post('ant_card_radio4'),
'ant_card_radio5'=>$this->input->post('ant_card_radio5'),
'ant_card_radio6'=>$this->input->post('ant_card_radio6'),

'text_ant_card1'=>$this->input->post('text_ant_card1'),
'text_ant_card2'=>$this->input->post('text_ant_card2'),
'text_ant_card3'=>$this->input->post('text_ant_card3'),
'text_ant_card4'=>$this->input->post('text_ant_card4'),
'text_ant_card5'=>$this->input->post('text_ant_card5'),
'text_ant_card6'=>$this->input->post('text_ant_card6'),

'cond_com_ta'=>$this->input->post('cond_com_ta'),
'cond_com_ob'=>$this->input->post('cond_com_ob'),
'cond_com_an'=>$this->input->post('cond_com_an'),
'cond_com_hep'=>$this->input->post('cond_com_hep'),
'cond_com_disc'=>$this->input->post('cond_com_disc'),
'cond_com_diab'=>$this->input->post('cond_com_diab'),
'cond_com_disf'=>$this->input->post('cond_com_disf'),
'cond_com_enfvas'=>$this->input->post('cond_com_enfvas'),
'cond_com_peri'=>$this->input->post('cond_com_peri'),
'cond_com_enfcr'=>$this->input->post('cond_com_enfcr'),
'cond_com_acv'=>$this->input->post('cond_com_acv'),
'cond_com_asbr'=>$this->input->post('cond_com_asbr'),
'cond_com_otras'=>$this->input->post('cond_com_otras'),

'cap_fun_lim'=>$this->input->post('cap_fun_lim'),
'cap_fun_bue'=>$this->input->post('cap_fun_bue'),

'sin_car_dol_tor'=>$sin_car_dol_tor1,
'sin_car_dis'=>$sin_car_dis1,
'sin_car_tos'=>$sin_car_tos1,
'sin_car_palp'=>$sin_car_palp1,
'sin_car_ort'=>$sin_car_ort1,
'sin_car_edem'=>$sin_car_edem1,
'sin_car_otro'=>$sin_car_otro1,
'sin_car_otro_txt'=>$this->input->post('sin_car_otro_txt'),

'exam_fis_bd'=>$this->input->post('exam_fis_bd'),
'exam_fis_bi'=>$this->input->post('exam_fis_bi'),
//'exam_fis_fc'=>$this->input->post('exam_fis_fc'),
'exam_fis_ivy'=>$this->input->post('exam_fis_ivy'),
'exam_fis_torax'=>$this->input->post('exam_fis_torax'),
'exam_fis_coraz'=>$this->input->post('exam_fis_coraz'),
'exam_fis_pulm'=>$this->input->post('exam_fis_pulm'),
'exam_fis_abdom'=>$this->input->post('exam_fis_abdom'),
'exam_fis_miemb'=>$this->input->post('exam_fis_miemb'),
'exam_fis_rhy'=>$this->input->post('exam_fis_rhy'),
'exam_fis_edema'=>$this->input->post('exam_fis_edema'),
//'exam_fis_pul_per'=>$this->input->post('exam_fis_pul_per'),

'lab_hcto'=>$this->input->post('lab_hcto'),
'lab_hb'=>$this->input->post('lab_hb'),
'lab_gb'=>$this->input->post('lab_gb'),
'lab_plaq'=>$this->input->post('lab_plaq'),
'lab_creat'=>$this->input->post('lab_creat'),
'lab_glice'=>$this->input->post('lab_glice'),
'lab_tgo'=>$this->input->post('lab_tgo'),
'lab_tgo_tgp'=>$this->input->post('lab_tgo_tgp'),
'lab_tgo_ts_tc'=>$this->input->post('lab_tgo_ts_tc'),
'lab_tp'=>$this->input->post('lab_tp'),
'lab_tpt'=>$this->input->post('lab_tpt'),
'lab_orina'=>$this->input->post('lab_orina'),

'res_car_elec'=>$this->input->post('res_car_elec'),
'res_car_rad_tor'=>$this->input->post('res_car_rad_tor'),
'res_car_eco'=>$this->input->post('res_car_eco'),
'res_car_hol'=>$this->input->post('res_car_hol'),
'res_car_esperim'=>$this->input->post('res_car_esperim'),
'res_car_mapa'=>$this->input->post('res_car_mapa'),

'con_diag_pat_car_del'=>$this->input->post('con_diag_pat_car_del'),
'con_diag_otros_pat'=>$this->input->post('con_diag_otros_pat'),

'riesgo_car_menor'=>$this->input->post('riesgo_car_menor'),
'riesgo_car_intermedio'=>$this->input->post('riesgo_car_intermedio'),

'riesgo_car_mayor'=>$this->input->post('riesgo_car_mayor'),
'riesgo_car_recomend'=>$this->input->post('riesgo_car_recomend')

);
$this->db->insert("hc_evaluacion_car_vas",$save);
 $id_cardio=$this->db->select('id')->order_by('id','desc')->limit(1)->get('hc_evaluacion_car_vas')->row('id');


$saveex = array(
  'peso'=> $this->input->post('cardio_peso'),
  'kg'=> $this->input->post('cardio_kg'),
  'talla'=> $this->input->post('cardio_talla'),
  'imc'=> $this->input->post('cardio_imc'),
  'ta'=> $this->input->post('cardio_ta'),
  'fr'=> $this->input->post('cardio_fr'),
  'fc'=> $this->input->post('cardio_fc'),
  'hg'=> $this->input->post('cardio_hg'),
   'tempo'=> $this->input->post('cardio_tempo'),
   'glicemia'=>$this->input->post('cardio_glicemia'),
  'pulso'=> $this->input->post('cardio_pulso'),
'radio'=> $this->input->post('cardio_radio_signo'),
'id_cardio'=>$id_cardio
);

$this->db->insert("h_c_examen_fisico",$saveex);

}



public function uptadeCarVas(){
$sin_car_dol_tor= $this->input->post('ed_sin_car_dol_tor');
$sin_car_dol_tor1 = (isset($sin_car_dol_tor)) ? 1 : 0;

$sin_car_dis= $this->input->post('ed_sin_car_dis');
$sin_car_dis1 = (isset($sin_car_dis)) ? 1 : 0;


$sin_car_tos= $this->input->post('ed_sin_car_tos');
$sin_car_tos1 = (isset($sin_car_tos)) ? 1 : 0;


$sin_car_palp= $this->input->post('ed_sin_car_palp');
$sin_car_palp1 = (isset($sin_car_palp)) ? 1 : 0;


$sin_car_ort= $this->input->post('ed_sin_car_ort');
$sin_car_ort1 = (isset($sin_car_ort)) ? 1 : 0;

$sin_car_edem= $this->input->post('ed_sin_car_edem');
$sin_car_edem1 = (isset($sin_car_edem)) ? 1 : 0;


$sin_car_otro= $this->input->post('ed_sin_car_otro');
$sin_car_otro1 = (isset($sin_car_otro)) ? 1 : 0;
	
$data = array(
'updated_by'=>$this->input->post('updated_by'),
'updated_time'=>date('Y-m-d H:i:s'),

'riesgo_qui_alto'=>$this->input->post('ed_riesgo_qui_alto'),
'riesgo_qui_medio'=>$this->input->post('ed_riesgo_qui_medio'),
'riesgo_qui_bajo'=>$this->input->post('ed_riesgo_qui_bajo'),
'ant_card_radio1'=>$this->input->post('ed_ant_card_radio1'),

'tipo_cirugia'=>$this->input->post('ed_tipo_cirugia'),
'cirugia_ant'=>$this->input->post('ed_cirugia_ant'),
'riesgo_qui_alto'=>$this->input->post('ed_riesgo_qui_alto'),
'riesgo_qui_medio'=>$this->input->post('ed_riesgo_qui_medio'),
'riesgo_qui_bajo'=>$this->input->post('ed_riesgo_qui_bajo'),
'ant_card_radio1'=>$this->input->post('ed_ant_card_radio1'),
'ant_card_radio2'=>$this->input->post('ed_ant_card_radio2'),
'ant_card_radio3'=>$this->input->post('ed_ant_card_radio3'),
'ant_card_radio4'=>$this->input->post('ed_ant_card_radio4'),
'ant_card_radio5'=>$this->input->post('ed_ant_card_radio5'),
'ant_card_radio6'=>$this->input->post('ed_ant_card_radio6'),

'text_ant_card1'=>$this->input->post('ed_text_ant_card1'),
'text_ant_card2'=>$this->input->post('ed_text_ant_card2'),
'text_ant_card3'=>$this->input->post('ed_text_ant_card3'),
'text_ant_card4'=>$this->input->post('ed_text_ant_card4'),
'text_ant_card5'=>$this->input->post('ed_text_ant_card5'),
'text_ant_card6'=>$this->input->post('ed_text_ant_card6'),

'cond_com_ta'=>$this->input->post('ed_cond_com_ta'),
'cond_com_ob'=>$this->input->post('ed_cond_com_ob'),
'cond_com_an'=>$this->input->post('ed_cond_com_an'),
'cond_com_hep'=>$this->input->post('ed_cond_com_hep'),
'cond_com_disc'=>$this->input->post('ed_cond_com_disc'),
'cond_com_diab'=>$this->input->post('ed_cond_com_diab'),
'cond_com_disf'=>$this->input->post('ed_cond_com_disf'),
'cond_com_enfvas'=>$this->input->post('ed_cond_com_enfvas'),
'cond_com_peri'=>$this->input->post('ed_cond_com_peri'),
'cond_com_enfcr'=>$this->input->post('ed_cond_com_enfcr'),
'cond_com_acv'=>$this->input->post('ed_cond_com_acv'),
'cond_com_asbr'=>$this->input->post('ed_cond_com_asbr'),
'cond_com_otras'=>$this->input->post('ed_cond_com_otras'),

'cap_fun_lim'=>$this->input->post('ed_cap_fun_lim'),
'cap_fun_bue'=>$this->input->post('ed_cap_fun_bue'),

'sin_car_dol_tor'=>$sin_car_dol_tor1,
'sin_car_dis'=>$sin_car_dis1,
'sin_car_tos'=>$sin_car_tos1,
'sin_car_palp'=>$sin_car_palp1,
'sin_car_ort'=>$sin_car_ort1,
'sin_car_edem'=>$sin_car_edem1,
'sin_car_otro'=>$sin_car_otro1,
'sin_car_otro_txt'=>$this->input->post('ed_sin_car_otro_txt'),

'exam_fis_bd'=>$this->input->post('ed_exam_fis_bd'),
'exam_fis_bi'=>$this->input->post('ed_exam_fis_bi'),
//'exam_fis_fc'=>$this->input->post('ed_exam_fis_fc'),
'exam_fis_ivy'=>$this->input->post('ed_exam_fis_ivy'),
'exam_fis_torax'=>$this->input->post('ed_exam_fis_torax'),
'exam_fis_coraz'=>$this->input->post('ed_exam_fis_coraz'),
'exam_fis_pulm'=>$this->input->post('ed_exam_fis_pulm'),
'exam_fis_abdom'=>$this->input->post('ed_exam_fis_abdom'),
'exam_fis_miemb'=>$this->input->post('ed_exam_fis_miemb'),
'exam_fis_rhy'=>$this->input->post('ed_exam_fis_rhy'),
'exam_fis_edema'=>$this->input->post('ed_exam_fis_edema'),
//'exam_fis_pul_per'=>$this->input->post('ed_exam_fis_pul_per'),

'lab_hcto'=>$this->input->post('ed_lab_hcto'),
'lab_hb'=>$this->input->post('ed_lab_hb'),
'lab_gb'=>$this->input->post('ed_lab_gb'),
'lab_plaq'=>$this->input->post('ed_lab_plaq'),
'lab_creat'=>$this->input->post('ed_lab_creat'),
'lab_glice'=>$this->input->post('ed_lab_glice'),
'lab_tgo'=>$this->input->post('ed_lab_tgo'),
'lab_tgo_tgp'=>$this->input->post('ed_lab_tgo_tgp'),
'lab_tgo_ts_tc'=>$this->input->post('ed_lab_tgo_ts_tc'),
'lab_tp'=>$this->input->post('ed_lab_tp'),
'lab_tpt'=>$this->input->post('ed_lab_tpt'),
'lab_orina'=>$this->input->post('ed_lab_orina'),

'res_car_elec'=>$this->input->post('ed_res_car_elec'),
'res_car_rad_tor'=>$this->input->post('ed_res_car_rad_tor'),
'res_car_eco'=>$this->input->post('ed_res_car_eco'),
'res_car_hol'=>$this->input->post('ed_res_car_hol'),
'res_car_esperim'=>$this->input->post('ed_res_car_esperim'),
'res_car_mapa'=>$this->input->post('ed_res_car_mapa'),

'con_diag_pat_car_del'=>$this->input->post('ed_con_diag_pat_car_del'),
'con_diag_otros_pat'=>$this->input->post('ed_con_diag_otros_pat'),

'riesgo_car_menor'=>$this->input->post('ed_riesgo_car_menor'),
'riesgo_car_intermedio'=>$this->input->post('ed_riesgo_car_intermedio'),

'riesgo_car_mayor'=>$this->input->post('ed_riesgo_car_mayor'),
'riesgo_car_recomend'=>$this->input->post('ed_riesgo_car_recomend')	
);	

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("hc_evaluacion_car_vas",$data);
	
//--------------------------------------------------------------------------


$data2 = array(
  'peso'=> $this->input->post('ed_cardio_peso'),
  'kg'=> $this->input->post('ed_cardio_kg'),
  'talla'=> $this->input->post('ed_cardio_talla'),
  'imc'=> $this->input->post('ed_cardio_imc'),
  'ta'=> $this->input->post('ed_cardio_ta'),
  'fr'=> $this->input->post('ed_cardio_fr'),
  'fc'=> $this->input->post('ed_cardio_fc'),
  'hg'=> $this->input->post('ed_cardio_hg'),
   'tempo'=> $this->input->post('ed_cardio_tempo'),
   'glicemia'=>$this->input->post('ed_cardio_glicemia'),
  'pulso'=> $this->input->post('ed_cardio_pulso'),
'radio'=> $this->input->post('ed_cardio_radio_signo')
);

$where2 = array(
'id_cardio' =>$this->input->post('id')
);
$this->db->where($where2);

$this->db->update("h_c_examen_fisico",$data2);	
}



 public function cirugiaToracia()
{
$insert_date=date("Y-m-d H:i:s");

 $cepillado_bronquial= $this->input->post('cepillado_bronquial');
$cep_b = (isset($cepillado_bronquial)) ? 1 : 0;

 $lavado_bronco= $this->input->post('lavado_bronco');
$lavado_b = (isset($lavado_bronco)) ? 1 : 0;

 $broncoas= $this->input->post('broncoas');
$bron = (isset($broncoas)) ? 1 : 0;

 $biopsia_bronq= $this->input->post('biopsia_bronq');
$biop_br = (isset($biopsia_bronq)) ? 1 : 0;

 $biopsia_tras= $this->input->post('biopsia_tras');
$bio_t = (isset($biopsia_tras)) ? 1 : 0;

 $puncion_tras= $this->input->post('puncion_tras');
$pun_t= (isset($puncion_tras)) ? 1 : 0;


$save = array(
'hora_inicio'=> $this->input->post('hora_inicio'),
'hora_final'=> $this->input->post('hora_final'),
'diag_pre_fbc'=> $this->input->post('diag_pre_fbc'),
'svta'=> $this->input->post('svta'),
'mmhg'=> $this->input->post('mmhg'),
'minfr'=> $this->input->post('minfr'),
'resmin'=> $this->input->post('resmin'),
'tacir'=> $this->input->post('tacir'),
'fccir'=> $this->input->post('fccir'),
'frcir'=> $this->input->post('frcir'),
'sato2'=> $this->input->post('sato2'),
'fosas_nasales'=> $this->input->post('fosas_nasales'),
'cuerdad_bocales'=> $this->input->post('cuerdad_bocales'),
'traqua_text'=> $this->input->post('traqua_text'),
'carina_text'=> $this->input->post('carina_text'),
'bronquio_principal'=> $this->input->post('bronquio_principal'),
'bronquio_prince_iz'=> $this->input->post('bronquio_prince_iz'),
'lsi_lii'=> $this->input->post('lsi_lii'),
'cepillado_bronquial'=>$cep_b,
'lavado_bronco'=> $lavado_b,
'broncoas'=> $bron,
'biopsia_bronq'=> $biop_br,
'biopsia_tras'=> $bio_t,
'puncion_tras'=> $pun_t,
'complic_text'=> $this->input->post('complic_text'),
'diag_post_fbc'=> $this->input->post('diag_post_fbc'),
'lsd_lm'=> $this->input->post('lsd_lm'),
'user'=> $this->input->post('id_user'),
'id_patient'=> $this->input->post('id_patient'),
'inserted_time'=> $insert_date
);
if($this->input->post('id_cirugia_toracia')==0){
$this->db->insert("hc_cirugia_toracica",$save);
}else{
$data = array(
'hora_inicio'=> $this->input->post('hora_inicio'),
'hora_final'=> $this->input->post('hora_final'),
'diag_pre_fbc'=> $this->input->post('diag_pre_fbc'),
'svta'=> $this->input->post('svta'),
'mmhg'=> $this->input->post('mmhg'),
'minfr'=> $this->input->post('minfr'),
'resmin'=> $this->input->post('resmin'),
'tacir'=> $this->input->post('tacir'),
'fccir'=> $this->input->post('fccir'),
'frcir'=> $this->input->post('frcir'),
'sato2'=> $this->input->post('sato2'),
'fosas_nasales'=> $this->input->post('fosas_nasales'),
'cuerdad_bocales'=> $this->input->post('cuerdad_bocales'),
'traqua_text'=> $this->input->post('traqua_text'),
'carina_text'=> $this->input->post('carina_text'),
'bronquio_principal'=> $this->input->post('bronquio_principal'),
'bronquio_prince_iz'=> $this->input->post('bronquio_prince_iz'),
'lsi_lii'=> $this->input->post('lsi_lii'),
'cepillado_bronquial'=>$cep_b,
'lavado_bronco'=> $lavado_b,
'broncoas'=> $bron,
'biopsia_bronq'=> $biop_br,
'biopsia_tras'=> $bio_t,
'puncion_tras'=> $pun_t,
'complic_text'=> $this->input->post('complic_text'),
'diag_post_fbc'=> $this->input->post('diag_post_fbc'),
'lsd_lm'=> $this->input->post('lsd_lm'),
);


$where = array(
'id' =>$this->input->post('id_cirugia_toracia')
);
$this->db->where($where);
$this->db->update("hc_cirugia_toracica",$data);

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
  		$insert_id = $this->db->insert_id();
        return  $insert_id;
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
$id=$this->uri->segment(3);
$historial_id=$this->uri->segment(4);
$data['id_exam_fis']=$this->uri->segment(3);
$data['historial_id']=$historial_id;
$id_user=$this->uri->segment(5);
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['id_user']=$id_user;
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$data['ExamFisById']=$this->model_admin->ExamFisById($id);
$data['edad']=$this->db->select('edad')->where('id_p_a',$historial_id)
->get('patients_appointments')->row('edad');
$this->load->view('admin/historial-medical1/examen-fisico/signo_data',$data);
$this->load->view('admin/historial-medical1/examen-fisico/data',$data);
$this->load->view('admin/historial-medical1/examen-fisico/footer', $data);
}


  public function loadSigno()
  {
  $data['edad']=$this->db->select('edad')->where('id_p_a',$this->input->post('historial_id'))
  ->get('patients_appointments')->row('edad');
 $data['signo_by_id'] = $this->model_admin->ExamFisById($this->input->post('id_exam_fis'));
 $this->load->view('admin/historial-medical1/examen-fisico/signo_result', $data);
}



public function SaveUpExamenFisico(){

$insert_date=date("Y-m-d H:i:s");
$id_exs=$this->input->post('id_sig');
//-----------Save signo-----------------------
$save = array(
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
//------------------------examen fisico1--------------------
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
//------------------------examen fisico2--------------------
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
//-----------------------examen fisico3-----------------------------------
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
//------------------------------------------------------------------------
 'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date,

   );
 $this->model_admin->saveUpExamenFisico($id_exs,$save);
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
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['centro_medico']=$this->uri->segment(6);
$origine=$this->uri->segment(7);
$data['origine']=$origine;
$data['user_id']=$id_user;
$data['centro_name']=$this->db->select('name')->where('id_m_c',$this->uri->segment(6))->get('medical_centers')->row('name');
$data['historial_id']=$historial_id;
$data['id_con']=$id_con;
$data['show_con_by_id'] = $this->model_admin->show_con_by_id($id_con,$origine);
 $patient_cie10=$this->model_admin->show_diagno_def($id_con,$origine);
  $data['count_patient_c']=count($patient_cie10);
$this->load->view('admin/historial-medical1/conclusion/data', $data);
$this->load->view('admin/historial-medical1/conclusion/footer', $data);

}


 public function show_exam_ot_by_id(){
$data['idot']= $this->uri->segment(3);
$data['historial_id']= $this->uri->segment(4);
$id_user=$this->uri->segment(5);
$data['perfil']=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
$data['user_id']=$id_user;
$id_exam_fis=$this->uri->segment(6);
$data['ExamFisById']=$this->model_admin->ExamFisById($id_exam_fis);
$data['id_exam_fis']=$id_exam_fis; 
$this->load->view('admin/historial-medical1/examen-fisico-otorrino/data', $data);

}


 public function SaveUpExamOt()
{
	$time=date('Y-m-d H:i:s');
  $data= array(
'oido1'=> $this->input->post('oido1'),
'oido2'=> $this->input->post('oido2'),
'nariz'=> $this->input->post('nariz'),
'boca'=> $this->input->post('boca'),
'otorrino_cuello1'=> $this->input->post('otorrino_cuello1'),
'otorrino_cuello2'=> $this->input->post('otorrino_cuello2'),
'observaciones_ot'=> $this->input->post('observaciones_ot'),
'updated_by'=> $this->input->post('updated_by'),
'updated_time'=>$time
);

$where = array(
'idot' =>$this->input->post('idot')

);

$this->db->where($where);
$this->db->update("h_c_examen_fis_otorrino",$data);

if($this->input->post('optionsig')==0){
$save = array(
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
 'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=>$time,

   );
 $this->model_admin->saveUpExamenFisico($this->input->post('id_signo'),$save);	
}else{
$examFisico = array(
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
//------------------------------------------------------------------------
  'historial_id'=>$this->input->post('id_pat'),
  'inserted_by'=> $this->input->post('updated_by'),
  'inserted_time'=>$time,
    'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=>$time,
  'id_user'=> $this->input->post('updated_by')
   );
$id_signo=$this->model_admin->saveExamenFisico($examFisico);
$whereott = array(
'idot' =>$this->input->post('idot')

);
$upott = array(
 'id_sig'=>$id_signo
);
$this->db->where($whereott);
$this->db->update("h_c_examen_fis_otorrino",$upott);	
}



}



 public function SaveUpConcluciones()
{
  $insert_date=date("Y-m-d H:i:s");
$id_cdia= $this->input->post('id_cdia');
$cied= $this->input->post('cied1');
$saveConDia= array(
 'otros_diagnos'=> $this->input->post('otros_diagnos'),
  'plan'=> $this->input->post('plan'),
  'procedimiento'=> $this->input->post('proced'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'updated_by'=> $this->input->post('updated_by'),
  'updated_time'=> $insert_date
   );
   $this->model_admin->saveUpConclucionDiag($id_cdia,$saveConDia);

 foreach ($cied as $key=>$id_ced) {
  $savecd = array(
  // 'id_linkd'=> $last_id,
  'diagno_def'=> $id_ced,
  'p_id'=>$this->input->post('pat_id'),
  'con_id_link'=>$id_cdia,
  'user_id'=>$this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro_medico'),
  'insert_date'=>date("Y-m-d H:i:s")
  );

$this->model_admin->SaveConDef($savecd);
 }

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


public function saveHistorialAlergica(){
$save = array(
'ant_fam'=> $this->input->post('ant_fam'),
'ant_prenatales'=> $this->input->post('ant_prenatales'),
'factories_ambiente'=> $this->input->post('factories_ambiente'),
'historial_id'=> $this->input->post('hist_id'),
'inserted_time'=> date("Y-m-d H:i:s"),
'inserted_by'=> $this->input->post('user_id'),
'updated_time'=> date("Y-m-d H:i:s"),
'updated_by'=> $this->input->post('user_id')
);
$this->db->insert("h_c_ant_alergista",$save);


//save enfermededad actual
$saveEnf = array(
'enf_motivo'=> $this->input->post('enf_motivo'),
'signopsis'=> $this->input->post('enf_signopsis'),
'laboratorios'=> $this->input->post('enf_laboratorios'),
'estudios'=> $this->input->post('enf_estudios'),
'historial_id'=>$this->input->post('hist_id'),
'inserted_by'=> $this->input->post('user_id'),
'inserted_time'=> date("Y-m-d H:i:s"),
'updated_by'=> $this->input->post('user_id'),
'updated_time'=> date("Y-m-d H:i:s"),
'user_id'=> $this->input->post('user_id'),
'centro_medico'=>$this->input->post('centro_medico'),
'filter_date'=>date('Y-m-d')
);

$idenfact=$this->model_admin->saveEnfermedad($saveEnf);

$whereimg = array(
'id_patient' =>$this->input->post('hist_id'),
'userid' =>$this->input->post('user_id'),
'id_enfermedad' =>0

);
$updimg = array(
 'id_enfermedad'=>$idenfact
);
$this->db->where($whereimg);
$this->db->update("saveEnfImage",$updimg);



$query1 = $this->db->get_where('type_reasons',array('title'=>$this->input->post('enf_motivo')));
if($query1->num_rows() == 0)
{
$save = array(
'title'=>$this->input->post('enf_motivo'),
'inserted_by' => $this->input->post('user_id'),
'inserted_time' =>date("Y-m-d H:i:s"),
'updated_by' => $this->input->post('user_id'),
'updated_time' =>date("Y-m-d H:i:s")
);
$this->model_admin->save_new_causa($save);
}



$cied= $this->input->post('cied');
 $saveConDia= array(
 'otros_diagnos'=> $this->input->post('otros_diagnos'),
  'plan'=> $this->input->post('plan'),
  'procedimiento'=> $this->input->post('proced'),
  'evolucion'=> $this->input->post('evolucion'),
  'conclusion_radio'=> $this->input->post('conclusion_radio'),
  'historial_id'=>$this->input->post('hist_id'),
   'centro_medico'=>$this->input->post('centro_medico'),
  'id_user'=>$this->input->post('user_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'updated_by'=> $this->input->post('user_id'),
  'inserted_time'=> date("Y-m-d H:i:s"),
  'updated_time'=> date("Y-m-d H:i:s"),
  'current_day'=>date('Y-m-d')
   );
   $id_con=$this->model_admin->saveConclucionDiag($saveConDia);
 foreach ($cied as $key=>$id_ced) {
  $savecd = array(
  // 'id_linkd'=> $last_id,
  'diagno_def'=> $id_ced,
  'p_id'=>$this->input->post('hist_id'),
  'con_id_link'=> $id_con,
  'user_id'=>$this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro_medico'),
  'insert_date'=>date("Y-m-d H:i:s")
  );

$this->model_admin->SaveConDef($savecd);
}


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

if(!empty($medicine))
{
foreach ($medicine as $med) {
	$save = array(
	  'medicine'  => $med,
	 'id_patient' => $this->input->post('hist_id'),
	 'user_id' =>$this->input->post('user_id')
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
/*$whereSSR = array(
'optradio' =>NULL
'edad' =>NULL
'sexual' =>NULL
'califica' =>NULL
'califica_text' =>NULL
'hist_id' =>$this->input->post('hist_id')

);

$this->db->where($whereSSR);
$this->db->delete('h_c_ant_ssr');*/

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
$this->model_admin->DeleteAntPuerperio($this->input->post('hist_id'));

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
//$this->model_admin->DeleteEmptyPedia($this->input->post('hist_id'));


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
  'centro_medico'=>$this->input->post('centro_medico'),
  'filter_date'=>date('Y-m-d')
   );

   $idenfact=$this->model_admin->saveEnfermedad($saveEnf);



  $whereimg = array(
  'id_patient' =>$this->input->post('hist_id'),
  'userid' =>$this->input->post('user_id'),
  'id_enfermedad' =>0

);
$updimg = array(
 'id_enfermedad'=>$idenfact
);
$this->db->where($whereimg);
$this->db->update("saveEnfImage",$updimg);



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

 $examFisico = array(
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
//------------------------examen fisico1--------------------
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
//------------------------examen fisico2--------------------
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
//-----------------------examen fisico3-----------------------------------
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
//------------------------------------------------------------------------
  'historial_id'=>$this->input->post('hist_id'),
  'inserted_by'=> $this->input->post('user_id'),
  'inserted_time'=> $insert_date,
    'updated_by'=> $this->input->post('user_id'),
  'updated_time'=> $insert_date,
  'id_user'=> $this->input->post('user_id')
   );
$id_signo=$this->model_admin->saveExamenFisico($examFisico);

$examFis=$this->db->select('*')->where('id_sig',$id_signo)->get('h_c_examen_fisico')->row_array();

if($examFis['peso']==0 && $examFis['kg']==0 && $examFis['talla']=='' && $examFis['imc']=='' && $examFis['ta']=='' && $examFis['fr']=='' && $examFis['fc']==''
&& $examFis['hg']=='' && $examFis['tempo']=='' && $examFis['pulso']==''  && $examFis['glicemia']==0
 && $examFis['neuro_s']=='' &&  $examFis['neuro_text']=='' &&  $examFis['cabeza']=='' &&  $examFis['cabeza_text']==''
 &&  $examFis['cuello']=='' &&  $examFis['cuello_text'] =='' && 	$examFis['abd_insp']=='' && 	$examFis['ausc']==''
 &&  $examFis['perc']=='' &&  $examFis['palpa']==''
&& $examFis['ext_sup']=='' &&	$examFis['ext_sup_text']=='' && $examFis['torax']=='' && $examFis['torax_text']==''
 &&	$examFis['ext_inf']=='' && $examFis['ext_inft']=='' &&	$examFis['vagina_text']=='' && $examFis['vagina']==''
&& $examFis['cuad_inf_ext1']=='' && $examFis['mama_izq1']=='' && $examFis['cuad_sup_ext1']=='' && $examFis['cuad_inf_ext11']==''
&& $examFis['region_retro1']=='' && $examFis['region_areola_pezon1']=='' && $examFis['region_ax1']==''
&& $examFis['cuad_inf_ext2']=='' && $examFis['mama_izq2']=='' && $examFis['cuad_sup_ext2']==''  && $examFis['cuad_inf_ext22']==''
&& $examFis['region_retro2']=='' && $examFis['region_areola_pezon2']=='' && $examFis['region_ax2']==''
&& $examFis['especuloscopia']=='' && $examFis['cervix']=='' && $examFis['cervix_text']=='' && $examFis['utero_text']==''
&& $examFis['anexo_derecho_text']=='' && $examFis['anexo_iz_text']=='' && $examFis['inspection_vulval']==''
&& $examFis['inspection_vulval_text']=='' && $examFis['tacto_bima']=='' && $examFis['rectal_text']==''  && $examFis['rectal']==''
&& $examFis['genitalm']=='' && $examFis['genitalm_text']=='' && $examFis['genitalf_text']=='' && $examFis['genitalf']==''
&& $examFis['vagina']=='' && $examFis['vagina_text']=='')
 {
 $this->model_admin->DeleteEmptyExamFis($id_signo);
}


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


//save examen dermatologia
  $saveExOt= array(
'oido1'=> $this->input->post('oido1'),
'oido2'=> $this->input->post('oido2'),
'nariz'=> $this->input->post('nariz'),
'boca'=> $this->input->post('boca'),
'otorrino_cuello1'=> $this->input->post('otorrino_cuello1'),
'otorrino_cuello2'=> $this->input->post('otorrino_cuello2'),
'observaciones_ot'=> $this->input->post('observaciones_ot'),
'historial_id'=>$this->input->post('hist_id'),
'inserted_by'=> $this->input->post('user_id'),
'updated_by'=> $this->input->post('user_id'),
'inserted_time'=> $insert_date,
'updated_time'=> $insert_date,
'user_id'=> $this->input->post('user_id'),
'id_sig'=>$id_signo


);
$this->db->insert("h_c_examen_fis_otorrino",$saveExOt);
$whereot = array(
  'oido1'=>'',
  'oido2'=>'',
  'nariz'=>'',
   'otorrino_cuello1'=>'',
  'otorrino_cuello2'=>'',
  'observaciones_ot'=>'',
);

$this->db->where($whereot);
$this->db->delete('h_c_examen_fis_otorrino');

//save conclusion diagnostic
$cied= $this->input->post('cied');
 $saveConDia= array(
 'otros_diagnos'=> $this->input->post('otros_diagnos'),
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
  'updated_time'=> $insert_date,
  'current_day'=>date('Y-m-d'),
  'origine'=>0
   );
   $id_con=$this->model_admin->saveConclucionDiag($saveConDia);
 foreach ($cied as $key=>$id_ced) {
  $savecd = array(
  // 'id_linkd'=> $last_id,
  'diagno_def'=> $id_ced,
  'p_id'=>$this->input->post('hist_id'),
  'con_id_link'=> $id_con,
  'user_id'=>$this->input->post('user_id'),
  'centro_medico'=>$this->input->post('centro_medico'),
  'insert_date'=>date("Y-m-d H:i:s"),
  'origine'=>0
  );

$this->model_admin->SaveConDef($savecd);
}

$tafpro = array(
'id_cd'=>$id_con
);

$wheretp= array(
  'user' =>$this->input->post('user_id'),
  'patient' =>$this->input->post('hist_id')
);

$this->db->where($wheretp);
$this->db->update("h_c_procedimiento_tarif",$tafpro);



$where = array(
  'id_p'=>$this->input->post('hist_id'),
  'id_doc'=>$this->input->post('user_id'),
  'id_cm'=>$this->input->post('centro_medico'),
  'origine'=>0
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc');


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
'nota'=> $this->input->post('not_oftm'),
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
  'hookah'=> $this->input->post('hookah'),
  'hab_f_hookah'=> $this->input->post('hab_f_hookah'),
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
{
	$historial_id= $this->uri->segment(3);
	$data['patient_med'] = $this->model_admin->PatientMed($historial_id);
	$this->load->view('admin/historial-medical1/showMedicine', $data);
}

 public function testOrmd()
{
$data['user_id']=$this->input->post('user_id');
$data['id_historial']=$this->input->post('id_historial');
$this->load->view('admin/historial-medical1/orden-medica/test',$data);
}
 public function reportHistorialMenu()
{
$data['user_id'] = $this->uri->segment(3);
$data['id_historial'] = $this->uri->segment(4);
$data['centro_medico'] = $this->uri->segment(5);
$rec=$this->uri->segment(6);
if($rec==1){
$this->load->view('admin/historial-medical1/cirugia_toracica/general/index',$data);
}else if($rec==2){
$this->load->view('admin/historial-medical1/cirugia_toracica/index',$data);
}
else if($rec==4){
$this->load->view('admin/historial-medical1/ipss/index',$data);
}
else if($rec==5){
$this->load->view('admin/historial-medical1/cardiovascular/index',$data);
}

else if($rec==6){
$this->load->view('admin/historial-medical1/orden-medica/index',$data);
}

else{
$this->load->view('admin/historial-medical1/quirurgia/index',$data);
}

}


public function assignIdEnfToReporte(){
	$id_pat=$this->input->post('id_patient');
$id_user=$this->input->post('id_user');
$centro=$this->input->post('centro');
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$id_enf=$this->db->select('id_enf')->where('historial_id',$id_pat)->order_by('id_enf','desc')->get('h_c_enfermedad')->row('id_enf');
}else{
$id_enf=$this->db->select('id_enf')->where('historial_id',$id_pat)->where('updated_by',$id_user)->where('centro_medico',$centro)->order_by('id_enf','desc')->get('h_c_enfermedad')->row('id_enf');
}
 if($id_enf !=''){
	echo $id_enf;
 }else{
echo 0;
 }

}

public function assignIdConToReporte(){
	$id_pat=$this->input->post('id_patient');
$id_user=$this->input->post('id_user');
$centro=$this->input->post('centro');
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
//$id_con=$this->db->select('con_id_link')->where('p_id',$id_pat)->order_by('id_linkd','desc')->get('h_c_diagno_def_link')->row('con_id_link');
$id_con=$this->db->select('id_cdia')->where('historial_id',$id_pat)->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row('id_cdia');

}else{
//$id_con=$this->db->select('con_id_link')->where('p_id',$id_pat)->where('user_id',$id_user)->where('centro_medico',$centro)->order_by('id_linkd','desc')->get('h_c_diagno_def_link')->row('con_id_link');
$id_con=$this->db->select('id_cdia')->where('historial_id',$id_pat)->where('id_user',$id_user)->where('centro_medico',$centro)->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row('id_cdia');
}
  if($id_con !=''){
	echo $id_con;
 }else{
echo 0;
 }
}






 public function addHistAct()
{
$id_pat=$this->input->post('id_patient');
$id_user=$this->input->post('id_user');
$centro=$this->input->post('centro');
$perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$enfermedad=$this->db->select('enf_motivo,signopsis,laboratorios,estudios')->where('historial_id',$id_pat)->order_by('id_enf','desc')->get('h_c_enfermedad')->row_array();
$cdia=$this->db->select('id_cdia,otros_diagnos,plan,procedimiento,evolucion')->where('historial_id',$id_pat)->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row_array();
//-----------------------------------------------------------------
$exam_fis=$this->db->select('*')->where('historial_id',$id_pat)->order_by('id_sig','desc')->get('h_c_examen_fisico')->row_array();
//------------------------------------------------------------------------
$exam_sistema=$this->db->select('*')->where('historial_id',$id_pat)->order_by('id_exs','desc')->get('h_c_examen_sistema')->row_array();
//--------------------------------------------------------
$query2 = $this->db->get_where('h_c_examen_sistema',array('historial_id'=>$id_pat));
	$row_exam=$query2->num_rows();

  $query1 = $this->db->get_where('h_c_examen_fisico',array('historial_id'=>$id_pat));
  	$row_fis=$query1->num_rows();
}else{
$enfermedad=$this->db->select('enf_motivo,signopsis,laboratorios,estudios')->where('historial_id',$id_pat)->where('updated_by',$id_user)->where('centro_medico',$centro)->order_by('id_enf','desc')->get('h_c_enfermedad')->row_array();
//----------------------------------------------------------------------
$cdia=$this->db->select('id_cdia,otros_diagnos,plan,procedimiento,evolucion')->where('historial_id',$id_pat)->where('id_user',$id_user)->where('centro_medico',$centro)->order_by('id_cdia','desc')->get('h_c_conclusion_diagno')->row_array();
//-----------------------------------------------------------------
$exam_fis=$this->db->select('*')->where('historial_id',$id_pat)->where('id_user',$id_user)->order_by('id_sig','desc')->get('h_c_examen_fisico')->row_array();
//-----------------------------------------------------------------
$exam_sistema=$this->db->select('*')->where('historial_id',$id_pat)->where('id_user',$id_user)->order_by('id_exs','desc')->get('h_c_examen_sistema')->row_array();
//-------------------------------------------------------------------------------------------
$query2 = $this->db->get_where('h_c_examen_sistema',array('historial_id'=>$id_pat,'id_user'=>$id_user));
	$row_exam=$query2->num_rows();

  $query1 = $this->db->get_where('h_c_examen_fisico',array('historial_id'=>$id_pat,'id_user'=>$id_user));
  	$row_fis=$query1->num_rows();
}
$musculoes=$exam_sistema['musculoes'];
$sisneuro=$exam_sistema['sisneuro'];
$neurologico=$exam_sistema['neurologico'];
$siscardio=$exam_sistema['siscardio'];
$cardiova=$exam_sistema['cardiova'];
$urogenital=$exam_sistema['urogenital'];
$sis_mu_e=$exam_sistema['sist_uro'];
$sist_uro=$exam_sistema['sis_mu_e'];
$sist_resp=$exam_sistema['sist_resp'];
$nervioso=$exam_sistema['nervioso'];
$linfatico=$exam_sistema['linfatico'];
$digestivo=$exam_sistema['digestivo'];
$respiratorio=$exam_sistema['respiratorio'];
$genitourinario=$exam_sistema['genitourinario'];
$sist_diges=$exam_sistema['sist_diges'];
$sist_endo=$exam_sistema['sist_endo'];
$endocrino=$exam_sistema['endocrino'];
$sist_rela=$exam_sistema['sist_rela'];
$otros_ex_sis=$exam_sistema['otros_ex_sis'];
$dorsales=$exam_sistema['dorsales'];
//-------------------------------------------------------
$peso=$exam_fis['peso'];
$kg=$exam_fis['kg'];
$talla=$exam_fis['talla'];
$imc=$exam_fis['imc'];
$cuello_text=$exam_fis['cuello_text'];
$ext_sup_text=$exam_fis['ext_sup_text'];
$ext_inft=$exam_fis['ext_inft'];
$torax_text=$exam_fis['torax_text'];
//--------------------------------------------------------------------------------------------------
 $motivo=$enfermedad['enf_motivo'];
$signopsis=$enfermedad['signopsis'];
$laboratorios=$enfermedad['laboratorios'];
$estudios=$enfermedad['estudios'];
$id_cdia=$cdia['id_cdia'];
if($id_cdia !=''){
echo "<strong>ENFERMEDAD ACTUAL</strong>";
echo "<ul>";
echo "<li>$motivo</li>";
echo "<li>$signopsis</li>";
if($laboratorios !=""){
echo "<li>$laboratorios</li>";
}
if($estudios !=""){
echo "<li>$estudios</li>";
}
echo "</ul>";
$otros=$cdia['otros_diagnos'];
$plan=$cdia['plan'];
$procedimiento=$cdia['procedimiento'];
$evolucion=$cdia['evolucion'];
$sql ="SELECT diagno_def FROM  h_c_diagno_def_link WHERE con_id_link=$id_cdia";
$querysig = $this->db->query($sql);
if($querysig->result() !=NULL){
echo "<strong>CONCLUSION DIAGNOSTICOS</strong>";

echo "<ul>";
foreach ($querysig->result() as $rf){
$desc= $this->db->select('description')->where('idd',$rf->diagno_def)->get('cied')->row('description');
echo "<li>$desc</li>";
}
echo "</ul>";
}
if($otros !=''){
	echo "<strong>OTROS DIAGNOSTICOS</strong>";
	echo "<ul>";
	echo "<li>$otros</li>";
	echo "</ul>";
}

if($plan !=''){
	echo "<strong>PLAN</strong>";
	echo "<ul>";
	echo "<li>$plan</li>";
	echo "</ul>";
}

if($procedimiento !=''){
	echo "<strong>PROCEDIMIENTO</strong>";
	echo "<ul>";
	echo "<li>$procedimiento</li>";
	echo "</ul>";
}

if($evolucion !=''){
	echo "<strong>EVOLUCION</strong>";
	echo "<ul>";
	echo "<li>$evolucion</li>";
	echo "</ul>";
}
if($row_fis > 0){
echo "<strong>EXAMEN FISICO</strong><br/>";

if($peso !=0){

echo "<strong>Peso</strong> $peso - <strong>Kg</strong> $kg <br/>";
}

if($talla !=""){

echo " <strong>Talla</strong> $talla";
}

if($imc !=""){

echo " <strong>IMC</strong> $imc";
}


if($cuello_text !=""){

echo "<strong>Cuello</strong> $cuello_text <br/>";
}

if($ext_sup_text !=""){

echo "<strong>Extremidades Superiores</strong> $ext_sup_text <br/>";
}

if($ext_inft !=""){

echo "<strong>Extremidades Inferiores</strong> $ext_inft <br/>";
}

if($torax_text !=""){

echo "<strong>Torax Corazón y pulmones</strong> $torax_text<br/>";
}
}
if($row_exam > 0){
echo "<strong>EXAMEN SISTEMA</strong><br/>";

if($neurologico !=""){

echo "<strong>Sistema neurológico</strong> $neurologico<br/>";
}
if($cardiova !=""){

echo "<strong>Sistema cardiovascular</strong> $cardiova<br/>";
}
if($urogenital !=""){

echo "<strong>Sistema urogenital</strong> $urogenital<br/>";
}

if($nervioso !=""){

echo "<strong>Sistema nervioso</strong> $nervioso<br/>";
}

if($linfatico !=""){

echo "<strong>Sistema linfatico</strong> $linfatico<br/>";
}


if($respiratorio !=""){

echo "<strong>Sistema respiratorio</strong> $respiratorio<br/>";
}

if($genitourinario !=""){

echo "<strong>Sistema genitourinario</strong> $genitourinario<br/>";
}

if($digestivo !=""){

echo "<strong>Sistema digestivo</strong> $digestivo<br/>";
}


if($endocrino !=""){

echo "<strong>Sistema endocrino</strong> $endocrino<br/>";
}

if($otros_ex_sis !=""){

echo "<strong>Relativo a</strong> $otros_ex_sis<br/>";
}

if($dorsales !=""){

echo "<strong>Columna dorsal</strong> $dorsales<br/>";
}

if($musculoes !=""){

echo "<strong>Sistema músculo esquelético</strong> $musculoes";
}
}
}else{
echo "<span style='color:red'>Lo siento no lo podemos mostrar...</span>";
}
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
/*--------------Enf. Repiratoria (Esp.)---------------------------*/
'enre_nin'=> $nin_check055,
'enre_m'=> $madre_check055,
'enre_p'=> $padre_check055,
'enre_h'=> $h_check055,
'enre_pe'=>$pe_check055,
'enre_text'=> $this->input->post('enre_text'),

//-----------------------Enf. Hematológicas (Esp.)----------------------------
'hem_nin'=> $art_check01616,
'hem_m'=> $madre_check01616,
'hem_p'=> $padre_check01616,
'hem_h'=> $h_check01616,
'hem_pe'=>$pe_check01616,
'hem_text'=> $this->input->post('hem_text'),
//-----------------------------------------------------------
'otros'=> $this->input->post('otros'),
'historial_id'=> $this->input->post('hist_id'),
'date_modif'=> $update_time,
'update_by'=> $this->input->post('modify_by')
);
$this->model_admin->UpdateMarquePositivo($id_patient,$save);
}


public function  saveQuirurgico(){

if($this->input->post('operator')==0){
	
$save = array(
'id_patient'=> trim($this->input->post('id_patient')),
'id_user'=> trim($this->input->post('id_user')),
'inserted_time'=>date("Y-m-d H:i:s"),
'diag_pre_qui'=> trim($this->input->post('diag_pre_qui')),
'pro_post'=> trim($this->input->post('pro_post')),
'diag_post_qui'=> trim($this->input->post('diag_post_qui')),
'anestesia'=> trim($this->input->post('anestesia')),
'incision'=> trim($this->input->post('incision')),
'cirugia_programada'=> trim($this->input->post('cirugia_programada')),
'cirugia_realizada'=> trim($this->input->post('cirugia_realizada')),
'hallasgo'=> trim($this->input->post('hallasgo')),
'desc_proced'=> trim($this->input->post('desc_proced')),
'perdida_sanguinea'=> trim($this->input->post('perdida_sanguinea')),
'compresa'=> trim($this->input->post('compresa')),
'gasas'=> trim($this->input->post('gasas')),
'drenes'=> trim($this->input->post('drenes')),
'transfusion'=> trim($this->input->post('transfusion')),
'unids_transfusion'=> trim($this->input->post('unids_transfusion')),
'condicion_paciente'=> trim($this->input->post('condicion_paciente')),
'traslado'=> trim($this->input->post('traslado')),
'hora_ini'=> trim($this->input->post('hora_ini')),
'hora_fin'=> trim($this->input->post('hora_fin')),
'tiempo_quirurgico'=> trim($this->input->post('tiempo_quirurgico')),
'cirujano'=> trim($this->input->post('cirujano')),
'ajudante'=> trim($this->input->post('ajudante')),
'ajudante_enf'=> trim($this->input->post('ajudante_enf')),
'muestras_patologia'=> trim($this->input->post('muestras_patologia')),
'histopatologico'=> trim($this->input->post('histopatologico'))
);	
	
$this->db->insert("hc_quirurgica",$save);
}else{
$change_time = date("Y-m-d H:i:s", strtotime($this->input->post('fecha_quiri')));
$data = array(
'diag_pre_qui'=> trim($this->input->post('diag_pre_qui')),
'pro_post'=> trim($this->input->post('pro_post')),
'diag_post_qui'=> trim($this->input->post('diag_post_qui')),
'anestesia'=> trim($this->input->post('anestesia')),
'incision'=> trim($this->input->post('incision')),
'cirugia_programada'=> trim($this->input->post('cirugia_programada')),
'cirugia_realizada'=> trim($this->input->post('cirugia_realizada')),
'hallasgo'=> trim($this->input->post('hallasgo')),
'desc_proced'=> trim($this->input->post('desc_proced')),
'perdida_sanguinea'=> trim($this->input->post('perdida_sanguinea')),
'compresa'=> trim($this->input->post('compresa')),
'gasas'=> trim($this->input->post('gasas')),
'drenes'=> trim($this->input->post('drenes')),
'transfusion'=> trim($this->input->post('transfusion')),
'unids_transfusion'=> trim($this->input->post('unids_transfusion')),
'condicion_paciente'=> trim($this->input->post('condicion_paciente')),
'traslado'=> trim($this->input->post('traslado')),
'hora_ini'=> trim($this->input->post('hora_ini')),
'hora_fin'=> trim($this->input->post('hora_fin')),
'tiempo_quirurgico'=> trim($this->input->post('tiempo_quirurgico')),
'cirujano'=> trim($this->input->post('cirujano')),
'ajudante'=> trim($this->input->post('ajudante')),
'ajudante_enf'=> trim($this->input->post('ajudante_enf')),
'muestras_patologia'=> trim($this->input->post('muestras_patologia')),
'histopatologico'=> trim($this->input->post('histopatologico')),
'inserted_time'=>$change_time
);
$where= array(
  'id' =>$this->input->post('operator')
);

$this->db->where($where);

$this->db->update("hc_quirurgica",$data);
}
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
$this->db->insert("orden_medica_sala",$save2);
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
$this->db->update("orden_medica_sala",$update);
}



public function deleteSala(){
$where= array(
'idsala' =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('orden_medica_sala');
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
$save = array(
'medica'=> $this->input->post('medicamento_ord_med'),
'presentacion'=> $this->input->post('presentacion_ord_med'),
'frecuencia'=> $this->input->post('frecuencia_ord_med'),
'via' => $this->input->post('via_ord_med'),
'oyo' => $this->input->post('oyo_ord_med'),
'operator' => $this->input->post('operator'),
'insert_date'=>date("Y-m-d H:i:s"),
'historial_id' =>$this->input->post('historial_id'),
'updated_by' => $this->input->post('operator'),
'updated_time'=>date("Y-m-d H:i:s"),
'nota' => $this->input->post('nota_ord_med'),
'printing'=>$this->input->post('printing'),
'id_sala'=>$this->input->post('sala'),
'centro'=>$this->input->post('centro'),
'cantidad'=>$this->input->post('cantidad'),
'cobertura' => $this->input->post('cobert'),
'idem' => $this->input->post('id_em'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')
);
$this->db->insert("orden_medica_recetas",$save);

$query = $this->db->get_where('presentacion',array('name'=>$this->input->post('presentacion_ord_med')));
	if($query->num_rows() == 0)
	{
		$savep = array(
       'name'=>$this->input->post('presentacion_ord_med')
	   );
		$this->model_admin->save_new_presentacion($savep);
	}


}




public function SaveFormIndicaciones(){
$insert_date=date("Y-m-d H:i:s");
$historial_id=$this->input->post('historial_id');
$save = array(
'medica'=> $this->input->post('medicamento1'),
'dosis'=> $this->input->post('medicamentoDosis'),
'presentacion'=> $this->input->post('presentacion'),
'frecuencia'=> $this->input->post('frecuencia'),
'cantidad' => $this->input->post('cantidad'),
'via' => $this->input->post('via'),
'oyo' => $this->input->post('oyo'),
'operator' => $this->input->post('operator'),
'insert_date'=> $insert_date,
'historial_id' => $historial_id,
'despachada' =>2,
'centro' => $this->input->post('centro'),
'updated_by' => $this->input->post('operator'),
'updated_time'=> $insert_date,
'singular_id'=>1
);

$id_ind=$this->model_admin->SaveFormIndicaciones($save);

$farm = array(
'id_pat'=>$historial_id,
'id_doc'=>$this->input->post('operator'),
'id_recetas'=>$id_ind
);
$this->db->insert("h_c_indicaciones_med_enviar_pat",$farm);



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


public function enviarRecetasToPatient(){
$idpat=$this->input->post('idpat');
$idoc=$this->input->post('doc');
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);


$email=$this->db->select('email')->where('id_p_a',$idpat)->get('patients_appointments')->row('email'); 

$doc=$this->db->select('name')->where('id_user',$idoc)->get('users')->row('name'); 

//---------------------------------------------------------------------------------

$chars = "a1b2c3d4e5f67gh0i9jk2lm3nop0qrs19tuv7w4xy80zAB4CD8E06FGH4IJ1KLW3XYZ0189MNOP2QRS1T9UV$id_ind";
$codigo = substr( str_shuffle( $chars ), 0, 6);
$codigocpt =md5($codigo);
//---------------------------------------------------------------------------------------------------------
$link='href="https://www.admedicall.com/navigation/search_recipe"';	
$message = // contents of report in $message
"
<html>
<head>

</head>
<body>
<div>
Usted ha recibido de parte del doctor $doc el código # <strong>$codigo</strong> después de una consulta, favor presentar este número al farmacéutico, si desea ver su indicación del clic Puede entrar el código para ver su receta.

<br/><a $link>Puede entrar el código para ver su receta</a>
 </div>    
</body>
</html>";

$title="Mensage del doc. $doc";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject($title);
$this->email->message($message);
$this->email->send();

 
$sql ="SELECT id_recetas FROM h_c_indicaciones_med_enviar_pat WHERE  id_pat=$idpat && id_doc=$idoc";
$farma = $this->db->query($sql);
foreach ($farma->result() as $row2) {
	//update recetas
$where = array(
'id_i_m' =>$row2->id_recetas
);
$data = array(
'encrypt_recetas'=>$codigocpt
);
$this->db->where($where);
$this->db->update("h_c_indicaciones_medicales",$data);
//remove recetas

$whered = array(
  'id_recetas'=>$row2->id_recetas
);

$this->db->where($whered);
$this->db->delete('h_c_indicaciones_med_enviar_pat');
}

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
$this->db->insert("ord_med_med_gen",$save);

}




public function UpdateFormRecetasOrdMed(){
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
$this->db->update("orden_medica_recetas",$update);

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
$this->db->update("orden_medica_estudios",$update);

}




public function new_indication()

{  $data['historial_id']=$this->input->post('historial_id');
   $data['area']=$this->input->post('area');
   $data['user_id']=$this->input->post('user_id');
   $singularid = $this->model_admin->print_recetas($this->input->post('historial_id'));
   $data['singularid']=$singularid;
   $data['count']=count($singularid);
	$this->load->view('admin/historial-medical1/recetas/NewIndicationOne', $data);
}

public function new_indication_ord_med()

{  $data['historial_id']=$this->input->post('historial_id');
   $data['area']=$this->input->post('area');
   $data['user_id']=$this->input->post('user_id');
   $singularid = $this->model_admin->print_recetas_ord_med($this->input->post('historial_id'));
   $data['singularid']=$singularid;
   $data['count']=count($singularid);
	$this->load->view('admin/historial-medical1/recetas/NewIndicationOne', $data);
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
$sql ="SELECT * FROM orden_medica_recetas WHERE  historial_id=$historial_id && operator=$user_id && printing=$printing order by id_i_m desc";
$data['IndicacionesPrevias'] = $this->db->query($sql);
$this->load->view('admin/historial-medical1/orden-medica/recetas/all-patients-recetas', $data);
}




public function allRecetas()

{
$data['historial_id']=$this->input->post('historial_id');
$data['area']=$this->input->post('area');
$data['user_id']=$this->input->post('user_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$data['tot']=$this->model_admin->hist_count_recetas($this->input->post('historial_id'));
$data['IndicacionesPrevias'] = $this->model_admin->IndicacionesPrevias($this->input->post('historial_id'));
$data['pag_rec'] =1; 
$this->load->view('admin/historial-medical1/recetas/all-patients-recetas', $data);
}



public function allEstudios()
{
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id ;
$emergency_id  = $this->input->post('emergency_id');
$IndicacionesPreviasEstudios = $this->model_admin->patEstudios($historial_id,$emergency_id);
$data['IndicacionesPreviasEstudios']=$IndicacionesPreviasEstudios;
$data['num_count_es']= count($IndicacionesPreviasEstudios);
$data['area']=$this->input->post('area');
$data['user_id']=$this->input->post('user_id');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/estudios/NewIndicationEs',$data);
}



public function allEstudiosOrdMed()
{
$historial_id  = $this->input->post('historial_id');
$data['historial_id'] = $historial_id ;
$user_id=$this->input->post('user_id');
$printing=$this->input->post('printing');
$sql ="SELECT * FROM orden_medica_estudios WHERE  historial_id=$historial_id && operator=$user_id && printing=$printing ORDER BY id_i_e DESC";
$IndicacionesPreviasEstudios = $this->db->query($sql);
$data['IndicacionesPreviasEstudios']=$IndicacionesPreviasEstudios;
//$data['num_count_es']= count($IndicacionesPreviasEstudios);
$data['area']=$this->input->post('area');
$data['user_id']=$user_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$this->load->view('admin/historial-medical1/orden-medica/estudios/NewIndicationEs',$data);
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


public function deleteRecetasOM(){
$where = array(
  'id_i_m'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('orden_medica_recetas');


}

public function cancelCita(){
		
$update = array(
  'cancelar' =>1,
  'update_by' =>$this->input->post('iduser')
);

$where = array(
  'id_apoint'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->update("rendez_vous",$update);	

}


public function deleteEstudiosOM(){
$where = array(
  'id_i_e'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete('orden_medica_estudios');


}

public function deleteMedGnrl(){
$where = array(
  'idem'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->delete(' ord_med_med_gen');


}

public function delete_tutor(){
$query = $this->model_admin->delete_tutor($this->input->post('id'));

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
'printing'=> $this->input->post('printing'),
'id_sala'=>$this->input->post('sala'),
'centro'=>$this->input->post('centro'),
'cobertura' => $this->input->post('cobert'),
'idemes' => $this->input->post('id_em'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')
);
$this->db->insert("orden_medica_estudios",$save);

}



public function SaveFormIndicacionesEstudios(){
$historial_id =$this->input->post('historial_id_es');
$insert_date=date("Y-m-d H:i:s");
$save = array(
'estudio'=> $this->input->post('estudios'),
'centro'=> $this->input->post('centro'),
'cuerpo'=> $this->input->post('cuerpo'),
'lateralidad' => $this->input->post('lateralidad'),
'observacion' => $this->input->post('observaciones'),
'historial_id' => $historial_id,
'operator' => $this->input->post('operators'),
'updated_by' => $this->input->post('operators'),
'insert_date'=> $insert_date,
'updated_time'=> $insert_date,
'emergency'=> $this->input->post('emergency_id')

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
$emergency_id  = $this->input->post('emergency_id');
$data['historial_id'] = $historial_id;
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->post('user_id'))->get('users')->row('perfil');
$IndicacionesLab = $this->model_admin->patLab($historial_id,$emergency_id);
$data['IndicacionesLab'] =$IndicacionesLab;
$data['num_count_lab']=count($IndicacionesLab);
$this->load->view('admin/historial-medical1/laboratorios/NewIndicationLab', $data);
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
$sql ="SELECT * FROM orden_medcia_lab WHERE historial_id=$historial_id && operator=$user_id && printing=$printing";
$IndicacionesLab = $this->db->query($sql);
$data['IndicacionesLab'] =$IndicacionesLab;
$this->load->view('admin/historial-medical1/orden-medica/laboratorios/NewIndicationLab', $data);
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
$sql ="SELECT * FROM ord_med_med_gen WHERE id_patient=$historial_id && id_user=$user_id && printing=$printing";
$data['ordenMed'] = $this->db->query($sql);
$this->load->view('admin/historial-medical1/orden-medica/ordenMedSala', $data);
}










public function allLaboratoriosInd()
{
$data['id_historial'] = $this->input->post('historial_id');
$data['operator'] = $this->input->post('operator');
$data['user_id'] = $this->input->post('user_id');
$data['hist'] = $this->input->post('hist');
$data['emergency_id'] = $this->input->post('emergency_id');
$data['areaid']=$this->db->select('area')->where('id_user',$this->input->post('user_id'))->get('users')->row('area');
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
	$data['seguro_medico_id']=$seguro_medico_id;
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico_id)->get('seguro_medico')->row('title');
	$data['seguro_medico'] =$sm;
	$query = $this->model_admin->get_input($seguro_medico_id);
	$data['GET_INPUT'] =$query;
	$this->load->view('admin/pacientes-citas/get-seguro-codigo', $data);
	 //echo json_encode ($query);
}
public function calculAge()
{
	$date_nacer=$this->input->post('date_nacer');
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
	$patient_age=trim($age);
	echo $patient_age;
}


public function search_patient_tutor()
{
$data['controller']=$this->input->get('controller');
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





public function check_if_patient_exist()
{
$nombre=$this->input->get('nombre');
$sql ="SELECT nombre,date_nacer,sexo,nacionalidad,tel_cel,nec1,ced1,ced2,ced3,photo FROM patients_appointments WHERE  nombre  LIKE '$nombre'";
$query = $this->db->query($sql);
$count=$query->num_rows();
if($count >0){
$data['query']=$query;
$data['count']=$count;
$this->load->view('admin/pacientes-citas/check_if_patient_exist',$data);
}

}



public function usuario_terco()
{

$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->get('nombre'),'date_nacer'=>$this->input->get('date_nacer'),'tel_cel'=>$this->input->get('tel_cel')));
if($query->num_rows() > 0)
	{
		echo "<span style='color:red'>Ya el paciente esta registrado. !</span>";
		echo "<script>$('#form_phonecel').val('');</script>";

	}

}


public function getDocEsp()
{
$id_esp=$this->input->post('id_esp');
$id_centro=$this->input->post('id_centro');
$doc =$this->model_admin->get_doc_esp($id_esp,$id_centro);
echo "<option value=''></option>";
foreach ($doc as $row){
echo '<option value="'.$row->id_user.'">'.$row->name.'</option>';

}
}




	public function get_doc()
{
	$id_esp=$this->input->post('id_esp');
	$id_centro=$this->input->post('id_centro');
	$data['doc'] = $this->model_admin->get_doc_esp($id_esp,$id_centro);
	$this->load->view('admin/get_doc', $data);
	 //echo json_encode ($query);
}

public function getcentEsp()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT especialidad FROM  medial_center_esp WHERE id_medical_center=$id_centro";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
$esp= $this->db->select('title_area')->where('id_ar',$rf->especialidad)->get('areas')->row('title_area');
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->especialidad.'">'.$esp.'</option>';

}
}

public function getDocSeguro()
{
echo '<option value="" ></option>';
$id_doctor=$this->input->post('id_doctor');
$sql ="SELECT id_d_s, seguro_medico FROM  doctor_seguro WHERE id_doctor=$id_doctor";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
$seg= $this->db->select('title')->where('id_sm',$rf->seguro_medico)->get('seguro_medico')->row('title');
echo '<option value="'.$rf->seguro_medico.'">'.$seg.'</option>';

}
}


public function ncfDateRange()
{
$id_user=$this->input->post('id_user');
$sql ="SELECT fecha FROM  invoice_ars_claims WHERE medico=$id_user group by fecha ORDER BY fecha DESC";
$querysig = $this->db->query($sql);
echo '<option value="" ></option>';
foreach ($querysig->result() as $row){
$fecha=date("d-m-Y", strtotime($row->fecha));
echo '<option value="'.$row->fecha.'">'.$fecha.'</option>';
}	
}

public function loadMedicoFac()
{
$id_user=$this->input->post('id_user');
$doctor= $this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
if($doctor['perfil']=="Medico"){
	 echo '<option value="" ></option>';
	echo '<option value="'.$id_user.'">'.$doctor['name'].'</option>';
	}
	else if($doctor['perfil']=="Asistente Medico"){
$sql ="SELECT id_doctor FROM  centro_doc_as WHERE id_asdoc=$id_user group by id_doctor";
$querysig = $this->db->query($sql);
echo '<option value="" >none</option>';
foreach ($querysig->result() as $rf){
$doctor= $this->db->select('name')->where('id_user',$rf->id_doctor)->get('users')->row('name');
echo '<option value="'.$rf->id_doctor.'">'.$doctor.'</option>';
}	
}
else{
$sql ="SELECT medico FROM  factura2 group by medico";
$querysig = $this->db->query($sql);
 echo '<option value="" >none</option>';
foreach ($querysig->result() as $rf){
$doctor= $this->db->select('name')->where('id_user',$rf->medico)->get('users')->row('name');
echo '<option value="'.$rf->medico.'">'.$doctor.'</option>';
}
}
}

public function get_doc_centro()
{
$id_user=$this->input->post('id_user');
$doctor= $this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
if($doctor['perfil']=="Medico"){
	 echo '<option value="" ></option>';
	echo '<option value="'.$id_user.'">'.$doctor['name'].'</option>';
	}
	else if($doctor['perfil']=="Asistente Medico"){
$sql ="SELECT id_doctor FROM  centro_doc_as WHERE id_asdoc=$id_user group by id_doctor";
$querysig = $this->db->query($sql);
echo '<option value="" >none</option>';
foreach ($querysig->result() as $rf){
$doctor= $this->db->select('name')->where('id_user',$rf->id_doctor)->get('users')->row('name');
echo '<option value="'.$rf->id_doctor.'">'.$doctor.'</option>';
}	
}
	else{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT medico FROM  factura2 WHERE centro_medico=$id_centro group by medico";
$querysig = $this->db->query($sql);
 echo '<option value="" >none</option>';
foreach ($querysig->result() as $rf){
$doctor= $this->db->select('name')->where('id_user',$rf->medico)->get('users')->row('name');
echo '<option value="'.$rf->medico.'">'.$doctor.'</option>';
}
}
}

public function report_bill_by_desde()
{
$checkval=$this->input->get('checkval');
$id_user=$this->input->get('id_user');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Asistente Medico"){
$report_bill_by_desde=$this->model_admin->as_medico_report_bill_desde($id_user,$checkval);
} else{
	if($checkval=="privado"){
$report_bill_by_desde=$this->model_admin->report_bill_by_desde_privado($id_user,$perfil);
} else{
$report_bill_by_desde=$this->model_admin->report_bill_by_desde_general($id_user,$perfil);
}
}
 echo '<option value="" >none</option>';
foreach ($report_bill_by_desde as $rf){
 $date = date("d-m-Y", strtotime($rf->filter_date));
echo '<option value="'.$rf->filter_date.'">'.$date.'</option>';
}
}



public function report_bill_by_hasta()
{
$checkval=$this->input->get('checkval');
$id_user=$this->input->get('id_user');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Asistente Medico"){
$report_bill_by_hasta=$this->model_admin->as_medico_report_bill_hasta($id_user,$checkval);
} else{
if($checkval=="privado"){
$report_bill_by_hasta=$this->model_admin->report_bill_by_hasta_privado($id_user,$perfil);
} else{
$report_bill_by_hasta=$this->model_admin->report_bill_by_hasta_general($id_user,$perfil);
}
}
 echo '<option value="" >none</option>';
foreach ($report_bill_by_hasta as $rf){
 $date = date("d-m-Y", strtotime($rf->filter_date));
echo '<option value="'.$rf->filter_date.'">'.$date.'</option>';
}
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
	$data['plan']=$this->input->post('plan');
	$data['idpatient']=$idpatient;
	$GET_NAMEF= $this->model_admin->GET_NAMEF($idpatient);
	$data['GET_NAMEF_C']=count($GET_NAMEF);
	$data['GET_NAMEF']=$GET_NAMEF;
	$seguro_medico=$this->input->post('seguro_medico');
	$sm=$this->db->select('title')->where('id_sm',$seguro_medico)->get('seguro_medico')->row('title');
	$data['seguro_medico'] =$sm;
	$data['seguro_medico_id']=$seguro_medico;
	$data['GET_INPUT']= $this->model_admin->get_input($seguro_medico);
	$this->load->view('admin/pacientes-citas/get-seguro-codigo-edit', $data);
	 //echo json_encode ($query);
}


public function daySelected()
{
$fecha_propuesta = date("Y-m-d", strtotime($this->input->post('fecha_propuesta1')));
$data['fecha_propuesta']=$fecha_propuesta;
$current_date=date('Y-m-d');
$data['current_date']=$current_date;
$id_doct=$this->input->post('doc');
$data['id_doct']=$id_doct;
$id_centro=$this->input->post('centro_medico');
$idpatient=$this->input->post('id_patient');
$sql_con ="SELECT id_patient FROM rendez_vous where id_patient=$idpatient && centro=$id_centro && doctor=$id_doct && filter_date='$fecha_propuesta'";
$atendido_con = $this->db->query($sql_con);
if($atendido_con->num_rows() > 0){
echo "<div class='alert alert-warning' ><i class='fa fa-warning' style='font-size:28px;color:red'></i> Este paciente ya tiene una cita en este centro medico por hoy.</div>";
echo '<script>
$(".send_cit").css("display","none");
</script>';
} else {

$data['id_centro']=$id_centro;
$centro=$this->db->select('name')->where('id_m_c',$id_centro)
->get('medical_centers')->row('name');

$data['centro']=$centro;
$dayLetter=$this->input->post('day');
$dayNumber=$this->db->select('id')->where('title',$dayLetter)->get('diaries')->row('id');

$data['dayNumber']=$dayNumber;
$agenda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita')->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
where('day',$dayNumber)->
get('doctor_agenda_test')->row_array();
$hour_from = substr($agenda['hour_from'], 0, 2);

$hour_to = substr($agenda['hour_to'], 0, 2);
$fecha_inicio =$agenda['fecha_inicio'];
$fecha_final = $agenda['fecha_final'];
$countCitaAgenda =$agenda['cita'];

$current_day= date('l');
$hour=date('H');

$nextDate1=date("Y-m-d", strtotime(' +1 day'));
$nextDate2=date("Y-m-d", strtotime(' +2 day'));
$nextDate3=date("Y-m-d", strtotime(' +3 day'));
$nextDate4=date("Y-m-d", strtotime(' +4 day'));
$nextDate5=date("Y-m-d", strtotime(' +5 day'));
$nextDate6=date("Y-m-d", strtotime(' +6 day'));
$nextDate7=date("Y-m-d", strtotime(' +7 day'));


if($fecha_propuesta < $current_date){
		echo "<strong> No puede crear cita por día atras de hoy .</strong>";
	echo '<script>
	$(".send_cit").css("display","none");
	</script>';
} else 	{

//-------------------------------------------------------------------------------------------------------------


if($current_day=="Monday"){
$nextDay1=2;$nextDay2=3;$nextDay3=4;$nextDay4=5;$nextDay5=6;$nextDay6=7;$nextDay7=1;

}



if($current_day=="Tuesday"){
$nextDay1=3;$nextDay2=4;$nextDay3=5;$nextDay4=6;$nextDay5=7;$nextDay6=1;$nextDay7=2;

}



if($current_day=="Wednesday"){
$nextDay1=4;$nextDay2=5;$nextDay3=6;$nextDay4=7;$nextDay5=1;$nextDay6=2;$nextDay7=3;
}


if($current_day=="Thursday"){
$nextDay1=5;$nextDay2=6;$nextDay3=7;$nextDay4=1;$nextDay5=2;$nextDay6=1;$nextDay7=4;
}


if($current_day=="Friday"){
$nextDay1=6;$nextDay2=7;$nextDay3=1;$nextDay4=2;$nextDay5=3;$nextDay6=4;$nextDay7=5;
}



if($current_day=="Saturday"){
$nextDay1=7;$nextDay2=1;$nextDay3=2;$nextDay4=3;$nextDay5=4;$nextDay6=5;$nextDay7=6;
}

if($current_day=="Sunday"){
$nextDay1=1;$nextDay2=2;$nextDay3=3;$nextDay4=4;$nextDay5=5;$nextDay6=6;$nextDay7=7;
}

//-----------------------------------------------------------------------------------------------------

$queryRdvLunes=$this->db->select('id_apoint')->
where('weekday',$nextDay5)->
where('filter_date',$nextDate5)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvLunes']=$queryRdvLunes->num_rows();

$queryAgendaLunes=$this->db->select('cita,day')->
where('day',$nextDay5)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['lunesAgendaCita']=$queryAgendaLunes['cita'];
$data['lunesAgenda']=$this->db->select('title')->where('id',$queryAgendaLunes['day'])->get('diaries')->row('title');


//-----------------------------------------------------------------------------------------------------

$queryRdvMartes=$this->db->select('id_apoint')->
where('weekday',$nextDay6)->
where('filter_date',$nextDate6)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvMartes']=$queryRdvMartes->num_rows();

$queryAgendaMartes=$this->db->select('cita,day')->
where('day',$nextDay6)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['martesAgendaCita']=$queryAgendaMartes['cita'];
$data['martesAgenda']=$this->db->select('title')->where('id',$queryAgendaMartes['day'])->get('diaries')->row('title');

//-----------------------------------------------------------------------------------------------------



$queryRdvMiercoles=$this->db->select('id_apoint')->
where('weekday',$nextDay7)->
where('filter_date',$nextDate7)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvMiercoles']=$queryRdvMiercoles->num_rows();

$queryAgendaMiercoles=$this->db->select('cita,day')->
where('day',$nextDay7)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['miercolesAgendaCita']=$queryAgendaMiercoles['cita'];
$data['miercolesAgenda']=$this->db->select('title')->where('id',$queryAgendaMiercoles['day'])->get('diaries')->row('title');


//-----------------------------------------------------------------------------------------------------

$queryRdvThursday=$this->db->select('id_apoint')->
where('weekday',$nextDay1)->
where('filter_date',$nextDate1)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvThursday']=$queryRdvThursday->num_rows();

$queryAgendaThursday=$this->db->select('cita,day')->
where('day',$nextDay1)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['thursdayAgendaCita']=$queryAgendaThursday['cita'];
$data['thursdayAgenda']=$this->db->select('title')->where('id',$queryAgendaThursday['day'])->get('diaries')->row('title');

//----------------------------------------------------------------------------------------------------------
$queryRdvFriday=$this->db->select('id_apoint')->
where('weekday',$nextDay2)->
where('filter_date',$nextDate2)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvFriday']=$queryRdvFriday->num_rows();

$queryAgendaFriday=$this->db->select('cita,day')->
where('day',$nextDay2)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['fridayAgendaCita']=$queryAgendaFriday['cita'];
$data['fridayAgenda']=$this->db->select('title')->where('id',$queryAgendaFriday['day'])->get('diaries')->row('title');

//-----------------------------------------------------------------------------------------------------------


$queryRdvSabado=$this->db->select('id_apoint')->
where('weekday',$nextDay3)->
where('filter_date',$nextDate3)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvSabado']=$queryRdvSabado->num_rows();

$queryAgendaSabado=$this->db->select('cita,day')->
where('day',$nextDay3)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['sabadoAgendaCita']=$queryAgendaSabado['cita'];
$data['sabadoAgenda']=$this->db->select('title')->where('id',$queryAgendaSabado['day'])->get('diaries')->row('title');

//--------------------------------------------------------------------------------------------------

$queryRdvDomingo=$this->db->select('id_apoint')->
where('weekday',$nextDay4)->
where('filter_date',$nextDate4)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$data['countRdvDomingo']=$queryRdvDomingo->num_rows();

$queryAgendaDomingo=$this->db->select('cita,day')->
where('day',$nextDay4)->
where('id_doctor',$id_doct)->
where('id_centro',$id_centro)->
get('doctor_agenda_test')->row_array();
$data['domingoAgendaCita']=$queryAgendaDomingo['cita'];
$data['domingoAgenda']=$this->db->select('title')->where('id',$queryAgendaDomingo['day'])->get('diaries')->row('title');



//-------------------------CHECK FOR NEXT WEEK---------------------------------------------------------


//----------------------------------------------------------------------------------

if($current_date >= $fecha_inicio && $current_date <= $fecha_final){
$QuerycountRdv=$this->
db->select('id_apoint')->
where('weekday',$dayNumber)->
where('filter_date',$fecha_propuesta)->
where('doctor',$id_doct)->
where('centro',$id_centro)->
get('rendez_vous');
$countRdv=$QuerycountRdv->num_rows();


if($countRdv != $countCitaAgenda){

echo "<span style='color:green'>El día <strong>$dayLetter</strong>  puede crear hasta <strong>$countCitaAgenda</strong> citas para <strong>$centro</strong>.<br/>
Total creadas : <strong>$countRdv.</strong></span>";
echo '<script>
$(".send_cit").css("display","block");
</script>';
} else{
	echo "Ha llegado a su limite por $dayLetter. ($countRdv citas)<br/>";
	$this->load->view('admin/pacientes-citas/agenda_condition',$data);

echo '<script>
$(".send_cit").css("display","none");
</script>';
}

} else{
	echo "Los <strong>$dayLetter</strong> No tiene agenda programada.<br/>";

	echo '<script>
$(".send_cit").css("display","none");
</script>';
//----------------------------------------------------------------

$this->load->view('admin/pacientes-citas/agenda_condition',$data);

//----------------------------------------------------------------
}
}

}
}




public function load_agenda(){
 $data['id_doc_user']= $this->input->get('id_doctor');
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$data['diaries']=$this->model_admin->getDiaries();
$this->load->view('admin/users/load_doc_agenda_update',$data);
}

public function load_doc_agenda_permanently(){
$iduser=$this->uri->segment(3);
$sql ="SELECT * FROM  doctor_agenda_test WHERE id_doctor=$iduser group by id_centro";
$query= $this->db->query($sql);

 echo "<table  class='table table-striped'>
<tr>
<th>Centro Medico</th><th>Fecha Inicio</th><th>Fecha Final</th><th>Desde</th><th>Hasta</th><th>Citas</th>
</tr> ";
foreach ($query->result() as $row){
$centro= $this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
  $fecha_inicio = date('d-m-Y', strtotime($row->fecha_inicio));
$fecha_final = date('d-m-Y', strtotime($row->fecha_final));
 echo "
<tr>
<td>$centro</td><td>$fecha_inicio</td><td>$fecha_final</td><td>$row->hour_from</td><td>$row->hour_to</td><td>$row->cita</td>
</tr>
";
}
 echo "
</table>
";

}





public function load_doc_ag(){
 $data['id_doctor']= $this->input->get('id_doc_user');
$data['perfil']=$this->db->select('perfil')->where('id_user',$this->input->get('id_doctor'))->get('users')->row('perfil');
$data['agend_result']=$this->model_admin->agend_result($this->input->get('id_doc_user'));
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
$this->load->view('admin/medicos/agend_result',$data);
}




public function saveUpdateCita()
{
$filter = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
$idpatient=$this->input->post('id_patient');
$data['idpatient'] = $idpatient;
$id=$this->input->post('id_cita');
$nec=$this->input->post('nec');
$save = array(
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'doctor'=> $this->input->post('doctor'),
'area'=> $this->input->post('especialidad'),
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'filter_date' =>$filter,
'update_time' =>date("Y-m-d H:i:s"),
'update_by' => $this->input->post('update_by'),
'cancelar' => $this->input->post('cancelar')
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

$query = $this->db->get_where('factura_num',array('centro'=>$this->input->post('centro_medico')));
if($query->num_rows() == 0)
{
$save= array(
'centro' =>$this->input->post('centro_medico'),
'num' =>1
);
$idnum=$this->model_admin->SaveBillNum($save);
}
else{
$num=$this->db->select('num')->where("centro",$this->input->post('centro_medico'))->order_by('id','desc')->limit(1)->get('factura_num')->row('num');
$num=$num+1;
$save= array(
'centro' =>$this->input->post('centro_medico'),
'num' =>$num
);
$idnum=$this->model_admin->SaveBillNum($save);
}

$num=$this->db->select('centro,num')->where('id',$idnum)->get('factura_num')->row_array();
$num1=$num['centro'];
$num2=$num['num'];
$num3="$num1-$num2";

//----------------------------------------------------------------------------------------
$exequatur=$this->db->select('exequatur')->where('id_user',$this->input->post('medico'))->get('users')->row('exequatur');


$query2 = $this->db->get_where('factura_num',array('exequatur'=>$exequatur));
if($query2->num_rows() == 0)
{
$save= array(
'exequatur' =>$exequatur,
'num' =>1
);
$idnum2=$this->model_admin->SaveBillNum($save);
}
else{
$num=$this->db->select('num')->where("exequatur",$exequatur)->order_by('id','desc')->limit(1)->get('factura_num')->row('num');
$num=$num+1;
$save= array(
'exequatur' =>$exequatur,
'num' =>$num
);
$idnum2=$this->model_admin->SaveBillNum($save);
}

$exnum=$this->db->select('exequatur,num')->where('id',$idnum2)->get('factura_num')->row_array();
$exnum1=$exnum['exequatur'];
$exnum2=$exnum['num'];
$exnum3="$exnum1-$exnum2";

//-----------------------------------------------------------------------------------------------


$insert_date=date("Y-m-d H:i:s");
//$filter_date=date("Y-m-d");
$filter_date=date("Y-m-d", strtotime($this->input->post('fecha')));
$save2= array(
'medico' =>$this->input->post('medico'),
'area' =>$this->input->post('area'),
'centro_medico' =>$this->input->post('centro_medico'),
'seguro_medico' =>$this->input->post('seguro_medico'),
'codigoprestado' =>$this->input->post('codigoprestado'),
'paciente' =>$this->input->post('patient_id'),
'fecha' =>$this->input->post('fecha'),
'filter_date' =>$filter_date,
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'comment' =>$this->input->post('comment'),
'numfac' =>$exnum3,
'numfac2' =>$num3,
'inserted_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'update_date' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'id_rdv' =>$this->input->post('id_apoint')
);
$last_bill_id=$this->model_admin->SaveBill2($save2);

$fecha_fac=date("d-m-Y H:i", strtotime($this->input->post('fecha')));

$this->session->set_userdata('last_bill_id',$last_bill_id);
$this->session->set_userdata('medico',$this->input->post('medico'));
$this->session->set_userdata('factura_inserted_by',$this->input->post('inserted_by'));
$centro_type=$this->db->select('type')->where('id_m_c',$this->input->post('centro_medico'))->get('medical_centers')->row('type');
$this->session->set_userdata('centro_medico',$this->input->post('centro_medico'));
$this->session->set_userdata('centro_type',$centro_type);
$this->session->set_userdata('is_admin',$this->input->post('is_admin'));
$exequatur=$this->db->select('exequatur')->where('id_user',$this->input->post('medico'))->get('users')->row('exequatur');

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
'service' =>$serv,
'cantidad' => $cant,
'preciouni' =>$pre,
'subtotal' => $sub,
'totalpaseg' =>$totpas,
'descuento' => $desc,
'totpapat' => $totpap,
'id2' =>$last_bill_id,
'pat_id' =>$this->input->post('patient_id'),
'area_id' =>$this->input->post('area'),
'medico2' =>$medico,
'seguro' =>$seguro_medico,
'center_id' =>$this->input->post('centro_medico'),
'filter' =>$filter_date,
'created_by' =>$this->input->post('inserted_by'),
'inserted_time' =>$insert_date,
'updated_time' =>$insert_date,
'updated_by' =>$this->input->post('inserted_by'),
'fecha_fac' =>$fecha_fac
);
$this->model_admin->SaveBill($save);
}
$this->model_admin->DeleteEmptyBill();

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
$patient=$this->db->select('paciente,id_rdv')->where('idfacc',$idfacc)->get('factura2')->row_array();
$patient_id=$patient['paciente'];
$id_rdv=$patient['id_rdv'];
$medico=$this->session->userdata['medico'];
$centro_medico=$this->session->userdata['centro_medico'];
$centro_type=$this->session->userdata['centro_type'];
$data['is_admin']=$this->session->userdata['is_admin'];
$identificar=$this->input->get('identificar');
$data['idfacc']=$idfacc;
$data['centro_type']=$centro_type;
//$filter_date=$this->db->select('filter_date')->where('id_apoint',$id_rdv)->where('filter_date',date('Y-m-d'))->get('rendez_vous')->row('filter_date');

$filter_date=$this->db->select('insert_date')->where('p_id',$patient_id)->where('user_id',$medico)->where('centro_medico',$centro_medico)->order_by('insert_date','desc')->limit(1)->get('h_c_diagno_def_link')->row('insert_date');
 

$data['show_diagno_pat']=$this->model_admin->show_diagno_pat($patient_id,$medico,$centro_medico,$filter_date);
$diagnos=$this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$patient_id)->
where('id_user',$medico)->
where('centro_medico',$centro_medico)->
order_by('id_cdia','desc')->
get('h_c_conclusion_diagno')->row_array();
$data['procedimiento'] =$diagnos['procedimiento'];
$data['otros_diagnos'] =$diagnos['otros_diagnos'];
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



public function billing_print_view_privado()
{
$idfacc=$this->session->userdata['last_bill_id'];
$factura_inserted_by=$this->session->userdata['factura_inserted_by'];
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
$this->load->view('medico/billing/bill/seguro-privado/print_view',$data);
}
 else {

$this->load->view('medico/billing/bill//seguro-privado/print_view_centro',$data);
}

$this->load->view('medico/billing/bill/seguro-privado/print_view_data',$data);
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




public function print_billing_()
{
$mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/custom/temp/dir/path']);
 $mpdf->setFooter('{PAGENO}');
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
	 $mpdf->setFooter('{PAGENO}');
	$new_id_ncf= $this->uri->segment(3);
	 $this->data['last_id'] =$new_id_ncf;
	 $this->data['invoice'] = $this->model_admin->getNewinvoice($new_id_ncf);
	 $this->data['nota_ncf'] = $this->model_admin->getNcf($new_id_ncf);

$html = $this->load->view('admin/print/print_invoice_ars',$this->data,true);
$mpdf->WriteHTML($html);
$mpdf->Output();


}




public function mssm()
{
$id_user=$this->uri->segment(3);
	$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
	$data['name'] = $user['name'] ;
	$data['perfil'] = $user['perfil'] ;
	$data['id_user'] = $id_user ;


$id_area=$this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
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



public function saveOfatalRef(){
if($this->input->post('of-user'))
{
$vision_sencilla= $this->input->post('vision-sencilla');
$vision_sencilla1 = (isset($vision_sencilla)) ? 1 : 0;

$flat_top= $this->input->post('flat-top');
$flat_top1 = (isset($flat_top)) ? 1 : 0;

$invisibles= $this->input->post('invisibles');
$invisibles1 = (isset($invisibles)) ? 1 : 0;

$progresivos= $this->input->post('progresivos');
$progresivos1 = (isset($progresivos)) ? 1 : 0;

$antirreflejos= $this->input->post('antirreflejos');
$antirreflejos1 = (isset($antirreflejos)) ? 1 : 0;

$policarbonatos= $this->input->post('policarbonatos');
$policarbonatos1 = (isset($policarbonatos)) ? 1 : 0;

$transitions= $this->input->post('transitions');
$transitions1 = (isset($transitions)) ? 1 : 0;

$foto_croma= $this->input->post('foto_croma');
$foto_croma1 = (isset($foto_croma)) ? 1 : 0;

$save= array(
'od_espera_r'=> $this->input->post('od_espera_r1'),
 'od_espera'=> $this->input->post('od_espera'),
'od_cilindro'=> $this->input->post('od_cilindro'),
'od_cilindro_r'=> $this->input->post('od_cilindro_r1'),
'eje_od'=> $this->input->post('eje_od'),
'add_od'=> $this->input->post('add_od'),
'espera_os'=> $this->input->post('os_espera'),
 'os_espera_r'=> $this->input->post('os_espera_r1'),
'cilindro_os'=> $this->input->post('os_cilindro'),
'os_cilindro_r'=> $this->input->post('os_cilindro_r1'),
'eje_os'=> $this->input->post('eje_os'),
'add_os'=> $this->input->post('add_os'),
'vision_sencilla'=> $vision_sencilla1,
'flat_top'=> $flat_top1,
'invisibles'=> $invisibles1,
'progresivos'=> $progresivos1,
'antirreflejos'=> $antirreflejos1,
'policarbonatos'=> $policarbonatos1,
'transitions'=> $transitions1,
'foto_croma'=> $foto_croma1,
'd_prf'=> $this->input->post('d-prf'),
'altura_mm'=> $this->input->post('altura-mm'),
'ref_observaciones'=> $this->input->post('ref-observaciones'),
'id_hist'=> $this->input->post('of-pat'),
'id_user'=> $this->input->post('of-user'),
'id_centro'=> $this->input->post('of-centro'),
'inserted'=>date("Y-m-d H:i:s")
);
//$this->db->insert("h_c_of_refracion",$save);
$id_last=$this->model_admin->h_c_of_refracion($save);	
//$id_last=$this->db->insert_id();
if($id_last > 0){
	$save2= array(
		'id_centro'=> $this->input->post('of-centro'),
		'id_doc'=> $this->input->post('of-user'),
		'patient'=> $this->input->post('of-pat'),
		'id_refraccion'=>$id_last,
		'inserted_time'=>date("Y-m-d H:i:s")

		);

		//$this->db->insert("laboratory_lentes",$save2);
       $this->model_admin->laboratory_lentes($save2);		
					
			}
			else{
					echo "Insert error !";
			}
		}

}


public function enviarRefraccion(){
if($this->input->post('id_ref'))
{
$seguro1=$this->db->select('seguro_medico')->where('id_p_a',$this->input->post('id_pat'))->get('patients_appointments')->row('seguro_medico');
if($seguro1){
$seguro=$seguro1;	
}else{
$seguro=0;	
}
	$save= array(
'id_centro'=> $this->input->post('id_centro'),
 'id_doc'=> $this->input->post('id_user'),
'patient'=> $this->input->post('id_pat'),
'id_refraccion'=>$this->input->post('id_ref'),
'seguro'=> $seguro,
'inserted_time'=>date("Y-m-d H:i:s")

);

$this->db->insert("laboratory_lentes",$save);
$id_last=$this->db->insert_id();
if($id_last > 0){
			        echo "La refraccion ha sido enviado al laboratorio de lentes";
			}
			else{
					echo "Insert error !";
			}
		}
$this->enviarSolicitudToLabLentes($this->input->post('id_user'),$this->input->post('id_centro'),$this->input->post('id_pat'),$id_last);
}


public function enviarSolicitudToLabLentes($id_user,$id_centro,$id_pat,$id_ref){
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$doc=$this->db->select('name,area')->where('id_user',$id_user)->get('users')->row_array();
$doctor=$doc['name'];
$area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$patient=$this->db->select('nombre')->where('id_p_a',$id_pat)->get('patients_appointments')->row('nombre');
$centro=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');
$link='href="'.base_url().'printing/ver_email_refra/'.$id_ref.'"';
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;'>
<h1>¡Hola!</h1>
El Doctor <strong>$doctor ($area)</strong>
Del <strong>Centro $centro</strong> está haciendo una solicitud de lentes, Para el <strong>paciente $patient</strong>, <br/>
<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' $link >VER REFRACCION</a>

</body>
</html>";
$this->load->library('email', $config);

$sql="select correo, name from users where perfil ='Técnico de lentes'";
$query = $this->db->query($sql);

Foreach($query->result() as $mailto) {
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($mailto->correo);// change it to yours
$this->email->subject("Solicitud de lentes a $mailto->name");
$this->email->message($msg);
$this->email->send();
}

$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("admedicall@gmail.com,dre_fernandez@hotmail.com");// change it to yours
$this->email->subject("Solicitud de lentes");
$this->email->message($msg);
$this->email->send();


}








public function saveUpOfatalRef(){
$vision_sencilla= $this->input->post('vision-sencilla2');
$vision_sencilla1 = (isset($vision_sencilla)) ? 1 : 0;

$flat_top= $this->input->post('flat-top2');
$flat_top1 = (isset($flat_top)) ? 1 : 0;

$invisibles= $this->input->post('invisibles2');
$invisibles1 = (isset($invisibles)) ? 1 : 0;

$progresivos= $this->input->post('progresivos2');
$progresivos1 = (isset($progresivos)) ? 1 : 0;

$antirreflejos= $this->input->post('antirreflejos2');
$antirreflejos1 = (isset($antirreflejos)) ? 1 : 0;

$policarbonatos= $this->input->post('policarbonatos2');
$policarbonatos1 = (isset($policarbonatos)) ? 1 : 0;

$transitions= $this->input->post('transitions2');
$transitions1 = (isset($transitions)) ? 1 : 0;

$foto_croma= $this->input->post('foto_croma2');
$foto_croma1 = (isset($foto_croma)) ? 1 : 0;

$data= array(
'od_espera_r'=> $this->input->post('od_espera_re1'),
 'od_espera'=> $this->input->post('od_esperae'),
'od_cilindro'=> $this->input->post('od_cilindroe'),
'od_cilindro_r'=> $this->input->post('od_cilindro_re1'),
'eje_od'=> $this->input->post('eje_ode'),
'add_od'=> $this->input->post('add_ode'),
'espera_os'=> $this->input->post('os_esperae'),
'os_espera_r'=> $this->input->post('os_espera_re1'),
'cilindro_os'=> $this->input->post('os_cilindroe'),
'os_cilindro_r'=> $this->input->post('os_cilindro_re1'),
'eje_os'=> $this->input->post('eje_ose'),
'add_os'=> $this->input->post('add_ose'),
'vision_sencilla'=> $vision_sencilla1,
'flat_top'=> $flat_top1,
'invisibles'=> $invisibles1,
'progresivos'=> $progresivos1,
'antirreflejos'=> $antirreflejos1,
'policarbonatos'=> $policarbonatos1,
'transitions'=> $transitions1,
'foto_croma'=> $foto_croma1,
'd_prf'=> $this->input->post('d-prf2'),
'altura_mm'=> $this->input->post('altura-mm2'),
'ref_observaciones'=> $this->input->post('ref-observaciones2')
);

$where = array(
'id' =>$this->input->post('id-of-ref')
);
$this->db->where($where);
$this->db->update("h_c_of_refracion",$data);


}




public function oftalRef($hist,$user,$centro){
	$data['user_id']=$user;
	$data['id_historial']=$hist;
	$data['centro']=$centro;
	$data['perfil']=$this->db->select('perfil')->where('id_user',$user)->get('users')->row('perfil');
	$this->load->view('admin/historial-medical1/oftalmologia/registro-separado', $data);
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







public function import_rates()
	{
		$id_user=$this->uri->segment(3);
		$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
		$data['name'] = $user['name'] ;
		$data['perfil'] = $user['perfil'] ;
		$data['id_user'] = $id_user ;
        $id_area=$this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
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
if($idp){
//$this->model_admin->delete_input($idp);
$inputname = $this->input->post('inputname');
$inputf = $this->input->post('inputf');

//--------------------------------------------
$photo_location = $this->input->post('photo_location');
if($photo_location==2)
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



//-----------------------------------------------------------------//

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
if($this->input->post('seguro_medico')==11){
 $this->db->query("DELETE FROM saveinput WHERE patient_id=$idp");	
}
//$this->db->query("DELETE t1 FROM saveinput t1, saveinput t2 WHERE t1.id < t2.id AND t1.inputf = t2.inputf AND t1.patient_id =$idp");
$this->db->query("DELETE FROM saveinput WHERE input_name=''");
 $msg = "<div  style='text-align:center;font-size:20px;color:green' id='deletesuccess'>Cambio ha sido hecho con exito .</div>";
$this->session->set_flashdata('save_patient_success', $msg);
redirect($_SERVER['HTTP_REFERER']);
}else{
	
echo "<p style='text-align:center;color:red;font-size:40px'>ERROR</p>";	


}
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
	if($this->input->post('seguro_medico')==11){
	$plan=0;
}else{
$plan=$this->input->post('plan');

}
$controller=$this->input->post('controller');
$query = $this->db->get_where('patients_appointments',array('nombre'=>$this->input->post('nombre'),'date_nacer'=>$this->input->post('date_nacer'),'tel_cel'=>$this->input->post('tel_cel')));
if($query->num_rows() > 0){
$data['controller']="admin";
$this->load->view('admin/pacientes-citas/duplicate_patient_padron', $data);
} else{
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
 $rules = array(
 array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required',
				
            ),
            array(
                'field' => 'seguro_medico',
                'label' => 'seguro medico',
                'rules' => 'required'
            )
            /*,
            array(
                'field' => 'email_address',
                'label' => 'Email Address',
                'rules' => 'required'
            )*/
        );

        $this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/pacientes-citas/create-cita-content');		
			
		} else{

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
 'plan'  => $plan,
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

$this->session->set_userdata('sessionIdPatient',$id_pat);
 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);
//------------------------------------------------------------

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
if($this->input->post('orientation')==0){
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' =>$this->input->post('especialidad'),
'doctor' =>$this->input->post('doctor'),
'id_patient' => $id_pat,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' =>$dayNumber,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1,
'cancelar' =>0
   );
$id_rdv =$this->model_admin->save_rendevous($save2);
$this->session->set_userdata('sessionIdNewCitaAgain', $id_rdv);

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

redirect("$controller/gh0rtgkrr4g5");
}


//------HOSPITALIZACION----------------------------------------------------------------
if($this->input->post('orientation')==3){
 $savedas = array(
'centro'=> $this->input->post('hosp_centro'),
'esp'  => $this->input->post('hosp_esp'),
'doc'=> $this->input->post('hosp_doctor'),
'causa' =>$this->input->post('hosp_causa'),
'via' =>$this->input->post('hosp_ingreso'),
'id_patient' => $id_pat,
'sala' => $this->input->post('hosp_sala'),
'servicio' => $this->input->post('hosp_servicio'),
'cama' => $this->input->post('hosp_cama'),
'hosp_auto' => $this->input->post('hosp_auto'),
'hosp_auto_por' => $this->input->post('hosp_auto_por'),
'inserted' => $this->input->post('creadted_by'),
'updated' => $this->input->post('creadted_by'),
'timeinserted' => $insert_date,
'timeupdated' => $insert_date,
'cancelar' =>0
   );
$this->db->insert("hospitalization_data",$savedas);

//------------------------------------------------------------------------------------------------
 $id_user=$this->input->post('creadted_by');
redirect("hospitalizacion/hospitalizacion_list/$id_pat/$id_user");
}



elseif($this->input->post('orientation')==2){

//-------------------------------SAVE EMERGENCIA DATA------------------------------------------------
$query1 = $this->db->get_where('emergency_adm_data',array('id_em_c'=>$this->input->post('em_name')));
if($query1->num_rows() == 0)
{
$save = array(
'em_name'=>$this->input->post('em_name'),
'id'=>1
);
$this->db->insert("emergency_adm_data",$save);
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
}

if($this->input->post('enviado_a')==1){
	$go_to="triaje";
}else{
$go_to="Emergencia General";	
}
$save = array(
'id_pat'=>$id_pat,
'centro'=>$this->input->post('emergencia-centro'),
'causa'=>$this->input->post('em_name'),
'paciente_referido_por'=>$this->input->post('paciente_referido'),
'medio_de_llegado'=>$this->input->post('medio_llegado'),
'enviado_a'=>$this->input->post('enviado_a'),
'enviado_name'=>$go_to,
'estado_de_paciente'=>$this->input->post('estado_paciente'),
'inserted_by'=>$this->input->post('creadted_by'),
'update_by'=>$this->input->post('creadted_by'),
'created_date'=>date("Y-m-d"),
'create_time'=>date("H:i:s"),
'update_date'=>date("Y-m-d"),
'update_time'=>date("H:i:s")
);
$this->db->insert("emergency_patients",$save);
$enviado_a=$this->input->post('enviado_a');
$id_pat_emergencia= $id_pat;
$iduser=$this->input->post('creadted_by');
redirect("emergency/emergency_patient/$enviado_a/$id_pat_emergencia/$iduser");

}

else{
$this->session->set_userdata('id_cm',$this->input->post('factura-centro'));
$this->session->set_userdata('id_d',$this->input->post('facturar-doc'));
$this->session->set_userdata('id_p_a',$id_pat);
$this->session->set_userdata('id_seg',$this->input->post('seguro_medico'));
redirect("$controller/redirect_fac");
}
		}
}
}




public function gh0rtgkrr4g5(){

/*
if( !isset($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], "admin_medico/save_patients_appointments") === -1 ) {
    $this->load->helper('url');
    redirect('/page404');
}	*/
if(empty($this->session->userdata['sessionIdPatient']))	{
redirect('/page404');
}

$idpatient=$this->session->userdata['sessionIdPatient'];
$data['idpatient']=$idpatient;
$data['patid']=$idpatient;

$patient=$this->db->select('nombre,nec1,photo,ced1,ced2,ced3')->where('id_p_a',$idpatient)->get('patients_appointments')->row_array();
$data['nombre']=$patient['nombre'];
$data['nec']=$patient['nec1'];
$data['photo']=$patient['photo'];
$data['ced1']=$patient['ced1'];
$data['ced2']=$patient['ced2'];
$data['ced3']=$patient['ced3'];
$perfil=$this->db->select('perfil')->where('id_user',$this->session->userdata['id_user'])->get('users')->row('perfil');
$data['perfil']=$perfil;
$data['id_dd']=$this->session->userdata['sessionIdDocNewCita'];
$data['id_cm']=$this->session->userdata['sessionIdCentNewCita'];
$data['id_rdv']=$this->session->userdata['sessionIdNewCitaAgain'];
$data['id_seguro']=$this->session->userdata['sessionIdSegNewCita'];
$data['centro_type']=$this->session->userdata['sessionCentroTypeSeguroNewCitaAgain'];


$query  = $this->model_admin->RendezVous($idpatient);
		$val = array(
       'doctor'=>$this->session->userdata['sessionIdDocNewCita'],
	   'id_patient' => $idpatient
	   );
$query_doc  = $this->model_admin->RendezVousDoc($val);
if($perfil=="Admin"){
	$data['area']=0;
$data['is_admin']="yes";
$data['number_cita']=count($query);
$this->load->view('admin/pacientes-citas/header_cita',$data);
} else {
	$data['area']=$this->db->select('area')->where('id_user',$this->session->userdata['id_user'])->get('users')->row('area');
	$data['is_admin']="no";
	$data['number_cita']=count($query_doc);
$this->load->view('medico/header', $data);
}
$this->load->view('admin/pacientes-citas/tutor/124gh0rtgkrr4g5',$data);
$data['id_usr']=$this->session->userdata['id_user'];
$this->load->view('admin/footer',$data);
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


  // $query = $this->db->get_where('pre_tutor',array('id_nino'=>$id_pat));
   // foreach ($query->result() as $row) {
        //  $this->db->insert('tutor',$row);
    //}
//remove from pre tutor
  //  $this->model_admin->DeletePreTutor($id_pat);



 $saveN = array(
'nec1'  => "NEC-$id_pat"
);

$this->model_admin->insert_nec($id_pat,$saveN);

 //------------------------Save cita----------------------------
 $dayNumber=$this->db->select('id')->where('title',$this->input->post('weekday'))->get('diaries')->row('id');
 $filter_date1 = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
 $save2 = array(
'nec'=> "NEC-$id_pat",
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'),
'id_patient' => $id_pat,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' => $dayNumber,
'update_by' => $this->input->post('id_user'),
'inserted_by' => $this->input->post('id_user'),
'cancelar' =>0,
'created_time' => $insert_date,
'update_time' => $insert_date,
'filter_date' => $filter_date1
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

	redirect('admin_medico/gh0rtgkrr4g5');
//redirect('admin_medico/redirect_after_save_cita');
}
}

 public function add_new_cita()
{
//var_dump($this->input->post());
$dayNumber=$this->db->select('id')->where('title',$this->input->post('fecha_filter'))->get('diaries')->row('id');
$nec=$this->input->post('nec');
$idpatient=$this->input->post('id_patient');
$iddoc=$this->input->post('doctor');
$seguro_id=$this->input->post('seguro_id');
$id_cm=$this->input->post('centro_medico');
$filter_date = date("Y-m-d", strtotime($this->input->post('fecha_propuesta')));
$this->session->set_userdata('sessionIdPatient', $idpatient);
$this->session->set_userdata('sessionIdDocNewCita', $iddoc);
$this->session->set_userdata('sessionIdCentNewCita', $id_cm);
$this->session->set_userdata('sessionIdSegNewCita', $seguro_id);
$centro_type=$this->db->select('type')->where('id_m_c',$id_cm)->get('medical_centers')->row('type');
$this->session->set_userdata('sessionCentroTypeSeguroNewCitaAgain', $centro_type);
$insert_date=date("Y-m-d H:i:s");
$save2 = array(
'nec'=> $this->input->post('nec'),
'causa'  => $this->input->post('causa'),
'centro'=> $this->input->post('centro_medico'),
'area' => $this->input->post('especialidad'),
'doctor' => $this->input->post('doctor'),
'id_patient' =>$idpatient,
'fecha_propuesta' => $this->input->post('fecha_propuesta'),
'weekday' => $dayNumber,
'created_time' => $insert_date,
'update_time' => $insert_date,
'update_by' => $this->input->post('creadted_by'),
'inserted_by' => $this->input->post('creadted_by'),
'filter_date' =>$filter_date,
'confirmada' =>0,
'cancelar' =>0
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

//redirect("admin_medico/redirect_after_save_cita");

}


public function redirect_after_save_cita()
{

if(empty($this->session->userdata['sessionIdPatient']))	{
redirect('/page404');
}
$id_user=$this->session->userdata['id_user'];
$id_doc=$this->session->userdata['sessionIdDocNewCita'];
$data['id_rdv']=$this->session->userdata['sessionIdNewCitaAgain'];
$data['is_historial']="";
$data['id_user'] = $id_user ;
$data['doc'] = '';
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
	$data['area']=$this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	$data['is_admin']="no";
	$data['number_cita']=count($query_doc);
$this->load->view('medico/header', $data);
}
$patient_admitas= $this->model_emergencia->emergency_patient($last_patient_id);
$data['number_patient_admitas']=count($patient_admitas);
$data['GET_NAMEF']= $this->model_admin->GET_NAMEF($last_patient_id);
//$this->load->view('admin/pacientes-citas/search_patient',$data);
$this->load->view('admin/pacientes-citas/patient', $data);
$this->load->view('medico/pacientes-citas/after-cita-save-again',$data);


}


public function PatientName()
{
$executionStartTime = microtime(true);
$user_id=$this->input->post('id_user');
$data['user_id']=$user_id;
$perfil= $this->db->select('perfil')->where('id_user',$user_id)->get('users')->row('perfil');
$data['perfil']=$perfil;

if($perfil=="Admin"){
	$cont="admin";	
	} else{
	$cont="medico";	
	}




$nombre=$this->input->post('patient_nombres');
$patient_apellido=$this->input->post('patient_apellido');
$patient_apellido2=$this->input->post('patient_apellido2');

$this->session->set_userdata('nombre_pd', $nombre);
$this->session->set_userdata('patient_apellido', $patient_apellido);
$this->session->set_userdata('patient_apellido2', $patient_apellido2);


$val1="$nombre $patient_apellido $patient_apellido2";

$val = array(
  'patient_nombres'=>$nombre,
  'patient_apellido'=>$patient_apellido,
  'patient_apellido2'=>$patient_apellido2
  );

$query_padron = $this->padron_model->getPatientNameOnSelectPad($val);
$query_padron_c=count($query_padron);
 if($query_padron_c > 0 ){
  
	//$this->padron_name_result($val); 
	 $executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['patient_padron']=$query_padron;
$data['base']="Padron";
$data['number_found']=count($query_padron);

$data['now'] =number_format($now,3);
$data['names']=$val;
$this->load->view('admin/pacientes-citas/search-patient-result-padron-by-name', $data);
  }
 else if ($query_padron_c==0)
 {
$query_admedicall = $this->model_admin->findPatientByNombre($nombre,$patient_apellido,$patient_apellido2);
$data['patient_admedicall']=$query_admedicall;
$data['base']="Admedicall";
$data['number_found']=count($query_admedicall);
$executionEndTime = microtime(true);
$now = $executionEndTime - $executionStartTime;
$data['now'] =number_format($now,3);
$this->load->view('admin/pacientes-citas/search-patient-result-nec', $data);
 
 }
 
 
else{
$no_patient_name_found = "<div  style='text-align:center;color:red' >No hemos encuentrado <b><i>$val1</i></b></div>";
$create ="<h2 class='h2' style='text-align:center' ><a class='btn btn-primary btn-sm' href='".site_url()."$cont/create_cita'  >Crear Nueva Cita</a></h2>";

echo $no_patient_name_found;
echo $create;

}
}


  public function ajax_list_padron_search_name(){
   $this->padron_model = $this->load->database('padron',TRUE);
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
		
		$nombres=$this->input->post("patient_nombres");
      $patient_apellido=$this->input->post("patient_apellido");
       $patient_apellido2=$this->input->post("patient_apellido2");
	   
	   $names = array(
  'patient_nombres'=>$nombres,
  'patient_apellido'=>$patient_apellido,
  'patient_apellido2'=>$patient_apellido2
     );

        $search = $search['value'];
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
        $valid_columns = array(
            
            6=>'FECHA_NAC',
        );
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }
        if($order !=null)
        {
            $this->padron_model->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->padron_model->like($sterm,$search);
                }
                else
                {
                    $this->padron_model->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		$this->padron_model->where('NOMBRES',$nombres);
		$this->padron_model->where('APELLIDO1',$patient_apellido);
		if($patient_apellido2 !=""){
		$this->padron_model->where('APELLIDO2',$patient_apellido2);	
		}
        $this->padron_model->limit($length,$start);
        $employees = $this->padron_model->get("padron");
        $data = array();
        foreach($employees->result() as $rows)
        {
$img='';
            $data[]= array(
                $img,
                $rows->NOMBRES,
                $rows->APELLIDO1,
                $rows->APELLIDO2,
                $rows->FECHA_NAC,
                
                '<a href="#" class="btn btn-warning mr-1">Edit</a>'
            );     
        }
        $total_employees = $this->totalNamesFound($names);
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
    public function totalNamesFound($names)
    { 
		if($names['patient_apellido2'] ==""){
		$query = $this->padron_model->select("COUNT(*) as num")->where('NOMBRES',$names['patient_nombres'])->where('APELLIDO1',$names['patient_apellido'])->get("padron");
		}else{
		$query = $this->padron_model->select("COUNT(*) as num")->where('NOMBRES',$names['patient_nombres'])->where('APELLIDO1',$names['patient_apellido'])->where('APELLIDO2',$names['patient_apellido2'])->get("padron");	
		}
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }


public function get_patient_cedula()
{

$user_id=$this->input->get('id_user');
$data['user_id']=$user_id;

$executionStartTime = microtime(true);
$ced1=$this->input->get('patient_cedula1');
$ced2=$this->input->get('patient_cedula2');
$ced3=$this->input->get('patient_cedula3');
$condition = array(
  'MUN_CED' => $ced1,
  'SEQ_CED' => $ced2,
  'VER_CED' => $ced3
  );
  $ced="$ced1$ced2$ced3";

$patient_cedula2 = $this->input->get('patient_cedula2');
$query_admedicall = $this->model_admin->getPatientCedulaAd($ced);
$query_padron = $this->padron_model->getPatientCedulaPad($condition);
$photo=$this->padron_model->getPhoto($condition);
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
$data['patient_padron']=$query_padron;
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
$data['origine']=$this->input->get('origine');
$data['val1']=$this->model_admin->Diag_pres($value1);
$this->load->view('admin/historial-medical1/conclusion/cied', $data);


}



 public function showPatientMedicaPedia(){
$data['hist_id']=$this->input->get('id_pat');
$data['medica']= $this->input->get('medica');
$data['part']= $this->input->get('part');
$data['user_id']= $this->input->get('user_id');
$data['medicamentos']=$this->model_admin->search_medic($this->input->get('medica'));
$this->load->view('admin/historial-medical1/search_medica_ped', $data);
}


 public function showPatientMedica(){
$data['hist_id']=$this->input->get('id_pat');
$data['medica']= $this->input->get('medica');
$data['part']= $this->input->get('part');
$data['user_id']= $this->input->get('user_id');
$data['medicaTime']= $this->input->get('medicaTime');
$data['medicamentos']=$this->model_admin->search_medic($this->input->get('medica'));
$this->load->view('admin/historial-medical1/search_medica', $data);
}


 public function saveNewMed(){
$medicine=$this->input->post('medPat');

foreach ($medicine as $key=>$med) {
  $savecd = array(
  'medicine'=> $med,
'id_patient' => $this->input->post('id_pat'),
'part' => $this->input->post('part'),
'user_id' =>$this->input->post('user_id')
  );

$this->model_admin->SaveMedicine($savecd);
}

}





  public function DeleteMedHab(){

$id= $this->input->post('id');

$where= array(
'id' =>$id
);

$this->db->where($where);
$this->db->delete('h_c_patient_medicine');
}




 public function loadPatientMedicine(){

$hist_id=$this->input->post('hist_id');
$data['part']="gnl";
$data['hist_id']=$hist_id;
$data['user_id']=$this->input->post('user_id');
$sql="select * from h_c_patient_medicine where id_patient =$hist_id and part='gnl'";
$query = $this->db->query($sql);
$data['medicamentos']=$query->result();
$this->load->view('admin/historial-medical1/show-patient-medica', $data);
}



  public function loadPatientMedicinePed(){

$hist_id=$this->input->post('hist_id');
$data['hist_id']=$hist_id;
$data['user_id']=$this->input->post('user_id');
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
	'part' => $this->input->post('part'),
	'user_id' =>$this->input->post('user_id')
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

if($this->input->post('deleteCied')==1){
$save= array(
  // 'id_linkd'=> $last_id,
  'id_ce10'=> $this->input->post('cie10'),
  'id_p'=>$this->input->post('id_pat'),
  'id_doc'=>$this->input->post('user_id'),
  'id_cm'=>$this->input->post('centro_medico'),
  'origine'=>$this->input->post('origine')

);
$this->db->insert("hc_save_cied_doc",$save);

}
 else {
$where = array(
  'id_ce10'=> $this->input->post('cie10'),
  'id_p'=>$this->input->post('id_pat'),
  'id_doc'=>$this->input->post('user_id'),
  'id_cm'=>$this->input->post('centro_medico'),
  'origine'=>$this->input->post('origine')
);

$this->db->where($where);
$this->db->delete('hc_save_cied_doc');

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
  'user_id'=> $this->input->post('user_id'),
  'emergency'=> $this->input->post('emergency_id')

  );
$this->model_admin->SaveFormIndicacionesLab($save);

}


public function SaveFormIndicacionesLabGroupo(){
$labCheckded = $this->input->post('lab');
$operatorl = $this->input->post('operatorl');
$historial_id = $this->input->post('historial_id_l');

foreach ($labCheckded as $key=>$id) { 
$save = array(
  'laboratory'  => $id,
  'operator'=> $this->input->post('operatorl'),
  'historial_id' => $historial_id,
 'insert_time'=>date("Y-m-d H:i:s"),
 'updated_by'=> $this->input->post('operatorl'),
 'updated_time'=>date("Y-m-d H:i:s"),
  'printing'=>1,
  'user_id'=> $this->input->post('user_id'),
  'emergency'=> $this->input->post('emergency_id')

  );
$this->model_admin->SaveFormIndicacionesLab($save);
}
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
'cobertura' => $this->input->post('cobert'),
'idemlab' => $this->input->post('id_em'),
'cantidad' => $this->input->post('cantidad'),
'descuento' => $this->input->post('descuento')

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
  'user_id'=> $this->input->post('user_id')

  );
$this->db->insert("orden_medcia_lab",$save);

$where = array(
 'laboratory'=>$this->input->post('lab'),
  'user_id'=>$this->input->post('user_id'),
   'historial_id' =>$this->input->post('historial_id_l'),
    'printing'=>$this->input->post('printing')
 
);

$this->db->where($where);
$this->db->delete('orden_medcia_lab');

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

}



//-----------------------------------------------------------------------------------------------------------------------


public function DeletePatCied(){
 $this->model_admin->DeletePatCied($this->input->post('id'));

}


public function patientCie10()

{
 $patient_cie10=$this->model_admin->show_diagno_def($this->input->post('id_con_d'),$this->input->post('origine'));
  $data['patient_cie10']=$patient_cie10;
   $data['count_patient_cie10']=count($patient_cie10);
$this->load->view('admin/historial-medical1/conclusion/patient_cie10', $data);
}



 public function edit_recetas_or_med(){
$id=$this->uri->segment(3);
$sql ="SELECT * FROM orden_medica_recetas where id_i_m=$id";
$query = $this->db->query($sql);
$data['edit_recetas'] = $query;
$data['medicamentos'] = $this->model_admin->medicamentos();
$data['presentacion'] = $this->model_admin->Presentacion();
$data['branches'] = $this->model_admin->branches();
$data['via'] = $this->model_admin->via();
$data['frecuencia'] = $this->model_admin->frecuencia();
$data['farmacia'] = $this->model_admin->farmacia();
$data['id_user'] =$this->uri->segment(4);
$data['direction']=$this->uri->segment(5);
$this->load->view('admin/historial-medical1/orden-medica/recetas/edit_recetas', $data);
}


 public function edit_medida_gnl(){
$id=$this->uri->segment(3);
$sql ="SELECT * FROM ord_med_med_gen where idem=$id";
$query = $this->db->query($sql);
$data['edit'] = $query;

$data['id_user'] =$this->uri->segment(4);
$this->load->view('admin/historial-medical1/orden-medica/edit_medida_gnl', $data);
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
$this->db->update("ord_med_med_gen",$update);

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

 public function edit_estudios_or_med(){
$data['estudios'] = $this->model_admin->estudios();
$data['cuerpo'] = $this->model_admin->cuerpo();
$id=$this->uri->segment(3);
$sql ="SELECT * FROM orden_medica_estudios where id_i_e=$id";
$query = $this->db->query($sql);
$data['edit_estudios'] = $query;
$data['id_user'] =$this->uri->segment(4);
$data['direction'] =$this->uri->segment(5);
$this->load->view('admin/historial-medical1/orden-medica/estudios/edit_estudios', $data);

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
	$centro=$patient['centro_medico'];
	$data['numauto']=$patient['numauto'];
	$data['centro']=$centro;
     $data['desde']=$this->input->get('dess');
	$data['hasta']= $this->input->get('hass');
	$data['medico']=$this->input->get('medico');
	$data['id_patient']=$id_patient;
$data['show_diagno_pat'] = $this->model_admin->show_diagno_pat_audit($id_patient,$this->input->get('medico'),$centro);
$data['get_patient_historial'] = $this->model_admin->get_patient_historial($this->input->get('dess'),$this->input->get('hass'),$this->input->get('medico'),$id_patient,$centro);
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
public function exportCSVbill1(){
$data['users'] = $this->model_admin->Users();
$this->load->view('admin/historial-medical1/show-patient-medica-medT.php', $data);
}

// Export data in CSV format
  public function exportCSVbill(){
   // file name
   $filename = 'users_'.date('Ymd').'.csv';
   header("Content-Description: File Transfer");
   header("Content-Disposition: attachment; filename=$filename");
   header("Content-Type: application/csv; ");

   // get data
   $usersData = $this->model_admin->exportCSVbill();

   // file creation
   $file = fopen('php://output', 'w');

   $header = array("id_user","name","last_name","username", "password","perfil","correo","exequatur","cell_phone","extension","cedula","area","user_ars","insert_date","update_date","status","codigo_seguriad","inserted_by","updated_by","is_log_in","login_time","id_as_m_med","plazo");
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){
     fputcsv($file,$line);
   }
   $this->db->empty_table('users');
   fclose($file);
   exit;

  }



   public function exportDocPatients($id){
     // file name
   $filename = 'users_'.date('Ymd').'.csv';
   header("Content-Description: File Transfer");
   header("Content-Disposition: attachment; filename=$filename");
   header("Content-Type: application/csv; ");

   // get data
   $usersData = $this->model_medico->getMedicoAp($id);

   // file creation
   $file = fopen('php://output', 'w');

   $header = array("id_user","name","last_name","username", "password","perfil","correo","exequatur","cell_phone","extension","cedula","area","user_ars","insert_date","update_date","status","codigo_seguriad","inserted_by","updated_by","is_log_in","login_time","id_as_m_med","plazo");
   fputcsv($file, $header);
   foreach ($usersData as $key=>$line){
     fputcsv($file,$line);
   }
   fclose($file);
   exit;

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
$medico2=$this->db->select('id_user')->where('exequatur',$input_val)->get('users')->row('id_user');
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
$medico2=$this->db->select('id_user')->where('cedula',$input_val)->get('users')->row('id_user');
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
$data['controller']=$this->input->post('controller');
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


public function save_hist_tarif_pro(){
$user_id =$this->input->post('user_id');
$patient =$this->input->post('id_historial');
$id_cd =$this->input->post('id_cd');	
$data['patient']=$patient;
$data['user_id']=$user_id;
$data['id_cd']=$id_cd;	
$save = array(
'id_tarif' =>$this->input->post('id_tarif'),
'patient' =>$patient,
'user' =>$user_id,
'time_created' =>date("Y-m-d H:i:s"),
'id_cd'=>$id_cd
);
$this->db->insert("h_c_procedimiento_tarif",$save);

 $sql= "SELECT * FROM h_c_procedimiento_tarif WHERE patient=$patient AND user=$user_id AND id_cd=$id_cd ORDER BY id DESC";
$data['query']= $this->db->query($sql);
$this->load->view('admin/historial-medical1/conclusion/h_c_procedimiento_tarif', $data);
}



public function loadProcedimientoFacData(){
$id_cd =$this->input->post('id_cd');	
$user_id =$this->input->post('user_id');
$patient =$this->input->post('patient');	
$data['patient']=$patient;
$data['user_id']=$user_id;		
$data['id_cd']=$id_cd;	
 $sql= "SELECT * FROM h_c_procedimiento_tarif WHERE id_cd=$id_cd";
$data['query']= $this->db->query($sql);
$this->load->view('admin/historial-medical1/conclusion/h_c_procedimiento_tarif', $data);
}




public function deleteFacProc()
{
$where = array(
 'id'   =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('h_c_procedimiento_tarif');
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
$examenFisico=$this->model_admin->ExamFisico($historial_id);
$data['examenFisico']=$examenFisico;
$data['examenFisicoCount']=count($examenFisico);
$birthday=$this->db->select('date_nacer_format')->where('id_p_a',$historial_id)->get('patients_appointments')->row('date_nacer_format');
//----------
  $diff = date_diff(date_create(), date_create($birthday));
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
//------------
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





 public function show_ant_alergia(){
$id= $this->uri->segment(3);
$id_user=$this->uri->segment(4);
$data['id_user']=$id_user;
$user=$this->db->select('name,perfil')->where('id_user',$id_user)->get('users')->row_array();
$data['user']=$id_user;
$data['perfil']=$user['perfil'];
$sql ="SELECT * FROM  h_c_ant_alergista  WHERE id=$id";
$data['val'] = $this->db->query($sql);
$this->load->view('admin/historial-medical1/alergista/data', $data);

}








public function get_fac_ars1()
{
$data['id_user']= $this->input->get('id_user');
$desde = $this->input->get('desde');
$hasta = $this->input->get('hasta');
$areas = $this->input->get('areas');
$medico = $this->input->get('medico');
$centro = $this->input->get('centro');
$patient = $this->input->get('patient');
if($patient !=""){
$data['patient']=$patient;
}else{
$data['patient']=0;
}

$seguro_medico = $this->input->get('ars');
$data['desde']=$desde;
$data['hasta']=$hasta;
 $data['area']=$areas;
$data['centro']=$centro;
$data['seguro_medico']=$seguro_medico;
if($medico=="" && $patient =="" && $centro !=""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico AND centro_medico= $centro AND area=$areas";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND center_id = $centro AND area_id=$areas AND seguro_medico=$seguro_medico";

}else if($areas=="" && $patient =="" && $centro !=""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico AND centro_medico= $centro AND medico=$medico";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND center_id = $centro AND medico=$medico AND seguro_medico=$seguro_medico";

}

else if($centro =="" && $medico=="" && $areas !=""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico AND area=$areas";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND area_id=$areas AND seguro_medico=$seguro_medico";

}

else if($centro =="" && $medico !="" && $areas !=""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico AND area=$areas AND medico=$medico";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND area_id=$areas AND seguro_medico=$seguro_medico AND medico=$medico";

}

else if($centro =="" && $medico !="" && $areas ==""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico  AND medico=$medico";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico=$seguro_medico AND medico=$medico";

}


else if($centro !="" && $medico !="" && $areas !=""){

$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico= $seguro_medico  AND medico=$medico AND centro_medico= $centro ";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND  seguro_medico=$seguro_medico AND medico=$medico AND center_id= $centro ";

}



 else if($medico=="" && $areas=="" && $patient !="" && $centro !="") {
$data['condition_fac'] = "filter_date BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND paciente = $patient AND centro_medico= $centro";
$data['condition_inv'] = "fecha BETWEEN " . "'" . $desde . "'" . " AND " . "'" . $hasta. "' AND paciente = $patient AND center_id= $centro";

}


$data['is_admin']= $this->input->get('is_admin');
$this->load->view('admin/billing/invoice_ars_claim/get_fac_ars', $data);
}

public function editCancelFacArc($id,$is_admin,$id_user,$desde,$hasta,$id_patient)
{
$data['ncf_id'] =$id;
$data['is_admin'] =$is_admin;
$data['id_user'] =$id_user;
$data['desde'] =$desde;
$data['hasta'] =$hasta;
$data['id_patient'] =$id_patient;
$this->load->view('admin/billing/invoice_ars_claim/editCancelFacArc', $data);
}


public function get_centro_medico()
{
$id_centro=$this->input->post('id_centro');
if($id_centro !=NULL){

for ($i = 0; $i < count($id_centro); ++$i ) {
    $idcentro = $id_centro[$i];
	$sql ="SELECT id_doctor,id_centro FROM doctor_agenda_test WHERE id_centro =$idcentro group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
$centro= $this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
	echo '<option value="'.$row->id_doctor.'">Dr '.$name.' - Centro '.$centro.'</option>';
 }
}
}
}




public function get_medico_as_centro()
{
$id_user=$this->input->post('id_user');
$sql ="SELECT id_doctor FROM centro_doc_as WHERE id_asdoc =$id_user group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
	echo '<option value="'.$row->id_doctor.'">Dr '.$name.'</option>';
}
}








public function get_centro_medico_cita()
{
echo "<option value=''>Seleccione Un Medico</option>";
$id_centro=$this->input->post('id_centro');
$sql ="SELECT id_doctor FROM doctor_agenda_test WHERE id_centro =$id_centro group by id_doctor";
 $query= $this->db->query($sql);
 foreach ($query->result() as $row){
	 $asdoc= $this->db->select('id_doctor')->where('id_doctor',$row->id_doctor)->get('centro_doc_as')->row('id_doctor');


$name= $this->db->select('name')->where('id_user',$asdoc)->get('users')->row('name');
	echo "<option value='$asdoc'>$name</option>";
 }

}




public function invoiceAcArea()
{
$id_user=$this->input->get('id_user');
$hasta=$this->input->get('hasta');
$desde=$this->input->get('desde');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$sql ="SELECT area FROM factura2 WHERE seguro_medico !=11  GROUP BY area";
 $query= $this->db->query($sql);
} else if($perfil=="Medico"){
$sql ="SELECT area FROM factura2 WHERE seguro_medico !=11  AND medico=$id_user GROUP BY area";
 $query= $this->db->query($sql);
} else{
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$sql ="SELECT area FROM factura2 WHERE seguro_medico !=11 AND centro_medico=$as_medico_centro GROUP BY area";
 $query= $this->db->query($sql);
}
 echo '<option value="" ></option>';
foreach ($query->result() as $row){
$area=$this->db->select('title_area')->where('id_ar',$row->area)
->get('areas')->row(('title_area'));
echo '<option value="'.$row->area.'">'.$area.'</option>';
}
}


public function invoiceARS()
{
$id_user=$this->input->get('id_user');
$hasta=$this->input->get('hasta');
$desde=$this->input->get('desde');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$sql ="SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY seguro_medico";
 $query= $this->db->query($sql);
} else if($perfil=="Medico"){
$sql ="SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' AND medico=$id_user GROUP BY seguro_medico";
 $query= $this->db->query($sql);
}else{
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$sql ="SELECT seguro_medico FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta'  GROUP BY seguro_medico";
 $query= $this->db->query($sql);
}
 echo '<option value="" ></option>';
foreach ($query->result() as $row){
$seguro=$this->db->select('title')->where('id_sm',$row->seguro_medico )
->get('seguro_medico')->row('title');
echo '<option value="'.$row->seguro_medico.'">'.$seguro.'</option>';
}
}


public function invoiceCentro()
{
$id_user=$this->input->get('id_user');
$hasta=$this->input->get('hasta');
$desde=$this->input->get('desde');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$sql ="SELECT centro_medico FROM factura2  WHERE seguro_medico !=11  GROUP BY centro_medico";
 $query= $this->db->query($sql);
} else if($perfil=="Medico"){
$sql ="SELECT centro_medico FROM factura2 WHERE seguro_medico !=11  AND medico=$id_user  GROUP BY centro_medico";
 $query= $this->db->query($sql);
}else{
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$sql ="SELECT centro_medico FROM doctor_centro_medico WHERE  id_doctor=$id_user GROUP BY centro_medico";
 $query= $this->db->query($sql);

}
 echo '<option value="" ></option>';
foreach ($query->result() as $row){
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico )
->get('medical_centers')->row('name');
echo '<option value="'.$row->centro_medico.'">'.$centro.'</option>';
}
echo '$("#load-fields").hide()';
}

public function invoiceMedico()
{
$centro=$this->input->get('centro');
$area=$this->input->get('area');
$sql ="SELECT id_doctor FROM doctor_agenda_test JOIN users ON doctor_agenda_test.id_doctor=users.id_user
 WHERE id_centro=$centro AND area=$area GROUP BY id_doctor";
 $query= $this->db->query($sql);
  echo '<option value="" ></option>';
foreach ($query->result() as $row){
$name= $this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
echo '<option value="'.$row->id_doctor.'">'.$name.'</option>';
}


}

public function invoicePatient()
{
$id_user=$this->input->get('id_user');
$hasta=$this->input->get('hasta');
$desde=$this->input->get('desde');
$perfil= $this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
if($perfil=="Admin"){
$sql ="SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY paciente";
 $query= $this->db->query($sql);
} else if($perfil=="Medico"){
$sql ="SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' AND medico=$id_user  GROUP BY paciente";
 $query= $this->db->query($sql);
}else{
$as_medico_centro=$this->db->select('centro_medico')->where('id_doctor',$id_user)->get('doctor_centro_medico')->row('centro_medico');
$sql ="SELECT paciente FROM factura2 WHERE seguro_medico !=11 AND filter_date >='$desde' AND filter_date <='$hasta' GROUP BY paciente";
 $query= $this->db->query($sql);
}
 echo '<option value="" ></option>';
foreach ($query->result() as $row){
 $paciente=$this->db->select('nombre')->where('id_p_a',$row->paciente)
 ->get('patients_appointments')->row('nombre');
echo '<option value="'.$row->paciente.'">'.$paciente.'</option>';
}

}






public function get_fac_date_report()
{
	$checkval=$this->input->get('checkval');
	$centro=$this->input->get('centro');
	$doctor=$this->input->get('doctor');
	$desde=$this->input->get('desde');
	$hasta=$this->input->get('hasta');
	$perfil=$this->input->get('perfil');
	$id_user=$this->input->get('id_user');
	$data1 = array(
	'doctor' => $doctor,
	'centro' => $centro,
   'desde' => $desde,
	'hasta' => $hasta,
	'perfil' => $perfil,
    'id_user' => $id_user,
    'checkval' => $checkval
	);

	if($perfil =="Admin"){
    $data['controller']="admin";
	}else{
    $data['controller']="medico";
	}
	$data['checkval'] =$checkval;
	$data['desde'] =$desde;
	$data['hasta'] =$hasta;
	$data['perfil'] =$perfil;
	$data['id_user'] =$id_user;
	$data['centro'] =$centro;
	$data['doctor'] =$doctor;
	if($checkval=="privado"){
	 $data['title']="REPOTE DE FACTURAS PACIENTES PRIVADOS";
     $data['display']="style='display:none'";
     $data['thnum']=6;
     if($doctor==""){
	$data['display_report'] = $this->model_admin->get_fac_date_report_privado($data1);
    } else{
    $data['display_report'] = $this->model_admin->get_fac_date_report_centro_privado($data1);
    }
    }
     else {
   $data['title']="REPOTE DE FACTURAS GENERAL";
  $data['display']="";
  $data['thnum']=9;
  if($doctor==""){
	$data['display_report'] = $this->model_admin->get_fac_date_report_general($data1);
    } else{
    	$data['display_report'] = $this->model_admin->get_fac_date_report_general_centro_privado($data1);
     }
    }
	$this->load->view('admin/billing/bill/report', $data);
	 //echo json_encode ($query);
}


public function get_seguro_date_range()
{
	$seguro=$this->input->get('seguro');
	$desde=$this->input->get('desde');
	$hasta=$this->input->get('hasta');
	$centro=$this->input->get('centro');
	$data1 = array(
	'seguro' => $seguro,
    'desde' => $desde,
	'hasta' => $hasta,
	'centro' => $centro

	);
	$data['display_report'] = $this->model_admin->get_seguro_date_range($data1);
	     $data['title']="RESULTADO DEL BUSQUADOR DE FACTURAS POR RANGO DE FECHA";
		  $data['centro']=$centro;
			$data['desde']=$desde;
			$data['hasta']=$hasta;
			$data['seguro']=$seguro;
			if($seguro==11){
			$data['display']="style='display:none'";
             $data['thnum']=7;
			}else{
		   $data['display']="";
           $data['thnum']=10;
			}
		$user=$this->db->select('perfil,id_user,name')->order_by('id_user',$this->input->get('id_user'))->get('users')->row_array();

if($user['perfil']=="Admin"){
$data['admin_name']	=$user['name'];
$this->load->view('admin/header_admin',$data);
}	else{
	$this->load->view('medico/header',$data);
}
	$this->load->view('admin/billing/bill/date-patient-seguro', $data);
}


public function get_date_range_seguro_patient()
{
$id_doc=$this->input->get('id_doc');
$seguro=$this->input->get('seguro');
echo " <option value='' ></option>";
$sqlpl ="SELECT filter from factura where seguro=$seguro && medico2=$id_doc group by filter";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $row)
{
$date = date("d-m-Y", strtotime($row->filter));
echo "<option value='$row->filter'>$date</option>";
}

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
$area = $this->input->post('area');
$centro = $this->input->post('centro');
$servicio = $this->input->post('servicio');
$codigoprestado = $this->input->post('codigoprestado');
$rnc = $this->input->post('rnc');
$seguro_medico = $this->input->post('seguro_medico');
$idfacc = $this->input->post('idfacc');
$idfac2 = $this->input->post('idfac2');
$time=date("Y-m-d H:i:s");
$data= array(
'value' =>$this->input->post('ncf'),
'nota' =>$this->input->post('nota')
);
$id_ncf=$this->model_admin->ncf($data);

//=========================================================
for ($i = 0; $i < count($fecha); ++$i ) {
$f = $fecha[$i];
$ar = $area[$i];
$cent = $centro[$i];
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
$if2= $idfac2[$i];
$save= array(
'fecha' =>$f,
'paciente' =>$pa,
'num_af' =>$nf,
'numauto' =>$na,
'tsubtotal' =>$ts,
'totpagseg' =>$tp,
'totpagpa' =>$tpg,
'medico' =>$med,
'center_id' =>$cent,
'area_id' =>$ar,
'servicio' =>$serv,
'codigoprestado' =>$cod,
'rnc' =>$rn,
'seguro_medico' =>$sm,
'inserted_by' =>$this->input->post('created_by'),
'updated_by' =>$this->input->post('created_by'),
'inserted_time' =>$time,
'updated_date' =>$time,
'ncf_id' =>$id_ncf,
'id_fac2' =>$if,
'id_f' =>$if2

);
$this->model_admin->saveInvoiceArsClaim($save);
};
$this->session->set_userdata('id_ncf', $id_ncf);
$this->session->set_userdata('is_admin', $this->input->post('is_admin'));
$this->session->set_userdata('desde', $this->input->post('desde'));
$this->session->set_userdata('hasta', $this->input->post('hasta'));
$this->session->set_userdata('id_user', $this->input->post('created_by'));
$this->session->set_userdata('id_patient', $this->input->post('id_patient'));
}


public function invoice_ars_p_v()
{
$data['id_user']=$this->session->userdata['id_user'];
$id_ncf=$this->session->userdata['id_ncf'];
$data['is_admin']= $this->session->userdata['is_admin'];
$data['desde']= $this->session->userdata['desde'];
$data['id_patient']=$this->session->userdata['id_patient'];
$data['hasta']= $this->session->userdata['hasta'];
$data['areas']=$this->model_admin->get_serv_fac2_doc(0);
$data['area']="";
$data['after_save']=1;
$data['area_id']="";
$data['id_ncf'] =$id_ncf;
$invoice= $this->model_admin->getNewinvoice($id_ncf);
$data['invoice']=$invoice;
$data['cnt']=count($invoice);
$data['nota_ncf'] = $this->model_admin->getNcf($id_ncf);
$this->load->view('medico/billing/invoice_ars_claim/after-save',$data);
//$this->load->view('medico/billing/invoice_ars_claim/create',$data);


}







public function fetch_excel_import()
{
$cpt="";
$last_id_cat=$this->db->select('id_categoria')->order_by('id_tarif','desc')->limit(1)->get('tarifarios')->row('id_categoria');
$data = $this->excel_import_model->select();
$data_centro = $this->excel_import_model->select_centros();
$output = '
<span style="display:none" id="id_categoria">'.$last_id_cat.'</span>
<h3 align="center">Total Tarifarios Medicos- '.$data->num_rows().'</h3>
<h3 align="center" id="hide_last_centro">Total Tarifarios Centro Medicos- '.$data_centro->num_rows().'</h3>
';


echo $output;
}

public function import_exel()
{

$inserted_date=date("Y-m-d H:i:s");
$categoria=$this->input->post('categoria');
$seguro=$this->input->post('seguro');
$plan=$this->input->post('plan');
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
'plan'=>$plan,
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
'plan'=>$plan,
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
'seguro_id'=>$this->input->post('id_sm'),
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
'id_seguro'=>$this->input->post('id_sm'),
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





public function messageReceived()
{
$idar=$this->uri->segment(3);
$sql ="SELECT * FROM  sendmessage WHERE id_area=$idar and message !='' order by idsm asc";
$query= $this->db->query($sql);
foreach ($query->result() as $mes){
	$response=$mes->response;

$mesa=$mes->message;

$insert_time = date("d-m-Y H:i:s", strtotime($mes->insert_time));
$sent_by=$this->db->select('name')->where('id_user',$mes->iduser)->get('users')->row('name');
echo "
<div class='message'>
<p class='info'>
<span style='font-size:11px'>Admin $sent_by</span>
<br/><strong>$mesa</strong><br/>
<span style='font-size:11px;float:right'>$insert_time</span>
</p>
</div>
";


}

}
public function newMessage()
{
$idar=$this->uri->segment(3);
$sql ="SELECT idsm, response,iduser,insert_time FROM  sendmessage WHERE id_area=$idar and response !=''";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('chat/medico/new-message-view',$data);
}



public function DeleteMessage(){

	$id  = $this->input->post('id');
$query = $this->model_admin->DeleteMessage($id);

}




public function docReplyMessage(){
$id_area=$this->input->post('idarea');
$message=$this->input->post('message');
$doc=$this->input->post('doc');
$insert_date=date("Y-m-d H:i:s");
$insert_date2=date("m-d-Y H:i:s");
$save = array(
  'id_area'  => $id_area,
  'response'=> $message,
  'iduser'=> $this->input->post('iduser'),
  'insert_time'=> $insert_date
   );
$idmsg=$this->model_admin->SaveMessage($save);

}

public function show_plan_seg(){
$id=$this->input->post('id');
$id_doctor=$this->input->post('id_doctor');
$id_centro=$this->input->post('id_centro');
if ($id==11){
if($id_centro==0){
$where='';
}else{
$where="&& where id_centro=$id_centro";
}
echo'<select class="form-control select2" name="plan" id="plan">';
$sqlpl ="SELECT id_centro from doctor_agenda_test where id_doctor=$id_doctor $where group by id_centro";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
$centro_name=$this->db->select('name')->where('id_m_c',$rowpi->id_centro)->get('medical_centers')->row('name');
echo "<option value='$rowpi->id_centro'>$centro_name</option>";
}


}else{


$sqlpl ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
echo "<option value='$rowpi->id'>$rowpi->name</option>";
}


}

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
$data['citas']=$this->model_admin->Search_factura($val);
$data['factura_sin_cita']=$this->model_admin->facturaSinCita($val);
$data['id_p_a']=$this->input->post('id_p_a');
$data['id_user']=$this->input->post('id_user');
$data['perfil']=$this->input->post('perfil');
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
  $doc=$this->db->select('area,exequatur')->where('id_user',$doc_id)->get('users')->row_array();
$data['exequatur']=$doc['exequatur'];
$data['area']=$doc['area'];
$data['data_cita']=$this->model_admin->get_patient_for_billing($id_apoint);
$serv=$this->model_admin->Serviciomssm($doc_seg);
$data['serv']=$serv;
$id_centro=$this->db->select('centro')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('centro');

$serv_centro=$this->model_admin->Service_centro($id_centro,$this->input->post('seg_id'));
$data['serv_centro']=$serv_centro;
$id_patient=$this->db->select('id_patient')->where('id_apoint',$id_apoint)->get('rendez_vous')->row('id_patient');
$data['patient_data']=$this->model_admin->historial_medical($id_patient);
$last_bill_id=$this->db->select('idfacc')->order_by('idfacc','desc')->limit(1)->get('factura2')->row('idfacc');
$show_diagno_pat=$this->model_admin->show_diagno_pat($id_patient,$doc_id,$id_centro);
$data['show_diagno_pat']=$show_diagno_pat;
$h_c_conclusion_diagno = $this->db->select('procedimiento,otros_diagnos')->
where('historial_id',$id_patient)->where('id_user',$doc_id)->
where('centro_medico',$id_centro)->
like('updated_time',date("Y-m-d"))->
get('h_c_conclusion_diagno')->row_array();
$data['procedimiento']=$h_c_conclusion_diagno['procedimiento'];
$data['otros_diagnos']=$h_c_conclusion_diagno['otros_diagnos'];
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
$data['id_doc']=$this->input->post('id_doc');
$data['id_seg']=$this->input->post('id_seguro');
$data['id_plan']=$this->input->post('plan');
$data['created_by']=$this->input->post('name');
$this->load->view('medico/tarifarios/excel_import_fac',$data);
}



public function get_service_precio_centro()
{
 $id=$this->input->post('id_mssm1');
$precio=$this->db->select('monto')->where('id_c_taf',$id)->get('centros_tarifarios')->row('monto');
echo $precio;


}

public function editPrivateBill(){
$inserted_by=$this->input->get('inserted_by');
$is_admin=$this->input->get('is_admin');
$this->PrivateBill($inserted_by,$is_admin);
}


public function PrivateBill($inserted_by,$is_admin)
{
$lastInsert=$this->db->select('idfacc,centro_medico')->order_by('idfacc','desc')->limit(1)->get('factura2')->row_array();
$data['id']=$lastInsert['idfacc'];
$data['identificar']=$this->db->select('type')->where('id_m_c',$lastInsert['centro_medico'])->get('medical_centers')->row('type');
$data['name']=$inserted_by;
$data['is_admin']=$is_admin;
if($is_admin='yes'){
$this->load->view('admin/header_admin',$data);
}else{
$this->load->view('medico/header',$data);
}
$this->load->view('medico/billing/bill/seguro-privado/view-bill-commnun',$data);
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
$perfil=$user['perfil'];
$data['perfil']=$perfil;
$data['name']=$id_user;
$data['nec']=$this->db->select('nec1')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('nec1');
$data['id_patient']=$id_p_a;
$data['causa']=$this->model_admin->getCausa();
$data['seguro_id']=$this->db->select('seguro_medico')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('seguro_medico');
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['especialidades_doc']= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');

if($perfil=="Medico"){
$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
}else if($perfil=="Asistente Medico"){
$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
} else {
$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
}

$this->load->view('admin/pacientes-citas/create_cita_again_form',$data);
}


public function UpdateCita()
{
	$id_cita= $this->uri->segment(3);
    $id_user= $this->uri->segment(4);
	$data['cancelar']= $this->uri->segment(5);
	$user=$this->db->select('perfil,name')->where('id_user',$id_user)->get('users')->row_array();
	$data['id_user']=$id_user;
	$data['perfil']=$user['perfil'];
	$data['name']=$id_user;

	$data['FindCita'] = $this->model_admin->FindCita($id_cita);
	$data['causa']=$this->model_admin->getCausa();
	if($user['perfil']=="Medico"){
	$data['centro_medico'] = $this->model_admin->view_doctor_centro($id_user);
	}
	else if($user['perfil']=="Asistente Medico"){
	$data['centro_medico'] = $this->model_admin->view_as_doctor_centro($id_user);
	}
	else {
	$data['centro_medico'] = $this->account_demand_model->getCentroMedico();
	}
	$data['especialidades'] = $this->model_admin->getEspecialidades();
	$data['doctors'] = $this->model_admin->display_all_doctors();
	$data['especialidades_doc']= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
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
echo "<div class='alert alert-warning'> <strong>$ncf</strong> : ya esta utilisado, no puede usar lo de nuevo !</div>";

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
'nota'=> $this->input->post('notaof'),
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


public function factura_table_view_privado()
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
	 $tarif=$this->db->select('centro_medico,medico,seguro_medico,area')->where('idfacc',$this->input->post('id_facc'))->get('factura2')->row_array();
	 $data['centro_in_fac']=$tarif['centro_medico'];
	  $data['medico']=$tarif['medico'];
	  $data['seguro']=$tarif['seguro_medico'];
	  $data['area_id']=$tarif['area'];
	 $data['centro']=$this->db->select('name')->where('id_m_c',$tarif['centro_medico'])->get('medical_centers')->row('name');
	 $data['serv_centro']=$this->model_admin->Service_centro($tarif['centro_medico'],$tarif['seguro_medico']);
	$val= array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico'],
	'id_cm' =>$tarif['centro_medico']
	);
    $data['serv']=$this->model_admin->ServiciomssmPrivado($val);
	$this->load->view('medico/billing/bill/seguro-privado/facturaTableView', $data);
}



public function deleted_fac()
{
	$data['id_fac']=$this->uri->segment(3);
	$data['user']=$this->uri->segment(4);
	$data['identificar']=$this->uri->segment(5);
	$data['count']=$this->uri->segment(6);
	$this->load->view('medico/billing/bill/delete-fac', $data);
}



public function ord_med_med_gen()
{
$where = array(
 'idem'   =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('ord_med_med_gen');
}

public function deleteLabsOM()
{
$where = array(
 'id_lab'   =>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('orden_medcia_lab');
}

public function delete_this_fac()
{
	$id_facc=$this->input->post('id_facc');
	$count=$this->input->post('count');

$query = $this->db->get_where('factura',array('idfac'=>$this->input->post('id_facc')));
foreach ($query->result() as $row) {
   $this->db->insert('factura_deleted',$row);
}


$where = array(
 'idfac'   =>$this->input->post('id_facc')
);

$this->db->where($where);
$this->db->delete('factura');
//---------------------------------------------------
if($count==1){
$where2 = array(
 'idfacc'   =>$this->input->post('id2')
);

$this->db->where($where2);
$this->db->delete('factura2');
}

$save = array(
'idfac' =>$this->input->post('id_facc'),
'reazon' =>$this->input->post('reazon'),
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'deleted_by' =>$this->input->post('user'),
'deleted_time' =>date("Y-m-d H:i:s")
);
$this->db->insert("delete_fac_razon",$save);





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
	$patient=$this->db->select('plan,seguro_medico')->where('id_p_a',$this->input->post('id_patient'))->get('patients_appointments')->row_array();
	 $tarif=$this->db->select('centro_medico,medico,seguro_medico,area')->where('idfacc',$this->input->post('id_facc'))->get('factura2')->row_array();
	 $data['centro_in_fac']=$tarif['centro_medico'];
	  $data['medico']=$tarif['medico'];
	  $data['seguro']=$tarif['seguro_medico'];
	  $data['area_id']=$tarif['area'];
	 $data['centro']=$this->db->select('name')->where('id_m_c',$tarif['centro_medico'])->get('medical_centers')->row('name');
	 $data['serv_centro']=$this->model_admin->Service_centro($tarif['centro_medico'],$tarif['seguro_medico']);
	$val= array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico'],
	'plan' =>$patient['plan']
	);
    $data['serv']=$this->model_admin->Serviciomssm($val);
	
	if($patient['seguro_medico'] != $tarif['seguro_medico']){
	$data['seguro_as_been_changed']='<span style="color:red">El seguro del paciente ha sido cambiado, esa factura pertenece al seguro anterior. Es recomendable de crear otra factura con el nuevo seguro.<br/></span>';	
	}else{
	$data['seguro_as_been_changed']='';	
	}
	$this->load->view('medico/billing/bill/facturaTableView', $data);
}

public function import_rates_fac_centro()
{
$data['id_c']=$this->uri->segment(3);
$data['id_seg']=$this->uri->segment(4);
$data['created_by']=$this->uri->segment(5);
$this->load->view('admin/tarifarios/excel_import_fac_centro',$data);
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
'service' =>$this->input->post('service'),
'cantidad' =>$this->input->post('cantidad'),
'preciouni' =>$this->input->post('preciouni'),
'subtotal' =>$this->input->post('subtotal'),
'totalpaseg' =>$this->input->post('totalpaseg'),
'descuento' =>$this->input->post('descuento'),
'totpapat' =>$this->input->post('totpapat'),
'pat_id' =>$this->input->post('id_patient'),
'medico2' =>$this->input->post('medico'),
'area_id' =>$this->input->post('area_id'),
'seguro' =>$this->input->post('seguro'),
'center_id' =>$this->input->post('centro'),
'filter' =>date('Y-m-d'),
'id2' =>$this->input->post('idfacc'),
'updated_by' =>$this->input->post('updated_by'),
'updated_time' =>$update_date,
'created_by' =>$this->input->post('updated_by'),
'inserted_time' =>$update_date,
'fecha_fac' =>date("d-m-Y H:i")
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

$id2=$this->db->select('id2')->where('idfac',$this->input->post('idfac'))->get('factura')->row('id2');


$idfacc=$this->input->post('idfacc');

$sql ="SELECT sum(subtotal) as t1, sum(totalpaseg) as t2, sum(totpapat) as t3 FROM factura WHERE id2=$idfacc";
$query= $this->db->query($sql);
 foreach ($query->result() as $row)

//-------UPDATE INVOICE ARS CLAIMS

$update = array(
  'tsubtotal' =>$row->t1,
  'totpagseg'=>$row->t2,
  'totpagpa' =>$row->t3
);

$where= array(
  'id_f' =>$this->input->post('idfacc')
);

$this->db->where($where);
$this->db->update("invoice_ars_claims",$update);


}

}




public function updateBillTable()
{
	$data['increment_select2']=$this->input->post('id_fact');
	$data['billings']=$this->model_admin->updateBillTable($this->input->post('id_fact'));
	 $tarif=$this->db->select('centro_medico,medico,seguro_medico,paciente')->where('idfacc',$this->input->post('id_facc'))->get('factura2')->row_array();
	 $data['centro_in_fac']=$tarif['centro_medico'];
	$data['edit_tarifario_centro']=$this->model_admin->tarifario_centro_bill($tarif['centro_medico']);
	$data['idfacc']=$this->input->post('id_facc');
	$data['is_admin']=$this->input->post('is_admin');
	$data['user']=$this->input->post('user');
	$data['identificar']=$this->input->post('identificar');
	//$data['centro']=$this->input->post('centro');
	if($tarif['seguro_medico'] ==11){
	$val= array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico'],
	'id_cm'  =>$tarif['centro_medico']
	);
    $data['serv']=$this->model_admin->ServiciomssmPrivado($val);
	$this->load->view('medico/billing/bill/seguro-privado/updateBillTable', $data);
     }else{
		 $id_p_a=$tarif['paciente'];
		$plan=$this->db->select('plan')->where('id_p_a',$id_p_a)->get('patients_appointments')->row('plan');
		$doc_seg = array(
	'id_doctor' =>$tarif['medico'],
	'id_seguro' =>$tarif['seguro_medico'],
		'plan'  =>$plan
		);
     $data['serv']=$this->model_admin->Serviciomssm($doc_seg);
$this->load->view('medico/billing/bill/updateBillTable', $data);
	 }

}





public function delete_factura()
{
$this->model_admin->delete_factura3($this->input->post('id'));
}




public function UpdateBillHead()
{
$filter_date=date("Y-m-d", strtotime($this->input->post('fechaEdit')));
$update_date=date("Y-m-d H:i:s");
$save2= array(
'fecha' =>$this->input->post('fechaEdit'),
'filter_date' =>$filter_date,
'numauto' =>$this->input->post('numauto'),
'autopor' =>$this->input->post('autopor'),
'updated_by' =>$this->input->post('user'),
'comment' =>$this->input->post('comment'),
'update_date' =>$update_date
);
$this->model_admin->UpdateBill2($this->input->post('id_facc'),$save2);


$where= array(
  'id2' =>$this->input->post('id_facc')
);

$update = array(
  'filter' =>$filter_date,
  'fecha_fac'=>$this->input->post('fechaEdit'),
  'updated_by' =>$this->input->post('user'),
   'updated_time' =>$update_date
);
$this->db->where($where);
$this->db->update("factura",$update);

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
$query_citas=$this->db->select('confirmada')->where('confirmada',0)->where('cancelar',0)->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');
echo $query_citas->num_rows();

}

public function cola_de_solicitud(){
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->get('rendez_vous');

echo $query_sol->num_rows();

}




public function citas_hoy_medico(){
$idus=$this->uri->segment(3);
$perfil=$this->db->select('perfil')->where('id_user',$this->uri->segment(3))->get('users')->row('perfil');
if($perfil=="Medico"){
$query_citas1=$this->db->select('id_apoint')->where('confirmada',0)->where('cancelar',0)->where('doctor',$this->uri->segment(3))->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');
echo $query_citas1->num_rows();
}
 else if($perfil=='Asistente Medico'){
	  $id_doctormd= $this->db->select('id_doctor')->where('id_asdoc',$this->uri->segment(3))->where('cancelar',0)->order_by('id_doctor','desc')->get('centro_doc_as')->row('id_doctor');
	 $result=$this->model_medico->getAsMedicoAp($id_doctormd);
//$result=$this->db->select('doctor')->where('doctor',$this->uri->segment(3))->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');
echo count($result);

}else{
	$query_citasa=$this->db->select('id_apoint')->where('confirmada',0)->where('cancelar',0)->where('fecha_propuesta',date("d-m-Y"))->get('rendez_vous');
echo $query_citasa->num_rows();
}

}



public function cola_de_solicitud_medico(){
$perfil=$this->db->select('perfil')->where('id_user',$this->uri->segment(3))->get('users')->row('perfil');
if($perfil=="Medico"){
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->where('doctor',$this->uri->segment(3))->get('rendez_vous');
echo $query_sol->num_rows();
}
 else{
$result=$this->model_medico->getPatientSolicitudeAsisMedico($this->uri->segment(3));
echo count($result);
}

}



public function confirmar_solicitud()
{
$iduser=$this->input->post('user-id');
$solitante=$this->input->post('patient');
$centro=$this->input->post('centro');
$docid=$this->input->post('doc-id');
$centroid=$this->input->post('centro-id');
$doctorInfo=$this->db->select('name,correo,cell_phone')->where('id_user',$docid)->get('users')->row_array();
$doctorPrecio=$this->db->select('price')->where('id_doctor',$docid)->get('products')->row('price');
$doctorname=$doctorInfo['name'];
$doctoremail=$doctorInfo['correo'];
$cell_phone=$doctorInfo['cell_phone'];
$solicitud=$this->input->post('patient-nec');
$medicoText=$this->input->post('medico-text');
$medicoFecha=$this->input->post('fecha-doctor');
$patientemail=$this->input->post('patient-email');
$area=$this->input->post('doctor-area');
$filter_date=date("Y-m-d", strtotime($medicoFecha));
$data = array(
'confirmada'=>0,
'fecha_propuesta'=>$medicoFecha,
'filter_date'=>$filter_date,
'inserted_by'=>$iduser,
'update_by'=>$iduser,
'update_time'=>date("Y-m-d H:i:s"),
'created_time'=>date("Y-m-d H:i:s")
);

$where = array(
  'id_apoint' =>$this->input->post('id_apoint')
);

$this->db->where($where);
$this->db->update("rendez_vous",$data);




//-----add solicitud to cita----------------------
$msg1 = "<div id='deletesuccess' style='text-align:center;color:green'>Solicitud # <b>$solicitud</b> esta confirmada.</div>";
$this->session->set_flashdata('success_msg', $msg1);
////////////////////////////////////////////////////////////
$this->session->set_userdata('solitante',$solitante);
$this->session->set_userdata('centro',$centro);
$this->session->set_userdata('area',$area);
$this->session->set_userdata('doctorname',$doctorname);
$this->session->set_userdata('medicoFecha',$medicoFecha);
$this->session->set_userdata('medicoText',$medicoText);
$this->session->set_userdata('patientemail',$patientemail);
$this->session->set_userdata('doctoremail',$doctoremail);
$this->session->set_userdata('cell_phone',$cell_phone);
$this->session->set_userdata('cell_phone',$cell_phone);
$this->session->set_userdata('link_pago',$this->input->post('link-pago'));
$this->session->set_userdata('centroid',$centroid);
$this->session->set_userdata('link_zoom',$this->input->post('link-zoom'));
$this->session->set_userdata('doctorPrecio',$doctorPrecio);
$this->session->set_userdata('payment_id_aptm',$this->input->post('id_apoint'));

 $this->sendConfirmationToCitaDemand();
 if($this->input->post('direction')==1){
redirect($_SERVER['HTTP_REFERER']);
 }else{
 redirect('admin_medico/confirmCitaCorreo');
 }
}

public function confirmCitaCorreo(){
$link='href="https://www.admedicall.com"';	 
$msg ="<h1 style='text-align:center;font-size:50px'>Cita Confirmada Con Éxito</h1>";	 

echo $msg;	
}



public function sendConfirmationToCitaDemand(){
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

  
$docid =$this->session->userdata('docid');
$payment_id_aptm =$this->session->userdata('payment_id_aptm');
$centroid =$this->session->userdata('centroid');
$link_pago =$this->session->userdata('link_pago');
$doctorPrecio =$this->session->userdata('doctorPrecio');
$link_zoom =$this->session->userdata('link_zoom');
$solitante =$this->session->userdata('solitante');
$centro =$this->session->userdata('centro');
$area =$this->session->userdata('area');
$doctorname =$this->session->userdata('doctorname');
$medicoFecha =$this->session->userdata('medicoFecha');
$medicoText =$this->session->userdata('medicoText');
$patientemail =$this->session->userdata('patientemail');
$doctoremail =$this->session->userdata('doctoremail');
$cell_phone =$this->session->userdata('cell_phone');
if($cell_phone !=""){
	$doc_cell="teléfono: $cell_phone";
}else{
$doc_cell="";	
}
//$link='href="'.base_url().'products/payment_/'.$docid.'/'.$payment_id_aptm.'"';

if($centroid !=50){
$link="<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;margin: 4px 2px;cursor: pointer;' href='$link_pago' >PARGAR $$doctorPrecio USD</a>";
	
}else{
$link='
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="K4G7Y6AJ58Q4G">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
';
}


$link2="href='$link_zoom'";
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;'>
Saludo Sr(a).  <span style='text-transform:uppercase'><strong>$solitante</strong></span><br/> <br/>
Ha hecho una solicitud en el centro medico $centro por la area $area. El doctor $doctorname ha confirmado su solicitud.
Favor pagar la consulta del servicio.<br/>
$link
<br>
Despues del pago una reunión de Zoom se efectuará aquí : <a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;margin: 4px 2px;cursor: pointer;' $link2 >IR A ZOOM</a>

<h3>$medicoText<br/>$doc_cell</h3>
<br/><br/><br/>
Atentamente,<br/>
GICRE
</body>
</html>";

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($patientemail);// change it to yours
$this->email->subject('CONFIRMACION DE CITA');
$this->email->message($msg);
$this->email->send();
}






public function patient_request(){
$id_sol=$this->uri->segment(3);
$data['user_id']=$this->uri->segment(4);
$sql ="SELECT id_patient, id_apoint, fecha_propuesta, nec,area,doctor,centro,causa FROM rendez_vous WHERE id_apoint=$id_sol";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('admin/pacientes-citas/patient-request', $data);

}

public function ver_refraccion(){
$id=$this->uri->segment(3);
$data['id_user']=$this->uri->segment(4);
$data['id']=$id;
$sql ="SELECT * FROM  h_c_of_refracion WHERE id=$id";
$query= $this->db->query($sql);
$data['query']=$query;
$this->load->view('optica/ver-refraccion', $data);

}

public function save_refraccion_entrega(){
if($this->input->post('nuevo-refraccion')==1){
$fecha_de_entrega = date("Y-m-d H:i:s", strtotime($this->input->post('fecha-entrega')));
$where = array(
  'id' =>$this->input->post('id-refraccion')
);
$data = array(
'enviado'  =>1,
'fecha_de_entrega'=>$fecha_de_entrega,
'entregado_hecho_por'=>$this->input->post('id-user')
);

$this->db->where($where);
$this->db->update("laboratory_lentes",$data);


$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('id-user'))->get('users')->row('perfil');
if($perfil=='Admin'){
redirect("admin/lentes_propuestos");
}else{
redirect("medico/lentes_propuestos");	
}
}else{
echo 'error';	
}
}



public function confirma_from_correo($id_sol,$id_doctor){
$data['user_id']=$id_doctor;
$sql ="SELECT id_patient, id_apoint, fecha_propuesta, nec,area,doctor,centro, causa FROM rendez_vous WHERE id_apoint=$id_sol";
$query= $this->db->query($sql);
$data['query']=$query;

$this->load->view('admin/pacientes-citas/confirma_from_correo', $data);

}




public function check_if_user_exist()
{
$query = $this->db->get_where('users',array('username'=>$this->input->get('user')));
	if($query->num_rows() > 0 )
	{
		echo "<span style='color:red'>Este nombre de usuario ya existe !</span>";
		echo "<script>$('#user').val('');$('.password').attr('type', 'text');$('.password').prop('disabled',true)</script>";

	} else {
		echo "<script>$('.password').attr('type', 'password');$('.password').prop('disabled',false)</script>";

	}

}



 Public function check_codigo()
{
 $codigo_securidad = md5($this->input->post('codigo_securidad'));
$row=$this->db->select('id_user')->where('codigo_seguriad',$codigo_securidad)->get('users')->row('id_user');
//$found=$row->num_rows();
echo json_encode($row);

}


public function changeUserAccount(){
$id= $this->input->post('id_user');
$data = array(
 'password' => md5($this->input->post('pass1'))
  );
$this->model_admin->DeactivarUser($id,$data);
$mes=' <span style="color:green"><i class="fa fa-check-circle" style="font-size:24px"></i>Cambio de cuenta ha sido realizado !</span>';
$this->session->set_flashdata('msg_pass_ac',$mes);


}







 Public function check_correo()
{
$correo = $this->input->post('correo');
$rslt=$this->db->select('id_user')->where('correo',$correo)->get('users');
$num=$rslt->num_rows();
echo json_encode($num);
if($num == 1){
$user=$this->db->select('id_user,name')->where('correo',$correo)->get('users')->row_array();
$chars = "01234567989-";
$codigo_seguriad = substr( str_shuffle( $chars ), 0, 8 );

	$save = array(
   'codigo_seguriad' =>md5($codigo_seguriad)
  );

$this->model_admin->DeactivarUser($user['id_user'],$save);
$this->session->set_userdata('user_email',$correo);
$this->session->set_userdata('codigo_seguriad',$codigo_seguriad);
$this->session->set_userdata('user_name',$user['name']);
 $this->send_security_code_to_user_after_registration();
} else{}

}







public function send_security_code_to_user_after_registration(){
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);

$user_name =$this->session->userdata('user_name');
$codigo_seguriad =$this->session->userdata('codigo_seguriad');
$msg ="
<html>
<body style='font-family: 'Playfair Display', serif;'>
Saludos Sr(a).  <span style='text-transform:uppercase'><strong>$user_name</strong></span><br/> <br/>
Para cambiar su contraseña entra el codigo siguiente : <br/>
<br>
<h3>:CODIGO DE SECURIDAD : <span style='color:blue'>$codigo_seguriad</span></h3>
<br/><br/><br/>
Atentamente,<br/>
GICRE
</body>
</html>";

$user_email =$this->session->userdata('user_email');

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($user_email);// change it to yours
$this->email->subject('Codigo de securidad');
$this->email->message($msg);
$this->email->send();

}



public function DeleteTarifCentro()
{

$where = array(
 'centro_id'   =>$this->input->post('id'),
  'seguro_id'   =>$this->input->post('id_seguro')
);

$this->db->where($where);
$this->db->delete('centros_tarifarios');


$where1 = array(
 'id_centro'   =>$this->input->post('id'),
  'id_seguro'   =>$this->input->post('id_seguro')
);
$this->db->where($where1);
$this->db->delete('codigo_contrato');
//--------------------------------------------------------------------------------------------------

}

//===============================================CHAT=====================================================

public function allMessReceived(){
	 $data['output']= '';
$id_user = $this->input->post('id_user');
$data['data'] = $this->model_admin->allMessReceived($id_user);
$data['count']= $this->model_admin->countMessReceived($id_user);
$this->load->view('chat/allMessReceived',$data);
}





public function search_fetch_medico_chat_test()
{
 $data['output']= '';
  $query = '';
  $id_user = $this->input->post('id_user');
  $perfil=$this->db->select('perfil')->where('id_user',$id_user)->get('users')->row('perfil');
  if($perfil=="Admin"){$data['control']="admin";}else{$data['control']="medico";};
$data['id_user']=$id_user;
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data['dataUsers'] = $this->model_admin->search_fetch_medico_chat($query,$id_user);
 $query= $this->db->get_where('chat_medico',array('message_to'=>$id_user));
$data['numMes']=$query->num_rows();
$this->load->view('chat/all-users',$data);
//$this->load->view('admin/print/test',$data);
}



public function chatWithBox($idChatWith,$id_user)
{
//---------------------------------LOAD USERS----------------------------------------------------------
 $data['output']= '';
  $query = '';
$data['id_user']=$id_user;
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data['dataUsers'] = $this->model_admin->search_fetch_medico_chat($query,$id_user);
 $query= $this->db->get_where('chat_medico',array('message_to'=>$id_user));
$data['numMes']=$query->num_rows();

//----------------------------------LOAD CHAT DATA------------------------------------------------

$where2 = array(
  'message_from' =>$idChatWith,
  'message_to'   =>$id_user
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);
//--------------------------------------------------------------------------------------------------
$data['messageFromiD']=$id_user;
$data['messageToName']=$this->db->select('name')->where('id_user',$idChatWith)->get('users')->row('name');
$data['messageFromName']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;
$data['messageTo']=$idChatWith;
$data['messageFrom']=$id_user;
//--------------------------------------------------------------------------------------------------
 $query1 = $this->db->get_where('chat_is_user_typing',array('id_user'=>$id_user,'id_sender'=>$idChatWith));
	if($query1->num_rows() == 0 && $idChatWith !=0)
	{
$save = array(
'id_user'  =>$id_user,
'id_sender'  =>$idChatWith,
'is_typing'  =>"no"
);
$this->db->insert("chat_is_user_typing",$save);
	}

	$where2 = array(
  'message_from' =>$idChatWith,
  'message_to'   =>$id_user
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);

	$data['idChatWith']=$idChatWith;
$data['id_user']=$id_user;
$data['messageFromiD']=$id_user;
$data['messageTo']=$idChatWith;
$data['messageFrom']=$id_user;
$data['messageToName']=$this->db->select('name')->where('id_user',$idChatWith)->get('users')->row('name');
$data['messageFromName']=$this->db->select('name')->where('id_user',$id_user)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$id_user AND message_to=$idChatWith
OR
message_from=$idChatWith AND message_to=$id_user
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;

$this->load->view('chat/chatHistorialData',$data);

}



public function viewSenderMesssge()
{
$idChatWith= $this->input->post('idChatWith');
$id_user=$this->input->post('id_user');
echo $idChatWith;

}


public function show_update($id)
{
	$data['id_usr']=$id;
$this->load->view('new-update',$data);
}


public function loadChatData()
{

$messageTo= $this->input->post('idChatWith');
$messageFrom=$this->input->post('id_user');

$where2 = array(
  'message_from' =>$messageTo,
  'message_to'   =>$messageFrom
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);
//--------------------------------------------------------------------------------------------------
$data['messageFromiD']=$messageFrom;
$user=$this->db->select('name,perfil')->where('id_user',$messageTo)->get('users')->row_array();
$name=$user['name'];$perfil=$user['perfil'];
$data['messageToName']="$name - $perfil";
$data['messageFromName']=$this->db->select('name')->where('id_user',$messageFrom)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$messageFrom AND message_to=$messageTo
OR
message_from=$messageTo AND message_to=$messageFrom
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;
$data['messageTo']=$messageTo;
$data['messageFrom']=$messageFrom;
$this->load->view('chat/loadChatData',$data);
}
//--------------END CHAT TEST--------------------------------------------------------------------------------

public function search_fetch_medico_chat()
{
	  $data['output']= '';
  $query = '';
  $id_user = $this->input->post('id_user');
$data['id_user']=$id_user;
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data['data'] = $this->model_admin->search_fetch_medico_chat($query,$id_user);
 $this->load->view('chat/medico/all-users',$data);
}

public function newMessageDoc()
{
$messageTo= $this->input->post('messageTo');
$messageFrom=$this->input->post('id_user');

 $query1 = $this->db->get_where('chat_is_user_typing',array('id_user'=>$messageFrom,'id_sender'=>$messageTo));
		if($query1->num_rows() == 0 && $messageTo !=0)
	{
$save = array(
'id_user'  =>$messageFrom,
'id_sender'  =>$messageTo,
'is_typing'  =>"no"
);
$this->db->insert("chat_is_user_typing",$save);
	}


//-----------------------------------------------------
$where2 = array(
  'message_from' =>$messageTo,
  'message_to'   =>$messageFrom
);
$updateData2 = array(
'seen'  =>1);
$this->db->where($where2);
$this->db->update("chat_medico",$updateData2);
//--------------------------------------------------------------------------------------------------
$data['messageFromiD']=$messageFrom;
$data['messageToName']=$this->db->select('name')->where('id_user',$messageTo)->get('users')->row('name');
$data['messageFromName']=$this->db->select('name')->where('id_user',$messageFrom)->get('users')->row('name');
$sql ="SELECT id, message,stime,message_from,message_to,seen  FROM  chat_medico
 WHERE
message_from=$messageFrom AND message_to=$messageTo
OR
message_from=$messageTo AND message_to=$messageFrom
 order by id asc";
$query= $this->db->query($sql);
$data['query']=$query;
$data['messageTo']=$messageTo;
$data['messageFrom']=$messageFrom;
$this->load->view('chat/medico/show-message-doc-sent-to-doc',$data);
}


public function get_centro_cita_doc()
{
$iduser= $this->input->post('iduser');
$data['iduser']=$iduser;
$id_doc= $this->input->post('id_doc');
$data['perfil']='Asistente Medico';
$data['area_id']=4;
$data['controller']='Medico';
$data['appointments'] = $this->model_medico->getAsMedicoAp($id_doc);
$this->load->view('medico/refreshCitaHoy',$data);
}


public function refreshCitaHoy()
{
$iduser= $this->input->post('iduser');
$perfil=$this->input->post('perfil');
$data['iduser']=$this->input->post('iduser');
$data['perfil']=$this->input->post('perfil');
$data['area_id']=$this->input->post('area_id');
$data['controller']=$this->input->post('controller');
if($perfil=='Medico'){
$appointments= $this->model_medico->getMedicoAp($iduser);
}else if($perfil=='Asistente Medico'){
 $id_doctormd= $this->db->select('id_doctor')->where('id_asdoc',$iduser)->order_by('id_doctor','desc')->get('centro_doc_as')->row('id_doctor');
 $appointments= $this->model_medico->getAsMedicoAp($id_doctormd);
}else{
 $appointments = $this->model_admin->getConfirmSolicitud();
}
 $data['appointments'] =  $appointments;
 $data['count'] =  count($appointments);
$this->load->view('medico/refreshCitaHoy',$data);
}





 public function getTodayCita()
    {
        $draw = intval($this->input->post("draw"));
        $start = intval($this->input->post("start"));
        $length = intval($this->input->post("length"));
        $order = $this->input->post("order");
        $search= $this->input->post("search");
        $search = $search['value'];
		//--------------------------------------------------------
		$iduser= $this->input->post("iduser");
		$perfil= $this->input->post("perfil");
		$controller= $this->input->post("controller");
		$area_id= $this->input->post("area_id");
		//--------------------------------------------------------
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o)
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }

        if($dir != "asc" && $dir != "desc")
        {
            $dir = "desc";
        }
        $valid_columns = array(
            1=>'nec',
            3=>'centro',
            4=>'doctor',
           // 5=>'hire_date',
        );
        if(!isset($valid_columns[$col]))
        {
            $order = null;
        }
        else
        {
            $order = $valid_columns[$col];
        }
        if($order !=null)
        {
            $this->db->order_by($order, $dir);
        }
        
        if(!empty($search))
        {
            $x=0;
            foreach($valid_columns as $sterm)
            {
                if($x==0)
                {
                    $this->db->like($sterm,$search);
                }
                else
                {
                    $this->db->or_like($sterm,$search);
                }
                $x++;
            }                 
        }
		$this->db->where('fecha_propuesta',date("d-m-Y"));
		$this->db->where('confirmada',0);
		$this->db->where('cancelar',0);
        $this->db->limit($length,$start);
        $employees = $this->db->get("rendez_vous");
        $data = array();
		$today=date('Y-m-d');
$this->padron_database = $this->load->database('padron',TRUE);
        foreach($employees->result() as $rows)
        {
			
			
		$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,frecuencia')->where('id_p_a',$rows->id_patient )
->get('patients_appointments')->row_array();
$q=$this->db->select('id_patient')->where('id_patient',$rows->id_patient)->where('doctor',$rows->doctor)->where('centro',$rows->centro)->like('update_time',date("Y-m-d"))->get('rendez_vous');
$sql_con ="SELECT historial_id FROM h_c_enfermedad where filter_date='$today' AND historial_id=$rows->id_patient AND user_id=$rows->doctor AND centro_medico=$rows->centro";
$atendido_con = $this->db->query($sql_con);
$area_d=$this->db->select('title_area')->where('id_ar',$rows->area )
->get('areas')->row("title_area");


if($atendido_con->num_rows() > 0){
$atend="<i style='color:green' class='fa fa-check' aria-hidden='true'></i>";
$title_hist="&#013 Hay una historial medica por hoy";
$hist=1;
}
else 
{
$atend="";
$hist=0;
$title_hist="";
}

$sqlcita="SELECT id_rdv FROM factura2 where id_rdv=$rows->id_apoint";
$cita_con = $this->db->query($sqlcita);

if($cita_con->num_rows() > 0){
$cita='#B8FFD3';

$thay_fac1="<span title='cita facturada' style='color:green;font-size:11px'>RD$</span>";  
}
else 
{
$cita="";

$thay_fac1=""; 
}



$freq="SELECT historial_id FROM h_c_enfermedad WHERE  historial_id=$rows->id_patient AND user_id=$rows->doctor group by filter_date";
$cita_freq = $this->db->query($freq);

if($cita_freq->num_rows() == 0){
	 $frecuencia_text="";$frecuencia_nbr="";
  }else if($cita_freq->num_rows() == 1){
	$frecuencia_text="$cita_freq->num_rows vista"; $frecuencia_nbr="$cita_freq->num_rows";   
  } else{
	$frecuencia_text="$cita_freq->num_rows vistas"; $frecuencia_nbr="$cita_freq->num_rows";
 }	
			
			
			
			
	             $pat_foto=$patient['photo'];
if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
$img=  '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
$img= '<img  width="75" height="75" src="'.base_url().'/assets/img/user.png"  />';
	
}
else{

$img= '<img  width="75" height="75" src="'.base_url().'/assets/img/patients-pictures/'.$pat_foto.'"  />';


}		

	//$link_hist = '<a    href="'.base_url().'/'.$controller.'/historial_medical/'.$ver->id_patient.'/'.$iduser.'/0/'.$ver->centro.'/'.$hist.'/'.$iduser.'"  >sdfdsf</a>';


			
  $data[]= array(
                  $img,
                $rows->nec,
                $rows->id_patient,
                $rows->fecha_propuesta,
                $rows->centro,
                $rows->doctor,
				"$link_hist",
                '<a href="$kjh" class="btn btn-warning mr-1">Edit</a>
                 <a href="#" class="btn btn-danger mr-1">Delete</a>'
            );     
        }
        $total_employees = $this->totalEmployees();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        );
        echo json_encode($output);
        exit();
    }
    public function totalEmployees()
    {
        $query = $this->db->select("COUNT(*) as num")->where('fecha_propuesta',date("d-m-Y"))->where('confirmada',0)->where('cancelar',0)->get("rendez_vous");
        $result = $query->row();
        if(isset($result)) return $result->num;
        return 0;
    }
















public function userIsTyping()
{
$messageTo= $this->input->post('messageTo');
$messageFrom=$this->input->post('id_user');
$is_type=$this->input->post('is_type');

$where = array(
 'id_user'   =>$messageFrom
);
$data = array(
'is_typing'  =>$is_type
);
$this->db->where($where);
$this->db->update("chat_is_user_typing",$data);
//--------------------------------------------------------------------------------------------------

}

public function userIsTypingInfo()
{
$messageTo= $this->input->post('messageTo');
$messageFrom=$this->input->post('id_user');
$is_typing=$this->db->select('is_typing')->where('id_user',$messageTo)->get('chat_is_user_typing')->row('is_typing');
if($is_typing=="yes"){
	$imgpat='<img  style="width:50px;" src="'.base_url().'/assets/img/pen.gif"  />';
	echo "<em><i> &nbsp $imgpat<i></em>";
}
}



public function chatWithStatus()
{
$messageTo= $this->input->get('receiverId');

$is_login=$this->db->select('is_log_in')->where('id_user',$messageTo)->get('users')->row('is_log_in');
if($is_login==1){
$login='<span style=" height: 12px;width: 12px; background-color: #41BC07; border-radius: 50%; display: inline-block;"></span>';
} else{
$login='<span style=" height: 12px;width: 12px; background-color: gray; border-radius: 50%; display: inline-block;"></span>';
}
echo "&nbsp $login";
}



public function chattingUsers()
{
$sql ="SELECT is_typing  FROM  chat_is_user_typing WHERE is_typing='yes'";
$query= $this->db->query($sql);
$imgpat='<img  style="width:50px;" src="'.base_url().'/assets/img/pen.gif"  />';
foreach ($query->result() as $mes){
	if($mes->is_typing=="yes"){
		$typing=$imgpat;
	} else{
		$typing="";
	}
	echo "<ul><li>$typing</li></ul>";
}
}




public function docSendMessageDoc(){
$insert_date=date("Y-m-d H:i:s");
$save = array(
'message'  => $this->input->post('messageTxt'),
'message_from'=> $this->input->post('message_from'),
'message_to'=> $this->input->post('message_to'),
'stime'=> $insert_date
);
$idmsg=$this->model_admin->docSendMessageDoc($save);
$this->sendChatMessageEmail($this->input->post('message_from'),$this->input->post('message_to'),$this->input->post('messageTxt'));
}


public function sendChatMessageEmail($sender_id,$receive_id,$messageTxt){
$receiver=$this->db->select('correo,name,perfil')->where('id_user',$receive_id)->get('users')->row_array();
$sender=$this->db->select('name,perfil')->where('id_user',$sender_id)->get('users')->row_array();
$receiver_email=$receiver['correo'];
$receiver_name=$receiver['name'];
$receiver_perfil=$receiver['perfil'];
 $message=nl2br($messageTxt);
if($receiver_perfil=="Admin"){
	$cont='admin';
}else{
$cont='medico';
}

$link='href="'.base_url().''.$cont.'/redirectFromCorro/'.$sender_id.'/'.$receive_id.'"';

$sender_name=$sender['name'];
$sender_perfil=$sender['perfil'];
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>


<body style='font-family: 'Playfair Display', serif;color:red'>

<p><strong>$message</strong></p>
<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' $link >ABRIR MENSAJE EN EL CHAT DE GICRE</a>


</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($receiver_email);// change it to yours
$this->email->subject("$sender_perfil $sender_name de GICRE le ha enviado un mensaje");
$this->email->message($msg);
$this->email->send();
}







public function currentLoginChat(){
	$iduser= $this->input->get('id_user');
	$sql ="SELECT is_log_in FROM users
 where is_log_in=1 and id_user !=$iduser";
$query = $this->db->query($sql);
$count=$query->num_rows();

echo"<span style='color:green'>connectados $count</span>";
}

public function connectedUsers(){
	$iduser= $this->input->get('id_user');
	$sql ="SELECT is_log_in FROM users
 where is_log_in=1 and id_user !=$iduser";
$query = $this->db->query($sql);
$count=$query->num_rows();

echo $count;
}




public function newMessageSent(){
	$message_to= $this->input->get('id_user');
	$sql ="SELECT id FROM chat_medico
 where message_to=$message_to";
$query = $this->db->query($sql);
$count=$query->num_rows();

echo $count;
}


public function download_update($file,$id){

if(!empty($file)){
$where= array(
'userid' =>$id
);

$this->db->where($where);
$this->db->delete('message_to_users');


//load download helper
$this->load->helper('download');

//get file info from database
//file path
$file = './assets/update/'.$file;

//download file from directory
force_download($file, NULL);


}
}



public function get_doc_user_form()
{
$perfil=$this->input->post('perfil');
$data['perfil']=$perfil;
$data['controller']=$this->input->post('cont');
$data['seguro_medico'] = $this->account_demand_model->getSeguroMedico();
$data['especialidades'] = $this->model_admin->getEspecialidades();
$data['execuatur'] = $this->model_admin->getExecuatur();
$data['causa']=$this->model_admin->getCausa();
$data['medical_centers'] = $this->model_admin->display_all_medical_centers();
if($perfil=='Medico'){
$this->load->view('admin/medicos/get_doc_user_form', $data);
} else {
$this->load->view('admin/medicos/get_asist_doc_user_form', $data);
}
$this->load->view('admin/medicos/footer');
}


public function get_medico_exequatur()
{
$exequatur=$this->input->post('exequatur');
$sql ="SELECT name FROM execuatur WHERE code=$exequatur AND name NOT IN (SELECT name from users)";
$data['query']= $this->db->query($sql);
$this->load->view('admin/medicos/medico-exequatur', $data);
}


public function getDocAgendaCentro(){
 $iddoc= $this->input->post('iddoc');
 $data['iddoc']=$iddoc;
 $idcentro= $this->input->post('idcentro');
 $data['idcentro']=$idcentro;
$data['diaries']=$this->model_admin->getDiaries();
$data['centro_name']=$this->db->select('name')->where('id_m_c',$idcentro)
->get('medical_centers')->row('name');
$this->load->view('admin/users/load_doc_agenda_update',$data);
}



public function DeleteDocCentroAgenda()
{
$this->model_admin->deleteDocCentroAgenda($this->input->post('iduser'),$this->input->post('centro_medico'));
}





public function abilitarAgendar()
{
$where = array(
'id_doctor' =>$this->input->post('iddoc'),
'id_centro' =>$this->input->post('idcentro')
);

 $updateData = array(
'active'  =>0);
$this->db->where($where);
$this->db->update("doctor_agenda_test",$updateData);
}

public function agend_result(){
$fechaInicio = date("Y-m-d", strtotime($this->input->post('fechaInicio')));
$fechaFinal = date("Y-m-d", strtotime($this->input->post('fechaFinal')));

$dia=$this->input->post('dia');
if($this->input->post('operation')==1){
$this->model_admin->deleteDocCentroAgenda($this->input->post('iduser'),$this->input->post('centro_medico'));
}
 foreach ($dia as $key=>$id_dia) {
   $save= array(
    'day' => $id_dia,
 'id_doctor'  => $this->input->post('iduser'),
 'fecha_inicio' => $fechaInicio,
 'fecha_final' => $fechaFinal,
 'hour_from' => $this->input->post('hourDesde'),
 'hour_to' => $this->input->post('hourHasta'),
  'id_centro' => $this->input->post('centro_medico'),
  'cita' => $this->input->post('citas')

	);

	$this->model_admin->saveDoctorAgenda($save);
}

}

public function saveDoctorUpdate(){
$id_user  = $this->input->post('id_user');
$area=$this->input->post('especialidad');
$modify_date=date("Y-m-d H:i:s");
$seguro_medico  = $this->input->post('seguro_medico');

$data3 = array(
'name' =>$this->input->post('nombre'),
'correo' =>$this->input->post('email'),
 'area' =>$area,
 'cedula' =>$this->input->post('cedula'),
  'update_date' => $modify_date,
  'updated_by' => $id_user
  );

$this->model_admin->DeactivarUser($id_user,$data3);
//-------------------------------------------------------
$this->model_admin->deleteDocSeg($id_user);

for ($i = 0; $i < count($seguro_medico); ++$i ) {
    $seg = $seguro_medico[$i];

	$saves= array(
	'id_doctor' =>$id_user,
	'seguro_medico' => $seg
	);

	$this->model_admin->saveDoctorSeguro($saves);
}


//-----------------------SAVE SELLO--------------------------------

  $config['upload_path']="./assets/update";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("selloimage")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 250;
            $config['height']= 250;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$save = array(
			'sello'=>$data['file_name'],
			'doc'=>$id_user
			);
			$this->db->insert("doctor_sello",$save);

		}
//-----------------------SAVE LOGO TIPO-----------------------------------------------------------

 if($this->upload->do_upload("logo-tipo")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 250;
            $config['height']= 250;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$save = array(
			'sello'=>$data['file_name'],
			'doc'=>$id_user,
			'dist'=>1
			);
			$this->db->insert("doctor_sello",$save);

		}

$msg = "<h4 id='deletesuccess'  style='text-align:center;color:green'>Usuario se edita con exito.</h4>";
$this->session->set_flashdata('success_msg', $msg);

redirect($_SERVER['HTTP_REFERER']);

}






public function check_if_email_exist()
{
$query = $this->db->get_where('users',array('correo'=>$this->input->get('email')));
	if($query->num_rows() > 0 )
	{
		echo "<span style='color:red'>Este correo ya existe !</span>";
		echo "<script>$('.email-clear').val('');</script>";

	} else {

	}

}

	public  function bar1data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	$query1 = $this->model_admin->getBarCha1($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'Medico';

	$series1 = array();
	$series1['name'] = 'Paciente';


	foreach ($query1 as $row)
	{
	$med=$this->db->select('area,name')->where('id_user',$row->idMed)->get('users')->row_array();
	$areaname=$this->db->select('title_area')->where('id_ar',$med['area'])->get('areas')->row('title_area');
	$medname=$med['name'];
	$category['data'][] = "$medname<br/>$areaname";
	$series1['data'][] = $row->Paciente;

	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}


		public  function bar2data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	 $query1 = $this->model_admin->getBarChart2($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'Descrip';

	$series1 = array();
	$series1['name'] = 'Diagnostico';
   foreach ($query1 as $row)
	{
	$category['data'][] = "$row->Descrip<br/><br/><br/>($row->Cod)";
	$series1['data'][] = $row->Diagnostico;
 
	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}




	/*	public  function bar3data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	$query1 = $this->model_admin->getBarChart3Data($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'OtroDiagnostico';

	$series1 = array();
	$series1['name'] = 'Otro Diagnostico';


	foreach ($query1 as $row)
	{
	$category['data'][] = $row->OtroDiagnostico;
	$series1['data'][] = $row->OtroD;

	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}*/




		public  function bar3data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	 $query1 = $this->model_admin->getBarChart3($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	 $count20=0;
		foreach($query1 as $row)
		{
		$count20 += $row->OtroD;
		}

	  $query2 = $this->model_admin->getBarChart3Otros($desde_bar,$hasta_bar,$centro_bar,$medico_bar);

	  $countOtros=0;
		foreach($query2 as $row)
		{
		$countOtros += $row->OtroD;
		}


	$category = array();
	$category['name'] = 'OtroDiagnostico';

	$series1 = array();
	$series1['name'] = 'Otro Diagnostico';

     $i=1;
   $len = count($query1);
	foreach ($query1 as $row)
	{
		$num="";
	if ($i == 1) {
	// first
	} else if ($i == $len - 1) {
	 $num=$i + 1;
	}
	//echo $num;
	 $i++;


	$category['data'][] = $row->OtroDiagnostico;
	$series1['data'][] = $row->OtroD;
    if($num ==20){
	$category['data'][] = "Otros";
	$series1['data'][] = $countOtros - $count20;
	}
	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}




		public  function bar4data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

$query1 = $this->model_admin->getBarChartAge($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'Ano';

	$series1 = array();
	$series1['name'] = 'Paciente';


	foreach ($query1 as $row)
	{
	$category['data'][] = $row->age;
	$series1['data'][] = $row->total;

	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}


	public  function bar5data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	$query1 = $this->model_admin->getBarChart4($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'Paciente';

	$series1 = array();
	$series1['name'] = 'Provincia';


	foreach ($query1 as $row)
	{
	$idp=$this->db->select('provincia')->where('id_p_a',$row->Paciente)->get('patients_appointments')->row('provincia');
    $prvc=$this->db->select('title')->where('id',$idp)->get('provinces')->row('title');

	$category['data'][] =$prvc;
	$series1['data'][] = $row->Total;

	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}



		public  function bar6data()
	{
	$desde_bar=$this->session->userdata['desde_bar'];
	$hasta_bar=$this->session->userdata['hasta_bar'];
	$centro_bar=$this->session->userdata['centro_bar'];
	$medico_bar=$this->session->userdata['medico_bar'];

	$query1 = $this->model_admin->getBarChart5($desde_bar,$hasta_bar,$centro_bar,$medico_bar);
	$category = array();
	$category['name'] = 'Nacionalidad';

	$series1 = array();
	$series1['name'] = 'Total';


	foreach ($query1 as $row)
	{
	$category['data'][] =$row->Nacionalidad;
	$series1['data'][] = $row->Total;

	}

	$result = array();
	array_push($result,$category);
	array_push($result,$series1);


	print json_encode($result, JSON_NUMERIC_CHECK);
	}


public function getDateMedicoFechaChart()
{
$id_medico=$this->input->post('id_medico');
$sql ="SELECT filter_date FROM  h_c_enfermedad WHERE user_id=$id_medico group by filter_date order by filter_date asc";
$querydate = $this->db->query($sql);
foreach ($querydate->result() as $row){
echo '<option value="" hidden></option>';
echo '<option value="'.$row->filter_date.'">'.date("d-m-Y",strtotime($row->filter_date)).'</option>';
}
}




public function getDateCentroFechaChart()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT filter_date FROM  h_c_enfermedad WHERE centro_medico=$id_centro group by filter_date order by filter_date asc";
$querydate = $this->db->query($sql);
foreach ($querydate->result() as $row){
echo '<option value="" hidden></option>';
echo '<option value="'.$row->filter_date.'">'.date("d-m-Y",strtotime($row->filter_date)).'</option>';

}
}




public function SendHistToPatient(){
$id_pat= $this->input->post('id_pat');
$user_id= $this->input->post('user_id');
$email= $this->input->post('email');
$centro_medico= $this->input->post('centro_medico');
$today=date('Y-m-d');
$user_email=$this->db->select('correo')->where('id_user',$user_id)->get('users')->row('correo');
$patient=$this->db->select('nombre')->where('id_p_a',$id_pat)->get('patients_appointments')->row('nombre');
$centro_name=$this->db->select('name')->where('id_m_c',$centro_medico)->get('medical_centers')->row('name');
$id_enf=$this->db->select('id_enf')->where('historial_id',$id_pat)->order_by('id_enf','desc')->limit(1)->get('h_c_enfermedad')->row('id_enf');
$id_cdia=$this->db->select('id_cdia')->where('historial_id',$id_pat)->order_by('id_cdia','desc')->limit(1)->get('h_c_conclusion_diagno')->row('id_cdia');
$id_sig1=$this->db->select('id_sig')->like('inserted_time',$today)->where('historial_id',$id_pat)->get('h_c_examen_fisico')->row('id_sig');
if($id_sig1==""){
$id_sig=0;
}else{
$id_sig=$id_sig1;
}
$id_patm1=$this->db->select('historial_id')->like('insert_date',$today)->where('historial_id',$id_pat)->get('h_c_indicaciones_medicales')->row('historial_id');
if($id_patm1==""){
$id_patm=0;
}else{
$id_patm=$id_patm1;
}
$id_i_e1=$this->db->select('id_i_e')->like('insert_date',$today)->where('historial_id',$id_pat)->get('h_c_indicaciones_estudio')->row('id_i_e');

if($id_i_e1==""){
$id_i_e=0;
}else{
$id_i_e=$id_i_e1;
}

$id_patl1=$this->db->select('historial_id')->like('insert_time',$today)->get('h_c_indications_labs')->row('historial_id');

if($id_patl1==""){
$id_patl=0;
}else{
$id_patl=$id_patl1;
}


$idssr1=$this->db->select('idssr')->like('date_time',$today)->where('hist_id',$id_pat)->get('h_c_ant_ssr')->row('idssr');

if($idssr1==""){
$idssr=0;
}else{
$idssr=$idssr1;
}

$idobs1=$this->db->select('idobs')->like('inserted_time',$today)->where('hist_id',$id_pat)->get('h_c_ante_obs1')->row('idobs');

if($idobs1==""){
$idobs=0;
}else{
$idobs=$idobs1;
}


$id_oftal1=$this->db->select('id_oftal')->like('inserted_time',$today)->where('id_historial',$id_pat)->get('h_c_oftalmologia')->row('id_oftal');

if($id_oftal1==""){
$id_oftal=0;
}else{
$id_oftal=$id_oftal1;
}


$link_hist="https://www.admedicall.com/printings/printHist/$id_enf/$id_cdia/$id_sig/$id_patm/$id_i_e/$id_patl/$idssr/$idobs/$id_oftal";

$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<style>
.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body style='font-family: 'Playfair Display', serif;'>
Saludos Sr(a).  <span style='text-transform:uppercase'><strong>$patient</strong></span><br/> <br/>
Gracias por la confianza que tiene en <strong>$centro_name</strong>, haga un clic para abrir su historia clínica. <br/>
<br>
$link_hist

<br/><br/><br/>
Atentamente,<br/>
$centro_name
</body>
</html>";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("$email");// change it to yours
$this->email->subject('HISTORIAL CLINICA');
$this->email->message($msg);
$this->email->send();

}

public function noJs(){
	echo "<h1 style='color:red;text-align:center'>JavaScript no está habilitado, por favor revise la configuración de su navegador.</h1>";
}

Public function saveEnfImage(){
  $config['upload_path']="./assets/update";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        //$this->upload->do_upload("file_m_enf");
			if($this->upload->do_upload("file_m_enf")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 400;
            $config['height']= 400;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
         $save = array(
			'id_patient'=>$this->input->post('pat-enf-img'),
			'userid'=>$this->input->post('user-enf-img'),
			'image'=>$data['file_name'],
			'dateinst'=>date("Y-m-d H:i:s")
			);
            $this->db->insert("saveEnfImage",$save);
            echo json_decode($result);        

}
}


Public function update_ncf(){

$where = array(
  'id_ncf' =>$this->input->post('id_ncf')
);
$update = array(
'value'  =>$this->input->post('ncf'),
'vec_fec'  =>$this->input->post('vec_fec')
);
$this->db->where($where);
$this->db->update("ncf",$update);
}


Public function cancel_ncf(){

$where1 = array(
  'ncf_id'=>$this->input->post('id_ncf')
);

$this->db->where($where1);
$this->db->delete('invoice_ars_claims');
//----------------------------------------------------------
$where2 = array(
  'id_ncf'=>$this->input->post('id_ncf')
);

$this->db->where($where2);
$this->db->delete('ncf');

/*

$where = array(
  'id_ncf' =>$this->input->post('id_ncf')
);
$update = array(
'cancel_text'  =>$this->input->post('cancelText'),
  'canceled_by' =>$this->input->post('id_user'),
  'canceled_time' =>date("Y-m-d H:i:s")
);
$this->db->where($where);
$this->db->update("ncf",$update);

*/

}



public function coun_selected_cie10(){
$id_pat=$this->input->get('id_pat');
$user_id=$this->input->get('user_id');
$sql_con ="SELECT id_ce10 FROM hc_save_cied_doc where id_p=$id_pat AND id_doc=$user_id";
$atendido_con = $this->db->query($sql_con);

if($atendido_con->num_rows() >0){
echo "<strong>$atendido_con->num_rows seleccionado(s)</strong><br/>";

foreach($atendido_con->result() as $row){
$cie10=$this->db->select('description')->where('idd',$row->id_ce10)->get('cied')->row('description');
echo "$cie10<hr/>";
}

}

}


public function seguro_plan_tarif()
{
$id_plan= $this->input->post('id');
$id_doctor= $this->input->post('id_doctor');
$data['user']= $this->input->post('user');
$id_seguro=$this->db->select('id_seguro')->where('id',$id_plan)->get('codigo_contrato')->row('id_seguro');
$plan=$this->db->select('plan')->where('id',$id_plan)->get('codigo_contrato')->row('plan');
$data['id_doctor']=$id_doctor;
$data['id_seguro']=$id_seguro;
$data['id_plan']=$plan;
$this->load->view('admin/tarifarios/doctors/seguro_plan_tarif', $data);
}


public function loadSeguroDocTarif()
{
$val = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'id_plan'=>$this->input->post('id_plan')
);
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$this->input->post('id_seguro');
$data['id_plan']=$this->input->post('id_plan');
$data['user_name']=$this->input->post('user_name');
$data['results']= $this->model_admin->other_seguro_tarif($val);
$this->load->view('admin/tarifarios/doctors/loadSeguroDocTarif', $data);
}


public function DeleteAllTarif()
{

$delete = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'plan'=>$this->input->post('id_plan')
);

$this->db->where($delete);
$this->db->delete('tarifarios');
//----------------------------------------------------------
$delete2 = array(
  'id_seguro'=>$this->input->post('id_seguro'),
  'id_doctor'=>$this->input->post('id_doctor'),
   'plan'=>$this->input->post('id_plan')
);

$this->db->where($delete2);
$this->db->delete('codigo_contrato');
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
   'updated_by'=>$this->input->post('user_name'),
   'updated_date'=>$updated_date
);
$this->model_admin->save_edit_tarif($id,$data);


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




public function seguro_tarif_sin_plan()
{
$data['id_doctor']=$this->input->post('id_doctor');
$data['id_seguro']=$this->input->post('id_seguro');
$data['user_name']=$this->input->post('user');
$data['idPlan']=$this->input->post('idPlan');
 //$this->load_tarif_doc_form();
$this->load->view('admin/tarifarios/doctors/seguro_tarif_sin_plan', $data);
}




public function constant_load_seguro()
{

$doct_tarif=$this->input->post('id_doctor');
$id_seguro=$this->input->post('id_seguro');
$data['user_name']=$this->input->post('user');
$perfil=$this->db->select('perfil')->where('id_user',$this->input->post('user'))->get('users')->row('perfil');
if($perfil=="Medico"){
$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped_med($doct_tarif,$id_seguro);
}else{
$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped($doct_tarif);
}
$this->load->view('admin/tarifarios/doctors/constant_loading_seguro',$data);
}



public function loadPlanTarifarios(){
$id_seguro=$this->input->post('id_seguro');
$id_doctor=$this->input->post('id_doctor');
$sqlpl ="SELECT id, name from seguro_plan";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi)
{
$plan=$this->db->select('plan')->where('id_doctor',$id_doctor)->where('id_seguro',$id_seguro)->get('codigo_contrato')->row('plan');
if($rowpi->id==$plan){
	$disabled='disabled';
}else{
$disabled='';

}

echo "<option $disabled value='$rowpi->id'>$rowpi->name</option>";
}

}

public function loadCentroTarifariosPrivado(){
$id_doctor=$this->input->post('id_doctor');
$id_seguro=$this->input->post('id_seguro');
$sqlpl ="SELECT id_centro from doctor_agenda_test where id_doctor=$id_doctor group by id_centro";
$queryp = $this->db->query($sqlpl);
foreach($queryp->result() as $rowpi){
$centro=$this->db->select('plan')->where('id_doctor',$id_doctor)->where('id_seguro',$id_seguro)->where('plan',$rowpi->id_centro)->get('codigo_contrato')->row('plan');
$centro_name=$this->db->select('name')->where('id_m_c',$rowpi->id_centro)->get('medical_centers')->row('name');
if($rowpi->id_centro==$centro){
	$disabled='disabled';
}else{
$disabled='';

}
echo "<option $disabled value='$rowpi->id_centro'>$centro_name</option>";

}
}


public function load_doc_seguro(){
$id_doctor=$this->input->post('id_doctor');
$sql ="SELECT seguro_medico  FROM  doctor_seguro WHERE id_doctor=$id_doctor";
$query= $this->db->query($sql);
echo "<option value=''></option>";
foreach ($query->result() as $mes){
$seguro=$this->db->select('title')->where('id_sm',$mes->seguro_medico)->get('seguro_medico')->row('title');
$id_seguro=$this->db->select('id_seguro')->where('id_doctor',$id_doctor)->where('id_seguro',$mes->seguro_medico)->get('tarifarios')->row('id_seguro');
if($id_seguro==$mes->seguro_medico){
	$disabled='disabled';
}else{
$disabled='';

}

echo "<option $disabled value='$mes->seguro_medico'>$seguro</option>";

}

}




public function centroPrivadoSeguro()
{
$data['id_centro']= $this->input->post('id');
$data['id_seguro']= $this->input->post('id_seguro');
$data['id_doctor']=$this->input->post('id_doctor');

$this->load->view('admin/tarifarios/doctors/centroPrivadoSeguro', $data);
}








public function saveNewTarifMedico(){
$data = array(
	'codigo'=>$this->input->post('cups'),
	'simon'=>$this->input->post('simons'),
	'procedimiento'=>$this->input->post('procedimiento'),
	'id_categoria'=>$this->input->post('categoria'),
	'monto'=>$this->input->post('monto'),
	'id_doctor'=>$this->input->post('id_doctor'),
	'id_seguro'=>$this->input->post('id_seguro'),
	'plan'=>$this->input->post('plan'),
	'inserted_by'=>$this->input->post('id_user'),
	'inserted_date'=>date("Y-m-d H:i:s"),
	'updated_by'=>$this->input->post('id_user'),
	'updated_date'=>date("Y-m-d H:i:s")
	);
$this->model_admin->saveNewTarifMedico($data);

}



public function prueba()
{
$doct_tarif=372;
$data['user_name']=1;
$data['seguro_doc_tarif_grouped']=$this->model_admin->seguro_doc_tarif_grouped($doct_tarif);
$this->load->view('prueba',$data);
}

public function paginateMed()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$data['direction']=$this->input->post('direction');
$this->load->view('admin/historial-medical1/orden-medica/paginate/paginate-med', $data);
}

public function paginateEst()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$data['direction']=$this->input->post('direction');
$this->load->view('admin/historial-medical1/orden-medica/paginate/paginate-est', $data);
}

public function paginateLab()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$data['direction']=$this->input->post('direction');
$this->load->view('admin/historial-medical1/orden-medica/paginate/paginate-lab', $data);
}


public function paginaMedGen()
{
$data['idsala']=$this->input->post('idsala');
$data['perfil']=$this->input->post('perfil');
$data['user_id']=$this->input->post('id_user');
$this->load->view('admin/historial-medical1/orden-medica/paginate/paginate-ord-med', $data);
}


public function paginate_new_ord_med()
{
$data['user_id']=$this->uri->segment(3);
$data['id_patient']=$this->uri->segment(4);
$data['idsala']=$this->uri->segment(5);
$data['centro']=$this->uri->segment(6);
$data['direction']=$this->uri->segment(7);
$data['direct']=$this->uri->segment(8);
$data['id_em']=$this->uri->segment(9);
if($this->uri->segment(8)==1){
	$text='Agregar Nuevo medicamento';
}elseif($this->uri->segment(8)==2){
$text='Agregar Nuevo estudio';	
}
elseif($this->uri->segment(8)==3){
$text='Agregar Nuevo laboratorio';	
}else{
$text='Agregar Nuevas medidas generales';	
}
$data['text']=$text;
$this->load->view('admin/historial-medical1/orden-medica/paginate/paginate_new_ord_med', $data);
}

public function listServicio()
{
$id_doctor= $this->input->post('id_doctor');
if($this->input->post('perfil')=='Medico'){
 $sql2 ="SELECT * FROM products WHERE id_doctor=$id_doctor ORDER BY id DESC";
}else{
 $sql2 ="SELECT * FROM products  ORDER BY id DESC";	
}
 $data['query2']= $this->db->query($sql2);
 $data['id_doctor']=$id_doctor;
 $data['perfil']=$this->input->post('perfil');
 $this->load->view('medico/payment/servicio',$data);
}

public function savePrecioPayPal()
{
$save = array(
'id_doctor'=>$this->input->post('id_doctor'),
'name'=>$this->input->post('servicio'),
'image'=>'',
'price'=>$this->input->post('precio'),
'status'=>1
);
$this->db->insert("products",$save);
}


public function updateServicePayPal(){
$id  = $this->input->post('id');

$data = array(
'name'=> $this->input->post('edit-name'),
'price'=> $this->input->post('edit-precio')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("products",$data);

}


public function deleteServicePayPal()
{
//------------delete when enter only centro---------------------------------------------------
$where = array(
  'id'=>$this->input->post('id')
);

$this->db->where($where);
$this->db->delete('products');
}


Public function saveSello(){
	$doc = $this->input->post('doc');
  $config['upload_path']="./assets/update";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("selloimage")){
            $data = $this->upload->data();
 
            //Resize and Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/update/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 250;
            $config['height']= 250;
            $config['new_image']= './assets/update/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
			$save = array(
			'sello'=>$data['file_name'],
			'doc'=>$doc
			);
			$this->db->insert("doctor_sello",$save);
$upload = '<div id="divMsg" class="alert alert-success" > <strong>Guardados con exito</strong></div>';
}else{
$upload='error';	
}
echo $upload;
}



Public function removeSello(){
$answerid=$this->input->post('answerid');
$id=$this->input->post('id');
if($answerid !=2){
$sello=$this->db->select('sello')->where('doc',$id)->where('dist',$answerid)->get('doctor_sello')->row('sello');	
unlink("assets/update/".$sello);	
		
$where = array(
'doc'=>$this->input->post('id'),
'dist'=>$answerid
);

$this->db->where($where);
$this->db->delete('doctor_sello');
}else{
$upload_dir = './assets/update/';
$file2 = $upload_dir ."278-1.png";
unlink($file2);	
}
}



function emailUserToPay(){
$id_doc=$this->input->post('id');
$data = array(
'cuenta_gratis'=>1,
'plazo'=>''
);

$where = array(
'id_user' =>$id_doc
);
$this->db->where($where);
$this->db->update("users",$data);


//-------------------------------DOCTOR INFO------------------------------------------------------

$email=$this->input->post('email');
$link='href="'.base_url().'paypal/doctor_account_payment_/'.$id_doc.'/1"';
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<meta charset='utf-8'>
<body >

<p style='font-family: 'Playfair Display', serif;'>
Querido medico,
GICRE se alegra de tenerle como uno de sus usuarios, favor elige el plan de pago que le conviene para usar la plataforma.
<a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;margin: 4px 2px;cursor: pointer;' $link >IR A MI CUENTA</a>

</p>

</body>
</html>";
//-----------SEND EMAIL TO THE DOCTOR
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject("Mensaje de GICRE");
$this->email->message($msg);
$this->email->send();


}


public function sendLinkToPatientForSingning($id_pat,$idfac,$id_centro,$id_seguro,$id_medico){

$centro=$this->db->select('name')->where('id_m_c',$id_centro)->get('medical_centers')->row('name');

$doctor=$this->db->select('name,correo')->where('id_user',$id_medico)->get('users')->row_array();
$doc=$doctor['name'];
$doccorreo=$doctor['correo'];
$seguron=$this->db->select('title')->where('id_sm',$id_seguro)->get('seguro_medico')->row('title');

$idasitente=$this->db->select('created_by')->where('idfac',$idfac)->get('factura')->row('created_by');
if($id_medico !=$idasitente){
$emailasist=$this->db->select('correo')->where('id_user',$idasitente)->get('users')->row('correo');	
$ifcorreoasits="correo electrónico del asistente médico: $emailasist";
}else{
$emailasist='';	
$ifcorreoasits='';	
}
$email=$this->db->select('email')->where('id_p_a',$id_pat)->get('patients_appointments')->row('email'); 

echo "<h2 style='text-align:center'>Enviamos un enlace por correo electrónico  para realizar la firma del paciente:<br/>
correo electrónico del paciente: $email<br/>
correo electrónico del médico: $doccorreo<br/>
$ifcorreoasits
</h2>";




$link="href='https://www.admedicall.com/printings/sendLinkToPatientForSingning/$id_pat/$idfac/'";

$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);
$msg ="
<html>
<style>
.button {
  background-color: #008CBA;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body style='font-family: 'Playfair Display', serif;'>
Doctor(a) $doc del centro medico $centro le invita a firmar su factura del seguro medico <strong>$seguron</strong>.
<br>
 <a style='background-color: #4CAF50; border: none; color: white; padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 13px;margin: 4px 2px;cursor: pointer;' $link >Realizar su firma</a>

</body>
</html>";

$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to("$email,$doccorreo,$emailasist");// change it to yours
$this->email->subject('INVITACION PARA FIRMAR');
$this->email->message($msg);
$this->email->send();
}


public function enviarEstudiosToPatient(){
$idpat=$this->input->post('idpat');
$idoc=$this->input->post('doc');
$config = Array(
'protocol' => 'smtp',
'smtp_host' => '162.144.158.119',
'smtp_port' => 26,
'smtp_user' => 'soporte@admedicall.com', // change it to yours
'smtp_pass' => 'sopote_adm123QW', // change it to yours
'mailtype' => 'html',
'charset' => 'iso-8859-1',
'wordwrap' => TRUE
);


$email=$this->db->select('email')->where('id_p_a',$idpat)->get('patients_appointments')->row('email'); 

$doc=$this->db->select('name')->where('id_user',$idoc)->get('users')->row('name'); 

//---------------------------------------------------------------------------------

$chars = "a1b2c3d4e5f67gh0i9jk2lm3nop0qrs19tuv7w4xy80zAB4CD8E06FGH4IJ1KLW3XYZ0189MNOP2QRS1T9UV$id_ind";
$codigo = substr( str_shuffle( $chars ), 0, 6);
$codigocpt =md5($codigo);
//---------------------------------------------------------------------------------------------------------
$link='href="https://www.admedicall.com/navigation/search_estudios"';	
$message = // contents of report in $message
"
<html>
<head>

</head>
<body>
<div>
Usted ha recibido de parte del doctor $doc el código # <strong>$codigo</strong> después de una consulta, favor presentar este número al farmacéutico, si desea ver su indicación del clic Puede entrar el código para ver su receta.

<br/><a $link>Puede entrar el código para ver sus estudios</a>
 </div>    
</body>
</html>";

$title="Mensage del doc. $doc";
$this->load->library('email', $config);
$this->email->set_newline("\r\n");
$this->email->set_mailtype("html");
$this->email->from("soporte@admedicall.com"); // change it to yours
$this->email->to($email);// change it to yours
$this->email->subject($title);
$this->email->message($message);
$this->email->send();

$last_id_estudio=$this->db->select('id_i_e')->where('historial_id',$idpat)->where('operator',$idoc)->order_by('id_i_e','desc')->limit(1)->get('h_c_indicaciones_estudio')->row('id_i_e'); 


	//update recetas
$where = array(
'id_i_e' =>$last_id_estudio
);
$data = array(
'encrypt_estudio'=>$codigocpt
);
$this->db->where($where);
$this->db->update("h_c_indicaciones_estudio",$data);


}

 public function listarGroupLabHist()
{
 $sql ="SELECT * FROM h_c_groupo_lab  WHERE rmvd=0 GROUP BY groupo ORDER BY id DESC";
$data['query']= $this->db->query($sql);
//-----------------------------------------------------------
$data['id_historial'] = $this->input->post('historial_id');
$data['operator'] = $this->input->post('operator');
$data['user_id'] = $this->input->post('user_id');
$data['hist'] = $this->input->post('hist');
$data['emergency_id'] = $this->input->post('emergency_id');
$data['areaid']=$this->db->select('area')->where('id_user',$this->input->post('user_id'))->get('users')->row('area');
//--------------------------------------------------------------------------------------------------------

$this->load->view('admin/historial-medical1/laboratorios/labGroupoHist', $data);
}


 public function groupDetailedLabHist()
{
$groupo=$this->input->post('groupo');
/*$sql ="SELECT *, laboratories.id AS idd FROM laboratories JOIN  h_c_groupo_lab ON laboratories.id=h_c_groupo_lab.lab_id
 WHERE groupo='$groupo' ORDER BY laboratories.id ASC";*/
 
 $sql ="SELECT id, lab_id, lab_name  FROM h_c_groupo_lab  WHERE groupo='$groupo' && rmvd=0  ORDER BY id ASC";
 $data['query'] = $this->db->query($sql);
$data['groupo'] ="$groupo";

//-----------------------------------------------------------
$data['id_historial'] = $this->input->post('historial_id');
$data['operator'] = $this->input->post('operator');
$data['user_id'] = $this->input->post('user_id');
$data['hist'] = $this->input->post('hist');
$data['emergency_id'] = $this->input->post('emergency_id');
$data['areaid']=$this->db->select('area')->where('id_user',$this->input->post('user_id'))->get('users')->row('area');
//--------------------------------------------------------------------------------------------------------

$this->load->view('admin/historial-medical1/laboratorios/groupoLabDatos', $data);
}




 public function listarGroupLab()
{
 $sql ="SELECT * FROM h_c_groupo_lab  WHERE rmvd=0 GROUP BY groupo ORDER BY id DESC";
$data['query']= $this->db->query($sql);

 $this->load->view('admin/medicos/lab-groupo',$data);
}




 public function groupDetailedLab()
{
$groupo=$this->input->post('groupo');
/*
$sql ="SELECT *, laboratories.id AS idd FROM laboratories JOIN  h_c_groupo_lab ON laboratories.id=h_c_groupo_lab.lab_id
 WHERE groupo='$groupo' ORDER BY  h_c_groupo_lab.lab_id ASC";*/
$sql ="SELECT * FROM h_c_groupo_lab  WHERE groupo='$groupo' && rmvd=0 ORDER BY id ASC";
$data['groupo'] ="$groupo";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/medicos/groupo-lab-datas',$data);
}




public function nuevoLab()
{
$save = array(
'name'  =>$this->input->post('nuevolab')
);
$this->db->insert("laboratories",$save);

$id_last=$this->db->insert_id();
  $saveS= array(
	'groupo' =>$this->input->post('groupo'),
	'lab_id' => $id_last,
	'lab_name'  =>$this->input->post('nuevolab')
	

	);

$this->db->insert("h_c_groupo_lab",$saveS);

 $this->db->query("DELETE FROM h_c_groupo_lab WHERE groupo=''");
 $this->db->query("DELETE FROM laboratories WHERE name=''");
	
}





public function nuevoLabGroupo()
{

$lab_name=$this->db->select('name')->where('id',$this->input->post('lab'))->get('laboratories')->row('name');
  $saveS= array(
	'groupo' =>$this->input->post('nuevogroupo'),
	'lab_id' => $this->input->post('lab'),
	'lab_name'  =>$lab_name
	);

$this->db->insert("h_c_groupo_lab",$saveS);
	
}


public function deleteLabGroupo()
{

$lab_name=$this->db->select('name')->where('id',$this->input->post('lab'))->get('laboratories')->row('name');
  $saveS= array(
	'groupo' =>$this->input->post('nuevogroupo'),
	'lab_id' => $this->input->post('lab'),
	'lab_name'  =>$lab_name
	);

$this->db->insert("h_c_groupo_lab",$saveS);


$data = array(
'rmvd'=>1
);

$where = array(
	'groupo' =>$this->input->post('nuevogroupo'),
	'lab_id' => $this->input->post('lab'),
	'lab_name'  =>$lab_name
);
$this->db->where($where);
$this->db->update("h_c_groupo_lab",$data);

	
}






 public function listarLab()
{
	
/*$sql ="SELECT *  FROM laboratories
WHERE id NOT IN
    (SELECT lab_id 
     FROM h_c_groupo_lab) ORDER BY id DESC";*/
$sql ="SELECT *  FROM laboratories WHERE removed=0 ORDER BY id DESC ";
$data['query'] = $this->db->query($sql);
$this->load->view('admin/medicos/lab-datas',$data);
}




public function edit_lab()
{

$data = array(
'name'=> $this->input->post('edit-lab')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("laboratories",$data);

}

public function edit_lab_groupo()
{

$data = array(
'lab_name'=> $this->input->post('edit-lab')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("h_c_groupo_lab",$data);

}

public function edit_est_groupo()
{

$data = array(
'lab_name'=> $this->input->post('edit-lab')
);

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("h_c_groupo_estudios",$data);

}

public function deleteEst()
{
$data = array(
'removed'=>1
);
$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("estudios",$data);

}


public function deleteLab()
{
$data = array(
'removed'=>1
);
$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->update("laboratories",$data);

}

public function deleteLabGrouped()
{

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->delete("h_c_groupo_lab");

}

public function deleteEstGrouped()
{

$where = array(
'id' =>$this->input->post('id')
);
$this->db->where($where);
$this->db->delete("h_c_groupo_estudios");

}



public function deleteGroupoEst()
{

$where = array(
'groupo' =>$this->input->post('groupo')
);
$this->db->where($where);
$this->db->delete("h_c_groupo_estudios");


}



public function deleteGroupo()
{

$where = array(
'groupo' =>$this->input->post('groupo')
);
$this->db->where($where);
$this->db->delete("h_c_groupo_lab");


}



public function load_mapa_cama()
{
$id_centro=$this->input->post('id_centro');

$sqlct ="SELECT * from  mapa_de_cama where centro=$id_centro && cancelar=0 ORDER BY id DESC";
$data['queryct'] = $this->db->query($sqlct);
$this->load->view('admin/centers/mapa-de-cama', $data);
}


public function saveNewMapaCama()
{
	$data= array(
	'sala' =>$this->input->post('sala'),
	'num_cama' => $this->input->post('cama'),
	'servicio' =>$this->input->post('servicio'),
	'centro' =>$this->input->post('centro')
	);

	$this->db->insert("mapa_de_cama",$data);
}

public function deshabilitarCamaMapa(){
		
$update = array(
  'cancelar' =>1
);

$where = array(
  'id'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->update("mapa_de_cama",$update);	

}



 public function saveEditMapaCama(){

$data = array(
'sala' =>$this->input->post('sala'),
'num_cama' => $this->input->post('num_cama'),
'servicio' =>$this->input->post('servicio')
);

$where = array(
  'id'=> $this->input->post('id')
);

$this->db->where($where);
$this->db->update("mapa_de_cama",$data);	

}



public function getHospSala()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT sala FROM  mapa_de_cama WHERE centro=$id_centro GROUP BY sala";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->sala.'">'.$rf->sala.'</option>';

}
}

public function getHospServ()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT servicio FROM  mapa_de_cama WHERE centro=$id_centro GROUP BY servicio";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->servicio.'">'.$rf->servicio.'</option>';

}
}

public function getHospCama()
{
$id_centro=$this->input->post('id_centro');
$sql ="SELECT num_cama FROM  mapa_de_cama WHERE centro=$id_centro  GROUP BY num_cama";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
echo '<option value="" hidden></option>';
echo '<option value="'.$rf->num_cama.'">'.$rf->num_cama.'</option>';

}
}
//------------------------------------------------------------------------------------------------



}
