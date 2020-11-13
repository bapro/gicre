<?php
$delay='';
$plan= $this->db->select('plazo,cuenta_gratis,payment_plan')->where('id_user',$this->session->userdata['medico_id'])->get('users')->row_array();
	  	//doctor has a free account
	if($plan['cuenta_gratis']==0){
$account_info='<div class="col-xs-11 alert alert-info"  >
  <strong>Usted tiene una cuenta gratuita !</strong>
</div>';	 
	 //doctor must pay
	}else{
		if($plan['payment_plan']==1){
   $termDate1=date('Y-m-d', strtotime($plan['plazo']. ' + 31 days'));
   $termDate = date("d-m-Y", strtotime($termDate1));
   $contradate = date("d-m-Y", strtotime($plan['plazo']));
 $account_info="<div class='col-xs-11 alert alert-info' style='text-align:center'  >
  <strong>Usted tiene una cuenta mensual, fecha inicial: $contradate, fecha de vencimiento: $termDate!</strong>
</div>";

//------CALCUL DELAY MENSUAL-----------------------------------------------------
$delay=date('d-m-Y', strtotime($plan['plazo']. ' + 31 days'));

$start  = date_create(date("Y-m-d",strtotime($delay)));
$end 	= date_create(); // Current time and date
$diff  	= date_diff( $start, $end );
$delay="<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";
}
else{
		//doctor must pay anualy
$termDate1=date('Y-m-d', strtotime($plan['plazo']. ' + 365 days'));
$termDate = date("d-m-Y", strtotime($termDate1));
$contradate = date("d-m-Y", strtotime($plan['plazo']));
 $account_info="<div class='col-xs-11 alert alert-info' style='text-align:center' >
  <strong>Usted tiene una cuenta anual, fecha inicial: $contradate, fecha de vencimiento: $termDate!</strong>
</div>";

$delay=date('d-m-Y', strtotime($plan['plazo']. ' + 365 days'));

$start  = date_create(date("Y-m-d",strtotime($delay)));
$end 	= date_create(); // Current time and date
$diff  	= date_diff( $start, $end );
$delay="<span style='color:red;text-transform:lowercase'>le quedan $diff->days días</span> ";


		
	}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
  <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"> 
	<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?=base_url();?>assets/css/passwordscheck.css" rel="stylesheet">
    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
 <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<style>
th{text-align:center}
td{font-size:17px}

label{color:black}
	img.img-responsive{max-width : 18%;
heigth: auto;
display: block;}

a.active   
{
    outline: 0;
}
.req{color:red}






/* Firefox old*/
@-moz-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 

@-webkit-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
}
/* IE */
@-ms-keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 
/* Opera and prob css3 final iteration */
@keyframes blink {
    0% {
        opacity:1;
    }
    50% {
        opacity:0;
    }
    100% {
        opacity:1;
    }
} 
.blink-image {
    -moz-animation: blink normal 2s infinite ease-in-out; /* Firefox */
    -webkit-animation: blink normal 2s infinite ease-in-out; /* Webkit */
    -ms-animation: blink normal 2s infinite ease-in-out; /* IE */
    animation: blink normal 2s infinite ease-in-out; /* Opera and prob css3 final iteration */
}
</style>

   <script>

// Add event listener offline to detect network loss.
window.addEventListener("offline", function(e) {
    showPopForOfflineConnection();
});

// Add event listener online to detect network recovery.
window.addEventListener("online", function(e) {
    hidePopAfterOnlineInternetConnection();
});

function hidePopAfterOnlineInternetConnection(){
	$('#myModalConnection').modal('hide');
	$('#myModalConnectionBack').modal({
	backdrop: 'static',
	keyboard: false
	})

    // Set a timeout to hide the element again
    setTimeout(function(){
        $("#myModalConnectionBack").modal('hide');
    }, 2000);
	

}

function showPopForOfflineConnection(){
	
$('#myModalConnection').modal({
backdrop: 'static',
keyboard: false
})
$(".spinning-me").fadeIn().html('<span style="font-size:15px;color:#B3AF76" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load text-danger"></span>');

}

</script>


</head>
<!-- *** welcome message modal box *** -->
 
<?php
 if(empty($this->session->userdata['medico_id'])){
redirect('https://www.admedicall.com');	
 }


$id_usr=$this->session->userdata['medico_id'];

$area_id= $this->db->select('area')->where('id_user',$id_usr)->get('users')->row('area');
$area= $this->db->select('title_area')->where('id_ar',$area_id)->get('areas')->row('title_area');

//----------------------------------------------------------------------------------------------
$sql = "SELECT * from message_to_users where userid=$id_usr and seen=0";
$query= $this->db->query($sql);
if($query->num_rows() > 0){
$updatetext="Tenemos actualizacion en el sistema.";
$show="";	
} else{
$updatetext="";	$show="none";
}

if($area_id=='87'){
$opto_med='display:none';
}else{
$opto_med='';	
}
?>



<header>


<div class="navbar-affixed-top" data-spy="affix" data-offset-top="300" >

<div class="navbar navbar-default yamm" role="navigation" id="navbar" style=" background:linear-gradient(to top, white, #E0E5E6">

<div class="container" >
<div class="navbar-header">

<a class="navbar-brand home">

