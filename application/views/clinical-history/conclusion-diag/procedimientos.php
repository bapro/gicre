<?php

if ($query->result() != NULL) {
?>
    <ul id="list-data-available" class="list-group list-group-flush" style="position:absolute;z-index:1000">
        <?php
        foreach ($query->result() as $row) {

        ?>
            <li class='data-li list-group-item text-mute' onClick="selectThisProcedimiento('<?php echo $row->description; ?>');"><?php echo $row->description; ?></li>
        <?php
        }
        ?>
    </ul>
<?php } else { ?>
    <script>
        $("#search-procedimientos-<?= $id_con_diag ?>").css("background", "");
        $('#floatingProcedimiento-<?= $id_con_diag ?>').val($('#floatingProcedimiento-<?= $id_con_diag ?>').val() + "<?= $keyword ?>" + ', \n');
    </script>
<?php } ?>
<script>
    function selectThisProcedimiento(procedimiento) {

        $('#floatingProcedimiento-<?= $id_con_diag ?>').val($('#floatingProcedimiento-<?= $id_con_diag ?>').val() + procedimiento + ', \n')
        $("#procedimientos-results-<?= $id_con_diag ?>").hide();
        $("#search-procedimientos-<?= $id_con_diag ?>").css("background", "");
        $("#search-procedimientos-<?= $id_con_diag ?>").val("");
    }
</script>