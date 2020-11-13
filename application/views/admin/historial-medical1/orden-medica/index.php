 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>ORDEN MEDICA</title>

<!-- Bootstrap core CSS -->
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style>
.paginationh{
	float:left;
	width:100%;
}


ul.paginationh {
    list-style: none;
	float:left;
	margin:0;
    padding: 0;
}
li.paninate-li{
	list-style: none;
	float: left;
	margin-right: 16px;
	padding:5px;
	border:solid 2px #0063DC;
	background:#DCDCDC;
	color:#0063DC;
}
li.paninate-li:hover{
	color:#FF0084;
	cursor: pointer;
}
td,th{text-align:left}
</style>
<script>
var interval;
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
  var second = $('#time').text();
if(second <= 0){
window.location.href="<?php echo base_url(); ?>/login/admin_logout";
} else{
	clearInterval(interval);
  setTimeout(function(){
        $("#myModalConnectionBack").modal('hide');
    }, 2000);

}


}

function showPopForOfflineConnection(){

$('#myModalConnection').modal({
backdrop: 'static',
keyboard: false
})
TimeDecrement();
}


function TimeDecrement(){
var counter = 60;
interval = setInterval(function() {
    counter--;
    // Display 'counter' wherever you want to display it.
    if (counter <= 0) {
     		clearInterval(interval);
      	$('#timer').html("Vuelve a Loguearse cuanda la conexión se restablesca.");
        return;
    }else{
    	$('#time').text(counter);

      console.log("Timer --> " + counter);
    }
}, 1000);
}

</script>
</head>

<body>
<div class='container' id="background_" >
<?php

 $paciente=$this->db->select('provincia,municipio,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$id_historial)
 ->get('patients_appointments')->row_array();

 $provincia=$this->db->select('title')->where('id',$paciente['provincia'])
 ->get('provinces')->row('title');


$municipio=$this->db->select('title_town')->where('id_town',$paciente['municipio'])
 ->get('townships')->row('title_town');


 $seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();

if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:60px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}


 $nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');

?>
<h2 style='text-align:center'>ORDEN MEDICA</h2>
<a style='color:red' href="javascript:void(0);" onclick="javascript:history.go(-1);"><i class="fa fa-arrow-left" ></i> Volver</a>
 <hr class="hr_ad"/>
<div style='overflow-x:auto;'>
<table class='table' align="left" style="width:100%" class='r-b' >
<tr>
		<?=$display?>
		<td style="text-transform:uppercase"><strong><?=$paciente['nombre']?></strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:40px;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="text-align:center">
		<?php
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<td style="text-align:center"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		</tr>

		</table>
		</td>
	</tr>

</table>
<table style="width:100%;" class='table'>

<tr style="background:rgb(192,192,192)">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td><strong>Telefonos</strong></td>
		<td><strong>Direccion</strong></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=";"><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style="text-transform: lowercase;"><?=$municipio?>, <?=$paciente['calle']?></td>
	</tr>
</table>
</div>
<?php
function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}

?>
 <hr class="hr_ad"/>
<div id="paginationNumberOrdenMedica"></div>
  <hr class="prenatal-separator"/>
<button class="btn btn-xs btn-primary" id="nuevo-orden-medico">NUEVO REGISTRO</button>
  <hr class="prenatal-separator"/>
<div id="loadContentOrdMed"></div>

<div id="content-orden-medica"></div>
</div>

<div class="modal fade" id="myModalConnection" role="dialog">
<div class="modal-dialog modal-sm">
<div class="modal-content">
<div class="modal-header">
<div class="alert alert-danger text-center">
<h4>Parece que su conexión a Internet está fuera de línea.</h4>
</div>
<div class="alert alert-warning text-center">
<i>
<span id="timer">
    <span id="time">60</span> segundos
  </span>
 </i>
 </div>
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
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script>		
function loadContentOrdMed(){
	$("#loadContentOrdMed").fadeIn().html('<img  width="40px" src="<?= base_url();?>assets/img/loading.gif" />');
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/testOrmd",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>},
method:"POST",
success:function(data){
$('#loadContentOrdMed').html(data);

},


});
}

loadContentOrdMed();
//------------------------------------------------------------------------------------------------------------

function paginationNumberOrdenMedica(){
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/paginationNumberOrdenMedica",
data: {user_id:<?=$user_id?>,id_historial:<?=$id_historial?>,direction:0,id_emergency:0,centro_id:0},
method:"POST",
success:function(data){
$('#paginationNumberOrdenMedica').html(data);
},

});
}

paginationNumberOrdenMedica();

$('#nuevo-orden-medico').click(function(e){
loadContentOrdMed();
$("#content-orden-medica").hide();
});
</script>



