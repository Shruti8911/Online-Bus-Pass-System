<?php
// session_start();
if(isset($_POST['submit'])){
   include_once('includes/config.php');
   $viewid = $_GET['viewid'];
   $isread = 1;

   $Name         =  $_POST['fullname'];
   $Email        =  $_POST['email'];
   $Message      =  $_POST['message'];
   $MobileNumber =  $_POST['mobilenumber'];
   $sql = "UPDATE tblcontact SET Name='{$Name}',Email='{$Email}',Message='{$Message}',IsRead='{$isread}',MobileNumber='{$MobileNumber}' WHERE ID = {$viewid} ";
   if(mysqli_query($conn, $sql)){
    echo '<script>
           alert("Verified Details Updated Successfully !!");
       </script>';
       //header("location: {$hostname}/admin/dashboard.php");
    }else{
    echo '<script>
           alert("Something Error Occure !!");
          </script>';
     }
}

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

  <!-- ======= Header ======= -->
  <?php include_once('includes/header.php'); ?>
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include_once('includes/sidebar.php'); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>View Enquiry</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">View Enquiry</li>
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
              <h5 class="card-title">Add Pass Detailes</h5>
              <?php 
              include_once('includes/config.php');
              $viewid = $_GET['viewid'];
              $sql1 = "SELECT *FROM tblcontact WHERE ID=$viewid";
              $result1 = mysqli_query($conn, $sql1) or die("Query Failed ");
              if(mysqli_num_rows($result1) > 0){
                while($row = mysqli_fetch_assoc($result1)){
                  $count = 1;
            
              ?>
              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="fullname" class="form-control"required='true' value="<?php  echo $row['Name'];?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="number" name="mobilenumber" maxlength="10" pattern="[0-9]+" class="form-control" required='true' value="<?php  echo $row['MobileNumber'];?>">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" required='true' value="<?php  echo $row['Email'];?>">
                  </div>
                </div>
                
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Message</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="message"  placeholder="Message Here" style="height: 100px;"required='true'><?php  echo $row['Message'];?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" it="submit" class="btn btn-primary">Verify Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
              <?php $count++; }} ?>

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