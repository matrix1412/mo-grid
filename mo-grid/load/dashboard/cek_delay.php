<?php  
		//buat koneksi ke database
		include_once("../koneksi.php");

		/*
		$sql = mysqli_query($koneksi, "select * from node_3 order by id desc"); //data terakhir akan  berada diatas

		//baca data paling atas
		$data = mysqli_fetch_array($sql);
		$akhir = $data['akhir'];

		if($akhir == "") $akhir = 0;

		//cetak nilai
		echo $akhir;
		
 

		//$tanggal1 = new DateTime("");
		//$tanggal2 = new DateTime();
 
		//$perbedaan = $tanggal2->diff($tanggal1)->format("%Y");
 
		//echo $perbedaan;
		//$sql = mysqli_query($koneksi, "select TIMESTAMPDIFF(SECOND, (select jeda from panel_1 order by jeda desc), (select tanggal from panel_1 order by jeda desc)");

		//cetak nilai
		//echo $sql;

		$sql = mysqli_query($koneksi, "SELECT DATE_FORMAT(tanggal, '%H:%i:%s') AS akhir FROM node_3 ORDER BY id DESC");
		
		$sql1 = mysqli_query($koneksi, "SELECT DATE_FORMAT(jeda, '%H:%i:%s') AS awal FROM node_3 ORDER BY id DESC");

		//memanggil variabel object
		$waktu_awal = mysqli_fetch_array($sql1);
		$awal= $waktu_awal['awal'];

		$waktu_akhir = mysqli_fetch_array($sql);
		$akhir= $waktu_akhir['akhir'];

        $waktu_awal     = strtotime("$awal");
        $waktu_akhir    = strtotime("$akhir"); // bisa juga waktu sekarang now()
        
        //menghitung selisih dengan hasil detik
        $delay  = $waktu_akhir - $waktu_awal;

		//$hasil = $_GET[$delay];

		$simpan = mysqli_query($koneksi, "INSERT INTO jeda (jeda) VALUES ('$delay')");
		*/

		$sql = mysqli_query($koneksi, "select * from jeda order by id desc"); //data terakhir akan  berada diatas

		//baca data paling atas
		$data = mysqli_fetch_array($sql);
		$jeda = $data['jeda'];

		if($jeda == "") $jeda = 0;

		//cetak nilai
		echo $jeda;




        //$diff = $_GET['diff']

        
		//$ambil = mysqli_query($koneksi, "SELECT * FROM node_3 ORDER BY id DESC");
		//$akhir = mysqli_fetch_array($ambil);
		//$tampil = $akhir['akhir'];

		//echo ''.number_format($tampil).''; 
		

?> 