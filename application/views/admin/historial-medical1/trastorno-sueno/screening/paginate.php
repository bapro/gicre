<?php foreach($cirugia_paginate->result()as $rowp){$inserted_time=date("d-m-Y H:i:s",strtotime($rowp->inserted_time));$doc=$this->db->select('name')->where('id_user',$rowp->inserted_by)->get('users')->row('name'); ?><form class="form-horizontal"id="screeningUpdate"method="post"><div class="screeningInfo"style="background:#add8e6"></div><input name="action"value="<?=$rowp->id?>"type="hidden"><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->snoring==1&&$rowp->snoring!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd'  name='snoring' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->snoring==0&&$rowp->snoring!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd'  name='snoring' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">S</font>noring ?</b><br>Do you <b>Snore Loudly</b> (loud enough to be heard through closed doors or your bed-partner elbows you for snoring at night)?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->tired==1&&$rowp->tired!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='tired' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->tired==0&&$rowp->tired!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='tired' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">T</font>ired ?</b><br>Do you often feel <b>Tired, Fatigued, or Sleepy</b> during the daytime (such as falling asleep during driving or talking to someone)?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->observed==1&&$rowp->observed!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='observed' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->observed==0&&$rowp->observed!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='observed' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">O</font>bserved ?</b><br>Has anyone <b>Observed</b> you <b>Stop Breathing</b> or <b>Choking/Gasping</b> during your sleep ?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->pressure==1&&$rowp->pressure!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='pressure' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->pressure==0&&$rowp->pressure!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='pressure' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">P</font>ressure ?</b><br>Do you have or are being treated for <b>High Blood Pressure</b> ?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->body_mass==1&&$rowp->body_mass!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='body_mass' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->body_mass==0&&$rowp->body_mass!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='body_mass' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">B</font>ody Mass Index more than 35 kg/m<sup>2</sup>?</b><br><br><b>Body Mass Index Calculator</b><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-md-1"><br>Height:</div><div class="col-md-2">m<?php if($rowp->height_unit=='m'&&$rowp->height_unit!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio'  name='height_unit_' value='m' $selected />"; ?>cm<?php if($rowp->height_unit=='cm'&&$rowp->height_unit!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio'  name='height_unit_' value='cm' $selected />"; ?><input name="height"value="<?=$rowp->height?>"id="h"class="calculBIMed"size="6"></div><div class="col-md-1"><br>Weight:</div><div class="col-md-2">kg<?php if($rowp->weight_unit=='kg'&&$rowp->weight_unit!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio'  name='weight_unit_' value='kg' $selected />"; ?>lbs<?php if($rowp->weight_unit=='lbs'&&$rowp->weight_unit!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio'  name='weight_unit_' value='lbs' $selected />"; ?><input name="weight"value="<?=$rowp->weight?>"id="w"class="calculBIMed"size="6"></div><div class="col-md-6"></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><br><div class="col-md-1">BMI:</div><div class="col-md-2"><input name="bmi"value="<?=$rowp->bmi?>"id="bmiResult"readonly></div><div class="col-md-9"></div></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->age_older==1&&$rowp->age_older!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='age_older' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->age_older==0&&$rowp->age_older!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='age_older' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">A</font>ge older than 50 ?</b></div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->neck_size==1&&$rowp->neck_size!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='neck_size' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->neck_size==0&&$rowp->neck_size!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='neck_size' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">N</font>eck size large ? (Measured around Adams apple)</b><br>Is your shirt collar 16 inches / 40cm or larger?</div></div><div class="col-md-12"style="border-bottom:1px solid #dcdcdc"><div class="col-xs-1">Yes<br><?php if($rowp->gender==1&&$rowp->gender!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='gender' value='1' $selected />"; ?></div><div class="col-xs-1">No<br><?php if($rowp->gender==0&&$rowp->gender!=NULL){$selected="checked";}else{$selected="";}echo"<input type='radio' class='trCheckScreenEd' name='gender' value='0' $selected />"; ?></div><div class="col-md-10"><b><font size="6">G</font>ender = Male ?</b></div></div><div class="col-md-12"><div class="col-md-1"></div><div class="col-md-1"></div><div class="col-md-10"><br><br><input name="id_user"value="<?=$user_id?>"type="hidden"> <button class="btn btn-md btn-success"id="save-update"type="submit"><i class="fa after-screening fa-check"style="display:none;color:#00f;font-size:30px;position:absolute"></i> GUARDAR</button> <a class="btn btn-md btn-primary"href="<?php echo base_url("printings/print_if_foto_c/") ?>"target="_blank"><i class="fa fa-print"></i> Imprimir</a><br></div></div></form><?php } ?><script>var element=".trCheckScreenEd:checked";$().ready(function(){$(".trCheckScreenEd").change(function(){calcscorescreen(element)})}),calcscorescreen(element),$(".calculBIMed").keyup(function(){var e=$("input:radio[name=weight_unit_]:checked").val(),n=$("input:radio[name=height_unit_]:checked").val();bim(e,n)}),$("input[type=radio][name=weight_unit_]").on("change",function(){$("#w").prop("disabled",!1);var e=$("input:radio[name=weight_unit_]:checked").val(),n=$("input:radio[name=height_unit_]:checked").val();bim(e,n)}),$("input[type=radio][name=height_unit_]").on("change",function(){$("#h").prop("disabled",!1);var e=$("input:radio[name=weight_unit_]:checked").val(),n=$("input:radio[name=height_unit_]:checked").val();bim(e,n)}),$(".load-cirugia").not(".registro-li").hide(),$("#screeningUpdate").submit(function(e){e.preventDefault(),$("#save-update").prop("disabled",!0),$("#save-update").text("updating..."),$.ajax({url:"<?php echo base_url(); ?>historialHeader/saveScreening",method:"POST",data:new FormData(this),contentType:!1,cache:!1,processData:!1,success:function(e){paginationNumberReportScreen(),$("#save-update").text("GUARDAR"),$("#save-update").prop("disabled",!1)},error:function(e,n,t){alert("An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!"),$("#screeningUpdate").html("<p>status code: "+e.status+"</p><p>errorThrown: "+t+"</p><p>jqXHR.responseText:</p><div>"+e.responseText+"</div>"),console.log("jqXHR:"),console.log(e),console.log("textStatus:"),console.log(n),console.log("errorThrown:"),console.log(t)}})})</script>