<?php  
	//buat koneksi ke database
	include_once("../koneksi.php");

	//baca data
	$sql = mysqli_query($koneksi, "select * from node_2 order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$daya= $data['daya'];

	if($daya == "") $daya = 0;

	//cetak nilai
	echo $daya;

?> 