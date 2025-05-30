<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if (!isset($_SESSION["end_time"])) {
    echo "00:00:00"; 
} else {
    
    $current_time = strtotime(date("Y-m-d H:i:s")); 
    $end_time = strtotime($_SESSION["end_time"]); 
    $time_difference = $end_time - $current_time; 

    if ($time_difference <= 0) {
        echo "00:00:00"; 
    } else {
        
        echo gmdate("H:i:s", $time_difference);
    }
}
?>
