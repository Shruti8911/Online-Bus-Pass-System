<?php
session_start();
include_once('includes/config.php');
if(isset($_POST['submit'])){
    
    $pagetitle      =  $_POST['pagetitle'];
    $pagedes        =  $_POST['pagedes'];
    $email          =  $_POST['email'];
    $mobnum         =  $_POST['mobnum'];

    $sql = "UPDATE tblpage SET PageTitle = '{$pagetitle}' , PageDescription = '{$pagedes}' , Email = '{$email}', MobileNumber = '{$mobnum}' WHERE PageType = 'contactus' ";
    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Contact Us Detailes has been Successfully Updated !');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Contact Us Page</title>
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
      <h1>Contact Us Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add-pass.php">Contact Us Page</a></li>

          <!-- <li class="breadcrumb-item">Forms</li> -->
          <!-- <li class="breadcrumb-item active">Layouts</li> -->
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-auto">
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact Us Page</h5>
              <?php 
               $sql = "SELECT *FROM tblpage WHERE PageType = 'contactus' ";
               $result =  mysqli_query($conn, $sql) or die("Query Failed !");
               if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
              ?>
              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Page Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="pagetitle" id="pagetitle" required="true" value="<?php  echo $row['PageTitle'];?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                  <textarea type="text" name="pagedes" id="pagedes" required="true"class="form-control"><?php  echo $row['PageDescription'];?></textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email </label>
                  <div class="col-sm-10">
                    <input type="email"name="email" id="email" class="form-control" required='true' value= "<?php  echo $row['Email'];?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Mobile Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="mobnum" id="mobnum" required="true" value="<?php  echo $row['MobileNumber'];?>" class="form-control" maxlength="10" pattern="[0-9]+">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" id="submit" class="btn btn-primary">Add Form</button>
                  </div>
                </div>

              </form>
              <!-- End General Form Elements -->
              <?php }} ?>

            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once('includes/footer.php'); ?>
<!-- End Footer -->

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