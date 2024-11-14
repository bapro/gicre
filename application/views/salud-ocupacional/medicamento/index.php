<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h2 class="modal-title"  >DRUG AREA</h2>
</div>
<div class="modal-body" >
 <div class="container">
  <div class="col-md-12">
  <ul class="nav nav-tabs">
    <li class="active"><a  data-toggle="tab" href="#indciate-drug">DRUG INDICATION</a></li>
    <li><a  data-toggle="tab" href="#create-drug"> DRUG MANAGEMENT</a></li>
  </ul>
 <div class="tab-content"> 
    <div id="indciate-drug" class="tab-pane fade in active">
 <div class="col-md-6" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;">
 <br/>
<form  id="passLeftMedicaments" class="form-horizontal" method="post"  > 
<input name="id_patient" type="hidden" value="<?=$val?>" />
<input name="id_user" type="hidden" value="<?=$id_user?>" />
<input name="id_centro" type="hidden" value="<?=$id_cm?>" />
<div class="form-group">
<label class="control-label col-sm-3"> <font style='color:red'>*</font> Symptom</label>
<div class="col-sm-9">
<input type="text" class="form-control"    name="sintoma"  id="sintoma"   >

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"><font style='color:red'>*</font> Cause</label>
<div class="col-sm-9">
<input type="text" class="form-control"   name="causa_med"  id="causa_med"  >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" ><font style='color:red'>*</font> Drug</label>
<div class="col-sm-9">

<div class="listDrugs"></div>
<input id="is_expired"  name="is_expired" type="hidden" />
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3"><font style='color:red'>*</font> Dose</label>
<div class="col-sm-9">
<div class="input-group">
       <input type="number" class="form-control clr-drg"   name="dosis_med"  id="dosis_med"  >
    <span class="input-group-addon">amount in store</span>
	<input type="number" class="form-control"   name="amt_available"  id="amt_available" readonly >
</div>


</div>
</div>
<br/>
<button type="submit" id="pass-right-med" class="btn btn-success btn-xs" style="float:right"><i class="fa fa-arrow-right" aria-hidden="true"></i> agregar</button>
</form>
<div id="insertionResultMed"></div>
<br/><br/>
  </div>
  <div class="col-md-6" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;border-left:none">
  
  <div id="passLeftMedData"></div>

<div class="form-group">
<label class="control-label"> Nota</label>
<textarea  class="form-control" id="nota-med" rows='7'></textarea>

</div>

<button type="button" id="saveListMed" class="btn btn-success btn-xs" style="float:right"><i class="fa fa-arrow-down" aria-hidden="true"></i> guardar</button>
<input id="isPass" type="hidden" value="0" />
<br/><br/>
</div>




 <div class="col-md-12" style="border:1px solid #38a7bb;border-top:none;">
<br/>
<div style="overflow-x:auto;">
  <div id="listadoPatMedSaved"></div>
  </div>
  <div id="listadoPatMedSavedRegistros"></div>
  <hr/>
    <div id="contentPatMedSavedRegistros"></div>
</div>

</div>
<div id="create-drug" class="tab-pane fade in">

<div class="col-md-12">
<?php $this->load->view('salud-ocupacional/medicamento/drug-management');?>
</div>

</div>
</div>

</div>




 </div>
 </div>
