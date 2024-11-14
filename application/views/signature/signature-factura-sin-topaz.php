<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
<title>ADMEDICALL-FIRMA</title>
<link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
.center {
  margin: auto;
  width: 50%;
  border: 1px solid;
  padding: 10px;
  text-align:center
}



</style>
</head>
<body class='center'>
<?php
$h3="$patiente";
$h2="PACIENTE <br/>$imgpat";
 ?>
 <h1>FIRMA</h1>
 <p><?=$h2?></p>
<h3><?=$h3?></h3>
 <hr style="border: 1px solid;"/>
<div class="js-signature" data-width="600" data-height="200" data-border="1px solid black" data-line-color="#bc0000" data-auto-fit="true"></div>
			<p><button id="clearBtn" class="btn btn-default" onclick="clearCanvas();">Clear Canvas</button>&nbsp;<button id="saveBtn" class="btn btn-default" onclick="saveSignature();" disabled>Save Signature</button></p>
			<div id="signature">
				<p><em>Your signature will appear here when you click "Save Signature"</em></p>
			</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
 <script src="<?=base_url();?>assets_new/js/jq-signature.js"></script>


<script type="text/javascript">
$(document).on('ready', function() {
		if ($('.js-signature').length) {
			$('.js-signature').jqSignature();
		}
		
	});

	/*
	* Demo
	*/

	function clearCanvas() {
		
		$('#signature').html('<p><em>Your signature will appear here when you click "Save Signature"</em></p>');
		$('.js-signature').jqSignature('clearCanvas');
		$('#saveBtn').attr('disabled', true);
	}

	function saveSignature() {
		$('#signature').empty();
		var dataUrl = $('.js-signature').jqSignature('getDataURL');
		var img = $('<img>').attr('src', dataUrl);
		$('#signature').append($('<p>').text("Here's your signature:"));
		$('#signature').append(img);
		$.ajax({
		url:'<?php echo base_url();?>signature/saveSignaturePatientSinTopaz',
		method:"POST",
		data: {canvasImage:dataUrl,id_fac:<?=$id_fac?>},
		success: function(data){
			$('#volver-impresion').show();
			$('#button2').hide();
			$('#saveBtn').attr('disabled', true);
			}

		});
	}

	$('.js-signature').on('jq.signature.changed', function() {
		$('#saveBtn').attr('disabled', false);
	});

</script>

</body>
</html>