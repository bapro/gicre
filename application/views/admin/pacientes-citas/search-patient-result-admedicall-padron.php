 <?php
$this->padron_database = $this->load->database('padron',TRUE);
if($perfil=="Admin"){
$controller="admin";
$area_id=0;
}
else{
$controller="medico";
$area_id= $this->db->select('area')->where('first_name',$user_id)->get('doctors')->row('area');
}
?>
<div class="tab-content"  style="margin-left:6%" >
<div class="col-md-12"  style="border:1px solid #38a7bb;background:linear-gradient(to right, white, #E0E5E6, white);" >

<h5 class="h5"><i><?=$number_found?> resultado(s) encuentrado(s) en el base de datos Admedicall. <span style="color:green">(<?=$now?> segundos)</span></i></h5>
<div  style="overflow-x:auto;">
<table class="table table-striped table-bordered" id="table-adm2" >
  <thead>
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Direccion</th>
<th>Nueva cita</th>

</tr>
  </thead>
    <tbody>
<?php
$cpt="";
foreach($patient_admedicall as $row)
{
$id_p_a= $this->db->select('id_p_a')->where('nec1',$row->nec1)->get('patients_appointments')->row('id_p_a');	

$centro= $this->db->select('centro')->where('id_patient',$id_p_a)->where('doctor',$user_id)->get('rendez_vous')->row('centro');	

$nacer2 = date("d-m-Y", strtotime($row->date_nacer));
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td> 

<?php


if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
echo '<img width="70" class="img-thumbnail"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($row->photo==""){
	
}
else{
	?>
<img  width="70" class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>

</td>
<td><?=$row->nombre ?> </td>
<td><?=$row->cedula;?></td>
<td><?=$nacer2;?></td>
<td><?=$row->calle;?></td>
<td><a href="<?php echo base_url("$controller/patient/$row->id_p_a/$centro")?>" class="btn btn-primary btn-sm" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a></td>


</tr>
<?php
}
?>
  </tbody>
</table>
<hr/>
<!---------------------------------------------------------------------------------------------------------->


<h5 class="h5"><i><?=$number_found_pad?> resultado(s) encuentrado(s) en el base de datos Padron. <span style="color:green">(<?=$now?> segundos)</span></i></h5>

<table class="table table-striped table-bordered" style="font-size:13px" id='padron-table2' >
  <thead>
<tr style="background:#38a7bb;color:white">
<th>Foto</th>
<th>Nombres</th>
<th>APELLIDO1</th>
<th>APELLIDO2</th>
<th>Cedula</th>
<th>Fecha de nacimiento</th>
<th>Nueva cita</th>
</tr>
  </thead>
  <tbody>
<?php
$cpt="";
foreach($patient_padron as $row)
{
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->MUN_CED)
->where('SEQ_CED',$row->SEQ_CED)
->where('VER_CED',$row->VER_CED)
->get('fotos')->row('IMAGEN');
	
$nacer = date("d-m-Y", strtotime($row->FECHA_NAC));
//-------------------------------------
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}
?>
<tr>
<td>
<?php
if($photo != null){
echo '<img width="100" class="img-thumbnail" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}
else{
echo "No hay foto por este paciente";	
}
?> 
</td>
<td><?=$row->NOMBRES?> </td>
<td><?=$row->APELLIDO1 ?> </td>
<td><?=$row->APELLIDO2 ?> </td>
<td><?=$row->MUN_CED;?><?=$row->SEQ_CED;?><?=$row->VER_CED;?></td>
<td><?=$nacer;?></td>
<td><a href="<?php echo base_url("$controller/cita_patient_padron/$row->MUN_CED/$row->SEQ_CED/$row->VER_CED")?>" class="btn btn-default" > <i class="fa fa-plus" aria-hidden="true"></i> Cita </a></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>


</div>


</div>

<script>
$('.patient-cedula').val("");

 $('#padron-table2').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );

	
 $('#table-adm2').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
"aaSorting": [ [0,'desc'] ],

    } );	
	
	
</script>