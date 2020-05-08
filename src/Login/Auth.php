<?php
namespace App\Login;
use PDO;
class Auth{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function user(): ?User
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
           $pseudo= $_SESSION['user'] ?? null;
           if ($pseudo === null) {
               return null;
           }
            $select = $this->pdo->prepare("SELECT * FROM user WHERE pseudo= ?");
            $select->execute([$pseudo]);
            $select->setFetchMode(PDO::FETCH_CLASS, User::class);
            $user = $select->fetch();

            return $user ?: null;
    }

    public function login(string $pseudo, string $password): ?User
    {
        //Vérifie si les données envoyés en parametre corresponde à un user ds la bd
            $select = $this->pdo->prepare("SELECT * FROM user WHERE pseudo= :pseudo");
            $select->execute(['pseudo'=> $pseudo]);
            $select->setFetchMode(PDO::FETCH_CLASS, User::class);
            $user = $select->fetch();
                if ($user === false) {
                    return null;
                }
                if (password_verify($password , $user->getPassword())) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['user'] = $user->getPseudo();
                    return $user;
                }
                 return null;
                 


        //Return un user ou null
    }


}