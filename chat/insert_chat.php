<?php 
include "db1.php";
session_start();


$data=array(

'to_user_ids' => $_POST['to_user_id'],
'from_user_ids' =>$_SESSION['u_id'],
'chat_messages' =>$_POST['chat_message'],
'statuss' =>'1'
);







$k=1;

$stmt=$conn->prepare('INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status)  values (?,?,?,?)');
		$stmt->bind_param("ssss",$_POST['to_user_id'],$_SESSION['u_id'],$_POST['chat_message'], $k);
		$stmt->execute();
		// echo "Submit success";
		




 echo fetch_user_chat_history($_SESSION['u_id'], $_POST['to_user_id'], $conn);


?>