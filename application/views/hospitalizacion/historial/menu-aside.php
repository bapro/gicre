
<?php

if($sexo=='Feminino'){
$ssr_obs="
<li><a href='#SSR'  data-toggle='tab' ><i class='fa fa-angle-double-right' ></i> SSR</a></li>
<li><a href='#Obstetrico'  data-toggle='tab' ><i class='fa fa-angle-double-right' ></i> Obstetrico</a></li>
";
} else {
$ssr_obs="";
}
echo $sexo;

 ?>
 <div class="row" >
<div class="col-sm-2 col-md-2 sidebar" style='background:'>
<br/>
<?php
$this->padron_database = $this->load->database('padron',TRUE);
foreach($patient as $row)
if($row->photo=="padron"){
$photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');
?>

<a title="Haga un clic para agrandar." data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin_medico/zoom_image/$row->ced1/$row->ced2/$row->ced3")?>">

<?php  echo'<img  class="center-img"  src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';?>
</a>
<?php

} else if($row->photo==""){
	$sex = substr($row->sexo, 0, 3);
echo '<img   class="center-img" src="'.base_url().'/assets/img/user.png"  />';
echo "<a>sexo $sex.</a>";
}
else{

?>
<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin_medico/zoom_image_ad/$patient_id")?>">
<img  class="center-img" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
</a>

<?php

}
?>
<ul  class="nav nav-sidebar " >
<li><a><strong>HOSPITALIZACION</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="btn-ex-fg" data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> General</a></li>
<?=$ssr_obs?>
<li><a href="#Del_Sistema"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Del Sistema</a></li>
<li><a href="#examen-fisico"  data-toggle="tab" class="btn-ex-fg tab-exam"  ><i class="fa fa-angle-double-right" ></i> Examen Fisico</a></li>
<li><a href="#examen-neurologico"  data-toggle="tab" class="btn-ex-fg tab-exam"  ><i class="fa fa-angle-double-right" ></i> Ex. Neurologico</a></li>
<li><a><strong>ENFERMERIA</strong></a></li>
<li><a href="#kardex"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> KARDEX</a></li>
<li><a href="#control-signos-vitales"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Control De Signos Vitales</a></li>
<li><a href="#insumo"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Insumo</a></li>
<li><a href="#balance-hidrico"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Balance Hídrico</a></li>
</ul>
</div>
		
		 <script> 
 $('.btn-gnl').on('click', function(event) {
	 $('.save_ant_gen').show();
	});
	
	 $('.btn-ex-fg').on('click', function(event) {
	 $('.save_ant_gen').show();
	});
	
	
	 $('.btn-oth').on('click', function(event) {
		 $('.save_ant_gen').hide();
	});

 </script>