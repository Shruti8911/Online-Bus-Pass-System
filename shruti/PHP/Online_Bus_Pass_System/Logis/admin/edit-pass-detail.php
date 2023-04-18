<?php
if(isset($_POST['submit'])){
    include 'includes/config.php';
    $pass_id        =  $_GET['id'];

    $sql = "SELECT *FROM tblpass WHERE tblpass.ID = {$pass_id}";
    $result = mysqli_query($conn, $sql) or die("Query Failed ");
    
    $fullname       =  $_POST['fullname'];
    $cnumber        =  $_POST['cnumber'];
    $email          =  $_POST['email'];
    $identitytype   =  $_POST['identitytype'];
    $icnum          =  $_POST['icnum'];
    $catname        =  $_POST['category'];
    $source         =  $_POST['source'];
    $destination    =  $_POST['destination'];
    // $fromdate       =  $_POST['fromdate'];
    // $todate         =  $_POST['todate'];
    $cost           =  $_POST['cost'];
    // $PasscreationDate=  $_POST['passcreationdate'];

        $sql = "UPDATE tblpass SET FullName = '{$fullname}', ContactNumber = '{$cnumber}', Email = '{$email}', IdentityType = '{$identitytype}', IdentityCardno = '{$icnum}',Category ='{$catname}'
        ,Source = '{$source}', Destination = '{$destination}', Cost = '{$cost}' where ID= {$pass_id} "; 

        //, FromDate = '{$fromdate}', ToDate = '{$todate}'
        // $result = mysqli_query($conn, $sql) or die("Query Failed !");
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("User details has been updated")</script>';
        }else{
            echo '<script>alert("Connection Failed to Update Profile picture !")</script>';
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
  <link href="assets/css/style.css" rel="stylesheet">
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
      <h1>Edit Pass Detailes</h1>
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
              <h5 class="card-title">Edit Pass Detailes</h5>
              
              <!-- Vertical Form -->
              <form method="post" enctype="multipart/form-data">
              
              <?PHP
                include_once('includes/config.php');
                $pass_id= $_GET['id'];
                $sql = "SELECT *FROM tblpass WHERE tblpass.ID={$pass_id}";
                $cnt=1;
                $result = mysqli_query($conn, $sql) or die("Query Failed ");
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
              ?>
               <p colspan="6" style="font-size:20px;color:blue;text-align: center;">
                  Pass ID:<?php echo $row['PassNumber'];?>
               </p>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text"name="fullname" value="<?php echo $row['FullName']; ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Profile Image</label>
                  
                  <!-- <a href="changeimage.php?id=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a> -->
                  <div class="col-sm-10">
                    <input class= "form-control" name="propic"  type="file" id="formFile" accept="image/*" >
                  </div>
                  <div class="col-sm-10">
                  <img class="my-2" src="images/<?php echo $row['ProfileImage'];?>" style= "width:110px; height:100px; margin-left:150px" value="<?php  echo $row['ProfileImage'];?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="number"name="cnumber" value="<?php  echo $row['ContactNumber'];?>" maxlength="10" pattern="[0-9]+" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value=" <?php echo $row['Email']; ?>"  class="form-control" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Identity Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="identitytype" aria-label="Default select example">
                       <option value="<?php echo $row['IdentityType'];?>"><?php  echo $row['IdentityType'];?></option>
                       <option value="Voter Card">Voter Card</option>
                       <option value="PAN Card">PAN Card</option>
                       <option value="Adhar Card">Adhar Card</option>
                       <option value="Student Card">Student Card</option>
                       <option value="Driving License">Driving License</option>
                       <option value="Passport">Passport</option>
                       <option value="Any Official Card">Any Official Card</option>
                       <option value="Any Other Govt Issued Doc">Any Other Govt Issued Doc</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Identity Card No.</label>
                  <div class="col-sm-10">
                    <input type="text" name="icnum" value="<?php echo $row['IdentityCardno']; ?>"  class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="category" aria-label="Default select example">
                       <option value="<?php  echo $row['Category'];?>"><?php  echo $row['Category'];?></option>
                       <?php
                       include_once('includes/config.php');
                        $sql1 = "SELECT *FROM tblcategory";
                        $result1 = mysqli_query($conn , $sql1) or die("Select Query failed");
                        if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){ 
                        ?>
                            <option value="<?php echo $row1['CategoryName']; ?>" selected>
                                <?php echo $row1['CategoryName']; ?>
                            </option>
                        <?php }} ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-10">
                    <input type="text" name="source" value="<?php echo $row['Source']; ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Destination</label>
                  <div class="col-sm-10">
                    <input type="text"name="destination"value="<?php echo $row['Destination']; ?>" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">From Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="fromdate"value="<?php echo $row['FromDate']; ?>" disabled class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">To Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="todate" value="<?php echo $row['ToDate']; ?>" disabled class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Cost</label>
                  <div class="col-sm-10">
                    <input type="text" name="cost" value="<?php echo $row['Cost']; ?>" class="form-control">
                  </div>
                </div>
                <?PHP $cnt=$cnt+1;}} ?>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" it="submit" class="btn btn-primary"> Form Update</button>
                  </div>
                </div>

              </form>
              <!-- Vertical Form -->
            
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