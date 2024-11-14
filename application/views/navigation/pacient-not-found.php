<body>

<div class="container"  >
<div class="col-md-12" id="hide_patientf"> 

<div class="col-md-12 " id="hide_form"  style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb" >
<span id="no_patient_name_found"><?php echo $this->session->flashdata('success_msg'); ?></span>

<h2 class="h2">SOLICITUD DE CITA</h2>
<?=$this->session->flashdata('error_messages');?>
<?=  validation_errors(); ?>
<?php
if(is_numeric($id_url)){
	$fill_cedula=$id_url;
	$fill_name = "";
	$ced1=substr("$id_url",0,3);
	$ced2=substr("$id_url",3,10);
	$ced3=substr("$id_url",-1);
	
	
	
	
}else{
	 $fill_name = str_replace("%20"," ","$id_url");
	$ced1="";
	$ced2="";
	$ced3="";
	$fill_cedula = "";
}
 ?>

<div id="show_patient_by_cedula"></div>
<form  class="form-horizontal" enctype="multipart/form-data" id="sendcita"  method="post"  action="<?php echo site_url('navigation/cita_sent_patient_not_found');?>" > 
<input type="hidden"  value='<?=$ced1?>'  name="ced1"  >
<input type="hidden"  value='<?=$ced2?>'  name="ced2"  >
<input type="hidden"  value='<?=$ced3?>'  name="ced3"  >

<input type="hidden"  value=''  name="photo"  >
<input type="hidden"   name="id_url"   value="<?=$id_url?>"  >
<div class="tab-content"  style="margin-left:6%" >
<h4 class="cita-title">I- DATOS PERSONALES</h4>
<div class="form-group ">
<label class="control-label col-sm-3"><span class="req">* </span> Nombres</label>
<div class="col-sm-6 nom">
<input type="text" class="form-control required" placeholder="Nomres Apellidos" id="nombre" name="nombre" value="<?=$fill_name?>" >

</div>
<div class="col-sm-12 table-responsive" id="nombre_info"></div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"><span class="req">*</span> Tel. Celular</label>
<div class="col-sm-3">						
<input type="text"  class="form-control bfh-phone required"  id="tel_cel" name="tel_cel"  value="<?php echo set_value('tel_cel'); ?>" >
</div>
<div id="phone_info"></div>
</div>
<div   id="hide-down">
<div class="form-group">
<label  class="control-label col-sm-3"> Cedula/Pasaporte</label>
<div class="col-sm-3">
<input  type="text" class="form-control" id="cedula" name="cedula"  placeholder="000000000000" data-mask="000000000000" value="<?=$fill_cedula?>"   >
</div>
<div id="cedula_info"></div>
</div>


<div class="form-group">
<span id="incorectemail" style="color:red;font-style:italic;font-size:15px"></span>
<label class="control-label col-sm-3">Correo electrónico </label>
<div class="col-sm-6">
<input  type="text"  id="emailtest" name="email" class="form-control required" value="<?php echo set_value('email'); ?>">
<span id='lblError' style='color:red'></span>
</div>
</div> 
<div class="form-group">
<div class="col-md-5" >
 <button type="submit" id="next" style="float:right" class="btn btn-primary btn-sm ">>>  Continuar </button>
</div>
</div>
 </div>

<br/><br/><br/><br/>

 </form>
 
 </div><!--row background_ end -->
 </div>
 </div><!--container-->
</div>


 <br/><br/>



	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>



<script>
$( document ).ready(function() {
	
	 var timer2 = null;
         $("#emailtest").keydown(function(){
            clearTimeout(timer2);
            timer2 = setTimeout(validateEmail, 1000)
         });
		 
         function validateEmail() {
             var email = document.getElementById("emailtest").value;
   var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(email) && email !="") {
            lblError.innerHTML = "Dirección de correo electrónico inválida.";
			document.getElementById("next").disabled = true;
        }else{
			document.getElementById("next").disabled = false;
		}
         }
	
	
	
//mask input telephones
document.getElementById('tel_cel').addEventListener('input', function (e) {
var x = e.target.value.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
e.target.value = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
});

window.addEventListener("beforeunload", function(event) { 
    document.getElementById("next").disabled = true;
    document.getElementById("next").innerText ='guardando...';	
     debugger; 
});

 


$("#cedula").keyup(function(){
var cedula= $(this).val();
if(cedula == "") {
$("#cedula_info").hide();
}else {
$.get( "<?php echo base_url();?>admin_medico/check_if_cedula_exist?cedula="+cedula, function( data ){
$( "#cedula_info" ).html( data ); 
$( "#cedula_info" ).show(); 		   
});
}
});


$("#nombre").keyup(function(){
var nombre= $(this).val();
if(nombre == "") {
$("#nombre_info").hide();
}else {
	$( "#nombre_info" ).html("chequando este nombre...");
$.get( "<?php echo base_url();?>navigation/check_if_nombre_exist?nombre="+nombre, function( data ){
$( "#nombre_info" ).html( data ); 
$( "#nombre_info" ).show(); 		   
});
}
});
	

});

</script>
	</body>
	</html>