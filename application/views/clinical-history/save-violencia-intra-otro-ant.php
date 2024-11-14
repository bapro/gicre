<script>
function  saveIntraFamAntOtro(button, edit_message) {

var id_user=$("#id_user").val();
var id_ht=$("#id_ht").val();

var violencia1 = $("#"+v_at_data+"_ant_violencia1").val();
var violencia2 = $("#"+v_at_data+"_ant_violencia2").val();
var violencia3 = $("#"+v_at_data+"_ant_violencia3").val();
var violencia4 = $("#"+v_at_data+"_ant_violencia4").val();

//=============================Otros antecedantes========================================
  var quirurgicos = $("#"+v_at_data+"_floatingQuirurgicos").val();

var gineco = $("#"+v_at_data+"_floatingGineObs").val();
var abdominal = $("#"+v_at_data+"_floatingAbdominal").val();
var toracica = $("#"+v_at_data+"_floatingToracica").val();
var transfusion = $("#"+v_at_data+"_floatingTransfusionSanguinea").val();
var otros1_g = $("#"+v_at_data+"_floatingOtrosAnt").val();

//var otros2 = $("#otros2").val();
var grouposang = $("#"+v_at_data+"_ant_blood_group").val();
var hepatis = $('input:radio[name='+v_at_data+'_ant_hep_b]:checked').val();
var hpv = $('input:radio[name='+v_at_data+'_ant_hpv]:checked').val();
var toxoide = $('input:radio[name='+v_at_data+'_ant_tox_tel]:checked').val();
var tipificacion = $("#"+v_at_data+"_ant_tipification").val();
var rhoa = $('input:radio[name='+v_at_data+'_ant_rh]:checked').val();


$(button).prop("disabled", true);	
 $.ajax({
type: "POST",
url: "<?=base_url('intra_vio_ant_otro/updateViolenciaIntraOtroAnt')?>",
data:{
/*violencia intrafamilia*/violencia1:violencia1,violencia2:violencia2,violencia3:violencia3,violencia4:violencia4,
/*Otros antecedentes*/quirurgicos:quirurgicos,gineco:gineco,abdominal:abdominal,toracica:toracica,transfusion:transfusion,otros1_g:otros1_g,hepatis:hepatis,toxoide:toxoide,hpv:hpv,grouposang:grouposang,tipificacion:tipificacion,rhoa:rhoa,
id:id_ht,id_user:id_user
},
success:function(data){
	showalert(data, "alert-success", edit_message); 
$(button).prop("disabled", false);
},

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
  
});

};
</script>