 <section class="py-3">
        <div class="container">
            <div class="card">
	<div class="card-body">
	<h3 class="card-title">Listado de pacientes encontrados</h3>
	<input type="hidden" id="search-nombres" value="<?php echo $nombres; ?>">
	<input type="hidden" id="search-apellidos" value="<?php echo $apellidos; ?>" placeholder="apellidos">
	<input type="hidden" id="search-apellidos2" value="<?php echo $apellidos2; ?>" placeholder="apellidos">	
	<input type="hidden" id="controller" value="<?php echo $controller; ?>">
<table class="table table-striped table-sm" id="patientGicreRsl">
<thead>
  <tr>
    <th scope="col">#</th>
	<th scope="col">Foto</th>
    <th scope="col">Nombres</th>
    <th scope="col">Cedula</th>
	<th scope="col">NEC</th>
  
  </tr>
</thead>

</table>
</div>
</div>
</div>
</section>



  <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script>

$(document).ready(function(){
var nombres= $('#search-nombres').val();
var apellidos=$('#search-apellidos').val();
var	apellidos2=$('#search-apellidos2').val();
 var controller= $('#controller').val();
	
    $('#patientGicreRsl').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('patient_search/searchPatientInGicre/'); ?>",
            "type": "POST",
			  'data': {
				 nombres: nombres,
                apellidos:apellidos,
				apellidos2:apellidos2

              },
        },
		"oLanguage": {
		 //'sEmptyTable': '<a class="btn btn-danger" href="<?php echo site_url()?>'+controller+'/create_patient">No lo hemos encontrado. crear</a>'
		  "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
        //Set column definition initialisation properties
        "columnDefs": [{ 
            "targets": [0],
            "orderable": false
        }]
    });
});

   </script>
	   

</body>

</html>