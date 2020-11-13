
<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
</style>
<?php
foreach($photo as $ph)
foreach($name as $n)

?>

<div class="modal-header" >
<button type="button" title="Cierra" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"  style="font-size:48px;color:red"></i></button>
<h3 class="modal-title" ><?php echo $n->NOMBRES;; ?> <?php echo $n->APELLIDO1;; ?> <?php echo $n->APELLIDO2;; ?></h3>
</div>
<?php echo '<img id="fade" style="height:500px;width:500px" class="center img-responsive" src="data:image/jpeg;base64,'. base64_encode($ph->IMAGEN) .'" />'; ?>




