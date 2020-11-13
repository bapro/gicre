<style>
.hide-logo{display:none}
.disab {pointer-events:none}

</style>
<h4 style="color:green">II- TARIFARIOS POR  SEGUROS MEDICOS </h4>
<span class="loadf"></span>
<div id="new_content"></div>
<div id="old_content" class="">
<?php foreach($results as $rw)
$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$rw->id_seguro)
->get('seguro_medico')->row_array();
$medico=$this->db->select('id_user')->where('id_user',$rw->id_doctor)
->get('users')->row('id_user');

$categoria=$this->db->select('title_area')->where('id_ar',$rw->id_categoria)
->get('areas')->row('title_area');

$codigo_contrato=$this->db->select('codigo')->where('id_seguro',$rw->id_seguro)
->where('id_doctor',$medico)->get('codigo_contrato')->row('codigo');

 ?>

<div class="col-md-4 table-responsive" style="border:1px solid #38a7bb;height:850px;" >
<h3 style="color:green">MEDICOS APARTENECEN AL SEGURO MEDICO</h3>
<?php
$i = 1;
 foreach($seguro_doc_tarif_grouped1 as $do)
{
$codigo_prestado=$this->db->select('codigo')->where('id_doctor',$do->id_doctor)->where('id_seguro',$do->id_seguro)->get('codigo_contrato')->row('codigo');
$docname=$this->db->select('name')->where('id_user',$do->id_doctor)->get('users')->row('name');

?>

<h5 style='text-transform:uppercase;text-align:left;'><?=$i;$i++;?> - <a target="_blank" title="Ver los detalles sobre <?=$docname?>" href="<?php echo base_url('admin/doctor/'.$do->id_doctor)?>"> <?=$docname?></a> </h5>
- CODIGO PRESTADOR : <strong><?=$codigo_prestado?></strong><br/>
<?php
}
?>
</div>

</div>
<div class="col-md-8 table-responsive" style="border:1px solid #38a7bb;height:850px;background:rgb(242,242,242)" id="hide_default">
<h2 style="color:green;text-transform:uppercase" >SEGURO MEDICO <?=$seguro['title']?></h2>
 <hr id="hr_ad"/>


<h5 style="color:green"><?php echo $categoria?></h5>
<br/>
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
<td>
<div class="btn-group btn-group-sm">
<button type="button" class="btn btn-sm btn-default editBtn " style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
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
<script>
/* $('#deletesuccess').delay(3000).fadeOut();
$("#id_doc").change(function(){
$("#add_doc").prop("disabled",false);
});*/
$(document).ready(function() {
    $('#example4').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
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
url:'<?=base_url('admin/delete_tarifarios')?>',
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
url: "<?=base_url('admin/save_edit_tarif')?>",
dataType: "json",
data:'id_tarif='+ID+'&'+inputData,
cache: true,
success:function(data){

}
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
url: "<?=base_url('admin/saveNewTarifMedico')?>",
data:{cups:cups,simons:simons,monto:monto,procedimiento:procedimiento,id_doctor:<?=$rw->id_doctor?>, id_seguro:<?=$rw->id_seguro?>, categoria:<?=$rw->id_categoria?>},
cache: true,
success:function(data){
loadSeguroTarif();
}
});
  
})
</script>

