
<style>
.new-log .img{
margin: 0 auto;

}

.img{
    width: 100%;
    height: auto;
}
.hide-me{display:none}
</style>



<body>
<!-- *** welcome message modal box *** -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-sm">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<!--    <button type="submit" href="dsfsf.php" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
<h4 style="text-align:center;color:green">Bienvedio <?= $name; ?></h4>
</div>


</div>

</div>
</div>


<!-- *** LOGIN MODAL END *** -->

<div class="new-log">
<img class="img" src="<?= base_url();?>assets/img/gicle.jpg" alt=""/>

</div>
</div>
<?php
$this->load->view('admin/footer');
?>
<!-- /#copyright -->

<!-- *** COPYRIGHT END *** -->




<!-- /#all -->

<!-- #### JAVASCRIPT FILES ### -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
$(window).on('load',function(){

$('#myModal').modal('show');
});
setTimeout(function() {$('#myModal').modal('hide');}, 2000);

</script>

</body>

</html>