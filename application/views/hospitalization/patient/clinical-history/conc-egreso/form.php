<?php
$actionCe=$this->session->userdata('orgine_list');
if($con_eg_data==0){
	
	$created_by=$this->session->userdata('user_id');
$updated_by=$this->session->userdata('user_id');
$inserted_time = date("Y-m-d H:i:s");
$update_time = date("Y-m-d H:i:s");	
$id_coneg=0;
$resumen_hallasgos='';
$resumen_intervenciones ='';
$condicion_alta='';
$causa_egreso='';
$destino_referimiento='';
$diagnostico_autopsia ='';
$equipo_medico ='';
$diag_alta_diag1='';
$diag_alta_diag2='';
$infeccion_herida=0;
$morta_post=0;
$morta_int=0;
$diag_alta_diag3='';
$diag_alta_diag4='';
$coneg_proced='';
}else{
  foreach ($query_coneg as $row)	
$id_coneg=$row->id;
$created_by=$row->inserted_by;
$updated_by=$this->session->userdata('user_id');
$inserted_time = $row->inserted_time;
$update_time = date("Y-m-d H:i:s");

$resumen_hallasgos=$row->resumen_hallasgos;
$resumen_intervenciones=$row->resumen_intervenciones;
$condicion_alta =$row->condicion_alta;
$causa_egreso=$row->causa_egreso;
$destino_referimiento=$row->destino_referimiento;
$diagnostico_autopsia=$row->diagnostico_autopsia;
$equipo_medico =$row->equipo_medico;
$diag_alta_diag1 =$row->diag_alta_diag1;
$diag_alta_diag2=$row->diag_alta_diag2;
$infeccion_herida=$row->infeccion_herida;
$morta_post=$row->morta_post;
$morta_int=$row->morta_int;
$diag_alta_diag3=$row->diag_alta_diag3;
$diag_alta_diag4=$row->diag_alta_diag4;
$coneg_proced=$row->coneg_proced;
$params2 = array('table' => 'hosp_conclusion_ingreso', 'id' => $row->id);
echo $this->user_register_info_hospitalization->get_operation_info($params2);

}
?>


<!--<div class="modal-body text-left" style="max-height: calc(150vh - 210px); overflow-y: auto;">-->
 <div class="row" >

<input type="hidden" id="<?= $id_coneg ?>_con_eg_created_by" value="<?=$created_by?>" />
<input type="hidden" id="<?= $id_coneg ?>_con_eg_updated_by" value="<?=$updated_by?>" />
<input type="hidden" id="<?= $id_coneg ?>_con_eg_inserted_time" value="<?=$inserted_time?>" />
<input type="hidden" id="<?= $id_coneg ?>_con_eg_update_time" value="<?=$update_time?>" />
<div class="row">
<div class="col-md-6"  >
<div class="form-floating mb-3">
<textarea class="form-control CongEgreso-txtarea" placeholder="Resumen de los hallazgos" id="<?= $id_coneg ?>_resumen_hallasgos" style="height:150px"><?= $resumen_hallasgos ?></textarea>
<label for="<?= $id_coneg ?>_resumen_hallasgos">Resumen de los hallazgos <span class="text-danger fs-5" >*</span></label>
</div>

</div>
<div class="col-md-6 "  >
<div class="form-floating mb-3">
<textarea class="form-control CongEgreso-txtarea" placeholder="Resumen de la intervenciones" id="<?= $id_coneg ?>_resumen_intervenciones" style="height:150px"><?= $resumen_intervenciones ?></textarea>
<label for="<?= $id_coneg ?>_resumen_intervenciones">Resumen de la intervenciones <span class="text-danger fs-5" >*</span></label>
</div>

</div>
<div class="col-md-6"  >
<div class="form-floating mb-3">
<textarea class="form-control CongEgreso-txtarea" placeholder="Condición De Alta" id="<?= $id_coneg ?>_condicion_alta" style="height:150px"><?= $condicion_alta ?></textarea>
<label for="<?= $id_coneg ?>_condicion_alta">Condición De Alta <span class="text-danger fs-5" >*</span></label>
</div>
</div>

