<style>

.highlight{
  background: #CEF9A1;border-right:1px solid green
}
.left{text-align:left}
.center{text-align:center}
.hideSpanRV,.hideSpanRM,.hideSpanND,.hideSpan,.hideSpanTM{visibility: hidden}
.fa-check{color:green;font-size:20px}
.check-ta{font-size:17px}

.table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
   background-color: #FFD9D9;
}


.fa-asterisk{background:white;color:red;border-radius:50%}
</style>

<!-- *** welcome message modal box *** -->

<?php

function getPatientAge($birthday) {

$age = '';
$diff = date_diff(date_create(), date_create($birthday));
$years = $diff->format("%y");
$months = $diff->format("%m");
$days = $diff->format("%d");

if ($years) {
$age = ($years < 2) ? '1 año' : "$years años";
} else {
$age = '';
if ($months) $age .= ($months < 2) ? '1 mes ' : "$months meses ";
if ($days) $age .= ($days < 2) ? '1 día' : "$days días";
}
return trim($age);
}



$this->padron_database = $this->load->database('padron',TRUE);
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,sexo,nacionalidad,tel_resi,tel_cel,seguro_medico,contacto_em_nombre,contacto_em_tel1,date_nacer,plan,afiliado')->where('id_p_a',$idpat)
->get('patients_appointments')->row_array();
if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
$imgpat='<img width="90" height="90"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
$sexo="";
} else if($patient['photo']==""){

$imgpat='<img  style="width:90px;" src="'.base_url().'/assets/img/user.png"  />';	
$sexo=substr($patient['sexo'], 0, 3);;
}
else{

$imgpat='<img  style="width:90px;" src="'.base_url().'/assets/img/patients-pictures/'.$patient['photo'].'"  />';
$sexo="";	
}


 $seguron=$this->db->select('title,logo')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row_array();

if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:60px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}


 $nss=$this->db->select('input_name,inputf')->where('patient_id',$idpat)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$patient['plan'])->get('seguro_plan')->row('name');









$updated_date=date("d-m-Y", strtotime($patient_data['update_date']));

