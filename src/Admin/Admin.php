<?php
namespace App\Login;

use App\DataBase;
use PDO;

class Admin{


    public static function changeData(string $name = null , string $pseudo = null , $image = null, $pseudo_verif)
    {
       
        $error = false;
        try {
            $image= base64_encode(file_get_contents(addslashes( $_FILES['image']['tmp_name'])));
            $pdo = DataBase::getPDO('rfid_user')->prepare("UPDATE user SET name=:name , pseudo=:pseudo , image=:image WHERE pseudo=:pseudo");
            $pdo->execute([
                'name'=>$name,
                'pseudo'=>$pseudo,
                'image'=>$image,
                'pseudo'=>$pseudo_verif
            ]);
        } catch (Exception $e) {
            $error = true;
        }
    }

}