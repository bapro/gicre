
<!-- owl carousel css -->
<style>
td,th{text-align:left}
</style>


<!-- *** welcome message modal box *** -->


<div class="container" >


<?php
foreach ($drugstore as $row)
?>
<div class="col-xs-12">
<div class="col-xs-5">
<h3 class="h3 col-xs-offset-5"> 

<img class="img-responsive" width="100"  src="<?= base_url();?>/assets/img/farmacias/<?php echo $row->logo; ?>"  />

</h3>
</div>
<div class="col-xs-4">
<span class="hide-all-but">
 <a  style="float:right" class="btn btn-primary btn-sm click-editar" ><i class="fa fa-pencil" aria-hidden="true" ></i> Editar </a>
 <form   class="form-horizontal"  method="post" enctype="multipart/form-data"  action="<?php echo site_url('farmacia/SaveFarmaciaUp');?>" > 
<input type="hidden" class="form-control" name="id" value="<?=$row->id?>" >
<button type="submit" id="sendc" style="float:right;display:none" class="btn btn-success btn-sm save-patient" ><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar</button>
</span>
<span class="del" style="font-size:12px"><?php echo $this->session->flashdata('save_farmacia'); ?></span>
</div>
</div>
<div class="row hide-form-view"  id="background_" >
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

<td class="vtd"><?=$row->rnc?></td> 
</tr>
<tr>
<th class="thh">REGISTRO SANITARIO :</th>

<td class="vtd"><?=$row->san?></td> 
</tr>

</table>

</div>






<div class="row show-form-edit"  id="background_" style="display:none" >
<table class="table table-striped table-hover" style="width:65%; margin: auto;">
<tr>
<th class="thh">NOMBRE DE ASOCIACION :</th>
<td class="vtd"><input type="text" class="form-control" name="noma" value="<?=$row->noma?>" ></td>

</tr>
<tr>
<th class="thh">NOMBRE COMERCIAL :</th>
<td class="vtd">
<input type="text" class="form-control" name="nomc" value="<?=$row->nomc?>" >
</td>
</tr>


<tr>
<th class="thh">DIRECCION :</th>
<td class="vtd">
<input type="text" class="form-control" name="dir" value="<?=$row->dire?>" >
</td>
</tr>
<tr>
<th class="thh">TELEFONOS :</th>
<td class="vtd" >
<input type="text" class="form-control" name="tel" value="<?=$row->tel?>" >


</td> 

</tr>

<tr>
<th class="thh">PAGINA WEB :</th>
<td class="vtd">
<input type="text" class="form-control" name="web" value="<?=$row->web?>" >

</td> 
</tr>

<tr>
<th class="thh">CORREO ELECTRONICO :</th>

<td class="vtd">

<input type="text" class="form-control" name="email" value="<?=$row->email?>" >
</td> 
</tr>
<tr>
<th class="thh">RNC :</th>

<td class="vtd">
<input type="text" class="form-control" name="rnc" value="<?=$row->rnc?>" >
</td> 
</tr>
<tr>
<th class="thh">REGISTRO SANITARIO :</th>

<td class="vtd">
<input type="text" class="form-control" name="san" value="<?=$row->san?>" >

</td> 
</tr>

</table>

</div>
</form>



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
<th>id</th>
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
$cpt="";
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
$doctor=$this->db->select('first_name,last_name')->where('id',$row_rd->doctor )
   ->get('doctors')->row_array();
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
<td><?=$row_rd->id_p_a?></td>
<td><?=$row_rd->nec?></td>
<td style="text-transform:uppercase"><?=$row_rd->nombre?></td>
<td><?=$caus['title']?></td>
<td><?=$centro['name']?></td>
<td><?=$area['title_area']?></td>
<td><?=$doctor['first_name'];?> </td>
<td><strong><a data-toggle="modal" title="Mostrar" data-target="#show_medicamento" style="color:red" href="<?php echo base_url('farmacia/patient_medica/'.$row_rd->historial_id)?>">Total (<?=$medi->num_rows()?>)</a></strong></td>
<td><?=$row_rd->fecha_propuesta?></td>


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
 $('#load_drugstore').load("<?php echo base_url('farmacia/load_drugstore_by_id/'.$row->id)?>").fadeIn("slow");
  //load() method fetch data from fetch.php page
 }, 1000);
 
 
 
 
 
 
 
 
 
 
 
 
 $('.click-editar').on('click', function() {
$(".click-editar").hide();
$(".show-form-edit").show();
$(".hide-form-view").hide();
$(".save-patient").show();



});
</script>

</html>