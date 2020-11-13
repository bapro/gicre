<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Entra el NEC del tutor</label>
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
<!--<div id="reload-fam" style="display:none">
 <ol>
<?php

foreach($tutor as $tut)
{

?>
<li><a target="_blank" href="<?php echo site_url("admin_medico/patient/".$tut->id_tutor); ?>"><?=$tut->relacion?> : <?=$tut->name_tutor?></a></li>
<?php
}
?>
</ol>
</div>-->
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
$("#search-nec").keyup(function(){
var nec=  $("#search-nec").val();
var id_patient=  $("#id_patient").val();
var controller="<?=$controller?>";
if(nec == "") {
	   $( "#txtHint" ).html("La información del tutor se mostrará aquí..."); 
}else {
		$("#txtHint").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
	$.get( "<?php echo base_url();?>admin_medico/search_patient_tutor?nec="+nec+"&id_patient="+id_patient+"&controller="+controller, function( data ){
		   $( "#txtHint" ).html( data ); 
     
	});
}
});

});  

</script>