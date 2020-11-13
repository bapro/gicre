<style>
th{text-align:right}
</style>
<div class='container' id='backgroud_'>
<h3>ENVIAR ENLACE DE ZOOM AL PACIENTE</h3>
<form    method="post"  action="<?php echo site_url('navigation/sendZoom');?>" > 

<table class='table'>
<tr>
<th></th> <td style='color:red'><?=$this->session->flashdata('error-fail');?></td>
</tr>
<tr>
<th>Paciente</th> <td><?=$nombre?> <input name='nombre' type='hidden' value='<?=$nombre?>'/>   <input name='idpat' type='hidden' value='<?=$idpat?>'/></td>
</tr>
<tr>
<th> Email</th> <td><?=$email?><input name='email' type='hidden' value='<?=$email?>'/> <input name='doctor' type='hidden' value='<?=$doctor?>'/></td>
</tr>
<tr>
<th>Enlace de Zoom</th><td> <input type='text' name='zoom-link' class="form-control" value='<?=$zoomlink?>' placeholder='Copiar y pegar el enlace de Zoom'/></td>
</tr>
<tr>
<th>
 <button type="submit" id="sendc" style="float:right" class="btn btn-primary btn-sm " >  Enviar </button>
</th>
<td style='text-align:left'>

</td> 

</tr>

 </table>


 </form>
  </div>
  <script>
  if()
  </script>