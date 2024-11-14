<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.change-direct{text-align:right}
.req{
	font-weight:bold
}
</style>

<body>
<?php 


if($this->session->userdata('tranfer_pat_id')) {
	$this->padron_database = $this->load->database('padron',TRUE);
$cpt="";

	?>
<div class="container"  >

<div id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>
<br/>
&nbsp; <a href="<?php echo site_url("navigation/createAccount/$nec");?>" class='btn btn-success' role="button">Mi Cuenta</a>

<h2 class="h2 alert alert-info">SOLICITUD DE CITA</h2>
 <div class="text-danger text-center"><strong><?=$this->session->flashdata('flashError')?></strong></div>
   
<?=  validation_errors(); ?>
<?php echo form_open("navigation/cita_sent_patient_found",['autocomplete'=>'off', 'class'=>'form-horizontal']);?>
 <div class="col-md-4" style="background:linear-gradient(to right, white, #E0E5E6, white);border:15px solid #E0E5E6;border:1px solid #38a7bb" >
 <h4 style="text-align:center" >DATOS PERSONALES  </h4>
 
<?php
foreach($patient_admedicall as $row)
$data['photo_rows']=$patient_admedicall;
 $this->load->view('navigation/patient-photo',$data);
 
 $nacer2 = date("d-m-Y", strtotime($row->date_nacer));
$ced11=substr("$row->cedula",0,3);
$ced22=substr("$row->cedula",3,10);
$ced33=substr("$row->cedula",-1);

 
?>
<br/>

<table class="table table-striped ">
<tr>

<th colspan ="2" class="alert alert-info" style='text-align:center;text-transform:uppercase;'><?=$row->nombre ?> (# <?=$row->id_p_a ?>)</th>
</tr>
<tr>
<th class='change-direct'><strong>FECHA NAC.</strong></th>
<td> <?=$nacer2;?></td>
</tr>
<tr>
<th class='change-direct'>CEDULA</th> <td><?=$ced11;?>-<?=$ced22;?>-<?=$ced33;?></td>
</tr>
<tr>
<th class='change-direct'>CELULAR <span class="req">*</span> </th>
 <td><input type="text"  name='tel_cel' id='tel_cel'   value="<?=$row->tel_cel;?>" placeholder="cambiar tel. celular" class="form-control" /></td>
</tr>
<tr>
<th class='change-direct'>EMAIL</th> 
<td><input type="text" name='email' class="form-control" value="<?=$row->email;?>" placeholder="cambiar correo" /></td>
</tr>
</table>
</div>
<div class="col-md-8" id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;border-left:none" >
<h4 class="cita-title">DATOS CITAS</h4>

<input  type="hidden" class="form-control"  name="id_p_a" value="<?=$row->id_p_a;?>"  >

<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-6 cau">
<select class="form-control  required"  style="width:100%" name="causa" id="causa" >
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
<div class="col-sm-9">
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
<input id="especialidad" name="especialidad" type="hidden" value="<?php echo set_value('especialidad');?>"/>
</div>
</div>
	<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-9 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" <?=$ifCentroDisabled?>>
</select>
 <div id="loading"></div>
 </div>
 </div>


<div class="form-group">
<label  class="control-label col-sm-3" ><span class="req">*</span> Fecha Propuesta </label>
<div class="col-sm-5" >
<div class="input-group date" id="fechaPropuesta">
<input type="text" class="form-control required"  name="fecha_propuesta" value="<?php echo set_value('fecha_propuesta');?>"  />
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
<label class="control-label col-sm-3">Google Recaptcha <span class="req">*</span></label>
<div class="col-sm-3">
<?php
$chars = "0123456789";
$number1 = substr( str_shuffle( $chars ), 0, 1);
$number2 = substr( str_shuffle( $chars ), 0, 1);
?>
<!--<div class="input-group">
 <span class="input-group-addon capchtavalue"><span id='number1'><?=$number1?></span> + <span id='number2'><?=$number2?></span></span>
 <input  class="form-control" placeholder='=?' id='checkifgood' >
</div>-->
<div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>" data-callback="enableBtn"></div> 

</div>
</div>


<div class="form-group">
<div class="col-md-5 col-md-offset-4"  style="height: 22.8vh;" >
<br/><br/><br/><br/><br/><br/><br/><br/>
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm " disabled><i class="fa fa-floppy-o" aria-hidden="true"></i>  crear </button>
</div>
</div>


 </div>
<?php echo form_close();?>
 </div>

 <?php }else{ ?>
<div class="col-md-12 text-center alert" >
<p>Lo sentimos, se ha producido un error, favor volver a solicitar la cita.<br/>
<a  href="<?php echo base_url("navigation/createNewRequest/0/0/0")?>">Solicitar de nuevo</a>

</p>
</div>
<?php } ?>
 </div>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


	<script>
		 function enableBtn(){
   document.getElementById("sendc").disabled = false;
 }
 
 
	</script>
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>
<script>


$( document ).ready(function() {
	
document.getElementById('tel_cel').addEventListener('input', function (e) {
  var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
  e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});
	
 $('#fechaPropuesta').datetimepicker({
 format: 'DD-MM-YYYY',	 
         minDate:new Date()
      });


   $('.select2').select2({ 
  placeholder: "SELECCIONAR",
  allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});

$('#causa').select2({ 
placeholder: "SELECCIONAR",
tags: true

})




window.addEventListener("beforeunload", function(event) { 
    document.getElementById("sendc").disabled = true;
    document.getElementById("sendc").innerText ='procesando...';	
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
console.log(id);

 $.ajax({
	type: "POST",
	url: '<?php echo site_url('navigation/getDocCentro');?>',
	data:{id_doc:id},
	success: function(data){
	$('#centro_medico').prop("disabled",false);
	$("#centro_medico").html(data);
	$("#loading").hide();
	},

	});	
}

loadDocCentro(<?=set_value('doctor')?>)


})
</script>
</body>
	</html>