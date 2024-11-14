<?php
 if($signo_id ==1 || $signo_id ==4){
foreach($query_signos_data->result() as $rowNota)
$user_c22=$this->db->select('name')->where('id_user',$rowNota->inserted_by)->get('users')->row('name');
$user_c23=$this->db->select('name')->where('id_user',$rowNota->updated_by)->get('users')->row('name');

$inserted_time = date("d-m-Y H:i:s", strtotime($rowNota->inserted_time));
$update_time = date("d-m-Y H:i:s", strtotime($rowNota->updated_time));
$data['time_save'] =$rowNota->updated_time;
$time_save=$rowNota->updated_time;
$data['pesoEx'] = $rowNota->peso;
$data['kgEx'] = $rowNota->kg;
$data['taEx']= $rowNota->ta;
$data['hgEx']= $rowNota->hg;
$data['radioEx']= $rowNota->radio;
$data['tallaEx']= $rowNota->talla;
$data['frEx']= $rowNota->fr;
$data['tempoEx'] = $rowNota->tempo;
$data['imcEx'] =$rowNota->imc;
$data['fcEx']=$rowNota->fc;
$data['pulsoEx']=$rowNota->pulso;
$data['glicemiaEx']=$rowNota->glicemia;
$data['satoeEx']=$rowNota->satoe;
$data['fcfEx']=$rowNota->fcf;
$data['hallazgoEx']=$rowNota->hallazgo;
$hallazgoEx=$rowNota->hallazgo;
$data['nombre_notaEx']=$rowNota->nombre_nota;
$nombre_notaEx=$rowNota->nombre_nota;
$data['idEx']=$rowNota->id;
$data['inserted_by']=$rowNota->inserted_by;
$inserted_by=$rowNota->inserted_by;
?>
<em style='font-size:12px'>creado por <?=$user_c22?>, <?=$inserted_time?> -- cambiado por <?=$user_c23?>, <?=$update_time?></em>

<br/><br/>
<button type='button' id='crear-nuevo-signo-n' class="btn btn-xs btn-primary">Crear nuevo</button>
<button type='button' id='cancel-this-nota' class="btn btn-xs btn-default" title="Eliminar nota <?=$inserted_time?>" >Eliminar</button>
<?php
} else{
$data['inserted_by']="";
$inserted_by="";	
$data['pesoEx'] ="";
$data['kgEx'] ="";
$data['taEx']="";
$data['hgEx']="";
$data['radioEx']="";
$data['tallaEx']= "";
$data['frEx']="";
$data['tempoEx'] = "";
$data['imcEx'] ="";
$data['fcEx']="";
$data['pulsoEx']="";
$data['glicemiaEx']="";
$data['satoeEx']="";
$data['fcfEx']="";
$data['hallazgoEx']="";
$hallazgoEx="";
$data['nombre_notaEx']="";
$nombre_notaEx="";
$data['idEx']=0;	
$data['time_save'] = date("Y-m-d H:i:s");
$time_save = date("Y-m-d H:i:s");	
}
 ?>

<div class="col-md-12 disable-all" style="overflow-x:auto;"  >

<?php
 
 $this->load->view('hospitalizacion/historial/signos-vitales/form', $data);
  ?>
 <div class="form-horizontal">
 <div class="form-group">
   <label class="control-label" >Nombre de la nota:</label>
<input class="form-control"  id="<?=$signo_id ?>searchNombreNotaEd" value="<?=$nombre_notaEx?>"/>	
<div id="suggesstion-box-"></div>
</div>
<div class="form-group">
<label class="control-label" >Description De Nota</label>
<textarea rows="6" cols="15" class="form-control active-me" id="<?=$signo_id ?>hallazgoe" ><?=$hallazgoEx?></textarea>
</div>
</div>
</div>
 <hr id="hr_ad"/>
 <?php  if($signo_id ==1){?>
 <table>
 <tr>
 <td>
 <?php if($inserted_by==$user_id || $perfil=="Admin") {?>

<button type="button" id="updateNota" class="show_modif_exam_fis btn-sm btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Editar</button>
<?php }?>
 </td>
  <td>
<a target="_blank"  href="<?php echo base_url("printings/print_if_foto_/$pageId/0/0/examfis")?>"  style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>

 </td>

 <?php } else{?>
 <td>
  <button  class="btn btn-md btn-success" id="save_exam_fisp"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button> <span  class='resultSolInt'></span>
</td>
  <?php }?>
  <td>
  <div id="<?=$signo_id ?>result-nota-operation" ></div>
   </td>  
  </tr>
  </table>

  <input  id="id_notas_edit_" type="hidden"/>
  <input  id="signo_id" value="<?=$signo_id?>" type="hidden"/>
  <input  id="<?=$signo_id ?>update_time" value="<?=$time_save?>" type="hidden"/>
   <input value="<?=$user_id?>" id="user_id" type="hidden"/> 
 <input value="<?=$id_patient?>" id="id_patient" type="hidden"/>
  <input value="<?php echo base_url(); ?>hosp_notas/getNotaName" id="searchNombreNotaUrl" type="hidden"/>
    <input value="<?=base_url('hosp_notas/eliminarHospNota')?>" id="cancelThisNota" type="hidden"/>
	<input value="<?=base_url('hosp_notas/saveExamenFisico')?>" id="saveNotaUrl" type="hidden"/>
		<input value="<?=base_url('searchAutoComplete/searchNotaNombre')?>" id="searchNotaNombre" type="hidden"/>
	<input value="<?php echo base_url(); ?>hosp_notas/paginateSignosVitales" id="paginateSignosVitalesUrl" type="hidden"/>
   <input value="<?php echo base_url(); ?>hospitalizacion/loadSigno" id="loadSignoUlr" type="hidden"/>

    <input value="2" id="searchNombreNotaEdValue" type="hidden"/>
	
	
	