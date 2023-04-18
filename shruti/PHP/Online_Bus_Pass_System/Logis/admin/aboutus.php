<?php 
// if(isset($_POST['submit'])){
//   $pagetitle = $_POST['pagetitle'];
//   $pagedes   = $_POST['pagedes'];
//   include 'includes/config.php';
//   $sql = "UPDATE tblpage SET PageTitle='{$pagetitle}',PageDescription = '{$pagedes}', WHERE PageType = 'aboutus' ";
//   if(mysqli_query($conn, $sql)){
//     echo "<script>alert('About us has been updated succesfully')</script>";
//     echo "<script>window.location.href ='aboutus.php'</script>";
//   }
//   }

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
  <link href="assets/css/style.css" rel="stylesheet">
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
      <h1>Easy Search </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Recent Pass <span>| Today</span></h5>
              <!-- form -->
              <form method="post" action="" enctype="multipart/form-data" class="row g-3">
                
                <?php
                // include 'includes/config.php';
                // $sql = "SELECT *FROM  tblpage WHERE PageType='aboutus'";
                // $result = mysqli_query($conn, $sql) or die("Connection Failed ");
                // if(mysqli_num_rows($result) > 0){
                //   while($row = mysqli_fetch_assoc($result)){

                //     $count = 1;
                ?>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label fw-bold">Page Title</label>
                  <input type="text" name="pagetitle" id="pagetitle" required="true" value="<?php // echo $row['PageTitle'] ?>" class="form-control">
                </div>
                
                <div class="col-12">
                  <label for="inputNanme4" class="form-label fw-bold">Page Description</label>
                  <div><textarea  style="height:200px" type="text" name="pagedes" id="pagedes" required="true"class="form-control"><?php //echo $row['PageDescription']; ?></textarea></div>
                </div>

                <?php //$count++ ; }} ?>

                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Add </button>
                </div>

              </form>
            </div>
          </div>

              </div>
            </div>
            <!-- End Recent Sales -->

          </div>
        </div>
        <!-- End Left side columns -->

      </div>
    </section>

  </main>
  <!-- End #main -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>