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
    <style>
    form{
      display: flex;
      width: 100%;
    }

    .formLeft{
        width: 50%;
        margin: 20px;
      }

      .formRight{
        width: 50%;
        margin: 20px;
      }
    </style>

    <title>New Post</title>
  </head>
  <body>
    <div>
      <h1 class="m-5" style="text-align: center;">Write Post</h1>
      <form action="/submit-post.php" method="POST" enctype="multipart/form-data">

      <div class="formLeft">
      <div class="mb-3">
            <textarea class="form-control" placeholder = "Write Here" id="content" name="content" rows="30"></textarea>
          </div>
      </div>

      <div class="formRight">
        <div class="input-group mb-3">
             <span class="input-group-text" id="basic-addon3">https://www.bloggbat.com/blog/</span>
        <input type="text" class="form-control" id="url" name="url" placeholder="Permalink">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
          </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="category" name="category" placeholder="Category">
          </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="tags" name="tags" placeholder="Tags">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="author" name="author" placeholder="Author">
          </div>
          <div class="mb-3">
            <input type="text" class="form-control" id="read" name="read" placeholder="Reading Time">
          </div>
          <div class="mb-3">
          <input type="file" name="uploadfile" class="form-control" aria-label="file" required>
        </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit" name="upload">Button</button>
          </div>
          </div>

    </form>
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