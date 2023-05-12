<?php

namespace App\Controller;

use App\Model\PlanetManager;
use App\Model\ShipManager;

class ShowPlanetsController extends AbstractController
{
    public function showPlanet($id)
    {
        $planet = PlanetManager::withID($id);
        $ships = ShipManager::allShips();

        return $this->twig->render('onePlanet/showOnePlanet.html.twig', ['planet' => $planet, 'ships' => $ships]);

        //var_dump($planet);
    }
    public function showAllPlanets()
    {
        //$planets = PlanetManager::AllPlanets();
        return $this->twig->render('planets.html.twig');
    }
}
