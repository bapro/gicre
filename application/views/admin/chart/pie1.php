<?php
        $this->load->view('admin/chart/index');
 ?>

<div class="col-md-12">
<hr id="hr_ad"/>
<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
<hr id="hr_ad"/>
 </div>
 
 <div class="col-md-4">
<table class="table table-striped">
<tr style="background:#38a7bb;color:white">
<th colspan="2">TOTAL PACIENTE VISTO POR SEXO</th>
</tr>
<tr>
<th>SEXO</th>
<th>TOTAL</th>
</tr>
<?php
$total=0;
foreach($query as $row)
{
$total += $row->total;
?>
<tr>
<td><?=$row->sexo?></td>
<td><?=$row->total?></td>
</tr>

<?php } ?>

<tr  style="background:red;color:white">
<th>Total</th>
<th><?=$total?></th>
</tr>
</table>
 </div>
 <div class="col-md-8">
 <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
 </div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script>
 $('html, body').animate({
        scrollTop: $("#container").offset().top
    }, 3000);
	
	
var data = <?=$bar1?>;

data = data.map(function(obj) {
    return {
        name: obj.sexo,
        y: Number(obj.total)
    }
});

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'VISTO POR SEXO <?=$val?>'
    },
    tooltip: {
         pointFormat: '{series.name}: <br>{point.percentage:.1f} %<br>total: {point.total}'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>:<br>{point.percentage:.1f} %<br>total: {point.total}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            },
			showInLegend: true
        }
    },
	 credits: {
      enabled: false
  },
    series: [{
        name: 'Valor',
        colorByPoint: true,
        data: data
    }]
});
</script>