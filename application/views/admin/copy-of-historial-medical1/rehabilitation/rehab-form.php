<div  style="overflow-x:auto;">

<h3 class=" h3 his_med_title" >rehabilitacion (<b><?=$count_rehab?> regitros (s)</b>)



</h3>
<br/>
<?php if ($count_rehab > 0)
{

$i = 1;
 foreach($rehab as $row)
{
$user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<div class="pagination">
<a title="Creado por :<?=$user_c18?> , fecha : <?=$inserted_time?> &#013 Cambiado por :<?=$user_c19?>, fecha :<?=$updated_time?>" data-toggle="modal" data-target="#ver_rehab" href="<?php echo base_url("admin_medico/showRehabById/$row->id_rehab/$user_id")?>">
<?php echo $i; $i++;  ?>
</a></div>
<?php
}
?>

<br/>

<?php
}
else{
	echo "<i><b>No hay registros</b></i>";
}
?>
 <hr class="title-highline-top"/>
 <div id="show_rehab_after_select"></div>
<div  id="hide_rehab_after_select">
<div  id="flash-reab" class="col-md-12">

<h3>I- MARCHA</h3>
<!--
<p style="width:70%;font-size:20px">
Instruciones : El paciente permanece de pie con el examinador, camina por le pasillo o por la habitacion
 (unos 8 metros) a "paso normal" luego regresa a "paso ligero pero seguro".
</p>-->
<div class="col-md-7">
<div class="form-group ">
<label class="control-label">1. Iniciacion de la marcha (inmediatamente despues de decir que ande) <font style="color:red"><strong>*</strong></font> </label>
<select  class="form-control select2"   id="marcha_inicio" >
<option value="" hidden>Seleccionar</option>
<option>Algunas valcilaciones o multiples para empezar</option>
<option>No vacila</option>
</select>
</div>


<div class="form-group ">
<h3>II. LONGITUD Y ALTURA DEL PASO</h3>

<label class="control-label">a) Movimiento del pie derecho </label>
<select  class="form-control select2"   id="long_mov_der" >
<option value="" hidden>Seleccionar</option>
<option>No sobrepasa el pie izquierdo con el paso</option>
    <option>Sobrepasa el pie izquierdo</option>
	 <option>El pie derecho no se separa completamento del suelo con el paso</option>
    <option>El pie derecho se separa completamento del suelo con el paso</option>
  </select>
  <label class="control-label">b) Movimiento del pie izquierdo </label>
  <select  class="form-control select2"   id="long_mov_izq" >
<option value="" hidden>Seleccionar</option>
<option>No sobrepasa el pie derecho con el paso</option>
    <option>Sobrepasa el pie derecho</option>
	 <option>El pie izquierdo no se separa completamento del suelo con el paso</option>
    <option>El pie izquierdo se separa completamento del suelo con el paso</option>
 </select>
</div>

<div class="form-group ">
<label class="control-label">3. Simetria del pase  </label>
<select  class="form-control select2"  id="long_simetria" >
<option value="" hidden>Seleccionar</option>
<option>La longitud de los pasos con los pies derecho e izquierdo no se igual</option>
<option>La longitud parece igual</option>
</select>
</div>


<div class="form-group ">
<label class="control-label">4. Fluidez del paso   </label>
<select  class="form-control select2"   id="long_fluidez" >
<option value="" hidden>Seleccionar</option>
<option>Paradas entre los pasos</option>
<option>Los pasos parecen continuos</option>
</select>
</div>



