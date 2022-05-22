<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	//membaca informasi tanggal pada database sumbu x
	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%H:%i%:%s') AS jam FROM panel_1 ORDER BY id DESC LIMIT 5");

	//membaca informasi rssi pada database sumbu y
	$rssi = mysqli_query($koneksi, "SELECT rssi FROM panel_1 ORDER BY id DESC");

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
		var rssi = document.getElementById('grafikrssi');
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
				label : "RSSI",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.3)",
				borderColor : "rgba(255, 0, 0, 1)",
				lineTension : 0.3,
				data : [
					<?php
						while ($data_rssi = mysqli_fetch_array($rssi)) 
							{
								echo $data_rssi['rssi']. ',' ;
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
			}
		};

		//cetak grafik dalam kanvas
		var myLineChart = Chart.Line(rssi, {
			data : data,
			options : option
		});

	</script>
</div>