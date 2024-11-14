<div class="col-md-12 showdown searchb" style="text-align:center">
<?php 


$this->load->view('search/patient-info');


?>
	
<?php if($perfil=="Admin"){$controller="admin";} else {$controller="medico";} ?>
<?php if($factura_sin_cita !=NULL){$show="";} else{$show="none";}?>
<div class="col-md-12" >
<ul class="nav nav-tabs">
    <li class='active'><a data-toggle="tab" href="#home" >FACTURA DE CITA</a></li>
    <li style="display:<?=$show?>"><a data-toggle="tab" href="#menu1" id="show-ambulatorio">FACTURAS AMBULATORIAS</a></li>
  </ul>
<div class="tab-content" style="max-height:60vh;overflow-x:auto">
<div id="home" class="tab-pane fade in active">
cargando...
</div>

 <div id="menu1" class="tab-pane fade">

</div>

</div>
</div>

</div>



<script>
$(document).ready(function() {
let  countrec = 0;

$('#show-ambulatorio').on('click', function(e) {
	e.preventDefault();
	   countrec ++;
	    if(countrec==1){
	 $("#menu1").html('<span style="font-size:12px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
      showAmbulatorio();
	   }
});


	function showAmbulatorio(){
var pat = <?=$get_fac_val['id_patient']?>;
var doctor = <?= $get_fac_val['doctor']?>;
var centro_medico = <?= $get_fac_val['centro_medico']?>;
var perfil = "<?= $get_fac_val['perfil']?>";
	
$.ajax({
type: "POST",
url: "<?=base_url('search/getFacturasAmb')?>",
data: {id_patient:pat,doctor:doctor,perfil:perfil,controller:"<?=$controller?>",centro_medico:centro_medico},
success:function(data){

$("#menu1").html(data);

} 
});
}


function display_fac_cita(){
var pat = <?=$get_fac_val['id_patient']?>;
var doctor = <?= $get_fac_val['doctor']?>;
var perfil = "<?= $get_fac_val['perfil']?>";
var centro_medico = <?= $get_fac_val['centro_medico']?>;	
$.ajax({
type: "POST",
url: "<?=base_url('search/getFacturas')?>",
data: {id_patient:pat,doctor:doctor,perfil:perfil,controller:"<?=$controller?>",centro_medico:centro_medico},
success:function(data){

$("#home").html(data);

},
  	  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#home").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}


display_fac_cita();

 console.log(<?=$get_fac_val['id_patient']?>);  
  console.log(<?= $get_fac_val['doctor']?>);
   console.log(<?= $get_fac_val['centro_medico']?>);
});
</script>
