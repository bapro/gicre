

<script>
    $(document).ready(function() {
      var up_time =$('#vul_up_time').val();
      var in_time =$('#vul_in_time').val();
      var in_by =$('#vul_in_by').val();
      var up_by =$('#vul_up_by').val();
   var id_user =$('#id_user').val();
 var id_patient=$('#id_patient').val();
 var id_centro=$('#id_centro').val();

  var vulvoscopia_data_per_id=$('#vulvo_data_per_id').val();

$('#save_vulvoscopia').on('click', function(event) {
event.preventDefault();
$('#save_vulvoscopia').prop("disabled", true);


var vulvo_color_white = [];
 $("input[name='vulvo_color_white']:checked").each(function(){
    vulvo_color_white.push(this.value);
 })


 var vulvo_color_pig = [];
 $("input[name='vulvo_color_pig']:checked").each(function(){
    vulvo_color_pig.push(this.value);
 })

 var vulvo_color_red = [];
 $("input[name='vulvo_color_red']:checked").each(function(){
    vulvo_color_red.push(this.value);
 })


 var part_vas_mot = [];
 $("input[name='part_vas_mot']:checked").each(function(){
    part_vas_mot.push(this.value);
 })


 var part_vas_au = [];
 $("input[name='part_vas_au']:checked").each(function(){
    part_vas_au.push(this.value);
 })

 var part_vas_mos = [];
 $("input[name='part_vas_mos']:checked").each(function(){
    part_vas_mos.push(this.value);
 })

 var part_vas_vas = [];
 $("input[name='part_vas_vas']:checked").each(function(){
    part_vas_vas.push(this.value);
 })

 var vul_loc_ar_mu = [];
 $("input[name='vul_loc_ar_mu']:checked").each(function(){
    vul_loc_ar_mu.push(this.value);
 })
 var vul_loc_ar_pi = [];
 $("input[name='vul_loc_ar_pi']:checked").each(function(){
    vul_loc_ar_pi.push(this.value);
 })
 var vul_top_uni = [];
 $("input[name='vul_top_uni']:checked").each(function(){
    vul_top_uni.push(this.value);
 })



 var vul_top_mul = [];
 $("input[name='vul_top_mul']:checked").each(function(){
    vul_top_mul.push(this.value);
 })


 var vul_super_sob = [];
 $("input[name='vul_super_sob']:checked").each(function(){
    vul_super_sob.push(this.value);
 })

 var vul_super_plena = [];
 $("input[name='vul_super_plena']:checked").each(function(){
    vul_super_plena.push(this.value);
 })

 var vul_super_micro = [];
 $("input[name='vul_super_micro']:checked").each(function(){
    vul_super_micro.push(this.value);
 })

 var vul_taking_bio = $('input:radio[name=vul_taking_bio]:checked').val();
 var vul_les_prer_1 =  $('#vul_les_prer_1').val();
var vul_les_prer_2 =  $('#vul_les_prer_2').val();

 $.ajax({
type: "POST",
url: "<?=base_url('save_vulvoscopia/saveFields')?>",
data: {
    vulvo_color_white:vulvo_color_white, vulvo_color_pig:vulvo_color_pig, vulvo_color_red:vulvo_color_red,part_vas_au:part_vas_au,in_by:in_by, 
    part_vas_mos:part_vas_mos, part_vas_vas:part_vas_vas, vul_loc_ar_mu:vul_loc_ar_mu, vul_loc_ar_pi:vul_loc_ar_pi,vul_top_uni:vul_top_uni,up_by:up_by,
    vul_top_mul:vul_top_mul, vul_super_sob:vul_super_sob,vul_super_plena:vul_super_plena,vul_super_micro:vul_super_micro,vul_taking_bio:vul_taking_bio,
    vul_les_prer_1:vul_les_prer_1, vul_les_prer_2:vul_les_prer_2,id_user:id_user,id_patient:id_patient,id_centro:id_centro,up_time:up_time, in_time:in_time,
    vulvoscopia_data_per_id:vulvoscopia_data_per_id,part_vas_mot:part_vas_mot
	},
dataType: 'json',
cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#vulvoscopia-info').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  

success:function(response){
    if(response.status == 1){
$('#vulvoscopia-info').html('<p class="alert alert-warning">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
} else{
	 $('.after-action-vulvoscopia').fadeIn('slow', function(){
    $('.after-action-vulvoscopia').delay(3000).fadeOut();
    });
    paginateVulvoscopia();
}
$('#save_vulvoscopia').prop("disabled", false);	
}  
});


});
});
</script>