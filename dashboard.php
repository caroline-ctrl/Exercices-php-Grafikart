<?php
require_once 'functions/auth.php';
if (!est_connecte()){
    header('Location: /login.php');
    exit;
}
require_once 'functions/compteur.php';
$titre = 'Dashboard';
$annee = (int) date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int) $_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_selection && $mois_selection) {
    $total = nombre_vue_mois($annee_selection, $mois_selection);
    $detail = nombre_vue_detail_mois($annee_selection, $mois_selection);
} else {
    $total = nombre_vues();
}

$mois = [
    '01' => 'Janvier',
    '02' => 'Février',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
require 'header.php';
?>

    <h1>Dashboard</h1>

    <div class="row mt-5">
        <div class="col-4">
            <h2>Par année</h2>
            <div class="list-group">
                <?php for ($i = 0; $i < 5; $i++) : ?>
                    <a class="list-group-item bg-info text-dark <?= $annee - $i === $annee_selection ? 'active' : ''; ?>" href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
                    <?php if ($annee - $i === $annee_selection) : ?>
                        <?php foreach ($mois as $key => $nom) : ?>
                            <div class="list-group">
                                <a class="list-group-item <?= $key === $mois_selection ? 'active' : '' ?>" href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $key ?>"><?= $nom ?></a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                <?php endfor ?>
            </div>
        </div>

        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2>Nombre de visite totale</h2>
                    <h5 class="text-center"><strong><?= $total ?> vue<?php if ($total > 1) : ?>s<?php endif ?></h5>
                </div>
            </div>

            <?php if (isset($detail)) : ?>
                <h2 class="mt-5">Detail des visite du mois</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Jour</th>
                            <th>Mois</th>
                            <th>Nombre de visite</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detail as $ligne) : ?>
                            <tr>
                                <td><?= $ligne['jour'] ?></td>
                                <td><?= $ligne['mois'] ?></td>
                                <td><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : '' ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            <?php endif ?>
        </div>
    </div>



<?php require 'footer.php'; ?>