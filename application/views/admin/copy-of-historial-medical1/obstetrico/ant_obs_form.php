<div class="col-md-12 backg"  >
<h4 class="h4 his_med_title">Obstetricos (<b><?=$count_obs?> regitros (s)</b>)</h4>


<?php if ($count_obs > 0)
{
$i = 1; 
 foreach($obs_nav as $row)
{

$user_c9=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c10=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
 $text1="";$text2="";$text3="";$alertobs="";	 	      	       	  	  
if($row->dia1=='si' || $row->tbc1=='si' || $row->hip1=='si' || $row->pelv=='si' || $row->infert=='si'
|| $row->otros1=='si')
{
$text1="<li style='color:red;text-transform:uppercase'><strong>Hay enfermedades personales</strong></li>
<li style='color:red'>$dia1</li>
<li style='color:red'>$tbc1</li>
<li style='color:red'>$hip1</li>
<li style='color:red'>$pelv</li>
<li style='color:red'>$inf</li>
<li style='color:red'>$otros1</li>
";
$alertobs="<i class='fa fa-warning'  style='color:red;'></i>";
}
if($row->dia2=='si' || $row->tbc2=='si' || $row->hip2=='si' || $row->gem=='si' || $row->otros2=='si')
{
$text2="<li style='color:red;text-transform:uppercase'><strong>Hay enfermedades familiares</strong></li>
<li style='color:red'>$dia2</li>
<li style='color:red'>$tbc2</li>
<li style='color:red'>$hip2</li>
<li style='color:red'>$gem</li>
<li style='color:red'>$otros2</li>
";
$alertobs="<i class='fa fa-warning'  style='color:red;'></i>";
}

if($row->fiebre==1 || $row->artra==1 || $row->mia==1 || $row->exa==1 || $row->con==1)
{$text3="<li style='color:red;;text-transform:uppercase'><strong>Hay Signos y Sintomas de Riesgos en el Embarazo</strong></li>
<li style='color:red;'>$fiebre</li>
<li style='color:red;'>$artra</li>
<li style='color:red;'>$mia</li>
<li style='color:red;'>$exa</li>
<li style='color:red;'>$con</li>
";
$alertobs="<i class='fa fa-warning'  style='color:red;'></i>";
} 

?>
<div class="pagination">
<a  data-toggle="modal" data-target="#ver_obs" href="<?php echo base_url("admin_medico/data_obs_by_id/$row->idobs/$id_historial/$user_id")?>">
<?php echo $i; $i++;  ?> <?=$alertobs;?>
</a>

<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro</h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c9?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c10?>, <?=$update_time?></li>
<hr/>
<?=$text1?>
<?=$text2?>
<?=$text3?>

</ul>
</div>

</div>


<?php
}
?>



<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>


<i class="fa fa-warning alert-obs" style='color:red;display:none'></i>


<div class="form-group">
<div class="col-md-3 table-responsive"  >
<table class="table" >
<th> Personales</th>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td> <label> Diabetes </label></td>
<input type="radio" name="dia1"  value="" hidden checked>
<td><input type="radio" name="dia1" class="dia1  alert-chekbox1" value="no"   ></td>
<td><input type="radio" name="dia1" class="dia1 alert-chekbox1" value="si" ></td>
</tr>
<tr>
<td> <label> TBC Pulmonar </label></td>
<input type="radio" name="tbc1"  value="" hidden checked>
<td><input type="radio" name="tbc1" id="tbc1" class='alert-chekbox2' value="no"  ></td>
<td><input type="radio" name="tbc1" id="tbc1" class='alert-chekbox2' value="si"></td>
</tr>
<tr>
<td> <label> Hipertensión </label></td>
<input type="radio" name="hip1"  value="" hidden checked>
<td><input type="radio" name="hip1" id="hip1" class='alert-chekbox3' value="no"  ></td>
<td><input type="radio" name="hip1" id="hip1" value="si" class='alert-chekbox3'></td>
</tr>
<tr>
<td> <label>  Pelvico-Urinaria </label></td>
<input type="radio" name="pelv"  value="" hidden checked>
<td><input type="radio" name="pelv" id="pelv" value="no" class='alert-chekbox4' ></td>
<td><input type="radio" name="pelv" id="pelv" value="si" class='alert-chekbox4'></td>
</tr>
<tr>
<td> <label> Infertilidad </label></td>
<input type="radio" name="inf"  value="" hidden checked>
<td><input type="radio" name="infert" id="inf" value="no" class='alert-chekbox5' ></td>
<td><input type="radio" name="infert" id="inf" value="si" class='alert-chekbox5'></td>
</tr>
<tr>
<td><label>Otros </label></td>
<input type="radio" name="otros1"  value="" hidden checked>
<td><input type="radio" name="otros1" id="otros1" value="no" class='alert-chekbox6' ></td>
<td><input type="radio" name="otros1" id="otros1" value="si" class='alert-chekbox6'></td>
</tr>
<tr >
<td colspan="3"><input type="text" id="otros1_text" /></td>
</tr>
</table>
</div>
<div class="col-md-4 table-responsive" style="border-right:1px solid rgb(210,210,210)" >
<table class="table" >
<th> Familiares</th>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td> <label> Diabetes</label></td>
<input type="radio" name="dia2"  value="" hidden checked>
<td><input type="radio" name="dia2" id="dia2" value="no" class='alert-chekbox7' ></td>
<td><input type="radio" name="dia2" id="dia2" value="si" class='alert-chekbox7'></td>
</tr>
<tr>
<td> <label> TBC Pulmonar</label></td>
<input type="radio" name="tbc2"  value="" hidden checked>
<td><input type="radio" name="tbc2" id="tbc2" value="no" class='alert-chekbox8' ></td>
<td><input type="radio" name="tbc2" id="tbc2" value="si" class='alert-chekbox8'></td>
</tr>
<tr>
<td> <label> Hipertensión</label></td>
<input type="radio" name="hip2"  value="" hidden checked>
<td><input type="radio" name="hip2" id="hip2" value="no" class='alert-chekbox9' ></td>
<td><input type="radio" name="hip2" id="hip2" value="si" class='alert-chekbox9'></td>
</tr>
<tr>
<td> <label> Gemelares</label></td>
<input type="radio" name="gem"  value="" hidden checked>
<td><input type="radio" name="gem" id="gem" value="no" class='alert-chekbox10' ></td>
<td><input type="radio" name="gem" id="gem" value="si" class='alert-chekbox10'></td>
</tr>
<tr>
<td>
<label>Otros</label></td>
<input type="radio" name="otros2"  value="" hidden checked>
<td><input type="radio" name="otros2" id="otros2" value="no" class='alert-chekbox11' ></td>
<td><input type="radio" name="otros2" id="otros2" value="si" class='alert-chekbox11'></td>
</tr>
<tr>
<td colspan="3"><input type="text" id="otros2_text"  /></td>
</tr>
</table>
</div>
<div class="col-md-5 table-responsive">

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
<hr class="hr_ad"/>
<div class="form-group" >
 <h4 class=" h4 his_med_title"> Obstetricos</h4>
 <div class="col-md-2 table-responsive">

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
     <span class="input-group-addon"> Partos</span>
      <input type="text" class="form-control sumg" id="partos" >
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Arbotos</span>
      <input type="text" class="form-control sumg" id="arbotos">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> Vaginales</span>
      <input type="text" class="form-control sumg" id="vaginales">
    </div>
  </div>
   <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon">Viven</span>
      <input type="text" class="form-control sumg" id="viven" >
    </div>
	</div>
  
   <br/></br>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Gestas</span>
      <input type="text" class="form-control sumg" id="gestas">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon"> Cesareas</span>
      <input type="text" class="form-control sumg" id="cesareas">
    </div>
  </div>
  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"> Muertos 1era sem.</span>
      <input type="text" class="form-control sumg" id="muertos1" >
    </div>
	</div>
  

 <br/></br>

  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Nacidos vivos</span>
      <input type="text" class="form-control sumg" id="nacidov1">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Nacidos muertos</span>
      <input type="text" class="form-control sumg" id="nacidom1">
    </div>
  </div>

  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon"> Despues 1era sem.</span>
      <input type="text" class="form-control sumg" id="despues1s">
    </div>
	</div>
	 <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">otros</span>
      <input type="text" class="form-control sumg" id="otrosc">
    </div>
  </div>
   
 </div>
 <br/><br/>
   <div class="col-md-6 table-responsive">
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
<hr class="hr_ad"/>
	<h4 class=" h4 his_med_title">Embarazo Actual</h4>
<div class="col-lg-12 table-responsive" style="border-right:1px solid rgb(210,210,210)">
<table class="table table-striped"  >
<tr><th>Calcul Gestacionario Segun Sonografia</th><th></th><th></th><th></th></tr>
<tr>
<td>
 <label>1era Fecha Sonografia</label>
<div class="input-group date dfecha1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha1"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha1_link"  type="hidden"  >

</td>
<td> <label>1 era sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono1">
<span class="input-group-addon">Sem.</span>
</div> 
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia1">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td title="Mas o menos 2 semanas"><label>FPP (+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp1" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest1" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest1" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
<!--<td style="width:90px"><label>Dia rest.</label><input type="text" class="form-control rest" id="dia-rest1" readonly></td>-->
</tr>
<tr>
<td> <label>2da Fecha sonografia</label>
<div class="input-group date dfecha2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha2"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha2_link"  type="hidden"  >
</td>
<td> <label>2da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono2">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia2">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp2" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest2" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest2" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td> <label>3era Fecha sonografia</label>
<div class="input-group date dfecha3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha3"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha3_link"  type="hidden"  >
</td>
<td> <label>3da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono3">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia3">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp3" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest3" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest3" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td> <label>Fecha sonografia</label>
<div class="input-group date dfecha4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha4"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha4_link"  type="hidden"  >
</td>
<td> <label>3da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono4">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia4">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp4" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest4" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest4" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>
</div>
<div class="col-lg-4">
<table class="table"  >
<tr><th> Peso</th><th></th></tr>
<tr>
<th> <label><span style="color:red">*</span> Peso</label></td><td><label> <span style="color:red">*</span> Talla cm</label></th>
</tr>
<tr>
<td><div class="input-group">
<input type="text" class="form-control" style="text-transform:lowercase" id="peso_obs">  <span class="input-group-addon">lb</span> 
 </div>
 </td>
<td><input type="text" class="form-control" id="talla_obs" ></td>
</tr>
</table>
</div>
<div class="col-lg-5">
<table class="table"  >
<tr><th> Calcul Gestacionario Segun FUM</th></tr>
<tr>
<td>
 <label>FUM <span style="color:red">*</span></label>
<div class="input-group date dfumcg"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fum_cal_ges_obs"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="dfumcg_link"  type="hidden"  >
</td>
</tr>
<tr>
<td> <label>FPP(+ o - 2 sem.) </label> <input class="form-control" id="fpp_cal_ges_obs" readonly /></td>
</tr>
<tr>
<td> <label>Sem. Act. Aprox </label> <input class="form-control" id="sem_act_a_obs" readonly></td>
</tr>
</table>

</div>
</div>
<div class="col-md-12">
<hr class="hr_ad"/>
<div class="col-lg-6 table-responsive">
<table class="table" style="width:90%">
<tr>
<th>Antitetanica </th><td colspan="3"></td>
</tr>
<tr>
<td> <label>Previa</label></td><td><label>Actual</label></td><td> </td><td></td>
</tr>
<tr><input type="radio" name="prev_act" id="prev_act" value="" style="display:none" checked>
<td><label> No </label> <input type="radio" name="prev_act" id="prev_act" value="no" ></td>
<td><label> Si</label> <input type="radio" name="prev_act" id="prev_act" value="si"></td>

<td><div class="input-group">
 <span class="input-group-addon">1</span> 
 <input type="text" class="form-control" name="mes_obs" id="prev_act_mes" placeholder="Mes" style="text-transform:lowercase"> 
 </div>
</td>
<td><div class="input-group">
 <span class="input-group-addon">2/R</span> <input type="text" class="form-control" id="2r" placeholder="Gesta" style="text-transform:lowercase"> 
 </div>
</td>
</tr>
</table>
</div>
<div class="col-lg-6 table-responsive">
<table class="table"  style="width:70%">
<tr>
<th>Groupo</th><td></td><td></td>
</tr>
<tr>
<td><label>Sencibil</label></td><input type="radio"  name="sencibil" id="sencibil" value="" hidden checked>
<td><label>Si </label> <input type="radio"  name="sencibil" id="sencibil" value="si"></td>
<td> <label>No </label> <input type="radio" name="sencibil" id="sencibil" value="no"></td>
</tr>
<tr>
<td><label>Rh</label></td><input type="radio"  name="rh" id="rh" value="" hidden checked>
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
 <hr class="hr_ad"/>
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
 <div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> Ox. Odont.</th>

<tr>
<td><label>Normal</label></td><td><span style="color:red">*</span></td>
</tr>
<tr><input type="radio"  name="odont" id="odont" value=""  hidden checked>
<td><label>No</label></td><td><input type="radio"  name="odont" id="odont" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="odont" id="odont" value="si"></td>
</tr>
</table>

  </div>
  <div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> Ex. Pelvis.</th>
<tr>
<td><label>Normal</label></td><td><span  style="color:red">*</span></td>
</tr>
<tr><input type="radio"  name="pelvis" id="pelvis" value=""  hidden checked>
<td><label>No</label></td><td><input type="radio"  name="pelvis" id="pelvis" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="pelvis" id="pelvis" value="si"></td>
</tr>
</table>
  </div>
 <div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> Papanicola</th>
<tr>
<td><label>Normal</label></td><td><span  style="color:red">*</span></td>
</tr>
<tr><input type="radio"  name="papani" id="papani" value=""  hidden checked>
<td><label>No</label></td><td><input type="radio" name="papani" id="papani" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio" name="papani" id="papani" value="si"></td>
</tr>
</table>
  </div>
</div> 

 <div class="col-md-12">
  <hr class="hr_ad"/>
<div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> COLPOSCOPIA</th>
<tr>
<td><label>Normal</label></td><td><span  style="color:red">*</span></td>
</tr>
<tr><input type="radio"  name="colp" id="colp" value=""  hidden checked>
<td><label>No</label></td><td><input type="radio"  name="colp" id="colp" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio"  name="colp" id="colp" value="si"></td>
</tr>
</table>
  </div>
  <div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> CEVIX</th>
<tr>
<td><label>Normal</label></td><td><span  style="color:red">*</span></td>
</tr>
<tr><input type="radio"  name="cevix" id="cevix" value=""  hidden checked>
<td><label>No</label></td><td><input type="radio"  name="cevix" id="cevix" value="no"></td>
</tr>
<tr>
<td><label>Si</label></td><td><input type="radio"  name="cevix" id="cevix" value="si"></td>
</tr>
</table>
  </div>
 <div class="col-lg-4 table-responsive">
<table class="table" style="width:40%" >
<th> VDRL  </th><th><span  style="color:red">*</span></th>

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
 <hr class="hr_ad"/>
<div class="col-md-9 table-responsive">
<table class="table" >
 <h5 class=" h4 his_med_title"> PUERPERIO</h5>

<td > <label>Horas o dias post parto o aborto</label> </td>
<td><input class="form-control" type="text" id="pu_fecha1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_fecha2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_fecha3" class="required-input"></td>
</tr>
<tr>
<td> <label>Temperatura</label></td>
<td><input class="form-control" type="text" id="pu_t1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_t2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_t3" class="required-input"></td>
</tr>
<tr>
<td><label>Pulso (lat/min)</label></td>
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
<td> <label>Tension arterial (max/min mm.hg)</label></td>
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
<td> <label>Invol. Uterina </label></td>
<td><input class="form-control" type="text" id="pu_inv1" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_inv2" class="required-input"></td>
<td><input class="form-control" type="text" id="pu_inv3" class="required-input"></td>
</tr>
<tr>
<td> <label>Caracteristicas de Loquios</label> </td>
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
<p class="alert alert-warning alert1"  style="display:none">Alerta : Sospecha endometritis</p>
<p class="alert alert-warning alert2" style="display:none">Alerta : Sospecha de restos ovulares</p>
</div>

</div>
<script>


$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
//display alert

$('.alert-chekbox1').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

$('.alert-chekbox2').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});



