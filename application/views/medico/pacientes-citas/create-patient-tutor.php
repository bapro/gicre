
<div class="form-group">
<br/>
<label class="control-label col-sm-3"  >Entra el NEC del tutor</label>
<div class="col-sm-2">
<input type="hidden" id="id_nino" value="<?php echo $patid?>"/>
<input autocomplete="off" id="search" type="text" class="form-control"  />
</div>
<p id="mes" style="font-size:16px;color:green"></p>
</div>
<div class="form-group">
<div id="txtHint" style="font-size:16px;color:#006edb;font-style:italic">La información del tutor se mostrará aquí...</div>
</div>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
$("#search").keyup(function(){
var str=  $("#search").val();
var id_nino=  $("#id_nino").val();
if(str == "") {
	   $( "#txtHint" ).html("La información del tutor se mostrará aquí..."); 
}else {
	$.get( "<?php echo base_url();?>admin_medico/search_patient_tutor?id="+str+"&id_nino="+id_nino, function( data ){
		   $( "#txtHint" ).html( data );  
	});
}
});

});  

</script>