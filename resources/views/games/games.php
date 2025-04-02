<!DOCTYPE html>
<html lang="en">

<head>
    <title>Games</title>
</head>
<body>
    <!-- <?php require_once '/resources/views/components/header.php'; ?> -->
    <?php require_once __DIR__.'/../../../config/conn.php';
    $querry = "SELECT * FROM games";
    $result = mysqli_query($conn, $querry);
    $games = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    ?>
    
    <div class="wrapper">
        <table>
            <tr>
                <th>Naam</th>
                <th>Genre</th>
                <th>Maker</th>
                <th>Datum 'toegevoegd'</th>
            </tr>
            <?php foreach ($games as $game): ?>
                <tr>
                    <td><?php echo $game['naam']; ?></td>
                    <td><?php echo $game['genre']; ?></td>
                    <td><?php echo $game['maker']; ?></td>
                    <td><button id='edit'>Aanpassen</button></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>