<?php 
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <link rel="stylesheet" href="../css/home.css">
  <link rel="stylesheet" href="../css/vote.css">
</head>
<body>
	<header id="top">
		<nav id="nav">
		  <div class="nav-header">
			<div class="logo">
			  <a href="#"> <img src="../css/logo.png" height="60px" alt=""></a>
  
			</div>
			<!-- <img src="logo.png" class="logo" alt="logo"> -->
			<div class="links-container">
			  <ul class="links">
				
				<li> <a href="candidate.php">
					<h2>SelectMenu</h2>
				  </a></li>
				<li> <a href="logout.php">
					<h2>Logout</h2>
				  </a></li>
				
			  </ul>
			</div>
		  </div>
  
		</nav>
	  </header>


<div class="container">

	
<script>
// Set the date we're counting down to

 var countDownDate = <?php 
echo strtotime("$date $H:$m:$s" ) ?> * 1000;
var now = <?php echo $pd ?> * 1000;


// Update the count down every 1 second
var x = setInterval(function() {
now = now + 1000;
// Find the distance between now an the count down date
var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>

<h1 clas="text-center text-white bg-dark" id="head">VOTE HERE</h1>
<br>
<p id="demo"></p>



<form  action="vote_action.php" method='post'>
<table class="table-responsive">

<table class="table table-bordered table-stripped table-hover">


<thead>

<th>Candidate</th>
<th>Image</th>
<th>Choose</th>
</thead>


<tbody>




<?php

//echo $_GET["id"];
include "db.php";

$s_id=$_SESSION['u_id'];




$result=mysqli_query($conn,"select id,Poll_Name,c1,c2,c3,c4,c5,c1_image,c2_image,c3_image,c4_image,c5_image,poll_end from poll");



while($row=mysqli_fetch_array($result)){







$r_id=$row['id'];

if(($_SESSION['curr_poll']==$row['Poll_Name'])&&($_SESSION['p_id']==$r_id)){


	$pd=$row['poll_end'];
?>
<tr>
	
	<td><?php echo $row['c1'];	?></td>
	<td><img src="uploads/voters<?php echo $row['c1_image'];	?> " width="200px" height="200px"> </td>
	<td><button type='submit' name='c1' >vote</button>	</td>

</tr>

<tr>
	
	<td><?php echo $row['c2'];	?></td>
	<td><img src="uploads/voters<?php echo $row['c2_image'];	?> " width="200px" height="200px"> </td>
	<td><button type='submit' name='c2' >vote</button>	</td>


</tr>


<?php 

if(!($row['c3']=='')){ ?>
<tr>

	<td><?php echo $row['c3'];	?></td>
	<td><img src="uploads/voters<?php echo $row['c3_image'];	?> " width="200px" height="200px"> </td>
	<td><button type='submit' name='c3' >vote</button>	</td>


</tr>


<?php }?>

<?php 
if(!($row['c4']=='')){ ?>

<tr>

	<td><?php echo $row['c4'];	?></td>
	<td><img src="uploads/voters<?php echo $row['c4_image'];	?> " width="200px" height="200px"> </td>
	<td><button type='submit' name='c4' >vote</button>	</td>


</tr>
<?php }?>



<?php 

if(!($row['c5']=='')){ ?>



<tr>

	<td><?php echo $row['c5'];	?></td>
	<td><img src="uploads/voters<?php echo $row['c5_image'];	?> " width="200px" height="200px"> </td>
	<td><button type='submit' name='c5' >vote</button>	</td>


</tr>

<?php }?>

</form>



<?php











}





}






 ?>











</tbody>


</table>

</div>

<footer>
    <div class="footer">
      <div class="footer-content">
        <div class="footer-section about">
          <h1 class="about">About</h1>
          <p class="home-para">
            PollMaker is a web based application that provides a platform for users to create various types of polls.
            it helps in capturing powerful feedback instantly
          </p>
          <div class="social">
            <h1>Contact Us</h1>
            <div class="social-links">
              <a href=""> <i class="fab fa-instagram"></i></a>
              <a href=""><i class="fab fa-facebook"></i></a>
              <a href=""><i class="fab fa-twitter-square"></i></a>
            </div>
          </div>

        </div>
        <div class="footer-section services">
          <h1> Our Services</h1>
          <div class="list">
            <ul>
              <li><a href="createpoll.html">Create Poll</a></li>
              <li><a href="">Vote</a></li>
              <li><a href="">Share the Link</a></li>
              <li><a href="">Evaluate Results</a></li>
            </ul>
          </div>
          <div class=" team">
            <h1>Our Team</h1>
            <div class="list">
              <ul>
                <li>Rshijuta Pokherel</li>
                <li>Rupesh Ghorashainee</li>
                <li>Sailesh Thapa</li>
                <li>Shreya Shrestha</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-section feedback">
          <h1 class="feed">FeedBack</h1>
          <form action="home.html" method="post">
            <input type="email" class="text-input contact-input" placeholder="Your email address" id="email"
              name="email">
            <textarea name="message" class="text-input contact-input" placeholder="Your message" id="message" cols="30"
              rows="10"></textarea>
            <button class="btn btn-big" id="btn-big">
              <i class="far fa-envelope"> Send </i>
            </button>

          </form>

        </div>

      </div>
      <div class="footer-bottom">
        &copy; KECminorproject
      </div>
    </div>
  </footer>


</body>
</html>




