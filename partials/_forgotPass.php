<?php
   use PHPMailer\PHPMailer\PHPMailer;
   require 'vendor/autoload.php';
   $mail = new PHPMailer;

include '_dbconnect.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $email = $_POST['forgotEmail'];
    //Generate a random string.
    $token = openssl_random_pseudo_bytes(256);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    //Print it out for example purposes.
    echo $token;
    
    $sql = "UPDATE `users` SET `forgot_token` = '$token' WHERE `users`.`user_email` = '$email'";
    $result = mysqli_query($conn , $sql);

 
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@bloggbat.com';
        $mail->Password = 'LANxG5[Y4b!M';
        $mail->setFrom('admin@bloggbat.com', 'admin');
        $mail->addReplyTo('admin@bloggbat.com', 'admin');
        $mail->addAddress(''.$email.'', 'Receiver Name');
        $mail->Subject = 'Testing PHPMailer';
        $mail->msgHTML(file_get_contents('message.html'), __DIR__);
        $mail->Body = ''.$token.'';
        //$mail->addAttachment('test.txt');
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
        }
}


?>