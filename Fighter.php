<?php 

Class Fighter{

    private $pv;
    private $attack;
    private $coordX = 0;
    private $coordY = 0;

    public function __construct()
    {
        $this->pv = mt_rand(0, 30);
    }

    public function isAlive(){
        return $this->pv > 0;
    }

    public function setCoord($x, $y)
    {
        $this->coordX = $x;
        $this->coordY = $y;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function isAttacked($attack)
    {
        $this->pv -= $attack;
    }

    public function addWeapon($attack)
    {
        $this->attack += $attack;
    }

    /**
     * @return int
     */
    public function getCoordX()
    {
        return $this->coordX;
    }

    /**
     * @return int
     */
    public function getCoordY()
    {
        return $this->coordY;
    }

    public function getPv()
    {
        return $this->pv;
    }
}