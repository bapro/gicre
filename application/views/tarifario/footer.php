    <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9" ></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>assets_new/js/main.js"></script>
<input value="<?=$id_doctor?>" id="id_doctor" type="hidden"/>
<input value="<?=$id_seguro_medico?>" id="id_seguro_medico" type="hidden"/>
<input  id="save-plan-value" type="hidden"/>
<input  id="show_select" type="hidden" value="<?=$show_select?>"/>
<input  id="get_centro_id" type="hidden" value="<?=$get_centro_id?>"/>
<input  id="get_centro_name" type="hidden" value="<?=$get_centro_name?>"/>
 <input id="INVOICE_LINK" type="hidden" value="<?=$this->session->userdata('INVOICE_LINK')?>" > 
   <input id="where_to_go" type="hidden" value="<?=$get_seg_plan?>" > 
<script>
var id_doctor= $('#id_doctor').val();
var id_seguro = $('#id_seguro_medico').val();
var get_centro_id = $('#get_centro_id').val();
var get_centro_name= $('#id_doctor').val();
 var where_to_go= $('#where_to_go').val();
function immediatePropStopped( event ) {
 event.isImmediatePropagationStopped();
  
}
	
$('.form-select-seg').select2({
		theme: 'bootstrap-5',
		width: '100%'
	});

if($("#show_select").val()==1){
	$('#change-seguro').select2({
		theme: 'bootstrap-5',
		width: '100%'
		});


}


var keyupTimer1;
  $(document).on('keyup', '#plan_or_centro_id', function(event) {
  	var keyword = $(this).val();
            clearTimeout(keyupTimer1);
            keyupTimer1 = setTimeout(function () {
               autoCompleteInput(keyword);
            }, 300);
        });




function autoCompleteInput(keyword){
	var seguro_id = $('#seguro_id').val();
if(keyword==""){
	$('#suggestion-planCentro-list').html("");

}else{
	$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/search_plan_or_center')?>",
data: {keyword:keyword, id_doctor:id_doctor, seguro_id:seguro_id},
 success:function(data){
	 
$('#suggestion-planCentro-list').show().html(data);
},

});
}
}






$('#change-seguro').on('change', function(event) {
var id_seguro = $(this).val();
idPlan=0;
getPlanSinSeguroForm(id_seguro,idPlan);

});


load_doc_seguro();

function load_doc_seguro(){
	
$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/load_doc_seguro')?>",
data: {id_doctor:id_doctor},
 success:function(data){
$('#change-seguro').html(data);
},

});	
	
	
}




constant_load_seguro();



function constant_load_seguro(){
$('.loadf1').addClass("spinner-border");

$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/load_doc_seguro_with_tariff')?>",
data: {id_doctor:id_doctor,id_seguro:id_seguro},
 success:function(data){
	 $('.loadf1').removeClass('spinner-border');
$('#constant_l_s').html(data);
 
}

});
}


$(document).on('click', '.get-this-seguro-plan', function(event) {
  immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
var id = $(this).attr('id');

//$('#save-plan-value').val(id_plan);
$('.loadf').addClass("spinner-border");
showTarifariosBySeguro(id);
});

