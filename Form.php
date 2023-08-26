<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(!isset($_SESSION['username'])){
    header('location:Signup.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
   include 'Link.php'
   ?>
</head>
<body>
    <div class="homepage formpage">
    <?php
   include 'Navbar.php'
   ?>
   <div class="container-fluid">
    <div class="row formsection">
       <?php
       include 'sidebar.php'
       ?>
        <div class="col-10 userformcontaiiner">
        <div class="row formrowuser">
          <?php
           include 'doctorform.php'
          ?>
        </div>
        </div>
    </div>
   </div>
   </div>
   <script src="Book.js"></script>
   <script src="https://kit.fontawesome.com/d499e8fef1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>


<?php
  include 'connection.php';

  if(isset($_POST['submit'])){
    $date = $_POST['rdate'];
    $time = $_POST['rtime'];
    $rdatetime = $date.$time;
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dbdate = $_POST['dbdate'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $info= $_POST['patientinfo'];
    $reason = $_POST['reason'];
    $notes = $_POST['notes'];
    $medicine = $_POST['medicine'];
    $doctor = $_SESSION['username'];

    $insertquery = "INSERT INTO `patientdata`(`datetime`, `name`, `gender`, `dateofbirth`, `phonenumber`, `email`, `address`, `patientinfo`, `doctorname`, `reason`, `additionalnote`, `anymedicine`) 
                    VALUES ('$rdatetime', '$name', '$gender', '$dbdate', '$phonenumber', '$email', '$address', '$info', '$doctor', '$reason', '$notes', '$medicine')";
    

    $check = mysqli_query($con,$insertquery);

    if($check){

        require './PHPMailer/Exception.php';
        require './PHPMailer/PHPMailer.php';
        require './PHPMailer/SMTP.php';
     
    $mail = new PHPMailer(true); // Correct instantiation
     
     $mail->isSMTP();
     $mail->Host = 'smtp.gmail.com';
     $mail->SMTPAuth = true;
     $mail->Username = 'jindalchirag2003@gmail.com';
     $mail->Password = 'ntntrxtwinsrpiph';
     $mail->Port = 465;
     $mail->SMTPSecure = 'ssl';
     $mail->isHTML(true);
     $mail->setFrom('jindalchirag2003@gmail.com', 'chirag');
     $mail->addAddress($email);
     $mail->Subject ="Medical Report"; // Removed unnecessary parentheses
     $mail->Body ="Hi, $name. Your medical report With $doctorname and advised $notes ";
     $mail->send();

        ?>
        <script>
            alert('insertted successfully')
        </script>
        <?php
    }else{
        ?>
        <script>
            alert('Failure in insertion')
        </script>
        <?php
    }

  }
?>


