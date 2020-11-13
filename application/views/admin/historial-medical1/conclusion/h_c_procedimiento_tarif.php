<?php
$showimppf='';
 foreach($query->result() as $rowid)
 if($query->result()==NULL){
	 $showimppf='none';
 }else{
	$showimppf=''; 
 }
?>
<table class="table table-striped table-sum-pf"  >
<thead>
<tr style="background:#428bca;" class="tr-header" >
<th style="color:white">Procedimiento</th>
<th style="color:white">Precio</th>
<th style="color:white">Fecha</th>
<th  style="color:white;display:<?=$showimppf?>">
<ul class="nav navbar-nav">
<li class="dropdown"><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;color:white"></i><span class="caret"></span></span>
<ul class="dropdown-menu">
<li>
<a>IMPRIMIR CON FORMATO VERTICAL</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/0/v")?>"  style="cursor:pointer;color:black" >con la foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/1/v")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
</li>
<hr/>
<li>
<a>IMPRIMIR CON FORMATO HORIZONTAL</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/0/h")?>"  style="cursor:pointer;color:black"  >Con la foto</a>
<a target='_blank' href="<?php echo base_url("printings/diag_p_vert/$id_cd/1/h")?>"  style="cursor:pointer;color:black"  >Sin la foto</a>
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
 $tot += $fac_val['monto'];
?>
<tr>
<td  style='font-size:10px'><?=$fac_val['procedimiento']?></td>
<td  style='font-size:10px'>RD$<?=number_format($fac_val['monto'],2)?></td>
<td  style='font-size:10px'><?=$time?></td>
<td>
<a title="Eliminar" style="cursor:pointer" class="delete-fac-proc" id="<?=$row->id; ?>" ><i class="fa fa-trash" style="color:red"></i></a>

</td>
</tr>

<?php } ?>

<tr>
<th  style='font-size:10px'>Total</th><th id='value-sumpf' style='font-size:10px'>RD$<?=number_format($tot,2)?></th>
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
if (confirm("Sure to delete ?"))
{ 
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
loadProcedimientoFacData();
 
}
});
}
});


</script>