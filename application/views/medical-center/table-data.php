      <div class="table-responsive">
	
  <table class="table table-sm " id="table-areas" style="width:100%">
                    <thead>
                        <tr class="bg-th">
						<th class="col-xs-3">#</th>
						 <th class="col-xs-3">Nombre</th>
							<th class="col-xs-1">Logo</th>
							<th class="col-xs-1" >Primer Telefono</th>
							<th class="col-xs-1" >Acción</th>
						 </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
				
	</div>
	
	<script>
	
		
	
	
	
	$('#table-areas').DataTable({
		
            "ajax": {
              url: "<?php echo base_url(); ?>medical_center/listMedicalCenters",
              type: 'GET',
             
            },
			
  order: [[0, 'desc']],
		  	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
          });
	
	</script>