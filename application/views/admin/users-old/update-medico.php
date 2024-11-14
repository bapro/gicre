<style>
.active {
    color: green;
	 text-decoration: underline;
	 text-decoration-color: green;
}
</style>

 <div class="container" id="background_">
   <div id="show-errorse"></div>
 <div class="row">
 <div class="col-md-9">

 </div>
 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
 </div>
  
 </div>
 
 <?php echo $this->session->flashdata('success_msg');
echo $id_cu_us; 
 
 ?>
<div class="col-md-4">

<?php
foreach($editUser as $row)
$user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->insert_date));
$updated_time = date("d-m-Y H:i:s", strtotime($row->update_date));
echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)";

if($row->perfil=='Asistente Medico'){
$hide_for_asi="style='display:none'";	
$hide_for_doc="";
}else{
$hide_for_asi="";
$hide_for_doc="style='display:none'";	
}

echo "<hr/>";
$first_inserted_time=$this->db->select('inserted_time')->where('inserted_by',$row->id_user)->where('signopsis !=',"")->order_by('id_enf','ASC')->limit(1)->get('h_c_sinopsis')->row('inserted_time'); 

?>
<div class="alert alert-info">Fecha de creación de la primera historia clinica: <?=date("d-m-Y H:i:s", strtotime($first_inserted_time))?></div>

</div>

<div class="col-md-8">
<label class="control-label">Cambiar Contraseña </label>

 <form class="form-inline"  >

  <button class='btn btn-primary btn-sm' style='font-size:9px' type='button' id='generarCont'>Generar</button>
   <input id="pass1"  style="width:190px" type="password" class="form-control new-pass" >

   <input id="pass2" style="width:190px" type="password" class="form-control new-pass" >
     <button  class="btn btn-default btn-sm" type="button" id="verPassword"><i class="fa fa-eye" aria-hidden="true"></i></button>
   <button  class="btn btn-success btn-sm" type="button" id="savePassw" >Cambiar</button>
   <span style="color:red" id="passwordResult"></span>

<hr/>
<h4>Agregar Datos Por Web Service </h4>

<div class="form-group" <?=$hide_for_doc?>>
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7">
<select class="form-control select2"   id="centro_medico_web" >
<?php
foreach($centro_medico as $ce){

echo "<option value=".$ce->id_m_c.">".$ce->name."</option>";
	
}
?>

 </select>
 </div>
 </div>

 <div class="form-group">
<label class="control-label col-sm-3">Seguro medico</label>
<div class="col-sm-9">
 
<select class="form-control select4" id="seguroWeb">
<option value=""></option>
<?php 

foreach($seguro_medico as $rs)
{

echo "<option value='$rs->id_sm'>$rs->title</option>";
}
?>
</select>
 </div>
 </div>

 <div class="form-group">
<label class="control-label col-sm-3">Contraseña</label>

 <div class="col-sm-9">
<input type="text" id="passSegWeb" class="form-control" placeholder="Contraseña Del Seguro Medico" />
 <button type="button" style='font-size:12px' id='btnSavePasSeg' class="btn btn-default btn-sm">Guardar</button>
 </div>

 </div>
 </form>

<span style="color:red;float:right" id="saveWebResult"></span>
	
</div>

<div id="success" class='alert alert-success' style="text-aling:center;display:none">Usuario se guada con exito.</div>
<br/>

<div class="col-md-12 show_centro" >
<hr/>
<form   class="form-horizontal"  method="post" id="form_doc" action="<?php echo site_url('doctor_back_end/saveDoctorUpdate');?>" enctype="multipart/form-data"> 
<br/>
<div class="row">
<h3   class="h3">Datos del usuario</h3>
<input class="form-control" value="<?=$row->id_user?>" name="id_user" id="id_user"  type="hidden">
<div class="form-group">
<label class="control-label col-sm-3" >Perfil</label>
<div class="col-sm-2">
<input class="form-control" value="<?=$row->perfil?>" name="perfil"  type="text" disabled>
</div>
</div>
<div class="form-group" <?=$hide?>>
<label class="control-label col-sm-3">Pago por paypal - Cuenta Gratis</label>
<div class="col-sm-6">
<table style='width:100%;border:1px solid #38a7bb;'>
<tr style='background:white'>
<td style='text-align:left;font-size:14px;'>
<?php

