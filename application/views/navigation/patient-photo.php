<?php
foreach($photo_rows as $row)
if($row->photo=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$row->ced1)
->where('SEQ_CED',$row->ced2)
->where('VER_CED',$row->ced3)
->get('fotos')->row('IMAGEN');

 if($photo){

echo '<img class="center" loading="lazy" width="290" height="252" src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';	

}else{
echo '<img class="center" loading="lazy" width="290" height="278" src="'.base_url().'/assets/img/user.png"  />';	

}

} 
else if($row->photo==""){
echo '<img class="center" loading="lazy" width="290" height="278" src="'.base_url().'/assets/img/user.png"  />';		
}
else{
	?>
<img class="center" loading="lazy" style="" width="290" height="278" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
<?php

}


?>