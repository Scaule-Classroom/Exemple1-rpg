<?php 

Class Wall implements MapField{
    
    public function draw()
    {
        return '|';
    }

    public function iterate(Fighter $fighter, $x, $y)
    {
        // do nothing because user can't go there
        echo "You can't go there because it's a wall";

        return $this;
    }
}