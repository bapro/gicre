 <?php 
 $doc=$this->db->select('name')->where('id_user',$id_opertor)->get('users')->row('name');
$dateInsert = date("d-m-Y", strtotime($date));
echo "<i style='font-size:13px' class='text-primary'>Creado por Dr(a) $doc ($dateInsert)</i><hr>"
 ?>

<table class="table table-striped" id="medicamentos-data" >
<thead>
   <tr>
   <td> </td>
   <th colspan='5'></th>
   <td>
   <?php if($id_current_user==$id_opertor){?>


<table class="table" >
<tr>
<td>
<button class="btn btn-primary btn-sm" id="repeat-indication-drug" title="Repetir" > <i class="fa fa-copy"></i> </button>

</td>
<td>
<input type='checkbox' id="check-all-recetas" title="Imprimir todos" /> Imprimir Todos
</td>

<td>
    <ul class="nav navbar-nav"  >
	<li class="dropdown list-data-available ">
  <button type="button" disabled class="btn btn-success dropdown-toggle dropdown-toggle-split show-btn-print-all" data-bs-toggle="dropdown" aria-expanded="false">
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


<?php } ?>
</td>
   </tr>
 <th>Medicamento</th>
<th>Presentación</th>
<th>Frecuencia</th>
<th>Vía</th>
<th>Cantidad</th>
<th></th>
<th>Acciones</th>

	</thead>
<tbody id="<?=$table?>-show-patient-lab-by-date1"></tbody>
 
</table>

<script>




$('#check-all-recetas').on('click', function(e) { 
 checkAllIndications(this, "h_c_indicaciones_medicales", "medicamentos-data", "<?=$date?>", <?=$historial_id?>);
});

loadPatLabByDate();

function loadPatLabByDate(){

if($('.get-indication-table').val()=='h_c_indications_labs'){
	go_to="h_c_indication_lab";
}else if($('.get-indication-table').val()=='h_c_indicaciones_estudio'){
	go_to="h_c_indication_study";
}else{
	go_to="h_c_indication_drug";
}
var table = $('.get-indication-table').val();

	$.ajax({
		type:'POST',
		url: base_url_ind + go_to+ "/showIndicationsByDateList",
	   data: {date:"<?=$date?>", id_pat:$("#id_patient_hist").val()},
		success:function(data) {
	    $("#"+$('.get-indication-table').val()+"-show-patient-lab-by-date1").html(data);
		
      },

	});
	
}
$('#repeat-indication-drug').on('click', function(e) { 
	e.preventDefault();
	$.ajax({  
                url:"<?php echo base_url(); ?>h_c_indication_drug/repeatIndicationDrugs",  
                method:"POST",  
                data:{date:"<?=$date?>", id_patient: $("#id_patient_hist").val()},  
                  
                success:function(data)  
                { 
				
				   indication_med_down($("#id_patient_hist").val(), '');
                    $(".is-indications-has-been-duplicated").val(1); 
					if($(".is-indications-has-been-duplicated").val()==1){
						$(".show-eliminar-duplicado").show();
					}
                } 
           }) 
	
	
	
 }) 
 
 
  $(document).on('click', '.update-this-drug', function(e){  
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


	$(document).on('click', '.check-recet-print', function(){ 

checkOneIndication(this, "h_c_indicaciones_medicales", "id_i_m");
  
})	






var $checkboxes = $('#medicamentos-data td input[type="checkbox"]');
	$(document).on('change', $checkboxes, function(){
  showPrintBtnIfChecked("medicamentos-data", "show-btn-print-all");	
    
	
    });
 
</script>
