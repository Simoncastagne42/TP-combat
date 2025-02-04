<?php

require_once '../utils/autoload.php';

$heroRepository = new HeroRepository();
$heroes = $heroRepository->findAll();

if (!$heroes) {
    header("Location: ./home.php");
    exit;
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style/style.css">
    <script defer src="./assets/scripts/avatar.js"></script>
</head>

<body>

    <header>
        <div> <img class=logo src="assets/images/logo4.webp" alt="">
        </div>

    </header>

    <main>
        <div class="hero-choice">

            <section class="character-selection">
                <h2>Choisissez votre héros</h2>
                <div class="cards-container">
                    <?php foreach ($heroes as $hero): ?>
                        <form action="../process/process_choice_hero.php" method="post" class="character-card-form">
                            <button type="submit" class="character-card">
                                <img src="<?= htmlspecialchars($hero->getSkinPath()); ?>" alt="<?= htmlspecialchars($hero->getName()); ?>">
                                <div class="character-details">
                                    <h3><?= htmlspecialchars($hero->getName()); ?></h3>
                                    <div class="character-stats">
                                        <p>❤️ <?= htmlspecialchars($hero->getHp()); ?> PV</p>
                                        <p>⚔️ <?= htmlspecialchars($hero->getAttack()); ?> Attaque</p>
                                    </div>
                                    <input type="hidden" name="hero_id" value="<?= htmlspecialchars($hero->getId()); ?>">
                            </button>
                        </form>
                    <?php endforeach; ?>



            </section>


            <section class="character-creation">
                <h2>Créer un nouveau héros</h2>
                <form action="../process/process_create_hero.php" method="post" enctype="multipart/form-data" class="create-hero-form">
                    <div>
                        <label for="hero-name">Nom du héros :</label>
                        <input type="text" id="hero-name" name="hero_name" required>
                    </div>
                    <div>
                        <label for="hero-hp">❤️ PV :</label>
                        <input type="number" id="hero-hp" name="hero_hp" min="1" required>
                    </div>
                    <div>
                        <label for="hero-attack">⚔️ Attaque :</label>
                        <input type="number" id="hero-attack" name="hero_attack" min="1" required>
                    </div>
                    <div>
                        <label for="hero-avatar">Choisissez un avatar :</label>
                        <select id="hero-avatar" name="hero_avatar" class="avatar-dropdown" required>
                            <option value="./assets/images/guerrier.webp" data-image="./assets/images/guerrier.webp">Guerrier</option>
                            <option value="./assets/images/samourai.webp" data-image="./assets/images/samourai.webp">Samourai</option>
                            <option value="./assets/images/titan.webp" data-image="./assets/images/titan.webp">Titan</option>
                            <option value="./assets/images/Ombra.webp" data-image="./assets/images/Ombra.webp">Guerrier lunaire</option>
                            <option value="./assets/images/Frostclaw.webp" data-image="./assets/images/Frostclaw.webp">Frostclaw</option>
                            <option value="./assets/images/phenix.webp" data-image="./assets/images/phenix.webp">Phénix</option>
                        </select>
                    </div>
                    <div id="avatar-preview">
                        <img src="./assets/images/guerrier.webp" alt="Aperçu de l'avatar" id="avatar-image-preview">
                    </div>
                    <div>
                        <button type="submit" class="submit-button">Créer le héros</button>
                    </div>
                </form>
            </section>

        </div>
    </main>



</body>

</html>