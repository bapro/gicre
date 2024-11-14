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
                            <div class="overflow-auto pe-2" style="height: 850px;">
                                <select class="form-select form-select-sm">
                                    <option selected=""></option>
                                </select>
								<h3 class="text-success border-bottom pb-2 mt-2"><?=$doctor_name?></h3>
								<div id="show-doc-tarifarios-por-seguro">
                                <div class="alert alert-primary" role="alert">
                                    Los tarifarios se muestran aqui.
                                </div>
								</div>
                                <!--<h3 class="text-success border-bottom pb-2 mt-2">MEDICO JUAN ALBERTO SUERO</h3>
                                <div class="text-success border-bottom pb-3 mb-3">
                                    Seguro Medico: PRIVADO<br>
                                    CORAZONES UNIDOS - Codigo Contrato: 033 <a href="#"
                                        class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil"></i></a>
                                </div>
                                <div class="">
                                    Creado por JOSE ANEUDY SANCHEZ fecha 22-08-2019 16:06:05<br>
                                    Editado por JOSE ANEUDY SANCHEZ fecha 22-08-2019 16:06:05
                                </div>

                                <a href="#" class="btn btn-sm btn-danger mt-1 mb-3"><i class="fa fa-trash"></i> BORRAR
                                    TODOS</a>

                                <div class="row py-1 my-1">
                                    <div class="col-8">
                                        <div class="d-flex align-items-center">
                                            <div class="ps-1"><small>Mostrar</small></div>
                                            <div class="px-2">
                                                <select class="form-select form-select-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                            </div>
                                            <div><small>registros</small></div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <input type="text" class="form-control form-control-sm" placeholder="Buscar...">
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <td><input type="text" class="form-control form-control-sm"
                                                        placeholder="0"></td>
                                                <td><input type="text" class="form-control form-control-sm"
                                                        placeholder="0"></td>
                                                <td><input type="text" class="form-control form-control-sm"
                                                        placeholder="Procedimiento"></td>
                                                <td><input type="text" class="form-control form-control-sm"
                                                        placeholder="Monto"></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-primary"><i
                                                            class="fa fa-plus-cricle"></i> AGREGAR</a>
                                                </td>
                                            </tr>
                                            <tr class="bg-th align-middle">
                                                <th>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            Codigo
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-default"><i
                                                                    class="fa fa-sort"></i></button>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            Simon
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-default"><i
                                                                    class="fa fa-sort"></i></button>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            Procedimiento
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-default"><i
                                                                    class="fa fa-sort"></i></button>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            Monto
                                                        </div>
                                                        <div>
                                                            <button class="btn btn-sm btn-default"><i
                                                                    class="fa fa-sort"></i></button>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>Drenaje de bursa olecraneana</td>
                                                <td>3500</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>Drenaje de bursa olecraneana</td>
                                                <td>3500</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>Drenaje de bursa olecraneana</td>
                                                <td>3500</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>Drenaje de bursa olecraneana</td>
                                                <td>3500</td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-outline-primary"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-block d-md-flex align-items-center">
                                    <div class="flex-grow-1 text-center text-md-end pe-2 text-muted">
                                        <small>Mostrando registros del 1 al 1 de un total de 1 registros</small>
                                    </div>
                                    <div class="text-center">
                                        <nav aria-label="...">
                                            <ul class="pagination pagination-sm mb-0 justify-content-center">
                                                <li class="page-item disabled">
                                                    <span class="page-link">Anterior</span>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active" aria-current="page">
                                                    <span class="page-link">2</span>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Siguiente</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
		<div class="loadf position-fixed top-50 start-50"></div> 
    </section>
   <?php $this->load->view('footer');?>
<input value="<?=$id_doctor?>" id="id_doctor" type="hidden"/>
<input value="<?=$id_seguro_medico?>" id="id_seguro_medico" type="hidden"/>
<input  id="save-plan-value" type="hidden"/>
      <script src="<?= base_url();?>assets_new/js/jquery-3.2.1.min.js" ></script>
  <script src="<?= base_url();?>assets_new/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
var id_doctor= $('#id_doctor').val();
var id_seguro = $('#id_seguro_medico').val();
$('#seguro-more').on('change', function(event) {
var id_seguro = $(this).val();
idPlan=0;
launchMe(id_seguro,idPlan);

});


load_doc_seguro()

function load_doc_seguro(){
	
$.ajax({
type: "POST",
url: "<?=base_url('admin_medico/load_doc_seguro')?>",
data: {id_doctor:id_doctor},
 success:function(data){
$('#seguro-more').html(data);
},

});	
	
	
}


constant_load_seguro();



function constant_load_seguro(){
$('.loadf1').addClass("spinner-border");

$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/load_doc_seguro_with_tariff')?>",
data: {id_doctor:id_doctor,id_seguro:id_seguro},
 success:function(data){
	 $('.loadf1').removeClass('spinner-border');
$('#constant_l_s').html(data);
 
}

});
}


$(document).on('click', '.get-this-seguro-plan', function(event) {

var id_plan = $(this).attr('id');
$('#save-plan-value').val(id_plan);
$('.loadf').addClass("spinner-border");
showTarifariosBySeguro(id_plan);
});

function showTarifariosBySeguro(id_plan){
	
	$.ajax({
type: "POST",
url: "<?=base_url('tarifarios/loadSeguroDocTarif')?>",
data: {id_doctor :id_doctor,id_seguro :id_seguro,id_plan :id_plan},
 success:function(data){
 $('.loadf').removeClass('spinner-border');
 $('#show-doc-tarifarios-por-seguro').html(data);
},

});
}





		
		
	$(document).on('change', 'input[type=radio][name=select-one-current]', function(e) {
	e.preventDefault();
  if($(this).val()==1){
	$("#convert-dolar-to-peso").prop("disabled",false);
	 $("#convert-euro-to-peso").prop("disabled",true);
		
}else{
$("#convert-dolar-to-peso").prop("disabled",true);
	 $("#convert-euro-to-peso").prop("disabled",false);
	
}
});		
		
		
		
		
		
		
		
		

</script>
</body>

</html>