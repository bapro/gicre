<div class="col-md-7"  >
<p class=" h4 his_med_title"  >Antecedentes de Salud Sexual y Reproductiva (<b><?=$count_ssr?> regitros (s)</b>)</p> 
<?php if ($count_ssr > 0)
{
$i = 1; 

 foreach($ssr as $row)
{
$user_c5=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c6=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$date_time = date("d-m-Y H:i:s", strtotime($row->date_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->update_time));

if($row->fecha_ul_pap !='Menos de un ano' ||
 $row->fecha_ul_mama !='Menos de un ano' ||
 $row->ant_pap_re_text !='' || 
 $row->planif_text !='' ||
 $row->infeccion1 ==1 ||
 $row->infeccion2 ==1 ||
 $row->infeccion3 ==1 ||
 $row->otro_infeccion1 !='' 
// $row->amenorea_tiempo >=5
 )
{
$alert="<i class='fa fa-warning' style='color:red;'></i>";	
} else {
$alert="";	
}

if($row->fecha_ul_pap !='Menos de un ano' && $row->fecha_ul_pap !='')
{
$fecha_ul_p="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima PAP :$row->fecha_ul_pap</li>";
} 
else {
$fecha_ul_p="";
}


if($row->amenorea_tiempo >=5)
{
$amenorea_tiempo1="<li id='hide-ol-f-u-p' style='color:red'><i class='fa fa-warning' style='color:red;'></i> $row->amenorea_text</li>";
} 
else {
$amenorea_tiempo1="";
}


if($row->fecha_ul_mama !='Menos de un ano'  && $row->fecha_ul_mama !='')
{
$fecha_mama="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Fecha ultima mamagrafia :$row->fecha_ul_mama</li>";
} 
else {
$fecha_mama="";
}


if($row->ant_pap_re_text !='')
{
$ant_pap_re_text="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Antecedentes de PAP Resultados Alterados o Anormales <br/> ($row->ant_pap_re_text)</li>";
} 
else {
$ant_pap_re_text="";
}



if($row->planif_text !='')
{
$planif_text="<li style='color:red'><i class='fa fa-warning' style='color:red;'></i> Metodo de planificacion fam : $row->planif_text</li>";
} 
else {
$planif_text="";
}

if($row->infeccion1 ==1)
{
$sifilis=" Sifilis";
} 
else {
$sifilis="";
}


if($row->infeccion2 ==1)
{
$gonorrea=" ,Gonorrea";
} 
else {
$gonorrea="";
}


if($row->infeccion3 ==1)
{
$clamidia=" ,Clamidia";
} 
else {
$clamidia="";
}

if($row->otro_infeccion1 !='')
{
$otro_infeccion=", $row->otro_infeccion1";
} 
else {
$otro_infeccion="";
}


if($row->infeccion1 ==1 || $row->infeccion1 ==2 || $row->infeccion1 ==3 || $row->otro_infeccion1 !=''){
$sexual_di="<li style='color:red' id='hide-ol-sexual-disease'><i class='fa fa-warning' style='color:red;'></i> Infeccion de transmision sexual : $sifilis $gonorrea $clamidia $otro_infeccion</li>";	
} else{
$sexual_di='';
}

?>
<div class="pagination">
<a  data-toggle="modal" data-target="#ver_ssr" href="<?php echo base_url("admin_medico/data_ssr_by_id/$row->idssr/$id_historial/$user_id")?>">
<?php echo $i; $i++;  ?> <?=$alert;?>
</a>
<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro </h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c5?>, <?=$date_time?></li>
<li>Cambiado por <?=$user_c6?>, <?=$update_time?></li>
<?=$planif_text?>
<?=$fecha_ul_p?>
<?=$fecha_mama?>
<?=$ant_pap_re_text?>
<?=$sexual_di?>
<?=$amenorea_tiempo1?>
</ul>
</div>
</div>

<?php
}

}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

