<?php 
 if($ant_ex_uro_data==0){
 $is_diagram_uro_disabled="";
 $diagram_text_uro= 'Diagrama'; 
 $uro_pene="";	
 $uro_testicule="";	
 $uro_epididimos="";	
  $uro_tato_rec_pros="";	
 $uro_geni_mujer="";	
 $uro_vejiga="";	
 $uro_loins="";
$id_uroex=0;
$uro_otros=""; 
$uro_tacto_rectal_done=0;
$image_uro = 'assets_new/img/urology/uro-img.jpg';
$isUroDiagram=0;
	 $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');

 }else{
 foreach($query_ex_uro as $row)
   $in_by = $row->inserted_by;
			$up_by = $this->session->userdata('user_id');
			$in_time = $row->inserted_time;
			$up_time = date("Y-m-d H:i:s");
 
$isUroDiagram=2;
 $image_uro = 'assets_new/img/urology/'.$row->image;
 $uro_pene=$row->uro_pene;
 $uro_testicule=$row->uro_testicule;
 $uro_epididimos=$row->uro_epididimos;
  $uro_tato_rec_pros=$row->uro_tato_rec_pros;
   $uro_geni_mujer=$row->uro_geni_mujer;
    $uro_vejiga=$row->uro_vejiga;
	 $uro_loins=$row->uro_loins;
	 $uro_tacto_rectal_done=$row->uro_tacto_rectal_done;
	 $uro_otros=$row->uro_otros;
 $id_uroex=$row->id;
 $params2 = array('table' => 'h_c_urology', 'id'=>$id_uroex);
echo $this->user_register_info->get_operation_info($params2);

if($image_uro=='assets_new/img/urology/'){
			$is_diagram_uro_disabled="disabled";
	       $diagram_text_uro= 'Este registro no tiene diagrama';
			
			}else{
			$is_diagram_uro_disabled="";	
            $diagram_text_uro= 'Diagrama';
			}

 }


 ?>
 <div class="row" id="exam-fisico-uro-form">
<div id="bbb---gg"></div>
 <div class="col">

  <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_pene" placeholder="Pene" style="height: 100px"><?=$uro_pene?></textarea>
       <label for="<?=$id_uroex?>_">Pene</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_testicule" placeholder="Testículos" style="height: 100px"><?=$uro_testicule?></textarea>
       <label for="<?=$id_uroex?>_">Testículos</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_epididimos"placeholder="Epidídimos"  style="height: 100px"><?=$uro_epididimos?></textarea>
       <label for="<?=$id_uroex?>_">Epidídimos</label>
       </div>
	   	<div class="form-check form-check-inline">
		<?php if($uro_tacto_rectal_done==0){$checked="";}else{$checked="checked";} ?>
	<input class="form-check-input" type="checkbox" name="<?=$id_uroex?>_tacto_rect_check" id="<?=$id_uroex?>_tactoReaChk" <?=$checked?>>
	<label class="form-check-label" for="<?=$id_uroex?>_tactoReaChk">Tacto Realizado</label>
	</div>

	    <div class="form-floating mb-3">
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_tato_rec_pros" placeholder="Tacto Rectal y Prostático" style="height: 100px"><?=$uro_tato_rec_pros?></textarea>
       <label for="<?=$id_uroex?>_">Tacto Rectal y Prostático </label>
       </div>
