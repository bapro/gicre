<script>
    $(document).ready(function() {


        $(".spinner-border").hide();

        var enfermedad_data_surg_vas = $("#enfermedad_data_surg_vas").val();
        drawingOnImage(enfermedad_data_surg_vas, "drawDiagramsVs", $("#endo_images").val(), 700, 600);

        $("#resetSurVas").click(function(event) {
            event.preventDefault();
            var li = "paginate-vascular_surgeon-li";
            var controller = "vascular_surgeon";
            var div = "vascular_surgeon-form";
            resetForm(li, controller, div);
            $("#paginate-vascular_surgeon-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })




        $('#saveEditSurVas').on('click', function(event) {
            event.preventDefault();
          updateEnfActCirujanoVas(1, $("#id_surg_vas").val());

         });
		 
		 
    });
</script>