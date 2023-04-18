<?php
// if(isset($_SESSION['username'])){
//   header("Location: {$hostname}/admin/pages-login.php");
//   // echo "<script>
//   //       window.location.href = ‘pages-login.php’;
//   //       </script>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard </title>
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
  <?php include 'includes\header.php';?>
  <!-- ======= End Header ======= -->


  <!-- ======= Sidebar ======= -->
  <?php  include 'includes\sidebar.php'; ?>
  <!-- End Sidebar-->

    <!-- #main -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!--  Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">  Total <span> |  Category</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-list"></i>
                    </div>
                    <div class="ps-3">
                         <?php
                           //TOTAL Category Generated
                           include "includes/config.php";
                           $sql = "SELECT *FROM tblcategory";
                           $result = mysqli_query($conn, $sql) or die("Query Failed !");
                           $count = mysqli_num_rows($result) 
                        ?>
                      <h6><?php echo $count; ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $count.' Category'; ?></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End  Card -->
            <!--  Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">  Total <span> |  Pass Genrated</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar3"></i>
                    </div>
                    <div class="ps-3">
                         <?php
                           //TOTAL Passes Generated
                           include "includes/config.php";
                           $sql = "SELECT *FROM tblpass";
                           $result = mysqli_query($conn, $sql) or die("Query Failed !");
                           $count = mysqli_num_rows($result) ;
                        ?>
                      <h6><?php echo $count; ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $count.' Total Passes'; ?></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End  Card -->
            <!--  Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">  Total <span> |  Pass Genrated Today</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-plus"></i>
                    </div>
                    <div class="ps-3">
                         <?php
                           //TOTAL Today Generated Pass
                           include "includes/config.php";
                           $sql = "SELECT ID FROM tblpass where date(PasscreationDate)=CURDATE()";
                           $result = mysqli_query($conn, $sql) or die("Query Failed !");
                           $count = mysqli_num_rows($result) ;
                        ?>
                      <h6><?php echo $count; ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $count.' Today Passes'; ?></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End  Card -->

             <!--  Card -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                
                <div class="card-body">
                  <h5 class="card-title">Total <span> |  Pass Genrated Yesterday</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar-minus"></i>
                    </div>
                    <div class="ps-3">
                    <?php
                        //TOTAL Today Generated Pass
                           include "includes/config.php";
                           $sql = "SELECT ID FROM tblpass where date(PasscreationDate)=CURDATE()-1";
                           $result = mysqli_query($conn, $sql) or die("Query Failed !");
                           $count = mysqli_num_rows($result) ;
                        ?>
                      <h6><?php echo $count; ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $count.' Yesterday Passes'; ?></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

             <!-- card pass -->
             <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
               
                <div class="card-body">
                  <h5 class="card-title"> Total<span> |  Pass Genrated Of Last 7 Days</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar2-week"></i>
                    </div>
                    <div class="ps-3">
                    <?php
                       //Yesterday Pass Generated
                           include "includes/config.php";
                           $sql = "SELECT ID FROM tblpass where date(PasscreationDate)>=(DATE(NOW()) - INTERVAL 7 DAY)";
                           $result = mysqli_query($conn, $sql) or die("Query Failed !");
                           $count = mysqli_num_rows($result) ;
                        ?>
                      <h6><?php echo $count; ?></h6>
                      <span class="text-success small pt-1 fw-bold"><?php echo $count.' Passes Last 7 Days Passes'; ?></span> 
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End pass Card -->

            <!-- Recent Pass -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <!-- <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div> -->

                <div class="card-body">
                  <h5 class="card-title">Recent Pass Genrated <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                      <th  scope="col" >S.NO</th>
                      <th  scope="col" >Pass Number</th>
                      <th  scope="col" >Full Name</th>
                      <th  scope="col" >Contact Number</th>
                      <th  scope="col" >Email</th>
                      <th  scope="col" >Creation Date</th>
                      <th  scope="col" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                        include "includes/config.php";
                        $sql = "SELECT *FROM tblpass where date(PasscreationDate)=CURDATE()";
                        $result = mysqli_query($conn, $sql) or die ("Fatch Data Query Failed !");
                        $count=1;
                        if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                      <tr>
                        <td><?php  echo $count; ?>                  </td>
                        <td><?php  echo $row['PassNumber']; ?>      </td>
                        <td><?php  echo $row['FullName']; ?>        </td>
                        <td><?php  echo $row['ContactNumber']; ?>   </td>
                        <td><?php  echo $row['Email']; ?>           </td>
                        <td><?php  echo $row['PasscreationDate']; ?></td>
                        <td><a href="view-pass-detail.php?id=<?php echo $row['ID'];?>">View</a>  ||  <a href="edit-pass-detail.php?id=<?php echo $row['ID'];?>">Edit</a></td>
                      </tr>
                      <?php $count++; }} ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->

            
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

        </div>
        <!-- End Right side columns -->

      </div>
    </section>

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php  include 'includes\footer.php'; ?>
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