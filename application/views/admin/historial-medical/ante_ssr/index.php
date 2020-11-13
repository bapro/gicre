
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>
<div  id="show_ss_data"></div>
<div id="hide_ssr" >
<form  id="formssr" class="form-horizontal"  method="post"  > 
<input type="hidden" id="operation" value="insert" > 

<div class="hide-navegador-ssr" >
<p class=" h4 his_med_title"  >Antecedentes de Salud Sexual y Reproductiva </p> 
<?php if ($count_ssr > 0)
{
?>
<div class="col-xs-4"  >
<div class="input-group" >
<span class="input-group-addon"><span style="color:green;font-size:20px" ><b><?=$count_ssr?></b> </span>regitros 1 (s)</span> 

<select class="form-control" id="id_ssr" >
<option value="" hidden>navegador </option>
<?php 

 foreach($ssr as $row)
{

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->date_time)));	
?>
<option value="<?=$row->idssr;?>"># (<?=$row->idssr;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>
</div>
<br/>
</div>
<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>


<br/>
<hr class="hr_ad"/>
</div>
<div class="show-navegador-ssr" ></div>

<div class="col-md-12 backg border-historial-clinica" style="max-height: calc(100vh - 210px); overflow-y: auto;">
<div class="col-md-6" style="border-right:1px solid rgb(205,205,205);">
<br/>

<div class="form-group">
<label class="col-md-7 control-label">Ha tenido relaciones sexuales ?</label>
<div class="col-md-3">
<input type="radio" id="optradio" name="optradio" value="" checked hidden>
<span class="radio-inline">
<input type="radio" id="optradio" name="optradio" value="Si" >Si
</span>
<span class="radio-inline">
<input type="radio" id="optradio" name="optradio" value="No">No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Edad de inicio de la vida sexual activa :</label>
<div class="col-md-3">
<input  id="edad" class="form-control" type="text">

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Numero de parejas sexuales :</label>
<div class="col-md-3">
<input  id="numero" class="form-control" type="number" min="1">
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Tiene vida sexuale actual ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" id="sexual" name="sexual" value="" checked hidden>
<input type="radio" id="sexual" name="sexual" value="Si" > Si
</span>
<span class="radio-inline">
<input type="radio" id="sexual" name="sexual" value="No"> No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Sexo de la pareja actual :</label>
<div class="col-md-4">
<select  class="form-control"  id="pareja" >
<option value="" hidden></option>
<option>Masculino</option>
<option>Feminino</option>
</select>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Como califica su vida sexual ?</label>
<fieldset data-role="controlgroup" data-type="horizontal">
<span>
<input type="radio" id="califica" name="califica" value="" checked hidden>
<input type="radio" id="califica" name="califica" value="Bueno">&nbsp;Bueno
</span>
<span>
<input type="radio" id="califica" name="califica" value="Regular">&nbsp;Regular
</span>
<span >
<input type="radio" id="califica" name="califica" value="Mala">&nbsp;Mala
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="califica_text" class="form-control"></textarea>
</fieldset>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Utilizo preservativo en su ultima relacion sexual ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="utilizo" id="utilizo" value="" checked hidden>
<input type="radio" id="utilizo" name="utilizo" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" id="utilizo" name="utilizo" value="No">No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Ha tenido relaciones sexuales con persona de su mismo sexo ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="sexual2" id="sexual2" value="" checked hidden>
<input type="radio" name="sexual2" id="sexual2" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" name="sexual2" id="sexual2" value="No">No
</span>

</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Utilizo algun metodo de planificacion fam ?</label>
<div class="col-md-9">
<span class="radio-inline">
<input type="radio" name="planif" id="planif" value="" checked hidden>
<input type="radio" name="planif" id="planif" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" name="planif" id="planif" value="No">No
</span>
<br/>
<label class="control-label">Desc : </label>
<select id="planif_text" class="form-control" >
<option value=""></option>
<option>Condón Masculino</option>
<option>Condón Femenino</option>
<option>Pildoras Anticonceptivas</option>
<option>Anillo Hormonal</option>
<option>DIU</option>
<option>Injeccion Anticonceptivas</option>
<option>Ligadura de Trompas</option>
<option>Implante</option>
<option>Marcha atrás</option>
<option>Calculadora de dias fertiles</option>
<option>Ducha Vaginal</option>
<option>Parche Anticonceptivo</option>
<option>Diafragma</option>
</select>
</div>
</div>


