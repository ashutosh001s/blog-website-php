<?php
session_start();
echo ' <!-- *********Navigation start******* -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id = "navbar">
    <div class="container-fluid">
    <img class = "logo" src="/assets/img/logo.png" alt="">
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
          </li>';
          
          if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
              echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Welcome '.$_SESSION['username'].' </a>
          </li>';
            echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/partials/_logout.php">Logout</a>
          </li>';
        }
            else{echo '<li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign up</a>
          </li>';}
        echo'</ul>
      </div>
    </div>
  </nav>
        
<!-- *********Navigation end******* -->';


include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

if(isset($_GET['signup']) && $_GET['signup']=='true'){
    
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Account created successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
else if(isset($_GET['signup']) && $_GET['signup']=='password-mismatched'){
    
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Password Mismatched.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
else if (isset($_GET['signup']) && $_GET['signup']=='email-exist'){
    
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Email Already Exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
else if (isset($_GET['signup']) && $_GET['signup']=='false'){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Something went wrong!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else if (isset($_GET['login']) && $_GET['login']=='wrong-pass'){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Unable to login recheck password!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else if (isset($_GET['login']) && $_GET['login']=='wrong-email'){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Unable to login recheck your email!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else if (isset($_GET['login']) && $_GET['login']=='true'){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> You are now logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>