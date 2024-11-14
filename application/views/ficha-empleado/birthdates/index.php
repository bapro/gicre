

<div class="container">
<input class="id_user" type="hidden" value="<?=$user_name?>"/>
<div id="employee-result"></div>
<h1><?=$centro_name?></h1>
<h3><?=$title?></h3>
<hr/>
<div style="overflow-x:auto;">
<table class="table table-stripped"  id="example">
<thead>
<tr>
<th  style="text-align:left">Cita</th>
<th  style="text-align:left">FICHA</th>
<th  style="text-align:left">Nombre</th>
<th  style="text-align:left">Soc. Number</th>
<th  style="text-align:left">F. Nacimiento</th>
<th  style="text-align:left">Date Seniority</th>
<th  style="text-align:left">Status</th>
<th  style="text-align:left">Title</th>
<th  style="text-align:left">Department</th>
<th  style="text-align:left">GBL Shift ID</th>
<th  style="text-align:left">Supervisor Clock</th>
<th  style="text-align:left">Supervisor Name</th>
<th  style="text-align:left">National Id</th>
</tr>

</thead>
<tbody>

<?php
//if($query->result() !=NULL){
$i = 1;
foreach ($query_birthdates->result() as $row){


$dateTimestamp1 = date("d");
$dateTimestamp2 =date("d", strtotime($row->birth_date));


if($dateTimestamp1 > $dateTimestamp2){
	$bgcolor="background:#FFD400";
	$title = 'Pendiente para evaluación anual';
}else{
	$bgcolor="";
	$title = 0;
}
?>
<tr style="<?=$bgcolor?>" title="<?=$title?>">
<td  style="text-align:left" title='Crear Cita'><a onClick="selectThisClock1('<?php echo $row->id_employee; ?>');"><i class="fa fa-calendar" aria-hidden="true"></i> </a></td>
<td  style="text-align:left"><?=$row->clock?></td>
<td  style="text-align:left"><?=$row->employee_name?></td>
<td  style="text-align:left"><?=$row->social_num?></td>
<td  style="text-align:left;background:#C1ECFA"><?=$row->birth_date?></td>
<td  style="text-align:left"><?=$row->date_sen?></td>
<td  style="text-align:left"><?=$row->status?></td>
<td  style="text-align:left"><?=$row->title?></td>
<td  style="text-align:left"><?=$row->dr_pr_dept?></td>
<td  style="text-align:left"><?=$row->gbl_shift?> </td>
<td  style="text-align:left"><?=$row->super_clock?> </td>
<td  style="text-align:left"><?=$row->super_name?> </td>
<td  style="text-align:left"><?=$row->national_id?></td>
</tr>
<?php
}
//}
//else{
	//echo "<tr><td colspan='6' style='text-align:center'>No hay datos...</td></tr>";
//}
?>
<tbody>
 </table>
 </div>
  </div>
   </div>
    </div>

<?php $this->load->view('admin/footer'); ?>

 
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script>