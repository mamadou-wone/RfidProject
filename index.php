<?php
require 'vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$routeur = new AltoRouter();



$router = new AltoRouter();

$router->map('GET','/','home');
$router->map('GET','/login','login');
$router->map('GET','/tables','tables');
$router->map('GET','/register','register');
$router->map('POST|GET','/etudiant','etudiant');
//  $router->map('GET','/update','update');
$router->map('POST','/update','update');
$match = $router->match();
// dd($match);


if($match !== null){
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }elseif ($match['target'] === 'login') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'tables') {
        require "{$match['target']}.php";
    }elseif ($match['target'] === 'register') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === 'etudiant') {
        require  "{$match['target']}.php";
    }elseif ($match['target'] === null) {
        require '404.php';
    }
    else{
            require "{$match['target']}.php";
    }
}

