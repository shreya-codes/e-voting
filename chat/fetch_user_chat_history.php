<?php 

include('db1.php');

session_start();

echo fetch_user_chat_history($_SESSION['u_id'],$_POST['to_user_id'],$conn);





?>
