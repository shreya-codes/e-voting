<?php 

session_start();
include "db.php";
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}



?>






<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
  height:75px;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>
<body>
<ul>

   <li><a href="logout.php"><h1>Logout</h1></a></li>
    
    <li ><a href="candidate.php"><h1>SelectMenu</h1></a></li>
 


</ul>

	<form method="post" action="FullControlledPoll.php">
		

	

<label>VoterNAME</label><br>
<input id='name' type=required name='votername'><br>

<label for="exampleFormControlInput1">Email</label>
 <input type="email"  id="email" name="email" placeholder="Email Address (name@example.com)">

 <button id="register" name='register' type='submit' ><h3>Register<h3></button>

	</form>

</body>
</html>


<?php 




if(isset($_POST['register'])){


$v=$_POST['votername'];

$e=$_POST['email'];

$p=$_SESSION['curr_poll'];

$q="select * from registration";

$res=$conn->query($q);
$flag=6;


																	while($row=$res->fetch_assoc()){


																	$vr=$row['firstname'];
																	$er=$row['email'];

																	if(($vr==$v)&&($er==$e)){

																		$flag=5;
																		
																		$id=$row['id'];
																		$fname=$row['firstname'];
																		$lname=$row['lastname'];

																	break;

																		}


																	}


																if($flag==5){




																	$q2="select * from ".$p."";
																	$stm=$conn->query($q2);

																					while($row=$stm->fetch_assoc()){

																						$iid=$row['Id'];

																						if($iid==$id){

																							echo("already inserted");
																							$l=1;

																							break;




																						}




																					}





																	if($l!=1){

																	$stmt=$conn->prepare("insert into ".$p."(Id,votername,voterlastname) values (?,?,?)");
																	        $stmt->bind_param("sss",$id,$fname,$lname);
																	        $stmt->execute();

																	       echo("enter next voter");

																	   }





																}
																else{

																	echo("user doesnt exist");
																}








}












?>