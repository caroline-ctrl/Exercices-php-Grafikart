<?php
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


function nav_menu(string $class = ''): string
{
    return 
    isActive('/index.php', 'Accueil', $class) . ' ' . 
    isActive('/contact.php', 'Contact', $class) . ' ' . 
    isActive('/glace.php', 'Glaces', $class) . ' ' . 
    isActive('/menu.php', 'Menu Pizza', $class) . ' ' .
    isActive('/newsletter.php', 'Newsletter', $class);
}
    




function checkbox(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])){
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}


function radio(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]){
        $attributes = "checked";
    }
    return <<<HTML
    <input type="radio" name="$name" value="$value" $attributes>
HTML;
}




// function checkbox(string $name, string $value, array $data): string
// {
//     $attributes = '';
//     if (isset($data[$name]) && in_array($value, $data[$name])){
//         $attributes .= 'checked';
//     }
//     return <<<HTML
//     <input type="checkbox" name="{$name}[]" value="$value" $attributes>
// HTML;    
// }


// function radio(string $name, string $value, array $data): string
// {
//     $attribute = '';
//     if (isset($data[$name]) && $value === $data[$name]){
//         $attribute .= 'checked';
//     }
//     return <<<HTML
//     <input type="radio" name="$name" value="$value" $attribute>
// HTML;
// }




function creneaux_html(array $creneaux)
{
    if (empty($creneaux)){
        return 'fermé';
    }
    // pour afficher les horaires renseigné dans config.php
    $phrases = [];
    foreach ($creneaux as $creneau){
        $phrases[] = "<strong>{$creneau[0]}h</strong> - <strong>{$creneau[1]}h</strong>";
    }
    return 'Ouvert ' . implode(' et ', $phrases);
}



function in_creneaux(int $heure, array $creneaux): bool
{
    foreach ($creneaux as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}


function select (string $name, $value, array $options): string
{
    $html_option = [];
    foreach ($options as $key => $option){
        $attribute = $key == $value ? ' selected' : '';
        $html_option[] = "<option value='$key' $attribute>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_option) . '</select>';
}