<span style="position:absolute;z-index:3000px;top:-2px"><img src="<?=base_url();?>assets/img/gicle1.png" style="width:160px" alt="logo" class="hidden-xs hidden-sm" ></span>
<img style="width:110px" src="<?= base_url();?>assets/img/gicle1.png" alt="Admedicall" class="visible-xs visible-sm"><span class="sr-only">Admedicall</span>
</a>
<div class="navbar-buttons">
<button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
<span class="sr-only">Toggle navigation</span>
<i class="fa fa-align-justify"></i>
</button>
</div>
</div>
<!--/.navbar-header -->
<br/>
<div class="navbar-collapse collapse" id="navigation" style="font-size:10px;">

<ul class="nav navbar-nav" style="margin-left:10%"  >

 <?php
 $this->load->view('medico/view_acciones');

 if($this->session->userdata['medico_perfil']=='Medico'){
	$show_delay=$delay; 
 }else{
	$show_delay='';  
 }
 ?>

</ul>
 <ul class="nav navbar-nav navbar-right">
<li class="dropdown"  >

  <a title="<?= $this->session->userdata['medico_name']; ?> : admin de Admedicall " class="dropdown-toggle" style="cursor:pointer" data-toggle="dropdown" data-hover="dropdown">
  <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?= $this->session->userdata['medico_name']; ?> 
 <span class="caret"></span>
  </a>
  <ul class="dropdown-menu" >
 <li><a><?= $this->session->userdata['medico_perfil']; ?> <?= $area; ?><br/><?=$show_delay?></a></li>
  <li><a  href="<?php echo base_url('medico/chatBox')?>" ><i class='fa fa-comments' style='font-size:20px'></i> Chatear</a></li>
 <li><a href="<?php echo site_url('medico/update_user');?>" ><i class="fa fa-eye"></i> Mi Cuenta</a></li>
 <?php if($this->session->userdata['medico_perfil']=='Medico'){?>
 <li style="<?=$opto_med?>"><a href="<?php echo site_url('medico/payment_received');?>" ><i class="fa fa-circle-o"></i> Servicio</a></li>
  <li style="<?=$opto_med?>"><a href="<?php echo site_url('medico/laboratory');?>" ><i class="fa fa-flask"></i> Laboratorios</a></li>
 <?php } ?>
<li><a href="<?php echo site_url('login/medico_logout');?>" ><i class="fa fa-sign-out"></i>  cerrar sesión</a></li>
 </ul>

</li>
<li id='new_message' >
</li>



</ul>

</div>

</div>


</div>
<!-- /#navbar -->
</div>

<!-- *** NAVBAR END *** -->
</header>


<body>

 <hr id="hr_ad"/>
<div class="container" >
<div class="row">
<div class="col-xs-1 hide-me">
<a class="btn btn-primary btn-xs" title="<- atras" onclick="history.back();"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>
<?php 
$sql ="SELECT * FROM  hc_cirugia_reporte WHERE id_user=$id_usr ORDER BY id ASC";
$cirugia_toracico= $this->db->query($sql);
 ?>
</div>
<!--<div class="col-md-2">
 <img style="width:150px" class="blink-image" src="<?= base_url();?>/assets/img/feliz-año-nuevo-2019-mundolover-670x445.jpg"  />
</div>-->

<?=$account_info?>

<div class="col-md-12">
<div id="new-update"></div>

</div>
<br/><br/>

</div>
 <hr id="hr_ad" class="hide-me"/>
<a name="anchor"> </a>

<!--<div class="modal fade" id="messageViewed" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
        
        </div>
    </div>
</div>-->



<div class="modal fade" id="update" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg" >
        <div class="modal-content" >
	
        </div>
    </div>
</div>


<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<h4>Parece que su conexión a Internet está fuera de línea.</h4>
</div>
<div class="alert alert-warning text-center"><i> Intentando reconectar </i><span class="spinning-me" ></span></i></div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="myModalConnectionBack" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-success text-center">
<h4>Esta connectado.</h4>
</div>
</div>
</div>
</div>
</div>



<div class="modal fade" id="historial-clinica-reporte-general" role="dialog">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 class="modal-title">Reporte General de la historial medica de los pacientes (<?=$cirugia_toracico->num_rows()?>)</h3>
 </div>

<div class="modal-body" >
<?php 

if($cirugia_toracico->num_rows() > 0){
?>
<div style="overflow-x:auto">
<table class='table table-striped' >
 <thead>
<tr  style="background:#5957F7;color:white">
<th>#</th><th>PACIENTE</th><th>REPORTE</th><th>DETALLE</th><th>FECHA</th>
</tr>
</thead>
<tbody>
<?php 
$i=1;
foreach($cirugia_toracico->result() as $row){
	$patientehcn=$this->db->select('nombre')->where('id_p_a',$row->id_patient)->get('patients_appointments')->row('nombre');
	$fecha= date("d-m-Y H:i:s", strtotime($row->inserted_time));
?>
 <tr>
 <td style='font-size:11px'><?php echo $i; $i++;  ?></td>
<td style='font-size:11px'><?=$patientehcn?></td>
<td style='font-size:11px'><?=$row->reporte?></td>
<td style='font-size:11px'><?=$row->detalle?></td>
<td style='font-size:11px'><?=$fecha?></td>
</tr>
<?php 
}
?>
</tbody>
</table>
 </div>
<?php 
}
?>
</div>
</div>
</div>
</div>
<script>
setInterval(function(){
  $('#new_message').load("<?php echo base_url('medico/newMessageReceived')?>").fadeIn("slow");
 }, 1000);

 
setInterval(function(){
  $('#new-update').load("<?php echo base_url('admin_medico/show_update/'.$id_usr)?>").fadeIn("slow");
 }, 1000);
	
</script>
