<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registros</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
 <style>
hr.hr-st {
  border-top: 1px dashed green;
}
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
   
 ul.nav-tabs li a {font-size:20px} 
  </style>
</head>
<body>
<div class="container">

 <?php 
		  if($queryCV->result() !=NULL){
		 foreach ($queryCV->result() as $rowActaCV)
		 $idCv=$rowActaCV->id;
		 $gpsx=$rowActaCV->gpsx;
		 $gpsy=$rowActaCV->gpsy;
		 $num_viv_croquis=$rowActaCV->num_viv_croquis;
		 $num_ficha_fam=$rowActaCV->num_ficha_fam;
		 $srs=$rowActaCV->srs;
		 $numero_casa=$rowActaCV->numero_casa;
		 $area_de_saluds=$rowActaCV->area_de_saluds;
		 $seccion=$rowActaCV->seccion;
		 $zona_de_salud=$rowActaCV->zona_de_salud;
		 $programa_social=$rowActaCV->programa_social;
		 $sub_barrio=$rowActaCV->sub_barrio;
		 $paraje=$rowActaCV->paraje;
		 $fecha_lleno_por=$rowActaCV->fecha_lleno_por;
		 $llenar_por_otro=$rowActaCV->llenar_por_otro;
		 $cv_fecha_vivienda=$rowActaCV->cv_fecha_vivienda;
		 $cv_tenencia_vivienda=$rowActaCV->cv_tenencia_vivienda;
		 $cv_paredes_vivienda=$rowActaCV->cv_paredes_vivienda;
		 $cv_techo_vivienda=$rowActaCV->cv_techo_vivienda;
		 $cv_piso_vivienda=$rowActaCV->cv_piso_vivienda;
		 $cv_servicios_sanitarios=$rowActaCV->cv_servicios_sanitarios;
		 $cv_agua_instalacion=$rowActaCV->cv_agua_instalacion;
		 $cv_elim_basura=$rowActaCV->cv_elim_basura;
		 $cv_servicio_elec=$rowActaCV->cv_servicio_elec;
		  $cv_num_dormi=$rowActaCV->cv_num_dormi;
		 $cv_comb_cocina=$rowActaCV->cv_comb_cocina;
		 $cv_animal_dom=$rowActaCV->cv_animal_dom;
		 $cv_vect_criad=$rowActaCV->cv_vect_criad;
		 $cv_abat_agua=$rowActaCV->cv_abat_agua;
		  $puntuacion=$rowActaCV->puntuacion;
		   $calificacion=$rowActaCV->calificacion;
		   $vis_dom_fecha=$rowActaCV->vis_dom_fecha;
		   $vis_dom_mot_vis=$rowActaCV->vis_dom_mot_vis;
		   $vis_dom_prin_prob_fam=$rowActaCV->vis_dom_prin_prob_fam;
		   $vis_dom_prin_ac_rec=$rowActaCV->vis_dom_prin_ac_rec;
		   $vis_dom_fecha_prox_vis=$rowActaCV->vis_dom_fecha_prox_vis;
		   $vis_dom_pers_vis=$rowActaCV->vis_dom_pers_vis;
		    $acta_obs=$rowActaCV->acta_obs;
		   $acta_med_uso_f=$rowActaCV->acta_med_uso_f;
		 }else{
		$idCv="";
		$gpsx="";;
		 $gpsy="";;
		 $num_viv_croquis="";
		 $num_ficha_fam="";
		  $srs="";
		 $numero_casa="";
		 $area_de_saluds="";
		 $seccion="";
		 $zona_de_salud="";
		 $programa_social="";
		 $sub_barrio="";
		 $paraje="";
		 $fecha_lleno_por="";
		 $llenar_por_otro="";
		 $cv_fecha_vivienda="";	 
		 $cv_tenencia_vivienda=0;	
		 $cv_paredes_vivienda=0;	
		 $cv_techo_vivienda=0;	
		 $cv_piso_vivienda=0;	
		 $cv_servicios_sanitarios=0;	
		 $cv_agua_instalacion=0;	
		 $cv_elim_basura=0;	
		 $cv_servicio_elec=0;	
		  $cv_num_dormi=0;	
		 $cv_comb_cocina=0;	
		 $cv_animal_dom=0;	
		 $cv_vect_criad=0;
         $cv_abat_agua=0;
        $puntuacion=0;
         $calificacion=0;
		 $vis_dom_fecha="";
		   $vis_dom_mot_vis="";
		   $vis_dom_prin_prob_fam="";
		   $vis_dom_prin_ac_rec="";
		   $vis_dom_fecha_prox_vis="";
		   $vis_dom_pers_vis="";
		  $acta_obs="";
	    $acta_med_uso_f="";		 
		 }
		 ?>

<!--
  <h2 class="text-center"><img  style="width:25%; height:auto;"  src="<?= base_url();?>/assets/img/output-onlinepngtools.png"  /> República Dominicana</h2>
-->
<form class="form-horizontal" id="save-all-data" method="POST">
 <input type="hidden" name="idCv" value="<?=$idCv?>" >

<div class="col-md-12">
  <hr class="hr-st" />
  
  <div class="col-md-6">
<table class="table">
<tr>
<td>

<label >GPS-X:</label>
<input type="text"   id="get-location-x" class="form-control" name="gpsx" value="<?=$gpsx?>" >

</td>
<td>

<label class="control-label" >GPS-Y:</label>
<input type="text"   id="get-location-y" class="form-control" name="gpsy" value="<?=$gpsy?>" >

</td>
</tr>
</table>
    </div>
   <div class="col-md-6">
<table class="table">
<tr>
<td>
<label >No. Ficha Familiar:</label>
<input  class="form-control" name="num_ficha_fam" value="<?=$num_ficha_fam?>">

</td>
<td>
<label class="control-label" >No. Vivienda en Croquis:</label>

