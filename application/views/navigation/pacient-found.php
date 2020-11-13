<body>

<div class="container"  >
<div class="col-md-12" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb"> 

<h4 class="h4 hide_crear_nueva_cita">SOLICITUD DE CITA</h4>
<div   class="alert alert-info">
 <strong>Habemos encontrado datos</strong>
 </div>
 <div style="overflow-x:auto;">
<?php 

$this->load->view('navigation/patient-data');

foreach($patient_admedicall as $rowid)

?>
 </div>
<hr id="hr_ad"/>
<div id="show_patient_by_cedula"></div>
<span id="hide_form1">

 <form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('navigation/cita_sent_patient_found');?>" > 

<div class="tab-content"  style="margin-left:6%" >
<div  id="home" class="active cita-border tab-pane fade in">
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tel. Celular</label>
<div class="col-sm-3">						
<input type="text" value="<?=$rowid->tel_cel?>" class="form-control bfh-phone required"  id="form_phonecel" name="tel_cel"  >
</div>
<div id="phone_info"></div>
</div>


<div class="form-group">
<label class="control-label col-sm-3">Tel. Residencial</label>
<div class="col-sm-3">						
<input type="text" value="<?=$rowid->tel_resi?>" class="form-control bfh-phone"  id="form_phoneres" name="tel_resi"  >
</div>
<div id="phone_info"></div>
</div>



<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3"><span class="req">*</span> Correo electrónico </label>
<div class="col-sm-6">
<input  type="text" value="<?=$rowid->email?>" id="emailtest" name="email" class="form-control required"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Causa</label>
<div class="col-sm-4 cau">
<input value="<?=$rowid->id_p_a?>" type='hidden' name='id_p_a'/>
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
<?php 
$sql ="SELECT especialidad FROM  medial_center_esp WHERE id_medical_center=50";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){
$esp= $this->db->select('title_area')->where('id_ar',$rf->especialidad)->get('areas')->row('title_area');
echo '<option value="" hidden></option>';
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
<label class="control-label col-sm-3">Eres humano ?</label>
<div class="col-sm-3">
<?php
$chars = "0123456789";
$number1 = substr( str_shuffle( $chars ), 0, 1);
$number2 = substr( str_shuffle( $chars ), 0, 1);
?>
<div class="input-group">
    <span class="input-group-addon capchtavalue"><span id='number1'><?=$number1?></span> + <span id='number2'><?=$number2?></span></span>
 <input  class="form-control" placeholder='Escribir el resultado' id='checkifgood' >
</div>
</div>
</div>
<div class="form-group">
<div class="col-md-5" >
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm send_cit" disabled><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
 </div>

<br/><br/><br/><br/>

 </form>
  </span>
 </div><!--row background_ end -->
 </div>
 </div><!--container-->

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

var timer = null;
$("#checkifgood").on('keydown', function () {
       clearTimeout(timer);
       timer = setTimeout(checkme)
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