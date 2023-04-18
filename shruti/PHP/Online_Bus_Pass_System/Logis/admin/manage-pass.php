
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Manage Pass Details</title>
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
      <h1>Manage Pass Details</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="manage-pass.php">Manage Pass Details</a></li>

          <!-- <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li> -->
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
              <h5 class="card-title">Manage Pass Details</h5>

             
              <!-- Table with hoverable rows -->
              <table class="table table-hover table-borderless datatable">
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
                  $sql = "SELECT *FROM tblpass";
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
                    <td><span class="badge bg-success "><?php  echo $row['PasscreationDate']; ?></span></td>
                    <td><a href="view-pass-detail.php?id=<?php echo $row['ID'];?>">View</a>  ||  <a href="edit-pass-detail.php?id=<?php echo $row['ID'];?>">Edit</a></td>
                  </tr>
                <?php $count++; }} ?>
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->
           
              

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