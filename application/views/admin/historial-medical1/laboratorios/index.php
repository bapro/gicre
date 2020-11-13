
<ul>

<h4 class="h4 his_med_title">Indicaciones laboratorios</h4>
 <hr class="hr_ad"/>

<h4 class="h4" style="margin-left:60px;color:red"  id="errorBox"></h4>
<table class='table'>
<tr>
<td style='width:10%'>
<button class='btn btn-default btn-xs' type='button' id='reload-groupos'>Laboratorios agrupados</button>
</td>
<td>
<select  class="form-control select2"   id="list-group" >

</select>
</td>
<td></td>
</tr>
<tr>
<td><button class='btn btn-default btn-xs' type='button' id='reload-labs'>Listar Todos</button></td>
</tr>
</table>
<div class="form-group">
<div id="allLaboratoriosInd"></div>
<button class='btn btn-default btn-xs' type='button' id='enviar-email-labo' disabled >Enviar Laboratorios Al Paciente</button>	
<div id="currentPrint"></div>

</div>


<div class="col-md-12" >
<!--<a target="_blank" style="display:none" class="refresh-labb" id="print-first" href="<?php echo base_url("printings/print_laboratorios/$historial_id/$areaid/$user_id")?>"><i style="font-size:24px;float:left" class="fa">&#xf02f;</i></a>-->

 <hr class="hr_ad"/>

</div>


<br/><br/>

<div id="new_indication_lab"></div>
<div id="allLaboratorios">

</div>

</ul>
</div>
