  <script>
   // $(document).ready(function() {
		
     function saveAntPerFam(edit_or_save_ant_general, id_eva_card_or_id_ant_general, table_field) {
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
          url: "<?= base_url()?>saveHistorialForms/saveAntPerFam",
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
          id: id_eva_card_or_id_ant_general,
		  edit_or_save:edit_or_save_ant_general,
		  table_field:table_field
		  
        },
		 success: function(data) {
           showalert(data, "alert-success", "successAntPerFam");
           $('#saveEditAntGnrl').prop("disabled", false);
           },
      })


    }


    function antOTros(v_at_data, eva_cardio, saving_function, origine) {
		
      var grouposang = $("#" + v_at_data + "_ant_blood_group").val();
      var hepatis = $('input:radio[name=' + v_at_data + '_ant_hep_b]:checked').val();
      var hpv = $('input:radio[name=' + v_at_data + '_ant_hpv]:checked').val();
      var toxoide = $('input:radio[name=' + v_at_data + '_ant_tox_tel]:checked').val();
      var tipificacion = $("#" + v_at_data + "_ant_tipification").val();
      var rhoa = $('input:radio[name=' + v_at_data + '_ant_rh]:checked').val();
      var quirurgicos = $("#" + v_at_data + "_floatingQuirurgicos").val();
      var gineco = $("#" + v_at_data + "_floatingGineObs").val();
      var abdominal = $("#" + v_at_data + "_floatingAbdominal").val();
      var toracica = $("#" + v_at_data + "_floatingToracica").val();
      var transfusion = $("#" + v_at_data + "_floatingTransfusionSanguinea").val();
      var otros1_g = $("#" + v_at_data + "_floatingOtrosAnt").val();
      $.ajax({
        type: "POST",
         url: "<?= base_url()?>saveHistorialForms/"+saving_function,
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
          id: eva_cardio,
		  action:v_at_data,
		  origine:origine
        },
		 success: function(data) {
           showalert(data, "alert-success", "successAntOtros");
           $('#saveEditAntOtrosEvaCard').prop("disabled", false);
           },
      })

    }
	   
 function saveOtherAntAntViolenciaIntraF(v_at_data, id, action) {
		
		  var grouposang = $("#" + v_at_data + "_ant_blood_group").val();
      var hepatis = $('input:radio[name=' + v_at_data + '_ant_hep_b]:checked').val();
      var hpv = $('input:radio[name=' + v_at_data + '_ant_hpv]:checked').val();
      var toxoide = $('input:radio[name=' + v_at_data + '_ant_tox_tel]:checked').val();
      var tipificacion = $("#" + v_at_data + "_ant_tipification").val();
      var rhoa = $('input:radio[name=' + v_at_data + '_ant_rh]:checked').val();
      var quirurgicos = $("#" + v_at_data + "_floatingQuirurgicos").val();
      var gineco = $("#" + v_at_data + "_floatingGineObs").val();
      var abdominal = $("#" + v_at_data + "_floatingAbdominal").val();
      var toracica = $("#" + v_at_data + "_floatingToracica").val();
      var transfusion = $("#" + v_at_data + "_floatingTransfusionSanguinea").val();
      var otros1_g = $("#" + v_at_data + "_floatingOtrosAnt").val();
     var violencia1 = $("#"+v_at_data+"_ant_violencia1").val();
	var violencia2 = $("#"+v_at_data+"_ant_violencia2").val();
	var violencia3 = $("#"+v_at_data+"_ant_violencia3").val();
	var violencia4 = $("#"+v_at_data+"_ant_violencia4").val();
      $.ajax({
        type: "POST",
         url: "<?= base_url()?>saveHistorialForms/saveOtherAntAntViolenciaIntraF",
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
		  id:id,
          action:action
        },
		  success: function(data) {
			   showalert(data, "alert-success", "successAntOtros");
                  $('#saveEditAntOtros').prop("disabled", false);      
                    },

      })

    }



