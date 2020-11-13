<style>
.reduce-height{border:none;background:none}
 </style>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">CREAR REFRACCIONn - <?=$paciente?></h3>
</div>
<div class="modal-body" id="background_">
<div id="content-refraccion"></div>
<form method='post' id='save-of-ref'>
 <div class="row">
<input name='of-user' type='hidden' value="<?=$user_id?>"/> 
<input name='of-pat' type='hidden' value="<?=$id_historial?>"/>
<input name='of-centro' type='hidden' value="<?=$centro?>"/>

<table class="table" style="width:90%" >
<tr>
<th></th><th>Espera</th><th>Cilindro</th><th>Eje</th><th>Add</th>
</tr>
<tr>
<th>OD</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="od_espera_r1" value="1" >&nbsp;+<br/><input value="0" type="radio" name="od_espera_r1">&nbsp;-
  </span>
<select  class="select2-ofr form-control"  name='od_espera'>
<option></option>
<option>0.00</option>
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="od_cilindro_r1" value='1'>&nbsp;+<br/><input value='0' type="radio" name="od_cilindro_r1">&nbsp;-
  </span>
<select  class="select2-ofr form-control"  name="od_cilindro">
<option></option>
<option>0.00</option>
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<select class="select2-ofr form-control"  name='eje_od'>
<option></option>
<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 
</td>
<td>
<select class="select2-ofr form-control"  name='add_od'>
<option></option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>

</td>

</tr>
<tr>
<th>OS</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="os_espera_r1" value='1'>&nbsp;+<br/><input value='0' type="radio" name="os_espera_r1">&nbsp;-
  </span>
<select  class="select2-ofr form-control"  name='os_espera'>
<option></option>
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >
 <input type="radio" name="os_cilindro_r1" value='1'>&nbsp;+<br/><input value='0' type="radio" name="os_cilindro_r1">&nbsp;-
  </span>
<select class="select2-ofr form-control"  name='os_cilindro'>
<option></option>
<option>0.50</option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
<option>3.50</option>
<option>4.00</option>
<option>4.50</option>
<option>5.00</option>
<option>5.50</option>
<option>6.00</option>
<option>6.50</option>
<option>7.00</option>
<option>7.50</option>
<option>8.00</option>
<option>8.50</option>
<option>9.00</option>
<option>9.50</option>
<option>10.00</option>
<option>10.50</option>
<option>11.00</option>
<option>11.50</option>
<option>12.00</option>
<option>12.50</option>
<option>13.00</option>
<option>13.50</option>
<option>14.00</option>
<option>15.00</option>
<option>15.50</option>
<option>16.00</option>
<option>16.50</option>
<option>17.00</option>
<option>17.50</option>
<option>18.00</option>
<option>18.50</option>
<option>19.00</option>
<option>19.50</option>
<option>20.00</option>
</select>
</div>
</td>
<td>
<select class="select2-ofr form-control"  name='eje_os'>
<option></option>
<?php 

for($i=0; $i<=180; $i++)
{

    echo "<option value=".$i.">".$i."</option>";
}
?> 
   
</select> 

</td>

<td>
<select class="select2-ofr form-control" name='add_os'>
<option></option>
<option>1.00</option>
<option>1.50</option>
<option>2.00</option>
<option>2.50</option>
<option>3.00</option>
   
</select>
</td>

</tr>

</table>
 
</div>


 <div class="row">
  <div class="col-md-6 col-md-offset-1"> 
  <label>DP</label> <input type="text" name='d-prf' style='width:30%'> <label>Mm</label> 
  <div class="checkbox">
  <label><input type="checkbox" name="vision-sencilla">Visión Sencilla</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="flat-top">Flat Top</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="invisibles" >Invisibles</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="progresivos" >Progresivos</label>
</div>
 </div>
 
 <div class="col-md-5"> 
   <label>Altura</label> <input type="text" name='altura-mm' style='width:30%'> Mm</label> 
   <div class="checkbox">
  <label><input type="checkbox" name="antirreflejos">Antirreflejos</label>
</div>
<div class="checkbox">
  <label><input type="checkbox" name="policarbonatos">Policarbonatos</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="transitions" >Transitions</label>
</div>

<div class="checkbox ">
  <label><input type="checkbox" name="foto_croma" >Fotocromatico</label>
</div>
 </div>
  <div class="col-md-9 col-md-offset-1"> 
  <br/><br/>
 <label>Observación</label> <textarea  id="" rows='9' name='ref-observaciones' class="form-control"></textarea>
 <br/>
<button type='submit' class="btn btn-sm btn-success" id='save-of-ref-text' name='of-user'>Guardar</button>
<!--<button type='button' class="btn btn-sm btn-primary" id='enviar-refr' disabled >Enviar</button>-->
 </div>
   
 </div>
<input id='new-id-ref' type='hidden'/>
</form>
 </div>
</div>
<script>
 $('.select2-ofr').select2({
  tags: true
});



$('#save-of-ref').on('submit', function (e) {
e.preventDefault();
$('#save-of-ref-text').text("guardando...");
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveOfatalRef',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
$('#save-of-ref-text').text("GUARDAR");
//$('#enviar-refr').prop("disabled", false);
$('#save-of-ref-text').prop("disabled", true);

 var delay = 2000; 
        setTimeout(function(){ location.reload(); }, delay);

},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#content-refraccion').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },

});

});


$('#enviar-refr').on('click', function (e) {
e.preventDefault();
var id_ref=0;
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/enviarRefraccion",
data: {id_user:<?=$user_id?>,id_pat:<?=$id_historial?>,id_centro:<?=$centro?>,id_ref:$('#new-id-ref').val()},
method:"POST",
success:function(data){
$('#enviar-refr').html(data);
$('#enviar-refr').prop("disabled", true);
 var delay = 2000; 
        var url = "<?php echo base_url(); ?>medico/index";
        setTimeout(function(){ window.location = url; }, delay);
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#content-refraccion').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },
});
});
</script>