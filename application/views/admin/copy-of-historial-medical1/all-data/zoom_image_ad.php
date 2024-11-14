
<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
</style>
<?php
foreach($patient as $ph)


?>
<div class="modal-header" >
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title" style="text-transform:uppercase"><?php echo $ph->nombre; ?> </h3>
</div>

<img  style="height:500px;width:500px" class="center img-responsive" src="<?= base_url();?>/assets/img/patients-pictures/<?php echo $ph->photo; ?>"  />