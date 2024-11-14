<script>

    //console.log(init_diagram_name);

    var canvasMama, backgroundImageMama, finalImg;
    var mouseClicked = false;
    var prevX = 0;
    var currX = 0;
    var prevY = 0;
    var currY = 0;
    var fillStyle = "black";
    var globalCompositeOperation = "source-over";
    var lineWidth = 2;
    var image = 'image1.jpg';

    function init_diagram_mama(imageSrc, canvasMama_img) {

        
        backgroundImageMama = new Image();
        backgroundImageMama.src = imageSrc;
        canvasMama = document.getElementById(canvasMama_img);
        canvasMama.style.backgroundImage = "url('" + imageSrc + "')";
		canvasMama.width = 1000;
		canvasMama.height = 409;
        canvasMama.addEventListener("mousemove", handleMouseEvent);
        canvasMama.addEventListener("mousedown", handleMouseEvent);
        canvasMama.addEventListener("mouseup", handleMouseEvent);
        canvasMama.addEventListener("mouseout", handleMouseEvent);
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
		document.getElementById('ifExamenMamasOnce').value=1;
        var ctx = canvasMama.getContext("2d");
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
            var ctx = canvasMama.getContext("2d");
            ctx.clearRect(0, 0, canvasMama.width, canvasMama.height);
			document.getElementById('ifExamenMamasOnce').value=0;

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