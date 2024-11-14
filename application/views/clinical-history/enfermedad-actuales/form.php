 <?php 
 $is_diagram="";
$diagram_text= 'Diagrama'; 
 if($enfermedad_data==0){
$ifGeneralHumanBody=0;
 $enf_motivo=$this->session->userdata('causa');	
 $estudios="";	
 $signopsis="";	
 $laboratorios="";
$id_enf_act=0; 
  $human_boy_image = "assets_new/img/historia-general/human-body4.png";
 }else{
	 $ifGeneralHumanBody=2;
 foreach($show_enf as $row)
  $human_boy_image = "assets_new/img/historia-general/" . $row->human_boy_image;
 $enf_motivo=$row->enf_motivo;
 $estudios=$row->estudios;
 $signopsis=$row->signopsis;
 $laboratorios=$row->laboratorios;
 $id_enf_act=$row->id;
 $params2 = array('table' => 'h_c_enfermedad_actual', 'id'=>$id_enf_act);
echo $this->user_register_info->get_operation_info($params2);


if($human_boy_image=='assets_new/img/historia-general/'){
	$is_diagram="disabled";
	$diagram_text= 'Este registro no tiene diagrama';
}else{
$is_diagram="";	
$diagram_text= 'Diagrama';
}

 }
 
$especialidad= $this->session->userdata('doctorEspecialidad');
 if($especialidad=='historial_general'){
	 $show_diagram=""; 
  }else{
	$show_diagram="style='display:none'";  
  }

 ?>
<style>
#quill-editor-enfermedad-actual-sinopsis_<?=$id_enf_act?>:empty:before {
  content:attr(data-placeholder);
  color:gray
}
</style>
 <div class="d-flex" >
 <div class="p-2 w-100">
 <div class="form-floating mb-4">
 
           <input type="text" class="form-control" id="<?=$id_enf_act?>_enf_motivo" placeholder="Motivo de consulta" value="<?=$enf_motivo; ?>" />
           <label for="enf_motivo"><span class="fa fa-asterisk text-danger" ></span> Motivo de consulta</label>
         </div>
	   
	   
	   <div class="mb-4">
	   <span class="hide-enf-mic">
	    <button type="button" id="btnSpeechEnfSig"  title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm mb-1 hide-enf-mic" ><i class="bi bi-mic-fill"></i></button>
		<span class="fa fa-asterisk text-danger" ></span> Sinopsis
		&nbsp; <span id="actionSpeechEnfSig"></span>
		</span>
		<div  id="quill-editor-enfermedad-actual-sinopsis_<?=$id_enf_act?>" class="border  rounded-2 quill-text" style="height:300px"><?= $signopsis?></div>
		<span id='copiar-estudios-div' style='display:none'>
		<input type='checkbox' id='copiar-estudios'> Repetir en estudios
		</span>
         </div>
		 
		   <div class="mb-4">
	    <button type="button" id="btnSpeechEnfLab"  title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm mb-1 hide-enf-mic" ><i class="bi bi-mic-fill"></i></button>
		 Laboratorios (Resultados relevantes)
		&nbsp; <span id="actionSpeechEnfLab"></span>
		<div id="quill-editor-enfermedad-actual-laboratorio_<?=$id_enf_act?>" class="border  rounded-2 quill-text" style="height:300px"><?=$laboratorios; ?></div>
		
         </div>
		 
		  <div class="mb-4">
	    <button type="button" id="btnSpeechEnfEst"  title='soporte solo para el navegador Chrome'  class="btn btn-primary btn-sm mb-1 hide-enf-mic" ><i class="bi bi-mic-fill"></i></button>
		Estudios (Resultados relevantes)
		&nbsp; <span id="actionSpeechEnfEst"></span>
		<div id="quill-editor-enfermedad-actual-estudios_<?=$id_enf_act?>"  class="border  rounded-2 quill-text" style="height:300px"><?=$estudios; ?></div>
		
         </div>
		 
		 
         <!--<div class="form-floating mb-3">
           <textarea class="form-control" id="<?=$id_enf_act?>_enf_signopsis" placeholder="Sinopsis" style="height: 100px"><?=$signopsis; ?></textarea>
           <label for="enf_signopsis"><span class="fa fa-asterisk" style="color:red"></span> Sinopsis</label>
         </div>
         
         <div class="form-floating mb-3">
           <textarea class="form-control" id="<?=$id_enf_act?>_enf_laboratorios" placeholder="Laboratorios (Resultados relevantes)" style="height: 100px"><?=$laboratorios; ?></textarea>
           <label for="enf_laboratorios">Laboratorios (Resultados relevantes)</label>
         </div>
		    <div class="form-floating mb-3">
           <textarea class="form-control" id="<?=$id_enf_act?>_enf_estudios" placeholder="Estudios (Resultados relevantes)" style="height: 100px"><?=$estudios; ?></textarea>
           <label for="enf_estudios">Estudios (Resultados relevantes)</label>
         </div>
		-->
		 <input type="hidden"   value="<?=$id_enf_act?>"  id="id_enf_act" >

		 <?php  if($id_enf_act > 0){?>
				<div class="float-end">
				
				<button type="button" class="btn btn-primary" id="resetFormEnfAct">Nuevo</button>
				<button type="button" class="btn btn-success" id="saveEditEnfAct">Guardar </button>
				<span id="alert_placeholder_enfac" style="position:absolute; " class="p-2" ></span>
				
			 </div>
			 
			 <?php } ?>
		 </div>
		  <div class="p-2 flex-shrink-1" <?=$show_diagram?>>
		  
	<button class="btn btn-primary" <?=$is_diagram?> type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><?=$diagram_text?></button>


