<?php
$total =0;
$tot =0;
$a=1;
foreach($survey->result() as $t){
	$jml = $t->jml;
	$persen = $jml;
	//$nm_survey[$a] = "['".$t->survey."',".$persen."]";
    /*$tampil_data = array(
        'nama_survey' => $t->survey,
        'jumlah' => $t->jml);*/
        $nama_survey[] = $t->survey;
        $jumlah[] = $t->jml;
}
$total = $jml_survey->num_rows();
//var_dump($nama_survey);
?>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Dari mana Anda tahu UNIVERSITAS NAHDLATUL ULAMA INDONESIA ?'
            },
			subtitle: {
                text: 'Total Responden : <?php echo $total;?> Calon Mahasiswa'
            },
            tooltip: {
             formatter: function() {
                 return '<b>' + "Total " + Highcharts.numberFormat(this.y,0) + " Point " + '</b>';
             }
          },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Total :<?php echo $persen;?> Calon Mahasiswa',
                data: [
                <?php
                  foreach($survey->result() as $result):?>
                    { name: "<?php echo $result->survey;?>", y:<?php echo $result->jml;?>,},
                            <?php endforeach;?>]
                            
              }]
        });
    });    
});
</script>
<br>
<div class="thumbnails">
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>