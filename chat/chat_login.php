<?php 

include "db1.php";
session_start();


$message='';
?>

<?php 
$z=0;
if(isset($_POST['login'])){


$q="select * from ".$_POST['pollname']." ";


$result=$conn->query($q);
                                      if(!empty($result) && $result->num_rows > 0){

                                                                  while($row= $result->fetch_assoc()){


                                                                 $id=$row['Id'];


                                                                                              if($id==$_SESSION['u_id']){

                                                                                              $z=5;
                                                                                                




                                                                                            }









                                                                                              }


                                                                                    }

                                      

if($z==5){

  $y=$_SESSION['curr_poll']=$_POST['pollname'];
date_default_timezone_set('Asia/Kathmandu');
$ct=date("Y-m-d H:i:s");
$i=$_SESSION['u_id'];
$q="update  ".$y." set last_activity='".$ct."' where Id='".$i."' ";



  header('location:chat_login_action.php');

}


else{



  $q="select * from admin ";

           $st=$conn->query($q);

                          while($row= $st->fetch_assoc()){

                                  if (($row['Poll_Name']==$_POST['pollname'])&&($_SESSION['username']==$row['Firstname'])){

                                    $_SESSION['curr_poll']=$_POST['pollname'];
                                    header('location:chat_login_action.php');

                                  }

               
              }
 echo('you are not associated with that poll');



}



}

?>
<html>  
    <head>  
        <title>Chat Application </title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">Chat Application </a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Chat Application Login</div>
    <div class="panel-body">
     <form method="post" >
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       
       <label>Enter Pollname:</label>
       <input type="text" name="pollname" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="login" />
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  
</html>
