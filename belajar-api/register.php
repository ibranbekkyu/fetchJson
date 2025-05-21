<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// CORS headers - More permissive for development
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header('Access-Control-Max-Age: 86400');    // cache for 1 day

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'])) {
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    }
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) {
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    }
    exit(0);
}

header('Content-Type: application/json');

// Log file setup
$logFile = 'register_errors_test.log'; // Use a different name for testing

function writeLog($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    // Attempt to write using file_put_contents
    $result = file_put_contents($logFile, "[$timestamp] $message\n", FILE_APPEND);
    // You can optionally check $result here, but for now let's focus on the response
}

// --- Add this for testing --- START
// Read raw data first
$rawData = file_get_contents('php://input');
writeLog("Received raw data (Test Log): " . $rawData);

// Temporarily echo raw data for debugging if JSON decode fails
$data = json_decode($rawData, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    writeLog("JSON decode error (Test Log): " . json_last_error_msg());
    // Output raw data and JSON error directly in response for debugging
    echo json_encode([
        'success' => false,
        'message' => 'Invalid JSON data: Syntax error',
        'error_details' => json_last_error_msg() . '. Raw data received: ' . $rawData
    ]);
    exit; // Exit here after sending the error response
}
// --- Add this for testing --- END

// Koneksi ke database
$host = 'localhost';
$dbname = 'db_students';
$username = 'root';
$password = '';

try {
    writeLog("Attempting database connection...");
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    writeLog("Database connection successful");
} catch(PDOException $e) {
    writeLog("Database connection failed: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Koneksi database gagal: ' . $e->getMessage(),
        'error_details' => $e->getMessage()
    ]);
    exit;
}

// Validasi input
if (!isset($data['username']) || !isset($data['password'])) {
    writeLog("Missing username or password in request");
    echo json_encode([
        'success' => false,
        'message' => 'Username dan password harus diisi',
        'error_details' => 'Data yang diterima: ' . print_r($data, true)
    ]);
    exit;
}

$username = $data['username'];
$password = $data['password'];

writeLog("Processing registration for username: " . $username);

// Validasi panjang username dan password
if (strlen($username) < 3 || strlen($username) > 20) {
    writeLog("Username length validation failed: " . strlen($username));
    echo json_encode([
        'success' => false,
        'message' => 'Username harus antara 3-20 karakter',
        'error_details' => 'Panjang username: ' . strlen($username)
    ]);
    exit;
}

if (strlen($password) < 6) {
    writeLog("Password length validation failed: " . strlen($password));
    echo json_encode([
        'success' => false,
        'message' => 'Password minimal 6 karakter',
        'error_details' => 'Panjang password: ' . strlen($password)
    ]);
    exit;
}

try {
    // Cek apakah username sudah ada
    writeLog("Checking if username exists...");
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    
    if ($stmt->rowCount() > 0) {
        writeLog("Username already exists: " . $username);
        echo json_encode([
            'success' => false,
            'message' => 'Username sudah digunakan',
            'error_details' => 'Username: ' . $username
        ]);
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    writeLog("Password hashed successfully");

    // Insert user baru
    writeLog("Attempting to insert new user...");
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);
    writeLog("User inserted successfully");

    echo json_encode([
        'success' => true,
        'message' => 'Registrasi berhasil'
    ]);

} catch(PDOException $e) {
    writeLog("Database error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
        'error_details' => $e->getMessage()
    ]);
}
?> 