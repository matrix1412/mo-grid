<?php 
	//buat koneksi ke database
	include_once("load/koneksi.php");

	// memanggil file untuk menghitung delay
	include_once("load/delay.php");

	// data node 3
	$tegangan1 = $_GET['tegangan1'];
	$arus1 = $_GET['arus1'];
	$daya1 = $_GET['daya1'];
	$rssi1 = $_GET['rssi1'];
	$snr1 = $_GET['snr1'];

	// Waktu dari arduino
	$jeda1 = $_GET['jeda1'];

	// Data node 1
	$tegangan2 = $_GET['tegangan2'];
	$arus2 = $_GET['arus2'];
	$daya2 = $_GET['daya2'];
	$rssi2 = $_GET['rssi2'];
	$snr2 = $_GET['snr2'];

	// Data node 2
	$tegangan3 = $_GET['tegangan3'];
	$arus3 = $_GET['arus3'];
	$daya3 = $_GET['daya3'];
	$rssi3 = $_GET['rssi3'];
	$snr3 = $_GET['snr3'];


	//auto increment = 1 / mengembalikan ID menjadi 1 apabila dikosongkan
	mysqli_query($koneksi, "ALTER TABLE node_1 AUTO_INCREMENT=1");
	mysqli_query($koneksi, "ALTER TABLE node_2 AUTO_INCREMENT=1");
	mysqli_query($koneksi, "ALTER TABLE node_3 AUTO_INCREMENT=1");
	mysqli_query($koneksi, "ALTER TABLE waktu_arduino AUTO_INCREMENT=1");

	//simpan data sensor ke tabel tiap sensor
	$simpan1 = mysqli_query($koneksi, "INSERT INTO node_3(tegangan, arus, daya, rssi, snr) VALUES('$tegangan1', '$arus1', '$daya1', '$rssi1', '$snr1')");

	$simpan2 = mysqli_query($koneksi, "INSERT INTO node_1(tegangan, arus, daya, rssi, snr) VALUES('$tegangan2', '$arus2', '$daya2', '$rssi2', '$snr2')");

	$simpan3 = mysqli_query($koneksi, "INSERT INTO node_2(tegangan, arus, daya, rssi, snr) VALUES('$tegangan3', '$arus3', '$daya3', '$rssi3', '$snr3')");

	$simpan4 = mysqli_query($koneksi, "INSERT INTO waktu_arduino(waktu_arduino) VALUES('$jeda1')");

	//uji simpan untuk memberikan respon dari server
	if($simpan1 OR $simpan2 OR $simpan3){
		echo "Node berhasil dikirim";
	}else {
		echo "Gagal dikirim !";
	};

?>
