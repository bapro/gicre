<style>
.hide-logo{display:none}
.disab {pointer-events:none}
</style>
<h4 style="color:green">II- TARIFARIOS POR  MEDICOS </h4>
<span class="loadf"></span>
<div id="new_content"></div>
<div id="old_content">
<?php 

foreach($results as $rw)
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$rw->id_seguro)
->get('seguro_medico')->row_array();


$categoria=$this->db->select('title_area')->where('id_ar',$rw->id_categoria)
->get('areas')->row('title_area');

$codigo_contrato=$this->db->select('codigo')->where('id_seguro',$rw->id_seguro)
->get('codigo_contrato')->row('codigo');

$medico=$this->db->select('name')->where('id_user',$rw->id_doctor)
->get('users')->row('name');
 ?>

<div class="col-md-3">

<h5 style="color:green">Escojer el Seguro Medico para mostrar los tarifarios</h5>
<?php
$i = 1;


 
 foreach($seguro_doc_tarif_grouped as $do)
{
if($do->logo==""){
$seguro_logo="";
$mas="";

} else{
$seguro_logo='<img  style="width:60px;" src="'.base_url().'/assets/img/seguros_medicos/'.$do->logo.'"  />';	
$mas='<i class="fa fa-plus" aria-hidden="true" title="Ver detalles"></i> Mas';	
}

?>

<p style='text-transform:uppercase;text-align:left;'><?=$i;$i++;?> -<a id="<?=$do->id_sm?>" title="Mostrar los tarifarios" href="" class="get-this-seguro"> <?php echo $seguro_logo; ?> <?=$do->title?></a> - <a data-toggle="modal" data-target="#EditSeguroMedico" title="Ver los detalles sobre <?=$do->title?>" href="<?php echo base_url('admin/EditSeguroMedico/'.$do->id_sm)?>"><?=$mas?></a></p>

<?php

}

?>

</div>
</div>
<div class="col-md-9 table-responsive" style="border:1px solid #38a7bb;height:850px;background:rgb(242,242,242)" id="hide_default">
<h2 style="color:green;text-transform:uppercase" >MEDICO <?=$medico?></h2>
 <hr id="hr_ad"/>
<div id="show_other" style="text-align:center;"><span class="alert alert-info" >Los tarifarios se muestran aqui.<span></div>
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
<script>
 $('#deletesuccess').delay(3000).fadeOut();
$("#id_doc").change(function(){
$("#add_doc").prop("disabled",false);
});
$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
	
	
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
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_doc  = $("#id_doc").val();
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/addDoctTarif')?>",
data: {id_categoria:id_categoria,id_doc:id_doc,id_seguro:id_seguro},
cache: true,
 success:function(data){
$(".loadf").hide();	 
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
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var el = this;
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row
/*
$('#remove-this-doctor').css('background','tomato');
$('#remove-this-doctor').fadeOut(800, function(){ 
$(this).remove();
});*/
$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctorTarif')?>',
data: {id : del_id,id_categoria:id_categoria,id_seguro:id_seguro},
success:function(data) {
$(".loadf").hide();	
 $('#old_content').hide();
 $('#new_content').html(data);
}
});
}
})
$( document ).ready(function() {
$('#EditSeguroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
});


//=======================================================================================
$('.get-this-seguro').click(function(){
$("#show_other").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_seguro = $(this).attr('id');
var id_doctor = "<?=$rw->id_doctor?>";
var user_name = "<?=$user_name?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/other_seguro_tarif')?>",
data: {id_seguro:id_seguro,id_doctor:id_doctor,user_name:user_name},
cache: true,
 success:function(data){
 
 $('#show_other').html(data);

/*var x = $("#go_up").position(); //gets the position of the div element...
window.scrollTo(x.left, x.top);*/
},
 
});

return false;
});
</script>

