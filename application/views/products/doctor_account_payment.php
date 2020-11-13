<body>
<div class="container" style='background-image: linear-gradient(#CCD7F5, #A9F5D0, white)'>
<?php foreach($query->result() as $row) ?>
<div class='alert alert-info text-center'>
Su cuenta ha sido creada, gracia por unirse con nosotros le contacteremos para el seguimiento.
<br/>
Medio de contacto :<strong><?=$row->cell_phone?> | <?=$row->correo?></strong>

</div>
	<h2 style='text-align:center;text-transform:uppercase'>DATOS DE SU CUENTA</h2>
	<div class="col-md-9 col-md-offset-3" >
	<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url("navigation/update_account_doctor");?>">

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2"  >PERFIL</label>
<div class="col-sm-2">
<input  name="id_doctor"  value="<?=$id_doctor?>"  type="hidden" >
<input class="form-control savethisperfil required" name="perfil"  value="MEDICO" style="pointer-events:none" type="text" >
</div>
</div>

<div class="form-group" >
<label class="control-label col-sm-2" >NOMBRES</label>
<div class="col-sm-4">
<input type="text" class="form-control required"   name="nombre" value='<?=$row->name?>'  >
</div>
</div>

<div class="form-group ">
<label class="control-label col-sm-2">EXEQUATUR</label>
<div class="col-sm-2">
<input class="form-control  required" name="exequatur"  value="<?=$row->exequatur?>"  type="text" >

 </div>
 </div>


 <div class="form-group">
<label class="control-label col-sm-2" >CÉDULA</label>
<div class="col-sm-2">
<input type="text" class="form-control"   name="cedula" value='<?=$row->cedula?>'  >
</div>
</div>

<div class="form-group ">
<label class="control-label col-sm-2">ESPECIALIDAD</label>
<div class="col-sm-3">
<select class="form-control select2 required"  name="especialidad"  id="especialidad">
 <option value='<?=$row->area?>'><?=$title_area?></option>
 <?php 

 foreach($especialidades as $rowes)
 { 
 echo '<option value="'.$rowes->id_ar.'">'.$rowes->title_area.'</option>';
 }
 ?>
 </select>
 
 </div>
 </div>	

<!--
<div class="form-group">
<label class="control-label col-sm-2">PLAN DE PAGO</label>
<div class="col-sm-5">
<table style='width:100%;border:1px solid #38a7bb;' class='table'>
<?php 
$sql="SELECT * FROM medico_precio_plan ORDER BY precio ASC";
$query=$this->db->query($sql);
foreach($query->result() as $rowp)
{
	if($rowp->id==$row->payment_plan){
	$pay ="<td style='border:1px solid #38a7bb;'><a style='display:' href='".site_url()."products/pay_account_for_doc/$id_doctor/$rowp->id'  ><img style='width:140px' src='".base_url()."assets/img/boton-paypal.png'/></a></td>";
	$checked='checked';
	$color='#45F964';	
	}else{
	$checked='';
	$color='';
	$pay='';
	}
?>
<tr style='background:<?=$color?>'>
<td style='border:1px solid #38a7bb;'>&nbsp;<input type="radio" name="plan-pago" <?=$checked?> value='<?=$rowp->id?>'></td>
<td style='width:100%;border:1px solid #38a7bb;'> <label><br/><?=$rowp->plan?>&nbsp;$<?=$rowp->precio?> USD</label></td>
 <?=$pay?>
</tr>
<?php } ?>

</table>
</div>
</div>-->

 <div class='col-xs-3 col-xs-offset-2'>
<button type="submit" class="btn btn-primary" >Editar Cuenta</button>

<br/><br/>
 </div>
</div>
</form>	

</div>
<br/>	

<?php $this->load->view('footer');?>
</body>
<script>

$('#send').click(function() {
var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
if($("#pass1").val() == "" ){
$("#pass1").focus();
$('#pass1').css('border-color', 'red'); 
$("#errorBoxW").html("Ingrese la nueva contraseña");
return false;
} if($('#pass2').val() == ""){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Confirmar la nueva contraseña");
return false;
}  if(pass1 != pass2){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBoxW").html("Las contraseñas no coinciden");
return false;
}
});

$('#pass1').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );
}   
});

$('#pass2').keyup(function() {

var input = $(this);

if( input.val() != "" ) {
input.css( "border", "1px solid #38a7bb" );
}   
});





</script>
</html>