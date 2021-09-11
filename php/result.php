<?php 

session_start();
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}

include "db.php";
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
    
    <li ><a href="../chat/chat_login.php"><h1>chat</h1></a></li>
 


</ul>
<br><br>
<form action="result.php" method="post">
<label for="pollname">Pollname</label>
<input type="text" id="name" name="pollname" type="required">

<button type="submit" name='poll'>View Result</button>
</form>





</body>
</html>



<?php


if(isset($_POST['poll'])){

										date_default_timezone_set('Asia/Kathmandu');

$_SESSION['curr_poll']=$p=$_POST['pollname'];

$q="select * from poll";
$st=$conn->query($q);


									while($row=$st->fetch_assoc()){

										$n=$row['Poll_Name'];
										$pe=$row['poll_end'];	




														if($n==$p){

															$ct=date("Y-m-d H:i:s");

																						if($ct>$pe){
																						
																						$v1=$row['c1_value'];	
																						$v2=$row['c2_value'];
																						$v3=$row['c3_value'];
																						$v4=$row['c4_value'];
																						$v5=$row['c5_value'];







																						if(($v1>$v2)&&  ($v1>$v3)&&($v1>$v4)&&($v1>$v5)){

																						
																						$x=$row['c1'];
																						$_SESSION['win']=$x;
																						


																					}



																					if(($v2>$v1)&&  ($v2>$v3)&&($v2>$v4)&&($v2>$v5)){


																						
																						$x=$row['c2'];
																						$_SESSION['win']=$x;
																						
																				echo($_SESSION['win']);


																					}

																					if(($v3>$v1)&&  ($v3>$v2)&&($v3>$v4)&&($v3>$v5)){

																						echo("?");
																						$x=$row['c3'];$_SESSION['win']=$x;

																					}

																						if(($v4>$v1)&&  ($v4>$v2)&&($v4>$v3)&&($v4>$v5)){
																						

																						$x=$row['c4'];$_SESSION['win']=$x;


																					}

																					if(($v5>$v1)&&  ($v5>$v2)&&($v5>$v3)&&($v5>$v4)){
																							
																						$x=$row['c5'];
																						$_SESSION['win']=$x;

																					}


																					
																				
																					header("location:winner.php");	


																		}

																		else{
																			echo("poll hasnot ended yet");

																			break;


																		}


														}



									}












}




 ?>