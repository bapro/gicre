<div class="col-md-12 backg"  >
<h4 class="h4 his_med_title">Examen Neurología (<b><?=$nb_ex_neu?> registros (s)</b>)</h4>


<?php if ($nb_ex_neu > 0)
{
$i = 1; 
 foreach($queryexneu->result() as $row)
{

$user_c9=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c10=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');;

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($row->updated_time));


?>
<div class="pagination">
<a  data-toggle="modal" data-target="#ver_ex_neu" href="<?php echo base_url("hospitalizacion/get_data_exam_neuro/$row->id/$id_historial/$user_id")?>">
<?php echo $i; $i++;  ?> 
</a>

<br/><br/>
<div class="box-tooltip" style="display: none;position:absolute">
<h4 style='color:green'>Registro</h4>
<ul style='list-style:none'>
<li>Creado por <?=$user_c9?>, <?=$inserted_time?></li>
<li>Cambiado por <?=$user_c10?>, <?=$update_time?></li>
<hr/>
</ul>
</div>

</div>


<?php
}

}

?>


<i class="fa fa-warning alert-obs" style='color:red;display:none'></i>


</div>

<form   class="form-horizontal"    > 
<div class="col-md-12"  >

<div class="form-group">
<strong>Examen General Neurología </strong>

 <textarea  id="exam_gen_neuro" rows='5'  class="form-control"></textarea>

</div>



</div>
<div class="col-md-12"  >
<strong>Paredes Craneales</strong>
<table  class='table' style='width:100%' >
<tr>
<td><label>I-Olfatorio</label> </td>
<td>

<label><input type="radio" name="olfatorio" value="0"> No</label>

</td>
<td> 

<label><input type="radio" name="olfatorio" value="1" > Si</label>

</td>
<td></td>
</tr>


<tr>
<td><label>II-Óptico</label> </td>
<td>

<label><input type="radio" name="optico" value="0"> No</label>

</td>
<td> 

<label><input type="radio" name="optico" value="1"> Si</label>

</td>
<td> 

<label>(Agudeza-campos visuales-fondo ojo)</label>

</td>
</tr>

<tr>
<td><label>III-Motor Ocular Común</label> </td>
<td>

<label><input type="radio" name="motor_ocr_com" value="0"> No</label>

</td>
<td> 

<label><input type="radio" name="motor_ocr_com" value="1"> Si</label>

</td>
<td> 

<label>(Recto-sup.-inf.-interior-pupilas)</label>

</td>
</tr>


<tr>
<td><label>IV-Patética</label> </td>
<td><label><input type="radio" name="patetica" value="0"> No</label></td>
<td> <label><input type="radio" name="patetica" value="1"> Si</label></td>
<td><label>(Oblicuo)</label></td>
</tr>


<tr>
<td><label>V-Trigémino</label> </td>
<td><label><input type="radio" name="trigemino" value="0"> No</label></td>
<td> <label><input type="radio" name="trigemino" value="1"> Si</label></td>
<td><label>(Tono-trofismo-muscular-masticadores-reflejos corneanos-sensib tacto dolor-temp.)</label></td>
</tr>

<tr>
<td><label>VI-Motor Ocular Externo</label> </td>
<td><label><input type="radio" name="motor_ocu_ext" value="0"> No</label></td>
<td> <label><input type="radio" name="motor_ocu_ext" value="1" > Si</label></td>
<td><label>(Recto interno)</label></td>
</tr>

<tr>
<td><label>VII-Facial</label> </td>
<td><label><input type="radio" name="facial" value="0"> No</label></td>
<td> <label><input type="radio" name="facial" value="1"> Si</label></td>
<td><label>(Tis, temblor-asimetría-motilidad-gustación 2/3 anterior lengua)</label></td>
</tr>

<tr>
<td><label>VIII-Estatoacústico</label> </td>
<td><label><input type="radio" name="estatoacustico" value="0"> No</label></td>
<td> <label><input type="radio" name="estatoacustico" value="1"> Si</label></td>
<td><label>(Vestíbulo: nistagmo espontáneo o posicional. Coclear: Prueba Weber-in otoscopia)</label></td>
</tr>

<tr>
<td><label>IX-Glosofaríngeo </label> </td>
<td><label><input type="radio" name="glosofaringeo" value="0"> No</label></td>
<td> <label><input type="radio" name="glosofaringeo" value="1"> Si</label></td>
<td><label>(Sensibilidad faringe al tacto)</label></td>
</tr>

<tr>
<td><label>X-Neumogástrico  </label> </td>
<td><label><input type="radio" name="neumogastrico" value="0"> No</label></td>
<td> <label><input type="radio" name="neumogastrico" value="1"> Si</label></td>
<td><label>(Simetría velo-paladar uvala, reflejo faríngeo)</label></td>
</tr>

<tr>
<td><label>XI-Espinal  </label> </td>
<td><label><input type="radio" name="espinal" value="0"> No</label></td>
<td> <label><input type="radio" name="espinal" value="1"> Si</label></td>
<td><label>(Trofismo-fuerza esternocleidomastoideo y trapecio)</label></td>
</tr>

