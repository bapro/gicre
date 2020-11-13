<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>



<div  class="container" id="background_">

<div class="row">
<div class="col-md-6 col-md-offset-1">

<h1><i class="fa fa-print"></i>  IMPRIMIR</h1>

<?php 
$url1='<a class="btn btn-primary btn-md"  href="'.base_url().'printings/print_emergency/'.$id1.'/'.$id2.'/'.$id3.'/'.$id4.'/'.$id5.'/'.$id6.'/1" > con la foto</a>';	
$url2='<a  class="btn btn-primary btn-md" href="'.base_url().'printings/print_emergency/'.$id1.'/'.$id2.'/'.$id3.'/'.$id4.'/'.$id5.'/'.$id6.'/0" > sin la foto</a>';	

echo $url1; echo"   ";echo $url2;
?>

 </div>
 </div>
 </div>