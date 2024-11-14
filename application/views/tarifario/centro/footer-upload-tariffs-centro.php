<script>
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
</script>