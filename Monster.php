<?php 

Class Monster implements MapField{
    
    private $pv;
    private $attack;

    public function draw()
    {
        return 'M';
    }

    public function iterate(Fighter $fighter, $x, $y)
    {
        echo "You fight a monster \n";
        // fight between fighter and mob
        $fighter->setCoord($x,$y);
        while ($fighter->isAlive() and $this->isAlive()){
            $this->pv -= $fighter->getAttack();
            $fighter->isAttacked($this->attack);
        }

        return new Grass();
    }

    public function isAlive()
    {
        return $this->pv > 0;
    }
}