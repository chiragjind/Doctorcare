<?php
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
        <div class="mb-3">
        <p class="bg-success"><?php 
         if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
         }else{
          echo "You are logout";
         }
          ?></p>
          </div>
        <div class="mb-3">
       <label for="exampleInputEmail1" class="form-label">Email address</label>
      <input spellcheck="false" required="true" autocomplete="off" autocorrect="off" autocapitalize="off" type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
     </div>
      <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input spellcheck="false" required="true"  autocomplete="off" autocorrect="off" autocapitalize="off" type="password" class="form-control" id="password" name="password">
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
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $emailquery = "SELECT * FROM `logindata` WHERE email='$email' and status='active' ";
   $query = mysqli_query($con,$emailquery);
   $emailcount = mysqli_num_rows($query);
  
   if($emailcount){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass =$email_pass['password'];
    $_SESSION['username']= $email_pass['name'];
    
    $pass_decode = password_verify($pass,$db_pass);
    if($pass_decode){
        header('location:Home.php');
    }
   }else{
    ?>
    <script>
      alert('email not exist')
    </script>
    <?php
   }
 }
?>



