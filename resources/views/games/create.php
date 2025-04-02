<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $base_url . '/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <?php require_once __DIR__.'/../../../config/config.php'; ?>
    <?php require_once __DIR__.'/../components/header.php'; ?>
</head>
<body>
    <div class="wrapper">
        <h1>Create a game</h1>
        <form action="/./app/Http/Controllers/game-controler.php" method="post">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input type="text" name="genre" id="genre">
            </div>
            <div class="form-group">
                <label for="maker">maker</label>
                <input type="text" name="maker" id="maker">
            </div>
            <div class="form-group">
                <input type="submit" value="create">
            </div>
        </form>
    </div>
</body>
</html>