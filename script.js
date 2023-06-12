$(document).ready(function() {
    var timerInterval;

    function updateTimer() {
        var elapsedSeconds = <?php echo isset($_SESSION['start_time']) ? time() - $_SESSION['start_time'] : 0; ?>;
        var days = Math.floor(elapsedSeconds / (24 * 60 * 60));
        var hours = Math.floor((elapsedSeconds % (24 * 60 * 60)) / (60 * 60));
        var minutes = Math.floor((elapsedSeconds % (60 * 60)) / 60);
        var seconds = elapsedSeconds % 60;

        $('#days').text(days);
        $('#hours').text(hours);
        $('#minutes').text(minutes);
        $('#seconds').text(seconds);
    }

    function startTimer() {
        timerInterval = setInterval(updateTimer, 1000);
    }

    function stopTimer() {
        clearInterval(timerInterval);
    }

    $('#ignite-btn').on('click', function() {
        startTimer();
    });

    $('#stop-btn').on('click', function() {
        stopTimer();
    });
});
