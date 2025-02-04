<?php

final class Monster
{
    private string $type;
    private int $hp;
    private int $attack;
    private string $skinPath;

    public function __construct()
    {
         // Génération aléatoire du type
         $this->setRandomType();

         // Génération des statistiques en fonction du type
         $this->generateHpByType();
         $this->generateAttackByType();
         $this->generateSkinByType();
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getHp(): int
    {
        return $this->hp;
    }
    
    public function getAttack()
    {
        return $this->attack;
    }

    public function getSkinPath()
    {
        return $this->skinPath;
    }

    public function setRandomType()
    {
        $randomNumber = rand(1, 20);
        $types = ["Gobelin", "Dragon", "Golem", "Kraken", "Vampire"];
        
        if ($randomNumber <= 2) {
            $this->type = $types[1]; // Dragon
        } elseif ($randomNumber <= 4) {
            $this->type = $types[3]; // Kraken
        } elseif ($randomNumber <= 9) {
            $this->type = $types[2]; // Golem
        } elseif ($randomNumber <= 15) {
            $this->type = $types[0]; // Gobelin
        } else {
            $this->type = $types[4]; // Vampire
        }

        return $this->type;
    }


   /**
     * Set the value of hp
     *
     * @return  self
     */ 
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Set the value of damage en fonction du type
     *
     * @return  self
     */
    public function generateAttackByType()
    {
        switch ($this->type) {
            case "Gobelin":
                $this->attack = 25;
                break;
            case "Dragon":
                $this->attack = 70;
                break;
            case "Golem":
                $this->attack = 30;
                break;
            case "Kraken":
                $this->attack = 70;
                break;
            case "Vampire":
                $this->attack = 45;
                break;
        }
    }

      /**
     * Set the value of HP en fonction du type
     *
     * @return  self
     */
    public function generateHpByType()
    {
        switch ($this->type) {
            case "Gobelin":
                $this->hp = 100;
                break;
            case "Dragon":
                $this->hp = 250;
                break;
            case "Golem":
                $this->hp = 130;
                break;
            case "Kraken":
                $this->hp = 280;
                break;
            case "Vampire":
                $this->hp = 180;
                break;
        }
    }

    public function generateSkinByType()
    {
        switch ($this->type) {
            case "Gobelin":
                $this->skinPath = "./assets/images/gobelin.webp";
                break;
            case "Dragon":
                $this->skinPath = "./assets/images/dragon.webp";
                break;
            case "Golem":
                $this->skinPath = "./assets/images/golem.webp";
                break;
            case "Kraken":
                $this->skinPath = "./assets/images/kraken.webp";
                break;
            case "Vampire":
                $this->skinPath = "./assets/images/vampire.webp";
                break;
        }
    }
    public function hit(Hero $target): void
    {
        $damage = $this->attack ;

        // Aura moins de 0 de vie après l'attack on lui met 0
        if ($target->getHp() - $damage <= 0) {
            $target->setHp(0);
        } else {
            $target->setHp($target->getHp() - $damage );
        }
    }

}



