<?php
    $sql = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%H:%i:%s') AS akhir FROM waktu_arduino ORDER BY id DESC");
		
	$sql1 = mysqli_query($koneksi, "SELECT DATE_FORMAT(waktu_arduino, '%H:%i:%s') AS awal FROM waktu_arduino ORDER BY id DESC");

	//memanggil variabel object
	$waktu_awal = mysqli_fetch_array($sql1);
	$awal= $waktu_awal['awal'];

	$waktu_akhir = mysqli_fetch_array($sql);
	$akhir= $waktu_akhir['akhir'];

    $waktu_awal     = strtotime("$awal");
    $waktu_akhir    = strtotime("$akhir"); // bisa juga waktu sekarang now()
        
    //menghitung selisih dengan hasil detik
    $delay  = $waktu_akhir - $waktu_awal;

	mysqli_query($koneksi, "ALTER TABLE jeda AUTO_INCREMENT=1");

	// memasukkan hasil perhitungan ke tabel jeda
	$simpan = mysqli_query($koneksi, "INSERT INTO jeda (jeda) VALUES ('$delay')");

?>