<input type="text" class="form-control" name="num_viv_croquis" value="<?=$num_viv_croquis?>"  >
</td>
</tr>
</table>
    </div>
	</div>
	 

 
   <div class="col-md-12">
   <?php foreach($patient as $row)?>
   <hr class="hr-st" />
<input id="id_jefe" name="id_jefe" value="<?=$row->id_p_a?>" type="hidden" />
     <div class="col-md-4">
	 <div class="form-group">
	 <div class="col-sm-12">
    <label >Nombre del jefe(a) de Familia:</label>
    <input  class="form-control"  value="<?=$row->nombre?>">
  </div>
	
</div>
   
     <div class="form-group">
	 <div class="col-sm-12">
      <label class="control-label" >Calle:</label>
            
        <input type="text" class="form-control" value="<?=$row->calle?>"  >
     </div>
    </div>
	  <div class="form-group">
	   <div class="col-sm-12">
		<?php 

		$provincia=$this->db->select('title')->where('id',$row->provincia )
		->get('provinces')->row('title');

		?>
      <label class="control-label" >Provincia:</label>
       <input type="text" class="form-control" value="<?=$provincia?>"  >
 </div>
    </div>
	  <div class="form-group">
	  <div class="col-sm-12">
      <label class="control-label"  >SRS:</label>
               
        <input type="text" class="form-control" name="srs" value="<?=$srs?>"  >
       </div>
    </div>
    </div>
   <div class="col-md-3">
	 <div class="form-group">
	 <div class="col-sm-12">
    <label >Apodo:</label>
    <input type="text"  class="form-control" name="apodo" value="<?=$row->apodo?>" >
    </div>
	 </div>
	 <div class="form-group">
	 <div class="col-sm-6">
      <label class="control-label" >No de casa:</label>
              
        <input type="text" class="form-control" name="numero_casa" value="<?=$numero_casa?>" >
    </div>
	</div>
	  <div class="form-group">
	   <div class="col-sm-12">
      <label class="control-label" >Municipio:</label>
     <?php
      $municipio=$this->db->select('title_town')->where('id_town',$row->municipio )
		->get('townships')->row('title_town');
       ?>	  
        <input type="text" class="form-control" value="<?=$municipio?>"  >
      </div>
  </div>
	  <div class="form-group">
	  <div class="col-sm-10">
      <label class="control-label" >Area de salud:</label>
              
        <input type="text" class="form-control" name="area_de_saluds" value="<?=$area_de_saluds?>" >
     
    </div>
    </div>
   
   </div> 
   
      <div class="col-md-3">
	 <div class="form-group">
	 	 <div class="col-sm-12">
    <label >Telefonos:</label>
    <input  class="form-control" value="<?=$row->tel_cel?>   <?=$row->tel_resi?>">
  </div>
  </div> 
   <div class="form-group">
   	 <div class="col-sm-12">
	   <label class="control-label" >Barrio:</label>
        <input type="text" class="form-control"   value="<?=$row->barrio?>"  >
   </div>
   </div> 
	  <div class="form-group">
	  	 <div class="col-sm-12">
      <label class="control-label" >Sección:</label>
       <input type="text" class="form-control" name="seccion" value="<?=$seccion?>" >
     </div> 
    </div>
	  <div class="form-group">
	  	 <div class="col-sm-12">
      <label class="control-label" >Zona de salud:</label>
       <input type="text" class="form-control" name="zona_de_salud" value="<?=$zona_de_salud?>"  >
   </div>
    </div>
   </div> 
 
       <div class="col-md-2">
	 <div class="form-group">
	  <div class="col-sm-12">
    <label >Programa Social:</label>
    <input  class="form-control" name="programa_social" value="<?=$programa_social?>">
  </div>
	</div>
	 <div class="form-group">
	  <div class="col-sm-12">
      <label class="control-label" >Sub Barrio:</label>
      <input type="text" class="form-control" name="sub_barrio" value="<?=$sub_barrio?>" >
     </div>
    </div>
	  <div class="form-group">
	   <div class="col-sm-12">
      <label class="control-label" >Paraje:</label>
          
        <input type="text" class="form-control" name="paraje" value="<?=$paraje?>" >
      </div>
    </div>

   </div> 
    </div> 
     
 <div class="col-md-12">
 <strong>Persona que llena la ficha</strong> 
 <div class="form-inline">
 
  <div class="radio-inline">
    <label >
		<?php
		if($fecha_lleno_por ==1){
		$selected="checked";
		} 
		else 
		{
		$selected="";
		}
		echo "<input type='radio' name='fecha_lleno_por' value='1' $selected /> Promotor/a";
		?>
 
    </label>
  </div>
  <div class="radio-inline">
    <label>
		<?php
		if($fecha_lleno_por ==2){
		$selected="checked";
		} 
		else 
		{
		$selected="";
		}
		echo "<input type='radio' name='fecha_lleno_por' value='2' $selected /> Supervisor/a de APS";
		?>
	
    </label>
  </div>
<div class="radio-inline">
    <label >
		<?php
		if($fecha_lleno_por ==3){
		$selected="checked";
		} 
		else 
		{
		$selected="";
		}
		echo "<input type='radio' name='fecha_lleno_por' value='3' $selected /> Persona de enfermería";
		?>

    </label>
  </div>
  <div class="radio-inline">
    <label >
		<?php
		if($fecha_lleno_por ==4){
		$selected="checked";
		} 
		else 
		{
		$selected="";
		}
		echo "<input type='radio' name='fecha_lleno_por' value='4' $selected /> médico/a";
		?>
    
    </label>
  </div>
  
    <div class="radio-inline">
    <label>
     Otro especifique <input type="text" name="llenar_por_otro" id="llenar_por_otro" class="form-control" value="<?=$llenar_por_otro?>"/> 
    </label>
  </div>

    <label >
     Fecha <input type="text" class="form-control dateInsert" value="<?=date("d-m-Y");?>"/> 
    </label>

