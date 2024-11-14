<?php

if($query_vu->result() !=NULL){
foreach ($query_vu->result() as $row)
$vulvo_color_white = $row->vulvo_color_white;	
$vulvo_color_pig = $row->vulvo_color_pig;	
$vulvo_color_red = $row->vulvo_color_red;	
$part_vas_au = $row->part_vas_au;	
$part_vas_mot = $row->part_vas_mot;	

$part_vas_mos = $row->part_vas_mos;	

$part_vas_vas = $row->part_vas_vas;	

$vul_loc_ar_mu = $row->vul_loc_ar_mu;	

$vul_loc_ar_pi = $row->vul_loc_ar_pi;	

$vul_top_uni = $row->vul_top_uni;	


$vul_top_mul = $row->vul_top_mul;	


$vul_super_sob = $row->vul_super_sob;	


$vul_super_plena = $row->vul_super_plena;	


$vul_super_micro = $row->vul_super_micro;	


$vul_taking_bio = $row->vul_taking_bio;	


$vul_les_prer_1 = $row->vul_les_prer_1;	


$vul_les_prer_2 = $row->vul_les_prer_2;	

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
    $vulvo_color_white = 0;	
    $vulvo_color_pig = 0;	
    $vulvo_color_red = 0;	
    $part_vas_au = 0;	
    $part_vas_mot = 0;	
    
    $part_vas_mos = 0;	
    
    $part_vas_vas = 0;	
    
    $vul_loc_ar_mu = 0;	
    
    $vul_loc_ar_pi = 0;	
    
    $vul_top_uni = 0;	
    
    
    $vul_top_mul = 0;	
    
    
    $vul_super_sob = 0;	
    
    
    $vul_super_plena = 0;	
    
    
    $vul_super_micro = 0;	
    
    
    $vul_taking_bio = 0;	
    
    
    $vul_les_prer_1 = "";	
    
    
    $vul_les_prer_2 = "";	
$id=0;
$info="";
}

echo $info;
?>
<div class="col-md-12"  >
<button  type="button" class="btn btn-primary btn-xs reload-vulvoscopia" >Nuevo Registro</button>
<hr class="prenatal-separator"/>	
 </div>

<div class="col-md-2"   >
  
<input type="hidden" id="vulvo_data_per_id" value="<?=$id?>" />
        <input type="hidden" id="vul_up_time" value="<?=$up_time?>" />
        <input type="hidden" id="vul_in_time" value="<?=$in_time?>" /> 
        <input type="hidden" id="vul_in_by" value="<?=$in_by?>" /> 
        <input type="hidden" id="vul_up_by" value="<?=$up_by?>" /> 
