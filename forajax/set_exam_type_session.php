<?php
session_start();
include "../connection.php";


$exam_category = isset($_GET["exam_category"]) ? mysqli_real_escape_string($link, $_GET["exam_category"]) : '';

if (!empty($exam_category)) {
   
    $_SESSION["exam_category"] = $exam_category;

  
    $res = mysqli_query($link, "SELECT exam_time_in_minutes FROM exam_category WHERE category='$exam_category'");
    
    if ($row = mysqli_fetch_assoc($res)) {
       
        $_SESSION["exam_time"] = $row["exam_time_in_minutes"];

      
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y-m-d H:i:s");
        $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date . "+{$_SESSION['exam_time']} minutes"));
        $_SESSION["exam_start"] = "yes";
    } else {
       
        echo "Invalid exam category.";
    }
} else {
   
    echo "No exam category specified.";
}
?>
