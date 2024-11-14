<style>
tr:nth-child(even){background-color: #E0E5E6}
td{text-align:left}
</style>

<div class="container">

<div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
	<tr><h3>Centros Medicos</h3></tr><br/>
    <tr style="background:#5957F7;color:white">
	   <th class="col-xs-3">Nombre</th>
		<th class="col-xs-1">Logo</th>
		<th class="col-xs-1">Tipo</th>
        <th class="col-xs-1" >Primer Telefono</th>
        <th class="col-xs-1" >Segundo Telefono</th>
		<th class="col-xs-2" >Correo Electronico</th>
		
    </tr>
    </thead>
    <tbody>
    <?php foreach($all_medical_centers as $all_m_c)
	 
	 {
	 ?>
        <tr>
		 <td>
		 <a href="<?php echo base_url('medico/centro_medico/'.$all_m_c->id_m_c)?>" > <?=$all_m_c->name;?></a></td>
		<td><img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/centros_medicos/<?php echo $all_m_c->logo; ?>"  /></td>
            <td><?=$all_m_c->type;?></td>
		   <td><?=$all_m_c->primer_tel;?></td>
            <td><?=$all_m_c->segundo_tel;?></td>
			<td><?=$all_m_c->email;?></td>
			
        </tr>
	 <?php
	 }
	 ?>
    </tbody>    
</table>
</div>
</div>
</div>
<br/><br/>
<?php
$this->load->view('footer');
?>
</body>


<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script src="<?=base_url();?>assets/js/custom.js"></script> 


</html>



