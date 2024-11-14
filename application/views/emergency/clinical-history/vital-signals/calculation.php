<?php

 $get_number_only = preg_replace('/\D/', '', $edad);

 
 $count_number= strlen($get_number_only);

if(($count_number==3) && (strpos($edad, 'día') == false) && (strpos($edad, 'mes') == false)){
 $patient_age_range=  "adulto";
}
else{



$edad1 = substr($edad, 0, 2);

 if ((strpos($edad, 'día') == true) && (strpos($edad, 'mes') == false) ) {
//get first caracter
$patient_age_range='recien nacido (0-6 semanas)';


}



 else if((strpos($edad, 'mes') == true)&&(strpos($edad, 'día') == true)){
        
        
    if($edad1 ==1) {
    $patient_age_range='recien nacido (0-6 semanas)';
    
    }
    
    if($edad1 >1 && $edad1 <=11){
    $patient_age_range='infante (7 semanas -1 año)';

    }
    }

else if(strpos($edad, 'mes') == true) 
{
//get first caracter
$edad = substr($edad, 0, 2);

if($edad1 ==1 || $edad1 ==0){
$patient_age_range='recien nacido (0-6 semanas)';

}

if($edad1 >1 && $edad1 <=11){
$patient_age_range='infante (7 semanas -1 año)';

}
	
}
else {


switch($edad1) {
    case ($edad1 >= 1 && $edad1 <= 2): //the range from range of 0-20
       $patient_age_range= "lactante mayor";
   break;
   case ($edad1 >= 2 && $edad1 <= 6):
   
      $patient_age_range=  "pre-escolar";
   break;
   case ($edad1 >= 6 && $edad1 <= 13):

      $patient_age_range=  "escolar";
   break;
   case ($edad1 >= 13 && $edad1 <= 16):

      $patient_age_range=  "adolescente";
   break;
   
   case ($edad1 > 16):
      $patient_age_range=  "adulto";
 
}

	
	
}
}
if($patient_age_range=="recien nacido (0-6 semanas)"){
	$data['fr_resp_rank']='40-45';
	$data['fr_card_rank']='120-140';
	$data['fr_tempo_rank']='38';
	$data['sistol']='70-100';
	$data['diastol']='50-68';
}
else if($patient_age_range=="infante (7 semanas -1 año)"){
	$data['fr_resp_rank']='20-30';
	$data['fr_card_rank']='100-130';
	$data['fr_tempo_rank']='37.5-37.8';
	$data['sistol']='84-106';
	$data['diastol']='56-70';	
}
else if($patient_age_range=="lactante mayor"){
	$data['fr_resp_rank']='20-30';
	$data['fr_card_rank']='100-120';
	$data['fr_tempo_rank']='37.5-37.8';	
	$data['sistol']='90-106';
	$data['diastol']='58-70';	
}
else if($patient_age_range=="pre-escolar"){
	$data['fr_resp_rank']='20-30';
	$data['fr_card_rank']='80-120';
	$data['fr_tempo_rank']='37.5-37.8';
	$data['sistol=']='99-112';
	$data['diastol']='64-70';	
}
else if($patient_age_range=="escolar"){
	$data['fr_resp_rank']='12-20';
	$data['fr_card_rank']='80-100';
	$data['fr_tempo_rank']='37-37.5';
    $data['sisto']='104-124';
	$data['diastol']='64-86';	
}
else if($patient_age_range=="adolescente"){
	$data['fr_resp_rank']='12-20';
	$data['fr_card_rank']='70-80';
	$data['fr_tempo_rank']='37';
    $data['sistol']='118-132';
	$data['diastol']='70-82';	
} else{
	$data['fr_resp_rank']='12-20';
	$data['fr_card_rank']='60-80';
	$data['fr_tempo_rank']='36.2-37.2';
    $data['sistol']='110-140'; 
	$data['diastol']='70-90';	
}
$data['patient_age_range']=$patient_age_range;
?>
