<section class="py-3">
        <div class="container d-flex align-items-center justify-content-center">
		 <div class="col-lg-12">
          <div class="row">
 
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
          
	   <h3 class="card-title">Reporte de estados de pacientes <br> <em>(Total <?=$rows_total?>)</em></h3>
	   <button class="btn btn-primary btn-md float-end" type="button" onclick="ExportGeneralReportToExcelEstado('xlsx')"><i class="bi bi-file-spreadsheet"></i> Exportar Reporte a Excel</button>
      <table class="table table-striped" id="tbl_report_to_xls_estado">
	 <thead>
	<tr style="background:#C9F7FF">
	<td><strong>FECHA</strong></td>
	<td><strong>PACIENTE</strong></td>
	<td><strong>EDAD</strong></td>
	<td><strong>PACIENTE ESTADO</strong></td>
  </tr>
	</thead>
	 <tbody>
	<?php
	  $list_cie10 = '';
     foreach ($query->result() as $fac) {
	$pacientes=$this->db->select('nombre, date_nacer')->where('id_p_a',$fac->id_patient)
	 ->get('patients_appointments')->row_array();

	 $paciente=$pacientes['nombre'];
	  $date_nacer=$pacientes['date_nacer'];
	$patient_age = $this->model_general->calculatePatientAge($date_nacer);
      


 $fecha= date("d-m-Y", strtotime($fac->created_time));
 

	?>
<tr>
<td><?=$fecha;?></td>
<td><?=$paciente;?></td>
<td><?=substr($patient_age['age_complete'], 0, 8)?></td>
<td><?=$fac->patient_state;?></td>

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
 