<div class="form-group ">
<label class="control-label">5. Trayectoria (Observar trazado que realiza UN pie por 3 metros)   </label>
<select  class="form-control select2"   id="long_traject" >
<option value="" hidden>Seleccionar</option>
<option>Desviacion grave de la trayectoria</option>
<option>Leve/Moderada desviacion o uso de ayudas para mantener trayectoria</option>
<option>Sin deviacion o ayudas</option>
</select>
</div>
<div class="form-group ">
<label class="control-label">6. Tronco   </label>
<select  class="form-control select2"  id="long_tronco" >
<option value="" hidden>Seleccionar</option>
<optgroup label="Balanceo marcado o uso de ayudas">
<option>Desviacion grave de la trayectoria</option>
<option>No balancea pero flexiona rodilla/espalda o separa brazos al caminar</option>
<option>No se balancea, no flexiona, ni otras ayudas</option>
</optgroup>
</select>
</div>

<div class="form-group ">
<label class="control-label">7. Postura al caminar   </label>
<select  class="form-control select2"  id="long_postura" >
<option value="" hidden>Seleccionar</option>
<option>Talones separdos</option>
<option>Talones casi juntos al caminar</option>
</select>
</div>

<br/>

<h3>III- EQUILIBRIO</h3>
<!--
<p style="width:70%;font-size:20px">
Instruciones : El pacienteesta sentado en una silla dura sin apoyabrazos. Se realizan la siguientes maniabras.
</p>

-->
<div class="form-group ">
<label class="control-label">1. Equilibrio Sentado  </label>
<select  class="form-control select2"  id="equi_sentado" >
<option value="" hidden>Seleccionar</option>
<option>Se inclina o se desliza en la silla</option>
<option>Se mantiene seguro</option>
</select>
</div>

<div class="form-group ">
<label class="control-label">2. Levantarse  </label>
<select  class="form-control select2"  id="equi_levantarse" >
<option value="" hidden>Seleccionar</option>
<option>Imposible sin ayuda</option>
<option>Capaz pero necesita mas de un intento</option>
<option>Capaz de levantarse de un solo intento</option>
</select>
</div>

<div class="form-group ">
<label class="control-label">3. Intentos para levantarse  </label>
<select  class="form-control select2"   id="equi_intentos" >
<option value="" hidden>Seleccionar</option>
<option>Incapaz sin ayuda</option>
<option>Capaz pero necesita mas de un intento</option>
<option>Capaz de levantarse de un solo intento</option>
</select>
</div>


<div class="form-group ">
<label class="control-label">4. Equilibrio en bipedestacion inmediata (Primeros 5 segundos)  </label>
<select  class="form-control select2"  id="equi_biped1" >
<option value="" hidden>Seleccionar</option>
<option>Inestable (tambalea, mueve los pies), marcado balanceo de tronco</option>
<option>Estable pero usa andador/baston/se aferra a algo para mantenerse</option>
<option>Estable sin andador, baston u otros soportes</option>
</select>
</div>

<div class="form-group ">
<label class="control-label">5. Equilibrio en bipedestacion  </label>
<select  class="form-control select2"  id="equi_biped2" >
<option value="" hidden>Seleccionar</option>
<option>Inestable</option>
<option>Estable c/apoyo amplio (Separacion talones mayor de 10cm) o usa baston/otro soporte</option>
<option>Apoyo estrecho sin soporte</option>
</select>
</div>


<div class="form-group ">
<label class="control-label">6. Empuyar  </label>
<select  class="form-control select2"  id="equi_emp" >
<option value="" hidden>Seleccionar</option>
<option>Px en bipedestacion, tronco erecto y pies tan juntos como posible. El examinador empuya suavemente en el esternon del Px con la palma de la mano, 3 veces</option>
<option>Empieza a caerse</option>
<option>Se tambalea, se agarra, pero se mantiene</option>
<option>Estable</option>
</select>
</div>


<div class="form-group ">
<label class="control-label">7. Ojos cerrados  </label>
<select  class="form-control select2"  id="equi_ojos" >
<option value="" hidden>Seleccionar</option>
<option>Inestable</option>
<option>Estable</option>
</select>
</div>

