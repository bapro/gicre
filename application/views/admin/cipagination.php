<html>
<head>
<title>Codeigniter Ajax Pagination Example  </title>
</head>
<body>
<h3>Codeigniter Ajax Pagination Example  </h3>
<ul class="pagination hide_pagination" id="ajax_pagingsearc">
<p><?php echo $links; ?></p>
</ul>

<div class="row" id="ajaxdata">
<?php
foreach($results as $data) {
 echo $data->marcha_inicio . " - " . $data->long_mov_der . "<br>";
}
?>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>
<script type="text/javascript">
    $(function() {
      applyPagination();
   
      function applyPagination() {
        $("#ajax_pagingsearc a").click(function() {
        var url = $(this).attr("href");
    
          $.ajax({
            type: "POST",
            data: "ajax=1",
            url: url,
           success: function(msg) {
            
              $("#ajaxdata").html(msg);
              applyPagination();
            }
          });
        return false;
        });
      }
    });
</script>
</body>
</html>