</div>
<div class="col-md-5">
<legend>Resumen de alertas:</legend>
<ol>
<li class='li1' style='color:red;display:none'><span class='si-usa-metodo-plan-que' style='color:red'></span></li>
<li class='li2' style='color:red;display:none'><i class="fa fa-warning alert-ssr-mama" style='color:red;display:none'></i> <span class='fecha-ultima-mama-value' style='color:red'></span></li>
<li class='li3' style='color:red;display:none'><i class="fa fa-warning alert-ssr" style='color:red;display:none'></i> <span class='fecha-ultima-pap-value' style='color:red'></span></li>
<li class='li4' style='color:red;display:none'><i class="fa fa-warning alert-ssr-pap" style='color:red;display:none'></i> <span class='ant-pap-re-value' style='color:red'></span><br/><span id='desc-ant-pap'  style='color:red'></span></li>

<li style='color:red;display:none' id='show-inf-sex'><i class="fa fa-warning alert-sex" style='color:red;display:none'></i> Infeccion de transmision sexual :<span id='trans-sexual-text' style='display:none'></span> <span id='otros-infec-text'></span></li>

</ol>

</div>
<div class="col-md-12 backg border-historial-clinica">
<hr class="hr_ad"/>
<div class="col-md-6" style="border-right:1px solid rgb(205,205,205);">
<br/>

<div class="form-group">
<label class="col-md-7 control-label"> Ha tenido relaciones sexuales ?</label>
<div class="col-md-3">
<input type="radio" class="optradio" name="optradio"  value="" checked hidden>
<span class="radio-inline">
<input type="radio"  name="optradio" value="Si" >Si
</span>
<span class="radio-inline">
<input type="radio"  name="optradio" value="No">No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label"> Edad de inicio de la vida sexual activa :</label>
<div class="col-md-3">
<input  id="edad" class="form-control req-inp" type="text" >

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label">Numero de parejas sexuales :</label>
<div class="col-md-3">
<input  id="numero" class="form-control" type="number" min="1" >
</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label"> Tiene vida sexuale actual ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio"  name="sexual" value="" checked hidden>
<input type="radio"  name="sexual" value="Si" > Si
</span>
<span class="radio-inline">
<input type="radio"  name="sexual" value="No"> No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label"> Sexo de la pareja actual :</label>
<div class="col-md-4">
<select  class="form-control req-inp"  id="pareja" >
<option value="" hidden></option>
<option>Masculino</option>
<option>Feminino</option>
</select>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label"> Como califica su vida sexual</label>
<fieldset data-role="controlgroup" data-type="horizontal">
<span>
<input type="radio" name="califica" value="" checked hidden>
<input type="radio"  name="califica" value="Bueno">&nbsp;Bueno
</span>
<span>
<input type="radio"  name="califica" value="Regular">&nbsp;Regular
</span>
<span >
<input type="radio"  name="califica" value="Mala">&nbsp;Mala
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="califica_text" class="form-control" ></textarea>
</fieldset>
</div>
<div class="form-group">
<label class="col-md-7 control-label"> Utilizo preservativo en su ultima relacion sexual </label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="utilizo"  value="" checked hidden>
<input type="radio"  name="utilizo" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio"  name="utilizo" value="No">No
</span>

</div>
</div>
<div class="form-group">
<label class="col-md-7 control-label"> Ha tenido relaciones sexuales con persona de su mismo sexo ?</label>
<div class="col-md-3">
<span class="radio-inline">
<input type="radio" name="sexual2"  value="" checked hidden>
<input type="radio" name="sexual2"  value="Si">Si
</span>
<span class="radio-inline">
<input type="radio" name="sexual2"  value="No">No
</span>

</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-4 control-label"> Utilizo algun metodo de planificacion fam </label>
<div class="col-md-8">
<span class="radio-inline">
<input type="radio" name="planif"  value="No" class='metodo-planif' checked>No
</span>
<span class="radio-inline">
<input type="radio" name="planif"  value="Si" class='metodo-planif'>Si
</span>

<br/>
<span style='display:none' class='si-usa-metodo-plan'>
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
</span>
</div>
</div>


<div class="form-group">
<label class="col-md-6 control-label"> Quiero embarazarse ?</label>
<div class="col-md-3">
<input type="radio"  name="embara" value="" checked hidden>
<span class="radio-inline">
<input type="radio"  name="embara" value="Si">Si
</span>
<span class="radio-inline">
<input type="radio"  name="embara" value="No">No
</span>

