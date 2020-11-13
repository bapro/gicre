<div id="hide_select_signo_by_id">

<?php 

 foreach($show_signo_by_id as $row)
{  
?>

 <div  style="overflow-x:auto;">
<table class="table"  cellspacing="0">
  <tr>
  <th></th><th></th><th>Aspecto General</th>
  </tr>
<tr>

<td class="ida" style="font-weight:bold">
 <label  class="col-sm-2 control-label">Peso</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control" id="peso" value="<?=$row->peso?>" type="text" disabled>
                           <span class="input-group-addon">lb</span>
                        </div>
                    </div>
					<div class="col-sm-5">
<div class="input-group">
	<input class="form-control" id="kg" value="<?=$row->kg?>"  type="text" disabled>
	<span class="input-group-addon">kg</span>
</div>
</div>
 </td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label for="new_discount" class="col-sm-1 control-label">Ta</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="ta" value="<?=$row->ta?>" type="text" disabled>
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">/</label>
                    <div class="col-sm-5 col-sm-offset-1">
                       <div class="input-group">
		   <input class="form-control " id="hg" value="<?=$row->hg?>" type="text" disabled>
			<span class="input-group-addon">mm/Hg</span>
			
		</div>
                    </div>
</td>
<td style="width:1px" >
<?php
if($row->radio =="SANO"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signo' name='radio_signo' value='SANO' $selected disabled/> SANO";
?>
	 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
 <label  class="col-sm-2 control-label">Talla</label>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <input class="form-control" id="talla" value="<?=$row->talla?>"  type="text" disabled>
                           
                        </div>
                    </div>

</td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label for="new_discount" class="col-sm-1 control-label">Fr</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fr" value="<?=$row->fr?>" type="text" disabled>
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Tempo.</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="tempo" value="<?=$row->tempo?>" type="text" disabled>
                            <span class="input-group-addon"> &#8451 </span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<?php
if($row->radio =="AGUDAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signo' name='radio_signo' value='AGUDAMENTE ENFERMA' $selected disabled/> AGUDAMENTE ENFERMA";
?>
 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-5">
	<div class="input-group">
		<input class="form-control" id="imc" value="<?=$row->imc?>" type="text" disabled>
	   
	</div>
</div>
 </td>
<td class="especialidad" style="width:5px;font-weight:bold">
 <label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input class="form-control" id="fc" value="<?=$row->fc?>" type="text" disabled>
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulso" value="<?=$row->pulso?>" type="text" disabled>
                            <span class="input-group-addon">Pm</span>
                            
						</div>
                    </div>
</td>
<td style="width:1px" >
<?php
if($row->radio =="CRONICAMENTE ENFERMA"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signo' name='radio_signo' value='CRONICAMENTE ENFERMA' $selected disabled/> CRONICAMENTE ENFERMA";
?>
</td>
</tr>

	   
</table>
</div>
<?php
}
?>	

</div>
