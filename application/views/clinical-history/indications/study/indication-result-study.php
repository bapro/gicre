 <?php
 $doc=$this->db->select('name')->where('id_user',$id_opertor)->get('users')->row('name');
$dateInsert = date("d-m-Y", strtotime($date));
echo "<i style='font-size:13px' class='text-primary'>Creado por Dr(a) $doc ($dateInsert)</i><hr>";?>
<table class="table table-striped" id="estudios-data" >
<thead>
   <tr>
    <th scope="col">Estudios</th>
    <th scope="col">Parte del cuerpo</th>
    <th scope="col">Lateralidad</th>
    <th scope="col">Nota</th>
   <th scope="col"></th>
    <th scope="col" >Acciones</th>
   <td><?php
if($id_current_user==$id_opertor){?>

<table  class="table">
<tr>
<td>
<button class="btn btn-primary btn-sm" id="repeat-indication-study" title="Repetir" > <i class="fa fa-copy"></i> </button>
</td>
<td>
<input type='checkbox' id="check-all-study" title="Imprimir todos" /> Imprimir Todos
</td>
<td>
    <ul class="nav navbar-nav  show-btn-print-current " >
	<li class="dropdown list-data-available ">
  <button type="button" disabled class="btn btn-success dropdown-toggle dropdown-toggle-split show-btn-print-estudio" data-bs-toggle="dropdown" aria-expanded="false">
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

<?php } ?></td>
   </tr>
</thead>
<tbody id="h_c_indicaciones_estudio-show-patient-lab-by-date1"></tbody>
 
</table>

<script>
$('#check-all-study').on('click', function(e) { 
 checkAllIndications(this, "h_c_indicaciones_estudio", "estudios-data", "<?=$date?>", <?=$historial_id?>);
});

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
url:'<?=base_url('h_c_indication_study/delete')?>',
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


$(document).on('click', '.check-estudio-print', function(){ 

checkOneIndication(this, "h_c_indicaciones_estudio", "id_i_e");
  
})	



var $checkboxesEst = $('#estudios-data td input[type="checkbox"]');
	$(document).on('change', $checkboxesEst, function(){
  showPrintBtnIfChecked("estudios-data", "show-btn-print-estudio");	
    
	
    });



</script>
