<?php
$titre = 'newsletter';

$error = null;
$success = null;
$email = null;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = 'Votre email a bien été enregistré';
    } else {
        $error = 'Email invalide';
    }
}
require 'header.php';

?>

<h2>Inscription à la newsletter</h2>

<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif ?>

<?php if ($success) : ?>
    <div class="alert alert-success">
        <?= $success ?>
    </div>
<?php endif ?>


<form action="/newsletter.php" method="POST">
    <div class="form-group">
        <label> Renseingez votre email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlentities($email) ?>">
    </div>
    <button type="submit" class="btn btn-info">Envoyer</button>
</form>

<?php require 'footer.php' ?>