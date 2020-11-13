<?php
$query_area = $this->db->get('areas');
$query_patient = $this->db->get('patients_appointments');
$query_citas = $this->db->get('rendez_vous');
$query_centro = $this->db->get('medical_centers');
$query_doctor = $this->db->get('doctors');
$query_sol=$this->db->select('id_apoint')->where('confirmada',1 )->get('rendez_vous');
$query_seguro= $this->db->get('seguro_medico');
$query_user= $this->db->get('users');
?>
<li class="dropdown" >
<a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Acciones <b class="caret"></b></a>
<ul class="dropdown-menu" >
<li><a href="<?php echo site_url('admin/Users');?>"> <img src="<?= base_url();?>assets/img/user.png" style="width:25px;border-radius:20px" alt=""/> <?=$query_user->num_rows();?> Usuarios</a></li>
<li><a href="<?php echo site_url('admin/Areas');?>"><?=$query_area->num_rows();?> Areas</a></li>
<li><a href="<?php echo site_url('admin/Requests');?>"><?=$query_sol->num_rows();?> Cola solicitud</a></li>
<li><a href="<?php echo site_url('admin/Patients');?>"><?=$query_patient->num_rows();?> Pacientes</a></li>
<li><a href="<?php echo site_url('admin/Appointments');?>"><?=$query_citas->num_rows();?> Citas</a></li>
<li><a href="<?php echo site_url('admin/AllCentroMedico');?>"><?=$query_centro->num_rows();?> Centro Medicos</a></li>
<li><a href="<?php echo site_url('admin/Doctors');?>"><?=$query_doctor->num_rows();?> Doctores</a></li>
<li><a href="<?php echo site_url('admin/InsuranceMedicals');?>"><?=$query_seguro->num_rows();?> Seguro Medicos</a></li>
<li><a href="<?php echo site_url('admin/Provinces');?>">Provincias</a></li>
<li><a href="<?php echo site_url('admin/Townships');?>">Munucipios</a></li>
<li><a href="<?php echo site_url('admin/display_all_reasons');?>">Causas</a></li>
<li><a href="<?php echo site_url('admin/drugstores');?>">Farmacias</a></li>
<li class="dropdown">
<ul class="dropdown-menu">
<li><a href="<?php echo site_url('admin/Fields');?>">Campos Seguro Medico</a></li>
<li><a href="<?php echo site_url('admin/medical_insurance_audit_profile');?>"  >Perfil Seguro Medico y Auditoria</a></li>
</ul>
</li>
<li class="dropdown">
<a href="<?php echo site_url('admin/billings');?>"  > Facturación </a>
<ul class="dropdown-menu">
<li title="Mantenimiento de Servicios por Seguros Medicos"><a href="<?php echo site_url('admin/mssm');?>"  > MSSM</a></li>
<li><a href="<?php echo site_url('admin/invoice_ars_claim');?>"  > CREACION DE FACTURA PARA RECLAMAR A LA ARS</a></li>

</ul>
</li>

</ul>
</li>
