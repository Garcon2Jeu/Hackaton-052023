<?php

namespace App\Controller;

use App\Model\PlanetManager;

class ShowPlanetsController extends AbstractController
{
    public function showPlanet($id)
    {
        $planet = PlanetManager::withID($id);

        var_dump($planet);
    }

    public function showAllPlanets()
    {
        $planets = PlanetManager::AllPlanets();

        var_dump($planets);
    }
}
