<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
td{font-size:13px}
.box-tooltip {
    color: black;
   background:white;
   border-radius:4px;
   padding:9px;
  border: 1px solid #C0C0C0;
   z-index:100000
}


</style>

<?php
	function getPatientAge($birthday) {

    $age = '';
    $diff = date_diff(date_create(), date_create($birthday));
    $years = $diff->format("%y");
    $months = $diff->format("%m");
    $days = $diff->format("%d");

    if ($years) {
        $age = ($years < 2) ? '1 año' : "$years años";
    } else {
        $age = '';
        if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
        if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
    }
    return trim($age);
}

$id_doc = encrypt_url($id_user); 
?>
<div style='overflow-x:auto;'>
<table id="example" class="table table-striped" style="margin:auto" >
<thead>
<tr style="background:#5957F7;color:white">
<th>Fecha/Hora Ingreso</th>
<th>Foto</th>
<th>Nombres</th>
<th>Edad</th>
<th>NEC</th>
<th>Seguro</th>
<th>Centro</th>
<th>Causa</th>
<th>Via</th>
<th>Sala</th>
<th>Servicio</th>
<th>Cama</th>
<th style="<?=$isFromDrug?>">Acciones</th>
</tr>
</thead>
<tbody id='tbody'>
<?php
$this->padron_database = $this->load->database('padron',TRUE);

 foreach($query->result() as $row)
{
	$id_hosp = encrypt_url($row->id);
	
	$id_cent = encrypt_url($row->centro);
 $paciente=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado')->where('id_p_a',$row->id_patient)
 ->get('patients_appointments')->row_array(); 
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
$imgpat='<img  style="width:50px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
$imgpat='<img  style="width:50px;" src="'.base_url().'/assets/img/user.png"  />';	
}	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:50px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:50px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		
}
?>
<tr id="<?=$row->id_patient?>">
<td><?=date("d-m-Y H:i:s", strtotime($row->timeinserted));?></td>
<td><?=$imgpat?></td>
<td><?=$paciente['nombre']?></td>
<td><?=getPatientAge($paciente['date_nacer'])?></td>
<td><?=$row->id_patient?></td>
<td>
<div class="pagination" style='font-size:13px'>
 <span class="glyphicon glyphicon-chevron-down"></span>
<div class="box-tooltip" style="display: none;position:absolute;">
<?php
$seguro_medico=$this->db->select('title')->where('id_sm',$paciente['seguro_medico'])
 ->get('seguro_medico')->row('title');
$id_seg=$paciente['seguro_medico'];
 $nss=$this->db->select('input_name,inputf')->where('patient_id',$row->id_patient)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
 ?>
<div>
<?php
 if($seguro_medico =="PRIVADO"){echo "<strong>Seguro $seguro_medico</strong>";}else {echo "<strong>$seguro_medico</strong>";}
$afiliado=$paciente['afiliado'];
if($paciente['afiliado'] !=""){echo " $afiliado <br/>";}
?>
 <strong><?=$nss['inputf']?></strong> <?=$nss['input_name']?><br/>
 <?php if($seguro_medico !="PRIVADO"){echo "<strong>Plan</strong> $plan";}?>
 </div>
</div>
</div>
</td>
<td>
<div class="pagination" style='font-size:13px'>
 <span class="glyphicon glyphicon-chevron-down"></span>
<div class="box-tooltip" style="display: none;position:absolute;">
<?php
$centro=$this->db->select('name')->where('id_m_c',$row->centro )
->get('medical_centers')->row('name');
$doctor=$this->db->select('name,area')->where('id_user',$row->doc)
   ->get('users')->row_array();
   
   $area=$this->db->select('title_area')->where('id_ar',$doctor['area'])
   ->get('areas')->row('title_area');
   
   
     $cama=$this->db->select('num_cama')->where('id',$row->cama)->get('mapa_de_cama')->row('num_cama');
   
   
 ?>
<div class='raya'>
<strong><?=$centro?></strong> 
</div>
<div  class='raya'>
<strong>DOC.</strong> <?=$doctor['name']?>
 </div>
<div  class='raya'>
<strong>AREA</strong> <?=$area?>
 </div>
</div>
</div>
</td>
<td><?=$row->causa?></td>
<td><?=$row->via?></td>
<td><?=$row->sala?></td>
<td><?=$row->servicio?></td>
<td><?=$cama?></td>
<td style="font-size:17px;<?=$isFromDrug?>"> 
<a target="_blank"  href="<?php echo base_url("printings/print_hosp1/$row->id/$row->id_patient/$id_seg/$row->doc/$row->centro")?>" style="cursor:pointer" title="Imprimir  "><i  class="fa">&#xf02f;</i></a>
<a  href="<?php echo base_url("hospitalizacion/hospitalizacion_historial/$id_hosp/$id_doc/$id_cent")?>" style="cursor:pointer" title="Hospitalizacion  " ><i class="fa fa-hospital-o" aria-hidden="true"></i></a>


<div class="pagination" style='font-size:13px'>
 <span class="glyphicon glyphicon-plus"></span>
<div class="box-tooltip" style="display: none;position:absolute;">

<a data-toggle="modal"   data-target="#hospitol" href="<?php echo base_url("hospitalizacion/create_new_hospital/$row->id_patient/$id_user/$row->id/$row->centro")?>" style="cursor:pointer" title="Editar  " ><i class="fa fa-pencil" aria-hidden="true"></i> Editar</a>

<hr/>
<a class="cancelar-data" id="<?=$row->id; ?>" style="color:red" title="Eliminar  " ><i class="fa fa-times" aria-hidden="true"></i> Eliminar</a>

</div>
</div>

</td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
<div class="modal fade" id="hospitol"  role="dialog"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<script>
$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
	  
	  

</script>