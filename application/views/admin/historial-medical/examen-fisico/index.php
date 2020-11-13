<span id="top_exam"></span>
<style>
#flashexf{

position: fixed; 
top: 50%;
left: 40%;
z-index:900000
}
</style>

<div id="show_exam_fisico_after_select"></div>
<div id="hide_exam_fisico_after_select" style="margin-left:210px">
<div class="col-xs-12" >
<form  id="" class="form-horizontal"  method="post"  > 

<div class="col-xs-12 move_left">
 <h4 class="h4 his_med_title">Examen fisico</h4>
 <br/>
<div class="col-xs-3"  >

<?php if ($count_signos > 0)
{
?>
<div class="input-group" >
<span class="input-group-addon"><span style="color:green;font-size:20px" ><b><?=$count_signos?></b> </span>regitros (s)</span> 
<span class="success-send-exam-f">
<select style="text-transform:lowercase" class="form-control" id="id_ex_f" >
<option  hidden>Navegador</option>
<?php 

 foreach($signos as $row)
{

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y - %I:%M%p", strtotime($row->inserted_time)));	
?>
<option  title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_sig;?>'>Registro # <?=$row->id_sig;?></option>


<?php
}
?>

</select>
</span>
</div>
</div>
<?php
}

?>


</div>
<div id="flashexf"></div>
<div class="col-md-12" >
<br/>

<table class="table"  cellspacing="0" style="border-top: 2px groove #38a7bb;">
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td ><br/><br/>
<label  class="col-sm-2 control-label">Peso</label>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control"  id="peso"  type="text">
   <span class="input-group-addon">lb</span>
</div>
</div>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control" id="kg"  type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>
<td title="Tension Arterial" style=""><br/>
<span class="title" style="margin-left:290px;">Ta</span>
<hr style="width: 65px; height: 1px; display: block; margin: 0 auto;margin-left:270px; border: none; box-shadow: 3px 3px 6px #0e0e0e; background-color: #38a7bb"/>
<div class="col-sm-5">
<div class="input-group">
<span class="input-group-addon">mm</span>

<input class="form-control" id="ta"  type="text"> 
</div>
</div>

<label  class="col-sm-1 control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group">
<span class="input-group-addon">hg</span>

<input class="form-control " id="hg"  type="text">
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>

<input type="radio" id="radio_signo" name="radio_signo" value="SANO" checked /> SANO	 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-5">
<div class="input-group">
<input class="form-control" id="talla"  type="text" >

</div>
</div>

</td>
<td style="width:5px;font-weight:bold">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="fr"  type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempo"  type="text">
<span class="input-group-addon"> &#8451 </span>

</div>
</div>
</td>
<td style="width:1px" >
<input type="radio" id="radio_signo" name="radio_signo" value="AGUDAMENTE ENFERMA"/> AGUDAMENTE ENFERMA 	 		
</td>
</tr>



<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="imc"  type="text" readonly>
	   
	</div>
</div>
 </td>
<td style="width:5px;font-weight:bold">
<label  class="col-sm-1 control-label">Fc</label>
<div class="col-sm-3">
<div class="input-group" title="Frecuencia cardiaca">
<input class="form-control" id="fc"  type="text">

</div>
</div>
<label  class="col-sm-2 control-label">Pulso</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group">
<input class="form-control " id="pulso"  type="text">
<span class="input-group-addon">Pm</span>

</div>
</div>
</td>
<td style="width:1px" >
<input type="radio" id="radio_signo" name="radio_signo"  value="CRONICAMENTE ENFERMA"/> CRONICAMENTE ENFERMA		 		
</td>
</tr>

	   
</table>


</div>
<!--col m12 end-->
<div class="col-md-12">
<hr class="title-highline-top"/>
<div class="col-md-6">
<h5>Examen de .......</h5>
</div>
<div class="col-md-6">
<h5>Examen de Ambas Mamas</h5>
</div>
<br/><br/>
</div>
<div class="col-md-12" >
<div class="row" style="border-top:1px solid;border-color:rgb(206,206,206)" >
<br/>
<div class="col-lg-6"  >

<div class="form-group">
<label class="control-label col-md-3" >Neurologico </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="neuro_s" >
<option value="" hidden></option>

</select>
<textarea class="form-control" cols="20" id="neuro_text"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Cabeza </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="cabeza" >
<option></option>
<option>Enoftalmo</option>
<option>Exoftalmo</option>
<option>Hirsutismo</option>
</select>
<textarea class="form-control" cols="20" id="cabeza_text"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Cuello </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="cuello" >
<option  hidden></option>
<?php 

