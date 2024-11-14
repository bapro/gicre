	<section class="py-3">
	<div class="container d-flex align-items-center justify-content-center">
	  <?php foreach($EditSeguroMedico as $row) ?>
	  
	  
	  
	  <div class="card" style="width: 30rem;">
	   <img class="card-img-top"   src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $row->logo; ?>"  />
 <div class="card-body">
    <h3 class="card-title">Seguro Médico</h3>
  <form method="post" enctype="multipart/form-data" novalidate class="needs-validation"  action="<?php echo site_url('seguro_medico/updateSeguroField');?>">
<input type="hidden" class="form-control" name="id_seguro"    value="<?=$row->id_sm;?>">
 <div class="mb-3">

<label class="form-label "><span class="text-danger"></span> Nombre :</label>

 <input type="text" class="form-control" name="title" id="title_ns" required  value="<?=$row->title;?>" required>
<div class="invalid-feedback">Cual es el nombre?</div>
</div>


 <div class="mb-3">

<label class="form-label "><span class="text-danger"></span> Cargar Logo :</label>

<input type="file" class="file" name="picture"  id="picture" >
<div class="invalid-feedback">Sube el logo</div>

</div>



 <div class="mb-3">
<label class="form-label ">RNC :</label>

 <input type="text"  title="Registro Nacional de Contribuyente" class="form-control" name="rnc" id="rnc" value="<?=$row->rnc;?>">

</div>



 <div class="mb-3">

<label class="form-label " title="Registro nacional de contribuyente">Telefonos :</label>

 <input type="text" class="form-control" name="tel" id="tel" value="<?=$row->tel;?>">

</div>




 <div class="mb-3">
<label class="form-label " title="Registro nacional de contribuyente">Correo :</label>

 <input type="text" class="form-control" name="email"  id="email" value="<?=$row->email;?>">

</div>


 <div class="mb-3">
<label class="form-label " title="Registro nacional de contribuyente">Dirección :</label>

 <input type="text" class="form-control" name="direccion" id="direccion" value="<?=$row->direccion;?>" >

</div>


 <div class="mb-3">
<label class="form-label ">Campos:</label>

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
	?>
<div class="form-check">
  <input class="form-check-input" type="checkbox" name='field_id[]' id="flexCheckDefault-<?=$row->id?>" <?=$activo?>  value="<?=$row->id?>">
  <label class="form-check-label" for="flexCheckDefault-<?=$row->id?>">
   <?=$row->name?>
  </label>
</div>
<?php }  ?>
<div id="erBox4" class="text-danger"></div>
</div>
<div class="col-sm-12 col-md-offset-3">
<button type="submit"  id="send" class="btn btn-primary btn-xs save-new-seguro" > Guardar</button>

</div>
<br/><br/>



</form>
  </div>
</div>
	  
	  
	  
	  

        </div>   
  
    </section>
	

  <?php
 
  $this->load->view('footer');
  ?>

 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 <script src="<?= base_url();?>assets_new/vendor/tinymce/tinymce.min.js"></script>
 <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
 <script src="<?= base_url();?>assets_new/js/main.js"></script> 

<?php $this->load->view('prevent-duplicated-entry');?>
<script>

$(document).ready( function(){


$('.save-new-seguro').click(function(e) { 
 
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        $("#erBox4").html("Debes marcar al menos una casilla por el seguro medico !");
        return false;
      }

});	
	
	
		
	
 });
</script>

	

	 
</body>

</html>