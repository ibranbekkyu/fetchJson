<?php
include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(400);
    echo 'Only POST method is allowed.';
    exit();
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

//variable create user
$name = $data['student_name'];
$no = $data['student_no'];
$class = $data['student_class'];

//function create user
$sql = mysqli_query($connect, "INSERT  INTO tb_student (student_id, student_no, student_name, student_class) VALUES (null, '$no', '$name', '$class')");
$insertedId = mysqli_insert_id($connect);

header('Content-type: application/json');
echo json_encode([
    'status' => 'OK',
    "msg" => 'Data has been created successfully',
    'insertedId' => $insertedId
]);

?> 