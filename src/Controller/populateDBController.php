<?php

namespace APP\Controller;

use App\Controller\AbstractController;
use App\Model\PopulateDBManager;

class PopulateDBController extends AbstractController
{
    public function populateDB()
    {
        $this->addShips();
        $this->addPlanets();
        $this->assignShipToPlanet();
    }
    public function addShips()
    {
        $jsonDecoderManager = new populateDBManager();
        //$jsonDecodermanager->test();

        $jsonData = file_get_contents("../ships.json");
        $jsonDecoded = json_decode($jsonData, true);

        foreach ($jsonDecoded["results"] as $ship) {
            $jsonDecoderManager->insertShips($ship);
            //var_dump($ship);
        }
    }

    public function addPlanets()
    {
        $planets = [
            "mars" => [
                "name" => "mars",
                "description" => "Mars is the fourth planet and 
                the furthest terrestrial planet from the Sun.
                The reason Mars has a red color on its surface 
                is due to the finely-grained iron(III) oxide dust in the soil, 
                which give rise to its nickname, 'the Red Planet'. 
                There is a drastic contrast between the two Martian hemispheres: 
                the northern hemisphere is on average flatter and 
                smoother than the southern hemisphere. 
                The planet's two poles are covered by water 
                and carbon dioxide ice caps. 
                Surrounding the Martian surface is a dynamic thin atmosphere 
                (1% of Earth's surface pressure), 
                made primarily of carbon dioxide. Mars has two 
                irregularly shaped natural satellites, Phobos and Deimos.",
                "distance_from_earth" => 275000000,
                "picturePath" => "/assets/images/mars.png"
            ],

            "venus" => [
                "name" => "venus",
                "description" => "Venus is the second planet from the Sun. 
                It is a rocky planet with a mass and size narrowly second
                in the Solar System to Earth, and with an atmosphere, 
                which is the thickest of all four rocky planets of the Solar System
                and substantially thicker than Earth's. Its orbit is the 
                next closest to Earth's, orbiting the Sun inferior inside of Earth's orbit,
                appearing (like Mercury) in Earth's sky always close to the 
                Sun as either a 'morning star' or 'evening star'. 
                In Earth's sky it is also the natural object with the third 
                highest maximum apparent brightness, after the Sun and the Moon, 
                due to its proximity to Earth and the Sun, its size, and its 
                highly reflective global cloud cover. Because of these 
                prominent appearances in Earth's sky, 
                Venus has been, particularly among the other four 
                star-like classical planets, a common and important 
                object for humans, their cultures and astronomy.",
                "distance_from_earth" => 41000000,
                "picturePath" => "/assets/images/venus.png"
            ],

            "mercury" => [
                "name" => "mercure",
                "description" => "Mercury is the first planet 
                from the Sun and the smallest planet in the Solar System. 
                It is a terrestrial planet with a heavily cratered surface 
                due to the planet having no geological activity and an extremely 
                tenuous atmosphere (called an exosphere). Despite being 
                the smallest planet in the Solar System with a mean diameter 
                of 4,880 km (3,030 mi), 38% of that of Earth's, Mercury is 
                dense enough to have roughly the same surface gravity as Mars. 
                Mercury has a dynamic magnetic field with a strength 
                about 1% of that of Earth's and has no natural satellites.",
                "distance_from_earth" => 92000000,
                "picturePath" => "/assets/images/mercure.png"
            ]
        ];

        $jsonDecoderManager = new populateDBManager();

        foreach ($planets as $planet) {
            $jsonDecoderManager->insertPlanets($planet);
        }
    }

    public function assignShipToPlanet()
    {
        $shipPlanet = [
            1 => [2, 3],
            2 => [1, 3],
            3 => [1, 2],
            4 => [1, 2],
            5 => [1, 3],
            6 => [2, 3],
        ];

        $jsonDecoderManager = new populateDBManager();

        foreach ($shipPlanet as $shipID => $planets) {
            foreach ($planets as $planetID) {
                $jsonDecoderManager->insertShipPlanets($shipID, $planetID);
            }
        }
    }
}
