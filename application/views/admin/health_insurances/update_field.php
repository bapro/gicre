 <link href="<?=base_url();?>assets/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<style>
td,th{text-align:left}

</style>
<div id="background_">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
<h4 class="modal-title">Editar Campo # <?=$id_field?></h4>

</div>
	 <?php foreach($EditField as $row)
	
	 ?>
<form method="post" class="form-horizontal" action="<?php echo site_url('admin/SaveUpdateField');?>">
<input type="hidden" class="form-control" name="id_field" value="<?=$id_field;?>">
<div style="background:white">

<div class="form-group" >
<br/>
<span id="erBox" style="color:red"></span>
<label class="control-label col-sm-3">Nombre :</label>
<div class="col-sm-8">
 <input type="text" class="form-control" name="title" id="title" value="<?=$row->name;?>">
<br/>
</div>

</div>

</div>
<div class="form-group" >
<span id="erBox2" style="color:red"></span>
<label class="control-label col-sm-3">Descripcion :</label>
<div class="col-sm-8">
<input type="text" class="form-control" id="descripcion" name="descripcion" value="<?=$row->description;?>">
</div>
</div>
<div style="background:white">
<div class="form-group" >

<label class="control-label col-sm-3">Activo :</label>
<div class="col-sm-1">
<?php  
			if ($row->active ==1){
			$Affich = "checked";
			} else {
			$Affich = "";
			}		
			echo "<input name='activo' class='form-control' type='checkbox'  value='1' $Affich/>"; ?>
		
</div>
		
</div>
</div>
<div id="background_">

<div class="form-group"  >
<br/>
<label class="control-label col-sm-3">Seguro medico:</label>
<div class="col-sm-8">

	<?php 

		foreach ($ALL_SEGURO as $row ) {

 $field_id=$this->db->select('*')->where('field_id',$id_field )
 ->where('medical_insurance_id',$row->id_sm)
 ->get('medical_insurances_fields')->row('field_id');
 
		if($field_id==$id_field){
		        $activo="checked";
		} else {
		       $activo="";
	    }		
		
		echo "<p style='text-align:left'><input name='seguro_id[]' type='checkbox'   value='$row->id_sm' $activo /> $row->title</p> ";



		}
	 	
	 ?>
	

</div>
</div>
</div>
<div style="background:white">
<br/>
<div class="form-group" >
<div class="col-sm-12 col-md-offset-3" style='text-align:left'>
<button type="submit" class="btn btn-primary btn-xs send_cit" > Enviar</button>
</div>

</div>

</div>

</form>


<script>	
	$('.send_cit').click(function(e) {  
if($("#title").val() == "" ){
$("#title").focus();
$("#erBox").html("Como sel llama el campo ?.");
return false;
} 
if($('#descripcion').val() == ""){
$("#descripcion").focus();
$("#erBox2").html("Di algo sobre el campo !");
return false;
}



});
</script>
