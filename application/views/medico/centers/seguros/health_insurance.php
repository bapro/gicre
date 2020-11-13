
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
<h4 class="modal-title "><span class="hide-logo">Edit</span> Seguro Medico # <?=$id_seguro?> 
</h4>
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
 <input type="text" class="form-control disab" name="title" id="title-ed" value="<?=$row->title;?>" disabled>
<br/>
</div>

</div>


<div class="form-group" id="background_" >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">RNC :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="rnc" id="rnc-ed" value="<?=$row->rnc;?>" disabled>

</div>

</div>

<div class="form-group"   >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Telefonos :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="tel" id="tel-ed" value="<?=$row->tel;?>" disabled>

</div>

</div>

<div class="form-group" id="background_">

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Correo :</label>
<div class="col-sm-8">
 <input type="email" class="form-control disab" name="email" id="email-ed" value="<?=$row->email;?>" disabled>

</div>

</div>

<div class="form-group"  >

<label class="control-label col-sm-3" title="Registro nacional de contribuyente">Direccion :</label>
<div class="col-sm-8">
 <input type="text" class="form-control disab" name="direccion" id="direccion-ed" value="<?=$row->direccion;?>" disabled>

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
		
		echo "<p><input name='activo[]' class='disab' type='checkbox'   value='$row->id' $activo disabled /> $row->name</<p> ";



		}
	 	
	 ?>
	

</div>
</div>


</form>

</div>
</div>
