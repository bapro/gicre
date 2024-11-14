
			<ul class="dropdown-menu">
		<li class="data-li"><a class="dropdown-item">FORMATO VERTICAL</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$historial_id/vert/1/printing/$table/$centro_medico/$id_opertor")?>"  style="cursor:pointer;color:black" >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat dropdown-item"  target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$historial_id/vert/0/printing/$table/$centro_medico/$id_opertor")?>"  style="cursor:pointer;color:black"  >Sin la foto</a></li>
		
		
		<li class="data-li"><a class="dropdown-item">FORMATO HORIZONTAL</a></li>
	   <li class="data-li"> <a  class="imprimirRecetasForPat horiz dropdown-item" id='1' target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$historial_id/horiz/1/printing/$table/$centro_medico/$id_opertor")?>"  style="cursor:pointer;color:black" >con la foto</a></li>
		<li class="data-li"><a  class="imprimirRecetasForPat horiz dropdown-item" id='0' target="_blank" href="<?php echo base_url("print_page/print_indicaciones/$historial_id/horiz/0/printing/$table/$centro_medico/$id_opertor")?>"  style="cursor:pointer;color:black"  >Sin la foto</a></li>
		
		</ul>