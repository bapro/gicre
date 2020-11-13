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
   <?php foreach($vacuna as $row2)?>
  <tr><th></th><th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=$row2->insert_d?></span></th>
  <th class="col-xs-2">
 <input  id="insert_d"  type="hidden" value="<?=$row2->insert_d?>"  > 
</th>

<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th><input type="hidden" value="<?=$row2->date_nacer_format?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th >1era. Dosis</th>
<th>2da. Dosis</th>
<th >3era. Dosis</th>
<th >1er.Refuerzo</th>
<th >2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG</th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date no_ap_sh1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh1" style="display:none;background:red">
<input type="text"  class="form-control bcgno" id="bcg11" value="<?=$row2->bcg1?>" readonly >
<span id="frem1" class="input-group-addon" ><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 

<input type="text" class="form-control bcg"  value="<?=$row2->bcg1?>" style="pointer-events: none;">

<input type="hidden"  id="mirror_bcg1" value="<?=$row2->date_nacer_format?>"  />
<span style="color:red" class="atras1"><i>Dias de atraso : <input type="text" class="resf1" id="resf11" value="<?=$row2->resf1?>" style="pointer-events:none;border:none;width:30px;"></i></span>

</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2 no_ap_sh2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="hepb1" value="<?=$row2->hepb1?>" readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$row2->hepb1?>" style="pointer-events: none;">
<input type="hidden" value="<?=$row2->date_nacer_format?>" id="mirror_bcg2"  />
<span style="color:red;" class="atras2"><i>Dias de atraso : <input type="text" class="resf2" id="resf21" value="<?=$row2->resf2?>" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3 no_ap_sh3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap331" value="<?=$row2->yel3?>" readonly  >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel3?>" style="pointer-events: none;">
<input  id="mirror_d3"  type="hidden"  > 
<span style="color:red" class="atras3"><i>Dias de atraso : <input type="text" id="resf31" value="<?=$row2->resf3?>" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4 no_ap4 no_ap_sh4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  id="no_ap41" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl41" value="<?=$row2->bl4?>" readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl4?>" style="pointer-events: none;">
<input  id="mirror_d4"  type="hidden"  > 
<span style="color:red" class="atras4">
<i>Dias de atraso : <input type="text" id="resf41" value="<?=$row2->resf4?>" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap51" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel51" value="<?=$row2->yel5?>"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel5?>">
<input  id="mirror_d5"  type="hidden"  > 
<span style="color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf51" style="background:none;pointer-events:none;border:none;width:50px" value="<?=$row2->resf5?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6 no_ap6 no_ap_sh6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap61" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl61" value="<?=$row2->bl6?>"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl6?>">
<input  id="mirror_d6"  type="hidden"  > 
<span style="color:red" class="atras6"><i>Dias de atraso : <input type="text" id="resf61" style="pointer-events:none;border:none;width:30px" value="<?=$row2->resf6?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap71" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr71" value="<?=$row2->gr7?>"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr7?>">
<input  id="mirror_d7"  type="hidden"  > 
<span style="color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf71" style="pointer-events:none;border:none;width:70px;background:none" value="<?=$row2->resf7?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap81" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll81" value="<?=$row2->bll8?>" readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll8?>">
<input  id="mirror_d8"  type="hidden"  > 
<span style="color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf81" style="pointer-events:none;border:none;width:80px" value="<?=$row2->resf8?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap91" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr91" value="<?=$row2->grr9?>"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr9?>">
<input  id="mirror_d9"  type="hidden"  > 
<span style="color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf91" style="pointer-events:none;border:none;width:90px;background:none" value="<?=$row2->resf9?>"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap101" style="display:none;">
<input type="text"  class="form-control bcgno"   id="yel101" value="<?=$row2->yel10?>" readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel10?>">
<input  id="mirror_d10"  type="hidden"  > 
<span style="color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf101" style="pointer-events:none;border:none;width:100px" value="<?=$row2->resf10?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11 no_ap111 no_ap_sh11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl111" value="<?=$row2->bl11?>" readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl11?>">
<input  id="mirror_d11"  type="hidden"  > 
<span style="color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf111" style="pointer-events:none;border:none;width:110px" value="<?=$row2->resf11?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap122 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1221" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr121" value="<?=$row2->gr12?>" readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$row2->gr12?>">
<input  id="mirror_d12"  type="hidden"  > 
<span style="color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf121" style="pointer-events:none;border:none;width:120px" value="<?=$row2->resf12?>"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap133 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1331" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel131" value="<?=$row2->yel13?>"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$row2->yel13?>">
<input  id="mirror_d13"  type="hidden"  > 
<span style="color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf131" style="pointer-events:none;border:none;width:130px;background:none" value="<?=$row2->resf13?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap144 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1441" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl141" value="<?=$row2->bl14?>"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$row2->bl14?>">
<input  id="mirror_d14"  type="hidden"  > 
<span style="color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf141" style="pointer-events:none;border:none;width:140px" value="<?=$row2->resf14?>"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap155 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1551" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll151" value="<?=$row2->bll15?>" readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" value="<?=$row2->bll15?>">
<input  id="mirror_d15"  type="hidden"  > 
<span style="color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf151" style="pointer-events:none;border:none;width:150px" value="<?=$row2->resf15?>"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap166 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1661" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bcg161" value="<?=$row2->srp16?>" readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$row2->srp16?>">
<input  id="mirror_d16"  type="hidden"  > 
<span style="color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf161" style="pointer-events:none;border:none;width:160px" value="<?=$row2->resf16?>"></i></span>
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
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap177 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll171" value="<?=$row2->bll17?>"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$row2->bll17?>">
<input  id="mirror_d17"  type="hidden"  > 
<span style="color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf171" style="pointer-events:none;border:none;width:170px" value="<?=$row2->resf17?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap188 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1881" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr181" value="<?=$row2->grr18?>"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$row2->grr18?>">
<input  id="mirror_d18"  type="hidden"  > 
<span style="color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf181" style="pointer-events:none;border:none;width:180px" value="<?=$row2->resf18?>"></i></span>
</td>
</tr>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>