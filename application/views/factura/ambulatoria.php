<div class="form-group">
<label class="control-label col-sm-3" >Centro Medico</label>
<div class="col-sm-6">
<select class="form-control select2" id="factura-centro"> 
<option value=""></option>
 <?php 

 foreach($centro_medico as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>

 </select>
</div>
</div>
<input id='get-centro-type' type='hidden'/>

<?php 
if($perfil=="Medico"){
	echo"<input id='facturar-doc'  type='hidden' value='$id_user'/>";
 } else { ?>
 <div class="form-group" style="display:none" id="show-med-when-publico">
<label class="control-label col-sm-3"></label>
<div class="col-sm-7">
<label class="checkbox-inline">
<input type="checkbox" id='select-med-to-fac' value="hide-centro-publico" >
Seleccione un médico
</label>
</div>

</div>
 <span id='hide-centro-publico'>
<div class="form-group">

<label class="control-label col-sm-3"><span class="req">*</span> Especialidad</label>
<div class="col-sm-6">
<select class="form-control select2" id="factura-esp" > 

 </select>
 <div id="load-time"></div>
</div>
 </div>

 <div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Doctor</label>
<div class="col-sm-6">

<select class="form-control select2 facturar-doc"  id="facturar-doc"  >

</select>
</div>
</div>
<?php
}
?>
</span>
<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tipo De Factura</label>
<div class="col-sm-6">
<label class="checkbox-inline">
<input type="radio" name="seguro-radio" value="<?=$seguro_id?>" checked> <?=$seguroName?>
</label>
<label class="checkbox-inline">
<input type="radio" name='seguro-radio' value="11"> Privado

</label>
<br/><br/>
  <button type='button' id='crear-fac-ambulatoria' class="btn btn-primary btn-sm" disabled><i class="fa fa-plus" aria-hidden="true" title="Crear Emergencia"  ></i> Crear</button>
</div>
 <div id="load-fac-div"> </div>
</div>

<script>
$(document).ready(function() {
if(  $('#select-med-to-fac').is(':checked') ){
    $("#hide-centro-publico").show();
		//getEspecialidad($("#factura-centro").val());
}
else{
       $("#hide-centro-publico").hide();
}
 $('#select-med-to-fac').click(function(){
        var inputValue = $(this).attr("value");
        $("#" + inputValue).toggle();
    });

  $('.select2').select2({ 
  placeholder: "SELECCIONAR"

});



$("#factura-centro").change(function(){
var id= $(this).val();
alert(id);
$.ajax({
	type: "POST",
	url: "<?php echo site_url('factura/getCentroType');?>",
	data:'id_centro='+id,
	success: function(data){
	$("#get-centro-type").val(data);
	$('#crear-fac-ambulatoria').prop('disabled',false);
	$("#select-med-to-fac").prop("checked", false);
	if(data=='publico'){
	$("#show-med-when-publico").show();
	$("#hide-centro-publico").hide();
	//$('#factura-esp').val(null).trigger('change');
	$('.facturar-doc').val(null).trigger('change');
	}else{
	$("#hide-centro-publico").show();
		$("#show-med-when-publico").hide();
      }
	  	getEspecialidad(id);
	$("#load-fac-div").hide();
	},
	
 });

});


function getEspecialidad(id){
$.ajax({
	type: "POST",
	url: "<?php echo site_url('admin_medico/getcentEsp');?>",
	data:'id_centro='+id,
	success: function(data){
	$('#factura-esp').prop("disabled",false);
	$('#factura-esp').val(null).trigger('change');
 	// $('#facturar-doc').val(null).trigger('change');
	$("#factura-esp").html(data);
	},
 }); 

}


$("#factura-esp").change(function(){
var id_centro= $("#factura-centro").val();
$("#facturar-doc").val(null).trigger('change');
$.ajax({
	type: "POST",
	url: "<?php echo site_url('cita/get_doc');?>",
	data:{id_esp:$(this).val(),id_centro:id_centro,id_user:<?=$id_user?>},
	success: function(data){
   $("#facturar-doc").html(data);
$("#facturar-doc").prop("disabled",false);
	},
	});
});


$('#crear-fac-ambulatoria').on('click', function() {
var id=<?=$id_p_a?>;
var centro= $("#factura-centro").val();
var doc ;
var perfil = "<?=$perfil?>";
var seguro_type = $('input:radio[name=seguro-radio]:checked').val();
if ($("#facturar-doc").val() == null || $("#facturar-doc").val() == "") {
   doc= 1 ;
}else{
	doc =$("#facturar-doc").val();
}

if($("#get-centro-type").val()=='privado' && "<?=$perfil?>" !="Medico"){

if($('#factura-esp').val()==""){
alert('Seleccionne el médico!');

}else{
window.location ="<?php echo base_url(); ?><?=$controller?>/fact?centro="+centro+"&id="+id+"&doc="+doc+"&seg="+seguro_type; 	
}
}
else{

window.location ="<?php echo base_url(); ?><?=$controller?>/fact?centro="+centro+"&id="+id+"&doc="+doc+"&seg="+seguro_type; 
}

});
});
</script>

