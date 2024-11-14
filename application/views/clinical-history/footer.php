<?php $this->load->view('clinical-history/follow-up/index'); ?>
  <span id="citas_hoy"></span> 
  <span id="citas_request"></span>
   <input type="hidden" value="0" id="link-to-cita"  />
    <input type="hidden" value="0" id="link-to-request"  />
<script>
	$(document).ready(function() {


		$('.only-float').keypress(function(event) {
			if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
				event.preventDefault();
			}
		});

		//--paginate enfermedad actual
		$("#paginate-enf-li li").click(function() {
			var display_content = "#enfermedad-actual-form";
			var controller = "enfermedad_actual";
			var pageNum = this.id;
			$("#paginate-enf-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});

		//paginate conclusion diagnostica


		$("#paginate-condiag-li li").click(function() {
			var display_content = "#conclusion-diag-form";
			var controller = "conclusion_diagno";
			var pageNum = this.id;
			$("#paginate-condiag-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});


		//paginate signos vitales

		$("#paginate-signovitales-li li").click(function() {
			var display_content = "#signo-vitales-form";
			var controller = "signos_vitales";
			var pageNum = this.id;
			$("#paginate-signovitales-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});

		//paginate urology

		$("#paginate-uro-exam-fis-li li").click(function() {
			var display_content = "#uro-exam-fis-form";
			var controller = "urology";
			var pageNum = this.id;
			$("#paginate-uro-exam-fis-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});

		//paginate control prenatal

		$("#paginate-control-prenatal-li li").click(function() {
			var display_content = "#control-prenatal-form";
			var controller = "control_prenatal";
			var pageNum = this.id;
			$("#paginate-control-prenatal-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);
		});

		//paginate reporte general
		$(document).on('click', '#paginate-report-general-li li', function() {

			var display_content = "#report-general-form";
			var controller = "modal_report_general";
			var pageNum = this.id;
			$("#paginate-report-general-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});



		$(document).on('click', '#paginate-orden-medica-li li', function() {

			var display_content = "#medical-order-forms";
			var controller = "modal_orden_medica";
			var pageNum = this.id;
			$("#paginate-orden-medica-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});

		$(document).on('click', '#paginate-ssr-li li', function() {

			var display_content = "#ssr-form";
			var controller = "ssr";
			var pageNum = this.id;
			$("#paginate-ssr-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});

		$(document).on('click', '#paginate-obs-li li', function() {

			var display_content = "#obs-form";
			var controller = "obs";
			var pageNum = this.id;
			$("#paginate-obs-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});

		$(document).on('click', '#paginate-coldh-li li', function() {

			var display_content = "#colposcopy-form";
			var controller = "colposcopy";
			var pageNum = this.id;
			$("#paginate-coldh-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});


		$(document).on('click', '#paginate-vulvoscopy-li li', function() {

			var display_content = "#vulvoscopy-form";
			var controller = "vulvoscopy";
			var pageNum = this.id;
			$("#paginate-vulvoscopy-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});

		$(document).on('click', '#paginate-examfisico-li li', function() {

			var display_content = "#examfisico-form";
			var controller = "examfisico";
			var pageNum = this.id;
			$("#paginate-examfisico-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);

		});


		$(document).on('click', '#paginate-examsistema-li li', function() {

			var display_content = "#examsistema-form";
			var controller = "examsistema";
			var pageNum = this.id;
			$("#paginate-examsistema-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});


		$(document).on('click', '#paginate-ophtalmology-li li', function() {

			var display_content = "#ophtalmology-form";
			var controller = "ophtalmology";
			var pageNum = this.id;
			$("#paginate-ophtalmology-li li.active").removeClass("active");
			$(this).addClass("active");

			paginateLiForm(display_content, controller, pageNum);


		});



		$(document).on('click', '#paginate-refraction-li li', function() {

			var display_content = "#refraction-form";
			var controller = "refraction";
			var pageNum = this.id;
			$("#paginate-refraction-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});




		$(document).on('click', '#paginate-vascular_surgeon-li li', function() {

			var display_content = "#vascular_surgeon-form";
			var controller = "vascular_surgeon";
			var pageNum = this.id;
			$("#paginate-vascular_surgeon-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});


		$(document).on('click', '#pagination-description_surgery-li li', function() {

			var display_content = "#description_surgery-form";
			var controller = "description_surgery";
			var pageNum = this.id;
			$("#pagination-description_surgery-li li.active").removeClass("active");
			$(this).addClass("active");
			paginateLiForm(display_content, controller, pageNum);

		});

		//-----------------------------------LOAD PAGINATION MODEL-----------------------------------------------------------------
		//---LOAD MODAL GENERAL REPORT
		//---LOAD MODAL REFRACTION

		// let loadModalRefraction = 0;
		// var exampleModalRefraction = document.getElementById('largeModalRefraction')
		// exampleModalRefraction.addEventListener('show.bs.modal', function(event) {

		// //$('#largeModalRefraction').on('show.bs.modal', function(event) {
		// 	loadModalRefraction++;
		// 	if (loadModalRefraction == 1) {

		// 		loadPagination("refraction");
		// 	}
		// })

		let loadModalGeneralReport = 0;
		var exampleModalGeneralReport = document.getElementById('largeModalReporteGnrl')
		exampleModalGeneralReport.addEventListener('show.bs.modal', function(event) {
			loadModalGeneralReport++;

			if (loadModalGeneralReport == 1) {
				loadPagination("modal_report_general");

			}
		})


		//LOAD ORDEN MEDICA
		let loadModalOrdenMedica = 0;
		var exampleModalOrdenMedica = document.getElementById('largeModalOrdenMedica')
		exampleModalOrdenMedica.addEventListener('show.bs.modal', function(event) {
			loadModalOrdenMedica++;

			if (loadModalOrdenMedica == 1) {
				loadPagination("modal_orden_medica");
			}
		})

		//---LOAD MODAL COLPOSCOPY

		let loadModalColposcopy = 0;
		var exampleModalColposcopy = document.getElementById('largeModalColposcopy')
		exampleModalColposcopy.addEventListener('show.bs.modal', function(event) {
			loadModalColposcopy++;
			if (loadModalColposcopy == 1) {
				loadPagination("colposcopy");

			}
		})

		let loadModalVulvoscopy = 0;
		var exampleModalVulvoscopy = document.getElementById('largeModalVulvoscopy')
		exampleModalVulvoscopy.addEventListener('show.bs.modal', function(event) {
			loadModalVulvoscopy++;
			if (loadModalVulvoscopy == 1) {

				loadPagination("vulvoscopy");
			}
		})


		//LOAD DESCRIPTION SURGERY

		let loadModalDescSurgery = 0;
		var exampleModalDescSurgery = document.getElementById('largeModalSurgeryDescription1')
		exampleModalDescSurgery.addEventListener('show.bs.modal', function(event) {
			loadModalDescSurgery++;

			if (loadModalDescSurgery == 1) {
				listFolders();
				loadPagination("description_surgery");
			}
		})
















	})
	
	
	function clearInputField(input) {
		
  document.getElementById(input).value = "";
  $('#suggestion-lab-list').hide();
}
</script>
</body>

</html>