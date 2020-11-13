<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
   <title>ADMEDICALL</title>

    <meta name="keywords" content="">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display|Spectral">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">


</head>
<!-- *** welcome message modal box *** -->
<body >


<div class="col-md-12" style="overflow-x:auto">
  <input id="searchInput" value="Type To Filter">
  <br/>
  <table id="myTable" class="display" style="width:100%">
      <thead>
          <tr>
              <th></th>
            <th>Patient</th>
            <th>Centro</th>
            <th>fecha</th>
            <th>doctor</th>
          </tr>
      </thead>
<tbody id="fbody">
        <?php foreach($authors as $author)
        {
$patient= $this->db->select('nombre')->where('id_p_a',$author->id_patient)->get('patients_appointments')->row('nombre');
          ?>
      <tr>
                            <td><?= $patient ?></td>
                            <td><?= $author->centro ?></td>
                            <td><?= $author->doctor ?></td>
                            <td><?= $author->fecha_propuesta ?></td>
                            <td></td>
                        </tr>
                      <?php } ?>
    </tbody>
  </table>
 <p><?php echo $links; ?></p>
 </div>

<hr/>

</div>




</div>





   </body>


        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){
    $("#searchInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });

 </script>

</html>
