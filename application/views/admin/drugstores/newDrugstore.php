<?php 
$this->load->view('admin/header_admin');
$name=$this->session->userdata['admin_name'];
?>

<div class="container" >


<div class="col-xs-12">
<div class="col-xs-5">
<h3 class="h3 col-xs-offset-5">Crear Nueva Farmacia</h3>
</div>
<div class="col-xs-4">
<span class="del" style="font-size:12px"><?php echo $this->session->flashdata('save_farmacia'); ?></span>
</div>
</div>
<div class="row" id="background_" >

<table class="table table-striped table-hover" style="width:60%; margin: auto;">
<form   class="form-horizontal"  method="post" enctype="multipart/form-data"  action="<?php echo site_url('admin/SaveFarmacia');?>" > 
<tr>
<td class="thh"><label>SELECCIONE EL USUARIO</label><td/>
<td class="vtd">
<select class="form-control select2" name="user_id" id="user_id" required>
<option value="" hidden></option>
<?php
foreach($users as $ro){
?>
<option  value="<?php echo $ro->id_user?>"><?php echo $ro->name?></option>
<?php
}
?>
</select>
</td>

</tr>
<tr>
<td class="thh"><label>NOMBRE DE ASOCIACION</label><td/>
<td class="vtd"><input type="text" class="form-control" name="noma" id="noma" required></td>

</tr>
<tr>
<td class="thh"><label>NOMBRE COMERCIAL </label><td/>
<td class="vtd">
<input type="text" class="form-control" name="nomc" > 
</td>
</tr>


<tr>
<td class="thh"><label>DIRECCION</label> <td/>
<td class="vtd">
<input type="text"  class="form-control" name="dir" id="dir" required> 
</td>
</tr>
<tr>
<td class="thh"><label>TELEFONOS</label><td/>
<td class="vtd" ><input type="text" class="form-control" name="tel" id="tel" required></td> 

</tr>

<tr>
<td class="thh"><label>PAGINA WEB</label><td/>
<td class="vtd"><input type="text" class="form-control" name="web" ></td> 
</tr>

<tr>
<td class="thh"><label>CORREO ELECTRONICO</label><td/>

<td class="vtd"><input type="text" class="form-control" name="email" id="email" required></td> 
</tr>
<tr>
<td class="thh"><label>RNC (REGISTRO NACIONAL DE CONTRUBUYENTE)</label><td/>

<td class="vtd"><input type="text" class="form-control" name="rnc" id="rnc"></td> 
</tr>
<tr>
<td class="thh"><label>REGISTRO SANITARIO</label><td/>

<td class="vtd"><input type="text" class="form-control" name="san" ></td> 
</tr>
<tr>	
<td class="thh"><label>LOGOTIPO</label><td/>

<td >
<label class="logo" >
  <input type="file" name="logo"  >
 Subir Logo
</label>
</td>
</tr>

</table>
</div>
<br/>
<div class="row col-md-offset-4">
<button class="btn-sm btn-success"  id="send" type="submit"  ><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
</div>
</form>
<br/>
</div>

</div><!-- container end -->

<?php $this->load->view('footer');?>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
 $('.del').slideUp(4000);
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




 
//---------------------------------------------------

</script>

</html>