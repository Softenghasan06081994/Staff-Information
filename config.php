<?php 

$db_record = "root";
$db_name = "staff_info";
$db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_record);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connection = mysqli_connect("localhost", "root","","staff_info");
?>
