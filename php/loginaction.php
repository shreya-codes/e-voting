<?php 
session_start();

?>


<?php

$check=1;
    if(isset($_POST['logged']))
    {
        $firstname=$_POST['firstname'];
        $password1=$_POST['password'];
        // echo $userEmail." ";
       
    
       // session_start();
       // $_SESSION['username']=$firstname;
       // $_SESSION['password']=$password;

        include 'db.php';
        $query="SELECT * FROM registration";
        $sql=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($sql))
        {
           
            $id=$row['id'];
            $Firstname=$row['firstname'];
    
            $Lastname=$row['lastname'];
            $Email=$row['email'];
            $Password=$row['password'];

            $ver=$row['verification'];
                                                    if($Firstname==$firstname && (password_verify( $password1, $Password)))
                                                    {

                                                                                        if($ver==1){

                                                                                        $_SESSION['u_id']=$id;
                                                                                        $_SESSION['username']=$Firstname;
                                                                                        $_SESSION['lastname']=$Lastname;
                                                                                        $_SESSION['password']=password_hash($password1,PASSWORD_DEFAULT);

                                                                                        header('location:candidate.php');

                                                                                    }

                                                                                    else{

                                                                                        $_SESSION['v_email']=$Email;


                                                                                        header('location:verify.php');





                                                                                    }


                                                    }
                                                    

              

       
        }

 include'JavaScript.js';
   

    }

        

    

?>
