
 
 <?php

	 foreach($query->result()  as $edit_id)
 ?>

<div class="container" id="background_">

 <div class="col-md-12">
 <?php echo $this->session->flashdata('success_msg');  ?>
 <h3 class="h3 col-md-offset-3">Editar Laboratorio De Lenteo #  <span class="round"><?=$edit_id->id?></span> 
  
 </h3>

<?php $user_c18=$this->db->select('name')->where('id_user',$edit_id->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$edit_id->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($edit_id->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($edit_id->updated_time));
echo "Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)";?>
  </div>

<form   class="form-horizontal" id="form-save" method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/saveUpdateLabLentes');?>" > 
 

<div class="col-xs-6">
<input name="id_m_c" type="hidden" value="<?=$edit_id->id;?>"/>

<div class="form-group">
<label class="control-label col-sm-5" >NOMBRE COMERCIAL</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="name"  name="name" value="<?=$edit_id->nombre_comercial;?>"   >
</div>
</div>

<div class="form-group" >

<label class="control-label col-sm-5">Cargar Logo :</label>
<div class="col-sm-6">
<input type="file" class="file" name="picture" >

</div>

</div>

<div class="form-group">
<label class="control-label col-sm-5" >RNC</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="rnc"  name="rnc"  value="<?=$edit_id->rnc;?>"   >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-5">DIRECCION</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="direccion" name="direccion" value="<?=$edit_id->direccion;?>" >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5" >PAIS </label>
<div class="col-sm-6">
<input type="text" class="form-control" id="pais" name="pais" value="<?=$edit_id->pais;?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5" >PROVINCIA </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="provincia" name="provincia"  value="<?=$edit_id->provincia;?>"  >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" >CIUDAD </label>
<div class="col-sm-4">
<input type="text" class="form-control" id="ciudad" name="ciudad"  value="<?=$edit_id->ciudad;?>"  >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-5"><span style="color:red">*</span> TELEFONO</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="primer_tel" name="primer_tel" value="<?=$edit_id->telefono;?>"  >
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-5" >CORREO ELECTRONICO</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="email"  name="email" value="<?=$edit_id->correo;?>"  >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-5" >PAGINA WEB</label>
<div class="col-sm-4">
<input type="text" class="form-control" id="web"  name="web" value="<?=$edit_id->pagina_web;?>"  >
</div>
</div>
</div>
 <div class="col-xs-6">
  <?php if($edit_id->logo==""){
	echo "<div class='alert alert-info'>
  No hay logo.
</div>"; 
 }
 else {
 ?>
<img style="width:200px"  src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $edit_id->logo; ?>"  />
 <?php
 }
 
  ?>
 <div class="form-group">
<label class="control-label col-sm-5" >OFTALMOLOGOS AFECTADOS</label>
<div class="col-sm-7">
<select class="form-control select2 required"  multiple="multiple"  name="lab_user[]">

<?php 
$sql = "select id_user, name FROM users WHERE area=32 ORDER BY name DESC";
 $querylb= $this->db->query($sql);
 foreach($querylb->result()  as $afec){

$id_user_lab=$this->db->select('id_user')->where('id_user',$afec->id_user )
->where('id_lab_lente',$edit_id->id)
 ->get('user_oftal_lab_lentes')->row('id_user');
 
		if($id_user_lab==$afec->id_user ){
		        $selected="selected";
		} else {
		       $selected="";
	    }
		
echo "<option value='$afec->id_user ' $selected>$afec->name</option>";
}
?>
</select>
</div>
</div>
 </div>
 <div class="row  col-md-offset-5">
 <div class="col-md-12">
 <input type="submit"  class="btn btn-primary btn-xs" value="Guardar" id='save'>
 <br/>
<br/>
 </div>


</div>
 </form>


</div>
 </div>
 <?php $this->load->view('footer');?>

 <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	
	<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script src="<?=base_url();?>assets/js/links_select.js"></script> 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script type="text/javascript" src="<?=base_url();?>assets/js/validation-jq.js" charset="UTF-8"></script>
  <script>
 $('.select2').select2({ 
//tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
    searching: function() {

      return "Buscando..";
    }
  }
});	 
  
$('#save').click(function() {
	
if($("#name").val() == ""){
alert("Cual es el nombre ?");
return false;
}


if($("#primer_tel").val() == ""){
alert("Cual es le primer telefono ?");
return false;
}


if($("#provincia").val() == ""){
alert("Cual es la provincia ?");
return false;
}	


if($("#municipio").val() == ""){
alert("Cual es le municipio ?");
return false;
}

})
  

	
</script>