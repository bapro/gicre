<div class="modal-header"id="background_"><button class="close"type="button"aria-hidden="true"data-dismiss="modal"title="Cierra"><i class="fa fa-times-circle"style="font-size:48px;color:red"></i></button><h3 class="h3 his_med_title">SCREENING</h3></div><div class="modal-body"id="background_"><div id="paginationNumberReportScreen"></div><div class="container"><hr class="prenatal-separator"><button class="btn btn-primary btn-xs"id="nuevo-screening">NUEVO REGISTRO</button><br><br><div id="contentScreen"></div><form class="form-horizontal"id="screeningSave"method="post"><div class="screeningInfo"style="background:#add8e6"></div><input name="action"type="hidden"value="0"><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="snoring"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="snoring"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">S</font>noring ?</b><br>Do you <b>Snore Loudly</b> (loud enough to be heard through closed doors or your bed-partner elbows you for snoring at night)?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="tired"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="tired"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">T</font>ired ?</b><br>Do you often feel <b>Tired, Fatigued, or Sleepy</b> during the daytime (such as falling asleep during driving or talking to someone)?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="observed"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="observed"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">O</font>bserved ?</b><br>Has anyone <b>Observed</b> you <b>Stop Breathing</b> or <b>Choking/Gasping</b> during your sleep ?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="pressure"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="pressure"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">P</font>ressure ?</b><br>Do you have or are being treated for <b>High Blood Pressure</b> ?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="body_mass"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="body_mass"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">B</font>ody Mass Index more than 35 kg/m<sup>2</sup>?</b><br><br><b>Body Mass Index Calculator</b><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-md-1"><br>Height:</div><div class="col-md-2">m <input name="height_unit"type="radio"value="m"id="hunit"checked> cm <input name="height_unit"type="radio"value="cm"id="hunit"> <input name="height"class="calculBIM"id="h"size="6"></div><div class="col-md-1"><br>Weight:</div><div class="col-md-2">kg <input name="weight_unit"type="radio"value="kg"id="wunit"checked> lbs <input name="weight_unit"type="radio"value="lbs"id="wunit"> <input name="weight"class="calculBIM"id="w"size="6"></div><div class="col-md-6"></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><br><div class="col-md-1">BMI:</div><div class="col-md-2"><input name="bmi"id="bmiResult"readonly></div><div class="col-md-9"></div></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="age_older"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="age_older"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">A</font>ge older than 50 ?</b></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="neck_size"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="neck_size"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">N</font>eck size large ? (Measured around Adams apple)</b><br>Is your shirt collar 16 inches / 40cm or larger?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><input name="gender"type="radio"value="1"class="trCheckScreen"></div><div class="col-xs-1">No<br><input name="gender"type="radio"value="0"class="trCheckScreen"></div><div class="col-md-10"><b><font size="6">G</font>ender = Male ?</b></div></div><div class="col-md-12"><div class="col-md-1"></div><div class="col-md-1"></div><div class="col-md-10"><br><br><input name="id_patient"type="hidden"value="<?=$id_historial?>"> <input name="id_user"type="hidden"value="<?=$user_id?>"> <button class="btn btn-md btn-success"id="save-screening"type="submit"><i class="fa after-screening fa-check"style="display:none;color:#00f;font-size:30px;position:absolute"></i> GUARDAR</button> <a class="btn btn-md btn-primary"href="<?php echo base_url("printings/print_if_foto_c/c_t_0/$id_historial/$user_id/$centro_medico/q") ?>"id="imprimir-screening"style="display:none"target="_blank"><i class="fa fa-print"></i> Imprimir</a><br></div></div></form></div></div><script>function calcscorescreen(e){var n,i=0;$(e).each(function(){i+=parseInt($(this).val(),10)}),0<=i&&i<=2&&(n="your score is "+i+" / 8 You are at "+'<span style="color:red">Low Risk</span>'+" for Obstructive Sleep Apnea (OSA)"),3<=i&&i<=4&&(n="your score is "+i+" / 8 You ara at "+'<span style="color:red">Intermediate Risk</span>'+" for Obstructive Sleep Apnea (OSA)"),5<=i&&i<=8&&(n="your score is "+i+" / 8 You have answered Yes to 2 or more of 4 STOP questions + BMI > 35kg/m2<br>Therefore, you are at "+'<span style="color:red">High Risk</span>'+" for Obstructive Sleep Apnea (OSA)"),$(".screeningInfo").show(),$(".screeningInfo").html(n).css("font-weight","bold")}function bim(e,n){var i,a,t=(i="kg"==e?$("#w").val():.453592*$("#w").val())/((a="m"==n?$("#h").val():.01*$("#h").val())*a);""!=a&&""!=i&&$("#bmiResult").val(t).number(!0,2)}function paginationNumberReportScreen(){$.ajax({url:"<?php echo base_url(); ?>historialHeader/paginationNumberReportScreen",data:{id_user:<?=$user_id?>,id_patient:<?=$id_historial?>,centro_medico:<?=$centro_medico?>},method:"POST",success:function(e){$("#paginationNumberReportScreen").html(e)}})}$().ready(function(){$(".trCheckScreen").change(function(){calcscorescreen(".trCheckScreen:checked")})}),$(".calculBIM").keyup(function(){bim($("input:radio[name=weight_unit]:checked").val(),$("input:radio[name=height_unit]:checked").val())}),$("input[type=radio][name=weight_unit]").on("change",function(){bim($("input:radio[name=weight_unit]:checked").val(),$("input:radio[name=height_unit]:checked").val())}),$("input[type=radio][name=height_unit]").on("change",function(){bim($("input:radio[name=weight_unit]:checked").val(),$("input:radio[name=height_unit]:checked").val())}),paginationNumberReportScreen(),$("#screeningSave").submit(function(e){e.preventDefault(),$("#save-screening").prop("disabled",!0),$("#save-screening").text("guardando..."),$.ajax({url:"<?php echo base_url(); ?>historialHeader/saveScreening",method:"POST",data:new FormData(this),contentType:!1,cache:!1,processData:!1,success:function(e){paginationNumberReportScreen(),$("#save-screening").text("GUARDAR"),$("#imprimir-screening").show(),$("#screeningSave").trigger("reset"),$(".calculBIM").prop("disabled",!0)}})})</script>