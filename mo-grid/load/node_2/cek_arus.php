<?php  
	//buat koneksi ke database
	include_once("../koneksi.php");

	//baca data
	$sql = mysqli_query($koneksi, "select * from node_2 order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$arus = $data['arus'];

	//uji, apabila nilai arus belum ada, maka anggap arus = 0
	if($arus == "")	$arus = 0;
	
	//cetak nilai arus
	echo $arus;

?> 