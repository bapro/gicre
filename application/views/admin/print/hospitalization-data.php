<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
 <style>
 .hr{border-bottom:1px solid #D3D3D3}
.one {
  margin: 10px 20px;
    padding: 20px;
    width: 180px;
    float: right;
}

 table { border-collapse: collapse; witdh:100%;} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 8px; text-align:left;font-size:12px}
 </style>
</head>
<body>
<?php
    $camaNum=$this->db->select('num_cama')->where('id',$cama)
   ->get('mapa_de_cama')->row('num_cama');

?>
<!--<div class='hr'>
 <h2>
 <img  style="width:80px;text-align:center" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
 <?=$centro_name?></h2>
 <span style='font-size:10px'><?php  echo "{$centro_prov}, {$centro_muni}, {$calle}, {$barrio}<br/>  <strong>Tel: </strong>{$primer_tel} <strong>RNC: </strong> {$rnc}";?></span><br/>
 </div>-->
 
 
 <div class='hr'>
 <table  id='header-table' >
<tr>
<td>
<img class="img "  style="width:130px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
<h2  align="center"> <?=$centro_name?></h2>
<p><strong>Tel :</strong> <?=$primer_tel?> </p>

 <p><strong>RNC : </strong><?=$rnc?></p>
<p ><strong>Ubicación :</strong> <?=$calle?>, <?=$barrio?>, <?=$centro_prov?>, <?=$centro_muni?> </p>
</td>

</tr>
</table>
 
 </div>
 
 
 
 
 <div class='hr'>
  <h2 style='text-align:center'>ADMISION HOSPITALARIA</h2>
  <div style="width: 65%;float: left;"><strong>#HCE: <?=$num_pat?></strong></div>  <div style="float: left;color:red;font-size:12px">FECHA: <?=date("d-m-Y H:i:s", strtotime($timeinserted));?></div>
 </div>
  <div class='hr'>
  <h4><i>1- DATOS DEL PACIENTE</i></h4>
  <table>
  <tr>
  <td><strong>NOMBRES</strong> <?=$paciente_nombre?></td><td><strong>EDAD</strong> <?=$age?></td><td><strong>CEDULA</strong> <?=$ced1?>-<?=$ced2?>-<?=$ced3?></td>
  </tr>
   <tr>
  <td><strong>DIRECCION</strong> <span style='text-transform:lowercase'><?php  echo "{$pat_prov}, {$pat_muni}, {$paciente_calle}, {$paciente_barrio}";?></span></td><td><strong>TEL.</strong> <?=$tel_resi?></td><td><strong>CEL</strong> <?=$tel_cel?></td>
  </tr>
   <tr>
  <td><strong>CORREO</strong> <?php  echo $email;?></td><td><strong>NACIONALIDAD</strong> <?=$nacionalidad?></td><td><strong>PROVINCIA</strong> <?=$pat_prov?></td>
  </tr>
  </table>
 </div>
 
  <div class='hr'>
    <h4><i>2- DATOS ASEGURADORA</i></h4>
   <?php if($seguro=='PRIVADO')
  {?>
<div style="width: 70%;float: left;">
   <table>
 <tr>
  <td><strong>SEGURO MEDICO:</strong> <?=$seguro?></td>
  </tr>
  </table>
    </div> 
  <?php }
  else { ?>
  <div style="width: 70%;float: left;">
   <table>
 <tr>
  <tr>
  <td><strong>SEGURO MEDICO:</strong> <?=$seguro?></td><td style='display:<?=$show?>'><strong>PLAN:</strong> <?=$plan?></td>
  <td style='display:<?=$show?>'><strong><?=$inputf?>:</strong> <?=$input_name?></td>
  <td style='display:<?=$show?>'><strong>TIPO:</strong> <?=$afiliado?></td>
  </tr>
  
  </table>
  </div> 

  <div style="float: left;font-size:12px">
<strong>No. AUTORIZACION:</strong> <?=$hosp_auto?><br/>
<strong>AUTORIZADO POR:</strong> <?=$hosp_auto_por?>
  </div>
  <?php } ?>
 </div>
 
  <div class='hr'>
  <h4><i>3- DATOS DE INGRESO</i></h4>
  <table>
  <tr>
  <td><strong>CAUSA DE INGRESO:</strong> <?=$causa?></td><td><strong>VIA DE INGRESO:</strong> <?=$via?></td><td><strong>SALA:</strong> <span style='color:red'><?=$sala?></span></td>
  </tr>
   <tr>
  <td><strong>SERVICIO:</strong> <?=$servicio?></td><td><strong>CAMA:</strong> <span style='color:red'><?=$camaNum?></span></td>
  </tr>
  </table>
 </div>
 <?php if($dato_accom_name){
	 $num=5;
	 ?>
  <div class='hr'>
   <h4><i>4- DATOS ACOMPAÑANTE</i></h4>
  <table>

  <tr>
  <td><strong>NOMBRE ACOMPAÑANTE:</strong> <?=$dato_accom_name?></td><td><strong>PARENTESCO:</strong> <?=$parentecto?></td><td><strong>TEL:</strong> <?php echo "{$cel1} - {$cel2}";?></td>
  </tr>

  </table>
 </div>
 <?php }else{
	  $num=4;
 }?>
 
 <div class='hr'>
   <h4><i><?=$num?>- DATOS DEL MEDICO</i></h4>
  <table>

  <tr>
  <td><strong>NOMBRES:</strong> <?=$docname?></td><td><strong>ESPECIALIDAD:</strong> <?=$area?></td><td><strong>EXEQUATUR:</strong> <?php echo $exequatur;?></td>
  </tr>

  </table>
 </div>
 <br/> 
   <div style='
                bottom: 23mm; '>
  <div style="width: 50%;float: left;">
   <table>
  <tr>
  <td><?=$username?></td>
  </tr>
  <tr>
  <td style='text-align:center'><strong>FIRMA USUARIO</strong></td>
  </tr>
    <tr>
   <td style='border-bottom:1px solid #C0C0C0'></td>
  </tr>
  </table>
  </div> 

  <div style="float: left;font-size:12px">
   <table>
  <tr>
  <td><?=$paciente_nombre?></td>
  </tr>
  <tr>
  <td style='text-align:center'><strong>FIRMA PACIENTE</strong></td>
  </tr>
    <tr>
  <td style='border-bottom:1px solid #C0C0C0'></td>
  </tr>
 
  </table>
  </div>
 </div>
 <br/>
 <div style="text-align:right;color:red;font-size:9px">

 FECHA IMPRESION: <?=date("d-m-Y H:i:s");?><br/>
 FECHA DE MODIFICACION <?=date("d-m-Y H:i:s", strtotime($timeupdated));?>, <?=$usernameuPdate?>

</div>
</body>