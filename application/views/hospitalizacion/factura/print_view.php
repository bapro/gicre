
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


.bg-gr{
	background:#D3D3D3
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
 <div class="col-md-12">
 <table  id='header-table' >
<tr>
<td>
<img class="img "  style="width:130px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_logo; ?>"  />
<h4> <?=$centro_name?></h4>
<p style="font-size:11px"><strong>Tel :</strong> <?=$primer_tel?></p>
 <p style="font-size:11px"><strong>RNC : </strong><?=$rnc?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$calle?>, <?=$barrio?>, <?=$provincia?>, <?=$municipio?> </p>
</td>
<td style="font-size:11px">
<div style="text-align:center" class="form-horizontal">
<br/><br/><br/><br/>
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
</td>
</tr>
</table>

  </div>
<div class="col-md-12"  style="border-top:1px solid rgb(0,64,128)">
 <br/>
  <a class="btn btn-primary btn-xs"  href="<?php echo site_url("hospitalizacion/create_new_factura/$id_hosp/$id_user_fac")?>" >Editar</a><a class="btn btn-primary btn-xs" href="<?php echo site_url("printings/print_hosp_f/$id_hosp")?>" target="_blank">Print</a>

<h5><u>DETALLE DE FACTURA</u> </h5>
<table style="font-size:11px;width:100%"  >
<tr  class="trback">
<td><strong>Nombres</strong></td>
<td><strong>Cedula</strong></td>
<td><strong>Seguro Medico</strong></td>
<td><strong>Tel.</strong></td>
<td><strong>Direccion</strong></td>
<td><strong>Email</strong></td>
</tr>
<tr>
<td style="text-transform:uppercase"> <?=$paciente_nombre?></td>
<td><?=$cedula?></td>
<td><?=$seguro?></td>
<td><?=$tel_cel?> / <?=$tel_resi?> </td>
<td><?=$barrio?> <?=$calle?></td>
<td><?=$email?></td>
</tr>

</table>
</div>

<div class="col-md-12"  >
<div style="overflow-x:auto">
<?php $this->load->view('hospitalizacion/factura/extraer-cargos');?>
 <a class="btn btn-primary btn-xs"  href="<?php echo site_url("hospitalizacion/create_new_factura/$id_hosp/$id_user_fac")?>" >Editar</a><a class="btn btn-primary btn-xs" href="<?php echo site_url("hospitalizacion/print_emg_f/$id_hosp")?>" target="_blank">Print</a>
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
url: '<?php echo site_url('hospitalizacion/update_factura_fecha_venc');?>',
data:{id_hosp:<?=$id_hosp?>,vec_fec:vec_fec,ncf_value:ncf_value},
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