<?php
$servername = "localhost";
$username = "root";
$password = "111";
$port = "3307";

try {
    $conn = new PDO("mysql:host=$servername;dbname=btth01_cse485;port=$port", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>