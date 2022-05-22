<?php  
 include_once("../koneksi.php");
 if(isset($_POST["export"]))  
 {    
      header('Content-Type: application/vnd.ms-excel');  
      $filename="Delay_all(".date('d-M-Y').").csv";
      header("Content-Disposition: attachment; filename=$filename");  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Delay (Second)', 'Hours', 'Date'));  
      $query = "SELECT id, jeda, DATE_FORMAT(tanggal, '%H:%i:%s') AS jam, DATE_FORMAT(tanggal, '%d:%M:%Y') AS tanggal from jeda ORDER BY id DESC";  
      $result = mysqli_query($koneksi, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?>  