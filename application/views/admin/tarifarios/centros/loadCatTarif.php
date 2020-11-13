<div id="tttt"></div>
<table class="table table-striped table-bordered uptade-table"  id="example">
<thead>
<tr>
<th colspan='5'  style="text-align:center;text-transform:uppercase;color:#38a7bb"><?=$categoria?>  <span style="color:black;text-transform:lowercase"><i>(<?=$count?> datos)</i></span></th>
</tr>
 <tr>
<th><input id="new-cups" class="form-control" type="text"/> </th>
<th><input id="new-simon" class="form-control" type="text"/> </th>
<th><input id="new-consulta" style="width:100%"  class="form-control" type="text"/> </th>
<th><input id="new-monto" class="form-control" type="text"/> </th>
<th> <button type="button" id="NewsaveBtn" class="btn btn-sm btn-success" style="float: none;"><i class="fa fa-save"> Guardar</i></button></th>
</tr>
<tr style="background:#38a7bb;color:white">
<th style="width:9%">CUPS</th>
<th style="width:9%">SIMON</th>
<th>SERVICO</th>
<th style="width:9%">MONTO</th>
<th>Accion</th>
</tr>
</thead>
<tbody >
<?php
$cpt="";
foreach($results as $row)
{
	$updated_time  = date("d-m-Y", strtotime($row->updated_date));	
	$updated_by=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr bgcolor='<?=$colorBg?>' id="<?=$row->id_c_taf; ?>" >
<td>
<span class="editSpan cups-n"><?=$row->cups?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm cups" name="cups"  type="text"   value="<?=$row->cups?>"  />
</td>
<td>
<span class="editSpan simons-n"><?=$row->simons?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm simons" name="simons"  type="text"   value="<?=$row->simons?>"  />
</td>
<td>
<span class="editSpan sub_groupo-n"><?=$row->sub_groupo?></span>
 <input style="display: none;width:100%" class="editInput  form-control input-sm sub_groupo" name="sub_groupo"  type="text"   value="<?=$row->sub_groupo?>"  />
</td>
<td>
<span class="editSpan monto-n"><?=$row->monto?></span>
 <input style="display: none;width:70px" class="editInput  form-control input-sm monto" name="monto"  type="text"   value="<?=$row->monto?>"  />
</td>
<td>
<div class="btn-group btn-group-sm">
<button type="button" class="btn btn-sm btn-default editBtn " title="Ultimo cambio hecho &#10; por <?=$updated_by?> &#10; fecha  <?=$updated_time?>" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-tarifarios-centro" id="<?=$row->id_c_taf; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>

</tr>
<?php
}
?>
</tbody>
</table>

<script>
	
	$(document).ready(function() {
	
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },


    } );
	
$(".delete-tarifarios-centro").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/delete_tarifarios_centro')?>',
data: {id : del_id},
success:function(response) {
// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
display_centro_tarif_cat();
}
});
}
})	

} );

 $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });

	
//---------------------------------------------------------------------------------------
   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();
        
        $(this).closest("tr").find(".saveBtn").show();
		
		  $(this).closest("tr").find(".editSpan").hide();
        
        //show edit input
        $(this).closest("tr").find(".editInput").show();
        
    });

//---------------------------------------------------------------------------------------


	$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
//-------------------------------------------------------------------------------
  var cups = $(this).closest("tr").find(".cups").val();
 var simons = $(this).closest("tr").find(".simons").val();
  var sub_groupo = $(this).closest("tr").find(".sub_groupo").val();
   var monto = $(this).closest("tr").find(".monto").val();
   if(cups=="" || simons=="" || sub_groupo=="" || monto==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide(); 
 $(this).closest("tr").find(".editBtn").show();  
   
   $(this).closest("tr").find(".editInput").hide(); 
   	  $(this).closest("tr").find(".editSpan").show();
	  
   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".cups-n").text(cups);
	  $(this).closest("tr").find(".simons-n").text(simons);
	    $(this).closest("tr").find(".sub_groupo-n").text(sub_groupo);
      $(this).closest("tr").find(".monto-n").text(monto);
//---------------------------------------------------------------------------------


$.ajax({
type:'POST',
url: "<?=base_url('admin/save_edit_tarifario_centro')?>",
dataType: "json",
data:'id_c_taf='+ID+'&'+inputData,
cache: true,
success:function(data){

}
});
   }
});




$('#NewsaveBtn').on('click',function(){
var cups=$("#new-cups").val();
var simons = $("#new-simon").val();
var consulta=$("#new-consulta").val();
var monto = $("#new-monto").val();
$.ajax({
type:'POST',
url: "<?=base_url('admin/saveNewTarifCentro')?>",
data:{cups:cups,simons:simons,consulta:consulta,monto:monto,categoria:"<?=$categoria?>",id_centro:<?=$id_centro?>,id_seguro:<?=$id_seguro?>},
cache: true,
success:function(data){
loadCatTarif();
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#tttt').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
  
})
</script>