//---------------------------------------------------------------------------------------------------------------
if($query->result() !=NULL){
foreach ($query->result() as $rowTriage)
$salsa="$rowTriage->salsa";
//------------author insertion---------------------------------
$created_date=date("d-m-Y H:i:s", strtotime($rowTriage->insert_t)); 
$created_by=$this->db->select('name')->where('id_user',$rowTriage->insert_b)->get('users')->row('name');
//------------author update-----------------------------------
if($rowTriage->update_b !=0){
$updated_date=date("d-m-Y H:i:s", strtotime($rowTriage->update_t)); 
$updated_by=$this->db->select('name')->where('id_user',$rowTriage->update_b)->get('users')->row('name');
 $hay_change="";
}else{
$updated_date="";
$updated_by="";	
 $hay_change="none";
}

$id_found=$rowTriage->id_em;

$checked_triaje="<i style='color:green;font-size:40px' class='fa fa-check-circle'></i>";
$sintomato=$rowTriage->sintomatologia;
//-----------------------------APERTURA OCULAR-------------------------------
if($rowTriage->apertura_ocular==4){
$select_apertura_ocular1="checked"; $apertura_ocular_check1="style='visibility:visible'";
} else {
$select_apertura_ocular1="";$apertura_ocular_check1="";
}

if($rowTriage->apertura_ocular==3){
$select_apertura_ocular2="checked"; $apertura_ocular_check2="style='visibility:visible'";
} else {
$select_apertura_ocular2="";$apertura_ocular_check2="";
}

if($rowTriage->apertura_ocular==2){
$select_apertura_ocular3="checked"; $apertura_ocular_check3="style='visibility:visible'";
} else {
$select_apertura_ocular3="";$apertura_ocular_check3="";
}

if($rowTriage->apertura_ocular==1){
$select_apertura_ocular4="checked"; $apertura_ocular_check4="style='visibility:visible'";
} else {
$select_apertura_ocular4="";$apertura_ocular_check4="";
}


//----------------REPUESTA VERBAL-------------------------------

if($rowTriage->repuesta_verbal==5){
$select_repuesta_verbal1="checked"; $repuesta_verbal_check1="style='visibility:visible'";
} else {
$select_repuesta_verbal1="";$repuesta_verbal_check1="";
}


if($rowTriage->repuesta_verbal==4){
$select_repuesta_verbal2="checked"; $repuesta_verbal_check2="style='visibility:visible'";
} else {
$select_repuesta_verbal2="";$repuesta_verbal_check2="";
}

if($rowTriage->repuesta_verbal==3){
$select_repuesta_verbal3="checked"; $repuesta_verbal_check3="style='visibility:visible'";
} else {
$select_repuesta_verbal3="";$repuesta_verbal_check3="";
}


if($rowTriage->repuesta_verbal==2){
$select_repuesta_verbal4="checked"; $repuesta_verbal_check4="style='visibility:visible'";
} else {
$select_repuesta_verbal4="";$repuesta_verbal_check4="";
}


if($rowTriage->repuesta_verbal==1){
$select_repuesta_verbal5="checked"; $repuesta_verbal_check5="style='visibility:visible'";
} else {
$select_repuesta_verbal5="";$repuesta_verbal_check5="";
}


//----------------REPUESTA MOTORA--------------------------

if($rowTriage->repuesta_motora==6){
$select_repuesta_motora1="checked"; $repuesta_motora_check1="style='visibility:visible'";
} else {
$select_repuesta_motora1="";$repuesta_motora_check1="";
}

if($rowTriage->repuesta_motora==5){
$select_repuesta_motora2="checked"; $repuesta_motora_check2="style='visibility:visible'";
} else {
$select_repuesta_motora2="";$repuesta_motora_check2="";
}

if($rowTriage->repuesta_motora==4){
$select_repuesta_motora3="checked"; $repuesta_motora_check3="style='visibility:visible'";
} else {
$select_repuesta_motora3="";$repuesta_motora_check3="";
}


if($rowTriage->repuesta_motora==3){
$select_repuesta_motora4="checked"; $repuesta_motora_check4="style='visibility:visible'";
} else {
$select_repuesta_motora4="";$repuesta_motora_check4="";
}

if($rowTriage->repuesta_motora==2){
$select_repuesta_motora5="checked"; $repuesta_motora_check5="style='visibility:visible'";
} else {
$select_repuesta_motora5="";$repuesta_motora_check5="";
}


if($rowTriage->repuesta_motora==1){
$select_repuesta_motora6="checked"; $repuesta_motora_check6="style='visibility:visible'";
} else {
$select_repuesta_motora6="";$repuesta_motora_check6="";
}


//---------------ESCALAR DEL DOLOR--------------------------

if($rowTriage->dolor_escala ==1){
$select_escala_dolor1="checked"; $escala_dolor_check1="style='visibility:visible'";
} else {
$select_escala_dolor1="";$escala_dolor_check1="";
}

if($rowTriage->dolor_escala ==2){
$select_escala_dolor2="checked"; $escala_dolor_check2="style='visibility:visible'";
} else {
$select_escala_dolor2="";$escala_dolor_check2="";
}

if($rowTriage->dolor_escala ==3){
$select_escala_dolor3="checked"; $escala_dolor_check3="style='visibility:visible'";
} else {
$select_escala_dolor3="";$escala_dolor_check3="";
}

if($rowTriage->dolor_escala ==4){
$select_escala_dolor4="checked"; $escala_dolor_check4="style='visibility:visible'";
} else {
$select_escala_dolor4="";$escala_dolor_check4="";
}

if($rowTriage->dolor_escala ==5){
$select_escala_dolor5="checked"; $escala_dolor_check5="style='visibility:visible'";
} else {
$select_escala_dolor5="";$escala_dolor_check5="";
}

}


