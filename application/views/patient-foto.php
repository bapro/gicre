 <?php
 foreach($patient_data as $pat)
if($pat->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$pat->ced1)
->where('SEQ_CED',$pat->ced2)
->where('VER_CED',$pat->ced3)
->get('fotos')->row('IMAGEN');
echo '<img style="width:130px;float:left; " src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
} else if($pat->photo==""){
echo "No hay Foto";	
}
else{
	?>
<img  style="width: auto;height :100px;float:left; " src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $pat->photo; ?>"  />
<?php

}
?>