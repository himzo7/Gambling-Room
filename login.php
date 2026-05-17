<?php
session_start();

if (isset($_GET['reset'])) {
    session_destroy();
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['igraj'])) {
    $st_kock = max(1, min(5, (int)$_POST['st_kock']));
    $st_metov = max(1, min(5, (int)$_POST['st_metov']));

    $uporabniki = [];

    for ($i = 0; $i < 3; $i++) {
        $uporabniki[$i] = [
            'ime' => htmlspecialchars(trim($_POST['ime'][$i]))
        ];
    }

    $_SESSION['uporabniki'] = $uporabniki;
    $_SESSION['st_kock'] = $st_kock;
    $_SESSION['st_metov'] = $st_metov;

    header('Location: game.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kocke</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrapper">
    <header>
        <h1>KOCKE</h1>
        <p>SREČA SE MEČE — KDO BO ZMAGAL?</p>
    </header>
    <form method="POST" action="login.php">
        <div class="nastavitve">
            <label>
                ŠTEVILO KOCK
                <input type="number" name="st_kock" value="3" min="1" max="5">
            </label>
            <label>
                ŠTEVILO METOV
                <input type="number" name="st_metov" value="1" min="1" max="5">
            </label>
        </div>
        <div class="cards">
            <?php for ($n = 1; $n <= 3; $n++): ?>
            <div class="card">
                <h2>IGRALEC <?= $n ?></h2>
                <input type="text" name="ime[]" placeholder="Ime" required>
            </div>
            <?php endfor; ?>
        </div>
        <div class="center-btn">
            <button type="submit" name="igraj" class="btn">
                VRŽI KOCKE
            </button>
        </div>
    </form>
</div>
</body>
</html>
