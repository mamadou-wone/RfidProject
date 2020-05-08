<?php

use App\DataBase;

require 'header.php';
require 'vendor/autoload.php';

$pdo = DataBase::getPDO('rfid_user');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$data = $pdo->prepare('SELECT * FROM user');
$data->fetchAll();
$data->execute();
?>




<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Liste Des Admin</h1>
    
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables </h6>
            </div>
         
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Nom</th>
                    <th>Pseudo</th>
                    <th>Rôle</th>
                      <th></th>
                      
                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Nom</th>
                    <th>Pseudo</th>
                    <th>Rôle</th>
                    <th></th>
                    
                  
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach($data as $resulut):?>
                    
                      <tr>
                      <td><?=$resulut->name ?></td>
                      <td><?=$resulut->pseudo ?></td>
                      <td><?=$resulut->role ?></td>
                      <td><a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#<?=$resulut->pseudo?>">
                            Voir
                          </a>
                      </td>                      
                       <!-- <td>
                        <form action="" method="post">                        
                        </form>
                      </td> -->
<div class="modal fade" id="<?=$resulut->pseudo?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Administration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="p-4">
                  
          <div class="card" style="width: 18rem;">
              <img src="data:image/jpg;base64,<?=$resulut->image;?>" class="card-img-top" >
                <div class="card-body">    
                    <h5 class="card-title"><strong><label for="">Nom:</label></strong> <?=$resulut->name?></h5>
                    <p class="card-text"><strong><label for="">Pseudo:</label></strong> <?=$resulut->pseudo ?></p>
                    <p class="card-text"><strong><label for="">Rôle:</label></strong> <?=$resulut->role ?></p>
                      
                </div>              
            </div>
                  
          </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <a href="/etudiant?id="  class="btn btn-primary">Update</a>
            </div>
        </div>
    </div>
  </div>
</div>
                  <?php endforeach;?>                 
                    </tr>
                  </tbody>
                </table>
              </div>
                <a href="registeradmin" class="btn btn-dark">Ajouter</a>
            </div>
          </div>

        </div>
 




<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>