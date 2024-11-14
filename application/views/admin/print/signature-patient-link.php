<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Firma</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
#signature{

height: auto;
border: 1px solid black;
}

.center {
  margin: auto;

  text-align:center
}
</style>
</head>
<body class='center'>
<div class='container'>
<?php
$h3="$patiente";
$h2="PACIENTE <br/>$imgpat";
$info=$this->db->select('medico2,center_id,seguro')->where('idfac',$id_fac)->get('factura')->row_array();

$centro=$this->db->select('name')->where('id_m_c',$info['center_id'])->get('medical_centers')->row('name');

$doc=$this->db->select('name')->where('id_user',$info['medico2'])->get('users')->row('name');

$seguron=$this->db->select('title,logo')->where('id_sm',$info['seguro'])->get('seguro_medico')->row_array();

if($seguron['logo']==""){
	$logoseg="";
}
else{
$logoseg='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';	
}


$showpage=$this->db->select('id_fac,firma')->where('id_fac',$id_fac)->get('factura_patient_firma')->row_array();
if($showpage['id_fac']){
$firmadone="";	
$firmanotdone="none";
}else{
$firmadone="none";	
$firmanotdone="";	
}

 ?>
 <div id='show-error'></div>
 <form  action="<?php echo site_url("printings/saveSignatureCreatedByPatient");?>"  method="post">
<table align="center">
<tr>
 <td><h1><?=$seguron['title']?></h1></td>
 </tr>
 <tr>
 <td><?=$logoseg?></td>
 </tr>
<tr>
 <td><h1>FIRMA</h1></td>
 </tr>
 <tr>
 <td>
<p><?=$h2?></p>
</td>
</tr>
<td>
<h3><?=$h3?></h3>
</td>
</tr>
<tr>
<td style='display:<?=$firmanotdone?>;'>
<p>Doctor(a) <?=$doc?> del centro medico <?=$centro?> le invita a firmar su factura</p>
</td>
</tr>
<!-- Signature area -->
<tr>
<td style='display:<?=$firmadone?>;color:green'>
Gracias, La firma ya esta guardada con éxito.
<img  style="width:300px;" src="<?= base_url();?>/assets/update/<?=$showpage['firma']?>"  />
</td>
</tr>
</table>
<div style='display:<?=$firmanotdone?>'>
<div id="signature"></div>
<br/>
<table align="center">
<tr>
<td>
<input type='button' id='click' class="btn btn-primary btn-md" style='margin-top:-5px;margin-left:-140px' value='Guardar Firma'>
</td>
<td>
<div style='position:absolute' id='msg'></div>
</td>
</tr>
</table>
<input type="hidden" name="hdnSignature" id="hdnSignature" />
<input type="hidden" name="id_fac" value="<?=$id_fac?>" />
</div>
</form>

<br/>
<!--
<textarea id='output'></textarea><br/>-->
</div>

<!-- Preview image -->
<img src='' id='sign_prev' style='display: none;' />
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jsignature.js" charset="UTF-8"></script>
<script>
$(document).ready(function() {

 // Initialize jSignature
 var $sigdiv = $("#signature").jSignature({
	 'UndoButton':true,
	   'background-color': 'transparent',
       'decor-color': 'transparent',
	 });

 $('#click').click(function(){
  // Get response of type image
  var isSignatureProvided=$('#signature').jSignature('getData','base30')[1].length>1?true:false;
    if (isSignatureProvided) {
  var signimage = $sigdiv.jSignature('getData', 'image');
 $('#hdnSignature').val(signimage[1]);
$("#msg").text("");
  // Storing in textarea
 // $('#output').val(signimage);
document.forms[0].submit();
  // Alter image source 
  $('#sign_prev').attr('src',"data:"+signimage);
  $('#sign_prev').show();
	  
 }else{
$("#msg").text("Firma vacía").css('color','red');	 
 }
  
 });
 
 //-------save to database---------------------------------
 
 
 
 
});


</script> 
</body>
</html>
