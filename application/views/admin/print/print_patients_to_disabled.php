<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; with:100%} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; }
</style>
</head>
 <body>
 <h3 style="text-align:center">LISTA DE PACIENTES INHABILITADA</h3> 
 <h4 style="text-transform:uppercase;text-align:center">doc. <?=$doctor?></h4>
  <h5 style="text-transform:uppercase;text-align:center"><?=$centro_name?></h5>
 <table   >

<tr>
<td><strong>Foto</strong></td>
<td><strong>NEC</strong></td>
<td><strong>Patiente</strong></td>
<td><strong>Causa</strong></td>
<td><strong>Fecha Propuesta</strong></td>

</tr>

<?php

$this->padron_database = $this->load->database('padron',TRUE);
 
$sql ="SELECT * FROM  rendez_vous WHERE doctor=$doc AND centro =$centro";
$query1= $this->db->query($sql);
foreach ($query1->result() as $ver){

$patient=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();


?>
<tr>

<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img width="75" height="75"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($patient['photo']==""){
	
}
else{
	?>
<img  width="75" height="75" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td><?=$ver->nec;?></td>
 <?php 
	 $patient=$this->db->select('nombre,sexo')->where('id_p_a',$ver->id_patient )
   ->get('patients_appointments')->row_array();
   
   ?>
<td style="text-transform: uppercase;"><?=$patient['nombre'];?></td>
<td ><?=$ver->causa;?></td>
<td ><?=$ver->fecha_propuesta;?></td>


</tr>

<?php
}
?>
   
</table>
 </body>
 </html>