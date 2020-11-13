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
<!-- Custom stylesheet - for your changes -->
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<!-- owl carousel css -->
<style>

td,th{text-align:center}

</style>
</head>
<!-- *** welcome message modal box *** -->

<?php
$this->load->view('admin/header_admin');
$id_user=($this->session->userdata['admin_id']);
?>
<body >
<hr id="hr_ad"/>
<div class="container">
<div class="row">

<div class="col-md-12">
<a href="#" class="btn btn-primary btn-xs st"  title="Crear nuevo seguro medico" data-toggle="modal"   data-target="#NuevaSeguroMedico"  ><i class="fa fa-plus" aria-hidden="true"></i>Nuevo seguro medico</a>

</div>


</div>

<?php echo $this->session->flashdata('success_msg'); ?>


<hr id="hr_ad"/>

<div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto" width="70%" cellspacing="0">
<thead>
<tr style="background:#5957F7;color:white">
<th style="width:5px">Seguro Medico</th>
<th style="width:2px">Logo</th>
<th style="width:5px">RNC</th>
<th style="width:1px">Acciones</th>
</tr>
</thead>
<tbody>
<?php foreach($all_seguro_medico as $all_a)

{
?>
<tr>
<td  style="width:5px;text-transform:uppercase"><?=$all_a->title;?></td>
<td>
<?php 
if($all_a->logo==""){
	$logo="";
}
else {
$logo='<img  style="width:90px;" src="'.base_url().'/assets/img/seguros_medicos/'.$all_a->logo.'"  />';	
}
 ?>
<?php echo $logo; ?>
</td>
<td  style="width:5px"><?=$all_a->rnc;?></td>
<td style="width:1px" >
<a data-toggle="modal" data-target="#EditSeguroMedico" class="st" title="Editar" href="<?php echo base_url("admin/EditSeguroMedico/$all_a->id_sm")?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a data-toggle="modal" data-target="#relatedCentroMedico" class="st" href="<?php echo base_url('admin/RelatedCentro/'.$all_a->id_sm)?>" title="Centros medicos conectados "><i class="fa fa-link" aria-hidden="true"></i></a>

<a title="desactivar" id="<?=$all_a->id_sm; ?>"  class="st deleteseguro" style="background:rgb(223,0,0)"><i class="fa fa-times" aria-hidden="true" ></i></a>

</td>
</tr>
<?php
}
?>
</tbody>  

  
</table>

</div>
<hr/>
<div class="row">
<div class="col-md-12">

<a href="#" class="btn btn-primary btn-xs st"  title="Crear nuevo seguro medico" data-toggle="modal"   data-target="#NuevaSeguroMedico"  ><i class="fa fa-plus" aria-hidden="true"></i>Nuevo seguro medico</a>
<br/><br/>
</div>
</div>

<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<div class="modal fade" id="relatedCentroMedico" tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-body">
</div>
</div>
</div>
</div>
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
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 

$( document ).ready(function() {
$('#relatedCentroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#EditSeguroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});

$('#deletesuccess').delay(3000).fadeOut();

//delete seguro

$(".deleteseguro").click(function(){
if (confirm("Estás seguro de desactivar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/delete_seguro_medico')?>',
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
});

});


function get_detail()
{
var size=$('#picture')[0].files[0].size;
var extension=$('#picture').val().replace(/^.*\./, '');
switch (extension) {
case 'png': case 'jpeg': case 'jpg':
$('#divFiles').hide();
$('#send').prop("disabled",false);
break;
default:
$('#picture').val("");
$('#divFiles').show();
$('#divFiles').text('Esta extension es prohibida : ' + extension );
$('#send').prop("disabled",true);
}


}


	
$('.save-new-seguro').click(function(e) { 

if($("#title_ns").val() == "" ||  $("#rnc").val() == "" ||  $("#tel").val() == "" ||  $("#email").val() == "" ||  $("#direccion").val() == "" ){
$("#erBox").html("Todos los campos son obligatorios !");
return false;
} 
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        $("#erBox4").html("Debes marcar al menos una casilla por el seguro medico !");
        return false;
      }

});




</script>

</html>