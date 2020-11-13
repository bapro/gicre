<?php 
$this->load->view('admin/header_admin');
$name=($this->session->userdata['admin_name']);
$cpt="";
?>
<hr id="hr_ad"/>
<div class="container" >

<?php
foreach ($drugstore as $row)
?>
<div class="col-xs-12">
<div class="col-xs-5">
<h3 class="h3 col-xs-offset-5"> Farmacia #<?=$row->id?></h3>
</div>
<div class="col-xs-4">
<span class="del" style="font-size:12px"><?php echo $this->session->flashdata('save_farmacia'); ?></span>
</div>
</div>
<div class="row" id="background_" >
<table class="table table-striped table-hover" style="width:65%; margin: auto;">
<tr>
<th class="thh">NOMBRE DE ASOCIACION :</th>
<td class="vtd"><?=$row->noma?></td>

</tr>
<tr>
<th class="thh">NOMBRE COMERCIAL :</th>
<td class="vtd">
<?=$row->nomc?>
</td>
</tr>


<tr>
<th class="thh">DIRECCION :</th>
<td class="vtd">
<?=$row->dire?>
</td>
</tr>
<tr>
<th class="thh">TELEFONOS :</th>
<td class="vtd" ><?=$row->tel?></td> 

</tr>

<tr>
<th class="thh">PAGINA WEB :</th>
<td class="vtd"><?=$row->web?></td> 
</tr>

<tr>
<th class="thh">CORREO ELECTRONICO :</th>

<td class="vtd"><?=$row->email?></td> 
</tr>
<tr>
<th class="thh">RNC :</th>

<td class="vtd"><?=$row->rnc?>"</td> 
</tr>
<tr>
<th class="thh">REGISTRO SANITARIO :</th>

<td class="vtd"><?=$row->san?></td> 
</tr>

</table>

</div>
<hr id="hr_ad"/>

<section  >
<div class="col-md-12" >
<div class="heading text-left">
<h4>Datos Relacionados por la farmacia <span style="color:green"><?=$row->noma?></span></h4>
</div>

<ul class="nav nav-pills nav-justified">
<li class="active"><a href="#medicamentos" data-toggle="tab">Medicamentos</a></li>
<li><a href="#pacientes" data-toggle="tab">Pacientes</a></li>
</ul>
<div class="tab-content tab-content-inverse" id="">

<div class="tab-pane active" id="medicamentos">

<div style="overflow-x:auto;">
<div id="load_drugstore"></div>

</div>

</div><!--centro medico end-->

<div class="tab-pane" id="pacientes">
<div style="overflow-x:auto;">
<span style="font-size:12px;float:right;margin-right:15px"><b><i>Total : <?=$count2?></i></b></span>
<table id="example" class="table table-striped table-bordered" style="font-size:14px;" cellspacing="0" >

<thead>
<tr style="background:#38a7bb;color:white">
<th>NEC</th>
<th>Nombres</th>
<th>Causa</th>
<th>Centro medico</th>
<th>Area</th>
<th>Doctor</th>
<th>Medicamentos</th>
<th>Fecha</th>
</tr>
</thead>
<tbody>
<?php 
foreach($fm as $row_rd){
	
//-----------causa--------------------
$caus=$this->db->select('title')->where('id',$row_rd->causa )
->get('type_reasons')->row_array();
//---------centro medico-------------------
$centro=$this->db->select('name')->where('id_m_c',$row_rd->centro )
->get(' medical_centers')->row_array();
//---------centro medico-------------------
$area=$this->db->select('title_area')->where('id_ar',$row_rd->area )
->get(' areas')->row_array();
//------------doctor--------------------
$doctor=$this->db->select('name')->where('id_user',$row_rd->doctor )
   ->get('users')->row_array();
   //--------number of medicaments------------------
  // $medi=$this->db->select('historial_id')->where('farmacia',$row_rd->farmacia)
   //->get('indicaciones_medicales');
   $medi=$this->db->select('farmacia')->where('historial_id',$row_rd->historial_id )
   ->get('h_c_indicaciones_medicales');	
	
	
	
	
	
	
if ( $cpt==0 ) {
$cpt=1;
$colorBg = "#E0E5E6";
} 
else {
$cpt=0;
$colorBg = "#E0E5E6";
}	

?>
<tr bgcolor="<?=$colorBg ;?>">
<td><?=$row_rd->nec?></td>
<td style="text-transform:uppercase"><?=$row_rd->nombre?></td>
<td><?=$caus['title']?></td>
<td><?=$centro['name']?></td>
<td><?=$area['title_area']?></td>
<td><?=$doctor['name'];?> </td>
<td><strong><a data-toggle="modal" title="Mostrar" data-target="#show_medicamento" style="color:red" href="<?php echo base_url('admin/patient_medica/'.$row_rd->historial_id)?>">Total (<?=$medi->num_rows()?>)</a></strong></td>
<td><?=$row_rd->fecha_propuesta?></td>
</tr>

<?php
}
?>
</tbody>
</table>
</div> <!--solicitudes ends-->
</div><!-- /.tabs content end-->

</div><!-- col m12 end -->


</section>
</div>
<div class="modal fade" id="show_medicamento"  tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
          <div class="modal-body">
		  </div>
        </div>
    </div>
</div>
</div><!-- container end -->

<?php $this->load->view('footer');?>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
    $('#show_medicamento').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
})


 setInterval(function(){//setInterval() method execute on every interval until called clearInterval()
  $('#load_drugstore').load("<?php echo base_url('admin/load_drugstore_by_id/'.$row->id)?>").fadeIn("slow");
  //load() method fetch data from fetch.php page
 }, 1000);
</script>

</html>