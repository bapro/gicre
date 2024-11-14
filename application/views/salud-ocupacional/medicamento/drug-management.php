
 <div class="form-group">
<label class="control-label" >Select a drug to update</label>

 <div class="listDrugs"></div>
</div>
<legend id="drug-title">Create a new drug</legend>
<form  id="crudMedForm" class="form-horizontal" method="post"  > 
<input name="id_user" type="hidden" value="<?=$id_user?>" />
<input name="id_centro" type="hidden" value="<?=$id_cm?>" />
<input id="drug_id" name="drug_id" type="hidden" value="0" />
<div class="form-group">
<label class="control-label col-sm-3"> <font style='color:red'>*</font> Drug Name</label>
<div class="col-sm-6">
<input type="text" class="form-control"    name="med_drug"  id="med_drug"   >

</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"><font style='color:red'>*</font> Presentation</label>
<div class="col-sm-6">
<input type="text" class="form-control"   name="med_present"  id="med_present"  >

</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3" ><font style='color:red'>*</font> Amount</label>
<div class="col-sm-3">
<input type="number" class="form-control"   name="med_amount"  id="med_amount"  >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3"><font style='color:red'>*</font> Expired</label>
<div class="col-sm-3">

<div class="input-group dateFmt" >
<input type="text" class="form-control"   name="med_expired"  id="med_expired"  >
<span class="input-group-addon">
<span class="glyphicon glyphicon-calendar"></span>
</span>
</div>
</div>

</div>
<br/>
<button type="submit"  class="btn btn-success btn-xs" ><i class="fa fa-save" aria-hidden="true"></i> Save</button>
<button type="button" id="clear-drug-form"  class="btn btn-default btn-xs" > Reset</button>

 <div id="new_drug_add"></div>
</form>
 <div id="info_drug"></div>
