<style>
td + input{text-align:center}

</style>
<?php 

foreach($patient as $row)
?>


 <div class="col-md-12">

<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 

<?php


 $this->load->view('admin/historial-medical1/historial-medical-content');

 ?>

 <div style="float:right">
<button   class="btn btn-md btn-success btn-lg" id="save_ant_gen"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
</div>
</div>






 </div>
 
<!--div datos citas ends-->

 </div>

<div class="modal fade" id="zoomimage"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>

<div class="modal fade" id="zoomimagead"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>


     
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
  </body>
  
</html>


