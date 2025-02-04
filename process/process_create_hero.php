<?php 
include_once '../utils/autoload.php';

// validation du formulaire à faire ici 

// 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    return;
}

if (
    !isset(
        $_POST['hero_name'],
        $_POST['hero_hp'],
        $_POST['hero_attack'],
        $_POST['hero_avatar']

    )
) {
    header('location: ../index.php');
    return;
}


$heroName = htmlspecialchars(trim($_POST['hero_name']));
$heroHp = (int)$_POST['hero_hp'];  
$heroAttack = (int)$_POST['hero_attack'];  
$heroAvatar = htmlspecialchars(trim($_POST['hero_avatar']));
$id= null;
$imagePath = $heroAvatar;

if (
    strlen($_POST['hero_name']) > 100 || $heroHp <= 0 || $heroAttack <= 0
    )

 {
    header('location: ../index.php');
    return;
}


session_start();

$heroRepository = new HeroRepository();

    $hero = new Hero($id, $heroName, $heroHp, $heroAttack, $imagePath);
    $_SESSION['hero'] = $hero;
    $heroRepository->creerHero($hero);
  

    
header('location: ../public/fight.php');
exit;



