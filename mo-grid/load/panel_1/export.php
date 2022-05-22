<?php  
 include_once("../koneksi.php");
 if(isset($_POST["export"]))  
 {    
      header('Content-Type: application/vnd.ms-excel');  
      $filename="panel1_all(".date('d-M-Y').").csv";
      header("Content-Disposition: attachment; filename=$filename");  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Tegangan', 'Arus', 'Daya', 'RSSI', 'Jam', 'Tanggal'));  
      $query = "SELECT id, tegangan, arus, daya, rssi, DATE_FORMAT(tanggal, '%H:%i:%s') AS jam, DATE_FORMAT(tanggal, '%d:%M:%Y') AS tanggal from panel_1 ORDER BY id DESC";  
      $result = mysqli_query($koneksi, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  