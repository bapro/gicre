<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">GESTION DE FACTURAS DE EMERGENCIA </h2>
<hr id="hr_ad"/>
<div class="row">
<div class="col-md-12 searchb deactivate_s">
<h6>BUSCADOR DE PACIENTE</h6>
<div class="col-md-3 form-group">
        <label>cedula/pasaporte</label>
    <select class="form-control select2 search-patient"   >
	  <option value="" hidden></option>
	<?php 

	foreach($query->result() as $row)
	{ 
	$cedula=$this->db->select('cedula')->where('id_p_a',$row->id_pat)->get('patients_appointments')->row('cedula');
	?>
	<option value="<?=$row->id_pat?>" ><?=$cedula?></option>
	<?php
	}
	?>

   </select>
    </div>
    <div class="col-md-2 form-group">
        <label>NEC</label>
   <select class="form-control select2 search-patient"  >
	  <option value="" hidden></option>
	<?php 

	foreach($query->result() as $row)
	{ 
	$nec1=$this->db->select('nec1')->where('id_p_a',$row->id_pat)->get('patients_appointments')->row('nec1');
	?>
	<option value="<?=$row->id_pat?>" ><?=$nec1?></option>
	<?php
	}
	?>

   </select>
    </div>
	    <div class="col-md-5 form-group">
        <label>Nombres</label>
   <select class="form-control select2 search-patient"  >
	  <option value="" hidden></option>
	<?php 

	foreach($query->result() as $row)
	{
   $nombre=$this->db->select('nombre')->where('id_p_a',$row->id_pat)->get('patients_appointments')->row('nombre');		
	?>
	<option value="<?=$row->id_pat?>" ><?=$nombre?></option>
	<?php
	}
	?>

   </select>
    </div>

 </div>
 
<div class="row"> 
<input id="clone-check-seguro" type="hidden" />

<div id="patientHintNombres"></div>
</div>

 </div>
 </div>
 <!--container-->

 <br/> <br/>


<?php $this->load->view('footer'); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery.number.js" charset="UTF-8"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script>
  
$('.select2').select2({
placeholder: "SELECCIONAR",
allowClear: true, 
language: {

noResults: function() {

return "No hay resultado.";        
},

}
});



$(".search-patient").change(function(){
$("#patientHintNombres").fadeIn().html('<span style="font-size:25px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var nombres=  $(this).val();


if(nombres == "") {
$("#patientHintNombres").hide();
}else {

$.ajax({
type: "GET",
url: "<?=base_url('emergency/patientResult')?>",
data: {nombres:nombres,id_user:<?=$id_user?>},
success:function(data){
$("#patientHintNombres").html(data);
  
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#patientHintNombres").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
})

}



});









</script>
