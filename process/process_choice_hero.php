<?php
require_once '../utils/autoload.php';


// VALIDATION DE FORMULAIRE

$heroRepository = new HeroRepository();
$hero = $heroRepository->findById($_POST['hero_id']);

if (!$hero) {
    header('Location: ../public/home.php');
    exit;
}








session_start();
$_SESSION['hero'] = $hero;

header('Location: ../public/fight.php');
exit;