<script>
$(document).ready(function(){
	
	
	
  $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
      saveEnfermedadActualConclusionDiag(0, 0, "saveEnfermedadActualConclusionDiag");
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
          saveUrologyAntPerFam(0, 0);
		 saveUroExamFis(0, 0);
		  antOTros(0, 0, "otherAnt", 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
          saveSignoVitales(0, 0, "saveSignosVitales", $("#signos-vitales-form-inputs").val());
		   
        }
      }, 1000)


    });	
	
	
	
	
	
	
	
	
	/*
	
	
var hab_tox_data = $("#hab_tox_data").val();
var con_data = $("#conclusion_data").val();
var v_at_data = $("#v_at_data").val();
 var enfermedad_data = $("#enfermedad_data").val();
 var ant_ex_uro_data = $("#ant_ex_uro_data").val();
   var ant_uro_data = $("#ant_uro_data").val();
$('#btnSaveHist111111').on('click', function(event) {
event.preventDefault();
alert(ant_uro_data);



//=============ANTECEDENTES UROLOGO===============================================

          n = [];
        $('input[name='+ant_uro_data+'_uro_sin_ha_1]:checked').each(function () {
            n.push(this.value);
        });
        var c = [];
        $('input[name='+ant_uro_data+'_uro_ant_escl]:checked').each(function () {
            c.push(this.value);
        });
        var o = [];
        $('input[name='+ant_uro_data+'_uro_ant_imp]:checked').each(function () {
            o.push(this.value);
        });
        var i = [];
        $('input[name='+ant_uro_data+'_uro_ant_ane_fal]:checked').each(function () {
            i.push(this.value);
        });
        var u = [];
        $('input[name='+ant_uro_data+'_uro_ant_vari]:checked').each(function () {
            u.push(this.value);
        });
        var h = [];
        $('input[name='+ant_uro_data+'_uro_ant_fimosis]:checked').each(function () {
            h.push(this.value);
        });
        var s = [];
        $('input[name='+ant_uro_data+'_uro_ant_hid]:checked').each(function () {
            s.push(this.value);
        });
        var r = $('#'+ant_uro_data+'_uro_ant_its').val(),
            l = $('#'+ant_uro_data+'_uro_ant_tumorales').val(),
            d = $('#'+ant_uro_data+'_uro_ant_otros').val(),
			g = $('#'+ant_uro_data+'_uro_ant_otros2').val(),
			i_ = $("#ant_uro_per_fam_id").val(),
            v = [];
        $('input[name='+ant_uro_data+'_uro_sin_ha_2]:checked').each(function () {
            v.push(this.value);
        });
        var p = [];
        $('input[name='+ant_uro_data+'_uro_ant_cancer_prostata]:checked').each(function () {
            p.push(this.value);
        });
        var b = [];
        $('input[name='+ant_uro_data+'_uro_ant_poli_renal]:checked').each(function () {
            b.push(this.value);
        });
        var f = [];
        $('input[name='+ant_uro_data+'_uro_ant_uroli]:checked').each(function () {
            f.push(this.value);
        });
        var m = [];
        $('input[name='+ant_uro_data+'_uro_ant_cist]:checked').each(function () {
            m.push(this.value);
        });



 //-EXAMEN FISICO UROLOGY
 
 
var uro_pene = $("#"+ant_ex_uro_data+"_uro_pene").val();
var uro_testicule = $("#"+ant_ex_uro_data+"_uro_testicule").val();	
var uro_epididimos = $("#"+ant_ex_uro_data+"_uro_epididimos").val();
var uro_tato_rec_pros = $("#"+ant_ex_uro_data+"_uro_tato_rec_pros").val();


var uro_geni_mujer = $("#"+ant_ex_uro_data+"_uro_geni_mujer").val();
var uro_vejiga = $("#"+ant_ex_uro_data+"_uro_vejiga").val();
var uro_loins = $("#"+ant_ex_uro_data+"_uro_loins").val();
var uro_otros = $("#"+ant_ex_uro_data+"_uro_otros").val();


  var tacto_rect = [];
 $('input[name='+ant_ex_uro_data+'_tacto_rect_check]:checked').each(function(){
            tacto_rect.push(this.value);
 });

 $.ajax({
type: "POST",
url: "<?=base_url('saveHistorialUrology/saveUrology')?>",
data: {
	
examen urology
uro_pene:uro_pene,uro_testicule:uro_testicule,uro_epididimos:uro_epididimos,uro_tato_rec_pros:uro_tato_rec_pros,
uro_geni_mujer:uro_geni_mujer,uro_vejiga:uro_vejiga, uro_loins:uro_loins, uro_otros:uro_otros,tacto_rect:tacto_rect

},
dataType: 'json',
cache: false,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#result-error').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  
success:function(response){
pressBtnHist(response);	
	
}  
});
});
*/


});
</script>