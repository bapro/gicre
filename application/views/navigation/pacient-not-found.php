<body>

<div class="container"  >
<div class="col-md-12" id="hide_patientf"> 

<div class="col-md-12 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h2 class="h2">SOLICITUD DE CITA</h2>
<?=$this->session->flashdata('error_messages');?>
<?=  validation_errors(); ?>
<hr id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('navigation/cita_sent_patient_not_found');?>" > 
<input type="hidden"  value=''  name="ced1"  >
<input type="hidden"  value=''  name="ced2"  >
<input type="hidden"  value=''  name="ced3"  >
<input type="hidden"  value=''  name="photo"  >
<div class="tab-content"  style="margin-left:6%" >
<h4 class="cita-title">I- DATOS PERSONALES</h4>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control required" placeholder="Nomres Apellidos" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>"  >

</div>
<div class="col-sm-12 table-responsive" id="nombre_info"></div>
</div>
<div   id="hide-down">
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula/Pasaporte</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula" value="<?=$ced?>" placeholder="000000000000" data-mask="000000000000"   >
</div>
<div id="cedula_info"></div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha nacimiento </label>
<div class="col-sm-3" >

<p id="incorect_age" style="display:none;background:white;color:red;width:300px;text-align:center;font-size:15px"><i>No puede nacer despues este año</i></p>

<div class="input-group date" id="dateOfBirth">
<input type="text" class="form-control required" id="date_nacer" name="date_nacer" value="<?php echo set_value('date_nacer'); ?>" />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden" name="date_nacer_format" id="mirror_field"  value="2010-01-01" />


</div>

</div>

<div class="form-group">
<label class="control-label col-sm-3">Edad</label>
<div class="col-sm-3" >
<input type="text" class="form-control " id="age" name="age"  readonly >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tel. Celular</label>
<div class="col-sm-3">						
<input type="text"  class="form-control bfh-phone required"  id="tel_cel" name="tel_cel"  value="<?php echo set_value('tel_cel'); ?>" >
</div>
<div id="phone_info"></div>
</div>


<div class="form-group">
<label class="control-label col-sm-3">Tel. Residencial</label>
<div class="col-sm-3">						
<input type="text"  class="form-control bfh-phone"  id="tel_resi" name="tel_resi"  >
</div>
<div id="phone_info"></div>
</div>



<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3"><span class="req">*</span> Correo electrónico </label>
<div class="col-sm-6">
<input  type="text"  id="emailtest" name="email" class="form-control required" value="<?php echo set_value('email'); ?>">
</div>
</div> 

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Sexo</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="sexo" id="sexo"  >
<option><?php echo set_value('sexo'); ?></option>
<option >Masculino</option>
<option >Feminino</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3" ><span class="req">*</span> Estado Civil</label>
<div class="col-sm-3">
<select class="form-control select2 required" name="estado_civil" id="estado_civil">
<option><?php echo set_value('estado_civil'); ?></option>
<option>Soltero</option>
<option>Casado</option>
<option>Divorciado</option>
<option>Union libre</option>
<option>Viudo</option>
<option>No aplicado</option>
</select>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-3 seg">
<?php 
$segname=$this->db->select('title')->where('id_sm',set_value('seguro_medico'))
 ->get('seguro_medico')->row('title');
 ?>
<select class="form-control select2 required"  style="width:100%"   name="seguro_medico" id="seguro_medico" >
<option value='<?php echo set_value('seguro_medico'); ?>'><?php echo $segname; ?></option>
<?php 

foreach($seguro_medico as $row)
{ 
echo '<option value="'.$row->id_sm.'">'.$row->title.'</option>';
}
?>
</select>
<div id="load-time-seguro"></div>
</div>
</div>
<div id="seguro_input"></div>
<div class="form-group">
<div class="col-md-5" >
 <button type="submit" id="next" style="float:right" class="btn btn-primary btn-sm ">>>  Continuar </button>
</div>
</div>
 </div>

<br/><br/><br/><br/>

 </form>
 
 </div><!--row background_ end -->
 </div>
 </div><!--container-->
</div>


 <br/><br/>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="<?=base_url();?>assets/js/links_select.js"></script>
<!--<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>

<script>
$( document ).ready(function() {
//mask input telephones
document.getElementById('tel_cel').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

document.getElementById('tel_resi').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});


$("#patient_cedula3").keyup(function(){
$("#hide_patientf").hide();
var patient_cedula3=$(this).val();
var patient_cedula1=$("#patient_cedula1").val();
var patient_cedula2=$("#patient_cedula2").val();
var id_user=$(".id_user").val();
$("#patientdata").fadeIn(1000).fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

if(patient_cedula3 == "") {
$("#patientdata").hide();
$("#hide_patientf").show();
$(".show-cita-form").show();
}else {
window.location ="<?php echo base_url(); ?>navigation/search_result?patient_cedula1="+patient_cedula1+"&patient_cedula2="+patient_cedula2+"&patient_cedula3="+patient_cedula3; 	
}
});

 

//$(window).on( "load", function() {display_age()})
moment.locale('es');
$("#cedula").keyup(function(){
var cedula= $(this).val();
if(cedula == "") {
$("#cedula_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_cedula_exist?cedula="+cedula, function( data ){
$( "#cedula_info" ).html( data ); 
$( "#cedula_info" ).show(); 		   
});
}
});


$("#nombre").keyup(function(){
var nombre= $(this).val();
if(nombre == "") {
$("#nombre_info").hide();
}else {
$.get( "<?php echo base_url();?>navigation/check_if_nombre_exist?nombre="+nombre, function( data ){
$( "#nombre_info" ).html( data ); 
$( "#nombre_info" ).show(); 		   
});
}
});
	

$("#form_phonecel").keyup(function(){

});




var timer = null;
$("#form_phonecel").keyup(function(){
	var tel_cel= $(this).val();
       clearTimeout(timer); 
       timer = setTimeout(usuario_terco(tel_cel), 2000)
});

function usuario_terco(tel_cel){
var nombre= $("#nombre").val();
var date_nacer= $("#date_nacer").val();
if(tel_cel == "") {
$("#phone_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/usuario_terco?tel_cel="+tel_cel+"&nombre="+nombre+"&date_nacer="+date_nacer, function( data ){
$( "#phone_info" ).html( data ); 
$( "#phone_info" ).show(); 		   
});
}
};
});

</script>
	</body>
	</html>