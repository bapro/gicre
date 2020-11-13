<?php

$this->padron_database = $this->load->database('padron',TRUE);


?>

<style>
table, th, td {
   font-size:14px
}
.add-row{color:#38a7bb;border-color:#38a7bb;}
#plus{
    
    text-decoration:none;
    color:#38a7bb;
	display:inline-block;
    cursor:pointer
}
.td-input{background:white;border:1px solid #38a7bb}
.totpapat,.total,.totalpaseg{background:rgb(230,230,230);border:1px solid #38a7bb}
/*.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
    border: 1px solid #38a7bb; 
}*/

.trback th{background:#A9E4EF}
.col-sm-5,.col-sm-7,.col-sm-9,.col-sm-3,.col-sm-8{font-size:15px;}

.not-pointer{pointer-events:none;}
.notme input[type="text"] {
background:#EEECEC
}
</style>
<div class="col-sm-12 tab-content showdown searchb">
<h3 class="h3" align="center">DATOS DEL PACIENTE</h3> 
<?php
foreach($patient_data as $row)

if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img  class="img-responsive" style="float:left; width:130px;" src="data:image/jpeg;base64,'. base64_encode($photo) .'"  />';	
}else{
echo '<img  class="img-responsive" style="float:left; width:130px;" src="'.base_url().'/assets/img/user.png"  />';	
}

} else if($row->photo==""){
	
}
else{
	?>
<img  class="img-responsive" style="float:left; width:130px;"  class="img-thumbnail" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}
?>
<div style="overflow-x:auto">
<table class="table" style="font-size:12px" >
<tr  class="trback">
<th>Record</th>
<th>Nombres</th>
<th>Cedula</th>
<th>Seguro Medico</th>
<th>No. Afiliado</th>
<th>Tipo Afiliado</th>
<th>Tel.</th>
</tr>
<?php
$cpt="";

if ( $cpt==0 ) {
$cpt=1;
$colorBg = "rgb(236,236,255)";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}

$seguro_ingo=$this->db->select('input_name,inputf')->where('patient_id',$id_p_a)->where('input_name !=','')
 ->get('saveinput')->row_array();
 $planame=$this->db->select('name')->where('id',$row->plan)->get('seguro_plan')->row('name');

?>

<tr>
<td><?=$row->nec1 ?><input id="patient_id" type="hidden" value="<?=$id_p_a;?>"/></td>
<td id="paciente" style="text-transform:uppercase"><?=$row->nombre;?></td>
<td id="cedula"><?=$row->cedula;?></td>
<td><input id="seguro_medico" type="hidden" value="<?=$id_seguro;?> "/> <?=$seguro_name;?> (<?=$planame;?>) <input type="hidden" id="rnc" value="<?=$rnc;?>"/></td>
<td id="num_af"><?php echo $seguro_ingo['input_name'];?></td>
<td id="tipoaf"><?php echo $row->afiliado;?></td>
<td id="tel"><?=$row->tel_cel?> / <?=$row->tel_resi?></td>
<!--<td><?=$row->calle?>, <?=$row->barrio?></td>
<td id="email"><?=$row->email?></td>-->
</tr>

</table>
</div>
</div>
<div class="col-sm-12 tab-content showdown1 searchb" >


<?php

//-----------------centro medico-------------------------------

$doctor=$this->db->select('name')->where('id_user',$id_doc )
->get('users')->row('name');

$title_area=$this->db->select('title_area')->where('id_ar',$area)
->get('areas')->row('title_area');


$centro=$this->db->select('name')->where('id_m_c',$id_cm)->get('medical_centers')->row('name');
?>
<h3 class="h3" align="center">DATOS DEL PRESTADOR</h3> 
<br/>
<div class="col-sm-6 notme">
<?php if($identificar=="privado") {
	$hide_me='';
	
	?>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Medico :</label>
<div class="col-sm-7">
<?=$doctor?>
<input id="medico" type="hidden" value="<?=$id_doc?>"  />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Exequatur :</label>
<div class="col-sm-3">
<?=$exequatur?>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4"> Especialidad :</label>
<div class="col-sm-7">
<?=$title_area?>
</div>
</div>


<input id="servicio" type="hidden" value="<?=$area?>"/>



</form>
<?php } else {
	
	$hide_me='style="display:none"';
	?>
<form  class="form-horizontal"> 
<div class="form-group">
<label class="control-label col-sm-4"> Centro Medico :</label>
<div class="col-sm-8">
<?=$centro?>
<input id="centro_medico" value="<?=$id_cm?>" type="hidden" />
<br/>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4"> Codigo Prestador :</label>
<div class="col-sm-3">
<?=$cod?>
</div>
</div>
</form>
<?php } ?>
</div>

<div class="col-sm-6">
<form  class="form-horizontal"> 
<div class="form-group" <?=$hide_me?>>
<label class="control-label col-sm-3"> Centro Medico :</label>
<div class="col-sm-9">
<?=$centro?>
<input id="centro_medico" value="<?=$id_cm?>" type="hidden" />
<br/>
</div>
</div>
<?php if($show_diagno_pat !=NULL){ ?>
<div class="form-group">
<label class="control-label col-sm-3"> CIE10 :</label>
<div class="col-sm-9">

<?php 
$i=1;
foreach($show_diagno_pat as $cie)
{
?><?=$i;$i++?> ) <?php echo "" . $cie->code . " $cie->description <br/>";	
}	
?>

</div>
</div>

<?php } if($otros_diagnos !="") {?>
<div class="form-group">
<label class="control-label col-sm-3"> Otro Diagnostico :</label>
<div class="col-sm-9">

<?=$otros_diagnos;?>

</div>
</div>
<?php } ?>



<?php  if($procedimiento !="") {?>
<div class="form-group">
<label class="control-label col-sm-3"> Procedimiento :</label>
<div class="col-sm-9">

<?=$procedimiento;?>

</div>
</div>
<?php } ?>
</form> 
</div>

</div>