else{
$checked_triaje="";
$id_found=0;
$display="style='display:none'";
$created_date=""; 
 $created_by="";
 $updated_date=""; 
 $updated_by="";
 $hay_change="none";
 $sintomato=0;

//----------------APERTURA OCULAR--------------------------
$select_apertura_ocular1="";$apertura_ocular_check1="";
$select_apertura_ocular2="";$apertura_ocular_check2="";
$select_apertura_ocular3="";$apertura_ocular_check3="";
$select_apertura_ocular4="";$apertura_ocular_check4="";

//----------------REPUESTA VERBAL--------------------------
$select_repuesta_verbal1="";$repuesta_verbal_check1="";
$select_repuesta_verbal2="";$repuesta_verbal_check2="";
$select_repuesta_verbal3="";$repuesta_verbal_check3="";
$select_repuesta_verbal4="";$repuesta_verbal_check4="";
$select_repuesta_verbal5="";$repuesta_verbal_check5="";

//----------------REPUESTA MOTORA--------------------------
$select_repuesta_motora1="";$repuesta_motora_check1="";
$select_repuesta_motora2="";$repuesta_motora_check2="";
$select_repuesta_motora3="";$repuesta_motora_check3="";
$select_repuesta_motora4="";$repuesta_motora_check4="";
$select_repuesta_motora5="";$repuesta_motora_check5="";
$select_repuesta_motora6="";$repuesta_motora_check6="";

//----------------ESCALAR DEL DOLOR--------------------------
$select_escala_dolor1="";$escala_dolor_check1="";
$select_escala_dolor2="";$escala_dolor_check2="";
$select_escala_dolor3="";$escala_dolor_check3="";
$select_escala_dolor4="";$escala_dolor_check4="";
$select_escala_dolor5="";$escala_dolor_check5="";
$salsa="";
}
?>
<body>
<div class="row"  style="border:1px solid #38a7bb;background:white;opacity:0.9">
<div id="search-result"></div>
<?php 
if($updated_by !=""){
?>
<p style="font-size:12px;color:blue;float:right">Creado por <?=$created_by?>, <?=$created_date ?><span style="color:red" style="display:<?=$hay_change?>"><br/>Cambiado por  <?=$updated_by ?>, <?=$updated_date?></span></p> 
<?php 
}
?>
<h1 class="h1"  style="color:red;text-align:center">
TRIAJE <?=$checked_triaje?> 
</h1>

<div  style="overflow-x:auto;">
<table  style="width:100%"  >
<thead>
<tr>
<th><?=$imgpat?> <?=$patient['nombre']?> <span style="font-size:12px"><?=getPatientAge($patient['date_nacer'])?> <?=$sexo?></span></th>
<th>
<?=$patient['nacionalidad']?>
</th>
<th>
<?=$patient['tel_cel']?> <?=$patient['tel_resi']?> 
</th>
<th>
<?=$seguron['title']?> <?=$logoseg?>
</th>
<th style="text-align:center">
<?php
$afiliado=$patient['afiliado'];
if($patient['afiliado'] !=""){echo "$afiliado ";}
if($patient['plan'] !=""){echo "<br/> $plan";}
?>
</th>
<th style="text-align:center"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></th>
</tr>
</thead>
</table>

<form action="" method="post">

<hr/>
<table  class="table required2"  >
<tr>
<th colspan='5' style='text-align:center;background:#5957F7;color:white;font-size:20px'><i title="cada parámetro es requerido" class="fa fa-asterisk"></i> ESCALA DE EVALUACION DEL NIVEL DE CONSCIENCIA</th>
</tr>
</table>


