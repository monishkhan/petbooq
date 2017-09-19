<?php
session_start();
  $parent_id=$_SESSION['pet_unique_id'];
   require('dbcon.php');
$last_id=$_GET['last_id'];

$userqry=mysqli_query($conn,"SELECT * FROM user_inf WHERE pet_unique_id='$parent_id'");
$userinfo=mysqli_fetch_assoc($userqry);


$display = "SELECT * FROM addfriends JOIN post ON addfriends.child_id=post.child_post_id WHERE addfriends.parent_id = '$parent_id' AND post.id > '$last_id' ORDER BY post.id ASC LIMIT 3";
       $disprun=mysqli_query($conn,$display);
	
 
   $json = include('getpostdata.php');
   echo json_encode($json);
?>


