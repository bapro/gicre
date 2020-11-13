
 <?php
        $this->load->view('admin/header_admin');
 ?>


  <div class="container">
  <div class="row">
  <div class="col-md-10">
    <a href="<?php echo base_url('admin/newDrugstore/')?>" class="btn btn-primary btn-xs st"  title="Crear nueva farmacia"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva farmacia</a>
	

   <h3>Lista de farmacias</h3>
 </div>
<!--<div class="row">
  <div class="col-md-3" > 
<select id="centro_medico" name="centro_medico"  class="form-control" style="background:#E0E5E6;">
 <option value="Todos los centros médicos">Selecciona</option>
 <?php 
foreach($drugstores as $row)
 { 
  echo '<option value="'.$row->id.'">'.$row->noma.'</option>';
 }
 ?>
</select>
<a href="#" id="ver_todo" style="display:none" onclick="window.location.reload()"   class="btn btn-primary btn-xs" >Todos los centros médicos </a>

</div>
</div>-->
</div>
 <hr id="hr_ad"/>

 </div>
 <div class="row">

<div class="col-md-12">
 
 <?php echo $this->session->flashdata('success_msg'); ?>
 </div>
 </div>
 <div class="container text-left" style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	 <th>NOMBRE DE ASOCIACION</th>
	 <th>NOMBRE COMERCIAL</th>
        <th >RNC</th>
		 <th >ACCIONES</th>
		<!--<th class="col-xs-2" >Telefono</th>
		<th class="col-xs-3">Area</th>
		<th class="col-xs-1" >Extension</th>
		<th class="col-xs-1" >Codigo Doctor</th>
		<th class="col-xs-2" >Acciones</th>-->
    </tr>
    </thead>
    <tbody>
    <?php foreach($drugstores as $all_d)
	 
	 {
		 
	 ?>
        <tr>
		   <td><?=$all_d->noma;?></td>
			 <td><?=$all_d->nomc;?></td>
            <td><?=$all_d->rnc;?></td>
			<td style="text-align:left">
			<a href="<?php echo base_url('admin/drugstore/'.$all_d->id)?>" class="st" ><i class="fa fa-eye" aria-hidden="true" title="View Doctor"></i></a>
			<a  class="st"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar" ></i></a>
           <a title="Eliminar" class="st deletedoctor" id="<?=$all_d->id; ?>"  style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
			
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

 <a href="<?php echo base_url('admin/newDrugstore/')?>" class="btn btn-primary btn-xs st"  title="Crear nueva farmacia"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva farmacia</a>
				
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
$( document ).ready(function() {
    $('#verArea').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
$(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();
 });
 //delete doctor seguro
 
  $(".deletedoctor").click(function(){
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		var el = this;
   var del_id = $(this).attr('id');
   var rowElement = $(this).parent().parent(); //grab the row

   $.ajax({
            type:'POST',
            url:'<?=base_url('admin/DeleteDoctor')?>',
            data: {id : del_id},
            success:function(response) {
                
                   // Removing row from HTML Table
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });
                  
            }
    });
 }
 })
</script>
</html>