<table  class="table sort-me  table-striped" style="width:100%;" align="center">
<tr style="background:blue;color:white">
<th class="left" style="color:black">ESCALA DE COMA DE GLASGOW</th>
<th></th>
<th></th>
<th></th>
</tr>
<tr  style="background:blue;color:white">
<th >Parámetros</th>
<th class="left">Respuesta observada</th>
<th class="left" style="width:110px">Puntuación</th>
<th class="left" style="width:15px">Chequear</th>
</tr>
<tr>
<th   style="border:1px solid #BFBFBE;">Apertura ocular</th>
<td  style="border:1px solid #BFBFBE;">
<table class="table table-striped">
<tr>
<td class="left">Espontánea</td>
</tr>
<tr>
<td class="left">Al estímulo verbal</td>
</tr>
<tr>
<td class="left">Al estímulo doloroso</td>
</tr>
<tr>
<td class="left">Ninguna</td>
</tr>
</table>
</td>
<td style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left" >4</td>
</tr>
<tr>
<td class="left">3</td>
</tr>
<tr>
<td class="left">2</td>
</tr>
<tr>
<td class="left">1</td>
</tr>
</table>
</td>

<td  style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left"><input type="radio" value="4" name="apertura-ocular" class="click-ao1" <?=$select_apertura_ocular1?> /> <span <?=$apertura_ocular_check1?> class="hideSpan"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio" value="3"  name="apertura-ocular" class="click-ao1" <?=$select_apertura_ocular2?>><span <?=$apertura_ocular_check2?> class="hideSpan"> <i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio" value="2"  name="apertura-ocular" class="click-ao1" <?=$select_apertura_ocular3?>><span <?=$apertura_ocular_check3?> class="hideSpan"> <i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio" value="1"  name="apertura-ocular" class="click-ao1" <?=$select_apertura_ocular4?>> <span <?=$apertura_ocular_check4?>  class="hideSpan"><i  class="fa fa-check"></i></span></td>
</tr>
</table>
</td>
</tr>




<tr class="go-here">
<th  style="border:1px solid #BFBFBE;">Respuesta verbal</th>
<td  style="border:1px solid #BFBFBE;">
<table class="table table-striped">
<tr>
<td class="left">Orientada</td>
</tr>
<tr>
<td class="left">Confusa</td>
</tr>
<tr>
<td class="left">Palabras inadecuadas</td>
</tr>
<tr>
<td class="left">Sonidos incomprensibles</td>
</tr>
<tr>
<td class="left">Ninguna</td>
</tr>
</table>
</td>
<td style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left">5</td>
</tr>
<tr>
<td class="left">4</td>
</tr>
<tr>
<td class="left">3</td>
</tr>
<tr>
<td class="left">2</td>
</tr>
<tr>
<td class="left">1</td>
</tr>
</table>
</td>

<td  style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left"><input type="radio"  value="5"  name="respuesta-verbal" class="click-rv" <?=$select_repuesta_verbal1?> /> <span <?=$repuesta_verbal_check1?> class="hideSpanRV"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="4" name="respuesta-verbal" class="click-rv" <?=$select_repuesta_verbal2?>> <span <?=$repuesta_verbal_check2?> class="hideSpanRV"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="3"  name="respuesta-verbal" class="click-rv" <?=$select_repuesta_verbal3?>> <span <?=$repuesta_verbal_check3?> class="hideSpanRV"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="2" name="respuesta-verbal" class="click-rv" <?=$select_repuesta_verbal4?>> <span <?=$repuesta_verbal_check4?> class="hideSpanRV"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="1"  name="respuesta-verbal" class="click-rv" <?=$select_repuesta_verbal5?>> <span <?=$repuesta_verbal_check5?> class="hideSpanRV"><i  class="fa fa-check"></i></span></td>
</tr>
</table>
</td>
</tr>





