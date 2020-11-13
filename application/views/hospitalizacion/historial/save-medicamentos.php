
<!--<ul class="nav navbar-nav">
<li><a data-toggle="modal"  data-target="#print_rec_foto"  href="<?php echo base_url("printings/print_if_foto/$id_patient/0/0/emMed")?>"  style="cursor:pointer;color:black" class="btn-sm print-me-rect" >Imprimir Con Formato Vertical</a></li>
<li><a target="_blank"  href="<?php echo base_url("printings/print_emergencia_medicamento/$id_patient")?>" style="cursor:pointer;color:black" class="btn-sm print-me-rect" >Imprimir Con Formato Horizontal</a></li>

</ul>-->
<?php
$i=1;
foreach($sql->result() as $rowg){
	$fecha = date("Y-m-d", strtotime($rowg->inserted_time));
	
$orden=$this->db->select('id,orden')->where('orden',$fecha)
->where('id_pat',$id_patient)
->where('user',$opid)
->get('emergency_medicaments_orden')->row_array();
$fecha =$orden['orden'];
 echo "<span style='color:red'>orden # ".$orden['id']."</span>";
?>

&nbsp;<a data-toggle="modal"  data-target="#print_rec_foto"  href="<?php echo base_url("printings/print_if_foto/$id_patient/$opid/$fecha/emMed")?>"  style="cursor:pointer;color:red" class="btn-sm print-me-rect" >Imprimir Con Formato Vertical</a> 
<table class="table"  cellspacing="0">
<thead>
<tr style="background:#428bca;" class="tr-header">
<th style="font-size:10px;color:white">Parado</th>
<th style="font-size:10px;color:white">Medicamento</th>
<th style="font-size:10px;color:white">Fecha</th>
<th style="font-size:10px;color:white">Cant.</th>
<th style="font-size:10px;color:white">Via</th>
<th style="font-size:10px;color:white">Cada</th>
<th style="font-size:10px;color:white">Nota</th>

</tr>
</thead> 
<tbody id="medicamentos-data">
<?php 

$sqls ="SELECT * FROM  emergency_medicaments WHERE  user=$opid  AND save=1 AND DATE(inserted_time)='$fecha'  ORDER BY id DESC";
$sqlrs= $this->db->query($sqls);
foreach($sqlrs->result() as $row)
{
$fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$op=$this->db->select('name')->where('id_user',$row->user)->get('users')->row('name');	
$name=$this->db->select('nombre')->where('id',$row->name)->get('emergency_almanacen_gnrl')->row('nombre');
if($row->parado==1)	{
$checked="checked";	
}else{
$checked="";		
} 
?>
<tr>
<td title='parar'> <input type='checkbox'  class="check-parar"  value="<?=$row->id?>" <?=$checked?>/></td>
<td style="font-size:12px"><?=$name;?>(<?=$row->tipo?>)</td>
<td style="font-size:12px"><?=$fecha;?></td>
<td style="font-size:12px"><?=$row->cantidad?></td>
<td style="font-size:12px"><?=$row->via?></td>
<td style="font-size:12px"><?=$row->cada;?></td>
<td style="font-size:12px"><?=$row->nota;?></td>
</tr>
<?php
}
?>
</tbody>

</table>
<hr id="hr_ad"/>
<?php
}

?>
<div class="modal fade" id="print_rec_foto"  role="dialog" >
<div class="modal-dialog modal-xs" >
<div class="modal-content" >

</div>
</div>
</div>
<script>

$('#print_rec_foto').on('hidden.bs.modal', function () {
	$(this).removeData('bs.modal');
	})


$('.check-parar').change(function() {
   if ($(this).is(':checked')) {
     var id= $(this).val();
	 var print= 1;
	 } 
	  
	  else {
	var id= $(this).not(":checked").val();
	var print= 0;
 }
	  
	 	$.ajax({
		type:'POST',
		url:'<?=base_url('emergency/check_medicamento')?>',
		data: {id:id, print:print},
		success:function(data) {
      }
		});
     
 })




/*
$('#print_rec_foto').on('hidden.bs.modal', function () {
	newMedicamento();
	})

$('.print-me-rect').click(function(){
	//allRecetas();
    if(!$('.is_print_rect input[type="checkbox"]').is(':checked')){
      alert("Por favor marque al menos uno.");
      return false;
    }
});



*/
</script>