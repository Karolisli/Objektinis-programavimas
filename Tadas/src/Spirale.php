<?php

class Spirale {

    const TALPA = 10;

    private $pozicija;
    private $sokoladukai = [];

    private $kaina;

    public function __construct(int $pozicija, float $kaina) {
        $this->pozicija = $pozicija;
        $this->kaina = $kaina;
    }

    public function pozicija() {
        return $this->pozicija;
    }

    public function kaina() {
        return $this->kaina;
    }

    public function kiekis() {
        return count($this->sokoladukai);
    }

    public function ikrauti(array $sokoladukai) {
        if (count($sokoladukai) + count($this->sokoladukai) > Spirale::TALPA) {
            print 'Per daug sokoladuku. <br/>';
            return;
        }
        $this->sokoladukai = $sokoladukai;
    }

    public function isduotiViena() {
        if (count($this->sokoladukai) == 0) {
            print 'Sokoladuku nebera. <br/>';
            return;
        }

        $sokoladukas = array_pop($this->sokoladukai);

        print 'Spirales nr: ' . $this->pozicija . '<br/>';
        print 'Isduodam sokoladuka: ' . $sokoladukas->pavadinimas() . '<br/>';
        print 'Liko sokoladuku: ' . count($this->sokoladukai) . '<br/>';
    }

}
