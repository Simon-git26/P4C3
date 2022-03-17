<?php

// Instruction declare demandant a PHP d'etre exigeant avec le typage.
declare(strict_types=1);

// Déclarer une classe
class Pont
{
    // public, qui definit l'accessibilité de la propriété, float est le type de la propriété, et $longueur qui est le nom de ma propriété
    public float $longueur;
    public float $largeur;

    // On définit une fonction, rattaché a ma classe Pont, cette fonction devient donc une méthode de ma classe
    public function getSurface(): float
    {
        // l'Utilisation de $this est primordial car si je crée 2 instance ou plus de ma classe, alors c'est obligatoire pour fonctionner
        return $this->longueur * $this->largeur;
    }
}

// Instancier la classe 1
$towerBridge = new Pont;
// Assigner la valeur pour mon instance $pont
$towerBridge->longueur = 263.0;
$towerBridge->largeur = 15.0;


// Instancier la classe 2
$manhattanBridge = new Pont;
// Assigner la valeur pour mon instance $pont
$manhattanBridge->longueur = 2089.0;
$manhattanBridge->largeur = 36.6;




//Calculer la surface des 2 ponts
$towerBridgeSurface = $towerBridge->getSurface();
$manhattanBridgeSurface = $manhattanBridge->getSurface();

// var dump affiche les infos d'une variable, type et valeur
var_dump($towerBridgeSurface);
var_dump($manhattanBridgeSurface);
