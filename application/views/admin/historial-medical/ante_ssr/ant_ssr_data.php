<?php

foreach($ssr as $row)
//setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
//$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->date_time)));	
//$update_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->update_time)));	

$inserted_time = date("d-m-Y H:i:s", strtotime($row->date_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->update_time));
?>


<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title text-center"  >Ant. S.S.R # <span class="round"><?=$row->idssr?></span> </h3><br/>
<h5 class="modal-title text-center"  >Creado por :<?=$row->inserted_by?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$row->updated_by?> | fecha :<?=$update_time?></span> </h5>

<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_ant_ssr btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<button type="button" id="save_ant_ssr_hide" class="save_ant_ssr_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

<a target="_blank" href="<?php echo base_url('printings/print_ssr/'.$row->idssr)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

</div>
<div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
<form  class="form-horizontal"  method="post"  >
<div  id="resultssr"></div>
<input type="hidden" id="idssr" value="<?=$row->idssr?>">
<input type="hidden" id="updated_by" value="<?=$user?>">

<div class="col-md-12 disable-all backg" style="background:white;">

<div class="col-md-6" style="border-right:1px solid rgb(205,205,205);padding:20px">
<br/>
<div class="form-group">
<label class="col-md-7 control-label">Ha tenido relaciones sexuales ?</label>
<div class="col-md-3">
<input type="radio" id="optradio1" name="optradio1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->optradio =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='optradio1' name='optradio1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->optradio =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='optradio1' name='optradio1' value='No' $checked> No";
?>

