<?php
require_once __DIR__.'/../../../config/conn.php';
$action = $_POST['action'];

if($action == 'signup'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    header("Location: $base_url/login.php");
}
else if($action == 'login'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && password_verify($password, $user['password'])){
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: $base_url/index.php");
    }
    else{
        echo "Invalid username or password";
    }
}
?>