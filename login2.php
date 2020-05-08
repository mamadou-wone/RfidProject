<?php

use App\DataBase;
use App\Login\Auth;

require 'vendor/autoload.php';
session_start();
if (!empty($_POST)) {
  $pdo = DataBase::getPDO('rfid_user');
  $auth = new Auth($pdo);
  $user= $auth->login($_POST['pseudo'],$_POST['password']);
    if ($user) {
      // dd($user);
      header('Location: /home');
      exit();
      
    }else{
        header('Location: /?forbit=1');
    }

}

if($auth->user() !== null){
  header('Location: /home');
}

?>