<style>
.hide-logo{display:none}
.disab {pointer-events:none}

</style>

<span class="loadf"></span>
<div id="new_content"></div>

<div class="col-md-12 table-responsive" style="border:1px solid #38a7bb;height:850px;background:rgb(242,242,242)" id="hide_default">
<h3 style="color:green;text-transform:uppercase" >SEGURO MEDICO <?=$seguro?>
 - Codigo Contrato : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo?>"/>
 <span id="hide-cc"><?=$codigo?></span> 
 <button  type="button" class="btn btn-sm btn-default" id="show-s-b-cc" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 </h3>
   <ul style='color:black'>
<li>Creado por <?=$u1?> fecha <?=$inserted_time?></li>
<li>Editado por <?=$u2?> fecha <?=$updated_time?> </li>
</ul>
<br/>
<a onclick="return confirm('Esta seguro de elimiar todos ?')"  title="Eliminar todos" href="<?php echo base_url("admin_medico/delete_all_tarifarios/$seguro_id/$id_doctor")?>"  style="color:red;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true"></i> Borrar todo</a>
<table class="table table-striped table-bordered" id="example4">
<thead>
 <tr>
<th><input style="width:90px" id="new-cups" class="form-control" type="text"/> </th>
<th><input style="width:90px" id="new-simon" class="form-control" type="text"/> </th>
<th><input style="width:100%" id="new-proced" class="form-control" type="text"/> </th>
<th><input style="width:90px" id="new-monto" class="form-control" type="text"/> </th>
<th> <button type="button" id="NewsaveBtn" class="btn btn-sm btn-success" style="float: none;"><i class="fa fa-save"> Guardar</i></button></th>
</tr>
<tr style="background:#38a7bb;color:white">
<th>CUPS</th>
<th>SIMON</th>
<th>PROCEDIMIENTO</th>
<th>MONTO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php
$cpt="";
$noedit="no";
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
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id_tarif?>" class="<?=$row->id_seguro?>">
<td>
<span class="editSpan codigo-n"><?=$row->codigo?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm codigo" name="codigo"  type="text"   value="<?=$row->codigo?>"  />
</td>
<td>
<span class="editSpan simon-n"><?=$row->simon?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simon"  type="text" name="simon"  value="<?=$row->simon?>"  />
</td>
<td>
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
</div>


<div class="modal fade" id="edit_tarifario" tabindex="-1" role="dialog" >
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>
<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<?php $categoria=$this->db->select('id_categoria')->where('id_seguro',$seguro_id)
->where('id_doctor',$id_doctor)->get('tarifarios')->row('id_categoria'); 
?>
<script>
/* $('#deletesuccess').delay(3000).fadeOut();
$("#id_doc").change(function(){
$("#add_doc").prop("disabled",false);
});*/
$(document).ready(function() {
    $('#example4').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
//"aaSorting": [ [0,'desc'] ],

    } );
	
	
	    $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
} );


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








//---------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });

	
		
	$('.saveBtn').on('click',function(){
//var trObj = $(this).closest("tr");
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
var updated_by  = "<?=$user_name?>";
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


$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/save_edit_tarif')?>",
dataType: "json",
data:'id_tarif='+ID+'&'+inputData+"&updated_by="+updated_by,
cache: true,
success:function(data){

}
});
   }
});



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
var codigo_id  = "<?=$codigo_id?>";
 var user_name  = "<?=$user_name?>";
$.ajax({
type: "POST",
url: '<?php echo site_url('admin_medico/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo,user_name:user_name},
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
$.ajax({
type:'POST',
url: "<?=base_url('medico/saveNewTarifMedico')?>",
data:{cups:cups,simons:simons,monto:monto,procedimiento:procedimiento,id_seguro:<?=$seguro_id?>, categoria:<?=$categoria?>},
cache: true,
success:function(data){
loadDocTarif();
}
});
  
})
</script>

