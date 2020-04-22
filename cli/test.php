<?php
// pour avoir le chemin absolut du fichier
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'demo.txt';
file_put_contents($fichier, 'Salut les gens');