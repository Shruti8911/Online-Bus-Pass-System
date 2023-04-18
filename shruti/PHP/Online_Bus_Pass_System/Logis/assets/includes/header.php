
<!-- header -->

<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
      <img src="https://png.pngtree.com/png-vector/20221006/ourmid/pngtree-red-bus-touring-vector-illustration-png-image_6285537.png" style="width:50px; ">  
      <h1>Travel Agency</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="ourteam.php">Our Team</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <!-- <li><a href="contact.php">View Pass</a></li> -->
          <?php 
          session_start(); 
          if (isset($_SESSION['username'])) {
            echo "<li><a class='get-a-quote' href='admin/logout.php'>Logout</a></li>";
            // echo "<li><a class='get-a-quote' href='admin/pages-register.php'>Sign-Up</a></li>";
          }else{
            echo "<li><a class='get-a-quote' href='admin/pages-login.php'>Login</a></li>";
            echo "<li><a class='get-a-quote' href='admin/pages-register.php'>Sign-Up</a></li>";
          }
          ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>

<!-- end header -->


