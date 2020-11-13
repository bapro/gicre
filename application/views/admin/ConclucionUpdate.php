<style>
#flashcon{

position: fixed; /* or absolute */
top: 50%;
left: 40%;
z-index:900000

}
</style>	
<?php

$name=($this->session->userdata['admin_name']);
?>

  <div id="show_allc"></div>
<div id="hide_allc">

<form   class="form-horizontal"  method="post"  > 
<input type="hidden" id="inserted_by" value="<?=$name?>"> 
<input type="hidden" id="historial_id" value="<?=$historial_id?>">
<input type="hidden" class="update" value="">
<h4 class="h4 his_med_title">Cambiar Conclucion Diagnostica</h4>
<br/>
 <div class="col-xs-12 move_left" >
<div class="col-xs-3"  >

<div class="input-group" >
<span class="input-group-addon"><span  ><b><?=$count_conc?></b> </span>regitros (s)</span> 
<div class="success-send-con">
<select class="form-control" id="id_con" >
<option value="" hidden>navegador</option>
<?php 

 foreach($concluciones as $row)
{
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y - %I:%M%p", strtotime($row->inserted_time)));	
  	
?>
<option  title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$inserted_time; ?>" value='<?=$row->id_cdia;?>'>Registro # <?=$row->id_cdia;?></option>

<?php
}
?>

</select>
</div>
</div>

</div>

<div class="col-xs-5" style="display:none" id="resetcon">
<div class="btn-group">
<button class="btn btn-primary btn-xs" type="button" id="show_af_c_d"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>

<button type="button" title="Imprimir" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/'.$historial_id)?>"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</div>
<br/><br/>

<hr style="border-top: 2px groove #38a7bb;"/>
 <div id="show_form_after_selectcon"></div>
<div id="hide_form_after_selectcon" >
<div id="flashcon" ></div>
<div  class="col-md-12">
<?php foreach($show_con_by_id as $row)
{
?>
<div class="form-group">
<label class="control-label col-md-2" >Plan</label>
<div class="col-md-8">
<textarea class="form-control" id="plan"  ><?=$row->plan?></textarea>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Diagnostico(s) Presuntivo o Definitivo (CIE10): </label>
<div class="col-md-8">
<select  class="form-control chosen-diag" data-placeholder="Comienza a escribir." multiple name="diagno_def[]" id="diagno_def" required>
<?php 
$sql ="SELECT * FROM cie_desc";
$query = $this->db->query($sql);

foreach($query->result() as $c10)
{

$con_id_link=$this->db->select('con_id_link')->where('con_id_link',$row->id_cdia)
 ->where('diagno_def',$c10->idd)
 ->get('diagno_def_link')->row('con_id_link');
 
		if($row->id_cdia==$con_id_link){
		        $selected="selected";
		} else {
		       $selected="";
	    }
echo "<option value='$c10->idd.' $selected>$c10->code $c10->description</option>";
}
 ?>

</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2" >Procedimiento (CIE-9):  </label>
<div class="col-md-8">
<select  class="form-control chosen-prop3"  multiple name="procedimiento[]" id="procedimiento" >
<?php 
foreach($diag_pro as $rowp)
{ 

$con_id_link=$this->db->select('con_id_link')->where('con_id_link',$row->id_cdia)
 ->where('procedimiento',$rowp->id)
 ->get('diagno_def_proc')->row('con_id_link');
 
		if($row->id_cdia==$con_id_link){
		        $selected="selected";
		} else {
		       $selected="";
	    }
		
echo "<option value='$rowp->name.' $selected>$rowp->name</option>";
}
 ?>
</select>
</div>

</div>
<div class="form-group">
<label class="control-label col-md-2">Evolucion (Paciente subsecuente):   </label>
<div class="col-md-7">
<textarea class="form-control" id="evolucion"  ><?=$row->evolucion?></textarea>
</div>
<div class="col-md-3">
<?php
if($row->conclusion_radio =="Mejoria"){
		        $selected="checked";
		} 
		else 
		{
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio' name='conclusion_radio' value='Mejoria' $selected /> <label>Mejoria</label>";
?>

</div>
<div class="col-md-3">
<?php
if($row->conclusion_radio =="Empeorando"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio' name='conclusion_radio' value='Empeorando' $selected /> <label>Empeorando</label>";
?>

</div>
<div class="col-md-3">

<?php
if($row->conclusion_radio =="No mejoria"){
		        $selected="checked";
		} else {
		       $selected="";
	    }
	echo "<input type='radio' id='conclusion_radio' name='conclusion_radio' value='No mejoria' $selected /> <label>No mejoria</label>";
?>
</div>
</div>
<?php
}
?>
</div>
</div>
</form>
 </div>
 </div>

