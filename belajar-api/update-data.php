<?php


include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'PUT') {
    http_response_code(400);
    echo 'only PATCH method is allowed';
    exit();
}

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$id = $data['student_id'];
$no = $data['student_no'];
$name = $data['student_name'];
$class = $data['student_class'];
$sql = mysqli_query($connect, "UPDATE students SET student_no='$no', student_name='$name', student_class='$class' WHERE student_id='$id'");

$affectedRow = mysqli_affected_rows($connect);

header('Content-Type: application/json');
echo json_encode([
    'status' => 'OK',
    'msg'    => 'Data has been edited successfully.',
    'affected_row' => $affectedRow
]);
?>