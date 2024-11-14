<ol class='list-group list-group-flush  list-group-numbered f' >
<?php
foreach ($query->result() as $row) {
if($row->is_active==1){
    $style="text-decoration:line-through";
    $text = 'Activar';
    $btn='btn-success';
}else{
    $style="";
    $text = 'Revocar';
    $btn='btn-danger';
}

echo "<li style='$style' class='list-group-item filter-user'>$row->name <a class='btn $btn btn-xs revocar-user btn-sm'  title='$text este usuario' id='$row->id_user_ad' > $text</a></li>";
}
?>
</ol>

<script>
    $('.revocar-user').on('click', function(event) {
            if (confirm('Lo quieres hacer ?'))
            { 
            var el = this;
            var del_id = $(this).attr('id');
            
            $.ajax({
            type:'POST',
			url: "<?php echo base_url(); ?>administrativo_functions/revokeThisUser",
            data: {id : del_id},
            success:function(response) {
           centroUser1();
          
            },
         });
            }
            })
</script>