<div class="form-group">
<label class="col-md-7 control-label">Quiero embarazarse ?</label>
<div class="col-md-3">
<input type="radio" id="embara" name="embara" value="" checked hidden>
<span class="radio-inline">
<input type="radio" id="embara" name="embara" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" id="embara" name="embara" value="No">No
</span>

</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Menarquia ?</label>
<div class="col-md-3">
<div class="input-group">
<input class="form-control" type="text" id="menarquia"/>
<span class="input-group-addon">anos</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Fecha de ultima menstruacion (FUM) ?</label>
<div class="col-md-3">
<input class="form-control" id="fecha_ul_m" name="date_fum" type="text"  data-mask="00/00/0000" />
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label">Menaopausica</label>
<div class="col-md-3">
<input type="radio" id="menaop" name="menaop" value="" checked hidden>
<span class="radio-inline">
<input type="radio" id="menaop" name="menaop" value="Si"> Si
</span>
<span class="radio-inline">
<input type="radio" id="menaop"  name="menaop" value="No"> No
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Ciclos menstruales :</label>
<div class="col-md-9" style="font-size:13px">
<input type="radio" id="cliclo" name="cliclo" value="" checked hidden>
<span class="radio-inline">
<input type="radio" id="cliclo" name="cliclo" value="Regulares">Regulares
</span>
<span class="radio-inline">
<input type="radio" id="cliclo" name="cliclo" value="Irregulares">Irregulares
</span>

<br/>
<label class="control-label">Desc : </label>
<textarea  class="form-control" id="cliclo_text" style="display:none"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Duracion de sangrado menstrual ?</label>
<div class="col-md-3">
<div class="input-group">
<input class="form-control" type="number" id="dura_sang" min="1" />
<span class="input-group-addon">dias</span>
</div>
</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label">Cantidad de sangrado menstrual ?</label>
<div class="col-md-5" style="font-size:14px;">
<input type="radio" id="cant_sang" name="cant_sang" value="" checked hidden>
<span class="radio">
<input type="radio" id="cant_sang" name="cant_sang" value="Normal">Normal
</span>
<span class="radio">
<input type="radio" id="cant_sang" name="cant_sang" value="Escaso">Escaso
</span>
<span class="radio">
<input type="radio" id="cant_sang" name="cant_sang" value="Abudante">Abudante
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Dismenorrea</label>
<div class="col-md-5" style="font-size:14px; font-weight:bold">
<span class="radio-inline">
<input type="radio" id="dismeno" name="dismeno" value="" checked hidden>
<input type="radio" id="dismeno" name="dismeno" value="No" >No
</span>
<span class="radio-inline">
<input type="radio" id="dismeno" name="dismeno" value="Si">Si
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Fecha de ultima PAP</label>
<div class="col-md-5" style="font-size:14px">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="" checked hidden>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Nunca">Nunca
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Menos de un ano">Menos de un ano
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Entre uno a tres anos">Entre uno a tres anos
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Mas de tres anos">Mas de tres anos
</span>
</div>
</div>

<div class="form-group" style="border-top:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Antecedentes de PAP Resultados Alterados o Anormales</label>
<div class="col-md-9" style="font-size:14px; ">
<input type="radio" id="ant_pap_re" name="ant_pap_re" value="" checked hidden>
<span class="radio-inline">
<input type="radio" id="ant_pap_re" name="ant_pap_re" value="No">No
</span>
<span class="radio-inline">
<input type="radio" id="ant_pap_re" name="ant_pap_re" value="Si">Si
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="ant_pap_re_text" class="form-control"></textarea>
</div>
</div>
</div><!--1eme 6 ends -->

