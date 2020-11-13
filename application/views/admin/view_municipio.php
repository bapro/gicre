
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
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
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
 $cpt="";
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
 <h3>Municipio</h3>
 </div><br/>
 <!--<div class="col-md-2 text-right acionesright">
  <div class="dropdown"><?php
	  foreach($MUNICIPIO as $row) ?>
  <button class="btn btn-primary btn-xs dropdown-toggle atras" type="button" data-toggle="dropdown" data-hover="dropdown">
   Editor <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <li><a  href="<?php echo base_url('admin/UpdateDoctor/'.$row->id)?>">Editar</a></li>
  
  </ul>
</div>
 </div>-->
 </div><br/>
 <div class="row" id="background_">
 <table class="table table-striped table-bordered" >

	 <?php
	 
	 
	 {
	 ?>
        <tr>
          <th class="thh">#</th>
           <td class="vtd"><?=$row->id_town;?></td>
	  </tr>
        <tr>
          <th class="thh">Municipio</th>
     <td class="vtd"><?=$row->title_town;?></td>

        </tr>
		<tr>
          <th class="thh">Provincia</th>
     <td class="vtd"><a href="<?php echo base_url('admin/Province/'.$row->id)?>" ><?=$row->title;?><a/></td>

        </tr>
        
		
		 <?php
	 }
	 ?>
  
	</table>
	</div>
 <hr id="hr_ad"/>

<div class="modal fade" id="verArea" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div>
    </div>
</div>


 
<section  >
<div class="col-md-12" >
<div class="heading text-left">
<h3>Datos Relaccionados</h3>
</div>

<ul class="nav nav-pills nav-justified">
<li class="active"><a href="#agenda" data-toggle="tab">Direcciones</a></li>
<li><a href="#centromedico" data-toggle="tab">Centro Medico</a></li>

</ul>
<div class="tab-content tab-content-inverse" id="">
<div id="agenda_hide"></div>
<div class="tab-pane active" id="agenda">
<?php if (empty($MUNICIPIO_DIRECION))
{
echo"<div class='alert alert-warning'>  No hay Agendas registradas por este doctor. </div>";

}
else{	
?>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered" id="tabref" cellspacing="0" >
<tr style="background:#38a7bb;color:white">
<th class="tablerelaciones"><strong>#</strong></th>
<th class="tablerelaciones"><strong>Direcciones</strong></th>
<!--<th class="tablerelaciones"><strong>Municipio</strong></th>-->
<th class="tablerelaciones"><strong>Section</strong></th>
<th class="tablerelaciones" style="width:1px"><strong>Acciones</strong></th>
</tr>
		
<?php foreach($MUNICIPIO_DIRECION as $row)

{
	if ( $cpt==0 ) {
			$cpt=1;
			$colorBg = "#E0E5E6";
				} 
			else {
				$cpt=0;
				$colorBg = "#E0E5E6";
				}

?>

<tr bgcolor="<?=$colorBg ;?>">
<td class="ida" style="width:2px" ><?=$row->id_prov;?></td>
<td class="especialidad" style="font-size:15px;width:5px"><?=$row->street;?></td>
<!--<td class="especialidad" style="font-size:15px;width:5px"><?=$row->title_town;?></td>-->
<td class="especialidad" style="font-size:15px;width:5px"><?=$row->section;?></td>
<td style="width:3px">
<!--<a href="<?php echo base_url()?>admin/Diary/<?=$row->id_prov?>" title="Ver"  ><i class="fa fa-eye" aria-hidden="true" ></i></a>-->
<a title="Eliminar"  class="trash" id="<?=$row->id_prov; ?>" style="color:rgb(223,0,0);cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true" ></i> </a>	

</td>

</tr> 
	   
<?php
}

?>

</table>
</div>
<?php
}

?>
</div><!--agenda end -->

<div class="tab-pane" id="centromedico">
<?php if (empty($CENTRO_MEDICO_MUNCIPIO))
{
echo"<div class='alert alert-warning'>  No hay centro medico registradas por este doctor. </div>";
?>

<?php
}
else{	
?>
<div style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" style="margin:auto;" cellspacing="0" >

<tr style="background:#38a7bb;color:white">
<th class="tablerelaciones"><strong>#</strong></th>
<th class="tablerelaciones"><strong>Centro medico</strong></th>
<th class="tablerelaciones"><strong>Primero tel</strong></th>
<th class="tablerelaciones"><strong>Segundo tel</strong></th>
<th class="tablerelaciones" ><strong>Fax</strong></th>
<th class="tablerelaciones" style="width:1px"><strong>Acciones</strong></th>
</tr>
		
<?php foreach($CENTRO_MEDICO_MUNCIPIO as $c_m_s)

{
			if ( $cpt==0 ) {
			$cpt=1;
			$colorBg = "#E0E5E6";
				} 
			else {
				$cpt=0;
				$colorBg = "#E0E5E6";
				}
?>

<tr bgcolor="<?=$colorBg ;?>">
<td class="idsm" style="width:2px" ><?=$c_m_s->id_m_c;?></td>

<td class="seguro_medico" style="font-size:15px;width:5px"><?=$c_m_s->name;?></td>
<td class="seguro_medico" style="font-size:15px;width:5px"><?=$c_m_s->primer_tel;?></td>
<td class="seguro_medico" style="font-size:15px;width:5px"><?=$c_m_s->segundo_tel;?></td>
<td class="seguro_medico" style="font-size:15px;width:5px"><?=$c_m_s->fax;?></td>
<td style="width:10px">
<a  title="Ver" href="<?php echo base_url()?>admin/CentroMedico/<?=$c_m_s->id_m_c?>"  ><i class="fa fa-eye" aria-hidden="true"></i></a>

<a  title="Editar" href="<?php echo base_url()?>admin/UpdateCentroMedico/<?=$c_m_s->id_m_c?>"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<a title="Eliminar" class="trashcentro" id="<?=$c_m_s->id_m_c; ?>"  style="color:rgb(223,0,0);cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>

</td>
</tr> 
   
<?php
}

?>

</table>
</div>
<?php
}
?>
</div><!--centro medico end-->

</div><!-- /.tabs content end -->

</div><!-- col m12 end -->


</section>
</div><!-- container end -->
<?php $this->load->view('footer');
  $this->load->view('admin/modal');
 
 
 ?>

 </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script>

 $(".trash").click(function(){
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		var el = this;
   var del_id = $(this).attr('id');
   var rowElement = $(this).parent().parent(); //grab the row

   $.ajax({
            type:'POST',
            url:'<?=base_url('admin/deleteProvinceDirection')?>',
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
 
 
 
 
 
   $(".trashcentro").click(function(){
	if (confirm("Estás seguro de eliminar ?"))
			{ 
		var el = this;
   var del_id = $(this).attr('id');
   var rowElement = $(this).parent().parent(); //grab the row

   $.ajax({
            type:'POST',
            url:'<?=base_url('admin/deleteMunicipioCentro')?>',
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