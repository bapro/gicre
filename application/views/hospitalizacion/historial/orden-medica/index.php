<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>


<div class="modal-header text-center"  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>

<h2 class="modal-title">ORDEN MEDICA</h2>
</div>

<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;" id='background_'>

<div class="col-md-12"  >
<?php
$this->load->view('hospitalizacion/historial/header-patient-data');
  ?>
  <hr/>
  <div id='paginationNumberOrdenMedica1'></div>
    <hr/>
	  <button class="btn btn-xs btn-primary" type='button' id="nuevo-orden-medico1">Crear Nuevo</button>
<div id="content-orden-medica1"></div>
  <div id="loadContentOrdMed1"></div>
  
</div>

</div>


<script type="text/javascript">
//--------------------------------------------------------------------------------------------------------------------
function paginationNumberOrdenMedica1(){
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/paginationNumberOrdenMedica",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>,id_hosp:<?=$id_hosp?>,centro_id:<?=$centro_id?>},
method:"POST",
success:function(data){
$('#paginationNumberOrdenMedica1').html(data);
;
},

});
}

paginationNumberOrdenMedica1();


function loadContentOrdMed1(){
	$("#loadContentOrdMed1").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>hospitalizacion/ordenMedical",
data: {user_id:<?=$user_id?>,id_historial:<?=$patient_id?>,centro_id:<?=$centro_id?>,id_hosp:<?=$id_hosp?>,id_seguro:<?=$id_seguro?>},
method:"POST",
success:function(data){
$('#loadContentOrdMed1').html(data);
}
});
}

loadContentOrdMed1();

$('#nuevo-orden-medico1').click(function(e){
loadContentOrdMed1();
paginationNumberOrdenMedica1();
$("#content-orden-medica1").hide();
});
	</script>