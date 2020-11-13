
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

 <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  

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

</head>

 <!-- *** welcome message modal box *** -->
 
 <?php 
 $this->load->view('admin/header_admin');
 $i = 1;
 ?>
<hr id="hr_ad"/>
<div class="container" >

<div class="row">
   
 <div class="col-xs-10">
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 </div>
 <div class="col-xs-2 text-right acionesright">
 <?php $this->load->view('admin/view_acciones');?>
 
 </div>

</div>
 <hr/>
 <div class="row" id="background_">
 <div class="col-md-12">
 <h3>Agenda</h3>
 </div><br/>
 
 </div><br/>
 <div class="row" id="background_">
 <table class="table table-striped table-bordered" >
<?php foreach($DIARY as $diary) 
	 
	 {
	 ?>
        <tr>
          <th class="thh">#</th>
           <td class="vtd"><?=$diary->id;?></td>
	  </tr>
        <tr>
          <th class="thh">Nombre</th>
     <td class="vtd"><?=$diary->title;?></td>

        </tr>
        
		
		 <?php
	 }
	 ?>
  
	</table>
	</div>
 <hr id="hr_ad"/>
<section  >
<div class="col-md-12" >
<div class="heading text-left">
<h3>Datos Relaccionados</h3>
</div>

<ul class="nav nav-pills nav-left">
<li class="active"><a href="#doctor" data-toggle="tab">Doctores</a></li>
</ul>
<div class="tab-content tab-content-inverse" id="">

<div class="tab-pane active" id="doctor">
<?php if (empty($DIARY_DOCTORS))
{
echo"<div class='alert alert-warning'> No hay doctor por esta agenda. </div>";
?>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('admin/new_doctor');?>">Nuevo doctor</a>
<?php
}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered" width="100%" style="font-size:15px" cellspacing="0">
<thead>
<tr style="background:#38a7bb;color:white" class="alternate">
<th>#</th>
<th>Nombre</th>
<th>Apellidos</th>
<th>Telefono</th>
<th>Coreo El.</th>
<th>Area</th>
<th>Aciones</th>
</tr>
</thead>
<tbody>
<?php 
foreach($DIARY_DOCTORS as $id_doc){
$id_doctor=$id_doc->id_doctor;
	 $sql = "SELECT *  FROM doctors inner join areas on doctors.area=areas.id_ar where id='$id_doctor'";
     $query_doctor = $this->db->query($sql)->result();
	 foreach ($query_doctor as $key=>$row_doctor) {
		 

?>
<tr>
<td  style="text-align:left"><?=$row_doctor->id;?></td>
<td  style="text-align:left"><?=$row_doctor->first_name;?></td>
<td  style="text-align:left"><?=$row_doctor->last_name;?></td>
<td  style="text-align:left"><?=$row_doctor->cell_phone;?></td>
<td  style="text-align:left"><?=$row_doctor->email;?></td>
<td  style="text-align:left"><?=$row_doctor->title_area;?></td>

<td  style="text-align:left">
<a  href="<?php echo base_url('admin/Doctor/'.$row_doctor->id)?>"  title="Ver" ><i class="fa fa-eye" aria-hidden="true"></i></a>
<a href="<?php echo base_url('admin/delete_area/'.$row_doctor->id)?>" title="Editar" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a href="<?php echo base_url('admin/delete_area/'.$row_doctor->id)?>" title="Eliminar" class="st" style="color:rgb(223,0,0);background:none;border:none"><i class="fa fa-trash-o" aria-hidden="true" title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')"></i></a>
</td>
</tr>

<?php
}
	 }
?>
</tbody>
</table>
</div>
<?php
}

?>


</div><!-- solicitudes ends-->
</div><!-- /.tabs content end -->

</div><!-- col m12 end -->


</section>
<div class="row">
   
 <div class="col-xs-12">
<a class="btn btn-primary btn-xs" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
 </div>
</div>
</div>
<br/><br/>
 <?php $this->load->view('footer');?>


 </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
    $('#verArea').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});

$(document).ready(function()
{
  $("tr:odd").css({
    "background-color":"#DDDEDF",
    "color":"#056B7C"});
});
</script>

</html>