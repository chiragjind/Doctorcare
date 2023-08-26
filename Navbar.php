<?php
if(!isset($_SESSION['username'])){
  $brand = 'WELCOME';
}else{
  $brand = "DR ".$_SESSION['username'];
}
?>

<nav class="navbar navbar-expand-lg navbarcontainer navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><i class="fa-sharp fa-regular fa-snowflake"></i><?php echo $brand ?><i class="fa-sharp fa-regular fa-snowflake"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pe-4 mb-2 mb-lg-0 linknavbar">
        <li class="nav-item link">
          <a class="nav-link" aria-current="page" href="Home.php">Home</a>
        </li>
        <hr>
        <li class="nav-item link">
          <a class="nav-link" href="Login.php">Login</a>
        </li>
        <li class="nav-item link">
          <a class="nav-link" href="Logout.php">Logout</a>
        </li>
</ul>
    </div>
  </div>
</nav>