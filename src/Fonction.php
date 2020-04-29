<?php
namespace App;
use PDO;

class Fonction{
  
    public static function popup($id)
    {
        $pdo=DataBase::getPDO('rfid_user');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $data = $pdo->prepare("SELECT * FROM donnees WHERE ID =:id");
        $data->fetchAll();
        $data->execute(['id'=>$id]);
        foreach($data as $result){
<<<HTML

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="p-4">
               
                  
               <div class="card" style="width: 18rem;">
                   <img src="data:image/jpg;base64,<?=base64_encode($result->Images);?>" class="card-img-top" ></td>
                       <div class="card-body">    
                           <h5 class="card-title"> <?=$result->Name?></h5>
                           <p class="card-text"><?=$result->NumCarte ?></p>
                           <p class="card-text"><?=$result->INE ?></p>
                           <p class="card-text"><?=$result->Departement ?></p>     
                       </div>              
               </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

HTML;
}
    }


}

?>
                    

                    