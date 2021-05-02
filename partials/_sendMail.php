<?php
include('smtp/PHPMailerAutoload.php');
$html='Msg';
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->SMTPDebug  = 0;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "	smtp.hostinger.in";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "admin@bloggbat.com";
	$mail->Password = "wEWedB$8";
	$mail->SetFrom("admin@bloggbat.com", "Blogg Bat");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		header('Location: /account/login/fail');
	}else{
		header('Location: /account/login/send');
	}
}
?>