    <br/>
		<div class="d-flex align-items-center">
		<div class="flex-grow-1">
		<h3 class="title-header" style="font-weight: 600;">Listado de citas </h3>
		</div>

		</div>
	<div class="table-responsive">
                <table class="table table-sm  table-striped display compact" id="load-patient-citas" style="width:100%;font-size:13px">
                    <thead>
                        <tr>
						<th># Cita</th> 
                            <th>Centro médico</th> 
                             <th>Doctor</th>
							 <th>Especialidad</th>
							<th>Causa</th>
							<th>Fecha</th>
							<th># Factura</th>
							<th></th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
            </div>
			
			<script>

	
	$('#load-patient-citas').DataTable({
            "ajax": {
              url: "<?php echo base_url(); ?>patient_cita_controller/citasPatientTable",
              type: 'GET',
               'data': {
				  id_patient:<?=$id_patient?>
			  }
            },
			 "rowCallback": function( row, data ) {
    if ( data[6] ) {
      //$('td:eq(4)', row).addClass('text-success');
	 $('td', row).addClass('text-success');
    }
  },
           order: [[0, 'desc']],
		   	   	   	"oLanguage": {
			   "sUrl": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
    },
          });
	
	  $(document).on('click', '.update-this-cita', function(){  
           var id = $(this).attr("id");  
  loadCreateForm(id, "cita", "patient_cita_controller");
		

      });
	  
	  
	
	  
	  
	  
	$(document).on('click', '.cancel-this-cita', function(event){ 
event.stopImmediatePropagation();
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('patient_cita_controller/deleteCita')?>',
data: {id : del_id},
success:function(response) {
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});
//indication_med_down();

}
});
}
})   
	  

 
</script>