<?php

foreach($GET_INPUT as $get_input)
{
if($get_input->name=='No. DE AFILIADO'){
$requiredipt='required';	
}else{
$requiredipt='';	
}	
?>

<div class="form-group">
<label  class="control-label col-sm-3"><?=$get_input->name;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]" class="form-control inp num-seg <?=$requiredipt?>"  id="inputname" >
<input  type="hidden" name="inputf[]" class="form-control" value="<?=$get_input->name;?>" >

</div>
</div>

<?php
}
if($seguro_medico !="PRIVADO")
{
?>
<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="afiliado" id="afiliado">
<option>Titular</option>
<option>Depediente</option>
</select>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="plan" id="plan">
<?php
$sql ="SELECT id, name FROM  seguro_plan";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rw){
echo "<option value='$rw->id'>$rw->name</option>";
 
}?>
</select>
</div>
</div>
<?php
}
?>
<script>

$('.input-seg').click(function() {
	if($(".inp").val() == ""){
$(".inp").focus();
$('.inp').css('border', '2px solid'); 
$('.inp').css('border-color', 'red');
$(".missingdp").slideDown("slow");
$(".datosp").slideDown("slow");
for(i=0;i<3;i++) {
  $('.inp').fadeTo('slow', 0.1).fadeTo('slow', 1.0);
  };
return false;
}
});

$(".select-examsis").select2({
  tags: true
});
</script>
