<style>
tr:nth-child(even){background-color: #E0E5E6}
td,th{text-align:left}
</style>

<div class="container">
<!--
<div class="col-md-6">
<?php if($query->result() !=NULL){?>
<div  style="overflow-x:auto;">
<table id="example" class="table table-striped" >
    <thead>
	<tr><h3>LISTADO DE PAGO</h3></tr><br/>
    <tr style="background:#5957F7;color:white">
	   <th class="col-xs-3">PACIENTE INFO</th>
		<th class="col-xs-1">MONTO</th>
		<th class="col-xs-1">No. TRANSACCION</th>
        <th class="col-xs-1" >FECHA</th>
		
    </tr>
    </thead>
    <tbody>
    <?php foreach ($query->result() as $row)
	 {
		 $tot=0;
	$patient_info=$this->db->select('id_patient,fecha_propuesta')->where('id_apoint',$row->id_apoint)->get('rendez_vous')->row_array();		
$fecha_propuesta=$patient_info['fecha_propuesta'];

$patient=$this->db->select('nombre,tel_resi,tel_cel')->where('id_p_a',$patient_info['id_patient'])->get('patients_appointments')->row_array();

$patient_name=$patient['nombre'];
$patient_cel1=$patient['tel_resi'];
$patient_cel2=$patient['tel_cel'];
$tot += $row->payment_gross;
	 ?>
        <tr>
		 <td>
		 <?php echo  "{$patient_name}, Tel: {$patient_cel1}  {$patient_cel2}"?>
		</td>
		<td>$<?=$row->payment_gross ?>USD</td>
            <td><?=$row->txn_id;?></td>
		   <td><?=date("d-m-Y H:i:s", strtotime($row->payment_time));?></td>
     	
        </tr>
	 <?php
	 }
	 ?>
	 <tr>
	 <td></td><td></td><td></td><td></td>
	 </tr>
    </tbody>    
</table>
</div>
<?php
}else{
	echo "<div style='color:red'>No hay pago de ningun paciente.</div>";
}
?>
</div>-->
<div class="col-md-9">
<div id='id-servicio'></div>
</div>
</div>
</div>
<br/><br/>
<?php
$this->load->view('footer');
?>
</body>


<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>
listServicio();

function listServicio() {
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/listServicio')?>",
data :{id_doctor:<?=$id_doctor?>,perfil:"<?=$perfil?>"},
cache: true,
success:function(data){
	$('#id-servicio').html(data); 
}  
});
};	
</script>

</html>




