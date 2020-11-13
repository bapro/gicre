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
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
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

td,th{text-align:center}

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
 <hr id="hr_ad"/>
  <div class="container">
   <div class="row">
  
 <div class="col-xs-12">
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 </div>


</div>

 <?php echo $this->session->flashdata('success_msg'); ?>


 <hr id="hr_ad"/>

 <div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto" width="70%" cellspacing="0">
    <thead>
    <tr style="background:#5957F7;color:white">
	   <th style="width:1px"><strong>#</strong></th>
        <th style="width:5px">Municipios</th>
		<th style="width:5px">Provincias</th>
		 <th style="width:1px">Acciones</th>
     </tr>
    </thead>
    <tbody>
    <?php foreach($all_municipio as $all_a)
	 
	 {
	 ?>
        <tr>
		<!--<td style="width:8px"><?php echo $i;$i++;?></td>-->
		<td class="idsm" style="width:1px"><?=$all_a->id_town;?></td>
		<td class="seguro_medico" style="width:5px"><?=$all_a->title_town;?></td>
			<td class="seguro_medico" style="width:5px"><a href="<?php echo base_url('admin/Province/'.$all_a->id)?>" ><?=$all_a->title;?><a/></td>
            <td style="width:1px" >
			<a href="<?php echo base_url('admin/Township/'.$all_a->id_town)?>" class="st" title="Ver" ><i class="fa fa-eye" aria-hidden="true" ></i></a>
          			
			</td>
        </tr>
		
	 <?php
	 }
	 ?>
    </tbody>    
</table>

</div>

<br/>
</div>
 <?php 
 
 
        $this->load->view('footer');
 $this->load->view('admin/modal');

 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script type="text/javascript"> 
 $(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();
 });
 
 
 </script>

</html>