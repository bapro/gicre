<?php
if($action==1){
$col_name = "MEDICO";
}elseif($action==2){
$col_name = "ESPECIALIDAD";
}elseif($action==3){
$col_name = "TURNO";
}elseif($action==4 || $action==5){
	$col_name='ENFERMERIA';
}
//elseif($action==5){
	//$col_name='MEDICAMENTOS';
//}

if($action==5){
	$total_label="medicamentos";
}else{
	$total_label="pacientes";	
}
?>

 <div class="row">
 
<button class="btn btn-success" onclick="ExportToExcel('xlsx')" style="float:right">Exportar datos a archivo de Excel</button>

</div>
 <div class="row center-block ">
<table class="table table-stripped"  id="tbl_exporttable_to_xls" >
<thead>

<tr>
<th  >
<?=$centro_name?><br/>  
Productividad Por <?=$col_name?> <br/> de  <?=$from?> hasta <?=$to?>

</th>

</tr>


<tr>
<th  ><?=$col_name?></th>
<th  >VALOR</th>
</tr>

</thead>
<tbody>

<?php
$total1=0;
foreach ($reports_medicos as $row){
$doc=$this->db->select('name, area')->where('id_user',$row->idMed)->get('users')->row_array();
	if($action==1){
		$field_name = $doc['name'];
	}elseif($action==2){
	$field_name=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');	
	}elseif($action==3){
	$field_name=$row->gbl_shift;
	}elseif($action==4 || $action==5){
	$field_name=$row->idMed;	
	}

$total1 += $row->tot_patients;
?>
<tr>
<td  ><?=$field_name?></td>
<td  ><?=$row->tot_patients;?> </td>

</tr>
<?php
}
// display doc not working
if($action==1){
$sql_doc="SELECT id_doctor FROM doctor_agenda_test WHERE id_centro=$id_centro AND id_doctor !=348 AND id_doctor NOT IN(SELECT user_id FROM h_c_sinopsis WHERE h_c_sinopsis.filter_date >= '$from' AND h_c_sinopsis.filter_date <= '$to' AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY h_c_sinopsis.inserted_by) GROUP BY id_doctor";
$query_doc = $this->db->query($sql_doc);
$reports_doc=$query_doc->result();
foreach ($reports_doc as $row_doc){
 echo "<tr>";
$doc_not_working=$this->db->select('name')->where('id_user',$row_doc->id_doctor)->get('users')->row('name');
echo "<td>$doc_not_working</td><td>0</td>";
 echo "</tr>";
}
	}

elseif($action==4 || $action==5){
 
$sql_enf="SELECT id_doctor FROM doctor_centro_medico WHERE centro_medico=$id_centro AND id_doctor NOT IN(SELECT id_user FROM medicamento_salud_ocupacional WHERE DATE(medicamento_salud_ocupacional.inserted_time) >= '$from' AND DATE(medicamento_salud_ocupacional.inserted_time) <= '$to' AND id_centro=$id_centro GROUP BY medicamento_salud_ocupacional.id_user)";
$query_enf = $this->db->query($sql_enf);
$reports_enf=$query_enf->result();
foreach ($reports_enf as $row_enf){
 echo "<tr>";
$nurse_not_working=$this->db->select('name')->where('id_user',$row_enf->id_doctor)->get('users')->row('name');
echo "<td>$nurse_not_working</td><td>0</td>";
 echo "</tr>";
}

  }elseif($action==2){
	//$sql_area="SELECT area FROM users JOIN h_c_sinopsis ON users.id_user = h_c_sinopsis.user_id WHERE perfil='Medico' AND id_user !=348 AND id_user NOT IN(SELECT user_id FROM h_c_sinopsis WHERE h_c_sinopsis.filter_date >= '$from' AND h_c_sinopsis.filter_date <= '$to' AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY h_c_sinopsis.inserted_by) GROUP BY area";

$sql_area="SELECT area FROM doctor_agenda_test JOIN users ON users.id_user = doctor_agenda_test.id_doctor WHERE id_centro=$id_centro AND id_doctor !=348 AND id_doctor NOT IN(SELECT user_id FROM h_c_sinopsis WHERE h_c_sinopsis.filter_date >= '$from' AND h_c_sinopsis.filter_date <= '$to' AND centro_medico=$id_centro AND h_c_sinopsis.inserted_by !=348 AND signopsis !='' AND enf_motivo !='' GROUP BY h_c_sinopsis.inserted_by) GROUP BY area";
$query_area = $this->db->query($sql_area);
$reports_area=$query_area->result();
foreach ($reports_area as $row_area){
 echo "<tr>";
$doc_area=$this->db->select('title_area')->where('id_ar',$row_area->area)->get('areas')->row('title_area');	
echo "<td>$doc_area</td><td>0</td>";
 echo "</tr>";
}  
  }
 ?>


<tr>
<th>Total</th>
<th>
<?=$total1?> <?=$total_label?>
<br/><br/>
</th>
</tr>
</tbody>

 </table>

<br/><br/><br/>
</div>

 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
 <script>
 


 function ExportToExcel(type, fn, dl) {
	
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ("doctor_productivity-<?=$col_name?>." + (type || 'xlsx')));
    }
	

 </script>
 
