<?php
foreach($showRehabById as $row)

$user_c20=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c21=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');
	
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
?>
<style>
label{text-transform:lowercase}

.control-label{font-size:16px}
@media (min-width: 768px) {
  .modal-inc-width9 {
    width: 90%;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
 
}

</style>

<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<div class="col-md-12 col-md-offset-2" >
<h3 class="modal-title"  >Rehabilitacion # <span class="round"><?=$row->id_rehab?></span> </h3><br/>
<h5 class="modal-title"  >Creado por :<?=$user_c20?> | fecha :<?=$inserted_time?> | <span style="color:red"> Cambiado por :<?=$user_c21?> | fecha :<?=$updated_time?></span> </h5>
 <br/>
 <?php if($row->id_user==$id_user || $perfil=="Admin") {?>
<button type="button" class="show_modif_rehab btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>

<?php }?>

<button type="button" id="save_rehab_hide" class="save_rehab_hide btn-sm btn-success" style="display:none"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 <a target="_blank"   href="<?php echo base_url("printings/print_if_foto_/$row->id_rehab/0/0/rehab")?>"  style="cursor:pointer" title="Imprimir Rehabilitacion" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

 <br/>
 </div>
</div>

<div class="modal-body" style="max-height: calc(100vh - 210px); overflow-y: auto;">
<div  class="col-md-12 col-md-offset-2">
<form  class="form-horizontal disable-all" >
<input type="hidden" id="id_rehab" value="<?=$row->id_rehab?>">
<input type="hidden" id="updated_by" value="<?=$user?>">

<h4>MARCHA</h4>
<div class="form-group">
<div class="col-md-6">
<label class="control-label" >1. Iniciacion de la marcha (inmediatamente despues de decir que ande) </label>

<select  class="form-control select-drh" disabled   id="marcha_inicio1" >
<option hidden><?=$row->marcha_inicio ?></option>
<option>Algunas valcilaciones o multiples para empezar</option>
<option>No vacila</option>
</select>
</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<h4>2. LONGITUD Y ALTURA DEL PASE </h4>

<label class="control-label">a) Movimiento del pie derecho</label>
<select  class="form-control select-drh" disabled   id="long_mov_der1" >
<option  hidden><?=$row->long_mov_der ?></option>
<option>No sobrepasa el pie izquierdo con el paso</option>
    <option>Sobrepasa el pie izquierdo</option>
	 <option>El pie derecho no se separa completamento del suelo con el paso</option>
    <option>El pie derecho se separa completamento del suelo con el paso</option>
  </select>
 <label class="control-label">b) Movimiento del pie izquierdo</label>
 
   <select  class="form-control select-drh" disabled   id="long_mov_izq1" >
<option hidden><?=$row->long_mov_izq ?></option>
<option>No sobrepasa el pie derecho con el paso</option>
    <option>Sobrepasa el pie derecho</option>
	 <option>El pie izquierdo no se separa completamento del suelo con el paso</option>
    <option>El pie izquierdo se separa completamento del suelo con el paso</option>
 </select>

</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<label class="control-label">3. Simetria del pase  </label>
<select  class="form-control select-drh" disabled  id="long_simetria1" >
<option  hidden><?=$row->long_simetria ?></option>
<option>La longitud de los pasos con los pies derecho e izquierdo no se igual</option>
<option>La longitud parece igual</option>
</select>
</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<label class="control-label">4. Fluidez del paso  </label>
<select  class="form-control select-drh" disabled   id="long_fluidez1" >
<option hidden><?=$row->long_fluidez ?></option>
<option>Paradas entre los pasos</option>
<option>Los pasos parecen continuos</option>
</select>
</div>
</div>


<div class="form-group ">
<div class="col-md-6">
<label class="control-label">5. Trayectoria (Observar trazado que realiza UN pie por 3 metros)  </label>
<select  class="form-control select-drh" disabled   id="long_traject1" >
<option  hidden><?=$row->long_traject ?></option>
<option>Desviacion grave de la trayectoria</option>
<option>Leve/Moderada desviacion o uso de ayudas para mantener trayectoria</option>
<option>Sin deviacion o ayudas</option>
</select>
</div>
</div>





