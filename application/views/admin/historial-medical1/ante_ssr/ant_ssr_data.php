<?php

foreach($ssr as $row)
$user_c7=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c8=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->date_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->update_time));


if($row->amenorea_tiempo >=5)
{
$amenorea_tiempo="<li id='hide-ol-f-u-p' style='color:red'><i class='fa fa-warning' style='color:red;'></i> $row->amenorea_text</li>";
} 
else {
$amenorea_tiempo="";
}




if($row->fecha_ul_pap !='Menos de un ano'  && $row->fecha_ul_pap !='')
{
$fecha_ul_p2="<li id='hide-ol-f-u-p' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima PAP :$row->fecha_ul_pap</li>";
} 
else {
$fecha_ul_p2="";
}


if($row->fecha_ul_mama !='Menos de un ano'  && $row->fecha_ul_mama !='')
{
$fecha_mama3="<li id='hide-first-ol' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima mamagrafia :$row->fecha_ul_mama</li>";
} 
else {
$fecha_mama3="";
}


if($row->ant_pap_re_text !='' )
{
$ant_pap_re_text4="<li id='hide-ol-a-p-r-t' style='color:red'><i class='fa fa-warning' style='color:red;'></i> Antecedentes de PAP Resultados Alterados o Anormales <br/> ($row->ant_pap_re_text)</li>";
} 
else {
$ant_pap_re_text4="";
}



if($row->planif_text !='')
{
$planif_text1="<li style='color:red' id='hide-ol-plan-text'><i class='fa fa-warning' style='color:red;'></i> Metodo de planificacion fam : $row->planif_text</li>";
} 
else {
$planif_text1="";
}

if($row->infeccion1 ==1)
{
$sifilis5=" Sifilis";
} 
else {
$sifilis5="";
}


if($row->infeccion2 ==1)
{
$gonorrea6=" ,Gonorrea";
} 
else {
$gonorrea6="";
}


if($row->infeccion3 ==1)
{
$clamidia7=" ,Clamidia";
} 
else {
$clamidia7="";
}

if($row->otro_infeccion1 !='')
{
$otro_infeccion18=", $row->otro_infeccion1";
} 
else {
$otro_infeccion18="";
}


if($row->infeccion1 ==1 || $row->infeccion1 ==2 || $row->infeccion1 ==3 || $row->otro_infeccion1 !=''){
$sexual_disease="<li style='color:red' class='hide-ol-sexual-d'><i class='fa fa-warning' style='color:red;'></i> Infeccion de transmision sexual : $sifilis5 $gonorrea6 $clamidia7 $otro_infeccion18</li>";	
} else{
$sexual_disease='';
}

?>
<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width7 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div class="col-md-7" >
<h3 class="modal-title"  >Ant. S.S.R # <?=$row->idssr?> </h3><br/>
<h5 class="modal-title"  >Creado por :<?=$user_c7?> | <?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$user_c8?> | <?=$update_time?></span> </h5>

<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_ant_ssr btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<button type="button" id="save_ant_ssr_hide" class="save_ant_ssr_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>

<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$row->idssr/0/0/ssr")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
</div>
<div class="col-md-5" >

<ol>
<?=$planif_text1?>
<?=$fecha_ul_p2?>
<?=$fecha_mama3?>
<?=$ant_pap_re_text4?>
<?=$sexual_disease?>
<?=$amenorea_tiempo?>
<li class='li11' style='color:red;display:none'><span class='si-usa-metodo-plan-que1' style='color:red'></span></li>
<li class='li21' style='color:red;display:none'><i class="fa fa-warning alert-ssr-mama1" style='color:red;display:none'></i> <span class='fecha-ultima-mama-value1' style='color:red'></span></li>
<li class='li31' style='color:red;display:none'><i class="fa fa-warning alert-ssr1" style='color:red;display:none'></i> <span class='fecha-ultima-pap-value1' style='color:red'></span></li>
<li class='li41' style='color:red;display:none'><i class="fa fa-warning alert-ssr-pap1" style='color:red;display:none'></i> <span class='ant-pap-re-value1' style='color:red'></span><br/><span id='desc-ant-pap1'  style='color:red'></span></li>

<li style='color:red;display:none' id='show-inf-sex1'><i class="fa fa-warning alert-sex1" style='color:red;display:none'></i> Infeccion de transmision sexual :<span id='trans-sexual-text1' style='display:none'></span> <span id='otros-infec-text1'></span></li>

</ol>

</div>
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
<label class="col-md-3 control-label">Utilizo algun metodo de planificacion fam.</label>
<div class="col-md-9">
<span class="radio-inline">
<input type="radio" name="planif1" id="planif1" value="" checked hidden>
<?php
if($row->planif =="Si"){
	$checked="checked";
	$txt_p='';
} else{
	$checked="";
	$txt_p='display:none';
	}
echo "<input type='radio' id='planif1' name='planif1' value='Si' $checked class='metodo-planif1'> Si";
?>
</span>
<span class="radio-inline">
<?php
if($row->planif =="No"){
	$checked="checked";
	$txt_p='display:none';
} else{
	$checked="";
	$txt_p='';
	}
