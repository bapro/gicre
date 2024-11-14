<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" ><br/><br/>
<label  class="col-sm-2 control-label">Peso</label>
<div class="col-sm-10">
<div class="input-group">
	<input class="form-control"  id="<?=$signo_id ?>pesoex" value="<?=$pesoEx?>" type="text" >
   <span class="input-group-addon">lb</span>
   <input class="form-control" id="<?=$signo_id ?>kgex" value="<?=$kgEx?>" type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>

<td title="Tension Arterial">
<div class="col-sm-6">
T. A.(mm) <input id="<?=$signo_id ?>taex" value="<?=$taEx?>" class="form-control">
T. A. (hg) <input id="<?=$signo_id ?>hgex" value="<?=$hgEx?>"  class="form-control">
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<?php
if($radioEx =="Sano"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
		?>
	<input type='radio' id='radio_signoex' name='<?=$signo_id ?>radio_signoex' value='Sano' <?=$selected?> /> Sano
		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;">

<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-8">
<div class="input-group">
<input class="form-control" title="talla en metro" id="<?=$signo_id ?>tallaex"  type="text" value="<?=$tallaEx?>"  type="text">
   <span class="input-group-addon">m</span>
</div>
</div>


</td>
<td >
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="<?=$signo_id ?>frex" value="<?=$frEx?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-6">
<div class="input-group" title="Temperatura">
<input class="form-control " id="<?=$signo_id ?>tempoex" value="<?=$tempoEx?>" type="text" >
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($radioEx =="Agudamente enferma"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
		?>
	<input type='radio' id='radio_signoex' name='<?=$signo_id ?>radio_signoex' value='Agudamente enferma' <?=$selected?> /> Agudamente enferma
</td>
</tr>



<tr>

<td class="ida" >
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="<?=$signo_id ?>imcex" value="<?=$imcEx?>" type="text" >
	   
	</div>
</div>
 </td>
<td style="width:5px;">
<label  class="col-sm-1 control-label">Fc</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$signo_id ?>fcex" value="<?=$fcEx?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Pulso</label>
<div class="col-sm-6">
<div class="input-group">
<input class="form-control " id="<?=$signo_id ?>pulsoex" type="text" value="<?=$pulsoEx?>" >
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<?php
if($radioEx =="Cronicamente enferma"){
		        $selected="checked";
		} else {
		       $selected="";
	    }?>
<input type='radio' id='radio_signoex' name='<?=$signo_id ?>radio_signoex' value='Cronicamente enferma' <?=$selected?> /> Cronicamente enferma
</td>
</tr>

<tr>
<td class="ida" >
<label  class="col-sm-3 control-label">Glicemia</label> 
<div class="col-sm-6">
	<div class="input-group">
		<input class="form-control" id="<?=$signo_id ?>glicemiae" value="<?=$glicemiaEx?>" type="text" >
	   <em class="<?=$signo_id ?>glicemiae" style='color:red;display:none'>Glicemia anormal !</em>
	</div>
</div>
 </td>

<td>
<label  class="col-sm-1 control-label"> Sat O2(%)</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="<?=$signo_id ?>satoee" value="<?=$satoeEx?>" type="text"> 

</div>
</div>
<label  class="col-sm-2 control-label">FCF</label>
<div class="col-sm-3">
<div class="input-group">
<input class="form-control " id="<?=$signo_id ?>fcfe" value="<?=$fcfEx?>" type="text">

</div>
</div>
</td>
<td style="width:1px" >
</td>
</tr>

</table>

<script>
$("#<?=$signo_id ?>pesoex").val($("#3peso").val()); 
$("#<?=$signo_id ?>kgex").val($("#3kg").val()); 
$("#<?=$signo_id ?>taex").val($("#3ta").val());
$("#<?=$signo_id ?>hgex").val($("#3hg").val()); 
$("#<?=$signo_id ?>tallaex").val($("#3talla-ef").val());  
$("#<?=$signo_id ?>frex").val($("#3fr").val());  
$("#<?=$signo_id ?>tempoex").val($("#3tempo").val());  
$("#<?=$signo_id ?>imcex").val($("#3imc").val()); 
$("#<?=$signo_id ?>fcex").val($("#3fc").val()); 
$("#<?=$signo_id ?>pulsoex").val($("#3pulso").val()); 
$("#<?=$signo_id ?>glicemiae").val($("#3glicemia").val());
 $("#<?=$signo_id ?>satoee").val($("#3satoe").val());
 $("#<?=$signo_id ?>fcfe").val($("#3fcf").val());



</script>