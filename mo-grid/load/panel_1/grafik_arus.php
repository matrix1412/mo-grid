<?php
	//buat koneksi ke database
	include_once("../koneksi.php");

	//membaca informasi tanggal pada database sumbu x
	$jam = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%H:%i%:%s') AS jam FROM panel_1 ORDER BY id DESC LIMIT 5");

	//membaca informasi arus pada database sumbu y
	$arus = mysqli_query($koneksi, "SELECT arus FROM panel_1 ORDER BY id DESC");

?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<!-- TAMPILAN GRAFIK -->
<div class="panel panel-primary">
	<div class="panel-heading"></div>
</div>

<div class="panel-body">
	<canvas id="grafikarus"></canvas>

	<!-- gambar grafik -->
	<script type="text/javascript">
		//baca is canvas
		var arus = document.getElementById('grafikarus');
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
				label : "Arus",
				fill : true, 
				backgroundColor: "rgba(78, 115, 223, 0.3)",
				borderColor : "rgba(135, 206, 250, 1)",
				lineTension : 0.3,
				data : [
					<?php
						while ($data_arus = mysqli_fetch_array($arus)) 
							{
								echo $data_arus['arus']. ',' ;
							}	

					?>
				]
			  },
			]
		};
		var scale = {
				x: [
					display = true,
					title = {
					display: true,
					text: 'Month'
					}
				],
				y: [
					display = true,
					title = {
					display: true,
					text: 'Value'
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
							labelString: 'Date'
						}
					}],
				yAxes: [{
				scaleLabel: {
					display: true,
					labelString: 'probability'
				}
				}]
			}     
		};

		//cetak grafik dalam kanvas
		var myLineChart = Chart.Line(arus, {
			data : data,
			scales : scale,
			options : option
			
		});

	</script>

</div>