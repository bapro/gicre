
<body>
<div class="col-md-12">
<div class="row">
  <div  style="overflow-x:auto;">
<h3>Listado De Facturas Borradas</h3>
<table class="table table-striped" id="example" >
<thead>
<tr style="background:#38a7bb;color:white" class='hide-tr-th'>
<th >Nombres</th>
<th >Centro</th>
<th >Seguro</th>
<th >Servicio</th>
<th >Cantidad</th>
<th >Precio Unitario</th>
<th >Sub-Total</th>
<th >Total Pagar Seguro</th>
<th >Descuento</th>
<th >Total Pagar Paciente</th>
<th ></th>
</tr>
</thead>
<tbody>


<?php
if($perfil=="Admin"){
$where='';
}
else{
$where="WHERE updated_by=$user";
}
$sql="SELECT * FROM  factura_deleted $where";
$query= $this->db->query($sql);
 foreach($query->result() as $rf){

$inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));

$centro=$this->db->select('name,type')->where('id_m_c',$rf->center_id)->get('medical_centers')->row_array();
$patient=$this->db->select('nombre')->where('id_p_a',$rf->pat_id)->get('patients_appointments')->row_array();


$facdatos=$this->db->select('numauto,autopor')->where('idfacc',$rf->id2)->get('factura2')->row_array();


$seguro=$this->db->select('title')->where('id_sm',$rf->seguro)->get('seguro_medico')->row('title');
if($centro['type']=="privado") {

$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios')->row('procedimiento');

} else {
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios')->row('sub_groupo');
}
$info=$this->db->select('*')->where('idfac',$rf->idfac)->get('delete_fac_razon')->row_array();
$username=$this->db->select('name')->where('id_user',$info['deleted_by'])->get('users')->row('name');
 ?>
<tr>
<td><?php echo $patient['nombre'];?></td>
<td><?php echo $centro['name'];?></td>
<td><?php echo $seguro;?></td>
<td style="width:330px;font-size:14px">
<?php
echo $service;
?>

</td>
<td>
<?=$rf->cantidad?>
</td>
<td>
RD$<?=$rf->preciouni?>

</td>
<td>
RD$<?=$rf->subtotal?>

</td>
<td>
RD$<?=$rf->totalpaseg?>

</td>
<td>
RD$<?=$rf->descuento?>

</td>
<td>
RD$<?=$rf->totpapat?>

</td>
<td title='# autorizacon :<?=$info['numauto']?> &#013; Autorizado por :<?=$info['autopor']?>&#013; <?=$info['reazon']?> &#013; Borrado por <?=$username?>&#013;  <?=$info['deleted_time']?>'>+</td>
</tr>

 <?php }?>
 </tbody>
</table>
</div>
</div>
</div>
</div>

<?php $this->load->view('footer'); ?>
 </body>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script>
     $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );
</script>
