<?php 
session_start();
?>



<?php

//creating table for poll
include 'db.php';


if(isset($_POST['newpoll'])){


$image1=($_FILES['upload1']);
        // var_dump($citizenship_copy);

        $fileName1=$image1['name'];
        $fileTempName=$image1['tmp_name'];

        $fileExt=explode('.',$fileName1);
        $extCheck=strtolower(end($fileExt));

        $extList=array('jpg','jpeg','png');

        if(in_array($extCheck,$extList)){
            $destFile='uploads/voters'.$fileName1;
            // print_r($destFile);
            move_uploaded_file($fileTempName,$destFile);

}

$image2=($_FILES['upload2']);
        // var_dump($citizenship_copy);

        $fileName2=$image2['name'];
        $fileTempName=$image2['tmp_name'];

        $fileExt=explode('.',$fileName2);
        $extCheck=strtolower(end($fileExt));

        $extList=array('jpg','jpeg','png');

        if(in_array($extCheck,$extList)){
            $destFile='uploads/voters'.$fileName2;
            // print_r($destFile);
            move_uploaded_file($fileTempName,$destFile);

}

$image3=($_FILES['upload3']);
        // var_dump($citizenship_copy);

        $fileName3=$image3['name'];
        $fileTempName=$image3['tmp_name'];

        $fileExt=explode('.',$fileName3);
        $extCheck=strtolower(end($fileExt));

        $extList=array('jpg','jpeg','png');

        if(in_array($extCheck,$extList)){
            $destFile='uploads/voters'.$fileName3;
            // print_r($destFile);
            move_uploaded_file($fileTempName,$destFile);
}


$image4=($_FILES['upload4']);
        // var_dump($citizenship_copy);

        $fileName4=$image4['name'];
        $fileTempName=$image4['tmp_name'];

        $fileExt=explode('.',$fileName4);
        $extCheck=strtolower(end($fileExt));

        $extList=array('jpg','jpeg','png');

        if(in_array($extCheck,$extList)){
            $destFile='uploads/voters'.$fileName4;
            // print_r($destFile);
            move_uploaded_file($fileTempName,$destFile);

}

     $image5=($_FILES['upload5']);
        // var_dump($citizenship_copy);

        $fileName5=$image5['name'];
        $fileTempName=$image5['tmp_name'];

        $fileExt=explode('.',$fileName5);
        $extCheck=strtolower(end($fileExt));

        $extList=array('jpg','jpeg','png');

        if(in_array($extCheck,$extList)){
            $destFile='uploads/voters'.$fileName5;
            // print_r($destFile);
            move_uploaded_file($fileTempName,$destFile);       
}
include 'db.php';





$pollname = mysqli_real_escape_string($conn,$_POST['pollname']);
$st=mysqli_query($conn,"CREATE TABLE " .$pollname. " (  Id INT, votername VARCHAR(30),voterlastname VARCHAR(30),vote_status BOOLEAN default false,ban_status BOOLEAN default false, active_status BOOLEAN default false,last_activity timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP  )");

                   
    










$Pollname=$_POST['pollname'];
 $_SESSION['curr_poll']=$Pollname;
$poll_type=$_POST['voter'];



$entries_count=$_POST['entry-count'];
$c1=$_POST['candidate1'];
$c2=$_POST['candidate2'];
$c3=$_POST['candidate3'];
$c4=$_POST['candidate4'];
$c5=$_POST['candidate5'];
$t1=$_POST['regdead'];
$t2=$_POST['pollstart'];
$t3=$_POST['pollend'];

$passw=$_POST['poll_pass'];

$password=password_hash($passw, PASSWORD_DEFAULT);


if($poll_type=='Free'){
include 'db.php';

$passwrd='ovs123';

$password=password_hash($passwrd, PASSWORD_DEFAULT);

$stmt=$conn->prepare('insert into poll(Poll_Name,Poll_Type,Total_Entries,Password,c1,c2,c3,c4,c5,c1_image,c2_image,c3_image,c4_image,c5_image,Reg_deadline,poll_start,poll_end) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("sssssssssssssssss",$Pollname,$poll_type,$entries_count,$password,$c1,$c2,$c3,$c4,$c5,$fileName1,$fileName2,$fileName3,$fileName4,$fileName5,$t1,$t2,$t3);
        $stmt->execute();
    
       

$stmt1=$conn->prepare('insert into admin(SN,Firstname,Lastname,Poll_Name,poll_pass,admin_pass) values (?,?,?,?,?,?)');

$stmt1->bind_param("ssssss",$_SESSION['u_id'],$_SESSION['username'],$_SESSION['lastname'],$Pollname,$password,$_SESSION['password']);
        $stmt1->execute();
        $stmt1->close();
        
         header('location:../html/poll_created.html');

                        }
                    




























if($poll_type=='Controlled'){
include 'db.php';




$stmt1=$conn->prepare('insert into admin(SN,Firstname,Lastname,Poll_Name,poll_pass,admin_pass) values (?,?,?,?,?,?)');

$stmt1->bind_param("ssssss",$_SESSION['u_id'],$_SESSION['username'],$_SESSION['lastname'],$Pollname,$password,$_SESSION['password']);
        $stmt1->execute();
       


$stmt=$conn->prepare('insert into poll(Poll_Name,Poll_Type,Total_Entries,Password,c1,c2,c3,c4,c5,c1_image,c2_image,c3_image,c4_image,c5_image,Reg_deadline,poll_start,poll_end) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("sssssssssssssssss",$Pollname,$poll_type,$entries_count,$password,$c1,$c2,$c3,$c4,$c5,$fileName1,$fileName2,$fileName3,$fileName4,$fileName5,$t1,$t2,$t3);
        $stmt->execute();
    
       

            header('location:../html/poll_created.html');
        

                        }
                    
}



if($poll_type=='FullControlled'){
include 'db.php';



$stmt=$conn->prepare('insert into poll(Poll_Name,Poll_Type,Total_Entries,Password,c1,c2,c3,c4,c5,c1_image,c2_image,c3_image,c4_image,c5_image,Reg_deadline,poll_start,poll_end) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
        $stmt->bind_param("sssssssssssssssss",$Pollname,$poll_type,$entries_count,$password,$c1,$c2,$c3,$c4,$c5,$fileName1,$fileName2,$fileName3,$fileName4,$fileName5,$t1,$t2,$t3);
        $stmt->execute();
        

$stmt1=$conn->prepare('insert into admin(SN,Firstname,Lastname,Poll_Name,poll_pass,admin_pass) values (?,?,?,?,?,?)');

$stmt1->bind_param("ssssss",$_SESSION['u_id'],$_SESSION['username'],$_SESSION['lastname'],$Pollname,$password,$_SESSION['password']);
        $stmt1->execute();
        $stmt1->close();
        $conn->close();
        
        $_SESSION['curr_poll']=$Pollname;

header('location:FullControlledPoll.php');



                        }




                    






?>