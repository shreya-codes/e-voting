<?php 

session_start();
if(!isset($_SESSION['username'])){

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
    width:25%;
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
<li><a href="candidate.php"><h1>SelectMenu</h1></a></li>
   <li><a href="logout.php"><h1>Logout</h1></a></li>
    
    <li ><a href="../chat/chat_login.php"><h1>chat</h1></a></li>
 


</ul>
	<form action='poll_entry_check.php' method='post'>
	<label for="Poll_name"><h3>Enter-Poll-Name</h3></label>
	
          <input id="poll_name" name="poll_name" type="text" required  >
         <label for="Poll_name"><h3>Enter-Poll-Password</h3></label>
        <input id="poll_pass" name="poll_pass" type="password"		  required  >
          
          <button type='submit'  name='search1'>search</button>




</form>

<table>
	<tr>
		<td>id</td>
		<td>Poll_Name</td>
		<td>Poll_type</td>
		<td>Choose</td>
		
</tr>
	<?php
	 

$conn=mysqli_connect("localhost","root","",'test');

$sql="select id,Poll_Name,Poll_Type from poll";
$result=$conn->query($sql);

if($result->num_rows>0){
	
 while($row= $result->fetch_assoc()){
 	$id=$row['id'];
	
echo "<tr ><td >".$row["id"]."</td><td>".$row['Poll_Name']."</td><td>".$row['Poll_Type']."</td> <td>
<form type='submit' action='search.php' method='post'>
<input type='hidden' name='pod' value=".$id.">
<button type='submit' name='submit1' >login</button>

</form>

</td>
</tr>";
}
echo "</table" ;

}
else{
	echo "empty";
}

// $conn->close();
?>
</table>


<?php
	if(isset($_POST['submit1'])){
		
	$p_id=	mysqli_real_escape_string($conn,$_POST['pod']);
		




?>
		<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
					<!--  searching poll !-->
					<!--  searching poll !-->

	











					<!--  selecting any poll from a list of existing pole  !-->
					<!--  selecting any poll from a list of existing pole  !-->




<form action='poll_entry_check.php' method='post'>
	<label for="Poll_pass"><h3>Poll-Password</h3></label>
	
          <input id="poll_pass" name="poll_pass" type="password"		  required  >
         
         <input type='hidden' name='pod' value='<?php echo($p_id) ?>'>
          
          <button type='submit'  name='voter_access'>Enter</button>


</form>



	 <?php } 


else{
	
	header('search.php'); 
}
	 ?>



</body>
</html>

