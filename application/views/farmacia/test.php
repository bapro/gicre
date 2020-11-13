<!DOCTYPE html>
<html>
  <head>
     <title>DataTables AJAX Pagination with Search and Sort in CodeIgniter</title>

     <!-- Datatable CSS -->
     <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  </head>
  <body>

     <!-- Table -->
     <table id='empTable' class='display dataTable'>

       <thead>
         <tr>
		 <th>Foto</th>
           <th>Id patient</th>
          <!-- <th>Email</th>
           <th>Gender</th>
           <th>Salary</th>
           <th>City</th>-->
         </tr>
       </thead>

     </table>

     <!-- Script -->
     <script type="text/javascript">
   $(document).ready(function(e){
  var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
  $('#empTable').DataTable({
     "pageLength" : 10,
     "serverSide": true,
     "order": [[0, "asc" ]],
     "ajax":{
              url :  base_url+'admin_medico/getDespachadas',
              type : 'POST',
			    "data": {
             "patient_nombres": $("#patient_nombres").val(),
			 "patient_apellido": $("#patient_apellido").val(),
			 "patient_apellido2": $("#patient_apellido2").val(),
             }
            },
  }); // End of DataTable
});
     </script>
  </body>
</html>