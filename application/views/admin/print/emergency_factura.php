
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<!-- Favicon and apple touch icons-->


<!-- owl carousel css -->
<style>
 table { border-collapse: collapse; witdh:100%;} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 8px; text-align:left}
   th{text-align:left}

img
{
    max-width: 100%;
    max-height: 100%;
    display: block;
    margin: auto auto;
}

/* Create three equal columns that floats next to each other */
.footer {
	margin:3%
  /*float: left;
  width: 33.33%;
  padding: 15px;*/
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.bgc{background-color: #f1f1f1;}

.header {
  padding: 20px;
  text-align: center;
}
h3{font-weight:bold}
body{font-size:12px}



.container-header {
  width: 50%;


  margin: auto;
  padding: 5px;
}

.one {
  width: 15%;
 
 
  float: left;
}

.two {
	text-align:center;
 
position:absolute
 
}
</style>
</head>
<section class="container-header">
  <div class="one">
  <img class="img "  style="width:70px;text-align:center" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
  </div>
  <div class="two">
   <span><strong><?=$centro_name?></strong></span><br/>
 <span style='font-size:10px'><?php  echo "{$calle} {$barrio} <br/>  {$primer_tel}  {$fax} <br/><strong>RNC</strong> {$rnc}";?></span><br/>
  
  </div>
</section>
<!--
   <img class="img "  style="width:70px;text-align:center" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  /><br/>
 <div class="header">
 <span><strong><?=$centro_name?></strong></span><br/>
 <span style='font-size:10px'><?php  echo "{$calle} {$barrio} <br/>  {$primer_tel}  {$fax} <br/><strong>RNC</strong> {$rnc}";?></span><br/>
 
  <h4>RECLAMACION POR SERVICIO DE SALUD</h4>
  </div>-->
  <hr/>
<div style='text-align:right'>
<strong>No. Orden <?=$numfac?></strong><br/><span style="color:red;font-size:11px">Fecha de impresión <?=date("d-m-Y H:i");?><br/></span>
<br/>
<strong>NCF</strong> <?=$ncf?> <br/>
<strong>Fecha de vencimiento</strong> <?=$vec_fec?>
</div>
 <div class="container">
 <hr/>
 <div class="row">
<div class='column'>
<h4>A) SERVICIO PRESTADO</h4>
<table>
<tr>
<td><strong>Servicio</strong> <?=$enviado_name?></td>
</tr>
</table>
<h4>B) DATOS ARS</h4>
<table>
<tr>
<th>Nombre</th><td><?=$seguro?></td>
</tr>
<?php
	if($seguro !='PRIVADO'){?>
	<tr>
<th>No. Autorizacion</th><td><?=$numauto?></td>
<th>Autorizado Por</th><td><?=$autopor?></td>
</tr>
<?php
	}
?>

</table>
<hr/>
<h4>C) DATOS DEL PACIENTE</h4>
<table>
<tr>
<th>Nombres</th> <td><?=$paciente_nombre?></td>
<th>Fec. Ingreso</th> <td><?=date("d-m-Y", strtotime($date_ingreso));?> <?=$fecha_ingreso?></td>
<th>Fec. Salida</th> <td><?=date("d-m-Y H:i:s", strtotime($fecha_alta));?></td>
</tr>
<tr>
 <th>No. Historia</th> <td><?=$num_pat?></td>
 <th>Tel</th> <td><?=$tel_resi?> <?=$tel_cel?></td>
</tr>
<tr>
<th>Cedula</th> <td><?=$cedula?></td> <th>Edad</th> <td><?=$age?></td>
</tr>
<!--<tr>
<th>Tipo Paciente</th> <td><?=$enviado_name?></td>
</tr>-->
</table>
<hr/>
<h4>D) DESCRIPCION DE LA ATENCION</h4>
<table>
<tr>
<th>DIAGNOSTICO</th>
<td>

<?php 
if($show_diagno_pat !=NULL){
$i=1;
foreach($show_diagno_pat->result() as $cie)
{
?><?=$i;$i++?> ) <?php echo "$cie->description <br/>";	
}
}else{
echo $otros_diagnos;	
}	
?>
</td>
</tr>
</table>
<hr/>
</div>
<!--
<div class='column'>
sfsdfs
</div>-->

</div>

<div class="footer">

<?php
if($seguro !='PRIVADO'){
 $this->load->view('admin/emergencia/factura/extraer-cargos');
}else{
 $this->load->view('admin/emergencia/factura/extraer-cargos-privados');
}
 ?>

</div>

</div>

</html>