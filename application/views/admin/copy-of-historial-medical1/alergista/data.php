<?php
 foreach ($val->result() as $row)
$user_c16=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c17=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));

?>
<style>
@media (min-width: 768px) {
  .modal-inc-width1 {
    width: 900;
    margin:  auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}
</style>
<div class="modal-header "  id="background_">
<button  type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i style="font-size:48px;color:red" class="fa fa-times-circle" ></i></button>

<h5 class="modal-title"  >Antecedentes Alergista # <?=$row->id?></h5>
<span>Creado por <?=$user_c16?>, <?=$inserted_time?></span><br/> 
 <span style="color:red"> Cambiado por <?=$user_c17?>, <?=$updated_time?></span> 
</div>
<div class="modal-body" >

<button type="button" class="show_modif_alergia btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<button type="button" id="save_alergia_hide" class="save_alergia_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/alerg")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
<hr id="hr_ad"/>
<form  id="save-update-enf-act" class="form-horizontal disable-all" enctype="multipart/form-data" >
<input type="hidden" name="id_alg" id="id_alg" value="<?=$row->id?>">
<input type="hidden" name="updated_by" id="updated_by" value="<?=$user?>">
<table  class="table"  cellspacing="0" style="width:80%;">
<!--row 1-->
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Antecedentes Familiares</label>
<div class="col-md-9">

<textarea class="form-control" id="ant_fam1"  ><?=$row->ant_fam?></textarea>
</div>

</div>
</td>
</tr>
<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Antecedentes Prenatales</label>
<div class="col-md-9">

<textarea class="form-control" id="ant_prenatales1"  ><?=$row->ant_prenatales?></textarea>
</div>

</div>
</td>
</tr>
<!--row 2-->

<tr>
<td class="ida" >

<div class="form-group">
<label class="control-label col-md-3" >Factores De Ambiente</label>
<div class="col-md-9">

<textarea class="form-control" id="factories_ambiente1"  ><?=$row->factories_ambiente?></textarea>
</div>

</div>
</td>
</tr>


</table>

</form>
</div>
<script>
$(".disable-all :input").prop("disabled", true);

$(".show_modif_alergia").on('click', function (e) {
	$('.show_modif_alergia').hide();
	$(".save_alergia_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)
	
	
$('#save_alergia_hide').on('click', function(event) {
event.preventDefault();

var updated_by = $("#updated_by").val();
var id_alg  = $("#id_alg").val();
var ant_fam1 = $("#ant_fam1").val();
var ant_prenatales1 = $("#ant_prenatales1").val();
var factories_ambiente1 = $("#factories_ambiente1").val();

 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpAlergia')?>",
data: {id_alg:id_alg,updated_by:updated_by,ant_fam1:ant_fam1,ant_prenatales1:ant_prenatales1,factories_ambiente1:factories_ambiente1},

cache: true,
  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_alergia').slideDown();
	$(".save_alergia_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});
	
</script>