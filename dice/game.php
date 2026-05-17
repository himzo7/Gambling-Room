<?php
session_start();
if (empty($_SESSION['uporabniki'])) {
    header('Location: login.php');
    exit;
}
$uporabniki = $_SESSION['uporabniki'];
$st_kock = $_SESSION['st_kock'] ?? 3;
$st_metov = $_SESSION['st_metov'] ?? 1;
$metanja = [];
$vsote = [];
for ($i = 0; $i < 3; $i++) {
    $vsota_igralca = 0;
    $kocke_igralca = [];
    for ($m = 0; $m < $st_metov; $m++) {
        $met = [];
        for ($k = 0; $k < $st_kock; $k++) {
            $n = rand(1, 6);
            $met[] = $n;
            $vsota_igralca += $n;
        }
        $kocke_igralca[] = $met;
    }
    $metanja[$i] = $kocke_igralca;
    $vsote[$i] = $vsota_igralca;
}
$najvec = max($vsote);
$lestvica = [];
for ($i = 0; $i < 3; $i++) {
    $lestvica[] = [
        'ime' => $uporabniki[$i]['ime'],
        'tocke' => $vsote[$i]
    ];
}
usort($lestvica, fn($a, $b) => $b['tocke'] <=> $a['tocke']);
$_SESSION['lestvica'] = $lestvica;
$_SESSION['najvec'] = $najvec;
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
        <h1>METANJE KOCK</h1>
        <p>KOCKE PADAJO — SREČA SE RAZKRIVA</p>
    </header>
    <div class="cards">
        <?php for ($i = 0; $i < 3; $i++): ?>
        <div class="card">
            <h2><?= $uporabniki[$i]['ime'] ?></h2>
            <div class="kocke">
                <?php foreach ($metanja[$i] as $met): ?>
                    <?php foreach ($met as $kocka): ?>
                    <div class="dice-wrap">
                        <img class="dice-anim" src="assets/dice-anim.gif">
                        <img class="dice-final" src="http://193.2.139.22/dice/dice<?= $kocka ?>.gif">
                    </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <div class="vsota"><?= $vsote[$i] ?></div>
        </div>
        <?php endfor; ?>
    </div>
    <div class="continue" id="continueBtn">
        <a href="results.php" class="btn">REZULTATI</a>
    </div>
</div>
<script>
(function () {
    var wraps = document.querySelectorAll('.dice-wrap');
    var SPIN_MS = 1600;
    var STAGGER = 220;
    wraps.forEach(function(w, idx) {
        setTimeout(function() {
            w.querySelector('.dice-anim').style.opacity = '0';
            w.querySelector('.dice-final').style.opacity = '1';
        }, SPIN_MS + idx * STAGGER);
    });
    var total = SPIN_MS + wraps.length * STAGGER + 400;
    setTimeout(function() {
        document.getElementById('continueBtn').classList.add('show');
    }, total);
})();
</script>
</body>
</html>
