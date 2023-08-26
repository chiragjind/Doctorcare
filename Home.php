<?php
session_start();

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
    <div class="homepage">
    <?php
   include 'Navbar.php'
   ?>
   <div class="container-fluid">
    <div class="row">
       <?php
       include 'sidebar.php'
       ?>
        <div class="col-10 homecontainerright">
            <div class="row homeinfocol">
                <div class="col-md-4 col-10 mx-auto homecol ">
                  <?php
                  include 'Middlehomepage.php'
                  ?>
                </div>
                <div class="col-md-8 col-10 mx-auto">
                    <div class="booksection">
              <?php
              include 'Book.php'
              ?>
                    </div>
                </div>
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