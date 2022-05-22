<?php  
	//buat koneksi ke database
	include_once("../koneksi.php");

	//baca data
	$sql = mysqli_query($koneksi, "select * from node_2 order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$rssi = $data['rssi'];

	if($rssi == "") $rssi = 0;

	echo $rssi ;

?> 