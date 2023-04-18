
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

<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>
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
      <h1>View Pass</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row" id="divToPrint">
        <div class="col-lg-auto">
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Pass</h5>

                                    <?php 
                                     include 'includes/config.php';

                                     $pass_id= $_GET['id'];
                                   
                                    // $sql = "SELECT tblpass.FullName,tblpass.PassNumber,tblpass.ProfileImage,tblpass.ContactNumber,tblpass.Email,tblpass.IdentityType,tblpass.IdentityCardno,tblpass.Category,tblpass.FromDate,tblpass.ToDate,tblpass.Cost,tblpass.PasscreationDate,tblpass.Source,tblpass.Destination,tblcategory.CategoryName,tblcategory.ID FROM tblpass 
                                    // LEFT JOIN tblcategory ON tblpass.Category = tblcategory.ID WHERE tblpass.ID={$pass_id}";

                                    $sql = "SELECT *FROM tblpass WHERE tblpass.ID={$pass_id}";
                                                                         
                                     $count=1;

                                     $result = mysqli_query($conn, $sql) or die("Query Failed ");

                                     if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_assoc($result)){
                                    ?>
             
              <!-- Table with hoverable rows -->
              <table border="1" class="table table-bordered"><!-- class="table table-hover"  -->
                                    <tr align="center">
                                        <td colspan="6" style="font-size:20px;color:blue">Pass ID: <?php  echo $row['PassNumber'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Category</th>
                                        <td colspan="3"><?php  echo $row['Category'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Full Name</th>
                                        <td colspan="3"><?php  echo $row['FullName'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Photo</th>
                                        <td colspan="3"><img src="images/<?php  echo $row['ProfileImage'];?>" width="50" height="50"></td>
                                    </tr>
                                    <tr>
                                        <th scope>Mobile Number</th>
                                            <td><?php  echo $row['ContactNumber'];?></td>
                                        <th scope>Email</th>
                                            <td><?php  echo $row['Email'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Identity Type</th>
                                            <td><?php  echo $row['IdentityType'];?></td>
                                        <th scope>Identity Card Number</th>
                                            <td><?php  echo $row['IdentityCardno'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>Source</th>
                                            <td><?php  echo $row['Source'];?></td>
                                        <th scope>Destination</th>
                                            <td><?php  echo $row['Destination'];?></td>
                                    </tr>
                                    <tr>
                                        <th scope>From Date</th>
                                            <td><?php  echo $row['FromDate'];?></td>
                                        <th scope>To Date</th>
                                            <td><?php  echo $row['ToDate'];?></td>
                                    </tr>
                                      <tr>
    
                                        <th scope>Cost</th>
                                            <td><?php  echo $row['Cost'];?></td>
                                        <th scope>Pass Creation Date</th>
                                            <td><?php  echo $row['PasscreationDate'];?></td>
                                    </tr>
              </table>
              <!-- End Table with hoverable rows -->
              <?php }} ?>
              <p style="text-align: center;font-size: 20px;color: red">
              <input type="button" class="btn btn-primary" value="print" onclick="PrintDiv();" /></p>

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