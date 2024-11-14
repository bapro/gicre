<br/>
<style>
<style>
.paginationh{
	float:left;
	width:100%;
}


ul.paginationh {
    list-style: none;
	float:left;
	margin:0;
    padding: 0;
}
li.paninate-li{
	list-style: none;
	float: left;
	margin-right: 16px;
	padding:5px;
	border:solid 2px #0063DC;
	background:#DCDCDC;
	color:#0063DC;
}
li.paninate-li:hover{
	color:#FF0084;
	cursor: pointer;
}
</style>
<h4 class="h4 his_med_title">Orden medica  (<?=$enviado_name?>)</h4>
<div id="paginationNumberOrdenMedica"></div>
  <hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" type='button' id="nuevo-orden-medico">NUEVO REGISTRO</button>

  <hr class="prenatal-separator"/>
<div id="loadContentOrdMed"></div>

<div id="content-orden-medica"></div>
<script>
function loadContentOrdMed(){
	$("#loadContentOrdMed").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>emergency/ordenMedical",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>,centro_id:<?=$centro_id?>,enviado_a:"<?=$enviado_name?>",id_emergency:<?=$id_emergency?>,id_seguro:<?=$id_seguro?>},
method:"POST",
success:function(data){
$('#loadContentOrdMed').html(data);
}
});
}

loadContentOrdMed();
//--------------------------------------------------------------------------------------------------------------------
function paginationNumberOrdenMedica(){
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginationNumberOrdenMedica",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>,direction:1,id_emergency:<?=$id_emergency?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginationNumberOrdenMedica').html(data);
},

});
}

paginationNumberOrdenMedica();

$('#nuevo-orden-medico').click(function(e){
loadContentOrdMed();
$("#content-orden-medica").hide();
});
</script>