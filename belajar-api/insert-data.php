<?php


include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'POST') {
    http_response_code(400);
    echo 'only POST method is allowed';
    exit();
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$no = $data['student_no'];
$name = $data['student_name'];
$class = $data['student_class'];


$sql = mysqli_query($connect, "INSERT INTO students (student_id, student_no, student_name, student_class) VALUES (null, '$no', '$name','$class')");
$insertedId = mysqli_insert_id($connect);

header('Content-Type: application/json');
echo json_encode([
        'status' => 'OK',
        'msg'    => 'Data has been created successfully. ',
        'inserted_id' => $insertedId
    ]);
?>