<div class="offcanvas offcanvas-start " style="width:1000px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
          <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Diagramas</h5>
            <button type="button" class="btn saveDiagramOnCloseEnf" data-bs-dismiss="offcanvas"><i class="bi bi-x fs-2"></i></button>
          </div>
          <div class="offcanvas-body">
		  <?php if($ifGeneralHumanBody==0) {?> 
  	 <table class="table " style="cursor:pointer;width:50%" align="center" >
        <tr>
          <th colspan='8'>Elegir un color para dibujar</th>
        </tr>
        <tr>
		  <td>
            <div style="width:30px;height:30px;background:black;border-radius:20px" data-color="black" onclick="getColorHb(this)"></div>
          </td>
          <td>  <div style="width:30px;height:30px;background:green;border-radius:20px" data-color="green" onclick="getColorHb(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:blue;border-radius:20px" data-color="blue" onclick="getColorHb(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:red;border-radius:20px" data-color="red" onclick="getColorHb(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:yellow;border-radius:20px" data-color="yellow" onclick="getColorHb(this)"></div>
			 </td>
			  <td>
			  
            <div style="width:30px;height:30px;background:orange;border-radius:20px" data-color="orange" onclick="getColorHb(this)"></div>
			 </td>
		 <td style="width:30px;height:30px;">
            <i class="bi bi-eraser-fill fs-3" data-color="eraser" onclick="getColorHb(this)"></i>
          </td>
         <td>
            <button type="button" class="btn btn-danger btn-xs" id="clr" size="23" onclick="eraseHb()">Limpiar</button>
          </td>
		  
        </tr>
      </table>
        <?php 
		  
		  $this->load->view('clinical-history/general/drawing/humanBody'); ?>
		   <input id='inpuImgSaveToDatabaseGeneralHumanBody' type="hidden"  />
		   <input id='ifGeneralHumanBody' type="hidden" value="<?=$ifGeneralHumanBody?>" />
		    <canvas id="canvasfinalImgSaveToDatabaseGeneralHumanBody" style="display:none"> </canvas>
                    <canvas id="<?=$id_enf_act?>_canvas_human_body"   style="background-repeat: no-repeat;" > </canvas>
					
					 <script>
			init_diagram_human_body('<?= base_url(); ?><?=$human_boy_image?>', 'canvas_human_body');
			
				</script>
				
				<?php } else{?>
				<img src="<?= base_url(); ?><?=$human_boy_image?>" style="background-repeat: no-repeat;" > 
				<?php } ?>
          </div>
        </div>

		 
			   </div>
			   
			    </div>
		      
		
<?php //$this->load->view('clinical-history/drawing-on-image/footer'); ?>


         