 <section class="py-3">
        <div class="container">
           

            <div class="card">
					
			   <div class="card-body">
<table id='empTable' class='display dataTable'>

       <thead>
         <tr class="bg-th">
		             <th>Foto</th>
						<th>Pacintet</th>
						<th>NEC</th>
						<th>Nombres</th>
						<th>Seguro Médico</th>
						
                        </tr>
       </thead>

     </table>
	 </div>
	 </div>
	 </div>
	 </section>
 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="<?= base_url(); ?>assets_new/js/upload-fotos.js?rnd=<?= time() ?>"></script>
  <script src="<?= base_url(); ?>assets_new/js/upload-surgery-documents.js?rnd=<?= time() ?>"></script>
   <script src="<?= base_url();?>assets_new/js/indications.js?rnd=<?= time() ?>" ></script>
    <script src="<?= base_url();?>assets_new/js/repeated-historial-clinica.js?rnd=<?= time() ?>" ></script>
	  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>citas_list/citasList'
          },
          'columns': [
		   { data: '' },
             { data: 'patient' },
             { data: 'doctor' },
             { data: 'centro' },
             { data: 'fecha' },
            
          ]
        });
     });
     </script>