$('.alert-chekbox3').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});


$('.alert-chekbox4').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

$('.alert-chekbox5').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});


$('.alert-chekbox6').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
	  $('#otros1_text').val('');
  }
});


//**********

$('.alert-chekbox7').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

$('.alert-chekbox8').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});



$('.alert-chekbox9').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});


$('.alert-chekbox10').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

$('.alert-chekbox11').change(function(){
  if($(this).val()=='si') {
    $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

//*****************

$('.thischeckbox').change(function(){
  if($(this).prop("checked")) {
   $('.alert-obs').slideDown();
  } else {
    $('.alert-obs').hide();
  }
});

//-------------------------------------------------------------------------------------

$('.dfecha1').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha1_link",
    });
	 //======fecha 2=============================

	 $('.dfecha2').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha2_link",
    });
	
	//======fecha 3=============================
$('.dfecha3').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha3_link",
    });
	
		//======fecha 4=============================
$('.dfecha4').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "fecha4_link",
    });
	
	$('.dfumcg').datetimepicker({
       weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		linkField: "dfumcg_link",
    }).on('changeDate', function (e) {
	$("#sem_act_a_obs").css("color","green");
	$("#fpp_cal_ges_obs").css("color","green");
var dfumcg_link = $("#dfumcg_link").val();
var moment1o = moment(dfumcg_link);
var nextyear = moment(moment1o).add('years', 1);
var nextyearmonth = moment(nextyear).subtract('months', 3);
var nextyearmonthday = moment(nextyearmonth).add('days', 7);
var fppsem = moment(nextyearmonthday).format('D MMMM YYYY');
var resulto = moment(moment1o).add('days', 14);

var masDayo=moment(resulto).add('days', 3);
var masDay1o = moment(masDayo).format('D MMMM YYYY');

var menosDayo=moment(resulto).subtract('days', 3);
var menosDay1o = moment(menosDayo).format('D MMMM YYYY');
$("#sem_act_a_obs").val(menosDay1o + ' hasta '  + masDay1o);
$("#fpp_cal_ges_obs").val(fppsem);
});
	
	
	
	 //--------------------------------------------------------------------
