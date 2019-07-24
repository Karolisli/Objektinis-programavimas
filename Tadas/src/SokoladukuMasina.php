<?php

class SokoladukuMasina {

    private $pinigai = 0;
    private $idetiPinigai = 0;
    private $spirales;

    public function __construct() {
        $this->spirales = [
            1 => new Spirale(1, 1.5),
            2 => new Spirale(2, 1.2)
        ];
    }

    public function Spirale($pozicija) {
        if (!isset($this->spirales[$pozicija])) {
            print 'Tokios pozicijos neegzistuoja <br/>';
        }
        return $this->spirales[$pozicija];
    }

    public function ikrautiPinigu($pinigai) {
        $this->pinigai += $pinigai;
        print 'Idedame' . $pinigai . ' pinigu i masina. Pinigu: ' . $this->pinigai . '<br/>';
    }

    public function idetiPinigu($pinigai) {
        $this->idetiPinigai += $pinigai;
        print 'Vartotojas ideda pinigu: ' . $pinigai . '<br/>';
        print 'Viso vartotojo pinigu: ' . $this->idetiPinigai . '<br/>';
    }

    public function pirktiSokoladuka($pozicija) {
        $spirales = array_keys($this->spirales);
        if (!in_array($pozicija, $spirales)) {
            print 'Tokios pozicijos nera.<br/>';
            return;
        }
        $spirale = $this->spirales[$pozicija];
        if ($spirale->kiekis() == 0) {
            print 'Neuztenka sokoladuku. <br/>';
            return;
        }
        if ($this->idetiPinigai < $spirale->kaina()) {
            print 'Neuztenka pinigu. <br/>';
        }
        $this->idetiPinigai -= $spirale->kaina();
        $this->pinigai += $spirale->kaina();
        $spirale->isduotiViena();
        print 'Viso masinoje pinigu: ' . $this->pinigai . '<br/>';
    }

    public function atiduotiGraza() {
        print 'Isduodam grazos: ' . $this->idetiPinigai . '<br/>';
        $this->idetiPinigai = 0;
    }

}

?>