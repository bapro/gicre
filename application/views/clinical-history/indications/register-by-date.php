<style>
.horizontal-scroll {width: auto; /* Set a fixed width */
    overflow-x: auto; /* Enable horizontal scrolling */
    overflow-y: hidden; /* Disable vertical scrolling */
    white-space: nowrap;
}	
</style>

<?php 

echo "<em>Total $query_grouped_num registro(s)</em>";?>
<div class="horizontal-scroll" >
<?php
foreach($query_grouped as $r){
$op=$this->db->select('name')->where('id_user',$r->operator)->get('users')->row('name');
$fecha = date("d-m-Y", strtotime($r->insert_time));
$fecha_search= date("Y-m-d", strtotime($r->insert_time));

 $query_tots = $this->clinical_history->get_where($table,array('DATE(insert_time)'=>$fecha_search, 'historial_id'=>$r->historial_id));

?>

 <button type='button' id='<?=$fecha_search?>_<?=$r->operator?>_<?=$r->centro?>' class='btn btn-outline-primary btn-sm display-indication-by-date' title="<?=$op?>"> <?=$fecha?> (<?=$query_tots->num_rows()?>)</button>


<?php }
?>
</div>
<input value="<?=$table?>" type="hidden" class="get-indication-table">
<div id="<?=$table?>-show-patient-indications-by-date" ></div>
<script>
var selected_id = $('.display-indication-by-date').first().attr('id');
arr_selected = selected_id.split("_"); //split to get the number
  var selected_date = arr_selected[0];
 var id_opertor = arr_selected[1];
  var id_centro= arr_selected[2];
  loadOnClickIndicationDate(selected_date, 0, id_opertor, id_centro); 
 

</script>
