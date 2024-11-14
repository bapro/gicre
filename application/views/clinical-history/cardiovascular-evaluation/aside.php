<aside id="sidebar" class="sidebar" >
<input id="id_eva_card" type="hidden" value="0" />
<?php
$aside = $this->session->userdata('doctorEspecialidad');

?>
    <ul class="nav flex-column nav-pills sidebar-nav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <li class="nav-item">
            <a class="nav-link active collapsed" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" href="#" role="tab" aria-controls="v-pills-home" aria-selected="true">
                <i class="material-symbols-outlined">rate_review </i> <span> Antecedentes Generales</span>
            </a>
        </li>



			<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
			<i class="material-symbols-outlined">
			science
			</i><span>Examenes</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="components-nav" class="nav-content  " data-bs-parent="#sidebar-nav">
			<li class="nav-item">
			<a class="nav-link collapsed" id="v-pills-sigVital-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sigVital" href="#" role="tab" aria-controls="v-pills-sigVital" aria-selected="false">
			<i class="material-symbols-outlined">monitor_heart</i><span> Signos Vitales</span></a>
			</li>

			<li class="nav-item">
			<a class="nav-link collapsed" id="v-pills-physic-tab" data-bs-toggle="pill" data-bs-target="#v-pills-physic" href="#" role="tab" aria-controls="v-pills-physic" aria-selected="false">
				<i class="material-symbols-outlined">monitor_heart</i><span> Exploración Físico </span></a>
			</li>
			
			<li class="nav-item">
			<a class="nav-link collapsed" id="v-pills-exam-result-tab" data-bs-toggle="pill" data-bs-target="#v-pills-exam-result" href="#" role="tab" aria-controls="v-pills-exam-result" aria-selected="false">
				<i class="material-symbols-outlined">monitor_heart</i><span> Resultado De Examenes </span></a>
			</li>


			</ul>
			</li>
           
		  
    </ul>

</aside><!-- End Sidebar-->