<div class="form-group ">
<div class="col-md-6">
<label class="control-label">6. Tronco  </label>
<select  class="form-control select-drh" disabled  id="long_tronco1" >
<option  hidden><?=$row->long_tronco ?></option>
<optgroup label="Balanceo marcado o uso de ayudas">
<option>Desviacion grave de la trayectoria</option>
<option>No balancea pero flexiona rodilla/espalda o separa brazos al caminar</option>
<option>No se balancea, no flexiona, ni otras ayudas</option>
</optgroup>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">7. Postura al caminar  </label>
<select  class="form-control select-drh" disabled  id="long_postura1" >
<option  hidden><?=$row->long_postura ?></option>
<option>Talones separdos</option>
<option>Talones casi juntos al caminar</option>
</select>
</div>
</div>



<br/>
<hr class="title-highline-top"/>
<h4>EQUILIBRIO</h4>


<div class="form-group ">
<div class="col-md-6">
<label class="control-label">1. Equilibrio Sentado  </label>
<select  class="form-control select-drh" disabled  id="equi_sentado1" >
<option  hidden><?=$row->equi_sentado ?></option>
<option>Se inclina o se desliza en la silla</option>
<option>Se mantiene seguro</option>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">2. Levantarse  </label>
<select  class="form-control select-drh" disabled  id="equi_levantarse1" >
<option hidden><?=$row->equi_levantarse ?></option>
<option>Imposible sin ayuda</option>
<option>Capaz pero necesita mas de un intento</option>
<option>Capaz de levantarse de un solo intento</option>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">3. Intentos para levantarse  </label>
<select  class="form-control select-drh" disabled   id="equi_intentos1" >
<option hidden><?=$row->equi_intentos ?></option>
<option>Incapaz sin ayuda</option>
<option>Capaz pero necesita mas de un intento</option>
<option>Capaz de levantarse de un solo intento</option>
</select>
</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<label class="control-label">4. Equilibrio en bipedestacion inmediata (Primeros 5 segundos)  </label>
<select  class="form-control select-drh" disabled  id="equi_biped11" >
<option hidden><?=$row->equi_biped1 ?></option>
<option>Inestable (tambalea, mueve los pies), marcado balanceo de tronco</option>
<option>Estable pero usa andador/baston/se aferra a algo para mantenerse</option>
<option>Estable sin andador, baston u otros soportes</option>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">5. Equilibrio en bipedestacion  </label>
<select  class="form-control select-drh" disabled  id="equi_biped21" >
<option hidden><?=$row->equi_biped2 ?></option>
<option>Inestable</option>
<option>Estable c/apoyo amplio (Separacion talones mayor de 10cm) o usa baston/otro soporte</option>
<option>Apoyo estrecho sin soporte</option>
</select>
</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<label class="control-label">6. Empuyar  </label>
<select  class="form-control select-drh" disabled  id="equi_emp1" >
<option  hidden><?=$row->equi_emp ?></option>
<option>Px en bipedestacion, tronco erecto y pies tan juntos como posible. El examinador empuya suavemente en el esternon del Px con la palma de la mano, 3 veces</option>
<option>Empieza a caerse</option>
<option>Se tambalea, se agarra, pero se mantiene</option>
<option>Estable</option>
</select>
</div>
</div>