foreach($cuello as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cuello_text"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" > Abdomen Inspección:</label>
<div class="col-md-6">
<label>Forma</label>
<select class="form-control select-examsis" id="abd_insp" style="width:100%">
<option></option>
<?php 

foreach($forma as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Auscultación</label>
<select class="form-control select-examsis" id="ausc" style="width:100%">
<option></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Percusión</label>
<select class="form-control select-examsis" id="perc" style="width:100%">
<option></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Palpación</label>
<select class="form-control select-examsis" id="palpa" style="width:100%">
<option></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<br/><br/><br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Extremidades Superiores </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="ext_sup" >
<option value="" hidden></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_sup_text"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
</div>
<!----------------------------------------->
<div class="col-lg-6" >
<div class="row"  >

<div class="col-lg-6"  style="border-right:1px solid;border-color:rgb(206,206,206)">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
</span> <label> Cuad. Inf. Externo</label>

<input  type="text" id="cuad_inf_ext1" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Izquierda : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsis" id="mama_izq1" style="width:100%">
<option></option>
<?php 

foreach($mama as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>


</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  type="text" class="form-control" id="cuad_sup_ext1" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext11" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input id="region_retro1" class="form-control"  type="text"/>
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon1" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsis" id="region_ax1"  style="width:100%">
<option></option>
<?php 

foreach($axilar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>

</div>


</div>

<div class="col-lg-6">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
 </span> <label> Cuad. Sup. Externo</label>

<input  type="text" id="cuad_inf_ext2" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Derecha : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsis" id="mama_izq2"  style="width:100%">
<option></option>
<?php 

foreach($mama as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>


</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  type="text" class="form-control" id="cuad_sup_ext2" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext22" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input  type="text" class="form-control" id="region_retro2" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon2"  />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsis" id="region_ax2"  style="width:100%">
<option></option>
<?php 

foreach($axilar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>

</div> 
</div>
</div>
<br/>

<div class="form-group">
<label class="control-label col-md-3" >Torax: Corazón y pulmones:</label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="torax" >
<option value="" hidden></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="torax_text"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Extremidades Inferiores</label>
<div class="form-group col-md-7">
<select  class="form-control select-examsis" id="ext_inf" >
<option value="" hidden></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_inft"></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>
</div>
</div>

</div>
</div>

<div class="col-md-12">
<hr class="title-highline-top"/>
<table>
<th>Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual</th>
</table>
</div>
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-4" >Especuloscopia </label>
<div class="form-group col-md-8">
<input  type="radio" name="especuloscopia" value="" checked hidden>
Si <input  type="radio" name="especuloscopia" value="Si"> &nbsp; No&nbsp;<input type="radio" name="especuloscopia" value="No">&nbsp;&nbsp;&nbsp;&nbsp;
<label style="font-size:14px" class="control-label"> Tacto Bimanual</label> Si <input type="radio" name="tacto_bima"  value="Si"> &nbsp; No <input type="radio" name="tacto_bima"  value="No"> 
<input  type="radio" name="tacto_bima" value="" checked hidden>
</div>

</div>
</div>
<div class="col-md-12">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Cervix <span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="cervix_checkbox" ></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsis"  id="cervix" >
<option value="" hidden></option>

</select>
<textarea class="form-control" cols="20" id="cervix_text"></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Utero </label>
<div class="form-group col-md-8">

<textarea class="form-control" cols="20" id="utero_text"></textarea>
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Anexos 
<span style="font-size:13px">
 <input type="checkbox" name="anexo_derecho">&nbsp; Derecho
 </span>
<span style="font-size:13px">
&nbsp;Izquerdo
 </span>
</label>
<div class="form-group col-md-8">
<br/>
<input class="form-control" type="text" id="anexo_derecho_text" />
<input class="form-control" type="text" id="anexo_iz_text" />
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Inspeccion Vulvar <span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="inspection_vulval_checkbox" ></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsis"  id="inspection_vulval" >
<option value="" hidden></option>
<?php 

foreach($inspeccion_vulvar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="inspection_vulval_text"></textarea>
</div>

</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Tacto rectal </label>

<div class="form-group col-md-8">
<select  class="form-control select-examsis" id="rectal" >
<option value="" hidden></option>
<?php 

foreach($rectal as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="rectal_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital masculino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsis" id="genitalm" >
<option value="" hidden></option>
<?php 

foreach($genitalm as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalm_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital femenino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsis" id="genitalf" >
<option value="" hidden></option>
<?php 

foreach($genitalf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalf_text"></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Tacto vaginal </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsis" id="vagina" >
<option value="" hidden></option>
<?php 

foreach($vagina as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="vagina_text"></textarea>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="col-md-12 col-md-offset-2">

<a  href="#top_exam" title="Ve arriba" style="cursor:pointer"><i class="fa fa-arrow-up" aria-hidden="true" style="font-size:24px"></i></a>
</div>
<script src="<?=base_url();?>assets/js/jquery.number.js"></script>
