<?php
$host = "localhost";
$user = "root";
$pass = ""; 
$db = "site_compras";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Lascou: " . $conn->connect_error);
}
?>
