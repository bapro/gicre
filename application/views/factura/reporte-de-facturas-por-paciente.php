  <section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
	
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reporte de facturas</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3">
                <div class="col-md-12">
                 <label>Seleccione el tipo de seguro :</label> <input type="radio"  name="select-seguro" value="privado" class="select-seguro"/> privado | <input type="radio" value="general" class="select-seguro" name="select-seguro"/> general
                </div>
                <div class="col">
                  <label for="centro1" class="form-label">centro1 medico</label>
                  <select id="centro1" class="form-select" disabled>
                   <?php 
  echo $result_centro1_medicos;
	?>
                  </select>
                </div>
                <div class="col">
                  <label for="doctor1" class="form-label">Medico</label>
                  <select id="doctor1" class="form-select" disabled>
                  </select>
                </div>
                <div class="col">
                  <label for="desde1" class="form-label">desde1</label>
                  <select id="desde1" class="form-select" disabled>
                   
                  </select>
                </div>
                <div class="col">
                  <label for="hasta1" class="form-label">hasta1</label>
                  <select id="hasta1" class="form-select" disabled>
                    
                  </select>
				 
                </div>
                
              </form><!-- End Multi Columns Form -->
 <div class="text-end py-2">
                  <button type="button" id="ver-reporte1" class="btn btn-primary">Ver</button>
                  <input id="clone-check-seguro" type="hidden" />
                </div>
				
				<div id="display-table-report-facturas1"></div>
            </div>
			
			
			
          </div>
   
   
     </div>

    </section>
    <?php $this->load->view('footer'); ?>

     <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>

<script>

	$('.form-select').select2({
		theme: 'bootstrap-5',
		//width: '100%'
	});
	$("#centro1").change(function(){
		$(".form-select").prop("disabled",false);
		
		loadDocOncentro1Select($(this).val(), "doctor1");
		});
		
$('.select-seguro').click(function () {
var checkval = $('input:radio[name=select-seguro]:checked').val();
$(".loadf").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$('#clone-check-seguro').val(checkval);
$("#centro1").prop("disabled",false);
getdesde1(checkval);
gethasta1(checkval);
});

function getdesde1(checkval) {
$("#desde1").prop("disabled",true);
$.ajax({
	type: "GET",
	url: "<?php echo site_url('patient_factura_controller/report_bill_by_desde1');?>",
	data:{checkval:checkval},
	success: function(data){
	$("#desde1").html(data);
	
	$(".loadf").hide();
	},
	 
	});
}



function gethasta1(checkval) {

$.ajax({
	type: "GET",
	url: "<?php echo site_url('patient_factura_controller/report_bill_by_hasta1');?>",
	data:{checkval:checkval},
	success: function(data){
	$("#hasta1").html(data);
	$(".loadf").hide();
	},
	 
	});
}

$("#ver-reporte1").click(function(){
var centro1 = $("#centro1").val();
var doctor1 = $("#doctor1").val();
var hasta1 = $("#hasta1").val();
var desde1 = $("#desde1").val();
var checkval= $('#clone-check-seguro').val();

if(centro1=="")
{
alert("Elige un centro1 medico.");	
}
else if(desde1 > hasta1 ){
alert("No se puede seleccionar una fecha menor a la de inicio.");
$("#hasta1").val("").trigger("change.select2");
} else {
$("#display-table-report-facturas").fadeIn().html('<span style="font-size:15px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
type: "GET",
url: "<?=base_url('patient_factura_controller/get_fac_date_report')?>",
data: {desde1:desde1,hasta1:hasta1,checkval:checkval,centro1:centro1,doctor1:doctor1},
cache: true,
success:function(data){
$( "#display-table-report-facturas" ).html( data ); 
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#display-table-report-facturas').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
}
})

</script>

 <?php $this->load->view('linked-selected-functions');?>
</body>

</html>