</main><!-- /.container -->
<footer><hr>

<div class="row">
    <div class="col-md-4">
        <?php
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Compteur.php';
        $compteur = new Compteur(__DIR__ . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
        $compteur->incrementer();
        $vues = $compteur->recuperer();
        ?>
        <p>Il y a <?= $vues ?> vue<?php if ($vues > 1): ?>s<?php endif ?></p>
    </div>
    <div class="col-md-4">
        <form action="/newsletter.php" method="POST">
            <div class="form-group">
                <label> Renseingez votre email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-info">Envoyer</button>
        </form>
    </div>
    <div class="col-md-4">
        <h5 mt-5>Navigation</h5>
        <ul class='list-unstyled text-small'>
            <?= nav_menu() ?>
        </ul>
    </div>
</div>
</footer>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</html>