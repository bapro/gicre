
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

 <?php echo $this->session->flashdata('success_msg'); ?>
  <?php foreach($CENTRO_MEDICO as $centro_medico)?>
 <div class="row" id="background_">
 <div class="col-md-3">
 <h3>Centro Medico</h3>
 </div>
 <div class="col-md-7">
  <img class="img "  style="width:130px" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $centro_medico->logo; ?>"  />

 </div>

 </div><br/>
  <div class="row" id="background_">
 <table class="table table-striped table-bordered">

<tr>
<th class="thh">Nombre</th>
<td class="vtd"><?=$centro_medico->name;?></td>

</tr>

<tr>
<th class="thh">Tipo</th>
<td class="vtd"><?=$centro_medico->type;?></td>

</tr>

<tr>
<th class="thh">RNC</th>
<td class="vtd"><?=$centro_medico->rnc;?></td>

</tr>
<tr>
<th class="thh">Tel Residencial</th>
<td class="vtd"><?=$centro_medico->primer_tel;?></td>
</tr>

<tr>
<th class="thh">Tel Celular</th>
<td class="vtd"><?=$centro_medico->segundo_tel;?></td>
</tr>
<tr>
<th class="thh">Email</th>
<td class="vtd" ><?=$centro_medico->email;?></td>

</tr>

<tr>
<th class="thh">Fax</th>
<td class="vtd"><?=$centro_medico->fax;?></td>
</tr>

<tr>
<th class="thh">Página web</th>

<td class="vtd"><?=$centro_medico->pagina_web;?></td>
</tr>
<tr>
<th class="thh">Direccion</th>

<td class="vtd"><?=$centro_medico->barrio;?></td>
</tr>
<tr>
<th class="thh">Provincia</th>

<td class="vtd"><?=$CENTRO_PROVINCE;?></td>
</tr>
<tr>
<th class="thh">Municipio</th>

<td class="vtd"><?=$CENTRO_MUNICIPIO;?></td>
</tr>

</table>
</div>

<br/>
<br/>


</div><!-- container end -->
</div>
 <?php 
 
 
        $this->load->view('footer');


 ?>


 </body>
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
 <!--<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>-->
 <script src="<?=base_url();?>assets/js/custom.js"></script> 

</html>