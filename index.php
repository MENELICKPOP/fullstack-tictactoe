<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Tic-Tac-Toe</title>
    <!-- Modern font for the glassmorphism UI -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="game-board">
            <h1>TIK-TAK-TO</h1>
            <div id="status">Player X's Turn</div>
            
            <div class="grid">
                <div class="cell" data-index="0"></div>
                <div class="cell" data-index="1"></div>
                <div class="cell" data-index="2"></div>
                <div class="cell" data-index="3"></div>
                <div class="cell" data-index="4"></div>
                <div class="cell" data-index="5"></div>
                <div class="cell" data-index="6"></div>
                <div class="cell" data-index="7"></div>
                <div class="cell" data-index="8"></div>
            </div>
            
            <button id="restartBtn">Restart Game</button>
        </div>

        <div class="history-panel">
            <h2>Recent Matches</h2>
            <ul>
                <?php
                $sql = "SELECT result, played_at FROM match_history ORDER BY id DESC LIMIT 5";
                $history = $conn->query($sql);

                if ($history && $history->num_rows > 0) {
                    while($row = $history->fetch_assoc()) {
                        $time = date("H:i", strtotime($row['played_at']));
                        echo "<li>Result: <strong>" . htmlspecialchars($row['result']) . "</strong> <span>($time)</span></li>";
                    }
                } else {
                    echo "<li>No games played yet.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>