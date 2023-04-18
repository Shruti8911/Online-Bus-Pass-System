<?php
session_start();
if(isset($_POST['submit'])){
    include 'includes/config.php';
    $pass_id        =  $_GET['id'];

    $sql = "SELECT *FROM tblpass WHERE tblpass.ID = {$pass_id}";
    
    $source      = $_POST['source'];
    $destination = $_POST['destination'];
    $fromdate    = $_POST['fromdate'];
    $todate      = $_POST['todate'];
    $cost        = $_POST['cost'];
    $passcreationdate = $_POST['passcreationdate'];

        $result = mysqli_query($conn, $sql) or die("Connection Failed");
        $row = mysqli_num_rows($result);
        if($row) {
          $row = mysqli_fetch_assoc($result);
          $oldfromdate = $row['FromDate'];
          $oldtodate   = $row['ToDate'];
          $email       = $row['Email'];
          $fullname    = $row['FullName'];
          $passnum     = $row['PassNumber'];
          $source      = $row['Source'];
          $destination = $row['Destination'];
          $passcreationdate = $row['PasscreationDate'];  

          if(($fromdate >= $oldfromdate) && ($todate <= $oldtodate)){
            echo '<script>alert("You entered expired date plz enter correct date !")</script>';
          }else{
            date_default_timezone_set('Asia/Kolkata');
            $passcreationdatechange = date('y/m/d h:i:s', time());

            $renewquery = "UPDATE tblpass SET Source = '{$source}', Destination ='{$destination}' , FromDate = '{$fromdate}' , ToDate = '{$todate}' , Cost = '{$cost}',PasscreationDate = '{$passcreationdatechange}'  where ID= {$pass_id} "; 
            $renewresult = mysqli_query($conn, $renewquery) or die("Insert Query Failed !");
            if($renewresult){
              echo '<script>alert("Your Buss Pass renewal has been Successfully done . Thank You")</script>';

               // send mail section
               include 'includes/PHPMailer-master/src/PHPMailer.php';
               include 'includes/PHPMailer-master/src/SMTP.php';
               $html = "Dear  $fullname,<br> &nbsp;&nbsp;&nbsp;&nbsp; Your account has been Renewed successfully.You can download your pass online on our website though entered this PassNumber is '$passnum' You can enter, And Check your pass .<br>&nbsp;&nbsp;&nbsp;&nbsp;<p>Thank You.</p><br><br>
               <table>
               <tr><td>Fullname     : </td><td>$fullname</td></tr>
               <tr><td>Source       : </td><td>$source</td></tr>
               <tr><td>Destination  : </td><td>$destination</td></tr>
               <tr><td>FromDate     : </td><td>$fromdate</td></tr>
               <tr><td>ToDate       : </td><td>$todate</td></tr>
               <tr><td>Cost         : </td><td>$cost</td></tr>
               <tr><td>Email        : </td><td>$email</td></tr>
               </table>";
               $mail = new  PHPMailer\PHPMailer\PHPMailer(true);
               $mail->IsSMTP();
               $mail->Host="smtp.gmail.com";
               $mail->Port=587;
               $mail->SMTPSecure ="tls";
               $mail->SMTPAuth=true;
               $mail->Username="techi4799@gmail.com";
               $mail->Password="chkglrzxfeuuwcjd";
               $mail->SetFrom("techi4799@gmail.com", "InfoTech");
               $mail->AddAddress($email, $fullname);
               $mail->IsHTML(true);
               $mail->Subject=" $fullname, your pass has been renewed Successfully";
               $mail->Body=$html;
               $mail->SMTPOptions=array('ssl'=>array(
                 'verify_peer'=>false,
                 'verify_peer name'=>false,
                 'allow_self_signed'=>false
               ));
               if($mail->send()){
                 echo  "<script>
                        console.log('renewal email successfully send !');
                        </script>";
               }else{
                 echo  "<script>
                        console.log('renewal mail failed to send email !..');
                        </script>";
               }//  end send email section


            }
          }
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
              <h5 class="card-title"> Pass Renewal</h5>
              
              <!-- Vertical Form -->
              <form method="post" enctype="multipart/form-data">
              
              <?PHP
                include_once('includes/config.php');
                $pass_id= $_GET['id'];
                $sql = "SELECT *FROM tblpass WHERE tblpass.ID={$pass_id}";
                $count=1;
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
                    <input type="text"name="fullname" value="<?php echo $row['FullName']; ?>" class="form-control" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Profile Image</label>
                  <!-- <a href="changeimage.php?id=<?php echo $row['ID'];?>"> &nbsp; Edit Image</a> -->
                  <div class="col-sm-10">
                    <input class= "form-control" disabled name="propic"  type="file" id="formFile" accept="image/*" >
                  </div>
                  <div class="col-sm-10">
                  <img class="my-2" src="images/<?php echo $row['ProfileImage'];?>" style= "width:110px; height:100px; margin-left:150px" value="<?php  echo $row['ProfileImage'];?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="number"name="cnumber" value="<?php  echo $row['ContactNumber'];?>" maxlength="10" pattern="[0-9]+" class="form-control" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value=" <?php echo $row['Email']; ?>"  class="form-control" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Identity Type</label>
                  <div class="col-sm-10">
                    <select disabled class="form-select" name="identitytype" aria-label="Default select example">
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
                    <input type="text" name="icnum" value="<?php echo $row['IdentityCardno']; ?>" disabled class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select disabled class="form-select" name="category" aria-label="Default select example">
                       <option value="<?php  echo $row['Category'];?>"><?php  echo $row['Category'];?></option>
                       <?php
                       include_once('includes/config.php');
                        $sql1 = "SELECT *FROM tblcategory";
                        $result1 = mysqli_query($conn , $sql1) or die("Select Query failed");
                        if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){ 
                        ?>
                            <option disabled value="<?php echo $row1['CategoryName']; ?>" selected>
                                <?php echo $row1['CategoryName']; ?>
                            </option>
                        <?php }} ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-10">
                    <input type="text" name="source" value="<?php echo $row['Source']; ?>"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Destination</label>
                  <div class="col-sm-10">
                    <input type="text"name="destination"value="<?php echo $row['Destination']; ?>"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">From Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="fromdate"value="<?php echo $row['FromDate']; ?>"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">To Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="todate"value="<?php echo $row['ToDate']; ?>"   class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Cost</label>
                  <div class="col-sm-10">
                    <input type="text" name="cost" value="<?php echo $row['Cost']; ?>"  class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pass Updation Date</label>
                  <div class="col-sm-10">
                    <input type="text" name="passcreationdate" value="<?php echo $row['PasscreationDate']; ?>"  class="form-control" disabled>
                  </div>
                </div>
                <?PHP $count=$count+1;}} ?>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" it="submit" class="btn btn-primary"> Form Renewal</button>
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