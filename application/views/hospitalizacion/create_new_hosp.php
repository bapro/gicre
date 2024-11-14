<?php


$data['perfil']=$perfil;
$data['id_user']=$id_user;
$data['titleId']=4;

?>
<div class="modal-header alert alert-info" >
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>

<h4>IV- DATOS DE LA HOSPITALIZACION</h4>
<hr/>
<?=$patHeader?>
</div>
<div class="modal-body" id="">
<div id="erBoxHosp" style='color:red'></div>
<form method="post" class="form-horizontal" id="send_data_hospitalizacion" >
<input  type="hidden" name="id_p_a"   value="<?=$id_p_a?>"  >
<input  type="hidden"  name="id_user" value="<?=$id_user?>"  >

<?php $this->load->view('hospitalizacion/new_hosp_form', $data);?>

<div class="form-group">
<div class="col-sm-3" >
 <button type="submit" id='save-hosp' style="float:right" class="btn btn-primary btn-sm " ><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar <span class='save-spiner'></span> </button>
  <input type="hidden"  value="4" id="orientation"/>
</div>
</div>
</div>

</form>
<?php
$data['id_p_ai'] = encrypt_url($id_p_a);
$data['id_useri'] = encrypt_url($id_user);
$data['isSeguroTitle'] =$isSeguroTitle;
?>
 <script src="<?=base_url();?>assets/js/autocomplete.js"></script> 
<?php $this->load->view('hospitalizacion/create_new_hosp_footer', $data );?>


