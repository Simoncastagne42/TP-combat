
<?php

require_once '../utils/autoload.php';

session_start();

/**
 * @var Hero $hero
 */
$hero = $_SESSION['hero'];

$hero->setHp($_POST['heroHpInput']);

$heroRepo = new HeroRepository();
$heroRepo->updateHero($hero);

// Faire la redirection
header('location: ../public/fight.php');