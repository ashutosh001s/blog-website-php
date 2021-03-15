<?php
session_start();
include 'partials/_dbconnect.php';
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $useremail = $_SESSION['useremail'];
    $sql = "SELECT * FROM `users` WHERE user_roles = 'administrator'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $adminEmail = $row['user_email'];
    
    if($useremail == $adminEmail){
echo'<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="./assets/css/dashboard.css" rel="stylesheet">

    <title>Blogg Bat | Dashboard</title>
  </head>
  <body>
      
      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">';

    $host = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    if($host == "https://www.bloggbat.com/dashboard.php?inspect=true"){

     echo' <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Ip</th>
              <th>Email</th>
              <th>Url</th>
              <th>Load Time</th>
              <th>Visit Time</th>
            </tr>
          </thead>';
          $sr_no = 0;
          $sql = "SELECT * FROM `visitors` ORDER BY `v_no` DESC";
          $result = mysqli_query($conn , $sql);
          while($row = mysqli_fetch_assoc($result)){
            $sr_no++;
            $v_ip = $row['v_ip'];
            $v_email = $row['v_email'];
            $v_url = $row['v_url'];
            //$v_country = $row['v_country'];
            //$v_country_code = $row['v_country_code'];
            //$v_state = $row['v_state'];
            //$v_city = $row['v_city'];
            //$v_address = $row['v_address'];
            $v_load_time = $row['load_time'];
            $v_time = $row['v_time'];
            
            
    
          echo'
            <tbody>
              <tr>
                <th scope="row">'.$sr_no.'</th>
                <td>'.$v_ip.'</td>
                <td>'.$v_email.'</td>
                <td>'.$v_url.'</td>
                <td>'.$v_load_time.'</td>
                <td>'.$v_time.'</td>
               
              </tr>
            </tbody>';
          }
        echo'</table>
      </div>';
        }
    echo'</main>
  </div>
</div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>';
}
else{
     header("Location: /404");
 }
 }else{
     header("Location: /404");
 }
 
?>