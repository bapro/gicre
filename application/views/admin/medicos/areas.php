<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<style>

td,th{text-align:left}

</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
 <div class="container">

<hr id="hr_ad"/>
<div class="col-md-8 col-md-offset-2">
 <?php echo $this->session->flashdata('success_msg'); ?>
 <div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto" width="70%" cellspacing="0">
<thead>
<tr>
<td><input placeholder="Agregar Nuevo Area" id="nuevo-area" style="width:100%" class="form-control"/></td>
<td><button id="btn-nuevo" class="btn btn-primary btn-xs"> Agregar Nuevo</button></td>
</tr>
<tr style="background:#5957F7;color:white">
<th style="width:5px">Areas</th>
<th style="width:1px">Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach($all_areas as $all_a)
{
	
$sqla="SELECT area FROM users where area=$all_a->id_ar";
$querya = $this->db->query($sqla);		
$counta=$querya->num_rows();	


?>
<tr>
<td class="especialidad" style="text-transform:uppercase;text-align:left"><u><?=$all_a->title_area;?></u> | <u><span style="color:red"><?=$counta;?></span> medicos</u>
<ol>
<?php
$sqln="SELECT id_user, name FROM users WHERE area=$all_a->id_ar ";
$queryn= $this->db->query($sqln);
foreach ($queryn->result() as $rn){
?>
<li><a href="<?php echo base_url("admin/update_user/$rn->id_user/1")?>" ><?=$rn->name?></a></li>
<?php
}
?>
</ol>
 </td>
<td style="width:1px" >
<a href="<?php echo base_url('admin/update_area/'.$all_a->id_ar)?>" class="st"  title="Editar" data-toggle="modal"   data-target="#UpdateArea"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<!--<a data-toggle="modal" data-target="#relatedDoctor" class="st linkhover"  href="<?php echo base_url('admin/relatedDoctor/'.$all_a->id_ar)?>">
<span>Doctores conectados a <?=$all_a->title_area;?></span>
<i class="fa fa-link" aria-hidden="true"></i>
</a>
<a href="<?php echo base_url('admin/delete_area/'.$all_a->id_ar)?>" class="st" style="background:rgb(223,0,0)"><i class="fa fa-trash-o" aria-hidden="true" title="Eliminar" onclick="return confirm('¿ estás seguro de eliminar ?')"></i></a>
-->
</td>
</tr>

<?php
}
?>
</tbody>    
</table>
</div>
</div>
<hr/>
 
<div class="modal fade" id="UpdateArea" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>




<div class="modal fade" id="relatedDoctor" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
<br/>
</div>
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
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 
 $(document).ready( function() {
 $('#deletesuccess').delay(3000).fadeOut();

    $('#relatedDoctor').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
	
	 $('#UpdateArea').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    })
	
	
	$('#btn-nuevo').on('click', function(event) {
event.preventDefault();
var title_area  = $("#nuevo-area").val();
if(title_area !=""){
	$("#btn-nuevo").prop("disabled",true);
$.ajax({
type: "POST",
url: "<?=base_url('admin/save_area')?>",
data: {title_area:title_area},
success:function(data){
	alert('Agregado con éxito.');
location.reload(true);
},
});		
} else{
$("#nuevo-area").focus();	
}
});
	
	
	
});

 //setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
  //$('#load_areas').load("<?php echo site_url("admin/load_areas"); ?>").fadeIn("slow");
  //load() method fetch data from fetch.php page
 //}, 1000);
 </script>

</html>