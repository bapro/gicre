 <style>
 td,th,label,input{font-size:15px;text-align:left}
td{color:#000000}
 .reduce-height{border:none;background:none}
 </style>
 
 <body>
  <section >

<div class="container">

<div class="row">
<div class="col-md-10"><h3>LABORATORIO DE LENTES</h3></div><br/>


</div>
<?php echo $this->session->flashdata('success_msg');?>
<hr/>
<div class="row">
<div class="table-responsive">
<table id="example" class="table table-striped" width="100%" cellspacing="0">
    <thead>
	<tr style="background:#5957F7;color:white">
	  <th class="col-xs-3">Centros Medicos/Optica</th>
		<th class="col-xs-1">Doctor/Optometra</th>
	   <th class="col-xs-2">Paciente</th>
	   <th class="col-xs-1">Cedula</th>
        <th class="col-xs-2" >Telefono</th>
		 <th class="col-xs-3" >Direccion</th>
		  <th class="col-xs-2" >Seguro</th>
		<th class="col-xs-1" >Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($query->result() as $row)
	 
	 {
		 $centro_name=$this->db->select('name')->where('id_m_c',$row->id_centro)->get('medical_centers')->row('name');
		 $doc=$this->db->select('name')->where('id_user',$row->id_doc)->get('users')->row('name');
		 $patient=$this->db->select('nombre,cedula,tel_resi,tel_cel,provincia,municipio,barrio,calle,seguro_medico')->where('id_p_a',$row->patient)->get('patients_appointments')->row_array();
	    $pronpat=$this->db->select('title')->where('id',$patient['provincia'])->get('provinces')->row('title');
       $munipat=$this->db->select('title_town')->where('id_town',$patient['municipio'])->get('townships')->row('title_town');
	   	$sm=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
	?>
        <tr>
		<td><?=$centro_name?></td>
		<td><?=$doc?></td>
		<td><?=$patient['nombre']?></td>
		<td><?=$patient['cedula']?></td>
		<td><?=$patient['tel_cel']?> / <?=$patient['tel_resi']?></td>
		<td><?=$pronpat?>, <?=$munipat?> <?=$patient['barrio']?> <?=$patient['calle']?></td>
		<td><?=$sm?></td>
		<td>
		<a   data-toggle="modal" title=""  data-target="#ver" href="<?php echo site_url("tecLente/ver_refraccion/$row->id_refraccion/$user_id")?>" >Ver</a>
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

 <div class="modal fade" id="ver" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-md" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
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

$('#ver').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
})
      
    </script>  
 </body>
</html>