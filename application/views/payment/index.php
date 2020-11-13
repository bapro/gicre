<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMEDICALL</title>
    <!-- Bootstrap -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
    <style type="text/css">
    .center-block {
    padding:10px;
    background-color:#eceadc;
    color:#ec8007
    }
	
	.new-log .img{
 display: block;
margin: 0 auto;

}
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
    <div class="row">
 <div class="center-block">
<div class="alert alert-warning" style="text-align:center">
  <h3><?= $payment_info; ?></h3>
  <a href="<?php echo base_url('login')?>">Volver</a>
</div>
<div class="new-log">
<img class="img img-responsive" style="width:400px" src="<?= base_url();?>assets/img/logo-gicre-t.png"  alt=""/>
</div>

</div>
    </div>
    </div>
	 </div>
  </body>
  <hr/>
 <?php
        $this->load->view('footer');
 ?>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 
</html>
