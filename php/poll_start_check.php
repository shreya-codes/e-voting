<?php 

session_start();
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}


?>


<?php 


date_default_timezone_set('Asia/Kathmandu');
$ct=date("Y-m-d H:i:s");

include "db.php";

$ssql="select * from poll ";
$result=$conn->query($ssql);




if($result->num_rows>0){

	while($row= $result->fetch_assoc()){
		
$pid=$row['id'];
$pname=$row['Poll_Name'];
$ps=$row['poll_start'];
$pd=$row['poll_end'];
$rd=$row['Reg_deadline'];
if(($_SESSION['p_id']==$pid)&& $pname==$_SESSION['curr_poll']){
		
		$ct=date("Y-m-d H:i:s");
		
		
		
		
		
		if($ct<$ps){

			header('location:../html/reg_success.html');


		}
		if($ct>$pd){

			
			header('location:../html/poll_ended.html');

		}
		if(($ct<$pd)&&($ct>$ps)){


			header('location:vote.php');
		}

		/*	if(($p==$_SESSION['curr_poll'])&&($pid==$_SESSION['p_id'])){

				if($ct>$pd ){

					echo("deadline crossed");


				}


		if(($ct==$ps) ||($ct>$ps)){
			echo("can vote");
		}

	}	
*/

}

}



}




?>