 <script  src="<?=base_url();?>assets/js/pediatrico_footer.js" charset="UTF-8"></script>
<script>
//-----------------------------------------------------------------------------------------------------------------
//========================Pediatrico=================================
$('#save_ant_ped').on('click', function(event) {
event.preventDefault();
var idpedia = $("#idpedia").val();
var hist_id = $("#hist_id").val();
var updated_by = $("#updated_by").val();

//--------------------------------------------------------------------
var evo = $('input:radio[name=evo1]:checked').val();  
var evol_text = $("#evol_text1").val();
var dosis = $("#dosis1").val();
var tiempo = $("#tiempo1").val();
var edad = $("#edad1").val();
var via = $("#via1").val();
var tnaci = $('input:radio[name=tnaci1]:checked').val();
var describa = $("#describa1").val(); 
var edad_gest = $("#edad_gest1").val(); 
var peso = $("#peso_al_nacer").val();
var talla = $("#talla_al_nacer").val();  
var desco_peso_al_nacer1 = [];
$("input[name='desco_peso_al_nacer']:checked").each(function(){
desco_peso_al_nacer1.push(this.value);
});


var desco_talla_al_nacer1 = [];
$("input[name='desco_talla_al_nacer']:checked").each(function(){
desco_talla_al_nacer1.push(this.value);
});

var lactamat11 = [];
$("input[name='lactamat1']:checked").each(function(){
lactamat11.push(this.value);
});

var leche11 = [];
$("input[name='leche1']:checked").each(function(){
leche11.push(this.value);
});
var otrosinfo = $("#otrosinfo1").val(); 
var traum = $('input:radio[name=traum1]:checked').val();
var traum_text = $("#traum_text1").val();
var trans = $('input:radio[name=trans1]:checked').val(); 
var trans_text = $("#trans_text1").val(); 
//---------------------------------------------------------------
var textmaltrato = $("#textmaltrato1").val();
var textabuso = $("#textabuso1").val();
var textneg = $("#textneg1").val();
var maltratoemo = $("#maltratoemo1").val();
//--------------------------------------------
var textgrueso = $("#text-grueso1").val();
var textfino = $("#text-fino1").val();
var textlenguage = $("#text-lenguage1").val();
var textsocial = $("#text-social1").val();

//--------------------------------------------
var ale11 = [];
$("input[name='ale1']:checked").each(function(){
ale11.push(this.value);
});
var hep11 = [];
$("input[name='hep1']:checked").each(function(){
hep11.push(this.value);
});
var amig11 = [];
$("input[name='amig1']:checked").each(function(){
amig11.push(this.value);
});
var infv11 = [];
$("input[name='infv1']:checked").each(function(){
infv11.push(this.value);
});
var asm11 = [];
$("input[name='asm1']:checked").each(function(){
asm11.push(this.value);
});

var neum11 = [];
$("input[name='neum1']:checked").each(function(){
neum11.push(this.value);
});

var cirug11 = [];
$("input[name='cirug1']:checked").each(function(){
cirug11.push(this.value);
});

var otot11 = [];
$("input[name='otot1']:checked").each(function(){
otot11.push(this.value);
});

var deng11 = [];
$("input[name='deng1']:checked").each(function(){
deng11.push(this.value);
});


var pape11 = [];
$("input[name='pape1']:checked").each(function(){
pape11.push(this.value);
});

var diar11 = [];
$("input[name='diar1']:checked").each(function(){
diar11.push(this.value);
});

var paras11 = [];
$("input[name='paras1']:checked").each(function(){
paras11.push(this.value);
});

var zika11 = [];
$("input[name='zika1']:checked").each(function(){
 zika11.push(this.value);
});

var saram11 = [];
$("input[name='saram1']:checked").each(function(){
 saram11.push(this.value);
});

var chicun11 = [];
$("input[name='chicun1']:checked").each(function(){
 chicun11.push(this.value);
});


var varicela11 = [];
$("input[name='varicela1']:checked").each(function(){
 varicela11.push(this.value);
});


var falc11 = [];
$("input[name='falc1']:checked").each(function(){
 falc11.push(this.value);
});

var otros_t_text = $("#otros_t_text1").val();

//===VACUNACION=========================================
var bcg1 = $("#bcg11").val();
var resf1 = $("#resf11").val();


var hepb1 = $("#hepb1").val();
var resf2 = $("#resf21").val();

var no_ap3 = $("#no_ap331").val();
var resf3 = $("#resf31").val();

var bl4 = $("#bl41").val();
var resf4 = $("#resf41").val();

var yel5 = $("#yel51").val();
var resf5 = $("#resf51").val();


var  bl6 = $("#bl61").val();
var resf6 = $("#resf61").val();


var  gr7 = $("#gr71").val();
var resf7 = $("#resf71").val();

var  bll8 = $("#bll81").val();
var resf8 = $("#resf81").val();

var  grr9 = $("#grr91").val();
var resf9 = $("#resf91").val();

var  yel10 = $("#yel101").val();
var resf10 = $("#resf101").val();

var  bl11 = $("#bl111").val();
var resf11 = $("#resf111").val();

var  gr12 = $("#gr121").val();
var resf12 = $("#resf121").val();

var  yel13 = $("#yel131").val();
var resf13 = $("#resf131").val();

var  bl14 = $("#bl141").val();
var resf14 = $("#resf141").val();

var  bll15 = $("#bll151").val();
var resf15 = $("#resf151").val();

var  srp16 = $("#bcg161").val();
var resf16 = $("#resf161").val();

var  bll17 = $("#bll171").val();
var resf17 = $("#resf171").val();

 var grr18 = $("#grr181").val();
 var resf18 = $("#resf181").val();


$.ajax({
url: '<?php echo site_url('admin_medico/saveUpPedia');?>',
type: 'post',

data:{hist_id:hist_id,idpedia:idpedia,updated_by:updated_by,ale1:ale11,otros_t_text:otros_t_text,hep1:hep11,amig1:amig11,infv1:infv11,asm1:asm11,neum1:neum11,cirug1:cirug11,otot1:otot11,deng1:deng11,pape1:pape11,diar1:diar11,paras1:paras11,zika1:zika11,saram1:saram11,chicun1:chicun11,varicela1:varicela11,falc1:falc11,
textmaltrato:textmaltrato,textabuso:textabuso,textneg:textneg,maltratoemo:maltratoemo,textsocial:textsocial,textlenguage:textlenguage,textfino:textfino,textgrueso:textgrueso,
evo:evo,evol_text:evol_text,tnaci:tnaci,describa:describa,edad_gest:edad_gest,peso:peso,talla:talla,desco_talla_al_nacer:desco_talla_al_nacer1,desco_peso_al_nacer:desco_peso_al_nacer1,lactamat1:lactamat11,leche1:leche11,otrosinfo:otrosinfo,traum_text:traum_text,trans_text:trans_text,
bcg1,bcg1,resf1:resf1,hepb1:hepb1,resf2:resf2,resf3:resf3,no_ap3:no_ap3,bl4:bl4,resf4:resf4,resf5:resf5,yel5:yel5,bl6:bl6,resf6:resf6,gr7:gr7,resf7:resf7,bll8:bll8,resf8:resf8,grr9:grr9,resf9:resf9,yel10:yel10,resf10:resf10,bl11:bl11,resf11:resf11,gr12:gr12,resf12:resf12,yel13:yel13,resf13:resf13,bl14:bl14,resf14:resf14,
bll15:bll15,resf15:resf15,srp16:srp16,resf16:resf16,bll17:bll17,resf17:resf17,grr18:grr18,resf18:resf18},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#loadfped').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            }, 
success: function (data) {
	alert("Cambiado ha sido hecho !");
	//alert(yel5);
	$('.show_modif_ant_ped').slideDown();
	$(".save_ant_ped_hide").hide();
$(".disable-all :input").prop("disabled", true);
}

});

});

 

</script>