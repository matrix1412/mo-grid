<?php  
	//buat koneksi ke database
	include_once("../koneksi.php");

	//baca data dari tabel
	$sql = mysqli_query($koneksi, "select * from node_3 order by id desc"); //data terakhir akan  berada diatas

	//baca data paling atas
	$data = mysqli_fetch_array($sql);
	$tegangan = $data['tegangan'];

	if($tegangan == "") $tegangan = 0;

	echo $tegangan ;

?> 