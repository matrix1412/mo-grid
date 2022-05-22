<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%i%:%s') AS jam FROM jeda ORDER BY id DESC LIMIT 20");

	$jeda1 = mysqli_query($koneksi, "SELECT jeda FROM jeda ORDER BY id DESC LIMIT 20");

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<!-- TAMPILAN GRAFIK -->
<div class="panel panel-primary">
	<div class="panel-heading"></div>
</div>

<div class="panel-body">
	<canvas id="grafikdelay"></canvas>

	<!-- gambar grafik -->
	<script type="text/javascript">
		//baca is canvas
		var delay = document.getElementById('grafikdelay');
		//letakkan data tanggal dan suhu untuk grafik
		var data = {
			labels : [
			<?php 
				while ($data_tanggal = mysqli_fetch_array($jam)) {
					echo '"'.$data_tanggal['jam'].'",';
				}
			?>
			],
			datasets : [
			  {
				label : "DELAY",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0)",
				borderColor : "rgba(128, 128, 128, 1)",
				lineTension : 0.1,
				data : [
					<?php
						while ($data_jeda1 = mysqli_fetch_array($jeda1)) 
							{
								echo $data_jeda1['jeda']. ',' ;
							}	
					?>
				]
			  }
			]
		};

		//option grafik
		var option = {
			showLines : true,
			animation : {
				duration : 0
			},
			scales: {
				xAxes: [ {
						scaleLabel: {
							display: true,
							labelString: 'Time'
						}
					}],
				yAxes: [{
				scaleLabel: {
					display: true,
					labelString: 'Second'
				}
				}]
			}     
		};

		//cetak grafik dalam kanvas
		var myLineChart = Chart.Line(delay, {
			data : data,
			options : option
		});

	</script>
</div>