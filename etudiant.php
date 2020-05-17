<?php
ob_start();
use App\Action;
use App\DataBase;

require 'header.php';
require 'vendor/autoload.php';

if(isset($_POST['select'])){
  $niveau = $_POST['select'];
  $id = $_GET['user'];
  $pdo = DataBase::getPDO('rfid_user')->prepare("UPDATE donnees SET niveau=:niveau WHERE ID=:id");
  $pdo->execute([
    'niveau'=>$niveau,
    'id'=>$id]);
  header('Location: /tables');
  exit();
  
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $pdo=DataBase::getPDO('rfid_user');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $data = $pdo->prepare("SELECT * FROM donnees WHERE ID =:id");
    $data->fetchAll();
    $data->execute(['id'=>$id]);
    
}
  
?>

   <?php 
if(!empty($_POST)){
  $name = $_POST['name'];
  $departement = $_POST['departement'];
    $id= $_GET['id'];
 $pdo = Action::Update('rfid_user',$id,$name,$departement);
  header('Location: /tables');
  ob_end_flush();
}
?>
     
   <div class="container">
    <?php foreach($data as $result):?>
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-5" >
        <img src="ddd.png" alt="" width="450px" height="450px" class="p-4"> 
      </div>
    
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">UPDATE</h1>
            </div>
            <form action="" method="post" class="user">
            
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user"   placeholder="Name" value="<?= $result->Name?>" name="name">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user"  placeholder="ID" value="<?= $result->ID?>">
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" placeholder="NumCarte" value="<?= $result->NumCarte?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user"  placeholder="INE" value="<?= $result->INE?>">
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user"  placeholder="Département" value="<?= $result->Departement?>" name="departement">
                </div>
              </div>
              <button class="btn btn-outline-primary btn-user btn-block">
                Save 
              </button>
              <hr>
              <a href="/tables" class="btn btn-secondary">retour</a>
              </form>
          </div>
      
    </div>
  </div>
</div>

</div>

<?php endforeach ;?>

<!-- Footer -->
      <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; wone 2020</span>
          </div>
        </div>
      </footer> -->
      <!-- End of Footer -->

    </div>
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

