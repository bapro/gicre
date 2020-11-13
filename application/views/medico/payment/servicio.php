<h3>Crear Servicio</h3>

<table class='table table-striped' id='bodaga-table'>
<?php
if($perfil=='Medico'){
if($query2->result() !=NULL){	
$display='none';
} else{
	$display='';
	}
}else{
	$display='none';
}
?>
<tr>
<th>NOMBRE</th><th>PRECIO</th><th>ACCIONES</th>
</tr>
<tr>
<td>
 <input  class="form-control" id="add-servicio"  type="text" style='display:<?=$display?>' />
</td>
<td>
<div class="input-group" style='display:<?=$display?>'>
<span class="input-group-addon"><i class="fa fa-usd" aria-hidden="true"></i></span>
<input type="number" min="0" max="10000" step="1"  class="form-control"  id="add-precio"  type="text"   >
<span class="input-group-addon"><strong>USD</strong></span>
</div>
</td>
<td>

<button type="button" id="saveServicio" class="btn btn-sm btn-success" style='display:<?=$display?>'>Crear</button>
</td>
</tr>
<?php

foreach ($query2->result() as $row){

	?>
<tr id="<?=$row->id?>">
<td >
<?php $doctor=$this->db->select('name')->where('id_user',$row->id_doctor)->get('users')->row('name');
echo "<strong>Doc.(a) $doctor</strong><br/>";
?>
<span class="editSpan name-n"><?=$row->name?></span>
 <input style="display: none;width:100%"  class="form-control editInput input-sm edit-name" name="edit-name"  type="text"   value="<?=$row->name?>"  />
</td>
<td><br/>
<span class="editSpan precio-n">$<?=$row->price?>USD</span>
 <input style="display: none;width:40%" class="editInput  form-control input-sm edit-precio" name="edit-precio"  type="text"   value="<?=$row->price?>"  />
</td>
<td>
<br/>
<div class="btn-group btn-group-sm">
<button type="button"  class="btn btn-sm btn-success editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
</div>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-servicio" id="<?=$row->id; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>
</tr>

<?php
}
?>

</table>

<script>
$('#saveServicio').click(function () {
	if($('#add-servicio').val() !='' && $('#add-precio').val() !="" ){
$('#saveServicio').prop('disabled',true);
$('#saveServicio').text('guardando...');
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/savePrecioPayPal')?>",
data :{id_doctor:<?=$id_doctor?>,servicio:$('#add-servicio').val(),precio:$('#add-precio').val()},
cache: true,
success:function(data){
	listServicio();
},
  
});
}
});

//-----------------------------------------------------------------------------

   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });	
	
//-----------------------------------------------------------------------------------------------------------------------------

$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var serv = $(this).closest("tr").find(".edit-name").val();
  var precio = $(this).closest("tr").find(".edit-precio").val();
   if(serv !="" || precio!=""){
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

//---------------------------------------------------------------------------------
//--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".name-n").text(serv);
	  $(this).closest("tr").find(".precio-n").text("$"+precio+"USD");
//------------------------------------------------------------------------------------
$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/updateServicePayPal')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(data){

},

});
   }
});


//---------------------------------------------------------------------------------------------------------------------
$(".delete-servicio").click(function(){
if (confirm("Estás seguro de borrar ?"))
{
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteServicePayPal')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){
$(this).remove();
});
listServicio();
}
});
}

})
</script>