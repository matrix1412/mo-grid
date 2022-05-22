<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	//membaca informasi tanggal pada database sumbu x
	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%i%:%s') AS jam FROM node_1 ORDER BY id DESC LIMIT 40");

	//membaca informasi arus pada database sumbu y
	$tegangan = mysqli_query($koneksi, "SELECT tegangan FROM node_1 ORDER BY id DESC LIMIT 40");

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<!-- TAMPILAN GRAFIK -->
<div class="panel panel-primary">
	<div class="panel-heading"></div>
</div>

<div class="panel-body">
	<canvas id="grafik_tegangan"></canvas>

	<!-- gambar grafik -->
	<script type="text/javascript">
		//baca is canvas
		var tegangan_node1 = document.getElementById('grafik_tegangan');
		//letakkan data tanggal dan suhu untuk grafik
		var data_node1 = {
			labels : [
			<?php 
				while ($data_tanggal = mysqli_fetch_array($jam)) {
					echo '"'.$data_tanggal['jam'].'",';
				}
			?>
			],
			datasets : [
			  {
				label : "Voltage",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.1)",
				borderColor : "rgba(23, 107, 151, 1)",
				lineTension : 0.1,
				data : [
					<?php
						while ($data_tegangan = mysqli_fetch_array($tegangan)) 
							{
								echo $data_tegangan['tegangan']. ',' ;
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
					labelString: 'Voltage'
				}
				}]
			}     
		};
		//cetak grafik dalam kanvas
		var myLineChart = Chart.Line(tegangan_node1, {
			data : data_node1,
			options : option
		});

	</script>
</div>