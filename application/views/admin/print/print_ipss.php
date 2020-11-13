<!DOCTYPE html>
<html lang="en">
<head>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/mpdf.css">
<style>
 table { border-collapse: collapse; witdh:100%;font-size: 10px}
    tr { border-top: solid 1px gray border-bottom: solid 1px gray; }
    td { border-right: none; border-left: none;padding: 1em; }


strong{font-size:13px}
#wrapper {
  display: flex;
}

#left {
  flex: 0 0 65%;
}

#right {
  flex: 1;
}
</style>
</head>

<?php
foreach ($ipss_data->result() as $row)
?>
<div style="color:red;font-size:11px;">Fecha de impresión <?=date("d-m-Y H:i");?></div>
 <table style='width:100%' >
<tr>
<td></td>
<td>Ninguna</td>
<td>Menos de 1 vez de cada 5</td>
<td>Menos de la midad de las veces</td>
<td>Aproximadamente la mitad de las veces</td>
<td>más de la mitad de las veces</td>
<td>Casi siempre</td>
</tr>
<tr>
<td>
1. Durante más menos los ultimos 30 días
Cuantas veces a tenido la sensación de no vaciar
completamente la vejiga al terminar de orinar?
</td>
<td>0
<?php
$row->tr1_0;
if($row->tr1_0 ==0 && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='0' $checked> ";
?>
 </td>
<td>1
<?php
if($row->tr1_0 ==1 && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='1' $checked> ";
?>
</td>
<td>2 <?php
if($row->tr1_0 ==2  && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='2' $checked> ";
?></td>
<td>3 <?php
if($row->tr1_0 ==3 && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='3' $checked> ";
?></td>
<td>4 <?php
if($row->tr1_0 ==4  && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='4' $checked> ";
?></td>
<td>5 <?php
if($row->tr1_0 ==5  && $row->tr1_0 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed'  value='5' $checked> ";
?></td>

</tr>
<tr>
<td>
2- Durante más o menos los ultimos 30 días,
 cuantas veces ha tenido que volver a orinar en las dos horas
 siguientes despues de haber orinado?
</td>
<td>0 
<?php
if($row->tr2_1 ==0  && $row->tr2_1 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr2_1 ==1 && $row->tr2_1 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='1' $checked> ";
?>
</td>
<td>2 <?php
if($row->tr2_1 ==2 && $row->tr2_1 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='2' $checked> ";
?></td>
<td>3 <?php
if($row->tr2_1 ==3 && $row->tr2_1!=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='3' $checked> ";
?></td>
<td>4 <?php
if($row->tr2_1 ==4 && $row->tr2_1 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='4' $checked> ";
?></td>
<td>5 <?php
if($row->tr2_1 ==5 && $row->tr2_1 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed'  value='5' $checked> ";
?></td>

</tr>
<tr>
<td>
3- Durante más o menos los ultimos 30 días,
cuantas veces ha notado que, al orinar, paraba y comenzaba
de nuevo varias veces?
</td>
<td>0
<?php
if($row->tr3_2 ==0 && $row->tr3_2 !=NULL ){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='0' $checked> ";
?>
</td>
<td>1
<?php
if($row->tr3_2 ==1 && $row->tr3_2 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='1' $checked> ";
?>
</td>
<td>2
<?php
if($row->tr3_2 ==2 && $row->tr3_2 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='2' $checked> ";
?>
</td>
<td>3
<?php
if($row->tr3_2 ==3 && $row->tr3_2 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='3' $checked> ";
?>
</td>

<td>4
<?php
if($row->tr3_2 ==4 && $row->tr3_2 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='4' $checked> ";
?>
</td>
<td>5
<?php
if($row->tr3_2 ==5 && $row->tr3_2 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed'  value='5' $checked> ";
?>
</td>
</tr>
<tr>
<td>4- Durante más o menos los ultimos 30 días,
cuantas veces ha tenido dificultad para aguantarse la ganas de orinar?
</td>
<td>
0 <?php
if($row->tr4_3 ==0 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr4_3 ==1 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr4_3 ==2 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr4_3 ==3 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr4_3 ==4 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr4_3 ==5 && $row->tr4_3 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed'  value='5' $checked> ";
?>
</td>

</tr>
<tr>
<td>5- Durante más o menos los ultimos 30 días,
cuantas veces ha observado que el chorro de orina es poco fuerte?
</td>
<td>
0 <?php
if($row->tr5_4 ==0 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr5_4 ==1 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr5_4 ==2 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr5_4 ==3 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr5_4 ==4 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr5_4 ==5 && $row->tr5_4 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed'  value='5' $checked> ";
?>
</td>

</tr>
<tr>
<td>
6- Durante más o menos los ultimos 30 días,
cuantas veces ha tenido que apretar o hacer fuerza para comenzar 
a orinar?
</td>
<td>
0 <?php
if($row->tr6_5 ==0 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr6_5 ==1 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr6_5 ==2 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr6_5 ==3 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr6_5 ==4 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr6_5 ==5 && $row->tr6_5 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed'  value='5' $checked> ";
?>
</td>
</tr>
<tr>
<td>
7- Durante más o menos los últimos 30 días,
cuántas veces suele tener que levantarse para orinar desde que se va a la cama 
por la noche haste que se levanta por la mañana.
</td>
<td>
0 <?php
if($row->tr7_6 ==0 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr7_6 ==1 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr7_6 ==2 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr7_6 ==3 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr7_6 ==4 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr7_6 ==5 && $row->tr7_6 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed'  value='5' $checked> ";
?>
</td>
</tr>
<tr>
<td>
<H5>PUNTUACION IPS TOTAL</H5>
</td>
<td colspan='7'><span style='font-size:12px;color:<?=$row->ipsscolor?>'><strong><?=$row->result?></strong></span></td>
</tr>
<tr>
<td>
8- Como se sentira si tuviera que pasar el resto de la vida con los sintomás
prostaticos tal y como los siente ahora?

</td>
<td>
0 <?php
if($row->tr8 ==0 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr8 ==1 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr8 ==2 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr8 ==3 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr8 ==4 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr8 ==5 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='5' $checked> ";
?>
</td>

<td>
6<?php
if($row->tr8 ==6 && $row->tr8 !=NULL){
	$checked="checked='checked'";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8' class='trCheck8' value='6' $checked> ";
?>
</td>
</tr>
</table>




<div id="footer">
<?php
 $doc=$this->db->select('name,exequatur,area')->where('id_user',$row->id_user)
 ->get('users')->row_array();
 $area=$this->db->select('title_area')->where('id_ar',$doc['area'])->get('areas')->row('title_area');
 
      $sello_doc=$this->db->select('sello')->where('doc',$row->id_user)->where('dist',0)->get('doctor_sello')->row('sello');

if ($sello_doc) {
$sello='<td style="border:none"><img  style="width:150px;" src="'.base_url().'/assets/update/'.$sello_doc.'"  /></td>';
}else{
$sello='';	
}
?>
<table class='r-b'  >
<tr>
<td style="text-align:right"><strong><i>Dr</strong> <?=$doc['name']?></i></td>
<td style="text-align:right"><strong><i>Exeq.</strong> <?=$doc['exequatur']?></i></td>
 <td style="text-align:right"><?=$area?></i></td>
<td  style="text-align:right"> <?=date("d-m-Y H:i:s", strtotime($row->inserted_time));?></td>
</tr>

</table>
<table class='r-b' align="center"  >
<tr>
<td style="text-align:center">
<?php 
$firma_doc="$row->id_user-1.png";

$signature = "assets/update/$firma_doc";

if (file_exists($signature)) {?>
<img  style="width:300px;margin: -20px;" src="<?= base_url();?>/assets/update/<?=$firma_doc?>"  />
<?php
} else {

}
?>
<hr />
<span style="font-size:11px" ><strong>Firma autorizada y sello del medico</strong></span>
</td>
<?=$sello?>
</tr>
</table>
</div>
</html>
