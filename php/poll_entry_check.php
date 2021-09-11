<?php 

session_start();
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}

?>
<?php 
include 'db.php';

if(isset($_POST['voter_access'])){
$e_pass=mysqli_real_escape_string($conn,$_POST['poll_pass']);///entered password by user
$e_id=mysqli_real_escape_string($conn,$_POST['pod']);

$b=0;

$ssql="select * from poll ";
$result=$conn->query($ssql);
include 'db.php';
date_default_timezone_set('Asia/Kathmandu');


if($result->num_rows>0){

	while($row= $result->fetch_assoc()){
		$id=$row['id'];
		$t=$row['Reg_deadline'];
	$ct=date("Y-m-d H:i:s");
	

			

						if($e_id==$id){
												
												$p_check=$row['Password'];
												
												if (password_verify($e_pass,$p_check)){


													$type=$row['Poll_Type'];




													$curr_poll=$row['Poll_Name'];
													$_SESSION['curr_poll']=$curr_poll;
														$_SESSION['p_id']=$id;

													$s1="select * from ".$curr_poll." ";

													$res1=$conn->query($s1);
																				while ($rok=$res1->fetch_assoc()){
																						$i=$rok['Id'];

																					if($i==$_SESSION['u_id']){


																						$b=$rok['ban_status'];

																										}


																					
																													}








													if($b==0){																	if($ct<$t){

													$y=6;
													include "db.php";
																
																
																$_SESSION['curr_poll']=$curr_poll;

																$sql="select * from ".$curr_poll." ";
																$res1=$conn->query($sql);
																				while ($ro=$res1->fetch_assoc()){
																						
																					$x=$ro['Id'];
																				

																					if($x==$_SESSION['u_id']){
																						
																						$y=5;
																					header('location:poll_start_check.php');


																										}
																			

																						}
																	

																							if($y!=5){
																								if($type!='FullControlled'){
																						$stm=$conn->prepare("insert into ".$curr_poll." (Id,votername,voterlastname) values(?,?,?)");
																				$stm->bind_param("sss",$_SESSION['u_id'],$_SESSION['username'],$_SESSION['lastname']);
																				$stm->execute();
																				$stm->close();header('location:poll_start_check.php');
																				}

																					else{

																						echo("Admin hasnt added you to his poll");
																					}


																				
																			
																					//break;



																							}


																						}//time check

																							else{

																								$_SESSION['curr_poll']=$curr_poll;

																$sql="select * from ".$curr_poll." ";
																$res1=$conn->query($sql);
																				while ($ro=$res1->fetch_assoc()){
																					
																					$x=$ro['Id'];
																					

																					if($x==$_SESSION['u_id']){
																						$j=5;
																						
																					


																										}



																			

																						}
																	

																						if($j==5){

																							header('location:poll_start_check.php');

																								}
																						else{


																				header('location:deadline_notify.php');
																			}




																			}



																		

															} // b close

															else{

																	header('location:../html/notification_banned.html');
																

															}



																		

																
																		} //p check




																			
																		
															else{
																	include 'JavaScript.js';

																}

												

													}// e id


											}// main while


						}//main if



										}//is set






//	for poll name and poll pass entered

if (isset($_POST['search1'])){
include 'db.php';
$e_pass=mysqli_real_escape_string($conn,$_POST['poll_pass']);
$p_name=mysqli_real_escape_string($conn,$_POST['poll_name']);
//echo ($e_pass);
$sql="select * from poll";
$check=0;
$result=$conn->query($sql);
$f=0;
date_default_timezone_set('Asia/Kathmandu');
$b=0;
if($result->num_rows>0){

while($row=$result->fetch_assoc()){


	$t=$row['Reg_deadline'];
	$ct=date("Y-m-d H:i:s");
$pname=$row['Poll_Name'];
$pid=$row['id'];

	$pass=$row['Password'];		
			if($pname==$p_name)			{
		
										if(password_verify($e_pass,$pass)){

											$type=$row['Poll_Type'];
										
												$_SESSION['curr_poll']=$pname;
														$_SESSION['p_id']=$pid;

											$s1="select * from ".$pname." ";

													$res1=$conn->query($s1);
																				while ($rok=$res1->fetch_assoc()){
																						$i=$rok['Id'];

																					if($i==$_SESSION['u_id']){


																						$b=$rok['ban_status'];

																										}


																					
																													}



														if($b==0){	
																if($ct<$t){												

													$id=$row['id'];
														$check=1;
														
														$_SESSION['curr_poll']=$pname;
														$_SESSION['p_id']=$pid;


														$sql="select * from ".$pname."";
														$result=$conn->query($sql);

																	if(!empty($result) && $result->num_rows > 0){
			  
			 																	while($row= $result->fetch_assoc()){

			 																		$i=$row['Id'];
			 																		if($i==$_SESSION['u_id']){
			 																			echo("id matched");
			 																			header('location:poll_start_check.php');
			 																			$f=1;
			 																		}




			 																										}
			 																									}


						 											if($f!=1){
						 															if($type!='FullControlled'){


																				$stm=$conn->prepare("insert into ".$pname." (Id,votername,voterlastname) values(?,?,?)");
																						$stm->bind_param("sss",$_SESSION['u_id'],$_SESSION['username'],$_SESSION['lastname']);
																						$stm->execute();
																						$stm->close();
																				header('location:poll_start_check.php');
																			}

																			else{
																				echo("You arent included by admin in this FULL-Controlled Poll");


																			}
																																	

																							}



																							
																						}//ct close

																	else{

																								$_SESSION['curr_poll']=$pname;

																$sql="select * from ".$pname." ";
																$res1=$conn->query($sql);
																				while ($ro=$res1->fetch_assoc()){
																					
																					$x=$ro['Id'];
																					

																					if($x==$_SESSION['u_id']){
																						$j=5;
																						
																					


																										}



																			

																						}
																	

																						if($j==5){

																							header('location:poll_start_check.php');

																								}
																						else{


																				header('location:deadline_notify.php');
																			}




																			}


					



															}//ban close

														else{

															header('location:ban.php');
														}



															}//pass check closed
													


											else {

													
														//header('location:search.php');
			include 'JavaScript.js';

														}




										}//pname

						


									}//while


								}// if 

							

		if ($check==0){
echo('incorrect info');
			}

								



}//iset



?>




