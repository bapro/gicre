<script>
  $(document).ready(function() {

 $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
	  
 saveEnfermedadActualConclusionDiag(0, 0, "saveEnfermedadActualConclusionDiag");
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
           saveAntPerFam(0, 0, 'id');
          saveOtherAntAntViolenciaIntraF(0, 0, "saveOtherAntAntViolenciaIntraF", 0);
          saveSospechaAbuseMaltrato(0, 0, "saveSospechaAbuseMaltrato", 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
           saveSignoVitales(0, 0,  $("#signos-vitales-form-inputs").val(), 0);
         saveExamenFisico(0, 0, $("#exam-fisico-form-inputs").val(), 0);
		   saveEditOnlyExamMamasYPelvis(0, 0, $("#exam-fisico-form-inputs").val());
          saveExamenSistema(0, 0, "saveExamenSistema", $("#exam-sistema-form-inputs").val());

        }
      }, 1000)


    });



  });
</script>