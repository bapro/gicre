
<script>
$(document).ready(function() {
	
$('#get_cirujano_vas').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
var current_diagrama = $("#show-current-diagrama").val();

  //var urlBackground2 = '<?=base_url();?>assets/img/cirujano-vascular/diagrama-1619019581.png';


  var urlBackground2 = '<?=base_url();?>assets/img/cirujano-vascular/'+current_diagrama;
  var imageBackground2 = new Image();
  imageBackground2.src = urlBackground2;
  //imageBackground2.crossorigin = "anonymous";
  imageBackground2.setAttribute('crossorigin', 'anonymous');
		
$("#saveDiagrama").drawpad({
	colors: [
	"#000000",//black

	"#2ecc71",//green

	"#3498db",//blue

	"#e74c3c",//red

	"#f1c40f",//yellow

	"#e67e22",//orange
	],

	});	
	
	 var contextCanvas2 = $("#saveDiagrama canvas").get(0).getContext('2d');
  imageBackground2.onload = function(){
    contextCanvas2.drawImage(imageBackground2, 0, 0);
  }

 $('#resetme2').on('click', function(event) {
	 contextCanvas2.clearRect(0, 0, 750, 423);
	  contextCanvas2.drawImage(imageBackground2, 0, 0);
	 });

$('#updateCirujanoVas').on('click', function(event) {
event.preventDefault();
 let id_cirujano_vas=$("#id_cirujano_vas").val();
  let updated_by=$("#updated_by").val();
  
 let cir_vas_dol= [];
 $("input[name='_cir_vas_dol']:checked").each(function(){
            cir_vas_dol.push(this.value);
 });
 
  let cir_vas_edema= [];
 $("input[name='_cir_vas_edema']:checked").each(function(){
            cir_vas_edema.push(this.value);
 });
  let cir_vas_pesadez= [];
 $("input[name='_cir_vas_pesadez']:checked").each(function(){
            cir_vas_pesadez.push(this.value);
 });
  let cir_vas_cansancio= [];
 $("input[name='_cir_vas_cansancio']:checked").each(function(){
            cir_vas_cansancio.push(this.value);
 });
  let cir_vas_quemazo= [];
 $("input[name='_cir_vas_quemazo']:checked").each(function(){
            cir_vas_quemazo.push(this.value);
 });
  let cir_vas_calambred= [];
 $("input[name='_cir_vas_calambred']:checked").each(function(){
            cir_vas_calambred.push(this.value);
 });
  let cir_vas_purito= [];
 $("input[name='_cir_vas_purito']:checked").each(function(){
            cir_vas_purito.push(this.value);
 });
  let cir_vas_hiper= [];
 $("input[name='_cir_vas_hiper']:checked").each(function(){
            cir_vas_hiper.push(this.value);
 });
  let cir_vas_ulceras= [];
 $("input[name='_cir_vas_ulceras']:checked").each(function(){
            cir_vas_ulceras.push(this.value);
 });
  let cir_vas_pares= [];
 $("input[name='_cir_vas_pares']:checked").each(function(){
            cir_vas_pares.push(this.value);
 });
  let cir_vas_claud= [];
 $("input[name='_cir_vas_claud']:checked").each(function(){
            cir_vas_claud.push(this.value);
 });
  let cir_vas_necrosis= [];
 $("input[name='_cir_vas_necrosis']:checked").each(function(){
            cir_vas_necrosis.push(this.value);
 });

let cir_vas_otros=$("#_cir_vas_otros").val();
let cir_vas_cirugias=$("#_cir_vas_cirugias").val();
let cir_vas_alergias=$("#_cir_vas_alergias").val();
let cir_vas_enf_sis=$("#_cir_vas_enf_sis").val();
let cir_vas_habitos=$("#_cir_vas_habitos").val();
let	cir_vas_exam_fis_dir=$("#_cir_vas_exam_fis_dir").val();
let cir_vas_historial =$("#_cir_vas_historial").val();

 var base64Image = $("#saveDiagrama canvas").get(0).toDataURL();
$('#diagrama_saveDiagrama').val(base64Image);
let diagrama_saveDiagrama =$("#diagrama_saveDiagrama").val();	
if(cir_vas_historial=="")
{
alert('El campo HISTORIAL es requerido!');	
}
 else{

$.ajax({
type: "POST",
url: "<?=base_url('SaveHistorial/saveCirujanoVascular')?>",
data: {cir_vas_dol:cir_vas_dol,cir_vas_edema:cir_vas_edema,cir_vas_pesadez:cir_vas_pesadez,	
cir_vas_cansancio:cir_vas_cansancio,cir_vas_quemazo:cir_vas_quemazo,cir_vas_calambred:cir_vas_calambred,
cir_vas_purito:cir_vas_purito,cir_vas_hiper:cir_vas_hiper,cir_vas_ulceras:cir_vas_ulceras,
cir_vas_pares:cir_vas_pares,cir_vas_claud:cir_vas_claud,cir_vas_necrosis:cir_vas_necrosis,
cir_vas_historial:cir_vas_historial,diagrama_cirugia_vascular:diagrama_saveDiagrama,
cir_vas_otros:cir_vas_otros,cir_vas_cirugias:cir_vas_cirugias,cir_vas_alergias:cir_vas_alergias,
cir_vas_enf_sis:cir_vas_enf_sis,cir_vas_habitos:cir_vas_habitos,cir_vas_exam_fis_dir:cir_vas_exam_fis_dir,
updated_by:updated_by,id_cirujano_vas:id_cirujano_vas},
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#resultdd').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
success:function(data){
 alert('Cambio hecho!');	
},
 
});

}	
	
});











});