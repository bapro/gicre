<style>
td + input{text-align:center}
</style>
 <div class="col-sm-10 col-sm-offset-3 col-md-10 col-md-offset-2 main">
       <br/><br/> 
	   <?php

// CHECK WHEN SAVE
$worksig=$this->db->select('worked')
->where('id_ep',$id_emergency)
->where('created_date',date("Y-m-d"))
->get('emergency_patients')->row('worked');

?>
<input type="hidden" id="worksig" value="<?=$worksig?>">
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" name="id_p_a" value="<?=$patient_id?>">
<div class="tab-content" id="all_dis" >
<div id='result'></div>
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
<div class="tab-pane" id="Obstetrico">
<?php $this->load->view('admin/historial-medical1/obstetrico/index');?>
</div>
<div class="tab-pane " id="Pediatrico" >
<?php $this->load->view('admin/historial-medical1/pediatrico/index');?>
</div>
<div class="tab-pane" id="examen-fisico" >
<?php $this->load->view('admin/emergencia/general/signo-vitales');?>
</div>



<div class="tab-pane" id="evaluacion-interconsultas" >

<?php $this->load->view('admin/emergencia/general/eva-inter');?>
</div>

<div class="tab-pane" id="orden-medica" >
<?php $this->load->view('admin/emergencia/general/orden-medica/index');?>
</div>

<div class="tab-pane" id="procedimiento" >
<?php $this->load->view('admin/emergencia/general/procedimiento/index');?>
</div>

<div class="tab-pane" id="nursing" >
<?php $this->load->view('admin/emergencia/general/nursing/index');?>
</div>

 </div>
 
<!--div datos citas ends-->

 </div>

