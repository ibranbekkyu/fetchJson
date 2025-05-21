<?php


include 'connection.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method !== 'DELETE') {
    http_response_code(400);
    echo 'only DELETE method is allowed';
    exit();
}

$id = $_GET['student_id']; // Ganti ke GET\

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);


$sql = mysqli_query($connect, "DELETE FROM students WHERE student_id='$id'");
$affectedRow = mysqli_affected_rows($connect);

header('Content-Type: application/json');
echo json_encode([
    'status' => 'OK',
    'msg'    => 'Data has been deleted successfully.',
    'affected_row' => $affectedRow
]);
?>
