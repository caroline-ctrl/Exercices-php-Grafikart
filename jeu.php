<?php
$titre = "Jeu";
// checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
// checkbox
$supplements = [
    'Pepites' => 1,
    'Chantilly' => 0.5
];
$ingredients = [];
$total = 0;

if (isset($_GET['parfum'])){
    foreach($_GET['parfum'] as $parfum){
        if (isset($parfums[$parfum])){
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}


if (isset($_GET['contenant'])) {
    $contenant = $_GET['contenant'];
    if(isset($cornets[$contenant])){
        $ingredients[] = $contenant;
        $total += $cornets[$contenant];
    }   
}


if(isset($_GET['supplement'])) {
    foreach ($_GET['supplement'] as $supplement){
        if (isset($supplements[$supplement]))
        $ingredients[] = $supplement;
        $total += $supplements[$supplement];
    }
}

require 'header.php';
?>


<h1>Composer votre glace !</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Votre glace</h3>
                    <ul>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <li><?= $ingredient ?></li>
                        <?php endforeach ?>
                    </ul>
                    <p>
                        <strong>Prix : </strong><?= $total ?> €
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="/jeu.php" method="GET">
            <div class="form-group">
                <h3>Choix des parfums</h3>
                <?php foreach ($parfums as $parfum => $prix) : ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('parfum', $parfum, $_GET); ?>
                            <?= $parfum ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="form-group">
                <h3>Choix du contenant</h3>
                <?php foreach ($cornets as $cornet => $prix) : ?>
                    <div class="radio">
                        <label>
                            <?= radio('contenant', $cornet, $_GET) ?>
                            <?= $cornet ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
            </div>


            <div class="form-group">
                <h3>Choix des suppléments</h3>
                <?php foreach ($supplements as $supplement => $prix) : ?>
                    <div class="checkbox">
                        <label>
                            <?= checkbox('supplement', $supplement, $_GET); ?>
                            <?= $supplement ?> - <?= $prix ?> €
                        </label>
                    </div>
                <?php endforeach ?>
            </div>

            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>

<pre>
<?php
var_dump($_GET['parfum']);
var_dump($_GET['contenant']);
var_dump($_GET['supplement']);
?>
</pre>



<?php require 'footer.php'; ?>