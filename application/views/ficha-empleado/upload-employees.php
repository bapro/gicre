
<style>

.pter {pointer-events:none;}
td,th{text-align:left;}

.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}



</style>

  <div class="container">

 <div class="row">

  <h1 align="center" class="h1">EMPLEADO</h1> 

 </div>

 <div class="col-md-12 searchb ">

<div class="col-md-4">
<label class="control-label" >Centros Medicos</label>
<select class="form-control select2" id="centro"  >
<option value=""></option>
<?php 

foreach($all_medical_centers as $row)
{ 
?>
<option value="<?=$row->id_m_c?>" ><?=$row->name?></option>
<?php
}
?>
</select>
<br/><br/>
</div>

<br/><br/>
</div>

</div>


<br/>
