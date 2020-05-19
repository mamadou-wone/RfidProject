<?php
require 'vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$routeur = new AltoRouter();
$router = new AltoRouter();

$router->map('GET','/','login');
$router->map('GET','/home','home');
$router->map('POST|GET','/login2','login2');
$router->map('POST|GET','/updateadmin','updateadmin');
$router->map('POST|GET','/tables','tables');
$router->map('GET','/register','register');
$router->map('POST|GET','/etudiant','etudiant');
$router->map('POST|GET','/registeradmin','registeradmin');
$router->map('POST|GET','/admin','admin');
$router->map('POST','/delete','delete');
$router->map('POST','/update','update');
$router->map('GET','/logout','logout');
$match = $router->match();
// dd($match);


if($match !== null){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }elseif ($match['target'] === 'home') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'updateadmin') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'logout') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'login2') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'tables') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'register') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === 'delete') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === 'etudiant') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === 'registeradmin') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === 'admin') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === null) {
        require '404.php';
    }
    else{
            require "{$match['target']}.php";
    }
}

