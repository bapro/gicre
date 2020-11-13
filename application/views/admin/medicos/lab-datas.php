<table id="example" class="table table-striped" style="margin:auto" width="70%" cellspacing="0">
<thead>
<tr>
<td style='text-align:left'>
<div class="input-group" style="width:100%">
    <span class="input-group-addon">Grupo</span>
	<select  class="form-control select2"   id='nuevo-groupo' >
<option value=''></option>

	<?php 
	 $sqllbb ="SELECT * FROM h_c_groupo_lab  GROUP BY groupo ORDER BY id DESC";
     $querylbb= $this->db->query($sqllbb);
	 foreach ($querylbb->result() as $row){
	echo "<option value='".$row->groupo."'>$row->groupo</option>
	";
     }
	?>
   </select>
</div>
</td>
</tr>
<tr>
<td><input placeholder="Agregar Nuevo Laboratorio" id="nuevo-lab" style="width:100%" class="form-control"/></td>
<td><button id="btn-nuevo" class="btn btn-primary btn-xs" > Agregar Nuevo</button></td>
<td></td>
</tr>
<tr style="background:#5957F7;color:white">
<th style="width:5px">Laboratorios</th>
<th style="width:1px">Anexar al grupo</th>
<th style="width:1px" colspan='2'>Acciones</th>
</tr>

</thead>
<tbody>
<?php 


foreach($query->result() as $row)
{

?>
<tr id="<?=$row->id?>">
<td class="especialidad" style="text-transform:uppercase">
<span class="editSpan lab-n"><?=$row->name;?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-lab" name="edit-lab"  type="text"   value="<?=$row->name?>"  />
 </td>
 <td style="width:1px" >
<input type='checkbox' class="check-lab" name="check-lab" value="<?=$row->id?>" disabled>

</td>
<td >
<button type="button"  class="btn btn-sm btn-success editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>

<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
<a class="st delete-lab" id="<?=$row->id; ?>" style="color:red;background:white"  title="Eliminar"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>

</tr>

<?php
}
?>
</tbody>    
</table>
<script>

$('.select2').select2({ 
tags: true  
 
});	


 $("#nuevo-lab").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#example tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	 
    });
  });
  
  function listgroup(){
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarGroupLab')?>",
success:function(data){
$('#list-group').html(data);

},


});	
	
}

function listarLab(){
$("#list-lab").fadeIn().html('<span style="font-size:24px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listarLab')?>",
success:function(data){
$('#list-lab').html(data);

},


});	
	
}


/*
  $('#btn-nuevo').on('click', function(event) {
event.preventDefault();
var nuevolab  = $("#nuevo-lab").val();
var nuevogroupo  = $("#nuevo-groupo").val();
	var checked = [];
            $.each($("input[name='check-lab']:checked"), function(){
                checked.push($(this).val());
            });
$('#btn-nuevo').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/nuevoLab')?>",
data: {nuevolab:nuevolab,checked:checked,groupo:nuevogroupo},
success:function(data){
$(':input').val('');
$(".check-lab"). prop("checked", false);
$('#btn-nuevo').prop('disabled',false);
listgroup();
listarLab();
},


});		
 
});*/


 $('#btn-nuevo').on('click', function(event) {
event.preventDefault();
var nuevolab  = $("#nuevo-lab").val();
var nuevogroupo  = $("#nuevo-groupo").val();
$('#btn-nuevo').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/nuevoLab')?>",
data: {nuevolab:nuevolab,groupo:nuevogroupo},
success:function(data){
$(':input').val('');
$(".check-lab"). prop("checked", false);
$('#btn-nuevo').prop('disabled',false);
listgroup();
listarLab();
},


});		
 
})


var checkboxes = $("input[name='check-lab']");

checkboxes.click(function() {
	if(checkboxes.is(":checked")){
		$('#btn-nuevo').prop("disabled",true);
	} else {
		$('#btn-nuevo').prop("disabled",false);
		}

});


 $('#nuevo-groupo').on('change', function(event) {
	 if($(this).val()==""){
	$('.check-lab').prop('disabled',true); 
 }else{
	$('.check-lab').prop('disabled',false);  
 }
 })
 
  $('.check-lab').on('change', function(event) {
	var labCheckded= $(this).val();
	var nuevogroupo  = $("#nuevo-groupo").val();
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/nuevoLabGroupo')?>',
		data: {lab:lab,nuevogroupo:nuevogroupo},
		success:function(data) {
    listgroup();
		
      },


	});
} else {
	 var lab=labCheckded;
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/deleteLabGroupo')?>',
		data: {lab:lab,nuevogroupo:nuevogroupo},
		success:function(data) {
		
	  },

	});
	
} 
 })
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
url: "<?=base_url('admin_medico/edit_lab')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(data){

},

});
   }
});


//------------------------------------------------------------------------------------------------

$(".delete-lab").click(function(){
if (confirm("Estás seguro de borrar ?"))
{
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteLab')?>',
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