<ul class="nav nav-tabs nav-tabs-bordered"  role="tablist">

	<li class="nav-item" role="presentation">
	  <button class="nav-link active" id="diag-home-tab"  onclick="chooseImageDiag()" data-bs-toggle="tab" data-bs-target="#diag-home" type="button" role="tab" aria-controls="home" aria-selected="true">Diagrama de riñónes</button>
	</li>
	<li class="nav-item" role="presentation">
	  <button class="nav-link" id="diag-ap-rep-mas-tab" onclick="chooseImageApRep()"  data-bs-toggle="tab" data-bs-target="#diag-ap-rep-mas" type="button" role="tab" aria-controls="antAlegReactMed" aria-selected="false"> Aparato reproductor masculino</button>
	</li>
 

  </ul>

	   <div class="tab-content pt-2" id="myTabContent">
	   <div class="tab-pane fade show active" id="diag-home" role="tabpanel" aria-labelledby="diag-home-tab">
	    
  <canvas id="<?=$id_enf_act?>_canvas_image" width="550" height="400"  > </canvas>
  </div>
   <div class="tab-pane fade" id="diag-ap-rep-mas" role="tabpanel" aria-labelledby="diag-ap-rep-mas-tab">

    <canvas id="<?=$id_enf_act?>_ap_rep_image" width="450" height="400"  > </canvas>
	
  </div>
    </div>
	
	 <script>
	 // variable canvas_image y imageSrc1 are initiated by default
	 var  canvas_img ='canvas_image';	
	 var imageSrc1 = '<?= base_url(); ?>assets_new/img/urology/image1.jpg';
	 	 
function chooseImageDiag(){


init('<?= base_url(); ?>assets_new/img/urology/image1.jpg', 'canvas_image');
}

function chooseImageApRep(){

	init('<?= base_url(); ?>assets_new/img/urology/image33.jpg', 'ap_rep_image');
}

</script>