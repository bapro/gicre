      <div class="table-responsive">
	
  <table class="table table-sm  table-striped display compact" id="users-<?=$id?>" style="width:100%">
                    <thead>
                        <tr class="bg-th">
						<th>Id </th>
						<th>Nombres </th>
						<th> </th>
						<th>Perfil</th>
						<th>Status</th>
						<th>Acciones</th>
						 </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
				
	</div>
	
	<script>
	
		

	
	$('#users-<?=$id?>').DataTable({
		
            "ajax": {
              url: "<?php echo base_url(); ?>users/listUsers",
              type: 'GET',
              'data': {
				  perfil:"<?=$perfil?>"
			  }
            },
			
  order: [[2, 'desc']],
	   	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
       //'sEmptyTable': '<a class="btn btn-danger" href="<?php echo site_url('medico/search_patient_name_in_gicre');?>/' + nombres + '/' + apellidos + '/' + apellidos2 + '">No lo hemos encontrado. Buscar en en GICRE</a>'
		
    },
          });
	
	</script>