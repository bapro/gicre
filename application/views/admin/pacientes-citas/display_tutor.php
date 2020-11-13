 <ol>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
foreach($tutor as $tut)
{

$patient=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$tut->id_tutor)->get('patients_appointments')->row_array();


?>
<li>

<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
echo '<img style="width:50px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} 
else if($patient['photo']==""){
	
}
else{
	?>
<img  style="float:left; width:50px;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>




<a target="_blank" href="<?php echo site_url("$controller/patient/".$tut->id_tutor); ?>"><?=$tut->relacion?> : <?=$tut->name_tutor?></a>
<a data-toggle="modal" data-target="#edit_tutor" href="<?php echo site_url("admin_medico/edit_tutor/".$tut->id); ?>" style="cursor:pointer" title="Editar" class="btn-sm" ><span class="glyphicon glyphicon-pencil"></span></a>
<a title="Eliminar" style="cursor:pointer" class="delete-tutor" id="<?=$tut->id; ?>" ><i class="fa fa-remove" style="color:red"></i></a>
</li>
<?php
}
?>
</ol>








<div class="modal fade" id="edit_tutor"  role="dialog" >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
<script>
$('#edit_tutor').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
display_tutor();
});
//------------------------------------------------------------------------------------
$(".delete-tutor").click(function(){
if (confirm("Sure to delete ?"))
{ 
var el = this;
var del_id = $(this).attr('id');

$.ajax({
type:'POST',
url:'<?=base_url('admin_medico/delete_tutor')?>',
data: {id : del_id},
success:function(response) {
display_tutor();
 
}
});
}
})
</script>