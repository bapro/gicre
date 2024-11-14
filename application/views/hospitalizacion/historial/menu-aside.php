
<?php

if($sexo=='Feminina' || $sexo=='Feminino' ){
$gender_female=1;
$ssr_obs="
<li class='oneEffectClick'><a href='#SSR'  data-toggle='tab' ><i class='fa fa-angle-double-right' ></i> SSR</a></li>
<li class='oneEffectClick'><a href='#Obstetrico'  data-toggle='tab' ><i class='fa fa-angle-double-right' ></i> Obstetrico</a></li>
";
} else {
$gender_female=0;
$ssr_obs="";
}
echo $sexo;

 ?>
 <div class="row" >
<div class="col-sm-2 col-md-2 sidebar" style='background:'>
<span id="gender_female" style="display:none"><?=$gender_female?></span>
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
<li class="active addb oneEffectClick" ><a href="#Datos_personales" class="btn-ex-fg " data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> General</a></li>
<?=$ssr_obs?>
<li class="oneEffectClick"><a href="#Del_Sistema"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Del Sistema</a></li>
<li class="oneEffectClick"><a href="#examen-neurologico"  data-toggle="tab" class="btn-ex-fg"  ><i class="fa fa-angle-double-right" ></i> Ex. Neurologico</a></li>
<li class="evaConCLick ex"><a href="#examen-fisico"  data-toggle="tab"   ><i class="fa fa-angle-double-right" ></i> Examen Fisico <span class="tab-exam-fis" style='position:absolute'></span></a></li>
<li class="hideGuardarAlta"><a href="#conclucion-egreso"  data-toggle="tab" id='loadHospProced'><i class="fa fa-angle-double-right" ></i> Conclusión Del Egreso <span class="tab-conc-eg" style='position:absolute'></span></a></li>
<li class="oneEffectClick"><a><strong>ENFERMERIA</strong></a></li>
<li class="oneEffectClick1"><a href="#kardex" id='load-kardex' data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> KARDEX</a></li>
<li class="oneEffectClick1"><a href="#control-signos-vitales" id='loadContSigVit' data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Control De Signos Vitales</a></li>
<li class="oneEffectClick1"><a href="#insumo" id='loadInsumoIndex'  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Insumo</a></li>
<li class="oneEffectClick1"><a href="#balance-hidrico"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Balance Hídrico</a></li>
<li class="evaConCLick ev"><a href="#eva-con"  data-toggle="tab" ><i class="fa fa-angle-double-right" ></i> Evaluación/Condición</a></li>
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
	
	 $('.evaConCLick').on('click', function(event) {
		 event.preventDefault();
		 $('.general-btn').hide();
		 $('.show-save-ev-con').show();
		let btn = $(this).attr('class').split(' ')[1];
		if(btn=='ev'){
			$('#saveEvaCond').text("Guardar Eva. Cond.");
		}else{
			$('#saveEvaCond').text("Guardar Examen Fis.");
		}
	});


 $('.oneEffectClick').on('click', function(event) {
	 event.preventDefault();
		 $('.guardarSinAlta').show();
		   $('.guardarConAlta').hide();
		  
		   $('.show-save-ev-con').hide();
	});




 $('.oneEffectClick1').on('click', function(event) {
	 event.preventDefault();
		 $('.guardarSinAlta').hide();
		   $('.guardarConAlta').hide();
		  
		   $('.show-save-ev-con').hide();
	});


 $('.hideGuardarAlta').on('click', function(event) {
	 event.preventDefault();
		 $('.guardarSinAlta').hide();
		  $('.show-save-ev-con').hide();
		  $('.guardarConAlta').show();
		 
		 
	});

 </script>