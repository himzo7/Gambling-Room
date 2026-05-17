<?php
session_start();

if (empty($_SESSION['lestvica'])) {
    header('Location: login.php');
    exit;
}

$lestvica = $_SESSION['lestvica'];
$najvec = $_SESSION['najvec'];

$podium = [
    isset($lestvica[1]) ? $lestvica[1] : null,
    $lestvica[0],
    isset($lestvica[2]) ? $lestvica[2] : null
];

$zmagovalci = array_filter(
    $lestvica,
    fn($p) => $p['tocke'] == $najvec
);
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
<div class="fireworks"></div>
<div class="wrapper">
    <header>
        <h1>REZULTATI</h1>
        <p>KOCKE SO PADLE — ZMAGOVALEC JE ZNAN</p>
    </header>
    <div class="podium">
        <?php if ($podium[0]): ?>
        <div class="podium-col">
            <div class="podium-player">
                <h3>
                    <img src="https://cdn-icons-png.flaticon.com/512/2583/2583319.png" class="icon">
                    <?= htmlspecialchars($podium[0]['ime']) ?>
                </h3>
                <p><?= $podium[0]['tocke'] ?></p>
            </div>
            <div class="podium-block silver">2</div>
        </div>
        <?php endif; ?>
        <div class="podium-col">
            <div class="podium-player">
                <h3>
                    <img src="https://cdn-icons-png.flaticon.com/512/2583/2583344.png" class="icon">
                    <?= htmlspecialchars($podium[1]['ime']) ?>
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616490.png" class="crown">
                </h3>
                <p><?= $podium[1]['tocke'] ?></p>
            </div>
            <div class="podium-block gold">1</div>
        </div>
        <?php if ($podium[2]): ?>
        <div class="podium-col">
            <div class="podium-player">
                <h3>
                    <img src="https://cdn-icons-png.flaticon.com/512/2583/2583434.png" class="icon">
                    <?= htmlspecialchars($podium[2]['ime']) ?>
                </h3>
                <p><?= $podium[2]['tocke'] ?></p>
            </div>
            <div class="podium-block bronze">3</div>
        </div>
        <?php endif; ?>
    </div>
    <div class="timer">
        <img src="https://cdn-icons-png.flaticon.com/512/3112/3112946.png" class="trophy">
        ZMAGOVALEC:
        <?= implode(' & ', array_map(fn($p) => htmlspecialchars($p['ime']), $zmagovalci)) ?>
        <br><br>
        PREUSMERITEV ČEZ
        <span id="sec">10</span>
        SEKUND
    </div>
</div>
<script>
var count = 10;
var sec = document.getElementById('sec');
var timer = setInterval(function(){
    count--;
    sec.textContent = count;
    if(count <= 0){
        clearInterval(timer);
        window.location.href = 'login.php?reset=1';
    }
},1000);
</script>
</body>
</html>
