<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admedicall</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">


	   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
    
     <link href="<?= base_url();?>assets/css/themes.css" rel="stylesheet" type="text/css" />
    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
  <?php
$name=($this->session->userdata['staff_name']);
$perfil=($this->session->userdata['staff_perfil']);


$this->load->view('asistente_medico/header');
 ?>   	
<body>
 <!-- *** welcome message modal box *** -->
  <div class="modal fade" id="myModal" role="dialog">
  

    <div class="modal-dialog modal-sm">
    
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
                     <!--    <button type="submit" href="dsfsf.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                   <h4 style="text-align:center;color:green">Bienvedio <?= $name; ?> </h4>
                    </div>
      
                 
      </div>
      
    </div>
  </div>
<hr id="hr_ad"/>
 <div id="result_ver"></div>
 <div class="container">
  <div class="row">

 <div class="col-md-12"><h3>Citas Confirmadas</h3></div><br/>

<?php 
$cpt="";
?>

<div class="row">
  <div class="col-md-3" style=""> 
<select id="centro_medico" name="centro_medico"  class="form-control" >
 <option value="Todos los centros médicos">Todos los centros médicos</option>
 <?php 
foreach($centro_medico as $row)
 { 
  echo '<option value="'.$row->name.'">'.$row->name.'</option>';
 }
 ?>
</select>
<a href="#" id="ver_todo" style="display:none" onclick="window.location.reload()"   class="btn btn-primary btn-xs" >Todos los centros médicos </a>

</div>


<div class="col-md-9" style="background:#5957F7;color:white"> 
 <form class="form-inline" method="post" >
<div class="form-group">
<label for="desde">Desde</label><input type="text" id="date_from" name="date_from" class="form-control">
</div>
<div class="form-group">
<label for="hasta">Hasta</label><input type="text"id="date_to" name="date_to" class="form-control">
</div>
<button type="submit" id="click_button" class="btn btn-default">Ver</button>
</form>

 </div>
</div>
 <hr id="hr_ad"/>

<div  id="results"></div>
<div  id="results_datepicker"></div>

<div class="row"  id="dis" >
    <table class="table table-striped table-bordered display" id="example">

     <tr style="background:#5957F7;color:white">
	 <th><strong>NEC</strong></th>
	 <th><strong>Fecha Propuesta</strong></th>
	 <th><strong>Doctor</strong></th>
	 <th><strong>Patiente</strong></th>
	
	
	 </tr>
 
     <?php foreach($centro_medico as $row)
	 
	 {
		 
		if ( $cpt==0 ) {
			$cpt=1;
			$colorBg = "#E0E5E6";
				} 
			else {
				$cpt=0;
				$colorBg = "#E0E5E6";
				}
				
		$app=$this->db->select('*')->where('centro_medico',$row->id_m_c )
   ->get('patients_appointments')->row_array();
?>

    <tr bgcolor="<?=$colorBg ;?>">
	 <td class="id"><?=$app['id_p_a'];?></td>
	 <td class="fecha_propuesta"><?=$app['fecha_propuesta'];?></td>
	<?php
	$doctor=$this->db->select('first_name,last_name')->where('id',$app['doctor'] )
   ->get('doctors')->row_array();?>
	  <td class="doctor">
	<!--<a href="<?php echo site_url("admin/Doctor/".$app['doctor']); ?>"><?=$doctor['first_name'];?> <?=$doctor['last_name'];?></a>
	 -->
	<?=$doctor['first_name'];?> <?=$doctor['last_name'];?>
	 </td>
	 <td class="patiente"><?=$app['nombre'];?> <?=$app['apellido'];?>  </td>
	<!--<td class="patiente"><a href="<?php echo site_url("admin/ver_patiente/".$app['id_p_a']); ?>"><?=$app['nombre'];?> <?=$app['apellido'];?> </a> </td>
	-->
	  
	  </tr>  
	   
         <?php
	    }
	  
	?>
    </table>
	</div>
	 <div class="row">
	 <a href="<?php echo site_url('assistentemedico/create_cita');?>" class="btn btn-primary btn-xs">Nueva cita</a></div>
  
  


</div>
<br/><br/><br/>

<div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
 $(window).on('load',function(){
	 
        $('#myModal').modal('show');
    });
setTimeout(function() {$('#myModal').modal('hide');}, 2000);

</script>

</body>

</html>