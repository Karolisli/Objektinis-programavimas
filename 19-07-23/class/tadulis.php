<?php
​
require_once('src/Sokoladukas.php');
require_once('src/SokoladukuMasina.php');
require_once('src/Spirate.php');
​
$sokoladukuMasina = new SokoladukuMasina();
​
$sokoladukuMasina->ikrautiPinigu(15.5);
​
$sokoladukuMasina->Spirale(1)->ikrauti([
	new Sokoladukas('Snicers'),
	new Sokoladukas('Snicers'),
	new Sokoladukas('Snicers'),
	new Sokoladukas('Snicers'),
	new Sokoladukas('Snicers'),
]);
​
$sokoladukuMasina->Spirale(2)->ikrauti([
	new Sokoladukas('Mars'),
	new Sokoladukas('Mars'),
	new Sokoladukas('Mars'),
	new Sokoladukas('Mars'),
	new Sokoladukas('Mars'),
]);
​
$sokoladukuMasina->idetiPinigu(1.5);
$sokoladukuMasina->pirktiSokoladuka(2);
$sokoladukuMasina->atiduotiGraza();
?>