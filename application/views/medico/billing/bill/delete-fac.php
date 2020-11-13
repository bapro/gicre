<?php
if($identificar=="privado") { 
 	$sel="Doctor Tarfarios";
 } else {
	$sel="Centro Medico Tarfarios"; 
 }
 $perfil=$this->db->select('perfil')->where('id_user',$user)->get('users')->row('perfil');
if($perfil=='Admin'){
$cntler='admin';	
}else{
$cntler='medico';	
}
$sql="SELECT * FROM  factura WHERE idfac=$id_fac";
$query= $this->db->query($sql);
 foreach($query->result() as $rf)

$facdatos=$this->db->select('numauto,autopor')->where('idfacc',$rf->id2)->get('factura2')->row_array();


 ?>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">Borrar factura</h3>

</div>
<div class="modal-body">
<a class="btn btn-sm btn-primary" style='display:none' id='show-back-btn'  href="<?php echo base_url("$cntler/billing_medicos")?>" >Volver a la busqueda</a>

<div style="overflow-y:auto" id='hide-empty'>
<span style='color:red'># autorizacion <?=$facdatos['numauto']?>, autorizado por <?=$facdatos['autopor']?></span>
<table class="table table-striped" >
<tr style="background:#38a7bb;color:white" class='hide-tr-th'>
<th ><?=$sel?></th>
<th >Cantidad</th>
<th >Precio Unitario</th>
<th >Sub-Total</th>
<th >Total Pagar Seguro</th>
<th >Descuento</th>
<th >Total Pagar Paciente</th>
</tr>
<tr>


<?php

$crt1=$this->db->select('name')->where('id_user',$rf->created_by)->get('users')->row('name');
$updt1=$this->db->select('name')->where('id_user',$rf->updated_by)->get('users')->row('name');


 $inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));	 
	 
	 
	 
if($identificar=="privado") {
	
$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');
	
} else {	 
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
}
 ?>
<tr>

<td style="width:330px;font-size:14px">
<?php
echo $service;
?>

</td>
<td>
<?=$rf->cantidad?>
</td>
<td>
RD$ <?=$rf->preciouni?>

</td>
<td>
RD$ <?=$rf->subtotal?>

</td>
<td>
RD$ <?=$rf->totalpaseg?>

</td>
<td>
RD$ <?=$rf->descuento?>

</td>
<td>
RD$ <?=$rf->totpapat?>

</td>

</tr>


</table>



 <div class="form-group">
<label class="control-label" >Porque quiere borrar esa factura ?</label>
<input type="hidden" class='form-control'  id="numauto" value="<?=$facdatos['numauto']?>"   />
<input type="hidden" class='form-control'  id="autopor" value="<?=$facdatos['autopor']?>"  />
<input type="text" class='form-control'  id="reazon"   />
<br>
<button class="btn btn-sm" id='borrar-esa-factura'  type="button" style='color:red' ><i class="fa fa-trash"></i> Borrar</button>

</div>
</div>
</div>
<script>
$('#button_delete_tarifarios').modal({
backdrop: 'static',
keyboard: false
})

$('#borrar-esa-factura').on('click', function(event) {
 event.preventDefault();
 var reazon=$('#reazon').val();
  var numauto=$('#numauto').val();
   var autopor=$('#autopor').val();
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/delete_this_fac')?>",
data: {id_facc:<?=$id_fac?>,id2:<?=$rf->id2?>,count:<?=$count?>,user:<?=$user?>,reazon:reazon.trim(),numauto:numauto,autopor:autopor},
cache: true,
success:function(data){
	if(<?=$count?>==1){
$('#show-back-btn').show();
$('#hide-empty').hide(); 
	}else{	
window.location.reload();
	}
} ,
   
});
})

</script>
