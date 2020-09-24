<?php 

Interface MapField{

    public function draw();

    public function iterate(Fighter $fighter, $x, $y);
}