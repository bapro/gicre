<?php foreach($results as $rw)
echo $rw->id_categoria;
?>
<script>

$("#id_doc").change(function(){
$("#add_doc").prop("disabled",false);
});
$(document).ready(function() {
 $('#edit_tarifario').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
} );


$('.id_doc').select2({
	 width: '100%',
 placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});




$('#add_doc').on('click', function(event) {
$("#load_add").fadeIn().html('<span class="load"   ><img  src="<?= base_url();?>assets/img/loading.gif" /></span>');
var id_doc  = $("#id_doc").val();
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/addDoctTarif')?>",
data: {id_categoria:id_categoria,id_doc:id_doc,id_seguro:id_seguro},
cache: true,
 success:function(data){
$("#load_add").hide();	 
 $('#old_content').hide();
 $('#new_content').html(data);
$('.id_doc').val(null).trigger('change');
$("#add_doc").prop("disabled",true);
},
 
});

return false;
});	

//=====================================================================

$(".deletedoctor").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$('#remove-this-doctor').css('background','tomato');
$('#remove-this-doctor').fadeOut(800, function(){ 
$(this).remove();
});
$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctorTarif')?>',
data: {id : del_id,id_categoria:id_categoria,id_seguro:id_seguro},
success:function(data) {

 $('#old_content').hide();
 $('#new_content').html(data);
}
});
}
})

//=======================================================================================

</script>

