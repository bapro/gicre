<style>
 #containerld {display:none;}
.preload { width:100px;
    height: 100px;
    position: fixed;
    top: 30%;
    left: 40%;}
	
	.successfull_saving { width:100px;
    height: 100px;
    position: fixed;
    top: 50%;
    left: 50%;
	z-index:9000000}
	
	
	
 </style>
 	<script type="text/javascript">
$( window ).load(function() {
    $(".preload").fadeOut(1000, function() {
        $("#containerld").show();
   });
});

</script>
<div class="successfull_saving">

</div>
<div class="preload">
<img style='' src="<?=base_url();?>assets/img/loading-gif.gif">
</div>
 <div  id="containerld">
 <div class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <br/>
	   <?php

// CHECK WHEN SAVE
$worksig=$this->db->select('worked')
->where('id_ep',2)
->where('created_date',date("Y-m-d"))
->get('emergency_patients')->row('worked');

?>
<form class="form-horizontal " method="post" id="save_hospitalizacion_data"  >
<!--
<input type="hidden" id="worksig" value="<?=$worksig?>">
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" name="id_p_a" value="<?=$patient_id?>">-->
<div class="tab-content" id="all_dis" >
<!--<span class="alert alert-danger required-menu" style="margin-top:-4%;position:fixed;z-index:90000;display:none;opacity:0.9">! Tiene campos requeridos en menú <strong id="menu-name-req"></strong> !</span>
-->
<span style="margin-top:-1%;position:fixed;z-index:90000;opacity:0.9" class="required-menu"></span>
<br/> 
<div class="tab-pane active" id="Datos_personales">
<?php
if($rows < 1){
$this->load->view('emergencia/general/historial-medical-content-empty');
}else{
 $this->load->view('emergencia/general/historial-medical-content-data');
 $this->load->view('admin/historial-medical1/all-data/footer-ant-general');
}
?>
</div>

 <div class="tab-pane" id="SSR">
<?php $this->load->view('admin/historial-medical1/ante_ssr/index');?>
 </div>

  <div class="tab-pane" id="examen-neurologico">
<?php $this->load->view('hospitalizacion/historial/exam-neuro/index');?>
 </div>
<div class="tab-pane" id="Obstetrico">
<?php $this->load->view('admin/historial-medical1/obstetrico/index');?>
</div>
<div class="tab-pane" id="Del_Sistema" >
<?php $this->load->view('admin/historial-medical1/examen-sistema/index-unm');?>
</div>
<div class="tab-pane" id="examen-fisico" >
<?php
//$this->load->view('hospitalizacion/historial/hosp-notas/form');
 $this->load->view('emergencia/general/signo-vitales');
 ?>
</div>
<div class="tab-pane" id="kardex" >
<?php $this->load->view('hospitalizacion/historial/kardex/index');?>
</div>

<div class="tab-pane" id="control-signos-vitales" >
<?php $this->load->view('hospitalizacion/historial/control-signos-vitales/index');?>
</div>
<div class="tab-pane" id="insumo" >
<?php $this->load->view('emergencia/general/nursing/index');?>
</div>
<div class="tab-pane" id="balance-hidrico" >
<?php $this->load->view('hospitalizacion/historial/balance-hidrico/index');?>
</div>
<div class="tab-pane" id="conclucion-egreso" >
<?php $this->load->view('hospitalizacion/historial/conclucion-egreso/index');?>
</div>
<div class="tab-pane" id="eva-con" >
<?php $this->load->view('hospitalizacion/historial/evaluacion-condicion/index');?>
</div>
 </div>
</form>
<!--div datos citas ends-->

 </div>
</div>
