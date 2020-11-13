 <div class="row">
<div class="col-sm-2 col-md-2 sidebar" style="background:white;">
<br/> 
<ul  class="nav nav-sidebar ">
<li><a class="this-is-a-title"><strong>ANTECEDENTES</strong></a></li>
<li class="active addb" ><a href="#Datos_personales" class="btn-ex-fg" data-toggle="tab" >1- General</a></li>
<li title='Hallazgo positivo es obligatorio'><a href="#examen-fisico"  data-toggle="tab" class="btn-ex-fg tab-exam"  >2- Examen Fisico</a></li>
<li><a href="#evaluacion-interconsultas"  data-toggle="tab" class="btn-oth"  >3- Evaluación / Interconsultas</a></li>
<li ><a href="#orden-medica"  data-toggle="tab" class="btn-ex-fg"  >4- Orden Medica</a></li>
<li title='cie10 es obligatorio' ><a href="#procedimiento"  data-toggle="tab" class="btn-ex-fg tab-pro"  >5- Alta Medica</a></li>
<li><a href="#nursing"  data-toggle="tab" class="btn-ex-fg"  >6- Enfermería</a></li>
</ul>

</div>
		
		 <script> 
 $('.btn-gnl').on('click', function(event) {
	 $('.save_ant_gen').show();
	});
	
	 $('.btn-ex-fg').on('click', function(event) {
	 $('.save_ant_gen').show();
	});
	
	
	 $('.btn-oth').on('click', function(event) {
		 $('.save_ant_gen').hide();
	});

 </script>