<?php

Class Map{

    const SIZE = 10;

    private $map; 
    private $fighter;
    public function __construct(Fighter $fighter)
    {
        $this->fighter = $fighter;
        for($x = 0; $x <= self::SIZE; ++$x){
            for($y = 0; $y <= self::SIZE; ++$y){
                $this->map[$x][$y] = $this->getRandomField();
            }
        }

        $this->map[0][0] = new Grass();
    }

    public function displayMap()
    {
        for($y = 0; $y <= self::SIZE; ++$y){
            echo "\033[31m+-+-+-+-+-+-+-+-+-+-+-+\033[0m\n";
            for($x = 0; $x <= self::SIZE; ++$x){
                echo "\033[31m|\033[0m";
                if($this->fighter->getCoordX() == $x && $this->fighter->getCoordY() == $y){
                     echo "F";
                }else{
                     echo $this->map[$x][$y]->draw();
                }
            }
            echo "\033[31m|\033[0m";
            echo "\n";
        }
        echo "\033[31m+-+-+-+-+-+-+-+-+-+-+-+\033[0m\n";
    }

    public function getRandomField()
    {
        switch (mt_rand(0,5)) {
            case 0:
                return new Monster();
            case 1:
                return new Weapon();
            case 2:
                return new Wall();
            case 3:
            case 4:
            case 5:
                return new Grass();
        }
    }

    public function iterate($x,$y){
        $this->map[$x][$y] = $this->map[$x][$y]->iterate($this->fighter, $x, $y);
    }
}