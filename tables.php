<?php

use App\DataBase;
use App\Fonction;

require 'vendor/autoload.php';

require 'header.php'; 

$id_modal = [];

$pdo=DataBase::getPDO('rfid_user');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ);
$data= $pdo->prepare("SELECT * FROM donnees");
$data->fetchAll();
$data->execute();

?>
  

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Liste Des Etudiants</h1>
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

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
                      <th>Name</th>
                      <th>ID</th>
                      <th>NumCarte</th>
                      <th>INE</th>
                      <th>Département</th>
                      <th>Update</th>
                     
                      <?php if(isset($_GET['del'])){
                        echo "<th>Delete</th>";
                      }
                    ?>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>NumCarte</th>
                    <th>INE</th>
                    <th>Département</th>
                    <th>Update</th>
                    <?php if(isset($_GET['del'])){
                        echo "<th>Delete</th>";
                      }
                    ?>
                  
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach($data as $result):?>
                      <tr>
                      <td><?=$result->Name?> </td>
                      <td><?=$result->ID?></td>
                      <td><?=$result->NumCarte?></td>
                      <td><?=$result->INE?></td>
                      <td><?=$result->Departement?></td>                   
                      <td><a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#<?=$result->INE?>">
                            Voir
                          </a>
                      </td>                       
                    <?php if(isset($_GET['del'])):

                    ?>
                       <td>
                        <form action="/delete?ine=<?= $result->INE?>" method="post">
                          
                          <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Etes vous sur de supprimer?')">Delete</button>
                        </form>
                      </td>
                    <?php endif ;?>

<div class="modal fade" id="<?=$result->INE?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Etudiant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="p-4">
                  
            <div class="card" style="width: 18rem;">
              <img src="data:image/jpg;base64,<?=base64_encode($result->Images);?>" class="card-img-top" >
                <div class="card-body">    
                    <h5 class="card-title"><strong><label for="">Nom:</label></strong> <?=$result->Name?></h5>
                    <p class="card-text"><strong><label for="">NumCarte:</label></strong> <?=$result->NumCarte ?></p>
                    <p class="card-text"><strong><label for="">INE:</label></strong> <?=$result->INE ?></p>
                    <p class="card-text"><strong><label for="">Département:</label> </strong><?=$result->Departement ?></p>
                    <p class="card-text"><strong><label for="">Niveau:</label> </strong><?=$result->niveau ?></p>      
                </div>              
            </div>
            <hr>
            <form action="/etudiant?user=<?=$result->ID?>" method="post">
                <div class="form-group">
                    <select class="form-control" name="select" id="select" required>
                        <option value="" disabled selected><?=$result->niveau ?></option>
                        <option value="licence 1" >Licence 1</option>
                        <option value="licence 2">Licence 2</option>
                        <option value="licence 3">Licence 3</option>
                        <option value="Master 1">Master 1</option>
                        <option value="Master 2">Master 2</option>
                    </select>
                    <?php if($role === 'root'): ?>
                    <br>
                    <a href="/etudiant?id=<?=$result->ID?>"  class="btn btn-primary">Update</a>
                    <?php endif; ?>  
                  </div>             
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
             </form>
        </div>
    </div>
  </div>
</div>
                    </tr>
                      
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
 
    
   
     

    </div>
     <!-- Footer -->
     <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; wone 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
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
