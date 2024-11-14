	<section class="py-3">
	<div class="container  d-flex align-items-center justify-content-center">
	<div class="col-md-9">
	<a class="btn btn-primary mb-3"  href="#" data-bs-toggle="modal" data-bs-target="#createCentroMedicoModal" >Crear Centro Médico</a>
	<div class="card">
	<div class="card-header fs-1">Listado de pacientes ingresados</div>
	<div class="card-body">

  <div id="list-hosp-admitted-patients"></div>


	</div>
	</div>
	</div>

	
 </div>
 
    </section>
	

  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script> 
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


listarmedical_centers();


	
	function listarmedical_centers(){

	     $.ajax({
 type: "POST",
 url: "<?php echo site_url('hospitalization/patients_admitted_table');?>",

 success:function(data){
 $("#list-hosp-admitted-patients").html(data);
 },
 

 });	
	}
	
	
$('.form-select').select2({
	//dropdownParent: $('#createCentroMedicoModal'),
		theme: 'bootstrap-5',
		width: '100%'
		});




	
 });
</script>

	

	 
</body>

</html>