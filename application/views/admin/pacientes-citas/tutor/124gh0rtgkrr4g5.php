<?php
$this->padron_database = $this->load->database('padron',TRUE);
if($perfil=="Admin"){
	$controller="admin";
} else {
	$controller="medico";
}


if($photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ced1)
->where('SEQ_CED',$ced2)
->where('VER_CED',$ced3)
->get('fotos')->row('IMAGEN');
$photo= '<img style="width:125px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($photo==""){
$photo="";	
}
else{
$photo='<img  style="width:125px;" src="'.base_url().'/assets/img/patients-pictures/'.$photo.'"  />';
	?>
<?php

}

?>
<body style="background:linear-gradient(to right, white, #E0E5E6, white);">
<div  class="col-md-6" style='border-right:1px solid #38a7bb' >
<h3 class='h3'>Crear relaciones familiares del paciente</h3>
<?=$photo?> 
<label style="text-transform:uppercase"><?=$nombre?> (<?=$nec?>)</label>  
 <form  class="form-horizontal" > 

<div class="form-group">
<br/>
<label class="control-label col-sm-6"  >Entra el NEC del tutor</label>
<div class="col-sm-2">
<input type="hidden" id="id_patient" value="<?php echo $patid?>"/>
<input autocomplete="off" id="search-nec" type="text" class="form-control"  />
</div>
<p id="mes" style="font-size:16px;color:green"></p>
</div>
<div class="form-group">
<div id="txtHint" style="font-size:16px;color:#006edb;font-style:italic">La información del tutor se mostrará aquí...</div>
</div>
<div class="display_tutor"></div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

 </form>
 </div>
<div  class="col-md-6" >
<h3 class='h3'>Desea realizar factura a este paciente ?</h3>
<a  class="btn btn-primary btn-sm" href="<?php echo base_url("$controller/patient/$idpatient/$id_cm/$id_dd")?>">  No</a>
<?php
if($centro_type=="privado"){
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("$controller/patient_billing_/privado/$id_rdv/$id_dd/$id_cm/$id_seguro")?>" >Si</a>
<?php
} else{
?>
<a  class="btn btn-default btn-sm" href="<?php echo base_url("$controller/patient_billing_/centro/$id_rdv/$id_dd/$id_cm/$id_seguro")?>">Si</a>
<?php
} 
?>
</div>


</div>
</body>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
$("#search-nec").keyup(function(){
var nec=  $("#search-nec").val();
var id_patient=  $("#id_patient").val();
if(nec == "") {
	   $( "#txtHint" ).html("La información del tutor se mostrará aquí..."); 
}else {
		$("#txtHint").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
	$.get( "<?php echo base_url();?>admin_medico/search_patient_tutor?nec="+nec+"&id_patient="+id_patient, function( data ){
		   $( "#txtHint" ).html( data ); 
     
	});
}
});

});  

</script>