<?php  
	//buat koneksi ke database
	$koneksi = mysqli_connect("localhost", "root", "", "dbmonitoring");

	//baca data dari tabel tb_sensor
	$sql = mysqli_query($koneksi, "select * from tb_sensor order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$tegangan = $data['tegangan'];

	//uji, apabila nilai ldr belum ada, maka anggap tegangan = 0
	if($tegangan == "") $tegangan = 0;

	//cetak nilai ldr
	echo $tegangan ;

?> 