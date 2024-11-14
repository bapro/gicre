<h1>REPORTE DE LICENCIA MEDICA</h1>
<h3><?=$centro_name?></h3>
<div class="container">
  <ul class="nav nav-tabs">
    <li class="active"><a  data-toggle="tab" href="#external">LICENCIAS EXTERNAS</a></li>
    <li><a  data-toggle="tab" href="#internal">LICENCIAS INTERNAS</a></li>
  </ul>
   <div class="tab-content"> 
   <div id="external" class="tab-pane fade in active">
<div class="row">
<button class="btn btn-primary" onclick="ExportToExcel('xlsx')" style="float:right">Export Table Data To Excel File</button>
</div>
<hr/>

  <input class="form-control"  placeholder="Buscar En El Reporte External" id="searchByFicha" />

<div style="overflow-x:auto;">
<?php $this->load->view('ficha-empleado/report/view-external'); ?>
 </div>
  </div>
  
  <div id="internal" class="tab-pane fade in">
  <div class="row">
<button class="btn btn-primary"  id="ExportToExcel2" style="float:right">Export Table Data To Excel File</button>
</div>
<hr/>
  <input class="form-control"  placeholder="Buscar En El Reporte Internal" id="searchByFicha2" />
<div style="overflow-x:auto;">
<?php $this->load->view('ficha-empleado/report/view-internal'); ?>
</div>
</div>
  
  </div>
   </div>
    </div>
 </div>
<?php $this->load->view('admin/footer'); ?>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
 <script>
 
 $(document).ready(function(){
  $("#searchByFicha").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#filter tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  
   $("#searchByFicha2").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#filter2 tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

 
 
 function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('tbl_exporttable_to_xls');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('medical_license_report_externa.' + (type || 'xlsx')));
    }
	
	  $("#ExportToExcel2").on("click", function(xlsx, fn2, dl2) {
       var elt = document.getElementById('tbl_exporttable_to_xls2');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl2 ?
         XLSX.write(wb, { bookType: 'xlsx', bookSST: true, 'xlsx': 'base64' }):
         XLSX.writeFile(wb, fn2 || ('medical_license_report_interna.' + 'xlsx'));
   });
	
	});
 </script>
 
