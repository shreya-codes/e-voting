<?php 
session_start();

include "db.php";


?>

<?php

$code= rand(999999, 111111);

$hc=password_hash($code,PASSWORD_DEFAULT);

$stat=0;
$e=$_SESSION['v_email'];
$insert_data = "update registration set otp = '$hc' where email = '$e'";
        $data_check =$conn->query($insert_data);
        if($data_check){


        $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: thefusion72@gmail.com";
            if(mail($e, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $e";
                $_SESSION['info'] = $info;
                
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
               

        }

        else{
        	echo('asd');
        }
    }
else{
	echo('not ok');
}


 ?>