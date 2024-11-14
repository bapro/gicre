 <?php
 $doc=$this->db->select('name')->where('id_user',$id_opertor)->get('users')->row('name');
$dateInsert = date("d-m-Y", strtotime($date));
echo "<i style='font-size:13px' class='text-primary'>Creado por Dr(a) $doc ($dateInsert)</i><hr>";?>
<table class="table table-striped" id="labo-data" >
<thead>
   <tr>
   <th>Laboratorio</th>
   <th></th>
   <th></th>
   <td>
   <?php
if($id_current_user==$id_opertor){?>

<table >
<tr>
<td>
<button class="btn btn-primary btn-sm" id="repeat-indication-lab" title="Repetir" > <i class="fa fa-copy"></i> </button>
</td>
<td>
<input type='checkbox' id="check-all-labo" title="Imprimir todos" /> Imprimir Todos
</td>
<td>
    <ul class="nav navbar-nav  show-btn-print-current " >
	<li class="dropdown list-data-available ">
  <button type="button" disabled class="btn btn-success dropdown-toggle dropdown-toggle-split show-btn-print-labo" data-bs-toggle="dropdown" aria-expanded="false">
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
<tbody id="h_c_indications_labs-show-patient-lab-by-date1"></tbody>
 
</table>

<script>

$('#check-all-labo').on('click', function(e) { 
 checkAllIndications(this, "h_c_indications_labs", "labo-data", "<?=$date?>", <?=$historial_id?>);
});



var $checkboxesEst = $('#labo-data td input[type="checkbox"]');
	$(document).on('change', $checkboxesEst, function(){
  showPrintBtnIfChecked("labo-data", "show-btn-print-labo");	
   });
   
   
   $(document).on('click', '.check-labo-print', function(){ 

checkOneIndication(this, "h_c_indications_labs", "id_lab");
  
})	
   
   
   
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
