
<?php 

if($GET_NAMEF_C > 0){
foreach($GET_NAMEF as $get_input_nam)
{
if($get_input_nam->inputf=='No. DE AFILIADO'){
$requiredipt='required';	
}else{
$requiredipt='';	
}
?>
<div class="form-group"> 
<label class="control-label col-sm-3" ><?=$get_input_nam->inputf;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]"  class="form-control <?=$requiredipt?>" value="<?=$get_input_nam->input_name;?>" >
<input  type="hidden" name="inputf[]" class="form-control " value="<?=$get_input_nam->inputf;?>" >
</div>
</div>

<?php
}
} else {
foreach($GET_INPUT as $get_input)
{

if($get_input->name=='No. DE AFILIADO'){
$requiredipte='required';	
}else{
$requiredipte='';	
}
	
?>
<div class="form-group">
<label  class="control-label col-sm-3"><?=$get_input->name;?></label>
<div class="col-sm-3">
<input  type="text" name="inputname[]" class="form-control inp <?=$requiredipte?>"  id="inputname" >
<input  type="hidden" name="inputf[]" class="form-control " value="<?=$get_input->name;?>" >

</div>
</div>	
<?php	
}
}
if($seguro_medico !="PRIVADO")
{
?>
<div class="form-group">
<label  class="control-label col-sm-3">Tipo de afiliado</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="afiliado" id="afiliado">
<?php $afiliado=$this->db->select('afiliado')->where('id_p_a',$idpatient)->get('patients_appointments')->row('afiliado');
if($afiliado=="Titular"){
	$option='Depediente';
}else{
$option='Titular';	
}
?>
<option><?=$afiliado;?></option>
<option><?=$option?></option>

</select>
</div>
</div>

<div class="form-group">
<label  class="control-label col-sm-3">Plan</label>
<div class="col-sm-3">
<select class="form-control select-examsis" name="plan" id="plan">
<?php
$planame=$this->db->select('name')->where('id',$plan)->get('seguro_plan')->row('name');
echo "<option  value='$plan' >$planame</option>";
$sql ="SELECT id, name FROM  seguro_plan";
$querysig = $this->db->query($sql);
foreach ($querysig->result() as $rw){
echo "<option  value='$rw->id' '$selected'>$rw->name</option>";
 
}?>
</select>
</div>
</div>
<?php
}
?>

<script>
$(".select-examsis").select2({
  tags: true
});
</script>