 <body>
  <section >

<div class="container">

<div class="row">
<div class="col-md-10"><h3>Colar de solicitudes</h3></div><br/>
<div class="col-md-2 text-right">
<a href="#"  onclick="window.location.reload()" id="refresh"  class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-refresh"></i> </a>

<br/>
</div>

</div>
<?php echo $this->session->flashdata('success_msg');?>
<hr/>
<div class="row">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="margin:auto" cellspacing="0">
  
<thead>
<tr style="background:#DCDCDC;">
<!--<th rowspan="2"><strong>#</strong></th>-->
<th rowspan="2"><strong>Solicitud</strong></th>
<th rowspan="2"><strong>Solicitante</strong></th>
<th colspan="2" style="text-align:center"><strong>Teléfono</strong></th>
<th rowspan="2"><strong>Email</strong></th>
<th rowspan="2"><strong>Fecha Solicitud</strong></th>

<th rowspan="2">Accion</th>
</tr>

<tr style="background:#5957F7;color:white">
<th>Fijo</th>
<th>Movil</th>
</tr>
</thead>
<tbody>		
<?php foreach($query->result() as $citas)

{

$pat=$this->db->select('nombre,tel_resi,tel_cel,email')->where('id_p_a',$citas->id_patient)
->get('patients_appointments')->row_array();
?>

<tr>
<td class="solicitud"><?=$citas->nec;?></td>
<td class="nombre" ><?=$pat['nombre'];?>  </td>
<td class="tel"><?=$pat['tel_resi'];?></td>
<td class="telc"><?=$pat['tel_cel'];?></td>
<td class="email"><?=$pat['email'];?></td>
<td class="fecha" style="text-align:left"><?=$citas->fecha_propuesta;?></td>

<td >
<a   data-toggle="modal" title="Ver la solicitud"  data-target="#verSolicitud" href="<?php echo site_url("admin_medico/patient_request/$citas->id_apoint/$user_id")?>" >Ver</a>


</td>
</tr> 
	   
<?php
}

?>
</tbody>
</table>
</div>


</div>
</div>
</div>
 <div class="modal fade" id="verSolicitud" tabindex="-1" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer');?>
  </section > 
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">

$('#verSolicitud').on('hidden.bs.modal', function () {
 location.reload();
})
      
    </script>  
 </body>
</html>