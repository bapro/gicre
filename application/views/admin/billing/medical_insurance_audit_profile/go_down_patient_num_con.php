<hr id="hr_ad"/>
<div style="overflow-x:auto;">

<div id="patient-factura-data"></div>

</div>
<br/>

<script>

$(document).ready(function(){

patient_factura_data();

function patient_factura_data()
{
$("#patient-factura-data").fadeIn().html('<span style="font-size:13px" class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var dess ="<?=$desde?>";
var hass ="<?=$hasta?>";
var medico = "<?=$medico?>";
var id_seguro = "<?=$id_seguro?>";

$.ajax({
method: "POST",
url: "<?=base_url('admin_medico/patient_factura_data')?>",
data: {dess:dess,hass:hass,medico:medico,id_seguro:id_seguro},
dataType: "text",
 cache:false,
success:function(data){ 
$("#patient-factura-data").html(data);
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#patient-factura-data').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },    
});
}
	

});





</script>