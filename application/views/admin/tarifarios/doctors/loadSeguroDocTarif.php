<?php
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$id_seguro)
->get('seguro_medico')->row_array();


if($seguro['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguro['logo'].'"  />';
}
$codigo_contrato=$this->db->select('codigo,id,plan,updated_by,updated_time,inserted_by,inserted_time')->where('id_seguro',$id_seguro)->where('id_doctor',$id_doctor)->where('plan',$id_plan)
->get('codigo_contrato')->row_array();
if($id_seguro !=11){

$plan=$this->db->select('name')->where('id',$id_plan)->get('seguro_plan')->row('name');
$planOcentro="($plan)";

}else{
$centro=$this->db->select('name')->where('id_m_c',$id_plan)->get('medical_centers')->row('name');
$planOcentro="<br/>$centro";
}
$u1=$this->db->select('name')->where('id_user',$codigo_contrato['inserted_by'])->get('users')->row('name');
$u2=$this->db->select('name')->where('id_user',$codigo_contrato['updated_by'])->get('users')->row('name');




$updated_time = date("d-m-Y H:i:s", strtotime($codigo_contrato['updated_time']));
$inserted_time = date("d-m-Y H:i:s", strtotime($codigo_contrato['inserted_time']));
foreach($results as $cat)

 ?>

<div class="loadf"></div>
<span id='hide-after-delete-all'>
<p style="color:green" >
Seguro Medico :<?=$seguro['title']?> <?php echo $seguro_logo; ?> <?=$planOcentro?>
 - Codigo Contrato : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo_contrato['codigo']?>"/>
 <span id="hide-cc"><?=$codigo_contrato['codigo']?></span>
 <button  type="button" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 </p>
 <hr id="hr_ad"/>

 <ul style='color:black; list-style-type: none;'>
<li>Creado por <?=$u1?> fecha <?=$inserted_time?></li>
<li>Editado por <?=$u2?> fecha <?=$updated_time?> </li>
</ul>
<?php
$docfac=$this->db->select('medico')->where('medico',$id_doctor)->where('seguro_medico',$id_seguro)->get('factura2')->row('medico');
if($docfac==$id_doctor){
$disable='disabled';$tit='No se puede borrar estos tarifarios porque tienen facturas vinculadas';	
}else{
$disable='';$tit='';
}
?>
<p>
<button <?=$disable?> title="<?=$tit?>" type="button" id='delete-all-tarifarios' style='background:red'  class="btn btn-primary btn-xs"><i  class="fa fa-trash" aria-hidden="true"></i> Borrar Todos</button>
</p>
<table class="table table-striped table-bordered" id="example2">
<thead>
 <tr>
<td><input style="width:90px" id="new-cups" value='0' class="form-control" type="text"/> </td>
<td><input style="width:90px" id="new-simon" value='0' class="form-control" type="text"/> </td>
<td><input style="width:100%" id="new-proced" placeholder='procedimiento' class="form-control" type="text"/> </td>
<td><input style="width:90px" id="new-monto" placeholder='monto' class="form-control" type="text"/> </td>
<td> <button type="button" id="NewsaveBtn" class="btn btn-primary btn-xs" style="float: none;"><span  class="glyphicon glyphicon-plus-sign"></span> Agregar</button></td>
</tr>
<tr style="background:#38a7bb;color:white">
<th  style='display:none'>#</th>
<th>CODIGO</th>
<th>SIMON</th>
<th style='width:10px'>PROCEDIMIENTO</th>
<th>MONTO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php
$cpt="";
$noedit="yes";
foreach($results as $row)
{
$u22=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$updated_timed = date("d-m-Y H:i:s", strtotime($row->updated_date));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
}
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id_tarif?>">
<td style='display:none'>
<?=$row->id_tarif?>
</td>
<td>
<span class="editSpan codigo-n"><?=$row->codigo?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm codigo" name="codigo"  type="text"   value="<?=$row->codigo?>"  />
</td>
<td>
<span class="editSpan simon-n"><?=$row->simon?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simon"  type="text" name="simon"  value="<?=$row->simon?>"  />
</td>
<td >
<span class="editSpan procedimiento-n"><?=$row->procedimiento?></span>
 <input style="display: none;width:100%" class="editInput  form-control input-sm procedimiento"  type="text"  name="procedimiento" value="<?=$row->procedimiento?>"  />
</td>
<td>
<span class="editSpan monto-n"><?=$row->monto?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm monto"  type="text" name="monto"  value="<?=$row->monto?>"  />
</td>
<!--
<td>
<a data-toggle="modal" data-target="#edit_tarifario" class="st" href="<?php echo base_url("admin/edit_tarifario/$row->id_tarif/$noedit")?>" title="Editar un tarifario"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a class="st delete-tarifarios" id="<?=$row->id_tarif; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
</td>
-->
<td>
<div class="btn-group btn-group-sm">
<button type="button" title="Ultimo cambio hecho &#10; por <?=$u22?> &#10; fecha  <?=$updated_timed?>" class="btn btn-sm btn-default editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<!--<button type="button" class="btn btn-sm btn-default deleteBtn" style="float: none;"><span class="glyphicon glyphicon-trash"></span></button>-->
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-tarifarios" id="<?=$row->id_tarif; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>


</tr>
<?php
}
?>
</tbody>
</table>
</span>
<script>
$(document).ready(function() {
    $('#example2').DataTable( {
		"order": [[ 0, "desc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
  } );


	    $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });


	$(".delete-tarifarios").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/delete_tarifarios')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){
$(this).remove();
});

}
});
}
})

