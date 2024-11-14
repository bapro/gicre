<script>
    $(document).ready(function() {

      var up_time =$('#up_time').val();
      var in_time =$('#in_time').val();
      var in_by =$('#in_by').val();
      var up_by =$('#up_by').val();
   var id_user =$('#id_user').val();
 var id_patient=$('#id_patient').val();
 var id_centro=$('#id_centro').val();
  var colcos_data_per_id=$('#colcos_data_per_id').val();

$('#save_colcoscopia').on('click', function(event) {
event.preventDefault();
$('#save_colcoscopia').prop("disabled", true);

var col_is_preg = $('input:radio[name=col_is_preg]:checked').val();
var col_age_known_sex =  $('#col_age_known_sex').val();
var col_last_pap =  $('#col_last_pap').val();
var col_ref_motive=  $('#col_ref_motive').val();

var col_ac_sat = $('input:radio[name=col_ac_sat]:checked').val();

var col_local = [];
 $("input[name='col_local']:checked").each(function(){
    col_local.push(this.value);
 })


 var col_comp_end1 = [];
 $("input[name='col_comp_end1']:checked").each(function(){
    col_comp_end1.push(this.value);
 })

 var col_comp_end2 = [];
 $("input[name='col_comp_end2']:checked").each(function(){
    col_comp_end2.push(this.value);
 })

 var col_finding_no = [];
 $("input[name='col_finding_no']:checked").each(function(){
    col_finding_no.push(this.value);
 })

 var col_finding_minor_change = [];
 $("input[name='col_finding_minor_change']:checked").each(function(){
    col_finding_minor_change.push(this.value);
 })

 var col_finding_major_change = [];
 $("input[name='col_finding_major_change']:checked").each(function(){
    col_finding_major_change.push(this.value);
 })

 var col_finding_tenue = [];
 $("input[name='col_finding_tenue']:checked").each(function(){
    col_finding_tenue.push(this.value);
 })
 var col_finding_show_fast = [];
 $("input[name='col_finding_show_fast']:checked").each(function(){
   col_finding_show_fast.push(this.value);
 })
 var col_finding_dense = [];
 $("input[name='col_finding_dense']:checked").each(function(){
    col_finding_dense.push(this.value);
 })



 var col_finding_acet_change = [];
 $("input[name='col_finding_acet_change']:checked").each(function(){
    col_finding_acet_change.push(this.value);
 })


 var col_finding_image = [];
 $("input[name='col_finding_image']:checked").each(function(){
    col_finding_image.push(this.value);
 })

 var col_finding_loc_cuad = [];
 $("input[name='col_finding_loc_cuad']:checked").each(function(){
    col_finding_loc_cuad.push(this.value);
 })

 var col_finding_inf_iz = [];
 $("input[name='col_finding_inf_iz']:checked").each(function(){
    col_finding_inf_iz.push(this.value);
 })

 var col_finding_inf_der = [];
 $("input[name='col_finding_inf_der']:checked").each(function(){
    col_finding_inf_der.push(this.value);
 })

 var col_finding_sup_der = [];
 $("input[name='col_finding_sup_der']:checked").each(function(){
    col_finding_sup_der.push(this.value);
 })

 var col_mos_mos = [];
 $("input[name='col_mos_mos']:checked").each(function(){
    col_mos_mos.push(this.value);
 })

 var col_ext1 = [];
 $("input[name='col_ext1']:checked").each(function(){
    col_ext1.push(this.value);
 })

 var col_ext2 = [];
 $("input[name='col_ext2']:checked").each(function(){
    col_ext2.push(this.value);
 })

 var col_ext3 = [];
 $("input[name='col_ext3']:checked").each(function(){
    col_ext3.push(this.value);
 })


 var col_ext4 = [];
 $("input[name='col_ext4']:checked").each(function(){
    col_ext4.push(this.value);
 })

 var col_ext_f = [];
 $("input[name='col_ext_f']:checked").each(function(){
    col_ext_f.push(this.value);
 })


 var col_ext_g = [];
 $("input[name='col_ext_g']:checked").each(function(){
    col_ext_g.push(this.value);
 })

 var col_vas_at = [];
 $("input[name='col_vas_at']:checked").each(function(){
    col_vas_at.push(this.value);
 })

 
var col_vas_orq = [];
 $("input[name='col_vas_orq']:checked").each(function(){
    col_vas_orq.push(this.value);
 })

 var col_vas_s_c = [];
 $("input[name='col_vas_s_c']:checked").each(function(){
    col_vas_s_c.push(this.value);
 })

 var col_vas_sac = [];
 $("input[name='col_vas_sac']:checked").each(function(){
    col_vas_sac.push(this.value);
 })

 var col_vas_vad = [];
 $("input[name='col_vas_vad']:checked").each(function(){
    col_vas_vad.push(this.value);
 })

 var col_vas_dil = [];
 $("input[name='col_vas_dil']:checked").each(function(){
    col_vas_dil.push(this.value);
 })

 var col_sug_ul = [];
 $("input[name='col_sug_ul']:checked").each(function(){
    col_sug_ul.push(this.value);
 })

 var col_sug_bor = [];
 $("input[name='col_sug_bor']:checked").each(function(){
    col_sug_bor.push(this.value);
 })

 var col_sug_sit = [];
 $("input[name='col_sug_sit']:checked").each(function(){
    col_sug_sit.push(this.value);
 })

 var col_sug_pl = [];
 $("input[name='col_sug_pl']:checked").each(function(){
    col_sug_pl.push(this.value);
 })

 var col_sug_perf = [];
 $("input[name='col_sug_perf']:checked").each(function(){
    col_sug_perf.push(this.value);
 })

 var col_sug_elev = [];
 $("input[name='col_sug_elev']:checked").each(function(){
    col_sug_elev.push(this.value);
 })

 var col_sug_reg = [];
 $("input[name='col_sug_reg']:checked").each(function(){
    col_sug_reg.push(this.value);
 })

 var col_sug_cent = [];
 $("input[name='col_sug_cent']:checked").each(function(){
    col_sug_cent.push(this.value);
 })

 var col_sug_irreg = [];
 $("input[name='col_sug_irreg']:checked").each(function(){
    col_sug_irreg.push(this.value);
 })


 var col_sug_sob = [];
 $("input[name='col_sug_sob']:checked").each(function(){
    col_sug_sob.push(this.value);
 })

 var col_iodo_pos = [];
 $("input[name='col_iodo_pos']:checked").each(function(){
    col_iodo_pos.push(this.value);
 })

 var col_iodo_par = [];
 $("input[name='col_iodo_par']:checked").each(function(){
    col_iodo_par.push(this.value);
 })

 var col_iodo_neg = [];
 $("input[name='col_iodo_neg']:checked").each(function(){
    col_iodo_neg.push(this.value);
 })


 var col_taking_bio = $('input:radio[name=col_taking_bio]:checked').val();


 var col_loc_ant = [];
 $("input[name='col_loc_ant']:checked").each(function(){
    col_loc_ant.push(this.value);
 })

 var col_loc_post_cent = [];
 $("input[name='col_loc_post_cent']:checked").each(function(){
    col_loc_post_cent.push(this.value);
 })

 var col_loc_iz_cent = [];
 $("input[name='col_loc_iz_cent']:checked").each(function(){
    col_loc_iz_cent.push(this.value);
 })

 var col_loc_post_cent = [];
 $("input[name='col_loc_post_cent']:checked").each(function(){
    col_loc_post_cent.push(this.value);
 })

 var col_loc_iz_cent = [];
 $("input[name='col_loc_iz_cent']:checked").each(function(){
    col_loc_iz_cent.push(this.value);
 })

 var col_loc_de_cent = [];
 $("input[name='col_loc_de_cent']:checked").each(function(){
    col_loc_de_cent.push(this.value);
 })

 var col_mos_fino = [];
 $("input[name='col_mos_fino']:checked").each(function(){
   col_mos_fino.push(this.value);
 })

 var col_mos_grueso = [];
 $("input[name='col_mos_grueso']:checked").each(function(){
   col_mos_grueso.push(this.value);
 })
 
 var col_real_leg_end = $('input:radio[name=col_real_leg_end]:checked').val();


 $.ajax({
type: "POST",
url: "<?=base_url('save_colcoscopy/saveFields')?>",
data: {
    col_is_preg:col_is_preg, col_age_known_sex:col_age_known_sex, col_last_pap:col_last_pap,col_ref_motive:col_ref_motive,
    col_ac_sat:col_ac_sat, col_local:col_local, col_comp_end1:col_comp_end1, col_comp_end2:col_comp_end2,col_finding_no:col_finding_no,
    col_finding_minor_change:col_finding_minor_change, col_finding_major_change:col_finding_major_change,col_finding_tenue:col_finding_tenue,
    col_finding_dense:col_finding_dense, col_finding_acet_change:col_finding_acet_change,col_finding_image:col_finding_image,colcos_data_per_id:colcos_data_per_id,
    col_finding_loc_cuad:col_finding_loc_cuad, col_finding_inf_iz:col_finding_inf_iz, col_finding_inf_der:col_finding_inf_der,    up_time:up_time, in_time:in_time, 
    col_finding_sup_der:col_finding_sup_der, col_mos_mos:col_mos_mos,col_ext1:col_ext1,col_ext2:col_ext2,col_ext3:col_ext3,col_ext4:col_ext4,up_by:up_by,
    col_ext_f:col_ext_f,col_ext_g:col_ext_g,col_vas_at:col_vas_at,col_vas_orq:col_vas_orq,col_vas_s_c:col_vas_s_c,col_vas_sac:col_vas_sac,in_by:in_by, 
    col_vas_vad:col_vas_vad, col_vas_dil:col_vas_dil,col_sug_ul:col_sug_ul, col_sug_bor:col_sug_bor,col_sug_sit:col_sug_sit,col_finding_show_fast:col_finding_show_fast,
    col_sug_pl:col_sug_pl,col_sug_perf:col_sug_perf,col_sug_elev:col_sug_elev,col_sug_reg:col_sug_reg,col_sug_cent:col_sug_cent,col_mos_grueso:col_mos_grueso,
    col_sug_irreg:col_sug_irreg, col_sug_sob:col_sug_sob,col_iodo_pos:col_iodo_pos,col_iodo_par:col_iodo_par,col_iodo_neg:col_iodo_neg,
    col_taking_bio:col_taking_bio,col_loc_ant:col_loc_ant,col_loc_post_cent:col_loc_post_cent,col_loc_iz_cent:col_loc_iz_cent,col_mos_fino:col_mos_fino,
    col_loc_de_cent:col_loc_de_cent,col_real_leg_end:col_real_leg_end,id_user:id_user,id_patient:id_patient,id_centro:id_centro
	},
dataType: 'json',
cache: true,
error:function(jqXHR, textStatus, errorThrown) {
alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

                $('#coloscopia-info').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                console.log('jqXHR:');
                console.log(jqXHR);
                console.log('textStatus:');
                console.log(textStatus);
                console.log('errorThrown:');
                console.log(errorThrown);
            },  

success:function(response){
    if(response.status == 1){
$('#coloscopia-info').html('<p class="alert alert-warning">'+response.message+'</p>').fadeTo('fast', 0.1).fadeTo('fast', 1.0);
} else{
	
   $('.after-action-colcoscopia').fadeIn('slow', function(){
    $('.after-action-colcoscopia').delay(3000).fadeOut();
    });
    paginateColcoscopia();
}
$('#save_colcoscopia').prop("disabled", false);	
}  
});


});
});
</script>