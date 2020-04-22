<?php

function ajouter_vue()
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}


function incrementer_compteur(string $fichier)
{
    $compteur = 1;
    if (file_exists($fichier)){
        $compteur = file_get_contents($fichier);
        $compteur++;
        file_put_contents($fichier, $compteur);
    }
    file_put_contents($fichier, $compteur);

}


function nombre_vues()
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}