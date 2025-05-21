<?php
include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'PATCH'){
  http_response_code(400);
  echo 'Only PATCH method is alowed.';
  exit();
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
 
$id    = $data['student_id'];
$name  = $data['student_name'];
$no    = $data['student_no'];
$class = $data['student_class'];

$sql = mysqli_query($connect, "UPDATE tb_student
                               SET 
                               student_no = '$no',
                               student_name = '$name',
                               student_class = '$class'
                               WHERE 
                                   student_id = $id
                               ");
$affectedRow = mysqli_affected_rows($connect);

header('Content-Type: application_rows($connect');
echo json_encode([
                        'status' => 'OK',
                        'msg'    => 'Data has been edited succesfully.',
                        '$affectedRow' => $affectedRow
                      ]);