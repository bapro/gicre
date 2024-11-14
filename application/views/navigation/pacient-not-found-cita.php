<body>
<?php 

/*$sqpl="SELECT id_m_c,name FROM medical_centers 
ORDER BY FIELD(id_m_c, '50') DESC";
$queryctr= $this->db->query($sqpl);
 foreach($queryctr->result() as $row)
 { 
 echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
}*/

if($this->session->userdata('tranfer_pat_id')) {
	$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";
foreach($patient_admedicall as $row)
	$nacer2 = date("d-m-Y", strtotime($row->date_nacer));
	?>
<div class="container"  >
<div class="col-md-12" id="hide_patientf"> 

<div id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h2 class="h2 alert alert-info">SOLICITUD DE CITA <?=$getPatientNameInfo?></h2>
 <?=$this->session->flashdata('error_messages');?>
<?=  validation_errors(); ?>
<hr id="hr_ad"/>
 <div class="col-md-3 hideaside " style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb;border-right:none" >
<ul  class="nav nav-pills nav-stacked hide-next-data-patient" style="font-size:13px">
<?php


if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="display:inline-block; width:100%; height:auto;" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($row->photo==""){
	
}
else{
	?>
<img  style="display:inline-block; width:100%; height:auto;"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
<li class="addb" ><a>NOMBRES: <?=$row->nombre ?></a> </li>
<li  class="addb"><a>CEDULA: <?=$row->cedula;?><a></li>
<li  ><a>FECHA NACI: <?=$nacer2;?><a></li>
<li  ><a>NEC <?=$row->nec1;?><a></li>
</ul>
<br/>
</div>
<div class="col-md-9" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >

<hr id="hr_ad"/>

<div class="tab-content" id="all_dis"  style="margin-left:6%" >
<form  class="form-horizontal"   method="post"  action="<?php echo site_url('navigation/cita_sent_patient_found');?>" > 
<input  type="hidden" class="form-control"  name="id_p_a" value="<?=$this->session->userdata('tranfer_pat_id');?>"  >
<input  type="hidden" class="form-control"  name="tel_resi" value="<?=$this->session->userdata('tel_resi');?>"  >
<input  type="hidden" class="form-control"  name="tel_cel" value="<?=$this->session->userdata('tel_cel');?>"  >
<input  type="hidden" class="form-control"  name="email" value="<?=$this->session->userdata('email');?>"  >
<div class="tab-content"  style="margin-left:6%" >
<h4 class="cita-title">II- DATOS CITAS</h4>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-4 cau">
<select class="form-control select2 required"  style="width:100%" name="causa" id="causa" >
<option><?php echo set_value('causa'); ?></option>
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
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">
<select class="form-control select2 required"  style="width:100%"  name="doctor" id="doctor_dropdown"  >
<?php 
$saveDoc=$this->db->select('name')->where('id_user',set_value('doctor'))->get('users')->row('name');
?>
<option value ="<?=set_value('doctor')?>" ><?=$saveDoc?></option>
<?php 
$sqpl="SELECT id_user, name FROM users 
WHERE perfil = 'Medico' && name !='' ORDER BY name ASC";
$queryctr= $this->db->query($sqpl);
 foreach($queryctr->result() as $row)
 { 
 echo '<option value="'.$row->id_user.'">'.$row->name.'</option>';
 }
 ?>
</select>
<input id="especialidad" name="especialidad" type="hidden"/>
</div>
</div>
	<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" <?=$ifCentroDisabled?>>
<?php 
$saveCentro= $this->db->select('name')->where('id_m_c',set_value('centro_medico'))->get('medical_centers')->row('name');
?>
<option value ="<?=set_value('centro_medico')?>" ><?=$saveCentro?></option>
</select>
 <div id="loading"></div>
 </div>
 </div>


<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-3" >
<div class="input-group date" id="fechaPropuesta">
<input type="text" class="form-control required"  name="fecha_propuesta" <?php echo set_value('fecha_propuesta');?>  />
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
<label class="control-label col-sm-3"><span class="req">*</span> cual es el resultado ?</label>
<div class="col-sm-3">
<?php
$chars = "0123456789";
$number1 = substr( str_shuffle( $chars ), 0, 1);
$number2 = substr( str_shuffle( $chars ), 0, 1);
?>
<div class="input-group">
 <span class="input-group-addon capchtavalue"><span id='number1'><?=$number1?></span> + <span id='number2'><?=$number2?></span></span>
 <input  class="form-control" placeholder='=?' id='checkifgood' >
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-5" >
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm " disabled><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>

 </div>

<br/><br/><br/><br/>
</div>
 </form>
 </div>
 </div>
 </div><!--row background_ end -->
 <?php }else{ ?>
<div class="col-md-12 text-center alert" >
<p>Lo sentimos, se ha producido un error, favor volver a solicitar la cita.<br/>
<a  href="<?php echo base_url("navigation/createNewRequest/0/0/0")?>">Solicitar de nuevo</a>

</p>
</div>
<?php } ?>
 </div>
 </div><!--container-->
</div>

	</body>


	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <!--  <script src="<?=base_url();?>assets/js/links_select.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>

<script>
$( document ).ready(function() {
 $('#fechaPropuesta').datetimepicker({
 format: 'DD-MM-YYYY',	 
         minDate:new Date()
      });
moment.locale('es');

   $('.select2').select2({ 
  placeholder: "SELECCIONAR",
  allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

window.addEventListener("beforeunload", function(event) { 
    document.getElementById("sendc").disabled = true;
    document.getElementById("sendc").innerText ='guardando...';	
     debugger; 
});



var timer2 = null;
$("#checkifgood").on('keydown', function () {
       clearTimeout(timer2);
       timer2 = setTimeout(checkme)
});
function checkme (){
	var number1=parseInt($("#number1").text());
    var number2=parseInt($("#number2").text());
	var sum =number1 + number2;
	if (parseInt($("#checkifgood").val()) == sum){
   $("#checkifgood").prop("disabled",true);
   $("#checkifgood").val("correcto!");
   $("#sendc").prop("disabled",false);
  }else{
    $("#sendc").prop("disabled",true);
  }

};

/*
load_center_medico();
function load_center_medico(){
var id=50;
$("#load-time").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>'); 
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
	$("#especialidad").html(data);
	$("#load-time").hide();
	},

	});	
}
});*/


$("#doctor_dropdown").change(function(){
$("#loading").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $(this).val();

loadDocCentro($(this).val()) ;
getDocArea($(this).val()) ;
});

function getDocArea(idDoc){
$.ajax({
	type: "POST",
	url: '<?php echo site_url('navigation/getDocArea');?>',
	data:'id_doc='+idDoc,
	success: function(data){
	$("#especialidad").val(data);
	},

	});		
	
	
}


function loadDocCentro(id){

 $.ajax({
	type: "POST",
	url: '<?php echo site_url('navigation/getDocCentro');?>',
	data:'id_doc='+id,
	success: function(data){
	$('#centro_medico').prop("disabled",false);
	$("#centro_medico").html(data);
	$("#loading").hide();
	},

	});	
}

loadDocCentro(<?=set_value('doctor')?>)


});
</script>
</body>
	</html>