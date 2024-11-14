<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px #E6E6E6 border-bottom: solid 1px #E6E6E6; }
     td { border:none;border-bottom:1px solid #E6E6E6;}
    div.footer-firma {
      position: absolute;
      width: 80%;
      bottom: 80px;
    }
	
	.center-img {
   width:70%;
   height:70px;
   object-fit:cover;
   object-position:50% 50%;
  }
  p{}
 
</style>
</head>
<body>
<?php

$sala=$this->clinical_history->select('name,inserted_time,centro,id_user,fecha_ingreso,diagno_ing')->where('id',$id_sala)->get($orden_medica_sala)->row_array();
if(empty($sala)){
redirect('/page404');
}
$centro=$this->db->select('name,logo,calle,barrio,primer_tel,segundo_tel,rnc,provincia,municipio')->where('id_m_c',$sala['centro'])->get('medical_centers')->row_array(); 

$provinciacent=$this->db->select('title')->where('id',$centro['provincia'])->get('provinces')->row('title');
$muncipiocent=$this->db->select('title_town')->where('id_town',$centro['municipio'])->get('townships')->row('title_town');


 $paciente=$this->db->select('provincia,municipio,nombre,tel_resi,tel_cel,email,afiliado,cedula,photo,ced1,ced2,ced3,nacionalidad,date_nacer,seguro_medico,afiliado,plan,calle')->where('id_p_a',$id_historial)
 ->get('patients_appointments')->row_array();

 $provincia=$this->db->select('title')->where('id',$paciente['provincia'])
 ->get('provinces')->row('title');


$municipio=$this->db->select('title_town')->where('id_town',$paciente['municipio'])
 ->get('townships')->row('title_town');


 $seguron=$this->db->select('title,logo')->where('id_sm',$paciente['seguro_medico'])->get('seguro_medico')->row_array();

if($seguron['logo']==""){
	$logoseg="<span style='font-size:12px'><strong>Seguro Medico</strong> Privado</span>";
}
else{
$logoseg='<img  style="width:50px;" src="'.base_url().'/assets/img/seguros_medicos/'.$seguron['logo'].'"  />';
}


 $nss=$this->db->select('input_name,inputf')->where('patient_id',$id_historial)
 ->get('saveinput')->row_array();

  $plan=$this->db->select('name')->where('id',$paciente['plan'])->get('seguro_plan')->row('name');
  $this->load->view('getPatientAge');
?>
<table  id='header-table' style="width:100%" >
<tr>
<td>
<img class="img "  style="width:80px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro['logo']; ?>"  />
</td>
<td>
<h2  align="center"> <?=$centro['name']?></h2>
<p><strong>Tel :</strong> <?=$centro['primer_tel']?> <?=$centro['segundo_tel']?></p>

 <p><strong>RNC : </strong><?=$centro['rnc']?></p>
<p style="font-size:11px"><strong>Ubicacion :</strong> <?=$centro['calle']?>, <?=$centro['barrio']?>, <?=$provinciacent?>, <?=$muncipiocent?> </p>
</td>

</tr>
</table>

<p style='text-align:center'><strong><?=$title?></strong></p>
<table  align="left" style="width:100%" class='r-b' >
<tr>
	<?=$display?> 	
		<td style="text-transform:uppercase;"><strong><?=$paciente['nombre']?></strong></td>

		<td style="text-align:center">
		<table class="r-b" style="width:100%;border-collapse: collapse; border-spacing: 0;">
		<tr>
		<td>
		<?=$logoseg?>
		</td>
		<td style="text-align:center">
		<?php
		$afiliado=$paciente['afiliado'];
		if($paciente['afiliado'] !=""){echo "$afiliado ";}
		if($paciente['plan'] !=""){echo "$plan";}
		?>
		</td>
		<?php
		if($nss) {?>
		<td style="text-align:center;text-transform:lowercase"><?=$nss['inputf']?> <span style="color:red"><?=$nss['input_name']?></span></td><td></td>
		<?php } ?>
		</tr>

		</table>
		</td>
		
	</tr>



<tr style="background:rgb(192,192,192);color:white">

		<td><strong>Cedula</td>
		<td><strong>Nacionalidad</strong></td>
		<td><strong>Edad</strong></td>
		<td style='width"70px'><strong>Telefonos</strong></td>
		<td></td>
	</tr>

	<tr>
		<td style="" > <?=$paciente['ced1']?>-<?=$paciente['ced2']?>-<?=$paciente['ced3']?></td>
		<td style=""><?=$paciente['nacionalidad']?></td>
		<td style=""><?=getPatientAge($paciente['date_nacer'])?></td>
		<td style=";"><?=$paciente['tel_resi']?> / <?=$paciente['tel_cel']?></td>
		<td style="text-transform: lowercase;"></td>
	</tr>
</table>
<hr/>
<table>
<tr>
<?php if($sala['name']){?>
<td><strong>SALA:</strong> <?=$sala['name']?></td>
<?php } ?>
<?php if($sala['fecha_ingreso']) {?>
<td><strong>FECHA DE INGRESO:</strong> <?= date("d-m-Y", strtotime($sala['fecha_ingreso']))?></td>
<?php } if($sala['diagno_ing']) {?>
 <td><strong>DIAGNOSTICO DE INGRESO:</strong> <?=$sala['diagno_ing']?></td>
<?php } ?>
</tr>
</table>
<hr/>
I- MEDICAMENTOS
<table  style="width:100%" cellspacing="0" >

	<thead>
    <tr>
	   <td style="width:4px"><strong>Fecha</strong></td>
        <td style="width:3px"><strong>Medica.</strong></td>
		 <td style="width:5px"><strong>Present.</strong></td>
		 <td style="width:1px"><strong>Frec.</strong></td>
		  <td style="width:1px"><strong>Via</strong></td>
       <td style="width:1px"><strong>Nota</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php
    if($recetas->result() !=NULL){
	foreach($recetas->result() as $row)
	 
	 {
	 $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));			 
		
		 ?>
       <tr>
		<td><?=$fecha;?></td>
		<td><?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
		<td><?=$row->presentacion;?></td>
		<td><?=$row->frecuencia;?></td>
		<td><?=$row->via;?><br/><?=$row->oyo;?></td>
		<td><?=$row->nota;?></td>
      </tr>
		
	 <?php
	 }
	}
	 ?>
    </tbody>    
