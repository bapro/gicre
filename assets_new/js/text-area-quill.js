
 
 
 
 const optionsQuillEditorGr =  {modules: {
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





		var  quillRepGen;
		
		
		function loadQuillEditGenRep(id){
			
		 setTimeout(function() {
			 
			 	    quillRepGen = new Quill($("#quill-editor-general-report_"+id).get(0), 
		optionsQuillEditorGr,
		);
		
		
		   }, 100);
		}
		
		
	
		

	