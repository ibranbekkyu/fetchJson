<?php
include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'DELETE'){
  http_response_code(400);
  echo 'Only DELETE method is alowed.';
  exit();
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);
 
$id    = $_GET['student_id'];


$sql = mysqli_query($connect, "DELETE FROM tb_student
                               WHERE 
                                   student_id = $id
                               ");
$affectedRow = mysqli_affected_rows($connect);

header('Content-Type: application_rows($connect');
echo json_encode([
                        'status' => 'OK',
                        'msg'    => 'Data has been deleted succesfully.',
                        '$affectedRow' => $affectedRow
                      ]);