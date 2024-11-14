//---FUNCTION TO SAVE FORMS
var servicio_name_to_show=$("#servicio_name_to_show").val();

$(document).on('click', ".clear-ce10", function(event) {
event.preventDefault();
     $(".floatingDiagPrDef").val("");
});

$(document).on('click', ".btn-add-cie10", function(event) {
event.preventDefault();
     $(".show-otro-diag-on-click").slideDown();
	   $('.floatingDiagOtros').val($('.floatingDiagOtros').val() + $('.search-cie10').val() + ' \n');
	   $('.search-cie10').val('').css("background", "");
	   
})



$('main').on('change keyup keydown', 'input, textarea, select, .quill-text', function (e) {
    $(this).addClass('changed-input');
});
$(window).on('beforeunload', function () {
    if ($('.changed-input').length) {
        return 'You haven\'t saved your changes.';
    }
});

var base_url =$("#base_url").val();
var v_at_data = $("#v_at_data").val();
var id_con_diag = $("#id_con_diag").val();
var hab_tox_data = $("#hab_tox_data").val();
 var id_enf_act = $("#id_enf_act").val();
 var id_oftal =  $("#id_oftal").val();
    var ant_uro_data = $("#ant_uro_per_fam_id").val();
  var signov_data =  $("#id_sig").val();
 
 
 $(document).on('click', '#resetSurVas', function(event) {
     event.preventDefault();
	 loadQuillEnfHistEndoVascular(0);
            var li = "paginate-vascular_surgeon-li";
            var controller = "vascular_surgeon";
            var div = "vascular_surgeon-form";
            resetForm(li, controller, div);
            $("#paginate-vascular_surgeon-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })



 $(document).on('click', '#saveEditSurVas', function(event) {

  event.preventDefault();
			 $('#saveEditSurVas').prop("disabled", true);
			  //saveCanvasEndova();
          updateEnfActCirujanoVas($("#id_enf_act").val());
		 
		  

         });
 
 
 
 function saveGeneralHistory(){
 saveOtherAntAntViolenciaIntraF(0, 0);
saveAntPerFam(0, 0);
saveSospechaAbuseMaltrato(0);
saveHabToxico(0, 0);

}
 
 
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
 function updateEnfActCirujanoVas(endo_vas_id){
		 var cir_vas_dol = [];
            $('input[name=' + endo_vas_id + '_cir_vas_dol]:checked').each(function() {
                cir_vas_dol.push(this.value);
            });

            var cir_vas_edema = [];
            $('input[name=' + endo_vas_id + '_cir_vas_edema]:checked').each(function() {
                cir_vas_edema.push(this.value);
            });
            var cir_vas_pesadez = [];
            $('input[name=' + endo_vas_id + '_cir_vas_pesadez]:checked').each(function() {
                cir_vas_pesadez.push(this.value);
            });
            var cir_vas_cansancio = [];
            $('input[name=' + endo_vas_id + '_cir_vas_cansancio]:checked').each(function() {
                cir_vas_cansancio.push(this.value);
            });
            var cir_vas_quemazo = [];
            $('input[name=' + endo_vas_id + '_cir_vas_quemazo]:checked').each(function() {
                cir_vas_quemazo.push(this.value);
            });
            var cir_vas_calambred = [];
            $('input[name=' + endo_vas_id + '_cir_vas_calambred]:checked').each(function() {
                cir_vas_calambred.push(this.value);
            });
            var cir_vas_purito = [];
            $('input[name=' + endo_vas_id + '_cir_vas_purito]:checked').each(function() {
                cir_vas_purito.push(this.value);
            });
            var cir_vas_hiper = [];
            $('input[name=' + endo_vas_id + '_cir_vas_hiper]:checked').each(function() {
                cir_vas_hiper.push(this.value);
            });
            var cir_vas_ulceras = [];
            $('input[name=' + endo_vas_id + '_cir_vas_ulceras]:checked').each(function() {
                cir_vas_ulceras.push(this.value);
            });
            var cir_vas_pares = [];
            $('input[name=' + endo_vas_id + '_cir_vas_pares]:checked').each(function() {
                cir_vas_pares.push(this.value);
            });
            var cir_vas_claud = [];
            $('input[name=' + endo_vas_id + '_cir_vas_claud]:checked').each(function() {
                cir_vas_claud.push(this.value);
            });
            var cir_vas_necrosis = [];
            $('input[name=' + endo_vas_id + '_cir_vas_necrosis]:checked').each(function() {
                cir_vas_necrosis.push(this.value);
            });

            var cir_vas_otros = $("#" + endo_vas_id + "_cir_vas_otros").val();
		
		  var enf_historia = quillEnfEndVasHist.root.innerHTML;
	       var is_historia_empty = quillEnfEndVasHist.root.innerText;
	  
		 
		
		  $.ajax({
        type: "POST",
         url: base_url+"vascular_surgeon/saveUpVasSurg",
        data: { 
		            enf_historia: enf_historia,
		           is_historia_empty:is_historia_empty,
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
                    cir_vas_otros: cir_vas_otros,
					saveDrawCanEndo: $("#inpuImgSaveToDatabaseEndV").val(),
					id:endo_vas_id
                  
		  
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
 
 
 
 
 
 
 
 
 
 
 
 $(document).on('change', '#cirujano-vas-forms', function(event) {
 var countCheckedRadio = $('#cirujano-vas-forms input[type="checkbox"]').filter(':checked').length;
$("#cirujano-vas-checkbox").val(countCheckedRadio);
var txtarea = $("textarea.txt-ares-ciruv").filter(function(){ return $(this).val(); }).length;
var txtinput= $("input.txt-inp-ciruv").filter(function(){ return $(this).val(); }).length;
if(txtinput==0 && txtarea==0){
				 $("#cirujano-vas-inputs").val(0);
			}else{
				$("#cirujano-vas-inputs").val(1);
			}
        });
 

 $('#v-pills-patDocumentos-tab').on('click', function(e) {
   e.preventDefault();
 
listFolders();
   
 });
 
 	
		
				$("#paginate-enf-li li").click(function() {
			$(".spinner-border").show();
			
			var display_content = "#enfermedad-actual-form";
			var controller = "enfermedad_actual";
			var pageNum = this.id;
			
			
			loadQuillEditEnfSinopsis(pageNum);
			$("#paginate-enf-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
			
		});
		
		
		
		$(document).on('click', '#btnSpeechEnfSig', function(event) {

		speakEnfSino(0);
	});


	$(document).on('click', '#btnSpeechEnfEst', function(event) {

		speakEnfEst(0);
	});
	
	
	$(document).on('click', '#btnSpeechEnfLab', function(event) {

		speakEnfLab(0);
	});
	
	$(document).on('click', '#btnSpeechOftal1', function(event) {

		speakOftalNote(0);
	});


	$(document).on('click', '#btnSpeechConDiagPlan', function(event) {

		speakCondiagPlan(0);
	});
	
	
		$(document).on('click', '#btnSpeechConDiagProced', function(event) {

		speakCondiagProcedimientos(0);
	});
	
	function speakCondiagPlan(id_enf_act){

					var output = document.getElementById("quill-editor-condiag_plan_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechConDiagPlan");
					
					runSpeechRecognition(quillCondPlan,output,action);
					
}
	
		function speakCondiagProcedimientos(id_enf_act){

					var output = document.getElementById("quill-editor-condiag_proced_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechConDiagProced");
					
					runSpeechRecognition(quillCondProced,output,action);
					
}
	
	

function speakEnfSino(id_enf_act){

					var output = document.getElementById("quill-editor-enfermedad-actual-sinopsis_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechEnfSig");
					
					runSpeechRecognition(quillEnfSig,output,action);
					
}


function speakEnfEst(id_enf_act){

					var output = document.getElementById("quill-editor-enfermedad-actual-estudios_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechEnfEst");
					
					runSpeechRecognition(quillEnfEstudios,output,action);
					
}
		
		
		
function speakEnfLab(id_enf_act){

					var output = document.getElementById("quill-editor-enfermedad-actual-laboratorio_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechEnfLab");
					
					runSpeechRecognition(quillEnfLaboratorio,output,action);
					
}		
		
		
		
	function speakOftalNote(id_enf_act){

					var output = document.getElementById("quill-editor-oftalmologia_note_"+id_enf_act);
					// get action element reference
					var action = document.getElementById("actionSpeechOftal1");
					
					runSpeechRecognition(quillOftalmologyNote,output,action);
					
}		
		
		
		
		
		
		
		$(document).on('click', '#resetFormEnfAct', function(event) {
			
loadQuillEditEnfSinopsis(0);

		event.preventDefault();
		var li = "paginate-enf-li";
		var controller = "enfermedad_actual";
		var div ="enfermedad-actual-form";
		resetForm(li,controller,div);
		}); 




	$(document).on('click', '#paginate-ophtalmology-li li', function() {

			var display_content = "#ophtalmology-form";
			var controller = "ophtalmology";
			var pageNum = this.id;
			$("#paginate-ophtalmology-li li.active").removeClass("active");
			$(this).addClass("active");
     loadQuillEditOftalNota(pageNum);
			paginateLiForm(display_content, controller, pageNum);


		});

	$(document).on('click', '#paginate-signovitales-li li', function() {

			var display_content = "#signo-vitales-form";
			var controller = "signos_vitales";
			var pageNum = this.id;
			$("#paginate-signovitales-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
			calculateFrequency();
			calculateFrequencyCardia();
			calculateFrequencyTemp()
			calculateFrequencySist();
			calculateFrequencyDiast();
			 
		});
		
		
		
		
		$(document).on('click', "#paginate-uro-exam-fis-li li", function() {
		var display_content = "#uro-exam-fis-form";
			var controller = "urology";
			var pageNum = this.id;
			$("#paginate-uro-exam-fis-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});
		
		
		
		
		
		
		
		
		$(document).on('click', '#paginate-condiag-li li', function() {
			
			var display_content = "#conclusion-diag-form";
			var controller = "conclusion_diagno";
			var pageNum = this.id;
			$("#paginate-condiag-li li.active").removeClass("active");
			$(this).addClass("active");
			loadQuillEditCondiag(pageNum);
			paginateLiForm(display_content, controller, pageNum);
		});

		
//$(document).on('click', "#quill-editor-enfermedad-actual-sinopsis_"+id_enf_act, function() {
    //if (!$(this).hasClass('ql-container')) {
		//$("#btnSpeechEnfSig").prop("disabled", false);
      // var quillEnfSig = new Quill($("#quill-editor-enfermedad-actual-sinopsis_"+$("#id_enf_act").val()).get(0), 
		//optionsQuillEditor,
		//);
        //quillEnfSig.focus()
    //}
//});

 function sweetalert2HisSucess() {
      //Swal.fire({
       // title: '<strong>Datos han sido guadado con éxito</strong>',
        //icon: 'success',
     // })
	 $('#main input, #main textarea, #main select, .quill-text').removeClass('changed-input'); 
	  window.location.href = base_url+"clinical_history/patient_history_has_been_saved_/" + $("#id_patient_hist").val() + '/' + $("#id_centro_to_save").val();
	  
    }
 
 // CALL THIS FUNCTION IF FIELDS ARE REQUIRED
    function callSweetalert2Required(response) {
      Swal.fire({
        icon: 'error',
        title: 'Campos Obligatorios',
        html: '<p style="color:red">' + response.message + '</p>',
        timer: 5000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      });
    }

    function pressBtnHist(response) {

      if (response.status == 1) {
        $(".search-enf-act").focus();
        //$("#enf_motivo").focus();
        callSweetalert2Required(response);

        $(".enfermedad-menu").addClass("fa fa-asterisk").css('color', 'red');

      } else if (response.status == 2) {
        //$("#enf_signopsis").focus();
        callSweetalert2Required(response);
        $(".enfermedad-menu").addClass("fa fa-asterisk").css('color', 'red');

      } else if (response.status == 3) {
        //$("#floatingDiagOtros-" + con_data).focus();
        callSweetalert2Required(response);
        $(".conclusion-menu").addClass("fa fa-asterisk").css('color', 'red');
      } else if (response.status == 4) {
        //$("#con_dia_plan").focus();
        callSweetalert2Required(response);
        $(".conclusion-menu").addClass("fa fa-asterisk").css('color', 'red');
      } else if(response.status == 6) {
        $('#btnSaveHist').html('guardado').prop("disabled", true);
		$('#keepOnSavingOption').val(response.status);
		   saveGeneralHistory();
	     saveExamenFisicoData(0, 0);
         saveSignoVitalesData(0, 0); 
	      saveExamenSistema(0);
		  //--GINECOLY----
		  
		  
		  var isGinecoloy = servicio_name_to_show.includes("GINECO");
		 if(isGinecoloy){
	     saveSSR(0);
		   saveOBS(0);
      }
		   
		//---UROLOGY-----------------------
		
		 var isUrology= servicio_name_to_show.includes("UROLOGIA");
		 if(isUrology){
	       saveUrologyAntPerFam(0);
		 saveUroExamFis(0);
		 }
		
		
		var isPediatry= servicio_name_to_show.includes("PEDIATR");
		 if(isPediatry){
	       saveUpdatePediatry(0);
		  saveUpdateVacunacion(0);
		 }
		
		/*var isOftalmology= servicio_name_to_show.includes("OFTALMOLOGIA");
		 if(isOftalmology){
	      saveOphtalmology(0);
		 }*/
		
		
		 console.log('set keepOnSavingOption to 1');
		 sweetalert2HisSucess();
		
		
		/* 
      setTimeout(function() {
      // window.location.href = base_url+$("#USER_CONTROLLER").val()+"/appointments/";
	   location.reload(true);
        }, 1000);*/
console.log(response.status);

      }else{
		  $("#btnSaveHist").html('<em>guardar</em>').prop("disabled", false);
		$('#result-error').html(response.message); 
	  }
    }


	
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


     $(document).on('click', '#saveEditIntraFam', function(event) {
event.preventDefault();

$('#saveEditIntraFam').prop("disabled", true);  
saveOtherAntAntViolenciaIntraF($("#id_intf").val(), $("#id_eva_card").val());
});
	   
$(document).on('click', '#saveNewContPrena', function(event) {
event.preventDefault();

saveNewControlPrenatal('saveNewContPrena');
  setTimeout(function() {
           reloadControlPrenatal();
		   }, 2000);
		   
		$('#reloadNewPregBtn').html("");   

});


$(document).on('click', '#saveNewContPrenaAgain', function(event) {
event.preventDefault();

saveNewControlPrenatal('saveNewContPrenaAgain');
var display_content = "#control-prenatal-form";
var controller = "control_prenatal";
var pageNum = $(".con_pren_id_registro").val();
$("#paginate-control-prenatal-li li.active").removeClass("active");
$(this).addClass("active");
paginateLiForm(display_content, controller, pageNum);
$('#reloadNewPregBtn').html(""); 
});


$(document).on('click', '#saveChangedCp', function(event) {
event.preventDefault();

saveUpdateControlPrenatal(0);
});

function saveNewControlPrenatal(controllerFunction) {


      var fecha = $("#cp_fecha").val();
      

      var semana = $("#cp_semana").val();

      var peso = $("#cp_peso").val();
      var tension_art_max = $("#cp_tension_art_max").val();
	  
      var tension_art_min = $("#cp_tension_art_min").val();
	  
      var alt_ult = $("#cp_alt_ult").val();
      var pubis_f = $("#cp_pubis_f").val();
      var pelv_tr = $("#cp_pelv_tr").val();
      var lat_min = $("#cp_lat_min").val();

      var mov_fet = $("#cp_mov_fet").val();
      var edema = $("#cp_edema").val();

      var varices = $("#cp_varices").val();
      var otro = $("#cp_otro").val();
      var evolution = $("#cp_evolution").val();

   $.ajax({
        type: "POST",
        url: base_url+"control_prenatal/"+controllerFunction,
        data: {
         fecha: fecha,
          semana: semana,
          peso: peso,
          tension_art_max: tension_art_max,
          tension_art_min: tension_art_min,
          alt_ult: alt_ult,
          pubis_f: pubis_f,
          pelv_tr: pelv_tr,
          lat_min: lat_min,
          mov_fet: mov_fet,
          edema: edema,
          varices: varices,
          otro: otro,
          evolution: evolution,
		  has_value: $("#doesContPrFomHsData").val(),
		  id_registro:$(".con_pren_id_registro").val()

        },
		
        success: function(data) {

          showalert(data, "alert-success", "alert_placeholder_control_prena");
		  //$('#alert_placeholder_control_prena').html(data);

          $('#saveNewContPrena').prop("disabled", true);
		  
        },
       
      });
    }
	
	
	
	
	 function saveUpdateControlPrenatal(con_pren_data) {
 var id_cont_prena = [];
      $('.' + con_pren_data + '_id_cont_prena').each(function() {
        id_cont_prena.push($(this).val());
      })


      var fecha = [];
      $('.' + con_pren_data + '_cp_fecha').each(function() {
        fecha.push($(this).val());
      });

      var semana = [];
      $('.' + con_pren_data + '_cp_semana').each(function() {
        semana.push($(this).val());
      });

      var peso = [];
      $('.' + con_pren_data + '_cp_peso').each(function() {
        peso.push($(this).val());
      });
      var tension_art_max = [];
      $('.' + con_pren_data + '_cp_tension_art_max').each(function() {
        tension_art_max.push($(this).val());
      });
      var tension_art_min = [];
      $('.' + con_pren_data + '_cp_tension_art_min').each(function() {
        tension_art_min.push($(this).val());
      });
      var alt_ult = [];
      $('.' + con_pren_data + '_cp_alt_ult').each(function() {
        alt_ult.push($(this).val());
      });
      var pubis_f = [];
      $('.' + con_pren_data + '_cp_pubis_f').each(function() {
        pubis_f.push($(this).val());
      });
      var pelv_tr = [];
      $('.' + con_pren_data + '_cp_pelv_tr').each(function() {
        pelv_tr.push($(this).val());
      });
      var lat_min = [];
      $('.' + con_pren_data + '_cp_lat_min').each(function() {
        lat_min.push($(this).val());
      });

      var mov_fet = [];
      $('.' + con_pren_data + '_cp_mov_fet').each(function() {
        mov_fet.push($(this).val());
      });
      var edema = [];
      $('.' + con_pren_data + '_cp_edema').each(function() {
        edema.push($(this).val());
      });

      var varices = [];
      $('.' + con_pren_data + '_cp_varices').each(function() {
        varices.push($(this).val());
      });
      var otro = [];
      $('.' + con_pren_data + '_cp_otro').each(function() {
        otro.push($(this).val());
      });
      var evolution = [];
      $('.' + con_pren_data + '_cp_evolution').each(function() {
        evolution.push($(this).val());
      });

      var position = [];
      $('.position-cont-pren').each(function() {
        position.push($(this).val());
      });
      $('#saveEditContPrena').prop("disabled", true);
      $.ajax({
        type: "POST",
        url: base_url+"control_prenatal/saveControlUpCprenatal",
        data: {
          position: position,
          fecha: fecha,
          semana: semana,
          peso: peso,
          tension_art_max: tension_art_max,
          tension_art_min: tension_art_min,
          alt_ult: alt_ult,
          pubis_f: pubis_f,
          pelv_tr: pelv_tr,
          lat_min: lat_min,
          mov_fet: mov_fet,
          edema: edema,
          varices: varices,
          otro: otro,
          evolution: evolution,
		  con_pren_data:con_pren_data,
          has_value: $("#doesContPrFomHsData").val(),
		 id_registro:$(".con_pren_id_registro").val(),
		 id_cont_prena: id_cont_prena,

        },
        success: function(data) {

          showalert(data, "alert-success", "alert_placeholder_control_prena");

          $('#saveEditContPrena').prop("disabled", false);
		 
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
    }
	
	
	function reloadControlPrenatal(){
		
		    $.ajax({
        type: "POST",
        url: base_url+"control_prenatal/reloadControlPrenatal",
        data: {
      

        },
        success: function(data) {

          $('#reload-control-prenatal').html(data);
		
        },
       
      });
	}
	
	

	  
	  
	  $(document).on('click', '#paginate-control-prenatal-li li', function() {
	 	var display_content = "#control-prenatal-form";
			var controller = "control_prenatal";
			var pageNum = this.id;
			$("#paginate-control-prenatal-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
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


 $('#' + $('#id_hab_tx').val() + 'hab_t_drug').on('change', function() {

      $('#' + $('#id_hab_tx').val() + 'drug_list').val($('#' + $('#id_hab_tx').val() + 'drug_list').val() + $(this).val() + ', ');


    });


	
  function saveSignoVitalesData(signov_data, eva_cardio) {
      //--SIGNOS VITALES
	
      var signo_v_fr = $('#' + signov_data + '_signo_v_fr').val();

      var signo_v_fc = $('#' + signov_data + '_signo_v_fc').val();
      var signo_v_temp = $('#' + signov_data + '_signo_v_temp').val();
      var signo_v_ta_mm = $('#' + signov_data + '_signo_v_ta_mm').val();
      var signo_v_ta_hg = $('#' + signov_data + '_signo_v_ta_hg').val();
      var signo_v_peso_lb = $('#' + signov_data + '_signo_v_peso_lb').val();
      var signo_v_peso_kg = $('#' + signov_data + '_signo_v_peso_kg').val();
      var signo_v_talla = $('#' + signov_data + '_signo_v_talla').val();
      var signo_v_talla_m = $('#' + signov_data + '_signo_v_talla_m').val();
      var signo_v_talla_imc = $('#' + signov_data + '_signo_v_talla_imc').val();
      var signo_v_pulso = $('#' + signov_data + '_signo_v_pulso').val();
      var signo_v_glicemia = $('#' + signov_data + '_signo_v_glicemia').val();
      var signo_v_per_cef = $('#' + signov_data + '_signo_v_per_cef').val();
      var signo_v_sat_ox = $('#' + signov_data + '_signo_v_sat_ox').val();
      //-SIGNOS VITALES RESULTADOS
         var form_inputs = $('#signos-vitales-form-inputs').val();
		 
      var signo_fr_result = $('#' + signov_data + '_signo_fr_result').html();
      var signo_fc_result = $('#' + signov_data + '_signo_fc_result').html();
      var signo_temp_result = $('#' + signov_data + '_signo_temp_result').html();
      var tens_art_sis_result = $('#' + signov_data + '_tens_art_sis_result').html();
      var tens_art_dias_result = $('#' + signov_data + '_tens_art_dias_result').html();
      var glicemia_rslt = $("." + signov_data + "_glicemia").html();
	 
      $.ajax({
        type: "POST",
		 url: base_url+"saveHistorialForms/saveSignosVitales",
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
          id: signov_data,
		 eva_cardio:eva_cardio,
		  form_inputs:form_inputs,
		  

        },
		 success: function(data) {
                         showalert(data, "alert-success", "successEditSigVit");
                       $('#saveEditSigVit').prop("disabled", false);
                    },
					 error: function(jqXHR, textStatus, errorThrown) {
		alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
		$('#successEditSigVit').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
		console.log('jqXHR:');
		console.log(jqXHR);
		console.log('textStatus:');
		console.log(textStatus);
		console.log('errorThrown:');
		console.log(errorThrown);
},
      })

    }
	
	
	
	
	
		function updateEnfAct(id_enf_act) {
			
	  var enf_motivo = $("#" + id_enf_act + "_enf_motivo").val();
         var enf_signopsis = quillEnfSig.root.innerHTML;
	    var is_sinopsis_empty = quillEnfSig.root.innerText;
      var enf_laboratorios = quillEnfLaboratorio.root.innerHTML;
      var enf_estudios = quillEnfEstudios.root.innerHTML;
		
		  $.ajax({
        type: "POST",
         url: base_url+"enfermedad_actual/updateEnfAct",
        data: { 
		    enf_motivo: enf_motivo,
          enf_signopsis: enf_signopsis,
		  is_sinopsis_empty:is_sinopsis_empty,
          enf_laboratorios: enf_laboratorios,
          enf_estudios: enf_estudios,
		    id:id_enf_act
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
		var con_dia_plan = quillCondPlan.root.innerHTML;
		 var isPlanEmpry = quillCondPlan.root.innerText;
		 
		var floatingProcedimiento = quillCondProced.root.innerHTML;
		
		var cie10Id = [];

			$(".cie10Id").each(function(){
			cie10Id.push($(this).val());
			});
		 $.ajax({
        type: "POST",
         url: base_url+"conclusion_diagno/updateConDiag",
        data: { 
		   floatingDiagPrDef: floatingDiagPrDef,
          floatingDiagOtros: floatingDiagOtros,
          con_dia_plan: con_dia_plan,
		  isPlanEmpry:isPlanEmpry,
		  cie10Id:cie10Id,
          floatingProcedimiento: floatingProcedimiento,
		   id:id_con_diag,
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
			console.log(response.status);
                 if (response.status == 0) {
               showalert(response.message, "alert-success", "alert_placeholder_cond"); 
           } else {
               showalert(response.message, "alert-danger", "alert_placeholder_cond"); 
           }
       $('#saveEditConDiag').prop("disabled", false);

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
	
	
	


	
	 function saveExamenFisicoData(ex_fis_data, eva_cardio) {
		 var isGinecoloy = servicio_name_to_show.includes("GINECO");
		 if(isGinecoloy){
	      saveCanvasExamenMamas();
		 }
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
	    var form_inputs_ex =$("#exam-fisico-form-inputs").val();
		
		   var neuro_normal = [];
     $('input[name=' + ex_fis_data + '_neuro_normal]:checked').each(function() {
 
            neuro_normal.push(this.value);
 });
 
 
    var cabeza_normal = [];
     $('input[name=' + ex_fis_data + '_cabeza_normal]:checked').each(function() {
 
            cabeza_normal.push(this.value);
 });
 
 
    var cuello_normal = [];
     $('input[name=' + ex_fis_data + '_cuello_normal]:checked').each(function() {
 
            cuello_normal.push(this.value);
 });
 
 
    var abd_inspex_normal = [];
     $('input[name=' + ex_fis_data + '_abd_inspex_normal]:checked').each(function() {
 
            abd_inspex_normal.push(this.value);
 });
 
 
    var ext_sup_normal = [];
     $('input[name=' + ex_fis_data + '_ext_sup_normal]:checked').each(function() {
 
            ext_sup_normal.push(this.value);
 });
 
 
    var ext_infex_normal = [];
     $('input[name=' + ex_fis_data + '_ext_infex_normal]:checked').each(function() {
 
            ext_infex_normal.push(this.value);
 });
 
 
    var toraxex_normal = [];
     $('input[name=' + ex_fis_data + '_toraxex_normal]:checked').each(function() {
 
            toraxex_normal.push(this.value);
 });
		
		
		

      $.ajax({
        type: "POST", 
        url: base_url+"saveHistorialForms/examenFisico",
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
		 id: ex_fis_data,
		form_inputs:form_inputs_ex,
		image_mamas: $("#finalImgSaveToDatabaseExamMama").val(),
		ifExamenMamasOnce:$("#ifExamenMamasOnce").val(),
		eva_cardio:eva_cardio,
		neuro_normal:neuro_normal,
		cabeza_normal:cabeza_normal,
		cuello_normal:cuello_normal,
		abd_inspex_normal:abd_inspex_normal,
		ext_sup_normal:ext_sup_normal,
		ext_infex_normal:ext_infex_normal,
		toraxex_normal:toraxex_normal,
		 },
      success: function(data) {
		  showalert(data, "alert-success", "alert_placeholder_exam_fis");
           $('#saveEditExamFisico').prop("disabled", false);
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
	
	
	
	 function saveExamenSistema(id_exam_sist) {
		
	  var sisneuro = $("#" + id_exam_sist + "_sisneuros").val();
	 
            var neurologico = $("#" + id_exam_sist + "_neurologicos").val();
            var siscardio = $("#" + id_exam_sist + "_siscardios").val();
            var cardiova = $("#" + id_exam_sist + "_cardiovas").val();
            var sist_uro = $("#" + id_exam_sist + "_sist_uros").val();
            var urogenital = $("#" + id_exam_sist + "_urogenitals").val();
            var sis_mu_e = $("#" + id_exam_sist + "_sis_mu_es").val();
            var musculoes = $("#" + id_exam_sist + "_musculoess").val();
            var sist_resp = $("#" + id_exam_sist + "_sist_resps").val();
            var nervioso = $("#" + id_exam_sist + "_nerviosos").val();
            var linfatico = $("#" + id_exam_sist + "_linfaticos").val();
            var digestivo = $("#" + id_exam_sist + "_digestivos").val();
            var respiratorio = $("#" + id_exam_sist + "_respiratorios").val();
            var genitourinario = $("#" + id_exam_sist + "_genitourinarios").val();
            var sist_diges = $("#" + id_exam_sist + "_sist_digess").val();
            var sist_endo = $("#" + id_exam_sist + "_sist_endos").val();
            var endocrino = $("#" + id_exam_sist + "_endocrinos").val();
            var sist_rela = $("#" + id_exam_sist + "_sist_relas").val();
            var otros_ex_sis = $("#" + id_exam_sist + "_sist_relastext").val();
            var dorsales = $("#" + id_exam_sist + "_dorsaless").val();

            var dorsalesstext = $("#" + id_exam_sist + "_dorsalesstext").val();

            var genitourinariostext = $("#" + id_exam_sist + "_genitourinariostext").val();

            var linfaticotext = $("#" + id_exam_sist + "_linfaticotext").val();

            var nerviosostext = $("#" + id_exam_sist + "_nerviosostext").val();
			 
      $.ajax({
        type: "POST", 
        url: base_url+"saveHistorialForms/saveExamenSistema",
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
					id: id_exam_sist,
					form_inputs:$("#exam-sistema-form-inputs").val()
        },
      success: function(data) {
           showalert(data, "alert-success", "alert_placeholder_exam_sist");
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
	
	
	
	
	
	
		$(document).on('click', "#updatePediatry", function(event) {
  	event.preventDefault();
	$('#updatePediatry').prop("disabled", true);
	saveUpdatePediatry($("#id_pedia").val());
	});
	
	
	function saveUpdatePediatry(id_pedia){

      var evo = $('input:radio[name=' + id_pedia + '_pediatry_evo]:checked').val();
      var evol_text = $("#" + id_pedia + "_pediatry_evo_txt").val();
      var edad_gest = $("#" + id_pedia + "_pediatry_edad_gest").val();

      var lactamat1 = [];

      $('input[name=' + id_pedia + '_pediatry_lactancia]:checked').each(function() {
        lactamat1.push(this.value);
      });


      var leche1 = [];
      $('input[name=' + id_pedia + '_pediatry_milk]:checked').each(function() {
        leche1.push(this.value);
      });

      var otrosinfo = $("#" + id_pedia + "_pediatry_other_food_txt").val();

      var traum = $('input:radio[name=' + id_pedia + '_pediatry_trau_som_ps]:checked').val();
      var traum_text = $("#" + id_pedia + "_pediatry_trau_som_ps_txt").val();
      var trans = $('input:radio[name=' + id_pedia + '_pediatry_transf]:checked').val();

      var moto_grueso = $('input:radio[name=' + id_pedia + '_pediatry_grueso]:checked').val();
      var moto_fino = $('input:radio[name=' + id_pedia + '_pediatry_fino]:checked').val();
      var ped_lang = $('input:radio[name=' + id_pedia + '_pediatry_lenguage]:checked').val();
      var ped_social = $('input:radio[name=' + id_pedia + '_pediatry_social]:checked').val();

      var trans_text = $("#" + id_pedia + "_pediatry_transf_txt").val();
      var tnaci = $('input:radio[name=' + id_pedia + '_pediatry_birth_type]:checked').val();
      var describa = $("#" + id_pedia + "_pediatry_birth_type_txt").val();

      var pesopd = $("#" + id_pedia + "_pediatry_birth_weight_value").val();

      var talla = $("#" + id_pedia + "_pediatry_birth_size_value").val();

      var ale1 = [];
      $('input[name=' + id_pedia + '_pediatry_ale]:checked').each(function() {

        ale1.push(this.value);
      });
      var hep1 = [];
      $('input[name=' + id_pedia + '_pediatry_hep]:checked').each(function() {
        hep1.push(this.value);
      });

      var amig1 = [];
      $('input[name=' + id_pedia + '_pediatry_amig]:checked').each(function() {
        amig1.push(this.value);
      });
      var infv1 = [];
      $('input[name=' + id_pedia + '_pediatry_infv]:checked').each(function() {
        infv1.push(this.value);
      });
      var asm1 = [];
      $('input[name=' + id_pedia + '_pediatry_asm]:checked').each(function() {
        asm1.push(this.value);
      });

      var neum1 = [];
      $('input[name=' + id_pedia + '_pediatry_neum]:checked').each(function() {
        neum1.push(this.value);
      });

      var cirug1 = [];
      $('input[name=' + id_pedia + '_pediatry_cirug]:checked').each(function() {
        cirug1.push(this.value);
      });

      var otot1 = [];
      $('input[name=' + id_pedia + '_pediatry_otot]:checked').each(function() {
        otot1.push(this.value);
      });

      var deng1 = [];
      $('input[name=' + id_pedia + '_pediatry_deng]:checked').each(function() {
        deng1.push(this.value);
      });


      var pape1 = [];
      $('input[name=' + id_pedia + '_pediatry_pape]:checked').each(function() {
        pape1.push(this.value);
      });

      var diar1 = [];
      $('input[name=' + id_pedia + '_pediatry_diar]:checked').each(function() {
        diar1.push(this.value);
      });

      var paras1 = [];
      $('input[name=' + id_pedia + '_pediatry_paras]:checked').each(function() {
        paras1.push(this.value);
      });

      var zika1 = [];
      $('input[name=' + id_pedia + '_pediatry_zika]:checked').each(function() {

        zika1.push(this.value);
      });

      var saram1 = [];
      $('input[name=' + id_pedia + '_pediatry_saram]:checked').each(function() {

        saram1.push(this.value);
      });

      var chicun1 = [];
      $('input[name=' + id_pedia + '_pediatry_chicun]:checked').each(function() {

        chicun1.push(this.value);
      });


      var varicela1 = [];
      $('input[name=' + id_pedia + '_pediatry_varicela]:checked').each(function() {
        varicela1.push(this.value);
      });


      var falc1 = [];
      $('input[name=' + id_pedia + '_pediatry_falc]:checked').each(function() {
        falc1.push(this.value);
      });

      var otros_t_text = $("#" + id_pedia + "_pediatry_pat_otros").val();


      var textgrueso = $("#" + id_pedia + "_pediatry_text_grueso").val();
      var textfino = $("#" + id_pedia + "_pediatry_text_fino").val();
      var textlenguage = $("#" + id_pedia + "_pediatry_text_lenguage").val();
      var textsocial = $("#" + id_pedia + "_pediatry_text_social").val();


     
      
	 var text = $("#pediatry-form-inputs").val();
	  var checkbox = $("#pediatry-form-checkbox").val();
	  var radio = $("#pediatry-form-radio").val();

	        $.ajax({
        type: "POST",
        url: base_url+"saveHistorialForms/saveUpdatePediatry",
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
           text:text,
		  checkbox:checkbox,
		  radio:radio,
		  id_pedia:id_pedia
        },
       
        success: function(data) {
          showalert(data, "alert-success", "successEditPed");
		   $('#updatePediatry').prop("disabled", false);
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
	
	
	
	
	
	
	$(document).on('click', "#saveEditVacuation", function(event) {
  	event.preventDefault();
	$('#saveEditVacuation').prop("disabled", true);

	saveUpdateVacunacion($("#id_pedia_vacuacion").val());
	});
	  //------------------VACUNACION-----------------------
function saveUpdateVacunacion(id_pedia){

     var nacer_fecha1 = $("#" + id_pedia + "_nacer_fecha1").val();
      var nacer_fecha2 = $("#" + id_pedia + "_nacer_fecha2").val();
      var mes2_fecha1 = $("#" + id_pedia + "_mes2_fecha1").val();
      var mes2_fecha2 = $("#" + id_pedia + "_mes2_fecha2").val();
	
      var mes2_fecha3 = $("#" + id_pedia + "_mes2_fecha3").val();
      var mes2_fecha4 = $("#" + id_pedia + "_mes2_fecha4").val();
      var mes4_fecha1 = $("#" + id_pedia + "_mes4_fecha1").val();
      var mes4_fecha2 = $("#" + id_pedia + "_mes4_fecha2").val();
      var mes4_fecha3 = $("#" + id_pedia + "_mes4_fecha3").val();
      var mes4_fecha4 = $("#" + id_pedia + "_mes4_fecha4").val();
      var mes6_fecha1 = $("#" + id_pedia + "_mes6_fecha1").val();
	   
      var mes6_fecha2 = $("#" + id_pedia + "_mes6_fecha2").val();
      var mes12_fecha1 = $("#" + id_pedia + "_mes12_fecha1").val();
      var mes12_fecha2 = $("#" + id_pedia + "_mes12_fecha2").val();
      var mes18_fecha1 = $("#" + id_pedia + "_mes18_fecha1").val();
      var mes18_fecha2 = $("#" + id_pedia + "_mes18_fecha2").val();
      var mes18_fecha3 = $("#" + id_pedia + "_mes18_fecha3").val();
	  
      var year4_fecha1 = $("#" + id_pedia + "_year4_fecha1").val();
      var year4_fecha2 = $("#" + id_pedia + "_year4_fecha2").val();
      var year9_14_fecha1 = $("#" + id_pedia + "_year9_14_fecha1").val();
      var year9_14_mas_fecha1 = $("#" + id_pedia + "_year9_14_mas_fecha1").val();
      var otras_va = $("#" + id_pedia + "_otras_va").val();



      var nacer_chk1 = [];
      $('input[name=' + id_pedia + '_nacer_chk1]:checked').each(function() {
        nacer_chk1.push(this.value);
      });



      var nacer_chk2 = [];
      $('input[name=' + id_pedia + '_nacer_chk2]:checked').each(function() {
        nacer_chk2.push(this.value);
      });




      var mes2_chk1 = [];
      $('input[name=' + id_pedia + '_mes2_chk1]:checked').each(function() {
        mes2_chk1.push(this.value);
      });


      var mes2_chk2 = [];
      $('input[name=' + id_pedia + '_mes2_chk2]:checked').each(function() {
        mes2_chk2.push(this.value);
      });



      var mes2_chk3 = [];

      $('input[name=' + id_pedia + '_mes2_chk3]:checked').each(function() {
        mes2_chk3.push(this.value);
      });


      var mes2_chk4 = [];
      $('input[name=' + id_pedia + '_mes2_chk4]:checked').each(function() {
        mes2_chk4.push(this.value);
      });



      var mes4_chk1 = [];
      $('input[name=' + id_pedia + '_mes4_chk1]:checked').each(function() {
        mes4_chk1.push(this.value);
      });



      var mes4_chk2 = [];
      $('input[name=' + id_pedia + '_mes4_chk2]:checked').each(function() {
        mes4_chk2.push(this.value);
      });

      var mes4_chk3 = [];
      $('input[name=' + id_pedia + '_mes4_chk3]:checked').each(function() {
        mes4_chk3.push(this.value);
      });


      var mes4_chk4 = [];
      $('input[name=' + id_pedia + '_mes4_chk4]:checked').each(function() {
        mes4_chk4.push(this.value);
      });


      var mes6_chk1 = [];
      $('input[name=' + id_pedia + '_mes6_chk1]:checked').each(function() {
        mes6_chk1.push(this.value);
      });

      var mes6_chk2 = [];
      $('input[name=' + id_pedia + '_mes6_chk2]:checked').each(function() {
        mes6_chk2.push(this.value);
      });


      var mes12_chk1 = [];

      $('input[name=' + id_pedia + '_mes12_chk1]:checked').each(function() {
        mes12_chk1.push(this.value);
      })
      var mes12_chk2 = [];

      $('input[name=' + id_pedia + '_mes12_chk2]:checked').each(function() {
        mes12_chk2.push(this.value);
      })


      var mes18_chk1 = [];
      $('input[name=' + id_pedia + '_mes18_chk1]:checked').each(function() {
        mes18_chk1.push(this.value);
      })



      var mes18_chk2 = [];
      $('input[name=' + id_pedia + '_mes18_chk2]:checked').each(function() {
        mes18_chk2.push(this.value);
      })



      var mes18_chk3 = [];
      $('input[name=' + id_pedia + '_mes18_chk3]:checked').each(function() {
        mes18_chk3.push(this.value);
      })



      var year4_chk1 = [];
      $('input[name=' + id_pedia + '_year4_chk1]:checked').each(function() {
        year4_chk1.push(this.value);
      })



      var year4_chk2 = [];
      $('input[name=' + id_pedia + '_year4_chk2]:checked').each(function() {
        year4_chk2.push(this.value);
      })




      var year9_14_chk1 = [];
      $('input[name=' + id_pedia + '_year9_14_chk1]:checked').each(function() {
        year9_14_chk1.push(this.value);
      })


      var year9_14_mas_chk1 = [];
      $('input[name=' + id_pedia + '_year9_14_mas_chk1]:checked').each(function() {
        year9_14_mas_chk1.push(this.value);
      })

 var chk = $("#vacunation-form-checkbox").val();
	  var input = $("#vacunation-form-inputs").val();

   $.ajax({
        type: "POST",
        url: base_url+"saveHistorialForms/saveUpdateVacunacion",
       data:{
          year9_14_chk1: year9_14_chk1,
          year9_14_mas_chk1: year9_14_mas_chk1,
          year4_chk1: year4_chk1,
          year4_chk2: year4_chk2,
          mes18_chk1: mes18_chk1,
          mes18_chk2: mes18_chk2,
          mes18_chk3: mes18_chk3,
          mes12_chk1: mes12_chk1,
          mes12_chk2: mes12_chk2,
          mes6_chk1: mes6_chk1,
          mes6_chk2: mes6_chk2,
          mes4_chk1: mes4_chk1,
          mes4_chk2: mes4_chk2,
          mes4_chk3: mes4_chk3,
          mes4_chk4: mes4_chk4,
          mes2_chk1: mes2_chk1,
          mes2_chk2: mes2_chk2,
          mes2_chk3: mes2_chk3,
          mes2_chk4: mes2_chk4,
          nacer_chk1: nacer_chk1,
          nacer_chk2: nacer_chk2,
         nacer_fecha1: nacer_fecha1,
          nacer_fecha2: nacer_fecha2,

          mes2_fecha1: mes2_fecha1,
          mes2_fecha2: mes2_fecha2,
          mes2_fecha3: mes2_fecha3,
          mes2_fecha4: mes2_fecha4,

          mes4_fecha1: mes4_fecha1,
          mes4_fecha2: mes4_fecha2,
          mes4_fecha3: mes4_fecha3,
          mes4_fecha4: mes4_fecha4,

          mes6_fecha1: mes6_fecha1,
          mes6_fecha2: mes6_fecha2,

          mes12_fecha1: mes12_fecha1,
          mes12_fecha2: mes12_fecha2,

          mes18_fecha1: mes18_fecha1,
          mes18_fecha2: mes18_fecha2,

          mes18_fecha3: mes18_fecha3,
          year4_fecha1: year4_fecha1,
          year4_fecha2: year4_fecha2,

          year9_14_fecha1: year9_14_fecha1,

          year9_14_mas_fecha1: year9_14_mas_fecha1,
		  id_pedia:id_pedia,
		  chk:chk,
		  input:input
		   },
       
        success: function(data) {
			
          showalert(data, "alert-success", "successEditVacunation");
		   $('#saveEditVacuation').prop("disabled", false);
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
	
	
	
	
	
	
	
	
	
	
	
	
	function saveSSR(ssr_data){
	  var optradio = $('input:radio[name=' + ssr_data + '_optradio]:checked').val();
      var edad = $("#" + ssr_data + "_edad_ssr").val();
      var sexual = $('input:radio[name=' + ssr_data + '_sexual]:checked').val();
      var numero = $("#" + ssr_data + "_numero").val();
     
      var pareja = $("#" + ssr_data + "_pareja").val();
      var califica_text = $("#" + ssr_data + "_califica_text").val();
      var menarquia = $("#" + ssr_data + "_menarquia").val();
      var planif_text = $("#" + ssr_data + "_planif_text").val();
      var fecha_ul_m = $("#" + ssr_data + "_fecha_ul_m").val();
      var fechaOvulacion = $("#" + ssr_data + "_fecha-ovulacion").html();
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
	 
      var complica = $('input:radio[name=' + ssr_data + '_complicapc_ssr]:checked').val();
      var complica_dur = $('input:radio[name=' + ssr_data + '_complica_dur]:checked').val();
      var infec_tran = $('input:radio[name=' + ssr_data + '_infec_tran]:checked').val();
	  
	   var prueba_vih = $('input:radio[name=' + ssr_data + '_prueba_vih]:checked').val();
	    var prueba_vih_resultado = $("#" + ssr_data + "_prueba_vih_resultado").val();
	  var califica = $("#" + ssr_data + "_califica").val();
     
    //  var utilizo = $('input:radio[name=' + ssr_data + '_utilizo]:checked').val();
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
        url: base_url+"saveHistorialForms/saveSSR",
        data: {
          edad: edad,
          optradio: optradio,
          numero: numero,
          sexual: sexual,
          pareja: pareja,
		   prueba_vih:prueba_vih,
		   prueba_vih_resultado:prueba_vih_resultado,
          califica: califica,
          califica_text: califica_text,
          //utilizo: utilizo,
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
		  id:ssr_data,
		  text:text,
		  radio:radio

        },

      
        success: function(data) {
          showalert(data, "alert-success", "alert_placeholder_ssr");
		   $('#saveEditSsr').prop("disabled", false);
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
	
	
	function saveOBS(obs_data){
		
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

      var fin = $("#obs_" + obs_data + "_fin").val();
      var rn = $("#obs_" + obs_data + "_rn").val();
      var fecha1 = $("#obs_" + obs_data + "_fecha1").val();
 
      var sono1 = $("#obs_" + obs_data + "_sono1").val();
  
      var sonodia1 = $("#obs_" + obs_data + "_sonodia1").val();
    
      var diarest1 = $("#obs_" + obs_data + "_dia-rest1").val();
  
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
      var vdrl = [];

      $('input[name=' + 'obs_' + obs_data + '_vdrl1]:checked').each(function() {
        vdrl.push(this.value);
      });

      var vdr2 = [];
      $('input[name=' + 'obs_' + obs_data + '_vdrl2]:checked').each(function() {
        vdr2.push(this.value);
      });
      var diasmes = $("#obs_" + obs_data + "_diasmes").val();

	   var textC = $("#obs-form-inputs").val();
	   var radioC = $("#obs-form-radio").val();
	     var ckkC = $("#obs-form-chkb").val();
	  
	  	   $.ajax({
        type: "POST",
        url: base_url+"saveHistorialForms/saveOBS",
        data: {
          dia1: dia1,
          tbc1: tbc1,
          hip1: hip1,
          pelv: pelv,
          inf: inf,
          otros1: otros1,
          otros1_text: otros1_text,
          sonodia1: sonodia1,
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
         fin: fin,
          rn: rn,
          fecha1: fecha1,
          sono1: sono1,
           fpp1: fpp1,
         rest1: rest1,
          peso1: peso1,
          talla1: talla1,
          fum_cal_ges: fum_cal_ges,
          fpp_cal_ges: fpp_cal_ges,
          sem_act_a: sem_act_a,
          prev_act: prev_act,
          prev_act_mes: prev_act_mes,
          r2: r2,
          rh: rh,
		  diarest1:diarest1,
          sencibil: sencibil,
          rh_option: rh_option,
          odont: odont,
          pelvis: pelvis,
          papani: papani,
          colp: colp,
          cevix: cevix,
          vdrl: vdrl,
          vdr2: vdr2,
          diasmes: diasmes,
           textC:textC,
		  radioC:radioC,
		  ckkC:ckkC,
		  id:obs_data

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
          showalert(data, "alert-success", "alert_placeholder_obs");
		   $('#saveEditAntObs').prop("disabled", false);
           },


      });
	}
	
	
	function  saveUrologyAntPerFam(ant_uro_data){
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
url: base_url+"saveHistorialForms/saveUrologyAntPerFam",
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
	  id:ant_uro_data

},
  
success:function(data){
showalert(data, "alert-success", "successAntUroPerFam"); 
	$('#saveEditAntUroPerFam').prop("disabled", false);	
} ,
		 error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#showdd-er').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
},  
});
	}		
		
		
	function saveUroExamFis(id_ex_uro){
		saveCanvasUrology();
		var uro_pene = $("#"+id_ex_uro+"_uro_pene").val();
var uro_testicule = $("#"+id_ex_uro+"_uro_testicule").val();	
var uro_epididimos = $("#"+id_ex_uro+"_uro_epididimos").val();
var uro_tato_rec_pros = $("#"+id_ex_uro+"_uro_tato_rec_pros").val();


var uro_geni_mujer = $("#"+id_ex_uro+"_uro_geni_mujer").val();
var uro_vejiga = $("#"+id_ex_uro+"_uro_vejiga").val();
var uro_loins = $("#"+id_ex_uro+"_uro_loins").val();
var uro_otros = $("#"+id_ex_uro+"_uro_otros").val();


  var tacto_rect = [];
 $('input[name='+id_ex_uro+'_tacto_rect_check]:checked').each(function(){
            tacto_rect.push(this.value);
 });
  var textarea = $("#exfisuro-form-inputs").val();
 
  $.ajax({
type: "POST",
url: base_url+"saveHistorialForms/saveExamFisUrologo",
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
  saveDrawImage: $("#inputImgSaveToDatabaseUro").val(),
  isUroDiagram:$("#isUroDiagram").val(),
 id:id_ex_uro,
 textarea: textarea
},

success:function(data){
    showalert(data, "alert-success", "alert_placeholder_exam_uro"); 
           
$('#saveEditExamUro').prop("disabled", false);	
},
     error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#bbb---gg').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
console.log('jqXHR:');
console.log(jqXHR);
console.log('textStatus:');
console.log(textStatus);
console.log('errorThrown:');
console.log(errorThrown);
}, 
  
});
 
 
 
		
	}	
		
		
		
		
		

	function saveOphtalmology(id_ophtal){
		//saveCanvasOftalmologia();
		
		var saveDrawEyesImage;
		var saveDrawEyesFondos;
		if($("#showDrawingToolsOphtal").val()==1){
			saveDrawEyesImage= $("#inputImgSaveToDatabaseOftalOjos").val();
            saveDrawEyesFondos= $("#inpuImgSaveToDatabaseOftalFondos").val();
		saveCanvasOftalmologia();	
		}else{
			saveDrawEyesImage= '';
            saveDrawEyesFondos= '';
		}
		
		
		   var od_con_cor = $("#" + id_ophtal + "_od_con_cor").val();
          var od_sin_con = $("#" + id_ophtal + "_od_sin_con").val();
            var od_mas_o_meno = $('input[name=' + id_ophtal + '_od_mas_o_meno]:checked').val();
            var od_cor_act = $("#" + id_ophtal + "_od_cor_act").val();
            var os_sin_con = $("#" + id_ophtal + "_os_sin_con").val();
            var os_con_cor = $("#" + id_ophtal + "_os_con_cor").val();
            var os_mas_o_meno = $('input[name=' + id_ophtal + '_os_mas_o_meno]:checked').val();
            var os_cor_act = $("#" + id_ophtal + "_os_cor_act").val();
            var updated_by = $("#" + id_ophtal + "_updated_by").val();
           // var notaof = $("#" + id_ophtal + "_not-oftm").val();
		   
		    var notaof = quillOftalmologyNote.root.innerHTML;
		   
            var retine1 = $("#" + id_ophtal + "_retine1").val();
            var retine2 = $("#" + id_ophtal + "_retine2").val();
            var retine3 = $("#" + id_ophtal + "_retine3").val();
            var retine4 = $("#" + id_ophtal + "_retine4").val();
            var retine5 = $("#" + id_ophtal + "_retine5").val();
            var retine6 = $("#" + id_ophtal + "_retine6").val();
            var retine7 = $("#" + id_ophtal + "_retine7").val();
            var retine8 = $("#" + id_ophtal + "_retine8").val();


            var masomenos1 = $('input[name=' + id_ophtal + '_masomenos1]:checked').val();
            var masomenos2 = $('input[name=' + id_ophtal + '_masomenos2]:checked').val();
            var masomenos3 = $('input[name=' + id_ophtal + '_masomenos3]:checked').val();
            var masomenos4 = $('input[name=' + id_ophtal + '_masomenos4]:checked').val();
            var masomenos5 = $('input[name=' + id_ophtal + '_masomenos5]:checked').val();
            var masomenos6 = $('input[name=' + id_ophtal + '_masomenos6]:checked').val();
            var masomenos7 = $('input[name=' + id_ophtal + '_masomenos7]:checked').val();
            var masomenos8 = $('input[name=' + id_ophtal + '_masomenos8]:checked').val();

            var ppm = $("#" + id_ophtal + "_ppm").val();
            var converg = $("#" + id_ophtal + "_converg").val();
            var ducvers = $("#" + id_ophtal + "_ducvers").val();
            var convertest = $("#" + id_ophtal + "_convertest").val();
            var conj1 = $("#" + id_ophtal + "_conj1").val();
            var conj2 = $("#" + id_ophtal + "_conj2").val();
            var cornea1 = $("#" + id_ophtal + "_cornea1").val();
            var cornea2 = $("#" + id_ophtal + "_cornea2").val();
            var pup1 = $("#" + id_ophtal + "_pup1").val();
            var pup2 = $("#" + id_ophtal + "_pup2").val();
            var crist1 = $("#" + id_ophtal + "_crist1").val();
            var crist2 = $("#" + id_ophtal + "_crist2").val();
            var vitreo1 = $("#" + id_ophtal + "_vitreo1").val();
            var vitreo2 = $("#" + id_ophtal + "_vitreo2").val();
            var fondos1 = $("#" + id_ophtal + "_fondos1").val();
            var fondos2 = $("#" + id_ophtal + "_fondos2").val();
         	var radioV=$("#ophtalmology-form-radio").val(); 
			var textV=$("#ophtalmology-form-text").val();
          
				$.ajax({
					type: "POST",
					url: base_url+"saveHistorialForms/saveOphtalmology",
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
                    saveDrawEyesImage: $("#inputImgSaveToDatabaseOftalOjos").val(),
                    saveDrawEyesFondos: $("#inpuImgSaveToDatabaseOftalFondos").val(),
					showDrawingToolsOphtal:$("#showDrawingToolsOphtal").val(),
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
					radioV:radioV,
					textV:textV
                   
                   },

				success:function(data){
						showalert(data, "alert-success", "alert_placeholder_exam_oph");
						
					
						   $('#saveEditOph').prop("disabled", false);	
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
});
 

		
	}
		
		
 
   
   
   
   
     $(document).ready(function(){jQuery("#select_all").on("click",function(e){$(this).is(":checked",!0)?($(".emp_checkbox").prop("checked",!0),$(".check_madre").prop("disabled",!0),$(".check_padre").prop("disabled",!0),$(".check_hnos").prop("disabled",!0),$(".check_pers").prop("disabled",!0),$(".check_madre2").prop("checked",!1),$(".check_padre2").prop("checked",!1),$(".check_hnos2").prop("checked",!1),$(".check_pers2").prop("checked",!1),$(".check_madre2").prop("disabled",!0),$(".check_padre2").prop("disabled",!0),$(".check_hnos2").prop("disabled",!0),$(".check_pers2").prop("disabled",!0),$(".check_madre3").prop("disabled",!0),$(".check_padre3").prop("disabled",!0),$(".check_hnos3").prop("disabled",!0),$(".check_pers3").prop("disabled",!0),$(".check_madre4").prop("checked",!1),$(".check_padre4").prop("checked",!1),$(".check_hnos4").prop("checked",!1),$(".check_pers4").prop("checked",!1),$(".check_madre4").prop("disabled",!0),$(".check_padre4").prop("disabled",!0),$(".check_hnos4").prop("disabled",!0),$(".check_pers4").prop("disabled",!0),$(".check_madre5").prop("checked",!1),$(".check_padre5").prop("checked",!1),$(".check_hnos5").prop("checked",!1),$(".check_pers5").prop("checked",!1),$(".check_madre5").prop("disabled",!0),$(".check_padre5").prop("disabled",!0),$(".check_hnos5").prop("disabled",!0),$(".check_pers5").prop("disabled",!0),$(".check_madre6").prop("checked",!1),$(".check_padre6").prop("checked",!1),$(".check_hnos6").prop("checked",!1),$(".check_pers6").prop("checked",!1),$(".check_madre6").prop("disabled",!0),$(".check_padre6").prop("disabled",!0),$(".check_hnos6").prop("disabled",!0),$(".check_pers6").prop("disabled",!0),$(".check_madre7").prop("checked",!1),$(".check_padre7").prop("checked",!1),$(".check_hnos7").prop("checked",!1),$(".check_pers7").prop("checked",!1),$(".check_madre7").prop("disabled",!0),$(".check_padre7").prop("disabled",!0),$(".check_hnos7").prop("disabled",!0),$(".check_pers7").prop("disabled",!0),$(".check_madre8").prop("disabled",!0),$(".check_padre8").prop("disabled",!0),$(".check_hnos8").prop("disabled",!0),$(".check_pers8").prop("disabled",!0),$(".check_madre8").prop("checked",!1),$(".check_padre8").prop("checked",!1),$(".check_hnos8").prop("checked",!1),$(".check_pers8").prop("checked",!1),$(".check_madre9").prop("checked",!1),$(".check_padre9").prop("checked",!1),$(".check_hnos9").prop("checked",!1),$(".check_pers9").prop("checked",!1),$(".check_madre9").prop("disabled",!0),$(".check_padre9").prop("disabled",!0),$(".check_hnos9").prop("disabled",!0),$(".check_pers9").prop("disabled",!0),$(".check_madre10").prop("checked",!1),$(".check_padre10").prop("checked",!1),$(".check_hnos10").prop("checked",!1),$(".check_pers10").prop("checked",!1),$(".check_madre10").prop("disabled",!0),$(".check_padre10").prop("disabled",!0),$(".check_hnos10").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre11").prop("checked",!1),$(".check_padre11").prop("checked",!1),$(".check_hnos11").prop("checked",!1),$(".check_pers11").prop("checked",!1),$(".check_madre11").prop("disabled",!0),$(".check_padre11").prop("disabled",!0),$(".check_hnos11").prop("disabled",!0),$(".check_pers11").prop("disabled",!0),$(".check_madre12").prop("disabled",!0),$(".check_padre12").prop("disabled",!0),$(".check_hnos12").prop("disabled",!0),$(".check_pers12").prop("disabled",!0),$(".check_madre12").prop("checked",!1),$(".check_padre12").prop("checked",!1),$(".check_hnos12").prop("checked",!1),$(".check_pers12").prop("checked",!1),$(".check_madre13").prop("checked",!1),$(".check_padre13").prop("checked",!1),$(".check_hnos13").prop("checked",!1),$(".check_pers13").prop("checked",!1),$(".check_madre13").prop("disabled",!0),$(".check_padre13").prop("disabled",!0),$(".check_hnos13").prop("disabled",!0),$(".check_pers13").prop("disabled",!0),$(".check_madre14").prop("checked",!1),$(".check_padre14").prop("checked",!1),$(".check_hnos14").prop("checked",!1),$(".check_pers14").prop("checked",!1),$(".check_madre14").prop("disabled",!0),$(".check_padre14").prop("disabled",!0),$(".check_hnos14").prop("disabled",!0),$(".check_pers14").prop("disabled",!0),$(".check_madre15").prop("checked",!1),$(".check_padre15").prop("checked",!1),$(".check_hnos15").prop("checked",!1),$(".check_pers15").prop("checked",!1),$(".check_madre15").prop("disabled",!0),$(".check_padre15").prop("disabled",!0),$(".check_hnos15").prop("disabled",!0),$(".check_pers15").prop("disabled",!0),$(".check_madre16").prop("checked",!1),$(".check_padre16").prop("checked",!1),$(".check_hnos16").prop("checked",!1),$(".check_pers16").prop("checked",!1),$(".check_madre16").prop("disabled",!0),$(".check_padre16").prop("disabled",!0),$(".check_hnos16").prop("disabled",!0),$(".check_pers16").prop("disabled",!0),$(".check_madre17").prop("checked",!1),$(".check_padre17").prop("checked",!1),$(".check_hnos17").prop("checked",!1),$(".check_pers17").prop("checked",!1),$(".check_madre17").prop("disabled",!0),$(".check_padre17").prop("disabled",!0),$(".check_hnos17").prop("disabled",!0),$(".check_pers17").prop("disabled",!0)):($(".emp_checkbox").prop("checked",!1),$(".check_madre").prop("disabled",!1),$(".check_padre").prop("disabled",!1),$(".check_hnos").prop("disabled",!1),$(".check_pers").prop("disabled",!1),$(".check_madre2").prop("disabled",!1),$(".check_padre2").prop("disabled",!1),$(".check_hnos2").prop("disabled",!1),$(".check_pers2").prop("disabled",!1),$(".check_madre3").prop("disabled",!1),$(".check_padre3").prop("disabled",!1),$(".check_hnos3").prop("disabled",!1),$(".check_pers3").prop("disabled",!1),$(".check_madre4").prop("disabled",!1),$(".check_padre4").prop("disabled",!1),$(".check_hnos4").prop("disabled",!1),$(".check_pers4").prop("disabled",!1),$(".check_madre5").prop("disabled",!1),$(".check_padre5").prop("disabled",!1),$(".check_hnos5").prop("disabled",!1),$(".check_pers5").prop("disabled",!1),$(".check_madre6").prop("disabled",!1),$(".check_padre6").prop("disabled",!1),$(".check_hnos6").prop("disabled",!1),$(".check_pers6").prop("disabled",!1),$(".check_madre7").prop("disabled",!1),$(".check_padre7").prop("disabled",!1),$(".check_hnos7").prop("disabled",!1),$(".check_pers7").prop("disabled",!1),$(".check_madre8").prop("disabled",!1),$(".check_padre8").prop("disabled",!1),$(".check_hnos8").prop("disabled",!1),$(".check_pers8").prop("disabled",!1),$(".check_madre9").prop("disabled",!1),$(".check_padre9").prop("disabled",!1),$(".check_hnos9").prop("disabled",!1),$(".check_pers9").prop("disabled",!1),$(".check_madre10").prop("disabled",!1),$(".check_padre10").prop("disabled",!1),$(".check_hnos10").prop("disabled",!1),$(".check_pers10").prop("disabled",!1),$(".check_madre11").prop("disabled",!1),$(".check_padre11").prop("disabled",!1),$(".check_hnos11").prop("disabled",!1),$(".check_pers11").prop("disabled",!1),$(".check_madre12").prop("disabled",!1),$(".check_padre12").prop("disabled",!1),$(".check_hnos12").prop("disabled",!1),$(".check_pers12").prop("disabled",!1),$(".check_madre13").prop("disabled",!1),$(".check_padre13").prop("disabled",!1),$(".check_hnos13").prop("disabled",!1),$(".check_pers13").prop("disabled",!1),$(".check_madre14").prop("disabled",!1),$(".check_padre14").prop("disabled",!1),$(".check_hnos14").prop("disabled",!1),$(".check_pers14").prop("disabled",!1),$(".check_madre15").prop("disabled",!1),$(".check_padre15").prop("disabled",!1),$(".check_hnos15").prop("disabled",!1),$(".check_pers15").prop("disabled",!1),$(".check_madre16").prop("disabled",!1),$(".check_padre16").prop("disabled",!1),$(".check_hnos16").prop("disabled",!1),$(".check_pers16").prop("disabled",!1),$(".check_madre17").prop("disabled",!1),$(".check_padre17").prop("disabled",!1),$(".check_hnos17").prop("disabled",!1),$(".check_pers17").prop("disabled",!1))}),jQuery("#select_all").on("click",function(e){$(this).is(":checked",!0)?($(".emp_checkbox").prop("checked",!0),$(".text-marquo").prop("disabled",!0)):($(".emp_checkbox").prop("checked",!1),$(".text-marquo").prop("disabled",!1),$("#otros").prop("disabled",!1)),$("#select_count 2").html($("input.emp_checkbox:checked").length+" Seleccionada (s)")}),jQuery(".emp_checkbox").on("click",function(e){$(this).is(":checked",!0)?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),$(".niguno_checked1").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre").prop("disabled",!0),$(".check_padre").prop("disabled",!0),$(".check_hnos").prop("disabled",!0),$(".check_pers").prop("disabled",!0),$(".check_madre").prop("checked",!1),$(".check_padre").prop("checked",!1),$(".check_hnos").prop("checked",!1),$(".check_pers").prop("checked",!1),$("#car_text").prop("disabled",!0),$("#car_text").val("")):($(".check_madre").prop("disabled",!1),$(".check_padre").prop("disabled",!1),$(".check_hnos").prop("disabled",!1),$(".check_pers").prop("disabled",!1),$("#car_text").prop("disabled",!1))}),$(".niguno_checked2").on("click",function(e){$(this).is(":checked",!0)?($(".check_madre2").prop("disabled",!0),$(".check_padre2").prop("disabled",!0),$(".check_hnos2").prop("disabled",!0),$(".check_pers2").prop("disabled",!0),$(".check_madre2").prop("checked",!1),$(".check_padre2").prop("checked",!1),$(".check_hnos2").prop("checked",!1),$(".check_pers2").prop("checked",!1),$("#hip_text").prop("disabled",!0),$("#hip_text").val("")):($(".check_madre2").prop("disabled",!1),$(".check_padre2").prop("disabled",!1),$(".check_hnos2").prop("disabled",!1),$(".check_pers2").prop("disabled",!1),$("#hip_text").prop("disabled",!1),$(".unchecked_all").prop("checked",!1))}),$(".niguno_checked3").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre3").prop("disabled",!0),$(".check_padre3").prop("disabled",!0),$(".check_hnos3").prop("disabled",!0),$(".check_pers3").prop("disabled",!0),$(".check_madre3").prop("checked",!1),$(".check_padre3").prop("checked",!1),$(".check_hnos3").prop("checked",!1),$(".check_pers3").prop("checked",!1),$("#ec_text").prop("disabled",!0),$("#ec_text").val("")):($(".check_madre3").prop("disabled",!1),$(".check_padre3").prop("disabled",!1),$(".check_hnos3").prop("disabled",!1),$(".check_pers3").prop("disabled",!1),$("#ec_text").prop("disabled",!1))}),$(".niguno_checked4").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre4").prop("disabled",!0),$(".check_padre4").prop("disabled",!0),$(".check_hnos4").prop("disabled",!0),$(".check_pers4").prop("disabled",!0),$(".check_madre4").prop("checked",!1),$(".check_padre4").prop("checked",!1),$(".check_hnos4").prop("checked",!1),$(".check_pers4").prop("checked",!1),$("#ep_text").prop("disabled",!0),$("#ep_text").val("")):($(".check_madre4").prop("disabled",!1),$(".check_padre4").prop("disabled",!1),$(".check_hnos4").prop("disabled",!1),$(".check_pers4").prop("disabled",!1),$("#ep_text").prop("disabled",!1))}),$(".niguno_checked5").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre5").prop("disabled",!0),$(".check_padre5").prop("disabled",!0),$(".check_hnos5").prop("disabled",!0),$(".check_pers5").prop("disabled",!0),$(".check_madre5").prop("checked",!1),$(".check_padre5").prop("checked",!1),$(".check_hnos5").prop("checked",!1),$(".check_pers5").prop("checked",!1),$("#as_text").prop("disabled",!0),$("#as_text").val("")):($(".check_madre5").prop("disabled",!1),$(".check_padre5").prop("disabled",!1),$(".check_hnos5").prop("disabled",!1),$(".check_pers5").prop("disabled",!1),$("#as_text").prop("disabled",!1))}),$(".niguno_checked05").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre05").prop("disabled",!0),$(".check_padre05").prop("disabled",!0),$(".check_hnos05").prop("disabled",!0),$(".check_pers05").prop("disabled",!0),$(".check_madre05").prop("checked",!1),$(".check_padre05").prop("checked",!1),$(".check_hnos05").prop("checked",!1),$(".check_pers05").prop("checked",!1),$("#enre_text").prop("disabled",!0),$("#enre_text").val("")):($(".check_madre05").prop("disabled",!1),$(".check_padre05").prop("disabled",!1),$(".check_hnos05").prop("disabled",!1),$(".check_pers05").prop("disabled",!1),$("#enre_text").prop("disabled",!1))}),$(".niguno_checked6").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre6").prop("disabled",!0),$(".check_padre6").prop("disabled",!0),$(".check_hnos6").prop("disabled",!0),$(".check_pers6").prop("disabled",!0),$(".check_madre6").prop("checked",!1),$(".check_padre6").prop("checked",!1),$(".check_hnos6").prop("checked",!1),$(".check_pers6").prop("checked",!1),$("#tub_text").prop("disabled",!0),$("#tub_text").val("")):($(".check_madre6").prop("disabled",!1),$(".check_padre6").prop("disabled",!1),$(".check_hnos6").prop("disabled",!1),$(".check_pers6").prop("disabled",!1),$("#tub_text").prop("disabled",!1))}),$(".niguno_checked7").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre7").prop("disabled",!0),$(".check_padre7").prop("disabled",!0),$(".check_hnos7").prop("disabled",!0),$(".check_pers7").prop("disabled",!0),$(".check_madre7").prop("checked",!1),$(".check_padre7").prop("checked",!1),$(".check_hnos7").prop("checked",!1),$(".check_pers7").prop("checked",!1),$("#dia_text").prop("disabled",!0),$("#dia_text").val("")):($(".check_madre7").prop("disabled",!1),$(".check_padre7").prop("disabled",!1),$(".check_hnos7").prop("disabled",!1),$(".check_pers7").prop("disabled",!1),$("#dia_text").prop("disabled",!1))}),$(".niguno_checked8").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre8").prop("disabled",!0),$(".check_padre8").prop("disabled",!0),$(".check_hnos8").prop("disabled",!0),$(".check_pers8").prop("disabled",!0),$(".check_madre8").prop("checked",!1),$(".check_padre8").prop("checked",!1),$(".check_hnos8").prop("checked",!1),$(".check_pers8").prop("checked",!1),$("#tir_text").prop("disabled",!0),$("#tir_text").val("")):($(".check_madre8").prop("disabled",!1),$(".check_padre8").prop("disabled",!1),$(".check_hnos8").prop("disabled",!1),$(".check_pers8").prop("disabled",!1),$("#tir_text").prop("disabled",!1))}),$(".niguno_checked9").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre9").prop("disabled",!0),$(".check_padre9").prop("disabled",!0),$(".check_hnos9").prop("disabled",!0),$(".check_pers9").prop("disabled",!0),$(".check_madre9").prop("checked",!1),$(".check_padre9").prop("checked",!1),$(".check_hnos9").prop("checked",!1),$(".check_pers9").prop("checked",!1),$("#hep_tipo").prop("disabled",!0),$("#hep_text").prop("disabled",!0),$("#hep_text").val("")):($(".check_madre9").prop("disabled",!1),$(".check_padre9").prop("disabled",!1),$(".check_hnos9").prop("disabled",!1),$(".check_pers9").prop("disabled",!1),$("#hep_tipo").prop("disabled",!1),$("#hep_text").prop("disabled",!1))}),$(".niguno_checked10").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre10").prop("disabled",!0),$(".check_padre10").prop("disabled",!0),$(".check_hnos10").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre10").prop("checked",!1),$(".check_padre10").prop("checked",!1),$(".check_hnos10").prop("checked",!1),$(".check_pers10").prop("checked",!1),$("#enfr_text").prop("disabled",!0),$("#enfr_text").val("")):($(".check_madre10").prop("disabled",!1),$(".check_padre10").prop("disabled",!1),$(".check_hnos10").prop("disabled",!1),$(".check_pers10").prop("disabled",!1),$("#enfr_text").prop("disabled",!1))}),$(".niguno_checked11").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre11").prop("disabled",!0),$(".check_padre11").prop("disabled",!0),$(".check_hnos11").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre11").prop("checked",!1),$(".check_padre11").prop("checked",!1),$(".check_hnos11").prop("checked",!1),$(".check_pers11").prop("checked",!1),$("#falc_text").prop("disabled",!0),$("#falc_text").val("")):($(".check_madre11").prop("disabled",!1),$(".check_padre11").prop("disabled",!1),$(".check_hnos11").prop("disabled",!1),$(".check_pers11").prop("disabled",!1),$("#falc_text").prop("disabled",!1))}),$(".niguno_checked12").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre12").prop("disabled",!0),$(".check_padre12").prop("disabled",!0),$(".check_hnos12").prop("disabled",!0),$(".check_pers12").prop("disabled",!0),$(".check_madre12").prop("checked",!1),$(".check_padre12").prop("checked",!1),$(".check_hnos12").prop("checked",!1),$(".check_pers12").prop("checked",!1),$("#neop_text").prop("disabled",!0),$("#neop_text").val("")):($(".check_madre12").prop("disabled",!1),$(".check_padre12").prop("disabled",!1),$(".check_hnos12").prop("disabled",!1),$(".check_pers12").prop("disabled",!1),$("#neop_text").prop("disabled",!1))}),$(".niguno_checked13").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre13").prop("disabled",!0),$(".check_padre13").prop("disabled",!0),$(".check_hnos13").prop("disabled",!0),$(".check_pers13").prop("disabled",!0),$(".check_madre13").prop("checked",!1),$(".check_padre13").prop("checked",!1),$(".check_hnos13").prop("checked",!1),$(".check_pers13").prop("checked",!1),$("#psi_text").prop("disabled",!0),$("#psi_text").val("")):($(".check_madre13").prop("disabled",!1),$(".check_padre13").prop("disabled",!1),$(".check_hnos13").prop("disabled",!1),$(".check_pers13").prop("disabled",!1),$("#psi_text").prop("disabled",!1))}),$(".niguno_checked14").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre14").prop("disabled",!0),$(".check_padre14").prop("disabled",!0),$(".check_hnos14").prop("disabled",!0),$(".check_pers14").prop("disabled",!0),$(".check_madre14").prop("checked",!1),$(".check_padre14").prop("checked",!1),$(".check_hnos14").prop("checked",!1),$(".check_pers14").prop("checked",!1),$("#obs_text").prop("disabled",!0),$("#obs_text").val("")):($(".check_madre14").prop("disabled",!1),$(".check_padre14").prop("disabled",!1),$(".check_hnos14").prop("disabled",!1),$(".check_pers14").prop("disabled",!1),$("#obs_text").prop("disabled",!1))}),$(".niguno_checked15").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre15").prop("disabled",!0),$(".check_padre15").prop("disabled",!0),$(".check_hnos15").prop("disabled",!0),$(".check_pers15").prop("disabled",!0),$(".check_madre15").prop("checked",!1),$(".check_padre15").prop("checked",!1),$(".check_hnos15").prop("checked",!1),$(".check_pers15").prop("checked",!1),$("#ulp_text").prop("disabled",!0),$("#ulp_text").val("")):($(".check_madre15").prop("disabled",!1),$(".check_padre15").prop("disabled",!1),$(".check_hnos15").prop("disabled",!1),$(".check_pers15").prop("disabled",!1),$("#ulp_text").prop("disabled",!1))}),$(".niguno_checked16").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre16").prop("disabled",!0),$(".check_padre16").prop("disabled",!0),$(".check_hnos16").prop("disabled",!0),$(".check_pers16").prop("disabled",!0),$(".check_madre16").prop("checked",!1),$(".check_padre16").prop("checked",!1),$(".check_hnos16").prop("checked",!1),$(".check_pers16").prop("checked",!1),$("#art_text").prop("disabled",!0),$("#art_text").val("")):($(".check_madre16").prop("disabled",!1),$(".check_padre16").prop("disabled",!1),$(".check_hnos16").prop("disabled",!1),$(".check_pers16").prop("disabled",!1),$("#art_text").prop("disabled",!1))}),$(".niguno_checked016").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre016").prop("disabled",!0),$(".check_padre016").prop("disabled",!0),$(".check_hnos016").prop("disabled",!0),$(".check_pers016").prop("disabled",!0),$(".check_madre016").prop("checked",!1),$(".check_padre016").prop("checked",!1),$(".check_hnos016").prop("checked",!1),$(".check_pers016").prop("checked",!1),$("#hem_text").prop("disabled",!0),$("#hem_text").val("")):($(".check_madre016").prop("disabled",!1),$(".check_padre016").prop("disabled",!1),$(".check_hnos016").prop("disabled",!1),$(".check_pers016").prop("disabled",!1),$("#hem_text").prop("disabled",!1))}),$(".niguno_checked17").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre17").prop("disabled",!0),$(".check_padre17").prop("disabled",!0),$(".check_hnos17").prop("disabled",!0),$(".check_pers17").prop("disabled",!0),$(".check_madre17").prop("checked",!1),$(".check_padre17").prop("checked",!1),$(".check_hnos17").prop("checked",!1),$(".check_pers17").prop("checked",!1),$("#zika_text").prop("disabled",!0),$("#zika_text").val("")):($(".check_madre17").prop("disabled",!1),$(".check_padre17").prop("disabled",!1),$(".check_hnos17").prop("disabled",!1),$(".check_pers17").prop("disabled",!1),$("#zika_text").prop("disabled",!1))}),$("#bt").click(function(){id=$(this).attr("title"),"Ocultar"==(txt=$(this).text())?($(this).text("Mostrar"),$("section").css("margin-top","100px")):($(this).text("Ocultar"),$("section").css("margin-top","180px")),$("#"+id).toggle("slide")})}),$("#bt").submit(function(e){e.preventDefault()}),$(document).ready(function(){$("#saveIndicacionesMedicales").click(function(e){return $("#medicamento").val(),$("#frecuencia").val(),$("#cantidad").val(),$("#via").val(),$("#farmacia").val(),""==$("#medicamento").val()?($("#medicamento").focus(),$("#medicamento").css("border-color","red"),$("#errorBox").html("Selecciona el medicamento"),!1):""==$("#frecuencia").val()?($("#frecuencia").focus(),$("#frecuencia").css("border-color","red"),$("#errorBox").html("Selecciona la frecuencia"),!1):""==$("#cantidad").val()?($("#cantidad").focus(),$("#cantidad").css("border-color","red"),$("#errorBox").html("Selecciona la cantidad"),!1):""==$("#via").val()?($("#via").focus(),$("#via").css("border-color","red"),$("#errorBox").html("Selecciona el campo : via"),!1):""==$("#farmacia").val()?($("#farmacia").focus(),$("#farmacia").css("border-color","red"),$("#errorBox").html("Selecciona la farmacia"),!1):void 0})}),$(document).ready(function(){$("#medicamento").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#frecuencia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#cantidad").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#via").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#farmacia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(".checkininfancia").change(function(){$(".checkininfancia:not(:checked)").length?($("#infancia").prop("disabled",!0),$(".act_inf").hide(),$(".dea_inf").show()):($("#infancia").prop("disabled",!1),$(".act_inf").show(),$(".dea_inf").hide())}),$(".checkin_adol").change(function(){$(".checkin_adol:checked").length?($("#adolescencia").prop("disabled",!1),$(".act_adol").hide(),$(".dea_adol").show()):($("#adolescencia").prop("disabled",!0),$(".act_adol").show(),$(".dea_adol").hide())}),$(".checkin_adultez").change(function(){$(".checkin_adultez:checked").length?($("#adultez").prop("disabled",!1),$(".act_adul").hide(),$(".dea_adul").show()):($("#adultez").prop("disabled",!0),$(".act_adul").show(),$(".dea_adul").hide())}),$(".checkin_fami").change(function(){$(".checkin_fami:checked").length?($("#familiares").prop("disabled",!1),$(".act_fam").hide(),$(".dea_fam").show()):($("#familiares").prop("disabled",!0),$(".act_fam").show(),$(".dea_fam").hide())}),$(".checkin_medh").change(function(){$(".checkin_medh:checked").length?($("#medicamentos_hab").prop("disabled",!1),$(".act_medh").hide(),$(".dea_medh").show()):($("#medicamentos_hab").prop("disabled",!0),$(".act_medh").show(),$(".dea_medh").hide())}),$(".checkin_trau").change(function(){$(".checkin_trau:checked").length?($("#traumatismo").prop("disabled",!1),$(".act_trau").hide(),$(".dea_trau").show()):($("#traumatismo").prop("disabled",!0),$(".act_trau").show(),$(".dea_trau").hide())}),$(".check_neuro").change(function(){$(".check_neuro:checked").length?$("#neurologico").prop("disabled",!0):$("#neurologico").prop("disabled",!1)}),$(".check_abdo").change(function(){$(".check_abdo:checked").length?$("#abdomen").prop("disabled",!0):$("#abdomen").prop("disabled",!1)}),$(".check_cabe").change(function(){$(".check_cabe:checked").length?$("#cabeza").prop("disabled",!0):$("#cabeza").prop("disabled",!1)}),$(".check_pelvi").change(function(){$(".check_pelvi:checked").length?$("#pelvica").prop("disabled",!0):$("#pelvica").prop("disabled",!1)}),$(".check_evali").change(function(){$(".check_evali:checked").length?$("#evaluacion_mama").prop("disabled",!0):$("#evaluacion_mama").prop("disabled",!1)}),$(".check_insp").change(function(){$(".check_insp:checked").length?$("#inspeccion_genital").prop("disabled",!0):$("#inspeccion_genital").prop("disabled",!1)}),$(".check_torax").change(function(){$(".check_torax:checked").length?$("#torax").prop("disabled",!0):$("#torax").prop("disabled",!1)}),$(".check_columna").change(function(){$(".check_columna:checked").length?$("#columna_dorsal").prop("disabled",!0):$("#columna_dorsal").prop("disabled",!1)}),$(".check_corazon").change(function(){$(".check_corazon:checked").length?$("#corazon").prop("disabled",!0):$("#corazon").prop("disabled",!1)}),$(".check_ext").change(function(){$(".check_ext:checked").length?$("#extremidades").prop("disabled",!0):$("#extremidades").prop("disabled",!1)}),$(".check_pulm").change(function(){$(".check_pulm:checked").length?$("#pulmones").prop("disabled",!0):$("#pulmones").prop("disabled",!1)}),$(".check_otros").change(function(){$(".check_otros:checked").length?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),jQuery("input[name='grueso']").on("click",function(e){if($(".chkNo").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-1").slideDown(),i=0;i<100;i++)$(".triangle-1").fadeTo("slow",.1).fadeTo("slow",1);$(".text-grueso").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-1").stop(!0),$(".triangle-1").slideUp(),$(".text-grueso").prop("disabled",!0)}),jQuery("input[name='fino']").on("click",function(e){if($(".chkNo2").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-2").slideDown(),i=0;i<100;i++)$(".triangle-2").fadeTo("slow",.1).fadeTo("slow",1);$(".text-fino").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-2").stop(!0),$(".triangle-2").slideUp(),$(".text-fino").prop("disabled",!0)}),jQuery("input[name='lenguage']").on("click",function(e){if($(".chkNo3").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-3").slideDown(),i=0;i<100;i++)$(".triangle-3").fadeTo("slow",.1).fadeTo("slow",1);$(".text-lenguage").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-3").stop(!0),$(".triangle-3").slideUp(),$(".text-lenguage").prop("disabled",!0)}),jQuery("input[name='social']").on("click",function(e){if($(".chkNo4").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-4").slideDown(),i=0;i<100;i++)$(".triangle-4").fadeTo("slow",.1).fadeTo("slow",1);$(".text-social").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-4").stop(!0),$(".triangle-4").slideUp(),$(".text-social").prop("disabled",!0)});
 

 
 $('#saveEditAntGnrl').on('click', function(event) {
event.preventDefault();
$('#saveEditAntGnrl').prop("disabled", true);
saveAntPerFam($("#id_ant_g").val(), $("#id_eva_card").val());


});
 

   
   
function containsAnyLetters(str) {
  return /[a-zA-Z]/.test(str);
}
	




function saveEnfermedadActualConclusionDiagCirujanoVas(endo_vas_id, id_con_diag) {
		
		
		 var cir_vas_dol = [];
            $('input[name=' + endo_vas_id + '_cir_vas_dol]:checked').each(function() {
                cir_vas_dol.push(this.value);
            });

            var cir_vas_edema = [];
            $('input[name=' + endo_vas_id + '_cir_vas_edema]:checked').each(function() {
                cir_vas_edema.push(this.value);
            });
            var cir_vas_pesadez = [];
            $('input[name=' + endo_vas_id + '_cir_vas_pesadez]:checked').each(function() {
                cir_vas_pesadez.push(this.value);
            });
            var cir_vas_cansancio = [];
            $('input[name=' + endo_vas_id + '_cir_vas_cansancio]:checked').each(function() {
                cir_vas_cansancio.push(this.value);
            });
            var cir_vas_quemazo = [];
            $('input[name=' + endo_vas_id + '_cir_vas_quemazo]:checked').each(function() {
                cir_vas_quemazo.push(this.value);
            });
            var cir_vas_calambred = [];
            $('input[name=' + endo_vas_id + '_cir_vas_calambred]:checked').each(function() {
                cir_vas_calambred.push(this.value);
            });
            var cir_vas_purito = [];
            $('input[name=' + endo_vas_id + '_cir_vas_purito]:checked').each(function() {
                cir_vas_purito.push(this.value);
            });
            var cir_vas_hiper = [];
            $('input[name=' + endo_vas_id + '_cir_vas_hiper]:checked').each(function() {
                cir_vas_hiper.push(this.value);
            });
            var cir_vas_ulceras = [];
            $('input[name=' + endo_vas_id + '_cir_vas_ulceras]:checked').each(function() {
                cir_vas_ulceras.push(this.value);
            });
            var cir_vas_pares = [];
            $('input[name=' + endo_vas_id + '_cir_vas_pares]:checked').each(function() {
                cir_vas_pares.push(this.value);
            });
            var cir_vas_claud = [];
            $('input[name=' + endo_vas_id + '_cir_vas_claud]:checked').each(function() {
                cir_vas_claud.push(this.value);
            });
            var cir_vas_necrosis = [];
            $('input[name=' + endo_vas_id + '_cir_vas_necrosis]:checked').each(function() {
                cir_vas_necrosis.push(this.value);
            });

            var cir_vas_otros = $("#" + endo_vas_id + "_cir_vas_otros").val();
		
		 var enf_historia = quillEnfEndVasHist.root.innerHTML;
	       var is_historia_empty = quillEnfEndVasHist.root.innerText;
	  
		   var floatingProcedimiento = quillCondProced.root.innerHTML;
	        var isPlanEmpry = $("#quill-editor-condiag_plan_" + id_con_diag).text();
		    var con_dia_plan = quillCondPlan.root.innerHTML;
	       var floatingDiagOtros = $("#floatingDiagOtros-" + id_con_diag).val();
			//var isCied10Emty = $("#cie10Id").val();
			 var isCied10Emty = $("#floatingDiagPrDef-" + id_con_diag).val();;
			var cie10Id = [];

			$(".cie10Id").each(function(){
			cie10Id.push($(this).val());
			});


			const objRequiredEnf = {
			message: "<strong>Enfemedad Actual</strong><br/> * La historia de consulta es obligatoria."
			};

			const objConDiag = {
			message: "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El campo CIE10 es obligatorio."
			};

			const objConDiagPlan = {
			message: "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El plan es obligatorio."
			};
			
			if(is_historia_empty ==""){
            callSweetalert2Required(objRequiredEnf);
			return false;
			}
			
			else if(floatingDiagOtros=="" && isCied10Emty=="") {
               callSweetalert2Required(objConDiag);
			   return false;
            }
			
			 else if(isPlanEmpry=="") {
                callSweetalert2Required(objConDiagPlan);
				return false;
            }else{	
			$("#btnSaveHist").html("<em>guardando</em>").prop("disabled", true);
		  $.ajax({
        type: "POST",
         url: base_url+"saveHistorialForms/saveEnfermedadActualConclusionDiagCirujanoVas",
        data: { 
		            enf_historia: enf_historia,
		           is_historia_empty:is_historia_empty,
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
                    cir_vas_otros: cir_vas_otros,
					saveDrawCanEndo: $("#inpuImgSaveToDatabaseEndV").val(),
					ifVasSurgery:$("#ifVasSurgery").val(),
                    isPlanEmpry:isPlanEmpry,
					floatingDiagOtros: floatingDiagOtros,
					con_dia_plan: con_dia_plan,
					cie10Id:cie10Id,
					isCied10Emty:isCied10Emty,
					floatingProcedimiento: floatingProcedimiento,
					id:endo_vas_id
		  
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
			 pressBtnHist(response);
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
}		
		
function saveEnfermedadActualConclusionDiagGeneral(id_enf_act, id_con_diag) {
	
	 saveCanvasHistoriaGeneral();
	saveEnfermedadActualConclusionDiag(id_enf_act, id_con_diag);
}

	
function saveEnfermedadActualConclusionDiag(id_enf_act, id_con_diag) {
		//setFormSubmitting();
	  var enf_motivo = $("#" + id_enf_act + "_enf_motivo").val();
      var enf_signopsis = quillEnfSig.root.innerHTML;
	  var is_sinopsis_empty = quillEnfSig.root.innerText;
	  
		 var floatingProcedimiento = quillCondProced.root.innerHTML;
	       var isPlanEmpry = quillCondPlan.root.innerText;
		var con_dia_plan = quillCondPlan.root.innerHTML;
	   var enf_laboratorios =quillEnfLaboratorio.root.innerHTML;

      //var enf_laboratorios = $("#" + id_enf_act + "_enf_laboratorios").val();
      //var enf_estudios = $("#" + id_enf_act + "_enf_estudios").val();
		var enf_estudios = quillEnfEstudios.root.innerHTML;
		var floatingDiagOtros = $("#floatingDiagOtros-" + id_con_diag).val();
			//var isCied10Emty = $("#cie10Id").val();
			 var isCied10Emty = $("#floatingDiagPrDef-" + id_con_diag).val();
			var cie10Id = [];

			$(".cie10Id").each(function(){
			cie10Id.push($(this).val());
			});
			
		//var con_dia_plan = $("#con_dia_plan-" + id_con_diag).val();
		//var floatingProcedimiento = $("#floatingProcedimiento-" + id_con_diag).val();
	var planReq = $("#quill-editor-condiag_plan_" + id_con_diag).text();

			  const objRequiredEnf = {
				message: "<strong>Enfemedad Actual</strong><br/> * El Motivo de consulta es obligatorio."
			};


                const objRequireSinopsis = {
				message: "CAMPO REQUERIDO <br/> Enfemedad Actual: El Signopsis es obligatorio."
			};

        const objConDiag = {
				message: "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El campo CIE10 es obligatorio."
			};
			
			 const objConDiagPlan = {
				message: "CAMPO REQUERIDO <br/> Conclusión Diagnóstica: El plan es obligatorio."
			};
			
			 const objRequired = {
				message: "CAMPO REQUERIDO <br/> Los campos con * son requeridos."
			};
			
		 
			if(enf_motivo ==""){
            callSweetalert2Required(objRequiredEnf);
			return false;
			}else if(is_sinopsis_empty ==""){
				callSweetalert2Required(objRequireSinopsis);
				return false;
			}
			 
			else if(floatingDiagOtros=="" && isCied10Emty=="") {
               callSweetalert2Required(objConDiag);
			   return false;
            }
			
			 else if(planReq=="") {
                callSweetalert2Required(objConDiagPlan);
				return false;
            }
			else{
				
			$("#btnSaveHist").html("<em>guardando</em>").prop("disabled", true);
			 $.ajax({
        type: "POST",
         url: base_url+"saveHistorialForms/saveEnfermedadActualConclusionDiag",
        data: { 
		    enf_motivo: enf_motivo,
          enf_signopsis: quillEnfSig.root.innerHTML,
		  is_sinopsis_empty:is_sinopsis_empty,
          enf_laboratorios: enf_laboratorios,
          enf_estudios: enf_estudios,
		  isPlanEmpry:planReq,
          floatingDiagOtros: floatingDiagOtros,
          con_dia_plan: con_dia_plan,
		  cie10Id:cie10Id,
		  isCied10Emty:isCied10Emty,
          floatingProcedimiento: floatingProcedimiento,
		  saveDrawImageHumB: $("#inpuImgSaveToDatabaseGeneralHumanBody").val(),
		  ifGeneralHumanBody: $("#ifGeneralHumanBody").val()
		},
		dataType: 'json',
        cache: false,
		 success: function(response) {
			 pressBtnHist(response);
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
		
		}
		
	
	function saveCanvasEndova(){
	  var saveCanvasEndoV= $("#canvasfinalImgSaveToDatabaseEndV").get(0);
        saveCanvasEndoV.width = canvas.width;
        saveCanvasEndoV.height = canvas.height;
        var ctx1 = saveCanvasEndoV.getContext("2d");
	    ctx1.drawImage(backgroundImage, 0, 0);
        ctx1.drawImage(canvas, 0, 0);
	
	 $('#inpuImgSaveToDatabaseEndV').val(saveCanvasEndoV.toDataURL());
	
		
	}
	
	
	
	function saveCanvasOftalmologia(){
	  var saveCanvasImgEyes = $("#canvasfinalImgSaveToDatabaseOftalOjos").get(0);
        saveCanvasImgEyes.width = canvas.width;
        saveCanvasImgEyes.height = canvas.height;
        var ctx1 = saveCanvasImgEyes.getContext("2d");
	    ctx1.drawImage(backgroundImage, 0, 0);
        ctx1.drawImage(canvas, 0, 0);
	
	 $('#inputImgSaveToDatabaseOftalOjos').val(saveCanvasImgEyes.toDataURL());
	
	
	    var saveCanvasImgFondo = $("#canvasfinalImgSaveToDatabaseOftalFondos").get(0);
        saveCanvasImgFondo.width = canvasFondo.width;
        saveCanvasImgFondo.height = canvasFondo.height;
        var ctx2 = saveCanvasImgFondo.getContext("2d");
	    ctx2.drawImage(backgroundImageFondo, 0, 0);
        ctx2.drawImage(canvasFondo, 0, 0);
		 $('#inpuImgSaveToDatabaseOftalFondos').val(saveCanvasImgFondo.toDataURL());	
	}
	
	
	
	function saveCanvasUrology(){
	  var saveCanvasImgUro = $("#canvasfinalImgSaveToDatabaseUro").get(0);
        saveCanvasImgUro.width = canvasUro.width;
        saveCanvasImgUro.height = canvasUro.height;
        var ctx1 = saveCanvasImgUro.getContext("2d");
	    ctx1.drawImage(backgroundImageUro, 0, 0);
        ctx1.drawImage(canvasUro, 0, 0);
	
	 $('#inputImgSaveToDatabaseUro').val(saveCanvasImgUro.toDataURL());
	
		
	}
	
	
	
	
		function saveCanvasHistoriaGeneral(){
	  var saveCanvasHb = $("#canvasfinalImgSaveToDatabaseGeneralHumanBody").get(0);
        saveCanvasHb.width = canvasHb.width;
        saveCanvasHb.height = canvasHb.height;
        var ctx1 = saveCanvasHb.getContext("2d");
	    ctx1.drawImage(backgroundImageHb, 0, 0);
        ctx1.drawImage(canvasHb, 0, 0);
	
	 $('#inpuImgSaveToDatabaseGeneralHumanBody').val(saveCanvasHb.toDataURL());
	
		
	}
	
	
	
	
	
	
	
	
	
	
	
	function saveCanvasExamenMamas(){
	  var saveCanvasImg = $("#canvasimgSaveExamMama").get(0);
        saveCanvasImg.width = canvasMama.width;
        saveCanvasImg.height = canvasMama.height;
        var ctx1 = saveCanvasImg.getContext("2d");
	    ctx1.drawImage(backgroundImageMama, 0, 0);
        ctx1.drawImage(canvasMama, 0, 0);
	
	 $('#finalImgSaveToDatabaseExamMama').val(saveCanvasImg.toDataURL());
	
		
	}
	
	
	 $('#click-show-alergy').on('click', function(e){
e.preventDefault();
	var table = "h_c_alergy";
	var list_div = "#alergy-list";

	showAlgergy(table,list_div);
 });











function showAlgergy(table,list_div){
	
	     $.ajax({
            type: 'POST',
            url:base_url+"alergy/listAlergy",
            data:{ table:table,id_patient:$("#id_patient").val()},
            beforeSend: function(){
            $(list_div).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
            },
			  success: function(data){ 
			  $(list_div).removeClass("spinner-border");
            $(list_div).html(data);
			  
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

 });
	
}


//--SAVE FOOD ALERGY

  $('#btn-save-food-alergy').on('click', function(e){
	   e.preventDefault();
    var alergy_input = $("#food_alergy_text");
	var btn_save = "#btn-save-food-alergy";
	var number_alergy=".number_alergy";
	var table = "h_c_alergy";
	var model = "saveAlergyTotal";
	var column = "alergy";
	var alergy_type = 'Alimento';
	if(alergy_input.val() !=""){
	saveAlergy(alergy_input,btn_save,number_alergy,table,model,column, alergy_type);
	}
	});
	
	
		
	
	//--SAVE DRUG ALERGY
	
	 $('#btn-save-drug-alergy').on('click', function(e){
	   e.preventDefault();
    var alergy_input = $("#drug_alergy_text");
	var btn_save = "#btn-save-drug-alergy";
	var number_alergy=".number_alergy";
	var table = "h_c_alergy";
	var model = "saveAlergyTotal";
	var column = "alergy";
	var alergy_type = 'Medicamento';
	if(alergy_input.val() !=""){
	saveAlergy(alergy_input,btn_save,number_alergy,table,model,column, alergy_type);
	}
	});
	
	
		//--SAVE OTHER 
	
	
	$('#btn-save-other-alergy').on('click', function(e){
	   e.preventDefault();
    var alergy_input = $("#others_alergy_text");
	var btn_save = "#btn-save-other-alergy";
	var number_alergy=".number_alergy";
	var table = "h_c_alergy";
	var model = "saveAlergyTotal";
	var column = "alergy";
	var alergy_type = 'Otro';
	if(alergy_input.val() !=""){
	saveAlergy(alergy_input,btn_save,number_alergy,table,model,column, alergy_type);
	}
	});
	
	
		function saveAlergy(alergy_input,btn_save,number_alergy,table,model,column, alergy_type){
		
		     $.ajax({
            type: 'POST',
            url:base_url+"alergy/saveAlergy",
            data:{alergy_input:alergy_input.val(),table:table, model:model,column:column, alergy_type:alergy_type},
            dataType: 'json',
            cache: false,
            beforeSend: function(){
           $(btn_save).prop("disabled",true);
            },
            success: function(response){ 
              $(number_alergy).text(response.count).css("font-size","30px"); 
			  $(btn_save).prop("disabled",false);
			  $(alergy_input).val("");
			  
			  setTimeout(function() {
           $(number_alergy).css("font-size","");
		   }, 1000);
			  
               },
	   error: function(jqXHR, textStatus, errorThrown) {
           alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

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
	
	
	
 $('#saveEditAntOtrosEvaCard').on('click', function(event) {
event.preventDefault();
$('#saveEditAntOtrosEvaCard').prop("disabled", true);
antOTros(1, $("#id_ht").val(), "otherAnt", 1);

});




 $('#saveEditAntOtros').on('click', function(event) {
event.preventDefault();

$('#saveEditAntOtros').prop("disabled", true);
saveOtherAntAntViolenciaIntraF($("#id_ht").val(), $("#id_eva_card").val());
});

	
$("#"+v_at_data+"_ant_blood_group").on('change', function (e) {

var grouposang = $(this).val();
$("#"+v_at_data+"_ant_tipification").val(grouposang);

});


//=======================tipification===========================

$('input:radio[name='+v_at_data+'_ant_rh]').click(function() {

	if($(this).val() == '+'){
		$('#'+v_at_data+'_ant_tipification').val($('#'+v_at_data+'_ant_tipification').val() + '+' + '');
	}else{
	$('#'+v_at_data+'_ant_tipification').val($('#'+v_at_data+'_ant_tipification').val() + '-' + '');	
	}
	
   
});





 $('#click-show-habit-drugs').on('click mouseenter', function(e){
e.preventDefault();
	var table = "h_c_usual_drug";
	var list_div = "#drug-usual-list";
	showUsualDrug(table,list_div);
 });








function showUsualDrug(table,list_div){
	
	     $.ajax({
            type: 'POST',
            url:base_url+"alergy/listAlergy",
            data:{ table:table,id_patient:$("#id_patient").val()},
            beforeSend: function(){
            $(list_div).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
            },
			  success: function(data){ 
			  $(list_div).removeClass("spinner-border");
            $(list_div).html(data);
			  
               },
 });
	
}
						  


//--SAVE USUAL DRUG

  $('#btn-save-drug-usual').on('click', function(e){
	   e.preventDefault();
    var alergy_input = $("#"+v_at_data+"_usual_drug_text");
	var btn_save = "#btn-save-drug-usual";
	var number_usual_drug=".number_usual_drug";
	var table = "h_c_usual_drug";
	var model = "saveUsualDrugTotal";
	var column = "alergy";
	var alergy_type = '';
	saveUsualDrug(alergy_input,btn_save,number_usual_drug,table,model,column, alergy_type);
	});
	
	
	
		function saveUsualDrug(alergy_input,btn_save,number_usual_drug,table,model,column, alergy_type){
		
		     $.ajax({
            type: 'POST',
            url:base_url+"alergy/saveAlergy",
            data:{alergy_input:alergy_input.val(), id_user:$("#id_user").val(), id_patient:$("#id_patient").val(), table:table, model:model,column:column, alergy_type:alergy_type},
            dataType: 'json',
            cache: false,
            beforeSend: function(){
           $(btn_save).prop("disabled",true);
            },
            success: function(response){ 
              $(number_usual_drug).text(response.count).css("font-size","30px"); 
			  $(btn_save).prop("disabled",false);
			  $(alergy_input).val("");
			  
			  setTimeout(function() {
           $(number_usual_drug).css("font-size","");
		   }, 1000);
			  
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
		
		
	}
	
	
	    

    $('#' + hab_tox_data + 'hab_t_drug').on('change', function() {

      $('#' + hab_tox_data + 'drug_list').val($('#' + hab_tox_data + 'drug_list').val() + $(this).val() + ', ');


    });

    $('#saveEditToxHab').on('click', function(event) {
      event.preventDefault();
      $('#saveEditToxHab').prop("disabled", true);
	  saveHabToxico($("#id_hab_tx").val(), $("#id_eva_card").val());
    });
	
	$(document).on('click', "#saveEditEnfAct", function(event) {
		event.preventDefault();
        $('#saveEditEnfAct').prop("disabled", true);
		updateEnfAct($("#id_enf_act").val());

		});

		
		
		
		

   

var timerCie10 = null;
$(document).on('keydown', "#search-cie10", function(event) {
  clearTimeout(timerCie10); 
       timerCie10 = setTimeout(searchAuToCompleteCie10, 1000)
});


$(document).on('click', ".delete-this-patient-con-diag", function(event) {
event.preventDefault();
 if (confirm("Lo quiere eliminar ?"))
{
     $.ajax({
   			type: "POST",
   			url: base_url+"conclusion_diagno/listPatientCie10",
   			data: {
   				idPatConDiag: $(".patient-id-condiag").val(),
   				idCondDiag: $(this).attr("id")
   			},
   			
   			success: function(data) {
   				
   				$(".list-of-patient-cie10s").html(data);

   			},

   		});
}
});


  
	function searchAuToCompleteCie10() {
   var keyword= $("#search-cie10").val();
   		$.ajax({
   			type: "POST",
   			url: base_url+"conclusion_diagno/searchCie10",
   			data: {
   				keyword: keyword,
   				id_con_diag: id_con_diag
   			},
   			beforeSend: function() {
   				$("#search-cie10").css("background", "#DCDCDC");
   			},
   			success: function(data) {
   				$("#cie10-results").show();
               	$("#cie10-results").html(data);

   			},

   		});

   	}
 


$(document).on('click', "#resetFormConDiag", function(event) {
  	event.preventDefault();
	loadQuillEditCondiag(0);
   		var li = "paginate-condiag-li";
   		var controller = "conclusion_diagno";
   		var div = "conclusion-diag-form";
   		resetForm(li, controller, div);
   	});

$(document).on('click', "#resetExamFis", function(event) {
  	event.preventDefault();
   		var li = "paginate-examfisico-li";
   		var controller = "Examfisico";
   		var div = "examfisico-form";
		$('ifExamenMamasOnce').val(0);
   		resetForm(li, controller, div);
   	});



$(document).on('click', "#saveEditConDiag", function(event) {
 $('#saveEditConDiag').prop("disabled", true);
   	updateConDiag($("#id_con_diag").val());

   	});
	
	
	$(document).on('change', "#ophtalmology-forms", function(event) {
	  
  var countCheckedRadio = $('#ophtalmology-forms input[type="radio"]').filter(':checked').length;
var txtinput= $("input.txt-inp-oph").filter(function(){ return $(this).val(); }).length;
	 	var txtarea = $("textarea.txt-ares-ophtal").filter(function(){ return $(this).val(); }).length;
		 $("#ophtalmology-form-radio").val(countCheckedRadio);
			 $("#ophtalmology-form-text").val(txtinput);
			if(txtinput==0 && txtarea==0){
				 $("#ophtalmology-form-text").val(0);
			}else{
				$("#ophtalmology-form-text").val(1);
			}

        });
		
			$(document).on('click', '#resetOph', function(event) {
		  event.preventDefault();
		   loadQuillEditOftalNota(0);
            var li = "paginate-ophtalmology-li";
            var controller = "ophtalmology";
            var div = "ophtalmology-form";
            resetForm(li, controller, div);
            $("#paginate-ophtalmology-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })




$(document).on('click', '#saveEditAbuseSis', function(event) {
       event.preventDefault();
	   $('#saveEditAbuseSis').prop("disabled", true); 
	 
	  saveSospechaAbuseMaltrato($("#id_ab_sus").val());

        });



$(document).on('click', '#saveEditOph', function(event) {
       event.preventDefault();
	    //saveCanvasOftalmologia();
           saveOphtalmology($("#id_oftal").val());

        });
		
	

 
 
 
 
  $(document).on('click', '#saveEditSigVit', function(event) {
            event.preventDefault();
		
            saveSignoVitalesData($("#id_sig").val(), $("#id_eva_card").val());

            $('#saveEditSigVit').prop("disabled", true);
        });



      

  $(document).on('click', '#resetFormSigVit', function(event) {
         event.preventDefault();
            var li = "paginate-signovitales-li";
            var controller = "signos_vitales";
            var div = "signo-vitales-form";
            resetForm(li, controller, div);
        });

$(document).on('change', '#signos-vitales-form :input', function(event) {

     var els = $('#signos-vitales-form :input').filter(function() {
                return this.value !== "" && this.value !== "0" && this.value !== "0.00";
            });

            if (els.length > 0) {
                $('#signos-vitales-form-inputs').val(1);
            } else {
                $('#signos-vitales-form-inputs').val(0);
            }

        });
 
 
 $(document).on('change', '#abuse-suspition-form', function(event) {
       var txtarea = $("textarea.txt-abs").filter(function(){ return $(this).val(); }).length;
			 
			if(txtarea==0){
				 $("#abuse-suspition-is-data").val(0);
			}else{
				$("#abuse-suspition-is-data").val(1);
			}

        });
 

var rangoAge =$('#patient_age_range').val();

var timerGli = null;
  $(document).on('keydown', '.signo_v_glicemia', function(event) {
//$('#'+signov_data+'_signo_v_glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal_sv, 1000)
});



function check_if_glicemia_normal_sv() {

var glicemia= $('.signo_v_glicemia').val();

 if(glicemia !="" && (0  >= glicemia  || glicemia <=69 )){
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >"+value+"</i>").slideDown();		
}

else if(glicemia !="" && (70  >= glicemia  || glicemia <=140 )){
	var value="Glicemia " + glicemia + " : paciente normal";
$('.glicemia').html("<i class='bi bi-check-lg text-success'  >"+value+"</i>").slideDown();		
}
else if ((glicemia !="") && (140 > glicemia || glicemia <= 200)) {
	var value="Glicemia " + glicemia + " : paciente pre-diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger text-danger'  >"+value+"</i>").slideDown();	
} 

else if(glicemia !="" && 200 < glicemia)
{
	var value="Glicemia " + glicemia + " : paciente diabetes";
$('.glicemia').html("<i class='bi bi-exclamation-triangle text-danger'  >"+value+"</i>").slideDown();	
}
else{
	$('.glicemia').hide();
}

}


//-----------------frecuencia respiratoire---------------------------------------------
var timerFr = null;
//$('#'+signov_data+'_signo_v_fr').keydown(function(){

  $(document).on('keydown', '.signo_v_fr', function(event) {
  	
calculateFrequency();
});

function calculateFrequency(){

	  var funct;
       clearTimeout(timerFr); 
	   if(rangoAge=='recien nacido (0-6 semanas)'){
		   funct=frecuencia_respiratoriaRN;
		   }
		   else if (rangoAge=='infante (7 semanas -1 año)' || rangoAge=='lactante mayor'  || rangoAge=='pre-escolar')
		   {
			   funct=frecuencia_respiratoriaILP;
		   } 
		  
		   else if (rangoAge=='escolar' || rangoAge=='adolescente' || rangoAge=='adulto')
		   {
			funct=frecuencia_respiratoriaEAA;   
		   }
		  
		  
		   else{}
       timerFr = setTimeout(funct, 1000)	
}

function frecuencia_respiratoriaRN() {
var signo_v_fr= $('.signo_v_fr').val();

if(signo_v_fr =="") 
{
$('.signo_fr_result').text('');
} 
else if(40 <= signo_v_fr && signo_v_fr <= 45){
$('.signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger'  > anormal</i>");
}
}

function frecuencia_respiratoriaILP() {
	var signo_v_fr= $('.signo_v_fr').val();
	
if(signo_v_fr =="") 
{
$('.signo_fr_result').text('');
}	
	
else if(20 <= signo_v_fr && signo_v_fr <= 30){
$('.signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuencia_respiratoriaEAA() {
	var signo_v_fr= $('.signo_v_fr').val();
	
if(signo_v_fr =="") 
{
$('.signo_fr_result').text('');
}	
	
else if(12 <= signo_v_fr && signo_v_fr <= 20){
$('.signo_fr_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
	}
 else{
$('.signo_fr_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



//-----------------frecuencia cardiaca---------------------------------------------
var timerFc = null;
//$('#'+signov_data+'_signo_v_fc').keydown(function(){
	 $(document).on('keydown', '.signo_v_fc', function(event) {

	calculateFrequencyCardia();
});

function calculateFrequencyCardia(){
	  var funfc;
       clearTimeout(timerFc); 
	   if(rangoAge=='recien nacido (0-6 semanas)'){
		   funfc=frecuenciaCardiacaRn;
		   }
		   else if (rangoAge=='infante (7 semanas -1 año)')
		   {
			   funfc=frecuenciaCardiacaInf;
		   }

      else if (rangoAge=='lactante mayor')
		   {
			   funfc=frecuenciaCardiacaLm;
		   }		   
		   else if (rangoAge=='pre-escolar')
		   {
			funfc=frecuenciaCardiacaPs;   
		   } 
		    else if (rangoAge=='escolar')
		   {
			funfc=frecuenciaCardiacaEs;   
		   }
		   else if (rangoAge=='adolescente')
		   {
			funfc=frecuenciaCardiacaAdo;   
		   }
		   
		  else if (rangoAge=='adulto')
		   {
			funfc=frecuenciaCardiacaAdu;   
		   }
		  
		  else{}
       timerFc = setTimeout(funfc, 1000)
}



function frecuenciaCardiacaAdu() {
	var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(60 <= signo_v_fc && signo_v_fc <= 80){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuenciaCardiacaRn() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(120 <= signo_v_fc && signo_v_fc <= 140){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function frecuenciaCardiacaInf() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 130){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}



function frecuenciaCardiacaLm() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(100 <= signo_v_fc && signo_v_fc <= 120){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuenciaCardiacaPs() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 120){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}


function frecuenciaCardiacaEs() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(80 <= signo_v_fc && signo_v_fc <= 100){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}

function frecuenciaCardiacaAdo() {
var signo_v_fc= $('.signo_v_fc').val();
	
if(signo_v_fc =="") 
{
$('.signo_fc_result').text('');
}	
	
else if(70 <= signo_v_fc && signo_v_fc <= 80){
$('.signo_fc_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_fc_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");
}
}





//----frecuencia temperatura-------------------

var timerTp = null;
//$('#'+signov_data+'_signo_v_temp').keydown(function(){
	$(document).on('keydown', '.signo_v_temp', function(event) {
	calculateFrequencyTemp();
});
function calculateFrequencyTemp(){
  var funtp;
       clearTimeout(timerTp); 
	   if(rangoAge=='recien nacido (0-6 semanas)'){
		   funtp=frecuenciaTempoRn;
		   }
		   else if (rangoAge=='infante (7 semanas -1 año)' || rangoAge=='lactante mayor' || rangoAge=='pre-escolar')
		   {
			   funtp=frecuenciaTempoILP;
		   }

      else if (rangoAge=='escolar')
		   {
			   funtp=frecuenciaTempEsc;
		   }		   
		   else if (rangoAge=='adolescente')
		   {
			funtp=frecuenciaTempAdo;   
		   } 
		   
		   
		     else if (rangoAge=='adulto')
		   {
			funtp=frecuenciaTempAdu;   
		   }
		  
		  else{}
       timerTp = setTimeout(funtp, 1000)	
}


function frecuenciaTempAdo() {
	var signo_v_temp= $('.signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result').text('');
}	
	
else if(signo_v_temp == 37){
$('.signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTempAdu() {
	var signo_v_temp= $('.signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result').text('');
}	
	
else if(36.2 <= signo_v_temp && signo_v_temp <= 37.2){
$('.signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTempEsc() {
	var signo_v_temp= $('.signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result').text('');
}	
	
else if(37 <= signo_v_temp && signo_v_temp <= 37.5){
$('.signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTempoILP() {
	var signo_v_temp= $('.signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result').text('');
}	
	
else if(37.5 <= signo_v_temp && signo_v_temp <= 37.8){
$('.signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTempoRn() {
	var signo_v_temp= $('.signo_v_temp').val();
	
if(signo_v_temp =="") 
{
$('.signo_temp_result').text('');
}	
	
else if(signo_v_temp == 38){
$('.signo_temp_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.signo_temp_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial sistolica-------------------------------------------
$(document).on('keyup', '.signo_v_ta_mm', function(event) {
calculateFrequencySist();
$('.0_cp_tension_art_max').val($(this).val());
$("#doesContPrFomHsData").val(1);
});

function calculateFrequencySist(){
	var timerTa = null;
//$('#'+signov_data+'_signo_v_ta_mm').keydown(function(){
	  var funta;
       clearTimeout(timerTa); 
	   if(rangoAge=='recien nacido (0-6 semanas)'){
		   funta=frecuenciaTensionArtRn;
		   }
		   else if (rangoAge=='infante (7 semanas -1 año)')
		   {
			   funta=frecuenciaTensionArtInf;
		   }

       else if (rangoAge=='lactante mayor')
		   {
			   funta=frecuenciaTensionArtLm;
		   }

        else if (rangoAge=='pre-escolar')
		   {
			funta=frecuenciaTensionArtPs;   
		   } 

       else if (rangoAge=='escolar')
		   {
			funta=frecuenciaTensionArtEsc;  
			
		   } 
		   
		   else if (rangoAge=='adolescente')
		   {
			funta=frecuenciaTensionArtAdo;   
		   } 
		   
		   
		     else if (rangoAge=='adulto')
		   {
			funta=frecuenciaTensionArtAdu;   
		   }
		  
		  else{}
       timerTa = setTimeout(funta, 1000)
}

function frecuenciaTensionArtEsc() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(104 <= signo_v_ta_mm && signo_v_ta_mm <= 124){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}



function frecuenciaTensionArtPs() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(99 <= signo_v_ta_mm && signo_v_ta_mm <= 112){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTensionArtLm() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(90 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function frecuenciaTensionArtInf() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(84 <= signo_v_ta_mm && signo_v_ta_mm <= 106){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function frecuenciaTensionArtRn() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(70 <= signo_v_ta_mm && signo_v_ta_mm <= 100){
$('#'+signov_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function frecuenciaTensionArtAdo() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(118 <= signo_v_ta_mm && signo_v_ta_mm <= 132){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


function frecuenciaTensionArtAdu() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(110 <= signo_v_ta_mm && signo_v_ta_mm <= 140){
$('.tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}




//------Tansion arterial diastolica-------------------------------------------
var timerTad = null;
$(document).on('keyup', '.signo_v_ta_hg', function(event) {
//$('#'+signov_data+'_signo_v_ta_hg').keydown(function(){
 calculateFrequencyDiast();
$('.0_cp_tension_art_min').val($(this).val());
});

function calculateFrequencyDiast(){
 var funtad;
       clearTimeout(timerTad); 
	   if(rangoAge=='recien nacido (0-6 semanas)'){
		   funtad=frecuenciaTensionArtRnd;
		   }
		   else if (rangoAge=='infante (7 semanas -1 año)')
		   {
			   funtad=frecuenciaTensionArtInfd;
		   }

       else if (rangoAge=='lactante mayor')
		   {
			   funtad=frecuenciaTensionArtLmd;
		   }

        else if (rangoAge=='pre-escolar')
		   {
			funtad=frecuenciaTensionArtPsd;   
		   } 

       else if (rangoAge=='escolar')
		   {
			funtad=frecuenciaTensionArtEscd;   
		   } 
		   
		   else if (rangoAge=='adolescente')
		   {
			funta=frecuenciaTensionArtAdod;   
		   } 
		   
		   
		     else if (rangoAge=='adulto')
		   {
			funtad=frecuenciaTensionArtAdud;  
			
		   }
		  
		  else{}
       timerTad = setTimeout(funtad, 1000)	
}



function frecuenciaTensionArtAdud() {
	var signo_v_ta_hg= $('.signo_v_ta_hg').val();

if(signo_v_ta_hg =="") 
{
$('.tens_art_dias_result').text('');
}	
	
else if(70 <= signo_v_ta_hg && signo_v_ta_hg <= 90){
$('.tens_art_dias_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_dias_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}


// calcul peso----------
$(document).on('keyup', '.signo_v_peso_lb', function(event) {
//$('#'+signov_data+'_signo_v_peso_lb').keyup(function () {
    var peso = $(this).val();
    var talla = $('.signo_v_talla').val();
    if (peso == '') {
        $('.signo_v_talla').prop('disabled', true);
        $('.signo_v_talla').val('');
        $('.signo_v_talla_imc').prop('disabled', true);
        $('.signo_v_talla_imc').val('');
    } else {
        $('.signo_v_talla').prop('disabled', false);
    }
    var ma = peso * 0.45;
    $('.signo_v_peso_kg').val(ma).number(true, 2);
    //$('.signo_v_peso_kg').number(true, 2);

    calculIMCsv();
	$('.0_cp_peso').val(peso);
	$("#doesContPrFomHsData").val(1);
});


$(document).on('keyup', '.signo_v_talla', function(event) {

	$('.signo_v_talla_m').val($(this).val() * 39.37).number( true, 2);
	
	calculIMCsv();
	});
	



function calculIMCsv(){
 var peso =$('.signo_v_peso_kg').val();
// alert(peso);
 var talla = $('.signo_v_talla').val();
var cal1 = talla * talla;
var imc_result = peso / cal1;
$('.signo_v_talla_imc').val(imc_result).number( true, 2 );
//$('.signo_v_talla_imc').val(imc_result);	
console.log($('.signo_v_peso_kg').val());
}


 
 
 
    $('input[name='+ant_uro_data+'_uro_sin_ha_1]').on('click', function(){
				trueFalseSinHazUro($(this), 1);
				});
				$('input[name='+ant_uro_data+'_uro_sin_ha_2]').on('click', function(){
				trueFalseSinHazUro($(this), 2);
				});
				 
			function trueFalseSinHazUro(check, pos){
					
					if ( check.is(':checked') ) {
				$(".disabled-antes"+pos+" textarea").val("");
				$(".disabled-antes"+pos+" input").val("");
				$(".disabled-antes"+pos+" input").prop("checked", 0);
				$(".disabled-antes"+pos+" input").prop("disabled", 1);
				$(".disabled-antes"+pos+" textarea").prop("disabled", 1);
				} 
				else {
				$(".disabled-antes"+pos+" input").prop("disabled", 0);
				$(".disabled-antes"+pos+" textarea").prop("disabled", 0);
				}
				}
				
			 $(document).on('click', '#saveEditAntUroPerFam', function(event) {	
			event.preventDefault();
			$('#saveEditAntUroPerFam').prop("disabled", true);	
            saveUrologyAntPerFam($("#ant_uro_per_fam_id").val());

			});
 
 
 
 $(document).on('change', '#exam-fisico-uro-form', function(event) {
 
 	var txtarea = $("textarea.txtexfuro").filter(function(){ return $(this).val(); }).length;
	console.log(txtarea);
			if(txtarea==0){
				 $("#exfisuro-form-inputs").val(txtarea);
			}else{
				$("#exfisuro-form-inputs").val(1);
			}

        });



 var ant_ex_uro_data = $("#id_uroex").val();

 $('input[name='+ant_ex_uro_data+'_tacto_rect_check]').on('click', function(){
					if ( $(this).is(':checked') ) {
						
				$(".hide-tacto-rectal").hide(100);
				} 
				else {
				$(".hide-tacto-rectal").show(100);
				}
				});



$(document).on('click', '#saveEditExamUro', function(event) {
$('#saveEditExamUro').prop("disabled", true);
 //saveCanvasUrology();
 saveUroExamFis($("#id_exam_uro").val());

});

$(document).on('click', '#resetFormExamUro', function(event) {
	 event.preventDefault();
var li = "paginate-uro-exam-fis-li";
var controller = "urology";
 var div ="uro-exam-fis-form";
 resetForm(li,controller,div);
});
 
 
 
 
 
 
 
 
 
 
 function runSpeechRecognition(quill, output,action) {

var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var recognition = new SpeechRecognition();
action.style.visibility = 'visible';
// This runs when the speech recognition service starts
recognition.onstart = function() {
action.innerHTML = "<em>escuchando, habla...</em>";
};

recognition.onspeechend = function() {

action.innerHTML = "<em>grabación terminó...</em>";
setTimeout(() => {
action.style.visibility = 'hidden';
}, 2000);



recognition.stop();
if(output.id =="quill-editor-enfermedad-actual-sinopsis_"+id_enf_act){
$("#copiar-estudios-div").show();
}
}

// This runs when the speech recognition service returns result
recognition.onresult = function(event) {
var transcript = event.results[0][0].transcript;
var confidence = event.results[0][0].confidence;
//output.innerHTML = "<b>Text:</b> " + transcript + "<br/> <b>Confidence:</b> " + confidence*100+"%";
//output.classList.remove("hide");
//output.value=transcript;
//output.value += transcript + " ";

quill.root.innerHTML += transcript;
};

// start recognition
recognition.start();
}

	
			
	var fecha_ul_pap_txt = $("#fecha_ul_pap_txt").val();
var fecha_ul_mama_txt = $("#fecha_ul_mama_txt").val();

	  
	  $(document).on('change', '#ssr-form', function(event) {
	 
  var countCheckedRadio = $('#ssr-form input[type="radio"]').filter(':checked').length;
  
  
   var txtinput = $('input.txt-inp-ssr').filter(function() {
                return this.value !== "" && this.value !== "0";
            });

       //  var txtinput= $("input.txt-inp-ssr").filter(function(){ return $(this).val(); }).length;
		 
			var txtarea = $("textarea.txt-ares-ssr").filter(function(){ return $(this).val(); }).length;
			  $("#ssr-form-radio").val(countCheckedRadio);
			if(txtinput.length ==0 && txtarea==0){
				 $("#ssr-form-inputs").val(0);
			}else{
				$("#ssr-form-inputs").val(1);
			}

        });
	  
	  
	  
	  
	    $(document).on('change, input', '#cardvas-examr-form', function(event) {
	 
  var countCheckedRadio = $('#cardvas-examr-form input[type="radio"]').filter(':checked').length;
  
 
	var txtarea = $("textarea.txt-area-rstcardio").filter(function(){ return $(this).val(); }).length;
	
			  $("#cardvas-examr-form-radio").val(countCheckedRadio);
			if(txtarea==0){
				 $("#cardvas-examr-form-inputs").val(0);
			}else{
				$("#cardvas-examr-form-inputs").val(1);
			}

        });
	  
	  
	
	  
    var ssr_data = $("#ssr_data").val();
	
	
	 $(document).on("change", ".ciclo-mens-action", function() {
	
      var val = $(".ciclo-mens-action:checked").val();
      if (val == 'Irregulares') {
        $('#' + ssr_data + '_show_ciclo_irreg').slideDown();
      } else {
        $('#' + ssr_data + '_show_ciclo_irreg').slideUp();
      }
    });

$(document).on("change", ".planif-method", function() {

      var val = $(".planif-method:checked").val();
      if (val == 'Si') {
        $('#' + ssr_data + '_planif-method-div').slideDown();
      } else {
        $('#' + ssr_data + '_planif-method-div').slideUp();
        $('#' + ssr_data + '_planif-method-text').val("");
      }
    });
 $(document).on("change", ".complication-emb-action", function() {
   
      var val = $(".complication-emb-action:checked").val();
      if (val == 'Si') {
        $('.complica_dur_show').slideDown();
      } else {
        $('.complica_dur_show').slideUp();
      }
    });




 $(document).on("change", ".ha-tenido-relacion-sex", function() {
  
      var val = $(".ha-tenido-relacion-sex:checked").val();
	  if (val == 'No') {
	  $(".disabled-all-fields-ha-tenido-re-sex textarea").val("");
	  $(".disabled-all-fields-ha-tenido-re-sex input").val("");
	  $(".disabled-all-fields-ha-tenido-re-sex select").val("");
				$(".disabled-all-fields-ha-tenido-re-sex input").prop("checked", 0);
				$(".disabled-all-fields-ha-tenido-re-sex input").prop("disabled", 1);
				$(".disabled-all-fields-ha-tenido-re-sex textarea").prop("disabled", 1);
				$(".disabled-all-fields-ha-tenido-re-sex select").prop("disabled", 1);
				} 
				else {
				$(".disabled-all-fields-ha-tenido-re-sex input").prop("disabled", 0);
				$(".disabled-all-fields-ha-tenido-re-sex textarea").prop("disabled", 0);
				$(".disabled-all-fields-ha-tenido-re-sex select").prop("disabled", 0);
				}
	  
    });

 $(document).on("change", ".pedia-evo-radio", function() {
  
      var val = $(".pedia-evo-radio:checked").val();
	  if (val == 'normal') {
	  $(".pedia-evo-text").val("");
	$(".pedia-evo-text").prop("disabled", 1);
	
				} 
				else {
			$(".pedia-evo-text").prop("disabled", 0);
				}
	  
    });
 




    $(document).on("change", ".infec-trans", function() {
		
      var val = $(".infec-trans:checked").val();
      if (val == 'Si') {
        $('.show-infection-options').slideDown();
      } else {
        $('.show-infection-options').slideUp();
        $('.unchecked-inf-opt').prop("checked", false);
      }
    });


  $(document).on("change", ".ant-pap-res-al", function() {

      var val = $(".ant-pap-res-al:checked").val();
      if (val == 'Si') {
        $('.show-ant-pap-res-al').slideDown();
      } else {
        $('.show-ant-pap-res-al').slideUp();
        $('.ant_pap_re_text').val("");
      }
    });


   $(document).on('change', '.complicassr-option', function() {

      var val = $(".complicassr-option:checked").val();

      if (val == 'Si') {
        $('.show-complica-text').slideDown();
      } else {
        $('.show-complica-text').slideUp();
        $('.complica_text').val("");
      }
    });


  $(document).on('change', '.prueba_vih_option', function() {
  var val = $(".prueba_vih_option:checked").val();
      if (val == 'Si') {
        $('.prueba_vih_show').slideDown();
      } else {
		  $('.prueba_vih_resultado').val("");
        $('.prueba_vih_show').slideUp();
		
       
      }
    });
	
	
	  $(document).on('change', '.fecha-ul-pap', function() {
	
     if ($(this).val() == 'Nunca' ||
        $(this).val() == 'Mas de tres años' ||
        $(this).val() == 'Entre uno a tres años') {
        $('.alert-pap').val(1);
        var texto = " Fecha de ultima PAP : " + $(this).val();
        $('.fecha-ultima-pap-value').html($('.fecha-ultima-pap-value').val() + texto).addClass('text-danger');

      } else {
        $('#' + ssr_data + '_alert-pap').val(0);
        $('.fecha-ultima-pap-value').text("");
      }
      showHeaderLiAlterPapMamo();
    });


 $(document).on('change', '.fecha-ul-mama', function() {

     if ($(this).val() == 'Nunca' ||
        $(this).val() == 'Mas de tres años' ||
        $(this).val() == 'Entre uno a tres años') {
        $('.alert-mama').val(1);
        var texto = " Fecha de ultima mamografía : " + $(this).val();
        $('.fecha-ultima-mama-value').html($('.fecha-ultima-mama-value').val() + texto).addClass('text-danger');
        $('.li3').slideDown();
      } else {
        $('.alert-mama').val(0);

        $('.fecha-ultima-mama-value').text("");
      }
      showHeaderLiAlterPapMamo();
    });


    showPapMamoAlertOnLoad();

    function showPapMamoAlertOnLoad() {
      if ($('.alert-mama').val() == 1 || $('.alert-pap').val() == 1) {
        $('.li3').slideDown();
        $('.fecha-ultima-pap-value').html(fecha_ul_pap_txt).addClass('text-danger');
        $('.fecha-ultima-mama-value').html(fecha_ul_mama_txt).addClass('text-danger');
      } else {
        $('.li3').slideUp();
      }
    }


    function showHeaderLiAlterPapMamo() {
      if ($('.alert-mama').val() == 1 || $('.alert-pap').val() == 1) {
        $('.li3').slideDown();
      } else {
        $('.li3').slideUp();
      }
    }


 $(document).on('change', '.autoexam-mamario', function() {

      var val = $(".autoexam-mamario:checked").val();
      if (val == 'Si') {
        $('.show-autoexam-mamario').slideDown();
      } else {
        $('.show-autoexam-mamario').slideUp();
        $('.realiza_auto_text').val("");
      }
    });




$(document).on('keyup', '.totgen', function(event) {

      var sum = 0;
      $('.totgen').each(function() {
        sum += Number($(this).val());
      });

      $('.totalGest').val(sum);

    });

    
     $(document).on('click', '#saveEditSsr', function(event) {
      event.preventDefault();
	  $('#saveEditSsr').prop("disabled", true); 
    saveSSR($("#idssr").val());

    });

$(document).on('click', '#resetFormSsr',function(event) {
      event.preventDefault();
      var li = "paginate-ssr-li";
      var controller = "ssr";
      var div = "ssr-form";
      resetForm(li, controller, div);
      $('html, body').animate({
        scrollTop: $("#ssr").offset().top
      });

    });
				
				

  
 $(document).on('keyup', '.obs_sono1', function(e) {

      var fecha1 = $(".obs_fecha1").val();

      $(".obs_sonodia1").val("");
      $(".obs_dia-rest1").val("");
      var today = moment();
      var fl1 = moment(fecha1);
      var sono1 = $(".obs_sono1").val();
      //add semana to today
      var weekToHoy = today.add('weeks', sono1);
      //difference of week between weekToHoy
      semRest = weekToHoy.diff(fl1, "weeks");
      $(".obs_rest1").val(semRest);
      //-----CALCUL FPP------------
      var weekLeft = 40 - $(".obs_sono1").val();
      var result = moment(fl1).add('weeks', weekLeft);
      var fpp = moment(result).format('D MMMM YYYY');
      $(".obs_fpp1").val(fpp);

    })


 $(document).on('keyup', '.obs_sonodia1', function(e) {
	
      var sono1 = $(".obs_sono1").val();
      var weekLeft = 40 - sono1;
      var sonodia1 = $(".obs_sonodia1").val();
      var fecha1 = $(".obs_fecha1").val();
      var fl1 = moment(fecha1);
      var result = moment(fl1).add('weeks', weekLeft);
      var dia = moment(result).subtract('days', sonodia1);
      var res = moment(dia).format('D MMMM YYYY');
      $(".obs_fpp1").val(res);

      //------------------------------------
      var today = moment();
      var weekToHoy = today.add('days', sonodia1);
      var diff = moment.duration(weekToHoy.diff(fl1));
      $(".obs_dia_rest1").val(diff.days() % 7);
    })




//--CALCUL FUM SSR -------
 $(document).on('change', '.fecha_ul_m', function() {

      calculateFechaUlPap($("#idssr").val());
	  
	  $(".obs_fum_cal_ges").val($(".fecha_ul_m").val());
	  
		$("#doesContPrFomHsData").val(1);
 //--CALL OBS---
 var dfumcg_link_obs = $(".obs_fum_cal_ges").val();
 var moment1 = moment(dfumcg_link_obs);
 
 calculaFPP_OBS(moment1);
 
  var tiempoAmeno = moment().diff(moment1, "weeks");

	 $(".0_cp_semana").val(tiempoAmeno);
	   if (tiempoAmeno >= 5) {
        $(".obs_sem_act_a").addClass("alert alert-danger");

      } else {

        $(".obs_sem_act_a").addClass("alert alert-success");
      }
	  
	  $(".obs_sem_act_a").val(tiempoAmeno + ' semana(s)');
	  
	  $(".show-pregnant").show();
	   //$(".pregnant-weeks").text(tiempoAmeno + ' semana(s)'); 
	  

    });
   
    function calculateFechaUlPap(posId) {
	
	$(".newContPrenaForm").prop("disabled", false);
	$(".clear-msg-ne").html("");
	  var today = moment();
      var fecha_ul_m_c = $("#"+ posId +"_fecha_ul_m").val();
	 
      var moment1 = moment(fecha_ul_m_c);
      var result = moment(moment1).add('days', 14);
      var fUltimaM = moment(result).format('D MMMM YYYY');

      var menosDay = moment(result).subtract('days', 3);
      var menosDay1 = moment(menosDay).format('D MMMM YYYY');


      var masDay = moment(result).add('days', 3);
      var masDay1 = moment(masDay).format('D MMMM YYYY');
      var tiempoAmeno = today.diff(moment1, "weeks");
      if (tiempoAmeno >= 5) {
        $("#"+ posId + "_fecha-ovulacion").addClass("alert alert-danger");

      } else {

        $("#"+ posId + "_fecha-ovulacion").addClass("alert alert-success");
      }

      var diff = moment.duration(today.diff(moment1));
      if (diff.days() % 7 == 0) {
        var diaLeft = "";
      } else {
        var diaLeft = diff.days() % 7 + ' dia(s)';
      }
      $("#"+ posId + "_fecha-ovulacion").html(`Fecha de ovulación: ${fUltimaM} <br/>  Semana fertil :${menosDay1} hasta ${masDay1} <br/>  Tiempo amenorea :${tiempoAmeno} semana(s) ${diaLeft}`);
    }


//--CALCUL FUM OBS -------


     $(document).on('change', '.obs_fum_cal_ges',  () => {
		  var today = moment();
      //$(".obs_sem_act_a").css("color", "green");
      $(".obs_fpp_cal_ges").css("color", "green");
      var dfumcg_link = $(".obs_fum_cal_ges").val();
	  //$(".fecha_ul_m").val(dfumcg_link);
	 
      var moment1o = moment(dfumcg_link);
	  
      //var nextyear = moment(moment1o).add('years', 1);
      //var nextyearmonth = moment(nextyear).subtract('months', 3);
      //var nextyearmonthday = moment(nextyearmonth).add('days', 7);
      //var fppsem = moment(nextyearmonthday).format('D MMMM YYYY');
      var resulto = moment(moment1o).add('days', 14);

      var masDayo = moment(resulto).add('days', 3);
      var masDay1o = moment(masDayo).format('D MMMM YYYY');

      var menosDayo = moment(resulto).subtract('days', 3);
      var menosDay1o = moment(menosDayo).format('D MMMM YYYY');
	  
	   var tiempoAmeno = today.diff(moment1o, "weeks");
	  
	  calculateTiempoAmorrea(tiempoAmeno);
	  
      //$(".obs_sem_act_a").val(menosDay1o + ' hasta ' + masDay1o);
	  
	  
      //$(".obs_fpp_cal_ges").val(fppsem);
	  calculaFPP_OBS(moment1o);
    });
	
	
	function calculaFPP_OBS(fpp_field){
		
	var nextyear = moment(fpp_field).add('years', 1);
var nextyearmonth = moment(nextyear).subtract('months', 3);
var nextyearmonthday = moment(nextyearmonth).add('days', 7);
var fppsem = moment(nextyearmonthday).format('D MMMM YYYY');
 $(".obs_fpp_cal_ges").val(fppsem);	
	}
	
	
	
	

if($("#database-amorrea-semana").val()){
calculateTiempoAmorrea($("#database-amorrea-semana").val());
}
function calculateTiempoAmorrea(tiempoAmeno){

	$("#doesContPrFomHsData").val(1);
 //--CALL SSR---
 var dfumcg_link_obs = $(".obs_fum_cal_ges").val();
	$(".fecha_ul_m").val(dfumcg_link_obs);
	  calculateFechaUlPap(0);
		 $(".0_cp_semana").val(tiempoAmeno);
	   if (tiempoAmeno >= 5) {
        $(".obs_sem_act_a").addClass("alert alert-danger");

      } else {

        $(".obs_sem_act_a").addClass("alert alert-success");
      }
	  
	  $(".obs_sem_act_a").val(tiempoAmeno + ' semana(s)');
	  
	  $(".show-pregnant").show();
	   //$(".pregnant-weeks").text(tiempoAmeno + ' semana(s)'); 
	  }



$(document).on('click', '#resetFormObs',function(event) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: $("#obs").offset().top
      });
      var li = "paginate-obs-li";
      var controller = "obs";
      var div = "obs-form";
      resetForm(li, controller, div);
    });
	
	
	 $(document).on('click', '#saveEditAntObs', function(event) {
      event.preventDefault();
	  $('#saveEditAntObs').prop("disabled", true);
      saveOBS($("#idObs").val());
   
 });
 
  $(document).on('change', '#exam-fisico-form', function(event) {
    	var txtinput= $("input.txt-inp-ext").filter(function(){ return $(this).val(); }).length;
			var txtarea = $("textarea.txt-ares-exf").filter(function(){ return $(this).val(); }).length;
			
			if(txtinput ==0 && txtarea==0){
				 $("#exam-fisico-form-inputs").val(0);
			}else{
				$("#exam-fisico-form-inputs").val(1);
			}

        });
		
		$(document).on('click', '#saveEditExamFisico', function(event) {
         
			event.preventDefault();
			//if($("#isGinecoloyMamas").val()==1){
			 // saveCanvasExamenMamas();
			//}
			   $('#saveEditExamFisico').prop("disabled", true);
			 saveExamenFisicoData($("#id_exam_fis").val(), $("#id_eva_card").val());
			});
			
			
			
			  // Denotes total number of rows
    
 var showAddCurrentDateCp = servicio_name_to_show.includes("GINECO");
		 if(showAddCurrentDateCp){
	    addCurrentDateCp();
		 }


 function addCurrentDateCp(){
	
var field = document.querySelector('.currentDateCp');
var date = new Date();

// Set the date
field.value = date.getFullYear().toString() + '-' + (date.getMonth() + 1).toString().padStart(2, 0) + 
    '-' + date.getDate().toString().padStart(2, 0);
}



           // jQuery button click event to remove a row.
		
           $(document).on('click', '.remove-cont-prenatal-row', function() {

             // Getting all the rows next to the row
             // containing the clicked button
             var child = $(this).closest('tr').nextAll();

             // Iterating across all the rows 
             // obtained to change the index
             child.each(function() {

               // Getting <tr> id.
               var id = $(this).attr('id');

               // Getting the <p> inside the .row-index class.
               var idx = $(this).children('.row-index').children('p');

               // Gets the row number from <tr> id.
               var dig = parseInt(id.substring(1));

               // Modifying row index.
               idx.html(`Row ${dig - 1}`);

               // Modifying row id.
               $(this).attr('id', `R${dig - 1}`);
             });

             // Removing the current row.
             $(this).closest('tr').remove();

             // Decreasing total number of rows by 1.
             rowIdx--;
           });

$(document).on('click', '#endPregnancyBtn', function(event) {
 
      event.preventDefault();
      $("#paginate-control-prenatal-li li.active").removeClass("active"); 

$("#control-prenatal-form").load(base_url+"control_prenatal/endPregnancy?id_registro="+$(".con_pren_id_registro").val());	
	$("#reloadNewPregBtn").load(base_url+"control_prenatal/showBtnNewControlP?id_registro="+$(".con_pren_id_registro").val());	  
	  
    });


 $(document).on('click', '#newContPrenaForm', function(event) {
 
      event.preventDefault();
      $("#paginate-control-prenatal-li li.active").removeClass("active"); 

$("#control-prenatal-form").load(base_url+"control_prenatal/newPregnancy");	
	  
	  
    });




		
			$(document).on('click', '#paginate-examfisico-li li', function() {

			var display_content = "#examfisico-form";
			var controller = "examfisico";
			var pageNum = this.id;
			$("#paginate-examfisico-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});
		
		
		
			$(document).on('click', '#paginate-examsistema-li li', function() {

			var display_content = "#examsistema-form";
			var controller = "examsistema";
			var pageNum = this.id;
			$("#paginate-examsistema-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
		
		
		
			$(document).on('click', '#paginate-cardvas-examr-li li', function() {
           var display_content = "#cardvas-examr-form";
			var controller = "cardioVexRsult";
			var pageNum = this.id;
			$("#paginate-cardvas-examr-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
		
		
		
			$(document).on('click', '#resetExamSist', function(event) {

		event.preventDefault();
		var li = "examsistema-enf-li";
		var controller = "examsistema";
		var div ="examsistema-form";
		resetForm(li,controller,div);
		}); 
		
		
		
			$(document).on('click', '#resetExamRstCrdv', function(event) {

		event.preventDefault();
		var li = "paginate-cardvas-examr-li";
		var controller = "cardioVexRsult";
		var div ="cardvas-examr-form";
		resetForm(li,controller,div);
		});
		
		
		
		
		$(document).on('click', '#saveEditExamSist', function(event) {
		event.preventDefault();
          $('#saveEditExamSist').prop("disabled", true); 
         saveExamenSistema($("#id_exam_sist").val());

        });
		
		
		
		$(document).on('click', '#saveEditExamRstCrdv', function(event) {
		event.preventDefault();
          $('#saveEditExamRstCrdv').prop("disabled", true); 
         saveEditExamRstCrdv($("#idexrst").val());

        });
		
		
			$(document).on('click', '#paginate-vascular_surgeon-li li', function() {
           var display_content = "#vascular_surgeon-form";
			var controller = "vascular_surgeon";
			var pageNum = this.id;
			loadQuillEnfHistEndoVascular(pageNum);
			$("#paginate-vascular_surgeon-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});
		
		
		
			$(document).on('click', '#paginate-vascular_surgeon_hist-li li', function() {
 	var display_content = "#vascular_surgeon_hist-form";
			var controller = "vascular_surgeon_hist";
			var pageNum = this.id;
			$(".hide-hist-enf-endo").hide();
			$("#paginate-vascular_surgeon_hist-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
 $(".spinner-border").hide();
		
		});
		
		$(document).on('click', '#resetforHistEndo', function() {
			$("#paginate-vascular_surgeon_hist-li li.active").removeClass("active");
			$(".hide-hist-enf-endo").show();
			$("#vascular_surgeon_hist-form ").html("");
		});
		
			$(document).on('click', '#paginate-obs-li li', function() {

			var display_content = "#obs-form";
			var controller = "obs";
			var pageNum = this.id;
			$("#paginate-obs-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
		
		
		
		$(document).on('click', '#paginate-ssr-li li', function() {
		 var display_content = "#ssr-form";
			var controller = "ssr";
			var pageNum = this.id;
			$("#paginate-ssr-li li.active").removeClass("active");
			$(this).addClass("active");
	
          	paginateLiForm(display_content, controller, pageNum);
	

		});
		
		
		  $(document).on('change', '#obs-form', function(event) {
		
  var countCheckedRadio = $('#obs-form input[type="radio"]').filter(':checked').length;
    var countCheckedChkObs = $('#obs-form input[type="checkbox"]').filter(':checked').length;
  
   var txtinput = $('input.txt-inp-obs').filter(function() {
                return this.value !== "" && this.value !== "0";
            });
			
			$("#obs-form-chkb").val(countCheckedChkObs);
			
			
  $("#obs-form-radio").val(countCheckedRadio);
			if(txtinput.length ==0){
				 $("#obs-form-inputs").val(0);
			}else{
				$("#obs-form-inputs").val(1);
			}

        });
		
		 $(document).on('change input', '#contPrenatal-form', function(event) {
		
      var txtinputCp = $('input.inputContPrenC').filter(function() {
        return this.value !== "" && this.value !== "0";
      });
      var txtareaCp = $("textarea.txArContPrenC").filter(function() {
        return $(this).val();
      }).length;
      if (txtinputCp.length == 0 && txtareaCp == 0) {
        $("#doesContPrFomHsData").val(0);
      } else {
        $("#doesContPrFomHsData").val(1);
      }
    });


 
		
		
		function autoCompleteInput(keyword, table, field_name_in_table, input_name, div_result){

if(keyword==""){
	$("#"+div_result).hide();
	$("#suggestion-grup-lab-list-selected").hide();
}else{
	$.ajax({
type: "POST",
url:base_url+"auto_complete_input/autoCompleteInput",
data:{keyword:keyword, table:table, field_name_in_table:field_name_in_table, input_name:input_name, div_result:div_result},

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

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
}	
}



function saveEditExamRstCrdv(idexrst) {
		
	    var rx_torax_radio = $('input:radio[name=' + idexrst + '_rx_torax_radio]:checked').val();
		   var ekg_radio_radio = $('input:radio[name=' + idexrst + '_ekg_radio_radio]:checked').val();
		      var otros_hallazgo_radio = $('input:radio[name=' + idexrst + '_otros_hallazgo_radio]:checked').val();
	   var rx_torax_txt = $("#" + idexrst + "_rx_torax_txt").val();
            var ekg_radio_txt = $("#" + idexrst + "_ekg_radio_txt").val();
            var otros_hallazgo_txt = $("#" + idexrst + "_otros_hallazgo_txt").val();
            var especifique = $("#" + idexrst + "_especifique").val();
            var evcconclusion = $("#" + idexrst + "_evcconclusion").val();
            var asa = $("#" + idexrst + "_asa").val();
           
      $.ajax({
        type: "POST", 
        url: base_url+"cardioVexRsult/saveEditExamRstCrdv",
        data: {
          rx_torax_radio: rx_torax_radio,
                    ekg_radio_radio: ekg_radio_radio,
                    otros_hallazgo_radio: otros_hallazgo_radio,
                    rx_torax_txt: rx_torax_txt,
                    ekg_radio_txt: ekg_radio_txt,
                    otros_hallazgo_txt: otros_hallazgo_txt,
                    especifique: especifique,
                    evcconclusion: evcconclusion,
                    asa: asa,
                   id: idexrst,
					txtarea:$("#cardvas-examr-form-inputs").val(),
					radios:$("#cardvas-examr-form-radio").val(),
        },
      success: function(data) {
           showalert(data, "alert-success", "alert_placeholder_exam_rstcv");
           $('#saveEditExamRstCrdv').prop("disabled", false);
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
	
	
	
	
	
	
		$(document).on('click', '#saveOphData', function(event) {
		event.preventDefault();
          $('#saveEditExamRstCrdv').prop("disabled", true); 
		  if($("#ophtalmology-form-text").val() > 0){
			
        saveOphtalmology(0);
		  loadQuillEditOftalNota(0);
            var li = "paginate-ophtalmology-li";
            var controller = "ophtalmology";
            var div = "ophtalmology-form";
            resetForm(li, controller, div);
            $.ajax({
        type: "POST",
         url: base_url+"ophtalmology/pagination",
        data: {
			val:''
        },
		  success: function(data) {
			   $('#reload-oph-pag').html(data);  
          $("html, body").animate({
    scrollTop: 0
  }, 1000) 		  
           },
	 

      })
}	
		  else{
			  alert('campo vacillo');
		  }
        });




