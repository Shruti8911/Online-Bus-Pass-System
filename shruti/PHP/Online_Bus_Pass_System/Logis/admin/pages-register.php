<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register here</title>
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
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <!-- <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"> -->
            <div class=" col-md-5 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="idashboard.php" class="logo d-flex align-items-center w-auto">
                  <!-- <img src="assets/img/logo.png" alt=""> -->
                  <!-- <span class="d-none d-lg-block">Sign-Up</span> -->
                </a>
              </div>
              <!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Sign-up</h5>
                  </div><!-- style='font-size:13px;font-weight:600;'  -->
                  <?php 
                  include "includes/config.php";
                  if(isset($_POST['submit'])){
                    $email     = mysqli_real_escape_string($conn , $_POST['email']);
                    $contact   = mysqli_real_escape_string($conn , $_POST['cnumber']);
                    $username  = mysqli_real_escape_string($conn , $_POST['username']);
                    $password  = mysqli_real_escape_string($conn , $_POST['password']);
                    $cpassword = mysqli_real_escape_string($conn , $_POST['cpassword']);

                    $pass  = password_hash($password, PASSWORD_BCRYPT);
                    $cpass = password_hash($password, PASSWORD_BCRYPT);

                    $emailquery = "SELECT *FROM signup WHERE email = '{$email}' ";
                    $query = mysqli_query($conn, $emailquery) or die("Email query Failed !");
                    $emailcount = mysqli_num_rows($query);

                    if($emailcount > 0){
                      echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                             Email is already Exist :)!!
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    }else{
                      if($password === $cpassword){
                        $insertquery = "INSERT INTO signup (email, username , contact, password, cpassword) VALUES ('{$email}','{$username}','{$contact}', '{$pass}', '{$cpass}') ;";
                        $iquery = mysqli_query($conn, $insertquery) or die("Insert Query Failed !");
                              if($iquery){
                                 echo  "<div  class='alert alert-success success-dismissible fade show' role='success'>
                                       Sign Up Successfully !!
                                       <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></ button></div>";
                                  header("Location: {$hostname}/admin/pages-login.php");
                                     
                                       // send mail for successfully sign-up 
                                      include 'includes/PHPMailer-master/src/PHPMailer.php';
                                      include 'includes/PHPMailer-master/src/SMTP.php';

                                      $html = "Dear $username,<br> &nbsp;&nbsp;&nbsp;&nbsp; Your account has been successfully created , Please login . <br>&nbsp;&nbsp;&nbsp;&nbsp;<p>Thank You.</p><br><br><table>
                                      <tr><td>UserName : </td><td>$username </td></tr>
                                      <tr><td>Email Id : </td><td>$email</td></tr>
                                      <tr><td>Contact  : </td><td>$contact</td></tr></table>";

                                      $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                      $mail->IsSMTP();
                                      $mail->Host="smtp.gmail.com";
                                      $mail->Port=587;
                                      $mail->SMTPSecure ="tls";
                                      $mail->SMTPAuth=true;
                                      $mail->Username="techi4799@gmail.com";
                                      $mail->Password="chkglrzxfeuuwcjd";
                                      $mail->SetFrom("techi4799@gmail.com", "InfoTech");
                                      $mail->AddAddress($email,$username);
                                      $mail->IsHTML(true);
                                      $mail->Subject="$username you are SignUp Successfully";
                                      $mail->Body=$html;
                                      $mail->SMTPOptions=array('ssl'=>array(
                                        'verify_peer'=>false,
                                        'verify_peer name'=>false,
                                        'allow_self_signed'=>false
                                      ));
                                      if($mail->send()){
                                        echo  "<script>
                                               console.log('Email successfully send !');
                                               </script>";
                                      }else{
                                        echo  "<script>
                                               console.log('Failed to send email !..');
                                               </script>";
                                      }

                              }else{
                                  echo  '<div  style="font-size:13px;font-weight:600;" class="alert alert-danger alert-dismissible fade show" role="alert">
                                  Error to registration :) !!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></ button></div>';
                              }
                      }else{
                            echo  '<div  style="font-size:13px;font-weight:600;" class="alert alert-danger            alert-dismissible fade show" role="alert">
                            Error ! Password are not matching :) !!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                      }
                    }
                  }
                  ?>

                  <form class="row g-3 needs-validation" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" novalidate>

                    <div class="col-12">
                      <label for="Phone" class="form-label"> Email</label>
                      <input type="email" name="email" class="form-control" id="Email" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12"> 
                      <label for="Phone" class="form-label">Contact Number</label> 
                      <input type="text" name="cnumber" class="form-control" id="Phone" maxlength="10" pattern="[0-9]+" required> 
                      <div class="invalid-feedback">Please enter a valid Phone adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="Username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="Username"  autocomplete="off" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="Password"  autocomplete="off" required>
                      <div class="invalid-feedback">Please enter  password!</div>
                    </div>

                    <div class="col-12">
                      <label for="Cpassword" class="form-label">Confirm Password</label>
                      <input type="password" name="cpassword" class="form-control" id="Cpassword" required>
                      <div class="invalid-feedback">Please enter  confirm password !</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-dark w-100" name="submit" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="pages-login.php">Log in</a></p>
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
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>