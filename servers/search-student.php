<?php 
header('Access-Control-Allow-Origin: *');
$student_id = $_POST['studentid'];

$filename = '../data/students.csv';

// The nested array to hold all the arrays
$the_big_array = []; 

// Open the file for reading
if (($h = fopen("{$filename}", "r")) !== FALSE) 
{
  // Each line in the file is converted into an individual array that we call $data
  // The items of the array are comma separated
  while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
  {
    // Each individual array is being pushed into the nested array
    $the_big_array[] = $data;		
  }

  // Close the file
  fclose($h);
}

$student_found = false;
$row_num = 0;
foreach($the_big_array as $i => $row) {
   foreach($row as $j => $line) {
      if ($the_big_array[$i][$j] == $student_id) {
         $student_found = true;
         $row_num = $i;
      break 2;
      }
      else {
         $student_found = false;
      }
   }
}

if ($student_found === true) {
   foreach ($the_big_array[$row_num] as $idx => $item) {
      $student[trim($the_big_array[0][$idx])] = $item;
   }
   echo json_encode($student);
}
else {
   echo json_encode('No Match Found');
}

?>