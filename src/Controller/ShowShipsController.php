<?php

namespace App\Controller;

use App\Model\ShipManager;

class ShowShipsController extends AbstractController
{
    public function showShip($id)
    {
        $ship = ShipManager::withID($id);
        return $this->twig->render("ship.html.twig", ['ship' => $ship]);
    }

    public function showAllShips()
    {
        $ships = ShipManager::AllShips();

        var_dump($ships);
    }
}
