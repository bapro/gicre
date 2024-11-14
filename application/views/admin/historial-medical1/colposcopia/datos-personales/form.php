
<?php

if($query_col->result() !=NULL){
foreach ($query_col->result() as $row)
$col_is_preg = $row->col_is_preg;	
$col_age_known_sex = $row->col_age_known_sex;	
$col_last_pap = $row->col_last_pap;	
$col_ref_motive = $row->col_ref_motive;	
$col_ac_sat = $row->col_ac_sat;	
$col_finding_show_fast = $row->col_finding_show_fast;
$col_local = $row->col_local;	
 $col_mos_fino = $row->col_mos_fino;	
$col_comp_end1 = $row->col_comp_end1;	

$col_comp_end2 = $row->col_comp_end2;	

$col_finding_no = $row->col_finding_no;	

$col_finding_minor_change = $row->col_finding_minor_change;	

 $col_ext_f = $row->col_ext_f;	
$col_finding_major_change = $row->col_finding_major_change;	


$col_finding_tenue = $row->col_finding_tenue;	

 $col_finding_dense = $row->col_finding_dense;
$col_finding_acet_change = $row->col_finding_acet_change;	


$col_finding_image = $row->col_finding_image;	


$col_finding_loc_cuad = $row->col_finding_loc_cuad;	


$col_finding_inf_iz = $row->col_finding_inf_iz;	


$col_finding_inf_der = $row->col_finding_inf_der;	


$col_finding_sup_der = $row->col_finding_sup_der;	
 $col_mos_grueso = $row->col_mos_grueso;	

$col_mos_mos = $row->col_mos_mos;	

$col_ext1 = $row->col_ext1;	


$col_ext2 = $row->col_ext2;	


$col_ext3 = $row->col_ext3;	

$col_ext4=$row->col_ext4;
$col_ext_g = $row->col_ext_g;	


$col_vas_at = $row->col_vas_at;	


$col_vas_orq = $row->col_vas_orq;	


$col_vas_s_c = $row->col_vas_s_c;	


$col_vas_sac = $row->col_vas_sac;	


$col_vas_vad = $row->col_vas_vad;	


$col_vas_dil = $row->col_vas_dil;	


$col_sug_ul = $row->col_sug_ul;	


$col_sug_bor = $row->col_sug_bor;	


$col_sug_sit = $row->col_sug_sit;	


$col_sug_perf = $row->col_sug_perf;	


$col_sug_elev = $row->col_sug_elev;	


$col_sug_reg = $row->col_sug_reg;	


$col_sug_cent = $row->col_sug_cent;	


$col_sug_irreg = $row->col_sug_irreg;	


$col_sug_sob = $row->col_sug_sob;	


$col_iodo_pos = $row->col_iodo_pos;	


$col_iodo_par = $row->col_iodo_par;
	
$col_iodo_neg= $row->col_iodo_neg;
$col_taking_bio= $row->col_taking_bio;
$col_loc_ant= $row->col_loc_ant;
$col_loc_post_cent= $row->col_loc_post_cent;
$col_loc_iz_cent= $row->col_loc_iz_cent;
$col_loc_de_cent= $row->col_loc_de_cent;
$col_real_leg_end= $row->col_real_leg_end;
$in_by=$row->inserted_by; 
$up_by=$user_id;
$in_time = $row->inserted_time;
$up_time =date("Y-m-d H:i:s"); 
$created_by=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$updated_by=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
$id=$row->id;
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
$info="<span class='alert alert-info' style='font-size:15px'>Creado por $created_by, $inserted_time - Cambiado por $updated_by, $update_time  </span><hr class='prenatal-separator'/>";
} else{
    $up_time =date("Y-m-d H:i:s"); 
    $in_time = date("Y-m-d H:i:s"); 
    $up_by=$user_id;
    $in_by=$user_id;
    $col_is_preg = 0;	
    $col_age_known_sex = "";	
    $col_last_pap = "";	
    $col_ref_motive = "";	
    $col_ac_sat = 0;	
    $col_finding_show_fast = 0;
    $col_local = 0;	
    $col_finding_dense = 0;
    $col_comp_end1 = 0;	
    $col_ext_f = 0;	
    $col_comp_end2 = 0;	
    
    $col_finding_no = 0;	
    
    $col_finding_minor_change = 0;	
    $col_mos_grueso = 0;
    
    $col_finding_major_change = 0;	
    $col_mos_fino = 0;	
    
    $col_finding_tenue = 0;	
    
    
    $col_finding_acet_change = 0;	
    
    
    $col_finding_image = 0;	
    
    
    $col_finding_loc_cuad = 0;	
    
    
    $col_finding_inf_iz = 0;	
    
    
    $col_finding_inf_der = 0;	
    
    
    $col_finding_sup_der = 0;	
    
    
    $col_mos_mos = 0;	
    
    $col_ext1 = 0;	
    
    
    $col_ext2 = 0;	
    
    
    $col_ext3 = 0;	
    
    $col_ext4=0;
    $col_ext_g = 0;	
    
    
    $col_vas_at = 0;	
    
    
    $col_vas_orq = 0;	
    
    
    $col_vas_s_c = 0;	
    
    
    $col_vas_sac = 0;	
    
    
    $col_vas_vad = 0;	
    
    
    $col_vas_dil = 0;	
    
    
    $col_sug_ul = 0;	
    
    
    $col_sug_bor = 0;	
    
    
    $col_sug_sit = 0;	
    
    
    $col_sug_perf = 0;	
    
    
    $col_sug_elev =0;	
    
    
    $col_sug_reg = 0;	
    
    
    $col_sug_cent = 0;	
    
    
    $col_sug_irreg = 0;	
    
    
    $col_sug_sob =0;	
    
    
    $col_iodo_pos = 0;	
    
    
    $col_iodo_par = 0;
        
    $col_iodo_neg= 0;
    $col_taking_bio= 0;
    $col_loc_ant= 0;
    $col_loc_post_cent= 0;
    $col_loc_iz_cent= 0;
    $col_loc_de_cent= 0;
    $col_real_leg_end= 0;
$id=0;
$info="";
}
echo $info;
?>
<div class="col-md-12"  >
	<button  type="button" class="btn btn-primary btn-xs reload-colcoscopy" >Nuevo Registro</button>
		<input type="hidden" id="colcos_data_per_id" value="<?=$id?>" />
        <input type="hidden" id="up_time" value="<?=$up_time?>" />
        <input type="hidden" id="in_time" value="<?=$in_time?>" /> 
        <input type="hidden" id="in_by" value="<?=$in_by?>" /> 
        <input type="hidden" id="up_by" value="<?=$up_by?>" /> 
         
        <hr class="prenatal-separator"/>	
 </div>
