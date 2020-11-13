
<style>
td,th{text-align:left}
.img {
    width: 70%;
    height: auto;
	border:1px solid #38a7bb
}
</style>
<div class="modal-content" >
<?php foreach($EditSeguroMedico as $row) ?>
<div class="modal-header" id="background_">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h2 class="modal-title "><span class="hide-logo">Edit</span> Seguro Medico # <?=$id_seguro?> 
</h2>


<hr/>
<?php 

$u1=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$u2=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

 ?>
<ul style='color:black'>
<li>Creado por <?=$u1?> fecha <?=$row->inserted_time?></li>
<li>Editado por <?=$u2?> fecha <?=$row->updated_time?> </li>
</ul>
<hr/>

<div class="col-md-6">
<img class="img" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $row->logo; ?>"  />
</div>

<!--<div class="col-md-6 alert alert-info" role="alert">
Extensión de imagen permitida :<br/>
jpeg, jpg, png, gif.
</div>-->

</div>
<div class="modal-body" >	
<form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url('admin/UpdateSeguroField');?>">
<input type="hidden" class="form-control" name="id_seguro" value="<?=$row->id_sm;?>">
<input type="hidden" class="form-control" value="<?=$name?>" name="user_name"  >
<div id="erBox-ed" style="color:red"></div>
<div class="form-group" >
<br/>

<label class="control-label col-sm-3">Nombre :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="title" id="title-ed" value="<?=$row->title;?>">
<br/>
</div>

</div>
<div class="form-group hide-logo" id="background_" >

<label class="control-label col-sm-3">Cargar Logo :</label>
<div class="col-sm-8">
<input type="file" class="file" id="picture" name="picture" onchange="get_detail();">
<span id="divFiles" style="color:red" ></span>
</div>

</div>

<div class="form-group"  >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">RNC :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="rnc" id="rnc-ed" value="<?=$row->rnc;?>">

</div>

</div>

<div class="form-group"  id="background_" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Telefonos :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="tel" id="tel-ed" value="<?=$row->tel;?>">

</div>

</div>

<div class="form-group" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Correo :</label>
<div class="col-sm-8">
 <input type="email" class="form-control disab" name="email" id="email-ed" value="<?=$row->email;?>">

</div>

</div>

<div class="form-group" id="background_" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Direccion :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="direccion" id="direccion-ed" value="<?=$row->direccion;?>" >

</div>

</div>

<div class="form-group" id="background_" >
<br/>
<div id="erBox4-ed2" style="color:red"></div>
<label class="control-label col-sm-3">Campos:</label>
<div class="col-sm-8">

	<?php 

		foreach ($ALL_FIELDS as $row ) {

 $field_id=$this->db->select('*')->where('field_id',$row->id )
 ->where('medical_insurance_id',$id_seguro)
 ->get('medical_insurances_fields')->row('field_id');
 
		if($field_id==$row->id){
		        $activo="checked";
		} else {
		       $activo="";
	    }		
		
		echo "<p><input name='activo[]' class='disab' type='checkbox'   value='$row->id' $activo /> $row->name</<p> ";



		}
	 	
	 ?>
	

</div>
</div>

<div class="form-group hide-logo">
<div class="col-sm-12 col-md-offset-3">
<button type="submit" id="send" class="btn btn-primary btn-xs save-new-seguro-ed"> Enviar</button>
<a style="margin-left:60px" href="<?php echo site_url("admin/health_insurance_fields");?>" class="btn btn-primary btn-xs"  >Campos</a>
</div>


</div>

</form>

</div>
</div>
<script>
$('.save-new-seguro-ed').click(function(e) { 

if($("#title-ed").val() == "" ||  $("#rnc-ed").val() == "" ||  $("#tel-ed").val() == "" ||  $("#email-ed").val() == "" ||  $("#direccion-ed").val() == "" ){
$("#erBox-ed").html("Todos los campos son obligatorios !");
return false;
} 
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        $("#erBox4-ed2").html("Debes marcar al menos una casilla por el seguro medico !");
        return false;
      }

});
</script>