
<?php


$seguro=$this->db->select('id_sm,title,logo')->where('id_sm',$id_seguro)
->get('seguro_medico')->row_array();


if($seguro['logo']==""){
$seguro_logo="";
} else{
$seguro_logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguro['logo'].'"  />';
}

if($id_seguro !=11){

$plan=$this->db->select('name')->where('id',$id_plan)->get('seguro_plan')->row('name');
$planOcentro="($plan)";

}else{
$centro=$this->db->select('name')->where('id_m_c',$id_plan)->get('medical_centers')->row('name');
$planOcentro="<br/>$centro";
}

foreach($results as $cat)
$u1=$this->db->select('name')->where('id_user',$cat->inserted_by)->get('users')->row('name');
$u2=$this->db->select('name')->where('id_user',$cat->updated_by)->get('users')->row('name');


$updated_time = date("d-m-Y H:i:s", strtotime($cat->updated_date));
$inserted_time = date("d-m-Y H:i:s", strtotime($cat->inserted_date));
 ?>

<span id='hide-after-delete-all'>
<div class="text-success border-bottom pb-3 mb-3">
<?=$seguro['title']?> <?php echo $seguro_logo; ?> <?=$planOcentro?>
 - Codigo Contrato : <input type="text"  id="show-cc" style="display:none;width:150px;text-align:center" value="<?=$codigo_contrato['codigo']?>"/>
 <span id="hide-cc"><?=$codigo_contrato['codigo']?></span>
 <button  type="button" class="btn btn-sm btn-outline-primary" id="show-s-b-cc" style="float: none;" ><i class="fa fa-pencil"></i></button>
 <button type="button" id="save-b-cc" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="fa fa-save"></span></button>
 </div>


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

<table class="table table-sm  table-striped" id="tarifarios-table">
<thead>
 <tr>
<td><input type="text" class="form-control form-control-sm" value="0" id="new-cups"></td>
<td><input type="text" class="form-control form-control-sm" value="0"  id="new-simon"></td>
<td  style='width:150px'><input type="text" class="form-control form-control-sm" placeholder="Buscar un procedimiento" id="new-proced"></td>
<td><input type="text" class="form-control form-control-sm" placeholder="Monto" id="new-monto"></td>
<td class="text-center"><button type="button"  id="NewsaveBtn"  class="btn btn-sm btn-primary"><i class="fa fa-plus-cricle"></i> AGREGAR</button></td>
</tr>
<tr>
<th  style='display:none'>#</th>
<th style='width:7px'>CODIGO</th>
<th style='width:7px'>SIMON</th>
<th style='width:80%'>PROCEDIMIENTO</th>
<th style='width:70px'>MONTO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody id="tarifarios-table-data">

</tbody>
</table>
<input id="codigo_contrato_id" type="hidden" value="<?=$codigo_contrato['id']?>"/>
</span>
<script>

$(document).ready(function() {



var keyupTimer2;
  $('#new-proced').on('keyup', function(event) {
	  event.preventDefault();
  	var keyword = $(this).val();
            clearTimeout(keyupTimer2);
            keyupTimer2 = setTimeout(function () {
               listTariffProced(keyword);
            }, 300);
        });




  
  
  function listTariffProced(keyword){
	  
	  $.ajax({
type:'POST',
url:'<?=base_url('tarifarios/tarifariosTableData')?>',
data: {id_seguro:<?=$id_seguro?>,id_doctor:<?=$id_doctor?>,id_plan:<?=$id_plan?>, keyword:keyword},
success:function(data) {

$("#tarifarios-table-data").html(data);
},
}); 
  }
		
	listTariffProced("");	


//---------------------------------------------------------------------------------------------------------


$("#delete-all-tarifarios").click(function(){
if (confirm("Estás seguro de borrar todos los tarifarios ?"))
{

$.ajax({
type:'POST',
url:'<?=base_url('tarifarios/deleteAllTarif')?>',
data: {id_seguro:<?=$id_seguro?>,id_doctor:<?=$id_doctor?>,id_plan:<?=$id_plan?>,},
success:function(response) {
constant_load_seguro();
$("#delete-all-tarifarios").prop('disabled',true);
$('#hide-after-delete-all').fadeOut("slow");
},
});

}

})


$('#NewsaveBtn').on('click',function(){
var cups=$("#new-cups").val();
var simons = $("#new-simon").val();
var procedimiento=$("#new-proced").val();
var monto = $("#new-monto").val();
if(procedimiento !='' && monto  !='' ){
	$('#NewsaveBtn').prop("disabled",true);
$.ajax({
type:'POST',
url: "<?=base_url('tarifarios/saveNewTarifMedico')?>",
data:{cups:cups,simons:simons,monto:monto,procedimiento:procedimiento,id_doctor:<?=$id_doctor?>,plan:<?=$id_plan?>,id_seguro:<?=$id_seguro?>, categoria:<?=$cat->id_categoria?>},
cache: true,
success:function(data){
showTarifariosBySeguro(<?=$id_plan?>+'-'+ <?=$id_seguro?>);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

 $('#show-tariff-result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
})


});
</script>
