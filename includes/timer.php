<?php

session_start();
include('includes/functions.php');

if (isset($_SESSION['start_time'])) {
    $start_time = $_SESSION['start_time'];
    $current_time = time();
    $elapsed_time = $current_time - $start_time;
} else {
    $elapsed_time = 0;
}

$response = [
    'timer' => formatTime($elapsed_time)
];

echo json_encode($response);
?>
