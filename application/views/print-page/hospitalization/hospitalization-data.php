<div class='hr'>
  <h4 style='text-align:center'>ADMISION HOSPITALARIA</h4>
  <div style="float: left;color:red;font-size:12px">FECHA: <?=date("d-m-Y H:i:s", strtotime($timeinserted));?></div>
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
  <td><strong>SEGURO MEDICO:</strong> <?=$seguro?></td>
   </tr>
    <tr>
   <td style='display:<?=$show?>'><strong>PLAN:</strong> <?=$plan?> <strong><?=$inputf?>:</strong> <?=$input_name?> <strong>TIPO:</strong> <?=$afiliado?></td>

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
  <table style="width:100%">
  <tr>
  <td  colspan="2"><strong>CAUSA DE INGRESO:</strong> <?=$causa?></td>
  </tr>
  <tr>
  <td><strong>VIA DE INGRESO:</strong> <?=$via?></td>
  <td><strong>SALA:</strong> <span style='color:red'><?=$sala_hosp?></span> <strong>CAMA:</strong> <span style='color:red'><?=$cama?></span></td>
  </tr>
   <tr>
  <td><strong>SERVICIO:</strong> <?=$servicio?></td>
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
 <td colspan='2'><strong>NOMBRES:</strong> <?=$docname?></td>
</tr>
  <tr>
 <td><strong>ESPECIALIDAD:</strong> <?=$area?></td><td><strong>EXEQUATUR:</strong> <?php echo $exequatur;?></td>
  </tr>

  </table>
 </div>
 
    <br/><br/><br/>
  <div style="width: 50%;float: left;">
   <table>
   <tr>
   <td style='border-bottom:1px solid #C0C0C0'></td>
  </tr>
  <tr>
  <td  style="text-align:center;"><?=$username?><br/><strong>FIRMA USUARIO</strong></td>
  </tr>
   
   
  </table>
  </div> 

  <div style="float: left;font-size:12px">
   <table>
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