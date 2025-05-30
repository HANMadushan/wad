<?php
session_start();
include "header.php";
include "../connection.php";
    if(isset($_POST["submit1"]))
    {
       mysqli_query($link,"insert into exam_category values(NULL,'$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));

    ?>
    <script type="text/javascript">
        alert("exam added successfully");
        <?php
    // Redirect to another page
        header("Location:exam_category.php");
        exit;
?>

        </script>
    <?php


    }

     ?>