<?php
  header('Access-Control-Allow-Origin: *');
  $data = array();
  // $data["username"] = "Ashley";
  // $data["result"] = "OK"; 
  // echo json_encode($data, JSON_PRETTY_PRINT);

  $file="../data/students.csv";
$csv= file_get_contents($file);
$array = array_map("str_getcsv", explode("\n", $csv));
$json = json_encode($array);
print_r($json);
?>