   
	   <?php $autoNumber=random_int(100, 100000);?>
      <input  type="hidden" class="form-control" id="autoNomber" value="<?=$autoNumber?>" >
<div class="row mt-3">
<div class="col-md-6 mb-2">
<label class="form-label">Centro médico <span
class="text-danger">*</span></label>
<select class="form-select form-select4" name="presup-centro" id="presup-centro">
<?php echo $result_centro_medicos ; ?>
</select>
</div>
<div class="col-md-6 mb-2">
<label class="form-label">Médico <span class="text-danger">*</span></label>
<select class="form-select form-select4" name="presup-med" id="presup-med">
<?php echo $result_doc_by_centers ; ?> 
</select>
</div>
<div class="col-md-6 mb-2">
<label class="form-label">Conclusión Diagnostico <span
class="text-danger">*</span></label>
<input type="text" class="form-control" name="presup-condiag" id="presup-condiag" >
</div>
<div class="col-md-9 mb-2">
<label class="form-label">Buscar Procedimiento <span
class="text-danger">*</span></label>
<select class="form-select form-select4" name="presup-proced" id="presup-proced" disabled>


</select>
</div>

<div class="col-md-3 mb-2">
<label class="form-label">Precio <span
class="text-danger">*</span></label>
<input type="text" class="form-control" id="proced-precio" >

</div>


</div>
                                  
	   <div id="loadLastProced"></div>
	 <div id="paginationProcedFacData"></div>					
			<script>
			
			
			
			
			$("#presup-condiag").on("keyup",function() {
	if($('#presup-condiag').val()==''){
		$('#presup-proced').prop("disabled",true);
	}else{
		$('#presup-proced').prop("disabled",false);
	}
});
			
			
			
			
			
										
//--------ONLOAD DOCTOR PRESUPUESTO---------
$(document).on('change', '#presup-med', function(e) {
e.preventDefault();	
paginationProcedFacData($(this).val());

	
$.ajax({
	type: "POST",
	url: "<?php echo site_url('patient_presupueto_controller/loadProcedimientoDoc');?>",
	data:{seguro:$('#seguro_medico_id').val(),id_doc:$(this).val()},
	success: function(data){
	
	$("#presup-proced").html(data);
	
	
	},

	 });
	
});

			
			
			
								$('.form-select4').select2({
								theme: 'bootstrap-5',
								width: '100%',
								tags:true
								});


								var timer = null;
                          $('#proced-precio').on('keydown', function(event){
								
								clearTimeout(timer);
								timer = setTimeout(savePresupuesto, 1000)
								});
								
								


		function savePresupuesto(){

		var centro=$("#presup-centro").val();
		var proced = $("#presup-proced").val();
		var precio = $("#proced-precio").val();
		var conc= $("#presup-condiag").val();
		var autoNomber= $("#autoNomber").val();  
		var id_doc=$("#presup-med").val();
		if(centro !='' && proced !='' && precio !='' && conc !=''){
		$('#saveBtnNew').prop("disabled",true);
		$.ajax({
		type:'POST',
		url: "<?=base_url('patient_presupueto_controller/addNewPresupuesto')?>",
		data:{proced:proced,precio:precio,id_doc:id_doc,conc:conc,centro:centro,autoNomber:autoNomber},
		success:function(data){
		//loadLastProced(id_doc);
		$('#loadLastProced').show().html('agregado').addClass("alert alert-success").delay(1000).fadeOut(500);
		paginationProcedFacData(id_doc);
		$('#presup-proced').val(null).trigger('change');
	
		},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#loadLastProced').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
		});
		}
		}


function paginationProcedFacData(id_doc){
$('#load-procedimientos-tarif').html('Agregando...');
$.ajax({
url:"<?php echo base_url(); ?>patient_presupueto_controller/paginationPatientPresupuestos",
data: {id_doc:id_doc},
method:"POST",
success:function(data){
$('#paginationProcedFacData').html(data);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#paginationProcedFacData').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
								
	function loadLastProced(idDoc){
	
$.ajax({
url:"<?php echo base_url(); ?>patient_presupueto_controller/paginationProcedFacDataDefault",
data: {id_doc:idDoc},
method:"GET",
success:function(data){
$('#loadLastProced').html(data);
},

});


}							
								
	
$(document).on('click', '#paginate-presupuesto-li li', function(e) {
	e.preventDefault();
			var display_content = "#patientPresupuestosListato";
			var controller = "patient_presupueto_controller";
			var pageNum = this.id;
			$("#paginate-presupuesto-li li.active").removeClass("active");
			$(this).addClass("active");
			
			paginationResult(display_content, controller, pageNum);
		});							
									</script>