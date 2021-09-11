<?php 

session_start();


?>
<?php

if(isset($_POST['register'])){
include('db.php');

	$firstname= mysqli_real_escape_string($conn,$_POST['firstname']);
	$email= mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$lastname= mysqli_real_escape_string($conn,$_POST['lastname']);
	$confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);



	
		include('db.php');

	if($password== $confirmpassword){
$password1= password_hash($password,PASSWORD_DEFAULT);

		$q="select * from registration";

		$st=$conn->query($q);

		while($row=$st->fetch_assoc()){

			if(($email==$row['email'])){




				$h=5;
				
				break;
			}





		}


if($h==5){


	echo('the user with that email already exist');

}


	if($h!=5){


		
		

		$_SESSION['v_email']=$email;


		$_SESSION['pass']=$password;






		$stmt=$conn->prepare('insert into registration(firstname,lastname,email,password) values (?,?,?,?)');
		$stmt->bind_param("ssss",$firstname,$lastname,$email,$password1);
		$stmt->execute();
		// echo "Submit success";
		$stmt->close();
		$conn->close();


		header('location:../php/verify.php');

	}
		
		}
		else{

echo ('<script type="text/javascript">alert("not matched"); </script>');
			//include 'JavaScript.js';


		}


}
else{
	echo ('not workin');  
}



?>