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
foreach ($query as $row)
{
$total += $row->Total;
}
?>
<h3 style="text-align:center;color:#38a7bb" ><?=$val?></h3> 
<h4 style="text-align:center;color:red">desde <?=$desde?> hasta <?=$hasta?></h4>
<p style="color:red;text-align:center;">Total: <?=$total?> Pacientes Vistos por Provincias</p>
<hr id="hr_ad"/>
 </div>
 <!--
<div class="col-md-3">
<table class="table table-striped">
<tr style="background:#38a7bb;color:white">
<th colspan="2">Total De Paciente Visto Por Provincia</th>
</tr>
<tr>
<th>Provincia</th>
<th>Total</th>
</tr>
<?php
$total=0;
foreach ($query as $row)
{
$idp=$this->db->select('provincia')->where('id_p_a',$row->Paciente)->get('patients_appointments')->row('provincia');
$prvc=$this->db->select('title')->where('id',$idp)->get('provinces')->row('title');
$total += $row->Total;
}
?>
<tr>
<td><?=$prvc?></td>
<td><?=$row->Total?></td>
</tr>



</table>
 </div>-->
<div class="col-md-12">
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
       text: '<?=$total?> Pacientes Vistos Por Provincia<br/><?=$desde?> - <?=$hasta?>'
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

    $.getJSON("<?php echo site_url('admin_medico/bar5data');?>", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        chart = new Highcharts.Chart(options);
    });
});
</script>