<div class="col-md-6"><!--2eme 6 begins -->
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-5 control-label">Se realiza autoexamen mamario</label>
<div class="col-md-7">
<span class="radio-inline">
<input type="radio" id="realiza_auto" name="realiza_auto" onclick="show7();" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" id="realiza_auto" name="realiza_auto" onclick="show8();" value="No" checked>No
</span>
<br/>
<textarea id="realiza_auto_text" class="form-control" style="display:none"></textarea>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-6 control-label">Fecha de la ultima mamagrafia&nbsp;&nbsp;&nbsp;</label>
<div class="col-md-6" style="font-size:14px;">
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="" checked hidden>
<span class="radio">
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="Nunca">&nbsp;Nunca
</span>
<span class="radio">
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="Menos de un ano">&nbsp;Menos de un ano
</span>
<span class="radio">
<input type="radio" id="fecha_ul_mama"  name="fecha_ul_mama" value="Entre un y tres anos">&nbsp;Entre un y tres anos
</span>
<span class="radio">
<input type="radio" name="fecha_ul_mama">&nbsp;Mas de tres anos
</span>
</div>
</div>


<div class="form-group sumges">
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">P</span>
<input type="text" id="p" class="form-control totgen"  >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">A</span>
<input type="text" id="a" class="form-control totgen" >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">C</span>
<input type="text" id="c" class="form-control totgen" >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">E</span>
<input type="text" id="e" class="form-control totgen" >
</div>
</div>

</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="control-label col-md-3" style="font-size:12px">Total de GESTACIONES </label>
<div class="col-md-3">
<input  class="form-control"  type="text" id="totalGest" readonly >
</div>

</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-5 control-label">En case de nuligesta, ha sido por :</label>
<!-- <fieldset data-role="controlgroup" data-type="horizontal">-->
<div class="col-md-7" style="font-size:14px;">
<input type="radio" id="nuligesta" name="nuligesta" value="" checked hidden>
<span class="radio">
<input type="radio" id="nuligesta" name="nuligesta" value="No ha iniciado vida sexual activa">&nbsp;No ha iniciado vida sexual activa
</span>
<span class="radio">
<input type="radio" id="nuligesta" name="nuligesta" value="Propia eleccion">&nbsp;Propia eleccion
</span>
<span class="radio">
<input type="radio" id="nuligesta" name="nuligesta" value="No ha propido embarazarse">&nbsp;No ha propido embarazarse
</span>
<span class="radio" >
<input type="radio" id="nuligesta" name="nuligesta">&nbsp;No ha propido conservar los embarazos
</span>
</div>
<!--</fieldset>-->
</div>


<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Complicaciones Partos/Cesarea</label>
<div class="col-md-9">
<span class="radio-inline">
<input type="radio" id="complica" name="complica" value="No" onclick="show6();" checked>No
</span>
<span class="radio-inline">
<input type="radio" id="complica" name="complica" value="Si" onclick="show5();">Si (Especifique)
</span>
<br/>
<textarea id="complica_text" class="form-control" style="display:none"></textarea>
</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Complicaciones durante embarazos</label>
<div class="col-md-9">
<span class="radio-inline">
<input type="radio" id="complica_dur" name="complica_dur" value="No" onclick="show4();" checked>No
</span>
<span class="radio-inline">
<input type="radio" id="complica_dur" name="complica_dur" value="Si" onclick="show3();">Si (Especifique)
</span>
<br/>
<textarea  class="form-control" id="complica_dur_text" style="display:none"></textarea>
</div>
</div>


<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-5 control-label">Infeccion de transmision sexual</label>
<div class="col-md-7">
<span class="radio-inline">
<input type="radio"  name="infec_tran" id="infec_tran" value="Si" onclick="show1();"> Si
</span>
<span class="radio-inline">
<input type="radio" name="infec_tran" id="infec_tran" value="No" onclick="show2();" checked> No
</span>
<p id="display_ifts" style="display:none">
<span class="radio">
<input type="checkbox"  name="sifilis">&nbsp;Sifilis
</span>
<span class="radio">
<input type="checkbox"  name="gonorrea">&nbsp;Gonorrea
</span>
<span class="radio">
<input type="checkbox" name="clamidia">&nbsp;Clamidia
</span>
<span class="radio">
<input type="checkbox"  name="otro">&nbsp;Otro (especificar)
</span>
<input style="text-transform:lowercase" type="hidden" class="form-control" id="otro_infeccion" >
<textarea  style="text-transform:lowercase" class="form-control"  id="otro_infeccion1"></textarea>
</p>
</div>
</div>
<div class="form-group">
<fieldset>
<legend>Resumen de alertas:</legend>
</fieldset>
</div>
</div><!--2 em 6 end-->
</div>

</form>

</div>


