

<div class="row">
<button class="btn btn-primary" onclick="ExportToExcel('xlsx')" style="float:right">Export Table Data To Excel File</button>
</div>
 <div class="row center-block ">
<table class="table table-stripped"  id="tbl_exporttable_to_xls" style="width:70%">
<thead>

<tr>
<th  >
<?=$centro_name?><br/>  
Productividad Por Turno <br/> de  <?=$from?> hasta <?=$to?>

</th>

</tr>


<tr>
<th  >TURNO</th>
<th  >VALOR</th>
</tr>

</thead>
<tbody>

<?php
$total1=0;
foreach ($reports_medicos as $row){

$total1 += $row->tot_patients;
?>
<tr>
<td  ><?=$row->gbl_shift?></td>
<td  ><?=$row->tot_patients;?> </td>

</tr>
<?php
}

?>
<th>Total</th><th><?=$total1?> pacientes</th>
</tbody>

 </table>
 
</div>

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
 
