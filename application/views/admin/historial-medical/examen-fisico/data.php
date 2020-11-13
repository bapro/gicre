<?php
foreach($show_signo_by_id as $row1)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row1->inserted_time)));	
//$update_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row1->updated_time)));	

$inserted_time = date("d-m-Y H:i:s", strtotime($row1->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row1->updated_time));

foreach($show_signo_by_id as $row)
?>


<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Examen fisico # <span class="round"><?=$row1->id_sig?></span> </h3><br/>
<h5 class="modal-title text-center"  >Creado por :<?=$row1->inserted_by?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$row1->updated_by?> | fecha :<?=$update_time?></span> </h5>
 <?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button"  class="show_modif_exam_fis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
<button type="button" id="save_exam_fis_hide" class="save_exam_fis_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank" href="<?php echo base_url('printings/print_exa_f/'.$row1->id_sig)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>
<div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
<form  class="form-horizontal"  method="post"  >
<div  id="resultssr"></div>
<input type="hidden" id="id_sig" value="<?=$row1->id_sig?>">
<input type="hidden" id="updated_by" value="<?=$user?>">
<div id="resultexam"></div>
<div class="col-md-12 disable-all backg" style="background:white;">


<div class="col-xs-12"  >


<table class="table"  cellspacing="0" >
  <tr>
  <th class="col-xs-4">Signos vitales</th><th></th><th>  Aspecto General</th>
  </tr>
<tr>

<td class="ida" style="font-weight:bold"><br/><br/>
<label  class="col-sm-2 control-label">Peso</label>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control"  id="pesoex" value="<?=$row->peso?>" type="text" >
   <span class="input-group-addon">lb</span>
</div>
</div>
<div class="col-sm-5">
<div class="input-group">
	<input class="form-control" id="kgex" value="<?=$row->kg?>" type="text" readonly>
	<span class="input-group-addon">kg</span>
</div>
</div>
</td>
<td title="Tension Arterial" style=""><br/>
<span class="title" style="margin-left:210px;">Ta</span>
<hr style="width: 65px; height: 1px;  position:relative;margin: 0 auto;margin-left:185px; border: none; box-shadow: 3px 3px 6px #0e0e0e; background-color: #38a7bb"/>
<div class="col-sm-5">
<div class="input-group">
<span class="input-group-addon">mm</span>

<input class="form-control" id="taex" value="<?=$row->ta?>" type="text" > 
</div>
</div>
<label  class="col-sm-1 control-label" ><span style="margin-left:30px"></span>/</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group">
<span class="input-group-addon">hg</span>

