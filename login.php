<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public_html/css/login.css">
    <?php require_once __DIR__.'/config/config.php'; ?>
    <?php require_once __DIR__.'/resources/views/components/header.php'; ?>
    <title>login</title>
</head>
<body>
    <div class="wrapper">
        <div class="buttons">
            <button id="loginbutton">Login</button>
            <button id="signupbutton">Signup</button>
        </div>
        <div class="form-container">
            <form action="./app/Http/Controllers/login-controler.php" method="post" id="loginform">
                <h3>login</h3>
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="login">
                </div>
            </form>
            <form action="./app/Http/Controllers/login-controler.php" method="post" id="signupform">
                <h3>signup</h3>
                <input type="hidden" name="action" value="signup">
                <div class="form-group">
                    <label for="username">username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" value="signup">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="/public_html/js/main.js"></script>
</html>