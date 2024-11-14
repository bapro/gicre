
 <div id="lab-filtered"></div>
<table id="all-labs" class="table table-striped table-sm"  cellspacing="0" style="width:100%">
<thead>
<tr>
<td style="width:500px"><input placeholder="Buscar Laboratorio" id="nuevo-lab"  class="form-control"/></td>
<td><button id="btn-nuevo" class="btn btn-primary btn-sm" > Agregar Nuevo</button></td>
<td></td>
</tr>
<tr>
<th style="width:5px">Laboratorios (<?=$totatlabo?>)</th>
<th style="width:20px">Anexar al grupo</th>
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
 <span class='nuevo-groupo-add' style='position:absolute;float:left;color:green;z-index:40000;background:white'></span>
<input type='checkbox' class="check-lab" name="check-lab" value="<?=$row->id?>" disabled>

</td>
<td >
<button type="button"  class="btn btn-sm btn-primary editBtn " style="float: none;font-size:12px" ><i class="bi bi-pencil-square"></i></button>

<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;"><i class="bi bi-save2"></i></button>
<a class="st delete-lab btn btn-danger btn-sm" id="<?=$row->id; ?>"   title="Eliminar"><i class="bi bi-trash" aria-hidden="true"></i></a>

</td>

</tr>

<?php
}
?>
</tbody>    
</table>
<script>
$('#all-labs').DataTable( {
	   //"pageLength": 20,
	   "sDom": 'lrtip',
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
			
        },
"aaSorting": [ [1,'ASC'] ],

    } );
	

$('.select2-lab').select2({
	dropdownParent: $('#offcanvasScrollingLab'),
		theme: 'bootstrap-5',
		width: '100%',
		tags:true
		
		
	});



  
  	var keyupTimerLabI;
		  $(document).on('keyup', '#nuevo-lab', function(event) {
   	var keyword = $(this).val();
            clearTimeout(keyupTimerLabI);
           
            keyupTimerLabI = setTimeout(function () {
               autoCompleteInputSearchLabGrupo(keyword, "lab-filtered", "nuevo-lab");
            }, 300);
        });
 
  
  
  function listgroup(){
	$.ajax({
type: "POST",
url: "<?=base_url('medico_laboratory/listarGroupLab')?>",
data: {},
success:function(data){
$('#list-group').html(data);

},


});	
	
}





 $('#btn-nuevo').on('click', function(event) {
event.preventDefault();
var nuevolab  = $("#nuevo-lab").val();
if(nuevolab !=""){
var nuevogroupo  = $("#nuevo-groupo").val();
$('#btn-nuevo').prop('disabled',true);
$.ajax({
type: "POST",
url: "<?=base_url('medico_laboratory/nuevoLab')?>",
data: {nuevolab:nuevolab,groupo:nuevogroupo},
success:function(data){
//$(':input').val('');
$(".check-lab"). prop("checked", false);
$('#btn-nuevo').prop('disabled',false);
listgroup();
//listarLab();
loadGroupo(nuevogroupo);
},

});		
 }
})


/*var checkboxes = $("input[name='check-lab']");

checkboxes.click(function() {
	if(checkboxes.is(":checked")){
		$('#btn-nuevo').prop("disabled",true);
	} else {
		$('#btn-nuevo').prop("disabled",false);
		}

});*/


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
	 	var checkagregado = $(this).closest("tr").find(".nuevo-groupo-add");
   if ($(this).is(':checked')) {
     var lab= $(this).val();
	$.ajax({
		type:'POST',
		url:'<?=base_url('admin_medico/nuevoLabGroupo')?>',
		data: {lab:lab,nuevogroupo:nuevogroupo,id_user:<?=$id_user?>},
		success:function(data) {
		checkagregado.html(data).delay( 2000 ).hide(0);
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
	checkagregado.html(data).delay( 2000 ).hide(0);
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
url: "<?=base_url('medico_laboratory/edit_lab')?>",
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
url:'<?=base_url('medico_laboratory/deleteLab')?>',
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