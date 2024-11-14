<script>
    $(document).ready(function() {
        var sis_data = $("#sis_data").val();
        $(".spinner-border").hide();
        $('#saveEditExamSist').on('click', function(event) {
            event.preventDefault();
            var id = $("#id_exam_sist").val();
         saveExamenSistema(1, id, "saveExamenSistema", 1);

        });
    });
</script>