if($row->cuenta_gratis==1){
$checked1='checked';
$disagr='disabled';	
$ifpayc='Cuenta no ha pagado';
}else{
$checked1='';	
$ifpayc='';
}

if($row->cuenta_gratis==0){
$checked='checked';
$disagr='';	
}else{
$checked='';	

}


if($row->payment_plan >0 && $row->cuenta_gratis==1){
$product=$this->db->select('plan,precio')->where('id',$row->payment_plan)->get('medico_precio_plan')->row_array();
$plan=$product['plan'];$precio=$product['precio'];
$ifpay="Plan: $plan $$precio USD";	
$ifpayc='';
$checked='checked';
}else{
$ifpay='';	


}
?>
&nbsp;<input type="radio" name="plan-gratis" class='plan-gratis' value='0' <?=$checked?> <?=$disagr?>> <label>si</label>
&nbsp;<input type="radio" name="plan-gratis" class='plan-gratis' value='1' <?=$checked1?> <?=$disagr?>> <label>no</label>
</td> 
<td style='text-align:left;color:green' id='send-email'><?=$ifpay?> <?=$ifpayc?></td>
</tr>
</table>
</div>
</div>
<div class="form-group" <?=$hide?>>
<label class="control-label col-sm-3">Pago por otro medio - Cuenta Gratis</label>
<div class="col-sm-6">
<table style='width:100%;border:1px solid #38a7bb;'>
<tr style='background:white'>
<td style='text-align:left;font-size:14px;'>
&nbsp;<input type="radio" name='other-means' class='other-means' value='0' <?=$checked?> <?=$disagr?>> <label>si</label>
&nbsp;<input type="radio" name='other-means' class='other-means' value='1' <?=$checked1?> <?=$disagr?>> <label>no</label>
</td> 
<?php
if($row->cuenta_gratis==1){
$disedit='';

}else{
$disedit='none';	

}
?>
<td style="color:red;display:<?=$disedit?>"> 

<a  href="#" data-toggle="modal"   data-target="#myModalPay" ><i class="fa fa-pencil"></i>  Editar</a>
 </td> 
</tr>
</table>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" >Nombres Apellidos</label>
<div class="col-sm-5">
<input class="form-control required" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" >
</div>
</div>

<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Firma</label>
<div class="col-sm-5">
 <?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  class="img-fluid" style="border:1px solid #38a7bb;width:30%" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<a  <?=$hide_for_asi?> href="<?php echo site_url("printings/signature/$id_user/1");?>"><i>Cambiar Mi Firma</i></a>
<?php
} else {
	?>
<a style="color:red" <?=$hide_for_asi?> href="<?php echo site_url("printings/signature/$id_user/1");?>"><i>Crear Mi Firma</i></a>
<?php
}
?>
</div>
</div>


<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Sello</label>
<div class="col-sm-3">
<?php 
$sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='0'><i> Quita El Sello</i></a><br/>
<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $sello_doc; ?>"  />
<?php
} else {?>

<input type="file" name="selloimage" id="file_m_enf" class="file_m_enf form-control" onchange="preview_sello(event)"   accept=".png, .jpg, .jpeg"  >
 <img id="output_image" style="width:150px;" class='rezise-load-image' />
  <input type="hidden" name="if-selloimage" id="if-selloimage" value="0" />
<?php
}
?>
</div>
</div>

<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Logo Tipo</label>
<div class="col-sm-3">

<?php 
$logo_tipo=$this->db->select('sello')->where('doc',$id_user)->where('dist',1)->get('doctor_sello')->row('sello');

if ($logo_tipo) {?>
<a style="color:red;cursor:pointer" class="remove-logo-tipo-o-sello" id='1'><i> Quita El Logo Tipoo</i></a><br/>
<img  style="width:150px;" src="<?= base_url();?>/assets/update/<?php echo $logo_tipo; ?>"  />
<?php
} else {?>

<input type="file" name="logo-tipo" id="logo-tipo" class="logo-tipo form-control" onchange="preview_logo_tipo(event)"   accept=".png, .jpg, .jpeg"  >
  <img id="output_logo_tipo" style="width:150px;"  class='rezise-load-image' />
 <input type="hidden" name="if-logo-tipo-empty" id="if-logo-tipo-empty" value="0" />
<?php
}
?>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Cedula</label>
<div class="col-sm-3">
<input type="text" class="form-control required" id="cedula"  name="cedula" value="<?=$row->cedula?>"  >
</div>
</div>
 <a name="update_phone_n"></a>

