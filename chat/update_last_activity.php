<?php 


session_start();
include "db1.php";

?>

<?php 


$q=" update ".$_SESSION["curr_poll"]."	set last_activity=now() where Id='".$_SESSION["u_id"]."' 	";


$q1=$conn->query($q);









?>
