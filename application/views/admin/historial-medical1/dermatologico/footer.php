<script>
$(".select-derma").select2({
  tags: true
});



$(".disable-all :input").prop("disabled", true);
$(".show_modif_derma").on('click', function (e) {
	$('.show_modif_derma').hide();
	$(".save_derma_hide").prop("disabled", false);
	$(".save_derma_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	})
	
	
	
$('#save_derma_hide').on('click', function(event) {
event.preventDefault();
$(".save_derma_hide").prop("disabled", true);
var derma_tipo = $("#derma_tipoe").val();
var derma_tipo_text  = $("#derma_tipo_texte").val();
var derma_morfologia = $("#derma_morfologiae").val();
var derma_morfologia_text = $("#derma_morfologia_texte").val();
var derma_resto = $("#derma_restoe").val();
var derma_resto_text = $("#derma_resto_texte").val();
var derma_intero = $("#derma_interoe").val();
var derma_intero_text = $("#derma_intero_texte").val();
var derma_otros_datos = $("#derma_otros_datose").val();
var derma_otros_datos_text = $("#derma_otros_datos_texte").val();
var derma_diagno_der_ini = $("#derma_diagno_der_inie").val();
var id_derma = $("#id_derma").val();
var updated_by = $("#updated_by").val();
 $.ajax({
type: "POST",
url: "<?=base_url('admin_medico/SaveUpDermatologia')?>",
data: {
derma_tipo:derma_tipo,derma_tipo_text:derma_tipo_text ,derma_morfologia:derma_morfologia,updated_by:updated_by,
derma_morfologia_text:derma_morfologia_text ,derma_resto:derma_resto,derma_resto_text:derma_resto_text,
derma_intero:derma_intero,derma_intero_text:derma_intero_text,derma_otros_datos:derma_otros_datos,
derma_otros_datos_text:derma_otros_datos_text,derma_diagno_der_ini:derma_diagno_der_ini,id_derma:id_derma
},

cache: true,
  
success:function(data){
	alert("Cambiado ha sido hecho !");
	$('.show_modif_derma').slideDown();
	$(".save_derma_hide").hide();
$(".disable-all :input").prop("disabled", true);
}  
});
return false;
});	
	
</script>