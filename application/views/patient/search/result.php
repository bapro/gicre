 <section class="py-3">
        <div class="container">
            <div class="card">
	<div class="card-body">
	<h3 class="card-title">Listado de pacientes encontrados</h3>
	<input type="hidden" id="search-nombres" value="<?php echo $nombres; ?>">
	<input type="hidden" id="search-apellidos" value="<?php echo $apellidos; ?>" placeholder="apellidos">
	<input type="hidden" id="search-apellidos2" value="<?php echo $apellidos2; ?>" placeholder="apellidos">	
<table class="table table-striped table-sm table-borderless " id="memListTable">
<thead>
  <tr>
    <th class="th-sm">#</th>
	<th class="th-sm">Foto</th>
    <th class="th-sm">Nombres</th>
    <th class="th-sm">Primer Apellido</th>
	 <th class="th-sm">Segundo Apellido</th>
  <th class="th-sm">Cedula</th>
  </tr>
</thead>

</table>
</div>
</div>
</div>
</section>

 <?php $this->load->view('footer');?>

  <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js"></script>
<script>

$(document).ready(function(){
var nombres= $('#search-nombres').val();
var apellidos=$('#search-apellidos').val();
var	apellidos2=$('#search-apellidos2').val();
	
    $('#memListTable').DataTable({
        // Processing indicator
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('patient_search/searchPatientInPadron/'); ?>",
            "type": "POST",
			  'data': {
				 nombres: nombres,
                apellidos:apellidos,
				apellidos2:apellidos2

              },
        },
		
		"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
       //'sEmptyTable': '<a class="btn btn-danger" href="<?php echo site_url('medico/search_patient_name_in_gicre');?>/' + nombres + '/' + apellidos + '/' + apellidos2 + '">No lo hemos encontrado. Buscar en en GICRE</a>'
		
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