</table>
<br/>
II- ESTUDIOS

<table style="width:100%">
	<thead>
     <tr>
	   <td style="width:1px"><strong>Fecha</strong></td>
        <td style="width:5px"><strong>Estudio</strong></td>
		 <td style="width:5px"><strong>Parte del cuerpo</strong></td>
		  <td style="width:1px"><strong>Lateralidad</strong></td>
        <td style="width:5px"><strong>Observaciones</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php 
	 if($estudios->result() !=NULL){
	foreach($estudios->result() as $row)
	 
	 {
		 if($orden_medica_sala=='orden_medica_sala'){
			 $estudio=$row->estudio;
		 }else{
		 $estudio=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios_test')->row('sub_groupo');
		 }
	   	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	   
	   $fecha = date("d-m-Y H:i:s", strtotime($row->insert_date));	 
		  
	 ?>
        <tr  >
		<td><?=$fecha;?></td>
		<td>
		<?=$estudio;?> 
		</td>
		<td><?=$row->cuerpo;?></td>
		<td><?=$row->lateralidad;?></td>
		<td><?=$row->observacion;?></td>
      </tr>
		
	 <?php
	 }
	 }
	 ?>
    </tbody>    
</table>
<br/>

III- LABORATORIOS
<table   style="width:100%">
<thead>
    <tr>
	   <td style="width:1px"><strong>Fecha</strong></td>
        <td style="width:5px"><strong>Laboratorio</strong></td>
</tr>
    </thead>
    <tbody>
    <?php
    if($lab->result() !=NULL){
	foreach($lab->result() as $row)
	 
	 {
	 if($orden_medica_sala=='orden_medica_sala'){
	$lab=$this->clinical_history->select('name')->where('id',$row->laboratory)
  ->get('laboratories')->row('name');
	}else{
    $lab=$this->clinical_history->select('sub_groupo')->where('id_c_taf',$row->laboratory)
  ->get('centros_tarifarios')->row('sub_groupo');
	}
	
  $insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
 ?>
        <tr  >
		<td><?=$insert_time;?></td>
		<td><?=$lab;?></td>
	 </tr>
		
	 <?php
	 }
	}
	 ?>
    </tbody>    
</table>
<br/>
IV- MEDIDAS GENERALES
<table style="width:100%">
	<thead>
     <tr >
	   <td style="width:1px"><strong>Fecha</strong></td>
        <td style="width:5px"><strong>Medidas Generales</strong></td>
		 <td style="width:5px"><strong>Descripcion</strong></td>
		  <td style="width:1px"><strong>Intervalo De Realizacion</strong></td>
     </tr>
    </thead>
    <tbody>
    <?php 
	 $cpt="";
	 if($med_med_gen->result() !=NULL){
	foreach($med_med_gen->result() as $row)
	 
	 {
		 $op2=$this->db->select('name')->where('id_user',$row->id_user)->get('users')->row('name');
		
	   
       $fecha = date("d-m-Y H:i:s", strtotime($row->inserted_time));	 
		  
	 ?>
        <tr  >
		<td><?=$fecha;?></td>
		<td>
		<?=$row->medidas_gen;?>
		</td>
		<td><?=$row->descripcion_mg;?></td>
		<td><?=$row->intervalo_de_real;?></td>
	

      </tr>
		
	 <?php
	 }
	 }
	 ?>
    </tbody>    
</table>

<?php
$id_op=$sala['id_user'];
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$id_doc)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
 
   $sello_doc=$this->db->select('sello')->where('doc',$id_doc)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

$firma_doc="$id_doc-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {
$firma='<td style="border:none"><img  style="width:170px;" src="'.base_url().'/assets/update/'.$firma_doc.'"  /></td>';
} else {
$firma='';
}
?>
<table class='r-b'  >
<tr>
<td  style="color:red"> <?=date("d-m-Y H:i:s", strtotime($sala['inserted_time']));?></td>
<?=$firma?>
<?=$sello?>
</tr>

</table>
<?php
//------------------------------------------------------------------------------------------------
$data1 = array(
 'printing' =>0
);

$where1 = array(
 'id_user' =>$user_id,
  'id_patient' =>$patient_id
);
$this->clinical_history->where($where1);

$this->clinical_history->update($ord_med_gen, $data1);
//----------------------------------------------------------------------------
$data2 = array(
 'printing' =>0
);

$where2 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->clinical_history->where($where2);

$this->clinical_history->update($orden_medcia_lab, $data2);

//----------------------------------------------------------------------------
$data3 = array(
 'printing' =>0
);

$where3 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->clinical_history->where($where3);

$this->clinical_history->update($orden_medica_estudios, $data3);
//-----------------------------------------------------------------------------------

$data4 = array(
 'printing' =>0
);

$where4 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->clinical_history->where($where4);

$this->clinical_history->update($orden_medica_recetas, $data4);
//-----------------------------------------------------------------------------------
$author = $doc['name'];
$exeq = $doc['exequatur'];

$mpdf->setFooter("Dr $author, Exeq. $exequatur, $area<br/>Página {PAGENO} de {nb}");
?>
</body>
</html>