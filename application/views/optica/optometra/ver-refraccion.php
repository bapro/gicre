<style>
.reduce-height{border:none;background:none}
 </style>
<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="h3 his_med_title">CREAR REFRACCION - <?=$paciente?></h3>
<hr class="title-highline-top"/>
</div>

<div class="modal-body" id="background_">
<?php
foreach ($paginate->result() as $row) 
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted));
 $doc=$this->db->select('name')->where('id_user',$row->id_user)
 ->get('users')->row('name');
$id_refraccion=$this->db->select('id_refraccion')->where('id_refraccion',$row->id)->get('laboratory_lentes')->row('id_refraccion'); 
if($id_refraccion){
	$enviar='La refraccion ha sido enviado al laboratorio de lentes';
	$disenvair='disabled'; 
}else{
	$enviar='Enviar';
	$disenvair='';
}
?>
 <form class="form-horizontal" method="post" id="updtade-of-ref" >
 <input type='hidden' value="<?=$row->id?>" name="id-of-ref">
<h4>REFRACCION  <a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/ofal_ref_")?>"  style="cursor:pointer" title="Imprimir Refraccion forma vertical" class="btn-sm" ><i style="font-size:17px" class="fa">&#xf02f; Vert.</i></a>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->id/0/0/ofal_ref_h")?>"  style="cursor:pointer" title="Imprimir Refraccion forma horizontal" class="btn-sm" ><i style="font-size:17px" class="fa">&#xf02f; Horiz.</i></a>
</h4>
  <h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?>, <?=$inserted_time?></h5>
<table class="table" style="width:90%;">
<tr>
<th></th><th>Espera</th><th>Cilindro</th><th>Eje</th><th>Add</th>
</tr>
<tr>
<th>OD</th>
<td>
<div class="input-group"  >
<span class="input-group-addon reduce-height" >

  <?php
if($row->od_espera_r==1){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='1' name='od_espera_re1' $checked>";
?><span style="font-weight:bold" class="mas">+</span> <br/>


<?php
if($row->od_espera_r==0){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='0' name='od_espera_re1' $checked>";
?><span style="font-weight:bold" class="menos">-</span>
 

</span>
<select  class="select2-of form-control" name="od_esperae">
<option><?=$row->od_espera?></option>
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

  <?php
if($row->od_cilindro_r==1){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='1' name='od_cilindro_re1' $checked>";
?><span style="font-weight:bold" class="mas">+</span> <br/>


<?php
if($row->od_cilindro_r==0){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='0' name='od_cilindro_re1' $checked>";
?><span style="font-weight:bold" class="menos">-</span>
 
 </span>
<select  class="select2-of form-control" name="od_cilindroe">
<option><?=$row->od_cilindro?></option>
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
<select class="select2-of form-control" name="eje_ode">
<option><?=$row->eje_od?></option>
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
<select class="select2-of form-control"  name="add_ode">
<option><?=$row->add_od?></option>
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
 <?php
if($row->os_espera_r==1){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='1' name='os_espera_re1' $checked>";
?><span style="font-weight:bold" class="mas">+</span> <br/>


<?php
if($row->os_espera_r==0){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='0' name='os_espera_re1' $checked>";
?><span style="font-weight:bold" class="menos">-</span>
  </span>
<select  class="select2-of form-control" name="os_esperae">
<option><?=$row->espera_os?></option>
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

  <?php
if($row->os_cilindro_r==1){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='1' name='os_cilindro_re1' $checked>";
?><span style="font-weight:bold" class="mas">+</span> <br/>


<?php
if($row->os_cilindro_r==0){$checked="checked";}else{$checked="";}


echo"&nbsp;&nbsp;<input type='radio' value='0' name='os_cilindro_re1' $checked>";
?><span style="font-weight:bold" class="menos">-</span>

</span>
<select  class="select2-of form-control" name="os_cilindroe">
<option><?=$row->cilindro_os?></option>
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
<select class="select2-of form-control"  name="eje_ose">
<option><?=$row->eje_os?></option>
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
<select class="select2-of form-control"  name="add_ose">
<option><?=$row->add_os?></option>
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

<div class="row">
  <div class="col-md-6 col-md-offset-1"> 
  <label>DP</label> <input type="text" name='d-prf2' style='width:30%' value="<?=$row->d_prf?>"> <label>Mm</label> 
  <div class="checkbox">
   <?php
   if ($row->vision_sencilla ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="vision-sencilla2" <?=$selected?>>Visión Sencilla</label>
</div>
<div class="checkbox">
  <?php
   if ($row->flat_top ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="flat-top2" <?=$selected?>>Flat Top</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->invisibles ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="invisibles2" <?=$selected?>>Invisibles</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->progresivos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="progresivos2" <?=$selected?>>Progresivos</label>
</div>
 </div>
 
 <div class="col-md-5"> 
   <label>Altura</label> <input type="text" name='altura-mm2' style='width:30%' value="<?=$row->altura_mm?>"> Mm</label> 
   <div class="checkbox">
   <?php
   if ($row->antirreflejos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="antirreflejos2" <?=$selected?>>Antirreflejos</label>
</div>
<div class="checkbox">
 <?php
   if ($row->policarbonatos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="policarbonatos2" <?=$selected?>>Policarbonatos</label>
</div>
<div class="checkbox ">
 <?php
   if ($row->transitions ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="transitions2" <?=$selected?>>Transitions</label>
</div>


<div class="checkbox ">
 <?php
   if ($row->foto_croma==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" name="foto_croma2" <?=$selected?>>Fotocromatico</label>
</div>

 </div>
  <div class="col-md-9 col-md-offset-1"> 
  <br/><br/>
 <label>Observación</label> <textarea  id="" rows='9' name='ref-observaciones2' class="form-control"><?=$row->ref_observaciones?></textarea>
 <br/>
<button type='submit' class="btn btn-sm btn-success" id='edit-of-ref' name='edit-of-ref' >Editar</button>
<!--<button type='button' id='enviar-ref' class="btn btn-sm btn-primary" <?=$disenvair?>> <?=$enviar?> </button>-->
 </div>
   
 </div>


  </form>
  </div>

<script>
$('#enviar-ref').on('click', function (e) {
e.preventDefault();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/enviarRefraccion",
data: {id_user:<?=$row->id_user?>,id_pat:<?=$row->id_hist?>,id_centro:<?=$row->id_centro?>,id_ref:<?=$row->id?>},
method:"POST",
success:function(data){
$('#enviar-ref').html(data);
$('#enviar-ref').prop("disabled", true);
 var delay = 2000; 
        var url = "<?php echo base_url(); ?>medico/index";
        setTimeout(function(){ window.location = url; }, delay);
},
});
});








$(".select2-of").select2({
tags: true
});

$('#updtade-of-ref').on('submit', function (e) {
e.preventDefault();

$('#edit-of-ref').text("editando...");
$.ajax({
url:'<?php echo base_url();?>admin_medico/saveUpOfatalRef',
method:"POST",
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success: function(data){
 $('#edit-of-ref').text("Editar");

},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#error-of-ref').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },

});

});

$('#nuevo-refraccion').on('click', function () {
	$("#content-refraccion").hide();
	$("#save-of-ref").show();
	$('#enviar-refr').text("Enviar");
});
</script>

