
<?php

$cent=$this->db->select('name')->where('id_m_c',$centro)->get('medical_centers')->row('name'); 
?>
<h3><?=$cent; ?></h3>
<h3><?=$enviado; ?></h3>
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
     if (is_numeric($row->medica)){	 
		 $medname=$this->db->select('name')->where('id',$row->medica)->get('emergency_medicaments')->row('name');
	 }else{
		$medname=$row->medica; 
	 }
		 ?>
       <tr>
		<td><?=$fecha;?></td>
		<td><?=$medname;?><br/><i><u><?=$row->dosis;?></u></i></td>
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
		$estudio=$this->db->select('name')->where('id',$row->estudio)
       ->get('type_studies')->row('name');
	   
	   	$cuerpo=$this->db->select('name')->where('id',$row->cuerpo)
       ->get('type_body_parts')->row('name');
	    
	 ?>
        <tr  >
		<td><?=$fecha;?></td>
		<td>
		<?=$row->estudio;?>
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
$lab=$this->db->select('sub_groupo')->where('id_c_taf',$row->laboratory)->get('centros_tarifarios')->row('sub_groupo');
$insert_time = date("d-m-Y H:i:s", strtotime($row->insert_time));
?>
<tr>
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

<table class='r-b'  >
<tr>
<td style="text-align:right"><strong><i>Dr</strong> <?=$doctor?></i></td>
<td style="text-align:right"><strong><i>Exeq.</strong> <?=$exequatur?></i></td>
 <td style="text-align:right"><?=$area?></i></td>

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