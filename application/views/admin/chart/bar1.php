<?php
        $this->load->view('admin/chart/index');
 ?>
<style>
td{font-size:13px}
</style>
<div class="col-md-12">
<hr id="hr_ad"/>

<h4  style="color:#38a7bb;text-align:center;">
<?php
$total=0;
foreach($bardata1 as $row)
{
$total += $row->Paciente;
 } ?>
  PACIENTES VISTO POR <?=$val?><br/>
desde <?=$desde?> hasta <?=$hasta?></h4>
<p style="color:red;text-align:center;">Total: <?=$total?> pacientes</p>


<!--
<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
-->
<hr id="hr_ad"/>
 </div>
 
 <div class="col-md-3">

 </div>
 <div class="col-md-12">
 <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
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
	
	var dataSum=<?=$total?>;
	
    var options = {
        chart: {
            renderTo: 'container',
            type: 'bar',
            marginRight: 130,
            marginBottom: 25
        },
        title: {
            text: '<?=$val?><br/>',
            x: -20 //center
        },
        subtitle: {
            text: '<?=$total?> pacientes<br/><?=$desde?> - <?=$hasta?>',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Cantitad'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
         tooltip: {
        valueSuffix: ' '
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
		 credits: {
      enabled: false
         },
        series: []
    }

    $.getJSON("<?php echo site_url('admin_medico/bar1data');?>", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
});









</script>