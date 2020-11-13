<body>
<?php if($this->session->userdata('tranfer_pat_id')) {?>
<div class="container"  >
<div class="col-md-12" id="hide_patientf"> 

<div class="col-md-12 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h2 class="h2">SOLICITUD DE CITA</h2>
 <?=$this->session->flashdata('error_messages');?>
<?=  validation_errors(); ?>
<hr id="hr_ad"/>

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
<label class="control-label col-sm-3"><span class="req">*</span> Centro medico</label>
<div class="col-sm-5 centrom">
<select class="form-control select2 required"  style="width:100%" name="centro_medico" id="centro_medico" >
<?php 
$sqpl="SELECT id_m_c,name FROM medical_centers 
ORDER BY FIELD(id_m_c, '50') DESC";
$queryctr= $this->db->query($sqpl);
 foreach($queryctr->result() as $row)
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

<select class="form-control select2 required"  style="width:100%" id="especialidad" name="especialidad"  onChange="getDoc(this.value);"  >
 <option ></option>
 <?php 
$sql ="SELECT especialidad FROM  medial_center_esp WHERE id_medical_center=50";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
$esp= $this->db->select('title_area')->where('id_ar',$rf->especialidad)->get('areas')->row('title_area');
echo '<option value="'.$rf->especialidad.'">'.$esp.'</option>';

}?>
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
<input type="text" class="form-control required" id="fecha_propuesta1" name="fecha_propuesta" <?php echo set_value('fecha_propuesta');?> disabled />
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
<label class="control-label col-sm-3"><span class="req">*</span> Eres humano ?</label>
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
    <script src="<?=base_url();?>assets/js/links_select.js"></script>
<!--<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>

<script>
$( document ).ready(function() {
//$(window).on( "load", function() {display_age()})
moment.locale('es');


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
});
</script>
</body>
	</html>