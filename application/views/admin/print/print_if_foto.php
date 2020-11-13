<div class="modal-header"  id="background_">

<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3><i class="fa fa-print"></i>  IMPRIMIR CON LA FORMA VERTICAL</h3>
 </div>
<div class="modal-body">
<div class="row">
<div class="col-md-6 col-md-offset-1">

<?php 
if($user=='lab'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_laboratorios/'.$historial_id.'/'.$area.'/'.$user.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_laboratorios/'.$historial_id.'/'.$area.'/'.$user.'/0" > sin la foto</a>';	
}else if($user=='rec'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_recetas/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_recetas/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='gnl'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_ant_gnrl/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_ant_gnrl/'.$historial_id.'/0" > sin la foto</a>';	
}


else if($user=='pedia'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_ant_pedia/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_ant_pedia/'.$historial_id.'/0" > sin la foto</a>';	
}



else if($user=='enf'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_enf_act/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_enf_act/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='diag'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_conc_d/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_conc_d/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='examfis'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_exa_f/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_exa_f/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='ssr'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_ssr/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_ssr/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='rehab'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_rehab/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_rehab/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='obs'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_ant_obs/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_ant_obs/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='ofal'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/oftal/'.$historial_id.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/oftal/'.$historial_id.'/0" > sin la foto</a>';	
}

else if($user=='emMed'){
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/emMed/'.$historial_id.'/'.$id.'/'.$area.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/emMed/'.$historial_id.'/'.$id.'/'.$area.'/0" > sin la foto</a>';	
}



else {	
$url1='<a target="_blank"  class="btn btn-primary btn-md"  href="'.base_url().'printings/print_estudios/'.$historial_id.'/'.$id.'/'.$area.'/'.$user.'/1" > con la foto</a>';	
$url2='<a target="_blank"  class="btn btn-primary btn-md" href="'.base_url().'printings/print_estudios/'.$historial_id.'/'.$id.'/'.$area.'/'.$user.'/0" > sin la foto</a>';	
}
echo $url1; echo"   ";echo $url2;
?>