<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Exequatur</label>
<div class="col-sm-3">
<input type="text" class="form-control required" id="exequatur"  name="exequatur" value="<?=$row->exequatur?>"  >
</div>
</div>
<?php
if($perfil=="Admin"){
?>
<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-3">
<select class="form-control select2"    name="especialidad">
<?php
foreach($especialidades as $esp){
	
	if($row->area == $esp->id_ar) {
		echo "<option value=".$esp->id_ar." selected>".$esp->title_area."</option>";
	} else {
		echo "<option value=".$esp->id_ar.">".$esp->title_area."</option>";
	}
}
?>
 </select>
 
 </div>
 </div>
<?php
}else{
	?>
<input name="especialidad" type="hidden" value="<?=$row->area?>" />	
<?php
}
?>

<div class="form-group" id="second" <?=$hide_for_asi?>>
<label class="control-label col-sm-3">Seguro médico</label>
<div class="col-sm-7">
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $rs)
{
$id_doctor=$this->db->select('id_doctor')->where('id_doctor',$row->id_user)
 ->where('seguro_medico',$rs->id_sm)
 ->get('doctor_seguro')->row('id_doctor');
		if($row->id_user==$id_doctor){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$rs->id_sm.' $selected>$rs->title</option>";
}
?>
</select>
</div>
</div>

 <div class="form-group" >
<label class="control-label col-sm-3" >Correo electronico</label>
<div class="col-sm-4">
<input  class="form-control email-clear required" id="email" style="text-transform:lowercase"  name="email" value="<?=$row->correo?>" type="email" autocomplete="off" >
<div id="emailInfo"></div>
</div>
</div>


<div class="form-group" >
<label class="control-label col-sm-3">Teléfono celular <i class="fa fa-whatsapp" style='color:green;font-size:20px'  aria-hidden="true"></i></label>
<div class="col-sm-3" >
<input type="text" class="form-control required" id="primer_tel" name="primer_tel" value="<?=$row->cell_phone?>" >
</div>
</div>

<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Extension</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="extension" name="extension"  value="<?=$row->extension?>"  >
</div>
</div>
<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Enlace de pago</label>
<div class="col-sm-9">
<input type="text" class="form-control"  name="link_pago"  value="<?=$row->link_pago?>"  >
</div>
</div>

<div class="form-group" <?=$hide_for_asi?>>
<label class="control-label col-sm-3" >Enlace de video de conf.</label>
<div class="col-sm-9">
<input type="text" class="form-control"  name="link_video_conf"  value="<?=$row->link_video_conf?>"  >
</div>
</div>

</div>
 <div class="row  col-sm-offset-3" >
<button type="submit" id="send"  class="btn btn-primary">Actualizar</button> 
<br/><br/>
</div>
 <div class="row" <?=$hide_for_asi?>>
  <hr id="hr_ad"/>
  <div class="form-group">
<label class="control-label col-sm-3">Asistente Medico</label>
<div class="col-sm-9">

<?php
$sqlam ="SELECT  id_asdoc FROM centro_doc_as WHERE id_doctor =$id_user group by id_asdoc";
 $queryam= $this->db->query($sqlam);
 foreach ($queryam->result() as $rowam){
	$asistente_med=$this->db->select('name,cell_phone')->where('id_user',$rowam->id_asdoc)->get('users')->row_array();

echo $asistente_med['name'] ." (Num. Tel. ".$asistente_med['cell_phone'].")<hr/>";
}
?>

 
 </div>
 </div>
 <div class="col-md-8" >
 
  <h4   class="h4">Haga un clic sobre el centro medico para editar su agenda</h4>
<div style="overflow-x:auto;">
<?php
$sql ="SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id_user group by id_centro";
$query= $this->db->query($sql);
?>
<table  class='table table-striped' id="Navigation">
<tr> 
<?php
foreach ($query->result() as $rowct){
	$centro= $this->db->select('name, type')->where('id_m_c',$rowct->id_centro)->get('medical_centers')->row_array();
	?>
<td>
<i id='<?=$rowct->id_centro?>' style="cursor:pointer;color:red" title="quitar este centro medico <?=$rowct->id_centro?>" class="fa fa-remove delete-centro"></i>
 <a style='cursor:pointer' id="<?php echo $rowct->id_centro?>" class="select-centro"><?=$centro['name']?> <em>(<?=$centro['type']?>)</em></a></td>
<?php
}

?>
</tr>
</table>
 </div>
  </div>
<div class="col-md-4">
 <h4   class="h4">Seleccionar el centro medico para crear su agenda</h4>
 
<select class="form-control select3" id="centroSelect">
<option value=''>Seleccionar</option>
<?php 
 $sql2 ="SELECT id_m_c, name FROM medical_centers WHERE id_m_c NOT IN (SELECT id_centro FROM  doctor_agenda_test WHERE id_doctor=$id_user group by id_centro) $admin_centro";
    $query2 = $this->db->query($sql2);
foreach ($query2->result() as $rowcent)
{
echo "<option value='$rowcent->id_m_c'>$rowcent->name</option>";
}	

?>
</select>
</div>
 </div>
  <div id="load-agenda"> </div>
</div>

</form>

</div>
</div>
<hr/>

 <?php 
 
        $this->load->view('footer');


 ?>
 
 <div class="modal fade" id="myModalPay" tabindex="-1" role="dialog" >
<div class="modal-dialog "  >

<div class="modal-content" >
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Una vez que médico pague por otro medio aplica su plan de pago en el sistema para que el pueda loguearse</h4>
 </div>

<div class="modal-body" style=" " >
<form method="post" class="form-horizontal" action="<?php echo site_url('admin/payByOtherMeans');?>">

<div class="form-group">
<label class="control-label col-sm-2">ELEGIR PLAN DE PAGO</label>
<div class="col-sm-8">
<input name='this-doc-plan' value="<?=$id_user?>" type='hidden'/>
<table style='width:100%;border:1px solid #38a7bb;'>
<?php 
$sqlot="SELECT * FROM medico_precio_plan ORDER BY precio ASC";
$querysqlot=$this->db->query($sqlot);
foreach($querysqlot->result() as $rowot)
{
	if($rowot->id==$row->payment_plan){
	$checkedot='checked';	
	}else{
	$checkedot='';	
	}
?>
<tr>
<td style='text-align:left;font-size:14px;background:white'>&nbsp;<input type="radio" name="plan-pago" <?=$checkedot?> value='<?=$rowot->id?>'> <label><?=$rowot->plan?> </label></td> <td style='font-size:14px;background:white'><label>$<?=$rowot->precio?> USD</label></td>
</tr>
<?php } ?>
</table>
</div>
</div>
<div class="form-group">
<div class="col-sm-12 col-md-offset-2">
<button type="sumbmit" class="btn btn-primary btn-xs" disabled id='disabled-plan-btn'> Enviar</button>

</div>
<br/>
</div>

</form>

</div>
</div>
</div>
</div>

<?php 
$data['id_cu_us']=$id_cu_us;
$data['perfil']=$perfil;
?>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<?php $this->load->view('admin/users/footer-web-service-password', $data); ?>
<script> 

var doc_ph = document.getElementById('primer_tel');

doc_ph.addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
if (doc_ph.value.length >= 14) {
document.getElementById("send").disabled = false;
// doc_ph.value = doc_ph.value.slice(0, 10);
}else{
document.getElementById("send").disabled = true;
}
})






 $('#verPassword').click(function() {
   $(this).children().toggleClass('fa fa-eye fa fa-eye-slash ');
	$('.new-pass').prop('type', $('.new-pass').prop('type') === 'password' ? 'text' : 'password');
  });



