<style>
th{font-size:14px}
</style>

<h1>REPORTE DE MEDICAMENTOS</h1>
<div class="container">
<hr/>
<div class="row">
<button class="btn btn-primary" onclick="ExportToExcel('xlsx')" style="float:right">Export Table Data To Excel File</button>
</div>
<hr/>

<div style="overflow-x:auto;">
<table class="table table-stripped"  id="tbl_exporttable_to_xls">
<thead>
<tr>
<th colspan=6 style="font-size:28px"><?=$centro_name?></th>
</tr>
<tr>
<th  style="text-align:left">FECHA</th>
<th  style="text-align:left">FICHA</th>
<th  style="text-align:left">NOMBRES </th>
<th  style="text-align:left">CEDULA</th>
<th  style="text-align:left">SEX</th>
<th  style="text-align:left">TUR</th>
<th  style="text-align:left">AREA</th>
<th  style="text-align:left">EDAD</th>
<th  style="text-align:left">SEGURO MEDICO</th>
<th  style="text-align:left">CAUSA</th>
<th  style="text-align:left">MOTIVO DE LA CONSULTA</th>
<th style='text-align:left'>TRATAMIENTO</th>
<th  style="text-align:left">ENFERMERA</th>

</tr>

</thead>
<tbody>

<?php

foreach ($query->result() as $row){
$digitado=$this->db->select('name')->where('id_user',$row->created_by)->get('users')->row('name');
$pat_info=$this->db->select('seguro_medico, cedula')->where('id_p_a',$row->id_pat)->get('patients_appointments')->row_array();
$seguroName=$this->db->select('title')->where('id_sm',$pat_info['seguro_medico'])->get('seguro_medico')->row('title');
$emp_info=$this->db->select('clock, employee_name, gender, title, gbl_shift, birth_date, id_p_a')->where('id_p_a',$row->id_pat)->get('employees')->row_array();
$med_info=$this->db->select('causa_med, sintoma, id_med')->where('id_nota',$row->id_nota_med)->get('medicamento_salud_ocupacional')->row_array();

?>
<tr>
<td  style="text-align:left"><?=$row->date_created?></td>
<td  style="text-align:left"><?=$emp_info['clock']?></td>
<td  style="text-align:left"><?=$emp_info['employee_name']?></td>
<td  style="text-align:left"><?=$pat_info['cedula']?></td>
<td  style="text-align:left"><?=$emp_info['gender']?></td>
<td  style="text-align:left"><?=$emp_info['gbl_shift']?></td>
<td  style="text-align:left"><?=$emp_info['title']?></td>
<td  style="text-align:left"><?=getPatientAge($row->birth_date)?></td>
<td  style="text-align:left"><?=$seguroName?></td>
<td  style="text-align:left"><?=$med_info['causa_med']?></td>
<td  style="text-align:left"><?=$med_info['sintoma']?></td>
<td style='text-align:left'>
<?php
$id_med=$med_info['id_med'];
$sql_trat_med =" SELECT  med FROM medicamento_salud_ocupacional
 RIGHT JOIN salud_oc_med ON medicamento_salud_ocupacional.id_med=salud_oc_med.id
WHERE id_nota=$row->id_nota_med ";
$query_trat_med = $this->db->query($sql_trat_med);
$i=1;
foreach ($query_trat_med->result() as $row_med){

	echo "$row_med->med /";
}	
?>
</td>	
<td  style="text-align:left"><?=$digitado?></td>
</tr>
<?php
}

?>
<tbody>
 </table>
 </div>
  </div>
   </div>
    </div>

<?php $this->load->view('admin/footer'); ?>
 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
 <script>
 function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('medicamentos_report.' + (type || 'xlsx')));
    }
 </script>
 
