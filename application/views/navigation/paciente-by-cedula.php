<div class='container'>
<div class="tab-content"   >
<div class="col-md-12"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >
  <?=$backbutton?>
  <i>
  <?php
if($number_found >0){
$this->padron_database = $this->load->database('padron',TRUE);
$this->load->view('navigation/patient-data-padron');
foreach($patient_padron as $row)
$ddd=date("Y-m-d", strtotime($row->FECHA_NAC));
$dd=date("d-m-Y", strtotime($row->FECHA_NAC));
?>
<hr id="hr_ad"/>
 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('navigation/cita_sent_patient_not_found');?>" > 
<input type="hidden"  value='<?=$row->NOMBRES?> <?=$row->APELLIDO1?> <?=$row->APELLIDO2?>'  name="nombre"  >
<input type="hidden"  value='<?=$row->MUN_CED?><?=$row->SEQ_CED?><?=$row->VER_CED?>'  name="cedula"  >
<input type="hidden"  value='<?=$ddd?>'  name="date_nacer_format"  >
<input type="hidden"  value='<?=$dd?>'  name="date_nacer"  >
<input type="hidden"  value='<?=$row->MUN_CED?>'  name="ced1"  >
<input type="hidden"  value='<?=$row->SEQ_CED?>'  name="ced2"  >
<input type="hidden"  value='<?=$row->VER_CED?>'  name="ced3"  >
<input type="hidden"  value='padron'  name="photo"  >
<div class="tab-content"  style="margin-left:6%" >
<div  id="home" class="active cita-border tab-pane fade in">
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tel. Celular</label>
<div class="col-sm-3">						
<input type="text"  class="form-control bfh-phone required"  id="form_phonecel" name="tel_cel"  >
</div>
<div id="phone_info"></div>
</div>


<div class="form-group">
<label class="control-label col-sm-3">Tel. Residencial</label>
<div class="col-sm-3">						
<input type="text"  class="form-control bfh-phone"  id="form_phoneres" name="tel_resi"  >
</div>
<div id="phone_info"></div>
</div>

<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3"><span class="req">*</span> Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" id="emailtest" name="email" class="form-control required"  >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Seguro médico</label>
<div class="col-sm-3 seg">
<select class="form-control select2 required"  style="width:100%"   name="seguro_medico" id="seguro_medico" >
<option value="" hidden></option>
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
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-4 cau">
<select class="form-control select2 required"  style="width:100%" name="causa" id="causa" >
<option value="" hidden></option>
<?php 

foreach($causa as $row)
{ 
echo '<option value="'.$row->title.'">'.$row->title.'</option>';
}
?>

</select>

</div>

</div>
	<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" >
 <option value="" hidden></option>
 <?php 

 foreach($centro_medico as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>

 </select>
 <div id="load-time"></div>
 </div>
 </div>

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Especialidad</label>
<div class="col-sm-4 esp">
<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onChange="getDoc(this.value);" disabled >
 
</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">
<select class="form-control select2 required"  style="width:100%"  name="doctor" id="doctor_dropdown" disabled >
</select>

</div>
</div>
<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-3" >
<div class="input-group date" id="fechaPro">
<input type="text" class="form-control required" id="fecha_propuesta1" name="fecha_propuesta" disabled />
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>

<input type="hidden"  id="weekday" name="fecha_filter"   />

</div>
<div class="col-sm-7 col-md-offset-3" >
<p id='horario-info'></p>
</div>
</div>
<div class="form-group">
<div class="col-md-5" >
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm send_cit" ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
 </div>

<br/><br/><br/><br/>

 </form>



<?php
}else{

	redirect("navigation/createNewRequest/$cedula");
}
?>
</div>
</div>
</div>
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

moment.locale('es');


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
</script>
	