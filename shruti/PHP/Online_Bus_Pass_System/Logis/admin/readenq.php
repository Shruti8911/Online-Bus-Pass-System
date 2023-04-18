<?php
include "includes/config.php";

if(isset($_GET['id'])){
    $removeid= $_GET['id'];
    $sql = "DELETE FROM tblcontact WHERE ID = {$removeid}";
    if(mysqli_query($conn , $sql)){
    echo "<script>alert('Read Data deleted succesfully !');</script>"; 
    // echo "<script>window.location.href = 'manage-category.php'</script>"; 
}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Read Enquiries</title>
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
  <style>
    a:hover{
      color:white;
    }
  </style>
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
      <h1>Read Enquiries Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Read Enquiry Details</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

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
                  <h5 class="card-title">Read Enquiries Details<span>...</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Enquiry Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php 
                         include 'includes/config.php';
                         $sql = "SELECT *FROM tblcontact WHERE IsRead = '1' " ; 
                         $result = mysqli_query($conn ,$sql) or die("Query Failed !");
                         if(mysqli_num_rows($result) > 0){
                          $count = 1;
                          while($row = mysqli_fetch_assoc($result)){
                                
                         ?>
                      <tr>
                        <td><?php echo($count);?></td>
                        <td><?php echo $row['Name'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td><span class="badge bg-success"><?php echo $row['EnquiryDate'];?></span></td>
                        <td><a style="cursor:pointer;" class="badge bg-warning" href="view-enquiry.php?viewid=<?php echo $row['ID'];?>">View Details</a> ||  <a style="cursor:pointer;"  class="badge bg-danger" href="readenq.php?id=<?php echo $row['ID'];?>">Remove</a></td>
                      </tr>
                      <?php $count=$count+1; }} ?>
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