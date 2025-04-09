<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public_html/css/main.css">
    <?php require_once __DIR__ . '/../../../config/config.php'; ?>
</head>
<div class="wrapper">
    <header>
        <nav>
            <div class="navlinks">
                <a href="<?php echo $base_url; ?>/index.php">Home</a>
                <a href="<?php echo $base_url; ?>/resources/views/games/games.php">Games</a>
                <a href="<?php echo $base_url; ?>/resources/views/games/create.php">Create</a>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a>
                <?php else : ?>
                    <a href="<?php echo $base_url; ?>/login.php">Inloggen</a>
                <?php endif; ?>
            </div>
            <?php if (isset($_SESSION['user_id'])) : ?>
                <div class="user">
                    <p>Welkom <?php echo $_SESSION['user_id']; ?></p>
                </div>
            <?php endif; ?>
        </nav>
    </header>
</div>