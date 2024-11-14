<?php

$content="

<div class='modal-header '  id='background_'>
<button type='button' title='Cierra' class='close' data-dismiss='modal' aria-hidden='true'><i class='fa fa-times-circle'  style='font-size:48px;color:red'></i></button>
<h3 class='modal-title'  >Editar Comprobante </h3><br/>
</div>
<div class='modal-body'>

<div class='row'  >

<div class='col-md-8'  >
<span><strong>Numeración</strong> $num </span><br/>
   <span><strong>Prefijo</strong> $prefijo</span>
   
  <div class='input-group'>
       <span class='input-group-addon'><strong>Siguiente Numero</strong></span>
    <input type='text' class='form-control' id='signum' value='$signum' maxlength='7'/> 
	<span class='input-group-addon' style='color:red'><em class='no-lettra'></em></span>
    </div>
	</div>
	</div>
	<br/>
	   <button type='button' class='btn btn-sm btn-default' id='btn-edit-comp' >Guardar</button>
	<div id='is-upt'></div>
  </div>
</div>

";
echo $content;

?>

<script>
$( "#signum" ).keyup(function() {
if($.isNumeric($(this).val())){
$( ".no-lettra" ).html('');
$( "#btn-edit-comp" ).prop('disabled',false);
 }else{
	 $( ".no-lettra" ).html('no lettra!');
	 $( "#btn-edit-comp" ).prop('disabled',true);
  }
});


$('#btn-edit-comp').on('click', function () {
var newcomprobante=$('#signum').val();
if(newcomprobante.length==7){
var prefijo= "<?=$prefijo?>";
var newval=prefijo+newcomprobante;

$.ajax({
type: "POST",
dataType: 'JSON',
url: "<?=base_url('admin_medico/saveEditComp')?>",
data: {id_user:<?=$id_user?>,newcomprobante:newval,idcomp:<?=$idcomp?>,id_Comp:<?=$id_Comp?>,id_patient:<?=$id_patient?>},
success:function(status){
$("#edit-comprobante").modal('hide');

	
},

});
}else{
$( ".no-lettra" ).html('7 cifras requeridos!');	
}
});
</script>