function showTarifariosBySeguro(id){
	
	$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/loadSeguroDocTarif')?>",
data: {id_doctor :id_doctor, id:id},
 success:function(data){
 $('.loadf').removeClass('spinner-border');
 $('#show-doc-tarifarios-por-seguro').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

 $('#show-doc-tarifarios-por-seguro').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}



$(document).on('click', '.get-this-seguro', function(event) {
	  immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
var id_seguro = $(this).attr('id');

var idPlan=$(this).find('span.find-plan-id').text();
$('.loadf').addClass("spinner-border");
getPlanSinSeguroForm(id_seguro,idPlan);


$('html, body').scrollTop($("#show-doc-tarifarios-por-seguro").offset().top);



});



function getPlanSinSeguroForm(id_seguro,idPlan){

$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/seguro_plan_sin_tarifarios')?>",
data: {id_seguro:id_seguro,id_doctor:$("#doct_tarif").val(),idPlan:idPlan, centro:$("#get_centro_id").val()},
 success:function(data){
 if(id_seguro==11){
$("#plan_or_centro_id").val(get_centro_name); 
 }
 $('#show-doc-tarifarios-por-seguro').html(data);
  $('.loadf').removeClass('spinner-border');
},
 
});
}
		
		
//------------UPLOAD FORM PART------------------------		
		
	
	
		
	
		$('#seguro_id').on('change', function(event){
event.preventDefault();
if ($(this).val()==11){
$('#plan-o-seguro').text('Centro');	

}else{
$('#plan-o-seguro').text('Plan');	

}
$('#plan_id').prop("prop",true);
$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/show_plan_seg')?>",
data: {id:$(this).val(),id_doctor:$("#medico_id").val(), id_centro:0},
 success:function(data){
	 $('#plan_id').html(data);
	$('#plan_id').prop("prop",false); 
},
 
});


});		
		
	$('#import_tarifarios').on('submit', function(event){
event.preventDefault();

var show_plan=$('#show_plan').val();

	if($("#codigo_medico").val()=="" || $("#seguro_id").val()=="" || $("#file").val()==""){
alert("Los campos son obligatorios");
}
else{
$("#import-btn").prop("disabled", true).text('Guardando...');
$.ajax({
url:"<?php echo base_url(); ?>tarifarios/import_exel",
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
Swal.fire({
	allowOutsideClick: false,
  icon: 'success',
  title: 'Tarifarios importados con éxito!',
  //text: 'Tarifarios importados con éxito!',
  //footer: '<a href="'+INVOICE_LINK+'">Facturar</a>'
}).then((result) => {
  if (result.isConfirmed) {
	  if(where_to_go==0){
location.reload(true);
	  }else{
		history.go(-1);
	  }
  }
})
},

});
};
});		
	

 $(document).on('click', '.delete-tarifarios', function(event) {
	   immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
if (confirm("Estás seguro de eliminar ?"))
{
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('tarifarios/delete_tarifarios')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){
$(this).remove();
});

}
});
}
})

	
	
 $(document).on('click', '.editBtn', function(event) {
	 	   immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
         //hide edit button
        $(this).closest("tr").find(".editBtn").hide();

        $(this).closest("tr").find(".saveBtn").show();

		  $(this).closest("tr").find(".editSpan").hide();

        //show edit input
        $(this).closest("tr").find(".editInput").show();

    });	
	

 $(document).on('click', '.saveBtn', function(event) {
	   immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
var ID = $(this).closest("tr").attr('id');
var inputData = $(this).closest("tr").find(".editInput").serialize();

//-------------------------------------------------------------------------------
 var codigo = $(this).closest("tr").find(".codigo").val();
 var simon = $(this).closest("tr").find(".simon").val();
  var procedimiento = $(this).closest("tr").find(".procedimiento").val();
   var monto = $(this).closest("tr").find(".monto").val();
   
   if(codigo=="" || simon=="" || procedimiento=="" || monto==""){
	   alert("Todos los campos son requerido !")
   } else {
  $(this).closest("tr").find(".editBtn").show();
$(this).hide();
 $(this).closest("tr").find(".editBtn").show();

   $(this).closest("tr").find(".editInput").hide();
   	  $(this).closest("tr").find(".editSpan").show();

   //--------------------------------AFECT NEW VALUES-------------------------------------------------
    $(this).closest("tr").find(".codigo-n").text(codigo);
	  $(this).closest("tr").find(".simon-n").text(simon);
	    $(this).closest("tr").find(".procedimiento-n").text(procedimiento);
		var dollarUSLocale = Intl.NumberFormat('en-US');
		
	/*	let dollarUS2 = Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
    useGrouping: true,
}); */
		
		var montoFormat = dollarUSLocale.format(monto);
      $(this).closest("tr").find(".monto-n").text(montoFormat);
//---------------------------------------------------------------------------------


$.ajax({
type:'POST',
url: "<?=base_url('tarifarios/save_edit_tarif')?>",
dataType: "json",
data:'id_tarif='+ID+'&'+inputData,
cache: true,
success:function(data){

}
});
   }
});
	

 $(document).on('click', '#show-s-b-cc', function(event) {
	 	   immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );
	  //hide edit button
        $("#show-cc").show();

        $("#hide-cc").hide();
		$(this).hide();
        $("#save-b-cc").show();
    });	
	
	
 $(document).on('click', '#save-b-cc', function(event) {
	 	   immediatePropStopped( event );
  event.stopImmediatePropagation();
  immediatePropStopped( event );	

var codigo  = $("#show-cc").val();
  if(codigo==""){
	 alert("El codigo no se puede dejar vacio !");
 } else {
var codigo_id  =  $("#codigo_contrato_id").val();

$.ajax({
type: "POST",
url: '<?php echo site_url('tarifarios/save_edit_c_c');?>',
data:{codigo_id:codigo_id,codigo:codigo},
success: function(data){
$("#show-cc").hide();
$("#hide-cc").show();
$("#hide-cc").text(codigo);
 $("#save-b-cc").hide();
  $("#show-s-b-cc").show();
},
});
 }
});

</script>
</body>

</html>