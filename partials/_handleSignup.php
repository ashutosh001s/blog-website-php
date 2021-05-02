<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    date_default_timezone_set('Asia/Kolkata');
    
    $name = $_POST['signupName'];
    $name = str_replace("<", "&lt;" , $name);
    $name = str_replace(">", "&gt;" , $name);
    
    $email = $_POST['signupEmail'];
    $email = str_replace("<", "&lt;" , $email);
    $email = str_replace(">", "&gt;" , $email);
    
    $pass = $_POST['signupPass'];
    $pass = str_replace("<", "&lt;" , $pass);
    $pass = str_replace(">", "&gt;" , $pass);
    
    $conformPass = $_POST['signupPassConform'];
    $conformPass = str_replace("<", "&lt;" , $conformPass);
    $conformPass = str_replace(">", "&gt;" , $conformPass);
    
    //check if email is unique or not
    $existSql = "SELECT * FROM `users` WHERE user_email = '$emai'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows > 0){
        header("Location: /index.php?signup=email-exist");
        exit();
        
    }
    else{
        if($pass == $conformPass){

            include '_generateOtp.php';
            include '_sendMail.php';

            $otp = generateNumericOTP($n);

            $hash = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_pass`, `verification` , `otp` , `user_roles` , `account_date`) VALUES ('$name', '$email', '$hash', '0', '$otp', 'user', current_timestamp())";
            $result = mysqli_query($conn, $sql);

            $html= $otp;

            smtp_mailer(''.$email.'','Email Verification',$html);

            if(!$mail->Send()){
                header('Location: /account/login/fail');
            }else{
                header('Location: /account/login/send');
            }
            if($result){
                header("Location: /index.php?signup=true");
                exit();
            }
            
        }else{
            header("Location: /index.php?signup=password-mismatched");
            exit();
            
          
        }
    }

      
    header("Location: /index.php?signup=false");
}

?>