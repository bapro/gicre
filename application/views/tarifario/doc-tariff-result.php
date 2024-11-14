 <?php if($count > 0) {?>
 <section class="py-3">

        <div class="container">
	
           <div class="card my-3">
                <div class="card-body">
                    <strong class="d-block text-success mb-1">TARIFARIOS POR SEGURO</strong>
                    <div class="row g-3">
                        <div class="col-md-3">
						<div class="loadf1"></div> 
                            <div class="overflow-auto pe-2" style="height: 600px;" id="constant_l_s">
							
                            </div>
                        </div>
                        <div class="col-md-9  border-start">
						<div class="pagetitle">
						<h1>Tarifarios</h1>
						<nav>
						<ol class="breadcrumb">

						<li class="breadcrumb-item active"><a href="<?php echo site_url("$controller/tariffs");?>">Buscar</a></li>
						</ol>
						</nav>
						</div>
                            <div class="overflow-auto pe-2" style="height: 850px;">
							<label  class="form-label"> Seguros que no tienen tarifarios</label>
                                <select class="form-select form-select-sm" id="change-seguro">
                                  
                                </select>
								<h3 class="text-success border-bottom pb-2 mt-2"><?=$doctor_name?></h3>
								<div id="show-doc-tarifarios-por-seguro">
                                <div class="alert alert-primary" role="alert">
                                    Los tarifarios se muestran aqui.
                                </div>
								</div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
		<div class="loadf position-fixed top-50 start-50"></div> 
    </section>
   <?php
 }else{
$this->create_forms->upload_tariff_form($id_doctor,"","",0);		 
 }
   $this->load->view('footer'); 
   $this->load->view('tarifario/footer');
   ?>
	 