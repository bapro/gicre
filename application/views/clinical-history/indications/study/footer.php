<script>

$('#saveIndStudy').on('click', function(event) {
 
event.preventDefault();

var id   = $("#id_ind_study").val();
var floatingIndEst   = $("#floatingIndEst").val();
 var floatingIndBody = $("#floatingIndBody").val();
var floatingIndLat = $("#floatingIndLat").val();
var floatingIndObs   = $("#floatingIndObs").val();

$('#saveIndStudy').prop("disabled", true);	
 $.ajax({
type: "POST",
 url: base_url+"h_c_indication_study/saveStudy",
data: {
 floatingIndEst:floatingIndEst, floatingIndBody:floatingIndBody, 
 floatingIndLat:floatingIndLat,floatingIndObs:floatingIndObs, id:id
},
dataType: 'json',
cache: false,
success:function(response){

 if (response.status == 1) {
               showalert(response.message, "alert-danger", "alert_placeholder_study"); 
           } else {
              $('.clr_inputs_ind_study').val('');
			  indication_study_data();
           }
$('#saveIndStudy').prop("disabled", false);	
},


});
});

var  countLoadEst = 0;
 $('#v-pills-estudios-tab').on('click', function(e) {
   e.preventDefault();
   
   countLoadEst ++;
   if(countLoadEst==1){
    indication_study_data();
   }
 });






function indication_study_data(){
   $('#indication_study_data').addClass("spinner-border").html("<span class='sr-only'>Loading...</span>");
 $.ajax({
type: "POST",
 url: base_url+"h_c_indication_study/indication_study_data",
data: {id:1},
success:function(data){
 $('#indication_study_data').removeClass('spinner-border').html(data);
           	
},
 
})

}





var keyupTimer2;
    $("#floatingIndEst").keypress(function () {
        
		var keyword = $(this).val();
            clearTimeout(keyupTimer2);
            keyupTimer2 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "estudio", "floatingIndEst", "suggestion-study-est");
            }, 300);
        });
 
 
  $("#floatingIndBody").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimer2);
            keyupTimer2 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "cuerpo", "floatingIndBody", "suggestion-study-body");
            }, 300);
        });
		
		
	 $("#floatingIndLat").keypress(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimer2);
            keyupTimer2 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_indicaciones_estudio", "lateralidad", "floatingIndLat", "suggestion-study-lat");
            }, 300);
        });	
		</script>