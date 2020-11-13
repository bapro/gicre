<style>
 #containerld {display:none;}
.preload { width:100px;
    height: 100px;
    position: fixed;
    top: 30%;
    left: 40%;}
 </style>
 	<script type="text/javascript">
$( window ).load(function() {
    $(".preload").fadeOut(1000, function() {
        $("#containerld").show();
   });
});

</script>
<div class="preload"><img style='' src="<?=base_url();?>assets/img/loading-gif.gif">
</div>
 <div  id="containerld">
 <div class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <br/><br/>
	   <?php

// CHECK WHEN SAVE
$worksig=$this->db->select('worked')
->where('id_ep',2)
->where('created_date',date("Y-m-d"))
->get('emergency_patients')->row('worked');

?>
<!--
<input type="hidden" id="worksig" value="<?=$worksig?>">
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" name="id_p_a" value="<?=$patient_id?>">-->
<div class="tab-content" id="all_dis" >

<br/>
<div class="tab-pane active" id="Datos_personales">
<?php
if($rows < 1){
$this->load->view('admin/emergencia/general/historial-medical-content-empty');
}else{
 $this->load->view('admin/emergencia/general/historial-medical-content-data');
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
<?php $this->load->view('admin/historial-medical1/examen-sistema/index');?>
</div>
<div class="tab-pane" id="examen-fisico" >
<?php $this->load->view('admin/emergencia/general/signo-vitales');?>
</div>
<div class="tab-pane" id="kardex" >
<?php $this->load->view('hospitalizacion/historial/kardex/index');?>
</div>

<div class="tab-pane" id="control-signos-vitales" >
<?php $this->load->view('hospitalizacion/historial/control-signos-vitales/index');?>
</div>
<div class="tab-pane" id="insumo" >
<?php $this->load->view('admin/emergencia/general/nursing/index');?>
</div>
<div class="tab-pane" id="balance-hidrico" >
<?php $this->load->view('hospitalizacion/historial/balance-hidrico/index');?>
</div>
 </div>

<!--div datos citas ends-->

 </div>
</div>
