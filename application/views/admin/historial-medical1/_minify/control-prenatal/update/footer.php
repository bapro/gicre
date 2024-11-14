<script>
$('#save-cont-pren1').on('click', function(event) {
event.preventDefault();

 var id_c1   = $("#id_c1").val();
 var updated_by  = $("#updated_by").val();



 var fecha   = $("#fechacpp").val();
 var semana  = $("#semanacpp").val();
 var pesocp = $("#pesocpp").val();
 
  var tension1   = $("#tension1cpp").val();
 var tension11  = $("#tension11cpp").val();
 
 var alt1 = $("#alt1cpp").val();
 var alt11 = $("#alt11cpp").val();
 var alt111 = $("#alt111cpp").val();
 
  var fetal1   = $("#fetal1cpp").val();
 var fetal11  = $("#fetal11cpp").val();
 
 var edema1   = $("#edema1cpp").val();
 var edema11  = $("#edema11cpp").val();

 var otroscp   = $("#otroscpp").val();
 var evolucion  = $("#evolucioncpp").val();

 
 $.ajax({
type: "POST",
url: "<?=base_url('admin/SaveUpContPren')?>",
data: {id_c1:id_c1,updated_by:updated_by, fecha:fecha, semana:semana,pesocp:pesocp,
tension1:tension1,tension11:tension11,alt1:alt1,alt11:alt11,alt111:alt111,
fetal1:fetal1,fetal11:fetal11, edema1:edema1,edema11:edema11,
otroscp:otroscp,evolucion:evolucion},

cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#resultcp').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },    
success:function(data){
alert("Cambiado ha sido hecho !");

}  
});
return false;
});
</script>