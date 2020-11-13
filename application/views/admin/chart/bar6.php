<?php
        $this->load->view('admin/chart/index');
 ?>
<style>
td{font-size:13px}
</style>
<div class="col-md-12">
<hr id="hr_ad"/>
<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
<hr id="hr_ad"/>
 </div>
 
 <div class="col-md-3">
<table class="table table-striped">
<tr style="background:#38a7bb;color:white">
<th colspan="2">Total De Paciente Visto Por Nacionalidad</th>
</tr>
<tr>
<th>Nacionalidad</th>
<th>Total</th>
</tr>
<?php
$total=0;
foreach ($query as $row)
{
$total += $row->Total;
?>
<tr>
<td><?=$row->Nacionalidad?></td>
<td><?=$row->Total?></td>
</tr>

<?php } ?>

<tr  style="background:red;color:white">
<th>Total</th>
<th><?=$total?> <!--<span style="<?=$display?>" class="glyphicon glyphicon-arrow-down"> Mas</span>--></th>
</tr>
</table>
 </div>
 <div class="col-md-9">
 <div id="container" style="min-width: 310px; height: 800px; max-width: 600px; margin: 0 auto"></div>

 <br/><br/><br/><br/>
 </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
$(document).ready(function() {
	
	 $('html, body').animate({
        scrollTop: $("#container").offset().top
    }, 3000);
	
	
	
    var options = {
        chart: {
            renderTo: 'container',
            type: 'bar',
            marginRight: 130,
            marginBottom: 25
        },
          title: {
        text: '<?=$val?><br/>'
    },
    subtitle: {
       text: 'Paciente Visto Por Nacionalidad<br/><?=$desde?> - <?=$hasta?>'
    },
    xAxis: {
        categories: []
    },
    yAxis: {
        min: 0,
        title: {
            text: '',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' paciente(s)'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
      legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        }, 
	
		 credits: {
      enabled: false
         },
        series: []
    }

    $.getJSON("<?php echo site_url('admin_medico/bar6data');?>", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
});
</script>