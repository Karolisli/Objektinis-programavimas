<?php

class ThailandSurprise {
    public $clothes;
    private $balls;
    
    public function __construct($clothes){
        $this->clothes = $clothes;
        $this->balls = rand(true,false);
    }
    public function attachBalls(){
        $this->balls = true;
    }

    public function detachBalls(){
        $this->balls = false;
    }
}

$new_clothes = new ThailandSurprise('miniskirt');
print $new_clothes->clothes;

$person = new ThailandSurprise('hello');

print $person->clothes;

var_dump($person);

$hello_balls = new ThailandSurprise('AHHHHHHHHHHHHH');

$hello_balls->attachBalls();

var_dump($hello_balls);

?>