<div class="col-md-6"  >
<div class="form-floating mb-3">
<textarea class="form-control CongEgreso-txtarea" placeholder="Causa De Egreso" id="<?= $id_coneg ?>_causa_egreso" style="height:150px" ><?= $causa_egreso ?></textarea>
<label for="<?= $id_coneg ?>_causa_egreso">Causa De Egreso <span class="text-danger fs-5" >*</span></label>
</div>
</div>
<div class="col-md-6"  >
<div class="form-floating mb-3">
<input class="form-control CongEgreso-txtarea destino_referimiento" placeholder="Destino/Referimiento" id="<?= $id_coneg ?>_destino_referimiento"  value="<?= $destino_referimiento ?>" />
<label for="<?= $id_coneg ?>_destino_referimiento">Destino/Referimiento <span class="text-danger fs-5" >*</span></label>
</div>
<div id="list-destref-coneg"></div>
</div>

<div class="col-md-6"  >
<div class="checkbox ">
<?php
   if ($diagnostico_autopsia ==''){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input class="form-check-input CongEgreso-checkbox" type="checkbox" name="<?= $id_coneg ?>_no_hay_respuesta" <?=$selected?> >  autopsia </label>
</div>
<div class="form-floating mb-3">
<textarea class="form-control CongEgreso-txtarea" placeholder="Diagnostico De Autopsia" id="<?= $id_coneg ?>_diagnostico_autopsia" style="height:150px"><?= $diagnostico_autopsia ?></textarea>
<label for="<?= $id_coneg ?>_diagnostico_autopsia">Diagnostico De Autopsia</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($infeccion_herida ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input CongEgreso-checkbox" type="checkbox" id="<?= $id_coneg ?>_infeccion_herida1" name="<?= $id_coneg ?>_infeccion_herida"  <?=$selected?>>
  <label class="form-check-label" for="<?= $id_coneg ?>_infeccion_herida1">Infección Herida </label>
</div>
<div class="form-check form-check-inline">
	<?php
   if ($morta_post ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input CongEgreso-checkbox" type="checkbox" id="<?= $id_coneg ?>_morta_post1" name="<?= $id_coneg ?>_morta_post" <?=$selected?>>
  <label class="form-check-label" for="<?= $id_coneg ?>_morta_post1">Mortalidad Postoperatoria (10 D)</label>
</div>
<div class="form-check form-check-inline">
	<?php
   if ($morta_int ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input CongEgreso-checkbox" type="checkbox" id="<?= $id_coneg ?>_morta_int1" name="<?= $id_coneg ?>_morta_int" <?=$selected?> >
  <label class="form-check-label" for="<?= $id_coneg ?>_morta_int1">Mortalidad Intraoperatoria (6 hr)</label>
</div>
</div>


<div class="col-md-12"  >

<div class="row">
<div class="col-md-6"  >
<div class="form-floating ">
<textarea class="form-control diag_alta_diag1" placeholder="Diagnóstico(s)" id="<?= $id_coneg ?>_diag_alta_diag1" style="height:150px"><?=$diag_alta_diag1?></textarea>
<label for="<?= $id_coneg ?>_diag_alta_diag1">Diagnóstico(s)</label>
<div id="list-diagnos-coneg"></div>
</div>

</div>
   <div class="col-md-6"  >


 <div class="form-group mb-1">
  <div class="form-floating ">

<input  class="form-control coneg_proced"  id="<?= $id_coneg ?>_coneg_proced" value="<?=$coneg_proced?>" >
<label for="<?= $id_coneg ?>_coneg_proced">Procedimiento(s) realizado(s)</label>

</div>



  </div>
 <div id="list-proced-realizados"></div>
 </div>
    </div>
    </div>

</div>
<hr/>
  <div class="text-end">
  <?php 

  
  if($this->session->userdata('user_perfil') =='Medico'){
  if (($actionCe == 0 && $con_eg_data==0) || ($con_eg_data==1)) {
	  echo '<button type="button" class="btn btn-lg btn-success" id="btnSaveConclusionEgreso"> <i class="bi bi-save2 save-success" > </i>Guardar Alta Médica</button>';
	   } 
  }
  if($con_eg_data > 0){
	echo  '<button type="button" class="btn btn-primary m-1" id="resetFormCongEgreso">Nuevo</button>';
echo'<a class="btn btn-md btn-primary m-1" href="'.base_url().'print_page_hospitalization/conclusion_egreso/'.$id_coneg.'/" target="_blank"><i class="fa fa-print"></i></a>';
  }
?>
	<span id="alert_placeholder_cong_egre" style="position:absolute; " class="p-2"></span>
  </div>

  <br/> <br/> <br/>
   </div>
  
<input type="hidden" value="<?= $id_coneg ?>" id="id_coneg" />

	
