<table class="table table-striped"  >
<thead>
   <tr>
   <th>Laboratorio</th>
   <th><?php
if($id_current_user==$id_opertor){?>

<table >
<tr>
<td>
<button class="btn btn-primary btn-sm" id="repeat-indication-lab" title="Repetir" > <i class="fa fa-copy"></i> </button>
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
<tbody id="h_c_indications_labs-show-patient-lab-by-date1"></tbody>
 
</table>

<script>


loadPatLabByDateLab();

function loadPatLabByDateLab(){
	$.ajax({
		type:'POST',
		url: base_url_ind+"h_c_indication_lab/showIndicationsByDateList",
	   data: {date:"<?=$date?>", id_pat:$("#id_patient_hist").val()},
		success:function(data) {
	    $("#h_c_indications_labs-show-patient-lab-by-date1").html(data);
		
      },

	});
	
}
$('#repeat-indication-lab').on('click', function(e) { 
	e.preventDefault();
	
	$.ajax({  
                url:base_url_ind+"h_c_indication_lab/repeatIndicationLabs",  
                method:"POST",  
                data:{date:"<?=$date?>", id_patient: $("#id_patient_hist").val()},  
                  
                success:function(data)  
                { 
				
				   allLaboratorios($("#id_patient_hist").val(), '');
                    $(".is-indications-lab-has-been-duplicated").val(1); 
					if($(".is-indications-lab-has-been-duplicated").val()==1){
						$(".show-eliminar-duplicado-lab").show();
					}
                }, 
	
           }) 
	
	
	
 }) 
 
 

	  
	  
$(document).on('click', '.delete-this-lab', function(event){ 
event.stopImmediatePropagation();
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
</script>
