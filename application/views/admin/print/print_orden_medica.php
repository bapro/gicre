<?php

$sala=$this->db->select('name,inserted_time,centro,id_user')->where('idsala',$id_sala)->get($orden_medica_sala)->row_array();
if(empty($sala)){
redirect('/page404');
}
$cent=$this->db->select('name')->where('id_m_c',$sala['centro'])->get('medical_centers')->row('name'); 
?>
<h3><?=$cent; ?></h3>
<?php if($sala['name']){?>
<p><strong>Sala</strong> <?=$sala['name']?></p>
<?php } ?>
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
		 $med=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
		 ?>
       <tr>
		<td><?=$fecha;?></td>
		<td><?=$med;?><br/><i><u><?=$row->dosis;?></u></i></td>
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
		//$estudio=$this->db->select('name')->where('id',$row->estudio)->get('type_studies')->row('name');
	   
	   $estudio=$this->db->select('sub_groupo')->where('id_c_taf',$row->estudio)->get('centros_tarifarios')->row('sub_groupo');
	   
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
	//$lab=$this->db->select('name')->where('id',$row->laboratory)->get('laboratories')->row('name');
	$lab=$this->db->select('sub_groupo')->where('id_c_taf',$row->laboratory)->get('centros_tarifarios')->row('sub_groupo');	
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
<br/>
<?php
$id_op=$sala['id_user'];
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$id_op)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
 
   $sello_doc=$this->db->select('sello')->where('doc',$id_op)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}

$firma_doc="$id_op-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {
$firma='<td style="border:none"><img  style="width:170px;" src="'.base_url().'/assets/update/'.$firma_doc.'"  /></td>';
} else {
$firma='';
}
?>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong><i>Dr</strong> <?=$doc['name']?></i></td>
<td style="text-align:right"><strong><i>Exeq.</strong> <?=$doc['exequatur']?></i></td>
 <td style="text-align:right"><?=$area?></i></td>
<td  style="text-align:right"> <?=date("d-m-Y H:i:s", strtotime($sala['inserted_time']));?></td>
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
$this->db->where($where1);

$this->db->update($ord_med_gen, $data1);
//----------------------------------------------------------------------------
$data2 = array(
 'printing' =>0
);

$where2 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->db->where($where2);

$this->db->update($orden_medcia_lab, $data2);

//----------------------------------------------------------------------------
$data3 = array(
 'printing' =>0
);

$where3 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->db->where($where3);

$this->db->update($orden_medica_estudios, $data3);
//-----------------------------------------------------------------------------------

$data4 = array(
 'printing' =>0
);

$where4 = array(
 'operator' =>$user_id,
  'historial_id' =>$patient_id
);
$this->db->where($where4);

$this->db->update($orden_medica_recetas, $data4);
//-----------------------------------------------------------------------------------
?>