<div class="form-group ">
<label class="control-label">8. Vuelta de 360 grados  </label>
<select  class="form-control select2"   id="equi_vuelta" >
<option value="" hidden>Seleccionar</option>
<option>Pasos discontinuos</option>
<option>Pasos continuos</option>
<option>Inestable (Se tambalea, se agarra)</option>
<option>Estable</option>
</select>
</div>

<div class="form-group ">
<label class="control-label">9. Sentarse  </label>
<select  class="form-control select2"   id="equi_sentarse" >
<option value="" hidden>Seleccionar</option>
<option>Inseguro, calcula mal la distancia, cae en la silla</option>
<option>Usa los brazos o el movimiento es brusco</option>
<option>Seguro, movimiento suave</option>
<option>Seguro, movimiento suave</option>
</select>
</div>
<br/>

<!--<p style="width:70%;font-size:20px">Puntuacion Marcha (s/12) 14<br/>
Puntuacion Equilibrio (s/16) 22<br/>
Puntuacion total (s/28) 36</p>
-->
<div class="form-group ">
<h3>IV- EVALUACION BALANCE SYSTEM</h3>
<label class="control-label" >1. Riesgo de caida </label>
<select  class="form-control select2"  id="eval_balsys" >
<option value="" hidden>Seleccionar</option>
<option>Presenta buena estabilidad</option>
    <option>Presenta leve riesgo de caida</option>
	<option>Presenta leve riesgo de caida</option>
	</select>
	
	<label class="control-label" >2. Movimiento del pie izquierdo </label>
<select  class="form-control select2"   id="eval_movim" >
<option value="" hidden>Seleccionar</option>

<option>No sobrepasa el pie derecho con el paso</option>
    <option>Sobrepasa el pie derecho</option>
	 <option>El pie izquierdo no se separa completamento del suelo con el paso</option>
    <option>El pie izquierdo se separa completamento del suelo con el paso</option>
 </select>
 
 
 	<label class="control-label" >3. Evalucion Monopodal </label>
<select  class="form-control select2"   id="eval_monop" >
<option value="" hidden>Seleccionar</option>

<option>No presenta dificultad al equilibrio</option>
    <option>No presenta leve dificultad al equilibrio</option>
	 <option>No presenta alta dificultad al equilibrio</option>
 </select>
</div>

<br/>

<!--<p style="width:70%;font-size:20px">Indice de Discapacidad de Oswestr (ODI) Version 2.0<br/>
Cuestionario de Discapacidad de Oswestry y para Dolor de Espalda<br/>
</p>
-->
<div class="form-group ">
<h3>V- CRITERIOS</h3>
<label class="control-label" >1. Intensidad del dolor </label>
<select  class="form-control select2"   id="criteria_intens" >
<option value="" hidden>Seleccionar</option>
<option>Puedo soportar el dolor sin necesidad de tomar calmantes</option>
    <option>El dolor es fuerte pero me manejo sin tomar calmantes</option>
	<option>Los calmantes me alivian completamente el dolor</option>
	<option>Los calmantes me alivian un poco el dolor</option>
    <option>Los calmantes apenas me alivian el dolor</option>
	<option>Los calmantes ne me alivian el dolor y no los tomo</option>
	</select>
	
	<label class="control-label" >2. Cuidados personales </label>
<select  class="form-control select2"  id="criteria_cuidado1" >
<option value="" hidden>Seleccionar</option>

<option>Me las puedo arreglar solo sin que me aumente el dolor</option>
    <option>Me las puedo arreglar solo pero esto me aumenta el dolor</option>
	 <option>Los cuidados personales me producen dolor y tengo que hacerlo despacio y con cuida</option>
	 <option>Necesito alguna ayudapero consigo hacer la mayoria de las cosas yo solo</option>
    <option>Necesito ayuda para hacer la mayoria de las cosas</option>
	 <option>No puedo vestirme, me cuesta lavarme y suelo quedarme en la cama</option>
 </select>
 
 
 	<label class="control-label" >3. Levantar peso </label>
<select  class="form-control select2"  id="levantar_peso" >
<option value="" hidden>Seleccionar</option>

