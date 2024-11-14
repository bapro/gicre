<script>
    $(document).ready(function() {
        $(".spinner-border").hide();
        var data_ophtal = $("#data_ophtal").val();
        var height_ojos = $("#height_ojos").val();
        drawingOnImage(data_ophtal, "drawEyesImage", $("#ojos_image").val(), 500, height_ojos);
        drawingOnImage(data_ophtal, "drawFondoImage", $("#fondo_oyos").val(), 500, 250);

        $("#resetOph").click(function(event) {
            event.preventDefault();
            var li = "paginate-ophtalmology-li";
            var controller = "ophtalmology";
            var div = "ophtalmology-form";
            resetForm(li, controller, div);
            $("#paginate-ophtalmology-li li.active").removeClass("active");
            paginateLiForm(div, controller, 0);
        })





        $('#saveEditOph').on('click', function(event) {
            event.preventDefault();
           saveOphtalmology(1, $("#id_ophtal").val());

        });
    });
</script>