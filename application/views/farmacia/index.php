<style>

td{font-size:14px;color:black}
th{color:white}
.box-more {
    color: black;
   background:white;  
 padding:3px;
   z-index:100000
}

.mas-dato {
    display: inline-block;
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
?>

  <div class="container">

 <?=$title?>

 <div class="container text-left" style="overflow-x:auto;">
<table  class="table table-striped" width="100%"  >
    <thead>
    <tr style="background:#5957F7;color:white">
	<th>#</th>
	 <th>FOTO</th>
	<th>RECORD</th>
    <th>NOMBRES</th>
	 <th>EDAD</th>
	 <th>CEDULA</th>
	 <th>SEGURO</th>
	 <th>POLIZA/</th>
	  <th>ACCIONES</th>
    </tr>
    </thead>
    <tbody>
    <?php
	$i=1;
 foreach ($query  as $row)
 { 
$patient=$this->db->select('nombre,cedula,seguro_medico,date_nacer,photo,ced1,ced2,ced3')->where('id_p_a',$row->historial_id)->get('patients_appointments')->row_array(); 
$seguro=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
$fieldid=$this->db->select('field_id')->where('medical_insurance_id',$patient['seguro_medico'])->get('medical_insurances_fields')->row('field_id');

$fieldname=$this->db->select('name')->where('id',$fieldid)->get('fields')->row('name');
if($row->despachada==1){
$desp='#C7FCC8';
$title='despachada';
$checked='<i class="fa fa-check" style="font-size:20px;color:#32CD32"></i>';	
}else{
$desp='';
$checked='';
$title='';		
}

?>
<tr style='background:<?=$desp?>' title='<?=$title?>'>
<td><?php echo $i; $i++?></td>
<td>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="70"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
?>
<img  width="70"  src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="70"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td><?=$row->historial_id;?></td>
<td><?=$patient['nombre'];?></td>
<td><?=getPatientAge($patient['date_nacer'])?></td>
<td><?=$patient['cedula'];?></td>
<td><?=$seguro;?></td>
<td><?=$fieldname?></td>
<td>
<!-- <a id="<?=$row->id_i_m?>" class="btn btn-primary btn-xs mas-datos" style='cursor:pointer'    >Mas</a>-->
 <a class="btn btn-primary btn-xs" style='cursor:pointer'  title="Cancelar y limpiar lista de recetas"   >C</a>
  <a  class="btn btn-primary btn-xs" style='cursor:pointer'  title="Reeinviar a otra farmacia o otra sucursal"   >R</a>
   <a class="btn btn-primary btn-xs" style='cursor:pointer'  title="Notificar al medico"   >N</a>

<!--<div  class="push-down-more" style="display:none;position:absolute;margin-right:30%" >

</div>-->

<div class="box-more" style="display: ;">
<?php
$farma=$this->db->select('updated_time,operator,id_i_m,centro')->where('id_i_m',$row->id_i_m)->get('h_c_indicaciones_medicales')->row_array();
$time=date("d-m-Y H:i:s", strtotime($farma['updated_time'])); 
$doc=$this->db->select('name,area')->where('id_user',$farma['operator'])->get('users')->row_array();
$name=$doc['name'];
$areaname=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
$centro=$this->db->select('name')->where('id_m_c',$farma['centro'])->get('medical_centers')->row('name');
$link='href="'.base_url().'farmacia/viewPatientDetail/'.$farma['id_i_m'].'/'.$row->historial_id.'/'.$row->despachada.'/'.$id_usr.'"';
$data="
<table class='table' >
<tr>
<th style='color:black'>Centro</th>
<th style='color:black'>Fecha</th>
<th style='color:black'>Doctor</th>
<th style='color:black'>Area</th>
<th></th>
</tr>
<tr>
<td>$centro</td><td >$time</td><td >$name</td><td >$areaname</td>
<td ><a data-toggle='modal'  data-target='#ver' class='btn btn-default btn-xs' $link>Ver $checked</a></td>
</tr>
</table>
";
echo $data;?>
</div>

</td>	
</tr>
<?php
}
?>
</tbody>    
</table>
<hr id="hr_ad"/>

</div>
<span style='float:right'><?=$links?></span>
<!-- <hr id="hr_ad"/>
 <a href="<?php echo base_url('farmacia/newDrugstore')?>" class="btn btn-primary btn-xs st"  title="Crear nueva farmacia"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva farmacia</a>-->
 <div class="modal fade" id="ver" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
 </div>
  </div>
 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>



