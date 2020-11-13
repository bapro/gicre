<?php

function rand_string( $length ) {

$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#$!:,;.=/-_";
return substr(str_shuffle($chars),0,$length);

}

?>
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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
 <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

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
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>assets/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url();?>assets/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url();?>assets/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url();?>assets/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url();?>assets/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url();?>assets/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url();?>assets/img/apple-touch-icon-152x152.png" />

    <!-- owl carousel css -->
<style>
.red {
  background-color: red !important;
}

</style>
</head>

<body>
 <!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>

<br/><br/><br/>
 <body>
  <section >

 <div class="container" style="overflow-x:auto;">
  <div class="row" style="overflow-x:auto;">
   <h4>    la solicitud  de cuenta de todos nos clientes</h4>
    <table class="table table-striped table-bordered nowrap" id="example" style="width:100%">
      <thead>
      <tr style="background:#5957F7;color:white">
	 <th><strong>#</strong></td>
	 <th><strong>Nombre</strong></td>
	 <th><strong>Apellido</strong></td>
	 <th><strong>Género</strong></td>
	<th><strong>Email</strong></td>
	 <th><strong>Contraseña</strong></td>
	<th><strong>Ubicación de trabajo</strong></td>
	 <th><strong>Servicio prestado</strong></td>
	<th><strong>Teléfono</strong></td>
	 <th><strong>Creer una cuenta</strong></td>
	 </tr> 
	 </thead>
	  <tbody>
     <?php foreach($EMPLOYEES as $employee)
	 
	 {
			
		 $employee = (object)$employee;
	
		 ?>
     <tr>
	 <td class="id_acd"><?=$employee->id_acd;?></td>
	 <td class="nombre"><?=$employee->nombre;?></td>
	 <td class="apellido"><?=$employee->apellido;?></td>
	 <td class="apellido"><?=$employee->gender;?></td>
	 <td class="email"><?=$employee->email;?></td>
	 <td class="email"><?=$employee->password;?></td>
	 <td class="ubicacion"><?=$employee->ubicacion;?></td>
	 <td class="servicio"><?=$employee->servicio;?></td>
	 <td class="telefono"><?=$employee->telefono;?></td>
	 
	  <td>
	   <button class="copyToModal" data-toggle="modal"   data-target="#myModal"  class="btn btn-warning btn-open-my-modal">
             <span class="fa fa-plus" aria-hidden="true"></span>
        </button>
       
      </td>
	   </tr> 
	   
         <?php
	    }
	
	 
	    ?>
	 </tbody>
    </table>
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">

                <div class="modal-content">
                 <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Creation de une nueva cuenta</h4>
                    </div>
                    <div class="modal-body">
             <form id="userText" method="post" class="form-horizontal" action="<?php echo site_url('user_Authentication/password_send');?>" > 
                     <input type="hidden" class="form-control" id="id_acd" name="id_acd"   >
					  <div class="form-group">
							 <label class="control-label col-sm-2">Nombre:</label>
							 <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" id="nombre"   readonly>
								</div>
                            </div>
                            <div class="form-group">
							 <label class="control-label col-sm-2">Apellido:</label>
							 <div class="col-sm-10">
                                <input type="text" class="form-control" name="apellido"   id="apellido"   disabled>
								</div>
                            </div>
							<div class="form-group">
							 <label class="control-label col-sm-2">Email:</label>
							 <div class="col-sm-10">
                                <input type="text" class="form-control" name="email"  id="email"  readonly>
								</div>
                            </div>
							<div class="form-group">
							 <label class="control-label col-sm-2">Telefono:</label>
							 <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono" id="telefono" readonly>
								</div>
                            </div>
							<div class="form-group">
							 <label class="control-label col-sm-2">Contraseña:</label>
							 <div class="col-sm-10">
                                <input type="text" class="form-control" name="contrasena" value="<?php echo rand_string(10);?>"  readonly>
								</div>
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-check"></i> Enviar una conseña por este cliente</button>
								 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </p>

                         </form>
</div>
</div>
</div>
</div>
</div>
</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

     <script type="text/javascript">
   // On passe notre variables PHP au javascript grace à json_encode.
      $(".copyToModal").click(function (){

    var id_acd = $(this).closest("tr").find(".id_acd").text();
    var nombre = $(this).closest("tr").find(".nombre").text();
	var apellido = $(this).closest("tr").find(".apellido").text();
	var email = $(this).closest("tr").find(".email").text();
	var telefono = $(this).closest("tr").find(".telefono").text();
	 // $("#userText").text(icd+" "+nombre +apellido +ubicacion +servicio +email +telefono);
	 $('#id_acd').val(id_acd);
   $('#nombre').val(nombre);
   $('#apellido').val(apellido);
    $('#email').val(email);
	$('#telefono').val(telefono);
	
})
$('#myModal').on('hidden.bs.modal', function () {
 location.reload();
})	





$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },
		 "createdRow": function( row, data, index ) {
             if ( data[5] != "" ) {        
         $('td', row).eq(9).hide();
		 // $('td').eq(9).addClass('red');
     
       }
      

    }
    } );
} ); 



     
    </script>

  </div>
  </section >  
 </body>
</html>