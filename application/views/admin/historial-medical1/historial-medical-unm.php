<style>
td + input{text-align:center}
 #containerld {display:none;}
.preload { width:100px;
    height: 100px;
    position: fixed;
    top: 30%;
    left: 40%;}
	td + input{text-align:center}
</style>
<?php 

foreach($patient as $row)
?>

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
       <br/><br/>    <div id="result"></div><div id="loadf"></div>
<form class="form-horizontal " method="post" id="save_historial_data"  > 

<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" name="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 
<?php
echo $area;
if($area=="UROLOGIA"){
$this->load->view('admin/historial-medical1/urology/antecedentes');
}else{	
if($user_id==344){
//$this->load->view('admin/historial-medical1/historial-medical-alergico-344');
$this->load->view('admin/historial-medical1/alergista/index');
}else{
if($antege  < 1){
 $this->load->view('admin/historial-medical1/historial-medical-content');
}else{
$this->load->view('admin/historial-medical1/all-data/historial-medical-content');	
}
}
}
if($area=="OFTALMOLOGIA" || $area=="DERMATOLOGO" || $area=="Cirujano Vascular Y Endovascular"|| $area=="CONSEJERIA"){
	$hideExaYSist = "style='display:none'";
}else{
	$hideExaYSist = "";
}
if($area=="CONSEJERIA"){
	$show_con_diag="style='display:none'";
}else{
$show_con_diag="";	
}
 ?>
</div>

<div class="tab-pane" id="Enfermedad_Actual" >
<?php $this->load->view('admin/historial-medical1/enfermedad-actual/index');?>
</div>
<div class="tab-pane" id="conclusion" <?=$show_con_diag?>>
<?php $this->load->view('admin/historial-medical1/conclusion/index');?>
</div>


<?php if($area=="UROLOGIA"){ ?>
<div class="tab-pane" id="examen-fisico-urologo"  >
<?php 
$this->load->view('admin/historial-medical1/urology/examen-fisico/index');
?>
</div>
<?php
} else{
?>
<div class="tab-pane" id="examen-fisico" <?=$hideExaYSist?>>
<?php $this->load->view('admin/historial-medical1/examen-fisico/index');?>
</div>
<?php
} 
?>
<div class="tab-pane" id="Del_Sistema" <?=$hideExaYSist?> >
<?php $this->load->view('admin/historial-medical1/examen-sistema/index');?>
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
<div class="tab-pane" id="patient-documentos" >
<?php $this->load->view('admin/historial-medical1/patient/folder/index');?>
</div>

<?php 
if(preg_match('/GINECOLOGIA/',$area)  && ($row->sexo == 'Femenina') ){
?>
 <div class="tab-pane" id="SSR">
<?php $this->load->view('admin/historial-medical1/ante_ssr/index');?>
 </div>
<div class="tab-pane" id="Obstetrico">
<?php $this->load->view('admin/historial-medical1/obstetrico/index');?>
</div>
<div class="tab-pane" id="control_prenatal" >
<?php $this->load->view('admin/historial-medical1/control-prenatal/index');?>
</div>
<?php
}
if(preg_match('/PEDIATR/',$area) ){
?>
<div class="tab-pane " id="Pediatrico" >
<?php $this->load->view('admin/historial-medical1/pediatrico/index');?>
</div>
<?php
}
if($area=="MEDICINA FISICA Y REHABILITACION"){
?>
<div class="tab-pane" id="Rehabilitacion" >
<?php $this->load->view('admin/historial-medical1/rehabilitation/index');?>
</div>
<?php
}
if($area=="CONSEJERIA"){?>
<div class="tab-pane" id="consejeria" >
<?php $this->load->view('admin/historial-medical1/counseling/index');?>
</div>
<?php
}
if($area=="OFTALMOLOGIA"){
?>
<div class="tab-pane" id="oftalmologia" >
<?php $this->load->view('admin/historial-medical1/oftalmologia/index');?>
</div>

<?php
}
if ($area=="DERMATOLOGO" ){
?>
<div class="tab-pane" id="Del_Dermatologico" >
<?php $this->load->view('admin/historial-medical1/dermatologico/index');?>
</div>
<?php
}
if($area=="Cirujano Vascular Y Endovascular"){?>
<div class="tab-pane" id="cirujano-vascular" >
<?php $this->load->view('admin/historial-medical1/cirujano-vascular-endovascular/index');?>
</div>
<?php
}

?>


 </div>
 
</form>
 </div>
<!--
<div class="tab-pane" id="Datos_alergista">
<?php $this->load->view('admin/historial-medical1/alergista/index');?>
 </div>-->
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




</div>
     



