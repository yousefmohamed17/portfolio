<?php
$link = mysqli_connect("localhost", "root", "", "db.php");
if(!$link){
    echo "Connection failed: " . PHP_EQL;
    exit;
}
?>