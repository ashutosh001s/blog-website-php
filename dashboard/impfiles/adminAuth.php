<?php
session_start();
include '../partials/_dbconnect.php';
if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] == true) {
  $useremail = $_SESSION['useremail'];
  $sql = "SELECT * FROM `users` WHERE user_roles = 'administrator'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $adminEmail = $row['user_email'];

  if ($useremail == $adminEmail) {
  

  }else{
    header('Location: /404');
  } 
}
else{
  header('Location: /account/login');
}
?>