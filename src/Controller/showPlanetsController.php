<?php

namespace App\Controller;

class showPlanetsController extends AbstractController
{

    public function showAllPlanets(){
        $planetscontroller = new showPlanetsController();
        return $this->twig->render('/planets.html.twig');
    }

}
