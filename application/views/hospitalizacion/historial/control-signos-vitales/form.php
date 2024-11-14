<div id="tstttt"></div>
<div class="col-md-12"  >

<h4 class="h4 his_med_title">Control De Signos Vitales</h4>
<hr class="prenatal-separator"/>
</div>
<div class="col-md-5" id='clear-csv' >
 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Sat 02(%)</label>
    <div class="col-sm-4">
	 <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_sat' value="<?=$csv_sat?>" />
   
   </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Tension Aterial</label>
    <div class="col-sm-8">
   <div class="input-group">
  <span class="input-group-addon">(mm)</span>
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_ta1' value="<?=$csv_ta1?>" />
    <span class="input-group-addon">-</span>
	<input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_ta2' value="<?=$csv_ta2?>" />
	<span class="input-group-addon">(hg)</span>
    </div>
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">F.C</label>
    <div class="col-sm-4">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_fc' value="<?=$csv_fc?>" />
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-3 col-form-label">F.R.</label>
    <div class="col-sm-4">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_fr' value="<?=$csv_fr?>" />
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Glicemia</label>
    <div class="col-sm-4">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_glicemia' value="<?=$csv_glicemia?>" />
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Pulso</label>
    <div class="col-sm-4">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_pulso' value="<?=$csv_pulso?>"/>
    </div>
  </div>
  
   <div class="form-group row" title="temperatura">
    <label  class="col-sm-3 col-form-label">&#8451;</label>
    <div class="col-sm-4">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_temperatura' value="<?=$csv_temperatura?>" />
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-3 col-form-label">Diuresis / Dep</label>
    <div class="col-sm-6">
   <div class="input-group">
    <input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_diuresis' value="<?=$csv_diuresis?>" />
    <span class="input-group-addon"> / </span>
	<input type="number" min="5" max="25" step="5" class="form-control check-input-csv" id='csv_dep' value="<?=$csv_dep?>" />
    </div>
    </div>
  </div>
  
    <div class="form-group row">
   <!-- <label  class="col-sm-3 col-form-label">Hora realizada</label>
    <div class="col-sm-7">
	
	  <input type="number" min="5" max="25" step="5" class="form-control check-input-csv"   id='csv_hora_realiazada'  />
  
	 </div>-->
	 <label  class="col-sm-3 col-form-label">Hora realizada</label>
    <div class="col-sm-9">
	 <div class="input-group date form_datetime col-md-8 "  data-date-format="dd MM yyyy HH:ii:ss" data-link-field="dtp_input1">
<input type="text" class="form-control datetime" readonly value="<?=date("d-m-Y H:i:s")?>">
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden"  id="mirror_field_cont_sig"  value="<?=date("Y-m-d H:i:s")?>" />
  </div>
   </div>
  <div class="col-md-4"></div>
  <div class="col-md-8">
     <button type="button" class="btn btn-sm btn-primary" id='csv-add-btn' ><?=$fa_fa?> <?=$btn_txt1?></button>
	 <?=$cancel?>
	 <span class='saveResult1'></span>
	 <span class='saveResult'></span> 
  </div>
  
   </div>
 
   <script>
   
 $('.form_datetime').datetimepicker({
format: 'dd-mm-yyyy HH:ii:ss',
linkField: "mirror_field_cont_sig"
});


 $('#csv-add-btn').on('click', function(event){
	
	event.preventDefault();
$(".saveResult").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('control_signos_vitales/saveControlSignosVitales')?>",
data:{csv_sat:$('#csv_sat').val(),csv_ta1:$('#csv_ta1').val(),csv_ta2:$('#csv_ta2').val(),csv_fc:$('#csv_fc').val(),csv_fr:$('#csv_fr').val(),csv_glicemia:$('#csv_glicemia').val(),id_patient:<?=$id_historial?>,id_user:<?=$user_id?>,
csv_pulso:$('#csv_pulso').val(),csv_temperatura:$('#csv_temperatura').val(),csv_diuresis:$('#csv_diuresis').val(),csv_dep:$('#csv_dep').val(),time:$('#mirror_field_cont_sig').val(),id:<?=$idContSigVit?>},
success:function(data){ 
 result=$(".saveResult").html(data);
 if(result !=0){
 $(".saveResult").html('Hecho.').css('color','green').delay( 1000 ).hide(0);
 $(".saveResult1").html('');
 $("#clear-csv").find('input.form-control:not(.datetime)').val('');
  $(".datetime").val('');
 contSigVital();
} else{
$(".saveResult").html('Error.').css('color','red').delay( 1000 ).hide(0);		
}
} ,
	 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$("#tstttt").html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});

});



   </script>