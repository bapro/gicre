<?php
foreach ($cirugia_paginate->result() as $rowp) {
$inserted_time = date("d-m-Y H:i:s", strtotime($rowp->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$rowp->user)
 ->get('users')->row('name');	
?>
 <form class="form-horizontal" method="post" id="change-bgd-pag" >
   <h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?>, <?=$inserted_time?></h5>
	<hr/>
    <div class="form-group">
      <label class="control-label col-sm-2" >HORA INICIO:</label>
      <div class="col-sm-2">
		<select class="form-control horario-cirugia" id="hora_inicioe" >
		<?php
		echo "<option>$rowp->hora_inicio</option>";
		$sql2 ="SELECT * FROM hour_from order by id ASC";
		$query2 = $this->db->query($sql2);
		foreach ($query2->result() as $row) {
		if($genda['hour_from'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
		} else {
		echo "<option >".$row->hour."</option>";
		}
		}?>
		</select> 
      
      </div>
	   <label class="control-label col-sm-2" >HORA FINALIZACION:</label>
      <div class="col-sm-2">          
      	<select class="form-control horario-cirugia" id="hora_finale" >
		<?php
		echo "<option>$rowp->hora_final</option>";
		$sql2 ="SELECT * FROM hour_from order by id DESC";
		$query2 = $this->db->query($sql2);
		foreach ($query2->result() as $row) {
		if($genda['hour_to'] == $row->hour) {
		echo "<option selected>".$row->hour."</option>";
		} else {
		echo "<option >".$row->hour."</option>";
		}
		}?>
		</select> 
	 </div>
    </div>
	  <div class="form-group">
	 <label class="control-label col-sm-3">DIAGNOSTICO PRE-FBC:</label>
	  <div class="col-sm-5">          
      <textarea  class="form-control" id="diag_pre_fbce"   ><?=$rowp->diag_pre_fbc?></textarea>
	 </div>
    </div>
	<div class=" col-md-3"></div>
	<div class=" col-md-9">
    <table class="table" style="width:75%">
	 <tr>
      <td>S/V:</td>
      <td>          
      <input  class="form-control" id="svtae" value="<?=$rowp->svta?>"  />
      </td>
    
      <td >mmhg.:</td>
      <td>          
      <input  class="form-control" id="mmhge" value="<?=$rowp->mmhg?>">
      </td>
    
      <td >l/min.:</td>
      <td>          
      <input  class="form-control" id="minfre" value="<?=$rowp->minfr?>"> 
      </td>
   
      <td >Res/min.:</td>
      <td>          
      <input  class="form-control" id="resmine" value="<?=$rowp->resmin?>"> 
      </td>
    </tr>
	
	
		 <tr>
      <td>TA:</td>
      <td>          
      <input  class="form-control clear-cirugia-toracia" id="tacire" value="<?=$rowp->tacir?>"  />
      </td>
    
      <td >FC:</td>
      <td>          
      <input  class="form-control clear-cirugia-toracia" id="fccire"  value="<?=$rowp->fccir?>">
      </td>
    
      <td >FR:</td>
      <td>          
      <input  class="form-control clear-cirugia-toracia" id="frcire"  value="<?=$rowp->frcir?>"> 
      </td>
   
      <td >SATO2:</td>
      <td>          
      <input  class="form-control clear-cirugia-toracia" id="sato2e"  value="<?=$rowp->sato2?>"> 
      </td>
    </tr>
	
	 </table>
	   </div>
	   <div class="form-group">
      <label class="control-label col-sm-3" >FOSAS NASALES:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="fosas_nasalese"   ><?=$rowp->fosas_nasales?></textarea>
      </div>
    </div>
  
       <div class="form-group">
      <label class="control-label col-sm-3" >CUERDAS BOCALES:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="cuerdad_bocalese"   ><?=$rowp->cuerdad_bocales?></textarea>
      </div>
    </div>
   
         <div class="form-group">
      <label class="control-label col-sm-3" >TRAQUEA:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="traqua_texte"   ><?=$rowp->traqua_text?></textarea>
      </div>
    </div>
	
	  <div class="form-group">
      <label class="control-label col-sm-3" >CARINA:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="carina_texte"   ><?=$rowp->carina_text?></textarea>
      </div>
    </div>
	
	
	 <div class="form-group">
      <label class="control-label col-sm-3" >BRONQUIO PRINCIPAL DERECHO: </label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="bronquio_principale" ><?=$rowp->bronquio_principal?></textarea>
      </div>
    </div>
	
	 <div class="form-group">
      <label class="control-label col-sm-3" >LSD, LM, LID:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="lsd_lme"   ><?=$rowp->lsd_lm?></textarea>
      </div>
    </div>
	
		 <div class="form-group">
      <label class="control-label col-sm-3" >BRONQUIO PRINCIPAL IZQUIERDO:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="bronquio_prince_ize"   ><?=$rowp->bronquio_prince_iz?></textarea>
      </div>
    </div>
		 <div class="form-group">
      <label class="control-label col-sm-3" >LSI, LII:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="lsi_liie"   ><?=$rowp->lsi_lii?></textarea>
      </div>
    </div>
	  <div class="col-md-3">
	  </div>
    <div class="col-md-9">
      <label class="checkbox-inline">
	   <?php
if ($rowp->cepillado_bronquial ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
	  
  <input type="checkbox" name="cepillado_bronquiale" <?=$selected?> > CEPILLADO BRONQUIAL
</label>
<label class="checkbox-inline">

 <?php
if ($rowp->lavado_bronco ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" name="lavado_broncoe" <?=$selected?>> LAVADO BRONCOALVEOLAR
</label>
<label class="checkbox-inline">
 <?php
if ($rowp->broncoas ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" name="broncoase" <?=$selected?>> BRONCOASPIRADO
</label><br>
      <label class="checkbox-inline">
	   <?php
if ($rowp->biopsia_bronq ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" name="biopsia_bronqe" <?=$selected?>> BIOPSIA BRONQUIAL
</label>
  <label class="checkbox-inline">
 <?php
if ($rowp->biopsia_tras ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" name="biopsia_trase" <?=$selected?>> BIOPSIA TRASBRONQUIAL
</label>
   <label class="checkbox-inline">
 <?php
if ($rowp->puncion_tras ==0){
	$selected="";
	}
	else
	{
	$selected="checked";
	}
 ?>
  <input type="checkbox" name="puncion_trase" <?=$selected?>> PUNCION TRASBRONQUIAL
</label>
      <br/><br/>
    </div>
	
    	 <div class="form-group">
      <label class="control-label col-sm-3">COMPLICACIONES:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="complic_texte"   ><?=$rowp->complic_text?></textarea>
      </div>
    </div>
	
	  	 <div class="form-group">
      <label class="control-label col-sm-3" >DIAGNOSTICO POST-FBC:</label>
      <div class="col-sm-5">          
      <textarea  class="form-control" id="diag_post_fbce"   ><?=$rowp->diag_post_fbc?></textarea>
      </div>
    </div>
	
	
    <div class="form-group">
<input type="hidden" id="id_cirugia_toracia" value="<?=$rowp->id?>"/>	
      <div class="col-sm-offset-3 col-sm-9">
	<button type="button" id="save-cirugia-toraciae" class="btn btn-md btn-success"><i class="fa fa-check after-action" style="display:none;color:blue;font-size:35px;position:absolute"></i> CAMBIAR</button>
		 <a  class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/$rowp->id/$id_patient/$rowp->user/$centro_medico/g")?>"  ><i class="fa fa-print"></i> Imprimir</a>
      </div>
    </div>

  </form>
<?php
}

?>

<script>
$(".horario-cirugia").select2({

});

$(".load-cirugia").not('.registro-li').hide();

$('#save-cirugia-toraciae').on('click', function(event) {
	event.preventDefault();
var id_cirugia_toracia =$("#id_cirugia_toracia").val();	
	
var hora_inicio =$("#hora_inicioe").val();
var hora_final=$("#hora_finale").val();
var diag_pre_fbc=$("#diag_pre_fbce").val();
var svta=$("#svtae").val();
var mmhg=$("#mmhge").val();
var minfr=$("#minfre").val();
var resmin=$("#resmine").val();

var fosas_nasales=$("#fosas_nasalese").val();
var cuerdad_bocales=$("#cuerdad_bocalese").val();
var traqua_text=$("#traqua_texte").val();
var carina_text=$("#carina_texte").val();
var bronquio_principal=$("#bronquio_principale").val();
var  lsd_lm =$("#lsd_lme").val();
var  bronquio_prince_iz=$("#bronquio_prince_ize").val();
var  lsi_lii=$("#lsi_liie").val();

var cepillado_bronquial = [];
 $("input[name='cepillado_bronquiale']:checked").each(function(){
  cepillado_bronquial.push(this.value);
 });

var lavado_bronco = [];
 $("input[name='lavado_broncoe']:checked").each(function(){
  lavado_bronco.push(this.value);
 });

var broncoas = [];
 $("input[name='broncoase']:checked").each(function(){
  broncoas.push(this.value);
 });

var biopsia_bronq = [];
 $("input[name='biopsia_bronqe']:checked").each(function(){
  biopsia_bronq.push(this.value);
 });


var biopsia_tras = [];
 $("input[name='biopsia_trase']:checked").each(function(){
  biopsia_tras.push(this.value);
 });


var puncion_tras = [];
 $("input[name='puncion_trase']:checked").each(function(){
  puncion_tras.push(this.value);
 });

var  complic_text=$("#complic_texte").val();
var  diag_post_fbc=$("#diag_post_fbce").val();


var  tacir=$("#tacire").val();
var  fccir=$("#fccire").val();
var  frcir=$("#frcire").val();
 var sato2=$("#sato2e").val();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/cirugiaToracia",
data: {hora_inicio:hora_inicio,hora_final:hora_final,svta:svta,mmhg:mmhg, minfr: minfr,resmin:resmin,diag_pre_fbc:diag_pre_fbc,tacir:tacir,fccir:fccir,
fosas_nasales:fosas_nasales.trim(), cuerdad_bocales:cuerdad_bocales.trim(),traqua_text:traqua_text.trim(),id_cirugia_toracia:id_cirugia_toracia,frcir:frcir,
carina_text:carina_text.trim(),bronquio_principal:bronquio_principal.trim(),lsd_lm:lsd_lm.trim(),bronquio_prince_iz:bronquio_prince_iz.trim(),lsi_lii:lsi_lii.trim(),
cepillado_bronquial:cepillado_bronquial,lavado_bronco:lavado_bronco,diag_post_fbc:diag_post_fbc.trim(),sato2:sato2,
broncoas:broncoas,biopsia_bronq:biopsia_bronq,biopsia_tras:biopsia_tras,puncion_tras:puncion_tras,complic_text:complic_text.trim(),
 },
method:"POST",
success:function(data){
  $('.after-action').fadeIn('slow', function(){
    $('.after-action').delay(3000).fadeOut(); 
    });
}
});
	
});





</script>

