<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></style>
 <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
	<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<style>
#especialidad:hover{
    text-decoration:underline;
	cursor:pointer
}

#centro_medico:hover{
    text-decoration:underline;
	cursor:pointer
}
.btn-group {  
    white-space: nowrap;              
}
.btn-group .btn {  
    float: none;
    display: inline-block;
}
 .btn + .dropdown-toggle { 
    margin-left: -4px;
}

.table-responsive {
  overflow-y: visible !important;

}
td{font-family:none;text-align:left}

</style>
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
   
</head>



  <section >

<div class="container">

<div class="row">
<div class="col-md-10"><h3>Colar de solicitudes</h3></div><br/>
<div class="col-md-2 text-right">
<a href="#"  onclick="window.location.reload()" id="refresh"  class="btn btn-primary btn-xs" ><i class="glyphicon glyphicon-refresh"></i> </a>

<br/>
</div>

</div>
<?php echo $this->session->flashdata('success_msg'); ?>
<hr/>
<div class="row">
<div class="table-responsive">
<table id="" class="table table-striped table-bordered" style="margin:auto" cellspacing="0">
  
<thead>
<tr style="background:#5957F7;color:white">
<!--<th rowspan="2"><strong>#</strong></th>-->
<th rowspan="2"><strong>Solicitud</strong></th>
<th rowspan="2"><strong>Solicitante</strong></th>
<th colspan="2" style="text-align:center"><strong>Teléfono</strong></th>
<th rowspan="2"><strong>Email</strong></th>
<th rowspan="2"><strong>Fecha Solicitud</strong></th>

<th rowspan="2">Accion</th>
</tr>

<tr style="background:#5957F7;color:white">
<th>Fijo</th>
<th>Movil</th>
</tr>
</thead>		
<?php foreach($CITAS as $citas)

{

$citas = (object)$citas;

?>
<tbody>
<tr>
<td class="solicitud"><?=$citas->nec;?></td>
<td class="nombre" ><?=$citas->nombre;?>  </td>
<td class="tel"><?=$citas->tel_resi;?></td>
<td class="telc"><?=$citas->tel_cel;?></td>
<td class="email"><?=$citas->email;?></td>
<td class="fecha" style="text-align:left"><?=$citas->fecha_propuesta;?></td>

<td >
<div class="btn-group">
<a  class="btn btn-primary btn-xs" data-toggle="modal"   data-target="#verSolicitud" href="<?php echo site_url("admin/patient_request/".$citas->id_p_a)?>" >Ver</a>
<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li ><a href="<?= base_url("/admin/confirmar_solicitud/$citas->id_p_a/$citas->nec") ?>">Confirmada</a></li>
<li><a href="#">Eliminar</a></li>

</ul>
</div>
</td>
</tr> 
</tbody>	   
<?php
}

?>

</table>
</div>


</div>
</div>
 <div class="modal fade" id="verSolicitud" tabindex="-1" role="dialog" >
    <div class="modal-dialog" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
  </section > 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
   /* On passe notre variables PHP au javascript grace à json_encode.
      $(".copyToModal").click(function (){
    var id_cita = $(this).closest("tr").find(".id_cita").text();
	 var id_cita_send = $(this).closest("tr").find(".id_cita").text();
	var solicitud = $(this).closest("tr").find(".solicitud").text();
    var nombre = $(this).closest("tr").find(".nombre").text();
	var apellido = $(this).closest("tr").find(".apellido").text();
	var fecha = $(this).closest("tr").find(".fecha").text();
	var frecuencia = $(this).closest("tr").find(".frecuencia").text();
	var email = $(this).closest("tr").find(".email").text();
	var tel = $(this).closest("tr").find(".tel").text();
	var telc = $(this).closest("tr").find(".telc").text();
	var centro_medico = $(this).closest("tr").find(".centro_medico").text();
	var especialidad = $(this).closest("tr").find(".especialidad").text();
	var doctor = $(this).closest("tr").find(".doctor").text();
	var seguro_medico = $(this).closest("tr").find(".seguro_medico").text();
	 // $("#userText").text(icd+" "+nombre +apellido +ubicacion +servicio +email +telefono);id_cita_send
	 $('#id_cita').val(id_cita);
	  $('#id_cita_send').val(id_cita_send);
	$('#solicitud').val(solicitud);
   $('#nombre').val(nombre);
   $('#apellido').val(apellido);
   $('#fecha').val(fecha);
   $('#frecuencia').val(frecuencia);
    $('#email').val(email);
	$('#tel').val(tel);
	$('#telc').val(telc);
	$('#centro_medico').val(centro_medico);
	$('#especialidad').val(especialidad);
	$('#doctor').val(doctor);
	$('#seguro_medico').val(seguro_medico);
	
	
})
*/
$('#verSolicitud').on('hidden.bs.modal', function () {
 location.reload();
})
      
    </script>  
 </body>
</html>