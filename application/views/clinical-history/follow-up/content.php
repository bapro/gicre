<hr/>
               <!-- Default Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100  " id="enfAct-tab-f" data-bs-toggle="tab" data-bs-target="#enfAct-left-f" type="button" role="tab" aria-controls="enfAct-f" aria-selected="true">Enfermedad actual</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="conDiag-tab-f" data-bs-toggle="tab" data-bs-target="#conDiag-left-f" type="button" role="tab" aria-controls="conDiag-f" aria-selected="false">Conclusión diagnóstica</button>
                </li>
				 <?php if($signo_vitales !=NULL) {?>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 " id="sigVit-tab-f"  data-bs-toggle="tab" data-bs-target="#sigVit-left-f" type="button" role="tab" aria-controls="sigVit-f" aria-selected="false">Signos vitales</button>
                </li>
				 <?php } ?>
              </ul>
            	 <?php

       $this->load->view('clinical-history/follow-up/form');
         if($show_evolution !='resume') {?>
	 <h4 class="card-title">Evolución</h4>
      <div style="overflow-x:auto;">
	 <ul class="pagination" id="evolution-diag-list-li">
	 <?php foreach ($query->result() as $row) {
			$inserted_time=date("d-m-Y H:i:s",strtotime($row->inserted_time));
				echo '<li class="page-item evolution-diag-list-li m-1" id="'.$row->id.'"><a class="page-link" href="#">'.$inserted_time.'</a></li>';
	 } ?>
	 
      </ul>
	 </div>
	 <div class="form-floating mb-3">
           <textarea class="form-control" id="conDiagEvo" placeholder="Niguno" style="height: 100px"></textarea>
           <label for="conDiagEvo">Evolución (Paciente subsecuente):</label>
         </div>
		<!-- <input type="hidden" class="form-control"  id="id_enf_rs" value="<?=$current_disease_id?>">-->
		  <input type="hidden" class="form-control"  id="id_cdia" value="<?=$con_diags['id']?>">
		  <input type="hidden" class="form-control"  id="id_user" value="<?=$id_user?>">
		  <input type="hidden" class="form-control"  id="is_today_saved" value="<?=$is_today_saved?>">
		   <input type="hidden" class="form-control"  id="id_patient" value="<?=$id_patient?>">
		  <input type="hidden"  id="id_con_evo" >
		 <button type="button" id="saveFollowUp" class="btn btn-success" >Guardar</button>
		  <button type="button" id="upFollowUp" class="btn btn-success" style="display:none">Editar</button>
		 <a href="#" id="createNewEvo" class="text-success" style="display:none" >Crear nuevo</button>
		
		  
		  <span id="evo-edit-result"></span>
	 <?php } ?>
	 
	 
	 
	   <script>
     loadCheckIfDocCanCreateNewEvolution();
	function loadCheckIfDocCanCreateNewEvolution(){
		
	var result = checkIfDocCanCreateNewEvolution();	
	if(result == 2){
		 $("#createNewEvo").hide();
		$("#saveFollowUp").hide();
	}
	};
	
	
	function showCurrentDate(){
		
		var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var get_today_date = d.getFullYear() + '-' +
    ((''+month).length<2 ? '0' : '') + month + '-' +
    ((''+day).length<2 ? '0' : '') + day;
		return get_today_date;
	}
	
	
	function checkIfDocCanCreateNewEvolution(){
var date_evo = $("#is_today_saved").val();
var get_today_date =showCurrentDate();

if(date_evo !=get_today_date){
	// doctor can create new evolution
	return 1;
}else{
	// doctor cannot create new evolution
	return 2;
}

	}

$(document).on("click", "#upFollowUp", function (event) {	 
//$('#upFollowUp').on('click', function(event) {
	event.preventDefault();
	$('#upFollowUp').prop("disabled", true);
	   	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/update_evolution",
data:{id_con_evo:$("#id_con_evo").val(), id_user:$("#id_user").val(),conDiagEvo:$("#conDiagEvo").val()},

success: function(data){
	
//$('#evo-edit-result').html(response.message).show().delay(2000).fadeOut();
$('#upFollowUp').prop("disabled", false);

},

});
});

$('#saveFollowUp').on('click', function(event) {
	event.preventDefault();
	   	$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/save_evolution",
data:{conDiagEvo:$("#conDiagEvo").val(),  id_cdia:$("#id_cdia").val(), id_patient:$("#id_patient").val()},
dataType: 'json',
success: function(response){
	if(response.status==0){
	$('#show-alert-if-inputs-data input, #show-alert-if-inputs-data textarea, #show-alert-if-inputs-data select').removeClass('changed-input'); 	

$("#evolution-diag-list-li").html(response.list);
$("#conDiagEvo").val("");
$('#saveFollowUp').prop("disabled", true).hide();
$('#createNewEvo').hide();

//after save update is_today_saved to current date

var currentDate = showCurrentDate();
$("#is_today_saved").val(currentDate);
checkIfDocCanCreateNewEvolution();
	
}
}
});
});

$(document).on("click", "#evolution-diag-list-li li", function (e) {
//$("#evolution-diag-list-li li").on('click', function(e) {
	e.preventDefault();

var pageNum = this.id;
$("#id_con_evo").val(pageNum);

$("#evolution-diag-list-li li.active").removeClass("active"); 
    $(this).addClass("active"); 
//$(".spinner-border").show();
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>modal_follow_up/form",
data:{page:pageNum},
success: function(data){

$("#conDiagEvo").val(data);
$('#upFollowUp').show();
$('#saveFollowUp').hide();



var result = checkIfDocCanCreateNewEvolution();	
	if(result == 2){
		 $("#createNewEvo").hide();
		
	}else{
	$("#createNewEvo").show();	
	}





},

});

});



$(document).on("click", "#createNewEvo", function (e) {
	$("#evolution-diag-list-li li.active").removeClass("active"); 
	$("#conDiagEvo").val("");
	$('#upFollowUp').hide();
	$('#createNewEvo').hide();
$('#saveFollowUp').show();
});

	   </script>

         