<tr>
<th  style="border:1px solid #BFBFBE;">Respuesta motora</th>
<td  style="border:1px solid #BFBFBE;">
<table class="table table-striped" >
<tr>
<td class="left">Obedece órdenes</td>
</tr>
<tr>
<td class="left">Localiza el dolor</td>
</tr>
<tr>
<td class="left">Movimiento de retirada</td>
</tr>
<tr>
<td class="left">Flexión hipertónica (decorticación)</td>
</tr>
<tr>
<td class="left">Extensión hipertónica (descerebración)</td>
</tr>
<tr>
<td class="left">Ninguna</td>
</tr>
</table>
</td>
<td style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left">6</td>
</tr>
<tr>
<td class="left">5</td>
</tr>
<tr>
<td class="left">4</td>
</tr>
<tr>
<td class="left">3</td>
</tr>
<tr>
<td class="left">2</td>
</tr>
<tr>
<td class="left">1</td>
</tr>
</table>
</td>

<td  style="border:1px solid #BFBFBE">
<table class="table table-striped">
<tr>
<td class="left"><input type="radio"  value="6" name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora1?> > <span <?=$repuesta_motora_check1?> class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="5"  name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora2?>> <span <?=$repuesta_motora_check2?> class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="4"  name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora3?>> <span <?=$repuesta_motora_check3?> class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="3"  name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora4?>> <span <?=$repuesta_motora_check4?>class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="2"  name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora5?>> <span <?=$repuesta_motora_check5?> class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
<tr>
<td class="left"><input type="radio"  value="1"  name="respuesta-motora" class="click-rm" <?=$select_repuesta_motora6?>> <span <?=$repuesta_motora_check6?> class="hideSpanRM"><i  class="fa fa-check"></i></span></td>
</tr>
</table>
</td>
</tr>
<tr style="background:#5988E6;color:white">
<th>Sin alteración </th>
<td colspan='2'>
</td>
<td id="punt-result">
</td>
</tr>

<tr >
<td style="text-align:right" id="result-info" colspan="4"></td>


</tr>
</table>

<hr/>
<table  class="table required3"  >
<tr>
<th colspan='5' style='text-align:center;background:#5957F7;color:white;font-size:20px'><i title="requerido" class="fa fa-asterisk"></i> ESCALA DEL DOLOR, SEGUN WONG</th>
</tr>
</table>

<table  class="table"  >
<tr>
<th style="background:blue;color:white">AZUL</th>
<th style="background:green;color:white">VERDE</th>
<th style="background:yellow;color:black">AMARILLO</th>
<th style="background:orange;color:white">NARANJA</th>
<th style="background:red;color:white">ROJO</th>
</tr>
<tr>
<td  style="background:blue;color:white"><img  src="<?=base_url()?>/assets/img/emergencia/sin-dolor.png"  /></td>
<td style="background:green;color:white"><img   src="<?=base_url()?>/assets/img/emergencia/duele-p.png"  /></td>
<td style="background:yellow;color:black"><img  src="<?=base_url()?>/assets/img/emergencia/dolor-p-m.png"  /></td>
<td style="background:orange;color:white"><img  src="<?=base_url()?>/assets/img/emergencia/dolor-mu.png"  /></td>
<td style="background:red;color:white"><img  src="<?=base_url()?>/assets/img/emergencia/dlmuch.png"  /></td>
</tr>

<tr>
<th>0</th>
<th>1 2 3</th>
<th>4 5 6</th>
<th>7 8 9</th>
<th>10</th>
</tr>


<tr>
<th  style="background:blue;color:white">Sin dolor</th>
<th style="background:green;color:white">Duele poco</th>
<th  style="background:yellow;color:black">Duele un poco más</th>
<th style="background:orange;color:white">Duele mucho</th>
<th style="background:red;color:white">Duele muchísimo</th>
</tr>

