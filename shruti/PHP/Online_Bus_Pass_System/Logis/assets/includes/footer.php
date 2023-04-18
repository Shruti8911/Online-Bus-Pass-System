<!-- footer section -->

<footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.php" class="logo d-flex align-items-center">
            <span>Little Intro - </span>
          </a>
          <p>" Online Bus  Pass System is Online Pass booking system that you guys can apply for pass booking online . "<br> Thank You &nbsp;&nbsp; :)</p>
          <div class="social-links d-flex mt-4">
            <a href="https://twitter.com/ShrutiK_01" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://github.com/Shruti8911" class="github"><i class="bi bi-github"></i></a>
            <a href="https://www.instagram.com/shrutiiii_k_/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/in/shruti-kothekar-3a7739212/" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#service">Services</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <!-- <li><a href="#">Web Design</a></li> -->
            <!-- <li><a href="#">Web Development</a></li> -->
            <li><a href="#">Software Development</a></li>
            <li><a href="#">Frontend Development</a></li>
            <li><a href="#">Backend Development</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <?php 
               include "admin/includes/config.php";
               $sql = "SELECT *FROM tblpage WHERE PageType = 'contactus' ";
               $result =  mysqli_query($conn, $sql) or die("Query Failed !");
               if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
              ?> 
          <p><?php  echo $row['PageDescription'];?><br><br>
            <strong>Phone:</strong>&nbsp;&nbsp;&nbsp;&nbsp; <?php  echo $row['MobileNumber'];?><br>
            <strong>Email:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php  echo $row['Email'];?><br>
          </p>
          <?php }} ?>
        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span> " ONLINE BUS PASS SYSTEM " </span></strong>. All Rights Reserved
      </div>
      <!-- <div class="credits">
        Designed by <a href="">Our Group&nbsp;&nbsp; :) </a>
      </div> -->
    </div>

  </footer>

    <!-- end footer -->