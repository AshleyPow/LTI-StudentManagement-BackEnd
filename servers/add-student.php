<?php
$data = array();
$student_id = $_POST['student_id'];

// check if ID already exists
$id_found = false;
$fcsv   = file('../data/students.csv');

foreach ($fcsv as $key => $value) {
  $temp = explode(',', $value);
  if ($temp[0] == $student_id) {
      $id_found = true;
    echo '<h2>Student ID Already Exists.</h2>';
  break;
  } 
}

if ($id_found == false) {
    $student_name = $_POST['student_name'];
    $student_gender = $_POST['student_gender'];
    $student_dob = $_POST['student_dob'];
    $student_city = $_POST['student_city'];
    $student_state = $_POST['student_state'];
    $student_email = $_POST['student_email'];
    $student_qualification = $_POST['student_qualification'];
    $student_stream = $_POST['student_stream'];

    $data[0] = $student_id;
    $data[1] = $student_name;
    $data[2] = $student_gender;
    $data[3] = $student_dob;
    $data[4] = $student_city;
    $data[5] = $student_state;
    $data[6] = $student_email;
    $data[7] = $student_qualification;
    $data[8] = $student_stream;

    // return all our data to an AJAX call
    // echo json_encode($data, JSON_PRETTY_PRINT);

    $file = fopen("../data/students.csv","a");

    fputcsv($file, $data);
    fclose($file);

    header("Location: http://127.0.0.1:5500/html/index.html");
}
 ?>