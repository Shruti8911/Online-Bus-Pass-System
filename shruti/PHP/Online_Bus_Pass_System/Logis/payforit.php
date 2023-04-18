
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
              <h2>Pay Now</h2>
              <p>Your Charges to pay online , Genral Pricing but, Your km distance depends on pricing. thank you</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>payment</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Featured Services Section ======= -->
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <!-- <span>Genral Pricing but, Your km distance depends on pricing. thank you</span> -->
          <h2>Pricing</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-item">
              <h3>Monthly Plan</h3>
              <h4><sup>Rs.</sup>500<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> 15km - 500 Rs.</li>
                <li><i class="bi bi-check"></i> Per Month</li>
              </ul>
              <form action="/shruti/PHP/Online_Bus_Pass_System/Logis/apply.php" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="pk_test_51MkKijSIROyDJhjlH5MksunSIM047iC9bwm0gRhENhHTCBULBwLQ8FxmDhpF6DebnveuIaTY3phzSAleJRYZIVlM00Po5MCt8g"
                data-name="Bus Pass Payment Online"
                data-description="Id - #123456"
                data-amount="50000"
                data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzvHSw1ZOLrJ1lYvlUxtEfUORopJRh1-2rPqkW8uyWH9pmbo2PfSoQ2Q33MhvtkO7LF-Q&usqp=CAU"
                data-currency="inr"
                data-label="Pay Now">
              </script>
              </form>
            </div>
          </div>

          <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing-item ">
              <h3>Business Plan</h3>
              <h4><sup>Rs.</sup>1000<span> 2 month</span></h4>
              <ul>
              <li><i class="bi bi-check"></i>  25km - 800 Rs.</li>
              <li><i class="bi bi-check"></i> Two Month Duration</li>
              </ul>
              <form action="/shruti/PHP/Online_Bus_Pass_System/Logis/apply.php" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="pk_test_51MkKijSIROyDJhjlH5MksunSIM047iC9bwm0gRhENhHTCBULBwLQ8FxmDhpF6DebnveuIaTY3phzSAleJRYZIVlM00Po5MCt8g"
                data-name="Bus Pass Payment Online"
                data-description="Id - #123456"
                data-amount="100000"
                data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzvHSw1ZOLrJ1lYvlUxtEfUORopJRh1-2rPqkW8uyWH9pmbo2PfSoQ2Q33MhvtkO7LF-Q&usqp=CAU"
                data-currency="inr"
                data-label="Pay Now">
              </script>
              </form>
            </div>
          </div>

          <div class="col-lg-4 text-center" data-aos="fade-up" data-aos-delay="300">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <h4><sup>Rs.</sup>1500<span> 3 month</span></h4>
              <ul>
              <li><i class="bi bi-check"></i>  35km - 1000 Rs.</li>
              <li><i class="bi bi-check"></i> Three Month Duration</li>
              </ul>
              
              <form action="/shruti/PHP/Online_Bus_Pass_System/Logis/apply.php" method="POST">
              <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="pk_test_51MkKijSIROyDJhjlH5MksunSIM047iC9bwm0gRhENhHTCBULBwLQ8FxmDhpF6DebnveuIaTY3phzSAleJRYZIVlM00Po5MCt8g"
                data-name="Bus Pass Payment Online"
                data-description="Id - #123456"
                data-amount="150000"
                data-image="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzvHSw1ZOLrJ1lYvlUxtEfUORopJRh1-2rPqkW8uyWH9pmbo2PfSoQ2Q33MhvtkO7LF-Q&usqp=CAU"
                data-currency="inr"
                data-label="Pay Now">
              </script>
              </form>

            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Pricing Section -->
    <!-- End Featured Services Section -->
    
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Testimonials Section -->

    <!-- <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <span>Frequently Asked Questions</span>
          <h2>Frequently Asked Questions</h2>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">
            <div class="accordion accordion-flush" id="faqlist">
              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    
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

