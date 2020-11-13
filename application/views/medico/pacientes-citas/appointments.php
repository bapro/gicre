
<style>
th,td{text-align:left;text-align:center}
td{font-size:17px;text-align:center}
</style>
    <!-- Favicon and apple touch icons-->
   


<body>
 <!-- *** welcome message modal box *** -->
 


<hr id="hr_ad"/>
 <body>
  <div id="result_ver"></div>
 <div class="container">
 <div class="row">
	 <a href="<?php echo site_url("admin/create_cita");?>" class="btn btn-primary btn-xs">Nueva cita</a>
	 </div>
	 <hr id="hr_ad"/>
  <div class="row">

 <div class="col-md-12"><h3>Citas Confirmadas</h3></div><br/>

<div class="row">
  <div class="col-md-3" > 
<select id="centro_medico" name="centro_medico"  class="form-control" style="background:#E0E5E6;">
 <option value="Todos los centros médicos">Todos los centros médicos</option>
 <?php 
foreach($centro_medico as $row)
 { 
  echo '<option value="'.$row->id_m_c.'">'.$row->name.'</option>';
 }
 ?>
</select>
<a href="#" id="ver_todo" style="display:none" onclick="window.location.reload()"   class="btn btn-primary btn-xs" >Todos los centros médicos </a>

</div>


<div class="col-md-9" style="background:#E0E5E6;border:1px solid #38a7bb;"> 
 <form class="form-inline" method="post" >
<div class="form-group">
<label for="desde">Desde</label><input style="border-top:none;border-bottom:none" type="text" id="date_from" name="date_from" placeholder="la fecha" class="form-control">
</div>
<div class="form-group">
<label for="hasta">Hasta</label><input type="text"id="date_to" placeholder="la fecha" name="date_to" class="form-control" style="border-top:none;border-bottom:none">
</div>
<button type="submit" id="click_button" class="btn btn-default">Ver</button>
</form>
</div>
<span id="flash1"></span>
</div>
 <hr id="hr_ad"/>

<div  id="results"></div>
<div  id="results_datepicker"></div>

<div class="row"  id="dis" >
     <?php
        $this->load->view('admin/pacientes-citas/appointments-rows');
     ?>
	</div>
	<br/>
	 <div class="row">
	 <a href="<?php echo site_url('admin_medico/create_cita');?>" class="btn btn-primary btn-xs">Nueva cita</a>
	 </div>
</div>
<br/><br/><br/>

<div class="modal fade" id="editBox" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          
        </div>
    </div>
</div>
</div>
</div>
 <?php
        $this->load->view('footer');
 ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
  <script src="<?=base_url();?>assets/js/custom.js"></script> 
  <script type="text/javascript">

$( document ).ready(function() {
    $('#editBox').on('hidden.bs.modal', function () {
          $(this).removeData('bs.modal');
    });
});
         

 $(function() {
		    $("#date_from").datepicker({ dateFormat: "dd-mm-yy" }).val()
 
       
		$("#date_from").click(function() {
		
				date = new Date();
				date.setDate(date.getDate()-1);
				$( "#date_from" ).datepicker( "setDate" , date);
				
		}); 
 
	});
	
	$(function() {
		    $("#date_to").datepicker({ dateFormat: "dd-mm-yy" }).val()
 
       
		$("#date_to").click(function() {
		
				date = new Date();
				date.setDate(date.getDate()-1);
				$( "#date_to" ).datepicker( "setDate" , date);
				
		});
		});


// display centro medico
  $(document).ready(function(){
	// sur l'evenement (select)#selection.onChange
    $( '#centro_medico' ).on('change', function(){
		  $("#flash1").fadeIn(400).html('<span class="load">Cargando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');
  
    
			var maVal = document.getElementById('centro_medico').value;
		var s = $(this).val();
      $.ajax({
          type:"POST",
          url:'<?php echo base_url("admin/get_centro_medico/") ?>',
          cache: false,    
          data:'centro_medico='+$("#centro_medico").val(),
		   //data:'nombre='+$("#centro_medico").val()+ '&userid=' + userid,
         success:function(data){
			 $("#flash1").hide();
			 $("#results_datepicker").hide();
            $("#results").html(data);
			//document.getElementById('results_datepicker').style.display = 'none';	
			
          }
          //error:function(XMLHttpRequest){
            //alert(XMLHttpRequest.responseText);
          //}
      });
	  
	    if (maVal != 'Todos los centros médicos')
          {
          document.getElementById('dis').style.display = 'none';
		  document.getElementById('results').style.display = 'block';
          }
		  else
		  {
			document.getElementById('dis').style.display = 'block';
             document.getElementById('results').style.display = 'none';	
        			 
		  }

	  
             });	
            });	
			
		//display by datepicker
		$("#click_button").on('click', function (e) {
    e.preventDefault();
	$("#flash1").fadeIn(400).html('<span class="load">Cargando... <img src="<?= base_url();?>assets/img/loading.gif" /></span>');
  
    $.ajax({
        url: '<?php echo site_url('admin/get_centro_medico_datepicker');?>',
        type: 'post',
        data: {date_from:$("#date_from").val(),date_to:$("#date_to").val()},
        success: function (data) {
			$("#centro_medico").val("");
               $("#flash1").hide();
			      $("#results_datepicker").show();
			   $("#results_datepicker").html(data);
		       }
		
    });
	document.getElementById('ver_todo').style.display = 'none';
	document.getElementById('results').style.display = 'none';
	
	
});



			
    </script>

</html>