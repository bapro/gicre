<?php 
foreach($patient as $row)
?>
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
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<br/><br/> <br/> 
<div id="result"></div><div id="loadf"></div>
<div class="form-horizontal "    > 
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" id="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 
<?php 
if($user_id==344){
$this->load->view('admin/historial-medical1/alergista/index');
}else{
$this->load->view('admin/historial-medical1/all-data/historial-medical-content');
}

?>
</div>

 <div class="tab-pane" id="Datos_alergista">
<?php $this->load->view('admin/historial-medical1/alergista/index');?>
 </div>
 <div class="tab-pane" id="SSR">
<?php $this->load->view('admin/historial-medical1/ante_ssr/index');?>
 </div>
<div class="tab-pane" id="Obstetrico">
<?php $this->load->view('admin/historial-medical1/obstetrico/index');?>
</div>

<div class="tab-pane " id="Pediatrico" >
<?php $this->load->view('admin/historial-medical1/pediatrico/data_pedia');?>
</div><!--div datos citas ends-->

<div class="tab-pane" id="Enfermedad_Actual" >
<?php $this->load->view('admin/historial-medical1/enfermedad-actual/index');?>
</div>

<div class="tab-pane" id="Rehabilitacion" >
<?php $this->load->view('admin/historial-medical1/rehabilitation/index');?>
</div>

<div class="tab-pane" id="examen-fisico" >
<?php $this->load->view('admin/historial-medical1/examen-fisico/index');?>
</div>
<div class="tab-pane" id="examen-otorino" >
<?php $this->load->view('admin/historial-medical1/examen-fisico-otorrino/index');?>
</div>
<div class="tab-pane" id="oftalmologia" >
<?php $this->load->view('admin/historial-medical1/oftalmologia/index');?>
</div>

<div class="tab-pane" id="Del_Sistema" >
<?php $this->load->view('admin/historial-medical1/examen-sistema/index');?>
</div>
<div class="tab-pane" id="Del_Dermatologico" >
<?php $this->load->view('admin/historial-medical1/dermatologico/index');?>
</div>
<div class="tab-pane" id="conclusion" >
<?php $this->load->view('admin/historial-medical/conclusion/index');?>
</div>

<div class="tab-pane" id="control_prenatal" >
<?php $this->load->view('admin/historial-medical1/control-prenatal/index');?>
</div>

<div class="tab-pane" id="recetas" >
<?php $this->load->view('admin/historial-medical1/recetas/index');?>
</div>


<div class="tab-pane" id="estudios" >
<?php $this->load->view('admin/historial-medical1/estudios/index');?>
</div>
<div class="tab-pane" id="laboratorios" >
<?php $this->load->view('admin/historial-medical1/laboratorios/index');?>
</div>






 </div>
 
</div>

 </div>

<div class="modal fade" id="zoomimage"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<div class="modal fade" id="zoomimagead"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>

<div class="modal fade" id="medicaha"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>



<div class="modal fade" id="alergicos"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>

</div>
 </div>    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->

  </body>
  
</html>
