 <div class="container">
  <div class="row">
 <div class="col-md-12">
 <div id="errorrr"></div>
<div class="form-horizontal searchb"> 
<div class="form-group">
<label class="control-label col-sm-4"  >Enter The Employee Clock Number Or His Name </label>
<div class="col-sm-5">
<em class="alert-info"><?=$total?> empleados tiene <strong><?=$centro_name?></strong></em>
<input autocomplete="off" id="clock" type="text" class="form-control"  />
 <em><?=$totalAct?> activos, <?=$totalTerm?> terminados</em>
<div id="suggesstion-box"></div>
<br/>
<!-- <form method="post"   class="form-horizontal" id="import_form_employees" enctype="multipart/form-data" >
<label class="control-label"  >Update Employees </label>
<input type="file" name="file" class="file required"  id="file" required  accept=".xls, .xlsx, .csv" />
 <input  name="creaded_by" value="<?=$user_name?>" type="hidden" class="form-control"  />

<input  name="centro" value="<?=$centro?>" type="hidden" class="form-control"  />

<br/>
<input  type="submit" name="import-employees" id="import-employees" value="Import" class="btn btn-info"  />
<br/><br/>
</form>-->
</div>
</div>

<div id="clock-data"></div>
</div>
</div>
</div>
</div>

<script type="text/javascript">


$("#clock").keyup(function(){
$.ajax({
type: "POST",
url:"<?php echo base_url(); ?>searchAutoComplete/filterClockData",
data:{keyword:$(this).val(),origin:2,centro:<?=$centro?>},
beforeSend: function(){
$("#clock").css("background","#DCDCDC");
},
success: function(data){
$("#suggesstion-box").show();
$("#suggesstion-box").html(data);
$("#clock").css("background","");
},
});
});




function selectThisClock2(val) {
getClockResult(val);
$("#clock").val("");
$("#suggesstion-box").hide();

}
getClockResult(0);

function getClockResult(val) {
$.ajax({
type: "POST",
url: "<?=base_url('zona_franca/getClockResult')?>",
data :{val:val,id_user:<?=$user_name?>,centro:<?=$centro?>},
success:function(data){
	
$('#clock-data').html(data);
if(val != 0){
licenciaMedicaForm(val);
}
}  
});
}


function licenciaMedicaForm(val){
$.ajax({
url:"<?php echo base_url(); ?>zona_franca/licenciaMedicaForm",
data: {id_emp:val,id_user:<?=$user_name?>},
method:"POST",
success:function(data){
$('#licenciaMedicaForm').html(data);
},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
$('#licenciaMedicaForm').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
});
}




$('#import_form_employees').on('submit', function(event){
event.preventDefault();
	if($("#upload-employees").val()==""){
alert("Upload the excel file that has the list of employees.");
}
else{
$('#import-employees').val('espera mienstras importando...').prop("disabled",true);
$.ajax({
url:"<?php echo base_url(); ?>zona_franca/import_employees",
method:"POST",
//dataType: 'json',
data:new FormData(this),
contentType:false,
cache:false,
processData:false,
success:function(data){
alert('Los empleados importados con éxito');
location.reload(true);

},
 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#errorrr').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
};
});
</script>


