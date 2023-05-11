<?php

namespace App\Model;

use PDO;
use App\Model\AbstractManager;

class PopulateDBManager extends AbstractManager
{
    public function insertShips(array $shipData)
    {
        $query = "INSERT INTO ship (
        model, 
        cost_in_credits, 
        hyperdrive_rating, 
        crew, 
        passengers, 
        cargo_capacity, 
        picturePath
        ) VALUES ( 
        :model,
        :cost_in_credits,
        :hyperdrive_rating,
        :crew,
        :passengers,
        :cargo_capacity,
        :picturePath
        )";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(":model", $shipData["model"], PDO::PARAM_STR);
        $statement->bindValue(":cost_in_credits", $shipData["cost_in_credits"], PDO::PARAM_INT);
        $statement->bindValue(":hyperdrive_rating", $shipData["hyperdrive_rating"], PDO::PARAM_STR);
        $statement->bindValue(":crew", $shipData["crew"], PDO::PARAM_INT);
        $statement->bindValue(":passengers", $shipData["passengers"], PDO::PARAM_INT);
        $statement->bindValue(":cargo_capacity", $shipData["cargo_capacity"], PDO::PARAM_INT);
        $statement->bindValue(":picturePath", $shipData["picturePath"], PDO::PARAM_STR);

        $statement->execute();
    }

    public function insertPlanets(array $planetData)
    {
        $query = "INSERT INTO planet (
            name, 
            description, 
            distance_from_earth, 
            picturePath 
            ) VALUES ( 
            :name, 
            :description, 
            :distance_from_earth, 
            :picturePath 
            )";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(":name", $planetData["name"], PDO::PARAM_STR);
        $statement->bindValue(":description", $planetData["description"], PDO::PARAM_STR);
        $statement->bindValue(":distance_from_earth", $planetData["distance_from_earth"], PDO::PARAM_INT);
        $statement->bindValue(":picturePath", $planetData["picturePath"], PDO::PARAM_STR);

        $statement->execute();
    }


    public function insertShipPlanets(int $shipID, int $planetID)
    {
        $query = "INSERT INTO ship_planet (
            ship_id, 
            planet_id
            ) VALUES ( 
            :ship_id, 
            :planet_id
            )";

        $statement = $this->pdo->prepare($query);

        $statement->bindValue(":ship_id", $shipID, PDO::PARAM_STR);
        $statement->bindValue(":planet_id", $planetID, PDO::PARAM_STR);

        $statement->execute();
    }
}
