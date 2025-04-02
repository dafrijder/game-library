<!DOCTYPE html>
<html lang="en">

<head>
    <title>Games</title>
</head>

<body>
    <?php require_once __DIR__ . '/../../../resources/views/components/header.php'; ?>

    <?php require_once __DIR__ . '/../../../config/conn.php';
    $querry = "SELECT * FROM games";
    $statement = $conn->prepare($querry);
    $statement->execute();
    $games = $statement->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="wrapper">
        <div class="container">
            <h2>Games</h2>
            <table>
                <tr>
                    <th>Naam</th>
                    <th>Genre</th>
                    <th>Maker</th>
                    <th>Datum 'toegevoegd'</th>
                </tr>
                <?php foreach ($games as $game): ?>
                    <tr>
                        <td><?php echo $game['Naam']; ?></td>
                        <td><?php echo $game['Genre']; ?></td>
                        <td><?php echo $game['Maker']; ?></td>
                        <td><button id='edit'>Aanpassen</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>