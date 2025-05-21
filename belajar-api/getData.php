<?php
include 'connection.php';

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'GET' ) {
    http_response_code(400);
    echo 'only GET method is allowed!';
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = mysqli_query($connect, "SELECT * from tb_student where student_id = $id");

    
$response = [];
$row = mysqli_fetch_object($sql);
    $response[] = $row;
} else {
    
$sql = mysqli_query($connect, "select * from tb_student");

$response = [];
while ($result = mysqli_fetch_object($sql)) {
    $response[] = $result;
}

}

$sql = mysqli_query($connect, "select * from tb_student");

$response = [];
while ($result = mysqli_fetch_object($sql)) {
    $response[] = $result;
}

header('Content-type: application/json');
echo json_encode($response);