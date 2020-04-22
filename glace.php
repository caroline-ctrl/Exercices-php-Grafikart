<?php
$titre = "Glace";
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

foreach(['parfum', 'supplement'] as $name){
    if (isset($_GET[$name])){
        $liste = $name . 's';
        foreach($_GET[$name] as $unIngredient){
            if(isset($$liste[$unIngredient])){
                $ingredients[] = $unIngredient;
                $total += $$liste[$unIngredient];
            }
        }
    }
    
}



if (isset($_GET['cornet'])){
    $contenant = $_GET['cornet'];
    if(isset($cornets[$contenant])){
        $ingredients[] = $contenant;
        $total += $cornets[$contenant];
    }
}


// if (isset($_GET['parfum'])){
//     foreach($_GET['parfum'] as $unParfum){
//         if(isset($parfums[$unParfum])){
//             $ingredients[] = $unParfum;
//             $total += $parfums[$unParfum];
//         }
//     }
// }


// if (isset($_GET['supplement'])){
//     foreach($_GET['supplement'] as $unSupplement){
//         if (isset($supplements[$unSupplement])){
//             $ingredients[] = $unSupplement;
//             $total += $supplements[$unSupplement];
//         }
//     }
// }


require 'header.php';
?>


<h1>Composez votre glace</h1><br>
<div class="row">
    <div class="col-md-8">

        <form action="/glace.php" method="GET">
            <h3>Choix du/des parfum(s)</h3>
            <?php foreach ($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET) ?>
                        <?= $parfum ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach ?><br>

            <h3>Choix du contenant</h3>
            <?php foreach ($cornets as $cornet => $prix) : ?>
                <div class="rodio">
                    <label>
                        <?= radio('cornet', $cornet, $_GET) ?>
                        <?= $cornet ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach ?><br>

            <h3>Choix du/des supplément(s)</h3>
            <?php foreach ($supplements as $supplement => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('supplement', $supplement, $_GET) ?>
                        <?= $supplement ?> - <?= $prix ?> €
                    </label>
                </div>
            <?php endforeach ?><br>

            <button type="submit" class="btn btn-info">Composer ma glace</button>
        </form>

    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h3>Votre glace</h3>
                    <ul>
                        <?php foreach($ingredients as $ingredient): ?>
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
</div>


<?php require 'footer.php'; ?>