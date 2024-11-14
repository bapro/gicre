
 
 
 
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
          ["link", "image", "video"],
          ["clean"]
        ]
      },
	 
      theme: "snow"
 }





		var  quillCondPlan, quillCondProced, quillEnfHist;
		
		loadQuillEditCondiag($("#id_surg_vas").val());
		function loadQuillEditCondiag(id_surg_vas){
			
		 setTimeout(function() {
			 
			 	    quillEnfHist = new Quill($("#quill-editor-cir_vas_historial_"+id_surg_vas).get(0), 
		optionsQuillEditor,
		);
			 
			 
			 
			    quillCondPlan = new Quill($("#quill-editor-condiag_plan_"+id_surg_vas).get(0), 
		optionsQuillEditor,
		);
	
			    quillCondProced = new Quill($("#quill-editor-condiag_proced_"+id_surg_vas).get(0), 
		optionsQuillEditor,
		);
		
		   }, 1000);
		}
		
		
	
		

	