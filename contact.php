<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="We are happy to listen our users if you have any query feel free to contact blogg bat team">
    <meta name="keywords" content="Contact , Blogg Bat">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include 'partials/analytics.php'; ?>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="./assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);" type="image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/bootstrap-override.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/responsive.css">
    <style>
    .contact{
    min-height: 500px;
    width: 80%;
    margin-top: 100px;
    margin-bottom: 100px;
    margin-left: auto;
    margin-right: auto;
            } 
    .btn-primary {
    color: #fff!important;
    background-color: #0D1239!important;
    border: none!important;
    }
    .contactHeading{
    font-size: 3.5rem;
    text-align: center;
    padding: 22px;
    font-family: fantasy;
    }
        
    </style>

    <title>Contact | Blogg Bat</title>
  </head>
  <body>

   <?php include 'partials/_header.php'; ?>
   <?php include 'partials/_dbconnect.php'; ?>
   
   <?php
$url= $_SERVER['REQUEST_URI'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  $userName = $_POST['userName'];
  $userName = str_replace("<", "&lt;" , $userName);
  $userName = str_replace(">", "&gt;" , $userName);
  
  $userEmail = $_POST['userEmail'];
  $userEmail = str_replace("<", "&lt;" , $userEmail);
  $userEmail = str_replace(">", "&gt;" , $userEmail);
  
  $website = $_POST['website'];
  $website = str_replace("<", "&lt;" , $website);
  $website = str_replace(">", "&gt;" , $website);
  
  $message = $_POST['message'];
  $message = str_replace("<", "&lt;" , $message);
  $message = str_replace(">", "&gt;" , $message);
  $sql = "INSERT INTO `message` (`user_name`, `user_email`, `user_web`, `user_message`) VALUES ('$userName', '$userEmail', '$website', '$message')";
  $result = mysqli_query($conn, $sql);
  
  if($result){
      $showAlert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your message is submitted we will contact you soon.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }else{
      $showError = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOps!</strong> Something went wrong! message can not submitted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
  
  }
 

   echo'<div class="contact">
       <h1 class = "contactHeading">Leave a Message</h1>
   <form action="'.$url.'" method="POST">
   <div class="mb-3">
  <input type="text" class="form-control" id="userName" name="userName" placeholder="Name" required>
    </div>
   <div class="mb-3">
  <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Email" required>
    </div>
   <div class="mb-3">
  <input type="text" class="form-control" id="website" name="website" placeholder="Website" required>
    </div>
    <div class="mb-3">
  <textarea class="form-control" id="message" name="message" rows="5" placeholder = "Message" required></textarea>
    </div>
    <div class="d-grid gap-2">
  <button class="btn btn-primary" type="submit">Submit</button>
  
    </div>
   </form>
   '.$showAlert.''.$showError.'
   </div>';
   
   ?> 


<?php include 'partials/_footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>
<?php include 'partials/tracker.php'; ?>