<?php

use App\DataBase;

require 'header.php';
require 'vendor/autoload.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $pdo=DataBase::getPDO('rfid_user');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $data = $pdo->prepare("SELECT * FROM donnees WHERE ID =:id");
    $data->fetchAll();
    $data->execute(['id'=>$id]);
    
}
    foreach($data as $result):
      
?>
    <div class="container">
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
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

          
                  
             
               
           </div>
          
        </div>
<?php endforeach ; ?>

<!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; wone 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login">Logout</a>
        </div>
      </div>
    </div>
  </div>

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


<?php 
                          if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $query = $pdo->prepare("SELECT * FROM donnees WHERE ID =:id");
                            $query->fetchAll();
                            $query->execute(['id'=>$id]);
                          }
                            
                            foreach($query as $info):
                      ?>
                                     <!-- /.container-fluid -->
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
              <img src="data:image/jpg;base64,<?=base64_encode($info->Images);?>" class="card-img-top" ></td>
                  <div class="card-body">    
                      <h5 class="card-title"> <?=$info->Name?></h5>
                      <p class="card-text"><?=$info->NumCarte ?></p>
                      <p class="card-text"><?=$info->INE ?></p>
                      <p class="card-text"><?=$info->Departement ?></p>     
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

</div>
                            <?php endforeach;?>