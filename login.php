<?php
$titre = 'Connexion';
$erreur = null;
$password = '$2y$12$CuyQcG/muKa1gyJVNTfIM.y4WC9n4NIUs.J2CnRlWnN8Cb5ZvQ3sy';
if (!empty($_POST['nom']) && !empty($_POST['pwd'])){
    if ($_POST['nom'] === 'Oxie' && password_verify($_POST['pwd'], $password)){
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
    } else {
        $erreur = 'Identifiant incorrect';
    }
}

require_once  'functions/auth.php';
if (est_connecte()){
    header('Location: /dashboard.php');
    exit;
}
require_once  'header.php';
?>


<h1>Connectez vous</h1>

<?php if ($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
    <?php endif ?>
    
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" placeholder="Votre nom"><br>
            <input type="text" class="form-control" name="pwd" placeholder="Votre mot de passe">
        </div>
        <button type="submit" class="btn btn-info">Envoyer</button>
    </form>

    
<?php require 'footer.php'; ?>
