<?php



if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $newPass = $_POST['newPassword'];
    $email = $_POST['email'];
    $token = $_POST['token'];

    $sql = "SELECT * FROM `users` WHERE `user_email` = 'ashutoshcharan121@gmail.com'";
    $result1 = mysqli_query($conn , $sql);
    $numRows = mysqli_num_rows($result1);
    echo $numRows;
    echo $email;
    if($numRows == 1){
        
        echo "yes";
    //     $hash = password_hash($newPass, PASSWORD_DEFAULT);
    //     $sql = "UPDATE `users` SET `user_pass` = '$hash' WHERE `users`.`user_email` = '$email'";
    //     $result2 = mysqli_query($conn, $sql);
    //         if($result2){
    //             echo 'password reset successful';
    //         }else{
    //             echo 'password reset unsuccessful';
    //         }

    }else{
        echo 'no email found';
        // echo $email;
        
        // echo $token;
    }
}

?>