</div>

  <div class="col">
  
  <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_geni_mujer" placeholder="Genitourinario Mujer" style="height: 100px"><?=$uro_geni_mujer?></textarea>
       <label for="<?=$id_uroex?>_">Genitourinario Mujer</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_vejiga" placeholder="Vejiga" style="height: 100px"><?=$uro_vejiga?></textarea>
       <label for="<?=$id_uroex?>_">Vejiga</label>
       </div>
	    <div class="form-floating mb-3">
       
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_loins" placeholder="Riñones" style="height: 100px"><?=$uro_loins?></textarea>
       <label for="<?=$id_uroex?>_">Riñones</label>
       </div>
	   <br/>
	   <div class="form-floating mb-3">
       <textarea class="form-control txtexfuro" id="<?=$id_uroex?>_uro_otros" placeholder="Otros" style="height: 100px"><?=$uro_otros?></textarea>
       <label for="<?=$id_uroex?>_">Otros</label>
       </div>
	    <?php if($id_uroex > 0){?>
				<div class="float-end">
				
				<button type="button" class="btn btn-primary" id="resetFormExamUro">Nuevo</button>
				<button type="button" class="btn btn-success" id="saveEditExamUro">Guardar </button>
				<span id="alert_placeholder_exam_uro" style="position:absolute; " class="p-2" ></span>
				
			 </div>
			 
			 <?php } ?>
</div>
 <div class="col-1">
	
          
  <button class="btn btn-primary btn-sm" <?=$is_diagram_uro_disabled?> type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrollingUro" aria-controls="offcanvasScrolling"><?=$diagram_text_uro?></button>

  <div class="offcanvas offcanvas-start " style="width:1200px" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingUro" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Diagramas</h5>
    <button type="button" class="btn" data-bs-dismiss="offcanvas" ><i class="bi bi-x fs-2"></i></button>
  </div>
  <div class="offcanvas-body">
  <?php if($isUroDiagram==0) {?>
    <table class="table " style="cursor:pointer;width:50%" align="center">
        <tr>
          <th colspan='8'>Elegir un color para dibujar</th>
        </tr>
        <tr>
		  <td>
            <div style="width:30px;height:30px;background:black;border-radius:20px" data-color="black" onclick="getColor(this)"></div>
          </td>
          <td>  <div style="width:30px;height:30px;background:green;border-radius:20px" data-color="green" onclick="getColor(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:blue;border-radius:20px" data-color="blue" onclick="getColor(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:red;border-radius:20px" data-color="red" onclick="getColor(this)"></div>
			 </td>
			  <td>
            <div style="width:30px;height:30px;background:yellow;border-radius:20px" data-color="yellow" onclick="getColor(this)"></div>
			 </td>
			  <td>
			  
            <div style="width:30px;height:30px;background:orange;border-radius:20px" data-color="orange" onclick="getColor(this)"></div>
			 </td>
		 <td style="width:30px;height:30px;">
            <i class="bi bi-eraser-fill fs-3" data-color="eraser" onclick="getColor(this)"></i>
          </td>
         <td>
            <button type="button" class="btn btn-danger btn-xs" id="clr" size="23" onclick="erase()">Limpiar</button>
          </td>
        </tr>
      </table>
	  <?php }

	$dataurouex= array(
'uroex_up_time'=>$up_time,
'uroex_in_time' =>$in_time,
'uroex_in_by'=>$in_by,
'uroex_up_by' => $up_by
);

$this->session->set_userdata($dataurouex);

	  ?>
	<input id='inputImgSaveToDatabaseUro' type="hidden" />
	<input id='isUroDiagram' type="hidden" value="<?=$isUroDiagram?>"/>
	 <?php $this->load->view('clinical-history/urology/drawing/index'); ?>
	  <canvas id="canvasfinalImgSaveToDatabaseUro" style="display:none" > </canvas>
	
	<canvas id="canvas_image_uro"   style="background-repeat: no-repeat;" > </canvas>
     <input id="init_diagram_name" type="hidden" />
				<script>
				init_diagram_uro('<?= base_url(); ?><?=$image_uro?>', 'canvas_image_uro');
				</script>

	</div>
</div>
  </div>
 <input value="<?=$id_uroex?>" type="hidden" id="id_uroex" />
		 <input type="hidden"   value="<?=$id_uroex?>"  id="id_exam_uro" >
		  <input type="hidden"   value="<?=$id_uroex?>"  id="exfisuro-form-inputs" >   
</div>

