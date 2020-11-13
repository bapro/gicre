
<style>

td,th{text-align:center}

</style>

<!-- *** welcome message modal box *** -->
 


  <div class="container">
  


<?php 
 $activo="";
 ?>
 


 <?php echo $this->session->flashdata('success_msg'); ?>
  <br/>
<div class="row">
 <div class="col-md-12">

 <a data-toggle="modal" data-target="#new_field"  href="<?php echo base_url('admin/new_field')?>" class="btn btn-primary btn-xs st"  title="Crear campo"   ><i class="fa fa-plus" aria-hidden="true"></i> Campo</a>
				
 </div>
</div>

 <hr id="hr_ad"/>
<div class="row">
  <div class="col-xs-12">
  <h3 class="h3">Campos</h3>
 </div>
  </div>

 <div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto"  cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	   <th style="width:1px"><strong>#</strong></th>
        <th style="width:5px">Nombre</th>
		<th style="width:5px">Description</th>
		<th style="width:5px">Activo</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($all_fields as $all_a)
	 
	 {
	if($all_a->active==1) {
			$activo="Si";
	 } else {
		 $activo="No";
	 }
		
	 ?>
        <tr>
		<td class="idsm" style="width:1px"><?=$all_a->id;?></td>
		<td class="seguro_medico" style="width:5px"><?=$all_a->name;?></td>
		<td class="seguro_medico" style="width:5px"><?=$all_a->description;?></td>
		
		 <td class="seguro_medico" style="width:5px"><?=$activo?></td>
		 <td style="width:1px" >
		 <a data-toggle="modal" data-target="#ViewField" href="<?php echo base_url('admin/field/'.$all_a->id)?>" class="st" title="Ver" ><i class="fa fa-eye" aria-hidden="true" ></i></a>
          	
			<a data-toggle="modal" data-target="#EditField" href="<?php echo base_url('admin/update_field/'.$all_a->id)?>" class="st" title="Editar" ><i class="fa fa-pencil" aria-hidden="true" ></i></a>
          	<a title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')" class='delete' id='del_<?=$all_a->id; ?>'style="color:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>			
			</td>
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>

</div>
<hr id="hr_ad"/>
 <div class="row">
 <div class="col-md-12">

 <a data-toggle="modal" data-target="#new_field" href="<?php echo base_url('admin/new_field')?>" class="btn btn-primary btn-xs st"  title="Crear campo"   ><i class="fa fa-plus" aria-hidden="true"></i> Campo</a>
				
 </div>
</div>


<div class="modal fade" id="EditField"  tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>


<div class="modal fade" id="new_field"  tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ViewField"  tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" >
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
 $this->load->view('admin/modal');

 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script> 
<script type="text/javascript"> 
 $(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();

    $('#EditField').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
	
	    $('#ViewField').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });


 // Delete 
 $('.delete').click(function(){
  var el = this;
  var id = this.id;
  var splitid = id.split("_");

  // Delete id
  var deleteid = splitid[1];
 
  // AJAX Request
  $.ajax({
   url: '<?=base_url('admin/delete_field')?>',
   type: 'POST',
   data: { id:deleteid },
   success: function(response){

    // Removing row from HTML Table
    $(el).closest('tr').css('background','tomato');
    $(el).closest('tr').fadeOut(800, function(){ 
     $(this).remove();
    });

   }
  });

 });

});
 </script>

</html>