<div class="modal-header "  id="background_">
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h2 class="modal-title"  >EMPLOYEE RECORD</h2>
</div>
<div class="modal-body" >
 <div class="container">
 <div class="col-md-7" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;border-right:none">
 <?php
$data['queryEmp']=$queryEmp;
 $this->load->view('ficha-empleado/employee-form',$data); 
?>
  </div>
  <div class="col-md-5" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;border-top:none;">
  <ul class="nav nav-tabs">
    <li class="active"><a class='showLicencia' data-toggle="tab" href="#home-ca-vi">Anexar Licencia Medica</a></li>
    <li><a class='showLicencia' data-toggle="tab" href="#home2"> <em id="countLicMed"></em></a></li>
  </ul>

  <div class="tab-content">
    <div id="home-ca-vi" class="tab-pane fade in active">
 <?php
 foreach ($queryEmp->result() as $row)
$sql = "select * from employees_lic_med WHERE id=$row->id";
$data['licenciaData']= $this->db->query($sql);
$data['id_emp']= $row->id;
$this->load->view('ficha-empleado/licencia-medica-form', $data);
?>
</div>

 <div id="home2" class="tab-pane fade in" >

 <div id="paginationNumber"></div>

  <div id="contentEmpLicMed"></div>
 </div>
</div>
</div>
 </div>

 
