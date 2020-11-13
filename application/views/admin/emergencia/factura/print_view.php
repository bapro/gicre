
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<title>ADMEDICALL</title>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<!-- owl carousel css -->
<style>
 table { border-collapse: collapse; witdh:100%;} 
    tr { border-top: solid 1px black border-bottom: solid 1px black; } 
    td { border-right: none; border-left: none;padding: 1em; text-align:left}
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


/*.column {
  float: left;
  width: 33.33%;
}*/
.header {
	background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}
h3{font-weight:bold}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}
</style>
</head>

<?php
	if($id_seguro ==11){
	$display='none'	;
	}else{
	$display=''	;
	}
?>
<div class="modal fade" id="myModal" role="dialog" style=''>
<div class="modal-dialog modal-lg">
<div class="modal-content">

<div class="modal-header" >
  <div class="header">
  <h4><?=$centro_name?></h4>
   <img class="img "  style="width:70px;text-align:center" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  /><br/>
 <?php  echo "{$calle} {$barrio} <br/>  {$primer_tel}  {$fax} <br/><strong>RNC</strong> {$rnc}";?><br/>
  <h4>RECLAMACION POR SERVICIO DE SALUD</h4>
  <span style='float:right'><strong>No. Orden <?=$numfac?></strong><br/><span style="color:red;font-size:11px"> Fecha de impresión <?=date("d-m-Y H:i");?>
  </div>
<div class="col-md-7"  >

  <a class="btn btn-primary btn-xs"  href="<?php echo site_url("emergency/create_new_factura/$id_mergencia/$id_user_fac")?>" >Editar</a><a class="btn btn-primary btn-xs" href="<?php echo site_url("printings/print_emg_f/$id_mergencia")?>" target="_blank">Print</a>

<h4>A) SERVICIO PRESTADO</h4>
<table>
<tr>
<th>Servicio</th> <td><?=$enviado_name?></td>

</tr>
</table>
<h4>B) DATOS ARS</h4>
<table>
<tr>
<th>Nombre</th><td><?=$seguro?></td>
</tr>
<tr style='display:<?=$display?>'>
<th>No. Autorizacion</th><td><?=$numauto?></td>
<th>Autorizado Por</th><td><?=$autopor?></td>
</tr>
</table>

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
</div>
<div class="col-md-5"  >
<br/>
<div style="text-align:center" class="form-horizontal">
<div class="form-group">
<label class="control-label col-sm-6" >NCF</label>
<div class="col-sm-5">
<input type="text" class='deactivate' class='form-control' id="ncf-value" value="<?=$ncf?>"  disabled />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-6" >Fecha De Vecimiento Secuencia</label>
<div class="col-sm-5">
<input type="text" class='deactivate' value="<?=$vec_fec?>" class='form-control' id="vecimiento-secuencia"   disabled />
</div>
</div>

<div class="col-md-11 col-md-offset-2">
<button title="Modificar el RNC" type="button" class="btn btn-sm btn-default" id="show-ncf" style="float: none;" ><span class="glyphicon glyphicon-pencil"></span></button>
<button title="Guadar" type="button" id="save-ncf" class="btn btn-sm btn-success" style="float: none; display: none;"><span class="glyphicon glyphicon-ok-sign"></span></button>
 <hr/>
 </div>
 </div>
</div>
<div class="col-md-12"  >
<div style="overflow-x:auto">
<?php $this->load->view('admin/emergencia/factura/extraer-cargos');?>
 <a class="btn btn-primary"  href="<?php echo site_url("emergency/create_new_factura/$id_mergencia/$id_user_fac")?>" >Editar</a><a class="btn btn-primary" href="<?php echo site_url("printings/print_emg_f/$id_mergencia")?>" target="_blank">Print</a>
  </div>
</div>

  <hr/>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script>
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})

$("#vecimiento-secuencia").mask('00-00-0000', {placeholder: '00-00-0000'});
  $('#show-ncf').on('click',function(){
       $(this).hide();
        $("#save-ncf").show();
		$(".deactivate").prop("disabled",false);
    });

 $('#save-ncf').on('click', function () {
var vec_fec  = $("#vecimiento-secuencia").val();
var ncf_value  = $("#ncf-value").val();
 // if(vec_fec==""){
	// alert("La fecha de vencimiento no se puede dejar vacio !");
// } else { 
$.ajax({
type: "POST",
url: '<?php echo site_url('emergency/update_factura_fecha_venc');?>',
data:{id_em:<?=$id_em?>,vec_fec:vec_fec,ncf_value:ncf_value},
success: function(data){
$('#save-ncf').hide();
$("#show-ncf").show();
$(".deactivate").prop("disabled",true);
},
});
 //}
});
</script>
</html>