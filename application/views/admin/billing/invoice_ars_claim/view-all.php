
<!-- owl carousel css -->
<style>
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left}
</style>

<body >

<div class="container">
<div class="row">
<div class="col-md-12">

<a href="<?php echo base_url("admin/create_invoice_ars_claim")?>" class="btn btn-primary btn-xs st"     ><i class="fa fa-plus" aria-hidden="true"></i>Crear</a>
<hr id="hr_ad"/>
</div>
</div>
<div class="row">
<div class="col-md-10">
<h3>Lista de las facturas par reclamar</h3>
</div>

</div>
<hr id="hr_ad"/>

</div>
<div class="row">

<div class="col-md-12">

<?php echo $this->session->flashdata('success_msg'); ?>
</div>
</div>
<div class="container text-left" style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%;" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th>#</th>
<th class="col-xs-2">Paciente</th>
<th >Num. Af.</th>
<th  >Num. Auto.</th>
<th class="col-xs-2" >Total</th>
<th class="col-xs-2">Total ARS</th>
<th  >Total del Paciente</th>
<th >Codigo Prestador</th>
<th class="col-xs-2">Medico</th>
<th class="col-xs-2">ARS</th>
<!--<th class="col-xs-2" >Acciones</th>-->
</tr>
</thead>
<tbody>
<?php foreach($results as $row)

{
 $paciente=$this->db->select('nombre')->where('id_p_a',$row->paciente)
 ->get('patients_appointments')->row('nombre');
 
$seguron=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
$area=$this->db->select('title_area')->where('id_ar',$row->servicio)->get('areas')->row('title_area');

$doc=$this->db->select('id_user, name')->where('id_user',$row->medico )
->get('users')->row('name');
?>
<tr>
<td><?=$row->id;?></td>
<td style="text-transform:uppercase"><?=$paciente;?></td>
<td><?=$row->num_af;?></td>
<td><?=$row->numauto;?></td>
<td>RD$ <?=$row->tsubtotal;?></td>
<td>RD$ <?=$row->totpagseg;?></td>
<td>RD$ <?=$row->totpagpa;?></td>
<td><?=$row->codigoprestado;?></td>
<td style="text-transform:uppercase"><?=$doc;?></td>
<td><?=$seguron;?></td>
<!--<td style="text-align:left">
<a href="<?php echo base_url('admin/update_invoice_ars_claim/'.$row->id)?>" class="st"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar" ></i></a>
<a title="Eliminar" class="st deletedoctor" id="<?=$row->id; ?>"  style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

</td>-->
</tr>
<?php
}
?>
</tbody>    
</table>
<hr id="hr_ad"/>
<div class="row">
<div class="col-md-12">

<a href="<?php echo base_url("admin/create_invoice_ars_claim")?>" class="btn btn-primary btn-xs st"   ><i class="fa fa-plus" aria-hidden="true"></i>Crear</a>

</div>
</div>
<div class="modal fade" id="verArea" tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
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

</html>