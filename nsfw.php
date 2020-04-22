<?php
$titre = "Accés";
$age = null;
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}

if (!empty($_COOKIE['birthday'])) {
    $birthday = (int) $_COOKIE['birthday'];
    $age = (int) date('Y') - $birthday;
}
require 'header.php';
?>

<h2>Votre age pour accéder au contenu</h2>

<?php if ($age >= 18) : ?>
    <h3>Le contenu</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, vero. Ad corrupti dicta reprehenderit! Dolore, nemo. Sit, autem eos laborum delectus quis, impedit esse nobis eligendi repellendus doloribus iste vel?</p>
<?php elseif ($age !== null) : ?>
    <div class="alert alert-danger">
        <p>Vous etes trop jeune</p>
    </div>
<?php else : ?>
    <form action="" method="POST">
        <div class="form-group">
            <select class="form-control" name="birthday" id="birthday">
                <?php $num = 1919;
                while ($num <= 2010) {
                    echo '<option>' . $num++ . '</option>';
                } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-info">Envoyer</button>
    </form>
<?php endif ?>



<?php require 'footer.php' ?>