<h3>LISTADO DE PRESUPUESTO</h3>
<div id="sfsd"></div>
<?php

if($query !=NULL)
{
$created_by=$this->db->select('name')->where('id_user',$inserted_by)->get('users')->row('name');
		$insed_time = date("d-m-Y H:i:s", strtotime($inserted_time));
           echo  "<div class='alert alert-primary' role='alert'>
			creado por $created_by $insed_time
			</div>";
?>

<table class="table table-striped" >
<thead>
<tr>
<td>
<strong>Conclusión  Diagnostico </strong> 

<span class="editSpan conc-n"><?=$conclucion_diag?></span>
</td>

</tr>
<tr style="background:#428bca;">
<th style="color:white">Procedimiento</th>
<th style="color:white">Precio</th>
<th  style="color:white;">
 <ul class="nav navbar-nav  show-btn-print-current " >
	<li class="dropdown list-data-available ">
  <button type="button" class="btn btn-default dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fa fa-print"></i> </span>
  </button>
			<ul class="dropdown-menu">
		<!--<li class="data-li"><a class="dropdown-item">FORMATO VERTICAL</a></li>-->
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_presupuesto/$id/$patient_proced/0/v/1/$centro_proced")?>"  style="cursor:pointer;color:black" >Formato vertical</a></li>
		<!--<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_presupuesto/$id/$patient_proced/1/v/1/$centro_proced")?>"  style="cursor:pointer;color:black"  >Sin la foto</a></li>-->
		
		
		<!--<li class="data-li"><a class="dropdown-item">FORMATO HORIZONTAL</a></li>-->
	   <li class="data-li"> <a  class="imprimirRecetasForPat horiz dropdown-item" id='1' target="_blank" href="<?php echo base_url("print_page/print_presupuesto/$id/$patient_proced/0/h/1/$centro_proced")?>"  style="cursor:pointer;color:black" >Formato horizontal</a></li>
		<!--<li class="data-li"><a  class="imprimirRecetasForPat horiz dropdown-item" id='0' target="_blank" href="<?php echo base_url("print_page/print_presupuesto/$id/$patient_proced/1/h/1/$centro_proced")?>"  style="cursor:pointer;color:black"  >Sin la foto</a></li>-->
		
		</ul>
		</li>
		</ul>
		
</th> 
</tr>
</thead>
<tbody>
<?php

$tot=0;	
 foreach($query as $row)

{

$fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$row->procedimiento)->get('tarifarios_test')->row_array();

 $tot += $row->precio;
 if (is_numeric($row->procedimiento)){
	 $procedimiento = $fac_val['procedimiento'] ;
 }else{
	 $procedimiento = $row->procedimiento; 
 }

?>
<tr id="<?=$id?>">

<td>
<span class="editSpan proced-n"><?=$procedimiento?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-proced" name="edit-proced"  type="text"  value="<?=$procedimiento?>"  />
</td>
<td>
<span class="editSpan precio-n">RD$<?=number_format($row->precio,2)?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-precio" name="edit-precio" type="number" min="5" max="25" step="5"  value="<?=number_format($row->precio,2)?>"  />

<input type='hidden' class="editInput" name="autoNomber" value="<?=$id?>"/>

</td>
<td>
<!--
<button type="button"  class="btn btn-sm btn-primary editBtn " style="float: none;font-size:12px"  ><i class="bi bi-pencil-square"></i></button>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;font-size:9px"><span class="fa fa-save" style='color:white'></span></button>
-->
<button type="button" title="Eliminar" class="btn btn-sm btn-danger delete-fac-proc" id="<?=$idDelete; ?>" ><i class="bi bi-x-square btn btn-danger btn-sm"></i></button>

</td>
</tr>

<?php } ?>

<tr>
<th>Total</th><th id='value-sumpf'>RD$<?=number_format($tot,2)?></th>
</tr>

<?php }else{
echo "<tr>
<th  style='font-size:10px'>No hay procedimento</th>
</tr>";
} ?>
</tbody>
</table>
<script>


$('.delete-fac-proc').on('click',  function(){ 
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('patient_presupueto_controller/deleteFacProc')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
}) 






$('.editBtn').on('click',function(){
//hide edit button
$(this).closest("tr").find(".editBtn").hide();

$(this).closest("tr").find(".saveBtn").show();
//$(this).closest("tr").find(".proced-n").hide();
$(this).closest("tr").find(".editSpan").hide();

//show edit input
$(this).closest("tr").find(".editInput").show();
var regex = /[.,\s]/g;
var precio =$(this).closest("tr").find(".edit-precio").val();
var result = precio.replace(regex, '');
$(this).closest("tr").find(".edit-precio").val(result);

});

function numberWithCommas(x) {
  x=String(x).toString();
  var afterPoint = '';
  if(x.indexOf('.') > 0)
     afterPoint = x.substring(x.indexOf('.'),x.length);
  x = Math.floor(x);
  x=x.toString();
  var lastThree = x.substring(x.length-3);
  var otherNumbers = x.substring(0,x.length-3);
  if(otherNumbers != '')
      lastThree = ',' + lastThree;
  return otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree + afterPoint;
}
$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();
var precio = $(this).closest("tr").find(".edit-precio").val();
var proced = $(this).closest("tr").find(".edit-proced").val();
var conc = $(this).closest("tr").find(".edit-conc").val();
if(precio !="" && proced!=""){
$(this).closest("tr").find(".editBtn").show();
$(this).hide();
$(this).closest("tr").find(".editBtn").show();

$(this).closest("tr").find(".editInput").hide();
$(this).closest("tr").find(".editSpan").show();
$(this).closest("tr").find(".precio-n").text('RD$ '+numberWithCommas(precio));
$(this).closest("tr").find(".proced-n").text(proced);
$(this).closest("tr").find(".conc-n").text(conc);
$.ajax({
type:'POST',
url: "<?=base_url('patient_presupueto_controller/editFacproced')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(response){
$('#value-sumpf').html(response.total);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#sfsd').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
});
</script>