<style>
#form_user2 .short{
font-weight:bold;
color:#FF0000;
font-size:larger;
}
#form_user2 .weak{
font-weight:bold;
color:orange;
font-size:larger;
}
#form_user2 .good{
font-weight:bold;
color:#2D98F3;
font-size:larger;
}
#form_user2 .strong{
font-weight:bold;
color: limegreen;
font-size:larger;
}
</style>
<form method="post" id="form_user2" class="form-horizontal" action="<?php echo site_url('admin/SaveUser');?>">
<h3 style="text-align:center;color:red"  id="errorBox2"></h3>
<div class="col-xs-12 "  id="background_">
<div class="form-group">
<!-- left column -->
<div class="col-sm-6">

<div class="form-group" id="hide_this_nombre">
<label class="control-label col-sm-4" >Perfil</span></label>
<div class="col-sm-7">

<input class="form-control savethisperfil required" name="perfil" style="pointer-events:none" type="text" >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" >Nombre usuario</span> <span id="oblig">*</span></label>
<div class="col-sm-6">

<input class="form-control user required" autocomplete="off" name="user" id="user" type="text" >
<div id="userInfo2"></div>
</div>
</div>

</div>

<!-- right column -->
<div class="col-sm-6">



<div class="form-group">
<label class="control-label col-sm-4" >Contraseña</span> <span id="oblig">*</span></label>
<div class="col-sm-5 divImg effect1">
<input type="password" class="form-control required" name="pass1" id="pass" type="text" title="1- Uso de caracteres especiales como, [@, $].
2- Uso de letras mayúsculas [A - Z] y minúsculas [a - z].
3- Uso de números [0 - 9].
Asi tu tiene una contraseña fuerte.">
<div id="result2" ></div>
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-4" >Confirmar contraseña</span> <span id="oblig">*</span></label>
<div class="col-sm-5">
<input type="password" class="form-control required" name="pass2" id="pass3" type="text" >
</div>
</div>


<!-- End contact information -->


</div>

</div>
<hr/>
<div class="form-group">
<label class="control-label col-sm-4">Exequatur</label>
<div class="col-sm-4">
<select class="form-control select2 required"  name="exequatur"  id="exequatur">
<option value="" hidden></option>
  <?php 

 foreach($execuatur as $row)
 { 
 echo '<option>'.$row->code.'</option>';
 }
 ?>
 </select>
 </div>
 </div>
<div class="form-group" id="show_this_nombre">
<label class="control-label col-sm-4" >Nombres</label>
<div class="col-sm-4 ">
<span   id="nombre"   ></span>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-4" >Cedula</label>
<div class="col-sm-4">
<input type="text" class="form-control required" id="cedula"  name="cedula"   >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Especialidad</label>
<div class="col-sm-4">
<select class="form-control select2 required"  name="especialidad"  id="especialidad">
 <option value="" hidden></option>
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
<label class="control-label col-sm-4" >Correo electronico</label>
<div class="col-sm-4">
<input type="text" class="form-control required" id="email"  name="email"   >
</div>
</div>



<div class="form-group">
<label class="control-label col-sm-4">Telefono celular</label>
<div class="col-sm-4">
<input type="text" class="form-control required" id="primer_tel" name="primer_tel"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" >Extension</label>
<div class="col-sm-2">
<input type="text" class="form-control" id="extension" name="extension"   >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4">Centro médico</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir." multiple  name="centro_medico[]"   required="true">

<?php 

foreach($centro_medico as $row)
{ 
echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}
?>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4">Seguro médico</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir." multiple   name="seguro_medico[]"   required="true">

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
<label class="control-label col-sm-4">Agendas</label>
<div class="col-sm-4">
<button type="button" class="chosen-toggle select col-xs-6">Seleccionar todo</button>
<button type="button" class="chosen-toggle deselect col-xs-6">Deselecionar todo</button>

<select  class="form-control chosen-select" data-placeholder="Selecionnar o escribir." multiple   name="agenda[]"   required="true">

<?php 

foreach($diaries as $row)
{ 
echo '<option value="'.$row->id.'">'.$row->title.'</option>';
}
?>
</select>
</div>
</div>
<hr/>
</div>


<button type="reset" class="btn btn-default" id="newConsigneeReset">Reiniciar</button>
<button type="submit" id="senduserdoc"  class="btn btn-primary">Crear registro</button>
<br/><br/>
</form>

<script>
$.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" }) ;


function load_doc_form()
{
$.ajax({
url:"<?php echo base_url(); ?>admin/get_doc_user_form",
method:"POST",
success:function(data){
$('#div2').html(data);
}
})
}







//----------------------------------------------------------------------------------------------------------------
$(document).ready(function() {
  var validator = $("#form_user2").validate();
 $('.select2').on('change', function () {
        $(this).valid();
    });
	
	$('#senduserdoc').click(function(e) {

var pass1 = $("#pass").val();
var pass3 = $("#pass3").val();
 if(pass1 != pass3){
$("#pass3").focus();
$('#pass3').css('border-color', 'red'); 
$("#errorBox2").html("Las contraseñas no coinciden");
$("html, body").animate({ scrollTop: 0 }, 500);
return false;
}

});

	
	
	
$('#pass').keyup(function() {
$('#result2').html(checkStrength($('#pass').val()))
})
function checkStrength(password) {
var strength = 0
if (password.length < 6) {
$('#senduserdoc').prop('disabled',true)
$('#result2').removeClass()
$('#result2').addClass('short')
return 'Demasiado corto'
}
if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result2').removeClass()
$('#result2').addClass('weak')
$('#senduserdoc').prop('disabled',true)
return 'Débiles'
} else if (strength == 2) {
$('#result2').removeClass()
$('#result2').addClass('good')
$('#senduserdoc').prop('disabled',true)
$('#senduserdoc').prop('disabled',false)
return 'Bueno'
} else {
$('#result2').removeClass()
$('#result2').addClass('strong')
$('#senduserdoc').prop('disabled',false)
return 'Fuerte'
}
}
});





$(".user").keyup(function(){
var user= $(this).val();
if(user == "") {
$("#userInfo2").hide();
}else {
$.get( "<?php echo base_url();?>admin/check_if_user_exist?user="+user, function( data ){
$( "#userInfo2").html( data ); 
$("#userInfo2").show();		   
});
}
});




$('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});



$("#exequatur").change(function(){
$("#nombre").fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var exequatur=$(this).val();
	$.ajax({
type: "POST",
url: "<?=base_url('admin/get_medico_exequatur')?>",
data: {exequatur:exequatur},
cache: true,
success:function(data){ 
$("#nombre").html(data); 

}  
});


});



</script>