</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Edad de inicio de la vida sexual activa :</label>
<div class="col-md-3">
<input  id="edad1" class="form-control" type="text" value="<?=$row->edad?>">
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Numero de parejas sexuales :</label>
<div class="col-md-3">
<input  id="numero1" class="form-control" type="number" min="1" value="<?=$row->numero?>">
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Tiene vida sexuale actual ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" id="sexual1" name="sexual1" value="" checked hidden>
<?php
if($row->sexual =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual1' name='sexual1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->sexual =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual1' name='sexual1' value='No' $checked> No";
?>
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Sexo de la pareja actual :</label>
<div class="col-md-4">
<select  class="form-control"  id="pareja1" >
<option hidden selected><?=$row->pareja?></option>
<option>Masculino</option>
<option>Feminino</option>
</select>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Como califica su vida sexual ?</label>
<fieldset data-role="controlgroup" data-type="horizontal">
<span>
<input type="radio" id="califica1" name="califica1" value="" checked hidden>
<?php
if($row->califica =="Bueno"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='califica1' name='califica1' value='Bueno' $checked> Bueno";
?>
</span>
<span>
<?php
if($row->califica =="Regular"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='califica1' name='califica1' value='Regular' $checked> Regular";
?>
</span>
<span >
<?php
if($row->califica =="Mala"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='califica1' name='califica1' value='Mala' $checked> Mala";
?>
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="califica_text1" class="form-control"><?=$row->califica_text?></textarea>
</fieldset>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Utilizo preservativo en su ultima relacion sexual ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="utilizo1" id="utilizo1" value="" checked hidden>
<?php
if($row->utilizo =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='utilizo1' name='utilizo1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->utilizo =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='utilizo1' name='utilizo1' value='No' $checked> No";
?>
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Ha tenido relaciones sexuales con persona de su mismo sexo ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="sexual21" id="sexual21" value="" checked hidden>
<?php
if($row->sexual2 =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual21' name='sexual21' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->sexual2 =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sexual21' name='sexual21' value='No' $checked> No";
?>
</span>

</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Utilizo algun metodo de planificacion fam ?</label>
<div class="col-md-9">
<span class="radio-inline">
<input type="radio" name="planif1" id="planif1" value="" checked hidden>
<?php
if($row->planif =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='planif1' name='planif1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->planif =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='planif1' name='planif1' value='No' $checked> No";
?>
</span>
<br/>
<label class="control-label">El cual : </label>
<select id="planif_text1" class="form-control" >
<option hidden selected><?=$row->planif_text?></option>
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
<input type="radio" id="embara1" name="embara1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->embara =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='embara1' name='embara1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->embara =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='embara1' name='embara1' value='No' $checked> No";
?>
</span>

</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Menarquia ?</label>
<div class="col-md-3">
<div class="input-group">
<input class="form-control" type="text" value="<?=$row->menarquia?>" id="menarquia1"/>
<span class="input-group-addon">anos</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Fecha de ultima menstruacion (FUM) ?</label>
<div class="col-md-3">
<input class="form-control"  value="<?=$row->fecha_ul_m?>" id="fecha_ul_m1" name="date_fum1" type="text"  data-mask="00/00/0000" />
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label">Menaopausica</label>
<div class="col-md-3">
<input type="radio" id="menaop1" name="menaop1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->menaop =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='menaop1' name='menaop1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->menaop =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='menaop1' name='menaop1' value='No' $checked> No";
?>
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Ciclos menstruales :</label>
<div class="col-md-9" style="font-size:14px">
<input type="radio" id="cliclo1" name="cliclo1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->cliclo =="Regulares"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cliclo1' name='cliclo1' value='Regulares' $checked> Regulares";
?>
</span>
<span class="radio-inline">
<?php
if($row->cliclo =="Irregulares"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cliclo1' name='cliclo1' value='Irregulares' $checked> Irregulares";
?>
</span>

<br/>
<label class="control-label">Desc : </label>
<textarea  class="form-control" id="cliclo_text1"><?=$row->cliclo_text?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Duracion de sangrado menstrual ?</label>
<div class="col-md-3">
<div class="input-group">
<input class="form-control" type="number" value="<?=$row->dura_sang?>" id="dura_sang1" min="1" />
<span class="input-group-addon">dias</span>
</div>
</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label">Cantidad de sangrado menstrual ?</label>
<div class="col-md-5" style="font-size:14px;">
<input type="radio" id="cant_sang1" name="cant_sang1" value="" checked hidden>
<span class="radio">
<?php
if($row->cant_sang =="Normal"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cant_sang1' name='cant_sang1' value='Normal' $checked> Normal";
?>
</span>
<span class="radio">
<?php
if($row->cant_sang =="Escaso"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cant_sang1' name='cant_sang1' value='Escaso' $checked> Escaso";
?>
</span>
<span class="radio">
<?php
if($row->cant_sang =="Abudante"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cant_sang1' name='cant_sang1' value='Abudante' $checked> Abudante";
?>
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Dismenorrea</label>
<div class="col-md-5" style="font-size:14px; font-weight:bold">
<span class="radio-inline">
<input type="radio" id="dismeno1" name="dismeno1" value="" checked hidden>
<?php
if($row->dismeno =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dismeno1' name='dismeno1' value='No' $checked> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->dismeno =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dismeno1' name='dismeno1' value='Si' $checked> Si";
?>
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Fecha de ultima PAP</label>
<div class="col-md-5" style="font-size:14px; ">
<input type="radio" id="fecha_ul_pap1" name="fecha_ul_pap1" value="" checked hidden>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Nunca"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Nunca' $checked> Nunca";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Menos de un ano"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Menos de un ano' $checked> Menos de un ano";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Entre uno a tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Entre uno a tres anos' $checked> Entre uno a tres anos";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Mas de tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Mas de tres anos' $checked> Mas de tres anos";
?>
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Antecedentes de PAP Resultados Alterados o Anormales</label>
<div class="col-md-9" style="font-size:14px; ">
<input type="radio" id="ant_pap_re1" name="ant_pap_re1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->ant_pap_re =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='No' $checked> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->ant_pap_re =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='Si' $checked> Si";
?>
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="ant_pap_re_text1" class="form-control"><?=$row->ant_pap_re_text?></textarea>
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Se realiza autoexamen mamario ?</label>
<div class="col-md-9">
<input type="radio" id="realiza_auto1" name="realiza_auto1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->realiza_auto =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='realiza_auto1' name='realiza_auto1' value='Si' $checked> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->realiza_auto =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='realiza_auto1' name='realiza_auto1' value='No' $checked> No";
?>
</span>
<br/>
<textarea id="realiza_auto_text1" class="form-control"><?=$row->realiza_auto_text?></textarea>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-6 control-label">Fecha de la ultima mamagrafia&nbsp;&nbsp;</label>
<fieldset data-role="controlgroup" data-type="horizontal">
<input type="radio" id="fecha_ul_mama1" name="fecha_ul_mama1" value="" checked hidden>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Nunca"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Nunca' $checked> Nunca";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Menos de un ano"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Menos de un ano' $checked> Menos de un ano";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Entre un y tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Entre un y tres anos' $checked> Entre un y tres anos";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Mas de tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Mas de tres anos' $checked> Mas de tres anos";
?>
</span>
</fieldset>
</div>


<div class="form-group sumges">
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">P</span>
<input type="text" id="p1" value="<?=$row->p?>" class="form-control totgen1"  >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">A</span>
<input type="text" id="a1" value="<?=$row->a ?>" class="form-control totgen1" >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">C</span>
<input type="text" id="c1" value="<?=$row->c?>" class="form-control totgen1" >
</div>
</div>
<div class="col-lg-3">
<div class="input-group">
<span class="input-group-addon">E</span>
<input type="text" id="e1" value="<?=$row->e?>" class="form-control totgen1" >
</div>
</div>

</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="control-label col-md-3" style="font-size:12px">Total de GESTACIONES </label>
<div class="col-md-3">
<input  class="form-control" value="<?=$row->totalGest?>"  type="text" id="totalGest1" readonly >
</div>

</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">En case de nuligesta, ha sido por :</label>
<!-- <fieldset data-role="controlgroup" data-type="horizontal">-->
<div class="col-md-7" style="font-size:14px; ">
<input type="radio" id="nuligesta1" name="nuligesta1" value="" checked hidden>
<span class="radio">
<?php
if($row->nuligesta =="No ha iniciado vida sexual activa"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='nuligesta1' name='nuligesta1' value='No ha iniciado vida sexual activa' $checked> No ha iniciado vida sexual activa";
?>
</span>
<span class="radio">
<?php
if($row->nuligesta =="Propia eleccion"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='nuligesta1' name='nuligesta1' value='Propia eleccion' $checked> Propia eleccion";
?>
</span>
<span class="radio">
<?php
if($row->nuligesta =="No ha propido embarazarse"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='nuligesta1' name='nuligesta1' value='No ha propido embarazarse' $checked> No ha propido embarazarse";
?>
</span>
<span class="radio" >
<?php
if($row->nuligesta =="No ha propido conservar los embarazos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='nuligesta1' name='nuligesta1' value='No ha propido conservar los embarazos' $checked> No ha propido conservar los embarazos";
?>
</span>
</div>
<!--</fieldset>-->
</div>


<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Complicaciones Partos/Cesarea ?</label>
<div class="col-md-9">
<input type="radio" id="complica1" name="complica1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->complica =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica1' name='complica1' value='No' $checked> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->complica =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica1' name='complica1' value='Si' $checked> Si (Especifique)";
?>
</span>
<br/>
<textarea id="complica_text1" class="form-control"><?=$row->complica_text?></textarea>
</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Complicaciones durante embarazos</label>
<div class="col-md-9">
<input type="radio" id="complica_dur1" name="complica_dur1" value="" checked hidden>
<span class="radio-inline">
<?php
if($row->complica_dur =="No"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica_dur1' name='complica_dur1' value='No' $checked> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->complica_dur =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='complica_dur1' name='complica_dur1' value='Si' $checked> Si (Especifique)";
?>
</span>
<br/>
<textarea  class="form-control" id="complica_dur_text1"><?=$row->complica_dur_text?></textarea>
</div>
</div>


<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-5 control-label">Infeccion de transmision sexual</label>
<div class="col-md-7">
<fieldset data-role="controlgroup" data-type="horizontal">
<input type="radio" id="infec_tran1" name="infec_tran1" value="" checked hidden>
<span class="radio">
<?php
if($row->infeccion1 ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='sifilis1'  $checked> Sifilis";
?>
</span>
<span class="radio">
<?php
if($row->infeccion2 ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox'  name='gonorrea1' $checked> Gonorrea";
?>
</span>
<span class="radio">
<?php
if($row->infeccion3 ==0){
	$checked="";
} else{
	$checked="checked";
	}
echo "<input type='checkbox' name='clamidia1'  $checked> Clamidia";
?>
</span>

<span class="radio">
<?php
if($row->infec_tran =="Otro"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='infec_tran1' name='infec_tran1' value='Otro' $checked> Otro (especificar)";
?>
</span>
<input style="text-transform:lowercase" type="hidden" class="form-control" id="otro_infeccion1" value="<?=$row->otro_infeccion?>"><br/>
</fieldset>
<textarea  style="text-transform:lowercase" class="form-control"  id="otro_infeccion11"><?=$row->otro_infeccion1?></textarea>
</div>
</div>
<div class="form-group">
<fieldset>
<legend>Resumen de alertas:</legend>
</fieldset>
</div>
</div>
</div>

</form>
</div>

<script>

</script>
