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

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['forgotEmail'];
    $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result);
    
    if($numRows == 1){
        //Generate a random string.
        $token = openssl_random_pseudo_bytes(256);

        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);

        $sql = "UPDATE `users` SET `forgot_token` = '$token' WHERE `users`.`user_email` = '$email'";
        $result = mysqli_query($conn , $sql);
        $html= '<!doctype html>
        <html lang="en-US">
        
        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>Reset Password Email Template</title>
            <meta name="description" content="Reset Password Email Template.">
            <style type="text/css">
                a:hover {text-decoration: underline !important;}
            </style>
        </head>
        
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
            <!--100% body table-->
            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                <tr>
                    <td>
                        <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                            align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                        style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 35px;">
                                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">You have
                                                    requested to reset your password</h1>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                    Use the link below to set up a new password for your account. If you did not request to reset your password, ignore this email and the link will expire on its own.
                                                </p>
                                                <a href="https://bloggbat.com/account/reset/'.$email.'/'.$token.'"
                                                    style="background:#20e277;text-decoration:none !important; font-weight:500; margin:35px 0px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                                    Password</a>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                        Unable to click on the button above?
                                                        Click on the link below or copy/paste in the address bar.
                                                        <a href= "https://bloggbat.com/account/reset/'.$email.'/'.$token.'">https://bloggbat.com/account/reset/'.$email.'/'.$token.'</a>
                                                    </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>bloggbat.com</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--/100% body table-->
        </body>
        
        </html>';

        smtp_mailer(''.$email.'','forgot email',$html);
        

    }else{
        echo 'Email not exist recheck your email and try again';
    }
    
  
}


?>