</div>
</div>

<div class="form-group">
<label class="col-md-6 control-label">Menarquia ?</label>
<div class="col-md-4">
<div class="input-group">
<input class="form-control" type="text" id="menarquia"/>
<span class="input-group-addon">anos</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-md-6 control-label">Fecha de Ultima Menstruacion ?</label>
<div class="col-md-6">
<!--<input class="form-control" id="fecha_ul_m" name="date_fum" type="text"  data-mask="00/00/0000" />-->

<div class="input-group date fecha_ul_m_c"  data-date-format="dd MM yyyy" >
<input type="text"  class="form-control bcgno"  id="fecha_ul_m"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha_ul_m_c"  type="hidden"  >

</div>
<br/><br/><br/>
<div class="col-md-12" style="border:1px solid green">
<span  id="fecha-ovulacion" class="color-green"></span><br/>
<span  id="semana-fertil"  class="color-green"></span><br/>
<i  id="amenorea-alert" ></i> <span  id="amenorea-text"></span>
<span  id="amenorea-tiempo" style="display:none"></span>
</div>
</div>
<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label"> Menaopausica</label>
<div class="col-md-5">
<input type="radio" name="menaop" value="" checked hidden>
<span class="radio-inline">
<input type="radio"  name="menaop" value="Si"> Si
</span>
<span class="radio-inline">
<input type="radio"   name="menaop" value="No"> No
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-3 control-label">Ciclos menstruales :</label>
<div class="col-md-9" style="font-size:13px">

<span class="radio-inline">
<input type="radio"  name="cliclo" value="Regulares" onclick="show20();" checked>Regulares
</span>
<span class="radio-inline">
<input type="radio"  name="cliclo" value="Irregulares" onclick="show19();">Irregulares
</span>

<br/>
<label class="control-label">Desc : </label>
<textarea  class="form-control" id="cliclo_text" style="display:none"></textarea>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Duracion de sangrado menstrual ?</label>
<div class="col-md-4">
<div class="input-group">
<input class="form-control" type="number" id="dura_sang" min="1" />
<span class="input-group-addon">dias</span>
</div>
</div>
</div>

<div class="form-group" style="border-bottom:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-7 control-label"> Cantidad de sangrado menstrual</label>
<div class="col-md-5" style="font-size:14px;">
<input type="radio"  name="cant_sang" value="" checked hidden>
<span class="radio">
<input type="radio" name="cant_sang" value="Normal">Normal
</span>
<span class="radio">
<input type="radio"  name="cant_sang" value="Escaso">Escaso
</span>
<span class="radio">
<input type="radio"  name="cant_sang" value="Abudante">Abudante
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label"> Dismenorrea</label>
<div class="col-md-5" style="font-size:14px; font-weight:bold">
<span class="radio-inline">
<input type="radio"  name="dismeno" value="" checked hidden>
<input type="radio"  name="dismeno" value="No" >No
</span>
<span class="radio-inline">
<input type="radio"  name="dismeno" value="Si">Si
</span>
</div>
</div>

<div class="form-group">
<label class="col-md-7 control-label">Fecha de ultima PAP</label>
<div class="col-md-5" style="font-size:14px">
<i class="fa fa-warning alert-ssr" style='color:red;display:none'></i>
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="" checked hidden>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" class='fecha-ul-pap' value="Nunca">Nunca
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Menos de un ano" class='fecha-ul-pap'>Menos de un ano
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Entre uno a tres anos" class='fecha-ul-pap'>Entre uno a tres anos
</span>
<span class="radio">
<input type="radio" id="fecha_ul_pap" name="fecha_ul_pap" value="Mas de tres anos" class='fecha-ul-pap'>Mas de tres anos
</span>
</div>
</div>

