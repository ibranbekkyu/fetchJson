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

$username = $data['username'];
$password = sha1($data['password']);

$response = [];
$sql = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$numRows = mysqli_num_rows($sql); // mendapatkan jumlah data dari sebuah query

if ($numRows > 0) {
    $row = mysqli_fetch_assoc($sql);
    $response = $row;

    echo json_encode ([
        'status' => 'success',
        'msg' => 'User found',
        'data' => $response
    ]);

} else {
    echo json_encode([
        'status' => 'fail',
        'msg' => 'User not found', 'data' => $response
    ]);
}
