 <section class="py-3">
        <div class="container">
		  <div class="col-md-12">
		  		   <div class="card">
               <!-- <div class="card-header">
                    Buscar el paciente primero ante de empezar a crear nueva cita.
                </div>-->
                <div class="card-body">
                    <div class="row g-2">
					<h3 class="card-title">Seleccionar paciente en:</h3>
	
	              <div class="col-md-8">
				  <form id="radio_box">
				<div class="btn-group" role="group" >
				
				<input type="radio" class="btn-check" name="origine" id="ant_tox_tel_1" autocomplete="off" value="0" checked>
				<label class="btn btn-outline-primary" for="ant_tox_tel_1">Hospitalización</label>
               
				<input type="radio" class="btn-check" name="origine" id="ant_tox_tel_2" autocomplete="off" value="1" >
				<label class="btn btn-outline-primary" for="ant_tox_tel_2">Emergencia</label>

				</div>	
				</form>
				<div class="row">
				<label class="form-label">Seleccionar un paciente</label>
				<div class="col-12">
				<select class="form-select" id="select-patient">
				
				</select>
				</div>

				</div>
				</div>
                     
						
                    </div>
                </div>
				<hr/>
                    <div class="card-body">
						 <h3 class="card-title">Recepción de Petición</h3>
					<div id="search-results"></div>
					</div>
					
            </div>
		
         </div>
        </div>
		<input id="save-selected" type="hidden" />
	
    </section>


  <?php $this->load->view('footer');?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script> 


<script>

$(document).ready( function(){

selected_value = $("input[name='origine']:checked").val();
$("#save-selected").val(selected_value);
	
$('#radio_box').change(function(){
selected_value = $("input[name='origine']:checked").val();
$("#save-selected").val(selected_value);
patientList();
$("#search-results").html("");
});
	
	patientList();
	
	function patientList(){
  $.ajax({
type: "GET",
url: "<?=base_url('internal_pharmacy/listOfPatients')?>",
data: {origine:$("#save-selected").val()},
success:function(data){
$('#select-patient').html(data);

},

});

}
  $('#select-patient').on('change', function(event) {
	  //event.preventDefault();
	
  	//window.location.href = "<?php echo site_url('internal_pharmacy/searchPatientRecordEmergency');?>/" + $("#select-patient").val() + '/' + 1;
onselectpatient();
        });
	
	function onselectpatient(){
		   $.ajax({
type: "GET",
url: "<?=base_url('internal_pharmacy/searchPatientRecordEmergency')?>",
data: {keyword:$("#select-patient").val(), val:$("#save-selected").val()},
success:function(data){
$("#search-results").html(data);
//$("#suggesstion-box-").hide();
},

});	
	}
	
	
	$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
		
		
	});
	
	
var base_url='<?php echo base_url(); ?>';	

	
	  $(document).on('click', '.printDispatchedDrugs', function(event) {
		 event.preventDefault();

		if($("#save-selected").val()==1){
			var printPage='print_page_emergency';
		}else{
       var printPage='print_page_hospitalization';
		}			
  	window.open(base_url + printPage +'/farma_interna/'+ $(".id_patient").val()+'/'+ $(".id_centro").val()+'/'+ $(".id_hosp").val(), '_blank', 'noopener, noreferrer');
	 
setTimeout(function() {
       //location.reload(true);
	  onselectpatient();
		}, 1000);
	
        });
	






	
 });
</script>

	

	 
</body>

</html>