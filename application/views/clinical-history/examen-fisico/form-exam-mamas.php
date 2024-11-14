 <?php
    if ($ex_fis_data == 0) {
		$ifExamenMamasOnce=0;
		 $is_diagram_mamas="";
        $diagram_text_mamas= 'Diagrama'; 
        $cuad_inf_ext1 = '';
        $cuad_sup_ext1 = '';
        $cuad_sup_ext2 = '';
        $mama_izq1 = '';
        $mama_izq2 = '';
        $cuad_inf_ext2 = '';
        $cuad_inf_ext22 = '';
        $region_retro1 = '';
        $region_retro2 = '';
        $region_areola_pezon1 = '';
        $region_areola_pezon2 = '';
        $region_ax1 = '';
        $region_ax2 = '';
        $cuad_inf_ext11 = '';
		  $showDrawingToolsMamas = "";
		$mamadiagram = 'assets_new/img/examen-mamas/mamas.jpg';
		$id2=0;
    } else {
		$showDrawingToolsMamas = ";display:none";
        foreach ($query_ex_fis as $rowExF)
            $cuad_inf_ext1 = $rowExF->cuad_inf_ext1;
        $cuad_sup_ext1 = $rowExF->cuad_sup_ext1;
        $cuad_sup_ext2 = $rowExF->cuad_sup_ext2;
        $mama_izq1 = $rowExF->mama_izq1;
        $mama_izq2 = $rowExF->mama_izq2;
        $cuad_inf_ext22 = $rowExF->cuad_inf_ext22;
        $cuad_inf_ext2 =  $rowExF->cuad_inf_ext2;
        $region_retro1 = $rowExF->region_retro1;
        $region_retro2 = $rowExF->region_retro2;
        $region_areola_pezon1 = $rowExF->region_areola_pezon1;
        $region_areola_pezon2 = $rowExF->region_areola_pezon2;
        $region_ax1 = $rowExF->region_ax1;
        $region_ax2 = $rowExF->region_ax2;
        $cuad_inf_ext11 = $rowExF->cuad_inf_ext11;
		$mamadiagram = 'assets_new/img/examen-mamas/'.$rowExF->mamas_img;
		$id2=$rowExF->id;
        $params2 = array('table' => 'h_c_examen_fisico', 'id' => $rowExF->id);
        echo $this->user_register_info->get_operation_info($params2);
		
        if($mamadiagram=='assets_new/img/examen-mamas/'){
		$is_diagram_mamas="disabled";
		$diagram_text_mamas= 'Este registro no tiene diagrama';
		$ifExamenMamasOnce=0;
		}else{
		$is_diagram_mamas="";	
		$diagram_text_mamas= 'Diagrama';
		$ifExamenMamasOnce=1;
		}
		
		
		

		
		
		
		
		
		
    } ?>

 <div class="col-sm-12 border-top">
     <div class="row">
	
         <div class="d-flex flex-wrap">
		   <div class="p-2 flex-fill">
                 <div class="col-sm-12">
                    <label for="<?= $id2?>_cuad_inf_ext1ex" class="form-label">Cuad. Inf. Externo</label>
                     <input type="text" value="<?= $cuad_inf_ext1 ?>" class="form-control txt-inp-ext" id="<?= $id2?>_cuad_inf_ext1ex">
                     <div id="suggestion-cualInfExt1-list"></div>

                 </div>
                 <div class="col-sm-12">
                     <strong>Mama Izquierda :</strong>
                     <label for="<?= $id2?>_mama_izq1ex" class="form-label">Cuad. Sup. Externo</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_mama_izq1ex" value="<?= $mama_izq1 ?>">
                     <div id="suggestion-cualSupExt1-list"></div>
                 </div>

                 <div class="col-sm-12">
                   <label for="<?= $id2?>_cuad_sup_ext1ex" class="form-label">Cuad. Sup. Externo</label>
                     <input type="text" value="<?= $cuad_sup_ext1 ?>" class="form-control txt-inp-ext" id="<?= $id2?>_cuad_sup_ext1ex">
                     <div id="suggestion-cualSupExt2-list"></div>
                 </div>

                 <div class="col-sm-12">
                    <label for="<?= $id2?>_cuad_inf_ext11ex" class="form-label">Cuad. Inf. Externo</label>
                     <input type="text" value="<?= $cuad_inf_ext11 ?>" class="form-control txt-inp-ext" id="<?= $id2?>_cuad_inf_ext11ex">
                     <div id="suggestion-cualInfExt2-list"></div>
                 </div>
                 <div class="col-sm-12">
                   <label for="<?= $id2?>_region_retro1ex" class="form-label">Region Retroareolar</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_retro1ex" value="<?= $region_retro1 ?>">
                     <div id="suggestion-cualInfReR1-list"></div>
                 </div>
                 <div class="col-sm-12">
                    <label for="<?= $id2?>_region_areola_pezon1ex" class="form-label">Region Areola-Pezon</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_areola_pezon1ex" value="<?= $region_areola_pezon1 ?>">
                     <div id="suggestion-regAr1-list"></div>
                 </div>
                 <div class="col-sm-12">
                    <label for="<?= $id2?>_region_ax1ex" class="form-label">Region Axilar</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_ax1ex" value="<?= $region_ax1 ?>">
                     <div id="suggestion-regAx1-list"></div>
                 </div>
             </div>

             <div class="p-2 flex-fill">

                 <div class="col-sm-12">

                     <label for="<?= $id2?>_cuad_inf_ext2" class="form-label">Cuad. Sup. Externo</label>
                     <input type="text" value="<?= $cuad_inf_ext2 ?>" class="form-control txt-inp-ext" id="<?= $id2?>_cuad_inf_ext2ex">
                 </div>



                 <div class="col-sm-12">
                     <strong> Mama Derecha :</strong>
                     <label for="<?= $id2?>_mama_izq2ex" class="form-label">Cuad. Sup. Externo</label>
                     <input type="text" value="<?= $mama_izq2 ?>" class="form-control txt-inp-ext" id="<?= $id2?>_mama_izq2ex">
                 </div>

                 <div class="col-sm-12">
                     <label for="<?= $id2?>_cuad_sup_ext2ex" class="form-label">Cuad. Inf. Externo</label>
                     <input type="text" class="form-control txt-inp-ext" value="<?= $cuad_sup_ext2 ?>" id="<?= $id2?>_cuad_sup_ext2ex">


                 </div>
                 <div class="col-sm-12">
                     <label for="<?= $id2?>_cuad_inf_ext22ex" class="form-label">Cuad. Inf. Externo</label>
                     <input type="text" class="form-control txt-inp-ext" value="<?= $cuad_inf_ext22 ?>" id="<?= $id2?>_cuad_inf_ext22ex">
                 </div>


                 <div class="col-sm-12">
                     <label for="<?= $id2?>_region_retro2ex" class="form-label">Region Retroareolar</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_retro2ex" value="<?= $region_retro2 ?>">
                     <div id="suggestion-cualInfReR2-list"></div>
                 </div>

                 <div class="col-sm-12">
                     <label for="<?= $id2?>_region_areola_pezon2ex" class="form-label">Region Areola-Pezon</label>
                     <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_areola_pezon2ex" value="<?= $region_areola_pezon2 ?>">
                     <div id="suggestion-regAr2-list"> </div>
                     <div class="col-sm-12">
                         <label for="<?= $id2?>_region_ax2ex" class="form-label">Region Axilar</label>
                         <input type="text" class="form-control txt-inp-ext" id="<?= $id2?>_region_ax2ex" value="<?= $region_ax2 ?>">
                         <div id="suggestion-regAx2-list"></div>
                     </div>
                 </div>
             </div>
			 <?php
			 if($this->session->userdata('doctorEspecialidad')=="ginecology") {?>
			 <div class="p-2 flex-fill">

			 <button class="btn btn-primary btn-sm onpenCanvasCuadAna" <?=$is_diagram_mamas?> type="button" data-bs-toggle="offcanvas"  data-bs-target="#offcanvasScrollingExmamas" aria-controls="offcanvasScrollingExmamas"><?=$diagram_text_mamas?></button>

		  </div>
			 <?php
			 }
			 ?>
         </div>
		 
		 
		 
		 
		 
		 <div class="offcanvas offcanvas-start " style="width:1200px" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrollingExmamas" aria-labelledby="offcanvasScrollingExmamasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title" id="offcanvasScrollingExmamasLabel">Diagramas</h5>
    <button type="button" class="btn saveDiagramOnCLose" data-bs-dismiss="offcanvas" ><i class="bi bi-x fs-2"></i></button>
  </div>
  <div class="offcanvas-body">	  

	 <table class="table " style="cursor:pointer;width:50%<?=$showDrawingToolsMamas?>" align="center">
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
		  <td>
            <button type="button" class="btn btn-success btn-xs"  id="saveExamMamaDiagBtn" onclick="saveExamMamaDiag()" disabled >Guardar</button>
			
          </td>
        </tr>
      </table>
	  <ul class="nav nav-tabs nav-tabs-bordered"  role="tablist">

	<li class="nav-item text-center" role="presentation">
	  <button class="nav-link active" type="button" >Cuadrante de mamas / Anatomía mama femenina</button>
	</li>
	

  </ul>

	   <div class="tab-content pt-2" id="myTabContent">
	   <div class="tab-pane fade show active" id="diag-home-cuad-mama" role="tabpanel" aria-labelledby="diag-home-cuad-mama-tab">
	     <?php $this->load->view('clinical-history/examen-fisico/drawing/index'); ?>
		 
		 <input id='finalImgSaveToDatabaseExamMama' type="hidden" />
  <canvas id="canvasimgSaveExamMama"  style="display:none"  > </canvas>
		<input id='ifExamenMamasOnce' type="hidden" value="<?=$ifExamenMamasOnce?>" />		 
  <canvas id="img_ana_ma_fem" style="background-repeat: no-repeat;"  > </canvas>
  </div>

  	<script>
				init_diagram_mama('<?= base_url(); ?><?=$mamadiagram ?>', 'img_ana_ma_fem');
				</script>
    </div>

  
	</div>
</div>

     </div>
	
	 
	 