<div class="form-group" style="border-top:1px solid rgb(205,205,205);padding:20px">
<label class="col-md-3 control-label">Antecedentes de PAP Resultados Alterados o Anormales</label>
<div class="col-md-9" style="font-size:14px; ">
<span class="radio-inline">
<input type="radio" id="ant_pap_re" name="ant_pap_re" value="No" onclick="show17();" class='ant-pap-re' checked>No
</span>
<span class="radio-inline">
<input type="radio" id="ant_pap_re" name="ant_pap_re" value="Si" onclick="show18();" class='ant-pap-re'>Si
&nbsp;<i class="fa fa-warning alert-ssr-pap" style='color:red;display:none'></i>
</span>
<br/>
<label class="control-label">Desc : </label>
<textarea id="ant_pap_re_text" class="form-control" style="display:none"></textarea>
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
<i class="fa fa-warning alert-ssr-mama" style='color:red;display:none'></i>
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="" checked hidden>
<span class="radio">
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="Nunca" class='fecha-ul-mama'>&nbsp;Nunca 
</span>
<span class="radio">
<input type="radio" id="fecha_ul_mama" name="fecha_ul_mama" value="Menos de un ano" class='fecha-ul-mama'>&nbsp;Menos de un ano
</span>
<span class="radio">
<input type="radio" id="fecha_ul_mama"  name="fecha_ul_mama" value="Entre uno a tres anos" class='fecha-ul-mama'>&nbsp;Entre uno a tres anos
</span>
<span class="radio">
<input type="radio" name="fecha_ul_mama" value="Mas de tres anos" class='fecha-ul-mama'>&nbsp;Mas de tres anos
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
<label class="col-md-5 control-label">Complicaciones Partos/Cesarea</label>
<div class="col-md-7">
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
<label class="col-md-5 control-label">Complicaciones durante embarazos</label>
<div class="col-md-7">
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
<input type="radio"  name="infec_tran" id="infec_tran" value="Si" class="infec-trans"> Si
</span>
<span class="radio-inline">
<input type="radio" name="infec_tran" id="infec_tran" value="No" class="infec-trans" checked> No
</span>

<table id="display_ifts" style="display:none">
    <tr>
        <td>
            <input type="checkbox" name="sifilis" class='infec-trans-val'></td>
        <td>
           &nbsp; Sifilis
        </td>
		 </tr>
		 <tr>
		  <td>
            <input type="checkbox" name="gonorrea" class='infec-trans-val'>
        </td>
        <td>
            &nbsp; Gonorrea
        </td>
		</tr>
		 <tr>
		  <td>
            <input type="checkbox" name="clamidia" class='infec-trans-val'>
        </td>
		<td>
            &nbsp; Clamidia
        </td>
      </tr>
	  
	  	 <tr>
		  <td>
            
        </td>
		<td>
         <input style="text-transform:lowercase" placeholder='otros' type="text" class="form-control" id="otro_infeccion1" >
        </td>
      </tr>
 
</table>
</div>
</div>

</div><!--2 em 6 end-->
</div>
   

<script>
/*$.fn.multiline = function(text){
    this.text(text);
    this.html(this.html().replace(/\n/g,'<br/>'));
    return this;
}*/
$('.fecha_ul_m_c').datetimepicker({
weekStart: 1,
todayBtn:  1,
autoclose: 1,
todayHighlight: 1,
startView: 2,
minView: 2,
forceParse: 0,
endDate: '+0d',
linkField: "fecha_ul_m_c",
}).on('changeDate', function (e) {
$(".color-green").css( "color","green" );
var today = moment();
var fecha_ul_m_c = $("#fecha_ul_m_c").val();
var moment1 = moment(fecha_ul_m_c);
var result = moment(moment1).add('days', 14);
var fUltimaM = moment(result).format('D MMMM YYYY');

var menosDay=moment(result).subtract('days', 3);
var menosDay1 = moment(menosDay).format('D MMMM YYYY');


var masDay=moment(result).add('days', 3);
var masDay1 = moment(masDay).format('D MMMM YYYY');
var tiempoAmeno=today.diff(moment1, "weeks");
if(tiempoAmeno >= 5){
$("#amenorea-alert").css( "color","red" );
$("#amenorea-alert").addClass("fa fa-warning");
$("#amenorea-text").css( "color","red" );	
} else{
$("#amenorea-alert").hide();
$("#amenorea-text").css( "color","green" );	
}
var diff = moment.duration(today.diff(moment1));
if(diff.days()%7==0){
	var diaLeft="";
} else{
var diaLeft=diff.days()%7 + ' dia(s)';	
}
$("#fecha-ovulacion").text('Fecha de ovulacion : '+ fUltimaM); 
$("#semana-fertil").text('Semana fertil :' + menosDay1 + ' hasta '  + masDay1); 
//$("#fecha_ul_m_info").multiline('Fecha de ovulacion : '+ fUltimaM +'\n Semana fertil :' + menosDay1 + ' hasta '  + masDay1);
$("#amenorea-text").text('Tiempo amenorea : '   +  tiempoAmeno +" semana(s)  "+ diaLeft);
$("#amenorea-tiempo").text(tiempoAmeno);
});

