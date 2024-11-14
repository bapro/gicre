<div class="container">
<table id="example" class="table table-striped" style="margin:auto" >
<thead>
<tr style="background:#5957F7;color:white">
<th>NUM-FAC</th>
<th>NUM-AUTO</th>
<th>NEC-PACIENTE</th>
<th>Centro Medico</th>
<th>Medico</th>
<th>Seguro</th>
<th>Num. Seguro</th>
<th>Fecha</th>
<th>Editar</th>
</tr>
</thead>
<tbody id='tbody'>
<?php


 foreach($query2->result() as $row)
{
 $centro=$this->db->select('name')->where('id_m_c',$row->centro_medico )
->get('medical_centers')->row('name');

$doc=$this->db->select('name')->where('id_user',$row->medico)
   ->get('users')->row('name');
   
   
 	$seguroT=$this->db->select('title')->where('id_sm',$row->seguro_medico)->get('seguro_medico')->row('title');
 	$numSeg=$this->db->select('input_name')->where('patient_id',$row->paciente)->get('saveinput')->row('input_name');
//$time_inst=date("d-m-Y", strtotime($created_time));
 
 $created_time=date("d-m-Y", strtotime($row->filter_date));
 
?>
<tr>
<td><?=$row->numfac?></td>
<td><?=$row->numauto?></td>
<td><?=$row->paciente?></td>
<td><?=$centro;?></td>
<td><?=$doc?></td>
<td><?=$seguroT?></td>
<td><?=$numSeg?></td>
<td><?=date("d-m-Y", strtotime($row->filter_date))?></td>
<td><a href="<?php echo site_url("utilitaire/add_patient/$row->paciente/$row->centro_medico/$row->medico/$row->seguro_medico/$row->filter_date/$row->inserted_by")?>"  target="_blank"  title='' ><i class="fa fa-pencil" aria-hidden="true" ></i></a>
</td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
<hr/><hr/><hr/>

