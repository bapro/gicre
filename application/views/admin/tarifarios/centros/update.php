<?php 
$user=($this->session->userdata['admin_name']);

foreach($results as $row)
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_date)));	
$updated_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->updated_date)));	

$codigo=$this->db->select('codigo,id')->where('id_centro',$row->centro_id)
->get('codigo_contrato')->row_array();

 ?>
<div class="modal-header" id="background_">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<div class="col-sm-12 col-md-offset-3" >
<h2 class="modal-title">Editar Tarifario #<?=$row->id_c_taf?></h2>
<div style="color:green" id="done"></div>
</div>
</div>

<form method="post" class="form-horizontal">

<div style="background:white">

<div class="form-group" >
<br/>
<label class="control-label col-sm-3">Codigo Prestador :</label>
<div class="col-sm-3">
 <input type="text" class="form-control" id="codigo_prestador1" value="<?=$codigo['codigo'];?>">
<br/>
</div>

</div>

</div>




<div id="background_">

<div class="form-group" >
<br/>
<label class="control-label col-sm-3">Cups :</label>
<div class="col-sm-3">
 <input type="text" class="form-control" id="cups1" value="<?=$row->cups;?>">
<br/>
</div>

</div>

</div>
<div style="background:white">
<div class="form-group" >
<label class="control-label col-sm-3">Simon :</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="simon1" value="<?=$row->simons;?>">
</div>
</div>
</div>

<div id="background_">
<div class="form-group" >
<label class="control-label col-sm-3">Servicio :</label>
<div class="col-sm-9">
<input type="text" class="form-control" id="sub_groupo1" value="<?=$row->sub_groupo;?>">
</div>
</div>
</div>
<div style="background:white">

<div class="form-group"  >
<br/>
<label class="control-label col-sm-3">Monto:</label>
<div class="col-sm-3">

<input type="text" class="form-control" id="monto1" name="monto" value="<?=$row->monto;?>">

	

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
<div id="resultc"></div>
</form>
<script>
$('#update').on('click', function(event) {
var id_c_taf  = "<?=$row->id_c_taf?>";
var cups  = $("#cups1").val();
var simon  = $("#simon1").val();
var codigo_prestador  = $("#codigo_prestador1").val();
var sub_groupo  = $("#sub_groupo1").val();
var codigo_id  = "<?=$codigo['id'];?>";
var monto  = $("#monto1").val();
var updated_by = "<?=$user;?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/save_edit_tarifario_centro')?>",
data: {id_c_taf:id_c_taf,cups:cups,sub_groupo:sub_groupo,codigo_id:codigo_id,
codigo_prestador:codigo_prestador,simon:simon,monto:monto,updated_by:updated_by},
cache: true,
 success:function(data){
$("#done").text("Modifacion ha sido hecha !");
},
error: function(jqXHR, textStatus, errorThrown) {
                alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#resultc').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
});

return false;
});
</script>