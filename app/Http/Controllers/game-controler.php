<?php
require_once '../../../config/conn.php';
require_once '../../../config/config.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // Create a new game
    if ($action === 'create') {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $maker = $_POST['maker'];
        
        $query = "INSERT INTO games (naam, genre, maker) VALUES (:naam, :genre, :maker)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':naam', $title);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':maker', $maker);
        
        if ($stmt->execute()) {
            header("Location: " . $base_url . "/resources/views/games/games.php");
            exit();
        } else {
            // Handle error
            echo "Error creating game: " . implode(", ", $stmt->errorInfo());
        }
    } 
    // Update an existing game
    else if ($action === 'update') {
        // Get form data from the edit modal
        $id = $_POST['game_id'];
        $name = $_POST['game_name'];
        $genre = $_POST['game_genre'];
        $maker = $_POST['game_maker'];

        // Validate input
        if (empty($id) || empty($name) || empty($genre) || empty($maker)) {
            echo "All fields are required";
            exit();
        }

        // Update the game in the database
        $query = "UPDATE games SET Naam = :naam, Genre = :genre, Maker = :maker WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $name);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':maker', $maker);
        
        if ($stmt->execute()) {
            header("Location: " . $base_url . "/resources/views/games/games.php");
            exit();
        } else {
            // Handle error
            echo "Error updating game: " . implode(", ", $stmt->errorInfo());
        }
    }
    // Delete a game
    else if ($action === 'delete') {
        $id = $_POST['game_id'];
        
        // Validate input
        if (empty($id)) {
            echo "Game ID is required";
            exit();
        }
        
        $query = "DELETE FROM games WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        
        if ($stmt->execute()) {
            header("Location: " . $base_url . "/resources/views/games/games.php");
            exit();
        } else {
            // Handle error
            echo "Error deleting game: " . implode(", ", $stmt->errorInfo());
        }
    }
    // Handle invalid action
    else {
        echo "Invalid action";
        exit();
    }
} else {
    // Handle non-POST requests
    echo "Invalid request method";
    exit();
}
?>
