<?php
$medico="medico";
$centro="centro";
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<title>Solicitud de cita, Hospital General Regional Dr. Marcelino Vélez Santana</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap and Font Awesome css -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet">

<style>
.control-label{text-transform:uppercase;font-weight:bold}
.input-group-addon span{height:20px}
</style>
</head>
<?php
$name=($this->session->userdata['cauter_name']);
$medico_id=($this->session->userdata['cauter_id']);


$this->load->view('cauter/header');


?>
<hr style="background:#38a7bb;height:1px"/>
<div class="container" style="background:linear-gradient(to top, #64D991, white);border:1px solid #38a7bb;" >

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-md">

<!-- Modal content-->
<div class="modal-content" >
<div class="modal-header" id="background_">
<h3 class="modal-title" align="center" >Desea realizar factura a este paciente ?</h3>
</div>
<div class="modal-body">
<div style="text-align:center" >
<a  class="btn btn-primary btn-sm" href="<?php echo base_url('cauter/create_appointment')?>">  No</a>
<a  class="btn btn-primary btn-sm " id="click-yes">  Si</a>
</div>
<div style="text-align:center;display:none;" id="choose-one">
<br/>
<a  class="btn btn-default btn-sm" href="#">Para Medico ?</a>

<a  class="btn btn-default btn-sm" href="#"> Para Centro Medico ?</a>

<!--
<a  class="btn btn-default btn-sm" href="<?php echo base_url('cauter/patient_billing/'.$medico)?>" >Para Medico ?</a>

<a  class="btn btn-default btn-sm" href="<?php echo base_url('cauter/patient_billing/'.$centro)?>"> Para Centro Medico ?</a>-->
</div>

</div>

</div>
</div>
</div>
 </div>
</div>
<!-- /.container -->

	<br/><br/>


</html>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(window).on('load',function(){
$('#myModal').modal('show');
});
//prevent modal from closing on click
$('#myModal').modal({
backdrop: 'static',
keyboard: false
})

$("#click-yes").on('click',function(){
	$("#choose-one").slideDown();
	
	});


</script>