</div>
   
  <hr class="hr-st"/>
     </div>
   
  
  <div class="col-md-12">
 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home-ca-vi">Característica de la vivienda</a></li>
    <li><a data-toggle="tab" href="#menu1">Características de las Personas</a></li>
    <li><a data-toggle="tab" href="#menu2">Visitas Domiciliarias</a></li>
    <li><a data-toggle="tab" href="#menu3">Estado de Vacunación</a></li>
  </ul>

  <div class="tab-content">
    <div id="home-ca-vi" class="tab-pane fade in active">
	  <h3>Característica de la Vivienda</h3>
       <div class="col-md-4">
	 <div class="form-group">
      <label class="control-label" >Fecha</label>
       <input type="text" class="form-control"   name="cv_fecha_vivienda" value="<?=$cv_fecha_vivienda?>" >
    
    </div>
	  <div class="form-group">
      <label class="control-label" >Tenencia de la Vivienda(1)</label>
       <select  class="form-control sumCaVi" name="cv_tenencia_vivienda" >
	   <option value="<?=$cv_tenencia_vivienda?>"><?=preg_replace('/[^a-z-A-Z.]+/', '', $cv_tenencia_vivienda);?></option>
		
		<option value="5Propia">Propia</option>
		<option value="3Alquilada">Alquilada</option>
		<option  value="2Cedida/Prestada">Cedida/Prestada</option>
		</select>
    </div>
	 <div class="form-group">
      <label class="control-label" >Paredes de la Vivienda(2)</label>
       <select   class="form-control sumCaVi" name="cv_paredes_vivienda" >
		<option value="<?=$cv_paredes_vivienda?>"><?=preg_replace('/[^a-z-A-Z-, ]+/', '', $cv_paredes_vivienda);?></option>
		<option  value="10Cemento/Block/Ladrillo">Cemento, Block, Ladrillo</option>
		<option value="9Madera">Madera</option>
		<option value="5Asbesto, Cemento, Tabla de Palma">Asbesto Cemento, Tabla de Palma</option>
		<option value="4Zinc">Zinc</option>
		<option value="0Tejamami, Cartón, Desechos, Yagua">Tejamami, Cartón, Desechos, Yagua</option>
		</select>
    </div>
   	 <div class="form-group">
      <label class="control-label" >Techo de la Vivienda(3)</label>
        <select class="form-control sumCaVi"  name="cv_techo_vivienda"   >
		<option value="<?=$cv_techo_vivienda?>"><?=preg_replace('/[^a-z-A-Z-, ]+/', '', $cv_techo_vivienda);?></option>
		
		<option value="10Concreto">Concreto</option>
		<option value="9Asbesto Cemento">Asbesto Cemento</option>
		<option  value="0Zinc, Cana, Yagua, Cartón, Desechos">Zinc, Cana, Yagua, Cartón, Desechos</option>
		</select>
    </div>
  <div class="form-group">
      <label class="control-label" >Piso de la Vivienda(4)</label>
        <select class="form-control sumCaVi"  name="cv_piso_vivienda"   >
		<option value="<?=$cv_piso_vivienda?>"><?=preg_replace('/[^a-z-A-Z-, ]+/', '', $cv_piso_vivienda);?></option>
		
		<option value="10Mosaico, Garanito, Marmól, Cemento o Ladrillo">Mosaico, Garanito, Marmól, Cemento o Ladrillo</option>
		<option value="9Madera"> Madera</option>
		<option value="0Tierra">Tierra</option>
		</select>
    </div>
	  <div class="form-group">
      <label class="control-label" >Servicios Sanitarios(5)</label>
   <select class="form-control sumCaVi"  name="cv_servicios_sanitarios"  >
   <option value="<?=$cv_servicios_sanitarios?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_servicios_sanitarios);?></option>
		
		<option value="10Inodoro Exclusivo">Inodoro Exclusivo</option>
		<option value="9Letrina Exclusiva">Letrina Exclusiva</option>
		<option value="6Inodro Colectivo">Inodro Colectivo</option>
		<option value="4Letrina Colectiva">Letrina Colectiva</option>
		<option value="0En Patio|Monte, No tiene">En Patio/Monte, No tiene</option>
		</select>
    </div>
 
   </div> 
  <div class="col-md-4 col-xs-offset-1">
	    <div class="form-group">
      <label class="control-label" >Agua instalación(6)</label>
      <select class="form-control sumCaVi" name="cv_agua_instalacion"   >
	     <option value="<?=$cv_agua_instalacion?>"><?=preg_replace('/[^a-z-A-Z-, ]+/', '', $cv_agua_instalacion);?></option>
	  
		<option value="0No Tiene Servico de Agua">No Tiene Servico de Agua</option>
		<option value="9Dentro de la Vivienda y Llega" >Dentro de la Vivienda y Llega</option>
		<option value="8Fuera de la Vivienda y Llega">Fuera de la Vivienda y Llega</option>
		<option value="0Fuera de la Vivienda y No Llega">Fuera de la Vivienda y No Llega</option>
		</select>
    </div>
    <div class="form-group">
      <label class="control-label" >Abatecimiento de Agua(7)</label>
  <select class="form-control sumCaVi"  name="cv_abat_agua"   >
  	     <option value="<?=$cv_abat_agua?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_abat_agua);?></option>
        
		<option value="0No Tiene">No Tiene</option>
		<option value="9Acueducto y Cisterna">Acueducto y Cisterna</option>
		<option value="8Manantial">Manantial</option>
		<option value="4Río|Arroyo">Río|Arroyo</option>
		<option value="3Pozo|Camin">Pozo|Camin</option>
		<option value="2Lluvia|Tanque|Algibe">Lluvia|Tanque|Algibe</option>
		</select>
    </div>
	 <div class="form-group">
      <label class="control-label">Eliminación de Basura(8)</label>
      <select class="form-control sumCaVi"  name="cv_elim_basura"   >
	   <option value="<?=$cv_elim_basura?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_elim_basura);?></option>
		
		<option value="8Recoge Ayuntamiento, Otra Institucíon">Recoge Ayuntamiento, Otra Institucíon</option>
		<option value="7La Entierra">La Entierra</option>
		<option value="6Quemada">Quemada</option>
		<option value="0Tirada en Patio o en Cañada">Tirada en Patio o en Cañada</option>
		</select>
    </div>
     <div class="form-group">
      <label class="control-label" >Servicio de Electricidad(9)</label>
       <select class="form-control sumCaVi"  name="cv_servicio_elec"   >
	   	<option value="<?=$cv_servicio_elec?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_servicio_elec);?></option>
	   
		<option value="0No Tiene">No Tiene</option>
		<option value="5Tiene Energía CDE, Inversor, Planta">Tiene Energía CDE, Inversor, Planta </option>
		
		</select>
    </div>
	  <div class="form-group">
      <label class="control-label" >No. de Dormitorios(10)</label>
     <select class="form-control sumCaVi"  name="cv_num_dormi"   >
	 <option value="<?=$cv_num_dormi?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_num_dormi);?></option>
		
		<option value="9Cuatro o Más">Cuatro o Más </option>
		<option value="8Tres">Tres</option>
		<option value="5Dos">Dos</option>
		<option value="0Uno">Uno</option>
		</select>
    </div>
	  <div class="form-group">
      <label class="control-label" >Combustible de Cocina(11)</label>
      <select class="form-control sumCaVi"  name="cv_comb_cocina"   >
	  	 <option value="<?=$cv_comb_cocina?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_comb_cocina);?></option>
		
		<option value="5Gas Propano, Electricidad">Gas Propano, Electricidad</option>
		<option value="4Carbón">Carbón</option>
		<option value="2Leña">Leña</option>
		</select>
    </div>
     </div> 
   
     <div class="col-md-2  col-xs-offset-1">
	 <div class="form-horizontal" >
     <div class="form-group">
      <label class="control-label" >Animales Doméstico(12)</label>
      <select class="form-control sumCaVi" name="cv_animal_dom"   >
	  <option value="<?=$cv_animal_dom?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_animal_dom);?></option>
	  
		<option  value="5No">No</option>
		<optgroup label="Sí, Especifique">
      <option value="0Perro">Perro</option>
      <option value="0Gato">Gato</option>
	   <option value="0Cerdo">Cerdo</option>
	    <option value="0Otros">Otros</option>
    </optgroup>
		</select>
    </div>
     <div class="form-group">
      <label class="control-label" >Vectores Criaderos(13)</label>
    <select class="form-control sumCaVi"  name="cv_vect_criad"   >
  <option value="<?=$cv_vect_criad?>"><?=preg_replace('/[^a-z-A-Z-,| ]+/', '', $cv_vect_criad);?></option>
	
	<option value="5No">No</option>
	 <optgroup label="Sí, Especifique">
      <option value="0Mosquitos">Mosquitos</option>
      <option value="0Ratones">Ratones</option>
	   <option value="0Moscas">Moscas</option>
	   <option value="0Cucarachas">Cucarachas</option>
	    <option value="0Otros">Otros</option>
    </optgroup>
		</select>
    </div>
	  <div class="form-group">
      <label class="control-label" >Puntuación(14)</label>
             
        <input type="text" class="form-control" id="sumCaracViv" name="puntuacion" value="<?=$puntuacion?>" readonly>
  
    </div>
	  <div class="form-group">
      <label class="control-label" >Cualificación(15)</label>
        <input type="text" class="form-control" id="resultCarViv" name="calificacion" value="<?=$calificacion?>" readonly >
	 </div>
   
  </div>
   
   </div>
    <div class="col-md-12">
	<div style="overflow-x:auto;">
	<table class="table" style="width:100%">
	<tr>
	<td>
	<strong>Fecha: Anotar la fecha de la visita planificada</strong> <br>
	<strong>(1)</strong><br>
	[05] Propia<br>
	[03] Alquilada<br>
	[02] Cedida/Prestada<br><br>
	
	<strong>(2)</strong><br>
	[10] Cemento, Block, Ladrillo<br>
	[09] Madera<br>
	[05] Asbesto Cemento/Tabla de Palma<br>
	[04] Zinc<br>
	[00] Tejamami, Cartón, Desechos, Yagua<br><br>
	
     <strong>(3)</strong><br>
	[10] Concreto<br>
	[09] Asbesto Cemento<br>
	[00] Zinc, Cana,Yagua/Cartón/Desechos <br><br>
	</td>
	
	<td>
	<strong>(4)</strong><br>
	[10] Mosaico, Garanito, Marmól, Cemento o Ladrillo<br>
	[09] Madera<br>
	[00] Tierra<br><br>
	
	<strong>(5)</strong><br>
	[10] Inodoro Exclusivo<br>
	[09] Letrina Exclusiva<br>
	[06] Inodro Colectivo<br>
	[04] Letrina Colectiva<br>
	[00] En Patio/Monte, No tiene<br><br>
	
     <strong>(6)</strong><br>
	[19] Dentro de la Vivienda y Llega<br>
	[08] Fuera de la Vivienda y Llega<br>
	[00] Fuera de la Vivienda y No Llega<br>
	[00] No Tiene Servico de Agua <br><br>
	</td>
	
	
	<td>
	<strong>(7)</strong><br>
	[09] Acueducto y Cisterna<br>
	[08] Manantial<br>
	[04] Río / Arroyo<br>
	[03] Pozo / Camin<br>
	[02] Lluvia / Tanque / Algibe<br>
	[00] No Tiene<br><br>
	
	<strong>(8)</strong><br>
	[08] Recoge Ayuntamiento/Otra Institucíon<br>
	[07] La Entierra<br>
	[06] Quemada<br>
	[00] Tirada en Patio o en Cañada<br><br>
	
     <strong>(9)</strong><br>
	[15] Tiene Energía CDE, Inversor, Planta<br>
	[00] No Tiene<br><br>
	</td>
	
	
	<td>
	<strong>(10)</strong><br>
	[09] Cuatro o Más<br>
	[08] Tres<br>
	[05] Dos<br>
	[00] Uno<br><br>
	
	<strong>(11)</strong><br>
	[05] Gas Propano, Electricidad<br>
	[04] Carbón<br>
	[02] Leña<br><br>
	
     <strong>(12)</strong><br>
	[05] NO<br>
	[00] Si, Especifique<br>
	 Perro, Gato, Cerdo, Otros <br><br>
	</td>
	
	
	<td>
	<strong>(13)</strong><br>
	[05] NO<br>
	[00] Si, Especifique:
	 Mosquitos, Ratones, Moscas, Cucarachas, Otros<br><br>
	
	<strong>(14)</strong><br>
	Puntuación Obtenida<br><br>
	
     <strong>(15)</strong><br>
	Cualificación:<br>
	<strong>Buena</strong> Más de 75 puntos<br>
	<strong>Regular</strong> Entre 50 y 74 puntos<br>
	<strong>Mala</strong> Menos de 50 puntos <br><br>
	</td>
	</tr>
   </table>
   </div>
   </div>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Características de las Personas</h3>
