	<section class="py-3">
	<div class="container  d-flex align-items-center justify-content-center">
	<div class="col-md-9">
	<a class="btn btn-primary mb-3"  href="#" data-bs-toggle="modal" data-bs-target="#createAreaModal" >Crear Seguro Médico</a>
	<div class="card">
	<div class="card-header fs-1"> Seguro Médico</div>
	<div class="card-body">

  <div id="list-insurances"></div>


	</div>
	</div>
	</div>
	</div>
		
		 <div class="modal fade" id="createAreaModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog ">
     <div class="modal-content">
       <div class="modal-header">
         <h1 class="modal-title">Crear Seguro Médico</h1>
         <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-target="#staticBackdrop"  aria-label="Close"></button>
       </div>
       <div class="modal-body" >

 
<form method="post" enctype="multipart/form-data" novalidate class="needs-validation"  action="<?php echo site_url('seguro_medico/save_s_m');?>">

 <div class="mb-3">

<label class="form-label "><span class="text-danger"></span> Nombre :</label>

 <input type="text" class="form-control" name="title" id="title_ns" required>
<div class="invalid-feedback">Cual es el nombre?</div>
</div>


 <div class="mb-3">
<label class="form-label "><span class="text-danger"></span> Cargar Logo :</label>

<input type="file" class="file" name="picture"  id="picture" required>
<div class="invalid-feedback">Sube el logo</div>

</div>



 <div class="mb-3">
<label class="form-label ">RNC :</label>

 <input type="text"  title="Registro Nacional de Contribuyente" class="form-control" name="rnc" id="rnc" >

</div>



 <div class="mb-3">

<label class="form-label " title="Registro nacional de contribuyente">Telefonos :</label>

 <input type="text" class="form-control" name="tel" id="tel" >

</div>




 <div class="mb-3">
<label class="form-label " title="Registro nacional de contribuyente">Correo :</label>

 <input type="text" class="form-control" name="email"  id="email">

</div>


 <div class="mb-3">
<label class="form-label " title="Registro nacional de contribuyente">Dirección :</label>

 <input type="text" class="form-control" name="direccion" id="direccion" >

</div>


 <div class="mb-3">
<label class="form-label ">Campos:</label>

<?php 
foreach ($ALL_FIELDS as $row ) {?>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name='field_id[]' id="flexCheckDefault-<?=$row->id?>" value="<?=$row->id?>">
  <label class="form-check-label" for="flexCheckDefault-<?=$row->id?>">
   <?=$row->name?>
  </label>
</div>
<?php }  ?>
<div id="erBox4" class="text-danger"></div>
</div>
<div class="col-sm-12 col-md-offset-3">
<button type="submit"  id="send" class="btn btn-primary btn-xs save-new-seguro" > Guardar</button>

</div>
<br/><br/>



</form>



 
       </div>
      
     </div>
   </div>
 </div>
    </section>
	

  <?php
 
  $this->load->view('footer');
  ?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


listarInsurances();

	
	
	function listarInsurances(){

	     $.ajax({
 type: "POST",
 url: "<?php echo site_url('seguro_medico/healthInsuranceTable');?>",

 success:function(data){
 $("#list-insurances").html(data);
 },
 

 });	
	}
	
	

$('.save-new-seguro').click(function(e) { 
 
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        $("#erBox4").html("Debes marcar al menos una casilla por el seguro medico !");
        return false;
      }

});	
	
	
		
	
 });
</script>

	

	 
</body>

</html>