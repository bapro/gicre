 <section class="py-3">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                Usted tiene una cuenta anual, fecha inicial: 13-06-2022, fecha de vencimiento: 13-06-2023!
            </div>

            <div class="card mb-5">
                <div class="card-body">
                    <h6>Seleccione un centro medico</h6>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <select class="form-select" id="doctor" name="doctor">
								<?php 
								echo $result_centro_medicos;
								?>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Desde</span>
                                <input type="date" class="form-control" placeholder="">
                                <span class="input-group-text">Hasta</span>
                                <input type="date" class="form-control" placeholder="">
                                <button class="btn btn-primary" type="button" id="button-addon2"><i
                                        class="fa fa-search"></i></button>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i
                                        class="fa fa-print"></i></button>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm  table-striped" id="patient-hosptitalization-table">
                    <thead>
                        <tr class="bg-th">
                            <th>Fecha ingreso</th>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Edad</th>
                            <th>NEC</th>
                            <th>Seguro medico</th>
							<th>Doctor</th>
							<th>Causa</th>
							<th>Via</th>
							<th>Sala</th>
							<th>Servicio</th>
							<th>Cama</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
            </div>

        </div>
    </section>
  <?php $this->load->view('footer');?>

      <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function(){
$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
	
	$('#patient-hosptitalization-table').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>patient_hospitalization_controller/hospitalizationTable",
              type: 'GET',
              'data': {
				 id: <?=$id?>,
               

              },
            },
           order: [[0, 'desc']],
          });
	
	
 });
</script>
</body>

</html>