$('input[name="fin_ant_emb"]').mask('00/0000', {placeholder: 'Meses/Anos'});
$('input[name="axx"]').mask('00/0000', {placeholder: 'Meses/Anos'});
$('input[name="sonog"]').mask('00 00 0000', {placeholder: '-- -- ----'});
//---------------------------------------------------------------------------
$('.onlynumber').bind('keyup paste', function(){
this.value = this.value.replace(/[^0-9]/g, '');
});
//=======================Calculo Gestacionario Segun Sonografia

$("#sono1").keyup(function (e) {
var fecha1_link = $("#fecha1_link").val();
$("#sonodia1").val("");$("#dia-rest1").val("");
var today = moment();
var fl1 = moment(fecha1_link);
var sono1=$("#sono1").val();
//add semana to today
var weekToHoy = today.add('weeks', sono1);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl1, "weeks");
$("#rest1").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono1").val();
var result = moment(fl1).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp1").val(fpp);

})

$("#sonodia1").keyup(function (e) {
var sono1=	$("#sono1").val();
var weekLeft = 40 - sono1;
var sonodia1 = $("#sonodia1").val();
var fecha1_link = $("#fecha1_link").val();
var fl1 = moment(fecha1_link);
var result = moment(fl1).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia1);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp1").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia1);
var diff = moment.duration(weekToHoy.diff(fl1));
$("#dia-rest1").val(diff.days()%7);
//alert(Math.floor(diff.asWeeks()) + " weeks, " + diff.days()%7 + " days.");
})


