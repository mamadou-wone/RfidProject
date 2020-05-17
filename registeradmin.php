<?php

use App\Action;
use App\DataBase;

require 'header.php';
require 'vendor/autoload.php';
if (!empty($_POST)  && isset($_POST['select'])) {
  $pseudo =[];
  $error = false;
  
  try{
    $image= base64_encode(file_get_contents(addslashes( $_FILES['image']['tmp_name'])));
    $pdo = Action::Insert('rfid_user',$_POST['name'],$_POST['pseudo'],$image,$_POST['select'],password_hash($_POST['password'],PASSWORD_DEFAULT ));
      if ($pdo === null) {
        ?>
      <div class="container">
        <div class="text-center"> 
          <div class="alert alert-success">
             <h1 class="h4 text-gray-900 mb-4">Data Saved Succefully</h1>
          </div>  
        </div>  
      </div> 

<?php
      }
  }catch(Exception $e){
    // echo $e->getMessage();
    $error = true;
    ?>
    <div class="container">
    <div class="text-center"> 
      <div class="alert alert-danger">
       <h1 class="h4 text-gray-900 mb-4">Error vérifiez les champs</h1>
      </div>         
    </div>
    </div>
<?php
  }
  
}

?>


<div class="container">
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="row">
      <div class="col-lg-5" >
        <img src="ddd.png" alt="" width="450px" height="450px" class="p-4"> 
      </div>
    
        <div class="col-lg-7">
          <div class="p-5">
            <div class="text-center">   
              <h1 class="h4 text-gray-900 mb-4">Admin</h1>
            </div>
            <form method="post" class="user" enctype="multipart/form-data" action="">
            
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="text" class="form-control form-control-user"   placeholder="Name" value="<?= $_POST['name'] ?? null ?> " name="name" required>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control form-control-user"  placeholder="PSEUDO" value="<?= $_POST['pseudo'] ?? null ?> " name="pseudo" required>
                </div>
              </div>
              <div class="form-group">
                 <select class="form-control" name="select" id="select" required>
                    <option value="" disabled selected>Choisissez le rôle</option>
                    <option value="root" >root</option>
                    <option value="admin">admin</option>
                </select>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                    <div class="custom-file">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01" name="image" required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose Image</label>
                    </div>
                </div>
                <p></p>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user"  placeholder="Password" value="" name="password" required>
                </div>
                <br>
              <button class="btn btn-outline-primary btn-user btn-block">
                Save 
              </button>
              <hr>
              <a href="/admin" class="btn btn-secondary">retour</a>
              </form>
          </div>
      
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