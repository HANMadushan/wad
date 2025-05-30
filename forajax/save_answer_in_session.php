<?php
session_start();

$questionno = $_GET["questionno"];
$value1 = $_GET["value1"];

if (!isset($_SESSION["answer"][$questionno])) {
   
    $_SESSION["answer"][$questionno] = $value1;
}
?>
