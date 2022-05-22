<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	//membaca informasi tanggal pada database sumbu x
	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%i:%s') AS jam FROM node_1 ORDER BY id DESC LIMIT 50");

	//membaca informasi arus pada database sumbu y
	$snr = mysqli_query($koneksi, "SELECT snr FROM node_1 ORDER BY id DESC LIMIT 50");

	//membaca informasi arus pada database sumbu y
	$snr2 = mysqli_query($koneksi, "SELECT snr AS snr2 FROM node_2 ORDER BY id DESC LIMIT 50");

	//membaca informasi arus pada database sumbu y
	$snr3 = mysqli_query($koneksi, "SELECT snr AS snr3 FROM node_3 ORDER BY id DESC LIMIT 50" );

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<!-- TAMPILAN GRAFIK -->
<div class="panel panel-primary">
	<div class="panel-heading"></div>
</div>

<div class="panel-body">
	<canvas id="grafiksnr"></canvas>

	<!-- gambar grafik -->
	<script type="text/javascript">
		//baca is canvas
		var canvas = document.getElementById('grafiksnr');
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
						while ($data_snr = mysqli_fetch_array($snr)) 
							{
								echo $data_snr['snr']. ',' ;
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
						while ($data_snr2 = mysqli_fetch_array($snr2)) 
							{
								echo $data_snr2['snr2']. ',' ;
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
						while ($data_snr3 = mysqli_fetch_array($snr3)) 
							{
								echo $data_snr3['snr3']. ',' ;
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
					labelString: 'SNR'
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