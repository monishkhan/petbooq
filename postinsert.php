<?php
$postid = $_POST["postid"];
$comment = $_POST["username"];
$userid = $_POST["userid"];
require './dbcon.php';
$sql = "insert into comments(comment_post_id,comment,user_id)values('$postid','$comment','$userid')";
//print_r($sql);die;
mysqli_query($conn, $sql);
?>