<h4 ><u>COLOR</ul></h4>
<div class="checkbox ">
<?php
            if ($vulvo_color_white ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vulvo_color_white" id="vulvo_color_white" <?=$selected?> >Blanca</label>
            
</div>
<div class="checkbox ">
<?php
            if ($vulvo_color_pig ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vulvo_color_pig" id="vulvo_color_pig" <?=$selected?> >Pigmentada</label>
  
</div>
<div class="checkbox ">
<?php
if ($vulvo_color_red ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vulvo_color_red" id="vulvo_color_red" <?=$selected?> >Roja</label>
  
</div>

</div>



<div class="col-md-2"   >
<h4 ><u>PARTE VASCULAR</u></h4>
<div class="checkbox ">
<?php
            if ($part_vas_au ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="part_vas_au" id="part_vas_au" <?=$selected?> >Ausente</label>
            
</div>
<div class="checkbox ">
<?php
            if ($part_vas_mot ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="part_vas_mot" id="part_vas_mot" <?=$selected?> >Moteado</label>
  
</div>
<div class="checkbox ">
<?php
if ($part_vas_mos ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="part_vas_mos" id="part_vas_mos" <?=$selected?> >Mosaico</label>
  
</div>
<div class="checkbox ">
<?php
if ($part_vas_vas ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="part_vas_vas" id="part_vas_vas" <?=$selected?> >Vasos Atipico</label>
  
</div>
</div>


<div class="col-md-2"   >
<h4 ><u>LOCALIZACION</u></h4>
<div class="checkbox ">
<?php
            if ($vul_loc_ar_mu ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_loc_ar_mu" id="vul_loc_ar_mu" <?=$selected?> >Area Muscosa</label>
            
</div>
<div class="checkbox ">
<?php
            if ($vul_loc_ar_pi ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_loc_ar_pi" id="vul_loc_ar_pi" <?=$selected?> >Area Pilosa</label>
  
</div>

</div>

<div class="col-md-2"   >
<h4 ><u>TOPOGRAFIA</u></h4>
<div class="checkbox ">
<?php
            if ($vul_top_uni ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_top_uni" id="vul_top_uni" <?=$selected?> >Unifocal</label>
            
</div>
<div class="checkbox ">
<?php
            if ($vul_top_mul ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_top_mul" id="vul_top_mul" <?=$selected?> >Multifocal</label>
  
</div>

</div>



<div class="col-md-2"   >
<h4 ><u>SUPERFICIE</u></h4>
<div class="checkbox ">
<?php
            if ($vul_super_sob ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_super_sob" id="vul_super_sob" <?=$selected?> >Sobreelevada</label>
            
</div>
<div class="checkbox ">
<?php
            if ($vul_super_plena ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_super_plena" id="vul_super_plena" <?=$selected?> >Plena</label>
  
</div>
<div class="checkbox ">
<?php
            if ($vul_super_micro ==0){
            $selected="";
            }
            else
            {
            $selected="checked";
            }
            ?>
            <label><input type="checkbox"  name="vul_super_micro" id="vul_super_micro" <?=$selected?> >Micropapilar</label>
  
</div>
</div>

<div class='col-md-12'>
<br/>
<div class="col-md-3"  >
<label><u>TOMA DE BIOPSIA</u></label> 
<div class=" radio-wrapper">
<div class="radio-inline">
<?php
 
 if ($vul_taking_bio ==0){
  $selected="checked";
  }
  else
  {
  $selected="";
  }
?>
   
      <input class="form-check-input" type="radio"  name="vul_taking_bio" id="vul_taking_bio" value="0" <?=$selected?>>
      <label class="form-check-label" >No</label>
    </div>
    <div class="radio-inline">
    <?php
 
 if ($vul_taking_bio ==1){
  $selected="checked";
  }
  else
  {
  $selected="";
  }
?>
      <input class="form-check-input" type="radio"  name="vul_taking_bio" id="vul_taking_bio"  value="1" <?=$selected?>>
      <label class="form-check-label" >si</label>
    </div>
    </div>
</div>


<div class="col-md-9"  >
<label><u>LESIONES PERINEALES</u></label> 
<br/>
<label class="control-label">Descripción</label>
<textarea rows = "6" class="form-control colp-remove" id="vul_les_prer_1" name="vul_les_prer_1"><?=$vul_les_prer_1?></textarea>
<br/>
<label class="control-label">Localización</label>

<textarea rows = "6" class="form-control colp-remove" id="vul_les_prer_2" name="vul_les_prer_2"><?=$vul_les_prer_2?></textarea>
   

</div>
</div>
<div class="col-md-12">
  <hr class="prenatal-separator"/>
  <div class="form-group  pull-right">
      
	  <button type="button" id="save_vulvoscopia" class="btn btn-lg btn-success"><i class="fa fa-check after-action-vulvoscopia" style="display:none;color:blue;font-size:30px;position:absolute" ></i> GUARDAR</button>
    <div id="vulvoscopia-info"></div>
      <button type="button" class="btn btn-warning btn-lg"  id="showEditVulvoscopia" style="display:none"><i class="fa fa-pencil"></i> Editar </button>
 
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Vert.</a>
		<a  style="display:none"  class="btn btn-md btn-primary imprimir-cirugia-reporte"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c1/c_t_0_/$id_historial/$user_id/$centro_medico/r")?>"  ><i class="fa fa-print"></i> Imprimir Horiz.</a>
       
    </div>

    </div>
<script>
$("#load-vulvoscopia").hide();
$('#vulvoscopiaContent').css("opacity","");

if(<?=$action_id?>==1){
$("#showEditVulvoscopia").show();
$('#save_vulvoscopia').hide(); 
$( "#vulvoscopiaContent input" ).prop( "disabled", true );
$( "#vulvoscopiaContent textarea" ).prop( "disabled", true );

}


$('#showEditVulvoscopia').on('click', function(e) {
	e.preventDefault();
	$(this).hide();
	$('#save_vulvoscopia').slideDown();  
		  $( "#vulvoscopiaContent input" ).prop( "disabled", false );
	    $( "#vulvoscopiaContent textarea" ).prop( "disabled", false );
		
	});
  $('.reload-vulvoscopia').on('click', function(e) {
	e.preventDefault();
	paginateVulvoscopia();
  vulvoscopiaContent();
	$('#colcoscopy-btns').hide();  
	});
</script>