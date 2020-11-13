<style>
 td,th,label,input{font-size:13px;text-align:left}
</style>
<body>

<div class="container" >
<h2>CITAS DE REFRACCION</h2>
<div class="row"  style="background:#E0E5E6;border:1px solid #38a7bb;"> 
 <form class="form-inline" method="get"  action="<?php echo site_url("medico/seachRefraccion");?>" >
 <div class="col-md-3" > 
<select  name="centro"  class="form-control select2" style="background:#E0E5E6;width:100%" >
 <?php 
foreach($centro_medico as $row)
 { 
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
</div>
 <div class="col-md-9" > 
<div class="form-group">
<label for="desde" style='font-size:10px'> Desde </label>  <input type="text" id="date_from" name="date_from" value="<?=date('d-m-Y');?>" class="form-control date" readonly>
</div>
<div class="form-group">
<label for="hasta" style='font-size:10px'> Hasta </label>  <input type="text" id="date_to"  value="<?=date('d-m-Y');?>" name="date_to" class="form-control date" readonly >
</div>
<button type="submit" id="click_button" class="btn btn-primary btn-xs" ><i class="fa fa-search"></i></button>

</form>
</div>
</div>
<br/>
<br/>
<div class="col-md-12 table-responsive">
<table id="example" class="table table-striped" width="100%" >
<thead>
<tr style="background:#5957F7;color:white">
<th><strong>NEC</strong></th>
<th><strong>Foto </strong></th>
<th><strong>Paciente</strong></th>
<th><strong>Fecha Propuesta</strong></th>
<th><strong>Centro</strong></th>
<th><strong>Doctor</strong></th>
<th><strong>Refracción</strong></th>
</tr>
</thead>
<tbody>
<?php
$date=date('Y-m-d');
$this->padron_database = $this->load->database('padron',TRUE);
 foreach($appointments as $ver)
 
{
$patient=$this->db->select('nombre,photo,ced1,ced2,ced3,frecuencia')->where('id_p_a',$ver->id_patient )
->get('patients_appointments')->row_array();

$sql_con ="SELECT id_refraccion FROM  laboratory_lentes WHERE patient=$ver->id_patient  &&  id_doc=$ver->doctor ";
$atendido_con = $this->db->query($sql_con);

if($atendido_con->num_rows() > 0){
	$hay='#B8FFD3';
$checked="<i style='color:green;font-size:24px' class='fa fa-check' aria-hidden='true' title='&#013 enviada al laboratorio'></i>";
$checked2='';
}else{
$hay='';
$checked="";
$checked2='';	
}

$idref=$this->db->select('id')->where('id_hist',$ver->id_patient)->get('h_c_of_refracion')->row('id');
if($idref){
$inforef="&#013 refraccion creada";	
$checked2="<i style='color:#428bca' class='fa fa-check' aria-hidden='true' ></i>";
$idref=$idref;
}else{
$inforef="";
$checked2="";
$idref=0;	
}
?>
<tr style="background:<?=$hay?>"  >
<td><?=$ver->nec;?></td>
<td>
<?php

if($patient['photo']=="padron"){
 $photo=$this->padron_database->select('IMAGEN')
->where('MUN_CED',$patient['ced1'])
->where('SEQ_CED',$patient['ced2'])
->where('VER_CED',$patient['ced3'])
->get('fotos')->row('IMAGEN');
if($photo){
echo '<img width="75px"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
}else{
echo '<img  style="width:75px;" src="'.base_url().'/assets/img/user.png"  />';
}
} else if($patient['photo']==""){
?>
<img  width="75px"  src="<?= base_url();?>/assets/img/user.png"  />	
<?php
}
else{
	?>
<img  width="75px"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
<?php

}
?>
</td>
<td style="text-transform: uppercase;">
<a href="<?php echo site_url("medico/patient/$ver->id_patient/$ver->centro/$ver->doctor"); ?>"><?=$patient['nombre'];?></a> 
</td>

<td ><?=$ver->fecha_propuesta;?></td>
<td style="text-transform: uppercase">
<?php 
$centro=$this->db->select('name,type')->where('id_m_c',$ver->centro )
->get('medical_centers')->row_array();
echo $centro['name'];
?>
</td>
<td style="text-transform: uppercase">
<?php
$doctor=$this->db->select('name')->where('id_user',$ver->doctor )
   ->get('users')->row('name');
  echo $doctor; 
   ?>
  </td>
<td style="text-transform: uppercase" title="<?=$inforef?>">
<a data-toggle="modal" data-target="#of-ref-mdl" href="<?php echo site_url("optometrist/refraccion/$iduser/$ver->id_patient/$ver->centro/$idref"); ?>"><i class="glyphicon glyphicon-sunglasses" style='font-size:18px'></i> <?=$checked2?> <?=$checked?></a>

</td>

</tr>

<?php
}
?>
</tbody>     
</table>
</div>

</div>

<div class="modal fade" id="of-ref-mdl"  role="dialog" tabindex="-1"  >
<div class="modal-dialog modal-lg" >
<div class="modal-content" >

</div>
</div>
</div>
</div>
<?php $this->load->view('footer'); ?>


<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
 <script>
 $('#of-ref-mdl').on('hidden.bs.modal', function () {
//$(this).removeData('bs.modal');
 location.reload();
});

 $(".date").datepicker({
dateFormat: 'dd-mm-yy',
	//maxDate: "-1d"

  });
  $('.select2').select2({ 
tags: true,   
  language: {

    noResults: function() {

      return "No hay resultado";        
    },
   
  }
});

</script>
</body>
</html>
