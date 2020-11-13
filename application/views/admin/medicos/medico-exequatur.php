<?php
if($query->num_rows() > 0 )
{
foreach ($query->result() as $rf){	
echo "
No <input class='is-it-that'  value='no' name='nombre' type='radio' > Si <input class='is-it-that' name='nombre' value='$rf->name' type='radio' checked> $rf->name<br/>
";
}
echo "<input class='form-control required it-is-that' name='nombre'   type='text' disabled>";
} 
else {

echo "
<input class='form-control required' name='nombre'   type='text'>

";
}
?>
<script>
$('.is-it-that').click(function () {
var val = $('input:radio[name=nombre]:checked').val();
if(val=="no"){
$(".it-is-that").prop('disabled',false);
} else {
$(".it-is-that").prop('disabled',true);
}
});
</script>