<tr>
<td  style="background:blue;color:white"><input type="radio"  value="1" class="notradio nivel-dolor" name="escala-dlr" <?=$select_escala_dolor1?> > <span <?=$escala_dolor_check1?> class="hideSpanND"><i  class="fa fa-check"  style="color:white"></i></span></td>
<td style="background:green;color:white"><input type="radio"  value="2" class="notradio  nivel-dolor" name="escala-dlr" <?=$select_escala_dolor2?>> <span  <?=$escala_dolor_check2?> class="hideSpanND"><i  class="fa fa-check" style="color:white"></i></span></td>
<td  style="background:yellow;color:black"><input type="radio"  value="3" class="notradio nivel-dolor" name="escala-dlr" <?=$select_escala_dolor3?>> <span <?=$escala_dolor_check3?> class="hideSpanND"><i  class="fa fa-check"></i></span></td>
<td style="background:orange;color:white"><input type="radio"  value="4" class="notradio nivel-dolor" name="escala-dlr" <?=$select_escala_dolor4?>> <span <?=$escala_dolor_check4?> class="hideSpanND"><i  class="fa fa-check"></i></span></td>
<td style="background:red;color:white"><input type="radio"  value="5" class="notradio nivel-dolor" name="escala-dlr" <?=$select_escala_dolor5?>> <span <?=$escala_dolor_check5?> class="hideSpanND"><i  class="fa fa-check" style="color:white"></i></span></td>
</tr>
</table>
<hr id="hr_ad"/>

<div id="examFisYsigV"></div>
<table  class="table"  >
<tr>
<th colspan='5' style='text-align:center;background:#5957F7;color:white;font-size:20px'><i title="requerido" class="fa fa-asterisk"></i> HISTORIA DE LA CONCLUSION DIAGNOSTICA</th>
</tr>
</table>
<div class="form-horizontal">
<div class="form-group">
<label class="control-label col-xs-3" >Sintomatologia </label>
<div class="col-md-6">
<select  class="form-control required select2" id="sintomatologia" >
<?php
$sql ="SELECT * from emergency_sintomatologia";
$query = $this->db->query($sql);
echo '<option value="" hidden></option>';
foreach ($query->result() as $row){
        if($row->id==$sintomato){
		        $selected="selected";
		} else {
		       $selected="";
	    } 
	echo "<option value='$row->id.' $selected>$row->name</option>";
}
 ?>
</select><br/> 


</div>

</div>


</div>
<table  class="table"  >
<tr>
<th colspan='5' style='text-align:center;background:#5957F7;color:white;font-size:20px'><i title="requerido" class="fa fa-asterisk"></i> SALA DE TRASLADO</th>
</tr>
</table>

<table class="table" align="center">
<tr>
<td>
<?php
if($salsa==2){
$selected="selected";
$value="Emergencia General";
} 
else if($salsa==3){
$selected="selected";
$value="Emergencia Pediatría";
}
else if($salsa==5){
$selected="selected";
$value="Emergencia Obstétrica Y Ginecología";
}
else if($salsa==4){
$selected="selected";
$value="Quirofano";	
}
else if($salsa==6){
$selected="selected";
$value="De Alta";	
}
else if($salsa==7){
$selected="selected";
$value="Defunción";	
}
else if($salsa==8){
$selected="selected";
$value="Fugas";	
}else{
$value="";	
}

if($id_found==0){
$show_btn='';	
}else{
$show_btn='none';	
}
?>

<select class="form-control required select2" id="salsa">
<option value='<?=$salsa?>' hidden><?=$value?></option>
<option value='2' >Emergencia General</option>
<option value='3' >Emergencia Pediatría</option>
<option value='5' >Emergencia Obstétrica Y Ginecología</option>
<option value='4' >Quirofano</option>
<option value='6' > De Alta</option>
<option value='7'> Defunción</option>
<option value='8' > Fugas</option>
</select>
</td>
</tr>
</table>
<hr id="hr_ad"/>
<div class="col-md-2 col-md-offset-5">
<button type="button" id="save_triaje" class="btn btn-primary btn-lg" style="background:green;display:<?=$show_btn?>"><i class="fa fa-save" style="font-size:24px"></i> GUARDAR</button>
<br/><br/>
</div>
</div>

