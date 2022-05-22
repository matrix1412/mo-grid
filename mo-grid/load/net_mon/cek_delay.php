<?php  
	//buat koneksi ke database
	include_once("../koneksi.php");

	//baca data
	$sql = mysqli_query($koneksi, "select * from jeda order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$akhir = $data['jeda'];

	if($akhir == "") $akhir = 0;

	//cetak nilai
	echo $akhir;

?> 