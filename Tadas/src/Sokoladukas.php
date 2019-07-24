<?php

class Sokoladukas {

    private $pavadinimas;

    public function __construct(string $pavadinimas) {
        $this->pavadinimas = $pavadinimas;
    }

    public function pavadinimas() {
        return $this->pavadinimas;
    }

}