<table class="table" style="width:100%">
<thead>
<tr>
<th>NOMBRES Y APELLIDOS </th><th>CEDULA</th><th>PARENTESCO</th><th>ESTADO CIVIL</th><th>FECHA NAC. - EDAD - SEXO </th><th>TIENE ACTA ?</th>
</tr>
</thead>
<tbody>
<?php

foreach($tutor as $tut)
{
$tiene_acta=$this->db->select('tiene_acta')->where('id_member',$tut->id)->get('patient_birth_certificate')->row('tiene_acta');
$tutorData=$this->db->select('photo,ced1,ced2,ced3,cedula,date_nacer,nombre,sexo')->where('id_p_a',$tut->id_tutor)->get('patients_appointments')->row_array();
$age=getPatientAge($tutorData['date_nacer']);

?>
<tr>
<td class="get-parentesco-name"><?=$tutorData['nombre']?></td><td><?=$tutorData['cedula']?></td><td><?=$tut->relacion?></td><td><?=$row->estado_civil?></td>
<td><?=date("d-m-Y", strtotime($tutorData['date_nacer']));?> - <?=$age?> - <?=$tutorData['sexo']?></td>
<td>
<?php





?>
<?php
if($tiene_acta  =="si"){
	$checked="checked";$verActa="";
} else{
	$checked="";$verActa="none";
	}
echo "<input type='checkbox' id='vdrl21'  name='has-acta$tut->id' class='tiene-acta' value='$tut->id'   $checked> Si";
?>
 <button type="button" class="btn btn-success  btn-sm ver-acta" style="display:<?=$verActa?>" id="<?=$tut->id?>">ver </button>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
 <div class="col-md-12">

	<div id="acta-nac-parent"></div>
</div>
	  </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Visitas Domiciliarias</h3>
       <div class="col-md-6">
	 <div class="form-horizontal" >
   
     <div class="form-group">
      <label class="control-label col-sm-4" >Fecha:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control dateInsert" name="vis_dom_fecha" value="<?=$vis_dom_fecha?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Motivo de la Visita:</label>
      <div class="col-sm-8">          
       <textarea class="form-control" rows="6" name="vis_dom_mot_vis"><?=$vis_dom_mot_vis?></textarea>
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Principales Problemas Familiares:</label>
      <div class="col-sm-8">          
       <textarea class="form-control" rows="6" name="vis_dom_prin_prob_fam"><?=$vis_dom_prin_prob_fam?></textarea>
      </div>
    </div>
   
  </div>
   
   </div> 
  
   <div class="col-md-6">
	 <div class="form-horizontal" >
   
     <div class="form-group">
      <label class="control-label col-sm-4" >Principales Acciones y Recomendaciones:</label>
      <div class="col-sm-8">          
       <textarea class="form-control" rows="6" name="vis_dom_prin_ac_rec"><?=$vis_dom_prin_ac_rec?></textarea>
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Fecha Proxima Visita:</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control dateInsert"  name="vis_dom_fecha_prox_vis" value="<?=$vis_dom_fecha_prox_vis?>"  >
      </div>
    </div>
	  <div class="form-group">
      <label class="control-label col-sm-4" >Persona que hace la Visita:</label>
      <div class="col-sm-8">          
       <input type="text" class="form-control" name="vis_dom_pers_vis" value="<?=$vis_dom_pers_vis?>" >
      </div>
    </div>
   
  </div>
   
   </div> 
   <div class="col-md-12">
	<table class="table" style="width:100%">
	<tr>
	<td>
	<strong>Motivo de la Visita:</strong> 
	Indicar el motivo. Ejs. Control/Seguimiento, Visitas Programdas, Atención.<br/>
	<strong>Problemas Familiares:</strong> 
	Anotar aquellos factores o situaciones relacionadas a enfermedades, riesgos y otras condiciones que afectan la estabilidad familiar en su conjunto.<br/>
	<strong>Acciones y Recomendaciones:</strong> 
	Anotar las Tareas/Acciones y Recomendaciones realizadas:<br/>
	<strong>Vac=</strong> Vacunación; <strong>PT=</strong> Peso y Talla; <strong>PA=</strong> Presión Arterial; <strong>CE=</strong> Captación Embarazada; <strong>CRN=</strong> Captación Recien Nacidos; <strong>IE=</strong> Intervención Educativa o Asesoría;<strong>Ref=</strong> Referencia o Recomendaciones hechas;
	<strong>C=</strong> Consejería;<br/>
	<strong>Anotar nombre del miembro de UNAP:</strong>Médico(a), Auxiliar de Enfermería, 
	Supervisor(a), Promotor(a), que hace la visita en esta fecha.
	</td>
	</tr>
	</table>
	</div>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Estado de Vacunación</h3>
      <div class="table-responsive">
	  <?php 
	  
	  if($queryVac->result() !=NULL){
		 foreach ($queryVac->result() as $rowVac)
		   $bcg1=$rowVac->bcg1;
			$hepb1=$rowVac->hepb1;
			$yel3=$rowVac->yel3;
			$bl4=$rowVac->bl4;
			$yel5=$rowVac->yel5;
			$bl6=$rowVac->bl6;
			$gr7=$rowVac->gr7;
			$bll8=$rowVac->bll8;
			$grr9=$rowVac->grr9;
			$yel10=$rowVac->yel10;
			$bl11=$rowVac->bl11;
			$gr12=$rowVac->gr12;
			$yel13=$rowVac->yel13;
			$bl14=$rowVac->bl14;
			$bll15=$rowVac->bll15;
			$srp16=$rowVac->srp16;
			$bll17=$rowVac->bll17;
			$grr18=$rowVac->grr18;
			$resf1=$rowVac->resf1;
			$resf2=$rowVac->resf2;
			$resf3=$rowVac->resf3;
			$resf4=$rowVac->resf4;
			$resf5=$rowVac->resf5;
			$resf6=$rowVac->resf6;
			$resf7=$rowVac->resf7;
			$resf8=$rowVac->resf8;
			$resf9=$rowVac->resf9;
			$resf10=$rowVac->resf10;
			$resf11=$rowVac->resf11;
			$resf12=$rowVac->resf12;
			$resf13=$rowVac->resf13;
			$resf14=$rowVac->resf14;
			$resf15=$rowVac->resf15;
			$resf16=$rowVac->resf16;
			$resf17=$rowVac->resf17;
			$resf18=$rowVac->resf18;
		 
	  }else{
			
			$bcg1="";
			$hepb1="";
			$yel3="";
			$bl4="";
			$yel5="";
			$bl6="";
			$gr7="";
			$bll8="";
			$grr9="";
			$yel10="";
			$bl11="";
			$gr12="";
			$yel13="";
			$bl14="";
			$bll15="";
			$srp16="";
			$bll17="";
			$grr18="";
			$hist_id="";
			$resf1="";
			$resf2="";
			$resf3="";
			$resf4="";
			$resf5="";
			$resf6="";
			$resf7==
			$resf8="";
			$resf9="";
			$resf10="";
			$resf11="";
			$resf12="";
			$resf13="";
			$resf14="";
			$resf15="";
			$resf16="";
			$resf17="";
			$resf18="";  
	  }
	  
	  $date_nacer =$row->date_nacer_format;
	  ?>
<table class="table table-striped table-bordered">
 
  <tr><th></th><th class="col-xs-2" style="font-size:12px">Fecha Nac : <span style="color:blue"><?=date("d-m-Y",strtotime($date_nacer))?></span></th>
  <th class="col-xs-2">
 <input  id="insert_d"  type="hidden" value="<?=date("d-m-Y",strtotime($date_nacer))?>"  > 
</th>

<th class="col-xs-2">DOSIS</th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
<th class="col-xs-2"></th>
</tr>
<tr style="text-decoration:underline">
<th><input type="hidden" value="<?=$date_nacer?>" id="mirror_field"  />
</th>
<th>DOSIS UNICA</th>
<th >1era. Dosis</th>
<th>2da. Dosis</th>
<th >3era. Dosis</th>
<th >1er.Refuerzo</th>
<th >2do.Refuerzo</th> 
</tr>
<tr >
<th>BCG w</th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh1()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date no_ap_sh1"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh1" style="display:none;background:red">
<input type="text"  class="form-control bcgno" id="bcg11" value="<?=$bcg1?>" readonly >
<span id="frem1" class="input-group-addon" ><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon" style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f1"  type="hidden"  > 

<input type="text" class="form-control bcg"  value="<?=$bcg1?>" style="pointer-events: none;">

<input type="hidden"  id="mirror_bcg1" value="<?=$date_nacer?>"  />
<span style="color:red" class="atras1"><i>Dias de atraso : <input type="text" class="resf1" id="resf11" value="<?=$resf1?>" style="pointer-events:none;border:none;width:30px;"></i></span>

</td>

<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr>
<th> HEPATITIS B </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh2()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date2 no_ap_sh2"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap_sh2" style="display:none;">
<input type="text"  class="form-control bcgno"  id="hepb1" value="<?=$hepb1?>" readonly >
<span id="frem2" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f2"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$hepb1?>" style="pointer-events: none;">
<input type="hidden" value="<?=$date_nacer?>" id="mirror_bcg2"  />
<span style="color:red;" class="atras2"><i>Dias de atraso : <input type="text" class="resf2" id="resf21" value="<?=$resf2?>" style="pointer-events:none;border:none;width:30px;background:none"></i></span>
</td>
<td></td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>ROTAVIRUS </th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh3()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date3 no_ap_sh3"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap3" style="display:none;">
<input type="text"  class="form-control bcgno"  id="no_ap331" value="<?=$yel3?>" readonly  >
<span id="frem3" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f3"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$yel3?>" style="pointer-events: none;">
<input  id="mirror_d3"  type="hidden"  > 
<span style="color:red" class="atras3"><i>Dias de atraso : <input type="text" id="resf31" value="<?=$resf3?>" style="pointer-events:none;border:none;width:30px"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh4()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date4 no_ap4 no_ap_sh4"  data-date-format="dd MM yyyy" data-link-field="dtp_input1"  id="no_ap41" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl41" value="<?=$bl4?>" readonly >
<span id="frem4" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f4"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$bl4?>" style="pointer-events: none;">
<input  id="mirror_d4"  type="hidden"  > 
<span style="color:red" class="atras4">
<i>Dias de atraso : <input type="text" id="resf41" value="<?=$resf4?>" style="pointer-events:none;border:none;width:30px"/></i></span>
</td>
 <td></td><td></td><td></td>
</tr>
<tr >
<th>POLIO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh5()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date5 no_ap5 no_ap_sh5"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap51" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel51" value="<?=$yel5?>"  readonly >
<span id="frem5" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f5"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$yel5?>">
<input  id="mirror_d5"  type="hidden"  > 
<span style="color:red" class="atras5"><i>Dias de atraso : <input type="text" id="resf51" style="background:none;pointer-events:none;border:none;width:50px" value="<?=$resf5?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh6()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date6 no_ap6 no_ap_sh6"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap61" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl61" value="<?=$bl6?>"  readonly >
<span id="frem6" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f6"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$bl6?>">
<input  id="mirror_d6"  type="hidden"  > 
<span style="color:red" class="atras6"><i>Dias de atraso : <input type="text" id="resf61" style="pointer-events:none;border:none;width:30px" value="<?=$resf6?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh7()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date7 no_ap7 no_ap_sh7"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap71" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr71" value="<?=$gr7?>"  readonly >
<span id="frem7" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f7"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$gr7?>">
<input  id="mirror_d7"  type="hidden"  > 
<span style="color:red" id="atras7"><i>Dias de atraso : <input type="text" id="resf71" style="pointer-events:none;border:none;width:70px;background:none" value="<?=$resf7?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh8()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date8 no_ap8 no_ap_sh8"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap81" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll81" value="<?=$bll8?>" readonly >
<span id="frem8" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f8"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$bll8?>">
<input  id="mirror_d8"  type="hidden"  > 
<span style="color:red" id="atras8"><i>Dias de atraso : <input type="text" id="resf81" style="pointer-events:none;border:none;width:80px" value="<?=$resf8?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh9()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date9 no_ap9 no_ap_sh9"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap91" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr91" value="<?=$grr9?>"  readonly >
<span id="frem9" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span  class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f9"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$grr9?>">
<input  id="mirror_d9"  type="hidden"  > 
<span style="color:red" id="atras9"><i>Dias de atraso : <input type="text" id="resf91" style="pointer-events:none;border:none;width:90px;background:none" value="<?=$resf9?>"></i></span>
</td>
</tr>
<tr >
<th>PENTAVALENTE</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh10()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date10 no_ap10 no_ap_sh10"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap101" style="display:none;">
<input type="text"  class="form-control bcgno"   id="yel101" value="<?=$yel10?>" readonly >
<span id="frem10" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f10"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$yel10?>">
<input  id="mirror_d10"  type="hidden"  > 
<span style="color:red" id="atras10"><i>Dias de atraso : <input type="text" id="resf101" style="pointer-events:none;border:none;width:100px" value="<?=$resf10?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh11()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date11 no_ap111 no_ap_sh11"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1111" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl111" value="<?=$bl11?>" readonly >
<span id="frem11" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f11"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$bl11?>">
<input  id="mirror_d11"  type="hidden"  > 
<span style="color:red" id="atras11"><i>Dias de atraso : <input type="text" id="resf111" style="pointer-events:none;border:none;width:110px" value="<?=$resf11?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh12()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date12 no_ap122 no_ap_sh12"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1221" style="display:none;">
<input type="text"  class="form-control bcgno"  id="gr121" value="<?=$gr12?>" readonly >
<span id="frem12" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f12"  type="hidden"  > 
<input type="text" class="form-control gr"  value="<?=$gr12?>">
<input  id="mirror_d12"  type="hidden"  > 
<span style="color:red" id="atras12"><i>Dias de atraso : <input type="text" id="resf121" style="pointer-events:none;border:none;width:120px" value="<?=$resf12?>"></i></span>
</td>
<td></td><td></td>
</tr>
<tr >
<th>NEUMOCOCO</th>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh13()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date13 no_ap133 no_ap_sh13"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1331" style="display:none;">
<input type="text"  class="form-control bcgno"  id="yel131" value="<?=$yel13?>"  readonly >
<span id="frem13" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f13"  type="hidden"  > 
<input type="text" class="form-control yel"  value="<?=$yel13?>">
<input  id="mirror_d13"  type="hidden"  > 
<span style="color:red" id="atras13"><i>Dias de atraso : <input type="text" id="resf131" style="pointer-events:none;border:none;width:130px;background:none" value="<?=$resf13?>"></i></span>
</td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh14()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date14 no_ap144 no_ap_sh14"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1441" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bl141" value="<?=$bl14?>"  readonly >
<span id="frem14" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f14"  type="hidden"  > 
<input type="text" class="form-control bl"  value="<?=$bl14?>">
<input  id="mirror_d14"  type="hidden"  > 
<span style="color:red" id="atras14"><i>Dias de atraso : <input type="text" id="resf141" style="pointer-events:none;border:none;width:140px" value="<?=$resf14?>"></i></span>
</td>
<td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh15()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date15 no_ap155 no_ap_sh15"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1551" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll151" value="<?=$bll15?>" readonly >
<span id="frem15" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f15"  type="hidden"  > 
<input type="text" class="form-control bll" value="<?=$bll15?>">
<input  id="mirror_d15"  type="hidden"  > 
<span style="color:red" id="atras15"><i>Dias de atraso : <input type="text" id="resf151" style="pointer-events:none;border:none;width:150px" value="<?=$resf15?>"></i></span>
</td>
<td></td>
</tr>
<tr >
<th>SRP </th>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh16()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date16 no_ap166 no_ap_sh16"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1661" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bcg161" value="<?=$srp16?>" readonly >
<span id="frem16" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f16"  type="hidden"  > 
<input type="text" class="form-control bcg"  value="<?=$srp16?>">
<input  id="mirror_d16"  type="hidden"  > 
<span style="color:red" id="atras16"><i>Dias de atraso : <input type="text" id="resf161" style="pointer-events:none;border:none;width:160px" value="<?=$resf16?>"></i></span>
</td>
<td> </td><td></td><td></td><td></td><td></td>
</tr>
<tr >
<th>DTP</th>
<td></td>
 <td> </td>
 <td></td>
 <td></td>
<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh17()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date17 no_ap177 no_ap_sh17"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap177" style="display:none;">
<input type="text"  class="form-control bcgno"  id="bll171" value="<?=$bll17?>"  readonly >
<span id="frem17" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f17"  type="hidden"  > 
<input type="text" class="form-control bll"  value="<?=$bll17?>">
<input  id="mirror_d17"  type="hidden"  > 
<span style="color:red" id="atras17"><i>Dias de atraso : <input type="text" id="resf171" style="pointer-events:none;border:none;width:170px" value="<?=$resf17?>"></i></span>
</td>

<td>
<span class="no_ah"><input class="" type="checkbox"  onclick="no_ap_sh18()"> <label class="no-aplicado">Fecha aplicada</label></span>
<div class="input-group date form_date18 no_ap188 no_ap_sh18"  data-date-format="dd MM yyyy" data-link-field="dtp_input1" id="no_ap1881" style="display:none;">
<input type="text"  class="form-control bcgno"  id="grr181" value="<?=$grr18?>"  readonly >
<span id="frem18" class="input-group-addon"><span  class="glyphicon glyphicon-remove "></span></span>
<span class="input-group-addon"style="display:none"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input  id="mirror_f18"  type="hidden"  > 
<input type="text" class="form-control grr"  value="<?=$grr18?>">
<input  id="mirror_d18"  type="hidden"  > 
<span style="color:red" id="atras18"><i>Dias de atraso : <input type="text" id="resf181" style="pointer-events:none;border:none;width:180px" value="<?=$resf18?>"></i></span>
</td>
</tr>
</table>
 </div>
    </div>
	  
  </div>
  <div class="col-md-12">
  <hr class="hr-st" />
   <div class="col-md-5">
   
     <div class="form-group">
      <label class="control-label" >Observaciones:</label>
       <textarea rows="11" class="form-control" name="acta_obs"><?=$acta_obs?></textarea>
    </div>
	
   </div>
   
 <div class="col-md-5 col-xs-offset-1">	 
<div class="form-group">
<label class="control-label" >Medicamento de Uso Frecuente:</label>
        
<textarea rows="11" class="form-control" name="acta_med_uso_f" ><?=$acta_med_uso_f?></textarea>
</div>

   </div>
 <div class="col-sm-12">
      <button type="submit" class="btn btn-success  btn-lg">GUARDAR DATOS</button>
	  <div id="insertionResult"></div>
	  <br/><br/><br/>
    </div>
	
   </div>

</div>


 </form>
<!-- <button class="btn btn-primary btn-lg">GUARDAR DATOS</button>-->
   
   </div> 

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script>

$('.dateInsert').mask('00-00-0000', {placeholder: 'dd-mm-AAAA'});
var x = document.getElementById("get-location-x");
var y = document.getElementById("get-location-y");
getLocation();
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  //x.innerHTML = "<strong>GPS-X:</strong> " + position.coords.latitude + 
 // "<br><strong>GPS-Y:</strong> " + position.coords.longitude;
 x.value =  position.coords.latitude;
  y.value =  position.coords.longitude;
}