<tr>
<td><label>XII-Hipogloso Mayor  </label> </td>
<td><label><input type="radio" name="hipo_mayor" value="0"> No</label></td>
<td> <label><input type="radio" name="hipo_mayor" value="1"> Si</label></td>
<td><label>(Atrofias-fasciculaciones-temblores-movimientos de la lengua)</label></td>
</tr>

<tr>
<td><strong>Sistema Motor  </strong> </td>
<td><label><input type="radio" name="sistema_motor" value="Paresias"> Paresias</label></td>
<td> <label><input type="radio" name="sistema_motor" value="Hemiplejias"> Hemiplejias</label></td>
<td></td>
</tr>

<tr>
<td><strong>Marcha  </strong> </td>
<td colspan='3'><input class="form-control" id='marcha' style='width:100%'/></td>

</tr>	
</table>
</div>
<div class="col-md-12"  >
<hr class="prenatal-separator"/>
<strong>Escala De Glasgow </strong>

<div class="col-md-4"   >
<legend ><u>Apertura de los ojos</u></legend>
<div class="checkbox ">
  <label><input type="checkbox" name="espontanea" >4-Espontánea</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="a_la_orden_verbal" >3-A La Orden Verbal</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="a_estimulo_doloroso" >2-Al Estimulo Doloroso</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="no_ay_respuesta" >1-No Hay Respuesta</label>
</div>
</div>
<div class="col-md-4"  >
<legend><u>Respuesta Verbal</u></legend>
<div class="checkbox ">
  <label><input type="checkbox" name="orientada" >5-Orientada</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="confusa" >4-Confusa</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="inapropriada" >2-Inapropriada</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="incomprensible" >1-Incomprensible</label>
</div>
</div>
<div class="col-md-4"  >
<legend><u>Respuesta Motora</u></legend>
<div class="checkbox ">
  <label><input type="checkbox" name="a_la_orden_verbal_6" >6-A la Orden Verbal</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="localizar_dolor" >5-Localizar Dolor</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="retiro_ante_el_dolor" >4-Retiro ante el Dolor</label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="flexion_normal" >3-Flexión Normal </label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="extension" >2-Extensión </label>
</div>
<div class="checkbox ">
  <label><input type="checkbox" name="no_hay_respuesta" >1-No Hay Respuesta </label>
</div>
</div>

</div>
<div class="col-md-12"  >
<hr class="prenatal-separator"/>
<div class="col-md-7"  >
<strong>Reflejos Osteotendinosos</strong>
<br/><br/>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Bicipital</label>
    <div class="col-sm-4">
	<div class="input-group">
    <input type="text" class="form-control" id='bicipital'/>
    <span class="input-group-addon"> C5-C6</span>
    </div>
   </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Tricipital</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='tricipital' />
    <span class="input-group-addon"> C6-C7-C8</span>
    </div>
    </div>
  </div>
  
    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Aquileo y Clonus</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='aquileo_y_clonus' />
    <span class="input-group-addon"> S1-S2</span>
    </div>
    </div>
  </div>
  
     <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Patelar y Clonus</label>
    <div class="col-sm-4">
   <div class="input-group">
    <input type="text" class="form-control" id='patelar_y_clonus' />
    <span class="input-group-addon"> L2-L3</span>
    </div>
    </div>
  </div>


   <div class="form-group row">
       <div class="col-sm-6">
    <label for="inputPassword3" class="col-form-label">Sensibilidad Superficial(Tacto, dolor, temperatura) </label>

      <input type="text" class="form-control" id="sensibilidad1" >
	   </div>

  </div>
   </div>
   <div class="col-md-5"  >
   <strong>Pruebas Cerbelosas</strong>
   <br/> <br/>
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dedo-dedo</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='dedo_dedo' />
   
    </div>
  </div>
  
     <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Dedo-Nariz</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='dedo_nariz' />
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Talón-Rodilla</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='talon_rod'/>
   
    </div>
  </div>
  
    <div class="form-group row">
    <label  class="col-sm-4 col-form-label">Romberg</label>
    <div class="col-sm-4">
   <input type="text" class="form-control" id='romberg' />
   
    </div>
  </div>
    <div class="form-group row">
       <div class="col-sm-6">
    <label for="inputPassword3" class="col-form-label">Sensibilidad Profunda(Cibratoria, atrocinetica) </label>

      <input type="text" class="form-control" id="sensibilidad2" >
	   </div>

  </div>
  
    <div class="form-group row">
       <div class="col-sm-6">
    <strong>Fondo de Ojo</strong>

      <input type="text" class="form-control" id="fondo_de_ojo" >
	   </div>

  </div>
   </div>
    </div>
	</form>
<script>


$(".pagination").hover(function () {
    $(this).find('.box-tooltip').show();
      },
 function () {
        $(this).find('.box-tooltip').hide();
      });
//display alert


</script>