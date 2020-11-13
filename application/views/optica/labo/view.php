
<style>
/*.modal-dialog {
    margin: -1vh auto 0px auto
}*/
td,th{text-align:left}
.img {
    width: 15%;
    height: auto;
	border:1px solid #38a7bb
}
</style>

 <!-- *** welcome message modal box *** -->
 
 <?php 

 $i = 1;
$cpt="";
 ?>
 


<div class="container"  >

 <?php echo $this->session->flashdata('success_msg'); 
  foreach($query->result() as $row)?>
 <div class="row" id="background_">
 <div class="col-md-7">
 <h2>LABORATORIO DE LENTES</h2>
 
  <?php $user_c18=$this->db->select('name')->where('id_user',$row->inserted_by)->get('users')->row('name');
$user_c19=$this->db->select('name')->where('id_user',$row->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($row->inserted_time));
$updated_time = date("d-m-Y H:i:s", strtotime($row->updated_time));
echo "<span style='color:black'>Creado por : $user_c18 ($inserted_time) <br/> Modificado por $user_c19 ($updated_time)</span>";?>
 </div>
 <div class="col-md-3" >
  <img class="img "  style="width:200px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $row->logo; ?>"  />

 </div>

 <div class="col-md-2 text-right acionesright">
 <div class="dropdown">
  <button class="btn btn-primary btn-xs dropdown-toggle atras" type="button" data-toggle="dropdown" data-hover="dropdown">
   Editor <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
  <li><a  href="<?php echo base_url('admin/updateLabLentes/'.$row->id)?>">Editar</a></li>
 <!-- <li><a href="#">Inhabilitar Centro Medico</a></li>-->
  <li><a href="<?php echo base_url('admin/create_lab_lentes')?>">Crear Nuevo</a></li>
  </ul>
</div>
 </div>

 </div><br/>
  <div class="row" id="background_">
 <table class="table table-striped ">

<tr>
<th class="thh">NOMBRE COMERCIAL</th>
<td class="vtd"><?=$row->nombre_comercial;?></td>

</tr>

<tr>
<th class="thh">RNC</th>
<td class="vtd"><?=$row->rnc;?></td>

</tr>
<tr>
<th class="thh">DIRECCION</th>
<td class="vtd"><?=$row->direccion;?>, <?=$row->pais;?>, <?=$row->provincia;?>, <?=$row->ciudad;?></td>
</tr>

<tr>
<th class="thh">TELEFONO</th>
<td class="vtd"><?=$row->telefono;?></td>
</tr>
<tr>
<th class="thh">PAGINA WEB</th>
<td class="vtd" ><?=$row->pagina_web;?></td>

</tr>

<tr>
<th class="thh">CORREO</th>
<td class="vtd"><?=$row->correo;?></td>
</tr>

</table>
</div>
</div>
</div>
<br/>
<br/>



 </body>
 
 <?php 
 
 
        $this->load->view('footer');

 ?>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>-->
 <script src="<?=base_url();?>assets/js/custom.js"></script> 
<script>
 

</script>
</html>