<div class="form-group ">
<div class="col-md-6">
<label class="control-label">7. Ojos cerrados  </label>
<select  class="form-control select-drh" disabled  id="equi_ojos1" >
<option  hidden><?=$row->equi_ojos ?></option>
<option>Inestable</option>
<option>Estable</option>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">8. Vuelta de 360 grados  </label>
<select  class="form-control select-drh" disabled   id="equi_vuelta1" >
<option  hidden><?=$row->equi_vuelta ?></option>
<option>Pasos discontinuos</option>
<option>Pasos continuos</option>
<option>Inestable (Se tambalea, se agarra)</option>
<option>Estable</option>
</select>
</div>
</div>
<div class="form-group ">
<div class="col-md-6">
<label class="control-label">9. Sentarse  </label>
<select  class="form-control select-drh" disabled   id="equi_sentarse1" >
<option  hidden><?=$row->equi_sentarse ?></option>
<option>Inseguro, calcula mal la distancia, cae en la silla</option>
<option>Usa los brazos o el movimiento es brusco</option>
<option>Seguro, movimiento suave</option>
<option>Seguro, movimiento suave</option>
</select>
</div>
</div>





<br/>
<hr class="title-highline-top"/>
<h4>Evalucion Balance System  </h4>



<div class="form-group ">
<div class="col-md-6">

<label class="control-label" >1. Riesgo de caida </label>
<select  class="form-control select-drh" disabled  id="eval_balsys1" >
<option  hidden><?=$row->eval_balsys ?></option>
<option>Presenta buena estabilidad</option>
    <option>Presenta leve riesgo de caida</option>
	<option>Presenta leve riesgo de caida</option>
	</select>
	
	<label class="control-label" >2. Movimiento del pie izquierdo </label>
<select  class="form-control select-drh" disabled   id="eval_movim1" >
<option  hidden><?=$row->eval_movim ?></option>

<option>No sobrepasa el pie derecho con el paso</option>
    <option>Sobrepasa el pie derecho</option>
	 <option>El pie izquierdo no se separa completamento del suelo con el paso</option>
    <option>El pie izquierdo se separa completamento del suelo con el paso</option>
 </select>
 
 
 	<label class="control-label" >3. Evalucion Monopodal </label>
<select  class="form-control select-drh" disabled   id="eval_monop1" >
<option  hidden><?=$row->eval_monop ?></option>

<option>No presenta dificultad al equilibrio</option>
    <option>No presenta leve dificultad al equilibrio</option>
	 <option>No presenta alta dificultad al equilibrio</option>
 </select>
</div>
</div>






<br/>
<hr class="title-highline-top"/>
<p style="width:70%;font-size:20px">Indice de Discapacidad de Oswestr (ODI) Version 2.0<br/>
Cuestionario de Discapacidad de Oswestry y para Dolor de Espalda<br/>
</p>
<h4>Criterios  </h4>
<div class="col-md-6">
<div class="form-group ">

<label class="control-label" >1. Intensidad del dolor </label>
<select  class="form-control select-drh" disabled   id="criteria_intens1" >
<option  hidden><?=$row->criteria_intens ?></option>
<option>Puedo soportar el dolor sin necesidad de tomar calmantes</option>
    <option>El dolor es fuerte pero me manejo sin tomar calmantes</option>
	<option>Los calmantes me alivian completamente el dolor</option>
	<option>Los calmantes me alivian un poco el dolor</option>
    <option>Los calmantes apenas me alivian el dolor</option>
	<option>Los calmantes ne me alivian el dolor y no los tomo</option>
	</select>
	
	<label class="control-label" >2. Cuidados personales </label>
<select  class="form-control select-drh" disabled  id="criteria_cuidado11" >
<option hidden><?=$row->criteria_cuidado1 ?></option>

<option>Me las puedo arreglar solo sin que me aumente el dolor</option>
    <option>Me las puedo arreglar solo pero esto me aumenta el dolor</option>
	 <option>Los cuidados personales me producen dolor y tengo que hacerlo despacio y con cuida</option>
	 <option>Necesito alguna ayudapero consigo hacer la mayoria de las cosas yo solo</option>
    <option>Necesito ayuda para hacer la mayoria de las cosas</option>
	 <option>No puedo vestirme, me cuesta lavarme y suelo quedarme en la cama</option>
 </select>
 
 
 	<label class="control-label" >3. Levantar peso </label>
<select  class="form-control select-drh" disabled  id="levantar_peso1" >
<option hidden><?=$row->levantar_peso ?></option>

