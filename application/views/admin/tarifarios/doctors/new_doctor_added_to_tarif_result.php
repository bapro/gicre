<div id="new_content"></div>
<div id="old_content">
<?php foreach($results as $rw)
$seguro=$this->db->select('title,logo')->where('id_sm',$rw->id_seguro)
->get('seguro_medico')->row_array();


$categoria=$this->db->select('title_area')->where('id_ar',$rw->id_categoria)
->get('areas')->row('title_area');

 ?>

<div class="col-md-3">

<h5 style="color:green">Doctores</h5>
<?php
$i = 1;
$sql ="SELECT id_doct FROM tarif_seg_doc where id_cat='$rw->id_categoria'";
$query = $this->db->query($sql);

foreach($query->result() as $do)
{
$doctor=$this->db->select('id,first_name,exequatur,email')->where('id',$do->id_doct)
->get('doctors')->row_array();

$sql_centro="SELECT id_m_c, name
FROM doctor_centro_medico
JOIN medical_centers on doctor_centro_medico.centro_medico=medical_centers.id_m_c
 where id_doctor='$do->id_doct'  ";
 $query_centro = $this->db->query($sql_centro);
?>
<span id="remove-this-doctor">
<p style='text-transform:uppercase;text-align:left;'><?=$i;$i++;?> -<a title="Exequatur : <?=$doctor['exequatur']?> - Email : <?=$doctor['email']?> " href="<?php echo base_url('admin/doctor/'.$do->id_doct)?>" > Dr <?=$doctor['first_name']?></a> <button type="button" title="Quitar este doctor de los tarifarios" id="<?=$do->id_doct?>" style="color:red;background:none" class="btn btn-xs deletedoctor">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</button></p>
<?php 
echo"<ul>";
 foreach($query_centro->result() as $rct)

{
	
?>

<li style="font-size:12px"><?=$rct->name;?></li>
<?php
}
echo"</ul></span>";
}

//==================================================================
$sql_doc ="SELECT id, first_name
FROM doctors
WHERE id NOT IN 
(select id_doct FROM tarif_seg_doc where id_cat='$rw->id_categoria' ) ";
$query_doct = $this->db->query($sql_doc);
?>


<hr id="hr_ad"/>
<label class="control-label">Agregar otros medicos a estes tarifarios</label>
<select class="form-control id_docc"  multiple id="id_doc" style="height:10px">
<?php 
foreach($query_doct->result() as $row)
{ 
echo "<option value=".$row->id.">".$row->first_name."</option>";
}
?>
</select>
<br/><br/>
<button type="button" id="add_doc" disabled class="btn btn-info">Agregar</button>
</div>

<script>
 $('#deletesuccess').delay(3000).fadeOut();
$("#id_doc").change(function(){
$("#add_doc").prop("disabled",false);
});

$('.id_docc').select2({
	 width: '100%',
 placeholder: "SELECCIONAR",
    allowClear: true, 
  language: {

    noResults: function() {

      return "No hay resultado.";        
    },
   
  }
});




$('#add_doc').on('click', function(event) {
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var id_doc  = $("#id_doc").val();
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
$.ajax({
type: "POST",
url: "<?=base_url('admin/addDoctTarif')?>",
data: {id_categoria:id_categoria,id_doc:id_doc,id_seguro:id_seguro},
cache: true,
 success:function(data){
$(".loadf").hide();	 
 $('#old_content').hide();
 $('#new_content').html(data);
$('.id_docc').val(null).trigger('change');
$("#add_doc").prop("disabled",true);
},
 
});

return false;
});	

//=====================================================================

$(".deletedoctor").click(function(){
if (confirm("Estás seguro de eliminar ?"))
{ 
$(".loadf").fadeIn().html('<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate load"></span>');
var el = this;
var id_categoria = "<?=$rw->id_categoria?>";
var id_seguro = "<?=$rw->id_seguro?>";
var del_id = $(this).attr('id');
var rowElement = $(this).parent().parent(); //grab the row


$.ajax({
type:'POST',
url:'<?=base_url('admin/DeleteDoctorTarif')?>',
data: {id : del_id,id_categoria:id_categoria,id_seguro:id_seguro},
success:function(data) {
/*$('#remove-this-doctor').css('background','tomato');
$('#remove-this-doctor').fadeOut(800, function(){ 
$(this).remove();
});*/
$(".loadf").hide();	
 $('#old_content').hide();
 $('#new_content').html(data);
}
});
}
})

//=======================================================================================

</script>
</div>