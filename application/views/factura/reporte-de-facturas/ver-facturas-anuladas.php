
<body>
<div class="container my-3">
<div class="col-md-12">
<div class="row">
  <div  style="overflow-x:auto;">
<h3>Listado De Facturas Borradas</h3>
<table class="table table-responsive table-striped table-sm" id="example" >
<thead>
<tr  class='hide-tr-th'>
<th >Fecha</th>
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

 foreach($query->result() as $rf){

$inserted_time = date("d-m-Y H:i:s", strtotime($rf->inserted_time));
 $updated_time = date("d-m-Y H:i:s", strtotime($rf->updated_time));

$centro=$this->db->select('name,type')->where('id_m_c',$rf->center_id)->get('medical_centers')->row_array();
$patient=$this->db->select('nombre')->where('id_p_a',$rf->pat_id)->get('patients_appointments')->row_array();


$seguro=$this->db->select('title')->where('id_sm',$rf->seguro_medico)->get('seguro_medico')->row('title');
if($centro['type']=="privado") {

$service=$this->db->select('procedimiento')->where('id_tarif',$rf->service)->get('tarifarios_test')->row('procedimiento');

} else {
$service=$this->db->select('sub_groupo')->where('id_c_taf',$rf->service)->get('centros_tarifarios_test')->row('sub_groupo');
}

$username=$this->db->select('name')->where('id_user',$rf->canceled_by)->get('users')->row('name');
 ?>
<tr>
<td><?=date("d-m-Y", strtotime($rf->fecha))?></td>
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
<td title='# autorizacon :<?=$rf->numauto?> &#013; Autorizado por :<?=$rf->autopor?>&#013; <?=$rf->cancelation_reason?> &#013; Borrado por <?=$username?>&#013;  <?=date("d-m-Y", strtotime($rf->canceled_time))?>'>

Ver mas

</td>


</tr>

 <?php }?>
 </tbody>
</table>
</div>
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
