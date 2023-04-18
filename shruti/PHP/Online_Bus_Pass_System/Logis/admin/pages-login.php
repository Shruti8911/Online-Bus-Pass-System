<?php 
include 'includes/config.php';
session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
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
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="dashboard.php" class="logo d-flex align-items-center w-auto">
                </a>
              </div>
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login Account</h5>
                  </div>
                  <?php 
                   include 'includes/config.php';
                   //for user only
                   if(isset($_POST['login'])){
                     $password = $_POST['password'];
                     $username = $_POST['username'];
                     $sql = "SELECT *FROM signup WHERE username = '{$username}' ";
                     $result = mysqli_query($conn, $sql) or die("Query Failed !");
                     $row = mysqli_num_rows($result);
                     if($row){
                       $row = mysqli_fetch_assoc($result);  
                       $dbpass = $row['password'];
                       $_SESSION['username'] = $row['username'];
		                   $_SESSION["id"]= $row['id'];
                       $passdecode = password_verify($password , $dbpass);
                        if($passdecode){
                                  header("Location: {$hostname}/");
                                  echo  "<script>
                                         alert('User Login Successfully :) !!');
                                         </script>";
                        }else{
                                   echo  '<div  style="font-size:13px;font-weight:600;" class="alert alert-danger  alert-dismissible fade show" role="alert">
                                   Incorrect password, Please Enter valid password !!
                                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        }
                     }else{
                         echo  '<div style="font-size:13px;font-weight:600;" class="alert alert-danger alert-dismissible fade show" role="alert">
                         Invalid Email ,Please Enter valid email.
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                     }
                   }
                   // for admin only
if(isset($_POST['login'])){
  include 'includes/config.php';
  $username= mysqli_real_escape_string($conn, $_POST['username']);
  $password= md5($_POST['password']); //md5 encrypt the password first
  
  $sql = "SELECT ID, UserName, Password FROM tbladmin WHERE UserName='{$username}' AND Password='{$password}'";
  $result = mysqli_query($conn , $sql) or die("Admin Query failed");
   
  if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
    $_SESSION["adminname"] = $row['AdminName'];
    $_SESSION["username"]  = $row['UserName'];
    $_SESSION["id"]        = $row['ID'];
    header("Location: {$hostname}/admin/dashboard.php");
     }
  }else{
        echo "<script language = 'javascript'>";
        echo "alert('Error , Username and password are not matched ! ')";
        echo "</script>";
  }
 }else{
       echo "<script>
             window.location.href = ‘pages-login.php’;
             </script>";
      // header("Location: {$hostname}/admin/pages-login.php");
 }
                  ?>

                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input class="form-control"type="text" placeholder="Username" name="username" autocomplete="off"  required/>  
                        <div class="invalid-feedback">Please Enter Username</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input class="form-control" type="password" placeholder="password" name="password"   autocomplete="off"  required />
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <!-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="login" value="Sign In" type="submit">Login</button>
                    </div>
                    <div class="col-12 text-center"><br>
                    <p class="small mb-0">Forget Password ?  <a href="forgetpass.php">Click Here</a></p>
                      <p class="small mb-0">Don't have account? <a href="pages-register.php">Create an account</a></p>
                      <p class="small mb-0"><a href='http://localhost/shruti/PHP/Online_Bus_Pass_System/Logis/' style="font-weight:800">Back To Website</a></p>
                    </div>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

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




<?php

 ?>