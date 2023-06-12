<!DOCTYPE html>
<html>
<head>
    <title>Cigarette Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
    <div class="container">
        <h1>Cigarette Counter</h1>
        <div class="timer">
            <span id="days">0</span> days,
            <span id="hours">0</span> hours,
            <span id="minutes">0</span> minutes,
            <span id="seconds">0</span> seconds
        </div>
        <div class="buttons">
            <button id="ignite-btn" onclick="startTimer()">Ignite</button>
            <button id="stop-btn" onclick="stopTimer()">Stop</button>
        </div>
    </div>

    <script>
        function startTimer() {
            $.ajax({
                url: 'start_timer.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while starting the timer.');
                }
            });
        }

        function stopTimer() {
            $.ajax({
                url: 'stop_timer.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function() {
                    alert('An error occurred while stopping the timer.');
                }
            });
        }
    </script>
</body>
</html>
