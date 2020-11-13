<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">


<style>
  table { border-collapse: collapse; witdh:100%} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td {border-right: none; border-left: none;padding: 5px }
</style>


<div style="text-align:center">
<?php 

$paciente=$this->db->select('nombre,photo,ced1,ced2,ced3')->where('id_p_a',$id_historial)->get('patients_appointments')->row_array();

 $this->padron_database = $this->load->database('padron',TRUE);
 
  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img  style="width:100px;"  src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat='<img  style="width:100px;" src="'.base_url().'/assets/img/user.png"  />';	
}
else{
$imgpat='<img  style="width:100px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}



$centro=$this->db->select('name,logo')->where('id_m_c',$centro_medico)->get('medical_centers')->row_array();

?>
<h1>HISTORIA CLINICA</h1>
<h3><?=$centro['name']?></h3>
<img  style="width:70px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />

<h4><?=$paciente['nombre']?></h4>
<?=$imgpat?>

<p style="font-size:10px;color:red"><?=$time_done?></p>
</div>
<hr/>
<?php 
foreach($print_enf_act as $row)
$img=$this->db->select('image')->where('id_enfermedad',$row->id_enf)->get('saveEnfImage')->row('image');
?>
<h4>ENFERMEDAD ACTUAL</h4>
<table style="font-size:13px;margin-left:10%;" class="r-b" >

<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Motivo de consulta </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->enf_motivo;?></td>
</tr>

<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Signopsis </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->signopsis;?></td>
</tr>
<?php if($row->laboratorios !=""){?>
<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Laboratorios (Resultados relevantes) </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->laboratorios;?></td>
</tr>
<?php 
}  
if($row->estudios !=""){
 ?>
<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Estudios/Imagenes (Resultados relevantes) </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->estudios;?></td>
</tr>
<?php 
}  
 ?>


<?php if($img !=""){?>
<tr >
<td style="text-align:right"><strong>Imagen</strong></td>
<td>
<table class='cont'>
<tr class='me-ctn'>
<?php 

$sql ="SELECT image FROM  saveEnfImage WHERE id_enfermedad=$row->id_enf";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rf){

?>
<td class="single-item"><img  id='zoomimg' style="width:20%;height:20%" src="<?= base_url();?>/assets/update/<?php echo $rf->image; ?>"  /></td>

<?php
}
?>
</tr>
</table>
</td>
</tr>
<?php }?>
</table>

<?php 

foreach($print_cond as $row)

	?>

<h4>CONCLUSION DIAGNOSTIC</h4>
<table style="font-size:13px;margin-left:10%" class="r-b" >

<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Plan </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->plan;?></td>
</tr>

<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Diagnostico(s) Presuntivo o Definitivo (CIE10) </strong></td>
<td style="border-bottom:1px solid #DCDCDC;font-size:13px;text-transform:lowercase">
<?php 
$sql ="SELECT diagno_def FROM h_c_diagno_def_link
 where con_id_link=$row->id_cdia";
$query = $this->db->query($sql);
$i = 1;
foreach($query->result() as $dr){
	
$diagno_def=$this->db->select('description')
->where('idd',$dr->diagno_def)
->get('cied')->row('description');	

echo $i;
$i++;
?>-<?=$diagno_def;?><br/>
<?php
}
?>


</td>
</tr>

