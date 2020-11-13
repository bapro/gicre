<style>
#dis{display:none}



</style>

<?php if ($VER_CONFIRMADA_SOLICITUD !== null)
{
	
?>
<div class="row">
  <?php
        $this->load->view('admin/ver_conf_sol_table');
     ?>
	</div>
<?php
}
else
{
	echo"<div class='alert alert-info'><strong>No hay datos.</strong></div>";
}
?>