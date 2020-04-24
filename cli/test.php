<?php
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';

$form = new Form();
echo $form->checkbox('demo', 'Demo', []);