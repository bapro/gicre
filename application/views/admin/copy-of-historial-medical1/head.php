
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">-->

<title>HISTORIAL CLINICA</title>

<!-- Bootstrap core CSS -->
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script>
moment.locale('es');
</script>
<!-- Custom styles for this template -->
<style>
@media (min-width: 992px){
.modal-lg
{ width: auto;
}
}
.modal-lg
{
width: 1200px;
height: 900px; /* control height here */
}

.im-bg{
background-image: url('<?= base_url();?>assets/img/historial_medical/hist-fondo.png');
 background-repeat: no-repeat;
background-size: cover;
}
#remove-btn {
    background:none!important;
     border:none;
     padding:0!important;
     color:#069;
   font-size:11px;
     cursor:pointer;
}


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