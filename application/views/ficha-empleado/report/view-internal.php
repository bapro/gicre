<table class="table table-stripped"  id="tbl_exporttable_to_xls2">
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

<th  style="text-align:left">Fecha Entrada</th>
<th  style="text-align:left">Fecha de ingreso</th>
<th  style="text-align:left">Tiempo en la empresa YY/MM</th>


</tr>

</thead>
<tbody id="filter2">

<?php
$i = 1;
foreach ($query2->result() as $row){
$users=$this->db->select('name, area')->where('id_user',$row->created_by)->get('users')->row_array();

$area=$this->db->select('title_area')->where('id_ar',$users['area'])->get('areas')->row('title_area');

$centro=$this->db->select('name, primer_tel')->where('id_m_c',$row->id_centro)->get('medical_centers')->row_array();

$emp_info=$this->db->select('clock, date_sen, employee_name, gender, title, gbl_shift, birth_date, depart, super_name, dr_pr_dept')->where('id_p_a',$row->id_patient)->get('employees')->row_array();

$fecha_retorno=date('Y-m-d', strtotime($row->date_created. " + $row->days_amount days")); 
$motivo=$this->db->select('enf_motivo')->where('id_enf',$row->id_enf)->get('h_c_sinopsis')->row('enf_motivo');

$now = new DateTime();
$ref = new DateTime($emp_info['date_sen']);
$diff = $now->diff($ref);



?>
<tr>
<td  style="text-align:left"><?=$row->date_created?></td>
<td  style="text-align:left"><?=$emp_info['clock']?></td>
<td  style="text-align:left"><?=$emp_info['depart']?></td>
<td  style="text-align:left"><?=$emp_info['employee_name']?></td>
<td  style="text-align:left">
<?php
$sql ="SELECT diagno_def FROM   h_c_diagno_def_link WHERE con_id_link=$row->id_cond";
$querysig = $this->db->query($sql);
if($querysig->result() !=NULL){
	echo "<strong>CIE10</strong><br/>";
foreach ($querysig->result() as $rf){
$desc= $this->db->select('description,code')->where('idd',$rf->diagno_def)->get('cied')->row_array();
$descpt=$desc['description'];
$code=$desc['code'];
echo "$code $descpt<br/>";
}

}
$otro=$this->db->select('otros_diagnos')->where('id_cdia',$row->id_cond)->get('h_c_conclusion_diagno')->row('otros_diagnos');
if($otro){
	echo "<STRONG>OTROS DIAGNOSTICOS</STRONG><br/>";
echo " $otro";
}

?>


</td>
<td  style="text-align:left"><?=$row->date_created?></td>

<td  style="text-align:left"><?=$row->days_amount;?></td>
<td  style="text-align:left">
<?php
if($row->days_amount){
echo $fecha_retorno;
}
?>

</td>
<td  style="text-align:left"><?=$emp_info['gbl_shift']?> </td>
<td  style="text-align:left"><?=$emp_info['super_name']?> </td>
<td  style="text-align:left"><?=$emp_info['dr_pr_dept']?></td>
<td  style="text-align:left"><?=$motivo?></td>

<td  style="text-align:left"><?=$users['name']?></td>
<td  style="text-align:left"><?=$area?></td>
<td  style="text-align:left"><?=$centro['name']?></td>
<td  style="text-align:left"><?=$centro['primer_tel']?></td>

<td  style="text-align:left"><?=$row->date_created?></td>
<td  style="text-align:left"><?=$emp_info['date_sen']?></td>
<td  style="text-align:left"><?php printf('%d year, %d month', $diff->y, $diff->m);?></td>

</tr>
<?php
}

?>
</tbody>
 </table>
 
