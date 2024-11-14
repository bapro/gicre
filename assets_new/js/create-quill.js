const optionsQuillEditor =  {modules: {
        toolbar: [
          [{
            font: []
          }, {
            size: []
          }],
          ["bold", "italic", "underline", "strike"],
          [{
              color: []
            },
            {
              background: []
            }
          ],
          [{
              script: "super"
            },
            {
              script: "sub"
            }
          ],
          [{
              list: "ordered"
            },
            {
              list: "bullet"
            },
            {
              indent: "-1"
            },
            {
              indent: "+1"
            }
          ],
          ["direction", {
            align: []
          }],
          ["link"],
          ["clean"]
        ]
      },
	 
      theme: "snow"
 }

	//var quillEnfLaboratorio="" ;
//$(document).on('click', "#quill-editor-enfermedad-actual-laboratorio_"+id_enf_act, function() {
    //if (!$(this).hasClass('ql-container')) {
		//$("#btnSpeechEnfLab").prop("disabled", false);
    // var  quillEnfLaboratorio = new Quill($("#quill-editor-enfermedad-actual-laboratorio_"+id_enf_act).get(0), 
		//optionsQuillEditor,
		//);
       // quillEnfLaboratorio.focus()
    //}
//});






		var quillEnfSig, quillEnfEstudios, quillEnfLaboratorio, quillOftalmologyNote, quillCondPlan, quillCondProced, quillEnfEndVasHist;
		
		//--QUILL ENFERMEDAD ACTUAL----
		  var  countEnfActC= 0;
 $('.launch-quill-required-forms').on('click', function(e) {
   e.preventDefault();
   $('#btnSaveHist').prop("disabled", false);
   countEnfActC ++;
   if(countEnfActC==1){
loadQuillEnfHistEndoVascular(id_enf_act);
//loadQuillEditEnfSinopsis(id_enf_act);
loadQuillEditCondiag(id_enf_act);


   }
 });
		

function loadQuillEnfHistEndoVascular(id_enf_act){
		 setTimeout(function() {
		 	    quillEnfEndVasHist = new Quill($("#quill-editor-cir_vas_historial_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
		
		   }, 1000);
		}
		
		
		
		loadQuillEditEnfSinopsis(id_enf_act);
		
		function loadQuillEditEnfSinopsis(id_enf_act){
			
		 setTimeout(function() {
			    quillEnfSig = new Quill($("#quill-editor-enfermedad-actual-sinopsis_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
		
		quillEnfEstudios = new Quill($("#quill-editor-enfermedad-actual-estudios_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
		
		
		quillEnfLaboratorio = new Quill($("#quill-editor-enfermedad-actual-laboratorio_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
		
		
		   }, 1000);
		}


$(document).on('keyup', "#quill-editor-enfermedad-actual-sinopsis_"+id_enf_act, function(event){
	 var is_sinopsis_empty = quillEnfSig.root.innerText;
	if(is_sinopsis_empty !=""){
		$("#copiar-estudios-div").show();
	}else{
		$("#copiar-estudios-div").hide();
	}
});


  
	  $(document).on('click', "#copiar-estudios", function(event){
	     if ($(this).is(":checked")) {
                $("#floatingIndObs").val(quillEnfSig.root.innerText);
            } else {
                $("#floatingIndObs").val("");
            }
        });
  
	  




		
		function loadQuillEditCondiag(id_enf_act){
			
		 setTimeout(function() {
			    quillCondPlan = new Quill($("#quill-editor-condiag_plan_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
	
			    quillCondProced = new Quill($("#quill-editor-condiag_proced_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
		
		   }, 1000);
		}
		


//---QUILL OFTALMOLOGIA NOTA --------------------
		  var  countOftalNotaC= 0;
 $('#v-pills-ophtalmology-tab').on('click', function(e) {
   e.preventDefault();
  
   countOftalNotaC ++;
   if(countOftalNotaC==1){
loadQuillEditOftalNota(id_enf_act);
   }
 });
		

		
		function loadQuillEditOftalNota(id_enf_act){
			
		 setTimeout(function() {
			    quillOftalmologyNote = new Quill($("#quill-editor-oftalmologia_note_"+id_enf_act).get(0), 
		optionsQuillEditor,
		);
	
		
		
		   }, 1000);
		}
		