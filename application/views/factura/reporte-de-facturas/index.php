  <section class="py-3">
        <div class="container-xxl">
	
    <div class="card">
            <div class="card-body">
             <?php $this->load->view('factura/reporte-de-facturas/por-paciente');?>
			 <hr/>
			<div id="display-table-report-facturas-pacientes"></div>
			 <?php $this->load->view('factura/reporte-de-facturas/reporte-general');?>	
			 	<div id="display-table-report-facturas"></div>
				 <hr/>
		 <?php $this->load->view('factura/reporte-de-facturas/canceladas-facturas');?>	
             </div>
			
			
          </div>
   
   
     </div>
	 
	 
	
    </section>
    <?php 
	$this->load->view('footer'); ?>

     <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url();?>assets_new/js/xlsx.full.min.js?rnd=<?= time() ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" ></script>
  <script src="<?= base_url();?>assets_new/js/main.js?rnd=<?= time() ?>"></script>
<script>


$("#centro-can").change(function(){
		$(".form-select").prop("disabled",false);
		
		loadDocOnCentroSelect($(this).val(), "doctor-can");
		getDateRange($(this).val(), 'date-range-can');
       
		});



var created_by = "<?=$user_name?>-";
var date = moment();
var currentDate = date.format('DD/MM/YYYY');
$(document).on('click', '#ExportGeneralReportToExcel', function(e) {
ExportGeneralReportToExcel(type, fn, dl)
	
	});
	
	
	function ExportGeneralReportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exportgneralreport_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('reporte-general-de-facturas-' + created_by + currentDate+ '.' + (type || 'xlsx')));
    }
	
	$('.form-select').select2({
		theme: 'bootstrap-5',
		width: '100%'
	});
	
	$("#centro1").change(function(){
		$("#report1").find(".form-select").prop("disabled",false);
		
		loadDocOnCentroSelect($(this).val(), "doctor1");
		});
	

$("#doctor1").change(function(){
		$("#report1").find(".form-select").prop("disabled",false);
		
		});



	$("#seguro").change(function(){
	$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
	$("#desde1").prop('disabled',true);
	getDateRanch1($(this).val());
	getDateRanch2($(this).val());
	});
	
	
	
	function getDateRanch1(id){
	$.ajax({
	type: "GET",
	url: "<?php echo site_url('patient_factura_controller/get_date_range_seguro_patient');?>",
	data:{seguro:id,id_doc:$('#doctor1').val(),id_centro:$('#centro1').val(),sort:1},
	success: function(data){
	$("#desde1").html(data);
	$("#desde1").prop('disabled',false);
	$(".loadf").hide();
	},
	 
	}); 
}

   function getDateRanch2(id){
	$.ajax({
	type: "GET",
	url: "<?php echo site_url('patient_factura_controller/get_date_range_seguro_patient');?>",
	data:{seguro:id,id_doc:$('#doctor1').val(),id_centro:$('#centro1').val(),sort:0},
	success: function(data){
	$("#hasta1").html(data);
	$("#desde1").prop('disabled',false);
	$(".loadf").hide();
	},
	 
	}); 
}
	
	
	
	
	
	$("#centro").change(function(){
		$(".form-select").prop("disabled",false);
		
		loadDocOnCentroSelect($(this).val(), "doctor");
		getDateRange($(this).val(), 'date-range');
       
		});
		



function getDateRange(centro, dates) {
$(".date-range").prop("disabled",false);
$.ajax({
	type: "GET",
	url: "<?php echo site_url('factura_reporte_controller/getDateRangeReport');?>",
	data:{centro:centro},
	success: function(data){
	$("."+dates).html(data);
	
	$(".loadf").hide();
	},
	 
	});
}



//function getHasta(checkval) {

//$.ajax({
	//type: "GET",
	//url: "<?php echo site_url('patient_factura_controller/report_bill_by_hasta');?>",
	//data:{checkval:checkval},
	//success: function(data){
	//$("#hasta").html(data);
	//$(".loadf").hide();
	//},
	 
	//});
//}

$("#ver-reporte").click(function(){
var centro = $("#centro").val();
var doctor = $("#doctor").val();
var hasta = $("#hasta").val();
var desde = $("#desde").val();
var moneda= $(".select-device:checked").val();

if(centro=="")
{
alert("Elige un centro medico.");	
}
else if(desde > hasta ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta").val("").trigger("change.select2");
} else {
$("#display-table-report-facturas").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "GET",
url: "<?=base_url('factura_reporte_controller/get_factura_reporte_general')?>",
data: {desde:desde,hasta:hasta,centro:centro,doctor:doctor, moneda:moneda},
cache: true,
success:function(data){
$( "#display-table-report-facturas" ).html( data ); 
},
  
});
}
})




$('.select-centro').click(function () {
var checktype= $('input:radio[name=select-centro]:checked').val();
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
displayCentroOnSelect(checktype);
});
displayCentroOnSelect($('input:radio[name=select-centro]:checked').val());	

function displayCentroOnSelect(checktype){

$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_factura_controller/getCentroFacDateRange');?>",
	data:{checktype:checktype},
	success: function(data){
	$("#centro1").html(data);
	$("#centro1").prop("disabled",false);
	$("#seguro1").prop("disabled",false);
	if(checktype=='publico'){
	$("#doctor1").val("").trigger("change.select2");	
	//$("#doctor1").prop("disabled",true);		
	}else{
		$("#doctor1").prop("disabled",false);	
	}
	$(".loadf").hide();
	},
	  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$(".loadf").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
	});
	}





</script>

 <?php $this->load->view('linked-selected-functions');?>
</body>

</html>