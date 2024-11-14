
 <style>
  .reduce-height {
   height: 28px;
 }
</style>
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>

<span id="refresh-conprena">
<div class="col-md-12 move_left"  >
<h4 class=" h4 his_med_title"  >Control Visitas Prenatales (<b><?=$count_cont_prenal?> regitros (s)</b>)</h4>
<br/>

</div>
<?php if ($count_cont_prenal > 0)
{

$i = 1;
 foreach($ControPrenal as $row)
{

$user_c40=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c41=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<div class="pagination">
<a title="Creado por :<?=$user_c40?> , fecha : <?=$inserted_time?>> &#013  Cambiado por : <?=$user_c41?> , fecha : <?=$updated_time?>" data-toggle="modal" data-target="#ver_con_pren" href="<?php echo base_url("admin_medico/showSelectContP/$row->id_c1/$user_id")?>">
<?php echo $i; $i++;  ?>
</a></div>
<?php
}
?>

<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>

<div class="col-md-12 table-responsive" style="">

<br/>

 <table id="flashcontprn" class="table table-bordered table-fixed" style="background:#E6E6FA;border-top: 1px groove #38a7bb;">
 <thead>
<tr>
<th><font style="color:red"><strong>*</strong></font> Fecha de la consulta</label></th>
<th><font style="color:red"><strong>*</strong></font> Semana de amenorrea</th>
<th><font style="color:red"><strong>*</strong></font> Peso (lb)</th>
<th><font style="color:red"><strong>*</strong></font> Tension Arterial Max.Min. (mm Hg)</th>
<th><font style="color:red"><strong>*</strong></font> Alt. Ulterina/Present Pubis.FondoCef/Pelv.Tr</th>
<th><font style="color:red"><strong>*</strong></font> F.C.F.(lat./min./Mov.Fetal)</th>
<th><font style="color:red"><strong>*</strong></font> Fedema / Varices</th>
<th>Otros</th>
<th>Evolucion</th>
</tr>
</thead>
<tbody>
<tr>
<td><input type="text"  size="10" id="fecha" class="control-prenatal-fecha" data-mask="00/00/0000"/></td>
<td><input type="text"  size="10" id="semana" /></td>
<td><input type="text"  size="10" id="pesocp" /></td>
<td><div class="input-group sepa" ><input id="tension1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="alt1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt11" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt111" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otroscp" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha2cp" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana2" /></td>
<td><input type="text"  size="10" id="peso2" /></td>
<td><div class="input-group" ><input id="tension2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt22" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt222" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros2cp" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion2" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha3cp" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana3" /></td>
<td><input type="text"  size="10" id="peso3" /></td>
<td><div class="input-group" ><input id="tension3" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension33" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt3" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt33" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt333" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal3" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal33" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema3" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema33" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros3" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion3" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha4cp" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana4" /></td>
<td><input type="text"  size="10" id="peso4" /></td>
<td><div class="input-group" ><input id="tension4" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension44" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt4" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt44" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt444" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal4" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal44" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema4" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema44" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros4" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion4" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha5" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana5" /></td>
<td><input type="text"  size="10" id="peso5" /></td>
<td><div class="input-group" ><input id="tension5" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension55" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt5" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt55" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt555" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal5" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal55" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema5" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema55" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros5" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion5" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>
<tr>
<td><input type="text"  size="10" id="fecha6" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana6" /></td>
<td><input type="text"  size="10" id="peso6" /></td>
<td><div class="input-group" ><input id="tension6" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension66" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt6" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt66" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt666" type="text" class="form-control reduce-height" style="50px" /></div></td>
<td><div class="input-group" ><input id="fetal6" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal66" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema6" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema66" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros6" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion6" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>
<tr>
<td><input type="text"  size="10" id="fecha7" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana7" /></td>
<td><input type="text"  size="10" id="peso7" /></td>
<td><div class="input-group" ><input id="tension7" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension77" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt7" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt77" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt777" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal7" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal77" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema7" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema77" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros7" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion7" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>
<tr>
<td><input type="text"  size="10" id="fecha8" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana8" /></td>
<td><input type="text"  size="10" id="peso8" /></td>
<td><div class="input-group" ><input id="tension8" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension88" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt8" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt88" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt888" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal8" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal88" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema8" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema88" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros8" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion8" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>
<tr>
<td><input type="text"  size="10" id="fecha9" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana9" /></td>
<td><input type="text"  size="10" id="peso9" /></td>
<td><div class="input-group" ><input id="tension9" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension99" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt9" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt99" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt999" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal9" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal99" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema9" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema99" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros9" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion9" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>
</tbody>
 <tfoot>
<tr>
<th>Fecha de la consulta</th>
<th>Semana de amenorrea</th>
<th>Peso (lb)</th>
<th>Tension Arterial Max.Min. (mm Hg)</th>
<th>Alt. Ulterina/Present Pubis.FondoCef/Pelv.Tr</th>
<th>F.C.F.(lat./min./Mov.Fetal)</th>
<th>Edema / Varices</th>
<th>Otros</th>
<th>Evolucion</th>
</tr>
</tfoot>
 </table>
</div>
</span>
<div class="modal fade" id="ver_con_pren"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" style="  width:90%;
    margin: 10px auto;">
<div class="modal-content" >

</div>
</div>
</div>
<div id="edit_con1" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>




<div id="edit_con2" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con3" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con4" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con5" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con6" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con7" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con8" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>

<div id="edit_con9" class="modal modal-child" data-backdrop-limit="1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-modal-parent="#ver_con_pren"> 

<div class="modal-dialog modal-lg" style="  width: 1400px;
    margin: 30px auto;">
<div class="modal-content" >

</div>
</div>
</div>
