<!-- Site starts here -->
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
<?php session_start(); // place it on the top of the script ?>
<?php 
ob_start("minifier"); 
function minifier($code) { 
    $search = array( 
          
        // Remove whitespaces after tags 
        '/\>[^\S ]+/s', 
          
        // Remove whitespaces before tags 
        '/[^\S ]+\</s', 
          
        // Remove multiple whitespace sequences 
        '/(\s)+/s', 
          
        // Removes comments 
        '/<!--(.|\s)*?-->/'
    ); 
    $replace = array('>', '<', '\\1'); 
    $code = preg_replace($search, $replace, $code); 
    return $code; 
} 
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Blogg Bat is a free to used web page provides information about 4d era like genetics , AI , robotics etc.">
    <meta name="keywords" content="Home , Blogg Bat">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="./assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);" type="image/x-icon">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="./assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/footer.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/bootstrap-override.css">
    <link type="text/css" rel="stylesheet" href="./assets/css/responsive.css">
    <?php include 'partials/analytics.php'; ?>

    <title>Blogg Bat</title>
  </head>
  <body>

   <?php include 'partials/_header.php'; ?>
   <?php include 'partials/_dbconnect.php'; ?>

    <!-- *********First Section start******** -->

    <Section id="FirstSection">
        <div class="container newsletterForm">
            <div class="container imageBox">
                <img  src="/assets/img/cover/img2.png" alt="">
            </div>
            <div class="spacer"></div>
        <div class="container formBox">
            <h2 class="formText">Join the Blogg Bat Army!</h2>
            <p class="formTextSmall">Signup and receive our exclusive blogging and digital marketing tips right in your inbox.</p>
            <form class = "emailForm" action="/action.php" method="POST">
                <div class="mb-3">
                <input type="text" class="form-control" id="name" name="fname" placeholder="Enter your first name">
              </div>
              <div class="mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-mail" type="Submit">Sign Up</button>
              </div>
              <?php
    $statusMsg = !empty($_SESSION['msg'])?$_SESSION['msg']:'';
    unset($_SESSION['msg']);
    echo $statusMsg;
?>
            </form>
        </div>
    </div>
</Section>

<Section id="SecondSection">
    <h1 class="BigText">MOST RECENT POST</h1>
    <div class="row" id="cardHolder">

    <!--fetch all the post-->
    <?php 
    $sql = "SELECT * FROM `blogs` ORDER BY `sr_no` DESC LIMIT 9";
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
      $content = $row['content'];
      
      $content = str_replace("h1", "" , $content);
      $content = str_replace("p", "" , $content);
      $content = str_replace("<", "" , $content);
      $content = str_replace(">", "" , $content);
      $content = str_replace("/", "" , $content);
      $content = str_replace("redheading", "" , $content);
      $content = str_replace("class", "" , $content);
      $content = str_replace("=", "" , $content);


       
      $srno = $row['sr_no'];
      $title = $row['title'];
      $image = $row['image'];
      $url = $row['url'];
      
      echo ' <div class="col-md-4">
      <div class="card">
          <span class="badge rounded-pill bg-primary">Primary</span>
          <img src="/assets/img/cover/'.$image.'" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">'.substr($title,0,70).'</h5>
            <p class="card-text">'.substr($content,0,250).'</p>
            <a href="blog/'.$url.'" class="btn btn-primary">Read More</a>
          </div>
        </div>
     </div>';

    }

    ?>
 </div>
   
</Section>
<?php include 'partials/_footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

  </body>
</html>
<?php 
ob_end_flush(); 
?> 
<?php include 'partials/tracker.php'; ?>
