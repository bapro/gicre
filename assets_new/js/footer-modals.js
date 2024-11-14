	//--GENERAL REPORT
	var modalGeneralRep = 0;
		var loadGeneralRep= document.getElementById('largeModalReporteGnrl');
		loadGeneralRep.addEventListener('show.bs.modal', function(event) {
			modalGeneralRep++;
			if (modalGeneralRep == 1) {
			loadPagination('modal_report_general');
			//loadQuillReporteGeneral(0);
			loadReporteName(0);
			listFoldersRg();
			}
		})
		
	
if($("#aside-area-doc").val()=='evaluacion-dardiovascular'){

	var modalCardioV= 0;
		var loadCardioV= document.getElementById('cardiovasEval');
		loadCardioV.addEventListener('show.bs.modal', function(event) {
			modalCardioV++;
			if (modalCardioV == 1) {
				
			loadPagination('eva_cardiovascular');
			}
		})	
		
}


	

if($("#aside-area-doc").val()=='ophthalmology'){

	var modalRefraction= 0;
		var loadRefraction= document.getElementById('largeModalRefraction');
		loadRefraction.addEventListener('show.bs.modal', function(event) {
			modalRefraction++;
			if (modalRefraction == 1) {
			loadPagination('refraction');
			}
		})	
		
}


