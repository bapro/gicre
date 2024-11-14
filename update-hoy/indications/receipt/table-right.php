<div class="float-end show-btn-print-all" >
<button class='btn btn-default btn-xs' type='button' id='enviar-email-recetas'  >Enviar Recetas Al Paciente</button>
<br/><br/>
<ul class="nav navbar-nav" style="position:absolute">
  <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fa fa-print"></i> </span>
  </button>
  <?php $this->load->view('clinical-history/indications/receipt/printing-menu'); ?>
    </li>
    </ul>
    <br/><br/>
</div>	
    

<em class="card-subtitle mb-2 text-muted">Total recetas <?=$total_recetas?></em>
<table class="table table-striped is_print_rect" style="font-size:14px">
         <thead>
           <tr>
             <th scope="col">Fecha</th>
             <th scope="col">Medicamento</th>
             <th scope="col">Presentación</th>
             <th scope="col">Frecuencia</th>
             <th scope="col">Vía</th>
             <th scope="col">Cantidad</th>
            <th scope="col">Usuario</th>
           
           </tr>
         </thead>
         <tbody>
           <tr>
  <?php foreach($query_results->result() as $row)
 
 {
    $op=$this->db->select('name')->where('id_user',$row->operator)->get('users')->row('name');
 $fecha = date("d-m-Y H:i:s", strtotime($row->insert_time));			 
    
    
         ?>
   <tr>
       <td style='display:none'><?=$row->id_i_m;?></td>
    <td><?=$fecha;?></td>
    <td><?=$row->medica;?><br/><i><u><?=$row->dosis;?></u></i></td>
    <td><?=$row->presentacion;?></td>
    <td><?=$row->frecuencia;?></td>
    <td><?=$row->via;?><br/><?=$row->oyo;?></td>
    <td>
    <?php
    if($row->cantidad==0){
        echo "uso continuo";
    }else{
        echo $row->cantidad;
    }
    ?>
    </td>
    <td><?=$op;?></td>
  
  </tr>
    
 <?php
 }
 ?>
           </tr>
          
         </tbody>
       </table>
       
       