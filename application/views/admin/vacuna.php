<script>
//$(document).ready(function(){
 //     $.getScript("<?=base_url();?>assets/js/pediatrico_footer.js");
   
//});
window.onload = function() {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = '<?=base_url();?>assets/js/pediatrico_footer.js';
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);
}
</script>
<hr class="title-highline-top"/>
<table class="table table-striped table-bordered" style="background:#E6E6FA;">
<?php foreach($date_nacer as $dn)?>
  
  <tr>
<th></th>
<th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$dn->date_nacer?></span></th>
<th class="col-xs-2">
<input  id="insert_d"  type="hidden" value="<?=$dn->date_nacer?>"  > 
</th>
<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th>
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th>1era. Dosis</th>
<th>2da. Dosis</th>
<th>3era. Dosis</th>
<th> 1er.Refuerzo</th>
<th>2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG</th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1" style="display:none;background:red">
<input type="text"  class="form-control bcgno"  id="no_ap11"  readonly >
<span id="frem1"  class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"  style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg1">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg1"  />
<span style="display:none;color:red" id="atras1"><i>Dias de atraso : <input type="text" id="resf1" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap22"  readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg2">
<input type="hidden" value="<?=$dn->date_nacer_format?>" id="mirror_bcg2"  />
<span style="display:none;color:red;" id="atras2"><i>Dias de atraso : <input type="text" id="resf2" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap33"  readonly >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel3">
<input  id="mirror_d3"  type="hidden"  > 
<span style="display:none;color:red" id="atras3"><i>Dias de atraso : <input type="text" id="resf3" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap4" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap44"  readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl4">
<input  id="mirror_d4"  type="hidden"  > 
<span style="display:none;color:red" id="atras4">
<i>Dias de atraso : <input type="text" id="resf4" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap5" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap55"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel5">
<input  id="mirror_d5"  type="hidden"  > 
<span style="display:none;color:red" id="atras5"><i>Dias de atraso : <input type="text" id="resf5" style="pointer-events:none;border:none;width:50px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap6" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap66"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl6">
<input  id="mirror_d6"  type="hidden"  > 
<span style="display:none;color:red" id="atras6"><i>Dias de atraso : <input type="text" id="resf6" style="pointer-events:none;border:none;width:30px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap7" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap77"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr7">
<input  id="mirror_d7"  type="hidden"  > 
<span style="display:none;color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf7" style="pointer-events:none;border:none;width:70px;background:none"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap8" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap88"  readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll8">
<input  id="mirror_d8"  type="hidden"  > 
<span style="display:none;color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf8" style="pointer-events:none;border:none;width:80px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap9" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap99"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr9">
<input  id="mirror_d9"  type="hidden"  > 
<span style="display:none;color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf9" style="pointer-events:none;border:none;width:90px;background:none"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap10" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1010"  readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel10">
<input  id="mirror_d10"  type="hidden"  > 
<span style="display:none;color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf10" style="pointer-events:none;border:none;width:100px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="pavlemache()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1111"  readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl11">
<input  id="mirror_d11"  type="hidden"  > 
<span style="display:none;color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf11" style="pointer-events:none;border:none;width:110px"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap122" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1212"  readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr" id="gr12">
<input  id="mirror_d12"  type="hidden"  > 
<span style="display:none;color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf12" style="pointer-events:none;border:none;width:120px"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap133" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1313"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel" id="yel13">
<input  id="mirror_d13"  type="hidden"  > 
<span style="display:none;color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf13" style="pointer-events:none;border:none;width:130px;background:none"></i></span>
</td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap144" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1414"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl" id="bl14">
<input  id="mirror_d14"  type="hidden"  > 
<span style="display:none;color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf14" style="pointer-events:none;border:none;width:140px"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap155" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1515"  readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll15">
<input  id="mirror_d15"  type="hidden"  > 
<span style="display:none;color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf15" style="pointer-events:none;border:none;width:150px"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap166" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1616"  readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg" id="bcg16">
<input  id="mirror_d16"  type="hidden"  > 
<span style="display:none;color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf16" style="pointer-events:none;border:none;width:160px"></i></span>
</td>
<td> </td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>DTP</th>
<td></td>
 <td> </td>
 <td></td>
 <td></td>
<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1717"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll" id="bll17">
<input  id="mirror_d17"  type="hidden"  > 
<span style="display:none;color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf17" style="pointer-events:none;border:none;width:170px"></i></span>
</td>

<td>
<span class="no_ah"><input type="checkbox"  onclick="no_ap18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap188" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap1818"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr" id="grr18">
<input  id="mirror_d18"  type="hidden"  > 
<span style="display:none;color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf18" style="pointer-events:none;border:none;width:180px"></i></span>
</td>
</tr>
</table>
<script sync src="<?=base_url();?>assets/js/pediatrico_footer.js" charset="UTF-8"></script>



