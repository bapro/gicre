 
	
	<div class="float-end show-btn-print-all mb-2" style="display:none">
	<button class='btn btn-default btn-xs' type='button' id='enviar-email-recetas'  >Enviar Recetas Al Paciente</button>
	<br/>
    <ul class="nav navbar-nav  show-btn-print-current " style="position:absolute">
	<li class="dropdown list-data-available ">
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fa fa-print"></i> </span>
  </button>
		<?php $this->load->view('clinical-history/indications/receipt/printing-menu'); ?>
		</li>
		</ul>
		<br/><br/>	<br/>	
	</div>	
		

 <em class="card-subtitle mb-2 text-muted">Total recetas <?=$total_recetas?></em>
 <table class="table table-striped is_print_rect" style="font-size:14px" id="medicamentos-data">
             <thead>
               <tr>
			   <th scope="col">#</th>
			    <th scope="col">Fecha</th>
                 <th scope="col">Medicamento</th>
                 <th scope="col">Presentación</th>
                 <th scope="col">Frecuencia</th>
                 <th scope="col">Vía</th>
                 <th scope="col">Cantidad</th>
				 <th scope="col"></th>
                <th scope="col">Usuario</th>
				<th scope="col">Acción</th>
				
               </tr>
             </thead>
             
           </table>
	<input type="hidden" value="<?=$historial_id?>" id="id_patient_lab" />
		<input type="hidden" value="<?=$centro_medico?>" id="centro_medico_lab" />
	<input type="hidden" value="<?=$this->session->userdata('is_shown_print_drug')?>" id="is_shown_print_drug" />
		   <script>



$(document).ready(function(){
if($("#is_shown_print_drug").val()==1){
$(".show-btn-print-all").show();
}else{
$(".show-btn-print-all").hide();	
}

    $(document).on('click', '.update-this-drug ', function(e){  
	e.preventDefault();
           var id = $(this).attr("id");  
           
           $.ajax({  
                url:"<?php echo base_url(); ?>h_c_indication_drug/fetch_single_drug",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data)  
                {   
                     $('#indicationMed').val(data.medica);  
                     $('#floatingDosis').val(data.dosis); 
                     $('#floatingPres').val(data.presentacion);
                     $('#floatingFrequency').val(data.frecuencia);
					 $('#floatingVia').val(data.via);
					 $('#viaOft').val(data.oyo); 
					 $('#floatingCantidad').val(data.cantidad); 
                     $('#id_ind_drug').val(id);  
                     $('#resetIndEst').show(); 
                    $('html, body').animate({
                    scrollTop: $("#scroll_to_ind_drug").offset().top
                    },0);
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           })  
      });









    var $checkboxes = $('#medicamentos-data td input[type="checkbox"]');
	$(document).on('change', $checkboxes, function(){   
    //$checkboxes.change(function(){
        var countCheckedCheckboxes = $('#medicamentos-data td input[type="checkbox"]').filter(':checked').length;
        $('#count-checked-checkboxes').text(countCheckedCheckboxes);
        
        if(countCheckedCheckboxes >0){
    $(".show-btn-print-all").show();	
    }else{
        $(".show-btn-print-all").hide();	
    }
    });



 $('#medicamentos-data').DataTable({
        "ajax": {
            url :"<?php echo base_url(); ?>h_c_indication_drug/medicamentos_list",
            type :'GET',
			 'data': {
				 id_patient_lab: $("#id_patient_lab").val()

              },
        },
	// 	"aLengthMenu": [
    //     [25, 50, 100, 200, -1],
    //     [25, 50, 100, 200, "All"]
    // ],
	order: [[0, 'desc']],
    });


		  
	$(document).on('click', '.check-recet-print', function(){ 

if ($(this).is(':checked')) {
  var id= $(this).val();
  var print= 1;
  values = [];
  var items =  $(".check-recet-print");
 $.each(items,function(index,item){
	 if($(item).prop('checked')){
	   values.push($(item).val());
	 }
   
 });
 localStorage.setItem('checked_med_for_printings',values.join(','));
  } 
  
   else {
 var id= $(this).not(":checked").val();
 var print= 0;
}
	  $.ajax({
	 type:'POST',
	 url:'<?=base_url('h_c_indication_drug/check_recetas')?>',
	 data: {id:id, print:print},
	 success:function(data) {
		 
   }
	 });
  
})	



$(document).on('click', '.delete-recetas', function(event){ 
event.stopImmediatePropagation();
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('h_c_indication_drug/DeleteRecetas')?>',
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

	
	});




		   </script>