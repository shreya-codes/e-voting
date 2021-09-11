<?php 

session_start();

if(!isset($_SESSION['username'])){

header('location:../html/home.html');

}

?>

<!DOCTYPE html>
<html>
<head>
   
    <title></title>
<link  href="../css/creation.css" rel="stylesheet" type="text/css">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
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
    
    <li ><a href="../chat/chat_login.php"><h1>chat</h1></a></li>
 


</ul>
	

<img class="logo" src="../css/background.jpg"> 








<div class="container">



 <div class="box" >
					<div class="icon"><i class="fa fa-search" aria-hidden="true"></i>	</div>
   		<div class="content">
				
				<a href="search.php"><h3>search</h3></a>
					<p>search if you already have permission to vote</p>

			</div>

</div>


<div class="box" >
					<div class="icon"><i class="fa fa-user-plus"></i>	</div>
   		<div class="content">
				
				<a href="../html/newpoll.html"><h3>NewPoll</h3></a>
					<p>Create a new poll if u have registered</p>

			</div>
</div>


<div class="box">
					<div class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i>	</div>
   		<div class="content">
				
				<a href="result.php"><h3>Result</h3></a>
					<p>View the results that you have permission to </p>

			</div>
</div>



</div>

</body>
</html>


