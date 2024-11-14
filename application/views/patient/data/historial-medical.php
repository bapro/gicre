<?php 
foreach($patient as $row)
?>

 <div class="col-md-12">
<div id="result"></div><div id="loadf"></div>
<div class="form-horizontal "    > 
<input type="hidden" id="inserted_by" value="<?=$user_id?>">
<input type="hidden" id="id_p_a" value="<?=$row->id_p_a?>">
<div class="tab-content" id="all_dis" >
<div class="tab-pane active" id="Datos_personales"> 
<?php 

//$this->load->view('patient/data/historial-medical-content');
 $this->load->view('admin/historial-medical1/all-data/historial-medical-content');

?>
</div>


 </div>
 
</div>

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

<div class="modal fade" id="medicaha"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>



<div class="modal fade" id="alergicos"  role="dialog" >
<div class="modal-dialog modal-md" >
<div class="modal-content" >

</div>
</div>
</div>


 </div>    
    

    <!-- Bootstrap core JavaScript
    ================================================== -->

  </body>
  
</html>
