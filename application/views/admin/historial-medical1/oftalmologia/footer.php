<?php foreach($show_oft as $img) ?>

<script>
let pointSize2 = 3;
var points2 = [];
var timeout2 = 300;
var clicks2 = 0;

const canvas2 = document.getElementById("canvas3");
const ctx2 = canvas2.getContext("2d");
let cw2 = (canvas2.width = 400);
let ch2 = (canvas2.height = 200);

function getPosition2(event) {
  var rect2 = canvas2.getBoundingClientRect();
  return {
    x: event.clientX - rect2.left,
    y: event.clientY - rect2.top
  };
}

function drawCoordinates2(point, r) {
  ctx2.fillStyle = "#ff2626"; // Red color
  ctx2.beginPath();
  ctx2.arc(point.x, point.y, r, 0, Math.PI * 2, true);
  ctx2.fill();
}






canvas2.addEventListener("click", function(e) {
  clicks2++;
  var m2 = getPosition2(e);
  // this point won't be added to the points array
  // it's here only to mark the point on click since otherwise it will appear with a delay equal to the timeout
  drawCoordinates2(m2, pointSize2);
  
  if (clicks2 == 1) {
    setTimeout(function() {
      if (clicks2 == 1) {
        // on click add a new point to the points array
        points2.push(m2);
      } else { // on double click 
        // 1. check if point in path
        for (let i = 0; i < points2.length; i++) {
          ctx2.beginPath();
          ctx2.arc(points2[i].x, points2[i].y, pointSize2, 0, Math.PI * 2, true);

          if (ctx2.isPointInPath(m2.x, m2.y)) {
            points2.splice(i, 1); // remove the point from the array
            break;// if a point is found and removed, break the loop. No need to check any further.
          }
        }

        //clear the canvas
        ctx2.clearRect(0, 0, cw2, ch2);
      }
   ctx2.drawImage(base_image_oj, 0, 0);
      points2.map(p => {
        drawCoordinates2(p, pointSize2);
      });
      clicks2 = 0;
    }, timeout2);
  }
});


oyo();

function oyo()
{
  base_image_oj = new Image();
 base_image_oj.src = '<?= base_url();?>assets/img/oftal/<?php echo $img->ojo; ?>';
  base_image_oj.onload = function(){
    ctx2.drawImage(base_image_oj, 0, 0);
  }
}


//-------FONDO-------------------------------------------------------------



let pointSize22 = 3;
var points22 = [];
var timeout22 = 300;
var clicks22 = 0;

const canvas22 = document.getElementById("canvas4");
const ctx22 = canvas22.getContext("2d");
let cw22 = (canvas22.width = 400);
let ch22 = (canvas22.height = 200);

function getPosition22(event) {
  var rect22 = canvas22.getBoundingClientRect();
  return {
    x: event.clientX - rect22.left,
    y: event.clientY - rect22.top
  };
}

function drawCoordinates22(point, r) {
  ctx22.fillStyle = "#ff2626"; // Red color
  ctx22.beginPath();
  ctx22.arc(point.x, point.y, r, 0, Math.PI * 2, true);
  ctx22.fill();
}



canvas22.addEventListener("click", function(e) {
  clicks22++;
  var m2 = getPosition22(e);
  // this point won't be added to the points array
  // it's here only to mark the point on click since otherwise it will appear with a delay equal to the timeout
  drawCoordinates22(m2, pointSize22);
  
  if (clicks22 == 1) {
    setTimeout(function() {
      if (clicks22 == 1) {
        // on click add a new point to the points array
        points22.push(m2);
      } else { // on double click 
        // 1. check if point in path
        for (let i = 0; i < points22.length; i++) {
          ctx22.beginPath();
          ctx22.arc(points22[i].x, points22[i].y, pointSize22, 0, Math.PI * 2, true);

          if (ctx22.isPointInPath(m2.x, m2.y)) {
            points22.splice(i, 1); // remove the point from the array
            break;// if a point is found and removed, break the loop. No need to check any further.
          }
        }

        //clear the canvas
        ctx22.clearRect(0, 0, cw22, ch22);
      }
    ctx22.drawImage(base_image_fondo2, 0, 0);
      points22.map(p => {
        drawCoordinates22(p, pointSize22);
      });
      clicks22 = 0;
    }, timeout22);
  }
});


fondo2();

function fondo2()
{
  base_image_fondo2 = new Image();
  //base_image_fondo2.src = '<?= base_url();?>assets/img/historial_medical/fodoscopia111.png';
  base_image_fondo2.src = '<?= base_url();?>assets/img/oftal/<?php echo $img->fondo; ?>';
  base_image_fondo2.onload = function(){
    ctx22.drawImage(base_image_fondo2, 0, 0);
  }
}

//-------------------------------------------------------------------
$(".disable-all :input").prop("disabled", true);
//$(".hide-ant-save").show();

$(".show_modif_enf_act").on('click', function (e) {
	$('.show_modif_enf_act').hide();
	$(".save_enf_act_hide").slideDown();
	$(".disable-all :input").prop("disabled", false);
	
}
)
//*************************************************************************