function random_password_generate(max,min)
{
    var passwordChars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#@!%&()/";
    var randPwLen = Math.floor(Math.random() * (max - min + 1)) + min;
    var randPassword = Array(randPwLen).fill(passwordChars).map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
    return randPassword;
}
  
 $("#generarCont").on('click', function(event) {   
 $(".new-pass").val(random_password_generate(16,8));
});		


$("#savePassw").on('click', function(event) {
event.preventDefault();
var pass1 =$("#pass1").val();
var pass2 =$("#pass2").val();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/NewPassword",
data: {pass1:pass1,pass2:pass2,id_user:<?=$id_cu_us?>,id_table:<?=$id_user?>},
method:"POST",
 dataType: 'json',
success:function(response){
if(response.status == 0){
$('#passwordResult').html('<p class="alert alert-danger ">'+response.message+'</p>');
}else if(response.status == 2){
	$('#passwordResult').html('<p class="alert alert-danger ">'+response.message+'</p>');
}
else{
$('#passwordResult').html('<p class="alert alert-success">'+response.message+'</p>');
setTimeout(function(){
window.location.href = '<?php echo site_url('login/medico_logout');?>/'
}, 3000);
}
} 
});
});




checkIfPlan();
function checkIfPlan(){
if ($('input:radio[name="plan-pago"]').is(':checked')) {
           $("#disabled-plan-btn").prop('disabled',false);
        }else{
		 $("#disabled-plan-btn").prop('disabled',true);	
		}
}


