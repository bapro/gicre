<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">

</head>
<?php
 $this->padron_database = $this->load->database('padron',TRUE);
foreach($patient_rows as $row)
$doc=$this->db->select('name')->where('id_user',$medico)->get('users')->row('name');
$exequatur=$this->db->select('exequatur')->where('id_user',$medico)->get('users')->row('exequatur');
$area_id=$this->db->select('area')->where('id_user',$row->medico)->get('users')->row('area');
$area=$this->db->select('title_area')->where('id_ar',$area_id)
->get('areas')->row('title_area');
$seguroid=$this->db->select('seguro_medico')->where('paciente',$row->paciente)->get('factura2')->row('seguro_medico');
$logo=$this->db->select('title,logo')->where('id_sm',$seguroid)->get('seguro_medico')->row_array();  
$desde1 = date("d-m-Y", strtotime($desde));
$hasta1 = date("d-m-Y", strtotime($hasta));
?>

<h2 style="text-align:center;text-transform:uppercase"><?=$doc?></h2>
<h4 style="text-align:center"> <?=$area?></h4>
<h4 style="text-align:center">Exq :<?= $exequatur?> </h4>
<hr/>
<h4 style="text-align:center"><?=$logo['title']?><br/>
 <?php if($logo['logo']=="") {} else {?>
 <img class="img" style="width:100px;" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $logo['logo']; ?>" /> 
 <?php }?>
 </h4>

 <?=date("d-m-Y H:i");?>
<table   style="width:100%" >
<tr>
<td colspan="5" ></td>
<td style="width:160px">
Desde <?=$desde1?><br/>Hasta <?=$hasta1?>
</td>

</tr>
<tr style="background:#cde2b2;">
<td><strong>Foto</strong></td>
<td style="width:230px;"><strong>Paciente</strong></td>
<td><strong>No Reclamcion</strong></td>
<td><strong>Monto Aprobado</strong></td>
<td><strong>Monto Glosado</strong></td>
<td><strong>Causa</strong></td>
</tr>
<?php foreach($patient_rows as $row)
{
$paciente=$this->db->select('nombre,,photo,ced1,ced2,ced3')->where('id_p_a',$row->paciente)
->get('patients_appointments')->row_array();

  if($paciente['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$paciente['ced1'])
->where('SEQ_CED',$paciente['ced2'])
->where('VER_CED',$paciente['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img  width="80"   src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
} else if($paciente['photo']==""){
$imgpat="";	
}
else{
$imgpat='<img  style="width:80px;" src="'.base_url().'/assets/img/patients-pictures/'.$paciente['photo'].'"  />';		


}



?>
<tr class="row-copier">
<td class="cedula"><?=$imgpat;?></td>
<td class="paciente" style="text-transform:uppercase"> <?=$paciente['nombre']?></td>
<td class="cedula"><?=$row->numauto;?></td>
<?php if($row->causa_perfil_seguro_audit !="") 
{
	echo'<td style="background:#f7f6e4"></td>';
} 
else{
?>	
<td><?=number_format($row->monto_seguro_audit,2)?></td>
<?php
}
if($row->causa_perfil_seguro_audit=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td style="color:red"><?=number_format($row->monto_seguro_audit,2)?></td>
<?php
}

if($row->causa_perfil_seguro_audit=="") 
{
	echo"<td style='background:#f7f6e4'></td>";
} 
else{
?>	
<td class="num_af"><?=$row->causa_perfil_seguro_audit;?></td>
<?php
}
?>

</tr> 
<?php
}
$empty="";
//------------------------------------------
$this->db->select("SUM(monto_seguro_audit) as total");
$this->db->where("filter >=",$desde);
$this->db->where("filter <=",$hasta);
$this->db->where("causa_perfil_seguro_audit !=","");
$this->db->where("medico2",$medico);
if($id_seguro=="") {} else 
{$this->db->where('seguro',$id_seguro);}
$this->db->from('factura');
$r1=$this->db->get()->row()->total;
$r11=number_format($r1,2);
//------------------------------------------
$this->db->select("SUM(monto_seguro_audit) as total1");
$this->db->where("filter >=",$desde);
$this->db->where("filter <=",$hasta);
$this->db->where("causa_perfil_seguro_audit","");
$this->db->where("medico2",$medico);
if($id_seguro=="") {} else 
{$this->db->where('seguro',$id_seguro);}
$this->db->from('factura');
$r2=$this->db->get()->row()->total1;
$r22=number_format($r2,2);
$total_reclamdo=$r1 + $r2;
?>
<tr>
<td style="background:#cde2b2;">Total</td><td></td><td><?=$count?></td><td>RD$ <?=$r22?></td><td style="color:red">RD$ <?=$r11?></td><td style="background:#cde2b2;"></td>
</tr>
</table>
<p style="padding:10px;color:blue"><strong>Total Reclamado: RD$ <?=number_format($total_reclamdo,2)?></strong></p>





