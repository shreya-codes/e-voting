<?php

include("../php/db.php");
$conn= new mysqli('localhost','root','','test');
if($conn){
	// echo "connection successful";
}
else{
	die("connection failed");
}




function fetch_user_last_activity($Id,$conn){

$q="select * from ".$_SESSION["curr_poll"]."

where Id='$Id' order by last_activity desc limit 1

";

$q2=$conn->query($q);

if(!empty($q2) && $q2->num_rows > 0){
while ($row=$q2->fetch_assoc()){

	return $row['last_activity'];

}

}

}




function fetch_user_chat_history($from_user_id, $to_user_id, $conn)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') 
 OR (from_user_id = '".$to_user_id."' 
 AND to_user_id = '".$from_user_id."') 
 ORDER BY timestamp DESC
 ";
 $res1 = $conn->query($query);
  $output = '<ul class="list-unstyled">';



 while ($row=$res1->fetch_assoc()){
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $conn).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}





function get_user_name($user_id, $conn)
{
 $query = "SELECT * FROM ".$_SESSION['curr_poll']." ";
 $res1 = $conn->query($query);
 $z=1;
 
 while ($row=$res1->fetch_assoc()){
 

if($row['Id']==$_SESSION['u_id']){
  $z=2;
  
break;
 }


}


if($z==2){
return $row['votername'];

}
}






?>