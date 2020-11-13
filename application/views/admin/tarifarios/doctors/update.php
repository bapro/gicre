<?php
$user=($this->session->userdata['admin_name']);

 foreach($results as $row)
 
 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_date)));	
$updated_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_date)));
 
 
$codigo_prestador=$this->db->select('codigo')->where('id_doctor',$row->id_doctor)
->where('id_seguro',$row->id_seguro)->get('codigo_contrato')->row('codigo');
 ?>
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<div class="col-sm-12 col-md-offset-3" ><h2 class="modal-title">Editar Tarifario #<?=$row->id_tarif?></h2>
<div style="color:green" id="done"></div>
</div>
</div>
<form method="post" class="form-horizontal" >
<input type="hidden" class="form-control" id="id" value="<?=$row->id_tarif;?>">
<input type="hidden" class="form-control" id="updated_by" value="<?=$user;?>">
<?php if($isedit=="yes") { ?>
<div id="background_">
<div class="form-group" >
<label class="control-label col-sm-3">Codigo Prestador :</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="codigo_prestador" value="<?=$codigo_prestador;?>">
</div>
</div>
</div>
<?php } ?>
<div id="background_">

<div class="form-group" >
<br/>
<label class="control-label col-sm-3">Codigo :</label>
<div class="col-sm-3">
 <input type="text" class="form-control" id="codigo" value="<?=$row->codigo;?>">
<br/>
</div>

</div>

</div>
<div style="background:white">
<div class="form-group" >
<label class="control-label col-sm-3">Simon :</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="simon" value="<?=$row->simon;?>">
</div>
</div>
</div>
<div id="background_">
<div class="form-group" >
<label class="control-label col-sm-3">Procedimiento :</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="procedimiento" value="<?=$row->procedimiento;?>">
</div>
</div>
</div>
<div style="background:white">

<div class="form-group"  >
<br/>
<label class="control-label col-sm-3">Monto:</label>
<div class="col-sm-3">

<input type="text" class="form-control" id="monto" value="<?=$row->monto;?>">

	

</div>
</div>
</div>
<div id="background_">
<br/>
<div class="form-group" >
<div class="col-sm-12 col-md-offset-3" >
<button type="button" class="btn btn-primary btn-xs" id="update"> Guardar</button>
</div>

</div>

</div>
<div id="background_" class="alert alert-info" >


<p style="margin-left:20px">Creado por - <?=$row->inserted_by;?> - <?=$inserted_date;?> <br/>
Cambiado por - <?=$row->updated_by;?> - <?=$updated_date;?> 
</p>


</div>
</form>
<script>
$('#update').on('click', function(event) {
var id_doctor  = "<?=$row->id_doctor?>";
var id_seguro  = "<?=$row->id_seguro?>";
var id_tarif  = $("#id").val();
var codigo  = $("#codigo").val();
var simon  = $("#simon").val();
var codigo_prestador  = $("#codigo_prestador").val();
var procedimiento  = $("#procedimiento").val();
var monto  = $("#monto").val();
var updated_by  = $("#updated_by").val();

$.ajax({
type: "POST",
url: "<?=base_url('admin/save_edit_tarif')?>",
data: {id_tarif:id_tarif,codigo:codigo,simon:simon,procedimiento:procedimiento,updated_by:updated_by,
monto:monto,codigo_prestador:codigo_prestador,id_doctor:id_doctor,id_seguro:id_seguro},
cache: true,
 success:function(data){
$("#done").text("Modifacion ha sido hecha !");
},
  
});

return false;
});
</script>