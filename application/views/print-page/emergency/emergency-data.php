<div class='hr'>
<div style="float: left;color:red;font-size:12px">FECHA <?=date("d-m-Y H:i:s", strtotime($timeinserted));?></div>
 </div>
   <div class='hr'>
  <h4><i>1- DATOS DEL PACIENTE</i></h4>
  <table style="width:100%;font-size:10px">
  <tr>
  <td colspan="2"><strong>NOMBRES</strong> <?=$paciente_nombre?></td><td> <strong>#HCE</strong> <?=$num_pat?></td>
  </tr>
  <tr>
  <td><strong>EDAD</strong> <?=$age?></td><td><strong>CEDULA</strong> <?=$cedula?></td>
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
   <table style="width:100%">
 <tr>
  <td><strong>SEGURO MEDICO</strong> <?=$seguro?></td>
  </tr>
  </table>
    </div> 
  <?php }
  else { ?>
  <div style="width: 70%;float: left;">
   <table style="width:100%">
 <tr>
  <tr>
  <td colspan="2"><strong>Seguro Médico:</strong> <?=$seguro?></td>
   </tr>
   <tr>
  <td style='display:<?=$show?>'><strong>Plan:</strong> <?=$plan?> <strong><?=$inputf?></strong> <?=$input_name?> <strong>Tipo:</strong> <?=$afiliado?></td>
   <td><strong>Referido por:</strong> <?=$refered_by?></td>
  </tr>
   
  </table>
  </div> 

 
  <?php } ?>
 </div>
 
   <div class='hr'>
  <h4><i>3- DATOS DE INGRESO</i></h4>
  <table style="width:100%">
  <tr>
  <td><strong>CAUSA DE INGRESO</strong> <?=$causa?></td><td><strong>VIA DE INGRESO</strong> <?=$via?></td>
  </tr>
 
  </table>
 </div>
 
  <?php if($dato_accom_name){
	 $num=5;
	 ?>
  <div class='hr'>
   <h4><i>4- DATOS ACOMPAÑANTE</i></h4>
   <table style="width:100%">

  <tr>
  <td><strong>NOMBRE ACOMPAÑANTE</strong> <?=$dato_accom_name?></td><td><strong>PARENTESCO</strong> <?=$parentecto?></td><td><strong>TEL</strong> <?php echo "{$cel1} - {$cel2}";?></td>
  </tr>

  </table>
 </div>
 <?php }else{
	  $num=4;
 }?>
 
 
    <br/><br/><br/>
  <div style="width: 50%;float: left;">
   <table style="width:100%">
   <tr>
   <td style='border-bottom:1px solid #C0C0C0'></td>
  </tr>
  <tr>
  <td  style="text-align:center;"><?=$username?><br/><strong>FIRMA USUARIO</strong></td>
  </tr>
   
   
  </table>
  </div> 

  <div style="float: left;font-size:12px">
   <table style="width:100%">
   <tr>
  <td style='border-bottom:1px solid #C0C0C0'></td>
  </tr>
  <tr>
  <td style="text-align:center;"><?=$paciente_nombre?><br/><strong>FIRMA PACIENTE</strong></td>
  </tr>
  
  </table>
  </div>

 <div style="text-align:right;color:red;font-size:9px">

 FECHA IMPRESION: <?=date("d-m-Y H:i:s");?><br/>
 FECHA DE MODIFICACION <?=date("d-m-Y H:i:s", strtotime($timeupdated));?>, <?=$usernameuPdate?>

</div>
</body>