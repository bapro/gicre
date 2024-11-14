<script>
    var id_enf_act = document.getElementById('id_enf_act').value;
    //console.log(init_diagram_name);

    var canvasUro, backgroundImageUro, finalImg;
    var mouseClicked = false;
    var prevX = 0;
    var currX = 0;
    var prevY = 0;
    var currY = 0;
    var fillStyle = "black";
    var globalCompositeOperation = "source-over";
    var lineWidth = 2;
    var image = 'image1.jpg';

    function init_diagram_uro(imageSrc, canvasUro_img) {

        
        backgroundImageUro = new Image();
        backgroundImageUro.src = imageSrc;
        canvasUro = document.getElementById(canvasUro_img);
        canvasUro.style.backgroundImage = "url('" + imageSrc + "')";
		canvasUro.width = 1067;
		canvasUro.height = 470;
        canvasUro.addEventListener("mousemove", handleMouseEvent);
        canvasUro.addEventListener("mousedown", handleMouseEvent);
        canvasUro.addEventListener("mouseup", handleMouseEvent);
        canvasUro.addEventListener("mouseout", handleMouseEvent);
    }

    function getColor(btn) {
        globalCompositeOperation = 'source-over';
        lineWidth = 2;
        switch (btn.getAttribute('data-color')) {
            case "green":
                fillStyle = "green";
                break;
            case "blue":
                fillStyle = "blue";
                break;
            case "red":
                fillStyle = "red";
                break;
            case "yellow":
                fillStyle = "yellow";
                break;
            case "orange":
                fillStyle = "orange";
                break;
            case "black":
                fillStyle = "black";
                break;
            case "eraser":
                globalCompositeOperation = 'destination-out';
                fillStyle = "rgba(0,0,0,1)";
                lineWidth = 14;
                break;
        }

    }

    function draw(dot) {
		document.getElementById('isUroDiagram').value=1;
        var ctx = canvasUro.getContext("2d");
        ctx.beginPath();
        ctx.globalCompositeOperation = globalCompositeOperation;
        if (dot) {
            ctx.fillStyle = fillStyle;
            ctx.fillRect(currX, currY, 2, 2);

        } else {
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(currX, currY);
            ctx.strokeStyle = fillStyle;
            ctx.lineWidth = lineWidth;
            ctx.stroke();


        }
        ctx.closePath();
    }

    function erase() {
        if (confirm("Quiere limpiar todo?")) {
            var ctx = canvasUro.getContext("2d");
            ctx.clearRect(0, 0, canvasUro.width, canvasUro.height);
			document.getElementById('isUroDiagram').value=0;

        }
    }







    function handleMouseEvent(e) {
        if (e.type === 'mousedown') {
            prevX = currX;
            prevY = currY;
            currX = e.offsetX;
            currY = e.offsetY;
            mouseClicked = true;
            draw(true);
			

        }
        if (e.type === 'mouseup' || e.type === "mouseout") {
            mouseClicked = false;
        }
        if (e.type === 'mousemove') {
            if (mouseClicked) {
                prevX = currX;
                prevY = currY;
                currX = e.offsetX;
                currY = e.offsetY;
                draw();

//$('#saveExamMamaDiagBtn').prop('disabled', false);
//$('#saveEnfActDiagBtn').prop('disabled', false);
            }
			
        }
    }




</script>