<?php
if (!function_exists('isActive')){
    function isActive(string $lien, string $title, string $linkClass = ''): string
    {
        $classe = "nav-item";
        if ($_SERVER['SCRIPT_NAME'] === $lien){
            $classe .= " active";
        }
        return <<<HTML
        <li class="$classe">
            <a class="$linkClass" href="$lien">$title</a>
        </li>
HTML;    
    }
}
?>

<?= isActive('/index.php', 'Accueil', $class); ?>
<?= isActive('/contact.php', 'Contact', $class); ?>
