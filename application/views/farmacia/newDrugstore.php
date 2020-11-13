
<!-- owl carousel css -->
<style>
td,th{text-align:left}


</style>

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
<form   class="form-horizontal"  method="post" enctype="multipart/form-data"  action="<?php echo site_url('farmacia/SaveFarmacia');?>" > 
<input type="hidden" class="form-control" name="user_id" value="<?php echo $id_user?>">
<tr>
<td class="thh"><label>NOMBRE DE ASOCIACION</label><td/>
<td class="vtd"><input type="text" class="form-control" name="noma" ></td>

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
<input type="text"  class="form-control" name="dir"> 
</td>
</tr>
<tr>
<td class="thh"><label>TELEFONOS</label><td/>
<td class="vtd" ><input type="text" class="form-control" name="tel"></td> 

</tr>

<tr>
<td class="thh"><label>PAGINA WEB</label><td/>
<td class="vtd"><input type="text" class="form-control" name="web" ></td> 
</tr>

<tr>
<td class="thh"><label>CORREO ELECTRONICO</label><td/>

<td class="vtd"><input type="text" class="form-control" name="email" ></td> 
</tr>
<tr>
<td class="thh"><label>RNC (REGISTRO NACIONAL DE CONTRUBUYENTE)</label><td/>

<td class="vtd"><input type="text" class="form-control" name="rnc"></td> 
</tr>
<tr>
<td class="thh"><label>REGISTRO SANITARIO</label><td/>

<td class="vtd"><input type="text" class="form-control" name="san" ></td> 
</tr>
<tr>	
<td class="thh"><label>LOGOTIPO</label><td/>

<td >
<input type="file" name="logo"  >

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
$('#send').click(function(e) {
var pass1 = $("#pass1").val();
var pass2 = $("#pass2").val();
 if(pass1 != pass2){
$("#pass2").focus();
$('#pass2').css('border-color', 'red'); 
$("#errorBox").html("Las contraseñas no coinciden");
return false;
}

});	
</script>

</html>