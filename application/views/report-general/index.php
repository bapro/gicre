<section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-12">
          <div class="row">
 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
	Reporte de Pacientes Atendidos
	
	</button>
  </li>
  
  	 <?php 
$checkIfAreaOrtopeda=$this->db->select('area')->where('id_user',$this->session->userdata('user_id'))->get('users')->row('area');
$areaTitle=$this->db->select('title_area')->where('id_ar',$checkIfAreaOrtopeda)->get('areas')->row('title_area');
	
if(strpos($areaTitle, "ORTOPEDIA") !== false || $this->session->userdata('user_perfil')=='Admin') { ?>
  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
	Reporte de Estado del Paciente
	</button>
  </li>
  <?php }  ?>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
   <div class="card">
      <div class="card-body">
        <h3 class="card-title">Sacar Reporte de Pacientes Atendidos</h3>
		<form method='get'   >
		<div class="row g-3">
		
  <div class="col-sm">
 <label for="centro" class="form-label"><span class="text-danger">*</span> Centro médico</label>
                  <select id="centro" class="form-select" name="CENTRO" >
					 <?php 
						 echo $result_centro_medicos_cita;
						?>
					</select>
  </div>
  
  

    <div class="col-sm">
 <label for="medico" class="form-label"><span class="text-danger">*</span> Médico</label>
                  <select id="medico" class="form-select" name="MEDICO" >
					 <?php 
						 echo $result_doctors;
						?>
					</select>
  </div>
  
  
  <div class="col-sm">
     <label for="ASC" class="form-label"><span class="text-danger">*</span> Hasta</label>
                  <select id="ASC" class="form-select" name="DESDE">
                    
                  </select>
  </div>
  <div class="col-sm">
    <label for="DESC" class="form-label"><span class="text-danger">*</span> Desde</label>
                  <select id="DESC" class="form-select" name="HASTA" >
				
                  </select>
</div>
   <button type="button" id="btnSearchPatAt" class="btn btn-primary">Mostrar</button>


</div>
  </form>
  
  <div id="patients-attended-table"></div>
      </div>
    </div>
  
  
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
   <div class="card">
      <div class="card-body">
        <h3 class="card-title">Sacar Reporte de Estado del Paciente</h3>
		<form method='get'   >
		<div class="row g-3">
		
  <div class="col-sm">
 <label for="centro" class="form-label"><span class="text-danger">*</span> Centro médico</label>
                  <select id="estado-paciente-centro" class="form-select" name="estado-paciente-centro" >
					 <?php 
						 echo $result_centro_medicos_cita;
						?>
					</select>
  </div>
  
  

    <div class="col-sm">
 <label for="estado-paciente-medico" class="form-label"><span class="text-danger">*</span> Médico</label>
                  <select id="estado-paciente-medico" class="form-select" name="estado-paciente-medico" >
					 <?php 
						 echo $result_doctors;
						?>
					</select>
  </div>
  
  
  <div class="col-sm">
     <label for="estado-paciente" class="form-label">Estado del Paciente</label>
                  <select id="estado-paciente" class="form-select" name="estado-paciente">
                     <option>Acta Médica</option>
  <option>Estudio de Imagen</option>
  <option>Terapia Física y Rehabilitación</option>
  <option>Pendiente de Cirugía</option>
                  </select>
  </div>
 
   <button type="button" id="btnSearchPatEstado" class="btn btn-primary">Mostrar</button>


</div>
  </form>
  <div id="patients-attended-table"></div>
      </div>
    </div>
  
  </div>
 </div>
  
  
</div>
        </div>
		</div>

    </section>
    <?php $this->load->view('footer'); ?>

   <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/xlsx.full.min.js?rnd=<?= time() ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
 <?php $this->load->view('linked-selected-functions');?>
<script>


$(document).on('change', '#centro', function(e) {
e.preventDefault();

loadDocOnCentroSelect($(this).val(), "medico");


});



var created_by = "<?=rand(1,50);?>-";
var date = moment();
var currentDate = date.format('DD/MM/YYYY');
$(document).on('click', '#ExportGeneralReportToExcel', function(e) {
ExportGeneralReportToExcel(type, fn, dl)
	
	});
	
	
	function ExportGeneralReportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_report_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('reporte-general-de-facturas-' + created_by + currentDate+ '.' + (type || 'xlsx')));
    }


$(document).ready(function() {
	$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%',
		allowClear: true,
		placeholder: '',
	});



//----ON SELECT CENTRO SHOW UP DATES
	$('#centro').on('change', function () {
getDateRanchByCentro('ASC', 'DESC');

});

//----ON SELECT MEDICO SHOW UP DATES
	$('#medico').on('change', function () {
getDateRanchByCentro('ASC', 'DESC');

});	

	
function getDateRanchByCentro(desc, asc){
	getDateRanchDesc(desc);
	getDateRanchAsc(asc);
}

	
	function getDateRanchDesc(desc){
getDateRanch(desc);
}
	function getDateRanchAsc(asc){
		getDateRanch(asc);

}


function getDateRanch(direction){
	
	$.ajax({
type: "POST",
url: "<?=base_url('report_general/getDateRanch')?>",
data:{direction:direction, centro:$("#centro").val(),medico:$("#medico").val()},
success:function(data){ 
$( "#"+direction).html( data );
},


});	
}

	$('#btnSearchPatAt').on('click', function (prevent) {
		 event.preventDefault();
		 if($("#DESC").val() !='' && $("#ASC").val() !=''){
			 $( "#patients-attended-table").html('ESPERA...');
	$.ajax({
type: "POST",
url: "<?=base_url('report_general/attendedPatients')?>",
data:{hasta:$("#DESC").val(),desde:$("#ASC").val(), centro:$("#centro").val(), medico:$("#medico").val()},
success:function(data){ 
$( "#patients-attended-table").html(data);
},


});	
	}
});





	$('#btnSearchPatEstado').on('click', function (prevent) {
		 event.preventDefault();
		 if($("#estado-paciente-centro").val() !='' && $("#estado-paciente-medico").val() !=''){
			 $( "#patients-attended-table").html('ESPERA...');
	$.ajax({
type: "POST",
url: "<?=base_url('report_general/patientState')?>",
data:{centro:$("#estado-paciente-centro").val(),medico:$("#estado-paciente-medico").val(), estado:$("#estado-paciente").val()},
success:function(data){ 
$( "#patients-attended-table").html(data);
},


});	
	}
});






	
	});	
</script>
</body>

</html>