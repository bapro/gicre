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
$total += $row->Diagnostico;
}

?>

<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
<p style="color:red;text-align:center;"><?=$total?> Diagnosticos Por Servicio</p>



 <div class="col-md-12">
 
 
<!--  <button id="ending" class="autocompare">ending</button>-->
 <div id="container" style="min-width: 300px; height: 800px; max-width: 1200px; margin: 0 auto"></div>


 </div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
 <?php
 $show=''; 
	
 ?> 
<script>

$(document).ready(function() {
	
	 $('html, body').animate({
        scrollTop: $("#container").offset().top
    }, 3000);
	//var show=<?=$show?>;
	var dataSum=<?=$total?>;
	
    var options = {
        chart: {
            renderTo: 'container',
            type: 'bar',
            marginRight: 130,
            marginBottom: 25,
		
        },
          title: {
        text: '<?=$val?><br/>'
    },
    subtitle: {
      text: '<?=$total?> Diagnosticos Por Servicios<br/><?=$desde?> - <?=$hasta?>'
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
        valueSuffix: ' servicios'
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
		 scrollbar: {
        enabled: true
    },
	 credits: {
      enabled: false
         },
        series: []
    }

    $.getJSON("<?php echo site_url('admin_medico/bar2data');?>", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
});
 
//-----------------CONTAINER 2-----------------------------------------------------------------



</script>