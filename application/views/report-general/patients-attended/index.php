<section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-12">
          <div class="row">
 
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
	   <h3 class="card-title"><?=$centro?> <?=$medico?>Reporte de paciente atendidos<br> Desde <?=$desde?> Hasta <?=$hasta?> <br> <em>(Total <?=$rows_total?>)</em></h3>
	   <button class="btn btn-primary btn-md float-end" type="button" onclick="ExportGeneralReportToExcel('xlsx')"><i class="bi bi-file-spreadsheet"></i> Exportar Reporte a Excel</button>
      <table class="table table-striped" id="tbl_report_to_xls">
	 <thead>
	<tr style="background:#C9F7FF">
	<td><strong>FECHA DE ATENCION</strong></td>
	<td><strong>PACIENTE</strong></td>
	<td><strong>EDAD</strong></td>
	<td><strong>ESPECIALIDAD</strong></td>
	<td><strong>MOTIVO</strong></td>
	<td><strong>CONCLUSION DIAGNOSTICO</strong></td>
  </tr>
	</thead>
	 <tbody>
	<?php
	  $list_cie10 = '';
     foreach ($query->result() as $fac) {
	$pacientes=$this->db->select('nombre, date_nacer')->where('id_p_a',$fac->historial_id)
	 ->get('patients_appointments')->row_array();
	 if($pacientes){
	 $paciente=$pacientes['nombre'];
	  $date_nacer=$pacientes['date_nacer'];
	$patient_age = $this->model_general->calculatePatientAge($date_nacer);
      
	$area_id=$this->db->select('area')->where('id_user',$fac->inserted_by)
	 ->get('users')->row('area');
	$area=$this->db->select('title_area')->where('id_ar',$area_id)
	 ->get('areas')->row('title_area');
 $fecha= date("d-m-Y", strtotime($fac->inserted_time));
 
$conclusion=$this->clinical_history->select('id, otros_diagnos')
->where('historial_id',$fac->historial_id)
//->where('centro_medico',$centro)
->where('inserted_by',$fac->inserted_by)
 ->get('h_c_conclusion_diagno')->row_array('id');
 
 if (empty($conclusion)) {
   $list_cie10='';
$otros_diagnos="";
} else {
	
	
    $id_conclusion=$conclusion['id'];
	if($conclusion['otros_diagnos'] !=""){
$otros_diagnos="<strong>OTROS DIAGNOSTICOS</strong> ".$conclusion['otros_diagnos'];
	}else{
	$otros_diagnos="";	
	}
 $queryCd = $this->clinical_history->query("SELECT diagno_def FROM h_c_diagno_def_link WHERE con_id_link=$id_conclusion");
			$resultCd = $queryCd->result();


}

	?>
<tr>
<td class="id_fac"><?=$fecha;?></td>
<td><?=$paciente;?></td>
<td><?=substr($patient_age['age_complete'], 0, 8)?></td>
<td><?=$area;?></td>
<td><?=$fac->enf_motivo;?></td>
<!--<td><?php echo "$list_cie10";?> <?php echo $otros_diagnos?></td>-->
<td>
<?php
foreach($resultCd as $rowcie10) {
	$descriptionCie10=$this->clinical_history->select('description, code')->where('idd',$rowcie10->diagno_def)->get('cied')->row_array();
	 echo $descriptionCie10['code']."- ". $descriptionCie10['description'].  "<br><br>";	
	
}
 echo $otros_diagnos;
?>

</td>
</tr>  

	<?php
	}
}
	?>
	 </tbody>
	</table>
      </div>
    </div>
  </div>
</div>
        </div>
		</div>

    </section>
 