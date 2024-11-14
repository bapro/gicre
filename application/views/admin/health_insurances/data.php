 <div class="table-responsive">
	
  <table class="table table-sm " id="table-insurances" style="width:100%">
                    <thead>
                        <tr>
						<th>#</th>
						<th>Seguro Medico</th>
						<th>Logo</th>
						<th>RNC</th>
						<th>Acciones</th>
						 </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
				
	</div>
	
	<script>
	
		
	
	
	
	$('#table-insurances').DataTable({
		
            "ajax": {
              url: "<?php echo base_url(); ?>seguro_medico/healthInsuranceTableData",
              type: 'GET',
             
            },
			
  order: [[0, 'desc']],
		  	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
          });
	
	</script>