$('input[type=radio][name=fecha_lleno_por]').change(function() {
$('#llenar_por_otro').val("");
;
});



$('#llenar_por_otro').keydown(function() {
$('input[type=radio][name=fecha_lleno_por]').prop('checked', false);
;
});



 

$('#home-ca-vi select').change(function(){
    var sum = 0;
	var result;
	  $('select :selected').each(function() {
		  
		   //var id_number = parseInt($(this).val().replace(/[^0-9.]/g, "")); 
		  id_number=parseInt($(this).val());
		  
        sum += Number(id_number);
    });
     $("#sumCaracViv").val(sum);
	 console.log(sum);
 if(sum > 75){
	 result ="Buena";
 } else if(sum >= 50 && sum < 74){
	  result ="Regular";
 } else{
	  result ="Mala";
 }
 $("#resultCarViv").val(result);
});



$('.tiene-acta').change(function() {
	var id_member = $(this).val();
	
      if($(this).is(":checked")) {
	 $(this).closest("tr").find('button').show();
	  getActaData( id_member );
      } else{
		  $(this).closest("tr").find('button').hide();
			$("#acta-nac-parent").html("");
		$.ajax({
		type:'POST',
		url: "<?=base_url('search/delBirthDateMember')?>",
		data: {id_member : id_member},
		success:function(data) {

		},

		});
		}
              
    });
	
	$('.ver-acta').click(function() {
	var id_member = $(this).attr("id");
	 getActaData( id_member );
	});
	
	
	function getActaData(id_member ){
		  var id_jefe = $('#id_jefe').val();
		$.ajax({
		type: "POST",
		url: "<?=base_url('search/getBirthDateMember')?>",
		data: {id_jefe:id_jefe,id_member:id_member},
		success:function(data){
		$("#acta-nac-parent").html(data);
		},
		});
}
	
	
	
$(document).ready(function (e) {
$('#save-all-data').on('submit', function (e) {
	e.preventDefault();
$.ajax({
url: "<?=base_url('search/saveAllFichaFamData')?>", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
dataType: 'json',
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(response)   // A function to be called if request succeeds
{

if(response.status == 1){
$('#insertionResult').html('<p class="alert alert-warning">'+response.message+'</p>');

} else{
	$('#insertionResult').html('<p class="alert alert-success">'+response.message+'</p>');
	
}

},
  error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#insertionResult').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
});
});
})
</script>
</body>
</html>
