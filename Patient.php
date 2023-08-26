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
    <div class="homepage patientpag"> 
    <?php
   include 'Navbar.php'
   ?>
   <div class="container-fluid">
    <div class="row patientsection">
       <?php
       include 'sidebar.php'
       ?>
        <div class="col-10 patientcol">
    <!-- <div class="container"> -->
        <!-- <div class="row  h-100">
            <div class="col-md-10 mx-auto"> -->
              <div class="bodytablecss">
            <main class="table">
             
              <section class="table_header">
                <h1>Patient History</h1>
              </section>
              <section class="table_body">
              <table class="table ">
      <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Date-time</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Phonenumber</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Patientinfo</th>
      <th scope="col">Reason</th>
      <th scope="col">Notes</th>
      <th scope="col">Medicine</th>
      <th scope="col" colspan='2'>opertion</th>
    </tr>
  </thead>
  <tbody>
  <?php
    include 'connection.php';

      $doctorname = mysqli_real_escape_string($con, $_SESSION['username']);
      // echo $_SESSION['username'];

      $selectquery = "SELECT * FROM `patientdata` WHERE doctorname='$doctorname'";


      $query = mysqli_query($con,$selectquery);  
      if (!$query) {
        die("Query failed: " . mysqli_error($con));
    }
    
      while( $res = mysqli_fetch_array($query)){
          ?>
        <tr>
        <td><?php echo $res['id']?></td>
        <td><?php echo $res['datetime']?></td>
        <td><?php echo $res['name']?></td>
        <td><?php echo $res['gender']?></td>
        <td><?php echo $res['dateofbirth']?></td>
        <td><?php echo $res['phonenumber']?></td>
        <td><?php echo $res['email']?></td>
        <td><?php echo $res['address']?></td>
        <td><?php echo $res['patientinfo']?></td>
        <td><?php echo $res['reason']?></td>
        <td><?php echo $res['additionalnote']?></td>
        <td><?php echo $res['anymedicine']?></td>
        <td> <a href=""> <i class="fa-solid fa-pen-clip fs-1"></i></a> </td>
        <td> <a href=""><i class="fa-solid fa-trash fs-1"></i></a> </td>
      </tr>
      <?php
    }

?>

 
  </tbody>
</table>
</section>
</main>
</div>
            <!-- </div>
        </div> -->
    <!-- </div> -->
    
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