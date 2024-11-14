 <!--
 CODE COLOR TO DISPLAY IN DATALIS OPTION
  &#128308; Red
  &#128994; Green
   &#128993; Blue-->

 <div class="form-floating flex-grow-1">
      <input id='reportGeneralName' list="reporteGeneralNames" type="text" class="form-control" value="<?=$rPname?>" >
	 <datalist id="reporteGeneralNames">
<?php
$sql ="SELECT * FROM hc_reporte_general_name GROUP BY name";
$query=$this->clinical_history->query($sql);
 foreach($query->result() as $row) {
$id_name= $this->clinical_history->select('id_name')->where('id_name', $row->id)->get('hc_reporte_general_default_text')->row('id_name');	
if($id_name){
$limed="&#128308;";
}else{
$limed="";
}
 echo "<option id='$row->id'  value='$limed $row->name' />";


}?>
 
</datalist>
      <label for="reportGeneralName"><span style="color:red">*</span> Reporte <?=$id?></label>
  </div>
     
     
  


<script>

var quillDtGrs =loadQuillReporteGeneral(<?=$id?>);

if(<?=$id?>==0){
 $('#reportGeneralName').on('input',function() {
 var opt = $('option[value="'+$(this).val()+'"]');
 //alert(opt.length ? opt.attr('id') : 'NO OPTION');

$.ajax({
url:"<?php echo base_url(); ?>modal_report_general/searchText",
method:"POST",
data:{textNameId:opt.attr('id')},
dataType: 'json',

success:function(response){
if(opt.attr('id')==5){
$("#show-days-amount-rest").show();
}else{
$("#show-days-amount-rest").hide();	
}
var textContent = quillDtGrs.clipboard.convert(response.message);
quillDtGrs.setContents(textContent);

},

});

});
}

</script>

  
