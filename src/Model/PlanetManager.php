<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class PlanetManager extends AbstractManager
{
    public const TABLE = 'planet';
    public int $id;
    public string $name;
    public string $description;
    public int $distanceFromEarth;
    public string $picturePath;

    public function __construct(array $planetData)
    {
        $this->id = $planetData["id"];
        $this->name = $planetData["name"];
        $this->description = $planetData["description"];
        $this->distanceFromEarth = $planetData["distance_from_earth"];
        $this->picturePath = $planetData["picturePath"];
    }

    public static function withID($id)
    {
        $connection = new Connection();
        $pdo = $connection->getConnection();

        $query = "SELECT * FROM " . self::TABLE . " WHERE id = :id";
        $statement = $pdo->prepare($query);
        $statement->bindValue(":id", $id, PDO::PARAM_INT);

        $statement->execute();

        return new self($statement->fetch());
    }

    public static function allPlanets()
    {
        $connection = new Connection();
        $pdo = $connection->getConnection();

        $statement = $pdo->query("SELECT * FROM " . self::TABLE);

        $planets = [];

        foreach ($statement->fetchAll() as $planet) {
            $planets[] = new self($planet);
        }

        return $planets;
    }
}
