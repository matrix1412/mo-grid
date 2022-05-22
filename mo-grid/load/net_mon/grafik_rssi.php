<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	//membaca informasi tanggal pada database sumbu x
	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%i:%s') AS jam FROM node_1 ORDER BY id DESC LIMIT 50");

	//membaca informasi rssi pada database sumbu y
	$rssi = mysqli_query($koneksi, "SELECT rssi FROM node_1 ORDER BY id DESC LIMIT 50");

	//membaca informasi rssi pada database sumbu y
	$rssi2 = mysqli_query($koneksi, "SELECT rssi AS rssi2 FROM node_2 ORDER BY id DESC LIMIT 50");

	//membaca informasi rssi pada database sumbu y
	$rssi3 = mysqli_query($koneksi, "SELECT rssi AS rssi3 FROM node_3 ORDER BY id DESC LIMIT 50" );

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<!-- TAMPILAN GRAFIK -->
<div class="panel panel-primary">
	<div class="panel-heading"></div>
</div>

<div class="panel-body">
	<canvas id="grafikrssi"></canvas>

	<!-- gambar grafik -->
	<script type="text/javascript">
		//baca is canvas
		var canvas = document.getElementById('grafikrssi');
		//letakkan data tanggal dan suhu untuk grafik
		var data = {
			labels : [
			<?php 
				while ($data_jam = mysqli_fetch_array($jam)) {
					echo '"'.$data_jam['jam'].'",';
				}
			?>
			],
			datasets : [
			  {
				label : "Node 1",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.1)",
				borderColor : "rgba(0, 0, 255, 1)",
				lineTension : 0.1,
				data : [
				<?php
						while ($data_rssi = mysqli_fetch_array($rssi)) 
							{
								echo $data_rssi['rssi']. ',' ;
							}	

				?>
			]
			  },
			  {
				label : "Node 2",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.1)",
				borderColor : "rgba(0, 255, 0, 1)",
				lineTension : 0.1,
				data : [
					<?php
						while ($data_rssi2 = mysqli_fetch_array($rssi2)) 
							{
								echo $data_rssi2['rssi2']. ',' ;
							}	

					?>
				]
			  },
			  {
				label : "Node 3",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.1)",
				borderColor : "rgba(76, 153, 240, 1)",
				lineTension : 0.1,
				data : [
					<?php
						while ($data_rssi3 = mysqli_fetch_array($rssi3)) 
							{
								echo $data_rssi3['rssi3']. ',' ;
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
					labelString: 'RSSI'
				}
				}]
			}     
		};

		//cetak grafik dalam kanvas
		var myLineChart = Chart.Line(canvas, {
			data : data,
			options : option
		});

	</script>
</div>