function saveSospechaAbuseMaltrato(abuse_mistreat_data, id, saving_function, action) {
			var textmaltrato_g = $("#"+abuse_mistreat_data+"_ant_physic_abuse").val();
			var textabuso_g = $("#"+abuse_mistreat_data+"_ant_sexual_abuse").val();
			var textneg_g = $("#"+abuse_mistreat_data+"_ant_negligence").val(); 
			var maltratoemo_g = $("#"+abuse_mistreat_data+"_ant_emotional").val();
      $.ajax({
        type: "POST",
         url: "<?= base_url()?>saveHistorialForms/"+saving_function,
        data: {
			textmaltrato_g:textmaltrato_g,
			textabuso_g:textabuso_g,
			textneg_g:textneg_g,
			maltratoemo_g:maltratoemo_g,
		    id:id,
           action:action
        },
		  success: function(data) {
                        console.log('abuse save');
                    },
      })

    }





	
  function saveSignoVitales(signo_data, eva_cardio, form_inputs, origine) {
      //--SIGNOS VITALES
      var signo_v_fr = $('#' + signo_data + '_signo_v_fr').val();
      var signo_v_fc = $('#' + signo_data + '_signo_v_fc').val();
      var signo_v_temp = $('#' + signo_data + '_signo_v_temp').val();
      var signo_v_ta_mm = $('#' + signo_data + '_signo_v_ta_mm').val();
      var signo_v_ta_hg = $('#' + signo_data + '_signo_v_ta_hg').val();
      var signo_v_peso_lb = $('#' + signo_data + '_signo_v_peso_lb').val();
      var signo_v_peso_kg = $('#' + signo_data + '_signo_v_peso_kg').val();
      var signo_v_talla = $('#' + signo_data + '_signo_v_talla').val();
      var signo_v_talla_m = $('#' + signo_data + '_signo_v_talla_m').val();
      var signo_v_talla_imc = $('#' + signo_data + '_signo_v_talla_imc').val();
      var signo_v_pulso = $('#' + signo_data + '_signo_v_pulso').val();
      var signo_v_glicemia = $('#' + signo_data + '_signo_v_glicemia').val();
      var signo_v_per_cef = $('#' + signo_data + '_signo_v_per_cef').val();
      var signo_v_sat_ox = $('#' + signo_data + '_signo_v_sat_ox').val();
      //-SIGNOS VITALES RESULTADOS

      var signo_fr_result = $('#' + signo_data + '_signo_fr_result').html();
      var signo_fc_result = $('#' + signo_data + '_signo_fc_result').html();
      var signo_temp_result = $('#' + signo_data + '_signo_temp_result').html();
      var tens_art_sis_result = $('#' + signo_data + '_tens_art_sis_result').html();
      var tens_art_dias_result = $('#' + signo_data + '_tens_art_dias_result').html();
      var glicemia_rslt = $("." + signo_data + "_glicemia").html();
	 
      $.ajax({
        type: "POST",
		 url: "<?= base_url()?>saveHistorialForms/saveSignosVitales",
        data: {

          signo_v_fr: signo_v_fr,
          signo_v_fc: signo_v_fc,
          signo_v_temp: signo_v_temp,
          signo_v_ta_mm: signo_v_ta_mm,
          signo_v_ta_hg: signo_v_ta_hg,
          signo_v_peso_lb: signo_v_peso_lb,
          signo_v_peso_kg: signo_v_peso_kg,
          signo_v_talla: signo_v_talla,
          signo_v_talla_m: signo_v_talla_m,
          signo_v_per_cef: signo_v_per_cef,
          signo_v_talla_imc: signo_v_talla_imc,
          signo_v_pulso: signo_v_pulso,
          signo_v_glicemia: signo_v_glicemia,
          /*signo vitales resultados */
          signo_fr_result: signo_fr_result,
          signo_fc_result: signo_fc_result,
          signo_temp_result: signo_temp_result,
          tens_art_sis_result: tens_art_sis_result,
          tens_art_dias_result: tens_art_dias_result,
          glicemia_rslt: glicemia_rslt,
		  signo_v_sat_ox:signo_v_sat_ox,
          id: eva_cardio,
		  action:signo_data,
		  form_inputs:form_inputs,
		  origine:origine

        },
		 success: function(data) {
                         showalert(data, "alert-success", "successEditSigVit");
                       $('#saveEditSigVit').prop("disabled", false);
                    },
      })

    }
	
	
	
	
	
		function updateEnfAct(id_enf_act) {
			
	  var enf_motivo = $("#" + id_enf_act + "_enf_motivo").val();
      var enf_signopsis = $("#" + id_enf_act + "_enf_signopsis").val();
      var enf_laboratorios = $("#" + id_enf_act + "_enf_laboratorios").val();
      var enf_estudios = $("#" + id_enf_act + "_enf_estudios").val();
			
		  $.ajax({
        type: "POST",
         url: "<?= base_url()?>enfermedad_actual/updateEnfAct",
        data: { 
		    enf_motivo: enf_motivo,
          enf_signopsis: enf_signopsis,
          enf_laboratorios: enf_laboratorios,
          enf_estudios: enf_estudios,
		    id:id_enf_act,
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
                 if (response.status == 0) {
               showalert(response.message, "alert-success", "alert_placeholder_enfac"); 
           } else {
               showalert(response.message, "alert-danger", "alert_placeholder_enfac"); 
           }
       $('#saveEditEnfAct').prop("disabled", false);

        }
		  })
		
		}
	
	
	function updateConDiag(id_con_diag) {
			
	 var floatingDiagPrDef = $("#floatingDiagPrDef-" + id_con_diag).val();
		var floatingDiagOtros = $("#floatingDiagOtros-" + id_con_diag).val();
		var con_dia_plan = $("#con_dia_plan-" + id_con_diag).val();
		var floatingProcedimiento = $("#floatingProcedimiento-" + id_con_diag).val();
		  $.ajax({
        type: "POST",
         url: "<?= base_url()?>conclusion_diagno/updateConDiag",
        data: { 
		   floatingDiagPrDef: floatingDiagPrDef,
          floatingDiagOtros: floatingDiagOtros,
          con_dia_plan: con_dia_plan,
          floatingProcedimiento: floatingProcedimiento,
		   id:id_con_diag,
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
                 if (response.status == 0) {
               showalert(response.message, "alert-success", "alert_placeholder_cond"); 
           } else {
               showalert(response.message, "alert-danger", "alert_placeholder_cond"); 
           }
       $('#saveEditConDiag').prop("disabled", false);

        }
		  })
		
		}
	
	function saveEnfermedadActualConclusionDiag(id_enf_act, id_con_diag, saving_function) {
			
	  var enf_motivo = $("#" + id_enf_act + "_enf_motivo").val();
      var enf_signopsis = $("#" + id_enf_act + "_enf_signopsis").val();
      var enf_laboratorios = $("#" + id_enf_act + "_enf_laboratorios").val();
      var enf_estudios = $("#" + id_enf_act + "_enf_estudios").val();
		
		var floatingDiagPrDef = $("#floatingDiagPrDef-" + id_con_diag).val();
		var floatingDiagOtros = $("#floatingDiagOtros-" + id_con_diag).val();
		var con_dia_plan = $("#con_dia_plan-" + id_con_diag).val();
		var floatingProcedimiento = $("#floatingProcedimiento-" + id_con_diag).val();
		
		  $.ajax({
        type: "POST",
         url: "<?= base_url()?>saveHistorialForms/"+saving_function,
        data: { 
		    enf_motivo: enf_motivo,
          enf_signopsis: enf_signopsis,
          enf_laboratorios: enf_laboratorios,
          enf_estudios: enf_estudios,
		   floatingDiagPrDef: floatingDiagPrDef,
          floatingDiagOtros: floatingDiagOtros,
          con_dia_plan: con_dia_plan,
          floatingProcedimiento: floatingProcedimiento,
		  
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
          pressBtnHist(response);

        }
		  })
		
		}
	
	


	
	function saveHabToxico(hab_tox_data, eva_cardio, saving_function, origine) {
	//alert(1);
      var hab_c_caf = $("#" + hab_tox_data + "hab_c_caf").val();
      var hab_f_caf = $("#" + hab_tox_data + "hab_f_caf").val();
      var hab_c_pip = $("#" + hab_tox_data + "hab_c_pip").val();
      var hab_f_pip = $("#" + hab_tox_data + "hab_f_pip").val();
      var hab_c_ciga = $("#" + hab_tox_data + "hab_c_ciga").val();
      var hab_f_ciga = $("#" + hab_tox_data + "hab_f_ciga").val();
      var hab_c_al = $("#" + hab_tox_data + "hab_c_al").val();
      var hab_f_al = $("#" + hab_tox_data + "hab_f_al").val();
      var hab_c_tab = $("#" + hab_tox_data + "hab_c_tab").val();
      var hab_f_tab = $("#" + hab_tox_data + "hab_f_tab").val();
      var hookah = $("#" + hab_tox_data + "hookah").val();
      var hab_f_hookah = $("#" + hab_tox_data + "hab_f_hookah").val();
      var hab_t_drug = $("#" + hab_tox_data + "drug_list").val();
      var hab_c_drug = $("#" + hab_tox_data + "hab_c_drug").val();
      var hab_f_drug = $("#" + hab_tox_data + "hab_f_drug").val();
      var desc_caf = $("#" + hab_tox_data + "desc_caf").val();
      var desc_cig = $("#" + hab_tox_data + "desc_cig").val();
      var desc_pipa = $("#" + hab_tox_data + "desc_pipa").val();
      var desc_hooka = $("#" + hab_tox_data + "desc_hooka").val();
      var desc_alco = $("#" + hab_tox_data + "desc_alco").val();
      var desc_tab = $("#" + hab_tox_data + "desc_tab").val();
      var desc_drug = $("#" + hab_tox_data + "desc_drug").val();


      $.ajax({
        type: "POST",
         url: "<?= base_url()?>saveHistorialForms/"+saving_function,
        data: {

          hab_c_caf: hab_c_caf,
          hab_f_caf: hab_f_caf,
          hab_c_pip: hab_c_pip,
          hab_f_pip: hab_f_pip,
          hab_c_ciga: hab_c_ciga,
          hab_f_ciga: hab_f_ciga,
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
          desc_cig: desc_cig,
          desc_pipa: desc_pipa,
          desc_alco: desc_alco,
          desc_tab: desc_tab,
          desc_drug: desc_drug,
          desc_hooka: desc_hooka,
          id: eva_cardio,
		  action:hab_tox_data,
		  origine:origine
        },
		   success: function(data) {
           showalert(data, "alert-success", "successEdithabT");
           $('#saveEditToxHab').prop("disabled", false);
           },
      })

    }
	
	 function saveExamenFisico(ex_fis_data, eva_cardio, form_inputs_ex, origine) {
		var neuro_s = $("#" + ex_fis_data + "_neuro_sex").val();
		var neuro_text = $("#" + ex_fis_data + "_neuro_textex").val();
		var cuello = $("#" + ex_fis_data + "_cuelloex").val();
		var cuello_text = $("#" + ex_fis_data + "_cuello_textex").val();
		var cabeza = $("#" + ex_fis_data + "_cabezaex").val();
		var cabeza_text = $("#" + ex_fis_data + "_cabeza_textex").val();
		var abd_insp = $("#" + ex_fis_data + "_abd_inspex").val();
		var abd_inspext = $("#" + ex_fis_data + "_abd_inspext").val();
		var ext_sup_text = $("#" + ex_fis_data + "_ext_sup_textex").val();
		var ext_sup = $("#" + ex_fis_data + "_ext_supex").val();
		var ext_inf = $("#" + ex_fis_data + "_ext_infex").val();
		var ext_inft = $("#" + ex_fis_data + "_ext_inftex").val();
		var torax = $("#" + ex_fis_data + "_toraxex").val();
		var torax_text = $("#" + ex_fis_data + "_torax_textex").val();
		//------------------------------Examen de Ambas Mamas--------------------- 
		var rectal = $("#" + ex_fis_data + "_rectalex").val();
		
		var rectal_text = $("#" + ex_fis_data + "_rectal_textex").val();
		var genitalm = $("#" + ex_fis_data + "_genitalmex").val();
		var vagina = $("#" + ex_fis_data + "_vaginaex").val();
		var vagina_text = $("#" + ex_fis_data + "_vagina_textex").val();
		var genitalm_text = $("#" + ex_fis_data + "_genitalm_textex").val();
		var genitalf = $("#" + ex_fis_data + "_genitalfex").val();
		var genitalf_text = $("#" + ex_fis_data + "_genitalf_textex").val();

		//--------------------left------
		var cuad_inf_ext1 = $("#" + ex_fis_data + "_cuad_inf_ext1ex").val();
		var mama_izq1 = $("#" + ex_fis_data + "_mama_izq1ex").val();
		var cuad_sup_ext1 = $("#" + ex_fis_data + "_cuad_sup_ext1ex").val();
		var cuad_inf_ext11 = $("#" + ex_fis_data + "_cuad_inf_ext11ex").val();
		var region_retro1 = $("#" + ex_fis_data + "_region_retro1ex").val();
		var region_areola_pezon1 = $("#" + ex_fis_data + "_region_areola_pezon1ex").val();
		var region_ax1 = $("#" + ex_fis_data + "_region_ax1ex").val();

		//-------------------right--------------
		var cuad_inf_ext2 = $("#" + ex_fis_data + "_cuad_inf_ext2ex").val();
		var mama_izq2 = $("#" + ex_fis_data + "_mama_izq2ex").val();
		var cuad_sup_ext2 = $("#" + ex_fis_data + "_cuad_sup_ext2ex").val();
		var cuad_inf_ext22 = $("#" + ex_fis_data + "_cuad_inf_ext22ex").val();

		var region_retro2 = $("#" + ex_fis_data + "_region_retro2ex").val();

		var region_areola_pezon2 = $("#" + ex_fis_data + "_region_areola_pezon2ex").val();
		var region_ax2 = $("#" + ex_fis_data + "_region_ax2ex").val();


		//--------------------Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual---------------------------
		var especuloscopia = $('input[name=' + ex_fis_data + '_especuloscopiaex]:checked').val();
		var tacto_bima = $('input[name=' + ex_fis_data + '_tacto_bimaex]:checked').val();
		var cervix = $("#" + ex_fis_data + "_cervixex").val();
		var cervix_text = $("#" + ex_fis_data + "_cervix_textex").val();
		var utero_text = $("#" + ex_fis_data + "_utero_textex").val();
		var utero = $("#" + ex_fis_data + "_utero").val();
		var anexo_derecho_text = $("#" + ex_fis_data + "_anexo_derecho_textex").val();
		var anexo_iz_text = $("#" + ex_fis_data + "_anexo_iz_textex").val();
		var inspection_vulval = $("#" + ex_fis_data + "_inspection_vulvalex").val();
		var inspection_vulval_text = $("#" + ex_fis_data + "_inspection_vulval_textex").val();
		var extremidades_inf = $("#" + ex_fis_data + "_extremidades_infex").val();
		var extremidades_inf_text = $("#" + ex_fis_data + "_extremidades_inf_textex").val();
		var anexo_izquierdo = $("#" + ex_fis_data + "_anexo_izquierdo").val();
		var anexo_derecho = $("#" + ex_fis_data + "_anexo_derecho").val();
	

      $.ajax({
        type: "POST", 
        url: "<?= base_url()?>saveHistorialForms/examenFisico",
        data: {
          neuro_s: neuro_s,
          neuro_text: neuro_text,
          cabeza: cabeza,
          cabeza_text: cabeza_text,
          cuello: cuello,
          cuello_text: cuello_text,
          abd_insp: abd_insp,
          abd_inspext: abd_inspext,
          ext_sup: ext_sup,
          ext_sup_text: ext_sup_text,
          ext_inf: ext_inf,
          ext_inft: ext_inft,
          torax: torax,
          torax_text: torax_text,
         //begin Examen de Ambas Mamas
		/*-left */
		cuad_inf_ext1: cuad_inf_ext1,
		mama_izq1: mama_izq1,
		cuad_sup_ext1: cuad_sup_ext1,
		cuad_inf_ext11: cuad_inf_ext11,
		region_retro1: region_retro1,
		region_areola_pezon1: region_areola_pezon1,

		region_ax1: region_ax1, //left end
		/*-right */
		cuad_inf_ext2: cuad_inf_ext2,
		mama_izq2: mama_izq2,
		cuad_sup_ext2: cuad_sup_ext2,
		cuad_inf_ext22: cuad_inf_ext22,
		region_retro2: region_retro2,
		region_areola_pezon2: region_areola_pezon2,
		region_ax2: region_ax2,
		//begin Examen Pelvico/Vulvar: Especuloscopia y tacto Bimanual
		  rectal: rectal,
		rectal_text: rectal_text,
		genitalm_text: genitalm_text,
		genitalm: genitalm,
		genitalf_text: genitalf_text,
		genitalf: genitalf,
		vagina: vagina,
		vagina_text: vagina_text,
		especuloscopia: especuloscopia,
		tacto_bima: tacto_bima,
		cervix: cervix,
		cervix_text: cervix_text,
		utero: utero,
		utero_text: utero_text,
		anexo_derecho_text: anexo_derecho_text,
		anexo_iz_text: anexo_iz_text,
		inspection_vulval: inspection_vulval,
		inspection_vulval_text: inspection_vulval_text,
		extremidades_inf: extremidades_inf,
		extremidades_inf_text: extremidades_inf_text,
		anexo_izquierdo: anexo_izquierdo,
		anexo_derecho: anexo_derecho,
		 id: eva_cardio,
		action:ex_fis_data,
		form_inputs:form_inputs_ex,
		origine:origine,
					
        },
      success: function(data) {
		  showalert(data, "alert-success", "alert_placeholder_exam_fis");
           $('#saveEditExamFisico').prop("disabled", false);
           },

      })
    }
	
	
	
	 function saveExamenSistema(sis_data, id, saving_function, form_inputs_sist) {
	console.log(id);
	  var sisneuro = $("#" + sis_data + "_sisneuros").val();
            var neurologico = $("#" + sis_data + "_neurologicos").val();
            var siscardio = $("#" + sis_data + "_siscardios").val();
            var cardiova = $("#" + sis_data + "_cardiovas").val();
            var sist_uro = $("#" + sis_data + "_sist_uros").val();
            var urogenital = $("#" + sis_data + "_urogenitals").val();
            var sis_mu_e = $("#" + sis_data + "_sis_mu_es").val();
            var musculoes = $("#" + sis_data + "_musculoess").val();
            var sist_resp = $("#" + sis_data + "_sist_resps").val();
            var nervioso = $("#" + sis_data + "_nerviosos").val();
            var linfatico = $("#" + sis_data + "_linfaticos").val();
            var digestivo = $("#" + sis_data + "_digestivos").val();
            var respiratorio = $("#" + sis_data + "_respiratorios").val();
            var genitourinario = $("#" + sis_data + "_genitourinarios").val();
            var sist_diges = $("#" + sis_data + "_sist_digess").val();
            var sist_endo = $("#" + sis_data + "_sist_endos").val();
            var endocrino = $("#" + sis_data + "_endocrinos").val();
            var sist_rela = $("#" + sis_data + "_sist_relas").val();
            var otros_ex_sis = $("#" + sis_data + "_sist_relastext").val();
            var dorsales = $("#" + sis_data + "_dorsaless").val();

            var dorsalesstext = $("#" + sis_data + "_dorsalesstext").val();

            var genitourinariostext = $("#" + sis_data + "_genitourinariostext").val();

            var linfaticotext = $("#" + sis_data + "_linfaticotext").val();

            var nerviosostext = $("#" + sis_data + "_nerviosostext").val();
      $.ajax({
        type: "POST", 
        url: "<?= base_url()?>saveHistorialForms/"+saving_function,
        data: {
          sisneuro: sisneuro,
                    dorsalesstext: dorsalesstext,
                    genitourinariostext: genitourinariostext,
                    linfaticotext: linfaticotext,
                    nerviosostext: nerviosostext,
                    neurologico: neurologico,
                    siscardio: siscardio,
                    cardiova: cardiova,
                    sist_uro: sist_uro,
                    urogenital: urogenital,
                    sis_mu_e: sis_mu_e,
                    musculoes: musculoes,
                    sist_resp: sist_resp,
                    nervioso: nervioso,
                    linfatico: linfatico,
                    digestivo: digestivo,
                    respiratorio: respiratorio,
                    genitourinario: genitourinario,
                    sist_diges: sist_diges,
                    sist_endo: sist_endo,
                    endocrino: endocrino,
                    sist_rela: sist_rela,
                    otros_ex_sis: otros_ex_sis,
                    dorsales: dorsales,
					id: id,
					action:sis_data,
					form_inputs:form_inputs_sist
        },
      success: function(data) {
           showalert(data, "alert-success", "alert_placeholder_exam_fis");
           $('#saveEditExamSist').prop("disabled", false);
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
	
	
	
	function savePediatry(ant_ped_data, id_pedia){
		
      var evo = $('input:radio[name=' + ant_ped_data + '_pediatry_evo]:checked').val();
      var evol_text = $("#" + ant_ped_data + "_pediatry_evo_txt").val();
      var edad_gest = $("#" + ant_ped_data + "_pediatry_edad_gest").val();

      var lactamat1 = [];

      $('input[name=' + ant_ped_data + '_pediatry_lactancia]:checked').each(function() {
        lactamat1.push(this.value);
      });


      var leche1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_milk]:checked').each(function() {
        leche1.push(this.value);
      });

      var otrosinfo = $("#" + ant_ped_data + "_pediatry_other_food_txt").val();

      var traum = $('input:radio[name=' + ant_ped_data + '_pediatry_trau_som_ps]:checked').val();
      var traum_text = $("#" + ant_ped_data + "_pediatry_trau_som_ps_txt").val();
      var trans = $('input:radio[name=' + ant_ped_data + '_pediatry_transf]:checked').val();

      var moto_grueso = $('input:radio[name=' + ant_ped_data + '_pediatry_grueso]:checked').val();
      var moto_fino = $('input:radio[name=' + ant_ped_data + '_pediatry_fino]:checked').val();
      var ped_lang = $('input:radio[name=' + ant_ped_data + '_pediatry_lenguage]:checked').val();
      var ped_social = $('input:radio[name=' + ant_ped_data + '_pediatry_social]:checked').val();

      var trans_text = $("#" + ant_ped_data + "_pediatry_transf_txt").val();
      var tnaci = $('input:radio[name=' + ant_ped_data + '_pediatry_birth_type]:checked').val();
      var describa = $("#" + ant_ped_data + "_pediatry_birth_type_txt").val();

      var pesopd = $("#" + ant_ped_data + "_pediatry_birth_weight_value").val();

      var talla = $("#" + ant_ped_data + "_pediatry_birth_size_value").val();

      var ale1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_ale]:checked').each(function() {

        ale1.push(this.value);
      });
      var hep1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_hep]:checked').each(function() {
        hep1.push(this.value);
      });

      var amig1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_amig]:checked').each(function() {
        amig1.push(this.value);
      });
      var infv1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_infv]:checked').each(function() {
        infv1.push(this.value);
      });
      var asm1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_asm]:checked').each(function() {
        asm1.push(this.value);
      });

      var neum1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_neum]:checked').each(function() {
        neum1.push(this.value);
      });

      var cirug1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_cirug]:checked').each(function() {
        cirug1.push(this.value);
      });

      var otot1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_otot]:checked').each(function() {
        otot1.push(this.value);
      });

      var deng1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_deng]:checked').each(function() {
        deng1.push(this.value);
      });


      var pape1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_pape]:checked').each(function() {
        pape1.push(this.value);
      });

      var diar1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_diar]:checked').each(function() {
        diar1.push(this.value);
      });

      var paras1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_paras]:checked').each(function() {
        paras1.push(this.value);
      });

      var zika1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_zika]:checked').each(function() {

        zika1.push(this.value);
      });

      var saram1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_saram]:checked').each(function() {

        saram1.push(this.value);
      });

      var chicun1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_chicun]:checked').each(function() {

        chicun1.push(this.value);
      });


      var varicela1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_varicela]:checked').each(function() {
        varicela1.push(this.value);
      });


      var falc1 = [];
      $('input[name=' + ant_ped_data + '_pediatry_falc]:checked').each(function() {
        falc1.push(this.value);
      });

      var otros_t_text = $("#" + ant_ped_data + "_pediatry_pat_otros").val();


      var textgrueso = $("#" + ant_ped_data + "_pediatry_text_grueso").val();
      var textfino = $("#" + ant_ped_data + "_pediatry_text_fino").val();
      var textlenguage = $("#" + ant_ped_data + "_pediatry_text_lenguage").val();
      var textsocial = $("#" + ant_ped_data + "_pediatry_text_social").val();


      //===VACUNACION=========================================

 var newborn = [];
      $('input[name=' + ant_ped_data + '_newborn]:checked').each(function() {
        newborn.push(this.value);
      });
   
    
 var months2 = [];
      $('input[name=' + ant_ped_data + '_months2]:checked').each(function() {
        months2.push(this.value);
      });


    var months4 = [];
      $('input[name=' + ant_ped_data + '_months4]:checked').each(function() {
        months4.push(this.value);
      });



      var months6 = [];
      $('input[name=' + ant_ped_data + '_months6]:checked').each(function() {
        months6.push(this.value);
      });

      var months12 = [];
      $('input[name=' + ant_ped_data + '_months12]:checked').each(function() {
        months12.push(this.value);
      });



  var months18 = [];
      $('input[name=' + ant_ped_data + '_months18]:checked').each(function() {
        months18.push(this.value);
      });



  var years4 = [];
      $('input[name=' + ant_ped_data + '_years4]:checked').each(function() {
        years4.push(this.value);
      });

 var years5 = [];
      $('input[name=' + ant_ped_data + '_years5]:checked').each(function() {
        years5.push(this.value);
      });
     

 var years_9_14 = [];
      $('input[name=' + ant_ped_data + '_years_9_14]:checked').each(function() {
        years_9_14.push(this.value);
      });
     
    
 var years_more_9_14 = [];
      $('input[name=' + ant_ped_data + '_years_more_9_14]:checked').each(function() {
        years_more_9_14.push(this.value);
      });
     
      
	 var text = $("#pediatry-form-inputs").val();
	  var checkbox = $("#pediatry-form-checkbox").val();
	  var radio = $("#pediatry-form-radio").val();

	        $.ajax({
        type: "POST",
        url: "<?= base_url('saveHistorialPediatry/savePediatria') ?>",
       data:{
	      ale1: ale1,
          otros_t_text: otros_t_text,
          hep1: hep1,
          amig1: amig1,
          infv1: infv1,
          asm1: asm1,
          neum1: neum1,
          cirug1: cirug1,
          otot1: otot1,
          deng1: deng1,
          pape1: pape1,
          diar1: diar1,
          paras1: paras1,
          zika1: zika1,
          saram1: saram1,
          chicun1: chicun1,
          varicela1: varicela1,
          falc1: falc1,
          textsocial: textsocial,
          textlenguage: textlenguage,
          textfino: textfino,
          textgrueso: textgrueso,
          trans: trans,
          traum: traum,
          moto_grueso: moto_grueso,
          moto_fino: moto_fino,
          ped_lang: ped_lang,
          ped_social: ped_social,
          evo: evo,
          evol_text: evol_text,
          tnaci: tnaci,
          describa: describa,
          edad_gest: edad_gest,
          pesopd: pesopd,
          talla: talla,
          lactamat1: lactamat1,
          leche1: leche1,
          otrosinfo: otrosinfo,
          traum_text: traum_text,
          trans_text: trans_text,
          newborn:newborn,
		months2:months2,
		months4:months4,
		months6:months6,
		months12:months12,
		months18:months18,
		years4:years4,
		years5:years5,
		years_9_14:years_9_14,
		years_more_9_14:years_more_9_14,
		  id_pedia:id_pedia,
		  text:text,
		  checkbox:checkbox,
		  radio:radio
        },
       
        success: function(data) {
          showalert(data, "alert-success", "successEditPed");
		   $('#saveEditPed').prop("disabled", false);
           },
  error: function(jqXHR, textStatus, errorThrown) {
          alert('An erroroccurred... Look at the console (F2 or Ctrl+Shift+I, Console tab) for more information!');

          $('#result-error').html('<p>statuscode: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
        
      });
	}
	
	
	
	function saveSSR(ssr_data, id_ssr){
		  var optradio = $('input:radio[name=' + ssr_data + '_optradio]:checked').val();
      var edad = $("#" + ssr_data + "_edad_ssr").val();

      var numero = $("#" + ssr_data + "_numero").val();
      var sexual = $("#" + ssr_data + "_sexual").val();
      var pareja = $("#" + ssr_data + "_pareja").val();
      var califica_text = $("#" + ssr_data + "_califica_text").val();
      var menarquia = $("#" + ssr_data + "_menarquia").val();
      var planif_text = $("#" + ssr_data + "_planif_text").val();
      var fecha_ul_m = $("#" + ssr_data + "_fecha_ul_m").val();
      var fechaOvulacion = $("#" + ssr_data + "_fecha-ovulacion").text();
      var semanaFertil = $("#" + ssr_data + "_semana-fertil").text();
      var amenoreaText = $("#" + ssr_data + "_amenorea-text").text();
      var amenoreaTiempo = $("#" + ssr_data + "_amenorea-tiempo").text();
      var cliclo_text = $("#" + ssr_data + "_cliclo_text").val();
      var dura_sang = $("#" + ssr_data + "_dura_sang").val();
      var ant_pap_re_text = $("#" + ssr_data + "_ant_pap_re_text").val();
      var realiza_auto_text = $("#" + ssr_data + "_realiza_auto_text").val();
      var planif = $('input:radio[name=' + ssr_data + '_planif]:checked').val();
      var embara = $('input:radio[name=' + ssr_data + '_embara]:checked').val();
      var menaop = $('input:radio[name=' + ssr_data + '_menaop]:checked').val();
      var cliclo = $('input:radio[name=' + ssr_data + '_cliclo]:checked').val();
      var dismeno = $('input:radio[name=' + ssr_data + '_dismeno]:checked').val();
      var ant_pap_re = $('input:radio[name=' + ssr_data + '_ant_pap_re]:checked').val();
      var realiza_auto = $('input:radio[name=' + ssr_data + '_realiza_auto]:checked').val();
      var fecha_ul_mama = $('input:radio[name=' + ssr_data + '_fecha_ul_mama]:checked').val();
      var cant_sang = $('input:radio[name=' + ssr_data + '_cant_sang]:checked').val();
      var nuligesta = $('input:radio[name=' + ssr_data + '_nuligesta]:checked').val();
      var complica = $('input:radio[name=' + ssr_data + '_complica]:checked').val();
      var complica_dur = $('input:radio[name=' + ssr_data + '_complica_dur]:checked').val();
      var infec_tran = $('input:radio[name=' + ssr_data + '_infec_tran]:checked').val();
      var califica = $('input:radio[name=' + ssr_data + '_califica]:checked').val();
      var utilizo = $('input:radio[name=' + ssr_data + '_utilizo]:checked').val();
      var sexual2 = $('input:radio[name=' + ssr_data + '_sexual2]:checked').val();
      var fecha_ul_pap = $('input:radio[name=' + ssr_data + '_fecha_ul_pap]:checked').val();
      var totalGest = $("#" + ssr_data + "_totalGest").val();
      var e = $("#" + ssr_data + "_e").val();
      var p = $("#" + ssr_data + "_p").val();
      var a = $("#" + ssr_data + "_a").val();
      var c = $("#" + ssr_data + "_c").val();
      var complica_text = $("#" + ssr_data + "_complica_text").val();
      var otro_infeccion = $("#" + ssr_data + "_otro_infection").val();
      var complica_dur_text = $("#" + ssr_data + "_complica_dur_text").val();
      var sifilisc = [];
      $('input[name=' + ssr_data + '_sifilis]:checked').each(function() {
        sifilisc.push(this.value);
      });

      var gonorreac = [];
      $('input[name=' + ssr_data + '_gonorrea]:checked').each(function() {
        gonorreac.push(this.value);
      });


      var clamidiac = [];
      $('input[name=' + ssr_data + '_clamidia]:checked').each(function() {
        clamidiac.push(this.value);
      });
	  
	   var text = $("#ssr-form-inputs").val();
	   var radio = $("#ssr-form-radio").val();
	
	   $.ajax({
        type: "POST",
        url: "<?= base_url('ssr/saveSSR') ?>",
        data: {
          edad: edad,
          optradio: optradio,
          numero: numero,
          sexual: sexual,
          pareja: pareja,
          califica: califica,
          califica_text: califica_text,
          utilizo: utilizo,
          sexual2: sexual2,
          planif: planif,
          planif_text: planif_text,
          embara: embara,
          menarquia: menarquia,
          fechaOvulacion: fechaOvulacion,
          semanaFertil: semanaFertil,
          amenoreaText: amenoreaText,
          amenoreaTiempo: amenoreaTiempo,
          fecha_ul_m: fecha_ul_m,
          menaop: menaop,
          cliclo: cliclo,
          cliclo_text: cliclo_text,
          dura_sang: dura_sang,
          dismeno: dismeno,
          fecha_ul_pap: fecha_ul_pap,
          ant_pap_re: ant_pap_re,
          ant_pap_re_text: ant_pap_re_text,
          realiza_auto: realiza_auto,
          realiza_auto_text: realiza_auto_text,
          fecha_ul_mama: fecha_ul_mama,
          p: p,
          a: a,
          c: c,
          e: e,
          totalGest: totalGest,
          otro_infeccion: otro_infeccion,
          cant_sang: cant_sang,
          nuligesta: nuligesta,
          complica: complica,
          complica_text: complica_text,
          complica_dur: complica_dur,
          complica_dur_text: complica_dur_text,
          sifilisc: sifilisc,
          gonorreac: gonorreac,
          clamidiac: clamidiac,
          infec_tran: infec_tran,
		  id:id_ssr,
		  text:text,
		  radio:radio

        },

      
        success: function(data) {
          showalert(data, "alert-success", "alert_placeholder_ssr");
		   $('#saveEditSsr').prop("disabled", false);
           },


      });
	}
	
	
	function saveOBS(obs_data, id_obs){
	  var dia1 = $('input:radio[name=' + 'obs_' + obs_data + '_dia1]:checked').val();
      var tbc1 = $('input:radio[name=' + 'obs_' + obs_data + '_tbc1]:checked').val();
      var hip1 = $('input:radio[name=' + 'obs_' + obs_data + '_hip1]:checked').val();
      var pelv = $('input:radio[name=' + 'obs_' + obs_data + '_pelv]:checked').val();
      var inf = $('input:radio[name=' + 'obs_' + obs_data + '_inf]:checked').val();
      var otros1 = $('input:radio[name=' + 'obs_' + obs_data + '_otros1]:checked').val();
      var otros1_text = $("#obs_" + obs_data + "_otros1_text").val();

      var otros2_text = $("#obs_" + obs_data + "_otros2_text").val();
      var gem = $('input:radio[name=' + 'obs_' + obs_data + '_gem]:checked').val();
      var otros2 = $('input:radio[name=' + 'obs_' + obs_data + '_otros2]:checked').val();
      var dia2 = $('input:radio[name=' + 'obs_' + obs_data + '_dia2]:checked').val();
      var tbc2 = $('input:radio[name=' + 'obs_' + obs_data + '_tbc2]:checked').val();
      var hip2 = $('input:radio[name=' + 'obs_' + obs_data + '_hip2]:checked').val();

      var fiebre1 = [];
      $('input[name=' + 'obs_' + obs_data + '_fiebre]:checked').each(function() {
        fiebre1.push(this.value);
      });
      var artra1 = [];
      $('input[name=' + 'obs_' + obs_data + '_artra]:checked').each(function() {
        artra1.push(this.value);
      });
      var mia1 = [];
      $('input[name=' + 'obs_' + obs_data + '_mia]:checked').each(function() {
        mia1.push(this.value);
      });
      var exa1 = [];
      $('input[name=' + 'obs_' + obs_data + '_exa]:checked').each(function() {
        exa1.push(this.value);
      });
      var con1 = [];
      $('input[name=' + 'obs_' + obs_data + '_con]:checked').each(function() {
        con1.push(this.value);
      });

      var nig11 = [];
      $('input[name=' + 'obs_' + obs_data + '_nig1]:checked').each(function() {
        nig11.push(this.value);
      });

      var nig22 = [];
      $('input[name=' + 'obs_' + obs_data + '_nig2]:checked').each(function() {
        nig22.push(this.value);
      });

      var nig33 = [];
      $('input[name=' + 'obs_' + obs_data + '_nig3]:checked').each(function() {
        nig33.push(this.value);
      });

      var partos = $("#obs_" + obs_data + "_partos").val();
      var arbotos = $("#obs_" + obs_data + "_arbotos").val();
      var vaginales = $("#obs_" + obs_data + "_vaginales").val();
      var viven = $("#obs_" + obs_data + "_viven").val();
      var gestas = $("#obs_" + obs_data + "_gestas").val();
      var cesareas = $("#obs_" + obs_data + "_cesareas").val();
      var muertos1 = $("#obs_" + obs_data + "_muertos1").val();
      var nacidov1 = $("#obs_" + obs_data + "_nacidov1").val();
      var nacidom1 = $("#obs_" + obs_data + "_nacidom1").val();
      var despues1s = $("#obs_" + obs_data + "_despues1s").val();
      var otrosc = $("#obs_" + obs_data + "_otrosc").val();
      var fin = $("#obs_" + obs_data + "_fin").val();
      var rn = $("#obs_" + obs_data + "_rn").val();
      var fecha1 = $("#obs_" + obs_data + "_fecha1").val();
      var fecha2 = $("#obs_" + obs_data + "_fecha2").val();
      var fecha3 = $("#obs_" + obs_data + "_fecha3").val();
      var fecha4 = $("#obs_" + obs_data + "_fecha4").val();
      var sono1 = $("#obs_" + obs_data + "_sono1").val();
      var sono2 = $("#obs_" + obs_data + "_sono2").val();
      var sono3 = $("#obs_" + obs_data + "_sono3").val();
      var sono4 = $("#obs_" + obs_data + "_sono4").val();
      var sonodia1 = $("#obs_" + obs_data + "_sonodia1").val();
      var sonodia2 = $("#obs_" + obs_data + "_sonodia2").val();
      var sonodia3 = $("#obs_" + obs_data + "_sonodia3").val();
      var sonodia4 = $("#obs_" + obs_data + "_sonodia4").val();
      var diarest1 = $("#obs_" + obs_data + "_dia-rest1").val();
      var diarest2 = $("#obs_" + obs_data + "_dia-rest2").val();
      var diarest3 = $("#obs_" + obs_data + "_dia-rest3").val();
      var diarest4 = $("#obs_" + obs_data + "_dia-rest4").val();
      var fpp1 = $("#obs_" + obs_data + "_fpp1").val();
      var fpp2 = $("#obs_" + obs_data + "_fpp2").val();
      var fpp3 = $("#obs_" + obs_data + "_fpp3").val();
      var fpp4 = $("#obs_" + obs_data + "_fpp4").val();
      var rest1 = $("#obs_" + obs_data + "_rest1").val();
      var rest2 = $("#obs_" + obs_data + "_rest2").val();
      var rest3 = $("#obs_" + obs_data + "_rest3").val();
      var rest4 = $("#obs_" + obs_data + "_rest4").val();
      var peso1 = $("#obs_" + obs_data + "_peso").val();
      var talla1 = $("#obs_" + obs_data + "_talla").val();
      var fum_cal_ges = $("#obs_" + obs_data + "_fum_cal_ges").val();
      var fpp_cal_ges = $("#obs_" + obs_data + "_fpp_cal_ges").val();
      var sem_act_a = $("#obs_" + obs_data + "_sem_act_a").val();
      var prev_act = $('input:radio[name=' + 'obs_' + obs_data + '_prev_act]:checked').val();
      var prev_act_mes = $("#obs_" + obs_data + "_prev_act_mes").val();
      var r2 = $("#obs_" + obs_data + "_2r").val();
      var sencibil = $('input:radio[name=' + 'obs_' + obs_data + '_sencibil]:checked').val();
      var rh = $('input:radio[name=' + 'obs_' + obs_data + '_rh]:checked').val();
      var rh_option = $("#obs_" + obs_data + "_rh_option").val();
      var odont = $('input:radio[name=' + 'obs_' + obs_data + '_odont]:checked').val();
      var pelvis = $('input:radio[name=' + 'obs_' + obs_data + '_pelvis]:checked').val();
      var papani = $('input:radio[name=' + 'obs_' + obs_data + '_papani]:checked').val();
      var colp = $('input:radio[name=' + 'obs_' + obs_data + '_colp]:checked').val();
      var cevix = $('input:radio[name=' + 'obs_' + obs_data + '_cevix]:checked').val();
      var vdrl111 = [];

      $('input[name=' + 'obs_' + obs_data + '_vdrl1]:checked').each(function() {
        vdrl111.push(this.value);
      });

      var vdrl221 = [];
      $('input[name=' + 'obs_' + obs_data + '_vdrl2]:checked').each(function() {
        vdrl221.push(this.value);
      });
      var diasmes = $("#obs_" + obs_data + "_diasmes").val();

      var pu_fecha1 = $("#obs_" + obs_data + "_pu_fecha1").val();
      var pu_fecha2 = $("#obs_" + obs_data + "_pu_fecha2").val();
      var pu_fecha3 = $("#obs_" + obs_data + "_pu_fecha3").val();
      var pu_t1 = $("#obs_" + obs_data + "_pu_t1").val();
      var pu_t2 = $("#obs_" + obs_data + "_pu_t2").val();
      var pu_t3 = $("#obs_" + obs_data + "_pu_t3").val();
      var pu_pul1 = $("#obs_" + obs_data + "_pu_pul11").val();
      var pu_pul11 = $("#obs_" + obs_data + "_pu_pul11").val();


      var pu_pul2 = $("#obs_" + obs_data + "_pu_pul2").val();
      var pu_pul22 = $("#obs_" + obs_data + "_pu_pul22").val();
      var pu_pul3 = $("#obs_" + obs_data + "_pu_pul3").val();
      var pu_pul33 = $("#obs_" + obs_data + "_pu_pul33").val();
      var pu_ten1 = $("#obs_" + obs_data + "_pu_ten11s").val();
      var pu_ten11 = $("#obs_" + obs_data + "_pu_ten11").val();
      var pu_ten2 = $("#obs_" + obs_data + "_pu_ten2").val();
      var pu_ten22 = $("#obs_" + obs_data + "_pu_ten22").val();
      var pu_ten3 = $("#obs_" + obs_data + "_pu_ten3").val();
      var pu_ten33 = $("#obs_" + obs_data + "_pu_ten33").val();
      var pu_inv1 = $("#obs_" + obs_data + "_pu_inv1").val();
      var pu_inv2 = $("#obs_" + obs_data + "_pu_inv2").val();
      var pu_inv3 = $("#obs_" + obs_data + "_pu_inv3").val();
      var loquios1 = $("#obs_" + obs_data + "_loquios1").val();
      var loquios2 = $("#obs_" + obs_data + "_loquios2").val();
      var loquios3 = $("#obs_" + obs_data + "_loquios3").val();
	   var text = $("#obs-form-inputs").val();
	   var radio = $("#obs-form-radio").val();
	   
	  	   $.ajax({
        type: "POST",
        url: "<?= base_url('obs/saveOBS') ?>",
        data: {
          dia1: dia1,
          tbc1: tbc1,
          hip1: hip1,
          pelv: pelv,
          inf: inf,
          otros1: otros1,
          otros1_text: otros1_text,
          sonodia1: sonodia1,
          sonodia2: sonodia2,
          sonodia3: sonodia3,
          sonodia4: sonodia4,
          diarest1: diarest1,
          diarest2: diarest2,
          diarest3: diarest3,
          diarest4: diarest4,
          dia2: dia2,
          tbc2: tbc2,
          hip2: hip2,
          gem: gem,
          otros2: otros2,
          otros2_text: otros2_text,
          fiebre1: fiebre1,
          artra1: artra1,
          mia1: mia1,
          exa1: exa1,
          con1: con1,
          nig11: nig11,
          nig22: nig22,
          nig33: nig33,
          partos: partos,
          arbotos: arbotos,
          vaginales: vaginales,
          viven: viven,
          gestas: gestas,
          cesareas: cesareas,
          muertos1: muertos1,
          nacidov1: nacidov1,
          nacidom1: nacidom1,
          despues1s: despues1s,
          otrosc: otrosc,
          fin: fin,
          rn: rn,
          fecha1: fecha1,
          fecha2: fecha2,
          fecha3: fecha3,
          fecha4: fecha4,
          sono1: sono1,
          sono2: sono2,
          sono3: sono3,
          sono4: sono4,
          fpp1: fpp1,
          fpp2: fpp2,
          fpp3: fpp3,
          fpp4: fpp4,
          rest1: rest1,
          rest2: rest2,
          rest3: rest3,
          rest4: rest4,
          peso1: peso1,
          talla1: talla1,
          fum_cal_ges: fum_cal_ges,
          fpp_cal_ges: fpp_cal_ges,
          sem_act_a: sem_act_a,
          prev_act: prev_act,
          prev_act_mes: prev_act_mes,
          r2: r2,
          rh: rh,
          sencibil: sencibil,
          rh_option: rh_option,
          odont: odont,
          pelvis: pelvis,
          papani: papani,
          colp: colp,
          cevix: cevix,
          vdrl11: vdrl111,
          vdrl22: vdrl221,
          diasmes: diasmes,
          pu_fecha1: pu_fecha1,
          pu_fecha2: pu_fecha2,
          pu_fecha3: pu_fecha3,
          pu_t1: pu_t1,
          pu_t2: pu_t2,
          pu_t3: pu_t3,
          pu_pul1: pu_pul1,
          pu_pul11: pu_pul11,
          pu_pul2: pu_pul2,
          pu_pul22: pu_pul22,
          pu_pul3: pu_pul3,
          pu_pul33: pu_pul33,
          pu_ten1: pu_ten1,
          pu_ten11: pu_ten11,
          pu_ten2: pu_ten2,
          pu_ten22: pu_ten22,
          pu_ten3: pu_ten3,
          pu_ten33: pu_ten33,
          pu_inv1: pu_inv1,
          pu_inv2: pu_inv2,
          pu_inv3: pu_inv3,
          loquios1: loquios1,
          loquios2: loquios2,
          loquios3: loquios3,
		  id:id_obs,
		  text:text,
		  radio:radio,
		  obs_data:obs_data

        },

        error: function(jqXHR, textStatus, errorThrown) {
          alert('An erroroccurred... Look at the console (F2 or Ctrl+Shift+I, Console tab) for more information!');

          $('#result-error').html('<p>statuscode: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
        success: function(data) {
          showalert(data, "alert-success", "alert_placeholder");
		   $('#saveEditAntObs').prop("disabled", false);
           },


      });
	}
	
	
	function  saveUrologyAntPerFam(ant_uro_data, i_){
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
		
		 $.ajax({
type: "POST",
url: "<?=base_url('saveHistorialUrology/saveUrologyAntPerFam')?>",
data: {
	  uro_sin_ha_1: n,
	  uro_ant_escl: c,
	  uro_ant_imp: o,
	  uro_ant_ane_fal: i,
	  uro_ant_vari: u,
	  uro_ant_otros2: g,
	  uro_ant_fimosis: h,
	  uro_ant_hid: s,
	  uro_ant_its: r, 
	  uro_ant_tumorales: l,
	  uro_ant_otros: d,
	  uro_sin_ha_2: v, 
	  uro_ant_cancer_prostata: p,
	  uro_ant_poli_renal: b,
	  uro_ant_uroli: f,
	  uro_ant_cist: m,
	  id:i_

},
  
success:function(data){
showalert(data, "alert-success", "successAntUroPerFam"); 
	$('#saveEditAntUroPerFam').prop("disabled", false);	
}  
});
	}		
		
		
	function saveUroExamFis(ant_ex_uro_data, id_ex_uro){
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
  var textarea = $("#exfisuro-form-inputs").val();
 
  $.ajax({
type: "POST",
url: "<?=base_url('saveHistorialUrology/saveExamFisUrologo')?>",
data: {
uro_pene:uro_pene,
uro_testicule:uro_testicule,
uro_epididimos:uro_epididimos,
uro_tato_rec_pros:uro_tato_rec_pros,
uro_geni_mujer:uro_geni_mujer,
uro_vejiga:uro_vejiga,
 uro_loins:uro_loins,
 uro_otros:uro_otros,
 tacto_rect:tacto_rect,
 id:id_ex_uro,
 textarea: textarea
},

success:function(data){
    showalert(data, "alert-success", "alert_placeholder_exam_uro"); 
           
$('#saveEditExamUro').prop("disabled", false);	
},
  
  
});
 
 
 
		
	}	
		
		
		
		
		

	function saveOphtalmology(data_ophtal, id_ophtal){
		   var od_con_cor = $("#" + data_ophtal + "_od_con_cor").val();

            var od_sin_con = $("#" + data_ophtal + "_od_sin_con").val();
            var od_mas_o_meno = $('input[name=' + data_ophtal + '_od_mas_o_meno]:checked').val();
            var od_cor_act = $("#" + data_ophtal + "_od_cor_act").val();
            var os_sin_con = $("#" + data_ophtal + "_os_sin_con").val();
            var os_con_cor = $("#" + data_ophtal + "_os_con_cor").val();
            var os_mas_o_meno = $('input[name=' + data_ophtal + '_os_mas_o_meno]:checked').val();
            var os_cor_act = $("#" + data_ophtal + "_os_cor_act").val();
            var updated_by = $("#" + data_ophtal + "_updated_by").val();
            var notaof = $("#" + data_ophtal + "_not-oftm").val();
            var retine1 = $("#" + data_ophtal + "_retine1").val();
            var retine2 = $("#" + data_ophtal + "_retine2").val();
            var retine3 = $("#" + data_ophtal + "_retine3").val();
            var retine4 = $("#" + data_ophtal + "_retine4").val();
            var retine5 = $("#" + data_ophtal + "_retine5").val();
            var retine6 = $("#" + data_ophtal + "_retine6").val();
            var retine7 = $("#" + data_ophtal + "_retine7").val();
            var retine8 = $("#" + data_ophtal + "_retine8").val();


            var masomenos1 = $('input[name=' + data_ophtal + '_masomenos1]:checked').val();
            var masomenos2 = $('input[name=' + data_ophtal + '_masomenos2]:checked').val();
            var masomenos3 = $('input[name=' + data_ophtal + '_masomenos3]:checked').val();
            var masomenos4 = $('input[name=' + data_ophtal + '_masomenos4]:checked').val();
            var masomenos5 = $('input[name=' + data_ophtal + '_masomenos5]:checked').val();
            var masomenos6 = $('input[name=' + data_ophtal + '_masomenos6]:checked').val();
            var masomenos7 = $('input[name=' + data_ophtal + '_masomenos7]:checked').val();
            var masomenos8 = $('input[name=' + data_ophtal + '_masomenos8]:checked').val();

            var ppm = $("#" + data_ophtal + "_ppm").val();
            var converg = $("#" + data_ophtal + "_converg").val();
            var ducvers = $("#" + data_ophtal + "_ducvers").val();
            var convertest = $("#" + data_ophtal + "_convertest").val();
            var conj1 = $("#" + data_ophtal + "_conj1").val();
            var conj2 = $("#" + data_ophtal + "_conj2").val();
            var cornea1 = $("#" + data_ophtal + "_cornea1").val();
            var cornea2 = $("#" + data_ophtal + "_cornea2").val();
            var pup1 = $("#" + data_ophtal + "_pup1").val();
            var pup2 = $("#" + data_ophtal + "_pup2").val();
            var crist1 = $("#" + data_ophtal + "_crist1").val();
            var crist2 = $("#" + data_ophtal + "_crist2").val();
            var vitreo1 = $("#" + data_ophtal + "_vitreo1").val();
            var vitreo2 = $("#" + data_ophtal + "_vitreo2").val();
            var fondos1 = $("#" + data_ophtal + "_fondos1").val();
            var fondos2 = $("#" + data_ophtal + "_fondos2").val();
            var base64ImageOyos = $("#" + data_ophtal + "_drawEyesImage canvas").get(0).toDataURL();
            $("#saveDrawEyesImage").val(base64ImageOyos);


            var base64ImageFondos = $("#" + data_ophtal + "_drawFondoImage canvas").get(0).toDataURL();
			var radio=$("#ophtalmology-form-radio").val(); 
			var select=$("#ophtalmology-form-select").val();
			var text=$("#ophtalmology-form-text").val();
            $("#saveDrawFondosImage").val(base64ImageFondos);


					$.ajax({
					type: "POST",
					url: "<?=base_url('ophtalmology/saveOphtalmology')?>",
					data: {
					od_sin_con: od_sin_con,
                    od_con_cor: od_con_cor,
                    od_mas_o_meno: od_mas_o_meno,
                    od_cor_act: od_cor_act,
                    os_sin_con: os_sin_con,
                    os_con_cor: os_con_cor,
                    os_mas_o_meno: os_mas_o_meno,
                    os_cor_act: os_cor_act,
                    retine1: retine1,
                    retine2: retine2,
                    retine3: retine3,
                    retine4: retine4,
                    retine5: retine5,
                    retine6: retine6,
                    retine7: retine7,
                    retine8: retine8,
                    saveDrawEyesImage: $("#saveDrawEyesImage").val(),
                    saveDrawEyesFondos: $("#saveDrawFondosImage").val(),
                    // canvasData2: canvasData2,
                    ppm: ppm,
                    converg: converg,
                    ducvers: ducvers,
                    convertest: convertest,
                    notaof: notaof,
                    masomenos1: masomenos1,
                    masomenos2: masomenos2,
                    masomenos3: masomenos3,
                    masomenos4: masomenos4,
                    masomenos5: masomenos5,
                    masomenos6: masomenos6,
                    masomenos7: masomenos7,
                    masomenos8: masomenos8,
                    conj1: conj1,
                    conj2: conj2,
                    cornea1: cornea1,
                    cornea2: cornea2,
                    pup1: pup1,
                    pup2: pup2,
                    crist1: crist1,
                    crist2: crist2,
                    vitreo1: vitreo1,
                    vitreo2: vitreo2,
                    fondos1: fondos1,
                    fondos2: fondos2,
                    id: id_ophtal,
					radio:radio,
					select:select,
					text:text
                   
                   },

				success:function(data){
						 showalert(data, "alert-success", "alert_placeholder_exam_oph");
						   $('#saveEditOph').prop("disabled", false);	
				},
  
  
});
 

		
	}
		
		
   
   
   
  	function saveEnfermedadActualConclusionDiagCirujanoVas(enfermedad_data_surg_vas, id_con_diag) {
			
	  var cir_vas_dol = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_dol]:checked').each(function() {
                cir_vas_dol.push(this.value);
            });

            var cir_vas_edema = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_edema]:checked').each(function() {
                cir_vas_edema.push(this.value);
            });
            var cir_vas_pesadez = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_pesadez]:checked').each(function() {
                cir_vas_pesadez.push(this.value);
            });
            var cir_vas_cansancio = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_cansancio]:checked').each(function() {
                cir_vas_cansancio.push(this.value);
            });
            var cir_vas_quemazo = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_quemazo]:checked').each(function() {
                cir_vas_quemazo.push(this.value);
            });
            var cir_vas_calambred = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_calambred]:checked').each(function() {
                cir_vas_calambred.push(this.value);
            });
            var cir_vas_purito = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_purito]:checked').each(function() {
                cir_vas_purito.push(this.value);
            });
            var cir_vas_hiper = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_hiper]:checked').each(function() {
                cir_vas_hiper.push(this.value);
            });
            var cir_vas_ulceras = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_ulceras]:checked').each(function() {
                cir_vas_ulceras.push(this.value);
            });
            var cir_vas_pares = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_pares]:checked').each(function() {
                cir_vas_pares.push(this.value);
            });
            var cir_vas_claud = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_claud]:checked').each(function() {
                cir_vas_claud.push(this.value);
            });
            var cir_vas_necrosis = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_necrosis]:checked').each(function() {
                cir_vas_necrosis.push(this.value);
            });

            var cir_vas_otros = $("#" + enfermedad_data_surg_vas + "_cir_vas_otros").val();
            var cir_vas_cirugias = $("#" + enfermedad_data_surg_vas + "_cir_vas_cirugias").val();
            var cir_vas_alergias = $("#" + enfermedad_data_surg_vas + "_cir_vas_alergias").val();
            var cir_vas_enf_sis = $("#" + enfermedad_data_surg_vas + "_cir_vas_enf_sis").val();
            var cir_vas_habitos = $("#" + enfermedad_data_surg_vas + "_cir_vas_habitos").val();
            var cir_vas_exam_fis_dir = $("#" + enfermedad_data_surg_vas + "_cir_vas_exam_fis_dir").val();
            var cir_vas_historial = $("#" + enfermedad_data_surg_vas + "_cir_vas_historial").val();


            var base64Diag = $("#" + enfermedad_data_surg_vas + "_drawDiagramsVs canvas").get(0).toDataURL();

            $("#saveDiagramsVs").val(base64Diag);
		
		
			var floatingDiagPrDef = $("#floatingDiagPrDef-" + id_con_diag).val();
		var floatingDiagOtros = $("#floatingDiagOtros-" + id_con_diag).val();
		var con_dia_plan = $("#con_dia_plan-" + id_con_diag).val();
		var floatingProcedimiento = $("#floatingProcedimiento-" + id_con_diag).val();
		
		var checkbox=$("#cirujano-vas-checkbox").val();
		var text=$("#cirujano-vas-inputs").val();
		
		
		  $.ajax({
        type: "POST",
		 url: "<?= base_url()?>saveHistorialForms/saveEnfermedadActualConclusionDiagCirujanoVas",
        data: { 
		      cir_vas_dol: cir_vas_dol,
                    cir_vas_edema: cir_vas_edema,
                    cir_vas_pesadez: cir_vas_pesadez,
                    cir_vas_cansancio: cir_vas_cansancio,
                    cir_vas_quemazo: cir_vas_quemazo,
                    cir_vas_calambred: cir_vas_calambred,
                    cir_vas_purito: cir_vas_purito,
                    cir_vas_hiper: cir_vas_hiper,
                    cir_vas_ulceras: cir_vas_ulceras,
                    cir_vas_pares: cir_vas_pares,
                    cir_vas_claud: cir_vas_claud,
                    cir_vas_necrosis: cir_vas_necrosis,
                    cir_vas_historial: cir_vas_historial,
                    cir_vas_otros: cir_vas_otros,
                    cir_vas_cirugias: cir_vas_cirugias,
                    cir_vas_alergias: cir_vas_alergias,
                    cir_vas_enf_sis: cir_vas_enf_sis,
                    cir_vas_habitos: cir_vas_habitos,
                    cir_vas_exam_fis_dir: cir_vas_exam_fis_dir,
                    diagrama_cirugia_vascular: $("#saveDiagramsVs").val(),
					floatingDiagPrDef: floatingDiagPrDef,
					floatingDiagOtros: floatingDiagOtros,
					con_dia_plan: con_dia_plan,
					floatingProcedimiento: floatingProcedimiento,
					checkboxCirujanoVas:checkbox,
					textCirujanoVas:text
		  
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
          pressBtnHist(response);

        },
		   error: function(jqXHR, textStatus, errorThrown) {
          alert('An erroroccurred... Look at the console (F2 or Ctrl+Shift+I, Console tab) for more information!');

          $('#result-error').html('<p>statuscode: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
		  })
		
		} 
   
   
   function updateEnfActCirujanoVas(enfermedad_data_surg_vas, id_enf_act) {
			
	  var cir_vas_dol = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_dol]:checked').each(function() {
                cir_vas_dol.push(this.value);
            });

            var cir_vas_edema = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_edema]:checked').each(function() {
                cir_vas_edema.push(this.value);
            });
            var cir_vas_pesadez = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_pesadez]:checked').each(function() {
                cir_vas_pesadez.push(this.value);
            });
            var cir_vas_cansancio = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_cansancio]:checked').each(function() {
                cir_vas_cansancio.push(this.value);
            });
            var cir_vas_quemazo = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_quemazo]:checked').each(function() {
                cir_vas_quemazo.push(this.value);
            });
            var cir_vas_calambred = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_calambred]:checked').each(function() {
                cir_vas_calambred.push(this.value);
            });
            var cir_vas_purito = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_purito]:checked').each(function() {
                cir_vas_purito.push(this.value);
            });
            var cir_vas_hiper = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_hiper]:checked').each(function() {
                cir_vas_hiper.push(this.value);
            });
            var cir_vas_ulceras = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_ulceras]:checked').each(function() {
                cir_vas_ulceras.push(this.value);
            });
            var cir_vas_pares = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_pares]:checked').each(function() {
                cir_vas_pares.push(this.value);
            });
            var cir_vas_claud = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_claud]:checked').each(function() {
                cir_vas_claud.push(this.value);
            });
            var cir_vas_necrosis = [];
            $('input[name=' + enfermedad_data_surg_vas + '_cir_vas_necrosis]:checked').each(function() {
                cir_vas_necrosis.push(this.value);
            });

            var cir_vas_otros = $("#" + enfermedad_data_surg_vas + "_cir_vas_otros").val();
            var cir_vas_cirugias = $("#" + enfermedad_data_surg_vas + "_cir_vas_cirugias").val();
            var cir_vas_alergias = $("#" + enfermedad_data_surg_vas + "_cir_vas_alergias").val();
            var cir_vas_enf_sis = $("#" + enfermedad_data_surg_vas + "_cir_vas_enf_sis").val();
            var cir_vas_habitos = $("#" + enfermedad_data_surg_vas + "_cir_vas_habitos").val();
            var cir_vas_exam_fis_dir = $("#" + enfermedad_data_surg_vas + "_cir_vas_exam_fis_dir").val();
            var cir_vas_historial = $("#" + enfermedad_data_surg_vas + "_cir_vas_historial").val();


            var base64Diag = $("#" + enfermedad_data_surg_vas + "_drawDiagramsVs canvas").get(0).toDataURL();

            $("#saveDiagramsVs").val(base64Diag);
			
		  $.ajax({
        type: "POST",
         url: "<?= base_url()?>vascular_surgeon/saveUpVasSurg",
        data: { 
		            id: id_enf_act,
                    cir_vas_dol: cir_vas_dol,
                    cir_vas_edema: cir_vas_edema,
                    cir_vas_pesadez: cir_vas_pesadez,
                    cir_vas_cansancio: cir_vas_cansancio,
                    cir_vas_quemazo: cir_vas_quemazo,
                    cir_vas_calambred: cir_vas_calambred,
                    cir_vas_purito: cir_vas_purito,
                    cir_vas_hiper: cir_vas_hiper,
                    cir_vas_ulceras: cir_vas_ulceras,
                    cir_vas_pares: cir_vas_pares,
                    cir_vas_claud: cir_vas_claud,
                    cir_vas_necrosis: cir_vas_necrosis,
                    cir_vas_historial: cir_vas_historial,
                    cir_vas_otros: cir_vas_otros,
                    cir_vas_cirugias: cir_vas_cirugias,
                    cir_vas_alergias: cir_vas_alergias,
                    cir_vas_enf_sis: cir_vas_enf_sis,
                    cir_vas_habitos: cir_vas_habitos,
                    cir_vas_exam_fis_dir: cir_vas_exam_fis_dir,
                    diagrama_cirugia_vascular: $("#saveDiagramsVs").val()
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
                 if (response.status == 0) {
               showalert(response.message, "alert-success", "alert_placeholder_surg_vas"); 
           } else {
               showalert(response.message, "alert-danger", "alert_placeholder_surg_vas"); 
           }
       $('#saveEditSurVas').prop("disabled", false);

        }
		  })
		
		}
   
   
   
   

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
	
	// }) 
	</script>