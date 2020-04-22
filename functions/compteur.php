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



function nombre_vue_mois (int $annee, int $mois): int
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier){
        $vues = (int)file_get_contents($fichier);
        $total += $vues;
    }
    return $total;
}


function nombre_vue_detail_mois (int $annee, int $mois): array
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visites = [];
    foreach ($fichiers as $fichier){
        $parties = explode('-', basename($fichier));
        $visites[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visites' => file_get_contents($fichier)
        ];
    }
    return $visites;
}