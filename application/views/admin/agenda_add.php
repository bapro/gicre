		
<?php foreach($AGENDA_ADD as $agenda)

{

?>

<td class="ida" style="width:2px" ><?=$agenda->agenda;?></td>

<td class="especialidad" style="font-size:15px;width:5px"><?=$agenda->title;?></td>

<td style="width:3px">
<!--<a href="<?php echo base_url()?>admin/Diary/<?=$agenda->agenda?>/<?=$agenda->id_doctor?>" title="Ver"  ><i class="fa fa-eye" aria-hidden="true" ></i></a>-->
<a href="<?php echo base_url()?>admin/Diary/<?=$agenda->agenda?>" title="Ver"  ><i class="fa fa-eye" aria-hidden="true" ></i></a>


<a title="Eliminar" class="delete" id="_<?=$agenda->id_d_ag?>" onclick="return confirm('¿ estás seguro de eliminar ?')"   style="color:rgb(223,0,0);background:none;border:none;cursor:pointer"><i class="fa fa-trash-o" aria-hidden="true" ></i></a>

</td>

	   
<?php
}

?>