$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });

	  

$('.fecha-ul-mama').change(function(){
  if($(this).val()=='Nunca' || $(this).val()=='Mas de tres anos' ||  $(this).val()=='Entre uno a tres anos') {
	  $('.li2').show();
    $('.alert-ssr-mama').slideDown();
	var texto=" Fecha de ultima mamagrafia : " + $(this).val();
	$('.fecha-ultima-mama-value').text(texto);
  } else {
	  $('.li2').hide();
    $('.alert-ssr-mama').hide();
	$('.fecha-ultima-mama-value').text("");
  }
});

$('.metodo-planif').change(function(){
  if($(this).val()=='Si') {
	 $('.si-usa-metodo-plan').slideDown(); 
  } else {
   $('.si-usa-metodo-plan').slideUp(); 
  }
});

$('#planif_text').change(function(){
$('.li1').show();
var texto="Metodo de planificacion familial : "+ $(this).val();
$('.si-usa-metodo-plan-que').text(texto);
});


$('.fecha-ul-pap').change(function(){
  if($(this).val()=='Nunca' || $(this).val()=='Mas de tres anos' ||  $(this).val()=='Entre uno a tres anos') {
   $('.li3').show();
   $('.alert-ssr').slideDown();
	var texto=" Fecha de ultima PAP : " + $(this).val();
	$('.fecha-ultima-pap-value').text(texto);
  } else {
	  $('.li3').hide();
    $('.alert-ssr').hide();
	$('.fecha-ultima-pap-value').text("");
  }
});



//*************************

$('.ant-pap-re').change(function(){
  if($(this).val()=='Si') {
	   $('.li4').show();
    $('.alert-ssr-pap').slideDown();
		var texto=" Antecedentes de PAP Resultados Alterados o Anormales : ";
	$('.ant-pap-re-value').text(texto);
  } else {
	   $('.li4').hide();
    $('.alert-ssr-pap').hide();
	$('.ant-pap-re-value').text("");
  }
});


$('#ant_pap_re_text').keyup(function(){
	var texto="(" + $(this).val() + " )";
$('#desc-ant-pap').text(texto);   
});




//--------------------------
$('.totgen').keyup(function () {
var sum = 0;
$('.totgen').each(function() {
sum += Number($(this).val());
});

$('#totalGest').val(sum);

});

//----------------------------------------------------
$('.infec-trans').change(function(){
  if($(this).val()=='Si') {
	  $(".alert-sex").show();
	  $("#show-inf-sex").show();
	 $('#display_ifts').slideDown(); 
  } else {
	  $(".alert-sex").hide();
	  $("#show-inf-sex").hide();
	  $("#trans-sexual-text").text("");
	  $('.infec-trans-val').removeAttr('checked');
   $('#display_ifts').slideUp(); 
  }
});

$(".infec-trans-val").on("click", function(){
    if($(this).is(":checked")) {
		 $(this).closest("td").siblings("td").each(function(){
			var enf=$(this).text() + ".";
          $("#trans-sexual-text").append(enf).show();
        });
    }
    else {
     $("#trans-sexual-text").html("");
     $(".infec-trans-val:checked").closest("td").siblings("td").each(function(){
		 var enf=$(this).text() + ".";
       $("#trans-sexual-text").append(enf);
     });
    }
})



$('#otro_infeccion1').keyup(function(){

$('#otros-infec-text').text($(this).val());   
});
</script>