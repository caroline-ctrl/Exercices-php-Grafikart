<?php

function ajouter_vue ()
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    if (file_exists($fichier)){
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier, $compteur);
    } else {
        file_put_contents($fichier, '1');
    }
}