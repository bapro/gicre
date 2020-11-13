<br/>
<?php
foreach ($query as $row)
$labo= $this->db->select('nombre_comercial')->join('user_tecnico_lentes', 'labo_lentes.id = user_tecnico_lentes.id_tecnico_lentes')->where('id_user',$id_doc)->get('labo_lentes')->row('nombre_comercial');
 
?>
 <div class="container">
 <div class="col-md-9"><h2   class="h2">Cuenta <?=$row->perfil?></h2></div>
 <div class="col-md-12">
 <?php echo $this->session->flashdata('success_msg');?>

 <div class="col-md-3">
 <span class="hide-mes-pas"><?php echo $this->session->flashdata('msg_pass'); ?></span>
<a style="color:red" href="<?php echo site_url("admin_medico/changePassw/$id_doc/$id_cu_us");?>"data-toggle="modal"   data-target="#changepassw" ><i class="fa fa-pencil"></i>  Cambiar Contraseña</a>
 </div>
 <hr/>
</div>

<div class="col-sm-row show_centro"  id="background_" >

<form   class="form-horizontal"  method="post"  action="<?php echo site_url('admin_medico/saveDoctorUpdate');?>" enctype="multipart/form-data" > 
<br/>

<input class="form-control" value="<?=$id_doc?>" name="id_user"  id="id_user"  type="hidden">

<div class="form-group">
<label class="control-label col-sm-3" >Nombres Apellidos</label>
<div class="col-sm-5">
<input class="form-control" value="<?=$row->name?>" name="nombre" id="nombre"  type="text" >
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-3" >Nombre usuario</label>
<div class="col-sm-8">
<input class="form-control" name="user" id="user" type="text" value="<?=$row->username?>">
</div>
</div>

 <div class="form-group" >
<label class="control-label col-sm-3" >Correo electronico</label>
<div class="col-sm-7">
<input  class="form-control" name="email" id="email"  value="<?=$row->correo?>" type="email" autocomplete="off">

</div>
</div>
<div class="form-group">
<label class="control-label col-sm-3">Telefono celular</label>
<div class="col-sm-3">
<input type="text" class="form-control" id="primer_tel" name="primer_tel" value="<?=$row->cell_phone?>" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-3">Laboratorio de lentes</label>
<div class="col-sm-3">
<?=$labo?>
</div>
</div>


<div class="form-group">

<div class="col-sm-5 col-md-offset-2">

<button type="submit" id="save"  class="btn btn-primary" disabled>Guardar</button>
<br/><br/>
</div>
</div>

</form>
</div>
</div>
<div class="modal fade" id="changepassw" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
</div>
 <?php 
 
 
        $this->load->view('footer');


 ?>
 	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	 
  <script src="<?=base_url();?>assets/js/custom.js"></script> 