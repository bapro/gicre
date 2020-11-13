<div class="modal-body" id="">
<div id="erBoxHosp" style='color:red'></div>
<form method="post" class="form-horizontal" id="send_data_hospitalizacion" >
<input  type="hidden" name="id_p_a"   value="<?=$id_p_a?>"  >
<input  type="hidden"  name="id_user" value="<?=$id_user?>"  >

<h4>IV- DATOS DE LA HOSPITALIZACION</h4>

	<div class="form-group">
<label class="control-label col-sm-3">Centro medico</label>
<div class="col-sm-7 centrom">
<select class="form-control hospitalizacion required"  style="width:100%" name="hosp_centro" id="hosp_centro" >
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
<?php 
if($perfil=="Medico"){

 	$area= $this->db->select('area')->where('id_user',$id_user)->get('users')->row('area');
	echo"<input name='hosp_esp' type='hidden' value='$area'/>";
	echo"<input name='hosp_doctor' type='hidden' value='$id_user'/>";
 } else { ?>

<div class="form-group">
<label class="control-label col-sm-3">Especialidad</label>
<div class="col-sm-5 esp">
<select class="form-control hospitalizacion required"  style="width:100%" id="hosp_esp" name="hosp_esp"  onChange="getDocHosp(this.value);" disabled >
 
</select>

</div>
 </div>
  <div class="form-group">
<label class="control-label col-sm-3">Doctor</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  style="width:100%"  name="hosp_doctor" id="hosp_doctor" disabled >
</select>

</div>
</div>
	<?php
	}
	?>
<div class="form-group">
<label class="control-label col-sm-3">Causa</label>
<div class="col-sm-6 cau">
<select class="form-control hospitalizacion required"   name="hosp_causa" id="hosp-causa" >
<option value=""></option>
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
<label class="control-label col-sm-3">Via de ingreso</label>
<div class="col-sm-6 centrom">
<input class="form-control  required" name="hosp_ingreso" id="hosp-ingreso" >

 </div>
 </div>
<div class="form-group">
<label class="control-label col-sm-3">Sala</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  id="hosp_sala" name="hosp_sala"  >

</select>

</div>
 </div>
 <div class="form-group">
<label class="control-label col-sm-3">Servicio</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"   name="hosp_servicio" id="hosp_servicio"  >

</select>

</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-3">Cama</label>
<div class="col-sm-6">
<select class="form-control hospitalizacion required"  name="hosp_cama" id="hosp_cama"  >

</select>
</div>
</div>
 <div class="form-group">
<label class="control-label col-sm-3">Autorizacion de ingreso</label>
<div class="col-sm-6">
<input class="form-control  required"  name="hosp_auto" id="hosp_auto"  >

</div>
</div>

 <div class="form-group">
<label class="control-label col-sm-3">Autorizado por</label>
<div class="col-sm-6">
<input class="form-control  required"  name="hosp_auto_por" id="hosp_auto_por"  >

</div>
</div>
<div class="form-group">
<div class="col-sm-3" >
 <button type="submit" id='save-hosp' style="float:right" class="btn btn-primary btn-sm " ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar </button>
</div>
</div>
</div>

</form>

<script>
$('#send_data_hospitalizacion').on('submit', function(event){
event.preventDefault();

if($("#hosp_centro").val() == "" ){
$("#hosp_centro").focus();
$("#erBoxHosp").html("Selecionne una centro medico.");
} 

else if($('#hosp_esp').val() == ""){
$("#hosp_esp").focus();
$("#erBoxHosp").html("Selecionne una especialidad");
}




else if($('#hosp_doctor').val() == ""){
$("#hosp_doctor").focus();
$("#erBoxHosp").html("Selecionne el doctor");
}

else if($("#hosp_causa").val() == "" ){
$("#hosp_causa").focus();
$("#erBoxHosp").html("Selecionne una causa");

}

else if($("#hosp_ingreso").val() == "" ){
$("#hosp_ingreso").focus();
$("#erBoxHosp").html("Selecionne el via de ingreso");

}





else if($('#hosp_ingreso').val() == ""){
$("#hosp_ingreso").focus();
$("#erBoxHosp").html("Selecionne via");

} 


else if($('#hosp_sala').val() == ""){
$("#hosp_sala").focus();
$("#erBoxHosp").html("Ingrese la sala");

}


else if($('#hosp_servicio').val() == ""){
$("#hosp_servicio").focus();
$("#erBoxHosp").html("Ingrese el servicio");

}
else if($('#hosp_cama').val() == ""){
$("#hosp_cama").focus();
$("#erBoxHosp").html("Ingrese la cama");

}
else if($('#hosp_auto').val() == ""){
$("#hosp_auto").focus();
$("#erBoxHosp").html("Ingrese por quien fue autorizado");

}



else if($('#hosp_auto_por').val() == ""){
$("#hosp_auto_por").focus();
$("#erBoxHosp").html("Ingrese por quien fue hospitalizado");

}

 else{
$('#save-hosp').prop("disabled",true);
//$("#btn-twice").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');	
$("#btn-twice").text("Guardando...");
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/add_new_hosp",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
window.location.href="<?php echo base_url(); ?>hospitalizacion/hospitalizacion_list/<?=$id_p_a?>/<?=$id_user?>";
}  
});
}
});

$('.hospitalizacion').select2({ 
placeholder: "SELECCIONAR",
tags: true

});


function getDocHosp(val) {
$("#load-time").fadeIn().html('<span style="font-size:10px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

var id_centro= $("#hosp_centro").val(); 
$.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/get_doc');?>',
	data:{id_esp:val,id_centro:id_centro},
	success: function(data){
	$("#hosp_doctor").prop("disabled",false);
	$("#hosp_doctor").html(data);
	$("#load-time").hide();
	},
	});
}




$("#hosp_centro").change(function(){
$("#load-time").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id= $("#hosp_centro").val();
$('#hosp_esp').val(null).trigger('change');
 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getcentEsp');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#hosp_esp").prop("disabled",false);
	$("#hosp_esp").html(data);
	$("#load-time").hide();
	},

	});
	
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospSala');?>',
	data:'id_centro='+id,
	success: function(data){
	
	$("#hosp_sala").html(data);
	
	},

	});
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospServ');?>',
	data:'id_centro='+id,
	success: function(data){
		$("#hosp_servicio").html(data);
	
	},

	});
	
	
	 $.ajax({
	type: "POST",
	url: '<?php echo site_url('admin_medico/getHospCama');?>',
	data:'id_centro='+id,
	success: function(data){
	$("#hosp_cama").html(data);

	},

	});
	
	
});
</script>
