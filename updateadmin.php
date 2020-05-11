<?php

use App\Action;

require 'vendor/autoload.php';

if (!empty($_POST)) {
    $role = $_POST['select'];
    $pseudo = $_GET['pseudo'];
    $pdo = Action::ChangeRoleAdmin('rfid_user',$role,$pseudo);
    header('Location: /admin');
}