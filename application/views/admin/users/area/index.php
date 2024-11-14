	<section class="py-3">
	<div class="container  d-flex align-items-center justify-content-center">
	<div class="col-md-9">
	<a class="btn btn-primary mb-3"  href="#" data-bs-toggle="modal" data-bs-target="#createAreaModal" >Crear Area</a>
	<div class="card">
	<div class="card-header fs-1"> Areas</div>
	<div class="card-body">

  <div id="list-areas"></div>


	</div>
	</div>
	</div>
	</div>
		
		 <div class="modal fade" id="createAreaModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog modal-md">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title">Crear Area</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body " >

 
<div class="col-md-12">
    <form action="<?php echo site_url('users/saveArea');?>" method="post"   novalidate class="needs-validation" autocomplete="off">
                    <div class="row mb-3 ">
                      <div class="col-md-12">
                      <input name="area" type="text" placeholder="Introduzca el nombre de la area." class="form-control" id="area" required>
					  		<div class="invalid-feedback">Por favor, introduzca el nombre de la area.</div>
							<div id="areaInfo"></div>
                      </div>
                    </div>
					  <div class="text-center">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
					<form>
</div>


 
       </div>
       <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>-->
     </div>
   </div>
 </div>
    </section>
	

  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


listarAreas();

	
	
	function listarAreas(){

	     $.ajax({
 type: "POST",
 url: "<?php echo site_url('users/areaTable');?>",

 success:function(data){
 $("#list-areas").html(data);
 },
 

 });	
	}
	
	

	
	

		
	
 });
</script>

	

	 
</body>

</html>