
<?php
session_start();

if(isset($_POST['submitchange'])){
    include_once('includes/config.php');
    $admin_id = mysqli_real_escape_string( $conn, $_POST['admin_id']);
    $adminname = mysqli_real_escape_string( $conn , $_POST['adminname']);
    $username = mysqli_real_escape_string( $conn , $_POST['username']);
    $adminmobileno = mysqli_real_escape_string( $conn , $_POST['adminmobileno']);
    $adminemail = mysqli_real_escape_string( $conn , $_POST['adminemail']);
    // $adminregdate = mysqli_real_escape_string( $conn , $_POST['adminregdate']);

    $sql = " UPDATE tbladmin SET AdminName ='{$adminname}', MobileNumber ='{$adminmobileno}', Email ='{$adminemail}' WHERE UserName = 'admin' ";  //, AdminRegdate ='{$adminregdate}'

    if(mysqli_query($conn, $sql)){
        echo '<script>
                  alert("Profile Updated Successfully !!");
              </script>';
          header("location: {$hostname}/admin/dashboard.php");
    }else{
        echo '<script>
                  alert("Something Error Occure !!");
              </script>';
    }
}

if(isset($_POST['submitpass'])){
  include "includes/config.php";
  $curpassword  = md5($_POST['curpassword']);
  $newpassword  = md5($_POST['newpassword']);
  $conpassword  = md5($_POST['conpassword']);
  $username=$_SESSION['username'];
 //  $admin_id = $_GET['ID'];
  $sql = "SELECT Password FROM tbladmin WHERE Password = '{$curpassword}' AND UserName = '{$username}' ";
  //SELECT password FROM userinfo where password='$oldpass' && email='$useremail'");
  $result = mysqli_query($conn, $sql) or die("Password Query Failed ! ");
  if(mysqli_num_rows($result) > 0){
   $sql1 = "UPDATE tbladmin SET Password = '{$newpassword}' WHERE UserName = 'admin' ";
   $change_pwd = mysqli_query($conn, $sql1) or die("Change password query Failed !");
      //  $_SESSION['msg1']="Password Changed Successfully !!";
       echo '<script>
             alert("Password Changed Successfully !!");
         </script>';
       echo "<script>window.location.href ='change-password.php'</script>";
  }else{
      // $_SESSION['msg1']="Old Password not match !!";
      echo '<script>
             alert("Old Password not match !!");
         </script>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Admin Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet"></head>
</head>
<body>
  <!-- ======= Header ======= -->
  <?php include_once('includes/header.php'); ?>
  <!-- End Header -->
  <!-- ======= Sidebar ======= -->
  <?php include_once('includes/sidebar.php'); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active" >Admin Profile</li>
          <!-- <li class="breadcrumb-item active"></li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row"><!-- row -->
        
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <img src="assets/img/picon2.jpg" alt="Profile" class="rounded-circle"> 
              <!-- profile-img -->
              <?php
                  include 'includes/config.php';
                  $sql = "SELECT *FROM tbladmin";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
              <h2><?php echo $row['AdminName']; ?></h2>
              <h3><strong><?php echo $row['UserName']; ?></strong></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div><?php }} ?>
            </div>
          </div>
        </div>

        <div class="col-xl-8"><!-- col -->
          <div class="card"> <!-- card -->
            <div class="card-body pt-3"><!-- Bordered Tabs -->
              
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>
                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>
              </ul>

              <div class="tab-content pt-2"><!-- Three Tabs -->
              <?php
                  include 'includes/config.php';
                  $sql = "SELECT *FROM tbladmin";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                      
                  ?>
                <!-- Overview  -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>
                  <h5 class="card-title">Profile Details</h5> -->
                  
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label d-none">Admin Id</div>
                    <div class="col-lg-9 col-md-8 d-none"><?php echo $row['ID']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Admin Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['AdminName']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">User Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['UserName']; ?></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact No </div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['MobileNumber']; ?>
                  </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['Email']; ?></div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Admin Registration Date</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['AdminRegdate']; ?></div>
                  </div> -->
                </div>
                <?php }} ?>
                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->


                <form method="post" action="">
                 <?php
                  include 'includes/config.php';
                  $sql = "SELECT *FROM tbladmin";
                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                  ?>                   
                   <!-- <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                       <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div> -->
                    <div class="row mb-3">
                      <label for="Admin name" class="col-md-4 col-lg-3 col-form-label d-none">Admin Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="admin_id" type="text" class="form-control d-none" value="<?php //echo $row['ID']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Admin name" class="col-md-4 col-lg-3 col-form-label">Admin Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adminname" type="text" class="form-control"  
                        value="<?php echo $row['AdminName']; ?>">
                      </div>
                    </div>
                    <!-- <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div> -->
                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">User Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="username" type="text" class="form-control" value="<?php echo $row['UserName']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact No</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adminmobileno" type="text" class="form-control" value="<?php echo $row['MobileNumber']; ?>">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adminemail" type="email" class="form-control" value="<?php echo $row['Email']; ?>">
                      </div>
                    </div>
                    <!-- <div class="row mb-3">
                      <label for="Twitter" class="col-md-4 col-lg-3 col-form-label ">Admin Registration Date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="twitter" name='adminregdate' type="text" class="form-control" id="Twitter" value="<?php //echo $row['AdminRegdate']; ?>" readonly>
                      </div>
                    </div> -->
                    <div class="text-center">
                      <button type="submit" name="submitchange" class="btn btn-primary">Save Changes</button>
                    </div><?php }} ?>
                  </form><!-- End Profile Edit Form -->
                </div>
                
                <div class="tab-pane fade pt-3" id="profile-change-password">

                <!-- Change Password Form -->
                <form class="form" action="" method="post" name="changepwd_form" onsubmit="return checkpassword();">
                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="curpassword" id="curpassword"  type="password" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" id="newpassword" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirmed Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="conpassword" id="conpassword" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="changepass" id="change" class="btn btn-primary">Change Password</button>
                    </div>
                  </form>
                  <!-- End Change Password Form -->
<script type="text/javascript">
    //  validation
     let submit = document.getElementById("submit");
       function checkpassword(){
        if(document.changepwd_form.curpassword.value==""){
           alert("Old Password Filed is Empty !!");
           document.changepwd_form.curpassword.focus();
           return false;
        }
        else if(document.changepwd_form.newpassword.value=="")
        {
           alert("New Password Filed is Empty !!");
           document.changepwd_form.newpassword.focus();
           return false;
        }
        else if(document.changepwd_form.conpassword.value=="")
        {
           alert("Confirm Password Filed is Empty !!");
           document.changepwd_form.newpassword.focus();
           return false;
        }
        else if(document.changepwd_form.newpassword.value!= document.changepwd_form.conpassword.value)
        {
           alert("New Password and Confirm Password Field do not match !!");
           document.changepwd_form.conpassword.value.focus();
           return false;
        }
        return true;
       }
</script>
                </div>

              </div><!-- Three Tabs -->

            </div><!-- End Bordered Tabs -->
          </div><!-- end card -->
        </div><!-- end col -->

      </div><!-- end row -->
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once('includes/footer.php'); ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

</body>

</html>


