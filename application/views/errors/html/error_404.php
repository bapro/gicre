<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$ci = new CI_Controller();
$ci =& get_instance();
$ci->load->helper('url');
//$ci->load->view('index');
?>
<!--<meta http-equiv="refresh" content="0; url=https://www.admedicall.com.do" />-->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ADMEDICALL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
 <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<style type="text/css">
   #center .img-responsive {
    margin: 0 auto;
}
</style>
</head>
<div class="container">
<div  style="margin-top:120px;">

<h1 class="h1 text-center"> La pagina que tu busquas no existe..</h1>
<p class="text-center"><a href="javascript:history.go(-1)">Volver a la página anterior</a></p>
</div>
<div id="center">
<img class="img-responsive"  src="<?= base_url();?>assets/img/sorry.jpeg" alt=""/>

</div>

</div>
</html>