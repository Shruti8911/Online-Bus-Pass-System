<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>| Online Bus Pass System |</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

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
  <?php include_once('assets/includes/header.php'); ?>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Download Pass</h2>
              <p>Your Pass is now ready to use - </p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Services</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Breadcrumbs -->    



    <!-- ======= Download Pass Section ======= -->
    <section class="section">
      <div class="row container m-5 p-5" id="divToPrint">
        <div class="col-lg-auto">
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Pass</h5>

                                    <?php 
                                     include 'admin/includes/config.php';
                                     $pass_id= $_GET['id'];
                                     $sql = "SELECT *FROM tblpass WHERE tblpass.ID={$pass_id}";
                                     $count=1;
                                     $result = mysqli_query($conn, $sql) or die("Query Failed ");
                                     if(mysqli_num_rows($result) > 0){
                                      while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                <table border="1" class="table table-bordered">
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
                                        <td colspan="3"><img src="admin/images/<?php  echo $row['ProfileImage'];?>" width="50" height="50"></td>
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
    <!-- End Download Pass Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once('assets/includes/footer.php'); ?>
  <!-- End Footer -->


  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>