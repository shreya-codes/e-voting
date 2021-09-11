<?php 

session_start();
if(!isset($_SESSION['Admin_Poll'])){


  header('location:../html/home.html');
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Table with polls</title>

<style type="text/css">
  

  table,th,tr,td{ 
    
margin:auto;
 table-layout: fixed ;
border: 1px solid black;
border-collapse:collapse ;
width:100%;
color:#d96459;
font-family:monospace;
font-size:25px;
text-align:center;


th:last-child, td:last-child {
    border-right: none;
    width:20%;
}
}
  
</style>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333333;
  height:75px;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111111;
}
</style>

</head>
<body>
  <ul>

   <li><a href="logout.php"><h1>Logout</h1></a></li>
    
   


</ul>
  <h1>Eligible voters list...Filter out</h1>

<table>
  <tr>
 
    
    <td>votername</td>
     <td>lastname</td>
     <td>votestatus</td>
     <td>Filter_Out</td>
   
    
</tr>
  <?php
   

include "db.php";

$sql="select * from ".$_SESSION['Admin_Poll']."";
$result=$conn->query($sql);

if(!empty($result) && $result->num_rows > 0){
  
 while($row= $result->fetch_assoc()){
 
  $c=$row['ban_status'];
  $i=$row['Id'];

  if($c==0){
    $i=$row['Id'];
 
echo (
  "</td><td>".$row['votername'].
  "</td><td>".$row['voterlastname'].
  "</td><td>".$row['vote_status'].
  

  "</td><td><form type='submit' action='voterlist.php' method='post'>
    <input type='hidden' name='pod' value=".$i.">
<button type='submit' name='submit1' >Ban</button>

</form>

</td>
</tr> ");


}
if($c==1){
  $i=$row['Id'];
  

echo (
  "</td><td>".$row['votername'].
  "</td><td>".$row['voterlastname'].
  "</td><td>".$row['vote_status'].
  

  "</td><td><form type='submit' action='voterlist.php' method='post'>
    <input type='hidden' name='pods' value=".$i.">
<button type='submit' name='submit2' >Un-Ban</button>

</form>




</td>
</tr> ");







}



if(isset($_POST['submit1'])){
$i=$_POST['pod'];
include "db.php";

$sql="select * from ".$_SESSION['Admin_Poll']."";
$result=$conn->query($sql);


if(!empty($result) && $result->num_rows > 0){
  
         while($row= $result->fetch_assoc()){
                             $ID=$row['Id'];

                                              if($ID==$i){

                                                $q="update  ".$_SESSION['Admin_Poll']." set ban_status=1 where Id=$i ";

                                                          $sql1=mysqli_query($conn,$q);
                                                         
                                                          header('location:voterlist.php');


                                                         }




                                               }




                                               }






                              }







if(isset($_POST['submit2'])){




include "db.php";
$ii=$_POST['pods'];
$sql="select * from ".$_SESSION['Admin_Poll']."";
$result=$conn->query($sql);


if(!empty($result) && $result->num_rows > 0){
  
         while($row= $result->fetch_assoc()){
                             $ID=$row['Id'];

                                              if($ID==$ii){

                                                $q="update  ".$_SESSION['Admin_Poll']." set ban_status=0 where Id=$ii ";

                                                          $sql1=mysqli_query($conn,$q);
                                                         
                                                          header('location:voterlist.php');


                                                         }




                                               }




                                               }






                              }































}


// $conn->close();

}


?>
</table>


</body>
</html>

