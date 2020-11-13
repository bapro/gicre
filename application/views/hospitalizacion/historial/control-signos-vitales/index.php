<div class="col-md-12"  >
<h4 class="h4 his_med_title">Control De Signos Vitales</h4>
<hr class="prenatal-separator"/>
</div>
<div class="col-md-5" id='clear-csv' >
 <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Sat 02(%)</label>
    <div class="col-sm-4">
	 <input type="text" class="form-control" id='csv_sat'/>
   
   </div>
  </div>
  <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Tension Aterial</label>
    <div class="col-sm-8">
   <div class="input-group">
  <span class="input-group-addon">(mm)</span>
    <input type="text" class="form-control" id='csv_ta1' />
    <span class="input-group-addon">-</span>
	<input type="text" class="form-control" id='csv_ta2' />
	<span class="input-group-addon">(hg)</span>
    </div>
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">F.C</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id='csv_fc' />
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">F.R.</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id='csv_fr' />
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Glicemia</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id='csv_glicemia' />
    </div>
  </div>

 <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Pulso</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id='csv_pulso' />
    </div>
  </div>
  
   <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Temperatura</label>
    <div class="col-sm-4">
    <input type="text" class="form-control" id='csv_temperatura' />
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Diuresis / Dep</label>
    <div class="col-sm-6">
   <div class="input-group">
    <input type="text" class="form-control" id='csv_diuresis' />
    <span class="input-group-addon"> / </span>
	<input type="text" class="form-control" id='csv_dep' />
    </div>
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Hora realizada</label>
    <div class="col-sm-7">
	
	 <div class='input-group date' id='csv_hora_realiazada1'>
	  <input type="text" class="form-control"  id='csv_hora_realiazada'  />
    <span class="input-group-addon">
               <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
	 </div>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-8">
     <button type="button" class="btn btn-sm btn-primary" id='csv-add-btn' ><i class="fa fa-plus"></i> Agregar</button>
	 <span class='saveResult'></span> 
  </div>
  
   </div>
   <div class="col-md-7" style="height:550px;overflow-y:auto;background:white; box-shadow: 
    0 0 0 2px hsl(0, 0%, 50%),
    0 0 0 4px hsl(0, 0%, 60%),
    0 0 0 6px hsl(0, 0%, 70%);
    " >
      <div id="list-control-signos-vitales" ></div>
   </div>
 <script>

$('#csv-add-btn').on('click', function(event){
	event.preventDefault(); 
	$(".saveResult").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/saveControlSignosVitales')?>",
data:{csv_sat:$('#csv_sat').val(),csv_ta1:$('#csv_ta1').val(),csv_ta2:$('#csv_ta2').val(),csv_fc:$('#csv_fc').val(),csv_fr:$('#csv_fr').val(),csv_glicemia:$('#csv_glicemia').val(),id_patient:<?=$id_historial?>,id_user:<?=$user_id?>,
csv_pulso:$('#csv_pulso').val(),csv_temperatura:$('#csv_temperatura').val(),csv_diuresis:$('#csv_diuresis').val(),csv_dep:$('#csv_dep').val(),csv_hora_realiazada:$('#csv_hora_realiazada').val()},
success:function(data){ 
 result=$(".saveResult").html(data);
 if(result !=0){
 $(".saveResult").html('Hecho.').css('color','green').delay( 1000 ).hide(0);
 $("#clear-csv").find('input.form-control').val('');
 contSigVital();
} else{
$(".saveResult").html('Error.').css('color','red').delay( 1000 ).hide(0);		
}
} 
});

})

contSigVital();

function contSigVital(){
$("#list-control-signos-vitales").fadeIn().html('listando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: "<?=base_url('hospitalizacion/listContSigVital')?>",
data:{id_patient:<?=$id_historial?>,id_user:<?=$user_id?>},
success:function(data){ 
$("#list-control-signos-vitales").html(data); 
},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$("#list-control-signos-vitales").html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },
})
}

	$('#csv_hora_realiazada1').datetimepicker({

})
 </script>