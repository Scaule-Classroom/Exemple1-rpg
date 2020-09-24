<?php

include_once ('MapField.php');
include_once ('Fighter.php');
include_once ('Grass.php');
include_once ('Map.php');
include_once ('Monster.php');
include_once ('Wall.php');
include_once ('Weapon.php');

$handler = fopen ("php://stdin","r");

$fighter = new Fighter();
echo "\033[31m some colored text \033[0m some white text \n";
$map = new Map($fighter);

while ($fighter->isAlive()){
    $map->displayMap();
    echo "\n\n -----------------------\n\n";
    echo "Go to ?\n 1) left \n 2) top \n 3) right \n 4) Bottom ";
    $direction = trim(fgets($handler));
    $newX = $fighter->getCoordX();
    $newY = $fighter->getCoordY();
    switch ((int) $direction) {
        case 1:
            if ($fighter->getCoordX() - 1 >= 0) {
                $newX = $fighter->getCoordX() - 1;
            } else {
                echo "\n\nyou can't go there\n\n";
                continue 2;
            }
            break;
        case 2:
            if ($fighter->getCoordY() - 1 >= 0) {
                $newY = $fighter->getCoordY() - 1;
            } else {
                echo "\n\nyou can't go there\n\n";
                continue 2;
            }
            break;
        case 3:
            if (($fighter->getCoordX() + 1) <= Map::SIZE) {
                $newX = $fighter->getCoordX() + 1;
            } else {
                echo "\n\nyou can't go there\n\n";
                continue 2;
            }
            break;
        case 4:
            if ($fighter->getCoordY() + 1 <= Map::SIZE) {
                $newY = $fighter->getCoordY() + 1;
            } else {
                echo "\n\nyou can't go there\n\n";
                continue 2;
            }
            break;
    }

    $map->iterate($newX, $newY);
    echo "\n New coord = [".$fighter->getCoordX()."][".$fighter->getCoordY()."]\n";
    echo "Your fighter pv is ".$fighter->getPv(). " \n";
}

echo "You are dead";

