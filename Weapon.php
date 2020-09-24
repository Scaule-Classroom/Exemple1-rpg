<?php


class Weapon
{
    private $attack = 0;

    public function __construct()
    {
        $this->attack = mt_rand(-10,10);
    }

    public function draw()
    {
        return 'W';
    }

    public function iterate(Fighter $fighter, $x, $y)
    {
        echo "You take a weapon with ".$this->attack. " attack \n";
        $fighter->addWeapon($this->attack);
        $fighter->setCoord($x,$y);

        return new Grass();
    }
}