
<div class="col-xs-7" style="margin-top:-10.7%;position:fixed;z-index:10000;margin-left:10.6%;font-weight:bold;">
 
<?php
echo $this->ajax_pagination->create_links(); 
?> 
</div>

  <?php
  if(!empty($displayRehab)): foreach($displayRehab as $post):
setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($post['inserted_time'])));	
 ?>

<div class="col-md-12" >
 <div class="list-item">
 <div class="col-md-12">
 <button  class="btn-sm btn-success " onclick="window.location.href='<?php echo site_url("admin/newRehabilitation/".$post['id_historial']); ?>'"  ><i class="fa fa-plus" aria-hidden="true"></i> Nuevo Rehabilitacion </button>
  <br/> <br/>
 </div>
<div class="col-md-7" >

<p class=" h4 his_med_title"  >rehabilitacion # <?=$post['id_rehab'] ?></p>
</div>
<div class="col-md-5" >
Ingresado por <?=$post['inserted_by']?> al <?=$insert_date  ?>
</div>

<div class="col-md-12" style="border-top: 2px groove #38a7bb;" >

<h4>MARCHA</h4>

<p style="width:70%;font-size:20px">
Instruciones : El paciente permanece de pie con el examinador, camina por le pasillo o por la habitacion
 (unos 8 metros) a "paso normal" luego regresa a "paso ligero pero seguro".
</p>
<div class="form-group ">
<h4>1. Iniciacion de la marcha (inmediatamente despues de decir que ande)  </h4>
<p><?=$post['marcha_inicio'] ?></p>
</div>
<div class="form-group ">
<h4>2. Longitud y altura del pase </h4>

<label class="control-label">a) Movimiento del pie derecho</label>
<p><?=$post['long_mov_der'] ?></p>
  <label class="control-label">b) Movimiento del pie izquierdo</label>
<p><?=$post['long_mov_izq'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">3. Simetria del pase  </label>
<p><?=$post['long_simetria'] ?></p>
</div>


<div class="form-group ">
<label class="control-label">4. Fluidez del paso  </label>
<p><?=$post['long_fluidez'] ?></p>
</div>



<div class="form-group ">
<label class="control-label">5. Trayectoria (Observar trazado que realiza UN pie por 3 metros)  </label>
<p><?=$post['long_traject'] ?></p>
</div>
<div class="form-group ">
<label class="control-label">6. Tronco  </label>
<p><?=$post['long_tronco'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">7. Postura al caminar  </label>
<p><?=$post['long_postura'] ?></p>
</div>
<br/>
<hr class="title-highline-top"/>
<h4>EQUILIBRIO</h4>

<p style="width:70%;font-size:20px">
Instruciones : El pacienteesta sentado en una silla dura sin apoyabrazos. Se realizan la siguientes maniabras.
</p>


<div class="form-group ">
<label class="control-label">1. Equilibrio Sentado  </label>
<p><?=$post['equi_sentado'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">2. Levantarse  </label>
<p><?=$post['equi_levantarse'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">3. Intentos para levantarse  </label>
<p><?=$post['equi_intentos'] ?></p>
</div>


<div class="form-group ">
<label class="control-label">4. Equilibrio en bipedestacion inmediata (Primeros 5 segundos)  </label>
<p><?=$post['equi_biped1'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">5. Equilibrio en bipedestacion  </label>
<p><?=$post['equi_biped2'] ?></p>
</div>


<div class="form-group ">
<label class="control-label">6. Empuyar  </label>
<p><?=$post['equi_emp'] ?></p>
</div>


<div class="form-group ">
<label class="control-label">7. Ojos cerrados  </label>
<p><?=$post['equi_ojos'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">8. Vuelta de 360 grados  </label>
<p><?=$post['equi_vuelta'] ?></p>
</div>

<div class="form-group ">
<label class="control-label">9. Sentarse  </label>
<p><?=$post['equi_sentarse'] ?></p>
</div>


<br/>
<hr class="title-highline-top"/>
<p style="width:70%;font-size:20px">Puntuacion Marcha (s/12) 14<br/>
Puntuacion Equilibrio (s/16) 22<br/>
Puntuacion total (s/28) 36</p>

<div class="form-group ">
<h4>Evalucion Balance System  </h4>
<label class="control-label" >1. Riesgo de caida </label>
<p><?=$post['eval_balsys'] ?></p>
	
	<label class="control-label" >2. Movimiento del pie izquierdo </label>
<p><?=$post['eval_movim'] ?></p>
 	<label class="control-label" >3. Evalucion Monopodal </label>
<p><?=$post['eval_monop'] ?></p>
</div>

<br/>
<hr class="title-highline-top"/>
<p style="width:70%;font-size:20px">Indice de Discapacidad de Oswestr (ODI) Version 2.0<br/>
Cuestionario de Discapacidad de Oswestry y para Dolor de Espalda<br/>
</p>

<div class="form-group ">
<h4>Criterios  </h4>
<label class="control-label" >1. Intensidad del dolor </label>
<p><?=$post['criteria_intens'] ?></p>
	<label class="control-label" >2. Cuidados personales </label>
<p><?=$post['criteria_cuidado1'] ?></p>
<label class="control-label" >3. Levantar peso </label>
<p><?=$post['levantar_peso'] ?></p>
	<label class="control-label" >4. Caminar </label>
<p><?=$post['criteria_caminar'] ?></p>
 
   	<label class="control-label" >5. Estar sentado </label>
<p><?=$post['criteria_estar_sent'] ?></p>
 <label class="control-label" >6. Dormir </label>
<p><?=$post['criteria_dormir'] ?></p>
     	<label class="control-label" >7. Actividad sexual </label>
<p><?=$post['criteria_sexual'] ?></p>
      	<label class="control-label" >8. Vida social </label>
<p><?=$post['criteria_vida'] ?></p>
 
</div>
</div>
</div>
</div>				

 <?php endforeach; else: ?>
 <p>Post(s) not available.</p>
 <?php endif; ?>
