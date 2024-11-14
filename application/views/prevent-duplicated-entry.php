<script>
 var keyupTimerRepInp;
		$('#userEmail').on('keyup', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimerRepInp);
            keyupTimerRepInp = setTimeout(function () {
               check_if_entry_exist(keyword, "correo", "users", "emailInfo");
            }, 300);
        });
		
		
	//-----------AREA-----------------	
		
	 var keyupTimerArea;
		$('#area').on('keyup', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimerArea);
            keyupTimerArea = setTimeout(function () {
               check_if_entry_exist(keyword, "title_area", "areas", "areaInfo");
            }, 300);
        });	


//-----------centro medico-----------------	
		
	 var keyupTimerCenter;
		$('#centro-medico-name').on('keyup', function(event){ 
   	var keyword = $(this).val();
            clearTimeout(keyupTimerCenter);
            keyupTimerCenter = setTimeout(function () {
               check_if_entry_exist(keyword, "name", "medical_centers", "duplicateCentro");
            }, 300);
        });	


function check_if_entry_exist(keyword, field, table, div){
if(keyword == "") {
$("#"+div).hide();
}else {
$.ajax({
type: "POST",
url: "<?=base_url('general_controller/check_if_entry_exist')?>",
data: {keyword:keyword, field:field, table:table},
success:function(data){ 
$("#"+div).html( data ); 
$("#"+div).show(); 
},

});		
	
}
}
  
 
 </script>