<option>Puedo levantar objetos pesados sin que me aumente el dolor</option>
    <option>Puedo levantar objetos pesado pero me aumenta el dolor</option>
	 <option>El dolor me impide levatar objetos pesados del suelo, pero puedo hacerlo si estan en u sitio comodo (ej. en una mesa)</option>
	 <option>El dolor me impide levatar objetos pesados del suelo, pero si peudo levantar objetos ligeros o medianos si estan en un sitio comodo</option>
    <option>Solo puedo levantar objetos muy ligeros</option>
	 <option>No puedo levantar ni acarrear ningun objeto</option>
 </select>
 
 
  	<label class="control-label" >4. Caminar </label>
<select  class="form-control select2"   id="criteria_caminar" >
<option value="" hidden>Seleccionar</option>

<option>El dolor no me impide caminar cualquier distancia</option>
    <option>El dolor me impide caminar mas de un kilometro</option>
	 <option>El dolor me impide mas de 500 metros</option>
	 <option>El dolor me impide mas de 250 metros</option>
	 <option>Solo puedo caminar con baston o muletas</option>
	 <option>Permanezco en la cama casi todo el tiempo y tengo que ir a rastras al bano</option>
 </select>
 
   	<label class="control-label" >5. Estar sentado </label>
<select  class="form-control select2"   id="criteria_estar_sent" >
<option value="" hidden>Seleccionar</option>

<option>Puedo estar de pie tanto tiempo como quiera sin que me aumente el doctor</option>
    <option>Solo puedo estar sentado en mi silla favorita todo el tiempo que quiera</option>
	 <option>El dolor me impide estar sentado mas de una hora</option>
	 <option>El dolor me impide estar sentado mas de media hora</option>
	 <option>El dolor me impide estar sentado mas de 10 minutos</option>
	 <option>>El dolor me impide estar sentado</option>
 </select>
 
 
 <label class="control-label" >6. Dormir </label>
<select  class="form-control select2"  id="criteria_dormir" >
<option value="" hidden>Seleccionar</option>

<option>El dolor no me impide dormir bien</option>
    <option>Solo puedo dormir si tomo pastillas</option>
	 <option>Incluso tomando pastillas duermo menos de 6 horas</option>
	  <option>Incluso tomando pastillas duermo menos de 4 horas</option>
	 <option>Incluso tomando pastillas duermo menos de 2 horas</option>
	 <option>El dolor me impide totalmente dormir</option>
 </select>
 
     	<label class="control-label" >7. Actividad sexual </label>
<select  class="form-control select2"   id="criteria_sexual" >
<option value="" hidden>Seleccionar</option>

<option>Mi actividad sexual es normal y no me aumente el dolor</option>
    <option>Mi actividad sexual es normal pero me aumente el dolor</option>
	 <option>Mi actividad sexual es casi normal pero me aumente mucho el dolor</option>
	  <option>Mi actividad sexual se ha visto muy limitada a causa del dolor</option>
	 <option>Mi actividad sexual es casi nula a causa del dolor</option>
	 <option>El dolor me impide todo tipo de actividad sexual</option>
 </select>
 
 
      	<label class="control-label" >8. Vida social </label>
<select  class="form-control select2"   id="criteria_vida" >
<option value="" hidden>Seleccionar</option>

<option>Mi vida social es normal y no me aumenta el dolor</option>
    <option>Mi vida social es normal pero me aumenta el dolor</option>
	 <option>El doctor no tieni un efecto importante en mi vida social, pero si impide mis actividades mas energicas como bailar</option>
	  <option>El dolor ha limitado mi vida social y no salgo tan a menudo</option>
	 <option>El doctor ha limitado mi vida social al hogar</option>
	 <option>No tengo vida social a causa del dolor</option>
 </select>
 
</div>
</div>
</div>
</div>

</div>

<script>
$(".select2").select2({
tags: true
});
</script>