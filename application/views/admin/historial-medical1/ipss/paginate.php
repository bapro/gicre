<?php
foreach ($ipss_paginate->result() as $row) {
$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
 $doc=$this->db->select('name')->where('id_user',$row->id_user)
 ->get('users')->row('name');	
?>
<h5 style="color:#FF0084">REGISTRO #<?=$page?> | creado por <?=$doc?>, <?=$inserted_time?></h5>
  <table class='table table-striped' id='change-bgd-pag-re'>
<tr>
<td></td>
<td>Ninguna</td>
<td>Menos de 1 vez de cada 5</td>
<td>Menos de la midad de las veces</td>
<td>Aproximadamente la mitad de las veces</td>
<td>más de la mitad de las veces</td>
<td>Casi siempre</td>
</tr>
<tr id='click1'>
<td id='not1'>
1. Durante más o menos los últimos 30 días
Cuantas veces a tenido la sensación de no vaciar
completamente la vejiga al terminar de orinar?
</td>
<td>0
<?php
$row->tr1_0;
if($row->tr1_0 ==0 && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='0' $checked> ";
?>
 </td>
<td>1
<?php
if($row->tr1_0 ==1 && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>2 <?php
if($row->tr1_0 ==2  && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='2' $checked> ";
?></td>
<td>3 <?php
if($row->tr1_0 ==3 && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='3' $checked> ";
?></td>
<td>4 <?php
if($row->tr1_0 ==4  && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='4' $checked> ";
?></td>
<td>5 <?php
if($row->tr1_0 ==5  && $row->tr1_0 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr1-0ed' class='trCheck' value='5' $checked> ";
?></td>

</tr>
<tr>
<td>
2- Durante más o menos los últimos 30 días,
 cuantas veces ha tenido que volver a orinar en las dos horas
 siguientes despues de haber orinado?
</td>
<td>0 
<?php
if($row->tr2_1 ==0  && $row->tr2_1 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr2_1 ==1 && $row->tr2_1 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>2 <?php
if($row->tr2_1 ==2 && $row->tr2_1 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='2' $checked> ";
?></td>
<td>3 <?php
if($row->tr2_1 ==3 && $row->tr2_1!=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='3' $checked> ";
?></td>
<td>4 <?php
if($row->tr2_1 ==4 && $row->tr2_1 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='4' $checked> ";
?></td>
<td>5 <?php
if($row->tr2_1 ==5 && $row->tr2_1 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr2-1ed' class='trCheck' value='5' $checked> ";
?></td>

</tr>
<tr>
<td>
3- Durante más o menos los últimos 30 días,
cuantas veces ha notado que, al orinar, paraba y comenzaba
de nuevo varias veces?
</td>
<td>0
<?php
if($row->tr3_2 ==0 && $row->tr3_2 !=NULL ){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>1
<?php
if($row->tr3_2 ==1 && $row->tr3_2 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>2
<?php
if($row->tr3_2 ==2 && $row->tr3_2 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='2' $checked> ";
?>
</td>
<td>3
<?php
if($row->tr3_2 ==3 && $row->tr3_2 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='3' $checked> ";
?>
</td>

<td>4
<?php
if($row->tr3_2 ==4 && $row->tr3_2 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='4' $checked> ";
?>
</td>
<td>5
<?php
if($row->tr3_2 ==5 && $row->tr3_2 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr3-2ed' class='trCheck' value='5' $checked> ";
?>
</td>
</tr>
<tr>
<td>4- Durante más o menos los últimos 30 días,
cuantas veces ha tenido dificultad para aguantarse la ganas de orinar?
</td>
<td>
0 <?php
if($row->tr4_3 ==0 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr4_3 ==1 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr4_3 ==2 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr4_3 ==3 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr4_3 ==4 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr4_3 ==5 && $row->tr4_3 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr4-3ed' class='trCheck' value='5' $checked> ";
?>
</td>

</tr>
<tr>
<td>5- Durante más o menos los últimos 30 días,
cuantas veces ha observado que el chorro de orina es poco fuerte?
</td>
<td>
0 <?php
if($row->tr5_4 ==0 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr5_4 ==1 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr5_4 ==2 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr5_4 ==3 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr5_4 ==4 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr5_4 ==5 && $row->tr5_4 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr5-4ed' class='trCheck' value='5' $checked> ";
?>
</td>

</tr>
<tr>
<td>
6- Durante más o menos los últimos 30 días,
cuantas veces ha tenido que apretar o hacer fuezsa para comenzar 
a orinar?
</td>
<td>
0 <?php
if($row->tr6_5 ==0 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr6_5 ==1 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr6_5 ==2 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr6_5 ==3 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr6_5 ==4 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr6_5 ==5 && $row->tr6_5 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr6-5ed' class='trCheck' value='5' $checked> ";
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
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr7_6 ==1 && $row->tr7_6 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr7_6 ==2 && $row->tr7_6 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr7_6 ==3 && $row->tr7_6 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr7_6 ==4 && $row->tr7_6 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr7_6 ==5 && $row->tr7_6 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr7-6ed' class='trCheck' value='5' $checked> ";
?>
</td>
</tr>
<tr>
<td style='text-align:right'>
<h4>PUNTUACION IPS TOTAL</h4>
</td>
<td colspan='7'>
<p id='ipss-resulted'></p>
<input id='ipss-colored' type='hidden'/>
</td>
</tr>
</table>
<table class='table'>
<tr>
<td>
8- Como se sentira si tuviera que pasar el resto de la vida con los sintomás
prostaticos tal y como los siente ahora?

</td>
<td>
0 <?php
if($row->tr8 ==0 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='0' $checked> ";
?>
</td>
<td>
1 <?php
if($row->tr8 ==1 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='1' $checked> ";
?>
</td>
<td>
2 <?php
if($row->tr8 ==2 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='2' $checked> ";
?>
</td>
<td>
3 <?php
if($row->tr8 ==3 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='3' $checked> ";
?>
</td>


<td>
4 <?php
if($row->tr8 ==4 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='4' $checked> ";
?>
</td>

<td>
5 <?php
if($row->tr8 ==5 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='5' $checked> ";
?>
</td>

<td>
6 <?php
if($row->tr8 ==6 && $row->tr8 !=NULL){
	$checked="checked";
} else{
	$checked="";
	}
echo "<input type='radio' name='tr8ed' class='trCheck8' value='6' $checked> ";
?>
</td>
</tr>
<tr>
<td>
  <button type="button" id="update-ipps" class="btn btn-md btn-success"><i class="fa fa-check after-ipps" style="display:none;color:blue;font-size:30px;position:absolute"></i> CAMBIAR</button>
		<a   class="btn btn-md btn-primary"  target="_blank" href="<?php echo base_url("printings/print_if_foto_c/$row->id/$id_patient/$row->id_user/$centro_medico/ipps")?>"  ><i class="fa fa-print"></i> Imprimir</a>
  
</td>
</tr>
</table>

<?php
}

?>

<script>
function calcscore(){
    var score = 0,text, color;
    $(".trCheck:checked").each(function(){
        score+=parseInt($(this).val(),10);
    });
	
	 if(score <=7){
		text= score+ ' | 0-7: obstruccion urinaria leve (requiere dar seguimiento al problema)'; 
     color='green';		
	  }else if(score >7 && score <=18){
		  text=score+ ' | 8-18: obstruccion urinaria moderada (requiere tratamiento medico con alfa bloqueadores o inhibidor de la cinco-alfa-reductasa)'; 
	  color='#ceaf18';
	  }
	  
	  else if(score > 18 && score <=35){
		  text=score+ ' | 19-35: obstruccion urinaria severa (requiere tratamiento quirurgico)'; 
		  color='red';
	  }
	   $("#ipss-colored").val(color);
	
 $("#ipss-resulted").text(text).css('color',color).css('font-weight','bold');
}

calcscore();
$().ready(function(){
    $(".trCheck").change(function(){
        calcscore()
    });
});

//-------------------------------------------------------------------------------------------------------
$(".load-cirugia").not('.registro-li').hide();

$('#update-ipps').on('click', function(event) {
	event.preventDefault();
var tr1_0 = $('input:radio[name=tr1-0ed]:checked').val();
var tr2_1 = $('input:radio[name=tr2-1ed]:checked').val();
var tr3_2 = $('input:radio[name=tr3-2ed]:checked').val();
var tr4_3 = $('input:radio[name=tr4-3ed]:checked').val();
var tr5_4 = $('input:radio[name=tr5-4ed]:checked').val();
var tr6_5 = $('input:radio[name=tr6-5ed]:checked').val();
var tr7_6 = $('input:radio[name=tr7-6ed]:checked').val();
var tr8 = $('input:radio[name=tr8ed]:checked').val();
var result = $('#ipss-resulted').text();
var ipsscolor = $('#ipss-colored').val();
$.ajax({
url:"<?php echo base_url(); ?>admin_medico/saveIPPS",
data: {tr1_0:tr1_0,tr2_1:tr2_1,tr3_2:tr3_2,tr4_3:tr4_3,tr5_4:tr5_4,tr6_5:tr6_5,tr7_6:tr7_6,tr8:tr8,id_user:<?=$user_id?>,idipss:<?=$row->id?>,result:result,ipsscolor:ipsscolor},
method:"POST",
success:function(data){
paginationIpss();

  $('.after-ipps').fadeIn('slow', function(){
    $('.after-ipps').delay(3000).fadeOut();
    });


},
 
});

});

</script>

