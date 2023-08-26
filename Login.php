<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <?php
   include 'Link.php'
   ?>
</head>
<body>
  <div class="loginbody">
   <?php
   include 'Navbar.php'
   ?>

   <div class="container-fluid logincontainer">
    <div class="row loginrow">
        <div class="col-md-6 col-12 m-auto main_divlogin">
        <form class="loginform formfield" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>">
       <div class="mb-3 ">
       <label for="exampleInputEmail1" class="form-label">Name</label>
      <input spellcheck="false" required="true" autocomplete="off" autocorrect="off" autocapitalize="off"  type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
     </div>
       <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input spellcheck="false" required="true" autocomplete="off" autocorrect="off" autocapitalize="off" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
     </div>
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input spellcheck="false" required="true"  autocomplete="off" autocorrect="off" autocapitalize="off" type="password" class="form-control" id="password" name="password">
    </div>
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">confirm Password</label>
    <input spellcheck="false" required="true" type="password"  autocomplete="off" autocorrect="off" autocapitalize="off" auto class="form-control" id="confirmpassword" name="confirmpassword">
    </div>
    <button type="submit" name="submit" class="btn btn-outline-dark loginbtn">Submit</button>
    </form>
        </div>
    </div>
   </div>
   </div>
   <script src="https://kit.fontawesome.com/d499e8fef1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

<?php
  include 'connection.php';

  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['confirmpassword']);
   
   $pass = password_hash($password,PASSWORD_BCRYPT);
   $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

   $token = bin2hex(random_bytes(15));

   $emailquery = "SELECT * FROM `logindata` WHERE email='$email'";
   $query = mysqli_query($con,$emailquery);
   $emailcount = mysqli_num_rows($query);

   if($emailcount>0){
    ?>
    <script>
      alert('Email already exit')
    </script>
    <?php
   }else{
       

       if($password === $cpassword){
        $insertquery = "INSERT INTO `logindata`( `name`, `email`, `password`, `cpassword`, `token`, `status`) VALUES ('$name','$email','$pass','$cpass','$token','inactive')" ; 
         
        $iquery = mysqli_query($con,$insertquery);
        if($iquery){
            //  use PHPMailer\PHPMailer\PHPMailer;
            //  use PHPMailer\PHPMailer\Exception;
          
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
          $mail->Subject ="Email Activation"; // Removed unnecessary parentheses
          $mail->Body ="Hi, $name. click here to activate your account http://localhost/Doctorhelp/activate.php?token=$token";
          $mail->send();
          
          //  $subject =  "Email Activation";
          //  $body =  "Hi, $username. click here to activate your account http://localhost/Doctorhelp/activate.php?token=$token";
          //  $header = "From: jindalchirag2003@gmail.com";
          //  if(mail($email,$subject,$body,$header)){
            $_SESSION['msg']= "check your account for activation $email";
            $_SESSION['token']= "$token";
            ?>
            <script>
                alert('Mail sent successfully');
            </script>
            <?php
            header('location:Signup.php');
          //  }else{
        // php start
            // <script>
            //   alert('Error in send email');
            // </script>
      //  phpend
          //  }
        }else{
          ?>
          <script>
            alert('No insert')
          </script>
          <?php
        }
       }else{
        ?>
        <script>
          alert('Password not match')
        </script>
        <?php
       }
   }
  }
?>