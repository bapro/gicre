
<table class="table table-stripped"  id="tbl_exporttable_to_xls">
<thead>
<tr>
<th  style="text-align:left">FECHA</th>
<th  style="text-align:left">FICHA</th>
<th  style="text-align:left">Departamento </th>
<th  style="text-align:left">Nombre</th>
<th  style="text-align:left">Diagnóstico</th>
<th  style="text-align:left">Fecha de Salida</th>
<th  style="text-align:left">Días</th>
<th  style="text-align:left">Fecha Retorno a planta</th>
<th  style="text-align:left">Turno</th>
<th  style="text-align:left">Supervisor</th>
<th  style="text-align:left">Area</th>
<th  style="text-align:left">Sistema</th>
<th  style="text-align:left">Nombre Médico</th>
<th  style="text-align:left">Especialidad</th>
<th  style="text-align:left">Centro</th>
<th  style="text-align:left">Teléfono Especialista</th>
<th  style="text-align:left">Comentario</th>
<th  style="text-align:left">Digitado</th>
<th  style="text-align:left">telefono</th>
<th  style="text-align:left">Fecha Entrada</th>
<th  style="text-align:left">Fecha de ingreso</th>
<th  style="text-align:left">Tiempo en la empresa YY/MM</th>


</tr>

</thead>
<tbody id="filter">

<?php
$i = 1;
foreach ($query->result() as $row){
$digitado=$this->db->select('name')->where('id_user',$row->created_by)->get('users')->row('name');

$now = new DateTime();
$ref = new DateTime($row->date_sen);
$diff = $now->diff($ref);
//printf('%d days, %d hours, %d minutes', $diff->d, $diff->h, $diff->i);
?>
<tr>
<td  style="text-align:left"><?=date("Y-m-d", strtotime($row->date_created))?></td>
<td  style="text-align:left"><?=$row->clock?></td>
<td  style="text-align:left"><?=$row->depart?></td>
<td  style="text-align:left"><?=$row->employee_name?></td>
<td  style="text-align:left"><?=$row->diagnostico?></td>
<td  style="text-align:left"><?=$row->fecha_inicio?></td>

<td  style="text-align:left"><?=$row->amount_days?></td>
<td  style="text-align:left"><?=$row->fecha_retorno?></td>
<td  style="text-align:left"><?=$row->gbl_shift?> </td>
<td  style="text-align:left"><?=$row->super_name?> </td>
<td  style="text-align:left"><?=$row->dr_pr_dept?></td>
<td  style="text-align:left"><?=$row->sistema?></td>

<td  style="text-align:left"><?=$row->medico_licencia?></td>
<td  style="text-align:left"><?=$row->area?></td>
<td  style="text-align:left"><?=$row->centro_med?></td>
<td  style="text-align:left"><?=$row->phone_centro?></td>
<td  style="text-align:left"><?=$row->comentario?></td>
<td  style="text-align:left"><?=$digitado?></td>
<td  style="text-align:left"><?=$row->phone_emp?></td>
<td  style="text-align:left"><?=$row->date_created?></td>
<td  style="text-align:left"><?=$row->date_sen?></td>
<td  style="text-align:left"><?php printf('%d year, %d month', $diff->y, $diff->m);?></td>

</tr>
<?php
}

?>
</tbody>
 </table>
 
 
  <script>
 
 $(document).ready(function(){
  $("#searchByFicha").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#filter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
 
 
 function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('medical_license_report_external.' + (type || 'xlsx')));
    }
 </script>