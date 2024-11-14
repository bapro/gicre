<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<style>
.label.label-default{background:none;color:black;font-weight:bold;border:1px solid #38a7bb;}
td,th{text-align:left}
.searchb{background:linear-gradient(to top, #E0E5E6, white);border:1px solid #38a7bb;}

</style>

</head>
<h2 class="h2" align="center">GESTION DE FACTURAS DE HOSPITALIZACION </h2>
<hr id="hr_ad"/>
<div class="col-md-12 searchb deactivate_s">
<span id='where-search-is-from' style='display:none'>hospitalization_data</span>
<div class="col-md-9"> 
<label>Elegir El Centro Medico</label>
<select class="form-control select2"  id="select-medico-fac" > 
  <?php 

 foreach($centro_medico_tarif as $cent)
 { 
 echo '<option value="'.$cent->id_m_c.'">'.$cent->name.'</option>';
 }
 ?>
 </select>
<h6>BUSCADOR DE PACIENTE</h6>
<div class="col-md-3 form-group">
        <label>cedula/pasaporte</label>
		<input class="form-control search-patient search-patient-ced" type="text" maxlength="11" onkeypress='return onlyNumberNec(event);'/>
	<div id='missing-cedula'><em></em></div>
 
    </div>
    <div class="col-md-2 form-group">
        <label>NEC</label>
		<input class="form-control search-patient search-patient-nec" onkeypress='return onlyNumberNec(event);'/>
	
    </div>
	    <div class="col-md-5 form-group">
        <label>Nombres</label>
		<input class="form-control search-patient search-patient-nombres" type="text" placeholder='Nombres Apellido1 Apellido2'/>
		<div id='missing-apellido'><em></em></div>

    </div>
	</div>
	<div class="col-md-6  col-md-offset-2">
 
<div class="suggesstion-box"></div>

 </div>
 </div>



<div id="patientHintNombres"></div>


 <!--container-->

 <br/> <br/>





<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<?php $this->load->view('search/search-patient');?>
