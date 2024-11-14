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
<div class='result'></div>
<h2 class="modal-title">NOTAS</h2>
</div>

<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;" id='background_'>

<div class="col-md-12"  >

<?php

$this->load->view('hospitalizacion/historial/header-patient-data');
?>

<div id='paginateSignosVitalesN'></div>
<div class="col-md-12" >
<div id='reload-table-signo'></div>
</div>


<div class="hide-signo-vitales-n">


<?php
 
 $this->load->view('hospitalizacion/historial/hosp-notas/form');
  ?>
 </div>
 <div id="content-signo-vitales-n"> </div>
</div>

</div>

 <script src="<?=base_url();?>assets/js/hospitalizacion/signo-vitales-and-notas.js?rnd=163"></script> 
