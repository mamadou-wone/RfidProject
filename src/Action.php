<?php
namespace App;
use PDO;
use Exception;

class Action{

    public static function Insert($dbname, $name ,$pseudo ,$image, $role,$password){
        $request = DataBase::getPDO($dbname)->prepare("INSERT INTO user(name,pseudo,image,role,password) VALUE(:name , :pseudo , :image , :role, :password)");        
            $request->execute([
                'name'=>$name,
                'pseudo'=>$pseudo,
                 'image'=>$image,
                 'role'=>$role,
                 'password'=>$password   
            ]);    
        
}
    
    public static function Update($dbname, $id = null ,$name = null, $departement = null){
        $request = DataBase::getPDO($dbname)->prepare("UPDATE donnees SET Name =:nom , Departement =:departement WHERE ID =:id");
        $request->execute([
            'nom'=>$name,
            'departement'=>$departement,
             'id'=>$id   
        ]);
      
        
}

    public static function ChangeRoleAdmin($dbname , $role ,$pseudo)
    {
        $request = DataBase::getPDO($dbname)->prepare("UPDATE user SET role =:role WHERE pseudo =:pseudo");
        $request ->execute([
            'role'=>$role,
            'pseudo'=>$pseudo
        ]);
    }

    
    public static function Delete($dbname, $ine)
    {
        $request = DataBase::getPDO($dbname)->prepare("DELETE FROM donnees WHERE INE =:ine");
        $request->execute(['ine'=>$ine]);
    }



}