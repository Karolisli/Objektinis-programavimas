<?php

require_once('src/Sokoladukas.php');
require_once('src/Spirale.php');
require_once('src/SokoladukuMasina.php');

$sokoladukuMasina = new SokoladukuMasina();

$sokoladukuMasina->ikrautiPinigu(15.5);

$sokoladukuMasina->Spirale(1)->ikrauti([
    new Sokoladukas('Snickers'),
    new Sokoladukas('Snickers'),
    new Sokoladukas('Snickers'),
    new Sokoladukas('Snickers'),
    new Sokoladukas('Snickers'),
]);

$sokoladukuMasina->Spirale(2)->ikrauti([
    new Sokoladukas('Mars'),
    new Sokoladukas('Mars'),
    new Sokoladukas('Mars'),
    new Sokoladukas('Mars'),
    new Sokoladukas('Mars'),
]);

// Vartotojas

$sokoladukuMasina->idetiPinigu(1.5);
$sokoladukuMasina->pirktiSokoladuka(2);
$sokoladukuMasina->atiduotiGraza();
?>