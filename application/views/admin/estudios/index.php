 <div class="container">
  <div class="row">
  <div class="col-md-10">
    <a href="<?php echo base_url('admin/newEstudios')?>" class="btn btn-primary btn-xs st"  title="Crear nueva farmacia"   ><i class="fa fa-plus" aria-hidden="true"></i>Crear Estudios</a>
	

   <h3>Lista De Estudios</h3>
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
<table id="example" class="table table-striped" width="100%" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th>NOMBRE COMERCIAL</th>
<th>REGISTRO SAN.</th>
<th >RNC</th>
<th >LOGO</th>
<th>DIRECCION</th>
<th >TEL.</th>
<th>WEB</th>
<th>CORREO</th>
<th>ACCIONES</th>
</tr>
</thead>
    <tbody>
    <?php foreach($query->result() as $row)
	 
	 {
		 
	 ?>
        <tr>
		   <td><?=$row->nombre_comercial;?></td>
			 <td><?=$row->registro_sanitario;?></td>
            <td><?=$row->rnc;?></td>
			<td><?php if($row->logo) {?><img style="width:250px;" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $row->logo; ?>"  /><?php } ?></td>
			 <td><?=$row->direccion;?>, <?=$row->pais;?>, <?=$row->provincia;?>, <?=$row->ciudad;?></td>
			 
			   <td><?=$row->telefono;?></td>
			   <td><?=$row->pagina_web;?></td>
			   <td><?=$row->correo;?></td>
			
			<td style="text-align:left">
			<a href="<?php echo base_url('admin/updateEstudios/'.$row->id)?>" class="st" title="Editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar" ></i></a>
          	<a href="<?php echo base_url('admin/viewEstudios/'.$row->id)?>" class="st"><i class="fa fa-eye" aria-hidden="true" title="Editar" ></i></a>
          	
           <a title="Eliminar" class="st deletedoctor" id="<?=$row->id; ?>"  style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
			
			</td>
			
        </tr>
	 <?php
	 }
	 ?>
    </tbody>    
</table>
 <hr id="hr_ad"/>
<div class="row">
<div class="col-md-12">

<a href="<?php echo base_url('admin/newEstudios')?>" class="btn btn-primary btn-xs st"  title="Crear nueva farmacia"   ><i class="fa fa-plus" aria-hidden="true"></i>Crear Estudios</a>
					
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
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
 
 <script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>

</script>
</html>