
<div class="modal-header" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title ">Crear Nueva Cita (<?php echo $nec?>)
</h4>

</div>

<h4 id="erBox" style="color:red"></h4>
<h4 id="exitosend" class='alert alert-success' style="display:none">Enviando los datos...</h4>
<div id="refresh_form_cita"></div>

<script>
refresh_form_cita();
 function refresh_form_cita()
{
$("#refresh_form_cita").fadeIn().html('<span class="load"> <img  width="70px" src="<?= base_url();?>assets/img/loading.gif" /></span>');

var id_p_a = "<?=$id_p_a?>";
var id_user = "<?=$id_user?>";
$.ajax({
type: "POST",
url: "<?=base_url('cita/refresh_form_cita')?>",
data: {id_p_a:id_p_a,id_user:id_user},
cache: true,
success:function(data){
$("#refresh_form_cita").html(data);
  
} 
});
}


</script>
