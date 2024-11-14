<script>
    var id_oftal = document.getElementById('id_enf_act').value;
    //console.log(init_diagram_name);

    var canvasHb, backgroundImageHb;
    var mouseClickedHb = false;
    var prevHbX = 0;
    var currHbX = 0;
    var prevHbY = 0;
    var currHbY = 0;
    var fillStyleHb = "black";
    var globalCompositeOperationHb = "source-over";
    var lineWidthHb = 2;
    //var image = 'image1.jpg';

    function init_diagram_human_body(imageSrcHb, canvasHb_img) {

        // var imageSrc = '<?= base_url(); ?>assets_new/img/urology/image1.jpg';
        backgroundImageHb = new Image();
        backgroundImageHb.src = imageSrcHb;
        canvasHb = document.getElementById(id_oftal + '_' + canvasHb_img);
        canvasHb.style.backgroundImage = "url('" + imageSrcHb + "')";
		canvasHb.width = 1000;
		canvasHb.height = 889;
        canvasHb.addEventListener("mousemove", handleMouseEventHb);
        canvasHb.addEventListener("mousedown", handleMouseEventHb);
        canvasHb.addEventListener("mouseup", handleMouseEventHb);
        canvasHb.addEventListener("mouseout", handleMouseEventHb);
    }

    function getColorHb(btn) {
        globalCompositeOperationHb = 'source-over';
        lineWidthHb = 2;
        switch (btn.getAttribute('data-color')) {
            case "green":
                fillStyleHb = "green";
                break;
            case "blue":
                fillStyleHb = "blue";
                break;
            case "red":
                fillStyleHb = "red";
                break;
            case "yellow":
                fillStyleHb = "yellow";
                break;
            case "orange":
                fillStyleHb = "orange";
                break;
            case "black":
                fillStyleHb = "black";
                break;
				case "eraser":
                globalCompositeOperationHb = 'destination-out';
                fillStyleHb = "rgba(0,0,0,1)";
                lineWidthHb = 14;
                break;
        
        }

    }

    function drawOnHb(dot) {
		document.getElementById('ifGeneralHumanBody').value=1;
        var ctx = canvasHb.getContext("2d");
        ctx.beginPath();
        ctx.globalCompositeOperation = globalCompositeOperationHb;
        if (dot) {
            ctx.fillStyle = fillStyleHb;
            ctx.fillRect(currHbX, currHbY, 2, 2);

        } else {
            ctx.beginPath();
            ctx.moveTo(prevHbX, prevHbY);
            ctx.lineTo(currHbX, currHbY);
            ctx.strokeStyle = fillStyleHb;
            ctx.lineWidth = lineWidthHb;
            ctx.stroke();


        }
        ctx.closePath();
    }

    function eraseHb() {
        if (confirm("Quiere limpiar todo?")) {
            var ctx = canvasHb.getContext("2d");
            ctx.clearRect(0, 0, canvasHb.width, canvasHb.height);
		document.getElementById('ifGeneralHumanBody').value=0;

        }
    }







    function handleMouseEventHb(e) {
        if (e.type === 'mousedown') {
            prevHbX = currHbX;
            prevHbY = currHbY;
            currHbX = e.offsetX;
            currHbY = e.offsetY;
            mouseClickedHb = true;
            drawOnHb(true);
			

        }
        if (e.type === 'mouseup' || e.type === "mouseout") {
            mouseClickedHb = false;
        }
        if (e.type === 'mousemove') {
            if (mouseClickedHb) {
                prevHbX = currHbX;
                prevHbY = currHbY;
                currHbX = e.offsetX;
                currHbY = e.offsetY;
                drawOnHb();

            }
			
        }
    }



</script>