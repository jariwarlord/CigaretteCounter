<?php
function formatTime($time)
{
    $days = floor($time / (60 * 60 * 24));
    $hours = floor(($time % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($time % (60 * 60)) / 60);
    $seconds = $time % 60;

    return [
        'days' => $days,
        'hours' => $hours,
        'minutes' => $minutes,
        'seconds' => $seconds
    ];
}
?>
