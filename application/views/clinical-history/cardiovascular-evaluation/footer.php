<script>
  $(document).ready(function() {
    $('#signos-vitales-form-inputs').val(1);
    $(document).on('click', '#paginate-eva_cardiovascular-li li', function() {
      $("#paginate-eva_cardiovascular-li li.active").removeClass("active");
      $(this).addClass("active");
      paginateLiForm("#eva_cardiovascular-form", "eva_cardiovascular", this.id);

    })

    $('#resetFormEvaCardio').on('click', function() {
      $('#signo_data').val(0);
      resetForm("paginate-eva_cardiovascular-li", "eva_cardiovascular", "eva_cardiovascular-form");
    })


    var data_eva_cardio = $('#idEvaC').val();



    $('#' + data_eva_cardio + '_card_eva_menor1').change(function() {
      if ($(this).is(":checked")) {

        $("#show-menor").show();
      } else {
        $("#show-menor").hide();
      }

    });

    $('#' + data_eva_cardio + '_card_eva_mayor1').change(function() {
      if ($(this).is(":checked")) {

        $("#show-mayor").show();
      } else {
        $("#show-mayor").hide();
      }

    });
    $('#' + data_eva_cardio + '_card_eva_inter1').change(function() {
      if ($(this).is(":checked")) {

        $("#show-inter").show();
      } else {
        $("#show-inter").hide();
      }

    });



    var hab_tox_data = 0;
    var v_at_data = 0;
    var ant_p_f_data = 0;
    var signo_data = 0;
    var ex_fis_data = 0;




    $('#saveEditEvaCardio').on('click', function(event) {
      event.preventDefault();
      var card_eva_pre_quir = $("#" + data_eva_cardio + "_card_eva_pre_quir").val();

      var card_eva_sin_act = $("#" + data_eva_cardio + "_card_eva_sin_act").val();

      var card_eva_med_act = $("#" + data_eva_cardio + "_card_eva_med_act").val();
      var card_eva_riesgos_ma = $("#" + data_eva_cardio + "_card_eva_riesgos_ma").val();
      var card_eva_rad_to = $("#" + data_eva_cardio + "_card_eva_rad_to").val();
      var card_eva_riesgos_me_txt = $("#" + data_eva_cardio + "_card_eva_riesgos_me_txt").val();
      var card_eva_riesgos_ma_txt = $("#" + data_eva_cardio + "_card_eva_riesgos_ma_txt").val();
      var card_eva_riesgos_int_txt = $("#" + data_eva_cardio + "_card_eva_riesgos_int_txt").val();
      var card_eva_otro = $("#" + data_eva_cardio + "_card_eva_otro").val();
      var card_eva_diag_obs_rec = $("#" + data_eva_cardio + "_card_eva_diag_obs_rec").val();
      var card_eva_electrocar = $("#" + data_eva_cardio + "_card_eva_electrocar").val();
      var card_eva_lab = $("#" + data_eva_cardio + "_card_eva_lab").val();

      var card_eva_riesgos_me = [];

      $('input[name=' + data_eva_cardio + '_card_eva_riesgos_me]:checked').each(function() {
        card_eva_riesgos_me.push(this.value);
      });
      var card_eva_riesgos_ma = [];
      $('input[name=' + data_eva_cardio + '_card_eva_riesgos_ma]:checked').each(function() {
        card_eva_riesgos_ma.push(this.value);
      });
      var card_eva_riesgos_int = [];
      $('input[name=' + data_eva_cardio + '_card_eva_riesgos_int]:checked').each(function() {
        card_eva_riesgos_int.push(this.value);
      });

     // $('#saveEditEvaCardio').prop("disabled", true);
      $.ajax({
        type: "POST",
        url: "<?= base_url('eva_cardiovascular/save') ?>",
        data: {
          card_eva_pre_quir: card_eva_pre_quir,
          card_eva_sin_act: card_eva_sin_act,
          card_eva_med_act: card_eva_med_act,
          card_eva_riesgos_me: card_eva_riesgos_me,
          card_eva_riesgos_ma: card_eva_riesgos_ma,
          card_eva_riesgos_int: card_eva_riesgos_int,
          card_eva_rad_to: card_eva_rad_to,
          card_eva_riesgos_me_txt: card_eva_riesgos_me_txt,
          card_eva_riesgos_ma_txt: card_eva_riesgos_ma_txt,
          card_eva_riesgos_int_txt: card_eva_riesgos_int_txt,
          card_eva_otro: card_eva_otro,
          card_eva_diag_obs_rec: card_eva_diag_obs_rec,
          card_eva_electrocar: card_eva_electrocar,
          card_eva_lab: card_eva_lab,
          eva_cardio: data_eva_cardio,
          eva_card_up_time: $('#eva_card_up_time').val(),
          eva_card_in_time: $('#eva_card_in_time').val(),
          eva_card_in_by: $('#eva_card_in_by').val(),
          eva_card_up_by: $('#eva_card_up_by').val()
        },
        dataType: 'json',
        cache: false,
        success: function(response) {
          if (response.status == 2) {
            showalert(response.message, "alert-danger", "alert_placeholder_eva_cardio");

          } else if (response.status == 1) {
            $('#show-print-eva-cardio').html(response.print_btn);
            $("#id_eva_card").val(response.id_eva_card);

            showalert(response.message, "alert-success", "alert_placeholder_eva_cardio");
          } else {
            showalert(response.message, "alert-danger", "alert_placeholder_eva_cardio");
          }
          $('#saveEditEvaCardio').prop("disabled", false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

          $('#result-error').html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
          console.log('jqXHR:');
          console.log(jqXHR);
          console.log('textStatus:');
          console.log(textStatus);
          console.log('errorThrown:');
          console.log(errorThrown);
        },
      });
      //--WAIT FOR ONE SECOND TO ASSIGN THE EVA CAR ID TO THE INPUT SO THAT THE OTHERS FUNCTIONS CAN 
      //HAVE THIS ID AVAILABLE AND TO GET THEM INSERTED
      setTimeout(function() {
        //THIS CAN OCCUR ONLY WHEN THERE IS INSERTION
       // if ($("#id_eva_card").val() > 0 ) {
          loadPagination("eva_cardiovascular");
		  saveAntPerFam(0, $("#id_eva_card").val());
		  saveHabToxico(0, $("#id_eva_card").val());
		   saveSignoVitales(0, $("#id_eva_card").val());
		    saveExamenFisico(0, $("#id_eva_card").val());
			saveOtherAntAntViolenciaIntraF(0, $("#id_eva_card").val());
          // the third argument 1 means that the form is not from the historial clinica
         /* saveAntPerFam(0, $("#id_eva_card").val(), 'eva_cardio');
          antOTros(0, $("#id_eva_card").val(), "otherAnt", 1);
          saveExamenFisico(0, $("#id_eva_card").val(), 1, 1);
          saveHabToxico(0, $("#id_eva_card").val(), "saveHabToxico", 1);
          saveSignoVitales(0, $("#id_eva_card").val(), 1, 1);*/


        //}
      }, 1000);



    });
	loadPagination("eva_cardiovascular");

  });
</script>