$('input:radio[name="plan-pago"]').change(
    function(){
        if ($(this).is(':checked')) {
           $("#disabled-plan-btn").prop('disabled',false);
        }
    });
	
	
	$('input:radio[name="other-means"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 1) {
           $("#myModalPay").modal('show');
        }
    });
//------------------------------------------------------------------------------------------------
 $(".plan-gratis").change(function(){

        var selValue = $("input[type='radio']:checked").val();
         if(selValue==1){
		$.ajax({
		type: "POST",
		url: "<?=base_url('admin_medico/emailUserToPay')?>",
		data: {id:<?=$id_user?>,email:"<?=$row->correo?>",plan:selValue},
		success:function(data){ 
		$("#send-email").html('correo enviado al medico para eligir su plan de pago'); 
		$(".plan-gratis").prop('disabled',true);
		},

		});
		 }

    });




$(".remove-logo-tipo-o-sello").click(function(){
if (confirm("Lo quire quitar ?"))
{ 
var answerid = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/removeSello')?>',
data: {id : <?=$id_user?>,answerid:answerid},
success:function(response) {

location.reload();
 
}
});
}
})



function preview_sello(event) 
{
 var reader = new FileReader();
  var size=$('#file_m_enf')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
  $('#output_image').show();
  $('#if-selloimage').val(1);  
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#file_m_enf').val('');
  $('#if-selloimage').val(0);
 $('#output_image').hide();	  
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}


function preview_logo_tipo(event) 
{
 var reader = new FileReader();
  var size=$('#logo-tipo')[0].files[0].size;
 //alert(size);
 if(size < 3000000){
 reader.onload = function()
 {
  var output = document.getElementById('output_logo_tipo');
  output.src = reader.result;
  $('#output_logo_tipo').show();
  $('#if-logo-tipo-empty').val(1);  
 }
 reader.readAsDataURL(event.target.files[0]);
 output.style.width = (50) + "px";
}else{
  $('#logo-tipo').val('');
 $('#output_logo_tipo').hide();
 $('#if-logo-tipo-empty').val(0); 
	alert('demasiado grande '+ size/1024/1024 + " MB");
}
}

//-----------------------------------------------------------------------------------------


$(document).on('click','.thumb',function(e) {
   // $(this).prev().remove();
    $(this).remove();   
     $('#file_m_enf').val(''); 
$('#btn-send-ac').hide();	 
});

function readImage(file) {
  var reader = new FileReader();
  var image  = new Image();

  reader.readAsDataURL(file);  
  reader.onload = function(_file) {
    image.src = _file.target.result; // url.createObjectURL(file);
    image.onload = function() {
      var w = this.width,
          h = this.height,
          t = file.type, // ext only: // file.type.split('/')[1],
          n = file.name,
          s = ~~(file.size/1024) +'KB';
      $('#uploadPreview').append('<img style="width:250px" src="' + this.src + '" class="thumb">');
	 // alert(s);
    };

    image.onerror= function() {
      alert('Invalid file type: '+ file.type);
    };      
  };

}
$("#file_m_enf").change(function (e) {
  if(this.disabled) {
    return alert('File upload not supported!');
  }

  var F = this.files;
  if (F && F[0]) {
    for (var i = 0; i < F.length; i++) {
      readImage(F[i]);
	  $('#btn-send-ac').show();
	  // $('#file_m_enf').prop('disabled',true);
    }
  }
});






