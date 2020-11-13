<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<!-- owl carousel css -->
<style>
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left}
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
 <div class="col-md-10">
   <h3>Lista de doctores</h3>
 </div>
<!--
<div class="col-md-1 text-right">

 <?php //$this->load->view('admin/view_acciones');?>
 
 </div>-->
</div>
 <hr id="hr_ad"/>

 </div>
 <div class="row">

<div class="col-md-12">
 
 <?php echo $this->session->flashdata('success_msg'); ?>
 </div>
 </div>
 <div class="container text-left" style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th class="col-xs-3">Nombres</th>
<th >Area</th>
<th >Correo Electronico</th>
<th class="col-xs-2" >Telefono</th>
<th class="col-xs-1" >Extension</th>
<th class="col-xs-2" >Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach($all_doctor as $all_d)

{

?>
<tr>
<td style="text-transform:uppercase"><?=$all_d->name;?></td>
<?php 
$area=$this->db->select('title_area')->where('id_ar',$all_d->area )
->get('areas')->row_array();?>
<td><?=$area['title_area'];?></td>
<!--<td><a data-toggle="modal" data-target="#verArea" href="<?php echo site_url("admin/ver_area/".$all_d->area); ?>"><?=$area['title_area'];?> </a></td>-->
<td><?=$all_d->correo;?></td>
<td><?=$all_d->cell_phone;?></td>
<td><?=$all_d->extension;?></td>

<td style="text-align:left">
<a href="<?php echo base_url('admin/doctor/'.$all_d->id_user)?>" class="st" ><i class="fa fa-eye" aria-hidden="true" title="View Doctor"></i></a>
<!--<a href="<?php echo base_url('admin/update_doctor/'.$all_d->id_user)?>" class="st"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar" ></i></a>
<a title="Eliminar" class="st deletedoctor" id="<?=$all_d->id; ?>"  style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->

</td>
</tr>
<?php
}
?>
</tbody>    
</table>

 <div class="modal fade" id="verArea" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
</div>
 </div>
  </div>
 <br/><br/>
 <?php
        $this->load->view('footer');
 ?>
   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 

<script>
$( document ).ready(function() {
    $('#verArea').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
$(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();
 });
 //delete doctor seguro
 
$(".deletedoctor").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctor')?>',
data: {id : del_id},
success:function(response) {

// Removing row from HTML Table
$(el).closest('tr').css('background','tomato');
$(el).closest('tr').fadeOut(800, function(){ 
$(this).remove();
});

}
});
}
})
</script>
</html>