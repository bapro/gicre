<script>
  $(document).ready(function() {

    $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
      saveEnfermedadActualConclusionDiag(0, 0, "saveEnfermedadActualConclusionDiag");
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
          saveAntPerFam(0, 0, "eva_cardio", "saveAntPerFam", 0);
          savePediatry(0, 0);
          saveOtherAntAntViolenciaIntraF(0, 0, "saveOtherAntAntViolenciaIntraF", 0);
          saveSospechaAbuseMaltrato(0, 0, "saveSospechaAbuseMaltrato", 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
          saveSignoVitales(0, 0, "saveSignosVitales", $("#signos-vitales-form-inputs").val());
        }
      }, 1000)


    });



  });
</script>