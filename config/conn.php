<?php
require_once "config.php";

$conn = new pdo("mysql:host=$host;dbname=$database", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>