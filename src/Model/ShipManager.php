<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class ShipManager extends AbstractManager
{
    public const TABLE = 'ship';
    public int $id;
    public string $model;
    public string $costInCredits;
    public int $hyperDriveRating;
    public string $crew;
    public string $passengers;
    public string $cargoCapacity;
    public string $picturePath;

    public function __construct(array $shipData)
    {
        $this->id = $shipData["id"];
        $this->model = $shipData["model"];
        $this->costInCredits = $shipData["cost_in_credits"];
        $this->hyperDriveRating = $shipData["hyperdrive_rating"];
        $this->crew = $shipData["crew"];
        $this->passengers = $shipData["passengers"];
        $this->cargoCapacity = $shipData["cargo_capacity"];
        $this->picturePath = $shipData["picturePath"];
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

    public static function allShips()
    {
        $connection = new Connection();
        $pdo = $connection->getConnection();

        $statement = $pdo->query("SELECT * FROM " . self::TABLE);

        $ships = [];

        foreach ($statement->fetchAll() as $ship) {
            $ships[] = new self($ship);
        }

        return $ships;
    }
}
