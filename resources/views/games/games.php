<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: " . $base_url . "/../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Games</title>
    <link rel="stylesheet" href="../../../public_html/css/games.css">
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
                    <th colspan="2">Actie</th>
                </tr>
                <?php foreach ($games as $game): ?>
                    <tr>
                        <td><?php echo $game['Naam']; ?></td>
                        <td><?php echo $game['Genre']; ?></td>
                        <td><?php echo $game['Maker']; ?></td>
                        <td>
                            <button class="edit-btn" 
                                    data-id="<?php echo $game['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($game['Naam']); ?>"
                                    data-genre="<?php echo htmlspecialchars($game['Genre']); ?>"
                                    data-maker="<?php echo htmlspecialchars($game['Maker']); ?>">
                                Aanpassen
                            </button>
                        </td>
                        <td>
                            <button class="delete-btn" 
                                    data-id="<?php echo $game['id']; ?>"
                                    data-name="<?php echo htmlspecialchars($game['Naam']); ?>">
                                Verwijderen
                            </button>
                        </td>
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
            <form id="editGameForm" action="<?php echo $base_url; ?>/app/Http/Controllers/game-controler.php" method="post">
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

    <!-- Modal for deleting games -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close-delete">&times;</span>
            <h2>Game verwijderen</h2>
            <p>Weet je zeker dat je <span id="delete-game-name"></span> wilt verwijderen?</p>
            <form id="deleteGameForm" action="<?php echo $base_url; ?>/app/Http/Controllers/game-controler.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="game_id" id="delete_game_id">
                
                <div class="form-group delete-buttons">
                    <button type="button" id="cancel-delete">Annuleren</button>
                    <input type="submit" value="Verwijderen" class="delete-confirm">
                </div>
            </form>
        </div>
    </div>

    <script>
        // Edit Modal functionality
        var editModal = document.getElementById("editModal");
        var editSpan = editModal.querySelector(".close");
        var editButtons = document.getElementsByClassName("edit-btn");
        
        for (var i = 0; i < editButtons.length; i++) {
            editButtons[i].onclick = function() {
                var gameId = this.getAttribute("data-id");
                var gameName = this.getAttribute("data-name");
                var gameGenre = this.getAttribute("data-genre");
                var gameMaker = this.getAttribute("data-maker");
                
                document.getElementById("game_id").value = gameId;
                document.getElementById("game_name").value = gameName;
                document.getElementById("game_genre").value = gameGenre;
                document.getElementById("game_maker").value = gameMaker;
                
                editModal.style.display = "block";
            }
        }
        
        editSpan.onclick = function() {
            editModal.style.display = "none";
        }
        
        // Delete Modal functionality
        var deleteModal = document.getElementById("deleteModal");
        var deleteSpan = deleteModal.querySelector(".close-delete");
        var deleteButtons = document.getElementsByClassName("delete-btn");
        var cancelDelete = document.getElementById("cancel-delete");
        
        for (var i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].onclick = function() {
                var gameId = this.getAttribute("data-id");
                var gameName = this.getAttribute("data-name");
                
                document.getElementById("delete_game_id").value = gameId;
                document.getElementById("delete-game-name").textContent = gameName;
                
                deleteModal.style.display = "block";
            }
        }
        
        deleteSpan.onclick = function() {
            deleteModal.style.display = "none";
        }
        
        cancelDelete.onclick = function() {
            deleteModal.style.display = "none";
        }
        
        // Close modals when clicking outside
        window.onclick = function(event) {
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }
    </script>
</body>

</html>
         