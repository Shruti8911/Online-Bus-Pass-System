<!-- hgan-qrdu-upmj-hqxp-dzgi -->

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
              <h2>View Pass</h2>
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

    <!-- ======= Featured Services Section ======= -->
    <!-- End Featured Services Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <!-- <span>View Pass</span> -->
          <h2>Enter Pass Number</h2>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">
            <div class="accordion accordion-flush" id="faqlist">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    "You Can simply enter your provided 9-Digit pass number and check that, You are able to access it. Please Check Your Bus Pass is 'ready Or Not' "!
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body text-center">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                        <label><strong>Enter 9-Digit Pass Number Only </strong></label>
                        <input type="text" name="enterpassnumber" class="form-control mt-3" id="enterpassnumber" placeholder="Your pass number" required>
                        <button class="btn btn-primary m-3" tyoe="submit" name="submit" id="submit">Show Pass</button><br>
                    </form>
                         
                        <?php 
                        if(isset($_POST['submit'])){
                          $searchdata=$_POST['enterpassnumber'];
                         ?>

                        <p>Result against " <strong> <?php echo $searchdata ?> </strong> " keyword</p>

                          <div class="container">
                            <table class="table table-bordered datatable">
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
                                  include "admin/includes/config.php";
                                  $sql = "SELECT *FROM tblpass WHERE PassNumber LIKE '$searchdata%'";
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
                                  <td><a href="downloadpass.php?id=<?php echo $row['ID'];?>">View</a>  </td>
                                </tr>
                                <?php $count++; }}else{ ?>
                                  <tr><td colspan="8"> No record found against this search</td></tr>
                                <?php }} ?>
                              </tbody>
                            </table>
                          </div> <?php //} ?>
                  </div>
                </div>
              </div><!-- # Faq item-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->

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






