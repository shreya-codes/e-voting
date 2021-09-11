
<?php 
session_start();
include "db.php";

?>



<?php 

if(isset($_POST['admin'])){




$first=$_POST['firstname'];

$last=$_POST['lastname'];

$poll=$_POST['pollname'];
$upass=$_POST['Upassword'];

$ppass=$_POST['Ppassword'];



$sql="select * from admin";

$res=$conn->query($sql);



while($row=$res->fetch_assoc()){

$p=$row['Poll_Name'];
$f=$row['Firstname'];
$l=$row['Lastname'];
$up=$row['admin_pass'];
$pp=$row['poll_pass'];


if($p==$poll){

if(($f==$first ) && ($last==$l ) &&  (password_verify($upass,$row['admin_pass'])) && (password_verify($ppass,$row['poll_pass']))){

	$_SESSION['Admin_Poll']=$poll;
	header('location:voterlist.php');



}

}

}
	
	echo("mismatched info");




}

?>