$("#sono2").keyup(function (e) {
var fecha2_link = $("#fecha2_link").val();
$("#sonodia2").val("");$("#dia-rest2").val("");
var today = moment();
var fl2 = moment(fecha2_link);
var sono2=$("#sono2").val();
//add semana to today
var weekToHoy = today.add('weeks', sono2);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl2, "weeks");
$("#rest2").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono2").val();
var result = moment(fl2).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp2").val(fpp);

})


$("#sonodia2").keyup(function (e) {
var sono2=	$("#sono2").val();
var weekLeft = 40 - sono2;
var sonodia2 = $("#sonodia2").val();
var fecha2_link = $("#fecha2_link").val();
var fl2 = moment(fecha2_link);
var result = moment(fl2).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia2);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp2").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia2);
var diff = moment.duration(weekToHoy.diff(fl2));
$("#dia-rest2").val(diff.days()%7);
//alert(Math.floor(diff.asWeeks()) + " weeks, " + diff.days()%7 + " days.");
})




$("#sono3").keyup(function (e) {
var fecha3_link = $("#fecha3_link").val();
$("#sonodia3").val("");$("#dia-rest3").val("");
var today = moment();
var fl3 = moment(fecha3_link);
var sono3=$("#sono3").val();
//add semana to today
var weekToHoy = today.add('weeks', sono3);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl3, "weeks");
$("#rest3").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono3").val();
var result = moment(fl3).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp3").val(fpp);

})


