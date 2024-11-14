<table class="table table-striped"  >
<thead>
   <tr>
    <th scope="col">Estudios</th>
    <th scope="col">Parte del cuerpo</th>
    <th scope="col">Lateralidad</th>
    <th scope="col">Nota</th>
    <th scope="col">Operator</th>
    <th scope="col" >Acciones</th>
   <th><?php
if($id_current_user==$id_opertor){?>

<table >
<tr>
<td>
<button class="btn btn-primary btn-sm" id="repeat-indication-study" title="Repetir" > <i class="fa fa-copy"></i> </button>
</td>
<td>
    <ul class="nav navbar-nav  show-btn-print-current " >
	<li class="dropdown list-data-available ">
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fa fa-print"></i> </span>
  </button>
		<?php 
		//$data['centro_medico']=$centro_medico;
		$this->load->view('clinical-history/indications/receipt/printing-menu');
		?>
		</li>
		</ul>
	</td>
	</tr>
	</table>

<?php } ?></th>
   </tr>
</thead>
<tbody id="h_c_indicaciones_estudio-show-patient-lab-by-date1"></tbody>
 
</table>

<script>


loadPatStudyByDateLab();

function loadPatStudyByDateLab(){
	$.ajax({
		type:'POST',
		url: base_url_ind+"h_c_indication_study/showIndicationsByDateList",
	   data: {date:"<?=$date?>", id_pat:$("#id_patient_hist").val()},
		success:function(data) {
	    $("#h_c_indicaciones_estudio-show-patient-lab-by-date1").html(data);
		
      },

	});
	
}
$('#repeat-indication-study').on('click', function(e) { 
	e.preventDefault();
	
	$.ajax({  
                url:base_url_ind+"h_c_indication_study/repeatIndicationStudy",  
                method:"POST",  
                data:{date:"<?=$date?>", id_patient: $("#id_patient_hist").val()},  
                  
                success:function(data)  
                { 
				
				   indication_study_data($("#id_patient_hist").val(), '');
                    $(".is-indications-study-has-been-duplicated").val(1); 
					if($(".is-indications-study-has-been-duplicated").val()==1){
						$(".show-eliminar-duplicado-study").show();
					}
                }, 
	
           }) 
	
	
	
 }) 
 
 
    $(document).on('click', '.update-this-study', function(){  
	  $('html, body').animate({
                    scrollTop: $("#scroll_to_ind_study").offset().top
                    },0);
          $.ajax({  
                url:"<?php echo base_url(); ?>h_c_indication_study/fetch_single_estudio",  
                method:"POST",  
                data:{id:$(this).attr("id")},  
                dataType:"json",  
                success:function(data)  
                {   
                     $('#floatingIndEst').val(data.estudio);  
                     $('#floatingIndBody').val(data.cuerpo); 
                     $('#floatingIndLat').val(data.lateralidad);
                     $('#floatingIndObs').val(data.observacion); 
                     $('#id_ind_study').val(idRegistro);  
                     $('#resetIndEst').show(); 
                  
                     //$('#user_uploaded_image').html(data.user_image);  
                      
                }  
           }) 
		   
		   
       });
	  
	  
$(document).on('click', '.delete-this-study', function(event){ 
event.stopImmediatePropagation();
if (confirm("Lo quiere eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('h_c_indication_lab/delete_lab_by_id')?>',
data: {id : del_id, table:"h_c_indicaciones_estudio"},
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
