
 $('#btnSaveHist').on('click', function(event) {
 event.preventDefault();
 saveOtherAntAntViolenciaIntraF(0, 0);
saveAntPerFam(0, 0);
saveSospechaAbuseMaltrato(0);
saveHabToxico(0, 0);
  Swal.fire({
        title: '<strong>Datos han sido guadado con éxito</strong>',
        icon: 'success',
      })
	  
	      setTimeout(function() {
        history.go(-1);
        }, 1000);
     
    }); 


 


 $('#saveEditToxHab').on('click', function(event) {
      event.preventDefault();
      $('#saveEditToxHab').prop("disabled", true);
    saveHabToxico($("#id_hab_tx").val(), 0);
    });



	function saveHabToxico(id_hab_tx, eva_cardio_ht) {
	
      var hab_c_caf = $("#" + id_hab_tx +"hab_c_caf").val();
	 
	  var hab_f_caf = $("#" + id_hab_tx + "hab_f_caf").val();
	  
      var hab_c_al = $("#" + id_hab_tx + "hab_c_al").val();
      var hab_f_al = $("#" + id_hab_tx + "hab_f_al").val();
      var hab_c_tab = $("#" + id_hab_tx + "hab_c_tab").val();
      var hab_f_tab = $("#" + id_hab_tx + "hab_f_tab").val();
      var hookah = $("#" + id_hab_tx + "hookah").val();
      var hab_f_hookah = $("#" + id_hab_tx + "hab_f_hookah").val();
      var hab_t_drug = $("#" + id_hab_tx + "drug_list").val();
      var hab_c_drug = $("#" + id_hab_tx + "hab_c_drug").val();
      var hab_f_drug = $("#" + id_hab_tx + "hab_f_drug").val();
      var desc_caf = $("#" + id_hab_tx + "desc_caf").val();
      var desc_hooka = $("#" + id_hab_tx + "desc_hooka").val();
      var desc_alco = $("#" + id_hab_tx + "desc_alco").val();
      var desc_tab = $("#" + id_hab_tx + "desc_tab").val();
      var desc_drug = $("#" + id_hab_tx + "desc_drug").val();


      $.ajax({
        type: "POST",
         url: base_url+"saveHistorialForms/saveHabToxico",
        data: {

          hab_c_caf: hab_c_caf,
          hab_f_caf: hab_f_caf,
          hab_c_al: hab_c_al,
          hab_f_al: hab_f_al,
          hab_c_tab: hab_c_tab,
          hab_f_tab: hab_f_tab,
          hab_t_drug: hab_t_drug,
          hab_c_drug: hab_c_drug,
          hab_f_drug: hab_f_drug,
          hookah: hookah,
          hab_f_hookah: hab_f_hookah,
          cafe_cant_desc: desc_caf,
           desc_alco: desc_alco,
          desc_tab: desc_tab,
          desc_drug: desc_drug,
          desc_hooka: desc_hooka,
           id:id_hab_tx,
		   eva_cardio:eva_cardio_ht
		 
        },
		   success: function(data) {
           showalert(data, "alert-success", "successEdithabT");
           $('#saveEditToxHab').prop("disabled", false);
           },
		   	error: function(jqXHR, textStatus, errorThrown) {
		alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
		$('#result-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
		console.log('jqXHR:');
		console.log(jqXHR);
		console.log('textStatus:');
		console.log(textStatus);
		console.log('errorThrown:');
		console.log(errorThrown);
},
      })

    }



$(document).on('click', '#saveEditAbuseSis', function(event) {
       event.preventDefault();
     $('#saveEditAbuseSis').prop("disabled", true); 
   
    saveSospechaAbuseMaltrato($("#id_ab_sus").val());

        });


function saveSospechaAbuseMaltrato(idSab) {

			var textmaltrato_g = $("#"+idSab+"_ant_physic_abuse").val();
			var textabuso_g = $("#"+idSab+"_ant_sexual_abuse").val();
			var textneg_g = $("#"+idSab+"_ant_negligence").val(); 
			var maltratoemo_g = $("#"+idSab+"_ant_emotional").val();
			var isData = $("#abuse-suspition-is-data").val();
		
      $.ajax({
        type: "POST",
         url: base_url+"saveHistorialForms/saveSospechaAbuseMaltrato",
        data: {
			textmaltrato_g:textmaltrato_g,
			textabuso_g:textabuso_g,
			textneg_g:textneg_g,
			maltratoemo_g:maltratoemo_g,
		    id:idSab,
           isData:isData
        },
		  success: function(data) {
                        showalert(data, "alert-success", "successAbuseMal");
                  $('#saveEditAbuseSis').prop("disabled", false); 
                    },
							error: function(jqXHR, textStatus, errorThrown) {
		alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
		$('#result-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
		console.log('jqXHR:');
		console.log(jqXHR);
		console.log('textStatus:');
		console.log(textStatus);
		console.log('errorThrown:');
		console.log(errorThrown);
},
      })

    }


$('#saveEditAntGnrl').on('click', function(event) {
event.preventDefault();
$('#saveEditAntGnrl').prop("disabled", true);
saveAntPerFam($("#id_ant_g").val(), 0);

});


function saveAntPerFam(edit_or_save_ant_general, eva_cardio) {
	  //ANTECEDENTE PERSONALES Y FAMILIAREA
      var check_all = [];
      $('input[name=' + edit_or_save_ant_general + '_todo]:checked').each(function() {
        check_all.push(this.value);
      });

      var car_nin_check = [];
      $('input[name=' + edit_or_save_ant_general + '_car_nin]:checked').each(function() {
        car_nin_check.push(this.value);
      });
      var madre_check = [];
      $('input[name=' + edit_or_save_ant_general + '_car_m]:checked').each(function() {
        madre_check.push(this.value);
      });

      var padre_check = [];
      $('input[name=' + edit_or_save_ant_general + '_car_p]:checked').each(function() {
        padre_check.push(this.value);
      });

      var car_h_check = [];
      $('input[name=' + edit_or_save_ant_general + '_car_h]:checked').each(function() {
        car_h_check.push(this.value);
      });

      var car_pe_check = [];
      $('input[name=' + edit_or_save_ant_general + '_car_pe]:checked').each(function() {
        car_pe_check.push(this.value);
      });

      var car_text = $('#' + edit_or_save_ant_general + '_car_text').val();
	  
      //===============================Hipertension==================
      var nin_check2 = [];
      $('input[name=' + edit_or_save_ant_general + '_hip_nin]:checked').each(function() {
        nin_check2.push(this.value);
      });
      var madre_check2 = [];
      $('input[name=' + edit_or_save_ant_general + '_hip_m]:checked').each(function() {
        madre_check2.push(this.value);
      });

      var padre_check2 = [];
      $('input[name=' + edit_or_save_ant_general + '_hip_p]:checked').each(function() {
        padre_check2.push(this.value);
      });

      var h_check2 = [];
      $('input[name=' + edit_or_save_ant_general + '_hip_h]:checked').each(function() {
        h_check2.push(this.value);
      });

      var pe_check2 = [];
      $('input[name=' + edit_or_save_ant_general + '_hip_pe]:checked').each(function() {
        pe_check2.push(this.value);
      });

      var hip_text = $('#' + edit_or_save_ant_general + '_hip_text').val();

      //===============================Enf. Cerebrovascular==================

      var nin_check3 = [];
      $('input[name=' + edit_or_save_ant_general + '_ec_nin]:checked').each(function() {
        nin_check3.push(this.value);
      });
      var madre_check3 = [];
      $('input[name=' + edit_or_save_ant_general + '_ec_m]:checked').each(function() {
        madre_check3.push(this.value);
      });

      var padre_check3 = [];
      $('input[name=' + edit_or_save_ant_general + '_ec_p]:checked').each(function() {
        padre_check3.push(this.value);
      });

      var h_check3 = [];
      $('input[name=' + edit_or_save_ant_general + '_ec_h]:checked').each(function() {
        h_check3.push(this.value);
      });

      var pe_check3 = [];
      $('input[name=' + edit_or_save_ant_general + '_ec_pe]:checked').each(function() {
        pe_check3.push(this.value);
      });

      var ec_text = $('#' + edit_or_save_ant_general + '_ec_text').val();


      //============Epilepsie=============================
      var nin_check4 = [];
      $('input[name=' + edit_or_save_ant_general + '_ep_nin]:checked').each(function() {
        nin_check4.push(this.value);
      });
      var madre_check4 = [];
      $('input[name=' + edit_or_save_ant_general + '_ep_m]:checked').each(function() {
        madre_check4.push(this.value);
      });

      var padre_check4 = [];
      $('input[name=' + edit_or_save_ant_general + '_ep_p]:checked').each(function() {
        padre_check4.push(this.value);
      });

      var h_check4 = [];
      $('input[name=' + edit_or_save_ant_general + '_ep_h]:checked').each(function() {
        h_check4.push(this.value);
      });

      var pe_check4 = [];
      $('input[name=' + edit_or_save_ant_general + '_ep_pe]:checked').each(function() {
        pe_check4.push(this.value);
      });

      var ep_text = $('#' + edit_or_save_ant_general + '_ep_text').val();
      //===============================Asma Bronquial==================

      var nin_check5 = [];
      $('input[name=' + edit_or_save_ant_general + '_as_nin]:checked').each(function() {
        nin_check5.push(this.value);
      });
      var madre_check5 = [];
      $('input[name=' + edit_or_save_ant_general + '_as_m]:checked').each(function() {
        madre_check5.push(this.value);
      });

      var padre_check5 = [];
      $('input[name=' + edit_or_save_ant_general + '_as_p]:checked').each(function() {
        padre_check5.push(this.value);
      });

      var h_check5 = [];
      $('input[name=' + edit_or_save_ant_general + '_as_h]:checked').each(function() {
        h_check5.push(this.value);
      });

      var pe_check5 = [];
      $('input[name=' + edit_or_save_ant_general + '_as_pe]:checked').each(function() {
        pe_check5.push(this.value);
      });

      var as_text = $('#' + edit_or_save_ant_general + '_as_text').val();

      //===============================Enf. Repiratoria==================

      var nin_check05 = [];
      $('input[name=' + edit_or_save_ant_general + '_enre_nin]:checked').each(function() {
        nin_check05.push(this.value);
      });
      var madre_check05 = [];
      $('input[name=' + edit_or_save_ant_general + '_enre_m]:checked').each(function() {
        madre_check05.push(this.value);
      });

      var padre_check05 = [];
      $('input[name=' + edit_or_save_ant_general + '_enre_p]:checked').each(function() {
        padre_check05.push(this.value);
      });

      var h_check05 = [];
      $('input[name=' + edit_or_save_ant_general + '_enre_h]:checked').each(function() {
        h_check05.push(this.value);
      });

      var pe_check05 = [];
      $('input[name=' + edit_or_save_ant_general + '_enre_pe]:checked').each(function() {
        pe_check05.push(this.value);
      });

      var enre_text = $('#' + edit_or_save_ant_general + '_enre_text').val();



      //===============================Tuberculosis==================

      var nin_check6 = [];
      $('input[name=' + edit_or_save_ant_general + '_tub_nin]:checked').each(function() {
        nin_check6.push(this.value);
      });
      var madre_check6 = [];
      $('input[name=' + edit_or_save_ant_general + '_tub_m]:checked').each(function() {
        madre_check6.push(this.value);
      });

      var padre_check6 = [];
      $('input[name=' + edit_or_save_ant_general + '_tub_p]:checked').each(function() {
        padre_check6.push(this.value);
      });

      var h_check6 = [];
      $('input[name=' + edit_or_save_ant_general + '_tub_h]:checked').each(function() {
        h_check6.push(this.value);
      });

      var pe_check6 = [];
      $('input[name=' + edit_or_save_ant_general + '_tub_pe]:checked').each(function() {
        pe_check6.push(this.value);
      });

      var tub_text = $('#' + edit_or_save_ant_general + '_tub_text').val();

      //===============================Diabetes==================

      var nin_check7 = [];
      $('input[name=' + edit_or_save_ant_general + '_dia_nin]:checked').each(function() {
        nin_check7.push(this.value);
      });
      var madre_check7 = [];
      $('input[name=' + edit_or_save_ant_general + '_dia_m]:checked').each(function() {
        madre_check7.push(this.value);
      });

      var padre_check7 = [];
      $('input[name=' + edit_or_save_ant_general + '_dia_p]:checked').each(function() {
        padre_check7.push(this.value);
      });

      var h_check7 = [];
      $('input[name=' + edit_or_save_ant_general + '_dia_h]:checked').each(function() {
        h_check7.push(this.value);
      });

      var pe_check7 = [];
      $('input[name=' + edit_or_save_ant_general + '_dia_pe]:checked').each(function() {
        pe_check7.push(this.value);
      });

      var dia_text = $('#' + edit_or_save_ant_general + '_dia_text').val();
      //===============================Tiroides==================

      var nin_check8 = [];
      $('input[name=' + edit_or_save_ant_general + '_tir_nin]:checked').each(function() {
        nin_check8.push(this.value);
      });
      var madre_check8 = [];
      $('input[name=' + edit_or_save_ant_general + '_tir_m]:checked').each(function() {
        madre_check8.push(this.value);
      });

      var padre_check8 = [];
      $('input[name=' + edit_or_save_ant_general + '_tir_p]:checked').each(function() {
        padre_check8.push(this.value);
      });

      var h_check8 = [];
      $('input[name=' + edit_or_save_ant_general + '_tir_h]:checked').each(function() {
        h_check8.push(this.value);
      });

      var pe_check8 = [];
      $('input[name=' + edit_or_save_ant_general + '_tir_pe]:checked').each(function() {
        pe_check8.push(this.value);
      });

      var tir_text = $('#' + edit_or_save_ant_general + '_tir_text').val();
      //===============================Hepatitis==================
      var hep_tipo = $('#' + edit_or_save_ant_general + '_hep_tipo').val();
      var nin_check9 = [];
      $('input[name=' + edit_or_save_ant_general + '_hep_nin]:checked').each(function() {
        nin_check9.push(this.value);
      });
      var madre_check9 = [];
      $('input[name=' + edit_or_save_ant_general + '_hep_m]:checked').each(function() {
        madre_check9.push(this.value);
      });

      var padre_check9 = [];
      $('input[name=' + edit_or_save_ant_general + '_hep_p]:checked').each(function() {
        padre_check9.push(this.value);
      });

      var h_check9 = [];
      $('input[name=' + edit_or_save_ant_general + '_hep_h]:checked').each(function() {
        h_check9.push(this.value);
      });

      var pe_check9 = [];
      $('input[name=' + edit_or_save_ant_general + '_hep_pe]:checked').each(function() {
        pe_check9.push(this.value);
      });

      var hep_text = $('#' + edit_or_save_ant_general + '_hep_text').val();
      //===============================Enfermedades Renales==================
      var nin_check10 = [];
      $('input[name=' + edit_or_save_ant_general + '_enfr_nin]:checked').each(function() {
        nin_check10.push(this.value);
      });
      var madre_check10 = [];
      $('input[name=' + edit_or_save_ant_general + '_enfr_m]:checked').each(function() {
        madre_check10.push(this.value);
      });

      var padre_check10 = [];
      $('input[name=' + edit_or_save_ant_general + '_enfr_p]:checked').each(function() {
        padre_check10.push(this.value);
      });

      var h_check10 = [];
      $('input[name=' + edit_or_save_ant_general + '_enfr_h]:checked').each(function() {
        h_check10.push(this.value);
      });

      var pe_check10 = [];
      $('input[name=' + edit_or_save_ant_general + '_enfr_pe]:checked').each(function() {
        pe_check10.push(this.value);
      });

      var enfr_text = $('#' + edit_or_save_ant_general + '_enfr_text').val();
      //===============================Falcemia==================
      var nin_check11 = [];
      $('input[name=' + edit_or_save_ant_general + '_falc_nin]:checked').each(function() {
        nin_check11.push(this.value);
      });
      var madre_check11 = [];
      $('input[name=' + edit_or_save_ant_general + '_falc_m]:checked').each(function() {
        madre_check11.push(this.value);
      });

      var padre_check11 = [];
      $('input[name=' + edit_or_save_ant_general + '_falc_p]:checked').each(function() {
        padre_check11.push(this.value);
      });

      var h_check11 = [];
      $('input[name=' + edit_or_save_ant_general + '_falc_h]:checked').each(function() {
        h_check11.push(this.value);
      });

      var pe_check11 = [];
      $('input[name=' + edit_or_save_ant_general + '_falc_pe]:checked').each(function() {
        pe_check11.push(this.value);
      });
      var falc_text = $('#' + edit_or_save_ant_general + '_falc_text').val();
      //===============================Neoplasias==================
      var neop_check12 = [];
      $('input[name=' + edit_or_save_ant_general + '_neop_nin]:checked').each(function() {
        neop_check12.push(this.value);
      });
      var madre_check12 = [];
      $('input[name=' + edit_or_save_ant_general + '_neop_m]:checked').each(function() {
        madre_check12.push(this.value);
      });

      var padre_check12 = [];
      $('input[name=' + edit_or_save_ant_general + '_neop_p]:checked').each(function() {
        padre_check12.push(this.value);
      });

      var h_check12 = [];
      $('input[name=' + edit_or_save_ant_general + '_neop_h]:checked').each(function() {
        h_check12.push(this.value);
      });

      var pe_check12 = [];
      $('input[name=' + edit_or_save_ant_general + '_neop_pe]:checked').each(function() {
        pe_check12.push(this.value);
      });

      var neop_text = $('#' + edit_or_save_ant_general + '_neop_text').val();
      //===============================ENf. Psiquiatricas==================
      var psi_check13 = [];
      $('input[name=' + edit_or_save_ant_general + '_psi_nin]:checked').each(function() {
        psi_check13.push(this.value);
      });
      var madre_check13 = [];
      $('input[name=' + edit_or_save_ant_general + '_psi_m]:checked').each(function() {
        madre_check13.push(this.value);
      });

      var padre_check13 = [];
      $('input[name=' + edit_or_save_ant_general + '_psi_p]:checked').each(function() {
        padre_check13.push(this.value);
      });

      var h_check13 = [];
      $('input[name=' + edit_or_save_ant_general + '_psi_h]:checked').each(function() {
        h_check13.push(this.value);
      });

      var pe_check13 = [];
      $('input[name=' + edit_or_save_ant_general + '_psi_pe]:checked').each(function() {
        pe_check13.push(this.value);
      });

      var psi_text = $('#' + edit_or_save_ant_general + '_psi_text').val();
      //===============================Obesidad==================
      var obs_check14 = [];
      $('input[name=' + edit_or_save_ant_general + '_obs_nin]:checked').each(function() {
        obs_check14.push(this.value);
      });
      var madre_check14 = [];
      $('input[name=' + edit_or_save_ant_general + '_obs_m]:checked').each(function() {
        madre_check14.push(this.value);
      });

      var padre_check14 = [];
      $('input[name=' + edit_or_save_ant_general + '_obs_p]:checked').each(function() {
        padre_check14.push(this.value);
      });

      var h_check14 = [];
      $('input[name=' + edit_or_save_ant_general + '_obs_h]:checked').each(function() {
        h_check14.push(this.value);
      });

      var pe_check14 = [];
      $('input[name=' + edit_or_save_ant_general + '_obs_pe]:checked').each(function() {
        pe_check14.push(this.value);
      });

      var obs_text = $('#' + edit_or_save_ant_general + '_obs_text').val();
      //===============================Ulcera Peptica==================
      var ulp_check15 = [];
      $('input[name=' + edit_or_save_ant_general + '_ulp_nin]:checked').each(function() {
        ulp_check15.push(this.value);
      });
      var madre_check15 = [];
      $('input[name=' + edit_or_save_ant_general + '_ulp_m]:checked').each(function() {
        madre_check15.push(this.value);
      });

      var padre_check15 = [];
      $('input[name=' + edit_or_save_ant_general + '_ulp_p]:checked').each(function() {
        padre_check15.push(this.value);
      });

      var h_check15 = [];
      $('input[name=' + edit_or_save_ant_general + '_ulp_h]:checked').each(function() {
        h_check15.push(this.value);
      });

      var pe_check15 = [];
      $('input[name=' + edit_or_save_ant_general + '_ulp_pe]:checked').each(function() {
        pe_check15.push(this.value);
      });

      var ulp_text = $('#' + edit_or_save_ant_general + '_ulp_text').val();
      //===============================Artritis, Gota==================
      var art_check16 = [];
      $('input[name=' + edit_or_save_ant_general + '_art_nin]:checked').each(function() {
        art_check16.push(this.value);
      });
      var madre_check16 = [];
      $('input[name=' + edit_or_save_ant_general + '_art_m]:checked').each(function() {
        madre_check16.push(this.value);
      });

      var padre_check16 = [];
      $('input[name=' + edit_or_save_ant_general + '_art_p]:checked').each(function() {
        padre_check16.push(this.value);
      });

      var h_check16 = [];
      $('input[name=' + edit_or_save_ant_general + '_art_h]:checked').each(function() {
        h_check16.push(this.value);
      });

      var pe_check16 = [];
      $('input[name=' + edit_or_save_ant_general + '_art_pe]:checked').each(function() {
        pe_check16.push(this.value);
      });

      var art_text = $('#' + edit_or_save_ant_general + '_art_text').val();


      //===============================Enf. Hematológicas (Esp.)==================
      var art_check016 = [];
      $('input[name=' + edit_or_save_ant_general + '_hem_nin]:checked').each(function() {
        art_check016.push(this.value);
      });
      var madre_check016 = [];
      $('input[name=' + edit_or_save_ant_general + '_hem_m]:checked').each(function() {
        madre_check016.push(this.value);
      });

      var padre_check016 = [];
      $('input[name=' + edit_or_save_ant_general + '_hem_p]:checked').each(function() {
        padre_check016.push(this.value);
      });

      var h_check016 = [];
      $('input[name=' + edit_or_save_ant_general + '_hem_h]:checked').each(function() {
        h_check016.push(this.value);
      });

      var pe_check016 = [];
      $('input[name=' + edit_or_save_ant_general + '_hem_pe]:checked').each(function() {
        pe_check016.push(this.value);
      });

      var hem_text = $('#' + edit_or_save_ant_general + '_hem_text').val();


      //===============================Zika==================
      var zika_check17 = [];
      $('input[name=' + edit_or_save_ant_general + '_zika_nin]:checked').each(function() {
        zika_check17.push(this.value);
      });
      var madre_check17 = [];
      $('input[name=' + edit_or_save_ant_general + '_zika_m]:checked').each(function() {
        madre_check17.push(this.value);
      });

      var padre_check17 = [];
      $('input[name=' + edit_or_save_ant_general + '_zika_p]:checked').each(function() {
        padre_check17.push(this.value);
      });

      var h_check17 = [];
      $('input[name=' + edit_or_save_ant_general + '_zika_h]:checked').each(function() {
        h_check17.push(this.value);
      });

      var pe_check17 = [];
      $('input[name=' + edit_or_save_ant_general + '_zika_pe]:checked').each(function() {
        pe_check17.push(this.value);
      });

      var zika_text = $('#' + edit_or_save_ant_general + '_zika_text').val();
      var otros = $('#' + edit_or_save_ant_general + '_otros_antpf').val();
      $.ajax({
        type: "POST",
          url: base_url+"saveHistorialForms/saveAntPerFam",
        data: {
          check_all: check_all,
          car_nin_check: car_nin_check,
          madre_check: madre_check,
          padre_check: padre_check,
          car_h_check: car_h_check,
          car_pe_check: car_pe_check,
          car_text: car_text,
          /*hipertencion*/
          nin_check2: nin_check2,
          madre_check2: madre_check2,
          padre_check2: padre_check2,
          h_check2: h_check2,
          pe_check2: pe_check2,
          hip_text: hip_text,
          /*Enf. Cerebrovascular*/
          nin_check3: nin_check3,
          madre_check3: madre_check3,
          padre_check3: padre_check3,
          h_check3: h_check3,
          pe_check3: pe_check3,
          ec_text: ec_text,
          /*Epilepsie*/
          nin_check4: nin_check4,
          madre_check4: madre_check4,
          padre_check4: padre_check4,
          h_check4: h_check4,
          pe_check4: pe_check4,
          ep_text: ep_text,
          /*Asma Bronquial*/
          nin_check5: nin_check5,
          madre_check5: madre_check5,
          padre_check5: padre_check5,
          h_check5: h_check5,
          pe_check5: pe_check5,
          as_text: as_text,
          /*Enf. Repiratoria (Esp.)*/
          nin_check05: nin_check05,
          madre_check05: madre_check05,
          padre_check05: padre_check05,
          h_check05: h_check05,
          pe_check05: pe_check05,
          enre_text: enre_text,
          /*Tuberculosis*/
          nin_check6: nin_check6,
          madre_check6: madre_check6,
          padre_check6: padre_check6,
          h_check6: h_check6,
          pe_check6: pe_check6,
          tub_text: tub_text,
          /*Diabetes*/
          nin_check7: nin_check7,
          madre_check7: madre_check7,
          padre_check7: padre_check7,
          h_check7: h_check7,
          pe_check7: pe_check7,
          dia_text: dia_text,
          /*Tiroides*/
          nin_check8: nin_check8,
          madre_check8: madre_check8,
          padre_check8: padre_check8,
          h_check8: h_check8,
          pe_check8: pe_check8,
          tir_text: tir_text,
          /*Hepatitis*/
          hep_tipo: hep_tipo,
          nin_check9: nin_check9,
          madre_check9: madre_check9,
          padre_check9: padre_check9,
          h_check9: h_check9,
          pe_check9: pe_check9,
          hep_text: hep_text,
          /*Enfermedades Renales*/
          nin_check10: nin_check10,
          madre_check10: madre_check10,
          padre_check10: padre_check10,
          h_check10: h_check10,
          pe_check10: pe_check10,
          enfr_text: enfr_text,
          /*Falcemia*/
          nin_check11: nin_check11,
          madre_check11: madre_check11,
          padre_check11: padre_check11,
          h_check11: h_check11,
          pe_check11: pe_check11,
          falc_text: falc_text,
          /*Neoplasias*/
          neop_check12: neop_check12,
          madre_check12: madre_check12,
          padre_check12: padre_check12,
          h_check12: h_check12,
          pe_check12: pe_check12,
          neop_text: neop_text,
          /*ENf. Psiquiatricas*/
          psi_check13: psi_check13,
          madre_check13: madre_check13,
          padre_check13: padre_check13,
          h_check13: h_check13,
          pe_check13: pe_check13,
          psi_text: psi_text,
          /*Obesidad*/
          obs_check14: obs_check14,
          madre_check14: madre_check14,
          padre_check14: padre_check14,
          h_check14: h_check14,
          pe_check14: pe_check14,
          obs_text: obs_text,
          /*Ulcera Peptica*/
          ulp_check15: ulp_check15,
          madre_check15: madre_check15,
          padre_check15: padre_check15,
          h_check15: h_check15,
          pe_check15: pe_check15,
          ulp_text: ulp_text,
          /*Artritis, Gota*/
          art_check16: art_check16,
          madre_check16: madre_check16,
          padre_check16: padre_check16,
          h_check16: h_check16,
          pe_check16: pe_check16,
          art_text: art_text,
          /*Enf. Hematológicas (Esp.)*/
          art_check016: art_check016,
          madre_check016: madre_check016,
          padre_check016: padre_check016,
          h_check016: h_check016,
          pe_check016: pe_check016,
          hem_text: hem_text,
          /*Zika*/
          zika_check17: zika_check17,
          madre_check17: madre_check17,
          padre_check17: padre_check17,
          h_check17: h_check17,
          pe_check17: pe_check17,
          zika_text: zika_text,
          otros: otros,
           id:edit_or_save_ant_general,
		  eva_cardio:eva_cardio
		  
        },
		 success: function(data) {
           showalert(data, "alert-success", "successAntPerFam");
           $('#saveEditAntGnrl').prop("disabled", false);
           },
		   	 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},
      })


    }


  
	
	
 $('#saveEditAntOtros').on('click', function(event) {
event.preventDefault();
$('#saveEditAntOtros').prop("disabled", true);
saveOtherAntAntViolenciaIntraF($("#id_ht").val(), 0);
});

	$('#saveEditIntraFam').on('click', function(event) {
event.preventDefault();
$('#saveEditIntraFam').prop("disabled", true);  
saveOtherAntAntViolenciaIntraF($("#id_intf").val(), $("#id_eva_card").val());
});
	
  
 function saveOtherAntAntViolenciaIntraF(id_viol, eva_cardio) {
		
		  var grouposang = $("#" + id_viol + "_ant_blood_group").val();
      var hepatis = $('input:radio[name=' + id_viol + '_ant_hep_b]:checked').val();
      var hpv = $('input:radio[name=' + id_viol + '_ant_hpv]:checked').val();
      var toxoide = $('input:radio[name=' + id_viol + '_ant_tox_tel]:checked').val();
      var tipificacion = $("#" + id_viol + "_ant_tipification").val();
      var rhoa = $('input:radio[name=' + id_viol + '_ant_rh]:checked').val();
      var quirurgicos = $("#" + id_viol + "_floatingQuirurgicos").val();
	
      var gineco = $("#" + id_viol + "_floatingGineObs").val();
      var abdominal = $("#" + id_viol + "_floatingAbdominal").val();
      var toracica = $("#" + id_viol + "_floatingToracica").val();
      var transfusion = $("#" + id_viol + "_floatingTransfusionSanguinea").val();
      var otros1_g = $("#" + id_viol + "_floatingOtrosAnt").val();
     var violencia1 = $("#"+id_viol+"_ant_violencia1").val();
	var violencia2 = $("#"+id_viol+"_ant_violencia2").val();
	var violencia3 = $("#"+id_viol+"_ant_violencia3").val();
	var violencia4 = $("#"+id_viol+"_ant_violencia4").val();
      $.ajax({
        type: "POST",
         url: base_url+"saveHistorialForms/saveOtherAntAntViolenciaIntraF",
        data: {
			quirurgicos: quirurgicos,
          gineco: gineco,
          abdominal: abdominal,
          toracica: toracica,
          transfusion: transfusion,
          otros1_g: otros1_g,
          hepatis: hepatis,
          toxoide: toxoide,
          hpv: hpv,
          grouposang: grouposang,
          tipificacion: tipificacion,
		  rhoa:rhoa,
          violencia1:violencia1,
		  violencia2:violencia2,
		  violencia3:violencia3,
		  violencia4:violencia4,
		  id:id_viol,
		  eva_cardio:eva_cardio
        },
		  success: function(data) {
			   showalert(data, "alert-success", "successIntraFamViol");
			   showalert(data, "alert-success", "successAntOtros");
                  $('#saveEditAntOtros').prop("disabled", false);  
                   $('#saveEditIntraFam').prop("disabled", false); 				  
                    },
	 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#result-error').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},

      })

    }