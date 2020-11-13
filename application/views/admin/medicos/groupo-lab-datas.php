<table id="grouped-lab" class="table table-striped" style="margin:auto" width="70%" cellspacing="0">
<thead>
<tr>
<td style='text-align:left'>
<div class="input-group" style="width:100%">
    <span class="input-group-addon">Crear Groupo</span>
    <input  class="form-control" id='nuevo-grou' value="<?=$groupo?>" readonly />
</div>
</td>
</tr>
<tr>
<td><input placeholder="Agregar Nuevo Laboratorio" id="nuevo-lb" style="width:100%" class="form-control"/></td>
<td><button id="btn-nuevob" class="btn btn-primary btn-xs"> Agregar Nuevo</button></td>
</tr>
<tr style="background:#5957F7;color:white">
<th style="width:5px">Laboratorios</th>
<th style="width:1px">Editar</th>
</tr>

</thead>
<tbody>
<?php 


foreach($query->result() as $row)
{

?>
<tr id="<?=$row->id?>">

<td  style="text-transform:uppercase">
<span class="editSpan lab-n"><?=$row->lab_name;?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-lab" name="edit-lab"  type="text"   value="<?=$row->lab_name?>"  />
 </td>

<td style="width:1px" >
<button type="button"  class="btn btn-sm btn-success editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>

<button type="button"  class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-lab" id="<?=$row->id; ?>"  style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>

</tr>

<?php
}
?>
</tbody>    
</table>
<script>

 $("#nuevo-lb").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#grouped-lab tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	 
    });
  });
  


function listarLab(){
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarLab')?>",
success:function(data){
$('#list-lab').html(data);

},


});	
	
}



  $('#btn-nuevob').on('click', function(event) {
event.preventDefault();
var nuevolab  = $("#nuevo-lb").val();
var nuevogroupo  = $("#nuevo-grou").val();
if(nuevolab !=""){
$('#btn-nuevob').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/nuevoLab')?>",
data: {nuevolab:nuevolab,groupo:nuevogroupo},
success:function(data){
$('#nuevo-lb').val('');
$('#btn-nuevob').prop('disabled',false);
loadGroupo(nuevogroupo);
},


});		
  } 
});


//======================================================================================================================


   $('.editBtn').on('click',function(){
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });	
	
	
	
	$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var lab = $(this).closest("tr").find(".edit-lab").val();
 
   if(lab !=""){
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

//---------------------------------------------------------------------------------
//--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".lab-n").text(lab);

//------------------------------------------------------------------------------------
$.ajax({
type:'POST',
url: "<?=base_url('admin_medico/edit_lab_groupo')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(data){

},

});
   }
});


//----------------------------------------------------------------------------------------------------


//------------------------------------------------------------------------------------------------

$(".delete-lab").click(function(){
if (confirm("Estás seguro de borrar ?"))
{
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteLabGrouped')?>',
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
</script>