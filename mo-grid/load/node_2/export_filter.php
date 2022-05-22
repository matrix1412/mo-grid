<?php

include "../koneksi.php";

$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

if(isset($_POST["export"]))
{
  $file_name = "Node_2 (".$start_date.") To (".$end_date.").csv";
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file_name");
  header("Content-Type: application/csv;");

  $file = fopen('php://output', 'w');

  $header = array(" ID ", " Voltage  ", "  Current ", " Power ", "  RSSI  ", "  SNR ", "   DateTime   ");

  fputcsv($file, $header);

  $query = "
  SELECT * FROM node_2
  WHERE tanggal BETWEEN '$start_date' AND '$end_date' ORDER BY tanggal DESC ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $data = array();
   $data[] = $row["id"];
   $data[] = $row["tegangan"];
   $data[] = $row["arus"];
   $data[] = $row["daya"];
   $data[] = $row["rssi"];
   $data[] = $row["snr"];
   $data[] = $row["tanggal"];
   fputcsv($file, $data);
  }
  fclose($file);
  exit;
 }
?>
