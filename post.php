<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>
  <?php include 'partials/_dbconnect.php'; ?>
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

    <!-- For seo -->
    <?php
      $id = $_GET['id'];
      $sql = "SELECT * FROM `blogs` WHERE url = '$id'";
      $result = mysqli_query($conn , $sql);
      $row = mysqli_fetch_assoc($result);

      $title = $row['title'];
      $description = $row['description'];
      $keywords = $row['keywords'];
      $author = $row['author'];
      
    
    echo'
    <title>'.$title.'</title>
    <meta name="description" content="'.$description.'">
    <meta name="keywords" content="'.$keywords.'">
    <meta name="author" content="'.$author.'">
    <meta name="viewport" content="width=device-width, initial-scale=1">';
    ?>
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../assets/img/cover/favicon.png" style="filter: drop-shadow(2px 4px 6px black);" type="image/x-icon"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/post.css">
    <link rel="stylesheet" href="../assets/css/footer.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-override.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <?php include 'partials/analytics.php'; ?>
    
    <style>
    body{background-color: whitesmoke;}
    .commentBy{
    font-size: 18px;
    font-family: fantasy;
    color: crimson;
    }
    </style>
    
   
    
  </head>
  <body>
    <?php include 'partials/_header.php'; ?>
  

     <?php 
     
     $id = $_GET['id'];
    $sql = "SELECT * FROM `blogs` WHERE url = '$id'";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $content = $row['content'];
    $author = $row['author'];
    $date = $row['date'];
    $readMin= $row['read_time'];
    $image= $row['image'];
    $date = $row['date'];

    echo '    <div class="postImage">
      <img src="/assets/img/cover/'.$image.'" alt="">
    </div>

    <div class="post" id="post">
      <h1 class="font1">'.$title.'</h1>
      <img class = "post-image" src="/assets/img/cover/'.$image.'" alt="">
      <div class="blogpost-meta">
          <div class="author-info">
              <div>
              <b>
                Author - '.$author.'
              </b>
              </div>
              <div>'.$date.' . '.$readMin.' min read</div>
          </div>
          <div class="social">
              <svg width="29" height="29" class="hk"><path d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z"></path></svg>

              <svg style="background: black;
              border-radius: 21px;" width="29" height="29" viewBox="0 0 29 29" fill="none" class="hk"><path d="M5 6.36C5 5.61 5.63 5 6.4 5h16.2c.77 0 1.4.61 1.4 1.36v16.28c0 .75-.63 1.36-1.4 1.36H6.4c-.77 0-1.4-.6-1.4-1.36V6.36z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.76 20.9v-8.57H7.89v8.58h2.87zm-1.44-9.75c1 0 1.63-.65 1.63-1.48-.02-.84-.62-1.48-1.6-1.48-.99 0-1.63.64-1.63 1.48 0 .83.62 1.48 1.59 1.48h.01zM12.35 20.9h2.87v-4.79c0-.25.02-.5.1-.7.2-.5.67-1.04 1.46-1.04 1.04 0 1.46.8 1.46 1.95v4.59h2.87v-4.92c0-2.64-1.42-3.87-3.3-3.87-1.55 0-2.23.86-2.61 1.45h.02v-1.24h-2.87c.04.8 0 8.58 0 8.58z" fill="#fff"></path></svg>

              <svg width="29" height="29" class="hk"><path d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79"></path></svg>

          </div>
      </div>
      '.$content.'
     
    </div>';

    ?>

<?php
include 'partials/_dbconnect.php';
$url= $_SERVER['REQUEST_URI'];
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $id = $_GET['id'];
  $comment = $_POST['comment'];
  $comment = str_replace("<", "&lt;" , $comment);
  $comment = str_replace(">", "&gt;" , $comment);
  date_default_timezone_set("Asia/Kolkata");
  $today = date("j F, Y");
  $username = $_SESSION['username'];
  $useremail = $_SESSION['useremail'];
  $sql = "INSERT INTO `comments` (`page_no`, `comment`, `comment_date`) VALUES ('$id', '$comment', '$today')";
  $sql = "INSERT INTO `comments` (`page_no`, `comment_by`, `comment_user_email`, `comment`, `comment_date`) VALUES ('$id', '$username', '$useremail', '$comment', '$today')";
  $result = mysqli_query($conn, $sql);
  
  
  }
  
 

    echo'<div class="commentSection">';
      


       if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
      echo'<form action="'.$url.'" method = "POST">
        <div class="form-floating">
          <label for="commentSection">Comment</label>
          <textarea class="form-control" placeholder="Leave a comment here" name= "comment" id="commentSection" style="height: 100px" required></textarea>
        </div>
        <button type="submit" class="btn btn-light">Submit</button>
      </form>';
  }
  else{
      echo '<div class="alert alert-success commentLog" role="alert">
  <h4 class="alert-heading">Comments</h4>
  <p>Please login to comment</p>
  <hr>
  <p class="mb-0">You can <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal">create account</a> or <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">login</a> to post a comment.</p>
</div>';
  }


      $sql = "SELECT * FROM `comments` WHERE page_no = '$id' ORDER BY `comment_no` DESC";
      $result = mysqli_query($conn , $sql);
      while($row = mysqli_fetch_assoc($result)){
        $comment = $row['comment'];
        $commentBy = $row['comment_by'];
        $commentDate = $row['comment_date'];
        

      echo'<div class="media comments">
        <img  src="/assets/img/cover/user.png" class="mr-3 userImage" alt="...">
        <div class="media-body">
          <h5 class="mt-0 commentBy">Asked by ' .$commentBy. '  On ' .$commentDate. '</h5>
          <p>'.$comment.'</p>
        </div>
      
      </div>';
      }
    ?>
    </div>


    <?php include 'partials/_footer.php'; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
ob_end_flush(); 
?> 
    <?php include 'partials/tracker.php'; ?>