<?php

use App\Action;

if (!empty($_GET)) {
    $ine =$_GET['ine'];
    $pdo = Action::Delete('rfid_user',$ine);
    header('Location: /tables?del=8761hshq');
}