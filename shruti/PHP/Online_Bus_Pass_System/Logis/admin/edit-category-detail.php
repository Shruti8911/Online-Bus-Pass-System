<?php
if(isset($_POST['submit'])){
    // include 'includes/config.php';

    include_once('includes/config.php');
    $category_id= $_GET['id'];

    $sql = "SELECT *FROM tblcategory WHERE tblcategory.ID = {$category_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed ");

    $catname =  $_POST['catname'];

    $sql = "UPDATE tblcategory SET CategoryName ='{$catname}' WHERE tblcategory.ID = {$category_id} ";
    
    if(mysqli_query($conn, $sql)){
           echo '<script>
                  alert("Category Updated Successfully !!");
              </script>';
        //   header("location: {$hostname}/admin/dashboard.php");
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
      <h1>Add Bus Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
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
              <h5 class="card-title">Add Bus Category</h5>

              <?PHP
                                     include_once('includes/config.php');
                                     $category_id= $_GET['id'];
                                     $sql = "SELECT *FROM tblcategory WHERE tblcategory.ID = {$category_id}";
                                     $result = mysqli_query($conn, $sql) or die("Query Failed ");
                                     if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_assoc($result)){
                                ?>
              <p style="color:red;">
                <?php // echo $_SESSION['msg1'];?>
                <?php // echo $_SESSION['msg1']="";?>
              </p>
              <!-- Vertical Form -->
              <form method="post" action="" enctype="multipart/form-data" class="row g-3">
              
              <div class="form-group d-none">
                <label>Category Id</label>
                <input type="text" class="form-control" name="category_id" value="<?php echo $row['ID']; ?>" readonly>
             </div>
              
              <div class="col-12">
                  <label for="inputNanme4" class="form-label">Category Name</label>
                  <input type="text" name="catname" class="form-control" id="inputNanme4" value="<?php echo $row['CategoryName'] ?>" required='true'>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="submit" id="submit">Update Category</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form><!-- Vertical Form -->
              <?PHP }} ?>
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

</body>

</html>