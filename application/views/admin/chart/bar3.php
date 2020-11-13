<?php
        $this->load->view('admin/chart/index');
 ?>
<style>
td{font-size:13px}
</style>
<div class="col-md-12">
<hr id="hr_ad"/>
<?php


$total=0;
foreach($query as $row)
{
$total += $row->OtroD;
}

?>
<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
<p style="color:red;text-align:center;">Total: <?=$total?> otros diagnosticos</p>
<hr id="hr_ad"/>
 </div>
 <!--
 <div class="col-md-3">
<table class="table table-striped">
<tr style="background:#38a7bb;color:white">
<th colspan="2">Diagnosticos Por Servicio</th>
</tr>
<tr>
<th>Otros Diagnosticos</th>
<th>Total</th>
</tr>
<?php
$total=0;
foreach($query as $row)
{
$total += $row->OtroD;
?>
<tr>
<td><?=$row->OtroDiagnostico?></td>
<td><?=$row->OtroD?></td>
</tr>

<?php } ?>

<tr  style="background:red;color:white">
<th>Total</th>
<th><?=$total?> <span style="<?=$display?>" class="glyphicon glyphicon-arrow-down"> Mas</span></th>
</tr>
</table>
 </div>-->
 <div class="col-md-12">
 
 <div id="container" style="min-width: 310px; height: 800px; max-width: 600px; margin: 0 auto"></div>

 </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
$(document).ready(function() {
	
	 $('html, body').animate({
        scrollTop: $("#container").offset().top
    }, 3000);
	
	var dataSum=<?=$total?>;
	
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
       text: 'Otros Diagnosticos Por Servicios<br/><?=$desde?> - <?=$hasta?>'
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
        valueSuffix: ' servicio(s)'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true,
				formatter:function() {
                    var pcnt = (this.y / dataSum) * 100;
                    return Highcharts.numberFormat(pcnt) + ' %';
                }
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
	  /*legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },*/
		 credits: {
      enabled: false
         },
        series: []
    }

    $.getJSON("<?php echo site_url('admin_medico/bar3data');?>", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
});
</script>