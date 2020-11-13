
 <style>
  .reduce-height {
   height: 28px;
 }
</style>
<h4 class="alert alert-success" id="msgs-ssr" style="display:none" ></h4>
   <div  id="show_cont_pren"></div>
 <div  id="hide_cont_pren" style="background:#E6E6FA;z-index:90000000;margin-left:220px">

<div class="col-xs-12 move_left"  >
<h4 class=" h4 his_med_title"  >Control Visitas Prenatales</h4>
<br/>
<div class="col-xs-3"  >

<?php if ($count_cont_prenal > 0)
{
	
?>
<div class="input-group" >
<span class="success-send-cont-pre input-group-addon"><span  ><b><?=$count_cont_prenal?></b> </span>regitros (s)</span> 

<select class="form-control" id="showSelectContP" style="font-size:12px">
<option hidden>Navegador</option>
<?php 

 foreach($ControPrenal as $row)
{
	setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$inserted_time = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y - %I:%M%p", strtotime($row->inserted_time)));	
	
?>
<option  title="Medico : <?=$row->inserted_by; ?> - Fecha : <?=$row->inserted_time; ?>" value='<?=$row->id_c1;?>'>Registro # <?=$row->id_c1;?></option>

<?php
}
?>

</select>
</div>
</div>
<?php
}

?>
<div class="col-xs-5" style="display:none" id="resetcontprena">
<div class="btn-group">
<button class="btn btn-primary btn-xs" type="button" id="show_af_c_p"><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i> Nuevo</button>

<button type="button" title="Imprimir" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
<span class="caret"></span>
</button>
<ul  class="dropdown-menu da"  role="menu">
<li><a target="_blank" href="<?php echo base_url('admin/'.$historial_id)?>"><span class="glyphicon glyphicon-print"></span> Imprimir</a></li>
</ul>
</div>
</div>
</div>
<br/>
<br/>
<span ></span>
<br/>
<div class="col-md-12" style="">
<div id="show_cp_on_select"></div>
<br/>
<div id="hide_cp_on_select">

 <table id="flashcontprn" class="table table-bordered table-fixed" style="background:#E6E6FA;border-top: 2px groove #38a7bb;">
 <thead>
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
</thead>
<tbody>
<tr>
<td><input type="text"  size="10" id="fecha" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana" /></td>
<td><input type="text"  size="10" id="peso" /></td>
<td><div class="input-group sepa" ><input id="tension1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt11" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt111" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema1" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema11" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha2" class="control-prenatal-fecha" /></td>
<td><input type="text"  size="10" id="semana2" /></td>
<td><input type="text"  size="10" id="peso2" /></td>
<td><div class="input-group" ><input id="tension2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="tension22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" > <input id="alt2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="alt22" type="text" class="form-control reduce-height" style="width:50px" /><span  class="input-group-addon reduce-height" >-</span><input id="alt222" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="fetal2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="fetal22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><div class="input-group" ><input id="edema2" style="width:50px" class="form-control reduce-height" type="text"   /> <span class="input-group-addon reduce-height" >-</span> <input id="edema22" type="text" class="form-control reduce-height" style="width:50px" /></div></td>
<td><textarea id="otros2" style="width:150px" class="form-control" cols="20"></textarea></td>
<td><textarea id="evolucion2" style="width:150px" class="form-control" cols="20"></textarea></td>
</tr>


<tr>
<td><input type="text"  size="10" id="fecha3" class="control-prenatal-fecha" /></td>
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
<td><input type="text"  size="10" id="fecha4" class="control-prenatal-fecha" /></td>
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

</div>

</div>
<script>

//navegador
$("#showSelectContP").on('change', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
$.ajax({
url: '<?php echo site_url('admin/showSelectContP');?>',
type: 'post',
data:'showSelectContP='+$("#showSelectContP").val(),
success: function (data) {
	$("#save_cont_pren").hide();
	$("#loadf").hide();
	$("#show_cp_on_select").html(data);
	$("#show_cp_on_select").show();
	 $("#hide_cp_on_select").hide();
	 $("#resetcontprena").show();  
	 
}

});
});
	
//-----------
//hide show
$("#show_af_c_p").on('click', function (e) {
e.preventDefault();
$("#loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');

$.ajax({
url: '<?php echo site_url('admin/Controprenal');?>',
type: 'post',
data:{id_historial:id_historial},
success: function (data) {
	$("#save_cont_pren").slideDown();
	$("#loadf").hide();
	$("#resetcontprena").show();
	$("#controlprenatalshow").html(data);
	$("#controlprenatalshow").show();
}

});
});

</script>