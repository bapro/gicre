<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h2 class="modal-title"  ><?=$title?></h2>
</div>
<div class="modal-body" >
 <div class="container">
 
  <div class="col-md-12">
 <?php 
$data['id_cm']=$id_cm;
 if($target==1){
 $this->load->view('salud-ocupacional/medicamento/drug-management');
 }elseif($target==2){
	 $sql1 ="SELECT * FROM $table_name GROUP BY DATE(inserted_time) ORDER BY inserted_time DESC";
    $data['query1'] = $this->db->query($sql1);
	
	 $sql2 ="SELECT * FROM $table_name GROUP BY DATE(inserted_time) ORDER BY inserted_time ASC";
    $data['query2'] = $this->db->query($sql2);
	$data['controller_report'] = $controller_report;
	
	$this->load->view('ficha-empleado/report/index',$data); 
 }
 ?>

</div>


 </div>
 </div>
