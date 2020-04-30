<?php
namespace App;

class Action{

    
    public static function Update($dbname, $id ,$name , $departement){
        $request = DataBase::getPDO($dbname)->prepare("UPDATE donnees SET Name =:nom , Departement =:departement WHERE ID =:id");
        $request->execute([
            'nom'=>$name,
            'departement'=>$departement,
             'id'=>$id   
        ]);
      
}
}