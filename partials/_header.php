<?php
session_start();
echo ' <!-- *********Navigation start******* -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id = "navbar">
    <div class="container-fluid">
    <a href="/"><img class = "logo" src="/assets/img/cover/logo2.png" alt=""></a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="../search" method="GET" style="width: 80%;margin: auto;">
        <input type="text" class="form-control search-bar" name="query" aria-describedby="Search" placeholder="Search" required>
      </form>

      <div class="navOnPc">
      <div class="dropdown">
      
      <a class="dropdown-toggle dropMenu" id="dropdownMenuButton1" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="/assets/img/icons/widgets_black_24dp.svg" data-bs-toggle="tooltip" data-bs-placement="bottom"  alt="Menu" title="Menu">
       
      </a>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" aria-current="page" href="/">Home</a></li>
        <li><a class="dropdown-item" aria-current="page" href="/about-us">About</a></li>
        <li><a class="dropdown-item" aria-current="page" href="/contact-us">Contact</a></li>
        <li><a class="dropdown-item" aria-current="page" href="/privacy-policy">Privacy Policy</a></li>
      </ul>
    </div>
    </div>
    
    <div class="navOnMobile">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/about-us">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/contact-us">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/privacy-policy">Privacy Policy</a>
        </li>
    </ul>
    </div>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

  echo ' <div class="dropdown navOnPc">

         <div class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 0px 11px 0px 20px;">
          <img src="/assets/img/icons/account_circle_black_24dp.svg" data-bs-toggle="tooltip" data-bs-placement="bottom"  alt="Menu" title="' . $_SESSION['username'] . '">
         </div>

         <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
  include 'partials/_dbconnect.php';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $useremail = $_SESSION['useremail'];
    $sql = "SELECT * FROM `users` WHERE user_roles = 'administrator'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $adminEmail = $row['user_email'];
    if ($useremail == $adminEmail) {
      echo '<li><a class="nav-link active" aria-current="page" href="/dashboard/" target="_blank">Dashboard</a></li>';
    }
  }
  echo ' <li><a class="nav-link active" aria-current="page" href="/partials/_logout.php">Logout</a></li>
         </ul>

        </div>
        <div class="navOnMobile">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/partials/_logout.php">Logout</a>
          </li>
        </div>';
} else {
  echo '<li class="nav-item">
        <a class="dropMenu" href="/account/login" style="padding: .375rem .75rem; cursor: pointer;">Login</a>
      </li>';
}

echo ' 
   </div>
   </div>
  </nav>';

//<!-- *********Navigation end******* -->


include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if (isset($_GET['signup']) && $_GET['signup'] == 'true') {

  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Account created successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['signup']) && $_GET['signup'] == 'password-mismatched') {

  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Password Mismatched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['signup']) && $_GET['signup'] == 'email-exist') {

  echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Email Already Exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['signup']) && $_GET['signup'] == 'false') {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Something went wrong!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['login']) && $_GET['login'] == 'wrong-pass') {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Unable to login recheck password!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['login']) && $_GET['login'] == 'wrong-email') {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Unable to login recheck your email!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} else if (isset($_GET['login']) && $_GET['login'] == 'true') {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> You are now logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}