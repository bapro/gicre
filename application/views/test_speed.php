<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">



    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/styles.css') ?>" rel="stylesheet">
  </head>

<!-- *** welcome message modal box *** -->



<body>

<div class="container">
	<div class="row">
		<div class="col-md-4">
	</div>
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-8">
					<div class="search-field">
						<input type="text" class="form-control" name="search_key" id="search_key" placeholder="Search by product name" />
					</div>
				</div>
				<div class="col-md-4">
					<div class="search-button">
						<button type="button" id="searchBtn" class="btn btn-info">Search</button>
						<button type="button" id="resetBtn" class="btn btn-warning">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="allLaboratorios"></div>
		</div>
	</div>
</div>
 </body>



</body>
<div class="modal fade" id="EditC"  role="dialog"  >
<div class="modal-dialog modal-md" >
<div class="modal-content" >
<div class="modal-body">
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js "></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?=base_url();?>assets/js/custom.js"></script> 
<script type="text/javascript">
//--------------------------------------------------------------------------------------------------
ajaxlist(page_url=false);
$(document).on('click', "#searchBtn", function(event) {
			ajaxlist(page_url=false);
			event.preventDefault();
		});
	$(document).on('click', "#resetBtn", function(event) {
			$("#search_key").val('');
			ajaxlist(page_url=false);
			event.preventDefault();
		});
		
		/*-- Page click --*/
		$(document).on('click', ".pagination li a", function(event) {
			var page_url = $(this).attr('href');
			ajaxlist(page_url);
			event.preventDefault();
		});
		
		/*-- create function ajaxlist --*/
		function ajaxlist(page_url = false)
		{
			var search_key = $("#search_key").val();
			var historial_id = 6;
			var area  = 0;
			var user_id  = 1;
			var emergency_id = 0;
			
			//var dataString = search_key=' + search_key};
			var base_url = '<?php echo site_url('admin_medico/allLaboratorios/') ?>';
			
			if(page_url == false) {
				var page_url = base_url;
			}
			
			$.ajax({
				type: "POST",
				url: page_url,
				data: {historial_id:historial_id,area:area,user_id:user_id,emergency_id:emergency_id},
				success: function(response) {
					console.log(response);
					$("#allLaboratorios").html(response);
				}
			});
		}
//---------------------------------------------------------------------------------------------------

</script>

</html>