<?php

namespace App\Controller;

class ShipController extends AbstractController
{
    public function index (){
        return $this->twig->render('ship.html.twig');
    }
}
