<style>
.label-member {
    vertical-align:middle;
}

</style>
<div class="col-md-12" style="background:linear-gradient(to top, #EE82EE, white);border:1px solid #38a7bb;" >
 <?php echo $this->session->flashdata('success_msg'); ?>
   <div id="content" class="col-md-5">
   <h6>Seleccione el tipo de miembre</h6>
  <form>
   
    <label class="radio-inline" >
      <input type="radio" class='search-again'  name="optradio" value='Coordinador' checked >Coordinador
    </label>
    <label class="radio-inline" >
      <input type="radio" name="optradio" class='search-again' value='Supervisor'>Supervisor
    </label>
    <label class="radio-inline" >
      <input type="radio" name="optradio" class='search-again' value='Municipe' >Municipe
    </label>
  </form>
        
    </div>

 <div class="col-md-7">
 <label class="control-label">Buscar por cedula</label>
   <div class="form-inline">
   <input id="patient_cedula1" style="width:65px" type="text" class="form-control patient-cedula" placeholder="000" data-mask="000" value="<?=$ced1?>">
  <input id="patient_cedula2" style="width:165px" type="text" class="form-control patient-cedula" placeholder="0000000" data-mask="0000000"  value="<?=$ced2?>">
   <input id="patient_cedula3"  style="width:45px" type="text" class="form-control patient-cedula" placeholder="0" data-mask="0"  value="<?=$ced3?>">
   </div>
   <br/><br/>
    </div>

 </div>
  <div class="col-md-3">
 <!-- <a  href="<?php echo base_url("alcalde/listCoordonador")?>" data-toggle="modal" data-target="#listar-coordinador" class="btn btn-primary btn-xs listar">Listar los coodinadores</a>-->
  <a target="_blank" href="<?php echo base_url("alcalde/listCoordonador")?>"  class="btn btn-primary btn-xs listar">Listar los coodinadores</a>
 
<!--
 <div id='cargando-list'></div>-->
  </div>
 <br/><br/>

<div class="col-md-12"> 

<div id="patientdata">


 </div>
</div>
<div class="modal fade" id="listar-coordinador"  role="dialog" >
<div class="modal-dialog" style="width: 80%;margin: auto;" >
<div class="modal-content" >

</div>
</div>
</div>
<br/><br/>	<br/>