//---------------------------------------------------------------------------------------------------------


$("#delete-all-tarifarios").click(function(){
if (confirm("Estás seguro de borrar todos los tarifarios ?"))
{

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/DeleteAllTarif')?>',
data: {id_seguro:<?=$id_seguro?>,id_doctor:<?=$id_doctor?>,id_plan:<?=$id_plan?>,},
success:function(response) {
constant_load_seguro();
$("#delete-all-tarifarios").prop('disabled',true);
$('#hide-after-delete-all').fadeOut("slow");
},
});

}

})

//---------------------------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });
} );



$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var codigo = $(this).closest("tr").find(".codigo").val();
 var simon = $(this).closest("tr").find(".simon").val();
  var procedimiento = $(this).closest("tr").find(".procedimiento").val();
   var monto = $(this).closest("tr").find(".monto").val();
   if(codigo=="" || simon=="" || procedimiento=="" || monto==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".codigo-n").text(codigo);
	  $(this).closest("tr").find(".simon-n").text(simon);
	    $(this).closest("tr").find(".procedimiento-n").text(procedimiento);
      $(this).closest("tr").find(".monto-n").text(monto);
//---------------------------------------------------------------------------------
var user_name=<?=$user_name?>;

$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/save_edit_tarif')?>",
dataType: "json",
data:'id_tarif='+ID+'&'+inputData+'&user_name='+user_name,
cache: true,
success:function(data){

}
});
   }
});


//---------------------------------------------------------------------------------------------------------
   $('#show-s-b-cc').on('click',function(){
         //hide edit button
        $("#show-cc").show();

        $("#hide-cc").hide();
		$(this).hide();
        $("#save-b-cc").show();
    });



 $('#save-b-cc').on('click', function () {
var codigo  = $("#show-cc").val();
  if(codigo==""){
	 alert("El codigo no se puede dejar vacio !");
 } else {
var codigo_id  = <?=$codigo_contrato['id']?>;

$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo,user_name:<?=$user_name?>},
success: function(data){
$("#show-cc").hide();
$("#hide-cc").show();
$("#hide-cc").text(codigo);
 $("#save-b-cc").hide();
  $("#show-s-b-cc").show();
},
});
 }
});


$('#NewsaveBtn').on('click',function(){
var cups=$("#new-cups").val();
var simons = $("#new-simon").val();
var procedimiento=$("#new-proced").val();
var monto = $("#new-monto").val();
if(procedimiento !='' && monto  !='' ){
	$('#NewsaveBtn').prop("disabled",true);
$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/saveNewTarifMedico')?>",
data:{cups:cups,simons:simons,monto:monto,procedimiento:procedimiento,id_doctor:<?=$id_doctor?>,plan:<?=$id_plan?>,id_seguro:<?=$id_seguro?>, categoria:<?=$cat->id_categoria?>,id_user:<?=$user_name?>},
cache: true,
success:function(data){
loadSeguroDocTarif();
},

});
}
})
</script>