echo "<input type='radio' id='planif1' name='planif1' value='No' $checked class='metodo-planif1'> No";
?>
</span>
<br/>
<span style='<?=$txt_p?>' class='txt-p'>
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
<option value=''>Ninguno</option>
</select>
</span>
</div>
</div>


<div class="form-group">
<label class="col-md-6 control-label">Quiero embarazarse ?</label>
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
<label class="col-md-6 control-label">Menarquia ?</label>
<div class="col-md-3">
<div class="input-group">
<input class="form-control" type="text" value="<?=$row->menarquia?>" id="menarquia1"/>
<span class="input-group-addon">anos</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Fecha de ultima menstruacion (FUM) ?</label>
<div class="col-md-6">
<div class="input-group date fecha_ul_m1"  data-date-format="dd MM yyyy" >
<input type="text"  class="form-control bcgno"  value="<?=$row->fecha_ul_m?>" id="fecha_ul_m1"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha_ul_mc1"  type="hidden"  >
</div>
<br/><br/><br/>
<div class="col-md-12" style="border:1px solid green">
<span  id="fecha-ovulacion1" class="color-green"><?=$row->fecha_ovulacion?></span><br/>
<span  id="semana-fertil1"  class="color-green"><?=$row->semana_fertil?></span><br/>
<?php if($row->amenorea_tiempo >=5){
	$color="color:red";
} else{
	$color="color:green";
}
	
?>
<i  id="amenorea-alert1" ></i> <span  style="<?=$color?>" id="amenorea-text1"><?=$row->amenorea_text?></span>
<span  id="amenorea-tiempo1" style="display:none"><?=$row->amenorea_tiempo?></span>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-6 control-label">Menaopausica</label>
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
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Nunca' class='fecha-ul-pap1' $checked> Nunca";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Menos de un ano"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Menos de un ano' $checked class='fecha-ul-pap1'> Menos de un ano";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Entre uno a tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Entre uno a tres anos' $checked class='fecha-ul-pap1'> Entre uno a tres anos";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_pap =="Mas de tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_pap1' name='fecha_ul_pap1' value='Mas de tres anos' $checked class='fecha-ul-pap1'> Mas de tres anos";
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
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='No' $checked class='ant-pap-re1'> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->ant_pap_re =="Si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='ant_pap_re1' name='ant_pap_re1' value='Si' $checked class='ant-pap-re1'> Si";
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
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Nunca' $checked class='fecha-ul-mama1'> Nunca";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Menos de un ano"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Menos de un ano' $checked class='fecha-ul-mama1'> Menos de un ano";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Entre un y tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Entre uno a tres anos' $checked class='fecha-ul-mama1'> Entre un y tres anos";
?>
</span>
<span class="radio">
<?php
if($row->fecha_ul_mama =="Mas de tres anos"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='fecha_ul_mama1' name='fecha_ul_mama1' value='Mas de tres anos' $checked class='fecha-ul-mama1'> Mas de tres anos";
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

<span class="radio-inline">
<?php
if($row->infec_tran =="No" || $row->otro_infeccion1 ==''){
	$checked="checked";
	$txt_p='display:none';
} else{
	$checked="";
	$txt_p='';
	}
echo "<input type='radio' id='infec_tran1' name='infec_tran1' value='No' $checked class='infec-trans1'> No";
?>
</span>
<span class="radio-inline">
<?php
if($row->infec_tran =="Si" || $row->otro_infeccion1 !=''){
	$checked="checked";
	$txt_p='';
} else{
	$checked="";
	$txt_p='display:none';
	}
echo "<input type='radio' id='infec_tran1' name='infec_tran1' value='Si' $checked class='infec-trans1'> Si";
?>
</span>

<table style='<?=$txt_p?>' id="display_ifts1">
    <tr>
        <td>
       <?php
		if($row->infeccion1 ==0){
			$checked="";
		} else{
			$checked="checked";
			}
		echo "<input type='checkbox'  name='sifilis1'  $checked class='infec-trans-val1'>";
		?>
		</td>
        <td>
 &nbsp; Sifilis
        </td>
		 </tr>
		 <tr>
		  <td>
		 <?php
		if($row->infeccion2 ==0){
			$checked="";
		} else{
			$checked="checked";
			}
		echo "<input type='checkbox'  name='gonorrea1' $checked class='infec-trans-val1'>";
		?>
		
        </td>
        <td>
            &nbsp; Gonorrea
        </td>
		</tr>
		 <tr>
		  <td>
		  <?php
			if($row->infeccion3 ==0){
			$checked="";
			} else{
			$checked="checked";
			}
			echo "<input type='checkbox' name='clamidia1'  $checked class='infec-trans-val1'>";
			?>
           
        </td>
		<td>
            &nbsp; Clamidia
        </td>
      </tr>
	  
	  	 <tr>
		  <td>
            
        </td>
		<td>
         <input style="text-transform:lowercase" placeholder='otros' value='<?=$row->otro_infeccion1?>' type="text" class="form-control" id="otro_infeccion11" >
        </td>
      </tr>
 
</table>

</div>
</div>

</div>
</div>

</form>
</div>

