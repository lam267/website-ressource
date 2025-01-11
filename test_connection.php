<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "sql100.infinityfree.com";
$username = "if0_38076571";
$password = "xBzJOshkuGIzlr";
$dbname = "if0_38076571_db_ressource";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
echo "Kết nối thành công!";
$conn->close();
?>
