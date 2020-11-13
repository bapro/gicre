   <style>
   .hide_pagination{display:none}
   </style>
   <div class="col-md-12" style="margin-top:-6%">
   <ul class="pagination" id="ajax_pagingsearc">
    <p><?php echo $this->pagination->create_links(); ?></p>
    </ul>
	</div>
   <?php
    foreach($results as $row) {
		 setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
$insert_date = iconv('ISO-8859-2', 'UTF-8', strftime("%d %B %Y %X", strtotime($row->inserted_time)));	

		?>
  <div class="col-md-12" style="border-bottom: 2px groove #38a7bb;">
<div class="col-md-7" >
<button  style="margin-top:-11%;margin-left:66%" class="btn-sm btn-success historial_save push-save-down" id="submit"  type="submit"  ><i class="fa fa-print" aria-hidden="true"></i> Imprimir</button>
 
<p class=" h4 his_med_title"  >rehabilitacion # <?=$row->id_rehab ?></p>
</div>
<div class="col-md-5" >
Ingresado por <?=$row->inserted_by  ?> al <?=$insert_date ?>
</div>
</div>

<div class="col-md-12" >

<h4>MARCHA</h4>

<p style="width:70%;font-size:20px">
Instruciones : El paciente permanece de pie con el examinador, camina por le pasillo o por la habitacion
 (unos 8 metros) a "paso normal" luego regresa a "paso ligero pero seguro".
</p>
<div class="form-group ">
<h4>1. Iniciacion de la marcha (inmediatamente despues de decir que ande)  </h4>
<p><?=$row->marcha_inicio ?></p>
</div>
<div class="form-group ">
<h4>2. Longitud y altura del pase </h4>

<label class="control-label">a) Movimiento del pie derecho</label>
<p><?=$row->long_mov_der ?></p>
  <label class="control-label">b) Movimiento del pie izquierdo</label>
<p><?=$row->long_mov_izq ?></p>
</div>

<div class="form-group ">
<label class="control-label">3. Simetria del pase  </label>
<p><?=$row->long_simetria ?></p>
</div>


<div class="form-group ">
<label class="control-label">4. Fluidez del paso  </label>
<p><?=$row->long_fluidez ?></p>
</div>



<div class="form-group ">
<label class="control-label">5. Trayectoria (Observar trazado que realiza UN pie por 3 metros)  </label>
<p><?=$row->long_traject ?></p>
</div>
<div class="form-group ">
<label class="control-label">6. Tronco  </label>
<p><?=$row->long_tronco  ?></p>
</div>

<div class="form-group ">
<label class="control-label">7. Postura al caminar  </label>
<p><?=$row->long_postura   ?></p>
</div>
<br/>
<hr class="title-highline-top"/>
<h4>EQUILIBRIO</h4>

<p style="width:70%;font-size:20px">
Instruciones : El pacienteesta sentado en una silla dura sin apoyabrazos. Se realizan la siguientes maniabras.
</p>


<div class="form-group ">
<label class="control-label">1. Equilibrio Sentado  </label>
<p><?=$row->equi_sentado ?></p>
</div>

<div class="form-group ">
<label class="control-label">2. Levantarse  </label>
<p><?=$row->equi_levantarse ?></p>
</div>

<div class="form-group ">
<label class="control-label">3. Intentos para levantarse  </label>
<p><?=$row->equi_intentos ?></p>
</div>


<div class="form-group ">
<label class="control-label">4. Equilibrio en bipedestacion inmediata (Primeros 5 segundos)  </label>
<p><?=$row->equi_biped1 ?></p>
</div>

<div class="form-group ">
<label class="control-label">5. Equilibrio en bipedestacion  </label>
<p><?=$row->equi_biped2 ?></p>
</div>


<div class="form-group ">
<label class="control-label">6. Empuyar  </label>
<p><?=$row->equi_emp ?></p>
</div>


<div class="form-group ">
<label class="control-label">7. Ojos cerrados  </label>
<p><?=$row->equi_ojos ?></p>
</div>

<div class="form-group ">
<label class="control-label">8. Vuelta de 360 grados  </label>
<p><?=$row->equi_vuelta  ?></p>
</div>

<div class="form-group ">
<label class="control-label">9. Sentarse  </label>
<p><?=$row->equi_sentarse  ?></p>
</div>


<br/>
<hr class="title-highline-top"/>
<p style="width:70%;font-size:20px">Puntuacion Marcha (s/12) 14<br/>
Puntuacion Equilibrio (s/16) 22<br/>
Puntuacion total (s/28) 36</p>

<div class="form-group ">
<h4>Evalucion Balance System  </h4>
<label class="control-label" >1. Riesgo de caida </label>
<p><?=$row->eval_balsys ?></p>
	
	<label class="control-label" >2. Movimiento del pie izquierdo </label>
<p><?=$row->eval_movim ?></p>
 	<label class="control-label" >3. Evalucion Monopodal </label>
<p><?=$row->eval_monop?></p>
</div>

<br/>
<hr class="title-highline-top"/>
<p style="width:70%;font-size:20px">Indice de Discapacidad de Oswestr (ODI) Version 2.0<br/>
Cuestionario de Discapacidad de Oswestry y para Dolor de Espalda<br/>
</p>

<div class="form-group ">
<h4>Criterios  </h4>
<label class="control-label" >1. Intensidad del dolor </label>
<p><?=$row->criteria_intens ?></p>
	<label class="control-label" >2. Cuidados personales </label>
<p><?=$row->criteria_cuidado1 ?></p>
<label class="control-label" >3. Levantar peso </label>
<p><?=$row->levantar_peso  ?></p>
	<label class="control-label" >4. Caminar </label>
<p><?=$row->criteria_caminar ?></p>
 
   	<label class="control-label" >5. Estar sentado </label>
<p><?=$row->criteria_estar_sent  ?></p>
 <label class="control-label" >6. Dormir </label>
<p><?=$row->criteria_dormir  ?></p>
     	<label class="control-label" >7. Actividad sexual </label>
<p><?=$row->criteria_sexual  ?></p>
      	<label class="control-label" >8. Vida social </label>
<p><?=$row->criteria_vida  ?></p>
 
</div>

</div>
<?php
    }
    ?>
    