<input class="form-control " id="hgex" value="<?=$row->hg?>" type="text" >
</div>
</div>
</td>
<td style="width:1px" >
<br/>
<br/>
<?php
if($row->radio =="SANO"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='SANO' $selected /> SANO";
?>
 		
</td>
</tr>

<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">Talla</label>
<div class="col-sm-5">
<div class="input-group">
<input class="form-control" id="tallaex"  type="text" value="<?=$row->talla?>"  >

</div>
</div>

</td>
<td style="width:5px;font-weight:bold">
<label for="new_discount" class="col-sm-1 control-label">Fr</label>
<div class="col-sm-3" title="Frecuencia respiratoria">
<div class="input-group">
<input class="form-control" id="frex" value="<?=$row->fr?>" type="text" >

</div>
</div>
<label  class="col-sm-2 control-label">Tempo.</label>
<div class="col-sm-5 col-sm-offset-1">
<div class="input-group" title="Temperatura">
<input class="form-control " id="tempoex" value="<?=$row->tempo?>" type="text" >
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
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='AGUDAMENTE ENFERMA' $selected /> AGUDAMENTE ENFERMA";
?></td>
</tr>



<tr>

<td class="ida" style="width:1px;font-weight:bold">
<label  class="col-sm-2 control-label">IMC</label> 
<div class="col-sm-7">
	<div class="input-group">
		<input class="form-control formatnum" id="imcex" value="<?=$row->imc?>" type="text" >
	   
	</div>
</div>
 </td>
<td style="width:5px;font-weight:bold">
<label  class="col-sm-1 control-label">Fc</label>
                    <div class="col-sm-3">
                        <div class="input-group" title="Frecuencia cardiaca">
                            <input class="form-control" id="fcex" value="<?=$row->fc?>" type="text" >
                           
                        </div>
                    </div>
					<label  class="col-sm-2 control-label">Pulso</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="input-group">
                           <input class="form-control " id="pulsoex" type="text" value="<?=$row->pulso?>" >
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
	echo "<input type='radio' id='radio_signoex' name='radio_signoex' value='CRONICAMENTE ENFERMA' $selected /> CRONICAMENTE ENFERMA";
?></td>
</tr>
</table>


</div>


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
<?php foreach($show_neuro as $rown)?>
<div class="col-lg-6"  >

<div class="form-group">
<label class="control-label col-md-3" >Neurologico </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsisex" id="neuro_sex" >
<option  hidden><?=$rown->neuro_s?></option>

</select>
<textarea class="form-control" cols="20" id="neuro_textex"><?=$rown->neuro_text?></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Cabeza </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsisex" id="cabezaex" >
<option hidden><?=$rown->cabeza?></option>
<option>Enoftalmo</option>
<option>Exoftalmo</option>
<option>Hirsutismo</option>
</select>
<textarea class="form-control" cols="20" id="cabeza_textex"><?=$rown->cabeza_text?></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Cuello </label>
<div class="form-group col-md-7">
<select  class="form-control select-examsisex" id="cuelloex" >
<option  hidden><?=$rown->cuello?></option>
<?php 

foreach($cuello as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="cuello_textex"><?=$rown->cuello_text?></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_nerv"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" > Abdomen Inspección:</label>
<div class="col-md-6">
<label>Forma</label>
<select class="form-control select-examsisex" id="abd_inspex" style="width:100%">
<option hidden><?=$rown->abd_insp?></option>
<?php 

foreach($forma as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Auscultación</label>
<select class="form-control select-examsisex" id="auscex" style="width:100%">
<option hidden><?=$rown->ausc?></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Percusión</label>
<select class="form-control select-examsisex" id="percex" style="width:100%">
<option hidden><?=$rown->perc?></option>
<?php 

foreach($relativo as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>
<label>Palpación</label>
<select class="form-control select-examsisex" id="palpaex" style="width:100%">
<option hidden><?=$rown->palpa?></option>
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
<select  class="form-control select-examsisex" id="ext_supex" >
<option  hidden><?=$rown->ext_sup?></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_sup_textex"><?=$rown->ext_sup_text?></textarea>
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
<?php 

 foreach($show_examenes_ambas as $row2)
{  
?>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Normal <input type="checkbox">
</span> <label> Cuad. Inf. Externo</label>

<input  type="text" id="cuad_inf_ext1ex" value="<?=$row2->cuad_inf_ext1?>" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Izquierda : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsisex" id="mama_izq1ex" style="width:100%">
<option hidden><?=$row2->mama_izq1?></option>
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

<input  type="text" class="form-control" value="<?=$row2->cuad_sup_ext1?>" id="cuad_sup_ext1ex" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" value="<?=$row2->cuad_inf_ext11?>" id="cuad_inf_ext11ex" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input id="region_retro1ex" class="form-control" value="<?=$row2->region_retro1?>" type="text"/>
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon1ex"  value="<?=$row2->region_areola_pezon1?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsisex" id="region_ax1ex"  style="width:100%">
<option hidden><?=$row2->region_ax1?></option>
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

<input  type="text" id="cuad_inf_ext2ex" value="<?=$row2->cuad_inf_ext2?>" class="form-control"/>
</div>
<div class="form-group">
<span style="font-weight:bold;font-size:14px">Mama Derecha : </span> <label> Cuad. Sup. Externo</label>
<select class="form-control select-examsisex" id="mama_izq2ex"  style="width:100%">
<option hidden><?=$row2->mama_izq2?></option>
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

<input  value="<?=$row2->cuad_sup_ext2?>" type="text" class="form-control" id="cuad_sup_ext2ex" />
</div>
<div class="form-group">
<label style="font-weight:bold;font-size:14px">Cuad. Inf. Externo</label>

<input  type="text" class="form-control" id="cuad_inf_ext22ex" value="<?=$row2->cuad_inf_ext22?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Retroareolar</label>

<input  type="text" class="form-control" id="region_retro2ex" value="<?=$row2->region_retro2?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Areola-Pezon</label>

<input  type="text" class="form-control" id="region_areola_pezon2ex" value="<?=$row2->region_areola_pezon2?>" />
</div>

<div class="form-group">
<label style="font-weight:bold;font-size:14px">Region Axilar</label>
<select class="form-control select-examsisex" id="region_ax2ex"  style="width:100%">
<option><?=$row2->region_ax2?></option>
<?php 

foreach($axilar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>

</select>

</div> 
</div>
<?php
}
?>
</div>
<br/>

<div class="form-group">
<label class="control-label col-md-3" >Torax: Corazón y pulmones:</label>
<div class="form-group col-md-7">
<select  class="form-control select-examsisex" id="toraxex" >
<option hidden><?=$rown->torax?></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="torax_textex"><?=$rown->torax_text?></textarea>
</div>
<div class="col-md-2" title="Ningúno" style="font-size:13px">
Sin Hallazgos<input type="checkbox" class="check_torax"> 
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Extremidades Inferiores</label>
<div class="form-group col-md-7">
<select  class="form-control select-examsisex" id="ext_infex" >
<option hidden><?=$rown->ext_inf?></option>
<?php 

foreach($ext_inf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="ext_inftex"><?=$rown->ext_inft?></textarea>
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

<?php 

 foreach($show_examene_pelv as $row3)

?>
<div class="col-md-12">
<div class="form-group">
<label class="control-label col-md-2" >&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
Especuloscopia </label>
<div class="form-group col-md-8">

Si 
<?php
if($row3->especuloscopia =="Si"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='especuloscopiaex' value='Si' $selected />";
?>

&nbsp; No&nbsp;
<?php
if($row3->especuloscopia =="No"){
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
if($row3->tacto_bima =="Si"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' name='tacto_bimaex' value='Si' $selected />";
?>
 &nbsp; No 
<?php
if($row3->tacto_bima =="No"){
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
<label class="control-label col-md-3" >Cervix <span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="cervix_checkboxex" ></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex"  id="cervixex" >
<option  hidden><?=$row3->cervix?></option>

</select>
<textarea class="form-control" cols="20" id="cervix_textex"><?=$row3->cervix_text?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-3" >Utero </label>
<div class="form-group col-md-8">

<textarea class="form-control" cols="20" id="utero_textex"><?=$row3->utero_text?></textarea>
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
<input class="form-control" value="<?=$row3->anexo_derecho_text?>" type="text" id="anexo_derecho_textex" />
<input class="form-control" value="<?=$row3->anexo_iz_text?>" type="text" id="anexo_iz_textex" />
</div>

</div>

<div class="form-group">
<label class="control-label col-md-3" >Inspeccion Vulvar <span style="font-size:13px"><br/>
&nbsp;Sin Hallazgos</span> <input type="checkbox" id="inspection_vulval_checkbox" ></label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex"  id="inspection_vulvalex" >
<option  hidden><?=$row3->inspection_vulval?></option>
<?php 

foreach($inspeccion_vulvar as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="inspection_vulval_textex"><?=$row3->inspection_vulval_text?></textarea>
</div>

</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label class="control-label col-md-3" >Tacto rectal </label>

<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="rectalex" >
<option  hidden><?=$row3->rectal?></option>
<?php 

foreach($rectal as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="rectal_textex"><?=$row3->rectal_text?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital masculino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="genitalmex" >
<option hidden><?=$row3->genitalm?></option>
<?php 

foreach($genitalm as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalm_textex"><?=$row3->genitalm_text?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Genital femenino </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="genitalfex" >
<option  hidden><?=$row3->genitalf?></option>
<?php 

foreach($genitalf as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="genitalf_textex"><?=$row3->genitalf_text?></textarea>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" >Tacto vaginal </label>
<div class="form-group col-md-8">
<select  class="form-control select-examsisex" id="vaginaex" >
<option  hidden><?=$row3->vagina?></option>
<?php 

foreach($vagina as $row)
{ 
echo '<option value="'.$row->name.'">'.$row->name.'</option>';
}
?>
</select>
<textarea class="form-control" cols="20" id="vagina_textex"><?=$row3->vagina_text?></textarea>
</div>
</div>
</div>
</div>

</div>

</form>
</div>

