<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $email = $_POST['loginId'];
    $pass = $_POST['loginPass'];
    
    $sql = "SELECT * FROM `users` WHERE user_email = '$email' and `verification` = '1'";
    $result = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $name = $row['user_name'];
            $userEmail = $row['user_email'];
            
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $name;
            $_SESSION['useremail'] = $userEmail;
            header("Location: /index.php?login=true");
            exit();
            
        }else{
            echo 'unable to login';
            header("Location: /index.php?login=wrong-pass");
            exit();
        }
        
    }
    header("Location: /");
}