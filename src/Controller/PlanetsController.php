<?php

namespace App\Controller;

class PlanetsController extends AbstractController
{

    public function index(){
        $planetscontroller = new PlanetsController();
        return $this->twig->render('/planets.html.twig');
    }

}