$("#sonodia3").keyup(function (e) {
var sono3=	$("#sono3").val();
var weekLeft = 40 - sono3;
var sonodia3 = $("#sonodia3").val();
var fecha3_link = $("#fecha3_link").val();
var fl3 = moment(fecha3_link);
var result = moment(fl3).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia3);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp3").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia3);
var diff = moment.duration(weekToHoy.diff(fl3));
$("#dia-rest3").val(diff.days()%7);
})



$("#sono4").keyup(function (e) {
var fecha4_link = $("#fecha4_link").val();
$("#sonodia4").val("");$("#dia-rest4").val("");
var today = moment();
var fl4 = moment(fecha4_link);
var sono4=$("#sono4").val();
//add semana to today
var weekToHoy = today.add('weeks', sono4);
//difference of week between weekToHoy
semRest=weekToHoy.diff(fl4, "weeks");
$("#rest4").val(semRest);
//-----CALCUL FPP------------
var weekLeft = 40 - $("#sono4").val();
var result = moment(fl4).add('weeks', weekLeft);
var fpp = moment(result).format('D MMMM YYYY');
$("#fpp4").val(fpp);

})


$("#sonodia4").keyup(function (e) {
var sono4=	$("#sono4").val();
var weekLeft = 40 - sono4;
var sonodia4 = $("#sonodia4").val();
var fecha4_link = $("#fecha4_link").val();
var fl4 = moment(fecha4_link);
var result = moment(fl4).add('weeks', weekLeft);
var dia = moment(result).subtract('days', sonodia4);
var res = moment(dia).format('D MMMM YYYY');
$("#fpp4").val(res);

//------------------------------------
var today = moment();
var weekToHoy = today.add('days', sonodia4);
var diff = moment.duration(weekToHoy.diff(fl4));
$("#dia-rest4").val(diff.days()%7);
})




//========================================================================


$("#fpp_cal_ges").keyup(function (e) {
var dfumcg_link = $('dfumcg_link').val();
//var fum = "01 01 2018"; 
var result = moment(dfumcg_link).add('days', 277);
var res = moment(result).format('D MMMM YYYY');
$("#fpp_cal_ges").val(res);
})
 //-----------------------------------------------------------
$(".loquios").change(function () {
if($(this).val()=='Purulento'){
$(".alert1").slideDown("slow");
$(".alert2").hide();
}
else if($(this).val()=='Hematico'){
$(".alert2").slideDown("slow");
$(".alert1").hide();
}
else{
$(".alert1").hide();
$(".alert2").hide();	
}
})



$('input[name="mes_obs"]').mask('00/00/0000', {placeholder: '--/--/----'});

</script>