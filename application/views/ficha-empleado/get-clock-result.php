
<div class="col-md-12" style="opacity:0.9">
<br/>
<div class="col-md-7" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;">

<?php

$data['queryEmp']=$queryEmp;
 $this->load->view('ficha-empleado/employee-form',$data); 
	
?>
 </div>
 <div class="col-md-5" style="background:linear-gradient(to right, white, #E0E5E6, white);border:1px solid #38a7bb;border-left:none;border-top:none;" >
  <ul class="nav nav-tabs">
    <li class="active"><a class='showLicencia' data-toggle="tab" href="#home-ca-vi">Anexar Licencia Medica</a></li>
    <li><a class='showLicencia' data-toggle="tab" href="#home2"> <em id="countLicMed"></em></a></li>
  </ul>

  <div class="tab-content">
    <div id="home-ca-vi" class="tab-pane fade in active">
 <div id="licenciaMedicaForm"></div>
</div>

 <div id="home2" class="tab-pane fade in">

 <div id="paginationNumber"></div>

  <div id="contentEmpLicMed"></div>
 </div>
</div>
</div>
</div>


