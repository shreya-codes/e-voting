<?php 

include "db1.php";
session_start();


?>



<?php 

$p=$_SESSION['curr_poll'];
$i=$_SESSION['u_id'];



$output1='
			<table class="table table-bordered table-striped">
			<tr>
			<td>Username</td>
			<td>Lastname</td>
			<td>Status</td>
			<td>Action</td>

			</tr>


			';

$q="select * from admin ";

$st=$conn->query($q);


while($row=$st->fetch_assoc()){

	if($row['Poll_Name']==$p){

	$output1 .='
			
			<tr>
			<td>'.$row['Firstname'].'</td>
			<td>'.$row['Lastname'].'</td>
			<td>admin</td>
			<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['SN'].'" data-tousername="'.$row['Firstname'].'">Start Chat</button></td>

			</tr>


			';




			}

			$output1 .='</table>';

echo ($output1);










	



}








$output='
			<table class="table table-bordered table-striped">
			<tr>
			<td>Username</td>
			<td>Lastname</td>
			<td>Status</td>
			<td>Action</td>

			</tr>


			';
$q="select * from ".$p." where Id !='".$i."' ";



	$res1=$conn->query($q);
while ($row=$res1->fetch_assoc()){
                                      
		

		$status='';

		$ctime=strtotime(date('Y-m-d H:i:s'). '-10 second');
		$ctime=date('Y-m-d H:i:s', $ctime);
		$user_last_activity=fetch_user_last_activity($row['Id'],$conn);

		if($user_last_activity > $ctime){

			$status='<span class="label label-success">Online</span>';

		}
		else{
			$status='<span class="label label-danger">Offline</span>';

		}


				$output .='
			
			<tr>
			<td>'.$row['votername'].'</td>
			<td>'.$row['voterlastname'].'</td>
			<td>voter</td>
			<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['Id'].'" data-tousername="'.$row['votername'].'">Start Chat</button></td>

			</tr>


			';




			}

			$output .='</table>';

echo ($output);






?>