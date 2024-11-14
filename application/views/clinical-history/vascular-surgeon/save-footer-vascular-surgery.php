<script>
    $(document).ready(function() {
     

  $('#btnSaveHist').on('click', function(event) {
      event.preventDefault();
      saveEnfermedadActualConclusionDiagCirujanoVas(0, 0);
      setTimeout(function() {
        if ($('#keepOnSavingOption').val() == 1) {
          saveAntPerFam(0, 0, "saveAntPerFam", 0);
          saveHabToxico(0, 0, "saveHabToxico", 0);
        }
      }, 1000)


    });

    });
</script>