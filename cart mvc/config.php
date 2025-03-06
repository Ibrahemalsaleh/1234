<?php

$db_host = "localhost"; // Or your database server name
$db_name = "cart"; // Your database name
$db_user = "root"; // Your database username
$db_password = ""; // Your database password

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_password);
    // Enable exception mode for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

?>