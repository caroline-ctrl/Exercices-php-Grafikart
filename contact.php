<?php
$titre = 'Contact';
require_once 'config.php';
require_once 'functions.php';
// pour mettre au bon fuseau horaire
date_default_timezone_set('Europe/Paris');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red';
require 'header.php';
?>


<div class="row">
    <div class="col-md-8">
        <h2>Nous contacter</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores, totam, illum optio dignissimos perspiciatis quod laboriosam quidem cumque, inventore aliquid commodi repellat ipsam explicabo est error esse. Provident, reprehenderit nemo.</p>
    </div>

    <div class="col-md-4">
        <h2>Horaire d'ouverture</h2>
        <ul>
            <?php foreach (JOURS as $key => $jour) : // $key commence a 0 et représente lundi
            ?>
                <li>
                    <?= $jour ?> :
                    <?= creneaux_html(CRENEAUX[$key]); ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <h3 class="mt-5">Recherche jour d'ouverture</h3>
        <form action="/contact.php" method="GET">
            <div class="form-group">
                <?= select('jour', $jour, JOURS); ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-info" type="submit">Voir si le magasin est ouvert</button>
        </form>

        <?php if ($ouvert) : ?>
            <div class="alert alert-success mt-2">
                Le magasin sera ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger mt-2">
                Le magasin sera fermé
            </div>
        <?php endif ?>

    </div>
</div>


<?php require 'footer.php' ?>