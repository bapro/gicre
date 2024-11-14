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

<div class="col-md-5"  >

<div class="form-group">
<label class="control-label" >Neurologico </label>
<select  class="form-control select-examsisex" id="neuro_sex" >
<option  hidden><?=$rowExF->neuro_s?></option>

</select>
<textarea class="form-control" rows="11" id="neuro_textex"><?=$rowExF->neuro_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" >Cabeza </label>
<select  class="form-control select-examsisex" id="cabezaex" >
<option hidden><?=$rowExF->cabeza?></option>
<option>Enoftalmo</option>
<option>Exoftalmo</option>
<option>Hirsutismo</option>
</select>
<textarea class="form-control" rows="11" id="cabeza_textex"><?=$rowExF->cabeza_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" >Cuello </label>
<select  class="form-control select-examsisex" id="cuelloex" >
<option  hidden><?=$rowExF->cuello?></option>
<?php 

foreach($cuello as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="cuello_textex"><?=$rowExF->cuello_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" > Abdomen Inspección:</label>
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
<div class="form-group">
<label class="control-label" >Extremidades Superiores </label>
<select  class="form-control select-examsisex" id="ext_supex" >
<option  hidden><?=$rowExF->ext_sup?></option>
<?php 

foreach($ext_inf as $row5)
{ 
echo '<option value="'.$row5>name.'">'.$row5->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="ext_sup_textex"><?=$rowExF->ext_sup_text?></textarea>
</div>

</div>

<div class="col-md-6  col-md-offset-1" >
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
<label class="control-label" >Torax: Corazón y pulmones</label>
<select  class="form-control select-examsisex" id="toraxex" >
<option hidden><?=$rowExF->torax?></option>
<?php 

foreach($ext_inf as $row11)
{ 
echo '<option value="'.$row11->name.'">'.$row11->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="torax_textex"><?=$rowExF->torax_text?></textarea>
</div>
<div class="form-group">
<label class="control-label" >Extremidades Inferiores</label>
<select  class="form-control select-examsisex" id="ext_infex" >
<option hidden><?=$rowExF->ext_inf?></option>
<?php 

foreach($ext_inf as $row22)
{ 
echo '<option value="'.$row22->name.'">'.$row22->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="ext_inftex"><?=$rowExF->ext_inft?></textarea>
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
<label class="control-label" >&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
Especuloscopia </label>

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



<div class="col-md-12">
<div class="col-md-5">
<div class="form-group">
<label class="control-label" >Cervix </label>
<select  class="form-control select-examsisex"  id="cervixex" >
<option  hidden><?=$rowExF->cervix?></option>

</select>
<textarea class="form-control" rows="11" id="cervix_textex"><?=$rowExF->cervix_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" >Utero </label>


<textarea class="form-control" rows="11" id="utero_textex"><?=$rowExF->utero_text?></textarea>


</div>

<div class="form-group">
<label class="control-label" >Anexo Derecho</label>
<input class="form-control" value="<?=$rowExF->anexo_derecho_text?>" type="text" id="anexo_derecho_textex" />
<label class="control-label" >Anexo Izquerdo</label>
<input class="form-control" value="<?=$rowExF->anexo_iz_text?>" type="text" id="anexo_iz_textex" />

</div>

<div class="form-group">
<label class="control-label" >Inspeccion Vulvar <!--<span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="inspection_vulval_checkbox" >--></label>

<select  class="form-control select-examsisex"  id="inspection_vulvalex" >
<option  hidden><?=$rowExF->inspection_vulval?></option>
<?php 

foreach($inspeccion_vulvar as $row33)
{ 
echo '<option value="'.$row33->name.'">'.$row33->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="inspection_vulval_textex"><?=$rowExF->inspection_vulval_text?></textarea>


</div>

</div>
<div class="col-md-6   col-md-offset-1">
<div class="form-group">
<label class="control-label" >Tacto rectal </label>

<select  class="form-control select-examsisex" id="rectalex" >
<option  hidden><?=$rowExF->rectal?></option>
<?php 

foreach($rectal as $row44)
{ 
echo '<option value="'.$row44->name.'">'.$row44->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="rectal_textex"><?=$rowExF->rectal_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" >Genital masculino </label>

<select  class="form-control select-examsisex" id="genitalmex" >
<option hidden><?=$rowExF->genitalm?></option>
<?php 

foreach($genitalm as $row55)
{ 
echo '<option value="'.$row55->name.'">'.$row55->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="genitalm_textex"><?=$rowExF->genitalm_text?></textarea>

</div>
<div class="form-group">
<label class="control-label" >Genital femenino </label>
<select  class="form-control select-examsisex" id="genitalfex" >
<option  hidden><?=$rowExF->genitalf?></option>
<?php 

foreach($genitalf as $row66)
{ 
echo '<option value="'.$row66->name.'">'.$row66->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="genitalf_textex"><?=$rowExF->genitalf_text?></textarea>
</div>

<div class="form-group">
<label class="control-label " >Tacto vaginal </label>
<select  class="form-control select-examsisex" id="vaginaex" >
<option  hidden><?=$rowExF->vagina?></option>
<?php 

foreach($vagina as $row77)
{ 
echo '<option value="'.$row77->name.'">'.$row77->name.'</option>';
}
?>
</select>
<textarea class="form-control" rows="11" id="vagina_textex"><?=$rowExF->vagina_text?></textarea>
</div>
</div>
</div>

</div>
</div>
</div>


