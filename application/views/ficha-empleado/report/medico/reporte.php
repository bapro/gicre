

<div class="row">
<button class="btn btn-primary" onclick="ExportToExcel('xlsx')" style="float:right">Export Table Data To Excel File</button>
</div>

<table class="table table-stripped"  id="tbl_exporttable_to_xls">
<thead>

<tr>
<th  >
<?=$centro_name?><br/>  
PRODUCTIVIDAD POR AREA DE LOS MEDICOS<br/> de  <?=$from?> hasta <?=$to?>

</th>

</tr>


<tr>
<th  >AREA</th>
<th  >VALOR</th>
</tr>

</thead>
<tbody>

<?php
$total1=0;
foreach ($reports_areas as $row){
$areaDocId=$this->db->select('area')->where('id_user',$row->idMed)->get('users')->row('area');
$area_name=$this->db->select('title_area')->where('id_ar',$areaDocId)->get('areas')->row('title_area');
$total1 += $row->Paciente;
?>
<tr>
<td  ><?=$area_name?></td>
<td  ><?=$row->Paciente;?> </td>

</tr>
<?php
}

?>
<th>Total</th><th><?=$total1?> pacientes</th>
</tbody>
<tr>
<td></th><th></th>
</tr>
<thead>
<tr>
<th  >TURNO</th>
<th  >VALOR</th>
</tr>

</thead>

<tbody >

<?php
$total2=0;
foreach ($reports_shift as $row_t){
	$total2 += $row_t->tot_pat;
?>
<tr>
<td  ><?=$row_t->gbl_shift?>  </td>
<td  ><?=$row_t->tot_pat;?> </td>

</tr>
<?php
}

?>
<th>Total</th><th><?=$total2?> pacientes</th>
</tbody>
 </table>
 





<!--<table class="table table-stripped"  id="">
<thead>
<tr>
<th  >TURNO</th>
<th  >VALOR</th>
</tr>

</thead>
<tbody >

<?php
foreach ($reports_shift as $row_t){
?>
<tr>
<td  ><?=$row_t->gbl_shift?>  </td>
<td  ><?=$row_t->tot_pat;?> pacientes</td>

</tr>
<?php
}

?>
</tbody>
 </table>-->

 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
 <script>
 


 function ExportToExcel(type, fn, dl) {
	
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('doctor_productivity.' + (type || 'xlsx')));
    }
	

 </script>
 
