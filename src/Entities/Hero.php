<?php

final class Hero
{   private ?int $id;
    private string $name;
    private int $hp;
    private int $attack;
    private string $skinPath;


    public function __construct(?int $id, string $name, int $hp, int $attack, string $skinPath)
    {   
        $this->id = $id;
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->skinPath = $skinPath;
  
    }
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getName(): string
    {
        return $this->name;
    }

   /**
     * Get the value of hp
     */ 
    public function getHp(): int
    {
        return $this->hp;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }
    /**
     * Get the value of picturePath
     */
    public function getSkinPath(): string
    {
        return $this->skinPath;
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

  
   


}

  
