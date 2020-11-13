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
  border: 2px solid;
  padding: 10px;
  text-align:center
}


canvas.myid_templates_editor_canvas {
	 width: 30%;
	 height: 100px;
    margin: auto;
    display: block;
   
}
table {
    width: 100%;
}
#desactivar{color:red}
h3{text-transform:uppercase}
</style>
</head>
<body class='center'>

<?php
 $this->padron_database = $this->load->database('padron',TRUE);
if($is_doc==1){
$h3="$doc";
$h2="DOCTOR(A)";	
$cntrler_name="update_user";
$cntrler="medico";
$is_doc_=1;
$link="$id_imp/$who";
}


else{
$h3="$patiente";
$h2="PACIENTE <br/>$imgpat";
$cntrler_name="patient";
$cntrler="$patient_cont";
$is_doc_=0;
$link="$from/$id_imp/$who";
}

 ?>
<a style="color:#B22222;" href="javascript:void(0);" onclick="javascript:history.go(-1);"><-- de vuelta</a>
 <h1>FIRMA</h1>
 <hr style="border: 1px solid;"/>
<p><?=$h2?></p>
<h3><?=$h3?></h3>
<table border="1" cellpadding="0" width="500">
<tr>
<td height="10" width="200" >
<canvas id="cnv" name="cnv" class="myid_templates_editor_canvas" width="300" height="50"></canvas>
<span id="desactivar"><i>Cuadro de firma desactivada</i></span>
</td>
</tr>
</table>
<canvas name="SigImg" id="canvas-image" width="500" height="100"></canvas>
<form id="submit" name=FORM1>
<p>
<button id="SignBtn" name="SignBtn" type="button" class="btn btn-primary btn-md" onclick="javascript:onSign()">
Actiar Cuadro De Firmar
</button>

<button id="button1" name="ClearBtn"  type="button" class="btn btn-danger btn-md" onclick="javascript:onClear()">
Limpiar
</button>


<button  id="button2" name="DoneBtn" type="button" class="btn btn-primary btn-md" onclick="javascript:onDone()">
Hecho
</button>  
<span id="volver-impresion" style="display:none">
<a  href="javascript:void(0);" onclick="javascript:history.go(-1);">&larr; Volver</a>
<!--<a  href="<?php echo base_url("$cntrler/$cntrler_name/$link"); ?>"><i>Volver</i></a>-->
</span>
<INPUT TYPE=HIDDEN NAME="bioSigData">
<INPUT TYPE=HIDDEN NAME="sigImgData">


</p>

</form>

 <script src="<?=base_url();?>assets/js/signature-footer.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script type="text/javascript">

var tmr;

function onSign()
{
	$('#desactivar').hide();
	$('#SignBtn').prop("disabled",true);
   var ctx = document.getElementById('cnv').getContext('2d');         
   SetDisplayXSize( 500 );
   SetDisplayYSize( 100 );
   SetTabletState(0, tmr);
   SetJustifyMode(0);
   ClearTablet();
   if(tmr == null)
   {
      tmr = SetTabletState(1, ctx, 50);
   }
   else
   {
      SetTabletState(0, tmr);
      tmr = null;
      tmr = SetTabletState(1, ctx, 50);
   }
}

function onClear()
{
   ClearTablet();
}

function onDone()
{
   if(NumberOfTabletPoints() == 0)
   {
      alert("Por favor firme antes de continuar");
   }
   else
   {
      SetTabletState(0, tmr);
SetJustifyMode(5);
      //RETURN TOPAZ-FORMAT SIGSTRING
      SetSigCompressionMode(1);
      document.FORM1.bioSigData.value=GetSigString();
     // document.FORM1.sigStringData.value += GetSigString();
      //this returns the signature in Topaz's own format, with biometric information


      //RETURN BMP BYTE ARRAY CONVERTED TO BASE64 STRING
      SetImageXSize(500);
      SetImageYSize(100);
      SetImagePenWidth(5);
     // GetSigImageB64(SigImageCallback);
	  
	  
		var canvasImage = document.getElementById("cnv");
		var canvasData = canvasImage.toDataURL("image/png");
		var id_imp="<?=$from?>-<?=$is_doc_?>";
		$.ajax({
		url:'<?php echo base_url();?>printings/saveSignature',
		method:"POST",
		data: {canvasImage:canvasData,id_imp:id_imp},
		success: function(data){
			$('#volver-impresion').show();
			$('#button2').hide();
			
			}

		});
	  
	  
	  
	  
	  
	  
   }
}

window.onunload = window.onbeforeunload = (function(){
closingSigWeb()
})

function closingSigWeb()
{
   ClearTablet();
   SetTabletState(0, tmr);
}

</script>

</body>
</html>