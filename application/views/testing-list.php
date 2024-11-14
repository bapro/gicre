<div class="post-search-panel">
	<input type="text" id="keywords" placeholder="Type keywords to filter posts" onkeyup="searchFilter();"/>
	<select id="sortBy" onchange="searchFilter();">
		<option value="">Sort by Title</option>
		<option value="asc">Ascending</option>
		<option value="desc">Descending</option>
	</select>
</div>
       <table class="table table-sm  table-striped display compact" id="patient-citas-table" style="width:100%">
                    <thead>
                        <tr class="bg-th">
						<th>Foto</th>
						<th>NEC</th>
						<th>Nombres</th>
						<th>Seguro Médico</th>
						<th>Centro Médico</th>
						<th>Doctor</th>
						 <th>Fecha Propuesta</th>
                          <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="post-list" id="dataList">
	<!-- Display posts list -->
	<?php if(!empty($posts)){ foreach($posts as $row){ 
		 $patient=$this->db->select('nombre,photo,id_p_a,edad,nec1,seguro_medico,plan,afiliado, cedula')->where('id_p_a',$row->id_patient)
     ->get('patients_appointments')->row_array();
	 if($patient){
		$seguro_med=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])->get('seguro_medico')->row('title');
		$centro=$this->db->select('name, type')->where('id_m_c',$row->centro)->get('medical_centers')->row_array();
		$doctor=$this->db->select('name, area')->where('id_user',$row->doctor)->get('users')->row_array();
		$areaTitle=$this->db->select('title_area')->where('id_ar',$doctor['area'])->get('areas')->row('title_area');
		if(strpos($areaTitle, "CIRUJANO VASCULAR") !== false){
		$freq="SELECT id_historial FROM h_c_cirujano_vascular WHERE  id_historial=$row->id_patient AND inserted_by=$row->doctor group by inserted_time";
		}else{
		$freq="SELECT historial_id FROM h_c_enfermedad_actual WHERE  historial_id=$row->id_patient AND inserted_by=$row->doctor group by inserted_time";
		}
	  $cita_freq = $this->clinical_history->query($freq);

if($cita_freq->num_rows() == 0){
	$frecuencia_text="<em class='ms-5 badge bg-danger'>$cita_freq->num_rows <i class='bi bi-eye'></i></em>";
}else{
	$frecuencia_text="<em class='ms-5 badge bg-success'>$cita_freq->num_rows <i class='bi bi-eye'></i></em>";
 }
		
		
		
		
	
    // $afiliado = $patient['afiliado'];
		//if($patient['photo']){
		//$img= '<img  class="img-fluid img-thumbnail" width=105 src="'.base_url().'/assets/img/patients-pictures/'.$patient['photo'].'"  />';
		
		//}
		
		
						$array_values_for_photo = array(
						'id_p_a' =>$patient['id_p_a'],
						'cedula' =>$patient['cedula'],
						'image_class' => "img-fluid img-thumbnail",
						'style'=>'width=85'

						);
						$img = $this->search_patient_photo->search_patient($array_values_for_photo);
		
		
		$today = date('Y-m-d');
		
		
		
		$isSeenToday1=$this->clinical_history->select('historial_id')->like('inserted_time',$today)->where('inserted_by',$row->doctor)->where('historial_id',$row->id_patient)->where('centro_medico',$row->centro)->get('h_c_conclusion_diagno')->row('historial_id');
		$isSeenToday2=$this->clinical_history->select('id_patient')->like('inserted_time',$today)->where('id_user',$row->doctor)->where('id_patient',$row->id_patient)->get('h_c_conclusion_diagno_evolution')->row('id_patient');
		
			if($isSeenToday1 || $isSeenToday2){
				$isSeenToday=$isSeenToday1;
				$this->session->set_userdata('SHOW_BTN_SAVE_HIS', 0);
				$seen = '<strong class="text-success" style="font-size:15px"><em><strong class="bi bi-check"></strong></em></strong> ';
			 $tdBcG="style='background:#D9FAD1'";
			}else{
				$isSeenToday='';
				$seen = '';
				$tdBcG='';
			
			}
			
			
		if(strpos($areaTitle, "GINECO") !== false){
          $go_to = 'ginecology';
           }elseif($areaTitle=='UROLOGIA'){
			 $go_to = 'urology';  
		   }elseif(strpos($areaTitle, "PEDIATR") !== false){
			 $go_to = 'pediatry';  
		   }elseif($areaTitle=='OFTALMOLOGIA'){
			 $go_to = 'ophthalmology';  
		   }
		   elseif(strpos($areaTitle, "CIRUJANO VASCULAR") !== false){
			 $go_to = 'vascular_surgery';  
		   }
		   elseif(strpos($areaTitle, "CARDIO") !== false){
			 $go_to = 'cardiovascular_evaluation';  
		   }
		   else{
			 $go_to = 'patient_history';  
		   }
		
		if($this->PERFIL =="Asistente Medico" &&  $centro['type']=='privado'){
			$go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."medico/general_history/".encrypt_url($row->id_patient).'/'.encrypt_url($row->doctor).'/'.encrypt_url($row->centro).'/'.encrypt_url($doctor['area']).'" title="Historia Clínica"><i class="bi bi-hospital"></i> Antecedentes Generales</a>';
		}
		
		else{
		$go_to_hist ='<a  class="dropdown-item"  href="'.site_url()."clinical_history/$go_to/".encrypt_url($row->id_apoint).'/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->centro).'/'.encrypt_url($row->doctor).'/'.encrypt_url($doctor['area']).'" title="Historia Clínica"><i class="bi bi-hospital"></i> Historia Clínica</a>';
		}
		//$resumen_hist ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalResumenHist2" title="Resumen de la historial clinica"><i class="bi bi-card-list"></i> Resumen</button>';
		 $desc_qui ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalSurgeryDescription2" title="Descripción Quirúrgica"><i class="bi bi-file-medical"></i> Descripción Quirúrgica</button>';
		$indications_hist ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#indications" title="Indicaciones"><i class="fas fa-prescription"></i> Indicaciones</abutton>';
		$follow_up ='<button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalFollowUp2" title="Dar Seguimiento"><i class="bi bi-fast-forward-circle"></i> Seguimiento</button>';
		$general_report ='<button type="buton" class="dropdown-item" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalReporteGnrl2" title="Reporte general"> <i class="bi bi-card-text"></i> Reporte General</button>';
		$go_to_patient_data ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/patient/'.encrypt_url($row->id_patient).'/'.encrypt_url($row->id_apoint).'/'.encrypt_url($row->centro).'" >'.strtoupper($patient['nombre']).'</a>';
		$patient_documentos ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#patientDocumentos"  title="Documentos del Paciente"><i class="bi bi-archive"></i> Documentos</button>';
		$orden_medica ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalOrdenMedica2"  title="Orden Médica"><i class="bi bi-h-circle"></i> Orden Médica</button>';
		
		
		if($areaTitle=='OFTALMOLOGIA'){
			$refraction ='<li><button class="dropdown-item"  data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#largeModalRefraction" title="Refracción"><i class="bi bi-eye"></i> Refracción</button></li>';
		$desc_qui ='';
		$orden_medica ='';
		$eva_cardio='';	
		}elseif(strpos($areaTitle, "CARDIO") !== false){
		$eva_cardio ='<button  class="dropdown-item" type="buton" data-id="'.$row->id_apoint.'" data-bs-toggle="modal" data-bs-target="#cardiovasEval"  title="Evaluación Cardiovascular"> <i class="bi bi-heart-pulse"></i> Evaluación Cardiovascular</button>';	
		$refraction ='';
		$desc_qui ='';
		$orden_medica ='';
		
		$follow_up ='';
		}else{
		$eva_cardio='';	
		$refraction ='';
		
		}
		
		
		if($this->PERFIL =="Asistente Medico"){
			$go_doctor_account =strtoupper($doctor['name']);
		}else{
			$go_doctor_account ='<a  href="'.site_url().''.$this->USER_CONTROLLER.'/doctor_account/'.$row->doctor.'" >'.strtoupper($doctor['name']).'</a>';
		}
		
		
		if($this->PERFIL =="Asistente Medico" &&  $centro['type']=='publico'){
			$actions ='';
		}else{
			$actions = "<div class='btn-group' style='position:absolute;' >
		<ul class='nav navbar-nav'>
	<li class='dropdown' >

  
   <button type='button' class='btn btn-primary btn-sm dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'></button>
  $seen
		<ul class='dropdown-menu' >
		<li>$go_to_hist</li>
		$refraction
		$eva_cardio
		<li>$general_report</li>
		<li>$desc_qui</li>
		<li>$orden_medica</li>
		<li>$follow_up </li>
<li>$indications_hist</li>
		<li>$patient_documentos</li>
		
		</ul>
		</li>
		</ul>
		
		</div>
		
		";
		}
		
		
		
		echo "<tr  $tdBcG>";
	
	echo "<td>$img</td>";
	echo "<td> $row->id_patient</td>";
    echo "<td> $go_to_patient_data</td>";
	 echo "<td>$seguro_med</td>";
	echo '<td><a  href="'.site_url().''.$this->USER_CONTROLLER.'/see_medical_center/'.$row->centro.'" >'.$centro['name'].'</a></td>';
     echo "<td> $go_doctor_account <em style='font-size:11px'> $areaTitle</em></td>";
	 echo "<td>$row->fecha_propuesta</td>";
	 echo "<td>$actions. $frecuencia_text</td>" ;
     
	}
	echo "</tr>";
	 }

  echo"
  </tbody> 
  </table>";

	 }else{ ?>
		<p>Post(s) not found...</p>
	<?php } ?>
	
	<!-- Render pagination links -->
	<?php echo $this->ajax_pagination->create_links(); ?>
</div>

<!-- Loading Image -->
<div class="loading">

</div>


 <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  
  
  <script>



	
	function searchFilter(page_num){
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('admin_test/ajaxPaginationData/'); ?>'+page_num,
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function(){
            $('.loading').addClass("spinner-border");
        },
        success: function(html){
            $('#dataList').html(html);
            $('.loading').removeClass("spinner-border");
        }
    });
}
	


  </script>