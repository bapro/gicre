
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HOSPITALIZACION</title>

<!-- Bootstrap core CSS -->
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<!-- Custom styles for this template -->
<style>
 .tooltip.bottom .tooltip-inner {
        background-color: white;
        border-radius: 10px;
        border: 1px solid #0063dc;
    }
    .tooltip.bottom .tooltip-arrow {
        border: none;
    }
    .tooltip .tooltip-inner {
        text-align: left;
        font-size: 13px;
        text-shadow: none;
        color: #202020;
    }
#paginationh{
overflow-y:auto;
width:100%
}


.paginationh{
	width:100%;
	display: flex;
	
}


ul.paginationh {
    list-style: none;
	text-align:center;
	font-size:12px
	
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


.im-bg{
box-shadow: inset 0 0 30px #428bca;
}
.center-img {
   object-fit:cover;
   object-position:50% 50%;


  }

  .sidebar img {
  max-width: 100%;

}



.navbar-doublerow > .navbar{
	display: block;
	padding: 0px auto;
	margin: 0px auto;
	min-height: 25px;

}

#hosp-header
{
    border-collapse: collapse; /* 'cellspacing' equivalent */
	   margin: 0 auto
}

#hosp-header td, table th
{
    padding: 7px; font-size:13px;color:#3B3E3F
}


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
<?php 
$camaNum=$this->db->select('num_cama')->where('id',$cama)
   ->get('mapa_de_cama')->row('num_cama');
   ?>
<body>
<nav class="navbar navbar-default navbar-doublerow navbar-trans navbar-fixed-top" style='background:#C6DEE6'> 		<!-- Master nav -->
 <table id='hosp-header'> 
        <thead> 
            <tr> 
			<td><a class="btn btn-xs btn-danger" href="<?php echo base_url("hospitalizacion/hospitalizacion_list/0/$id_user_")?>"><i class="fa fa-angle-double-left" ></i> Volver</a></td> 
			 <td><strong>Nombres</strong><br/> <?=$nombre;?></td> 
                <td><strong>Edad</strong><br/> <?=getPatientAge($date_nacer)?></td> 
                <td><strong>NEC</strong><br/> <?=$patient_id?></td>
                 <?php if($cedula){?>				
                <td><strong>Cedula</strong><br/> <?=$cedula?></td> 
				 <?php } ?>
				<td><strong>Seguro</strong><br/> <?=$seguro_medico_name?></td> 
                <td><strong>Fecha Ingreso</strong><br/> <?=date("d-m-Y H:i:s", strtotime($fecha_ingreso))?></td> 
                <td><strong>Diagnostico de Ingreso</strong><br/> <?=$causa?></td> 
                <td><strong>Sala</strong><br/> <?=$sala?></td>
				<td><strong>Cama</strong><br/> <?=$camaNum?></td>
				
				<td>
				<ul class="nav navbar-nav">
				<li class="dropdown">
				<a href="#" style="color:#2B436A" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-plus" aria-hidden="true" style=''></i> Mas <span class="caret"></span></a>
				<ul class="dropdown-menu" style='background:#C6DEE6'>
				<li > <a  data-toggle="modal" data-target="#hos-notas" href="<?php echo base_url("hospitalizacion/hosp_notas/$id_hosp/$user_id/$patient_id/$centro")?>"><i class="fa fa-angle-double-right" ></i> Notas</a></li >
				<li > <a data-toggle="modal" data-target="#sol-inter" href="<?php echo base_url("hospitalizacion/solicitud_inter_con/$id_hosp/$user_id/$patient_id")?>"><i class="fa fa-angle-double-right" ></i> Interconsultas</a></li >
				<li > <a  data-toggle="modal" data-target="#orden-medico" href="<?php echo base_url("hospitalizacion/orden_medica/$user_id/$patient_id/$centro/$id_hosp/$id_seguro")?>"><i class="fa fa-angle-double-right" ></i> Orden Medica</a></li >
				<li >  <a  data-toggle="modal" data-target="#quirurgia" href="<?php echo base_url("hospitalizacion/des_quirurgica/$user_id/$patient_id/$centro/$id_hosp")?>"><i class="fa fa-angle-double-right" ></i> Descripcion Quirurgica</a></li >

                </ul>
				</ul>
				</td> 
				<td class="general-btn guardarSinAlta">
				<button type='button' id='guardarSinAlta' class="btn btn-sm btn-primary">Guardar</button>
				</td>
				<td class="general-btn guardarConAlta" style="display:none">
				<button type='button'  id='guardarConAlta' class="btn btn-sm btn-success"> Guardar Alta Med.</button>
				
				</td>
				<td style="display:none" class="show-save-ev-con">
				  <button type='button' id='saveEvaCond' class="btn btn-sm btn-success">Guardar Eva. Cond.</button>
				</td>
				</tr> 
        </thead>
</table> 		
</nav>

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