$(document).on('click', '#paginate-coldh-li li', function() {

			var display_content = "#colposcopy-form";
			var controller = "colposcopy";
			var pageNum = this.id;
			$("#paginate-coldh-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});


$(document).on('click', '#removeFormRepGen', function(){ 
 

var del_id = $("#id_report_general").val();

$.ajax({
type:'POST',
url:base_url+'modal_report_general/delete',
data: {id : del_id},
success:function(response) {
   loadPagination('modal_report_general');
    resetForm("paginate-report-general-li","modal_report_general","report-general-form");

}
});

}) 
//reloadRepGenPa();

	
		
		//---ORDEN MEDICA------------------
		
			let loadModalOrdenMedica = 0;
		var exampleModalOrdenMedica = document.getElementById('largeModalOrdenMedica')
		exampleModalOrdenMedica.addEventListener('show.bs.modal', function(event) {
			loadModalOrdenMedica++;

			if (loadModalOrdenMedica == 1) {
				loadPagination("modal_orden_medica");
			}
		})
		
		
	 function immediatePropStopped( event ) {
  var msg = "";
  if ( event.isImmediatePropagationStopped() ) {
    msg = "called";
  } else {
    msg = "not called";
  }
  
}



		let loadModalDescSurgery = 0;
		var exampleModalDescSurgery = document.getElementById('largeModalSurgeryDescription1')
		exampleModalDescSurgery.addEventListener('show.bs.modal', function(event) {
			loadModalDescSurgery++;

			if (loadModalDescSurgery == 1) {
				//listFolders();
				loadPagination("description_surgery", $('#id_patient_hist').val());
				listFoldersDescQ();
			}
		})
		
	




/*


$(document).on('change', '#uploadDocumento', function(event){ 
event.preventDefault();
            var myform = document.getElementById("uploadDocumento");
		
            var fd = new FormData(myform);
            var url = $(this).attr('action');
            var attach_id = "image_file";
			alert(1);
            uploadImageToDatabase(fd, url, attach_id);
        });*/




        $(".onchecked-trans").change(function() {
            var val = $(".onchecked-trans:checked").val();
            if (val == 'Si') {
                $("#unids_transfusion").css('pointer-events', '');
            } else {
                $("#unids_transfusion").css('pointer-events', 'none');
                $("#unids_transfusion").val('');
            }
        });
    

 //loadPagination("description_surgery");

		

		
		
		
		//---LOAD MODAL COLPOSCOPY

		let loadModalColposcopy = 0;
		var exampleModalColposcopy = document.getElementById('largeModalColposcopy')
		exampleModalColposcopy.addEventListener('show.bs.modal', function(event) {
			loadModalColposcopy++;
			if (loadModalColposcopy == 1) {
				loadPagination("colposcopy");

			}
		})
		
		$(document).on('click', '#resetFormColPh', function(event) {
      event.preventDefault();
      var li = "paginate-colposcopy-li";
      var controller = "colposcopy";
      var div = "colposcopy-form";
      resetForm(li, controller, div);
      $("#paginate-coldh-li li.active").removeClass("active");
      paginateLiForm(div, controller, 0);
    })



 	$(document).on('click', '#paginate-coldh-li li', function() {

			var display_content = "#colposcopy-form";
			var controller = "colposcopy";
			var pageNum = this.id;
			$("#paginate-coldh-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
 
$(document).on('click', '#saveEditColPh', function(event) {
    event.preventDefault();
      $('#saveEditColPh').prop("disabled", true);
      var colpos_data = $('#id_colph').val();

      var col_is_preg = $('input:radio[name=' + colpos_data + '_col_is_preg]:checked').val();
      var col_age_known_sex = $('#' + colpos_data + '_col_age_known_sex').val();
      var col_last_pap = $('#' + colpos_data + '_col_last_pap').val();
      var col_ref_motive = $('#' + colpos_data + '_col_ref_motive').val();

      var col_ac_sat = $('input:radio[name=' + colpos_data + '_col_ac_sat]:checked').val();



      var col_local = [];
      $('input[name=' + colpos_data + '_col_local]:checked').each(function() {
        col_local.push(this.value);
      })


      var col_comp_end1 = [];
      $('input[name=' + colpos_data + '_col_comp_end1]:checked').each(function() {
        col_comp_end1.push(this.value);
      })

      var col_comp_end2 = [];
      $('input[name=' + colpos_data + '_col_comp_end2]:checked').each(function() {
        col_comp_end2.push(this.value);
      })

      var col_finding_no = [];
      $('input[name=' + colpos_data + '_col_finding_no]:checked').each(function() {
        col_finding_no.push(this.value);
      })

      var col_finding_minor_change = [];
      $('input[name=' + colpos_data + '_col_finding_minor_change]:checked').each(function() {
        col_finding_minor_change.push(this.value);
      })

      var col_finding_major_change = [];
      $('input[name=' + colpos_data + '_col_finding_major_change]:checked').each(function() {
        col_finding_major_change.push(this.value);
      })

      var col_finding_tenue = [];
      $('input[name=' + colpos_data + '_col_finding_tenue]:checked').each(function() {
        col_finding_tenue.push(this.value);
      })
      var col_finding_show_fast = [];
      $('input[name=' + colpos_data + '_col_finding_show_fast]:checked').each(function() {
        col_finding_show_fast.push(this.value);
      })
      var col_finding_dense = [];
      $('input[name=' + colpos_data + '_col_finding_dense]:checked').each(function() {
        col_finding_dense.push(this.value);
      })



      var col_finding_acet_change = [];
      $('input[name=' + colpos_data + '_col_finding_acet_change]:checked').each(function() {
        col_finding_acet_change.push(this.value);
      })


      var col_finding_image = [];
      $('input[name=' + colpos_data + '_col_finding_image]:checked').each(function() {
        col_finding_image.push(this.value);
      })

      var col_finding_loc_cuad = [];
      $('input[name=' + colpos_data + '_col_finding_loc_cuad]:checked').each(function() {
        col_finding_loc_cuad.push(this.value);
      })

      var col_finding_inf_iz = [];
      $('input[name=' + colpos_data + '_col_finding_inf_iz]:checked').each(function() {
        col_finding_inf_iz.push(this.value);
      })

      var col_finding_inf_der = [];
      $('input[name=' + colpos_data + '_col_finding_inf_der]:checked').each(function() {
        col_finding_inf_der.push(this.value);
      })

      var col_finding_sup_der = [];
      $('input[name=' + colpos_data + '_col_finding_sup_der]:checked').each(function() {
        col_finding_sup_der.push(this.value);
      })

      var col_mos_mos = [];
      $('input[name=' + colpos_data + '_col_mos_mos]:checked').each(function() {
        col_mos_mos.push(this.value);
      })

      var col_ext1 = [];
      $('input[name=' + colpos_data + '_col_ext1]:checked').each(function() {
        col_ext1.push(this.value);
      })

      var col_ext2 = [];
      $('input[name=' + colpos_data + '_col_ext2]:checked').each(function() {
        col_ext2.push(this.value);
      })

      var col_ext3 = [];
      $('input[name=' + colpos_data + '_col_ext3]:checked').each(function() {
        col_ext3.push(this.value);
      })


      var col_ext4 = [];
      $('input[name=' + colpos_data + '_col_ext4]:checked').each(function() {
        col_ext4.push(this.value);
      })

      var col_ext_f = [];
      $('input[name=' + colpos_data + '_col_ext_f]:checked').each(function() {
        col_ext_f.push(this.value);
      })


      var col_ext_g = [];
      $('input[name=' + colpos_data + '_col_ext_g]:checked').each(function() {
        col_ext_g.push(this.value);
      })

      var col_vas_at = [];
      $('input[name=' + colpos_data + '_col_vas_at]:checked').each(function() {
        col_vas_at.push(this.value);
      })


      var col_vas_orq = [];
      $('input[name=' + colpos_data + '_col_vas_orq]:checked').each(function() {
        col_vas_orq.push(this.value);
      })

      var col_vas_s_c = [];
      $('input[name=' + colpos_data + '_col_vas_s_c]:checked').each(function() {
        col_vas_s_c.push(this.value);
      })

      var col_vas_sac = [];
      $('input[name=' + colpos_data + '_col_vas_sac]:checked').each(function() {
        col_vas_sac.push(this.value);
      })

      var col_vas_vad = [];
      $('input[name=' + colpos_data + '_col_vas_vad]:checked').each(function() {
        col_vas_vad.push(this.value);
      })

      var col_vas_dil = [];
      $('input[name=' + colpos_data + '_col_vas_dil]:checked').each(function() {
        col_vas_dil.push(this.value);
      })

      var col_sug_ul = [];
      $('input[name=' + colpos_data + '_col_sug_ul]:checked').each(function() {
        col_sug_ul.push(this.value);
      })

      var col_sug_bor = [];
      $('input[name=' + colpos_data + '_col_sug_bor]:checked').each(function() {
        col_sug_bor.push(this.value);
      })

      var col_sug_sit = [];
      $('input[name=' + colpos_data + '_col_sug_sit]:checked').each(function() {
        col_sug_sit.push(this.value);
      })

      var col_sug_pl = [];
      $('input[name=' + colpos_data + '_col_sug_pl]:checked').each(function() {
        col_sug_pl.push(this.value);
      })

      var col_sug_perf = [];
      $('input[name=' + colpos_data + '_col_sug_perf]:checked').each(function() {
        col_sug_perf.push(this.value);
      })

      var col_sug_elev = [];
      $('input[name=' + colpos_data + '_col_sug_elev]:checked').each(function() {
        col_sug_elev.push(this.value);
      })

      var col_sug_reg = [];
      $('input[name=' + colpos_data + '_col_sug_reg]:checked').each(function() {
        col_sug_reg.push(this.value);
      })

      var col_sug_cent = [];
      $('input[name=' + colpos_data + '_col_sug_cent]:checked').each(function() {
        col_sug_cent.push(this.value);
      })

      var col_sug_irreg = [];
      $('input[name=' + colpos_data + '_col_sug_irreg]:checked').each(function() {
        col_sug_irreg.push(this.value);
      })


      var col_sug_sob = [];
      $('input[name=' + colpos_data + '_col_sug_sob]:checked').each(function() {
        col_sug_sob.push(this.value);
      })

      var col_iodo_pos = [];
      $('input[name=' + colpos_data + '_col_iodo_pos]:checked').each(function() {
        col_iodo_pos.push(this.value);
      })

      var col_iodo_par = [];
      $('input[name=' + colpos_data + '_col_iodo_par]:checked').each(function() {
        col_iodo_par.push(this.value);
      })

      var col_iodo_neg = [];
      $('input[name=' + colpos_data + '_col_iodo_neg]:checked').each(function() {
        col_iodo_neg.push(this.value);
      })


      var col_taking_bio = $('input:radio[name=' + colpos_data + '_col_taking_bio]:checked').val();


      var col_loc_ant = [];
      $('input[name=' + colpos_data + '_col_loc_ant]:checked').each(function() {
        col_loc_ant.push(this.value);
      })

      var col_loc_post_cent = [];
      $('input[name=' + colpos_data + '_col_loc_post_cent]:checked').each(function() {
        col_loc_post_cent.push(this.value);
      })

      var col_loc_iz_cent = [];
      $('input[name=' + colpos_data + '_col_loc_iz_cent]:checked').each(function() {
        col_loc_iz_cent.push(this.value);
      })

      var col_loc_post_cent = [];
      $('input[name=' + colpos_data + '_col_loc_post_cent]:checked').each(function() {
        col_loc_post_cent.push(this.value);
      })

      var col_loc_iz_cent = [];
      $('input[name=' + colpos_data + '_col_loc_iz_cent]:checked').each(function() {
        col_loc_iz_cent.push(this.value);
      })

      var col_loc_de_cent = [];
      $('input[name=' + colpos_data + '_col_loc_de_cent]:checked').each(function() {
        col_loc_de_cent.push(this.value);
      })

      var col_mos_fino = [];
      $('input[name=' + colpos_data + '_col_mos_fino]:checked').each(function() {
        col_mos_fino.push(this.value);
      })

      var col_mos_grueso = [];
      $('input[name=' + colpos_data + '_col_mos_grueso]:checked').each(function() {
        col_mos_grueso.push(this.value);
      })

      var col_real_leg_end = $('input:radio[name=' + colpos_data + '_col_real_leg_end]:checked').val();


      $.ajax({
        type: "POST",
        url: base_url+"colposcopy/saveFields",
        data: {
          col_is_preg: col_is_preg,
          col_age_known_sex: col_age_known_sex,
          col_last_pap: col_last_pap,
          col_ref_motive: col_ref_motive,
          col_ac_sat: col_ac_sat,
          col_local: col_local,
          col_comp_end1: col_comp_end1,
          col_comp_end2: col_comp_end2,
          col_finding_no: col_finding_no,
          col_finding_minor_change: col_finding_minor_change,
          col_finding_major_change: col_finding_major_change,
          col_finding_tenue: col_finding_tenue,
          col_finding_dense: col_finding_dense,
          col_finding_acet_change: col_finding_acet_change,
          col_finding_image: col_finding_image,
          col_finding_loc_cuad: col_finding_loc_cuad,
          col_finding_inf_iz: col_finding_inf_iz,
          col_finding_inf_der: col_finding_inf_der,
          col_finding_sup_der: col_finding_sup_der,
          col_mos_mos: col_mos_mos,
          col_ext1: col_ext1,
          col_ext2: col_ext2,
          col_ext3: col_ext3,
          col_ext4: col_ext4,
          col_ext_f: col_ext_f,
          col_ext_g: col_ext_g,
          col_vas_at: col_vas_at,
          col_vas_orq: col_vas_orq,
          col_vas_s_c: col_vas_s_c,
          col_vas_sac: col_vas_sac,
          col_vas_vad: col_vas_vad,
          col_vas_dil: col_vas_dil,
          col_sug_ul: col_sug_ul,
          col_sug_bor: col_sug_bor,
          col_sug_sit: col_sug_sit,
          col_finding_show_fast: col_finding_show_fast,
          col_sug_pl: col_sug_pl,
          col_sug_perf: col_sug_perf,
          col_sug_elev: col_sug_elev,
          col_sug_reg: col_sug_reg,
          col_sug_cent: col_sug_cent,
          col_mos_grueso: col_mos_grueso,
          col_sug_irreg: col_sug_irreg,
          col_sug_sob: col_sug_sob,
          col_iodo_pos: col_iodo_pos,
          col_iodo_par: col_iodo_par,
          col_iodo_neg: col_iodo_neg,
          col_taking_bio: col_taking_bio,
          col_loc_ant: col_loc_ant,
          col_loc_post_cent: col_loc_post_cent,
          col_loc_iz_cent: col_loc_iz_cent,
          col_mos_fino: col_mos_fino,
          col_loc_de_cent: col_loc_de_cent,
          col_real_leg_end: col_real_leg_end,
          up_by: $('#up_by_colposcopy').val(),
          in_by: $('#in_by_colposcopy').val(),
          in_time: $('#in_time_colposcopy').val(),
          up_time: $('#up_time_colposcopy').val(),
          id: colpos_data
        },
        dataType: 'json',
     
        success: function(response) {
          if (response.status == 1) {
            $('#show-print-colposcopy').html(response.message);
            //if(id==0){
		// loadPagination("colposcopy");
			//}
          } else {
            showalert(response.message, "alert-danger", "alert_placeholder_colph");
          }
          $('#saveEditColPh').prop("disabled", false);
        }


      });
    });
	
	//--VULVOSCOPY-----------------
	
	let loadModalVulvoscopy = 0;
		var exampleModalVulvoscopy = document.getElementById('largeModalVulvoscopy')
		exampleModalVulvoscopy.addEventListener('show.bs.modal', function(event) {
			loadModalVulvoscopy++;
			if (loadModalVulvoscopy == 1) {

				loadPagination("vulvoscopy");
			}
		})
	
	
		$(document).on('click', '#resetFormVulvo', function(event) {
	  event.preventDefault();
      var li = "paginate-vulvoscopy-li";
      var controller = "vulvoscopy";
      var div = "vulvoscopy-form";
      resetForm(li, controller, div);
      $("#paginate-vulvoscopy-li li.active").removeClass("active");
      paginateLiForm(div, controller, 0);
    })



  
  
$(document).on('click', '#save_vulvoscopia', function(event) {
  
      event.preventDefault();
      $('#save_vulvoscopia').prop("disabled", true);
  var idVulvos = $('#idVulvos').val();

      var vulvo_color_white = [];
      $('input[name=' + idVulvos + '_vulvo_color_white]:checked').each(function() {
        vulvo_color_white.push(this.value);
      })


      var vulvo_color_pig = [];
      $('input[name=' + idVulvos + '_vulvo_color_pig]:checked').each(function() {
        vulvo_color_pig.push(this.value);
      })

      var vulvo_color_red = [];
      $('input[name=' + idVulvos + '_vulvo_color_red]:checked').each(function() {
        vulvo_color_red.push(this.value);
      })


      var part_vas_mot = [];
      $('input[name=' + idVulvos + '_part_vas_mot]:checked').each(function() {
        part_vas_mot.push(this.value);
      })


      var part_vas_au = [];
      $('input[name=' + idVulvos + '_part_vas_au]:checked').each(function() {
        part_vas_au.push(this.value);
      })

      var part_vas_mos = [];
      $('input[name=' + idVulvos + '_part_vas_mos]:checked').each(function() {
        part_vas_mos.push(this.value);
      })

      var part_vas_vas = [];
      $('input[name=' + idVulvos + '_part_vas_vas]:checked').each(function() {
        part_vas_vas.push(this.value);
      })

      var vul_loc_ar_mu = [];
      $('input[name=' + idVulvos + '_vul_loc_ar_mu]:checked').each(function() {
        vul_loc_ar_mu.push(this.value);
      })
      var vul_loc_ar_pi = [];
      $('input[name=' + idVulvos + '_vul_loc_ar_pi]:checked').each(function() {
        vul_loc_ar_pi.push(this.value);
      })
      var vul_top_uni = [];
      $('input[name=' + idVulvos + '_vul_top_uni]:checked').each(function() {
        vul_top_uni.push(this.value);
      })



      var vul_top_mul = [];
      $('input[name=' + idVulvos + '_vul_top_mul]:checked').each(function() {
        vul_top_mul.push(this.value);
      })


      var vul_super_sob = [];
      $('input[name=' + idVulvos + '_vul_super_sob]:checked').each(function() {
        vul_super_sob.push(this.value);
      })

      var vul_super_plena = [];
      $('input[name=' + idVulvos + '_vul_super_plena]:checked').each(function() {
        vul_super_plena.push(this.value);
      })

      var vul_super_micro = [];
      $('input[name=' + idVulvos + '_vul_super_micro]:checked').each(function() {
        vul_super_micro.push(this.value);
      })

      var vul_taking_bio = $('input:radio[name=' + idVulvos + '_vul_taking_bio]:checked').val();
      var vul_les_prer_1 = $('#' + idVulvos + '_vul_les_prer_1').val();
      var vul_les_prer_2 = $('#' + idVulvos + '_vul_les_prer_2').val();

      $.ajax({
        type: "POST",
        url: base_url+"vulvoscopy/saveFields",
        data: {
          vulvo_color_white: vulvo_color_white,
          vulvo_color_pig: vulvo_color_pig,
          vulvo_color_red: vulvo_color_red,
          part_vas_au: part_vas_au,
          part_vas_mos: part_vas_mos,
          part_vas_vas: part_vas_vas,
          vul_loc_ar_mu: vul_loc_ar_mu,
          vul_loc_ar_pi: vul_loc_ar_pi,
          vul_top_uni: vul_top_uni,
           vul_top_mul: vul_top_mul,
          vul_super_sob: vul_super_sob,
          vul_super_plena: vul_super_plena,
          vul_super_micro: vul_super_micro,
          vul_taking_bio: vul_taking_bio,
          vul_les_prer_1: vul_les_prer_1,
          vul_les_prer_2: vul_les_prer_2,
		  in_by: $('vul_in_by').val(),
		  up_by: $('#vul_up_by').val(),
          up_time: $('#vul_up_time').val(),
          in_time: $('#vul_in_time').val(),
          id: idVulvos,
          part_vas_mot: part_vas_mot
        },
	   dataType: 'json',
        cache: true,
    

        success: function(response) {
          if (response.status == 1) {
            $('#show-print-vulvoscopy').html(response.message);
            //if (id == 0) {
             // loadPagination("vulvoscopy")
            //}
          } else {
            showalert(response.message, "alert-danger", "alert_placeholder_vulvoscopy");
          }
          $('#save_vulvoscopia').prop("disabled", false);
        }
      });


    });
	
	
		$(document).on('click', '#paginate-vulvoscopy-li li', function() {

			var display_content = "#vulvoscopy-form";
			var controller = "vulvoscopy";
			var pageNum = this.id;
			$("#paginate-vulvoscopy-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
		
		
		
				
		var largeModalResumenHist= document.getElementById('largeModalResumenHist')
		largeModalResumenHist.addEventListener('show.bs.modal', function(event) {
			
				loadResume('resume');
			
		})
		
		
		if($('#number_of_view').val() > 0){
	
		$(window).on('load',function(){
        $('#largeModalResumenHist').modal('show');
    });
	
}
		

		
		var largeModalFollowUp= document.getElementById('largeModalFollowUp');
		largeModalFollowUp.addEventListener('show.bs.modal', function(event) {
			loadResume('follow');
			
		})
		

	
function loadResume(direction){
			
		$.ajax({
					type: "POST",
					url: base_url+"modal_follow_up/content",
					data: {
						origine: direction, id_patient:$('#id_patient_hist').val()
					},
					beforeSend: function() {
						$("#load-"+direction+"-hist").addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$("#load-"+direction+"-hist").removeClass("spinner-border");
						$("#load-"+direction+"-hist").html(data);
							

					},
			});	
		}
