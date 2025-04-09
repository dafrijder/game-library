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
                    <th>Actie</th>
                </tr>
                <?php foreach ($games as $game): ?>
                    <tr>
                        <td><?php echo $game['Naam']; ?></td>
                        <td><?php echo $game['Genre']; ?></td>
                        <td><?php echo $game['Maker']; ?></td>
                        <td><button class="edit-btn" data-id="<?php echo $game['id']; ?>">Aanpassen</button></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <!-- Modal for editing games -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Game aanpassen</h2>
            <form id="editGameForm" action="./app/Http/Controllers/game-controller.php" method="post">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="game_id" id="game_id">
                
                <div class="form-group">
                    <label for="game_name">Naam</label>
                    <input type="text" name="game_name" id="game_name" required>
                </div>
                
                <div class="form-group">
                    <label for="game_genre">Genre</label>
                    <input type="text" name="game_genre" id="game_genre" required>
                </div>
                
                <div class="form-group">
                    <label for="game_maker">Maker</label>
                    <input type="text" name="game_maker" id="game_maker" required>
                </div>
                
                <div class="form-group">
                    <input type="submit" value="Opslaan">
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("editModal");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // Get all edit buttons
        var editButtons = document.getElementsByClassName("edit-btn");
        
        // Add click event to all edit buttons
        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].onclick = function() {
                var gameId = this.getAttribute("data-id");
                document.getElementById("game_id").value = gameId;
                
                // Here you would typically fetch the game details via AJAX
                // For now, we'll just show the modal with empty fields
                // In a real implementation, you'd populate these fields with the game data
                
                modal.style.display = "block";
            }
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
