 <div class="container" >

 <h3>Elegir Rango De Fecha</h3>
 <form class="form-inline" method="POST"  action="<?php echo site_url("zona_franca/doctor_productivity");?>" >
 <input value="<?=$id_cm?>" name="id_centro" type="hidden" />
<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 

<div class="col-md-3">
<label for="desde" >From</label> 
<select class="form-control id_med" name="from"  >
<?php 

foreach($query1->result() as $row)
{ 
$date2=date("Y-m-d", strtotime($row->inserted_time));
?>
<option value="<?=$date2?>" ><?=$date2?></option>
<?php
}
?>

</select>
<br/><br/>
</div>
<div class="col-md-3">
<label for="hasta" >To</label> 
<select class="form-control id_med" name="to"  >
<?php 

foreach($query1->result() as $row)
{ 
$date1=date("Y-m-d", strtotime($row->inserted_time));
?>
<option value="<?=$date1?>" ><?=$date1?></option>
<?php
}
?>

</select>


</div>
<div class="col-md-3">
<br/>
<button type="submit" id="click_button" class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></button>
</div>

</form>
</div>

   </div>



<script>


 
 $('.id_med').select2({ 
  placeholder: "SELECCIONAR",
    tags: true
 
});




</script>