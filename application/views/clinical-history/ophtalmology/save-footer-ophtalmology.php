	<script>
 $(document).ready(function() {
	$('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
      saveEnfermedadActualConclusionDiag(0, 0, "saveEnfermedadActualConclusionDiag");
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
        saveAntPerFam(0, 0, "saveAntPerFam", 0);
		 antOTros(0, 0, "otherAnt", 0);
		 saveOphtalmology(0, 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
        
		   
        }
      }, 1000)


    });	
	   });	
	
	</script>