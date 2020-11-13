<?php

 foreach($obs as $row)
$user_c11=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c12=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));

$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));	
?>
<style>
label{text-transform:lowercase}
<style>
.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width8 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>
</style>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h5 class="modal-title"  >Ant. Obstetrico # <?=$row->idobs?> </h5>
Creado por :<?=$user_c11?>, <?=$inserted_time?><br/>
 <span style="color:red"> Cambiado por :<?=$user_c12?> | fecha :<?=$update_time?></span> 

</div>
<div class="modal-body" style="max-height: calc(150vh - 210px); overflow-y: auto;">
<?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_ant_ssr btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<button id="save_ant_obs" type="button" class="save_ant_ssr_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
<a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->idobs/0/0/obs")?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

<form  id="" class="form-horizontal"  method="post"  > 
<input type="hidden" id="updated_by" value="<?=$user?>"> 
<input type="hidden" id="idobs" value="<?=$row->idobs?>"> 
<p class=" h4 his_med_title"  >Antecedentes Obstetricos</p>


<div class="col-md-12 disable-all backg" >
<div class="col-md-12"  >

<div class="form-group">
<div class="col-md-3"  >
<table class="table" >
<h5> Personales</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td>
<?php
if($row->dia1 =="no"  || $row->dia1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="diabetes">Diabetes </label></td>
<td>
<?php
if($row->dia1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia1' name='dia11' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->dia1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia1' name='dia11' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->tbc1 =="no" || $row->tbc1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="tbc-pulmonar">TBC Pulmonar </label>
</td>
<td>
<?php
if($row->tbc1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc11' name='tbc11' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->tbc1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc11' name='tbc11' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->hip1 =="no" || $row->hip1 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="hipertencion">Hipertensión </label>
</td>
<td>
<?php
if($row->hip1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip11' name='hip11' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->hip1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip11' name='hip11' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->pelv =="no"  || $row->pelv ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="pelvico-urinaria"> Pelvico-Urinaria </label>
</td>
<td>
<?php
if($row->pelv =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelv1' name='pelv1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->pelv =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelv1' name='pelv1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->infert =="no" || $row->infert ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="infertibilidad">Infertilidad </label>
</td>
<td>
<?php
if($row->infert =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='inf1' name='inf1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->infert =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='inf1' name='inf1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Otros </label></td>
<td>
<?php
if($row->otros1 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros11' name='otros11' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->otros1 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros11' name='otros11' value='si' $checked> ";
?>
</td>
</tr>
<tr >
<td colspan="3"><input type="text" id="otros1_text1" value="<?=$row->otros1_text?>" /></td>
</tr>
</table>
</div>
<div class="col-md-4" >
<table class="table" >
<h5> Familiares</h5>
<tr>
<th></th><th>No</th><th>Si</th>
</tr>
<tr>
<td>
<?php
if($row->dia2 =="no" || $row->dia2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="diabetesf">Diabetes</label>
</td>
<td>
<?php
if($row->dia2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia21' name='dia21' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->dia2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='dia21' name='dia21' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->tbc2 =="no" || $row->tbc2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="tbc-pulmonarf">TBC Pulmonar</label>
</td>
<td>
<?php
if($row->tbc2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc21' name='tbc21' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->tbc2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='tbc21' name='tbc21' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->hip2 =="no" || $row->hip2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="hpertencionf">Hipertensión</label>
</td>
<td>
<?php
if($row->hip2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip21' name='hip21' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->hip2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='hip21' name='hip21' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->gem =="no"){
	$color="checked";
} else{
	$color="color:red";
	}

?>
<label style="<?=$color?>" class="gemales">Gemelares</label>
</td>
<td>
<?php
if($row->gem =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='gem1' name='gem1' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->gem =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='gem1' name='gem1' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<?php
if($row->otros2 =="no" || $row->otros2 ==""){
	$color="";
} else{
	$color="color:red";
	}

?>
<label>Otros</label>
</td>
<td>
<?php
if($row->otros2 =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros21' name='otros21' value='no' $checked> ";
?>
</td>
<td>
<?php
if($row->otros2 =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='otros21' name='otros21' value='si' $checked> ";
?>
</td>
</tr>
<tr>
<td colspan="3"><input type="text" style="<?=$color?>" id="otros2_text1" value="<?=$row->otros2_text?>"/></td>
</tr>
</table>
</div>
<div class="col-md-5" >

<table class="table" >
<tr>
<th>Signos y Sintomas de Riesgos en el Embarazo Sospechar: (zika, rubeola, dengue, otros)</th>
</tr>
<tr>
<td><label> Fiebre </label></td>
<td>
 <?php
if ($row->fiebre ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="fiebre1" <?=$selected?>>
</td>
</tr>
<tr>
<td><label> Artralgia </label></td>
<td>
 <?php
if ($row->artra ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="artra1" <?=$selected?>>
</td>
</tr>
<tr>
<td><label>Mialgia </label> </td>
<td>
 <?php
if ($row->mia ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="mia1" <?=$selected?>>
</td>
</tr>
<tr>
<td><label>Exantema cutaneo </label></td>
<td>
 <?php
if ($row->exa ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="exa1" <?=$selected?>>
</td>
</tr>
<tr>
<td> <label>Conjuctivitis no purulenta/hiperemica </label> </td>
<td>
 <?php
if ($row->con ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="con1" <?=$selected?>>
</td>


</tr>

</table>
</div>
</div>
</div>
<div class="col-md-12"  >
<?php
foreach($obs2 as $row2)


?>
<hr class="title-highline-top"/>
<div class="form-group" >
 <h4 class=" h4 his_med_title"> Obstetricos</h4>
 <div class="col-md-2">

 <table class="table"  >

<tr>
<td>Ninguno o mas de 3 partos</td>
<td>
 <?php
if ($row2->nig1 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig11" <?=$selected?>>
</td>
</tr>
<tr>
<td>Algun RN menor de 2500g</td>
<td>
 <?php
if ($row2->nig2 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig21" <?=$selected?>>
</td>
</tr>
<tr>
<td>Embarazo multiple</td>
<td>
 <?php
if ($row2->nig3 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
<input type="checkbox" name="nig31" <?=$selected?>>
</td>
</tr>
</table>

</div>
 <div class="col-md-10">
 <div class="col-lg-3">
    <div class="input-group">
     <span class="input-group-addon">Partos</span>
      <input type="text" class="form-control sumg" id="partos1" value="<?=$row2->partos?>">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Arbotos</span>
      <input type="text" class="form-control sumg" id="arbotos1" value="<?=$row2->arbotos?>">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Vaginales</span>
      <input type="text" class="form-control sumg" id="vaginales1" value="<?=$row2->vaginales?>">
    </div>
  </div>
   <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon">viven</span>
      <input type="text" class="form-control sumg" id="viven1" value="<?=$row2->viven?>" >
    </div>
	</div>
  
   <br/></br>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">gestas</span>
      <input type="text" class="form-control sumg" id="gestas1" value="<?=$row2->gestas?>">
    </div>
  </div>
  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Cesareas</span>
      <input type="text" class="form-control sumg" id="cesareas1" value="<?=$row2->cesareas?>">
    </div>
  </div>
  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon">Muertos 1era sem.</span>
      <input type="text" class="form-control sumg" id="muertos11" value="<?=$row2->muertos1?>" >
    </div>
	</div>
  

 <br/></br>

  <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Nacidos vivos</span>
      <input type="text" class="form-control sumg" id="nacidov11" value="<?=$row2->nacidov1?>">
    </div>
  </div>

<div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">Nacidos muertos</span>
      <input type="text" class="form-control sumg" id="nacidom11" value="<?=$row2->nacidom1?>">
    </div>
  </div>

  <div class="col-lg-3">
   <div class="input-group">
      <span class="input-group-addon">Despues 1era sem.</span>
      <input type="text" class="form-control sumg" id="despues1s1" value="<?=$row2->despues1s?>">
    </div>
	</div>
	 <div class="col-lg-3">
    <div class="input-group">
      <span class="input-group-addon">otros</span>
      <input type="text" class="form-control sumg" id="otrosc1" value="<?=$row2->otrosc?>">
    </div>
  </div>
   
 </div>
 <br/><br/>
   <div class="col-md-6">
     <div class="form-group">
   <table class="table"  >

<tr>
<td><label>Fin Ant. Embarazo</label>
<input style="text-transform:lowercase" type="text" class="form-control" id="fin1" value="<?=$row2->fin?>"></td>
<td><label>RN con major peso</label>
<div class="input-group">
<input type="text" class="form-control" id="rn1" value="<?=$row2->rn?>"><span class="input-group-addon" >lb</span>
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
<div class="col-lg-12" style="border-right:1px solid rgb(210,210,210)">
<?php
foreach($obs3 as $row3)

?>
<table class="table table-striped"  >
<tr><th>Calcul Gestacionario Segun Sonografia</th><th></th><th></th><th></th></tr>
<tr>

<td>
<label>1era Fecha Sonografia</label>
<div class="input-group date dfecha1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha11" value="<?=$row3->fecha1?>" readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha1_link1"  type="hidden"  >

</td>

<td> <label>1 era sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono11" value="<?=$row3->sono1?>">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia11" value="<?=$row3->sonodia1?>">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td title="Mas o menos 2 semanas"><label>FPP (+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp11" value="<?=$row3->fpp1?>" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest11" value="<?=$row3->rest1?>" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest11" value="<?=$row3->diarest1?>" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>

</tr>
<tr>

<td><label>2da Fecha sonografia</label>
<div class="input-group date dfecha2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha21" value="<?=$row3->fecha2?>"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha2_link1"  type="hidden"  >
</td>
<td> <label>2 da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono21" value="<?=$row3->sono2?>">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia21" value="<?=$row3->sonodia2?>">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp21" value="<?=$row3->fpp2?>" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest21" value="<?=$row3->rest2?>" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest21" value="<?=$row3->diarest2?>" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td><label>3era Fecha sonografia</label>
<div class="input-group date dfecha3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha31" value="<?=$row3->fecha3?>"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha3_link1"  type="hidden"  >
</td>

<td> <label>3 da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono31" value="<?=$row3->sono3?>">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia31" value="<?=$row3->sonodia3?>">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp31" value="<?=$row3->fpp3?>" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest31" value="<?=$row3->rest3?>" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest31" value="<?=$row3->diarest3?>" readonly>
<span class="input-group-addon">dia.</span>
</div>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td><label>Fecha sonografia</label>
<div class="input-group date dfecha4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fecha41" value="<?=$row3->fecha4?>"  readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="fecha4_link1"  type="hidden"  >
</td>

<td> <label>4 da sonografia</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sono41" value="<?=$row3->sono4?>">
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control onlynumber" id="sonodia41" value="<?=$row3->sonodia4?>">
<span class="input-group-addon">Dias</span>
</div>
</td>
</tr>
</table>
</td>
<td><label>FPP(+ o - 2 sem.)</label><input type="text" class="form-control fpp" id="fpp41" value="<?=$row3->fpp4?>" readonly></td>
<td style="width:90px">
<label>Tiempo Amenorea</label>
<table  style="width:210px">
<tr>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="rest41" value="<?=$row3->rest4?>" readonly>
<span class="input-group-addon">Sem.</span>
</div>
</td>
<td>
<div class="input-group" >
<input type="text" class="form-control rest" id="dia-rest41" value="<?=$row3->diarest4?>" readonly>
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
<tr><th>Peso</th><th></th></tr>
<tr>
<th><label>Peso</label></td><td><label>Talla cm</label></th>
</tr>
<tr>
<td><div class="input-group">
<input type="text" class="form-control" style="text-transform:lowercase" id="peso11" value="<?=$row3->peso1?>">  <span class="input-group-addon">lb</span> 
 </div>
 </td>
<td><input type="text" class="form-control" id="talla11" value="<?=$row3->talla1?>"></td>
</tr>
</table>
</div>
<div class="col-lg-5">
<table class="table"  >
<tr><th>Calcul Gestacionario Segun FUM</th></tr>
<tr>
<td>
<label>FUM</label>
<div class="input-group date dfumcg_linked"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  >
<input type="text"  class="form-control bcgno"  id="fum_cal_ges1" value="<?=$row3->fum_cal_ges?>" readonly >
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="dfumcg_linked"  type="hidden"  >

</td>
</tr>
<tr>
<td><label>FPP(+ o - 2 sem.)</label> <input type="text" class="form-control" value="<?=$row3->fpp_cal_ges?>" id="fpp_cal_ges1" readonly></td>
</tr>
<tr>
<td><label>Sem. Act. Aprox</label> <input type="text" class="form-control" id="sem_act_a1" value="<?=$row3->sem_act_a?>" readonly></td>
</tr>
</table>

</div>
</div>

<div class="col-lg-12">
<hr class="title-highline-top"/>
<div class="col-lg-6">
<table class="table" >

<h5>Antitetanica</h5>
<tr>
<td><label>Previa</label></td><td><label>Actual</label></td><td></td><td></td>
</tr>
<tr><input type="radio" name="prev_act1" id="prev_act1" value="" hidden checked>
<td><label> No </label>
<?php
if($row3->prev_act =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='prev_act1' name='prev_act1' value='no' $checked> ";
?> 
</td>
<td><label> Si</label> 
<?php
if($row3->prev_act =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='prev_act1' name='prev_act1' value='si' $checked> ";
?> 

</td>

<td><div class="input-group">
 <span class="input-group-addon">1</span> 
 <input type="text" class="form-control"  id="prev_act_mes1" placeholder="Mes" style="text-transform:lowercase" value="<?=$row3->prev_act_mes?>"> 
 </div>
</td>
<td><div class="input-group">
 <span class="input-group-addon">2/R</span> <input type="text" class="form-control" id="2r1" placeholder="Gesta" value="<?=$row3->rr?>" style="text-transform:lowercase"> 
 </div>
</td>
</tr>
</table>
</div>
<div class="col-lg-6">
<table class="table"  >
<h5>Groupo</h5>
<tr>
<td><label>Sencibil</label></td>

<td><label>Si </label> 
<?php
if($row3->sencibil =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sencibil1' name='sencibil1' value='si' $checked> ";
?> 
</td>
<td> <label>No </label>
<?php
if($row3->sencibil =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='sencibil1' name='sencibil1' value='no' $checked> ";
?> 
 </td>
</tr>
<tr>
<td><label>Rh</label></td>
<td>+ 
<?php
if($row3->rh =="+"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='rh1' name='rh1' value='+' $checked> ";
?>
 - 
<?php
if($row3->rh =="-"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='rh1' name='rh1' value='-' $checked> ";
?>
</td>
<td><div class="input-group">
 <select class="form-control" id="rh_option1">
<option><?=$row3->rh_option?></option>
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
<table class="table"  >
<h5>Ox. Odont.</h5>

<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->odont =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='odont1' name='odont1' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->odont =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='odont1' name='odont1' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
  <div class="col-lg-4">
<table class="table"  >
<h5>Ex. Pelvis.</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->pelvis =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelvis1' name='pelvis1' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->pelvis =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='pelvis1' name='pelvis1' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table"  >
<h5>Papanicola</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->papani =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='papani1' name='papani1' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->papani =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='papani1' name='papani1' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
</div> 
 <div class="col-md-12">
  <hr class="title-highline-top"/>
<div class="col-lg-4">
<table class="table"  >
<h5>COLPOSCOPIA</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->colp =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='colp1' name='colp1' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->colp =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='colp1' name='colp1' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
  <div class="col-lg-4">
<table class="table"  >
<h5>CEVIX</h5>
<tr>
<td colspan="6"><label>Normal</label></td>
</tr>
<tr>
<td><label>No</label></td>
<td>
<?php
if($row3->cevix =="no"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cevix1' name='cevix1' value='no' $checked> ";
?>
</td>
</tr>
<tr>
<td><label>Si</label></td>
<td>
<?php
if($row3->cevix =="si"){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' id='cevix1' name='cevix1' value='si' $checked> ";
?>
</td>
</tr>
</table>
  </div>
 <div class="col-lg-4">
<table class="table"  >
<h5>VDRL</h5>

<tr>
<td>
<?php
if($row3->vdrl1 ==1){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='checkbox' id='vdrl11' name='vdrl11'  $checked> +";
?>
</td>
<td><label>Dia/Mes</label></td>
</tr>
<tr>
<td>
<?php
if($row3->vdrl2 ==1){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='checkbox' id='vdrl21' name='vdrl21'  $checked> -";
?>
</td>
<td>
<input class="form-control" type="text" id="diasmes1" value="<?=$row3->diasmes?>">
</td>
</tr>
</table>
  </div>
  
</div> 
<div class="col-md-12">
 <hr class="title-highline-top"/>
<div class="col-md-9">
<table class="table">
 <h5 class=" h4 his_med_title"> PUERPERIO</h5>
<?php
if($obs4 !=NULL){
foreach($obs4 as $row4)

?>
<td><label>Horas o dias post parto o aborto</label></td>
<td><input class="form-control" type="text" id="pu_fecha11" value="<?=$row4->pu_fecha1?>"></td>
<td><input class="form-control" type="text" id="pu_fecha21" value="<?=$row4->pu_fecha2?>"></td>
<td><input class="form-control" type="text" id="pu_fecha31" value="<?=$row4->pu_fecha3?>"></td>
</tr>
<tr>
<td><label>Temperatura</label></td>
<td><input class="form-control" type="text" id="pu_t11" value="<?=$row4->pu_t1?>"></td>
<td><input class="form-control" type="text" id="pu_t21" value="<?=$row4->pu_t2?>"></td>
<td><input class="form-control" type="text" id="pu_t31" value="<?=$row4->pu_t3?>"></td>
</tr>
<tr>
<td><label>Pulso (lat/min)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul111" value="<?=$row4->pu_pul1?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul1111" value="<?=$row4->pu_pul11?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul21" value="<?=$row4->pu_pul2?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul221" value="<?=$row4->pu_pul22?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul31" value="<?=$row4->pu_pul3?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul331" value="<?=$row4->pu_pul33?>">
</div>
</td>
</tr>
<tr>
<td><label>Tension arterial (max/min mm.hg)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten11s" value="<?=$row4->pu_ten1?>">
<span class="input-group-addon">/</span>
<input class="form-control" type="text" id="pu_ten111" value="<?=$row4->pu_ten11?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten21" value="<?=$row4->pu_ten2?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten221" value="<?=$row4->pu_ten22?>">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten31" value="<?=$row4->pu_ten3?>"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten331" value="<?=$row4->pu_ten33?>">
</div>
</td>
</tr>
<tr>
<td><label>Invol. Uterina</label></td>
<td><input class="form-control" type="text" id="pu_inv11" value="<?=$row4->pu_inv2?>"></td>
<td><input class="form-control" type="text" id="pu_inv21" value="<?=$row4->pu_inv2?>"></td>
<td><input class="form-control" type="text" id="pu_inv31" value="<?=$row4->pu_inv3?>"></td>
</tr>
<tr>
<td><label>Caracteristicas de Loquios</label> </td>
<td>
<select class="form-control loquios" id="loquios11">
<option hidden><?=$row4->loquios1?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select>
</td>
<td><select class="form-control loquios" id="loquios21">
<option hidden><?=$row4->loquios2?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
<td><select class="form-control loquios" id="loquios31">
<option hidden><?=$row4->loquios3?></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
</tr>
</table>
</div>
<?php } else {?>
<td><label>Horas o dias post parto o aborto</label></td>
<td><input class="form-control" type="text" id="pu_fecha11"></td>
<td><input class="form-control" type="text" id="pu_fecha21" ></td>
<td><input class="form-control" type="text" id="pu_fecha31" ></td>
</tr>
<tr>
<td><label>Temperatura</label></td>
<td><input class="form-control" type="text" id="pu_t11"></td>
<td><input class="form-control" type="text" id="pu_t21" ></td>
<td><input class="form-control" type="text" id="pu_t31" ></td>
</tr>
<tr>
<td><label>Pulso (lat/min)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul111"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul1111" >
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul21"><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul221">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_pul31" ><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_pul331" >
</div>
</td>
</tr>
<tr>
<td><label>Tension arterial (max/min mm.hg)</label></td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten11s" >
<span class="input-group-addon">/</span>
<input class="form-control" type="text" id="pu_ten111" >
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten21" ><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten221">
</div>
</td>
<td>
<div class="input-group">
<input class="form-control" type="text" id="pu_ten31" ><span class="input-group-addon">/</span><input class="form-control" type="text" id="pu_ten331" >
</div>
</td>
</tr>
<tr>
<td><label>Invol. Uterina</label></td>
<td><input class="form-control" type="text" id="pu_inv11" ></td>
<td><input class="form-control" type="text" id="pu_inv21" ></td>
<td><input class="form-control" type="text" id="pu_inv31" ></td>
</tr>
<tr>
<td><label>Caracteristicas de Loquios</label> </td>
<td>
<select class="form-control loquios" id="loquios11">
<option  value=""></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select>
</td>
<td><select class="form-control loquios" id="loquios21">
<option  value=""></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
<td><select class="form-control loquios" id="loquios31">
<option value=""></option>
<option>Serohematico</option>
<option value="Hematico">Hematico</option>
<option value="Purulento">Purulento</option>
</select></td>
</tr>
</table>
</div>
<?php } ?>
<div class="col-md-3">
<p class="alert alert-warning" id="alert1" style="display:none">Alerta : Sospecha endometritis</p>
<p class="alert alert-warning" id="alert2" style="display:none">Alerta : Sospecha de restos ovulares</p>
</div>

</div>
</div>
</form> 
</div>

