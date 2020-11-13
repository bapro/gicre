<style>
tr:nth-child(even){background-color: #E0E5E6}
</style>

<div class="container">
<div  style="overflow-x:auto;">
<table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
	<tr><h3>Seguros Medicos</h3></tr><br/>
    <tr style="background:#5957F7;color:white">
	<th style="width:5px">Seguro Medico</th>
	<th style="width:2px">Logo</th>
	<th style="width:5px">RNC</th>
	<th style="width:1px">Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($all_seguro_medico as $all_m_c)
	 
	 {
	 ?>
<tr>
<td  style="width:5px;text-transform:uppercase"><?=$all_m_c->title;?></td>
<td>
<img width="50" height="50" class="img-thumbnail" src="<?= base_url();?>/assets/img/seguros_medicos/<?php echo $all_m_c->logo; ?>"  />
</td>
<td  style="width:5px"><?=$all_m_c->rnc;?></td>
<td style="width:1px" >
<a data-toggle="modal" data-target="#EditSeguroMedico" class="st" title="Ver" href="<?php echo base_url("medico/EditSeguroMedico/$all_m_c->id_sm")?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>

</td>
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
<div class="modal fade" id="EditSeguroMedico"  tabindex="-1" role="dialog" >
<div class="modal-dialog">
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT ***
_________________________________________________________ -->

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>

<script src="<?=base_url();?>assets/js/custom.js"></script> 

<script type="text/javascript"> 

$('#EditSeguroMedico').on('hidden.bs.modal', function () {
$(this).removeData('bs.modal');
});
</script> 
</html>



