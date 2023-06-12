<?php
session_start();

if (isset($_SESSION['start_time'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Timer is already running'
    ]);
    exit;
}

$_SESSION['start_time'] = time();

echo json_encode([
    'status' => 'success',
    'message' => 'Timer started successfully'
]);
?>
