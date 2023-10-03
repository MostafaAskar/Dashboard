<?php
require_once '../vendor/autoload.php';
use App\Classes\Employee;
use App\Classes\Department;
use App\Classes\Request;



$employee=new Employee();
$employees=$employee->getAll();



if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // $request = new Request();
  // echo $request->post('DNo');
 
  $dep = new Department;

  $dep->dno =$_POST['DNo']; ;
  $dep->dname = $_POST['DName'];
  $dep->mgrSSN = $_POST['MGRSSN'];
  $dep->mgrStartDate = $_POST['MGRStartDate'];
  $dep->store();
  

  
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include_once '../includes/head.php' ?>
  </head>

  <body>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <?php include_once '../includes/main_header.php' ?>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <?php include_once '../includes/aside.php' ?>
        </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <?php if(isset($inserResult)){ ?>
            <div class="alert alert-success">Added..</div>
            <?php } ?>

            <?php if(isset($errors) && !empty($errors)){ ?>
            <div class="alert alert-danger">
              <ul>
                <?php foreach($errors as $error){ ?>
                  <li><?php echo $error; ?></li>
                <?php } ?>
              </ul>
            </div>
            <?php } ?>

            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Add Department</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <a href="index.php">All Department</a>
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal"  action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data" method="post">
                  <div class="card-body">
                  <div class="form-group row">
                      <label
                        for="DNo"
                        class="col-sm-3 text-end control-label col-form-label"
                        >DNo</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="DNo"
                          placeholder="DNo Here"
                          name="DNo"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="DName"
                        class="col-sm-3 text-end control-label col-form-label"
                        >DName</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="text"
                          class="form-control"
                          id="DName"
                          placeholder="First Name Here"
                          name="DName"
                        />
                      </div>
                    </div>
                    <div class="form-group row">
                    <label
                        for="MGRSSN"
                        class="col-sm-3 text-end control-label col-form-label"
                        >MGRSSN</label
                      >
                      <div class="col-sm-9">
                    <select class="form-control"  name="MGRSSN">
                    <option selected>select MGRSSN</option>
                    <?php foreach ($employees as $employee) : ?>
                    <option value="<?= $employee['SSN'] ?>"><?=  $employee['Fname'] ?></option>
                    <?php endforeach ;?>
                    </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label
                        for="MGRStartDate"
                        class="col-sm-3 text-end control-label col-form-label"
                        >MGRStartDate</label
                      >
                      <div class="col-sm-9">
                        <input
                          type="date"
                          class="form-control"
                          id="MGRStartDate"
                          placeholder="First Name Here"
                          name="MGRStartDate"
                        />
                      </div>
                    </div>
                  <div class="border-top">
                    <div class="card-body">
                      <button type="submit" name="submit" class="btn btn-primary">
                        Add
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- End Page Content -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
          <?php include_once '../includes/footer.php' ?>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php include_once '../includes/scripts.php' ?>
    <!-- This Page JS -->

  </body>
</html>
