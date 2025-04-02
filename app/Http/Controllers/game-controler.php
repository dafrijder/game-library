<?php
require_once '../../../config/conn.php';
if (isset($_POST['action']) && $_POST['action'] === 'create') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $maker = $_POST['maker'];
    
    $query = "INSERT INTO games (naam, genre, maker) VALUES (:naam, :genre, :maker)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':naam', $title);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':maker', $maker);
    $stmt->execute();
    header("Location: " . $base_url . "/resources/views/games/games.php");
}
?>