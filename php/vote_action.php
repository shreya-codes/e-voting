<?php 
session_start();
include "db.php";
if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}

?>




<?php 

date_default_timezone_set('Asia/Kathmandu');
$cit=date("Y-m-d H:i:s");
$s1="select * from poll";

$ss=$conn->query($s1);
whie($r=$ss->fetch_assoc()){

	if($r['Poll_Name']==)
	if($cit>$r['poll_end']){



	}



}













$user=$_SESSION['username'];
$pOLL=$_SESSION['curr_poll'];
$sq1="select * from ".$pOLL."";
$res1=$conn->query($sq1);







while ($ro=$res1->fetch_assoc()){

$n=$ro['vote_status'];
$voterid=$ro['Id'];






if(($voterid==$_SESSION['u_id']) && ($n==0)){

		$sq="select * from poll ";

		$res=$conn->query($sq);
		while($row=$res->fetch_assoc()){
						$pName=$row['Poll_Name'];


						if($pName==$_SESSION['curr_poll']){


					if(isset($_POST['c1'])){
					$val=$row['c1_value'];
					$val=$val + 1;
					

						$q="update poll set c1_value='$val' where Poll_Name='$pName' ";

						$sql1=mysqli_query($conn,$q);

						$q1="update ".$pName." set vote_status='1' where Id=".$_SESSION['u_id']."";
						$sql1=mysqli_query($conn,$q1);
					header('location:../html/vote_success.html');
						//session_destroy();
						
//$query = "UPDATE billdata SET Total='$total', Due='$due' WHERE InvoiceNo='$invoiceno' ";

											}



							if(isset($_POST['c2'])){

							$val=$row['c2_value'];
							$val=$val + 1;
								echo($val);
									$q="update poll set c2_value='$val' where Poll_Name='$pName' ";

						$sql1=mysqli_query($conn,$q);
						$q1="update ".$pName." set vote_status='1' where Id=".$_SESSION['u_id']."";
						$sql1=mysqli_query($conn,$q1);
										//session_destroy();

						header('location:../html/vote_success.html');





								
							}
							if(isset($_POST['c3'])){


								$val=$row['c3_value'];
								$val=$val + 1;
								echo($val);

								$q="update poll set c3_value='$val' where Poll_Name='$pName' ";

						$sql1=mysqli_query($conn,$q);



						

						$q1="update ".$pName." set vote_status='1' where Id=".$_SESSION['u_id']."";
						$sql1=mysqli_query($conn,$q1);
				
						header('location:../html/vote_success.html');
								
							}


							if(isset($_POST['c4'])){

							$val=$row['c4_value'];
							$val=$val + 1;
								echo($val);
								$q="update poll set c4_value='$val' where Poll_Name='$pName' ";

						$sql1=mysqli_query($conn,$q);

						


						$q1="update ".$pName." set vote_status='1' where Id=".$_SESSION['u_id']."";
						$sql1=mysqli_query($conn,$q1);
					
						
						header('location:../html/vote_success.html');
								
							}
							if(isset($_POST['c5'])){

								$val=$row['c5_value'];
								$val=$val + 1;
								echo($val);
								$q="update poll set c5_value='$val' where Poll_Name='$pName' ";

							$sql1=mysqli_query($conn,$q);

							
								$q1="update ".$pName." set vote_status='1' where Id=".$_SESSION['u_id']."";
						$sql1=mysqli_query($conn,$q1);
					
						header('location:../html/vote_success.html');

								
							}


	}

}







}

else{



	header('location:../html/already_voted.html');
}


}











?>