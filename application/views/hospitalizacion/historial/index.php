<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>HOSPITALIZACION</title>
  <!-- Font Awesome -->
  <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.1/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>assets/css/hospitalizacion/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->

  <!-- Your custom styles (optional) -->
  <link href="<?=base_url();?>assets/css/hospitalizacion/style.min.css" rel="stylesheet">
  
  
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
.center-img {
   width:100%;
   height:160px;
   object-fit:cover;
   object-position:50% 50%;
  }
.im-bg{
background-image: url('<?=base_url();?>assets/img/hospital_bcg3.jpg');
 background-repeat: no-repeat;
background-size: cover;
}
  </style>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header  >

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar im-bg" >
     
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent"  >

          <!-- Left -->
          <ul class="navbar-nav mr-auto" >
          
            <li class="nav-item">
              
                <strong><u>Nombre</u></u></strong><br/> KEYSMEL ERNESTO AQUINO MARTINEZ 
            </li>
            <li class="nav-item">
             
				<strong><u>Edad</u></strong><br/> 12 años
				
            </li>
            <li class="nav-item">
             
               <strong><u>NEC</u></strong><br/> 6464
            </li>
			 <li class="nav-item" >
              
                <strong><u>Cedula</u></strong><br/>  354-3454353-4
            </li>
			 <li class="nav-item">
            
               <strong> <u>Seguro</u></strong><br/> PRIMERA DE HUMANO
            </li>
       
         
            <li class="nav-item">
     
               <strong><u>Ingreso</u><br/></strong> 23-06-2020 14:00:33
            </li>
            <li class="nav-item">
            <strong><u>Diagnostico</u><br/></strong> DOLOR ABDOMINAL AGUDO
            </li>
            <li class="nav-item">
            
                <strong><u>Sala</u></strong><br/> TERCER NIVEL 
            </li>
			 <li class="nav-item">
             
                <strong><u>Cama</u></strong> 677
            </li>
          </ul>
          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
		  
		   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
           <i class="fa fa-plus" aria-hidden="true" style='font-size:20px'></i>
        </a>
        <div class="dropdown-menu m-0 im-bg" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fa fa-angle-double-right" style="font-size:24px"></i> Notas</a>
          <a class="dropdown-item" href="#"><i class="fa fa-angle-double-right" style="font-size:24px"></i> Interconsultas</a>
          <a class="dropdown-item" href="#"><i class="fa fa-angle-double-right" style="font-size:24px"></i> Orden Medica</a>
		  <a class="dropdown-item" href="#"><i class="fa fa-angle-double-right" style="font-size:24px"></i> Descripcion Quirurgica</a>
        </div>
      </li>
	  
   <li class="nav-item">
             
            <button type="button" class="btn btn-primary btn-sm" title='Guardar'>Guardar</button>
            </li>
			 <li class="nav-item">
            <button type="button" class="btn btn-success btn-sm" title='Guardar Alta'>Guardar</button>
            </li>
          </ul>

        </div>

    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed im-bg" >
	<br/>
	<?php
	
$this->padron_database = $this->load->database('padron',TRUE);
$patient_data=$this->db->select('*')->where('id',$id_hosp)->get('hospitalization_data')->row_array();
$causa=$patient_data['causa'];
$sala=$patient_data['sala'];
$cama=$patient_data['cama'];
 $fecha_ingreso=$patient_data['timeinserted'];
 $patient=$this->db->select('nombre,photo,ced1,ced2,ced3,date_nacer,nec1,seguro_medico,plan,afiliado,cedula,id_p_a,date_nacer_format')->where('id_p_a',$patient_data['id_patient'])
 ->get('patients_appointments')->row_array(); 
$patient_id=$patient['id_p_a'];

$photo=$patient['photo'];
$nombre=$patient['nombre'];
$date_nacer=$patient['date_nacer'];
$cedula=$patient['cedula'];
$ced1=$patient['ced1'];
$ced2=$patient['ced2'];
$ced3=$patient['ced3'];
$seguro_medico_name=$this->db->select('title')->where('id_sm',$patient['seguro_medico'])
->get('seguro_medico')->row('title');


if($photo=="padron"){
$photop=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$ced1)
->where('SEQ_CED',$ced2)
->where('VER_CED',$ced3)
->get('fotos')->row('IMAGEN');
 if($photo){
?>
<a title="Haga un clic para agrandar." data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin_medico/zoom_image/$ced1/$ced2/$ced3")?>">
<?php
$imgpat='<img  style="width:75px;"  src="data:image/jpeg;base64,'. base64_encode($photop) .'"  />';	
echo $imgpat;
echo "</a>";
}else{
echo "<a>";	
$imgpat='<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';	
echo $imgpat;
?>
</a>
<?php
}
$sexo="";
} else if($photo==""){
	$sex = substr($sexo, 0, 3);
$sexo="<li><a style='color:#209BD8;' >$sex.</a></li>";
echo '<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';
}
else{
$sexo="";
?>
<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin_medico/zoom_image_ad/$patient_id")?>">
<img class='center-img'   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $photo; ?>"  />
</a>
<?php }

$agett=getPatientAge($date_nacer);


?>
	


     <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
      
  <h1 class='h5'>HOSPITALIZACION</h1>
 
        <a class="nav-link waves-effect active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">
       <i class="fa fa-angle-double-right" ></i> General
	   </a>
	    <a class="nav-link waves-effect" id="v-pills-fisico-tab" data-toggle="pill" href="#v-pills-fisico" role="tab" aria-controls="v-pills-fisico" aria-selected="false">
		<i class="fa fa-angle-double-right" ></i> Examen Fisico
		</a>
        <a class="nav-link waves-effect" id="v-pills-sitema-tab" data-toggle="pill" href="#v-pills-sitema" role="tab" aria-controls="v-pills-sitema" aria-selected="false">
		<i class="fa fa-angle-double-right" ></i>Ex. Del Sistema
		</a>
		 <a class="nav-link waves-effect" id="v-pills-neurologico-tab" data-toggle="pill" href="#v-pills-neurologico" role="tab" aria-controls="v-pills-neurologico" aria-selected="false">
		<i class="fa fa-angle-double-right" ></i> Ex. Neurologico
		</a>
      
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="pt-5 mx-lg-5" >
    <div class="container-fluid mt-5">

	<div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab"> 

<?php 
if($rows < 1){
$this->load->view('admin/emergencia/general/historial-medical-content-empty');
}else{
 $this->load->view('admin/emergencia/general/historial-medical-content-data');
 $this->load->view('admin/historial-medical1/all-data/footer-ant-general');
}
?>
	  </div>
	   <div class="tab-pane fade" id="v-pills-fisico" role="tabpanel" aria-labelledby="v-pills-fisico-tab">
	   <?php $this->load->view('admin/emergencia/general/signo-vitales');?>
	   
	   </div>
	  
	  <div class="tab-pane fade" id="v-pills-sitema" role="tabpanel" aria-labelledby="v-pills-sitema-tab">
	  <?php $this->load->view('admin/historial-medical1/examen-sistema/index');?>
	  
	  </div>
	  
	 
	  <div class="tab-pane fade" id="v-pills-neurologico" role="tabpanel" aria-labelledby="v-pills-neurologico-tab">
	  <?php $this->load->view('hospitalizacion/historial/exam-neuro/index');?>
	  
	  </div>
    </div>
	</div>
  </main>
  <!--Main layout-->

 
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?=base_url();?>assets/js/hospitalizacion/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?=base_url();?>assets/js/hospitalizacion/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->

  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
   

  </script>

 

  </script>
</body>

</html>
