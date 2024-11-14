<script>
   // var id_oftal = document.getElementById('id_oftal').value;
    //console.log(init_diagram_name);

    var canvasFondo, backgroundImageFondo;
    var mouseClickedFondo = false;
    var prevFondoX = 0;
    var currFondoX = 0;
    var prevFondoY = 0;
    var currFondoY = 0;
    var fillStyleFondo = "black";
    var globalCompositeOperationFondo = "source-over";
    var lineWidthFondo = 2;
    //var image = 'image1.jpg';

    function init_diagram_fondos(imageSrcFondo, canvasFondo_img) {

        // var imageSrc = '<?= base_url(); ?>assets_new/img/urology/image1.jpg';
        backgroundImageFondo = new Image();
        backgroundImageFondo.src = imageSrcFondo;
        canvasFondo = document.getElementById(id_oftal + '_' + canvasFondo_img);
        canvasFondo.style.backgroundImage = "url('" + imageSrcFondo + "')";
		canvasFondo.width = 400;
		canvasFondo.height = 270;
        canvasFondo.addEventListener("mousemove", handleMouseEventFondo);
        canvasFondo.addEventListener("mousedown", handleMouseEventFondo);
        canvasFondo.addEventListener("mouseup", handleMouseEventFondo);
        canvasFondo.addEventListener("mouseout", handleMouseEventFondo);
    }

    function getColorFondo(btn) {
        globalCompositeOperationFondo = 'source-over';
        lineWidthFondo = 2;
        switch (btn.getAttribute('data-color')) {
            case "green":
                fillStyleFondo = "green";
                break;
            case "blue":
                fillStyleFondo = "blue";
                break;
            case "red":
                fillStyleFondo = "red";
                break;
            case "yellow":
                fillStyleFondo = "yellow";
                break;
            case "orange":
                fillStyleFondo = "orange";
                break;
            case "black":
                fillStyleFondo = "black";
                break;
				case "eraser":
                globalCompositeOperationFondo = 'destination-out';
                fillStyleFondo = "rgba(0,0,0,1)";
                lineWidthFondo = 14;
                break;
        
        }

    }

    function drawOnFondo(dot) {
        var ctx = canvasFondo.getContext("2d");
        ctx.beginPath();
        ctx.globalCompositeOperation = globalCompositeOperationFondo;
        if (dot) {
            ctx.fillStyle = fillStyleFondo;
            ctx.fillRect(currFondoX, currFondoY, 2, 2);

        } else {
            ctx.beginPath();
            ctx.moveTo(prevFondoX, prevFondoY);
            ctx.lineTo(currFondoX, currFondoY);
            ctx.strokeStyle = fillStyleFondo;
            ctx.lineWidth = lineWidthFondo;
            ctx.stroke();


        }
        ctx.closePath();
    }

    function eraseFondo() {
        if (confirm("Quiere limpiar todo?")) {
            var ctx = canvasFondo.getContext("2d");
            ctx.clearRect(0, 0, canvasFondo.width, canvasFondo.height);
		

        }
    }







    function handleMouseEventFondo(e) {
        if (e.type === 'mousedown') {
            prevFondoX = currFondoX;
            prevFondoY = currFondoY;
            currFondoX = e.offsetX;
            currFondoY = e.offsetY;
            mouseClickedFondo = true;
            drawOnFondo(true);
			

        }
        if (e.type === 'mouseup' || e.type === "mouseout") {
            mouseClickedFondo = false;
        }
        if (e.type === 'mousemove') {
            if (mouseClickedFondo) {
                prevFondoX = currFondoX;
                prevFondoY = currFondoY;
                currFondoX = e.offsetX;
                currFondoY = e.offsetY;
                drawOnFondo();

            }
			
        }
    }



</script>