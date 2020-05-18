<?php

use App\DataBase;

require 'header.php';
require_once 'function/progressBar.php';


$pdo = DataBase::getPDO('rfid_user')->prepare("SELECT  count(*) as count FROM donnees");
$pdo->execute();
$data =(int) $pdo->fetch()['count'];

$admin = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM user");
$admin->execute();
$result = (int)$admin->fetch()['count'];

// $number_of_student_in_licence1=6;
$licence1 = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM donnees WHERE niveau='licence 1'");
$licence1->execute();
$student_in_Licence1= (int)$licence1->fetch()['count'];

$licence2 = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM donnees WHERE niveau='licence 2'");
$licence2->execute();
$student_in_Licence2= (int)$licence2->fetch()['count'];

$licence3 = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM donnees WHERE niveau='licence 3'");
$licence3->execute();
$student_in_Licence3= (int)$licence3->fetch()['count'];

$master1 = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM donnees WHERE niveau='master 1'");
$master1->execute();
$student_in_master1= (int)$master1->fetch()['count'];

$master2 = DataBase::getPDO('rfid_user')->prepare("SELECT count(*) as count FROM donnees WHERE niveau='master 2'");
$master2->execute();
$student_in_master2= (int)$master2->fetch()['count'];



$objectif = DataBase::getPDO('rfid_user');
$objectif->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$target= $objectif->prepare("SELECT * FROM objectif");
$target->execute();
$targets = $target->fetchAll();

foreach ($targets as $key) {
  $licence1_goal = ceil(($student_in_Licence1/($key->licence1))*100);
  $licence1_rest = -($student_in_Licence1 -($key->licence1));

  $licence2_goal = ceil(($student_in_Licence2/($key->licence2))*100);
  $licence2_rest = -($student_in_Licence2 -($key->licence2));

  $licence3_goal = ceil(($student_in_Licence3/($key->licence3))*100);
  $licence3_rest = -($student_in_Licence3 -($key->licence3));

  $master1_goal = ceil(($student_in_master1/($key->master1))*100);
  $master1_rest = -($student_in_master1 -($key->master1));

  $master2_goal = ceil(($student_in_master2/($key->master2))*100);
  $master2_rest = -($student_in_master2 -($key->master2));

  $total = ($key->licence1)+($key->licence2)+($key->licence3)+($key->master1)+($key->master2);
  $task = ceil(($data/$total)*100);

}


?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre d'Etudiant</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $data?> </div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Administrateurs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $result?></div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$task?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="<?php ProgressBar($task); ?>" role="progressbar" style="width: <?=$task?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">News</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
    </div>


<div class="p-4">   
  <div class="row">
      <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Evolutions des enregistrements</h6>
            </div>
            <div class="card-body">
              <h4 class="small font-weight-bold"><strong>Licence 1 </strong><span class="float-right"><?=$licence1_goal?>%</span></h4>
              <div class="progress mb-4">
                <div class="<?php ProgressBar($licence1_goal); ?>" role="progressbar" style="width: <?=$licence1_goal?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><strong>Licence 2</strong> <span class="float-right"><?=$licence2_goal?>%</span></h4>
              <div class="progress mb-4">
                <div class="<?php ProgressBar($licence2_goal); ?>" role="progressbar" style="width: <?=$licence2_goal?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><strong>Licence 3</strong> <span class="float-right"><?=$licence3_goal?>%</span></h4>
              <div class="progress mb-4">
                <div class="<?php ProgressBar($licence3_goal); ?>" role="progressbar" style="width: <?=$licence3_goal?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><strong>Master 1 </strong><span class="float-right"><?=$master1_goal?>%</span></h4>
              <div class="progress mb-4">
                <div class="<?php ProgressBar($master1_goal); ?>" role="progressbar" style="width: <?=$master1_goal?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <h4 class="small font-weight-bold"><strong>Master 2 </strong><span class="float-right"><?=$master2_goal?>%</span></h4>
              <div class="progress">
                <div class="<?php ProgressBar($master2_goal); ?>" role="progressbar" style="width: <?=$master2_goal?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Objectifs des enregistrements</h6>
          </div>
          <div class="card-body">
            <?php foreach ($targets as $keye):?>
            <p><strong>Licence 1 : <?=$licence1_rest ?> restant sur <?= $keye->licence1?> enregistrables </strong></p>
            <p><strong>Licence 2 : <?=$licence2_rest ?> restant sur <?= $keye->licence2?> enregistrables </strong></p>
            <p><strong>Licence 3 : <?=$licence3_rest ?> restant sur <?= $keye->licence3?> enregistrables </strong></p>
            <p><strong>Master 1 :  <?=$master1_rest ?> restant sur <?= $keye->master1?> enregistrables </strong></p>
            <p><strong>Master 2 :  <?=$master2_rest ?> restant sur <?= $keye->master2?> enregistrables </strong></p>
            <?php endforeach;?> 
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

    </div>
    <!-- End of Content Wrapper -->

  </div>

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
          <a class="btn btn-primary" href="/login">Logout</a>
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
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
