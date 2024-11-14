<style>
   .style-diagrama {
         margin:100px auto;
         width:750px;
         height:423px;
      }
	  
	

.drawpad * {
	box-sizing: border-box;
}
.drawpad {
	background-color: #fff;
	position: relative;
}
.drawpad.drawpad-dashed {
	border: 1px solid black;
	background-color: rgba(255, 255, 255, 0.6);
}

.drawpad > canvas {
	width: 100%;
	height: 100%;
}
.drawpad .drawpad-toolbox {
	width: 25px;
	right: -25px;
	top: 10px;
	position: absolute;
	z-index: 10;
	display: flex;
	height: calc(100% - 20px);
	flex-direction: column;
	opacity: 0.3;
	pointer-events: none;
}
.drawpad .drawpad-toolbox:hover {
	opacity: 1;
}

.drawpad .drawpad-colors {
	margin-bottom: 15px;
	pointer-events: all;
}
.drawpad .drawpad-colorbox {
	width: 25px;
	height: 25px;
	margin-bottom: 10px;
	border: 2px solid transparent;
	cursor: pointer;
}

.drawpad.drawpad-drawing .drawpad-colors {
	pointer-events: none;
}

.drawpad .drawpad-colorbox:last-child {
	margin-bottom: 0;
}

.drawpad .drawpad-colorbox:hover {
	filter: brightness(1.3);
}
.drawpad .drawpad-colorbox:active {
	filter: brightness(0.8);
}
.drawpad .drawpad-eraser {
	background-color: #fff;
	border-style: dashed;
	border-color: gray;
}
.drawpad .drawpad-colorbox.drawpad-colorbox-active {
	border-color: #000;
}

</style>
<div class="col-md-12"   >
	<h4 class="h4 his_med_title">Cirujano Vascular (<em> regitros (s)</em>)</h4>
<div class="col-md-9"   >

<?php
$i=1;
$sql = "SELECT * from h_c_cirujano_vascular where id_historial=$id_historial";
$cirujano_vascular= $this->db->query($sql);

 if ($cirujano_vascular !=NULL)
{
?>
<div id="paginationh" >

<ul class="paginationh" >

<?php
$i=1;
  foreach($cirujano_vascular->result() as $row)

{
$user_c28=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c29=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
$centro=$this->db->select('name')->where('id_m_c',$row->centro_medico)->get('medical_centers')->row('name');
?>
<li class="paninate-li" >
<a title="
<h4 style='color:green'><?=$centro?></h4>
<strong>Creado por</strong> <?=$user_c28?>,<br/>
<strong>Cambiado por</strong> <?=$user_c29?>, <?=$updated_time?>" 

rel="tooltip" data-trigger="hover"  data-placement="bottom" data-html="true" data-toggle="modal" data-target="#get_cirujano_vas" href="<?php echo base_url("SaveHistorial/show_cirujano_vascular/$row->id/$user_id/$row->centro_medico")?>">
<?= $inserted_time;?>
</a>
</li>
<?php
}

?>
</ul>
</div>
<?php
}


else{
	echo "<i><b>No hay registros</b></i>";
}
?>

</div>	
</div>
<div class="col-md-12"   >
<hr class="prenatal-separator"/>
	<legend >SIGNOS Y SINTOMAS</legend>

<div class="col-md-4"   >

<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_dol" >DOLOR</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_edema" >EDEMA</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_pesadez" >PESADEZ</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_cansancio" >CANSANCIO</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_quemazo" >QUEMAZO</label>
</div>
</div>
<div class="col-md-4"  >
<br/>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_calambred" >CALAMBRES</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_purito" >PRURITO</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_hiper" >HIPERCROMIA</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_ulceras" >ULCERAS</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_pares" >PARESTESIAS</label>
</div>
</div>
<div class="col-md-4"  >
<br/>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_claud" >CLAUDICACION</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="cir_vas_necrosis" >NECROSIS</label>
</div>

  <div class="form-group">
       <div class="col-sm-12">
	   <br/>
    <label >OTROS </label>

      <input type="text" class="form-control" id="cir_vas_otros" >
	   </div>

  </div>
</div>
	</div>

<div class="col-md-12">
<hr/>
  <legend>ANTECEDENTES PERSONALES</legend>
    <div class="form-group">
    <label  class="col-form-label">HISTORIA <font style='color:red;font-size:26px'>*</font></label>
  <textarea  id="cir_vas_historial" rows='5'  class="form-control"></textarea>
   
  </div>
     <div class="form-group">
    <label  class="col-form-label">Cirugías</label>
    <textarea  id="cir_vas_cirugias" rows='5'  class="form-control"></textarea>
  </div>
  
     <div class="form-group">
    <label  class="col-form-label">Alergías</label>
   <textarea  id="cir_vas_alergias" rows='5'  class="form-control"></textarea>

  </div>
  
    <div class="form-group">
    <label  class="col-form-label">Enfermedades Sistémicas</label>
      <textarea  id="cir_vas_enf_sis" rows='5'  class="form-control"></textarea>
  </div>
  
    <div class="form-group">
    <label  class="col-form-label">Hábitos</label>
  <textarea  id="cir_vas_habitos" rows='5'  class="form-control"></textarea>
  </div>
 

   <div class="form-group">
    <legend>EXAMEN FISICO DIRIGIDO</legend>
   

 <textarea  id="cir_vas_exam_fis_dir" rows='5'  class="form-control"></textarea>
   

  </div>
  


</div>

<div class="col-md-12">

<div style="overflow-x:auto;">
<table >
<tr>
<td>
<div id="diagrama_v_c" class='style-diagrama'></div>
<button type='button' id='resetme' style='position:absolute;margin-top:-83px;margin-left:20px'>Limpiar</button>
</td>
</tr>

</table>
</div>

<input id='diagrama_cirugia_vascular' type='hidden' >
<!--<div id='saveImage'>

</div>-->
</div>

<div class="modal fade" id="get_cirujano_vas"  role="dialog" >
<div class="modal-dialog  modal-inc-width3" >
<div class="modal-content" >
</div>
</div>
</div>
<!--<script src="<?=base_url();?>assets/js/jsignature_v2.js"></script>-->
<script src="<?=base_url();?>assets/js/jquery-drawpad.js"></script>

