<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags 
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">-->

    <title>HISTORIAL CLINICA</title>

    <!-- Bootstrap core CSS -->
    	   <link rel="shortcut icon" href="<?= base_url();?>assets/img/adms.png" type="image/x-icon" />
   
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


 <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
<link href="<?=base_url();?>assets/css/historial_clinical.css" rel="stylesheet">
  <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script type="text/javascript" src="<?= base_url();?>assets/js/jquery.chained.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link href="<?=base_url();?>assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script>
moment.locale('es');
</script>
    <!-- Custom styles for this template -->
    <style>
@media (min-width: 992px){
.modal-lg
{ width: auto;	
}
}
.modal-lg
{
    width: 1200px;
    height: 900px; /* control height here */
}   
    </style>

  </head>

  <body>
<?php
 if($areaid==0){$cont="admin";$index="appointments";} else {$cont="medico";$index="index";}
foreach($patient as $row)
$infomore=$this->db->select('inserted_by,update_time,created_time,update_time,update_by')->
 where('id_patient',$row->id_p_a )
->get('rendez_vous')->row_array();

?>

  <nav class="navbar navbar-default navbar-fixed-top" style="background:white">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          			 <?php 
		$this->padron_database = $this->load->database('padron',TRUE);
		foreach($HISTORIAL_MEDICAL as $row)
		if($row->photo=="padron"){
		 $photo=$this->padron_database->select('IMAGEN')
		->where('MUN_CED',$row->ced1)
		->where('SEQ_CED',$row->ced2)
		->where('VER_CED',$row->ced3)
		->get('fotos')->row('IMAGEN');
		?>
		<a data-toggle="modal" data-target="#zoomimage" href="<?php echo base_url("admin_medico/zoom_image/$row->ced1/$row->ced2/$row->ced3")?>">

		<?php  echo'<img width="80"    src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';?>
		</a>
		<?php
		} else if($row->photo==""){
			
		}
		else{
			?>
		<a data-toggle="modal" data-target="#zoomimagead" href="<?php echo base_url("admin_medico/zoom_image_ad/$row->id_p_a")?>">
		<img width="80"  src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $row->photo; ?>"  />
		</a>
		
		<?php

		}
		?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
					<?php foreach($HISTORIAL_MEDICAL as $historial_medical)
			$dato_citas=$this->db->select('nec,fecha_propuesta')->where('id_patient',$historial_medical->id_p_a )
			->get('rendez_vous')->row_array();
			
			  	$seguro_medico_name=$this->db->select('title')->where('id_sm',$historial_medical->seguro_medico)
          ->get('seguro_medico')->row('title');
			?>
          <ul class="nav navbar-nav">
         <li><a style="color:#209BD8;text-transform:uppercase"><?=$historial_medical->nombre;?></a></li>
			  <li><a style="color:#209BD8"><?=$historial_medical->nacionalidad;?></a></li>
			  <li><a style="color:#209BD8"> <?=$historial_medical->edad;?></a></li>
            <li class="dropdown">
              <a href="#" style="color:#209BD8" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mas <span class="caret"></span></a>
              <ul class="dropdown-menu not-me">
            <li><a style="color:#209BD8"><b>CEDULA :</b> <?=$historial_medical->cedula;?></a ></li>
			 <li><a style="color:#209BD8"><b>FECHA : </b><?=$dato_citas['fecha_propuesta'];?></a></li>
			 <li><a style="color:#209BD8"><b>FRECUENCIA :</b> <?=$historial_medical->frecuencia;?></a></li>
            <li><a style="color:#209BD8"><b>ARS :</b> <?=$seguro_medico_name;?></a></li>
			<li style="border-top:1px solid rgb(163,173,186)"><a style="color:#000080;outline: 0;" href="<?=site_url("$cont/$index")?>">Citas</a></li>
			<li><a data-toggle="modal" data-target="#medicaha" href="<?php echo base_url('admin_medico/showMedicine/'.$id_historial)?>" style="color:#000080;outline: 0;" >Medicamentos Habituales  </a></li> 
			<li><a style="color:#000080;outline: 0;" data-toggle="modal" data-target="#alergicos" href="<?php echo base_url('admin_medico/showAlegicos/'.$id_historial)?>" href="<?=site_url("admin/Appointments")?>">Alergicos</a></li>
           <?php
            
			foreach($tutor as $tut)
			{
              $patient=$this->db->select('photo,ced1,ced2,ced3')->where('id_p_a',$tut->id_tutor)->get('patients_appointments')->row_array();

			?>
			<li style="border-top:1px solid rgb(163,173,186)">
			<?php
			   if($patient['photo']=="padron"){
				 $photo=$this->padron_database->select('IMAGEN')
				->where('MUN_CED',$patient['ced1'])
				->where('SEQ_CED',$patient['ced2'])
				->where('VER_CED',$patient['ced3'])
				->get('fotos')->row('IMAGEN');
				echo '<img style="width:50px;"   src="data:image/jpeg;base64,'. base64_encode($photo) .'" />';
				} 
				else if($patient['photo']==""){
					
				}
				else{
					?>
				<img  style="float:left; width:50px;"   src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $patient['photo']; ?>"  />
					<?php

					}
				?>
			
			<a target="_blank" href="<?php echo site_url("admin_medico/historial_medical/$tut->id_tutor/$user_id/$areaid"); ?>"><strong><?=$tut->relacion?></strong> : <?=$tut->name_tutor?></a></li>
			<?php
			}
			?>
		   
		   </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right show-save-btn" >
            <li>
			<a>
				<?php 
               $sql ="SELECT id FROM h_c_ant_pedia
			 where hist_id=$id_historial";
			$query = $this->db->query($sql);
			
			if ($query->num_rows() !== 0)
			 {
			foreach($query->result() as $ped_id)
            ?>
			<div class="btn-group hide-pedia-group" style="display:none">
			<button class="show_modif_ant_ped btn btn-md btn-success"  type="button" >
			<i class="fa fa-pencil" aria-hidden="true"></i>
			Editar
			</button>
            <button id="save_ant_ped" class="save_ant_ped_hide btn btn-md btn-success" style="display:none" type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			
			<a target="_blank" href="<?php echo base_url('printings/print_ant_pedia/'.$ped_id->id)?>" style="cursor:pointer" title="Imprimir Antecedentes General" class="btn-sm" ><i style="font-size:24px" class="fa">&#xf02f;</i></a>
		    </div> 
			<?php
			 }
			 else {
				 
				 echo "<button   style='display:none'  class='btn btn-md btn-success'  id='save_ant_pediab'  type='button'><i class='fa fa-floppy-o' aria-hidden='true'></i> Guardar </button>";
			 }
			?>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_ant_ssr"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_ant_obsb"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_enf_act"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_rabltc"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_fisico"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_sist"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_con_d"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar </button>
			<button   style="display:none"  class="btn btn-md btn-success "  id="save_cont_pren"  type="button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			
			</a>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
			 <span class="alert alert-danger required-menu" style="margin-left:35%;margin-top:-4%;position:absolute;display:none;">Campos con <strong>*</strong> son obligatorios !</span>
      </div>
    </nav>