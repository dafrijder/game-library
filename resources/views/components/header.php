<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public_html/css/main.css">
    <?php require_once __DIR__.'/../../../config/config.php'; ?>
</head>
<div class="wrapper">
    <header>
        <nav>
            <div class="navlinks">
                <a href="<?php echo $base_url; ?>/index.php">Home</a>
                <a href="<?php echo $base_url; ?>/public_html/views/games/games.php">Games</a>
                <a href="<?php echo $base_url; ?>/public_html/views/games/create.php">Create</a>
                <a href="<?php echo $base_url; ?>/login.php">login</a>
            </div>
        </nav>
    </header>
</div>