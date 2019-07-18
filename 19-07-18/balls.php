<?php

class ThailandSurprise {
    public $clothes;
    private $balls;
    
    public function __construct($clothes){
        $this->clothes = $clothes;
        $this->balls = rand(0,1);
    }
}

$new_clothes = new ThailandSurprise('miniskirt');
print $new_clothes->clothes;

$here_be_balls = new ThailandSurprise('OH SHIT');

print $here_be_balls->clothes;

var_dump($here_be_balls);
?>

