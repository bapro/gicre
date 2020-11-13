<style>
#no_cedulad_found{display:none}
</style>
<?php echo $this->session->flashdata('no_cedula_found'); ?>

<script>
setTimeout(function() {
    $('#show_patient_by_cedula').fadeOut('fast');
}, 4000); 
</script>