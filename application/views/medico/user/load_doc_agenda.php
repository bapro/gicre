<div class="col-sm-12">
<?php
foreach($diaries as $row)
{
 $day=$this->db->select('day')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->where('day',$row->id)->get('doctor_agenda_test')->row('day');	
?>
<label class="radio-inline"> 
<?php
if($day ==$row->id){
$selected="checked";
	}
	else
	{
	$selected="";
	}
?>
<input type="checkbox"  name='day' value="<?=$row->id ?>" <?=$selected?> > <?=$row->title ?>
</label>
<?php } ?>
<hr id="hr_ad"/>

</div>

<div class="col-md-12" style="background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;" >
 <br/>
 <?php
  $genda=$this->db->select('fecha_inicio,fecha_final,hour_from,hour_to,cita')->where('id_doctor',$iddoc)->where('id_centro',$idcentro)->get('doctor_agenda_test')->row_array();	

   $fecha_inicio = date("d-m-Y", strtotime($genda['fecha_inicio']));
$fecha_final = date("d-m-Y", strtotime($genda['fecha_final']));
  

 ?>
 <div class="form-group sumges">
 <div class="col-lg-4">
<div class="form-inline">
<div class="form-group">
<label  class="col-sm-4"> Fecha Inicio </label>
<div class="col-sm-8" >
<?=$fecha1?>
</div>

</div>


<div class="form-group">
<label  class="col-sm-4"> Fecha Final </label>
<div class="col-sm-8" >
<?=$fecha2?>
</div>

</div>
    </div>
    </div>

 <div class="col-lg-4">
<div class="form-group">
<label  class="control-label col-sm-3" >Desde</label>
<div class="col-sm-4" >
<select class="form-control select2Agenda hourDesde" name="hourDesde" id="hourDesde">
<?php
echo $genda['hour_from']
?>
</select> 
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3" >Hasta</label>
<div class="col-sm-4" >
<select class="form-control select2Agenda" name="hourHasta" id="hourHasta">
<?php
echo $genda['hour_to']
?>
</select> 
</div>
</div>
  </div>
 <div class="col-lg-2">
 <div class="input-group">
<?=$genda['cita']?> citas

</div>
 </div>


 </div>

 </div>