<option>Puedo levantar objetos pesados sin que me aumente el dolor</option>
    <option>Puedo levantar objetos pesado pero me aumenta el dolor</option>
	 <option>El dolor me impide levatar objetos pesados del suelo, pero puedo hacerlo si estan en u sitio comodo (ej. en una mesa)</option>
	 <option>El dolor me impide levatar objetos pesados del suelo, pero si peudo levantar objetos ligeros o medianos si estan en un sitio comodo</option>
    <option>Solo puedo levantar objetos muy ligeros</option>
	 <option>No puedo levantar ni acarrear ningun objeto</option>
 </select>
 
 
  	<label class="control-label" >4. Caminar </label>
<select  class="form-control select-drh" disabled   id="criteria_caminar1" >
<option hidden><?=$row->criteria_caminar ?></option>

<option>El dolor no me impide caminar cualquier distancia</option>
    <option>El dolor me impide caminar mas de un kilometro</option>
	 <option>El dolor me impide mas de 500 metros</option>
	 <option>El dolor me impide mas de 250 metros</option>
	 <option>Solo puedo caminar con baston o muletas</option>
	 <option>Permanezco en la cama casi todo el tiempo y tengo que ir a rastras al bano</option>
 </select>
 
   	<label class="control-label" >5. Estar sentado </label>
<select  class="form-control select-drh" disabled   id="criteria_estar_sent1" >
<option hidden><?=$row->criteria_estar_sent ?></option>

<option>Puedo estar de pie tanto tiempo como quiera sin que me aumente el doctor</option>
    <option>Solo puedo estar sentado en mi silla favorita todo el tiempo que quiera</option>
	 <option>El dolor me impide estar sentado mas de una hora</option>
	 <option>El dolor me impide estar sentado mas de media hora</option>
	 <option>El dolor me impide estar sentado mas de 10 minutos</option>
	 <option>>El dolor me impide estar sentado</option>
 </select>
 
 
 <label class="control-label" >6. Dormir </label>
<select  class="form-control select-drh" disabled  id="criteria_dormir1" >
<option  hidden><?=$row->criteria_dormir ?></option>

<option>El dolor no me impide dormir bien</option>
    <option>Solo puedo dormir si tomo pastillas</option>
	 <option>Incluso tomando pastillas duermo menos de 6 horas</option>
	  <option>Incluso tomando pastillas duermo menos de 4 horas</option>
	 <option>Incluso tomando pastillas duermo menos de 2 horas</option>
	 <option>El dolor me impide totalmente dormir</option>
 </select>
 
     	<label class="control-label" >7. Actividad sexual </label>
<select  class="form-control select-drh" disabled   id="criteria_sexual1" >
<option  hidden><?=$row->criteria_sexual ?></option>

<option>Mi actividad sexual es normal y no me aumente el dolor</option>
    <option>Mi actividad sexual es normal pero me aumente el dolor</option>
	 <option>Mi actividad sexual es casi normal pero me aumente mucho el dolor</option>
	  <option>Mi actividad sexual se ha visto muy limitada a causa del dolor</option>
	 <option>Mi actividad sexual es casi nula a causa del dolor</option>
	 <option>El dolor me impide todo tipo de actividad sexual</option>
 </select>
 
 
      	<label class="control-label" >8. Vida social </label>
<select  class="form-control select-drh" disabled   id="criteria_vida1" >
<option  hidden><?=$row->criteria_vida ?></option>

<option>Mi vida social es normal y no me aumenta el dolor</option>
    <option>Mi vida social es normal pero me aumenta el dolor</option>
	 <option>El doctor no tieni un efecto importante en mi vida social, pero si impide mis actividades mas energicas como bailar</option>
	  <option>El dolor ha limitado mi vida social y no salgo tan a menudo</option>
	 <option>El doctor ha limitado mi vida social al hogar</option>
	 <option>No tengo vida social a causa del dolor</option>
 </select>
 
</div>
</div>
</form>
</div>
</div>


<script>

 $('.select-drh').select2({ 
  tags: true

});

</script>