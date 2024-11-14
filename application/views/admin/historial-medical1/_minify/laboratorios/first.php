
<ul>

<h4 class="h4 his_med_title">Indicaciones laboratorios</h4>
 <hr class="hr_ad"/>

<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<div class="form-group">
<div id="allLaboratoriosInd"></div>


</div>


<div class="col-md-9 table-responsive" >
 <hr class="hr_ad"/>
<div class="btn-group">
<button type="submit" id="saveIndicacioneLab" class="btn btn-primary btn-xs" disabled>
<i class="fa fa-floppy-o" aria-hidden="true"></i>
indicar
</button>

<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
<span class="sr-only">Toggle Dropdown</span>
</button>
<ul  class="dropdown-menu da hide-expo"  role="menu" style="display:none">
<li><a target="_blank" href="<?php echo base_url('admin/print_laboratorios/'.$historial_id)?>"> Exportar indicaciones</a></li>


</ul>

</div>


<br/><br/>
<p class="h4 his_med_title">Indicaciones previas</p>
<p id="successE" class='alert alert-success' style="text-aling:center;display:none"><i class="fa fa-check" aria-hidden="true"></i> Indicacion agregada</p>
<div id="new_indication_lab"></div>
<div id="allLaboratoriosEmpty">

</div>

</ul>
</div>