</div>
</form>
</div>
<div class="bas_footer"></div>	
<footer id="footer" >
<div class="container">
<div class="col-md-12" STYLE="text-align:center;color:red">
<p>EMERGENCIA - TRIAJE</p>

</div>
</div>
</footer >
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

 $('.select2').select2({ 
  placeholder: "",
    tags: true,
	allowClear: true

});




examFisYsigV();
function examFisYsigV()
{
$.ajax({
url:"<?php echo base_url(); ?>emergency/examFisYsigV",
data: {date_nacer:'<?=$patient['date_nacer']?>',id_triaje:<?=$id_em?>},
method:"POST",
success:function(data){
$('#examFisYsigV').html(data);
}

});
}


//-------------------------------------------------------------------------------------------
  $('.click-ao1').click(function(){
    	var demovalue = $(this).val(); 
        $("span.hideSpan").css('visibility', 'hidden');
       $(this).closest('td').find('span.hideSpan').css('visibility', 'visible');
	   
	   $('html, body').animate({
        scrollTop: $(".go-here").offset().top
    },);
	   
	   
	 });
  
  
  $('.click-rv').click(function(){
    	var demovalue = $(this).val(); 
        $("span.hideSpanRV").css('visibility', 'hidden');
       $(this).closest('td').find('span.hideSpanRV').css('visibility', 'visible');
	 }); 
	
	
	  $('.click-rm').click(function(){
    	var demovalue = $(this).val(); 
        $("span.hideSpanRM").css('visibility', 'hidden');
       $(this).closest('td').find('span.hideSpanRM').css('visibility', 'visible');
	 });

	  
	 	  $('.nivel-dolor').click(function(){
    	var demovalue = $(this).val(); 
        $("span.hideSpanND").css('visibility', 'hidden');
       $(this).closest('td').find('span.hideSpanND').css('visibility', 'visible');
	 });
	 
	 
 

$("input[type=radio]").not(".notradio" ).click(function() {
loadSum();
});

loadSum();
function loadSum(){

   var total = 0;
    $("input[type=radio]:checked").not(".notradio" ).each(function() {
        total += parseInt($(this).val());
    });
	if(total==0){
	  $('#punt-result').css("background","").css("color",""); 
	$('#result-info').text("").css("background","").css("color",""); 
  }
	else if(total <=4){
	$('#punt-result').css("background","red").css("color","white")
	$('#result-info').text("Gravísimo ( ≤ 4)").css("background","red").css("color","white");
  }
  else if(total >=5 && total <=8 ){
	$('#punt-result').css("background","orange");
	$('#result-info').text("Grave (5 a 8)").css("background","orange").css("color","black");
  }
  else if(total >=13){
	$('#punt-result').css("background","green").css("color","white") 
$('#result-info').text("Leve (>= 13)").css("background","green").css("color","white");	
  }
  else if(total >=9 && total <=12){
	$('#punt-result').css("background","yellow").css("color","black");  
	$('#result-info').text("Moderado (9 a 12)").css("background","yellow").css("color","black");
  }
  
  
    $('#punt-result').text(total);	
	
}

//----------------------------------------------------------------------------------------------------------------------