$('#save_of_hide').on('click', function(event) {
event.preventDefault();
var id_oftal  = $("#id_oftal").val();
var od_con_cor  = $("#od_con_core").val();
var od_sin_con  = $("#od_sin_cone").val();
var od_mas_o_meno= $("input[name='od_mas_o_menoe']:checked").val();
var od_cor_act  = $("#od_cor_acte").val();
var os_sin_con  = $("#os_sin_cone").val();
var os_con_cor  = $("#os_con_core").val();
var os_mas_o_meno= $("input[name='os_mas_o_menoe']:checked").val();
var os_cor_act  = $("#os_cor_acte").val();
var updated_by  = $("#updated_by").val();
var notaof  = $("#not-oftmed").val();
 var  retine1  = $("#retine1e").val();
 var retine2 = $("#retine2e").val();
var retine3   = $("#retine3e").val();
 var retine4  = $("#retine4e").val();
 var retine5  = $("#retine5e").val();
 var retine6 = $("#retine6e").val();
 var retine7   = $("#retine7e").val();
 var retine8  = $("#retine8e").val();
 

var masomenos1= $("input[name='masomenos1e']:checked").val();
var masomenos2= $("input[name='masomenos2e']:checked").val();
var masomenos3= $("input[name='masomenos3e']:checked").val();
var masomenos4= $("input[name='masomenos4e']:checked").val();
var masomenos5= $("input[name='masomenos5e']:checked").val();
var masomenos6= $("input[name='masomenos6e']:checked").val();
var masomenos7= $("input[name='masomenos7e']:checked").val();
var masomenos8= $("input[name='masomenos8e']:checked").val();

var ppm  = $("#ppme").val();
var converg  = $("#converge").val();
var ducvers  = $("#ducverse").val();
var convertest  = $("#converteste").val();

var od_espera_r= $("input[name='od_espera_re']:checked").val();
var od_espera  = $("#od_esperae").val();
var od_cilindro  = $("#od_cilindroe").val();
var od_cilindro_r= $("input[name='od_cilindro_re']:checked").val();
 var eje_od  = $("#eje_ode").val();
 var add_od  = $("#add_ode").val();
 var vision_od  = $("#vision_ode").val();
 
var os_espera  = $("#os_esperae").val();
var os_espera_r= $("input[name='os_espera_re']:checked").val(); 
var os_cilindro  = $("#os_cilindroe").val();
var os_cilindro_r= $("input[name='os_cilindro_re']:checked").val(); 
var eje_os  = $("#eje_ose").val();
var add_os  = $("#add_ose").val();
var vision_os  = $("#vision_ose").val();

var conj1  = $("#conj1e").val();
var conj2  = $("#conj2e").val();
var cornea1  = $("#cornea1e").val();
var cornea2  = $("#cornea2e").val();
var pup1  = $("#pup1e").val();
var pup2  = $("#pup2e").val();
var crist1  = $("#crist1e").val();
var crist2  = $("#crist2e").val();
var vitreo1  = $("#vitreo1e").val();
var vitreo2  = $("#vitreo2e").val();
var fondos1  = $("#fondos1e").val();
var fondos2  = $("#fondos2e").val();
var canvasData1 = canvas3.toDataURL("image/png");
var canvasData2 = canvas4.toDataURL("image/png");
$('#save_of_hide').prop("disabled",true);
	 $.ajax({
	type: "POST",
	url: "<?=base_url('admin_medico/SaveUpOftala')?>",
	data: {
	od_sin_con:od_sin_con,od_con_cor:od_con_cor,od_mas_o_meno:od_mas_o_meno,od_cor_act:od_cor_act,
os_sin_con:os_sin_con,os_con_cor:os_con_cor,os_mas_o_meno:os_mas_o_meno,os_cor_act:os_cor_act,
retine1:retine1,retine2:retine2,retine3:retine3,retine4:retine4,retine5:retine5,
retine6:retine6,retine7:retine7,retine8:retine8,canvasData1: canvasData1,canvasData2:canvasData2,
ppm:ppm,converg:converg,ducvers:ducvers,convertest:convertest,notaof:notaof,
masomenos1:masomenos1,masomenos2:masomenos2,masomenos3:masomenos3,masomenos4:masomenos4,
masomenos5:masomenos5,masomenos6:masomenos6,masomenos7:masomenos7,masomenos8:masomenos8,
od_espera_r:od_espera_r, od_espera:od_espera, od_cilindro:od_cilindro,
od_cilindro_r:od_cilindro_r, eje_od:eje_od,  add_od:add_od,  vision_od:vision_od,
os_espera:os_espera,os_espera_r:os_espera_r,os_cilindro:os_cilindro,
os_cilindro_r:os_cilindro_r,eje_os:eje_os,add_os:add_os,vision_os:vision_os,
conj1:conj1,conj2:conj2,cornea1:cornea1,cornea2:cornea2,
pup1:pup1,pup2:pup2,crist1:crist1,crist2:crist2,
vitreo1:vitreo1,vitreo2:vitreo2,fondos1:fondos1,fondos2:fondos2,	
id_oftal:id_oftal,updated_by:updated_by
},

cache: true,
 error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#erorof').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
	success:function(data){
		alert("Cambiado ha sido hecho !");
	$('.show_modif_enf_act').slideDown();
		$(".save_enf_act_hide").hide();
		$("#erorof").html(data);
	$(".disable-all :input").prop("disabled", true);
	$('#save_of_hide').prop("disabled",false);
	},
	 
	});
	return false;
	});
</script>