<?php  if($row->otros_diagnos !=""){?>
<tr>
<td style="border-bottom:1px solid #DCDCDC"><strong>Otro Diagnostico</strong> </td>
<td style="border-bottom:1px solid #DCDCDC">
<?=$row->otros_diagnos;?>
</td>
</tr>
<?php }
 if($row->procedimiento !=""){?>
<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Procedimiento</strong></td>
<td style="border-bottom:1px solid #DCDCDC">
<?=$procedimiento ;?>
</td>
</tr>
<?php 
}  
if($row->evolucion !=""){
 ?>
<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Evolucion (Paciente subsecuente) </strong></td>
<td style="border-bottom:1px solid #DCDCDC"><?=$row->evolucion;?></td>
</tr>
<?php } ?>
<tr >
<td style="border-bottom:1px solid #DCDCDC"><strong>Estado </strong></td>
<td style="border-bottom:1px solid #DCDCDC"> 
<?php
if($row->conclusion_radio =="Mejoria"){
		$selected="checked='checked'";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Mejoria' $selected disabled/> <label>Mejoria</label>";
echo "<br/>";
	
if($row->conclusion_radio =="Empeorando"){
		       $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='Empeorando' $selected disabled/> <label>Empeorando</label>";
echo "<br/>";
	
	if($row->conclusion_radio =="No mejoria"){
		    $selected="checked='checked'";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio1' name='conclusion_radio1' value='No mejoria' $selected disabled/> <label>No mejoria</label>";

	
	?>


</td>
</tr>
</table>


<?php 
 if($ExamFisById !=NULL){
echo "<br/><br/><br/><br/><h4>EXAMEN FISICO</h4>";	 
$this->load->view('admin/print/signo');
foreach($ExamFisById as $row)
?>
<br/><br/><br/><br/><br/><br/><br/><br/>

<?php 
$this->load->view('admin/print/print_exa_f');

} 
if($ssr !=NULL){
	echo "<br/><br/>
	<h4>ANTECEDENTE S.S.R (Salud Sexual Reproductiva)<h4>";
$this->load->view('admin/print/print_ssr');
}

if($obs !=NULL){
	echo "<br/><br/>
	<h4>ANTECEDENTE OBSTETRICO";
$this->load->view('admin/print/print_ant_obs');
}
if($show_oft !=NULL){
	echo "<br/><br/>
	<h4>OFTALMOLOGIA<h4>";
$this->load->view('admin/print/oftal');
}
?>


<?php if($print_recetas !=NULL)
{
?>
<br/><br/>
<h4>RECETAS</h4>
<table  style="width:100%;font-size:13px;" border="1">
<tr style="background:rgb(192,192,192);color:white">
<td ><strong>Medicamento</strong></td>
<td ><strong>Frecuencia</strong></td>
<td ><strong>Via</strong></td>
<td ><strong>Cantidad (dias)</strong></td>
</tr>
<?php foreach($print_recetas as $rc)

{
?>
<tr>
<td style='text-transform:lowercase;'><?=$rc->medica;?></td>
<td style='text-transform:lowercase;'><?=$rc->frecuencia;?></td>
<td style='text-transform:lowercase;'><?=$rc->via;?><br/><?=$rc->oyo;?></td>
<td style='text-transform:lowercase;'>
<?php
if($rc->cantidad==0){echo "uso continuo";}else{echo $rc->cantidad;}
?>
</td>

</tr>

<?php
}
?>

</table> 
<?php
}
?>



<?php if($estudios !=NULL)
{
?>
<br/><br/>
<h4>ESTUDIOS</h4>
<table class="table" style="width:100%;font-size:13px" border="1">
    <tr style="background:rgb(192,192,192);color:white">
	   <td><strong>Estudio</strong></td>
		 <td><strong>Parte del cuerpo</strong></td>
		  <td><strong>Lateralidad</strong></td>
        <td><strong>Observaciones</strong></td>
	 </tr>
    <?php foreach($estudios as $row)
	 
	 {
	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	 ?>
        <tr>
		
		<td><?=$row->estudio;?></td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
	  </tr>
		
	 <?php
	 }
	 ?>
       
</table>

<?php
}
?> 


<?php if($IndicacionesLab !=NULL)
{
?>
<br/><br/>
<h4>LABORATORIOS</h4>


<table style="width:100%">
 <?php foreach($IndicacionesLab as $row)
	  {?>
<tr>
<?php
	$lab=$this->db->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
	 echo '<td style="text-transform:lowercase">' . $lab. '</td>';	 
	 ?>
</tr>
	  <?php }?>
</table>
<?php
}
?> 
<br/><br/><br/>
<p style="font-size:9px">Creado por Dr <?=$doctor?>, <br/> <?=$area?></p>