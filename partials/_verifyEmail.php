<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include '_dbconnect.php';
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$email' and `otp` = '$otp'";
    $result = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1){
        $sql = "UPDATE `users` SET `verification` = '1' WHERE `users`.`user_email` = '$email'";
        $result = mysqli_query($conn, $sql);

        if($result){

            $sql = "UPDATE `users` SET `otp` = '' WHERE `users`.`user_email` = '$email'";
            $result = mysqli_query($conn , $sql);
            header('Location: /index.php?signup=true');
            
        }else{
            header('Location: /index.php?signup=false');
            
        }
    }else{
        header('Location: /index.php?signup=false');
    }
}
?>