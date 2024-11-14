<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>
<noscript><meta http-equiv="refresh" content="0; url=<?php echo site_url('admin_medico/noJs');?>" /></noscript>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/custom.css?rnd=132" rel="stylesheet">


	
<style>




</style>




</head>
<!-- *** welcome message modal box *** -->
 




<header>

<div id="top" style="background:linear-gradient(to top, white, #E0E5E6);border-top:3px solid #38a7bb;border-bottom:none">
<div class="container">
<div class="row">

<div class="col-xs-12">

<nav class="navbar-default nav-top" style="background:none">
<div class="container-fluid">

</div>
</nav>
</div>
</div>
</div>
</div>

<!-- *** TOP END *** -->

<!-- *** NAVBAR ***
_________________________________________________________ -->

<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" style="border-bottom:1px solid #E6E6FA;border-top:1px solid #E6E6FA;" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" >
<div class="container" >
<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:5%"><img  src="<?=base_url();?>assets/img/gicle1.png" style="width:130px" alt="logo" class="hidden-xs hidden-sm" ></span>
<span style="position:absolute;z-index:3000px;top:5%"><img style="width:110px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span></span>
</a>
<div class="navbar-buttons">
<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
</div>
</div>
<!--/.navbar-header -->
<br/>


</div>
</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>


<body>

<div class="container" >
<h2>ADRIANA MARIBEL MATEO REYES</h2>
<h3>MONTE PLATA (<?=$total_rows?> pacientes)</h3>
<div class="row">
<div class="col-md-12">
<table id="" class="table table-striped sort-me" style="margin:auto"  cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th>NOMBRES </th>
<th>SEXO </th>
<th>CEDULA</th>
<th>TELEFONO</th>
<th>DIRECCION</th>
</tr>
</thead>
<tbody>
<?php
 foreach($patients as $row)
{

?>
<tr>

<td><?=$row->nombre?></td>
<td><?=$row->sexo?></td>
<td><?=$row->cedula?></td>
<td><?=$row->tel_cel?></td>
<td><?=$row->barrio?>, <?=$row->calle?></td>
</tr>

<?php
}
?>
</tbody>    
</table>
  <?php echo $links; ?>
 </div>

</div>

</div>
