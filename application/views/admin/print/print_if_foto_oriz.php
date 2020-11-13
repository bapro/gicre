<div class="modal-header"  id="background_">

<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3><i class="fa fa-print"></i>  IMPRIMIR FORMA HORIZONTAL</h3>
 </div>
<div class="modal-body">
<div class="row">
<div class="col-md-6 col-md-offset-1">

<?php 
 if($user=='rec'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_recetas_horizontal/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_recetas_horizontal/'.$historial_id.'/0" > sin la foto</a>';	
}
else{
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_laboratorios_horiz/'.$historial_id.'/'.$area.'/'.$user.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_laboratorios_horiz/'.$historial_id.'/'.$area.'/'.$user.'/0"> sin la foto</a>';	
}

echo $url1; echo"   ";echo $url2;
?>

