<style>
.center-pat-img {
   width:75px;
   height:75px;
   object-fit:cover;
   object-position:50% 50%;
  }
  .im-bg tr td{font-size:12px}
  </style>
<table style='width:100%;' class='im-bg table' >
<tr>
<td>	
<?php
$this->padron_database = $this->load->database('padron',TRUE);
$patient_data=$this->db->select('*')->where('id',$id_hosp)->get('hospitalization_data')->row_array();
$causa=$patient_data['causa'];
$sala=$patient_data['sala'];
$cama=$patient_data['cama'];
 $fecha_ingreso=$patient_data['timeinserted'];
 $patient=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado,cedula,id_p_a,date_nacer_format,sexo')->where('id_p_a',$patient_data['id_patient'])
 ->get('patients_appointments')->row_array(); 
$patient_id=$patient['id_p_a'];
$sexo=$patient['sexo'];
$photo=$patient['photo'];
$nombre=$patient['nombre'];
$date_nacer=$patient['date_nacer'];
$cedula=$patient['cedula'];
$ced1=$patient['ced1'];
$ced2=$patient['ced2'];
$ced3=$patient['ced3'];
$seguro_medico_name=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');


if($photo=="padron"){
$photop=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ced1)
->where('SEQ_CED',$ced2)
->where('VER_CED',$ced3)
->get('fotos')->row('IMAGEN');
 if($photo){
?>
<a title="Haga un clic para agrandar." data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin_medico/zoom_image/$ced1/$ced2/$ced3")?>">
<?php
$imgpat='<img  class="center-pat-img "  src="data:image/jpeg;base64,'. base64_encode($photop) .'"  />';	
echo $imgpat;
echo "</a>";
}else{
echo "<a>";	
$imgpat='<img class="center-pat-img "  src="'.base_url().'/assets/img/user.png"  />';	
echo $imgpat;
?>
</a>
<?php
}

} else if($photo==""){
	$sex = substr($sexo, 0, 3);
echo '<img class="center-pat-img " src="'.base_url().'/assets/img/user.png"  />';
echo "<strong>Sexo</strong> $sex.";
}
else{
$sexo="";
?>
<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin_medico/zoom_image_ad/$patient_id")?>">
<img  class="center-pat-img " src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $photo; ?>"  />
</a>
<?php }

$agett=getPatientAge($date_nacer);


?>



</td>
<td>	
<table class=" myFormatHeader" style='width:100%' > 
     
        <tbody> 
            <tr> 
			 <td><strong>Nombres</strong> <?=$nombre;?></td>
			 <td><strong>Edad</strong> <?=$agett?> </td>
			<td><strong>Numero</strong> <?=$patient_id;?></td>
                <td><strong>Cedula</strong> <?=$cedula;?></td>
				 <td><strong>Seguro</strong> <?=$seguro_medico_name;?></td>
            </tr> 
			<tr> 
			<td><strong>Fecha De Ingreso</strong> <?=date("d-m-Y H:i:s", strtotime($fecha_ingreso));?></td>
			 <td><strong>Diagnostico De Ingreso</strong> <?=$causa;?></td>
			<td><strong>Sala</strong> <?=$sala?></td>
             <td><strong>Cama</strong> <?=$cama;?></td>
				
				
           </tr> 
        </tbody> 
    </table> 
</td>
</tr>
</table>
