<?php
include '_dbconnect.php';
include('smtp/PHPMailerAutoload.php');
$html='Msg';
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "	smtp.hostinger.in";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "admin@bloggbat.com";
	$mail->Password = "wEWedB$8";
	$mail->SetFrom("admin@bloggbat.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		return 'Sent';
	}
}

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
    $html= "test";

    echo smtp_mailer(''.$email.'','forgot email',$html);

    
}


?>