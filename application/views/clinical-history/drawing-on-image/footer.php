<script>
    var id_oftal = document.getElementById('id_oftal').value;
    //console.log(init_diagram_name);

    var canvas, backgroundImage, finalImg;
    var mouseClicked = false;
    var prevX = 0;
    var currX = 0;
    var prevY = 0;
    var currY = 0;
    var fillStyle = "black";
    var globalCompositeOperation = "source-over";
    var lineWidth = 2;
    var image = 'image1.jpg';

    function init_diagram_ojos(imageSrc, canvas_img) {

        // var imageSrc = '<?= base_url(); ?>assets_new/img/urology/image1.jpg';
        backgroundImage = new Image();
        backgroundImage.src = imageSrc;
        canvas = document.getElementById(id_oftal + '_' + canvas_img);
        canvas.style.backgroundImage = "url('" + imageSrc + "')";
		canvas.width = 300;
		canvas.height = 300;
        canvas.addEventListener("mousemove", handleMouseEvent);
        canvas.addEventListener("mousedown", handleMouseEvent);
        canvas.addEventListener("mouseup", handleMouseEvent);
        canvas.addEventListener("mouseout", handleMouseEvent);
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
        var ctx = canvas.getContext("2d");
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
            var ctx = canvas.getContext("2d");
            ctx.clearRect(0, 0, canvas.width, canvas.height);
			$('#saveExamMamaDiagBtn').prop('disabled', true);
$('#saveEnfActDiagBtn').prop('disabled', true);

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




function saveEnfActDiag() {

        canvasimgenact = document.getElementById('canvasimgSaveEnfAct');
        canvasimgenact.width = canvas.width;
        canvasimgenact.height = canvas.height;
        var ctx2 = canvasimgenact.getContext("2d");
        // comment next line to save the draw only
        ctx2.drawImage(backgroundImage, 0, 0);
        ctx2.drawImage(canvas, 0, 0);
        document.getElementById("finalImgSaveToDatabaseEnfAct").value = canvasimgenact.toDataURL();
        document.getElementById("canBeSavedEnfActDiag").value = 1;
		$('#saveEnfActDiagBtn').prop('disabled', true);
}


    function saveExamMamaDiag() {

        var canvasimg = document.getElementById('canvasimgSaveExamMama');
        canvasimg.width = canvas.width;
        canvasimg.height = canvas.height;
        var ctx2 = canvasimg.getContext("2d");
        // comment next line to save the draw only
        ctx2.drawImage(backgroundImage, 0, 0);
        ctx2.drawImage(canvas, 0, 0);
        document.getElementById("finalImgSaveToDatabaseExamMama").value = canvasimg.toDataURL();
        document.getElementById("canBeSavedMdiag").value = 1;
		$('#saveExamMamaDiagBtn').prop('disabled', true);
      
    }
</script>