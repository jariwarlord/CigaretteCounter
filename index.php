<?php
session_start();

// Check if the timer is running
if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
} else {
    $elapsed_time = 0;
}

// Format the elapsed time in weeks, days, hours, minutes, and seconds
function formatTime($time) {
    $weeks = floor($time / (7 * 24 * 60 * 60));
    $days = floor(($time % (7 * 24 * 60 * 60)) / (24 * 60 * 60));
    $hours = floor(($time % (24 * 60 * 60)) / (60 * 60));
    $minutes = floor(($time % (60 * 60)) / 60);
    $seconds = $time % 60;

    return sprintf('%d weeks, %d days, %d hours, %d minutes, %d seconds', $weeks, $days, $hours, $minutes, $seconds);
}

// Check if the Ignite button is clicked
if (isset($_POST['ignite'])) {
    // Start the timer by setting the start time only if it is not already running
    if (!isset($_SESSION['start_time'])) {
        $_SESSION['start_time'] = time();
    }
}

// Check if the Stop button is clicked
if (isset($_POST['stop'])) {
    // Check if the timer is running
    if (isset($_SESSION['start_time'])) {
        // Unset the start time to stop the timer
        unset($_SESSION['start_time']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cigarette Counter</title>
    <style>
        body {
            background: url(images/image2.jpg) no-repeat center center fixed;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to update the timer display
        function updateTimer() {
            // Make an AJAX request to get the elapsed time from the server
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Update the timer element with the received elapsed time
                        document.getElementById('timer').textContent = xhr.responseText;
                    }
                }
            };
            xhr.open('GET', 'get_elapsed_time.php', true);
            xhr.send();
        }

        // Update the timer every second
        setInterval(updateTimer, 1000);
    </script>
</head>
<body style="background-image: url(images/image2.jpg); background-size: cover; background-position: center; background-repeat: no-repeat;">
<div class="container">
        <?php if (isset($_SESSION['start_time'])) : ?>
            <h1>Timer is running...</h1>
            <h2>Time without smoking: <?php echo formatTime($elapsed_time); ?></h2>
            <form method="POST">
                <button type="submit" name="stop">Stop</button>
            </form>
        <?php else : ?>
            <h1>Do you want to Stop Smoking?</h1>
            <form method="POST">
                <button type="submit" name="ignite">Ignite</button>
            </form>
        <?php endif; ?>
    </div>  
</body>
</html>