$('#save_triaje').on('click', function(event) {
event.preventDefault();
var apertura_ocular= $("input[name='apertura-ocular']:checked").val();
var repuesta_verbal= $("input[name='respuesta-verbal']:checked").val();
var repuesta_motora= $("input[name='respuesta-motora']:checked").val();
var dolor_escala= $("input[name='escala-dlr']:checked").val();
var id_em=<?=$id_em?>;
var id_user=<?=$id_ur?>;

//------------Signos Vitales---------------------------------------------------

var peso = $("#peso").val();
var kg = $("#kg").val();
var talla = $("#talla-ef").val();
var imc = $("#imc").val();
var ta = $("#ta").val();
var fr = $("#fr").val();
var fc = $("#fc").val();
var hg = $("#hg").val();
var tempo = $("#tempo").val();
var pulso = $("#pulso").val();
var glicemia = $("#glicemia").val();
var radio_signo= $("input[name='radio_signo']:checked").val();
var satoe = $("#satoe").val();
var fcf = $("#fcf").val();

//-----------CIE10---------------------------------------------------
var sintomatologia= $("#sintomatologia").val();
var salsa= $("#salsa").val();

if(<?=$id_found?>==0){

 if($('[name="apertura-ocular"]:checked').length  === 0 || $('[name="respuesta-verbal"]:checked').length  === 0 || $('[name="respuesta-motora"]:checked').length  === 0 ){
	alert("ESCALA DE EVALUACION DEL NIVEL DE CONSCIENCIA es requerido");
	 $('html, body').animate({
        scrollTop: $(".required2").offset().top
    });
}
else if($('[name="escala-dlr"]:checked').length  === 0){
	alert("ESCALA DEL DOLOR, SEGUN WONG es requerido");
	 $('html, body').animate({
        scrollTop: $(".required3").offset().top
    });
}



 else if($("#salsa").val()==""){
alert("SALSA DE TRASLADO es requerido");
 $('html, body').animate({
        scrollTop: $("#salsa").offset().top
    });
	
} 
else{	
	
$("#save_triaje").prop("disabled",true).text('guadando...');	
 $.ajax({
type: "POST",
url: "<?=base_url('emergency/saveTriaje')?>",
data: {apertura_ocular:apertura_ocular,repuesta_verbal:repuesta_verbal,repuesta_motora:repuesta_motora,dolor_escala:dolor_escala,salsa:salsa,id_pat:<?=$idpat?>,id_em:id_em,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemia:glicemia,satoe:satoe,fcf:fcf,id_ur:<?=$id_ur?>,sintomatologia:sintomatologia
},
success:function(data){
	alert('¡Triaje guadado con éxito!');
	
window.location.href="<?php echo base_url(); ?>emergency/emergency_patients_?enviado_a="+salsa+"&id="+id_user;

},
error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#search-result").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}
} else{

 if($('[name="apertura-ocular"]:checked').length  === 0 || $('[name="respuesta-verbal"]:checked').length  === 0 || $('[name="respuesta-motora"]:checked').length  === 0 ){
	alert("ESCALA DE EVALUACION DEL NIVEL DE CONSCIENCIA es requerido");
	 $('html, body').animate({
        scrollTop: $(".required2").offset().top
    });
}
else if($('[name="escala-dlr"]:checked').length  === 0){
	alert("ESCALA DEL DOLOR, SEGUN WONG es requerido");
	 $('html, body').animate({
        scrollTop: $(".required3").offset().top
    });
}



 else if($("#salsa").val()==""){
alert("SALSA DE TRASLADO es requerido");
 $('html, body').animate({
        scrollTop: $("#salsa").offset().top
    })
	
} 
else{
	$("#save_triaje").prop("disabled",true).text('cambiando...');

 $.ajax({
type: "POST",
url: "<?=base_url('emergency/updateTriaje')?>",
data: {apertura_ocular:apertura_ocular,repuesta_verbal:repuesta_verbal,repuesta_motora:repuesta_motora,dolor_escala:dolor_escala,salsa:salsa,id_pat:<?=$idpat?>,id_em:id_em,
peso:peso,kg:kg,talla:talla, imc:imc, ta:ta, fr:fr, fc:fc, hg:hg,tempo:tempo, pulso:pulso,radio_signo:radio_signo,glicemia:glicemia,satoe:satoe,fcf:fcf,id_ur:<?=$id_ur?>,sintomatologia:sintomatologia
},
success:function(data){
alert('¡Triaje cambiado con éxito!');
window.location.href="<?php echo base_url(); ?>emergency/emergency_patients_?enviado_a="+salsa+"&id="+id_user;
//location.reload(true); 

},

});
}
	
}
})

});
</script>

</html>