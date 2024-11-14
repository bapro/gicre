<style>
.form-control:focus::placeholder{color:gray !important;}
</style>

<div id="load-reporteGeneral"></div>
<?php
if($lastIdGr){
$attach_current_hist_btn = '<button type="button" class="btn btn-primary btn-sm m-1"  title="Anexar la historia actual del paciente" id="attach-current-history"><i class="bi bi-paperclip"></i> Historial Actual </button>';
}else{
$attach_current_hist_btn='';	
}
if ($general_repo_data == 0) {
  $reporte_name = "";
  $days_amount = "";
  $detail = "";
  $this_patient_id = "";
  $show = "none";
  $id = 0;
  $print = '';
$display_achb="style='display:none'";
  $attach_current_hist_btn = '';
  
  $up_time = date("Y-m-d H:i:s");
$in_time = date("Y-m-d H:i:s");

$up_by = $this->session->userdata('user_id');
$in_by = $this->session->userdata('user_id');
 	$fecha_edit=""; 
	 echo "<input type='hidden' class='form-control clear-cs' id='change_date_report_general'  value='$in_time'>";
} else {
	$display_achb="";
  foreach ($query->result() as $row)
  $inserted_time_change = date("d-m-Y H:i:s", strtotime($row->inserted_time));
  	$fecha_edit="
	<div class='col-lg-4'>
	<div class='form-floating mb-2'>
        <input type='text' class='form-control clear-cs change_date_report_general' id='change_date_report_general' placeholder='00-00-0000' value='$inserted_time_change'>
        <label for='change_date_report_general'><span class='text-danger'>*</span> Cambiar la Fecha (dd-mm-yyyy)</label>
       </div>
	    </div>";
  $in_by = $row->inserted_by;
$up_by = $this->session->userdata('user_id');
$in_time = $row->inserted_time;
$up_time = date("Y-m-d H:i:s");

    $reporte_name = $row->reporte;
  $days_amount = preg_replace('/[^0-9]/', '', $row->days_amount);  
  $detail = $row->detalle;
  $centro = $row->id_centro;
  $this_patient_id = $row->id_patient;
  if ($reporte_name == "LICENCIA MEDICA") {
    $show = "";
  } else {
    $show = "none";
  }

  if ($row->id_enf == 0 && $row->id_cond == 0) {
    $attach_current_hist_btn = $attach_current_hist_btn;
  } else {
    $attach_current_hist_btn = '<em class="text-danger" >Historia Actual esta anexada.</em>';
  }

  $id = $row->id;

  $params2 = array('table' => 'hc_cirugia_reporte', 'id' => $id);
  echo $this->user_register_info->get_operation_info($params2);
  $print = '
       <div class="btn-group dropend" id="hideBtnPgR">
  
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="bi bi-printer"></i> <span class="visually-hidden">Toggle Dropdown</span>
  </button>
	 <ul class="dropdown-menu"  >
   <li>
      <a class="dropdown-item">FORMATO VERTICAL</a> 
    </li>
       <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this_patient_id.'/'.$id.'/1/vert/'.$centro.'" target="_blank">con la foto</a>
      </li>
      <li class="data-li">
      <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this_patient_id.'/'.$id.'/0/vert/'.$centro.'" target="_blank">sin la foto</a>
       </li>
       <li>
       <a class="dropdown-item">FORMATO HORIZONTAL</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this_patient_id.'/'.$id.'/1/horiz/'.$centro.'" target="_blank">con la foto</a>
       </li>
       <li class="data-li">
       <a class="dropdown-item"  href="'.base_url().'print_page/general_report/'.$this_patient_id.'/'.$id.'/0/horiz/'.$centro.'" target="_blank">sin la foto</a>
       </li>
  </ul>
  </div>
';

[$get_centro_info_by_id, $centro_adress]= $this->get_table_data_by_id->getCentroInfo($centro);
			$result_centro_medicos='<option value="' . $centro.'" >' . $get_centro_info_by_id['name'] . '</option>';
}
?>

<form>
<span id="hide-form-gr">
  <div class="mb-3">
  <div class="col-lg-8">
  
  
  
  <div class="form-floating">
  <select class="form-select" id="id_centro_genera_rp" >

 <?php 
				echo $result_centro_medicos;
				?>
  </select>
  <label for="id_centro_genera_rp">Seleccionar Centro médico</label>
</div>
  
 
</div>
<br>
  <?=$fecha_edit?>
   

 <table>
 <tr>
   <td style="width:100%">
     <div id="loadReporteName"></div>
	 </td>
<td>
 <span class="input-group-text" <?=$display_achb?>><?= $attach_current_hist_btn ?> </span>
 </td>
 </tr>
</table>

 <br>
 

    <div class="input-group" id="show-days-amount-rest" style="width:320px;display:<?= $show ?>">

      <span class="input-group-text">Se recomienda:</span>
       <input type="text" class="form-control clear-rp-gn" id="days_amount_rest"  value="<?= $days_amount ?>">
       

<span class="input-group-text">días de reposo</span>
    </div>

    <div id="current-history-content"></div>
  </div>
  <div class="mb-3">

    <span>Detalle</span>
      
   <div  id="quill-editor-default-text-gr-<?=$id?>" class="border  rounded-2 quill-text " style="height:600px"><?= $detail ?></div>
	<div  id="toolbar-container"></div>

  </div>
</span>
  <div id="alert_placeholder_rep_gnl" class="float-start"></div>

  <div class="float-end">
    <div class="input-group">
	<?php 
if($this->session->userdata('user_perfil') =="Medico"){
?>
      <button type="button" class="btn btn-success btn-sm m-1" id="saveEditRepGen">Guardar </button>
	  <div id="show-print-rep-gn"> </div>
      <input type="hidden" value="<?= $id ?>" id="id_report_general">
        <input value="<?= $general_repo_data ?>" type="hidden" id="general_repo_data" />
      <input value="0" type="hidden" id="last_enf_id" />
      <input value="0" type="hidden" id="last_cond_id" />
      <?php if ($general_repo_data == 1) { ?>
	   <button type="button" class="btn btn-warning btn-sm m-1" id="repeatRepGen">Repetir </button>
  <button type="button" class="btn btn-primary btn-sm m-1" id="resetFormRepGen">Nuevo</button>
   <button type="button" class="btn btn-danger btn-sm m-1" id="deleteThisRepGen"><i class="bi bi-trash3"></i></button>
        <!--<button type="button" class="btn btn-danger btn-sm m-1" id="removeFormRepGen">Quitar</button>-->
    <?php  } 	  
}
    echo $print;
?>
    </div>
  </div>

</form>

<?php 
$datarg = array(
'repor_g_up_time'=>$up_time,
'repor_g_in_time' =>$in_time,
'repor_g_in_by'=>$in_by,
'repor_g_up_by' => $up_by
);

$this->session->set_userdata($datarg);

 ?>