//$('.select-centro').on('click', function(){$(this).css("background-color","yellow");});
var a = document.getElementById('Navigation').getElementsByClassName('active');

$('#Navigation').on('click', 'a', function() {
    if (a[0]) a[0].className = '';
    this.className = 'active';
});



$(".select-centro").click(function(){
var idcentro = $(this).attr('id');
var iddoc = $("#id_user").val();
$("#load-agenda").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('doctor_back_end/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro, perfil:"<?=$perfil?>"},
cache: true,
success:function(data){ 
$("#load-agenda").html(data); 

}  
});
});



$("#centroSelect").change(function(){
$("#Navigation").find("a").removeClass("active");
var idcentro =$(this).val();
var iddoc = $("#id_user").val();
$("#load-agenda").fadeIn().html('<span class="load"> <img  width="20px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
$.ajax({
type: "POST",
url: "<?=base_url('doctor_back_end/getDocAgendaCentro')?>",
data: {iddoc:iddoc,idcentro:idcentro,perfil:"<?=$perfil?>"},
cache: true,
success:function(data){ 
$("#load-agenda").html(data); 

}  
});


});

$.validator.setDefaults({
errorElement: "span",
errorClass: "help-block",
//	validClass: 'stay',

highlight: function (element, errorClass, validClass) {
$(element).addClass(errorClass); //.removeClass(errorClass);
$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
},
unhighlight: function (element, errorClass, validClass) {
$(element).removeClass(errorClass); //.addClass(validClass);
$(element).closest('.form-group').removeClass('has-error').addClass('has-success');
},
errorPlacement: function (error, element) {
if (element.parent('.input-group').length) {
error.insertAfter(element.parent());
} else if (element.hasClass('select2')) {
error.insertAfter(element.next('span'));
}

else {
error.insertAfter(element);
}
}
});


var validator = $("#form_doc").validate();

	
$('.select2').select2({ 
placeholder: "SELECCIONAR"

});

if("<?=$admin_centro?>"==""){
var centro_link = "<a href='<?=base_url('admin/new_centro_medico')?>'>Crear</a>";
}else{
	var centro_link = "";
}

$('.select3').select2({
        allowClear: true,
        escapeMarkup: function (markup) { return markup; },
        placeholder: "SELECCIONAR EL CENTRO MEDICO",
        language: {
            noResults: function () {
                 return $(centro_link);
            }
        }
    });

$('.select4').select2({ 
placeholder: "Elegir Seguro Medico"

});


$("#checkbox2").click(function(){
if($("#checkbox2").is(':checked') ){
$("#e2 > option").prop("selected","selected");
$("#e2").trigger("change");
}else{
$("#e2 > option").removeAttr("selected");
$("#e2").trigger("change");
}
});


var timer = null;
$("#email").keydown(function(){
clearTimeout(timer); 
timer = setTimeout(check_if_email_exist2, 1000)
});

function check_if_email_exist2(){
var email2= $("#email").val();
if(email2 == "") {
$("#emailInfo").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_email_exist?email="+email2, function( data ){
$( "#emailInfo" ).html( data ); 
$( "#emailInfo" ).show(); 		   
});
}
};

	$(".delete-centro").click(function(e){
	e.preventDefault();
	if (confirm("Seguro de borrar ?"))
			{ 
		var id_doctor  = "<?=$id_user?>";
	var el = this;
	
   var del_id = $(this).attr('id');

    $.ajax({
            type:'POST',
            url:'<?=base_url('admin_medico/DeleteDocCentroAgenda')?>',
            data: {iduser:id_doctor,centro_medico:del_id},
            success:function(data) {
	$(el).closest('td').css('background','tomato');
    $(el).closest('td').fadeOut(800, function(){ 
     $(this).remove();
    });

	  }
    });
 };
 });
	
	
</script>
</body>
</html>