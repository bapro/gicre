<script>

var keyupTimer2;
    $("#laboratoriosAgrupados").keyup(function () {
		var keyword = $(this).val();
            clearTimeout(keyupTimer2);
           
            keyupTimer2 = setTimeout(function () {
               autoCompleteInput(keyword, "h_c_groupo_lab", 'groupo', "laboratoriosAgrupados", "suggestion-grup-lab-list");
            }, 300);
        });
 

        var keyupTimer3;
    $("#searchLabByName").keyup(function () {
		var keyword = $(this).val();
        clearTimeout(keyupTimer3);
        
            keyupTimer3 = setTimeout(function () {
				   
               autoCompleteInput(keyword, "laboratories", '*', "searchLabByName", "suggestion-lab-list");
            }, 300);
        });
        allLaboratorios("patient-labs-content", $("#ordenMedInsertedId").val()); 
 function allLaboratorios(display_div, id_sala){

    $.ajax({
		type:'POST',
		
		 url: base_url+"h_c_indication_lab/patient_laboratories",
		data: {display_div:display_div, id_sala:id_sala},
		success:function(data) {
            $("#"+display_div).html(data);
		 },
 
  
	});
 }

</script>