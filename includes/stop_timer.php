<?php
session_start();

if (!isset($_SESSION['start_time'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Timer is not running'
    ]);
    exit;
}

$elapsed_time = time() - $_SESSION['start_time'];

unset($_SESSION['start_time']);

echo json_encode([
    'status' => 'success',
    'message' => 'Timer stopped successfully',
    'elapsed_time' => $elapsed_time
]);
?>
