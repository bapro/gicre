<?php
foreach($ExamFisById as $rowExF)

?>



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

<div class="col-md-6"  >

<div class="form-group">
<label class="control-label col-md-4" >Neurologico </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="neuro_sex" >
<option  hidden><?=$rowExF->neuro_s?></option>

</select>
<textarea class="form-control" cols="20" id="neuro_textex"><?=$rowExF->neuro_text?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" >Cabeza </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="cabezaex" >
<option hidden><?=$rowExF->cabeza?></option>
<option>Enoftalmo</option>
<option>Exoftalmo</option>
<option>Hirsutismo</option>
</select>
<textarea class="form-control" cols="20" id="cabeza_textex"><?=$rowExF->cabeza_text?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" >Cuello </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="cuelloex" >
<option  hidden><?=$rowExF->cuello?></option>
<?php 

foreach($cuello as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cuello_textex"><?=$rowExF->cuello_text?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" > Abdomen Inspección:</label>
<div class="col-md-8">
<label>Forma</label>
<select class="form-control select-examsisex" id="abd_inspex" style="width:100%">
<option hidden><?=$rowExF->abd_insp?></option>
<?php 

foreach($forma as $row1)
{ 
echo '<option value="'.$row1->name.'">'.$row1->name.'</option>';
}
?>

</select>
<label>Auscultación</label>
<select class="form-control select-examsisex" id="auscex" style="width:100%">
<option hidden><?=$rowExF->ausc?></option>
<?php 

foreach($relativo as $row2)
{ 
echo '<option value="'.$row2->name.'">'.$row2->name.'</option>';
}
?>

</select>
<label>Percusión</label>
<select class="form-control select-examsisex" id="percex" style="width:100%">
<option hidden><?=$rowExF->perc?></option>
<?php 

foreach($relativo as $row3)
{ 
echo '<option value="'.$row3->name.'">'.$row3->name.'</option>';
}
?>

</select>
<label>Palpación</label>
<select class="form-control select-examsisex" id="palpaex" style="width:100%">
<option hidden><?=$rowExF->palpa?></option>
<?php 

foreach($relativo as $row4)
{ 
echo '<option value="'.$row4->name.'">'.$row4->name.'</option>';
}
?>

</select>
<br/><br/><br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-4" >Extremidades Superiores </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="ext_supex" >
<option  hidden><?=$rowExF->ext_sup?></option>
<?php 

foreach($ext_inf as $row5)
{ 
echo '<option value="'.$row5>name.'">'.$row5->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_sup_textex"><?=$rowExF->ext_sup_text?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>-->
</div>

</div>

<div class="col-md-6" >
<div class="row"  >
<div class="col-md-6"  style="border-right:1px solid;border-color:rgb(206,206,206)">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
</span> <label> Cuad. Inf. Externo</label>

<input  type="text" id="cuad_inf_ext1ex" value="<?=$rowExF->cuad_inf_ext1?>" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Izquierda : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsisex" id="mama_izq1ex" style="width:100%">
<option hidden><?=$rowExF->mama_izq1?></option>
<?php 

foreach($mama as $row6)
{ 
echo '<option value="'.$row6->name.'">'.$row6->name.'</option>';
}
?>

</select>


</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  type="text" class="form-control" value="<?=$rowExF->cuad_sup_ext1?>" id="cuad_sup_ext1ex" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" value="<?=$rowExF->cuad_inf_ext11?>" id="cuad_inf_ext11ex" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input id="region_retro1ex" class="form-control" value="<?=$rowExF->region_retro1?>" type="text"/>
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon1ex"  value="<?=$rowExF->region_areola_pezon1?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsisex" id="region_ax1ex"  style="width:100%">
<option hidden><?=$rowExF->region_ax1?></option>
<?php 

foreach($axilar as $row7)
{ 
echo '<option value="'.$row7->name.'">'.$row7->name.'</option>';
}
?>

</select>

</div>

</div>

<div class="col-md-6">
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
 </span> <label> Cuad. Sup. Externo</label>

<input  type="text" id="cuad_inf_ext2ex" value="<?=$rowExF->cuad_inf_ext2?>" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Derecha : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsisex" id="mama_izq2ex"  style="width:100%">
<option hidden><?=$rowExF->mama_izq2?></option>
<?php 

foreach($mama as $row8)
{ 
echo '<option value="'.$row8->name.'">'.$row8->name.'</option>';
}
?>

</select>


</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Sup. Externo</label>

<input  value="<?=$rowExF->cuad_sup_ext2?>" type="text" class="form-control" id="cuad_sup_ext2ex" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext22ex" value="<?=$rowExF->cuad_inf_ext22?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input  type="text" class="form-control" id="region_retro2ex" value="<?=$rowExF->region_retro2?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon2ex" value="<?=$rowExF->region_areola_pezon2?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsisex" id="region_ax2ex"  style="width:100%">
<option><?=$rowExF->region_ax2?></option>
<?php 

foreach($axilar as $row9)
{ 
echo '<option value="'.$row9->name.'">'.$row9->name.'</option>';
}
?>

</select>

</div> 
</div>
</div>
<br/>


<div class="form-group">
<label class="control-label col-md-4" >Torax: Corazón y pulmones</label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="toraxex" >
<option hidden><?=$rowExF->torax?></option>
<?php 

foreach($ext_inf as $row11)
{ 
echo '<option value="'.$row11->name.'">'.$row11->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="torax_textex"><?=$rowExF->torax_text?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>-->
</div>
<div class="form-group">
<label class="control-label col-md-4" >Extremidades Inferiores</label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="ext_infex" >
<option hidden><?=$rowExF->ext_inf?></option>
<?php 

foreach($ext_inf as $row22)
{ 
echo '<option value="'.$row22->name.'">'.$row22->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_inftex"><?=$rowExF->ext_inft?></textarea>
</div>
<!--<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>-->
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
<label class="control-label col-md-2" >&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
Especuloscopia </label>
<div class="form-group col-md-8">

Si 
<?php
if($rowExF->especuloscopia =="Si"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='especuloscopiaex' value='Si' $selected />";
?>

&nbsp; No&nbsp;
<?php
if($rowExF->especuloscopia =="No"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='especuloscopiaex' value='No' $selected />";
?>
&nbsp;&nbsp;&nbsp;&nbsp;
<label style="font-size:14px" class="control-label"> Tacto Bimanual</label> 
Si
<?php
if($rowExF->tacto_bima =="Si"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='tacto_bimaex' value='Si' $selected />";
?>
 &nbsp; No 
<?php
if($rowExF->tacto_bima =="No"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='tacto_bimaex' value='No' $selected />";
?>

</div>

</div>
</div>



<div class="col-md-12">
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Cervix <!--<span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="cervix_checkboxex" >--></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex"  id="cervixex" >
<option  hidden><?=$rowExF->cervix?></option>

</select>
<textarea class="form-control" cols="20" id="cervix_textex"><?=$rowExF->cervix_text?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Utero </label>
<div class="form-group col-md-8">

<textarea class="form-control" cols="20" id="utero_textex"><?=$rowExF->utero_text?></textarea>
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
<input class="form-control" value="<?=$rowExF->anexo_derecho_text?>" type="text" id="anexo_derecho_textex" />
<input class="form-control" value="<?=$rowExF->anexo_iz_text?>" type="text" id="anexo_iz_textex" />
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Inspeccion Vulvar <!--<span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="inspection_vulval_checkbox" >--></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex"  id="inspection_vulvalex" >
<option  hidden><?=$rowExF->inspection_vulval?></option>
<?php 

foreach($inspeccion_vulvar as $row33)
{ 
echo '<option value="'.$row33->name.'">'.$row33->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="inspection_vulval_textex"><?=$rowExF->inspection_vulval_text?></textarea>
</div>

</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Tacto rectal </label>

<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="rectalex" >
<option  hidden><?=$rowExF->rectal?></option>
<?php 

foreach($rectal as $row44)
{ 
echo '<option value="'.$row44->name.'">'.$row44->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="rectal_textex"><?=$rowExF->rectal_text?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital masculino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="genitalmex" >
<option hidden><?=$rowExF->genitalm?></option>
<?php 

foreach($genitalm as $row55)
{ 
echo '<option value="'.$row55->name.'">'.$row55->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalm_textex"><?=$rowExF->genitalm_text?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital femenino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="genitalfex" >
<option  hidden><?=$rowExF->genitalf?></option>
<?php 

foreach($genitalf as $row66)
{ 
echo '<option value="'.$row66->name.'">'.$row66->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalf_textex"><?=$rowExF->genitalf_text?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-md-3" >Tacto vaginal </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="vaginaex" >
<option  hidden><?=$rowExF->vagina?></option>
<?php 

foreach($vagina as $row77)
{ 
echo '<option value="'.$row77->name.'">'.$row77->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="vagina_textex"><?=$rowExF->vagina_text?></textarea>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


