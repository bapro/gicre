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
            data:{ table:table,id_patient:$("#id_patient_hist").val()},
            beforeSend: function(){
            $(list_div).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
            },
			  success: function(data){ 
			  $(list_div).removeClass("spinner-border");
            $(list_div).html(data);
			  
               },


 });
	
}
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
	})


	
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
	  
        }); 
		
		
	}




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










  var keyupProCeg;
$(document).on('keyup', '.coneg_proced', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupProCeg);
            keyupProCeg = setTimeout(function () {
             autoCompleteForms(keyword, 'coneg_proced', $("#id_coneg").val()+'_coneg_proced', 'list-proced-realizados', 'hosp_conclusion_ingreso');
            }, 300);
        });



   var keyupConcCeg;
$(document).on('keyup', '.diag_alta_diag1', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupConcCeg);
            keyupConcCeg = setTimeout(function () {
             autoCompleteForms(keyword, 'diag_alta_diag1', $("#id_coneg").val()+'_diag_alta_diag1', 'list-diagnos-coneg', 'hosp_conclusion_ingreso');
            }, 300);
        });


var keyupDestRCeg;
$(document).on('keyup', '.destino_referimiento', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupDestRCeg);
            keyupDestRCeg = setTimeout(function () {
             autoCompleteForms(keyword, 'destino_referimiento', $("#id_coneg").val()+'_destino_referimiento', 'list-destref-coneg', 'hosp_conclusion_ingreso');
            }, 300);
        });


	function autoCompleteForms(keyword, field_name_in_table, input_name, div_result, table){

if(keyword==""){
	$("#"+div_result).hide();
}else{
	$.ajax({
type: "POST",
url:base_url+"patient_hospitalization_controller/autoCompleteForms",
data:{keyword:keyword, div_result:div_result,input_name:input_name,field_name_in_table:field_name_in_table,table:table },

success: function(data){
$("#"+div_result).show();
$("#"+div_result).html(data);

},

});
}	
}

 $(document).ready(function(){jQuery("#select_all").on("click",function(e){$(this).is(":checked",!0)?($(".emp_checkbox").prop("checked",!0),$(".check_madre").prop("disabled",!0),$(".check_padre").prop("disabled",!0),$(".check_hnos").prop("disabled",!0),$(".check_pers").prop("disabled",!0),$(".check_madre2").prop("checked",!1),$(".check_padre2").prop("checked",!1),$(".check_hnos2").prop("checked",!1),$(".check_pers2").prop("checked",!1),$(".check_madre2").prop("disabled",!0),$(".check_padre2").prop("disabled",!0),$(".check_hnos2").prop("disabled",!0),$(".check_pers2").prop("disabled",!0),$(".check_madre3").prop("disabled",!0),$(".check_padre3").prop("disabled",!0),$(".check_hnos3").prop("disabled",!0),$(".check_pers3").prop("disabled",!0),$(".check_madre4").prop("checked",!1),$(".check_padre4").prop("checked",!1),$(".check_hnos4").prop("checked",!1),$(".check_pers4").prop("checked",!1),$(".check_madre4").prop("disabled",!0),$(".check_padre4").prop("disabled",!0),$(".check_hnos4").prop("disabled",!0),$(".check_pers4").prop("disabled",!0),$(".check_madre5").prop("checked",!1),$(".check_padre5").prop("checked",!1),$(".check_hnos5").prop("checked",!1),$(".check_pers5").prop("checked",!1),$(".check_madre5").prop("disabled",!0),$(".check_padre5").prop("disabled",!0),$(".check_hnos5").prop("disabled",!0),$(".check_pers5").prop("disabled",!0),$(".check_madre6").prop("checked",!1),$(".check_padre6").prop("checked",!1),$(".check_hnos6").prop("checked",!1),$(".check_pers6").prop("checked",!1),$(".check_madre6").prop("disabled",!0),$(".check_padre6").prop("disabled",!0),$(".check_hnos6").prop("disabled",!0),$(".check_pers6").prop("disabled",!0),$(".check_madre7").prop("checked",!1),$(".check_padre7").prop("checked",!1),$(".check_hnos7").prop("checked",!1),$(".check_pers7").prop("checked",!1),$(".check_madre7").prop("disabled",!0),$(".check_padre7").prop("disabled",!0),$(".check_hnos7").prop("disabled",!0),$(".check_pers7").prop("disabled",!0),$(".check_madre8").prop("disabled",!0),$(".check_padre8").prop("disabled",!0),$(".check_hnos8").prop("disabled",!0),$(".check_pers8").prop("disabled",!0),$(".check_madre8").prop("checked",!1),$(".check_padre8").prop("checked",!1),$(".check_hnos8").prop("checked",!1),$(".check_pers8").prop("checked",!1),$(".check_madre9").prop("checked",!1),$(".check_padre9").prop("checked",!1),$(".check_hnos9").prop("checked",!1),$(".check_pers9").prop("checked",!1),$(".check_madre9").prop("disabled",!0),$(".check_padre9").prop("disabled",!0),$(".check_hnos9").prop("disabled",!0),$(".check_pers9").prop("disabled",!0),$(".check_madre10").prop("checked",!1),$(".check_padre10").prop("checked",!1),$(".check_hnos10").prop("checked",!1),$(".check_pers10").prop("checked",!1),$(".check_madre10").prop("disabled",!0),$(".check_padre10").prop("disabled",!0),$(".check_hnos10").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre11").prop("checked",!1),$(".check_padre11").prop("checked",!1),$(".check_hnos11").prop("checked",!1),$(".check_pers11").prop("checked",!1),$(".check_madre11").prop("disabled",!0),$(".check_padre11").prop("disabled",!0),$(".check_hnos11").prop("disabled",!0),$(".check_pers11").prop("disabled",!0),$(".check_madre12").prop("disabled",!0),$(".check_padre12").prop("disabled",!0),$(".check_hnos12").prop("disabled",!0),$(".check_pers12").prop("disabled",!0),$(".check_madre12").prop("checked",!1),$(".check_padre12").prop("checked",!1),$(".check_hnos12").prop("checked",!1),$(".check_pers12").prop("checked",!1),$(".check_madre13").prop("checked",!1),$(".check_padre13").prop("checked",!1),$(".check_hnos13").prop("checked",!1),$(".check_pers13").prop("checked",!1),$(".check_madre13").prop("disabled",!0),$(".check_padre13").prop("disabled",!0),$(".check_hnos13").prop("disabled",!0),$(".check_pers13").prop("disabled",!0),$(".check_madre14").prop("checked",!1),$(".check_padre14").prop("checked",!1),$(".check_hnos14").prop("checked",!1),$(".check_pers14").prop("checked",!1),$(".check_madre14").prop("disabled",!0),$(".check_padre14").prop("disabled",!0),$(".check_hnos14").prop("disabled",!0),$(".check_pers14").prop("disabled",!0),$(".check_madre15").prop("checked",!1),$(".check_padre15").prop("checked",!1),$(".check_hnos15").prop("checked",!1),$(".check_pers15").prop("checked",!1),$(".check_madre15").prop("disabled",!0),$(".check_padre15").prop("disabled",!0),$(".check_hnos15").prop("disabled",!0),$(".check_pers15").prop("disabled",!0),$(".check_madre16").prop("checked",!1),$(".check_padre16").prop("checked",!1),$(".check_hnos16").prop("checked",!1),$(".check_pers16").prop("checked",!1),$(".check_madre16").prop("disabled",!0),$(".check_padre16").prop("disabled",!0),$(".check_hnos16").prop("disabled",!0),$(".check_pers16").prop("disabled",!0),$(".check_madre17").prop("checked",!1),$(".check_padre17").prop("checked",!1),$(".check_hnos17").prop("checked",!1),$(".check_pers17").prop("checked",!1),$(".check_madre17").prop("disabled",!0),$(".check_padre17").prop("disabled",!0),$(".check_hnos17").prop("disabled",!0),$(".check_pers17").prop("disabled",!0)):($(".emp_checkbox").prop("checked",!1),$(".check_madre").prop("disabled",!1),$(".check_padre").prop("disabled",!1),$(".check_hnos").prop("disabled",!1),$(".check_pers").prop("disabled",!1),$(".check_madre2").prop("disabled",!1),$(".check_padre2").prop("disabled",!1),$(".check_hnos2").prop("disabled",!1),$(".check_pers2").prop("disabled",!1),$(".check_madre3").prop("disabled",!1),$(".check_padre3").prop("disabled",!1),$(".check_hnos3").prop("disabled",!1),$(".check_pers3").prop("disabled",!1),$(".check_madre4").prop("disabled",!1),$(".check_padre4").prop("disabled",!1),$(".check_hnos4").prop("disabled",!1),$(".check_pers4").prop("disabled",!1),$(".check_madre5").prop("disabled",!1),$(".check_padre5").prop("disabled",!1),$(".check_hnos5").prop("disabled",!1),$(".check_pers5").prop("disabled",!1),$(".check_madre6").prop("disabled",!1),$(".check_padre6").prop("disabled",!1),$(".check_hnos6").prop("disabled",!1),$(".check_pers6").prop("disabled",!1),$(".check_madre7").prop("disabled",!1),$(".check_padre7").prop("disabled",!1),$(".check_hnos7").prop("disabled",!1),$(".check_pers7").prop("disabled",!1),$(".check_madre8").prop("disabled",!1),$(".check_padre8").prop("disabled",!1),$(".check_hnos8").prop("disabled",!1),$(".check_pers8").prop("disabled",!1),$(".check_madre9").prop("disabled",!1),$(".check_padre9").prop("disabled",!1),$(".check_hnos9").prop("disabled",!1),$(".check_pers9").prop("disabled",!1),$(".check_madre10").prop("disabled",!1),$(".check_padre10").prop("disabled",!1),$(".check_hnos10").prop("disabled",!1),$(".check_pers10").prop("disabled",!1),$(".check_madre11").prop("disabled",!1),$(".check_padre11").prop("disabled",!1),$(".check_hnos11").prop("disabled",!1),$(".check_pers11").prop("disabled",!1),$(".check_madre12").prop("disabled",!1),$(".check_padre12").prop("disabled",!1),$(".check_hnos12").prop("disabled",!1),$(".check_pers12").prop("disabled",!1),$(".check_madre13").prop("disabled",!1),$(".check_padre13").prop("disabled",!1),$(".check_hnos13").prop("disabled",!1),$(".check_pers13").prop("disabled",!1),$(".check_madre14").prop("disabled",!1),$(".check_padre14").prop("disabled",!1),$(".check_hnos14").prop("disabled",!1),$(".check_pers14").prop("disabled",!1),$(".check_madre15").prop("disabled",!1),$(".check_padre15").prop("disabled",!1),$(".check_hnos15").prop("disabled",!1),$(".check_pers15").prop("disabled",!1),$(".check_madre16").prop("disabled",!1),$(".check_padre16").prop("disabled",!1),$(".check_hnos16").prop("disabled",!1),$(".check_pers16").prop("disabled",!1),$(".check_madre17").prop("disabled",!1),$(".check_padre17").prop("disabled",!1),$(".check_hnos17").prop("disabled",!1),$(".check_pers17").prop("disabled",!1))}),jQuery("#select_all").on("click",function(e){$(this).is(":checked",!0)?($(".emp_checkbox").prop("checked",!0),$(".text-marquo").prop("disabled",!0)):($(".emp_checkbox").prop("checked",!1),$(".text-marquo").prop("disabled",!1),$("#otros").prop("disabled",!1)),$("#select_count 2").html($("input.emp_checkbox:checked").length+" Seleccionada (s)")}),jQuery(".emp_checkbox").on("click",function(e){$(this).is(":checked",!0)?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),$(".niguno_checked1").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre").prop("disabled",!0),$(".check_padre").prop("disabled",!0),$(".check_hnos").prop("disabled",!0),$(".check_pers").prop("disabled",!0),$(".check_madre").prop("checked",!1),$(".check_padre").prop("checked",!1),$(".check_hnos").prop("checked",!1),$(".check_pers").prop("checked",!1),$("#car_text").prop("disabled",!0),$("#car_text").val("")):($(".check_madre").prop("disabled",!1),$(".check_padre").prop("disabled",!1),$(".check_hnos").prop("disabled",!1),$(".check_pers").prop("disabled",!1),$("#car_text").prop("disabled",!1))}),$(".niguno_checked2").on("click",function(e){$(this).is(":checked",!0)?($(".check_madre2").prop("disabled",!0),$(".check_padre2").prop("disabled",!0),$(".check_hnos2").prop("disabled",!0),$(".check_pers2").prop("disabled",!0),$(".check_madre2").prop("checked",!1),$(".check_padre2").prop("checked",!1),$(".check_hnos2").prop("checked",!1),$(".check_pers2").prop("checked",!1),$("#hip_text").prop("disabled",!0),$("#hip_text").val("")):($(".check_madre2").prop("disabled",!1),$(".check_padre2").prop("disabled",!1),$(".check_hnos2").prop("disabled",!1),$(".check_pers2").prop("disabled",!1),$("#hip_text").prop("disabled",!1),$(".unchecked_all").prop("checked",!1))}),$(".niguno_checked3").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre3").prop("disabled",!0),$(".check_padre3").prop("disabled",!0),$(".check_hnos3").prop("disabled",!0),$(".check_pers3").prop("disabled",!0),$(".check_madre3").prop("checked",!1),$(".check_padre3").prop("checked",!1),$(".check_hnos3").prop("checked",!1),$(".check_pers3").prop("checked",!1),$("#ec_text").prop("disabled",!0),$("#ec_text").val("")):($(".check_madre3").prop("disabled",!1),$(".check_padre3").prop("disabled",!1),$(".check_hnos3").prop("disabled",!1),$(".check_pers3").prop("disabled",!1),$("#ec_text").prop("disabled",!1))}),$(".niguno_checked4").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre4").prop("disabled",!0),$(".check_padre4").prop("disabled",!0),$(".check_hnos4").prop("disabled",!0),$(".check_pers4").prop("disabled",!0),$(".check_madre4").prop("checked",!1),$(".check_padre4").prop("checked",!1),$(".check_hnos4").prop("checked",!1),$(".check_pers4").prop("checked",!1),$("#ep_text").prop("disabled",!0),$("#ep_text").val("")):($(".check_madre4").prop("disabled",!1),$(".check_padre4").prop("disabled",!1),$(".check_hnos4").prop("disabled",!1),$(".check_pers4").prop("disabled",!1),$("#ep_text").prop("disabled",!1))}),$(".niguno_checked5").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre5").prop("disabled",!0),$(".check_padre5").prop("disabled",!0),$(".check_hnos5").prop("disabled",!0),$(".check_pers5").prop("disabled",!0),$(".check_madre5").prop("checked",!1),$(".check_padre5").prop("checked",!1),$(".check_hnos5").prop("checked",!1),$(".check_pers5").prop("checked",!1),$("#as_text").prop("disabled",!0),$("#as_text").val("")):($(".check_madre5").prop("disabled",!1),$(".check_padre5").prop("disabled",!1),$(".check_hnos5").prop("disabled",!1),$(".check_pers5").prop("disabled",!1),$("#as_text").prop("disabled",!1))}),$(".niguno_checked05").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre05").prop("disabled",!0),$(".check_padre05").prop("disabled",!0),$(".check_hnos05").prop("disabled",!0),$(".check_pers05").prop("disabled",!0),$(".check_madre05").prop("checked",!1),$(".check_padre05").prop("checked",!1),$(".check_hnos05").prop("checked",!1),$(".check_pers05").prop("checked",!1),$("#enre_text").prop("disabled",!0),$("#enre_text").val("")):($(".check_madre05").prop("disabled",!1),$(".check_padre05").prop("disabled",!1),$(".check_hnos05").prop("disabled",!1),$(".check_pers05").prop("disabled",!1),$("#enre_text").prop("disabled",!1))}),$(".niguno_checked6").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre6").prop("disabled",!0),$(".check_padre6").prop("disabled",!0),$(".check_hnos6").prop("disabled",!0),$(".check_pers6").prop("disabled",!0),$(".check_madre6").prop("checked",!1),$(".check_padre6").prop("checked",!1),$(".check_hnos6").prop("checked",!1),$(".check_pers6").prop("checked",!1),$("#tub_text").prop("disabled",!0),$("#tub_text").val("")):($(".check_madre6").prop("disabled",!1),$(".check_padre6").prop("disabled",!1),$(".check_hnos6").prop("disabled",!1),$(".check_pers6").prop("disabled",!1),$("#tub_text").prop("disabled",!1))}),$(".niguno_checked7").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre7").prop("disabled",!0),$(".check_padre7").prop("disabled",!0),$(".check_hnos7").prop("disabled",!0),$(".check_pers7").prop("disabled",!0),$(".check_madre7").prop("checked",!1),$(".check_padre7").prop("checked",!1),$(".check_hnos7").prop("checked",!1),$(".check_pers7").prop("checked",!1),$("#dia_text").prop("disabled",!0),$("#dia_text").val("")):($(".check_madre7").prop("disabled",!1),$(".check_padre7").prop("disabled",!1),$(".check_hnos7").prop("disabled",!1),$(".check_pers7").prop("disabled",!1),$("#dia_text").prop("disabled",!1))}),$(".niguno_checked8").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre8").prop("disabled",!0),$(".check_padre8").prop("disabled",!0),$(".check_hnos8").prop("disabled",!0),$(".check_pers8").prop("disabled",!0),$(".check_madre8").prop("checked",!1),$(".check_padre8").prop("checked",!1),$(".check_hnos8").prop("checked",!1),$(".check_pers8").prop("checked",!1),$("#tir_text").prop("disabled",!0),$("#tir_text").val("")):($(".check_madre8").prop("disabled",!1),$(".check_padre8").prop("disabled",!1),$(".check_hnos8").prop("disabled",!1),$(".check_pers8").prop("disabled",!1),$("#tir_text").prop("disabled",!1))}),$(".niguno_checked9").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre9").prop("disabled",!0),$(".check_padre9").prop("disabled",!0),$(".check_hnos9").prop("disabled",!0),$(".check_pers9").prop("disabled",!0),$(".check_madre9").prop("checked",!1),$(".check_padre9").prop("checked",!1),$(".check_hnos9").prop("checked",!1),$(".check_pers9").prop("checked",!1),$("#hep_tipo").prop("disabled",!0),$("#hep_text").prop("disabled",!0),$("#hep_text").val("")):($(".check_madre9").prop("disabled",!1),$(".check_padre9").prop("disabled",!1),$(".check_hnos9").prop("disabled",!1),$(".check_pers9").prop("disabled",!1),$("#hep_tipo").prop("disabled",!1),$("#hep_text").prop("disabled",!1))}),$(".niguno_checked10").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre10").prop("disabled",!0),$(".check_padre10").prop("disabled",!0),$(".check_hnos10").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre10").prop("checked",!1),$(".check_padre10").prop("checked",!1),$(".check_hnos10").prop("checked",!1),$(".check_pers10").prop("checked",!1),$("#enfr_text").prop("disabled",!0),$("#enfr_text").val("")):($(".check_madre10").prop("disabled",!1),$(".check_padre10").prop("disabled",!1),$(".check_hnos10").prop("disabled",!1),$(".check_pers10").prop("disabled",!1),$("#enfr_text").prop("disabled",!1))}),$(".niguno_checked11").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre11").prop("disabled",!0),$(".check_padre11").prop("disabled",!0),$(".check_hnos11").prop("disabled",!0),$(".check_pers10").prop("disabled",!0),$(".check_madre11").prop("checked",!1),$(".check_padre11").prop("checked",!1),$(".check_hnos11").prop("checked",!1),$(".check_pers11").prop("checked",!1),$("#falc_text").prop("disabled",!0),$("#falc_text").val("")):($(".check_madre11").prop("disabled",!1),$(".check_padre11").prop("disabled",!1),$(".check_hnos11").prop("disabled",!1),$(".check_pers11").prop("disabled",!1),$("#falc_text").prop("disabled",!1))}),$(".niguno_checked12").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre12").prop("disabled",!0),$(".check_padre12").prop("disabled",!0),$(".check_hnos12").prop("disabled",!0),$(".check_pers12").prop("disabled",!0),$(".check_madre12").prop("checked",!1),$(".check_padre12").prop("checked",!1),$(".check_hnos12").prop("checked",!1),$(".check_pers12").prop("checked",!1),$("#neop_text").prop("disabled",!0),$("#neop_text").val("")):($(".check_madre12").prop("disabled",!1),$(".check_padre12").prop("disabled",!1),$(".check_hnos12").prop("disabled",!1),$(".check_pers12").prop("disabled",!1),$("#neop_text").prop("disabled",!1))}),$(".niguno_checked13").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre13").prop("disabled",!0),$(".check_padre13").prop("disabled",!0),$(".check_hnos13").prop("disabled",!0),$(".check_pers13").prop("disabled",!0),$(".check_madre13").prop("checked",!1),$(".check_padre13").prop("checked",!1),$(".check_hnos13").prop("checked",!1),$(".check_pers13").prop("checked",!1),$("#psi_text").prop("disabled",!0),$("#psi_text").val("")):($(".check_madre13").prop("disabled",!1),$(".check_padre13").prop("disabled",!1),$(".check_hnos13").prop("disabled",!1),$(".check_pers13").prop("disabled",!1),$("#psi_text").prop("disabled",!1))}),$(".niguno_checked14").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre14").prop("disabled",!0),$(".check_padre14").prop("disabled",!0),$(".check_hnos14").prop("disabled",!0),$(".check_pers14").prop("disabled",!0),$(".check_madre14").prop("checked",!1),$(".check_padre14").prop("checked",!1),$(".check_hnos14").prop("checked",!1),$(".check_pers14").prop("checked",!1),$("#obs_text").prop("disabled",!0),$("#obs_text").val("")):($(".check_madre14").prop("disabled",!1),$(".check_padre14").prop("disabled",!1),$(".check_hnos14").prop("disabled",!1),$(".check_pers14").prop("disabled",!1),$("#obs_text").prop("disabled",!1))}),$(".niguno_checked15").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre15").prop("disabled",!0),$(".check_padre15").prop("disabled",!0),$(".check_hnos15").prop("disabled",!0),$(".check_pers15").prop("disabled",!0),$(".check_madre15").prop("checked",!1),$(".check_padre15").prop("checked",!1),$(".check_hnos15").prop("checked",!1),$(".check_pers15").prop("checked",!1),$("#ulp_text").prop("disabled",!0),$("#ulp_text").val("")):($(".check_madre15").prop("disabled",!1),$(".check_padre15").prop("disabled",!1),$(".check_hnos15").prop("disabled",!1),$(".check_pers15").prop("disabled",!1),$("#ulp_text").prop("disabled",!1))}),$(".niguno_checked16").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre16").prop("disabled",!0),$(".check_padre16").prop("disabled",!0),$(".check_hnos16").prop("disabled",!0),$(".check_pers16").prop("disabled",!0),$(".check_madre16").prop("checked",!1),$(".check_padre16").prop("checked",!1),$(".check_hnos16").prop("checked",!1),$(".check_pers16").prop("checked",!1),$("#art_text").prop("disabled",!0),$("#art_text").val("")):($(".check_madre16").prop("disabled",!1),$(".check_padre16").prop("disabled",!1),$(".check_hnos16").prop("disabled",!1),$(".check_pers16").prop("disabled",!1),$("#art_text").prop("disabled",!1))}),$(".niguno_checked016").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre016").prop("disabled",!0),$(".check_padre016").prop("disabled",!0),$(".check_hnos016").prop("disabled",!0),$(".check_pers016").prop("disabled",!0),$(".check_madre016").prop("checked",!1),$(".check_padre016").prop("checked",!1),$(".check_hnos016").prop("checked",!1),$(".check_pers016").prop("checked",!1),$("#hem_text").prop("disabled",!0),$("#hem_text").val("")):($(".check_madre016").prop("disabled",!1),$(".check_padre016").prop("disabled",!1),$(".check_hnos016").prop("disabled",!1),$(".check_pers016").prop("disabled",!1),$("#hem_text").prop("disabled",!1))}),$(".niguno_checked17").on("click",function(e){$(".unchecked_all").prop("checked",!1),$(this).is(":checked",!0)?($(".check_madre17").prop("disabled",!0),$(".check_padre17").prop("disabled",!0),$(".check_hnos17").prop("disabled",!0),$(".check_pers17").prop("disabled",!0),$(".check_madre17").prop("checked",!1),$(".check_padre17").prop("checked",!1),$(".check_hnos17").prop("checked",!1),$(".check_pers17").prop("checked",!1),$("#zika_text").prop("disabled",!0),$("#zika_text").val("")):($(".check_madre17").prop("disabled",!1),$(".check_padre17").prop("disabled",!1),$(".check_hnos17").prop("disabled",!1),$(".check_pers17").prop("disabled",!1),$("#zika_text").prop("disabled",!1))}),$("#bt").click(function(){id=$(this).attr("title"),"Ocultar"==(txt=$(this).text())?($(this).text("Mostrar"),$("section").css("margin-top","100px")):($(this).text("Ocultar"),$("section").css("margin-top","180px")),$("#"+id).toggle("slide")})}),$("#bt").submit(function(e){e.preventDefault()}),$(document).ready(function(){$("#saveIndicacionesMedicales").click(function(e){return $("#medicamento").val(),$("#frecuencia").val(),$("#cantidad").val(),$("#via").val(),$("#farmacia").val(),""==$("#medicamento").val()?($("#medicamento").focus(),$("#medicamento").css("border-color","red"),$("#errorBox").html("Selecciona el medicamento"),!1):""==$("#frecuencia").val()?($("#frecuencia").focus(),$("#frecuencia").css("border-color","red"),$("#errorBox").html("Selecciona la frecuencia"),!1):""==$("#cantidad").val()?($("#cantidad").focus(),$("#cantidad").css("border-color","red"),$("#errorBox").html("Selecciona la cantidad"),!1):""==$("#via").val()?($("#via").focus(),$("#via").css("border-color","red"),$("#errorBox").html("Selecciona el campo : via"),!1):""==$("#farmacia").val()?($("#farmacia").focus(),$("#farmacia").css("border-color","red"),$("#errorBox").html("Selecciona la farmacia"),!1):void 0})}),$(document).ready(function(){$("#medicamento").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#frecuencia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#cantidad").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#via").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(document).ready(function(){$("#farmacia").change(function(){var e=$(this);""!=e.val()&&e.css("border","1px solid #38a7bb")})}),$(".checkininfancia").change(function(){$(".checkininfancia:not(:checked)").length?($("#infancia").prop("disabled",!0),$(".act_inf").hide(),$(".dea_inf").show()):($("#infancia").prop("disabled",!1),$(".act_inf").show(),$(".dea_inf").hide())}),$(".checkin_adol").change(function(){$(".checkin_adol:checked").length?($("#adolescencia").prop("disabled",!1),$(".act_adol").hide(),$(".dea_adol").show()):($("#adolescencia").prop("disabled",!0),$(".act_adol").show(),$(".dea_adol").hide())}),$(".checkin_adultez").change(function(){$(".checkin_adultez:checked").length?($("#adultez").prop("disabled",!1),$(".act_adul").hide(),$(".dea_adul").show()):($("#adultez").prop("disabled",!0),$(".act_adul").show(),$(".dea_adul").hide())}),$(".checkin_fami").change(function(){$(".checkin_fami:checked").length?($("#familiares").prop("disabled",!1),$(".act_fam").hide(),$(".dea_fam").show()):($("#familiares").prop("disabled",!0),$(".act_fam").show(),$(".dea_fam").hide())}),$(".checkin_medh").change(function(){$(".checkin_medh:checked").length?($("#medicamentos_hab").prop("disabled",!1),$(".act_medh").hide(),$(".dea_medh").show()):($("#medicamentos_hab").prop("disabled",!0),$(".act_medh").show(),$(".dea_medh").hide())}),$(".checkin_trau").change(function(){$(".checkin_trau:checked").length?($("#traumatismo").prop("disabled",!1),$(".act_trau").hide(),$(".dea_trau").show()):($("#traumatismo").prop("disabled",!0),$(".act_trau").show(),$(".dea_trau").hide())}),$(".check_neuro").change(function(){$(".check_neuro:checked").length?$("#neurologico").prop("disabled",!0):$("#neurologico").prop("disabled",!1)}),$(".check_abdo").change(function(){$(".check_abdo:checked").length?$("#abdomen").prop("disabled",!0):$("#abdomen").prop("disabled",!1)}),$(".check_cabe").change(function(){$(".check_cabe:checked").length?$("#cabeza").prop("disabled",!0):$("#cabeza").prop("disabled",!1)}),$(".check_pelvi").change(function(){$(".check_pelvi:checked").length?$("#pelvica").prop("disabled",!0):$("#pelvica").prop("disabled",!1)}),$(".check_evali").change(function(){$(".check_evali:checked").length?$("#evaluacion_mama").prop("disabled",!0):$("#evaluacion_mama").prop("disabled",!1)}),$(".check_insp").change(function(){$(".check_insp:checked").length?$("#inspeccion_genital").prop("disabled",!0):$("#inspeccion_genital").prop("disabled",!1)}),$(".check_torax").change(function(){$(".check_torax:checked").length?$("#torax").prop("disabled",!0):$("#torax").prop("disabled",!1)}),$(".check_columna").change(function(){$(".check_columna:checked").length?$("#columna_dorsal").prop("disabled",!0):$("#columna_dorsal").prop("disabled",!1)}),$(".check_corazon").change(function(){$(".check_corazon:checked").length?$("#corazon").prop("disabled",!0):$("#corazon").prop("disabled",!1)}),$(".check_ext").change(function(){$(".check_ext:checked").length?$("#extremidades").prop("disabled",!0):$("#extremidades").prop("disabled",!1)}),$(".check_pulm").change(function(){$(".check_pulm:checked").length?$("#pulmones").prop("disabled",!0):$("#pulmones").prop("disabled",!1)}),$(".check_otros").change(function(){$(".check_otros:checked").length?$("#otros").prop("disabled",!0):$("#otros").prop("disabled",!1)}),jQuery("input[name='grueso']").on("click",function(e){if($(".chkNo").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-1").slideDown(),i=0;i<100;i++)$(".triangle-1").fadeTo("slow",.1).fadeTo("slow",1);$(".text-grueso").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-1").stop(!0),$(".triangle-1").slideUp(),$(".text-grueso").prop("disabled",!0)}),jQuery("input[name='fino']").on("click",function(e){if($(".chkNo2").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-2").slideDown(),i=0;i<100;i++)$(".triangle-2").fadeTo("slow",.1).fadeTo("slow",1);$(".text-fino").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-2").stop(!0),$(".triangle-2").slideUp(),$(".text-fino").prop("disabled",!0)}),jQuery("input[name='lenguage']").on("click",function(e){if($(".chkNo3").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-3").slideDown(),i=0;i<100;i++)$(".triangle-3").fadeTo("slow",.1).fadeTo("slow",1);$(".text-lenguage").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-3").stop(!0),$(".triangle-3").slideUp(),$(".text-lenguage").prop("disabled",!0)}),jQuery("input[name='social']").on("click",function(e){if($(".chkNo4").is(":checked")){for($(".ref-neurologia-text").text("Alert : Referir a neurologia"),$(".ref-neurologia-text").slideDown(),$(".triangle-4").slideDown(),i=0;i<100;i++)$(".triangle-4").fadeTo("slow",.1).fadeTo("slow",1);$(".text-social").prop("disabled",!1)}else $(".ref-neurologia-text").slideUp(),$(".triangle-4").stop(!0),$(".triangle-4").slideUp(),$(".text-social").prop("disabled",!0)});
 



   $("#examsistema-form").on('change', function(event) {

			var txtinput= $("input.txt-inp-exs").filter(function(){ return $(this).val(); }).length;
			var txtarea = $("textarea.txt-ares-exs").filter(function(){ return $(this).val(); }).length;
				
			if(txtinput ==0 && txtarea==0){
				 $("#exam-sistema-form-inputs").val(0);
			}else{
				$("#exam-sistema-form-inputs").val(1);
			}

        });
   
 $('#' + $('#id_hab_tx').val() + 'hab_t_drug').on('change', function() {

      $('#' + $('#id_hab_tx').val() + 'drug_list').val($('#' + $('#id_hab_tx').val() + 'drug_list').val() + $(this).val() + ', ');


    });
   
        $("#exam-neruo-form").on('change', function(event) {
      var countCheckedCheckboxes = $('#exam-neruo-form input[type="checkbox"]').filter(':checked').length;
      var countCheckedRadio = $('#exam-neruo-form input[type="radio"]').filter(':checked').length;
      var txtinput = $('#exam-neruo-form .examn-txt').filter(function() {
        return $(this).val();
      }).length;
      var txtarea = $("textarea.examn-txtarea").filter(function() {
        return $(this).val();
      }).length;
      $("#examn-form-checkbox").val(countCheckedCheckboxes);
      $("#examn-form-radio").val(countCheckedRadio);
      if (txtinput == 0 && txtarea == 0) {
        $("#examn-form-inputs").val(0);
      } else {
        $("#examn-form-inputs").val(1);
      }

    });
   
   
   
   	$(document).on('click', '#paginate-examsistema-li li', function() {

			var display_content = "#examsistema-form";
			var controller = "emerg_examen_sitema";
			var pageNum = this.id;
			$("#paginate-examsistema-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});
   
   
   
		
		
   $( '.form-select' ).select2( {
			theme: 'bootstrap-5',
			width: '100%',
			} );


function showalert(message, alerttype, alert_placeholder) {
    $('#'+alert_placeholder).append('<span id="alertdivAfterSaveForm" class="alert ' +  alerttype + '" role="alert">' + message + '</span>');
    setTimeout(function() {
        $("#alertdivAfterSaveForm").remove();
    }, 3000);
 }
 $('.nav-link.collapsed').on('click', function(event) {
      event.preventDefault();
      if($(this).hasClass("hide-save-all-button")) {
      $("#btnSaveHist").hide();
      }else{
      
       
       $("#btnSaveHist").show(); 
      }
    }); 

function resetForm(li,controller,div){
$("#"+li+" li.active").removeClass("active"); 
$(".hide-enf-mic").show();
$("#"+div).load(base_url+controller+"/form?page="+0+"&signo="+0);	
}

	function loadPagination(arg){
	
				$.ajax({
					type: "POST",
					url: base_url+arg+"/pagination",
					data: {id_patient:$("#id_patient_hist").val()},
					beforeSend: function() {
						$("#pagination-"+arg).addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
					},
					success: function(data) {
						$("#pagination-"+arg).removeClass("spinner-border");
						$("#pagination-"+arg).html(data);

					},
			});
			
		}


var base_url =$("#base_url").val();
var signo_data =  $("#id_sig").val();
 function paginateLiForm(display_content, controller, pageNum) {
			$(".spinner-border").show();
			
$(".hide-enf-mic").hide();
			$(display_content).load(base_url + controller + "/form?page=" + pageNum + "&signo=" + 1);



		}

//--SIGNO VITALES--------

var rango =$('#patient_age_range').val();
var timerGli = null;
  $(document).on('keydown', '.signo_v_glicemia', function(event) {
//$('#'+signo_data+'_signo_v_glicemia').keydown(function(){
       clearTimeout(timerGli); 
       timerGli = setTimeout(check_if_glicemia_normal, 1000)
});



function check_if_glicemia_normal() {

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
//$('#'+signo_data+'_signo_v_fr').keydown(function(){

  $(document).on('keydown', '.signo_v_fr', function(event) {

	  var funct;
       clearTimeout(timerFr); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funct=frecuencia_respiratoria1;
		   }
		   else if (rango=='infante (7 semanas -1 año)' || rango=='lactante mayor'  || rango=='pre-escolar')
		   {
			   funct=frecuencia_respiratoria2;
		   } 
		  
		   else if (rango=='escolar' || rango=='adolescente' || rango=='adulto')
		   {
			funct=frecuencia_respiratoria3;   
		   }
		  
		  
		   else{}
       timerFr = setTimeout(funct, 1000)
});



function frecuencia_respiratoria1() {
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

function frecuencia_respiratoria2() {
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


function frecuencia_respiratoria3() {
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
//$('#'+signo_data+'_signo_v_fc').keydown(function(){
	 $(document).on('keydown', '.signo_v_fc', function(event) {
	  var funfc;
       clearTimeout(timerFc); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funfc=f_c_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funfc=f_c_inf;
		   }

      else if (rango=='lactante mayor')
		   {
			   funfc=f_c_lm;
		   }		   
		   else if (rango=='pre-escolar')
		   {
			funfc=f_c_pes;   
		   } 
		    else if (rango=='escolar')
		   {
			funfc=f_c_es;   
		   }
		   else if (rango=='adolescente')
		   {
			funfc=f_c_ado;   
		   }
		   
		  else if (rango=='adulto')
		   {
			funfc=f_c_adult;   
		   }
		  
		  else{}
       timerFc = setTimeout(funfc, 1000)
});

function f_c_adult() {
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


function f_c_r_n() {
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



function f_c_inf() {
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



function f_c_lm() {
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


function f_c_pes() {
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


function f_c_es() {
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

function f_c_ado() {
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
//$('#'+signo_data+'_signo_v_temp').keydown(function(){
	$(document).on('keydown', '.signo_v_temp', function(event) {
	  var funtp;
       clearTimeout(timerTp); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funtp=tempo_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)' || rango=='lactante mayor' || rango=='pre-escolar')
		   {
			   funtp=tempo_inf_lm_pes;
		   }

      else if (rango=='escolar')
		   {
			   funtp=tempo_esc;
		   }		   
		   else if (rango=='adolescente')
		   {
			funtp=tempo_adol;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funtp=tempo_adulto;   
		   }
		  
		  else{}
       timerTp = setTimeout(funtp, 1000)
});

function tempo_adol() {
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


function tempo_adulto() {
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


function tempo_esc() {
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


function tempo_inf_lm_pes() {
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


function tempo_r_n() {
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
$(document).on('keydown', '.signo_v_ta_mm', function(event) {
var timerTa = null;
//$('#'+signo_data+'_signo_v_ta_mm').keydown(function(){
	  var funta;
       clearTimeout(timerTa); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funta=ta_r_n;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funta=ta_inf;
		   }

       else if (rango=='lactante mayor')
		   {
			   funta=ta_lm;
		   }

        else if (rango=='pre-escolar')
		   {
			funta=ta_pres;   
		   } 

       else if (rango=='escolar')
		   {
			funta=ta_es;  
			
		   } 
		   
		   else if (rango=='adolescente')
		   {
			funta=ta_adol;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funta=ta_adulto;   
		   }
		  
		  else{}
       timerTa = setTimeout(funta, 1000)
});



function ta_es() {
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



function ta_pres() {
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


function ta_lm() {
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

function ta_inf() {
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

function ta_r_n() {
	var signo_v_ta_mm= $('.signo_v_ta_mm').val();
	
if(signo_v_ta_mm =="") 
{
$('.tens_art_sis_result').text('');
}	
	
else if(70 <= signo_v_ta_mm && signo_v_ta_mm <= 100){
$('#'+signo_data+'_tens_art_sis_result').html("<i class='bi bi-check-lg text-success'  >normal</i>");
}
 else{
$('.tens_art_sis_result').html("<i class='bi bi-exclamation-triangle text-danger' > anormal</i>");

}
}

function ta_adol() {
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


function ta_adulto() {
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
$(document).on('keydown', '.signo_v_ta_hg', function(event) {
//$('#'+signo_data+'_signo_v_ta_hg').keydown(function(){
	  var funtad;
       clearTimeout(timerTad); 
	   if(rango=='recien nacido (0-6 semanas)'){
		   funtad=ta_r_nd;
		   }
		   else if (rango=='infante (7 semanas -1 año)')
		   {
			   funtad=ta_infd;
		   }

       else if (rango=='lactante mayor')
		   {
			   funtad=ta_lmd;
		   }

        else if (rango=='pre-escolar')
		   {
			funtad=ta_presd;   
		   } 

       else if (rango=='escolar')
		   {
			funtad=ta_esd;   
		   } 
		   
		   else if (rango=='adolescente')
		   {
			funta=ta_adold;   
		   } 
		   
		   
		     else if (rango=='adulto')
		   {
			funtad=ta_adultod;  
			
		   }
		  
		  else{}
       timerTad = setTimeout(funtad, 1000)
});


function ta_adultod() {
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
//$('#'+signo_data+'_signo_v_peso_lb').keyup(function () {
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
    $('.signo_v_peso_kg').val(ma);
    //$('.signo_v_peso_kg').number(true, 2);

    calculIMC();
});


$(document).on('keyup', '.signo_v_talla', function(event) {
	$('.signo_v_talla_m').val($(this).val() * 39.37).number( true, 2);
	calculIMC();
	});



function calculIMC(){
 var peso =$('.signo_v_peso_kg').val();
// alert(peso);
 var talla = $('.signo_v_talla').val();
var cal1 = talla * talla;
var imc_result = peso / cal1;
$('.signo_v_talla_imc').val(imc_result).number( true, 2 );
//$('.signo_v_talla_imc').val(imc_result);	
}



//--EXAMEN FISICO------------------
$(document).on('click', "#resetExamFis", function(event) {
  	event.preventDefault();
   		var li = "paginate-examfisico-li";
   		var controller = "emerg_exam_fisico";
   		var div = "examfisico-form";
		$('ifExamenMamasOnce').val(0);
   		resetForm(li, controller, div);
   	});
	
	//--EXAMEN SISTEMA------------------
	
		$(document).on('click', '#resetExamSist', function(event) {
        event.preventDefault();
		var li = "paginate-examsistema-li";
		var controller = "emerg_examen_sitema";
		var div ="examsistema-form";
		resetForm(li,controller,div);
		}); 
	
	
	
	//--EXAMEN NEURO------------------
$(document).on('click', "#resetFormExamNeuro", function(event) {
  	event.preventDefault();
   		var li = "paginate-exam-neruo-li";
   		var controller = "hosp_exam_neuro";
   		var div = "exam-neruo-form";
	
   		resetForm(li, controller, div);
   	});
	
	
		$(document).on('click', '#paginate-exam-neruo-li li', function() {

			var display_content = "#exam-neruo-form";
			var controller = "hosp_exam_neuro";
			var pageNum = this.id;
			$("#paginate-exam-neruo-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});	
	
	$(document).on('click', '#saveEditExamFisico', function(event) {
         
			event.preventDefault();
		
			 saveExamenFisico($("#id_exam_fis").val(), $("#id_eva_card").val());
			
            $('#saveEditExamFisico').prop("disabled", true);
			});
			

		
		
		$(document).on('click', '#paginate-examfisico-li li', function() {

			var display_content = "#examfisico-form";
			var controller = "emerg_exam_fisico";
			var pageNum = this.id;
			$("#paginate-examfisico-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});	
		
//---------------------------------------------------------------------------------------------------------


	
	
		$(document).on('click', '#resetFormFormExF', function(event) {
		 event.preventDefault();
		 var li = "paginate-examfisico-li";
            var controller = "emerg_exam_fisico";
            var div = "examfisico-form";
            resetForm(li, controller, div);
           
        });
		
		
		$(document).on('click', '#btnSaveExamenFisico', function(event) {
		 event.preventDefault();
           
             $('#btnSaveExamenFisico').prop("disabled", true);
             saveExamenFisico($('#id_exf').val());
           
        });
		
//=======SAVE EXAMEN FISICO==============================

function saveExamenFisico(id_sig) {
var motivo_emergencia = $('#'+id_sig+ '_motivo_emergencia').val();
 var hallazgo= $('#'+id_sig+ '_hallazgo_exf').val();
      //--SIGNOS VITALES
      var signo_v_fr = $('#' + id_sig + '_signo_v_fr').val();

      var signo_v_fc = $('#' + id_sig + '_signo_v_fc').val();
      var signo_v_temp = $('#' + id_sig + '_signo_v_temp').val();
      var signo_v_ta_mm = $('#' + id_sig + '_signo_v_ta_mm').val();
      var signo_v_ta_hg = $('#' + id_sig + '_signo_v_ta_hg').val();
      var signo_v_peso_lb = $('#' + id_sig + '_signo_v_peso_lb').val();
      var signo_v_peso_kg = $('#' + id_sig + '_signo_v_peso_kg').val();
      var signo_v_talla = $('#' + id_sig + '_signo_v_talla').val();
	  var presion_media =$('#' + id_sig + '_presion_media').val();
	 
      var signo_v_talla_m = $('#' + id_sig + '_signo_v_talla_m').val();
      var signo_v_talla_imc = $('#' + id_sig + '_signo_v_talla_imc').val();
      var signo_v_pulso = $('#' + id_sig + '_signo_v_pulso').val();
      //var signo_v_glicemia = $('#' + id_sig + '_signo_v_glicemia').val();
      var signo_v_per_cef = $('#' + id_sig + '_signo_v_per_cef').val();
      var signo_v_sat_ox = $('#' + id_sig + '_signo_v_sat_ox').val();
      //-SIGNOS VITALES RESULTADOS
      var signo_sat = $('#' + id_sig + '_signo_sat').val();
     var signo_fcf = $('#' + id_sig + '_signo_fcf').val();

      var signo_fr_result = $('#' + id_sig + '_signo_fr_result').html();
      var signo_fc_result = $('#' + id_sig + '_signo_fc_result').html();
      var signo_temp_result = $('#' + id_sig + '_signo_temp_result').html();
      var tens_art_sis_result = $('#' + id_sig + '_tens_art_sis_result').html();
      var tens_art_dias_result = $('#' + id_sig + '_tens_art_dias_result').html();
      //var glicemia_rslt = $("." + id_sig + "_glicemia_"+signo_form_id).html();
	   if(hallazgo !=""){
      $.ajax({
        type: "POST",
		   url: base_url+"emerg_exam_fisico/saveExamenFisico",
    
        data: {
          signo_sat:signo_sat,
		  signo_fcf:signo_fcf,
		  presion_media:presion_media,
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
         // signo_v_glicemia: signo_v_glicemia,
          /*signo vitales resultados */
          signo_fr_result: signo_fr_result,
          signo_fc_result: signo_fc_result,
          signo_temp_result: signo_temp_result,
          tens_art_sis_result: tens_art_sis_result,
          tens_art_dias_result: tens_art_dias_result,
         // glicemia_rslt: glicemia_rslt,
          signo_v_sat_ox: signo_v_sat_ox,
          idExF: id_sig,
         
       inserted_by: $('#ex_vitales_in_by').val(),
		updated_by: $('#ex_vitales_up_by').val(),
		inserted_time: $('#ex_vitales_in_time').val(),
		updated_time: $("#ex_vitales_up_time").val(),
		motivo_emergencia:motivo_emergencia,
		hallazgo:hallazgo
        },
        success: function(data) {
          showalert(data, "alert-success", "alert_placeholder_exf");
          $('#btnSaveExamenFisico').prop("disabled", false);
		  if(id_sig==0){
			 
          loadPagination('emerg_exam_fisico'); 

		  }
        },
       
      })
    }else{
      Swal.fire({
        title: 'Hallazgo positivo es obligatorio',
        icon: 'error',
      })
      $('#btnSaveExamenFisico').prop("disabled", false);
    }
    }
	
//----------EXAMEN SISTEMA-----------------------

$(document).on('click', '#saveEditExamSist', function(event) {
		 event.preventDefault();
           
             $('#saveEditExamSist').prop("disabled", true);
             saveExamenSistema($('#id_exam_sist').val());
           
        });
	
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
        url: base_url+"emerg_examen_sitema/saveExamenSistema",
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
		  if($("#exam-sistema-form-inputs").val()==0){
			   Swal.fire({
           text: 'El formulario esta vacio',
        icon: 'error',
      })
	  $('#saveEditExamSist').prop("disabled", false);
		  }else{
           showalert(data, "alert-success", "alert_placeholder_exam_sist");
           $('#saveEditExamSist').prop("disabled", false);
		    if(id_exam_sist==0){
			 
          loadPagination('emerg_examen_sitema'); 

		  }
	  }
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
	



//------------CONCULSION DE EGRESO---------------


$(document).on('click', "#resetFormCongEgreso", function(event) {
  	event.preventDefault();
   		var li = "paginate-conEgreso-li";
   		var controller = "emerg_conEgreso";
   		var div = "conEgreso-form";
		
   		resetForm(li, controller, div);
   	});
	



	$(document).on('click', '#paginate-conEgreso-li li', function() {

			var display_content = "#conEgreso-form";
			var controller = "emerg_conEgreso";
			var pageNum = this.id;
			$("#paginate-conEgreso-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});	


$(document).on('click', '#btnSaveConclusionEgreso', function(event) {
		 event.preventDefault();
	
saveCongEgreso($('#id_coneg').val());

})
function saveCongEgreso(id){

  var morta_post= [];
 $('input[name=' + id + '_morta_post]:checked').each(function(){
            morta_post.push(this.value);
 });
 
 
     var morta_int= [];
 $('input[name=' + id + '_morta_int]:checked').each(function(){
            morta_int.push(this.value);
 });
 
 
      var infeccion_herida= [];
 $('input[name=' + id + '_infeccion_herida]:checked').each(function(){
            infeccion_herida.push(this.value);
 });
 

var resumen_hallasgos=$("#"+ id + "_resumen_hallasgos").val();
var resumen_intervenciones=$("#"+ id + "_resumen_intervenciones").val();
var condicion_alta=$("#"+ id + "_condicion_alta").val();
var causa_egreso=$("#"+ id + "_causa_egreso").val();
var destino_referimiento=$("#"+ id + "_destino_referimiento").val(); 
var coneg_proced=$("#"+ id + "_coneg_proced").val();
var diagnostico_autopsia=$("#"+ id + "_diagnostico_autopsia").val();
var equipo_medico=$("#"+ id + "_equipo_medico").val();
var diag_alta_diag1=$("#"+ id + "_diag_alta_diag1").val(); 
var diag_alta_diag2=$("#"+ id + "_diag_alta_diag2").val();  
  var coneg_diag=$("#"+ id + "_coneg_diag").val(); 
$('.saveEditCongEgreso').prop('disabled',true);

$.ajax({
url:base_url+'emerg_conEgreso/saveUpConEgreso',
type:"POST",
data: {resumen_hallasgos:resumen_hallasgos,morta_int:morta_int,infeccion_herida:infeccion_herida,
resumen_intervenciones:resumen_intervenciones,condicion_alta:condicion_alta,causa_egreso:causa_egreso,
destino_referimiento:destino_referimiento,morta_post:morta_post,coneg_proced:coneg_proced,
diagnostico_autopsia:diagnostico_autopsia,equipo_medico:equipo_medico,diag_alta_diag1:diag_alta_diag1,
diag_alta_diag2:diag_alta_diag2,id:id,coneg_diag:coneg_diag,
inserted_by:$('#' + id + '_con_eg_created_by').val(),
updated_by:$('#' + id + '_con_eg_updated_by').val(),
inserted_time:$('#' + id + '_con_eg_inserted_time').val(),
updated_time:$('#' + id + '_con_eg_update_time').val()
},
 dataType: 'json',
success: function(response){
	if(response.status==1){
		 Swal.fire({
        html: response.message,
        icon: 'error',
      })
	}else if(response.status==0){
		Swal.fire({
           html: response.message,
        icon: 'success',
      }).then((result) => {
  if (result.isConfirmed) {
	$('html, body').scrollTop($("#slideUpConEg").offset().top);
	loadPagination('emerg_conEgreso'); 

  }
})
	}else{
		 Swal.fire({
        html: response.message,
        icon: 'error',
      })
	}
$('.saveEditCongEgreso').prop('disabled',false);

},
  
});

	}
	
	
	//EVALUATION CONDITION---------------
	
	
		$(document).on('click', '#paginate-evaCond-li li', function() {
			var display_content = "#eva-cond-form";
			var controller = "emerg_eval_con";
			var pageNum = this.id;
			$("#paginate-evaCond-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});	
	
	
	
	$(document).on('click', '#saveEditEvaCond', function(event) {
		 event.preventDefault();

saveEvaCond($('#id_eva_cond').val());

})
	
	function saveEvaCond(id){

$('#saveEditEvaCond').prop('disabled',true);
var estado_conciencia = $("#"+ id + "_estado_conciencia").val(); 
var condicion_general = $("#"+ id + "_condicion_general").val(); 

var orient_tiempo = [];
$('input[name=' + id + '_orient_tiempo]:checked').each(function(){
orient_tiempo.push(this.value);
});

var orient_lugar = [];
$('input[name=' + id + '_orient_lugar]:checked').each(function(){
orient_lugar.push(this.value);
});

var orient_pers = [];
$('input[name=' + id + '_orient_pers]:checked').each(function(){
orient_pers.push(this.value);
});





var val_neuro = $("#"+ id + "_val_neuro").val(); 
var comunicacion = $("#"+ id + "_comunicacion").val(); 
var est_respiratoria = $("#"+ id + "_est_respiratoria").val(); 
var estado_cardia = $("#"+ id + "_estado_cardia").val(); 
var oxinoterapia = $("#"+ id + "_oxinoterapia").val(); 
var terapia_resp = $("#"+ id + "_terapia_resp").val(); 
var sec_vias_resp = $("#"+ id + "_sec_vias_resp").val(); 
var sangrado = $("#"+ id + "_eva_sangrado").val(); 
var tipo_sangrado = $("#"+ id + "_tipo_sangrado").val(); 
var presenta_dolor = $("#"+ id + "_presenta_dolor").val(); 
var canalizacion = $("#"+ id + "_eva_canalizacion").val(); 
var drenajes = $("#"+ id + "_drenajes").val(); 
var eva_diuresis = $("#"+ id + "_eva_diuresis").val(); 
var selected = $("#"+ id + "_selectevaconform").val(); 
var nauseas = [];
$('input[name=' + id + '_nauseas]:checked').each(function(){
nauseas.push(this.value);
});

var vomitos = [];
$('input[name=' + id + '_vomitos]:checked').each(function(){
vomitos.push(this.value);
});



var vomitos_sel = $("#"+ id + "_vomitos_sel").val(); 
var drenaje_sonda_nas = $("#"+ id + "_drenaje_sonda_nas").val(); 
var drenaje_sonda_nas_sel = $("#"+ id + "_drenaje_sonda_nas_sel").val(); 
var evalucacion = $('input:radio[name=_evalucacion]:checked').val();
var evaluacion_sel = $("#"+ id + "_evaluacion_sel").val(); 
var diarrea = $("#"+ id + "_diarrea").val(); 
var val_abdomen = $("#"+ id + "_val_abdomen").val(); 
var peristalsis = $("#"+ id + "_peristalsis").val(); 
var alimentacion = $('input:radio[name=_alimentacion]:checked').val();
var alimentacion_sel = $("#"+ id + "_alimentacion_sel").val(); 
var coloracion = $("#"+ id + "_coloracion").val(); 
var eva_pulso = $("#"+ id + "_eva_pulso").val(); 
var eva_edema = $("#"+ id + "_eva_edema").val(); 
var val_piel = $("#"+ id + "_val_piel").val(); 
var cuidados_a = $("#"+ id + "_cuidados_a").val(); 
var movilizacion = $("#"+ id + "_eva_movilizacion").val(); 
var drenaje = $("#"+ id + "_drenaje").val(); 
var notas = $("#"+ id + "_eva_con_otros_notas").val(); 


if(condicion_general =="" && estado_conciencia =="")
{
  Swal.fire({
        title: 'Los campos con * son obligatorios',
        icon: 'error',
      })
	  $('#saveEditEvaCond').prop('disabled',false);
}else{
 
		 $.ajax({
            type: 'POST',
            url:base_url+'emerg_eval_con/saveEvaluationCondition',
            data: {
				id:id,condicion_general:condicion_general,estado_conciencia:estado_conciencia,orient_tiempo:orient_tiempo,orient_lugar:orient_lugar,orient_pers:orient_pers,
				comunicacion:comunicacion,val_neuro:val_neuro,estado_cardia:estado_cardia,est_respiratoria:est_respiratoria,oxinoterapia:oxinoterapia,terapia_resp:terapia_resp,
				sec_vias_resp:sec_vias_resp,sangrado:sangrado,tipo_sangrado:tipo_sangrado,presenta_dolor:presenta_dolor,canalizacion:canalizacion,drenajes:drenajes,selected:selected,
				eva_diuresis:eva_diuresis,nauseas:nauseas,vomitos:vomitos,vomitos_sel:vomitos_sel,drenaje_sonda_nas:drenaje_sonda_nas,drenaje_sonda_nas_sel:drenaje_sonda_nas_sel,
				evalucacion:evalucacion,evaluacion_sel:evaluacion_sel,diarrea:diarrea,val_abdomen:val_abdomen,peristalsis:peristalsis,alimentacion:alimentacion,notas:notas,drenaje:drenaje,
				alimentacion_sel:alimentacion_sel,coloracion:coloracion,eva_pulso:eva_pulso,eva_edema:eva_edema,val_piel:val_piel,cuidados_a:cuidados_a,movilizacion:movilizacion,
				inserted_by:$('#' + id + '_id_eva_cond_created_by').val(),
				updated_by:$('#' + id + '_id_eva_cond_updated_by').val(),
				inserted_time:$('#' + id + '_id_eva_cond_inserted_time').val(),
				updated_time:$('#' + id + '_id_eva_cond_update_time').val()
				},
       
            success: function(data){ //console.log(response);
			$('#saveEditEvaCond').prop('disabled',false);
               showalert(data, "alert-success", "alert_placeholder_eva_con");
			    if(id==0){
			 
       loadPagination('emerg_eval_con'); 

   }
            },
			error: function(jqXHR, textStatus, errorThrown) {
alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

$('#sfsdfsdfgg6').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
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
	


//--CONTROL SIGNOS VITALES--------
	$(document).on('change', "#form-sig-vita", function(event) {
		var txtinputcs= $("input.clear-cs").filter(function(){ return $(this).val(); }).length;
$('#isCsVempty').val(txtinputcs);
		});
		
		

	$(document).on('click', '#csv-add-btn', function(event) {
event.preventDefault();
if($('#isCsVempty').val()==1 || $('#isCsVempty').val()==0  || $('#mirror_field_cont_sig').val()==''){
	  Swal.fire({
        title: 'No ha entrado suficiente datos para grabar.',
        icon: 'error',
      })
}else{
$(".saveResult").fadeIn().html('guardando...').css('font-style','italic').css('color','gray');
$.ajax({
type: "POST",
url: base_url+"emerg_control_signos_vitales/saveControlSignosVitales",
data:{csv_sat:$('#csv_sat').val(),csv_ta1:$('#csv_ta1').val(),csv_ta2:$('#csv_ta2').val(),csv_fc:$('#csv_fc').val(),csv_fr:$('#csv_fr').val(),csv_glicemia:$('#csv_glicemia').val(),
csv_pulso:$('#csv_pulso').val(),csv_temperatura:$('#csv_temperatura').val(),csv_diuresis:$('#csv_diuresis').val(),csv_dep:$('#csv_dep').val(),time:$('#mirror_field_cont_sig').val(),id:$('#id_sig_vit').val()},
success:function(data){ 
 result=$(".saveResult").html(data);
 if(result !=0){
 $(".saveResult").html('Hecho.').css('color','green').delay( 1000 ).hide(0);
 $(".saveResult1").html('');
 $(".check-input-csv").val('');
 $('#isCsVempty').val(1);
 contSigVital();
} else{
$(".saveResult").html('Error.').css('color','red').delay( 1000 ).hide(0);		
}
} 
});
	}
});

//--ORDEN MEDICA
//--GET MEDICAMENTOS
function loadAllMedicamentByDefault(){
$.ajax({
url:base_url+"emergency/loadAllMedicamentos2",
data: {},
method:"POST",
success:function(data){
$("#medicamentos_list").html(data);

},

});
				
}
	var modalOrdMed= 0;
		var loadOrdMed = $('#largeModalOrdenMedica');
		loadOrdMed.on('show.bs.modal', function(event) {
			modalOrdMed++;
			if (modalOrdMed == 1) {
			//loadPagination('modal_orden_medica');
			loadAllMedicamentByDefault();
				loadPagination("emerg_orden_medica");
			
			}

		})
		
		
		
		function onclickElimiarBtnTableRegister(el, table){	
	
  el.closest("tr").find(".show-text-area-reason-cancel-"+table).show();
  el.closest("tr").find(".hide-cancel-td-"+table).hide();	
}


function onclickNotElimiarBtnTableRegister(el, table){	
	
  el.closest("tr").find(".show-text-area-reason-cancel-"+table).hide();
  el.closest("tr").find(".hide-cancel-td-"+table).show();
  
}


 
$(document).on('click', '#resetDesSurgery', function(event){ 
        event.preventDefault();
		 $(window).scrollTop(0);
            var li = "pagination-description_surgery-li";
            var controller = "description_surgery";
            var div = "description_surgery-form";
            resetForm(li, controller, div);
            $("#pagination-description_surgery-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })
 
 
 $(document).on('click', '#resetFormEvaCond', function(event){ 
        event.preventDefault();
		 $(window).scrollTop(0);
            var li = "paginate-evaCond-li";
            var controller = "hosp_eval_con";
            var div = "eva-cond-form";
            resetForm(li, controller, div);
            $("#pagination-evaCond-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })
 
 
 
 
 	$(document).on('click', '.pagination-description_surgery-li', function() {
            
		var display_content = "#description_surgery-form";
			var controller = "description_surgery";
			var pageNum = this.id;
			$("#pagination-description_surgery-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});	
 
		
$(document).on('click', '#saveDesSurgery', function(event){ 
 event.preventDefault();
$('#saveDesSurgery').prop("disabled", true);
var id = $('#id_desc_quir').val();

var desc_qui_in_by=$('#desc_qui_in_by').val();
var desc_qui_up_by=$('#desc_qui_up_by').val();
var desc_qui_in_time=$('#desc_qui_in_time').val(); 
var desc_qui_up_time=$('#desc_qui_up_time').val();
var diag_pre_qui=$("#diag_pre_qui").val();
var pro_post=$("#pro_post").val();
var diag_post_qui=$("#diag_post_qui").val();
var anestesia=$("#anestesia").val();
var incision=$("#incision").val();
var cirugia_programada=$("#cirugia_programada").val();
var cirugia_realizada=$("#cirugia_realizada").val();
var hallasgo=$("#hallasgo").val();
var desc_proced=$("#desc_proced").val();
var perdida_sanguinea=$("#perdida_sanguinea").val();
var compresa=$("#compresa").val();
var gasas=$("#gasas").val();
var drenes=$("#drenes").val();
 var transfusion = $('input:radio[name=transfusion]:checked').val();
var unids_transfusion=$("#unids_transfusion").val();
var condicion_paciente=$("#condicion_paciente1").val();
var traslado=$("#traslado1").val();
var hora_ini=$(".hora_ini_desq").val();
var hora_fin=$(".hora_fin_desq").val();
var tiempo_quirurgico=$(".tiempo_quirurgico_desc").val();
var cirujano=$("#cirujano1").val();
var ajudante=$("#ajudante1").val();
var ajudante_enf=$("#ajudante_enf1").val();
var muestras_patologia=$("#muestras_patologia1").val();
var histopatologico=$("#histopatologico").val();
var centro_med_q_save =$("#id_centro_to_save").val();
var id_patient=$("#id_patient_hist").val();

  $.ajax({
 type: "POST",
 url: base_url+'description_surgery/save',
 data: {
desc_qui_in_by:desc_qui_in_by,
			desc_qui_up_by:desc_qui_up_by,
			desc_qui_in_time:desc_qui_in_time, 
			desc_qui_up_time:desc_qui_up_time,
			diag_pre_qui:diag_pre_qui,
			pro_post:pro_post,
			diag_post_qui:diag_post_qui,
			anestesia:anestesia,
			incision:incision,
			cirugia_programada:cirugia_programada,
			cirugia_realizada:cirugia_realizada,
			hallasgo:hallasgo,
			desc_proced:desc_proced,
			perdida_sanguinea:perdida_sanguinea,
			compresa:compresa,
			gasas:gasas,
			drenes:drenes,
			transfusion:transfusion,
			unids_transfusion:unids_transfusion,
			condicion_paciente:condicion_paciente,
			traslado:traslado,
			hora_ini:hora_ini,
			hora_fin:hora_fin,
			tiempo_quirurgico:tiempo_quirurgico,
			cirujano:cirujano,
			ajudante:ajudante,
			ajudante_enf:ajudante_enf,
			muestras_patologia:muestras_patologia,
			histopatologico:histopatologico,
			centro_med_q_save :centro_med_q_save,
			id_desc_quir:id
 },
 dataType: 'json',
 cache: false,
 success:function(response){
	 if(response.status == 2){
Swal.fire({
icon: 'warning',
html: response.message,
});
$("#desc_proced").focus();
	 }
 else if (response.status == 1) {
                        $('#show-print-description_surgery').html(response.message);
                        if (id == 0) {
                            loadPagination("description_surgery", id_patient);
							//calHour();
                        }
                    } else {
							Swal.fire({
							icon: 'warning',
							html: response.message,
							});
                    }
                    $('#saveDesSurgery').prop("disabled", false);
 },
 
 error:function(jqXHR, textStatus, errorThrown) {
 alert('An erroroccurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
 
                 $('#save-quirurgica-desc').html('<p>statuscode: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
                 console.log('jqXHR:');
                 console.log(jqXHR);
                 console.log('textStatus:');
                 console.log(textStatus);
                 console.log('errorThrown:');
                 console.log(errorThrown);
             },  
   
 });
 
 });


