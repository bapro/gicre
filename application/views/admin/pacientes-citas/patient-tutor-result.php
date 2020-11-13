<?php
if(!empty($patient_tutors ))  
{ 
$this->padron_database = $this->load->database('padron',TRUE);
?>
<div class="table-responsive lsend">
<table class="table table-bordered">
<thead>
<tr >
<th style="text-align:left">Foto</th>
<th style="text-align:left">Cedula</th>
<th style="text-align:left">Nombres</th>
<th style="text-align:left"><span style="color:red">*</span> Relación familia</th>
<th style="text-align:left">Agregar</th>
</tr>

</thead>
<tbody>
<?php

foreach ($patient_tutors as $objects)    
?>
<tr style="background:white"> 
<td  style="text-align:left">
<?php

if($objects->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$objects->ced1)
->where('SEQ_CED',$objects->ced2)
->where('VER_CED',$objects->ced3)
->get('fotos')->row('IMAGEN');
echo '<img style="width:70px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($objects->photo==""){
	
}
else{
	?>
<img  style="float:left; width:70px;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $objects->photo; ?>"  />
<?php

}
?>
</td>
<td style="text-align:left;color:green"><?=$objects->cedula?></td>
<td style="text-align:left;color:green;text-transform:uppercase"><?=$objects->nombre?></td>
<td style="text-align:left;color:green">
<select id="relacionf">
<option value="" hidden></option>
<?php
foreach($query->result()as $row){
 echo "<option>".$row->name."</option>";
	}
?>
 </select>

<input type="hidden" id="id_nino" value="<?=$id_patient?>"/>
<input type="hidden" id="id_tutor" value="<?=$objects->id_p_a?>">
<input type="hidden" id="name_tutor" value="<?=$objects->nombre?>">
</td>
<td style="text-align:left;color:green"><button type="button" id="save_tutor" ><i  class="glyphicon glyphicon-plus" aria-hidden="true"></i></button></td>
</tr>

</tbody>
 </table>
 </div>
<?php
}  

else  
{  
echo '<i style="font-size:16px;color:#B69200">Datos no encontrados</i>';  
} 
?>
<script>
function display_tutor()
{
$(".display_tutor").fadeIn().html('<span class="load"> <img  width="40px" src="<?= base_url();?>assets/img/loading.gif" /></span>');
var id_nino  = $("#id_nino").val();
var controller  = "<?=$controller?>";
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/display_tutor",
method:"POST",
data: {id_nino:id_nino,controller:controller},
success:function(data){
$('.display_tutor').html(data);
}
});
}

//----------------------------------------------------------------------------------------
$("#save_tutor").on('click', function (e) {
e.preventDefault();
var name_tutor  = $("#name_tutor").val();
var id_nino  = $("#id_nino").val();
var id_tutor  = $("#id_tutor").val();
var relacionf  = $("#relacionf").val();
if(relacionf=="")
{
alert("Cual es la relación familia ?");
} else {
$.ajax({
url: '<?php echo site_url('admin_medico/save_tutor');?>',
type: 'post',
data:{id_nino:id_nino,id_tutor:id_tutor,relacionf:relacionf,name_tutor:name_tutor},
success: function (data) {
	$('#search').val("");
	$('.lsend').delay(2000).slideUp(1000);
	$('#notienetutor').slideUp();
	$('#mes').html(data);
	 //$("#reload-fam").load(" #reload-fam > *");
	 display_tutor();
	 
}

});
}
});   
 

</script>