<?php


final class HeroRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct();
    }


    public function findById(int $id): ?Hero
    {
        $sql = 'SELECT * FROM hero WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $heroData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$heroData) {
            return null;
        }

        return HeroMapper::MapToObject($heroData);
    }
    
    public function findAll(): array
    {
        $sql = "SELECT * FROM hero";
        $stmt = $this->pdo->query($sql);
        $heroDatas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $heroes = [];

        foreach($heroDatas as $heroData){
            $heroes[] = HeroMapper::mapToObject($heroData);
        }

        return $heroes;
    }




    public function creerHero(Hero $hero)
    {
        $sql = "INSERT INTO hero (`name`, `hp`, `attack`, `skin_path`) VALUES (:name, :hp, :attack, :skin_path)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $hero->getName(),
            ':hp' => $hero->getHp(),
            ':attack' => $hero->getAttack(),
            ':skin_path' => $hero->getSkinPath()
        ]);
        $hero->getId();
    }


    public function updateHero(Hero $hero)
    {
        $sql = "UPDATE `hero` SET `hp`= :hp  WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':hp' => $hero->getHp(),
            ':id' => $hero->getId(),
        ]);
    }
}
