<h3>LISTADO DE PRESUPUESTO</h3>
<div id="sfsd"></div>
<?php

if($query->result() !=NULL)
{

?>
<em style='float:right;font-size:12px'>creado por <?=$insertedBy?><br/><?=$timeCrt?></em>

<table class="table table-striped" >
<thead>
<tr>
<td>
<strong>Conclusión  Diagnostico</strong> 
<br/>
<span class="editSpan conc-n"><?=$conclucion_diag?></span>
</td>

</tr>
<tr style="background:#428bca;">
<th style="color:white">Procedimiento</th>
<th style="color:white">Precio</th>
<th  style="color:white;">
<ul class="nav navbar-nav">
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
<ul class="dropdown-menu">
<li>
<a>VERTICAL</a>                                                 
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$autoNum/$patient/0/v/1/$centro")?>"  style="cursor:pointer;color:black" >con foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$autoNum/$patient/1/v/1/$centro")?>"  style="cursor:pointer;color:black"  >Sin foto</a>
</li>
<li>
<a> HORIZONTAL</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$autoNum/$patient/0/h/1/$centro")?>"  style="cursor:pointer;color:black"  >Con foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$autoNum/$patient/1/h/1/$centro")?>"  style="cursor:pointer;color:black"  >Sin foto</a>
</li>
</ul>
</li>
</ul>
</th> 
</tr>
</thead>
<tbody>
<?php

$tot=0;	
 foreach($query->result() as $row)

{
$time = date("d-m-Y H:i:s", strtotime($row->time_created));
$fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$row->procedimiento)->get('tarifarios')->row_array();

 $tot += $row->precio;
 if (is_numeric($row->procedimiento)){
	 $procedimiento = $fac_val['procedimiento'] ;
 }else{
	 $procedimiento = $row->procedimiento; 
 }
 
 $updBy=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name'); 
?>
<tr id="<?=$row->id?>">

<td>
<span class="editSpan proced-n"><?=$procedimiento?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-proced" name="edit-proced"  type="text"  value="<?=$procedimiento?>"  />
</td>
<td>
<span class="editSpan precio-n">RD$<?=number_format($row->precio,2)?></span>
 <input style="display: none;width:50%" class="editInput  form-control input-sm edit-precio" name="edit-precio"  type="text" onkeypress='return onlyfloat(event);'  value="<?=number_format($row->precio,2)?>"  />
<input type='hidden' class="editInput" name="user_id" value="<?=$user_id?>"/>

<input type='hidden' class="editInput" name="autoNomber" value="<?=$row->autoNomber?>"/>

</td>
<td>
<button type="button"  class="btn btn-sm btn-primary editBtn " style="float: none;font-size:12px" title='actualizado por <?=$updBy?>' ><span class="glyphicon glyphicon-pencil"></span></button>
<button type="button" id="saveBtn" class="btn btn-sm btn-success saveBtn" style="float: none; display: none;font-size:9px"><span class="fa fa-save"></span></button>

<a title="Eliminar" style="cursor:pointer" class="delete-fac-proc" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>

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

$(".delete-fac-proc").click(function(){
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/deleteFacProc')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
loadLastProced(<?=$docUs?>);
paginationProcedFacData(<?=$docUs?>);
 
}
});

});



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
url: "<?=base_url('factura/editFacproced')?>",
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