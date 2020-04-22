<?php
$titre = 'Cookie';
$nom = null;
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
if (!empty($_COOKIE['utilisateur'])) {
    $onm = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])){
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
require 'header.php';
?>

<?php if($nom): ?>
    <h2>Bonjour, <?= htmlentities($nom) ?></h2>
    <a href="profil.php?action=deconnecter">Se deconnecter</a>
<?php else: ?>
    <form action="/profil.php" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Rentrez votre nom">
        </div>
        <button type="submit" class="btn btn-info">Envoyer</button>
    </form>
<?php endif ?>


<?php require 'footer.php' ?>