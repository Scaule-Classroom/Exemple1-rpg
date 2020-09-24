<?php 

Class Grass implements MapField{

    public function draw()
    {
        return ' ';
    }

    public function iterate(Fighter $fighter, $x, $y)
    {
        echo "You walk on Grass safely \n";
        // fight between fighter and mob
        $fighter->setCoord($x,$y);

        return $this;
    }
}