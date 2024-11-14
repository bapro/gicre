<script>
    $(document).ready(function() {
     

  $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
	
      saveEnfermedadActualConclusionDiag(0, 0, "saveEnfermedadActualConclusionDiag");
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
			
          saveAntPerFam(0, 0, 'id');
          saveSSR(0, 0);
		   saveOBS(0, 0);
          saveOtherAntAntViolenciaIntraF(0, 0, "saveOtherAntAntViolenciaIntraF", 0);
          saveSospechaAbuseMaltrato(0, 0, "saveSospechaAbuseMaltrato", 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
		 saveExamenFisico(0, 0, $("#exam-fisico-form-inputs").val(), 0);
          saveSignoVitales(0, 0,  $("#signos-vitales-form-inputs").val(), 0);
		
        }
      }, 1000)


    });

    });
</script>