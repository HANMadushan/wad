<?php
session_start();
include "../connection.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 
    
    $query = "DELETE FROM exam_results WHERE id = $id"; 
    if (mysqli_query($link, $query)) {
        
        header("Location: old_exam_results.php"); 
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($link);
    }
} else {
    echo "No ID provided for deletion.";
}
?>
