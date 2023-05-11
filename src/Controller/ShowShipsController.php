<?php

namespace App\Controller;

use App\Model\ShipManager;

class ShowShipsController extends AbstractController
{
    public function showShip($id)
    {
        $ship = ShipManager::withID($id);

        var_dump($ship);
    }

    public function showAllShips()
    {
        $ships = ShipManager::AllShips();


        return $this->twig->render("showAllShips.html.twig", ["ships" => $ships]);
    }
}
