<style>
#detect{display:none}

#gray{background:gray}

.bg-cnt{
background-image: url('<?= base_url();?>assets/img/historial_medical/hist-fondo.png');
 background-repeat: no-repeat;
background-size: cover;

}
baptiste.prophete123

</style>
<div class="container bg-cnt" style="box-shadow: 
    0 0 0 2px hsl(0, 0%, 50%),
    0 0 0 4px hsl(0, 0%, 60%),
    0 0 0 6px hsl(0, 0%, 70%);
    ">
<div class="col-md-12 alert alert-info" role="alert">
<strong>CREAR CUENTA MEDICO</strong> Despues de crear su cuenta recibira un correo de nosotros para el seguimiento
</div>
<div class="col-md-5"><?=  validation_errors(); ?></div>
 <div class="col-md-12 ">
<form method="post" id='form_user2' class="form-horizontal" action="<?php echo site_url("navigation/saveMedico");?>">
<h3 style="text-align:center;color:red"  id="errorBox2"></h3>

<!-- left column -->
<input class="form-control" name="detect" id='detect' type="text" >

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-2"  >PERFIL</label>
<div class="col-sm-2">

<input class="form-control savethisperfil required" name="perfil"  value="<?=$perfil?>" style="pointer-events:none" type="text" >
</div>
</div>



<div class="form-group ">
<label class="control-label col-sm-2">EXEQUATUR <span class="req">*</span></label>
<div class="col-sm-2">
<input type="text" class="form-control"   name="exequatur"  id="exequatur" placeholder='EXEQUATUR' value="<?php echo set_value('exequatur'); ?>"  >
 </div>
 </div>
<div class="form-group" >
<label class="control-label col-sm-2" >NOMBRES <span class="req">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control required"   name="nombre" placeholder='NOMBRES' value="<?php echo set_value('nombre'); ?>"  >
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-2" >CÉDULA <span class="req">*</span></label>
<div class="col-sm-2">
<input type="text" class="form-control"   name="cedula" placeholder='CÉDULA' value="<?php echo set_value('cedula'); ?>"  >
</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-2" >TELEFONO <span class="req">*</span></label>
<div class="col-sm-4">
<input type="text" class="form-control required"  id='phone' name="phone" placeholder='TELEFONO' value="<?php echo set_value('phone'); ?>" >
<span id='check-phone' style='color:white;background:gray' ></span>
</div>
</div>
<div class="form-group ">
<label class="control-label col-sm-2">ESPECIALIDAD <span class="req">*</span></label>
<div class="col-sm-3">
<?php 
$areaName=$this->db->select('title_area')->where('id_ar',set_value('especialidad'))->get('areas')->row('title_area');
?>
<select class="form-control select2 required"  name="especialidad"  id="especialidad">
 <option value="<?php echo set_value('especialidad'); ?>" ><?=$areaName?></option>
 <?php 

 foreach($especialidades as $row)
 { 
 echo '<option value="'.$row->id_ar.'">'.$row->title_area.'</option>';
 }
 ?>
 </select>
 
 </div>
 </div>	


<div class="form-group">
<label class="control-label col-sm-2">SEGURO MÉDICO <span class="req">*</span></label>
<div class="col-sm-4">
<input type="checkbox" id="checkbox2"> Seleccionar todo
<select class="form-control select2 required" id="e2" multiple="multiple"  name="seguro_medico[]">
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-2" >CORREO ELECTRÓNICO <span class="req">*</span></label>
<div class="col-sm-4">
<input type="email" class="form-control required email-clear" id="email2" autocomplete="off" value="<?php echo set_value('email'); ?>"  name="email" placeholder='CORREO ELECTRÓNICO' style="text-transform:lowercase" >
<div id="emailInfo2"></div>
<span id='check-email' style='color:white;background:gray' ></span>
</div>
</div>

<span id='ifEmailCorrect' style='display:none'></span>
<div class="form-group codigo-enviado" style='display:none' >
<label class="control-label col-sm-2">LE HA ENVIADO UN CODIGO A SU CORREO ELECTRONICO</label>
<div class="col-sm-3">
<input type="text" class="form-control required" id="check-if-good"   placeholder='ENTRA EL CODIGO'  >
</div>
</div>




<div class="col-sm-12">
<button type="button" class="btn btn-default" id="Reset">Reiniciar</button>
<button type="submit" id="senduserdoc"  class="btn btn-primary" disabled>Crear Cuenta</button>
  <br/><br/>
 </div>
</form>
 </div>
  </div>
  <br/><br/><br/><br/><br/>
 </div>
 <script>
 $("#phone").on('keyup', function () {
  var phone=$("#phone").val();
  $("#check-phone").text("Asegurate que este numero es correcto, es un medio de contactarle: " +phone);
});
  $("#email2").on('keyup', function () {
  var email=$("#email2").val();
  $("#check-email").text("Asegurate que este correo es correcto, es un medio de contactarle: " +email);
  $("#check-if-good").val("");
  loadCodigo();
});
 
 
//mask input telephones
document.getElementById('phone').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});



//-----------------------------------------------------------------------------------------------------------
var timer2 = null;
$("#email2").on('keydown', function () {
       clearTimeout(timer2);
       timer2 = setTimeout(sendConfirmationEmail, 2000)
});
function sendConfirmationEmail (){
	if($("#email2").val()==""){
	$(".codigo-enviado").hide();	
	}else{
$(".codigo-enviado").show();
$( "#check-if-good" ).focus();
$("#check-email").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>').css('background','none');
	$.ajax({
		type: "POST",
		url: "<?=base_url('navigation/sendConfirmationEmail')?>",
		data:{email:$("#email2").val(),codigo:$("#ifEmailCorrect").text()},
		success:function(data){ 
		$("#check-email").css('background','gray');
		$("#check-email").html(data); 
	
		},
			});
	}
};
//------------------------------------------------------------------------------------------------------------
var timer3 = null;
$("#check-if-good").on('keydown', function () {
       clearTimeout(timer3);
       timer3 = setTimeout(checkIfCodigo, 2000)
});

function checkIfCodigo (){
	if($("#ifEmailCorrect").text()==$("#check-if-good").val()){
	$(".codigo-enviado").hide();
	 $("#senduserdoc").prop("disabled",false);
	}else{
	 $("#senduserdoc").prop("disabled",true);	
	}
};

loadCodigo();
function loadCodigo(){
		$.ajax({
		type: "POST",
		url: "<?=base_url('navigation/loadCodigo')?>",
		success:function(data){ 
		$("#ifEmailCorrect").html(data); 
	
		},
			});
};
//------------------------------------------------------------------------------------------------------------
 </script>