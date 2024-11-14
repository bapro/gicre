 
	
	<!-- <div class="float-end show-btn-print-lab" style="display:none">
		<br/><br/>
    <ul class="nav navbar-nav show-btn-print-lab " style="position:absolute;display:none">
	<li class="dropdown list-data-available ">
		<span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;"></i> Imprimir<span class="caret"></span>&nbsp;</span>
		<ul class="dropdown-menu">
		<li class="data-li"><a class="dropdown-item">FORMATO VERTICAL</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/vert/1/singular_id/h_c_indications_labs/$this->ID_CENTRO")?>"   >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/vert/0/singular_id/h_c_indications_labs/$this->ID_CENTRO")?>"    >Sin la foto</a></li>
		
		
		<li class="data-li"><a class="dropdown-item">FORMATO HORIZONTAL</a></li>
	   <li class="data-li"> <a  class="imprimirRecetasForPat horiz dropdown-item" id='1' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/horiz/1/singular_id/h_c_indications_labs/$this->ID_CENTRO")?>"   >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat horiz dropdown-item" id='0' target="_blank" href="<?php echo base_url("printings/print_indicaciones/$this->ID_PATIENT/horiz/0/singular_id/h_c_indications_labs/$this->ID_CENTRO")?>"    >Sin la foto</a></li>
		
		</ul>
		</li>
		</ul>
		<br/>
	</div>	 -->
	<ul class="nav navbar-nav show-btn-print-lab position-absolute top-0 end-0 mt-3 me-2" style="display:none">
	<li class="dropdown list-data-available ">
	<button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fa fa-print" style="font-size:20px;"></i> </span>
  </button>

<!-- <span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer" ><i class="fa fa-print" style="font-size:20px;"></i> <span class="caret"></span>&nbsp;</span> -->
		
		<ul class="dropdown-menu">
		<li class="data-li"><a class="dropdown-item">FORMATO VERTICAL</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$id_patient/vert/1/singular_id/h_c_indications_labs/$id_centro")?>"   >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$id_patient/vert/0/singular_id/h_c_indications_labs/$id_centro")?>"    >Sin la foto</a></li>
		
		
		<li class="data-li"><a class="dropdown-item">FORMATO HORIZONTAL</a></li>
	   <li class="data-li"> <a  class="imprimirRecetasForPat horiz dropdown-item" id='1' target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$id_patient/horiz/1/singular_id/h_c_indications_labs/$id_centro")?>"   >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat horiz dropdown-item" id='0' target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$id_patient/horiz/0/singular_id/h_c_indications_labs/$id_centro")?>"    >Sin la foto</a></li>
		
		</ul>
		</li>
		</ul>

 <em class="card-subtitle mb-2 text-muted">Total  </em>
 <table class="table table-striped is_print_rect" style="font-size:14px;width:100%" id="laboratorios-data-list">
             <thead>
               <tr>
			   <th scope="col">#</th>
                 <th scope="col">Fecha</th>
                 <th scope="col">Laboratorio</th>
                 <th scope="col">Operador</th>
                 <th scope="col"></th>
                 <th scope="col">Eliminar</th>
               
               </tr>
             </thead>
             
           </table>
		   <?php $this->session->set_userdata('session_id_pat_lab', $id_patient); ?>
	<input type="hidden" value="<?=$id_patient?>" id="id_patient_lab" />
	<input type="hidden" value="<?=$this->session->userdata('is_shown_print_lag')?>" id="is_shown_print_lag" />
		   <script>



 $(document).ready(function(){
if($("#is_shown_print_lag").val()==1){
$(".show-btn-print-lab").show();
}else{
$(".show-btn-print-lab").hide();	
}
 $('#laboratorios-data-list').DataTable({
        "ajax": {
            url :"<?php echo base_url(); ?>h_c_indication_lab/lab_list",
			deferRender: true,
			 processing: true,
             type :'GET',
			'data': {
				 id_patient: $("#id_patient_lab").val(),
				 

              },
        },
		order: [[0, 'desc']],
		//pageLength: 100
	// 	"aLengthMenu": [
    //     [25, 50, 100, 200, -1],
    //     [25, 50, 100, 200, "All"]
    // ],
    });

    $(document).on('change', '.check-this-lab-to-print', function(){ 
      var countCheckedCheckboxes = $('#laboratorios-data-list td input[type="checkbox"]').filter(':checked').length;
   
      if ($(this).is(':checked')) {
     var labid= $(this).val();
	 var print= 1;
	 } 
	  
	  else {
	var labid= $(this).not(":checked").val();
	var print= 0;
 }
	  
	 	$.ajax({
		type:'POST',
		url:'<?=base_url('h_c_indication_lab/check_lab')?>',
		data: {labid:labid, print:print},
		success:function(data) {
      }
		});

    if(countCheckedCheckboxes > 0){
    $(".show-btn-print-lab").show();	
    }else{
        $(".show-btn-print-lab").hide();	
    }


     
 })


function immediatePropStopped1( event ) {
 event.isImmediatePropagationStopped();
  
}
$(document).on('click', '.delete-this-lab', function(event){ 
  immediatePropStopped1( event );
  event.stopImmediatePropagation();
  immediatePropStopped1( event );
 if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('h_c_indication_lab/delete_lab_by_id')?>',
data: {id : del_id, table:"h_c_indications_labs"},
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