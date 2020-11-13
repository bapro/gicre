<style>
span.input-group-addon{font-size:13px}
.save_abs{ display: block;
 top : 130px;
    right : 80px;
    position: fixed;
	z-index:1000000}
</style>
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>
<div id="show_obs_data"></div>
<div id="hide_obs" style="margin-left:220px">
<form  id="formObstetrico" class="form-horizontal"  method="post"  > 

   <input type="hidden" id="operationobs" value="insertionobs" > 
<!--<button  style="margin-top:-6%;margin-left:68%" class="btn-sm btn-success historial_save push-save-down" id="submit"  type="submit"  ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>-->
<p class=" h4 his_med_title"  >Antecedentes Obstetricos</p>

<div class="col-xs-12" >
<div id="hide-navegador-obs" >
<?php if ($count_obs > 0)
{
?>

<div class="col-xs-4">
<div class="input-group" >
<span class="input-group-addon"><span  ><b><?=$count_obs?></b> </span>regitros (s)</span> 

<select class="form-control" id="id_obs" >
<option value="" hidden>navegador </option>
<?php 

 foreach($obs_nav as $row)
{

setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	
?>
<option value="<?=$row->idobs;?>"> # (<?=$row->idobs;?>) : <?=$row->inserted_by; ?> | Fecha : <?=$inserted_time; ?></option>

<?php
}
?>

</select>

</div>
<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

</div>
<br/><br/><br/>
</div>
<div id="show-navegador-obs" ></div>
</div>
<div class="col-md-12 backg border-historial-clinica"  >
<div class="form-group">
<div class="col-md-3"  >
<table class="table" >
<h5> Personales</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td> <label>Diabetes </label> <span class="required-info">* </span></td>
<td><input type="radio" name="dia1" class="dia1" value="no"   ></td>
<td><input type="radio" name="dia1" class="dia1" value="si" ></td>
</tr>
<tr>
<td> <label>TBC Pulmonar </label> <span class="required-info">*  </span></td>
<td><input type="radio" name="tbc1" id="tbc1" value="no"  ></td>
<td><input type="radio" name="tbc1" id="tbc1" value="si"></td>
</tr>
<tr>
<td> <label>Hipertencion </label> <span class="required-info">*  </span></td>
<td><input type="radio" name="hip1" id="hip1" value="no"  ></td>
<td><input type="radio" name="hip1" id="hip1" value="si"></td>
</tr>
<tr>
<td> <label> Pelvico-Urinaria </label> <span class="required-info">* </span></td>
<td><input type="radio" name="pelv" id="pelv" value="no"  ></td>
<td><input type="radio" name="pelv" id="pelv" value="si"></td>
</tr>
<tr>
<td> <label>Infertibilidad </label> <span class="required-info">* </span></td>
<td><input type="radio" name="inf" id="inf" value="no"  ></td>
<td><input type="radio" name="inf" id="inf" value="si"></td>
</tr>
<tr>
<td><label>Otros </label></td>
<td><input type="radio" name="otros1" id="otros1" value="no"  ></td>
<td><input type="radio" name="otros1" id="otros1" value="si"></td>
</tr>
<tr >
<td colspan="3"><input type="text" id="otros1_text" /></td>
</tr>
</table>
</div>
<div class="col-md-4" style="border-right:1px solid rgb(210,210,210)" >
<table class="table" >
<h5> Familiares</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td> <label>Diabetes</label> <span class="required-info">* </span></td>
<td><input type="radio" name="dia2" id="dia2" value="no"  ></td>
<td><input type="radio" name="dia2" id="dia2" value="si"></td>
</tr>
<tr>
<td> <label>TBC Pulmonar</label> <span class="required-info">* </span></td>
<td><input type="radio" name="tbc2" id="tbc2" value="no"  ></td>
<td><input type="radio" name="tbc2" id="tbc2" value="si"></td>
</tr>
<tr>
<td> <label>Hipertencion</label> <span class="required-info">* </span></td>
<td><input type="radio" name="hip2" id="hip2" value="no"  ></td>
<td><input type="radio" name="hip2" id="hip2" value="si"></td>
</tr>
<tr>
<td> <label>Gemlares</label> <span class="required-info">* </span></td>
<td><input type="radio" name="gem" id="gem" value="no"  ></td>
<td><input type="radio" name="gem" id="gem" value="si"></td>
</tr>
<tr>
<td>
<label>Otros</label></td>
<td><input type="radio" name="otros2" id="otros2" value="no"  ></td>
<td><input type="radio" name="otros2" id="otros2" value="si"></td>
</tr>
<tr>
<td colspan="3"><input type="text" id="otros2_text"  /></td>
</tr>
</table>
</div>
<div class="col-md-5">

<table class="table" >
<tr>
<th>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</th>
</tr>
<tr>
<td> <label> Fiebre </label></td>
<td><input class="thischeckbox" type="checkbox" name="fiebre" ></td>
</tr>
<tr>
<td> <label> Artralgia </label></td>
<td><input class="thischeckbox" type="checkbox" name="artra"></td>
</tr>
<tr>
<td> <label>Mialgia </label> </td>
<td><input class="thischeckbox" type="checkbox" name="mia"></td>
</tr>
<tr>
<td> <label>Exantema cutaneo </label></td>
<td><input class="thischeckbox" type="checkbox" name="exa"></td>
</tr>
<tr>
<td>  <label>Conjuctivitis no purulenta/hiperemica </label> </td>
<td><input class="thischeckbox" type="checkbox" name="con"></td>


</tr>

</table>
</div>
</div>
</div>
<div class="col-md-12"  >
<hr class="title-highline-top"/>
<div class="form-group" >
 <h4 class=" h4 his_med_title"> Obstetricos</h4>
 <div class="col-md-2">

 <table class="table"  >

<tr>
<td> Ninguno o mas de 3 partos</td><td><input class="thischeckbox" type="checkbox" name="nig1"></td>
</tr>
<tr>
<td> Algun RN menor de 2500g</td><td><input class="thischeckbox" type="checkbox" name="nig2"></td>
</tr>
<tr>
<td> Embarazo multiple</td><td><input class="thischeckbox" type="checkbox" name="nig3"></td>
</tr>
</table>

</div>
 <div class="col-md-10">
 <div class="col-lg-3">
    <div class="input-group">
     <span class="input-group-addon"> <label>Partos</label></span>
      <input type="text" class="form-control sumg" id="partos" >
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>Arbotos</label></span>
      <input type="text" class="form-control sumg" id="arbotos">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>Vaginales</label></span>
      <input type="text" class="form-control sumg" id="vaginales">
    </div>
  </div>
   <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"> <label>viven</label></span>
      <input type="text" class="form-control sumg" id="viven" >
    </div>
	</div>
  
   <br/></br>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>gestas</label></span>
      <input type="text" class="form-control sumg" id="gestas">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>Cesareas</label></span>
      <input type="text" class="form-control sumg" id="cesareas">
    </div>
  </div>
  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"> <label>Muertos 1era sem.</label></span>
      <input type="text" class="form-control sumg" id="muertos1" >
    </div>
	</div>
  

 <br/></br>

  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>Nacidos vivos</label></span>
      <input type="text" class="form-control sumg" id="nacidov1">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> <label>Nacidos muertos</label></span>
      <input type="text" class="form-control sumg" id="nacidom1">
    </div>
  </div>

  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"> <label>Despues 1era sem.</label></span>
      <input type="text" class="form-control sumg" id="despues1s">
    </div>
	</div>
	 <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"><label>otros</label></span>
      <input type="text" class="form-control sumg" id="otrosc">
    </div>
  </div>
   
 </div>
 <br/><br/>
   <div class="col-md-6">
     <div class="form-group">
   <table class="table"  >

<tr>
<td> <label>Fin Ant. Embarazo</label>
<input style="text-transform:lowercase" type="text" class="form-control" id="fin"></td>
<td> <label>RN con major peso</label>
<div class="input-group">
<input type="text" class="form-control" id="rn"><span class="input-group-addon">lb</span>
</div>
</td>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<hr class="title-highline-top"/>
	<h4 class=" h4 his_med_title">Embarazo Actual</h4>
<div class="col-lg-9" style="border-right:1px solid rgb(210,210,210)">
<table class="table"  style="width:100%;">
<tr><th>Calcul Gestacionario Segun Sonografia</th><th></th><th></th></tr>
<tr>
<td>
 <label>1era Fecha Sonografia</label>
<div class="input-group date dfecha1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha1"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha1_link"  type="hidden"  >

</td>
<td> <label>1 era sonografia</label>
<div class="input-group">
<input type="text" class="form-control onlynumber" id="sono1">
<span class="input-group-addon">Sem.</span></div>
</td>
<td title="Mas o menos 2 semanas"><label>FPP (+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp1" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest1" readonly ></td>
</tr>
<tr>
<td> <label>2da Fecha sonografia</label>
<div class="input-group date dfecha2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha2"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha2_link"  type="hidden"  >
</td>
<td> <label>2 da sonografia</label>
<div class="input-group"><input type="text" class="form-control onlynumber" id="sono2"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp2" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest2" readonly></td>
</tr>
<tr>
<td> <label>3era Fecha sonografia</label>
<div class="input-group date dfecha3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha3"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha3_link"  type="hidden"  >
</td>
<td> <label>3era sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono3"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp3" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest3" readonly></td>
</tr>
<tr>
<td> <label>Fecha sonografia</label>
<div class="input-group date dfecha4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha4"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha4_link"  type="hidden"  >
</td>
<td> <label>4 sonografia</label><div class="input-group"><input type="text" class="form-control onlynumber" id="sono4"><span class="input-group-addon">Sem.</span></div></td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp4" readonly></td>
<td><label>Sem rest</label><input type="text" class="form-control rest" id="rest4" readonly></td>
</tr>
</table>
</div>
<div class="col-lg-3">
<table class="table"  >
<tr><th> Peso</th><th></th></tr>
<tr>
<th> <label>Peso</label></td><td><label>Talla cm</label></th>
</tr>
<tr>
<td><div class="input-group">
<input type="text" class="form-control" style="text-transform:lowercase" id="peso1">  <span class="input-group-addon">lb</span> 
 </div>
 </td>
<td><input type="text" class="form-control" id="talla1" ></td>
</tr>
</table>

<table class="table"  >
<tr><th>Calcul Gestacionario Segun FUM</th></tr>
<tr>
<td>
 <label>FUM</label>
<div class="input-group date dfumcg"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fum_cal_ges"  readonly >
<span  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="dfumcg_link"  type="hidden"  >
</td>
</tr>
<tr>
<td> <label>FPP(+ o - 2 sem.)</label> <input type="text" class="form-control"  id="fpp_cal_ges"></td>
</tr>
<tr>
<td> <label>Sem. Act. Aprox</label> <input type="text" class="form-control" id="sem_act_a" ></td>
</tr>
</table>

</div>
</div>

<div class="col-lg-12">
<hr class="title-highline-top"/>
<div class="col-lg-6">
<table class="table" style="width:70%">
<tr>
<th><h5> Antitetanica </h5></th><td colspan="3"><span class="required-info">* Todos son s</span></td>
</tr>
<tr>
<td> <label>Previa</label></td><td><label>Actual</label></td><td> </td><td></td>
</tr>
<tr><input type="radio" name="prev_act" id="prev_act" value="" hidden >
<td><label> No </label> <input type="radio" name="prev_act" id="prev_act" value="no" ></td>
<td><label> Si</label> <input type="radio" name="prev_act" id="prev_act" value="si"></td>

<td><div class="input-group">
 <span class="input-group-addon">1</span> 
 <input type="text" class="form-control"  id="prev_act_mes" placeholder="Mes" style="text-transform:lowercase"> 
 </div>
</td>
<td><div class="input-group">
 <span class="input-group-addon">2/R</span> <input type="text" class="form-control" id="2r" placeholder="Gesta" style="text-transform:lowercase"> 
 </div>
</td>
</tr>
</table>
</div>
<div class="col-lg-6">
<table class="table"  style="width:70%">
<tr>
<th><h5> Groupo</h5></th><td><span class="required-info">* Todos son s</span></td><td></td>
</tr>
<tr>
<td><label>Sencibil</label></td><input type="radio"  name="sencibil" id="sencibil" value="" hidden >
<td><label>Si </label> <input type="radio"  name="sencibil" id="sencibil" value="si"></td>
<td> <label>No </label> <input type="radio" name="sencibil" id="sencibil" value="no"></td>
</tr>
<tr>
<td><label>Rh</label></td><input type="radio"  name="rh" id="rh" value="" hidden >
<td>+ <input type="radio"  name="rh" id="rh" value="+"> - <input type="radio"  name="rh" id="rh" value="-"></td>
<td><div class="input-group">
 <select class="form-control" id="rh_option">
<option></option>
<option>A</option>
<option>AB</option>
<option>0</option>
</select> 
</div></td>
</tr>
</table>
</div>
<!--
<div class="col-lg-3">
<table class="table"  >
<tr>
<th>Hospitalizacion</th><td>No <input type="radio"  name="sg"></td><td>Si</td><td> <input type="radio"  name="sg"></td>
</tr>
<tr>
<th>Traslado</th><td>No <input type="radio"  name="sg"></td><td>Si</td><td> <input type="radio"  name="sg"></td>
</tr>
<tr>
<th cols="1">Lugar</th><td><input type="text"  name="sg"></td><td></td><td></td><td></td>
</tr>
</table>
</div>
-->
</div>
 <div class="col-md-12">
 <hr class="title-highline-top"/>
 <!--
 <div class="col-lg-2">
<table class="table"  >
<h5>Dudas</h5>
<tr>
<td>No</td><td><input type="radio"  name="sg"></td>
</tr>
<tr>
<td>Si</td><td><input type="radio"  name="sg"></td>
</tr>

</table>
</div>
 <div class="col-lg-4">
<table class="table"  >
<h5>Fumas</h5>
<tr>
<td>No <input type="radio" ></td><td>Cant.</td><td></td>
</tr>
<tr>
<td>Si <input type="radio" ></td><td><input type="text" ></td><td>Cigarillos</td>
</tr>
</table>
  </div>-->
 <div class="col-lg-4">
<table class="table" style="width:30%" >
<h5> Ox. Odont.</h5>

<tr>
<td><label>Normal</label></td><td><span class="required-info">*</span></td>
</tr>
<tr><input type="radio"  name="odont" id="odont" value=""  hidden>
<td><label>No</label></td><td><input type="radio"  name="odont" id="odont" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="odont" id="odont" value="si"></td>
</tr>
</table>

  </div>
  <div class="col-lg-4">
<table class="table" style="width:30%" >
<h5> Ex. Pelvis.</h5>
<tr>
<td><label>Normal</label></td><td><span class="required-info">*</span></td>
</tr>
<tr><input type="radio"  name="pelvis" id="pelvis" value=""  hidden>
<td><label>No</label></td><td><input type="radio"  name="pelvis" id="pelvis" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="pelvis" id="pelvis" value="si"></td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table" style="width:30%" >
<h5> Papanicola</h5>
<tr>
<td><label>Normal</label></td><td><span class="required-info">*</span></td>
</tr>
<tr><input type="radio"  name="papani" id="papani" value=""  hidden>
<td><label>No</label></td><td><input type="radio" name="papani" id="papani" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="papani" id="papani" value="si"></td>
</tr>
</table>
  </div>
</div> 
 <div class="col-md-12">
  <hr class="title-highline-top"/>
<div class="col-lg-4">
<table class="table" style="width:30%" >
<h5> COLPOSCOPIA</h5>
<tr>
<td><label>Normal</label></td><td><span class="required-info">*</span></td>
</tr>
<tr><input type="radio"  name="colp" id="colp" value=""  hidden>
<td><label>No</label></td><td><input type="radio"  name="colp" id="colp" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio"  name="colp" id="colp" value="si"></td>
</tr>
</table>
  </div>
  <div class="col-lg-4">
<table class="table" style="width:30%" >
<h5> CEVIX</h5>
<tr>
<td><label>Normal</label></td><td><span class="required-info">*</span></td>
</tr>
<tr><input type="radio"  name="cevix" id="cevix" value=""  hidden>
<td><label>No</label></td><td><input type="radio"  name="cevix" id="cevix" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio"  name="cevix" id="cevix" value="si"></td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table" style="width:40%" >
<h5> VDRL  </h5>

<tr>
<td><input class="thischeckbox" type="checkbox"  id="vdrl1" name="vdrl1"> +</td><td><label>Dia/Mes</label></td>
</tr>
<tr>
<td><input class="thischeckbox" type="checkbox"  id="vdrl2" name="vdrl2"> -</td><td><input class="form-control" type="text" id="diasmes"></td>
</tr>
</table>
  </div>
  
</div> 
<div class="col-md-12">
 <hr class="title-highline-top"/>
<div class="col-md-9">
<table class="table" >
 <h5 class=" h4 his_med_title"> PUERPERIO</h5>

<td > <label>Horas o dias post parto o aborto <span class="required-info">* </span></label> </td>
<td><input class="form-control" type="text" id="pu_fecha1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_fecha2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_fecha3" class="required-input"></td>
</tr>
<tr>
<td> <label>Temperatura  <span class="required-info">* </span></label></td>
<td><input class="form-control" type="text" id="pu_t1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_t2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_t3" class="required-input"></td>
</tr>
<tr>
<td><label>Pulso (lat/min)  <span class="required-info">* </span></label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul1" class="required-input"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul11" class="required-input">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul2"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul22" class="required-input">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul3" class="required-input"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul33" class="required-input">
</div>
</td>
</tr>
<tr>
<td> <label>Tension arterial (max/min mm.hg)  <span class="required-info">* </span></label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten1" class="required-input">
<span class="input-group-addon">/</span>
<input class="form-control" type="text" id="pu_ten11" class="required-input">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten2" class="required-input"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten22" class="required-input">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten3" class="required-input"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten33" class="required-input">
</div>
</td>
</tr>
<tr>
<td> <label>Invol. Uterina  <span class="required-info">* </span></label></td>
<td><input class="form-control" type="text" id="pu_inv1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_inv2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_inv3" class="required-input"></td>
</tr>
<tr>
<td> <label>Caracteristicas de Loquios  <span class="required-info">* </span></label> </td>
<td>
<select class="form-control loquios required-input" id="loquios1">
<option hidden></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select>
</td>
<td><select class="form-control loquios required-input" id="loquios2">
<option hidden></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
<td><select class="form-control loquios required-input" id="loquios3">
<option hidden></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
</tr>
</table>
</div>
<div class="col-md-3">
<p class="alert alert-warning" id="alert1" style="display:none">Alerta : Sospecha endometritis</p>
<p class="alert alert-warning" id="alert2" style="display:none">Alerta : Sospecha de restos ovulares</p>
</div>

</div>
</form>
</div> 
</div> 
