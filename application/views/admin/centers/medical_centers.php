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
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left}
</style>
</head>
<!-- *** welcome message modal box *** -->
 
 <?php
        $this->load->view('admin/header_admin');
 ?>
<body >
  <div class="container">

<div class="row">

<div class="col-md-12">
 
 <?php echo $this->session->flashdata('success_msg'); ?>
 </div>
 </div>
 <hr id="hr_ad"/>
 <div class="row">
 <div class="col-md-12">

 <a href="<?php echo base_url('admin/new_centro_medico')?>" class="btn btn-primary btn-xs st"  title="Crear medical center"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva centro medico</a>
				
 </div>
</div>
<hr id="hr_ad"/>
 <div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
	<tr><h3>Centros Medicos</h3></tr><br/>
    <tr style="background:#5957F7;color:white">
	  <th class="col-xs-3">Nombre</th>
		<th class="col-xs-1">Logo</th>
        <th class="col-xs-1" >Primer Telefono</th>
		<th class="col-xs-1" >Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($all_medical_centers as $all_m_c)
	 
	 {
	 ?>
        <tr>
		<td><h4><?=$all_m_c->name;?></h4>
		<h5>Asistente medico</h5>
		<?php
		$sqld ="SELECT id_doctor FROM  doctor_centro_medico WHERE centro_medico=$all_m_c->id_m_c";
		$queryd= $this->db->query($sqld);
		foreach ($queryd->result() as $rowd){
		$asdoc=$this->db->select('name')->where('id_user',$rowd->id_doctor)->get('users')->row('name');
		echo "<p style='color:blue'>$asdoc</p>";
		}
		?>

		</td>
		<td><img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $all_m_c->logo; ?>"  /></td>
            <td><?=$all_m_c->primer_tel;?></td>
			<td style="text-align:left">
			<a href="<?php echo base_url('admin/update_centro_medico/'.$all_m_c->id_m_c)?>" class="st" title="Editar" ><i class="fa fa-pencil" aria-hidden="true" title="Editar" ></i></a>
          	<a href="<?php echo base_url('admin/centro_medico/'.$all_m_c->id_m_c)?>" class="st"><i class="fa fa-eye" aria-hidden="true" title="Editar" ></i></a>
          	
			
			<a title="desactivar"  id="<?php echo $all_m_c->id_m_c?>" class="st deletecentro" style="background:rgb(223,0,0)"><i class="fa fa-times" aria-hidden="true" ></i></a>
			
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

 <a  class="btn btn-primary btn-xs st "  title="Crear medical center"   ><i class="fa fa-plus" aria-hidden="true"></i>Nueva centro medico</a>
				
 </div>
</div>
 </div>
 </div>
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
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>-->
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript"> 
 //delete centro_medico
 
$(".deletecentro").click(function(){
if (confirm("Estás seguro de desactivar ?"))
{ 
var el = this;
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row

$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteCentroMedico')?>',
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