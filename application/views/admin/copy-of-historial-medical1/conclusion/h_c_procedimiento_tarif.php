<hr/>
<table class="table table-striped table-sum-pf" >
<thead>
<!--<tr>
<td colspan='7'>
<div class="form-group">
<label class="control-label col-sm-2"> Procedimento</label>
<div class="col-sm-6">
<input type="text" class="form-control"  name="procedimient"   >
</div>
</div>
</td>
</tr>-->
<tr style="background:#428bca;" class="tr-header" >
<th style="color:white">Procedimiento</th>
<th style="color:white">Precio</th>
<th style="color:white">Fecha</th>
<th  style="color:white;">
<ul class="nav navbar-nav">
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
<ul class="dropdown-menu">
<li>
<a>VERTICAL</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/0/v/$centro")?>"  style="cursor:pointer;color:black" >con foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/1/v/$centro")?>"  style="cursor:pointer;color:black"  >Sin foto</a>
</li>
<li>
<a> HORIZONTAL</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/0/h/$centro")?>"  style="cursor:pointer;color:black"  >Con foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/1/h/$centro")?>"  style="cursor:pointer;color:black"  >Sin foto</a>
</li>
</ul>
</li>
</ul>
</th> 
<th></th>
</tr>
</thead>
<tbody>
<?php

if($query->result() !=NULL)
{
$tot=0;	
 foreach($query->result() as $row)

{
$time = date("d-m-Y H:i:s", strtotime($row->time_created));
 $fac_val=$this->db->select('procedimiento,monto')->where('id_tarif',$row->id_tarif)->get('tarifarios')->row_array();
 if($row->precio){
	 $precio=$row->precio;
 }else{
	 $precio=$fac_val['monto'];
 }
 $tot += $precio;
?>
<tr id="<?=$row->id?>">
<td><?=$fac_val['procedimiento']?></td>
<td>
<span class="editSpan precio-n">RD$<?=number_format($precio,2)?></span>
 <input style="display: none;" class="editInput  form-control input-sm edit-precio" name="edit-precio"  type="text" onkeypress='return onlyfloat(event);'  value="<?=number_format($precio,2)?>"  />
<input type='hidden' class="editInput" name="user_id" value="<?=$user_id?>"/>
<input type='hidden' class="editInput" name="patient" value="<?=$patient?>"/>

</td>
<td><?=$time?></td>
<td>
<button type="button"  class="btn btn-sm btn-primary editBtn " style="float: none;font-size:12px" ><span class="glyphicon glyphicon-pencil"></span></button>
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
loadPresupuesto(0);
 
}
});

});

$('.editBtn').on('click',function(){
//hide edit button
$(this).closest("tr").find(".editBtn").hide();

$(this).closest("tr").find(".saveBtn").show();

//$(this).closest("tr").find(".editSpan").hide();

//show edit input
$(this).closest("tr").find(".editInput").show();
$(this).closest("tr").find(".edit-precio").val("");

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


function onlyfloat(event) {
    event = (event) ? event : window.event;
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)&&(event.which != 46 || $('.float').val().indexOf('.') != -1)) {
        return false;
    }
    return true;
    };


$('.saveBtn').on('click',function(){
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

var precio = $(this).closest("tr").find(".edit-precio").val();

if(precio !=""){
$(this).closest("tr").find(".editBtn").show();
$(this).hide();
$(this).closest("tr").find(".editBtn").show();

$(this).closest("tr").find(".editInput").hide();
$(this).closest("tr").find(".editSpan").show();
$(this).closest("tr").find(".precio-n").text('RD$ '+numberWithCommas(precio));

$.ajax({
type:'POST',
url: "<?=base_url('factura/editFacproced')?>",
dataType: "json",
data:'id='+ID+'&'+inputData,
cache: true,
success:function(response){
$('#value-sumpf').html(response.total);
},

});
}
});



</script>