<?php
session_start();
include_once('includes/config.php');
if(isset($_POST['submit'])){
    
    $fullname       =  $_POST['fullname'];
    $cnumber        =  $_POST['cnumber'];
    $email          =  $_POST['email'];
    $identitytype   =  $_POST['identitytype'];
    $icnum          =  $_POST['icnum'];
    $category       =  $_POST['category'];
    $source         =  $_POST['source'];
    $destination    =  $_POST['destination'];
    $cost           =  $_POST['cost'];
    $fromdate       =  $_POST['fromdate'];
    $todate         =  $_POST['todate'];
    $passnum        =  mt_rand(100000000, 999999999);

    //for image
    $propic             =   $_FILES["propic"]["name"];
    $extension          =    substr($propic,strlen($propic)-4,strlen($propic));
    $allowed_extensions =   array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions))
    {
        echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
    }
    else
    {
        $propic=md5($propic).time().$extension;
        move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
        
        $sql = "INSERT INTO tblpass 
        (PassNumber , FullName , ProfileImage , ContactNumber , Email , IdentityType , IdentityCardno , Category , Source , Destination , FromDate , ToDate , Cost) VALUES 
        ('{$passnum}','{$fullname}','{$propic}',{$cnumber},'{$email}','{$identitytype}',
        '{$icnum}','{$category}','{$source}','{$destination}','{$fromdate}','{$todate}', {$cost});";
        $sql1 = "UPDATE tblpass SET ProfileImage = '{$propic}' where ID= {$pass_id} ";
                
        if(mysqli_query($conn, $sql)){
            echo '<script>alert("Pass detail has been added Succesfully !")</script>';
            //echo "<script>window.location.href ='add-pass.php'</script>";
        }else{
            echo "<script>alert('Something Went Wrong. Please try again !')</script>";
        }

        // send mail section
        include 'includes/PHPMailer-master/src/PHPMailer.php';
        include 'includes/PHPMailer-master/src/SMTP.php';
        $html = "Dear  $fullname,<br> &nbsp;&nbsp;&nbsp;&nbsp; Your Bus Pass has been genrated successfully. You can download your pass online on our website though entered this PassNumber is '$passnum' You can enter, And Check your pass .<br>&nbsp;&nbsp;&nbsp;&nbsp;<p>Thank You.</p><br><br>
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
        $mail->Subject=" $fullname, your pass has been Genrated Successfully, Plz Check your pass.";
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Add Pass Details</title>
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

<body>

  <!-- ======= Header ======= -->
  <?php include_once('includes/header.php'); ?>
<!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include_once('includes/sidebar.php'); ?>
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Pass Detailes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item"><a href="add-pass.php">Add Pass</a></li>

          <!-- <li class="breadcrumb-item">Forms</li> -->
          <!-- <li class="breadcrumb-item active">Layouts</li> -->
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
              <h5 class="card-title">Add Pass Detailes</h5>

              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text"name="fullname" class="form-control"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Profile Image</label>
                  <div class="col-sm-10">
                    <input class="form-control"name="propic" type="file" id="formFile"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Contact Number</label>
                  <div class="col-sm-10">
                    <input type="number"name="cnumber" required='true' maxlength="10" pattern="[0-9]+" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email Address</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Identity Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="identitytype" aria-label="Default select example">
                       <option value="">Choose Identity Type</option>
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
                    <input type="text" name="icnum" value="" required='true' class="form-control">
                  </div>
                </div>
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="category" aria-label="Default select example">
                       <option>Select Category</option>
                       <?php
                       include_once('includes/config.php');
                        $sql1 = "SELECT *FROM tblcategory";
                        $result1 = mysqli_query($conn , $sql1) or die("Select Query failed");
                        if(mysqli_num_rows($result1) > 0){
                            while($row1 = mysqli_fetch_assoc($result1)){ ?>
                            <option value="<?php echo $row1['CategoryName']; ?>" selected>
                                <?php echo $row1['CategoryName']; ?>
                            </option>
                           <?php }
                        }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Source</label>
                  <div class="col-sm-10">
                    <input type="text" name="source"class="form-control"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Destination</label>
                  <div class="col-sm-10">
                    <input type="text"name="destination" class="form-control"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">From Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="fromdate" class="form-control"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">To Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="todate" class="form-control"required='true'>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Cost</label>
                  <div class="col-sm-10">
                    <input type="text" name="cost" class="form-control"required='true'>
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" it="submit" class="btn btn-primary">Add Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->


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