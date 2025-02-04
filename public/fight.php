<?php
include_once '../utils/autoload.php';
session_start();
$monster = new Monster();
// Récupérer les informations du monstre
$type = $monster->getType();
$hp = $monster->getHp();
$attack = $monster->getAttack();
$skinPath = $monster->getSkinPath(); // Ajouter un getter pour récupérer le skinPath dans la classe Monster

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/style/style.css">
    <script defer src="./assets/scripts/fight.js"></script>
    <title>Document</title>
</head>

<body>
<header>
        <div> <img class=logo src="assets/images/logo4.webp" alt="">
        </div>

    </header>

    <main>
        <div id="fight">
            <h2>Vous êtes entré en combat contre : <?= htmlspecialchars($monster->getType()); ?></h2>
            <div id="fight-screen">
                <article>

                    <img src="<?= htmlspecialchars($hero->getSkinPath()); ?>" alt="<?= htmlspecialchars($hero->getName()); ?>">

                    <div>
                        <h2 id="hero-name">🦸 <?= htmlspecialchars($hero->getName()); ?></h2>
                        <div>
                            <p>❤️ <span id="hero-health"><?= htmlspecialchars($hero->getHp()); ?></span>/<?= htmlspecialchars($hero->getHp()); ?></p>
                            <p>⚔️ <span id="hero-attack"><?= htmlspecialchars($hero->getAttack()); ?></span></p>

                        </div>
                    </div>
                </article>
                <div>

                </div>

                <div id="combat-details">
                    <h2>VS</h2>
                    <p>Le combat commence !</p>
                </div>


                <article>
                    <img src="<?= htmlspecialchars($monster->getSkinPath())  ?>" alt="<?= htmlspecialchars($monster->getType()); ?>">
                    <div>
                        <h2 id="monster-name">👾 <?= htmlspecialchars($monster->getType()); ?></h2>
                        <div>
                            <p>❤️ <span id="monster-health"><?= htmlspecialchars($monster->getHp()); ?></span>/<?= htmlspecialchars($monster->getHp()); ?></span></p>
                            <p>⚔️ <span id="monster-attack"><?= htmlspecialchars($monster->getAttack()); ?></span></p>

                        </div>
                    </div>
                </article>
            </div>
            <div id=attacks class="">
                <button id="attack">Attaquer</button>
            </div>
            <div id="endFight" class="hidden">

                <form action="../process/process_fight.php" method="post">
                    <input id="heroHpInput" type="hidden" name="heroHpInput" value="">
                    <input type="submit" value="Fin du combat">
                </form>
            </div>
        </div>
    </main>
</body>

</html>