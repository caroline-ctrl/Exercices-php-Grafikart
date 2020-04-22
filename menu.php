<?php
$titre = 'Menu Pizza';
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'menu.csv';
$lignes = file($fichier);
foreach ($lignes as $key => $ligne) {
    $lignes[$key] = explode(";", trim($ligne, " \t\n\r\0\x0B;"));
}

require 'header.php';
?>

<h1>Menu</h1>

<?php foreach ($lignes as $ligne) : ?>
    <?php if (count($ligne) === 1) : ?>
        <h2><?= $ligne[0] ?></h2>
    <?php else : ?>
        <div class="row">
            <div class="col-sm-8">
                <p>
                    <strong><?= $ligne[0] ?></strong><br>
                    <?= $ligne[1] ?>
                </p>
            </div>
            <div class="col-sm-4">
                <p>
                    <strong><?= $ligne[2] ?> €</strong>
                </p>
            </div>
        </div>
    <?php endif ?>
<?php endforeach ?>

<?php require 'footer.php' ?>