      <div class="table-responsive">
	
  <table class="table table-sm " id="table-areas" style="width:100%">
                    <thead>
                        <tr class="bg-th">
						<th># </th>
						<th>AREA Y DOCTORES ASOCIADOS </th>
						<th>Acciones</th>
						 </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
				
	</div>
	
	<script>
	
		
	
	
	
	$('#table-areas').DataTable({
		
            "ajax": {
              url: "<?php echo base_url(); ?>users/listAreas",
              type: 'GET',
             
            },
			
  order: [[0, 'desc']],
		  	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
          });
	
	</script>