<div class="col-md-5"  >
 <legend>DATOS PERSONALES</legend>
 
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label" style="text-align:right">Estas Embarazada</label>
    <div class="col-sm-7">
    <div class=" radio-wrapper">
<div class="radio-inline">
<?php
if($col_is_preg ==1){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input' type='radio' id='col_is_preg' name='col_is_preg' value='1' $selected />";
?>
  <label class="form-check-label" > Si</label>
    </div>
    <div class="radio-inline">

 <?php
if($col_is_preg ==0){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input' type='radio' id='col_is_preg' name='col_is_preg' value='0' $selected />";
?>

      <label class="form-check-label" > No</label>
    </div>
    </div>
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label" style="text-align:right">Edad Primera Relacion Coital</label>
    <div class="col-sm-3">
   <input type="number" class="form-control colp-remove" id="col_age_known_sex" name="col_age_known_sex" value="<?=$col_age_known_sex?>" />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label" style="text-align:right">Fecha Ultimo PAP</label>
    <div class="col-sm-4">
   <input type="text" class="form-control colp-remove" id="col_last_pap" name="col_last_pap" value="<?=$col_last_pap?>" />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label" style="text-align:right">Motivo Referimiento</label>
    <div class="col-sm-6">
   <textarea rows = "6" class="form-control colp-remove" id="col_ref_motive" name="col_ref_motive"><?=$col_ref_motive?></textarea>
   
    </div>
  </div>
  
  <br/>
   <label style='text-decoration: underline;'>Colcoscopia (Acetico 5%)</label>
   <div class="form-group row">
    <div class="col-sm-9">
    <div class=" radio-wrapper">
<div class="radio-inline">

<?php
if($col_ac_sat ==1){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input' type='radio' id='col_ac_sat' name='col_ac_sat' value='1' $selected />";
?>
      <label class="form-check-label"> Satisfactoria</label>
    </div>
    <div class="radio-inline">
    <?php
if($col_ac_sat ==0){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input' type='radio' id='col_ac_sat' name='col_ac_sat' value='0' $selected />";
?>
      <label class="form-check-label" > No Satisfactoria</label>
    </div>
    </div>
    <div class="checkbox ">
    <?php
   if ($col_local ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox"  id="col_local" name="col_local" <?=$selected?> >Localizada en el ectocérvix, totalmente visible</label>
</div>
<div class="checkbox ">
<?php
   if ($col_comp_end1 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" id="col_comp_end1" name="col_comp_end1" <?=$selected?> >Con un componente endoservical totalmente visible</label>
</div>
<div class="checkbox ">
<?php
   if ($col_comp_end2 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" id="col_comp_end2" name="col_comp_end2" <?=$selected?>  >Con un componente endoservical NO totalmente visible</label>
</div>
    </div>
  </div>
  </div>
  <div class="col-md-7"  >
  <legend>HALLAZGOS</legend>
  <label class="checkbox-inline">
  <?php
   if ($col_finding_no ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" id="col_finding_no" name="col_finding_no" <?=$selected?> > Normal
    </label>
    <label class="checkbox-inline">
    <?php
   if ($col_finding_minor_change ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" id="col_finding_minor_change" name="col_finding_minor_change" <?=$selected?> > Cambios Menores
    </label>
    <label class="checkbox-inline">
    <?php
   if ($col_finding_major_change ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
      <input type="checkbox" id="col_finding_major_change" name="col_finding_major_change" <?=$selected?>> Cambios Mayores
    </label>
<br/><br/>
    <div class="form-group row">
    <div class="col-sm-9">
<label style='text-decoration: underline;'>Epitelio Acetoblanco</label>
<br/>

<label class="checkbox-inline">
<?php
   if ($col_finding_tenue ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_finding_tenue" name="col_finding_tenue" <?=$selected?>> Tenue
</label>
<label class="checkbox-inline">
<?php
   if ($col_finding_dense ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_finding_dense" name="col_finding_dense" <?=$selected?>> Denso
</label>




  <div class="checkbox ">
  <?php
   if ($col_finding_show_fast ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" id="col_finding_show_fast" name="col_finding_show_fast" <?=$selected?>>Que aparece rapido y desaparece lento. Blanco Ostraceo</label>
</div>
<div class="checkbox ">
<?php
   if ($col_finding_acet_change ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" id="col_finding_acet_change" name="col_finding_acet_change" <?=$selected?>>Cambio acetoblanco debil que aparece TARDE y desaparece pronto</label>
</div>
<div class="checkbox ">
<?php
   if ($col_finding_image ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <label><input type="checkbox" id="col_finding_image" name="col_finding_image" <?=$selected?>>Imagen de blanco sobre blanco (border interno)</label>
</div>
    </div>
  </div>

  <br/>
  <div class="form-group row">
    <div class="col-sm-9">
<label style='text-decoration: underline;'>Locacion Del Cuadrante</label>

    <div class="form-check form-check-inline">
   <?php
   if ($col_finding_loc_cuad ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_finding_loc_cuad" name="col_finding_loc_cuad" <?=$selected?> />
  <label class="form-check-label" > Superior Izquierdo (12 a 3)</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_finding_inf_iz ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_finding_inf_iz" name="col_finding_inf_iz" <?=$selected?> />
  <label class="form-check-label"> Inferior Izquierdo (3 a 6)</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_finding_inf_der ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_finding_inf_der" name="col_finding_inf_der" <?=$selected?> />
  <label class="form-check-label" > Inferior Derecho (6 a 9)</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_finding_sup_der ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_finding_sup_der" name="col_finding_sup_der" <?=$selected?> />
  <label class="form-check-label" > Superior Derecho (9 a 12)</label>
</div>
  </div>

  </div>

  <label style='text-decoration: underline;'>Mosaico</label>
<table class="table" style="width:90%">
<tr>
<td>
<label class="checkbox-inline">
<?php
   if ($col_mos_fino ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_mos_fino" name="col_mos_fino" <?=$selected?> > Fino
</label>
<label class="checkbox-inline">
<?php
   if ($col_mos_grueso ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_mos_grueso" name="col_mos_grueso" <?=$selected?> > Grueso
</label>
   
<div class="form-check form-check-inline">

<?php
   if ($col_mos_mos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_mos_mos" name="col_mos_mos" <?=$selected?>  />
  <label class="form-check-label" > Mosaico ancho con rosetas de diferente tamaño</label>
</div>

</td>

</tr>
</table>
<table class="table">
<tr>
  <td>
    <label style='text-decoration: underline;'>Extensión</label>
</td>
</tr>
<tr>
<td>
<?php
   if ($col_ext1 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input  type="checkbox" id="col_ext1" name="col_ext1" <?=$selected?> />
  <label>< 25%  &nbsp;&nbsp;</label>

  <?php
   if ($col_ext2 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_ext2" name="col_ext2" <?=$selected?>  />
  <label > 25 a 50%</label>

  </td>
  <td>
  <?php
   if ($col_ext3 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input  type="checkbox" id="col_ext3" name="col_ext3" <?=$selected?> />
  <label > 50 a 75%  &nbsp;&nbsp;</label>
  <?php
   if ($col_ext4 ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_ext4" name="col_ext4" <?=$selected?>  />
  <label > > 75%</label>


  </td>
</tr>
</table>
 
<label style='text-decoration: underline;'>Mosaico</label>
<table class="table" style="width:90%">
<tr>
<td>
<label class="checkbox-inline">
<?php
   if ($col_ext_f ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_ext_f" name="col_ext_f" <?=$selected?> > Fino
</label>
<label class="checkbox-inline">
<?php
   if ($col_ext_g ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" id="col_ext_g" name="col_ext_g" <?=$selected?> > Grueso
</label>
</tr>
</table>
<label style='text-decoration: underline;'>Vasos Atipicos</label>
<table class="table" style="width:100%">
<tr>
  <td>

  <div class="form-check form-check-inline">
  <?php
   if ($col_vas_at ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_at" name="col_vas_at" <?=$selected?> />
  <label class="form-check-label" > Stops</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_vas_orq ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_orq" name="col_vas_orq"  <?=$selected?> />
  <label class="form-check-label" > Orquilla</label>
</div> 
<div class="form-check form-check-inline">
<?php
   if ($col_vas_s_c ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_s_c" name="col_vas_s_c" <?=$selected?> />
  <label class="form-check-label" > Busco Cambio</label>
</div>
  </td>
  <td>
  <div class="form-check form-check-inline">
  <?php
   if ($col_vas_sac ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_sac" name="col_vas_sac" <?=$selected?> />
  <label class="form-check-label" > Sacacorchos</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_vas_vad ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_vad" name="col_vas_vad" <?=$selected?> />
  <label class="form-check-label" > Vasos de distintos calibres</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($col_vas_dil ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_vas_dil" name="col_vas_dil" <?=$selected?> />
  <label class="form-check-label" > Dilataciones</label>
</div>
  </td>
</tr>
</table>
  

<label style='text-decoration: underline;'>Sugestiva de carcinoma</label>
<table class="table" style="width:100%">
<tr>
  <td>

  <div class="form-check form-check-inline">
  <?php
   if ($col_sug_ul ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_ul" name="col_sug_ul" <?=$selected?> />
  <label class="form-check-label" > Ulceración</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_sug_bor ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_bor" name="col_sug_bor" <?=$selected?> />
  <label class="form-check-label" > Borders</label>
</div> 
<div class="form-check form-check-inline">
<?php
   if ($col_sug_sit ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_sit" name="col_sug_sit" <?=$selected?> />
  <label class="form-check-label" > Situación</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="col_sug_pl" name="col_sug_pl" />
  <label class="form-check-label" > Plano</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($col_sug_perf ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_perf" name="col_sug_perf" <?=$selected?> />
  <label class="form-check-label" > Periférica</label>
</div>
  </td>
  <td>
  <div class="form-check form-check-inline">
  <?php
   if ($col_sug_elev ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_elev" name="col_sug_elev" <?=$selected?> />
  <label class="form-check-label" > Elevación</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_sug_reg ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>

  <input class="form-check-input" type="checkbox" id="col_sug_reg" name="col_sug_reg" <?=$selected?> />
  <label class="form-check-label" > Regular</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($col_sug_cent ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_cent" name="col_sug_cent" <?=$selected?> />
  <label class="form-check-label" > Central</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($col_sug_irreg ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_irreg" name="col_sug_irreg" <?=$selected?>  />
  <label class="form-check-label" > Irregular</label>
</div>
<div class="form-check form-check-inline">
<?php
   if ($col_sug_sob ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_sug_sob" name="col_sug_sob" <?=$selected?> />
  <label class="form-check-label" > Sobreelevado</label>
</div>
  </td>
</tr>
</table>


<label style='text-decoration: underline;'>LUGOL (Test Shiller)</label>

  <div class="form-check form-check-inline">
  <?php
   if ($col_iodo_pos ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_iodo_pos" name="col_iodo_pos" <?=$selected?> />
  <label class="form-check-label" > IODO Positivo</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_iodo_par ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_iodo_par" name="col_iodo_par" <?=$selected?> />
  <label class="form-check-label" > IODO Parcialmente negativo (posibilidad debil, parcialement moteado)</label>
</div>
 
<div class="form-check form-check-inline">
<?php
   if ($col_iodo_neg ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_iodo_neg" name="col_iodo_neg" <?=$selected?> />
  <label class="form-check-label" > IODO negativo (amarillo mostaza sobre epitelio acetoblanco)</label>
</div>


<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Se toma biopsa</label>
    <div class="col-sm-7">
    <div class=" radio-wrapper">
<div class="radio-inline">
    <?php
if($col_taking_bio ==1){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input'  type='radio' id='col_taking_bio' name='col_taking_bio'  $selected value='1'/>";
?>

      <label class="form-check-label" > Si</label>
    </div>
    <div class="radio-inline">
    <?php
if($col_taking_bio ==0){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input'  type='radio' id='col_taking_bio' name='col_taking_bio'  $selected value='0'/>";
?>

      <label class="form-check-label" > No</label>
    </div>
    </div>
   
    </div>
  </div>

  <table class="table" style="width:100%">
<tr>
<td><label>Localización</label></td>
<td>
<div class="form-check form-check-inline">
<?php
   if ($col_loc_ant ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_loc_ant" name="col_loc_ant" <?=$selected?> />
  <label class="form-check-label" > Anterior-Central-Periferico</label>
</div>

<div class="form-check form-check-inline">
<?php
   if ($col_loc_post_cent ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_loc_post_cent" name="col_loc_post_cent" <?=$selected?>  />
  <label class="form-check-label" > Posterior-Central-Periferico</label>
</div> 

<div class="form-check form-check-inline">
<?php
   if ($col_loc_iz_cent ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_loc_iz_cent" name="col_loc_iz_cent" <?=$selected?>  />
  <label class="form-check-label" > Izquierda-Central-Periferico</label>
</div> 

<div class="form-check form-check-inline">
<?php
   if ($col_loc_de_cent ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input class="form-check-input" type="checkbox" id="col_loc_de_cent" name="col_loc_de_cent" <?=$selected?>  />
  <label class="form-check-label" > Derecha-Central-Periferico</label>
</div>
</td>
</tr>
</table>

<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Se realizo legrado endocervical</label>
    <div class="col-sm-7">
    <div class=" radio-wrapper">
<div class="radio-inline">
<?php
if($col_real_leg_end ==1){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input'  type='radio' id='col_real_leg_end' name='col_real_leg_end'  $selected value='1'/>";
?>
  <label class="form-check-label" > Si</label>
    </div>
    <div class="radio-inline">
    <?php
if($col_real_leg_end ==0){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input class='form-check-input'  type='radio' id='col_real_leg_end' name='col_real_leg_end'  $selected value='0'/>";
?>

      <label class="form-check-label" > No</label>
    </div>
    </div>
   
    </div>
  </div>
  </div>
  
  <div class="col-md-12">
  <hr class="prenatal-separator"/>
  <div class="form-group  pull-right">
      
	  <button type="button" id="save_colcoscopia" class="btn btn-lg btn-success"><i class="fa fa-check after-action-colcoscopia" style="display:none;color:blue;font-size:30px;position:absolute" ></i> GUARDAR</button>
      <div ></div>
      <button type="button" class="btn btn-warning btn-lg"  id="showEditColcoscopy" style="display:none"><i class="fa fa-pencil"></i> Editar </button>
 
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Vert.</a>
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c1/c_t_0_/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Horiz.</a>
       
    </div>

    </div>

    <script>
        if(<?=$action_id?>==1){
$("#showEditColcoscopy").show();
$('#save_colcoscopia').hide(); 
$( "#colcoscopyContentDatosPersonales input" ).prop( "disabled", true );
	   $( "#colcoscopyContentDatosPersonales textarea" ).prop( "disabled", true );
	  
        }
$("#load-colposcopy").hide();
$('#colcoscopyContentDatosPersonales').css("opacity","");

$('#showEditColcoscopy').on('click', function(e) {
	e.preventDefault();
	$(this).hide();
	$('#save_colcoscopia').slideDown();  
		  $( "#colcoscopyContentDatosPersonales input" ).prop( "disabled", false );
	    $( "#colcoscopyContentDatosPersonales textarea" ).prop( "disabled", false );
		
	});


	$('.reload-colcoscopy').on('click', function(e) {
	e.preventDefault();
	paginateColcoscopia();
    colcoscopyContentDatosPersonales();
	$('#colcoscopy-btns').hide();  
	});


    </script>

  